---
qmd: indice audit BMAD ECC tutti i moduli Laravel piano qualità PHPStan Pest
title: Indice audit BMAD ed ECC di tutti i moduli
status: in-progress
---

# Indice audit BMAD ed ECC di tutti i moduli

Pacchetto generato da inventario source-first. Ogni modulo ha un audit BMAD e un audit ECC; gli acceptance criteria restano aperti finché i gate non sono eseguiti per quel modulo.

- `Activity`: [audit](../../../Activity/docs/bmad/audits/activity-audit.md) · [ECC](../../../Activity/docs/ecc/activity-ecc-audit.md)
- `Incentivi`: [audit](../../../Incentivi/docs/bmad/audits/incentivi-audit.md) · [ECC](../../../Incentivi/docs/ecc/incentivi-ecc-audit.md)
- `IndennitaCondizioniLavoro`: [audit](../../../IndennitaCondizioniLavoro/docs/bmad/audits/indennitacondizionilavoro-audit.md) · [ECC](../../../IndennitaCondizioniLavoro/docs/ecc/indennitacondizionilavoro-ecc-audit.md)
- `IndennitaResponsabilita`: [audit](../../../IndennitaResponsabilita/docs/bmad/audits/indennitaresponsabilita-audit.md) · [ECC](../../../IndennitaResponsabilita/docs/ecc/indennitaresponsabilita-ecc-audit.md)
- `Job`: [audit](../../../Job/docs/bmad/audits/job-audit.md) · [ECC](../../../Job/docs/ecc/job-ecc-audit.md)
- `Lang`: [audit](../../../Lang/docs/bmad/audits/lang-audit.md) · [ECC](../../../Lang/docs/ecc/lang-ecc-audit.md)
- `Media`: [audit](../../../Media/docs/bmad/audits/media-audit.md) · [ECC](../../../Media/docs/ecc/media-ecc-audit.md)
- `Notify`: [audit](../../../Notify/docs/bmad/audits/notify-audit.md) · [ECC](../../../Notify/docs/ecc/notify-ecc-audit.md)
- `Pdnd`: [audit](../../../Pdnd/docs/bmad/audits/pdnd-audit.md) · [ECC](../../../Pdnd/docs/ecc/pdnd-ecc-audit.md)
- `Performance`: [audit](../../../Performance/docs/bmad/audits/performance-audit.md) · [ECC](../../../Performance/docs/ecc/performance-ecc-audit.md)
- `Progressioni`: [audit](../../../Progressioni/docs/bmad/audits/progressioni-audit.md) · [ECC](../../../Progressioni/docs/ecc/progressioni-ecc-audit.md)
- `Ptv`: [audit](../../../Ptv/docs/bmad/audits/ptv-audit.md) · [ECC](../../../Ptv/docs/ecc/ptv-ecc-audit.md)
- `Rating`: [audit](../../../Rating/docs/bmad/audits/rating-audit.md) · [ECC](../../../Rating/docs/ecc/rating-ecc-audit.md)
- `Sigma`: [audit](../../../Sigma/docs/bmad/audits/sigma-audit.md) · [ECC](../../../Sigma/docs/ecc/sigma-ecc-audit.md)
- `Tenant`: [audit](../../../Tenant/docs/bmad/audits/tenant-audit.md) · [ECC](../../../Tenant/docs/ecc/tenant-ecc-audit.md)
- `UI`: [audit](../../../UI/docs/bmad/audits/ui-audit.md) · [ECC](../../../UI/docs/ecc/ui-ecc-audit.md)
- `User`: [audit](../../../User/docs/bmad/audits/user-audit.md) · [ECC](../../../User/docs/ecc/user-ecc-audit.md)
- `Xot`: [audit](../../../Xot/docs/bmad/audits/xot-audit.md) · [ECC](../../../Xot/docs/ecc/xot-ecc-audit.md)

## Sequenza

1. P0 bootstrap/conflict/security.
2. P1 PHPStan, dominio, dati e tenancy.
3. P1 Pest e test di regressione.
4. P2 UI, performance, docs e legacy.
5. Review finale con output verificabili e aggiornamento QMD.
