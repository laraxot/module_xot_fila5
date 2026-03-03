# Product Roadmap - Xot Core Framework

## 🎯 Vision & Strategy
Xot is the foundational module of the Laraxot ecosystem. Its mission is to provide zero-cost abstractions that enforce architectural standards (XotBase, Actions-over-Services) while maximizing performance and type safety.

## 🗓️ Timeline

### Q1 2026: Consolidation (Current)
- **PHPStan Level 10 Compliance** - *Status: Shipped*
- **XotBase Resource Refactoring** - *Status: In Progress*
- **Documentation Standardization** - *Status: In Progress*

### Q2 2026: Modernization
- **Native Folio & Volt Support** - *Status: Planned*
- **Xot CLI for Module Scaffolding** - *Status: Planned*

## 🚦 Status Overview
| Feature | Status | Owner | Target Date |
| :--- | :--- | :--- | :--- |
| Core Abstractions | ✅ Stable | @CoreTeam | Feb 2026 |
| PDF Generation Action | ✅ Shipped | @CoreTeam | Jan 2026 |
| AI-Ready Scaffolding | 🏗️ In Dev | @AI-Agent | Apr 2026 |

### Fase 3: AI Core Integration (Future)
- [ ] **AI Code Reviewer**: Modello locale che verifica le regole Super Mucca prima del commit.
- [ ] **Self-Healing Base Classes**: Le classi base suggeriscono correzioni di tipo in base al PHPStan.
- [ ] **Cross-Module Dependency Resolver**: Visualizzazione grafica 3D delle dipendenze tra moduli core.

## ✅ Checklist Qualità
- [x] PHPStan Level 10.
- [ ] Zero dipendenze esterne non necessarie (Keep it Lean).
- [ ] 100% test coverage sui dispatcher di Actions.

---

**Ultimo aggiornamento**: 31 Gennaio 2026
# Roadmap Modulo Xot - Completamento e Miglioramenti

"Il motore che muove l'universo Quaeris."

## 🎯 Visione
Consolidare Xot come un framework "Zero-Config" per Laravel 12, dove ogni nuovo modulo eredita automaticamente sicurezza, internazionalizzazione, gestione temi e performance di alto livello tramite una semplice estensione di classi base.

## 🏗️ Fasi di Sviluppo

### Fase 1: Framework Stabilization (Completed)
- [x] PHPStan Level 10 Compliance as standard.
- [x] Recursive documentation cleanup and standardization.
- [x] GitHub Action automation for Quality Check and Releases.

### Fase 2: Developer Happiness (In Progress)
- [ ] Refactoring di \`XotBaseServiceProvider\` per supportare il boot asincrono.
- [ ] Piena compatibilità con **Filament v5 Plugins**.
- [ ] **Master-Detail Evolution**: Refactor di \`XotBaseManageRelatedRecords\` per supportare Infolist header e form unificati (vedi [filament/xot-base-manage-related-records-evolution.md](filament/xot-base-manage-related-records-evolution.md)).
- [ ] **Xot CLI**: Comandi Artisan per generare moduli conformi in 1 secondo (Super Mucca compliant).
- [ ] **Trait Auditor**: Tool che rileva collisioni di nomi nei Trait a tempo di build.
- [ ] Miglioramento della `XotBasePage` per supportare Folio + Volt in modo nativo.

### Fase 3: AI Core Integration (Future)
- [ ] **AI Code Reviewer**: Modello locale che verifica le regole Super Mucca prima del commit.
- [ ] **Self-Healing Base Classes**: Le classi base suggeriscono correzioni di tipo in base al PHPStan.
- [ ] **Cross-Module Dependency Resolver**: Visualizzazione grafica 3D delle dipendenze tra moduli core.

## ✅ Checklist Qualità
- [x] PHPStan Level 10.
- [ ] Zero dipendenze esterne non necessarie (Keep it Lean).
- [ ] 100% test coverage sui dispatcher di Actions.

---
**Ultimo aggiornamento**: 31 Gennaio 2026
