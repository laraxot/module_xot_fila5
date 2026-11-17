---
qmd: indice audit BMAD ECC tutti i moduli Laravel piano qualità PHPStan Pest
title: Indice audit BMAD ed ECC di tutti i moduli
status: review
updated: 2026-11-16
---

# Indice audit BMAD ed ECC di tutti i moduli

Pack aggiornato source-first (2026-11-16): ogni modulo ha purpose, audit BMAD,
audit dettagliato, piano, story, ECC index + ECC audit. PHPStan `Modules` = 0 errori.

## Moduli (18)

| Modulo | BMAD audit | ECC | Piano |
|---|---|---|---|
| Activity | [audit](../../../Activity/docs/bmad/audit.md) | [ECC](../../../Activity/docs/ecc/activity-ecc-audit.md) | [piano](../../../Activity/docs/bmad/piano-miglioramento.md) |
| Incentivi | [audit](../../../Incentivi/docs/bmad/audit.md) | [ECC](../../../Incentivi/docs/ecc/incentivi-ecc-audit.md) | [piano](../../../Incentivi/docs/bmad/piano-miglioramento.md) |
| IndennitaCondizioniLavoro | [audit](../../../IndennitaCondizioniLavoro/docs/bmad/audit.md) | [ECC](../../../IndennitaCondizioniLavoro/docs/ecc/indennitacondizionilavoro-ecc-audit.md) | [piano](../../../IndennitaCondizioniLavoro/docs/bmad/piano-miglioramento.md) |
| IndennitaResponsabilita | [audit](../../../IndennitaResponsabilita/docs/bmad/audit.md) | [ECC](../../../IndennitaResponsabilita/docs/ecc/indennitaresponsabilita-ecc-audit.md) | [piano](../../../IndennitaResponsabilita/docs/bmad/piano-miglioramento.md) |
| Job | [audit](../../../Job/docs/bmad/audit.md) | [ECC](../../../Job/docs/ecc/job-ecc-audit.md) | [piano](../../../Job/docs/bmad/piano-miglioramento.md) |
| Lang | [audit](../../../Lang/docs/bmad/audit.md) | [ECC](../../../Lang/docs/ecc/lang-ecc-audit.md) | [piano](../../../Lang/docs/bmad/piano-miglioramento.md) |
| Media | [audit](../../../Media/docs/bmad/audit.md) | [ECC](../../../Media/docs/ecc/media-ecc-audit.md) | [piano](../../../Media/docs/bmad/piano-miglioramento.md) |
| Notify | [audit](../../../Notify/docs/bmad/audit.md) | [ECC](../../../Notify/docs/ecc/notify-ecc-audit.md) | [piano](../../../Notify/docs/bmad/piano-miglioramento.md) |
| Pdnd | [audit](../../../Pdnd/docs/bmad/audit.md) | [ECC](../../../Pdnd/docs/ecc/pdnd-ecc-audit.md) | [piano](../../../Pdnd/docs/bmad/piano-miglioramento.md) |
| Performance | [audit](../../../Performance/docs/bmad/audit.md) | [ECC](../../../Performance/docs/ecc/performance-ecc-audit.md) | [piano](../../../Performance/docs/bmad/piano-miglioramento.md) |
| Progressioni | [audit](../../../Progressioni/docs/bmad/audit.md) | [ECC](../../../Progressioni/docs/ecc/progressioni-ecc-audit.md) | [piano](../../../Progressioni/docs/bmad/piano-miglioramento.md) |
| Ptv | [audit](../../../Ptv/docs/bmad/audit.md) | [ECC](../../../Ptv/docs/ecc/ptv-ecc-audit.md) | [piano](../../../Ptv/docs/bmad/piano-miglioramento.md) |
| Rating | [audit](../../../Rating/docs/bmad/audit.md) | [ECC](../../../Rating/docs/ecc/rating-ecc-audit.md) | [piano](../../../Rating/docs/bmad/piano-miglioramento.md) |
| Sigma | [audit](../../../Sigma/docs/bmad/audit.md) | [ECC](../../../Sigma/docs/ecc/sigma-ecc-audit.md) | [piano](../../../Sigma/docs/bmad/piano-miglioramento.md) |
| Tenant | [audit](../../../Tenant/docs/bmad/audit.md) | [ECC](../../../Tenant/docs/ecc/tenant-ecc-audit.md) | [piano](../../../Tenant/docs/bmad/piano-miglioramento.md) |
| UI | [audit](../../../UI/docs/bmad/audit.md) | [ECC](../../../UI/docs/ecc/ui-ecc-audit.md) | [piano](../../../UI/docs/bmad/piano-miglioramento.md) |
| User | [audit](../../../User/docs/bmad/audit.md) | [ECC](../../../User/docs/ecc/user-ecc-audit.md) | [piano](../../../User/docs/bmad/piano-miglioramento.md) |
| Xot | [audit](../../../Xot/docs/bmad/audit.md) | [ECC](../../../Xot/docs/ecc/xot-ecc-audit.md) | [piano](../../../Xot/docs/bmad/piano-miglioramento.md) |

## Priorità cross-module (sintesi)

1. **P0 security:** Pdnd SSL/secrets; Media stream auth; User `canAccessPanel(access)`; Progressioni Compila/Ricalcola; Job policy create=true.
2. **P0 confini:** Ptv → Progressioni inverse deps; Sigma mutator write-on-read; Tenant isolation DB.
3. **P1 Actions>Services:** Pdnd 80 services, Xot RouteService, Performance CriteriValutazioneService, Job ScheduleService, UI stubs.
4. **P1 Rating dual-connection** leaf vs base.
5. **P2** i18n hardcoded, docs dedupe, Pest ambienti.

## Sequenza

1. Story P0 disgiunte per modulo (lock).
2. PHPStan già 0 su `Modules`.
3. Pest per modulo in testing non-prod.
4. Aggiornare ECC checklist con esiti reali + `qmd update`.
