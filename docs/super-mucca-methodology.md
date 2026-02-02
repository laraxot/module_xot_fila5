# 🐃 **Metodologia Super Mucca: AI-Native Edition**

**Last Update**: 31 Gennaio 2026
**Philosophy**: DRY + KISS + SOLID + **BOOSTED**

In questa versione evoluta, integriamo il supporto nativo per gli strumenti di intelligenza artificiale (Windsurf, Cursor, Claude) tramite l'architettura **Laravel Boost**. L'AI non è solo un assistente, ma un membro del team che segue rigorosamente questi standard.

## 🚀 **AI-Native Standards**

### 1. **Context-First Development**
Ogni interazione con l'AI deve iniziare con l'acquisizione del contesto tramite **Boost MCP**:
- **Database Schema**: L'AI deve ispezionare `boost:database-schema` prima di proporre modelli o migrazioni.
- **Tinker Verification**: Le logiche complesse devono essere validate tramite `boost:tinker` eseguendo snippet di prova nel contesto reale.
- **Guidelines**: L'AI deve rispettare le linee guida definite in `resources/boost/skills/`.

### 2. **No services, Only Actions (Boosted)**
L'AI deve sapere che in questo progetto usiamo il pattern **Action**. Ogni Action deve essere:
- **Atomica**: Una sola responsabilità.
- **Queueable**: Estendere `Spatie\QueueableAction\QueueableAction`.
- **Testabile**: Ogni Action deve avere un test Pest dedicato.

### 3. **Documentation as Code**
La documentazione non è opzionale. Ogni nuovo modulo deve generare:
- `00-index.md`: Punto di ingresso.
- `roadmap.md`: Visione futura.
- `tasks/`: Task atomici per l'evoluzione.
L'AI deve usare `boost:mcp` per assicurarsi che i link tra i documenti siano validi (DRY).

## 🛠️ **Boost Workflow**

1.  **Analizza**: Usa `boost:route-inspector` e `boost:application-info` per capire dove inserire la nuova feature.
2.  **Pianifica**: Crea un `implementation_plan.md` che faccia riferimento allo schema DB rilevato da Boost.
3.  **Implementa**: Scrivi codice PHPStan Level 10 compliant. Usa `boost:tinker` per debuggare in tempo reale.
4.  **Verifica**: Esegui i test Pest. Usa `boost:error-tracking` per catturare eventuali eccezioni silenziose.

---
*Documentazione conforme agli standard Laraxot - L'eccellenza è un'abitudine.*
