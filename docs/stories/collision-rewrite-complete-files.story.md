---
title: "Collisioni: riscrivere il file completo, non scegliere un lato"
type: story
module: Xot
status: in-progress
created: 2026-11-06
updated: 2026-11-06
owner: Xot (tooling e regole trasversali; i file toccati appartengono ai moduli indicati)
tags: [merge-collisions, rewrite, bmad, multi-agent, docs-organization]
related:
  - ../bmad/stories/merge-marker-fleet-residue.story.md
  - ../bmad/stories/8.24-merge-conflict-resolution-fleet-swarm.story.md
  - ./dcp-201-nomi-dei-file-md-senza-date-e-senza-suffissi.story.md
  - ./phpstan-modules-zero-errors.story.md
  - ../../../../../docs/wiki/how-to/git-merge-marker-sweep.md
---

# Collisioni: riscrivere il file completo, non scegliere un lato

## Richiesta (ordine dell'utente, 2026-11-06)

«sistema le collisioni non scegliendo una versione o l'altra ma riscrivendo meglio il file completo, fa tutto con bmad + ecc + second brain + costantemente studia aggiorna e migliora e organizza meglio le cartelle docs dentro i moduli e dentro i temi, coordinati e collabora con gli altri agenti ai con bmad + ecc».

## Scopo (il perche')

Una collisione di merge e' un punto in cui due storie dello stesso file si sono incontrate. Scegliere un lato butta via il lavoro dell'altro, e la scelta si rivela sbagliata solo dopo (nello sweep del 2026-11-05 lo stesso metodo ha dato risposte opposte in due file; `BaseTenant` ha perso `HasUuids`). La risoluzione giusta nasce dallo scopo del file: cosa doveva fare, chi lo usa, quale lato porta una funzione voluta e quale una copia stale. Il file riscritto per intero integra il meglio dei due lati e lo migliora (tipi, PHPDoc, duplicazioni, documenti ordinati), cosi' il prossimo sync non ha piu' una regione da ricombinare.

## Misura iniziale (2026-11-06 07:42, dopo il sync delle 07:38-07:39)

