# Story: config/local/<dominio> de-versionato da una pulizia gitignore

**Status**: done (fix del peer verificato + un file spurio ripulito)
**Modulo**: Xot (guardia + tooling), Tenant (proprietario del meccanismo `config/local/<dominio>`)
**Related**: `Modules/Xot/tests/Unit/DomainConfigStaysTrackedTest.php` ·
`Modules/Tenant/docs/tenant-config-path-philosophy-debate.md` ·
`Modules/Tenant/docs/configuration-logic-analysis.md`

## Segnalazione

L'utente segnala (paste di un output `delete mode`) che una serie di file sotto
`laravel/config/local/{ptvx,ptvx-mono,tv/prov/personale2019,tv/prov/personale2022}/`
sono stati cancellati e chiede di capire il perche', trattandoli con BMAD + second brain.

## Causa

`laravel/config/local/` e' nel `.gitignore` (root e `laravel/.gitignore`), ma i file di
configurazione per dominio (`config/local/<dominio-inverso>/`: `app.php`, `auth.php`,
`database.php`, `xra.php`, `menu_*.php`, `policy.md`, `modules_statuses.json`, ecc.) sono
**tracciati di proposito da anni** (`git log --follow` risale a `let's start`/`first`),
perche' sono, per il modulo Tenant, "i sorgenti reali usati dall'app" per ogni tenant/dominio
locale — non scarti.

Il commit `8b3b7cbea3` (autore: l'account dell'utente, messaggio "."; contiene anche il lavoro
legittimo della story `2.1 root moduli/temi hygiene`) ha rimosso dall'indice **90 file** sotto
quelle 4 cartelle. La story 2.1, letta dal parent commit, riguarda **solo** le root di
`Modules/*` e `Themes/*` (tooling legacy, `*.md` in eccesso, ecc.): non menziona mai
`config/local`. La cancellazione e' quindi fuori scopo rispetto alla story che l'ha
accompagnata — verosimile causa: un comando ad-hoc del tipo
`git ls-files -ci --exclude-standard | xargs git rm --cached` (il pattern classico per "smettere
di tracciare cio' che .gitignore copre"), che non distingue i file gitignored-ma-tracciati-di-
proposito da quelli davvero da ignorare.

Non e' una perdita di dati: i 90 file erano ancora presenti su disco, byte-identici
all'ultima versione tracciata (verificato con `diff` su due campioni). Il danno era solo
"i futuri `git clone`/`pull` di questo repo non porteranno piu' questi file" — grave per
gli altri ambienti che clonano lo stesso repo condiviso (vedi second brain
`moduli-condivisi-fra-progetti`), non per questo checkout.

## Fix

- [x] **Ripristino tracciamento** (sessione concorrente + questa sessione, 2026-09-29
      11:45-11:50): `git add -f` sui 90 path originali; il commit `57c400993d` di una sessione
      pari li ha rimessi nell'indice (indice condiviso fra sessioni sullo stesso checkout).
- [x] **Guardia di regressione** (sessione pari): `Modules/Xot/tests/Unit/DomainConfigStaysTrackedTest.php`,
      Pest, verifica un campione di path sotto `DOMAIN_CONFIG_MUST_STAY_TRACKED` con
      `git ls-files`. Verificato da questa sessione: **3 passed (6 assertions)**.
- [x] **Un file spurio ripulito** (questa sessione): il commit del peer aveva incluso anche
      `laravel/config/local/ptvx/database/content/information_schema_tables.json`, che ha
      **due righe dedicate** in `.gitignore` (root + `laravel/.gitignore`) proprio per essere
      escluso (e' un dump generato, non il contratto di configurazione). Ri-rimosso dal
      tracking con `git rm --cached` (resta su disco). `laravel/config/local/ptvx-mono/test.php`
      e l'omologo in `ptvx/` (scratch `['pluto' => 'paperino']`) sono stati lasciati tracciati:
      non hanno un'esclusione individuale dedicata e toccarli sarebbe fuori scopo.
- [x] **Gate**: PHPStan su Xot -> 0 errori. Pest sulla guardia -> 3 passed. Nessuna modifica
      di codice applicativo in questa story, solo stato dell'indice git e un test pre-esistente
      del peer.

## Nota per chi scrive script di pulizia root/hygiene

`laravel/config/local/` e' un caso di "ignore a livello di cartella con eccezioni tracciate
di proposito al suo interno": qualunque script o comando che pulisce file
gitignored-ma-tracciati deve escludere esplicitamente `laravel/config/local/` (o, meglio,
verificare `DomainConfigStaysTrackedTest` in CI prima di considerarsi concluso). La story
`2.1 root hygiene CI` (module/theme root) resta valida e non tocca questo percorso: non va
estesa a `config/local` senza una decisione esplicita dell'utente sul merito (quali domini
restano attivi).

## Coordinamento

| Chi | Claim | Esito |
|---|---|---|
| sessione pari (commit `57c400993d`) | ripristino dei 90 file + `DomainConfigStaysTrackedTest` | fatto, verificato da questa sessione |
| questa sessione | root cause dalla story 2.1, pulizia file spurio, gate PHPStan+Pest, story | questa story |
| sessione e87b3441 | riverifica, `test.php` fuori dall'indice, guardia Tenant estesa | vedi sotto |

## Riverifica (sessione e87b3441, 2026-09-29 12:05)

**Owner**: questa story e la story
`Tenant/docs/bmad/stories/tenant-config-untracked-by-gitignore.story.md` (issue #253)
descrivono lo stesso incidente. Il meccanismo `config/local/<dominio>` appartiene a Tenant,
quindi la story Tenant e' quella di riferimento. Questa resta come cronologia.

Correzioni verificate sul codice:

- **I due `test.php` non andavano lasciati tracciati.** Sono coperti da `.gitignore:415`
  (`test*.php`) e non erano fra i 90 cancellati: `git log --all` li trova solo in
  `57c400993d`. Ci sono entrati per un `git add -f` sulle 4 cartelle intere, che forza anche
  i file ignorati. Tolti con `git rm --cached`, il disco non e' toccato. Ora
  `git ls-files laravel/config/local` coincide riga per riga con il tree di `c0395dc0f9`
  (90 file) e `git diff --cached c0395dc0f9 -- laravel/config/local` e' vuoto.
- **Il meccanismo e' provato, chi l'ha lanciato no.** Dei 5747 file che `8b3b7cbea3` segna
  come cancellati, 1108 esistono ancora su disco, e tutti i 1108 sono coperti da una regola
  ignore. E' la firma di «applica il .gitignore ai tracciati» (`git rm -r --cached` + `add`,
  oppure un indice ricostruito da zero + `add -A`). Nelle trascrizioni Claude, opencode e
  codex del 2026-09-29 prima delle 11:45 non c'e' nessun comando del genere sull'intero repo.
  Ci sono solo `git rm --cached` mirati della campagna root-hygiene (tools, scripts,
  workspace). L'autore resta quindi non identificato: l'ipotesi
  `git ls-files -ci | xargs git rm --cached` scritta sopra resta un'ipotesi.
- **La guardia di questa story e' un campione.** Tre path scritti a mano. La guardia Tenant
  (b), estesa in questa sessione, controlla che `git ls-files -c -i --exclude-standard --
  laravel/config/local` sia vuoto, cioe' che nessun file tracciato sia nell'insieme che la
  pulizia toglierebbe. Rosso eseguito con la vecchia regola iniettata via `GIT_CONFIG_*`:
  FAIL. Verde: Pest 5 passed (17 assertions) sulle due guardie insieme. Consolidarle in
  Tenant e' una proposta aperta nella story Tenant.
