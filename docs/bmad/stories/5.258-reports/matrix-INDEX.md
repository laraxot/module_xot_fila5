# G13 matrice in sola lettura: indice

Owner: sessione base-trade-fila5-43. Story: [5.258](../5.258-prompts-execute-improve.story.md).

## Scopo

I gruppi G01-G11 eseguono i propri prompt su 2 moduli ciascuno, con correzioni. La matrice
esegue gli stessi prompt, in sola lettura, sui moduli che il gruppo non copre. Così ogni
prompt viene provato su tutti i 14 moduli. Le prove servono alla fase di miglioramento dei
prompt, non correggono il codice.

## Esclusioni per modulo

Un modulo salta il gruppo che lo ha già in carico con correzioni.

| Gruppo | Moduli con correzioni (saltati dalla matrice) |
|---|---|
| G02 architettura | Notify, Activity |
| G03 controller/actions | Gdpr, Xot |
| G04 data/contracts | Tenant, Lang |
| G05 filament/ui | User, AI |
| G06 testing | Job, UI |
| G07 qualita' | Media, Seo |
| G08 db/modelli | Cms, Trade |
| G01, G09, G10, G11 | nessuno: i prompt di classe MODULE vanno eseguiti su tutti i moduli |

## Coppie di moduli (sorteggio `shuf`, 2026-09-30)

| Agente | Moduli | Report |
|---|---|---|
| X1 | Xot, User | `matrix-Xot.md`, `matrix-User.md` |
| X2 | Gdpr, Seo | `matrix-Gdpr.md`, `matrix-Seo.md` |
| X3 | Tenant, Notify | `matrix-Tenant.md`, `matrix-Notify.md` |
| X4 | UI, Media | `matrix-UI.md`, `matrix-Media.md` |
| X5 | AI, Job | `matrix-AI.md`, `matrix-Job.md` |
| X6 | Activity, Lang | `matrix-Activity.md`, `matrix-Lang.md` |
| X7 | Trade, Cms | `matrix-Trade.md`, `matrix-Cms.md` |
| G12 | Themes Four, AdminLTE, BsItalia | `G12-themes.md` (con correzioni) |

## Gate pesanti

- L'ambiente (`laravel/.env`, composer, `package:discover`) è della sessione coordinatrice. La
  matrice non lo tocca.
- phpstan, pest, phpinsights e phpmd si eseguono solo se `laravel/.env` esiste e
  `cd laravel && php artisan --version` termina con successo. Altrimenti l'esito è
  BLOCKED-ENV e si continua con i controlli statici.
- Ogni comando pesante passa da `bashscripts/tools/heavy-slot.sh <comando>` (massimo 4
  contemporanei sulla macchina, `HEAVY_SLOTS=4`).
- Sintassi verificata dalla sessione coordinatrice (2026-10-01), da `laravel/`, con
  `S=../bashscripts/tools/heavy-slot.sh`:

  ```bash
  $S ./vendor/bin/phpstan analyse Modules/<Mod> --no-progress --memory-limit=-1
  HEAVY_SLOTS=1 HEAVY_SLOT_DIR=/tmp/heavy-slots-pest $S ./vendor/bin/pest \
    --test-directory=Modules/<Mod>/tests Modules/<Mod>/tests --no-coverage
  ./tools/phpmd.sh Modules/<Mod>
  $S ./tools/phpinsights.sh Modules/<Mod> --format=console --summary
  ```

- Pest: un solo processo alla volta su tutta la macchina, perché il file sqlite di test è
  condiviso. Senza `--test-directory` Pest non carica il `Pest.php` del modulo e fallisce con
  "A facade root has not been set".

## Formato di ogni report

Una riga per prompt eseguito: prompt, controllo, comando, esito (PASS, FAIL, N-A,
BLOCKED-ENV), evidenza breve, difetto del prompt emerso. In fondo, la sezione "Difetti dei
prompt" raggruppa i problemi per prompt, perché i gruppi la leggono durante il miglioramento.

## Ripresa dopo il limite d'uso (2026-10-01 11:00)

- Report completi: AI, Gdpr, Media, Trade, UI. Restano: Xot, User, Tenant, Notify, Job,
  Activity, Lang, Cms, Seo.
- Tetto concordato tra le sessioni: al massimo 2 subagent contemporanei per sessione.
- PHPStan non si rilancia per modulo: i risultati completi di `analyse Modules` sono in
  `/tmp/5259/phpstan-all.json` (config del progetto, 6.949 errori) e
  `/tmp/5259/phpstan-larastan.json` (stessa config + larastan, 2.573 errori). Per modulo si
  riportano entrambi i conteggi. Si eseguono solo Pest (slot dedicato), phpmd e phpinsights.
