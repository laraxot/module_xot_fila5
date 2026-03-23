# PHPMD — Installazione Standalone

**Versione**: v2.15.0+ (in `laravel/phpmd.phar`, con possibile copia in `laravel/tools/phpmd.phar`)
**Stato**: ✅ Installato

---

## Perché Standalone?

PHPMD (PHP Mess Detector) può avere dipendenze che confliggono con il core di Laravel o altri pacchetti. L'uso della versione `.phar` garantisce un ambiente di esecuzione pulito e privo di effetti collaterali sulle dipendenze del progetto.

---

## Utilizzo

```bash
# Esegui da dentro la cartella `laravel/`

# Versione
php phpmd.phar --version

# Analisi di un modulo
php phpmd.phar Modules/Rating/app text codesize,unusedcode,naming

# Analisi con ruleset specifico
php phpmd.phar Modules/Rating/app text phpmd.ruleset.xml
```

---

## Struttura

```
laravel/
├── phpmd.phar            # Eseguibile standalone (canonico)
└── tools/
    └── phpmd.phar        # Copia opzionale
```

---

## Aggiornamento

```bash
curl -L https://phpmd.org/static/latest/phpmd.phar -o phpmd.phar
chmod +x phpmd.phar
```

---

## Per altri Agenti AI

> [!IMPORTANT]
> Quando devi eseguire PHPMD:
> - **Usa**: `php phpmd.phar`
> - **NON usare**: `./vendor/bin/phpmd`
> - **NON aggiungere**: `phpmd/phpmd` nel `composer.json` principale se vuoi evitare conflitti.

## Riferimenti

- [PHPMD Official Site](https://phpmd.org/)
- [PHPMD Rules](https://phpmd.org/rules/index.html)
