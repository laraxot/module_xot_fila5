# 🐃 **Metodologia Super Mucca: AI-Native Edition**

**Ultimo aggiornamento**: 31 Gennaio 2026  
**Filosofia**: DRY + KISS + SOLID + ROBUST

Questa metodologia descrive uno standard di lavoro per l'AI che deve agire come membro del team e seguire regole documentate e verificabili.

## 🚀 **AI-Native Standards**

### 1. **Context-First Development**
Ogni interazione con l'AI deve iniziare con l'acquisizione del contesto tramite gli strumenti MCP disponibili:
- **Schema DB**: ispezionare lo schema prima di proporre modelli o migrazioni.
- **Verifica logiche**: validare le logiche complesse con strumenti di esecuzione controllata.
- **Linee guida**: rispettare le regole locali documentate nelle cartelle `docs/`.

### 2. **No services, Only Actions**
Quando il progetto adotta il pattern **Action**, ogni Action deve essere:
- **Atomica**: Una sola responsabilità.
- **Queueable**: Estendere `Spatie\QueueableAction\QueueableAction`.
- **Testabile**: Ogni Action deve avere un test Pest dedicato.

### 3. **Documentation as Code**
La documentazione non è opzionale. Ogni nuovo modulo deve generare:
- `00-index.md`: Punto di ingresso.
- `roadmap.md`: Visione futura.
- `tasks/`: Task atomici per l'evoluzione.
L'AI deve usare strumenti di validazione per assicurarsi che i link tra i documenti siano validi (DRY).

## 🛠️ **Workflow operativo**

1. **Analizza**: usa gli strumenti disponibili per capire dove inserire la nuova feature.
2. **Pianifica**: crea un `implementation_plan.md` che faccia riferimento allo schema DB osservato.
3. **Implementa**: scrivi codice compatibile con il livello PHPStan richiesto dal progetto.
4. **Verifica**: esegui i test disponibili e registra gli errori in modo tracciabile.

---
*Documentazione conforme agli standard Laraxot - L'eccellenza è un'abitudine.*
# 🐄 Metodologia "Super Mucca"

**Ultimo aggiornamento**: 31 Gennaio 2026  
**Filosofia**: DRY + KISS + SOLID + ROBUST

Questa metodologia descrive uno standard di lavoro per l'AI che deve agire come membro del team e seguire regole documentate e verificabili.

## 🚀 **AI-Native Standards**

### 1. **Context-First Development**
Ogni interazione con l'AI deve iniziare con l'acquisizione del contesto tramite gli strumenti MCP disponibili:
- **Schema DB**: ispezionare lo schema prima di proporre modelli o migrazioni.
- **Verifica logiche**: validare le logiche complesse con strumenti di esecuzione controllata.
- **Linee guida**: rispettare le regole locali documentate nelle cartelle `docs/`.

### 2. **No services, Only Actions**
Quando il progetto adotta il pattern **Action**, ogni Action deve essere:
- **Atomica**: Una sola responsabilità.
- **Queueable**: Estendere `Spatie\QueueableAction\QueueableAction`.
- **Testabile**: Ogni Action deve avere un test Pest dedicato.

### 3. **Documentation as Code**
La documentazione non è opzionale. Ogni nuovo modulo deve generare:
- `00-index.md`: Punto di ingresso.
- `roadmap.md`: Visione futura.
- `tasks/`: Task atomici per l'evoluzione.
L'AI deve usare strumenti di validazione per assicurarsi che i link tra i documenti siano validi (DRY).

## 🛠️ **Workflow operativo**

1. **Analizza**: usa gli strumenti disponibili per capire dove inserire la nuova feature.
2. **Pianifica**: crea un `implementation_plan.md` che faccia riferimento allo schema DB osservato.
3. **Implementa**: scrivi codice compatibile con il livello PHPStan richiesto dal progetto.
4. **Verifica**: esegui i test disponibili e registra gli errori in modo tracciabile.

---
*Documentazione conforme agli standard Laraxot - L'eccellenza è un'abitudine.*
# 🐄 Metodologia "Super Mucca"

