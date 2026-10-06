---
title: "PHPStan Level 10 — correzione fleet moduli"
type: story
module: Xot
epic: quality
story_id: "2026-10-06-phpstan-modules-level10"
status: in_progress
track: quality/phpstan
related:
  - ../../../../Rating/docs/bmad/stories/conflict-marker-resolution-phpstan-bootstrap-2026-10-06.story.md
  - ../../../../IndennitaCondizioniLavoro/docs/bmad/2026-10-06-phpstan-l10-fix.story.md
  - ../../../../User/docs/bmad/stories/phpstan-l10-user-lang-fix-20261006.story.md
---

# PHPStan Level 10 — correzione fleet moduli

## Obiettivo funzionale

Eseguire `cd laravel && ./vendor/bin/phpstan analyse Modules`, correggere le
cause reali preservando comportamento e contratti, quindi ripetere l'analisi
fino a completamento. I marker di merge nei file preesistenti sono blocker
sintattici, non il criterio funzionale del lavoro.

## Stato iniziale

- PHPStan si arresta in bootstrap con `syntax error, unexpected token "<<"`;
  nessuna lista completa di errori Level 10 è ancora disponibile.
- La verifica `php -l` individua marker in più file di
  `IndennitaCondizioniLavoro`; è presente anche un lock Rating attivo su
  `BaseRatingMorphPolicy.php` e quel file resta escluso finché il lock non è
  rilasciato dal proprietario.
- Worktree contiene modifiche preesistenti: ogni intervento mantiene entrambe
  le intenzioni funzionali, con lock per file e verifica mirata.
- La regola `committed-conflict-markers.md` richiede di verificare la storia
  pulita e ricostruire i conflitti annidati, non rimuovere marker in massa.
- Swarm gerarchico: `swarm-1791288373084-rtzmdd`; task indipendenti avviati
  in parallelo per IndennitaCondizioniLavoro, User, Rating e docs temi.

## Criteri di accettazione

- [ ] PHPStan Modules completa senza bootstrap failure.
- [ ] Tutte le segnalazioni prodotte sono corrette per causa, senza ignore o
  baseline aggiunti.
- [ ] Ogni file modificato supera `php -l`; test Pest pertinenti verdi (o skip
  documentato solo se host produzione).
- [ ] Story dei moduli interessati registra interventi, verifica ed esito.
- [ ] Second brain aggiornato con pattern/lezioni verificati e reindicizzato.

## Claim e coordinamento

| Ambito | Agente | File/story | Stato |
|---|---|---|---|
| IndennitaCondizioniLavoro | indennita-marker | marker sintattici, story modulo | in_progress |
| User | user-marker | marker sintattici, story modulo | in_progress |
| Rating | rating-marker | escluso il file con lock attivo | in_progress |
| Incentivi | incentivi-marker | marker in sorgenti modificati | in_progress |

## Diario

- 2026-10-06: avviata analisi; swarm gerarchico inizializzato.
- 2026-10-06: bootstrap PHPStan bloccato da marker preesistenti; richiesta e
  ottenuta autorizzazione a integrarli preservando modifiche esistenti.
