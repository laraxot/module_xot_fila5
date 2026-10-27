---
title: "Continuazione 2026-10-21 — non perdere nulla"
type: memory
status: active
updated: 2026-10-21
tags: [continuation, tomorrow, bmad, second-brain, checklist]
---
# Come riprendere domani (non perdere nulla)

**Cosa è già fatto (verificabile)**:
- 3 memorie: `phpstan-agent-config-per-module.md`, `source-first-before-fix.md`, `no-date-in-docs-filenames.md`
- Standing order pilastri 11-14 + hook (`agent-standing-order.sh`)
- `.cursor/rules/phpstan-agent-config.mdc`, `.cursor/rules/no-date-docs-filenames.mdc`
- Campaign story `phpstan-docs-prompts-campaign.story.md` aggiornata con bg_198 exit=0 + JS Alpine + DB remote
- 11-phpstan.md aggiornato con lezioni 2026-10-21
- 37 `.md` rinominati (no date); prompts audit (89 file, zero date nel nome)
- Fix concreti: EnteMatr DRY, FunctionExtra (`normalizeRowList`), Asz00f (`scopeOfYear` Builder<static>), User seeders (`?Command`), MassExtra (subagent exit 0), Ptv UpdateQuota, SqlUpload
- Vite installato (`npm install`, `laravel/node_modules/.bin/vite` v6.4.5); `npm run build` avviato
- DB: `DB_HOST=10.100.200.53` (remoto); ruoli utente esistono; `roles` table assente locale (documentato)

**Cosa resta per domani (in ordine non sequenziale — swarm)**:
1. Verificare se `bg_200` (o successivo loop) completa `Progressioni` trait generics — documentare varianza, non inventare generics falsi.
2. Se full-tree PHPStan ancora timeout, documentare in `docs/coverage.md` per il modulo; non dichiarare zero senza prova.
3. Correggere il `label: null` Alpine nel nav: verificare che tutti i moduli abbiano `config/config.php` con `navigation_sort` e `icon`; se qualche modulo manca il config, aggiungerlo oppure filtrare in `GetModulesNavigationItems` con guardia non-null.
4. Assicurare che `AdminPanelProvider` di ogni modulo registri correttamente le risorse (alcuni potrebbero avere `discoverModuleComponents = true` ma file in `app/Filament/Resources` non caricate per namespace errato).
5. Aggiornare la memoria `swarm-subagents-parallel-standing-order.md` se nuovi blocchi rate-limit si verificano.
6. Chiusura BMAD per il modulo con la story aggiornata (`bg_198` exit=0 come prova sui file toccati).

**Non dimenticare**:
- `phpstan.agent.<Mod>.neon` con tmpDir isolato per ogni verifica.
- Source-first: leggere il codice, capire lo scopo, correggere la causa.
- Mixed = ultima spiaggia; mai `@phpstan-ignore` per bug reale.
- Nessuna data nel nome file; coppie `-audit.md` non si cancellano.
- Sempre BMAD + second brain + lock prima di edit condiviso.