**Ultimo aggiornamento**: 31 Gennaio 2026  
**Filosofia**: DRY + KISS + SOLID + ROBUST

Questa metodologia descrive uno standard di lavoro per l'AI che deve agire come membro del team e seguire regole documentate e verificabili.

## 🚀 **AI-Native Standards**

### 1. **Context-First Development**
Ogni interazione con l'AI deve iniziare con l'acquisizione del contesto tramite gli strumenti MCP disponibili:
- **Schema DB**: ispezionare lo schema prima di proporre modelli o migrazioni.
- **Verifica logiche**: validare le logiche complesse con strumenti di esecuzione controllata.
- **Linee guida**: rispettare le regole locali documentate nelle cartelle `docs/`.

### 2. **No services, Only Actions**
Quando il progetto adotta il pattern **Action**, ogni Action deve essere:
- **Atomica**: Una sola responsabilità.
- **Queueable**: Estendere `Spatie\QueueableAction\QueueableAction`.
- **Testabile**: Ogni Action deve avere un test Pest dedicato.

### 3. **Documentation as Code**
La documentazione non è opzionale. Ogni nuovo modulo deve generare:
- `00-index.md`: Punto di ingresso.
- `roadmap.md`: Visione futura.
- `tasks/`: Task atomici per l'evoluzione.
L'AI deve usare strumenti di validazione per assicurarsi che i link tra i documenti siano validi (DRY).

## 🛠️ **Workflow operativo**

1. **Analizza**: usa gli strumenti disponibili per capire dove inserire la nuova feature.
2. **Pianifica**: crea un `implementation_plan.md` che faccia riferimento allo schema DB osservato.
3. **Implementa**: scrivi codice compatibile con il livello PHPStan richiesto dal progetto.
4. **Verifica**: esegui i test disponibili e registra gli errori in modo tracciabile.

---
*Documentazione conforme agli standard Laraxot - L'eccellenza è un'abitudine.*
# 🐄 Metodologia "Super Mucca"

## Filosofia

La metodologia "Super Mucca" è un approccio sistematico allo sviluppo che enfatizza:
- **Autonomia decisionale**: L'AI sceglie sempre autonomamente le priorità
- **Analisi profonda**: Comprensione completa del contesto prima di agire
- **Documentazione continua**: Le cartelle `docs` sono la memoria viva del sistema
- **Qualità maniacale**: PHPStan livello 10, DRY + KISS, Clean Code

## Principi Fondamentali

### 1. Comprensione del Contesto (Filosofia Laraxot)
- **Analisi Profonda**: Prima di agire, analizza a fondo il codice e le cartelle `docs`
- **Focus sul "Perché"**: Concentrati sempre sul motivo della richiesta, non solo sull'implementazione letterale
- **Business Logic**: Comprendi la logica, la filosofia, lo zen, la business logic e lo scopo del progetto
- **Principi Guida**: Applica sempre DRY, KISS e scrivi Clean Code

### 2. Gestione della Documentazione (`docs`)
- La cartella `docs` è la tua memoria. Studiala e aggiornala continuamente
- Puoi creare file `.md` **solo** dentro le cartelle `docs` esistenti
- **Convenzioni di Naming**: I nomi dei file `.md` non devono contenere date o caratteri maiuscoli, ad eccezione di `README.md` e `CHANGELOG.md`
- Prima di creare un nuovo file, verifica che non esista già un documento sullo stesso argomento

### 3. Processo di Sviluppo e Correzione

**⚠️ REGOLA FONDAMENTALE**: Prima di ogni azione, seguire sempre: Studio Docs → Aggiorna Docs → Scegli Soluzione Intelligente → Implementa → Verifica → Aggiorna Docs

Vedi [Intelligent Solution Rule](./intelligent-solution-rule.md) per dettagli completi.

#### Fase 1: Analisi e Studio (Studio Attento delle Docs)
1. **📚 STUDIO ATTENTO DELLE DOCS**: Leggi approfonditamente `Modules/{Modulo}/docs/` + `Themes/{Tema}/docs/`
2. Comprendi il contesto come descritto nel punto 1
3. Studia la logica, la filosofia, la business logic, lo scopo
4. Identifica tutti i problemi presenti
5. Scegli autonomamente la priorità (vedi [Autonomous Priority Rule](./autonomous-priority-rule.md))

