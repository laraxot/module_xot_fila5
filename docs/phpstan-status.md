# PHPStan Status — Xot

Stato vivo del gate. Non copiare numeri da report storici: rimisura.

## Misura 2026-09-23 (story 5.224 — comando utente)

```bash
cd laravel
rm -rf /tmp/phpstan && mkdir -p /tmp/phpstan
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules --memory-limit=2G
# EXIT 0 — [OK] No errors — 9421 file
# phpstan.neon immutato (level max, ignoreErrors vuoto)
```

Pest **non** eseguito: host `10.100.200.15` (personale2022).

Misura precedente 2026-09-21: `analyse` senza path e `analyse Modules` entrambi a 0
(story 18.59). Path CLI spegne `type-coverage`; il certify «siamo a zero» resta
il comando senza argomenti. Oggi l'utente ha chiesto esplicitamente `analyse Modules`.

Il 2026-09-21, dopo la verifica 18.59: un `analyse` su file Media caricava Setting e
il bootstrap Filament andava in fatal (`Cannot override final method
XotBaseResource::getFormSchema()`), poi 25 errori Setting, poi marker `<<<<<<<`
in `Activity/LogViewer.php` (mute-gate). Tutto chiuso. Rilancio certifying: ancora 0.

Config: `laravel/phpstan.neon` (`level: max`, `phpstan.neon` immutabile).
Neon **non** si tocca. Errori si risolvono nel codice, mai con baseline o ignore di evasione.

## Perché questo file esiste

Xot è la piattaforma: un errore di tipo qui si propaga a ogni modulo foglia.
Il gate verde significa che le classi base (`XotBaseResource`, `XotBaseResourceTable`,
`HasXotTable` solo sulla Table class) tengono i contratti che i consumer estendono.

## Comandi

| Scopo | Comando (cwd `laravel/`) |
|-------|--------------------------|
| Certifica zero | `./vendor/bin/phpstan analyse --memory-limit=-1` |
| Lavoro su un modulo | `./vendor/bin/phpstan analyse Modules/<Nome> --memory-limit=-1` |
| File toccato | `./vendor/bin/phpstan analyse Modules/<Nome>/app/<File>.php --memory-limit=-1` |

Un path CLI **sovrascrive** `parameters.paths` e spegne `tomasvotruba/type-coverage`.
Per dichiarare «siamo a zero» serve il comando senza argomenti.

## Debito aperto (non è un errore PHPStan oggi)

- Story [18.27](./stories/18.27.hasxottable-fuori-dai-componenti-filament.story.md):
  `HasXotTable` montato ancora su componenti `HasTable` → ignore `method.deprecated` nel trait.
- Duplicate path `XotBaseManageRelatedRecords` (`Pages/` vs `XotBaseResource/Pages/`).
- Marker di merge in alcuni `.md` (wiki, temi): PHPStan non li vede. I `.php` sono a 0 `<<<<<<<`.

## Collegamenti

- [phpstan-modules-fix.md](./wiki/troubleshooting/phpstan-modules-fix.md) — ricette
- [phpstan-best-practices.md](./wiki/phpstan-best-practices.md) — pattern Pest
- [18.59](./stories/18.59.phpstan-repo-wide-zero-2026-09-21.story.md) — drift 23→0 del 2026-09-21
- [phpstan-journey.md](../../../../docs/wiki/second-brain/phpstan-journey.md) — second brain
