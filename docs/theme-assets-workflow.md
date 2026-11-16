---
title: "Theme Assets Workflow - CSS/JS Frontend"
type: note
status: current
updated: 2026-11-11
tags: [docs, xot, assets, symlink]
qmd: "theme assets workflow css js frontend build symlink public_html npm run copy obsoleto"
related: [console/commands/xot-asset-links.md]
---
# Theme Assets Workflow - CSS/JS Frontend

**Regola**: gli asset di temi e moduli si compilano nella cartella del tema/modulo e vengono serviti
tramite **symlink** da `public_html/`. **`npm run copy` non esiste più e non va usato**: copiare i
file in `public_html/` romperebbe il symlink e lascerebbe asset vecchi.

## Struttura

```
base_<progetto>/
├── laravel/Themes/<Tema>/
│   ├── resources/      sorgenti CSS/JS
│   └── public/         asset compilati da Vite (outDir)
└── public_html/        DOCUMENT ROOT — non va mai cancellata
    ├── themes/<Tema>  -> ../../laravel/Themes/<Tema>/public   (symlink relativo)
    └── assets/xot     -> ../../laravel/Modules/Xot/public     (symlink relativo)
```

I symlink sono **relativi** (restano validi se il progetto cambia percorso) e si creano una volta
per installazione:

# 2. Compila gli assets
npm run build

# 3. Copia nella directory pubblica Laravel
```

## ⚠️ NON Fare Mai
❌ **NON modificare** `/public/css/` o `/public/js/` direttamente
❌ **NON usare** `npm run build` dalla root Laravel
❌ **NON dimenticare** il comando `symlink public_html/themes (npm run copy obsoleto)`

## ✅ Processo Corretto
1. **Modifica sorgenti** in `/Themes/[Theme]/resources/`
2. **Build assets** con `npm run build` dalla cartella tema
3. **Copy assets** con `symlink public_html/themes (npm run copy obsoleto)` dalla cartella tema
4. **Verifica risultato** nel browser

```bash
cd Themes/One
npm install          # Prima volta
npm run build        # Compila Sass/JS
```

### Tema Two
```bash
cd Themes/Two
npm install
npm run build
```

- Non modificare a mano i file compilati in `public/` o in `public_html/`.
- Non lanciare `npm run build` dalla root Laravel per gli asset di un tema.
- Non sostituire i symlink di `public_html/` con copie dei file, e non cancellare `public_html/`.
- Non aggiungere uno script `copy` al `package.json`.

## package.json del tema

```json
{
  "scripts": {
    "dev": "vite",
    "build": "vite build",
    "watch": "vite build --watch"
  }
}
```

## Troubleshooting

### Modifiche Non Visibili?
1. Verificare di aver eseguito `npm run build`
2. Verificare di aver eseguito `symlink public_html/themes (npm run copy obsoleto)`
3. Svuotare cache browser (Ctrl+F5)
4. Verificare path corretti in vite.config.js

### Errori di Build?
1. `npm install` nella cartella tema
2. Verificare versioni Node/npm
3. Controllare sintassi Sass/JS
4. Verificare dipendenze in package.json

---

### Errori di build?
1. `npm install` nella cartella del tema.
2. Verificare le versioni di Node e npm.
3. Controllare le dipendenze in `package.json`.
