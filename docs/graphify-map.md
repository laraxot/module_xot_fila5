# Xot Module — Mappa Graphify

**Versione:** 1.0.0 | **Modulo:** Xot | **Data:** 2026-08-02

---

## 📌 Cosa fa il modulo Xot

Il modulo **Xot** gestisce:
- Modulo architetturale base del monorepo (Base Models, Base Actions, DTOs, Helpers, Service Providers)

---

## 🏗️ Architettura Essenziale

### Entry Points

| Tipo | Classe | Path |
|------|--------|------|
| **Model** | `BaseComment` | `app/Models/BaseComment.php` |
| **Model** | `PulseEntry` | `app/Models/PulseEntry.php` |
| **Model** | `XotBaseUuidModel` | `app/Models/XotBaseUuidModel.php` |
| **Model** | `InformationSchemaTable` | `app/Models/InformationSchemaTable.php` |
| **Action** | `GetViewAction` | `app/Actions/GetViewAction.php` |
| **Action** | `ConfigAction` | `app/Actions/ConfigAction.php` |
| **Action** | `GetModelTypeByModelAction` | `app/Actions/GetModelTypeByModelAction.php` |
| **Action** | `GetViewByClassAction` | `app/Actions/GetViewByClassAction.php` |
| **Filament** | `XotBaseMainPanelProvider` | `app/Filament/XotBaseMainPanelProvider.php` |
| **Filament** | `XotBasePanelProvider` | `app/Filament/XotBasePanelProvider.php` |
| **Filament** | `XotBaseColumnGroup` | `app/Filament/XotBaseColumnGroup.php` |

### Dependencies (Incoming)

```
Tutti i moduli → Xot (estensione di BaseModel e BaseAction)
```

### Dependencies (Outgoing)

```
Xot → Framework Laravel (kernel ed utilities)
```

---

## 📊 Grafo Locale (Query Rapide)

### Scoprire Entità Core

```bash
graphify query "Xot module models and actions"
```

### Tracciare Flussi

```bash
graphify path --from "BaseComment" --to "GetViewAction"
```

### Trovare Dipendenze

```bash
graphify query "Xot dependencies"
```

---

## 🎯 Task Comuni + Graphify

### Task 1: Estendere o Modificare Architettura Xot

**Domanda Graphify:**
```bash
graphify query "Xot module architecture and entry points"
```

**Workflow:**
1. Ispeziona classi in `app/Models` o `app/Actions`
2. Esegui query `graphify query "Xot dependencies"` per verificare impatto
3. Esegui test del modulo

---

## 📋 Test Coverage Map

```bash
graphify query "Xot module test coverage"
```

---

## 🚀 Comandi Rapidi

```bash
# Esplora architettura
graphify query "Xot module architecture"

# Test coverage
graphify query "Xot test coverage"

# Complexity
graphify query "Xot high complexity"
```

---

## 📚 Riferimenti

- **Graphify Central:** `docs/graphify-integration.md`
- **Module Discipline:** `docs/wiki/rules/module-naming-discipline.md`

---

**Responsabile:** @marco76tv | **Last updated:** 2026-08-02
