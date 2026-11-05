---
title: "Puntatore alla story canonica del contratto accessor gemello"
type: pointer
status: superseded
created: 2026-11-05
updated: 2026-11-05
tags: [bmad, eloquent, accessor, archive]
qmd: "accessor twin enforcement story superseded legacy pointer"
related:
  - ../bmad/stories/accessor-twin-contract-audit.story.md
---
# Story superata

Questo documento era un piano di enforcement incompleto, privo di frontmatter e
con conteggi/stati che non riflettono più il codice corrente. Il lavoro è ora
tracciato nella story BMAD canonica
[Audit e applicazione del contratto accessor gemello](../bmad/stories/accessor-twin-contract-audit.story.md)
e nella story owner Sigma collegata da essa.

Conservare questo puntatore per i riferimenti storici; non usarlo per decidere lo
stato dell'audit o il numero delle violazioni.

## Esito batch rest (agente completato, parziale)
- Corretti 10 file su 14 (22 accessor su 25). Lista in scritture: Job (Job, Task), Lang Post, Media (Media, MediaConvert), Notify (NotificationTemplate, NotifyTheme), Tenant, User HasProfilePhotoContract.
- Scelta: Post::getGuid(?string $title) riceve il titolo come parametro, perche' l'accessor persisteva il titolo quando mancava: un gemello senza argomenti perderebbe quel side effect. Da rivedere: il gemello con parametro non e' un getter puro.
- Saltati per lock di `codex-root` (task `accessor-twin-contract-audit`, 2026-11-05 09:32): User BaseUser, BaseUserUniqueNameAttribute, HasTeams, IsProfileTrait.
- ATTENZIONE: `codex-root` sta facendo un audit accessor-gemello in parallelo. Va coordinato via questa story prima di toccare i suoi file.
- Pest --filter=User: 1 passato, 1 fallito (AuthenticationTest users can logout, 403 invece di redirect). Non verificato se preesistente: nessuna baseline. Da verificare.

## Stato 2026-11-05 ~09:40 (dopo batch ir-inc-perf-rating parziale)
- Violazioni stretta: 215 -> 56 (check.py su laravel/Modules).
- Batch ptv-xot: parziale (3/12). Batch rest: 10/14. Batch ir-inc-perf-rating: parziale, Pest in corso (task by4bsn1ex).
- Batch sigma-a, sigma-b, ilc: in corso al momento della scrittura.

## Coordinamento e conflitti aperti
- Sessioni concorrenti con la stessa audit: `codex-root` e `codex-accessor-leaf` (task `accessor-twin-contract-audit`), piu' `claude-sigma-b` (task `sigma-b-accessor-twins`). Prima di toccare un file, controllare il lock.
- PROTOCOLLO VIOLATO: l'agente ir-inc-perf-rating ha modificato Incentivi/Models/Activity.php ed Employee.php mentre erano bloccati da `codex-accessor-leaf` (09:30:22). La modifica resta; il proprietario del lock va avvisato e deve confermarla o annullarla.
- Lock con proprietario ignoto (`unknown`) alle 09:31:42 su IndennitaCondizioniLavoro (IndennitaTipoDettaglioAnno, ServizioEsternoIndennitaTipoDettaglioPivot, IndennitaTipo, RelationshipTrait): possibili lock orfani, da verificare prima di rimuoverli.
- Lock sporchi di `codex-root` su file docs (Xot/docs/wiki/index.md, Sigma/docs/bmad/accessor-twin-method.md, Ptv/docs/bmad/accessor-twin-method.md, Xot/docs/wiki/rules/accessor-twin-method.md): non sono file di codice, vanno rilasciati dal proprietario.
- Decisione aperta: ManageProjectEmployees::getTableRecordTitle. Il nome collide con HasRecords di Filament. Serve un nome di gemello diverso o un'eccezione documentata.
- Decisione aperta: IndividualePesi (Performance) saltato per lock, da rieseguire.
