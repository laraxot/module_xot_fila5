---
title: "Theme Assets Workflow - CSS/JS Frontend"
type: note
status: active
updated: 2026-11-11
tags: [docs, xot, themes, deploy]
qmd: "theme assets workflow - css/js frontend xot symlink public_html themes"
---
# Asset dei temi: build nel tema, servizio per symlink

**Regola:** CSS e JS del front office si modificano nella cartella del tema (`laravel/Themes/<Tema>/resources`), si
compilano lì, e il risultato va in `laravel/Themes/<Tema>/public`. Nessuna copia verso la document root.

## Come arrivano al browser

```
public_html/themes/<Tema>   ->   ../../laravel/Themes/<Tema>/public      (symlink)
public_html/assets/fixcity/svg -> ../../../laravel/Modules/Fixcity/resources/svg   (symlink)
```

- `@vite([...], 'themes/<Tema>')` legge `public_html/themes/<Tema>/manifest.json`, cioè il manifest del tema.
- `public_html` è la document root: non si cancella né si svuota mai.
- I link li crea `deploy.sh` (funzione `link_public_asset`), in modo idempotente. Se al posto del link c'è una cartella
  vera, lo script avvisa e non la tocca: va sostituita a mano, dopo averne controllato il contenuto.

**Perché un symlink e non `npm run copy`:**

- **Una sola copia degli asset.** L'output della build è versionato nel repository del tema (`Themes/<Tema>/public`),
  quindi ciò che si committa è ciò che si serve. Con la copia, `public_html` andava fuori sincronia appena qualcuno
  dimenticava il comando.
- **Niente passo manuale nel deploy.** Basta il `git pull` del tema.
- **Il web server vede solo `public`.** I sorgenti del tema (`resources`, `node_modules`, script) restano fuori dalla
  document root.

## Lavorare su un tema

```bash
cd laravel/Themes/Sixteen
npm install
npm run dev      # sviluppo con hot reload
npm run build    # produzione: scrive in ./public (servito dal symlink)
```

Lo script `copy` è stato tolto da `package.json` dei temi: non serve più.

## Asset dei moduli: stessa regola

```
public_html/assets/<modulo in minuscolo>  ->  ../../laravel/Modules/<Modulo>/public   (symlink)
```

- Ogni modulo che espone file al browser li tiene in `Modules/<Modulo>/public`, versionata nel repository del modulo:
  Geo (build Vite, `outDir: './public'`), Xot (css del pannello), Fixcity (`public/svg` -> `../resources/svg`, le icone).
- `deploy.sh` crea un link per ogni `Modules/*/public`. Il nome è in minuscolo perché gli URL lo sono (`/assets/geo/...`),
  e così resta uguale al namespace usato da `AssetAction` (`xot::css/x.css` -> `/assets/xot/css/x.css`).
- `public_html/assets/.gitignore` elenca `<modulo>/` (e la stessa voce senza barra, perché git vede un symlink come un file):
  il repository radice non versiona i link, che sono un prodotto del deploy, né il loro contenuto, che appartiene al modulo.
  Il test `Modules/Xot/tests/Unit/Deploy/ModulePublicAssetsLinksTest.php` fallisce se un modulo con `public/` manca
  dall'elenco.
- `AssetAction` cerca prima in `Modules/<Modulo>/public` e restituisce l'URL sotto `/assets/<modulo>` senza copiare; la
  copia da `resources/` resta solo come ripiego per i moduli non ancora migrati.
- Una cartella vera trovata al posto del link (vecchia copia o vecchia build) viene spostata da `deploy.sh` fuori dalla
  document root, in `$HOME/fixcity-backups/assets`, e sostituita dal link. `public_html` non si tocca.

Modulo nuovo con asset pubblici: crea `Modules/<Modulo>/public`, aggiungi `<modulo>/` e `<modulo>` a
`public_html/assets/.gitignore`, esegui `deploy.sh` (o il `ln -s` a mano in sviluppo).

## Problemi comuni

| Sintomo | Causa | Cosa fare |
| --- | --- | --- |
| `ViteManifestNotFoundException` per `themes/Sixteen` | Manca il symlink o la build del tema | Controlla `ls -la public_html/themes/`; esegui `deploy.sh` o crea il link; `npm run build` nel tema |
| CSS vecchio dopo una modifica | Build del tema non eseguita o non committata | `npm run build` nel tema e commit di `public/` |
| Icone delle categorie mancanti (`/assets/fixcity/svg/*.svg`) | Manca `public_html/assets/fixcity` | Lo crea `deploy.sh` (link a `Modules/Fixcity/public`) |
| Campo mappa assente nei pannelli (`assets/geo/manifest.json`) | Manca `public_html/assets/geo` o la build Geo non è committata | `deploy.sh`; in sviluppo `cd Modules/Geo && ../../node_modules/.bin/vite build` e commit di `public/` |