#### Fase 2: Aggiorna `docs` (PRIMA di Implementare)
1. **✍️ AGGIORNA DOCS PRIMA DI IMPLEMENTARE**: Documenta ciò che stai per fare
2. Aggiorna la documentazione esistente se necessario
3. Crea nuovi documenti solo se non esistono già
4. Crea pattern riusabili se identificati

#### Fase 3: Scegli Soluzione Intelligente
1. **🧠 SCEGLI LA SOLUZIONE PIÙ INTELLIGENTE E PROFESSIONALE**: Valuta tutte le opzioni possibili
2. Scegli autonomamente la priorità
3. Applica principi DRY + KISS + SOLID
4. Considera impatti a lungo termine

#### Fase 4: Implementa
1. **⚙️ IMPLEMENTA**: Scrivi il codice o la correzione
2. Segui sempre PHPStan livello 10
3. Applica principi DRY + KISS
4. Mantieni Clean Code

#### Fase 5: Verifica e Controlla
1. **✅ VERIFICA E CONTROLLA**: Esegui i test necessari
2. Controlla ogni file modificato con `phpstan` (livello 10)
3. Controlla con `phpmd` e `phpinsights`
4. Verifica che tutto funzioni correttamente

#### Fase 6: Migliora e Rifinisci
1. Rivedi il tuo lavoro per migliorarlo
2. Applica refactoring se necessario
3. Ottimizza il codice

#### Fase 7: Aggiorna `docs` di Nuovo
1. **📝 AGGIORNA DOCS DI NUOVO**: Finalizza la documentazione con i dettagli dell'implementazione
2. Documenta decisioni prese e pattern applicati
3. Aggiorna indici e riferimenti
4. Verifica link relativi
3. Verifica conformità PSR-12
4. Controlla implicazioni di sicurezza

#### Fase 5: Migliora e Rifinisci
1. Rivedi il tuo lavoro per migliorarlo
2. Elimina codice duplicato
3. Semplifica dove possibile
4. Verifica che tutto sia coerente

#### Fase 6: Aggiorna `docs` di nuovo
1. Finalizza la documentazione con i dettagli dell'implementazione
2. Documenta decisioni e motivazioni
3. Aggiorna collegamenti bidirezionali

### 4. Organizzazione degli Script
- Tutti gli script `.sh` o `.py` devono essere categorizzati e posizionati in una sottocartella appropriata di `bashscripts`

## Workflow Completo

```
┌─────────────────────────────────────┐
│  1. ANALISI PROFONDA                 │
│     - Studia docs/                   │
│     - Comprendi business logic       │
│     - Identifica problemi            │
└──────────────┬──────────────────────┘
               │
               ▼
┌─────────────────────────────────────┐
│  2. SCELTA PRIORITÀ AUTONOMA        │
│     - Valuta impatto e urgenza      │
│     - Ordina per priorità           │
│     - Comunica razionale            │
└──────────────┬──────────────────────┘
               │
               ▼
┌─────────────────────────────────────┐
│  3. AGGIORNA DOCS (PRIMA)           │
│     - Documenta piano d'azione      │
│     - Aggiorna documentazione       │
└──────────────┬──────────────────────┘
               │
               ▼
┌─────────────────────────────────────┐
│  4. IMPLEMENTA                      │
│     - PHPStan livello 10            │
│     - DRY + KISS                    │
│     - Clean Code                    │
└──────────────┬──────────────────────┘
               │
               ▼
┌─────────────────────────────────────┐
│  5. VERIFICA                        │
│     - PHPStan                       │
│     - Test                          │
│     - Qualità codice                │
└──────────────┬──────────────────────┘
               │
               ▼
┌─────────────────────────────────────┐
│  6. MIGLIORA                        │
│     - Refactoring                   │
│     - Ottimizzazioni                │
└──────────────┬──────────────────────┘
               │
               ▼
┌─────────────────────────────────────┐
│  7. AGGIORNA DOCS (DOPO)           │
│     - Finalizza documentazione     │
│     - Documenta decisioni          │
└─────────────────────────────────────┘
```