- **24 file con marcatori** `<<<<<<< .merge_file_*` committati dal sync: User 14 (13 modelli PHP piu' `docs/`), Tenant 2 (`TenantSetting`, `TenantSubscription`), Cms 3, Activity 2, AI 2, Xot 1. Zero `.merge_file_*` come file.
- **14 nomi `.md` doppi** (`X.md` accanto a `X-1.md`, `-2`, `-2-1`): User archive e bug-fixes, Xot consolidated e laragon, docs/chat/swarm, Media. Dettaglio e regole in [dcp-201](./dcp-201-nomi-dei-file-md-senza-date-e-senza-suffissi.story.md).
- Causa radice invariata: `merge_remote_repo_2.sh` (`git merge -s resolve`, `git add -A && git commit -am .`) committa i marcatori rimasti e non gestisce le rinomine.

## Metodo (vale per ogni file)

1. Leggere il file intero e le due versioni intere; ricostruire lo stato pulito prima del sync (`git show dc34e53d6:<path>` nel parent).
2. Capire lo scopo e i chiamanti (`rg`, story, test, docs del modulo owner).
3. **Riscrivere il file completo**: integrare cio' che serve da entrambi i lati e migliorarlo (tipi senza `mixed`, generics, `casts()`, `Safe\`, niente duplicazioni; per i documenti: un solo testo ordinato con front matter valido).
4. Provare sul vendor installato i workaround ereditati (un alias su un metodo inesistente e' un fatal in autoload).
5. Verificare: marcatori 0, `php -l`, classe caricata con Reflection, Pint, PHPStan sul modulo; Pest dichiarato non eseguibile (`.env.testing` senza `DB_USERNAME`).
6. Registrare qui la propria sezione (scopo, preso da A/B, migliorato, verifica) e allineare le docs del modulo owner.

## Acceptance criteria

- [ ] AC1: zero marcatori di merge in tutti i tipi di file (esclusi vendor, node_modules, .git, storage).
- [ ] AC2: `python3 -I bashscripts/tools/docs/md-filenames.py check` esce 0.
- [ ] AC3: nessun file e' stato risolto per "ours"/"theirs" in blocco: ogni sezione sotto dichiara cosa e' stato preso da ciascun lato e cosa e' stato migliorato.
- [ ] AC4: ogni classe PHP riscritta si carica (Reflection su bootstrap reale) e `analyse Modules` non peggiora (baseline 71 errori, solo Cms e Geo).
- [ ] AC5: documenti riscritti con front matter valido, link relativi funzionanti, nomi senza date ne' suffissi.
- [ ] AC6: nessun commit fatto da agenti di questa story; nessun lock lasciato; nessun file in `bmad-output/`.

## Ripartizione fra agenti (file disgiunti, lock per file)

| Agente | File | Proprietario |
|---|---|---|
| A | User: `Authentication`, `AuthenticationLog`, `BaseTeam`, `BaseTeamUser`, `BaseTenant`; Tenant: `TenantSetting`, `TenantSubscription` | User, Tenant |
| B | User: `Device`, `DeviceUser`, `OauthPersonalAccessClient`, `Profile`, `Role` | User |
| C | User: `SocialiteUser`, `SsoProvider`, `TeamInvitation`, `TeamPermission` | User |
| D | `.gitattributes` e `.gitignore` di Activity, AI, Cms; `AI/docs/index.md`; `Cms/docs/00-index.md`; `Cms/docs/stories/docs-organization-cms.story.md` | Activity, AI, Cms |
| E1 | Nomi doppi in `User/docs/archive`, `User/docs/bug-fixes` | User |
| E2 | Nomi doppi in `Xot/docs/consolidated`, `Xot/docs/laragon`, `docs/chat/swarm`, `Media/docs` | Xot, Media |
| Coordinatore | `Xot/docs/stories/phpstan-modules-zero-errors.story.md`, questa story, wiki, memoria, run PHPStan intero | Xot |

## Coordinamento con Codex (rilevato 2026-11-06 ~07:47)

`codex` ha acquisito alle 07:44:56 i lock del task `collision-rewrite-20261106` su 16 file di questa story: `User/app/Models/{Authentication,AuthenticationLog,BaseTeam,BaseTeamUser,BaseTenant,Device,DeviceUser,OauthPersonalAccessClient,Role,SocialiteUser,SsoProvider,TeamInvitation,TeamPermission}.php`, `AI/docs/index.md`, `Cms/docs/00-index.md`, `Cms/docs/stories/docs-organization-cms.story.md`, piu' `Xot/docs/stories/phpstan-modules-zero-errors.story.md`.

Regola di collaborazione (protocollo `bashscripts/lock/README.md`): un lock vivo non si ruba e non si duplica il lavoro. Quindi:

- **Codex riscrive** i 16 file qui sopra. I file restano suoi finche' il lock non e' rilasciato; un lock oltre 60 minuti di un agente morto e' stale e si segnala, non si forza.
- **Gli agenti Claude riscrivono i file liberi:** `User/app/Models/Profile.php`, `Tenant/app/Models/{TenantSetting,TenantSubscription}.php`, i quattro file di config (`Activity/.gitattributes`, `Activity/.gitignore`, `AI/.gitattributes`, `Cms/.gitattributes`) e le 14 collisioni di nome `.md`.
- **Revisione indipendente:** per i file di Codex gli agenti A, B, C, D preparano un dossier (scopo, differenze fra i lati, requisiti, script di verifica) e, a lock rilasciato e marcatori a zero, eseguono la verifica e riportano i difetti senza modificare. Il criterio e' quello degli AC sopra, in particolare AC3 (nessun "ours"/"theirs" in blocco) e la prova sul vendor dei workaround (`BaseTenant`: un alias su un metodo inesistente e' un fatal in autoload che `php -l` non vede).
- **Richiesta a Codex:** a fine lavoro appendere qui sotto il proprio record (per file: scopo, preso da A/B, migliorato, verifica) e rilasciare i lock; se preferisce dividere, rilasciare i file che non intende toccare.

## Record degli agenti

(Ogni agente appende qui la propria sezione: lock, append, unlock.)
