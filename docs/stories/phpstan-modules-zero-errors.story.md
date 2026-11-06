---
title: PHPStan zero errori sui moduli
type: story
status: in-progress
updated: 2026-11-06
---

# Scopo

Portare il controllo PHPStan dei moduli a esito positivo correggendo le cause
di dominio e mantenendo i contratti Laraxot, senza soppressioni, baseline
artificiali o modifiche a phpstan.neon.

## Criteri di accettazione

- [ ] Ogni collisione viene riscritta in una versione coerente del file completo.
- [ ] Ogni errore PHPStan viene corretto alla sorgente, non nascosto.
- [ ] Ogni modulo e tema modificato supera i gate locali.
- [ ] Ogni repository proprietario viene commitato, sincronizzato e verificato.
- [ ] La documentazione resta semanticamente organizzata e usa nomi Markdown
  stabili, senza date o timestamp nel nome.

## Ricomposizione delle collisioni

Il precedente merge aveva duplicato trait, import e relazioni nei modelli User.
La ricomposizione corrente mantiene le trait relazionali dinamiche basate su
XotData, conserva HasUuids, HasSlug e i contratti del modello tenant, elimina
duplicazioni e non copia meccanicamente una delle due versioni.

Sono stati ricomposti anche gli indici e le story documentali di AI e CMS:
le voci duplicate e i riferimenti datati vengono consolidati in riferimenti
stabili.

## Stato verificato

- SVG nei moduli e temi: XML valido, nessun marker Git o pointer LFS.
- Marker di conflitto PHP nei modelli User: rimossi dopo ricomposizione.
- PHPStan: il bootstrap è ripristinato; restano errori reali e dipendenze
  non allineate, quindi la story non è ancora completa.
- Il package laravel/head è dichiarato da CMS ma non è presente nel lock/vendor.
  Filament e Livewire risultano inoltre non allineati tra composer.json e lock.

## Metodo operativo

Prima di ogni modifica: lock del file, studio dei chiamanti e delle trait,
verifica della storia Git e della documentazione del modulo. Dopo ogni modifica:
php -l, PHPStan mirato, gate qualità disponibili, unlock, commit e push del
repository proprietario. Non usare reset, restore, revert o force push.