## Regole Critiche

### ✅ SEMPRE
- Scegli autonomamente la priorità
- Analizza profondamente prima di agire
- Aggiorna docs prima e dopo ogni modifica
- Verifica PHPStan livello 10
- Applica DRY + KISS
- Documenta decisioni e motivazioni

### ❌ MAI
- Chiedere all'utente quale priorità scegliere
- Procedere senza analisi del contesto
- Modificare codice senza aggiornare docs
- Ignorare errori PHPStan
- Duplicare codice o logica
- Complicare inutilmente

## Esempi Pratici

### Esempio 1: Risoluzione Conflitti Git
```
1. ANALISI: Identifico conflitti Git nel README.md
2. PRIORITÀ: 🔴 CRITICO (blocca documentazione)
3. DOCS: Documento il problema e il piano di risoluzione
4. IMPLEMENTA: Risolvo manualmente i conflitti mantenendo versione più completa
5. VERIFICA: Controllo che il file sia leggibile e completo
6. MIGLIORA: Rimuovo duplicazioni e miglioro struttura
7. DOCS: Aggiorno documentazione con dettagli della risoluzione
```

### Esempio 2: Correzione Import
```
1. ANALISI: Identifico uso di FQN invece di import
2. PRIORITÀ: 🟠 ALTO (viola convenzioni PSR)
3. DOCS: Verifico documentazione esistente su convenzioni
4. IMPLEMENTA: Aggiungo import corretto e rimuovo FQN
5. VERIFICA: PHPStan livello 10, controllo lint
6. MIGLIORA: Verifico che non ci siano altri casi simili
7. DOCS: Aggiorno se necessario con best practices
```

## Collegamenti

- [Intelligent Solution Rule](./intelligent-solution-rule.md) - **REGOLA FONDAMENTALE**: Studio Docs → Aggiorna Docs → Scegli Soluzione Intelligente → Implementa → Verifica → Aggiorna Docs
- [Autonomous Priority Rule](./autonomous-priority-rule.md)
- [Laraxot Architecture Rules](./laraxot_architecture_rules.md)
- [Code Quality Rules](./code-quality.md)

---

**🔄 Ultimo aggiornamento**: Gennaio 2025
**📦 Versione**: 1.0.0
**🐄 Metodologia**: Super Mucca ✅
# 🐄 Metodologia "Super Mucca"

**Ultimo aggiornamento**: 31 Gennaio 2026  
**Filosofia**: DRY + KISS + SOLID + ROBUST

Questa metodologia descrive uno standard di lavoro per l'AI che deve agire come membro del team e seguire regole documentate e verificabili.

## 🚀 **AI-Native Standards**

### 1. **Context-First Development**
Ogni interazione con l'AI deve iniziare con l'acquisizione del contesto tramite gli strumenti MCP disponibili:
- **Schema DB**: ispezionare lo schema prima di proporre modelli o migrazioni.
- **Verifica logiche**: validare le logiche complesse con strumenti di esecuzione controllata.
- **Linee guida**: rispettare le regole locali documentate nelle cartelle `docs/`.

### 2. **No services, Only Actions**
Quando il progetto adotta il pattern **Action**, ogni Action deve essere:
- **Atomica**: Una sola responsabilità.
- **Queueable**: Estendere `Spatie\QueueableAction\QueueableAction`.
- **Testabile**: Ogni Action deve avere un test Pest dedicato.

### 3. **Documentation as Code**
La documentazione non è opzionale. Ogni nuovo modulo deve generare:
- `00-index.md`: Punto di ingresso.
- `roadmap.md`: Visione futura.
- `tasks/`: Task atomici per l'evoluzione.
L'AI deve usare strumenti di validazione per assicurarsi che i link tra i documenti siano validi (DRY).

## 🛠️ **Workflow operativo**

