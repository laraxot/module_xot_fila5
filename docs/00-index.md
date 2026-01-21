# 📚 **Indice Documentazione Modulo Xot (Core Engine)**

**Last Update**: 31 Gennaio 2026
**Status**: ✅ PHPStan Level 10 Compliant
**Module Version**: 3.0.0

## 🎯 **Lettura Essenziale**
1. [README.md](./README.md) - Panoramica del framework Laraxot.
2. [roadmap.md](./roadmap.md) - Evoluzione 2026: Laravel 12 & Stability.
3. [super-mucca-methodology.md](./super-mucca-methodology.md) - La filosofia di sviluppo del progetto.

## 🏛️ **Architettura Core**
- 📐 **[Architecture Complete Guide](./architecture-complete.md)** - Deep dive nel sistema modulare.
- 🧬 **[Base Classes (XotBase)](./xot-base-classes.md)** - Regole per estendere Resource, Page e Widget.
- ⚙️ **[Action Architecture](./action-service-provider-architecture.md)** - Pattern per Actions atomiche e testabili.
- 🧩 **[Service Providers](./service-provider-architecture.md)** - Ciclo di vita e boot dei moduli.

## 🏷️ **Naming & Quality Standards**
- 📜 **[PHPStan Code Quality Guide](./phpstan-code-quality-guide.md)** - La bibbia del Livello 10.
- 🚫 **[No Services Rule](./critical-no-services-rule.md)** - Perché usiamo Actions invece dei Service.
- 🗂️ **[Filament Class Extension Rules](./filament-class-extension-rules.md)** - Regole obbligatorie per Filament.

## 🛠️ **Utility & Trait**
- 🧬 **[Trait Patterns](./traits-complete-guide.md)** - HasTeams, HasXotTable e altri trait core.
- 🐚 **[Bashscripts Organization](./bashscripts-organization.md)** - Strumenti CLI per la manutenzione.
- 🚀 **[Safe Casting Actions](./safe-casting-actions.md)** - Gestione type-safe dei dati.

## 🧪 **Qualità e Testing**
- ✅ **[PHPStan Level 10 Status](./phpstan-level10-xot-fixes.md)** - Conformità e report.
- 🔬 **[Pest Testing Philosophy](./testing-philosophy-unified.md)** - Approccio al testing del core.

## 🧹 **Manutenzione**
- 🗑️ **[Cleanup Plan](./cleanup-action-plan.md)** - Strategia per gestire i 780+ documenti accumulati.

## 🔗 **Moduli Dipendenti**
- Tutti i moduli del sistema dipendono da **Xot**.

---
*Documentazione conforme agli standard Laraxot - DRY + KISS + SOLID*
# Xot Module Documentation Index

## Core Architecture
- [Architecture Complete Guide](./architecture-complete-2025.md)
- [PHPStan Code Quality Guide](./phpstan-code-quality-guide.md)
- [Filament Class Extension Rules](./filament-class-extension-rules.md)
- [Filament Extension Rules Implementation Report](./filament-extension-rules-implementation-report.md) - Report implementazione regole
- [Array Keys Filament Methods](./array-keys-filament-methods.md) - Regole obbligatorie chiavi array
- [Implementation Summary: Filament & PHPStan Fixes](./implementation_summary_filament_phpstan_fixes.md)
- [Filament Extension Violations Report](./filament_extension_violations.md)
- [Project Philosophy, Religion, Politics, Zen](./project-philosophy-religion-politics-zen.md)
- [Autonomous Priority Rule](./autonomous-priority-rule.md)

## Configuration & Services
- [MCP Configuration Optimized](./mcp-configuration-optimized.md)
- [Model Casting Rules](./model-casting-rules.md)
- [ServiceProvider Best Practices](./serviceprovider-best-practices.md)

## Development Guidelines
- [Super Cow Methodology](./super-cow-methodology.md)
- [PHP Quality Guide](./php-quality-guide.md)
- [GitHub Workflows Standard](./github-workflows-standard.md)

## Quality Analysis
- [Module Quality Analysis Summary](./module-quality-analysis-summary.md) - Cross-module quality metrics
- [PHPStan Analysis 2025-01-27](./phpstan-analysis-2025-01-27.md)
- [PHPStan Analysis 2025-12-17](./phpstan-analysis-2025-12-17.md)
- [PHPStan Analysis 2025-12-18](./phpstan-analysis-2025-12-18.md)
- [PHPStan Specific Patterns](./phpstan-specific-patterns.md)

## Quality & Improvement
- [Quality Improvements Summary 2025-11-18](./quality-improvements-summary-2025-11-18.md)
- [Laraxot Meetup Service Provider Refactor](./laraxot-meetup-service-provider-refactor.md)
- [PHPStan Fix Meetup Service Provider](./phpstan-fix-meetup-service-provider.md)

## Archives & References
- [Archive Directory](./archive/)
- [Consolidated Directory](./consolidated/)
- [Roadmap Directory](./roadmap/)

## Helper Documentation
- [Helpers Directory](./helpers/)

## Filament v4 Migration
- [Filament V4 Upgrade Notes](./filament-v4-upgrade-notes.md)
- [Widget Initialization Guide](./widgets-initialization.md)
- [Panel Provider Patterns](./panel-provider-patterns.md) - Pattern e best practices per Panel Providers

## Architectural Rules
- [Architectural Rules Directory](./architectural_rules/)
- [Laravel Modules Namespace Critical Rule](./laravel-modules-namespace-critical-rule.md) - ⚠️ REGOLA CRITICA: Namespace senza "app"

---
*Last updated: 2025-12-18*