1. **Analizza**: usa gli strumenti disponibili per capire dove inserire la nuova feature.
2. **Pianifica**: crea un `implementation_plan.md` che faccia riferimento allo schema DB osservato.
3. **Implementa**: scrivi codice compatibile con il livello PHPStan richiesto dal progetto.
4. **Verifica**: esegui i test disponibili e registra gli errori in modo tracciabile.

---
*Documentazione conforme agli standard Laraxot - L'eccellenza è un'abitudine.*

---
## Merged from super-mucca-methodology-.md

# Metodologia Super Mucca - Guida Completa 2026

**Data**: 2026-01-09  
**Filosofia**: DRY + KISS + SOLID + Robust + Laravel 12 + Filament 4 + PHP 8.3

---

## 🎯 Principi Fondamentali

### 1. Aumenta al Massimo la Confidenza
- **Studia prima di agire**: Analizza a fondo codice e documentazione
- **Comprendi il "Perché"**: Non solo implementazione, ma logica e filosofia
- **Focus sul contesto**: Business logic, scopo, architettura

### 2. Docs come Bibbia
- **Memoria viva del sistema**: Le cartelle `docs` sono la fonte di verità
- **Studia prima**: Leggi `Modules/{Modulo}/docs/` prima di modificare
- **Aggiorna dopo**: Documenta ogni modifica nelle `docs`

### 3. Workflow Modulo per Modulo
- **Un modulo alla volta**: Completa tutti gli errori prima di passare al successivo
- **Verifica continua**: PHPStan, PHPMD, PHPInsights dopo ogni batch
- **Commit incrementali**: Git commit dopo ogni modulo completato

---

## 📚 Best Practices Studiate (2026)

### Schema.org
- **Structured Data**: Implementare JSON-LD per SEO e semantic web
- **Pattern**: Trait `HasSchemaOrg` per modelli
- **Target**: Event, Organization, Person, BreadcrumbList

### PHPStan Level 10
- **Type Safety**: Zero compromessi, zero baseline
- **Pattern**: Type narrowing con `Webmozart\Assert\Assert`
- **Generics**: `Collection<int, Model>` invece di `Collection<mixed>`

### PHPMD
- **Code Quality**: Violations < 5 per modulo
- **Design Patterns**: Evitare static access, boolean flags
- **Naming**: CamelCase, nomi descrittivi (min 3 caratteri)

### PHPInsights
- **Target Score**: > 90% per tutti i moduli
- **Architecture**: > 80% (attualmente 47.1% - critico)
- **Complexity**: > 90% (attualmente 91.7% - eccellente)

### Pest Testing
- **Coverage**: > 80% per moduli core
- **Business Logic**: 100% coverage
- **Pattern**: Test descrittivi, organizzati per feature

---

## 🔧 Processo di Sviluppo

### Workflow Completo Super Mucca

1. **📚 STUDIO ATTENTO DELLE DOCS**
   - Leggi `Modules/{Modulo}/docs/` + `Themes/{Tema}/docs/`
   - Studia logica, filosofia, business logic, scopo
   - Comprendi il contesto completo

2. **✍️ AGGIORNA DOCS PRIMA DI IMPLEMENTARE**
   - Documenta ciò che stai per fare
   - Aggiorna documentazione esistente se necessario
   - Crea pattern riusabili se identificati

3. **🧠 SCEGLI LA SOLUZIONE PIÙ INTELLIGENTE**
   - Valuta tutte le opzioni possibili
   - Scegli autonomamente la priorità
   - Applica principi DRY + KISS + SOLID

4. **⚙️ IMPLEMENTA**
   - Scrivi il codice o la correzione
   - Segui sempre PHPStan livello 10
   - Applica principi DRY + KISS

5. **✅ VERIFICA E CONTROLLA**
   - PHPStan livello 10: `./vendor/bin/phpstan analyse Modules/{ModuleName} --level=10`
   - PHPMD: `./vendor/bin/phpmd Modules/{ModuleName} text codesize,design`
   - PHP Insights: `./vendor/bin/phpinsights analyse Modules/{ModuleName}`
   - Lint: Verifica formattazione

6. **📝 AGGIORNA DOCS DI NUOVO**
   - Finalizza documentazione con dettagli implementazione
   - Documenta decisioni prese e pattern applicati
   - Aggiorna indici e riferimenti

7. **🔄 GIT COMMIT E PUSH**
   - Commit dopo ogni modulo completato
   - Messaggi descrittivi
   - Non tornare indietro (solo forward)

---

## 🚨 Regole Critiche

### Property Exists - REGOLA ASSOLUTA
```php
// ❌ ERRATO
if (property_exists($model, 'attribute')) {
    $value = $model->attribute;
}

// ✅ CORRETTO
if (isset($model->attribute)) {
    $value = $model->attribute;
}
```

### Mixed Type - Solo Ultima Spiaggia
```php
// ❌ EVITARE
/** @var mixed $value */

// ✅ PREFERIRE
/** @var string|int|null $value */
// O
use Webmozart\Assert\Assert;
Assert::string($value);
```

### Filament Class Extension - REGOLA ASSOLUTA
```php
// ❌ VIETATO
class MyResource extends Resource { }

// ✅ CORRETTO
class MyResource extends XotBaseResource { }
```

### No Controller
- **Backoffice**: Filament
- **Frontoffice**: Folio + Volt
- **NO controller**: Non usiamo controller

### Test in Pest
- **Tutti i test**: Devono essere in Pest
- **Coverage**: > 80% per moduli core

---

## 📋 Convenzioni Naming

### File `.md`
- ✅ **Minuscolo**: `code-quality-guide.md`
- ✅ **Eccezioni**: `README.md`, `CHANGELOG.md`
- ❌ **Vietato**: Date nei nomi, maiuscole, underscore

### Cartelle `docs`
- ✅ **Solo minuscolo**: `docs/`, `docs/best-practices/`
- ❌ **Vietato**: Maiuscole, date, caratteri speciali

### Link
- ✅ **Relativi**: `../other-module/docs/guide.md`
- ❌ **Assoluti**: `/var/www/...`

---

## 🎯 Metriche Target

| Strumento | Target | Status Attuale |
|-----------|--------|----------------|
| PHPStan L10 | 0 errori | ✅ Raggiunto |
| PHPMD Violations | < 5/modulo | ⚠️ 11 (accettabile) |
| PHPInsights Code | > 90% | ⚠️ 75.3% |
| PHPInsights Architecture | > 80% | ❌ 47.1% (critico) |
| PHPInsights Complexity | > 90% | ✅ 91.7% |
| Test Coverage | > 80% | 🔄 In corso |

---

## 📚 Risorse di Riferimento

### Documentazione
- [Schema.org](https://schema.org/) - Structured data
- [PHPStan](https://phpstan.org/) - Static analysis
- [PHPMD](https://phpmd.org/) - Code quality
- [PHPInsights](https://phpinsights.com/) - Quality metrics
- [Pest](https://pestphp.com/) - Testing framework
- [Filament](https://filamentphp.com/docs) - Admin panel
- [Laravel Modules](https://laravelmodules.com/) - Modular architecture
- [Laravel 12](https://laravel.com/docs/12.x) - Framework

### Community
- [Laravel News](https://laravel-news.com/)
- [Laravel Daily](https://laraveldaily.com/)
- [Dev.to Laravel](https://dev.to/t/laravel)
- [Beyond CRUD](https://beyond-crud.stitcher.io/)

---

## ✅ Checklist Pre-Lavoro

- [ ] Ho aumentato al massimo il mio livello di confidenza?
- [ ] Ho studiato le cartelle docs del modulo interessato?
- [ ] Ho capito la logica, la filosofia, lo scopo?
- [ ] Ho verificato che non esista già documentazione sull'argomento?
- [ ] Ho verificato le convenzioni naming (minuscolo, no date)?

---

## ✅ Checklist Post-Lavoro

- [ ] PHPStan livello 10 senza errori?
- [ ] PHPMD senza errori critici?
- [ ] PHP Insights score > 80%?
- [ ] Documentazione aggiornata?
- [ ] Git commit e push eseguiti?
- [ ] Link relativi verificati (no path assoluti)?

---

**Status**: ✅ **DOCUMENTAZIONE COMPLETA**

**Ultimo aggiornamento**: 2026-01-09

