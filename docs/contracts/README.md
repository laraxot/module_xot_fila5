---
title: "Contratti — Xot"
type: index
module: Xot
status: active
tags: [contracts, actions, interfaces]
created: 2026-11-18
updated: 2026-11-26
qmd: "xot contratti indice behavioral contract action invarianti group pest copertura backlog"
---

# Contratti — Xot

Un contratto descrive cosa **promette** un'Action di Xot (input, output, invarianti con ID stabile, effetti collaterali, errori, cosa non fa) e distingue il **promesso** dal **dimostrato**: la colonna `Group Pest` contiene l'ID quando esiste un test con `->group('<ID>')`, altrimenti `— (non dimostrato)`. Xot è condiviso con altri progetti: i contratti descrivono comportamenti validi per ogni tenant che lo usa, salvo dove il testo dice il contrario.

Regole e riferimenti: [standard di authoring](contract-authoring-standard.md), [regola Action Behavioral Contract](../rules/action-behavioral-contract.md), [ADR 0012 — governance dei contratti](../adr/0012-behavioral-contract-governance.md), [ADR 0011 — riferimento `@contract` nel docblock](../adr/0011-contract-docblock-reference.md), [template](behavioral-contract-template.md). [INDEX.md](INDEX.md) è l'elenco alfabetico per titolo (solo collegamenti). **Stato (2026-12, issue #151):** gli stub per-Action sono archiviati in [`archive/docs-legacy/contracts/`](../../archive/docs-legacy/contracts/) per il tetto di 100 file `.md` in `docs/`; i collegamenti di questo README e dell'INDEX puntano lì, tranne i cinque contratti locali `execute-artisan-command-action`, `save-array-action`, `save-json-array-action`, `save-php-array-action` e `send-mail-by-record-action`: i loro docblock `@contract` risolvono a `docs/contracts/` e portano gli ID dimostrati dai group Pest. Restano qui anche formato, template e standard.

Ogni file ha frontmatter `type: contract` e `action: "<FQCN>"`, le sei sezioni `Input`, `Output`, `Invarianti`, `Effetti collaterali`, `Errori`, `Non fa`, e il docblock dell'Action contiene `@see` e `@contract docs/contracts/<file>.md`.

Verifica, da `laravel/`:

```bash
vendor/bin/pest Modules/Xot/tests/Unit/Docs/ActionContractsAreCompleteTest.php   # formato, action esistente, @contract nel docblock
vendor/bin/pest --group=<ID>                                                      # prova una singola invariante (solo quelle dimostrate)
rg -n "group\('<ID>'" Modules/Xot/tests                                          # il test di un'invariante
```

## Stato di copertura

Misurato il 2026-11-26 leggendo i file (Pest non eseguito in questa passata: i test annotati esistono e asseriscono la regola, ma non sono stati lanciati).

| Misura | Valore |
|---|---|
| Contratti di Action con `type: contract` | 236 |
| Invarianti con ID (contratti di Action) | 598 |
| Invarianti dimostrate (esiste un test con `->group(<ID>)`) | 93 |
| Invarianti non dimostrate | 505 |
| Contratti con tutte le invarianti dimostrate | 10 |
| Contratti con almeno una invariante dimostrata, ma non tutte | 54 |
| Contratti con invarianti non dimostrate e un test citato che esiste (letto: prova meno o manca un test) | 96 |
| Contratti con invarianti non dimostrate e nessun test citato | 130 |
| Contract di framework (`type: framework-contract`) | 2, con 6 invarianti, 0 dimostrate |
| Action in `app/Actions` senza `@contract` | 2 (vedi Backlog contract) |

Le invarianti dimostrate sono quelle con un `->group('<ID>')` in un test: 8 già presenti prima (`XOT-ARTISAN-EXEC-INV-1`, `XOT-ARTISAN-EXEC-INV-2`, `XOT-TRANSKEY-INV-1`, `XOT-SAVE-JSON-INV-1`, `XOT-SAVE-PHP-INV-1`, `XOT-SAVE-PHP-INV-2`, `XOT-SAVE-PHP-INV-3`, `XOT-MAIL-RECORD-INV-1`) e 85 aggiunte il 2026-11-26 dopo aver letto il test contro il testo di ciascuna invariante (sezione A del Backlog test). «Dimostrata» vuol dire che esiste un test che asserisce la regola; non vuol dire che il test sia stato eseguito e sia verde.

## Indice dei contratti

Un file per Action, raggruppati per area del namespace `Modules\Xot\…`. Colonne: invarianti totali / dimostrate.

### Actions (20)

| Contratto | INV | Scopo |
|---|---|---|
| [array-action.md](../../archive/docs-legacy/contracts/array-action.md) | 3 / 0 | Contenitore di due helper statici su array e intervalli, più un `execute()` vuoto. |
| [config-action.md](../../archive/docs-legacy/contracts/config-action.md) | 1 / 0 | Singleton senza comportamento. |
| [execute-artisan-command-action.md](execute-artisan-command-action.md) | 3 / 2 | Esegue un comando Artisan da una lista chiusa di comandi consentiti. |
| [execute-composer-dump-autoload-action.md](../../archive/docs-legacy/contracts/execute-composer-dump-autoload-action.md) | 3 / 0 | Esegue `composer dump-autoload` e nient'altro, per rigenerare l'autoloader senza accesso SSH. |
| [generate-pdf-action.md](../../archive/docs-legacy/contracts/generate-pdf-action.md) | 4 / 0 | Genera un PDF da HTML con Html2Pdf, in una delle tre modalità di uscita. |
| [get-model-by-model-type-action.md](../../archive/docs-legacy/contracts/get-model-by-model-type-action.md) | 3 / 1 | Restituisce un modello dal suo tipo morph e, se dato, dal suo id. |
| [get-model-class-by-model-type-action.md](../../archive/docs-legacy/contracts/get-model-class-by-model-type-action.md) | 2 / 0 | Risolve il FQCN da un tipo morph leggendo `config('morph_map')`. |
| [get-model-type-by-model-action.md](../../archive/docs-legacy/contracts/get-model-type-by-model-action.md) | 1 / 0 | Restituisce il tipo di un modello come nome snake del basename della classe. |
| [get-trans-key-action.md](../../archive/docs-legacy/contracts/get-trans-key-action.md) | 3 / 1 | Deriva la chiave di traduzione `modulo::file` dal FQCN di una classe Filament (`Modules\AI\Filament\Pages\Dashboard` → `ai::dashboard`). La usano `TransFuncTrait`,… |
| [get-view-action.md](../../archive/docs-legacy/contracts/get-view-action.md) | 4 / 0 | Risolve il nome della vista Blade da un file o dal chiamante, con priorità al tema pubblico. |
| [get-view-by-class-action.md](../../archive/docs-legacy/contracts/get-view-by-class-action.md) | 2 / 0 | Crea una vista Blade il cui nome deriva dal basename della classe. |
| [html-action.md](../../archive/docs-legacy/contracts/html-action.md) | 3 / 0 | Converte HTML in PDF con Html2Pdf, o restituisce l'HTML in modalità debug. |
| [list-main-module-candidates-action.md](../../archive/docs-legacy/contracts/list-main-module-candidates-action.md) | 3 / 1 | Elenca i moduli abilitati che possono essere il modulo principale, cioè quelli con un pannello Filament. |
| [list-supported-locales-action.md](../../archive/docs-legacy/contracts/list-supported-locales-action.md) | 2 / 0 | Elenca le lingue supportate con il nome nativo. |
| [module-action.md](../../archive/docs-legacy/contracts/module-action.md) | 3 / 0 | Oggetto con nome di modulo mutabile, singleton, che elenca i modelli di un modulo. |
| [pa-design-colors-action.md](../../archive/docs-legacy/contracts/pa-design-colors-action.md) | 2 / 0 | Espone i colori del design system PA e la palette Filament corrispondente. |
| [parse-print-page-string-action.md](../../archive/docs-legacy/contracts/parse-print-page-string-action.md) | 3 / 1 | Converte una stringa di pagine come `1-4,6,7` in un elenco di numeri. |
| [theme-action.md](../../archive/docs-legacy/contracts/theme-action.md) | 2 / 0 | Gestisce il nome del tema attivo con stato statico del processo. |
| [url-action.md](../../archive/docs-legacy/contracts/url-action.md) | 1 / 0 | Verifica se una stringa è un URL sintatticamente valido. |
| [xot-action.md](../../archive/docs-legacy/contracts/xot-action.md) | 1 / 0 | Contenitore con `getTenantClass()`. |

### Actions/AI/Ollama (2)

| Contratto | INV | Scopo |
|---|---|---|
| [chat-ollama-action.md](../../archive/docs-legacy/contracts/chat-ollama-action.md) | 4 / 0 | Invia un messaggio a un'istanza Ollama tramite `/api/chat` e restituisce testo, ragionamento, token e durate. |
| [generate-ollama-action.md](../../archive/docs-legacy/contracts/generate-ollama-action.md) | 3 / 0 | Genera testo da un prompt tramite `/api/generate` di Ollama. |

### Actions/Arr (6)

| Contratto | INV | Scopo |
|---|---|---|
| [array-to-raw-js-action.md](../../archive/docs-legacy/contracts/array-to-raw-js-action.md) | 4 / 2 | Converte un array PHP in un letterale JavaScript (oggetto) incapsulato in `RawJs`, pronto per attributi HTML tipo `x-data="..."`. |
| [ensure-keys-action.md](../../archive/docs-legacy/contracts/ensure-keys-action.md) | 4 / 0 | Allinea ogni riga di un dataset alle chiavi attese dallo schema: le chiavi mancanti diventano `null`, quelle presenti sono conservate. |
| [range-intersect-action.md](../../archive/docs-legacy/contracts/range-intersect-action.md) | 5 / 3 | Calcola l'intersezione tra due intervalli interi `[a0, b0]` e `[a1, b1]` con una catena di rami. |
| [save-array-action.md](save-array-action.md) | 3 / 3 | Punto di ingresso unico per salvare un array su file, scegliendo il formato. |
| [save-json-array-action.md](save-json-array-action.md) | 2 / 1 | Scrive un array come JSON formattato su file, creando la cartella se manca. |
| [save-php-array-action.md](save-php-array-action.md) | 3 / 3 | Salva un array come file PHP `return [...]` con una chiave per riga, senza array annidati inline. |

### Actions/Artisan (7)

| Contratto | INV | Scopo |
|---|---|---|
| [clear-artisan-debugbar-files-action.md](../../archive/docs-legacy/contracts/clear-artisan-debugbar-files-action.md) | 2 / 0 | Cancella i file JSON di Debugbar in `storage/debugbar` e restituisce un messaggio di esito. Sostituisce `ArtisanService::debugbarClear()`. |
| [clear-artisan-error-log-action.md](../../archive/docs-legacy/contracts/clear-artisan-error-log-action.md) | 2 / 0 | Cancella i file `.log` in `storage/logs` e restituisce un messaggio di esito. Sostituisce `ArtisanService::errorClear()`. |
| [clear-artisan-session-files-action.md](../../archive/docs-legacy/contracts/clear-artisan-session-files-action.md) | 2 / 0 | Cancella i file di sessione su disco in `storage/framework/sessions`. Sostituisce `ArtisanService::sessionClear()`. |
| [handle-artisan-act-request-action.md](../../archive/docs-legacy/contracts/handle-artisan-act-request-action.md) | 5 / 2 | Entrypoint unico del parametro legacy `act` (ex `ArtisanService::act()`). Traduce un `ArtisanActEnum` in una o più azioni artisan. |
| [run-artisan-command-action.md](../../archive/docs-legacy/contracts/run-artisan-command-action.md) | 3 / 0 | Esegue un singolo comando artisan via facade e restituisce l'output avvolto in `<pre>`, oppure il messaggio dell'eccezione. Sostituisce `ArtisanService::exe()`. |
| [show-artisan-error-log-action.md](../../archive/docs-legacy/contracts/show-artisan-error-log-action.md) | 4 / 0 | Prepara la vista di consultazione dei log in `storage/logs`, con il contenuto del file richiesto e l'elenco degli URL trovati nel log. Sostituisce… |
| [show-artisan-route-list-action.md](../../archive/docs-legacy/contracts/show-artisan-route-list-action.md) | 2 / 0 | Renderizza in HTML l'elenco delle rotte registrate, con la vista `xot::acts.artisan.show_route_list`. Sostituisce `ArtisanService::showRouteList()`. |

### Actions/Blade (1)

| Contratto | INV | Scopo |
|---|---|---|
| [register-blade-components-action.md](../../archive/docs-legacy/contracts/register-blade-components-action.md) | 2 / 0 | Registra nel compilatore Blade i componenti trovati sotto un percorso, con namespace e prefisso. |

### Actions/Cast (10)

| Contratto | INV | Scopo |
|---|---|---|
| [safe-array-by-model-cast-action.md](../../archive/docs-legacy/contracts/safe-array-by-model-cast-action.md) | 2 / 0 | Converte gli attributi di un modello in array, con fallback attributo per attributo se la conversione fallisce. |
| [safe-array-cast-action.md](../../archive/docs-legacy/contracts/safe-array-cast-action.md) | 5 / 4 | Converte un valore `mixed` in array, con default per i casi non gestiti. |
| [safe-attribute-cast-action.md](../../archive/docs-legacy/contracts/safe-attribute-cast-action.md) | 4 / 1 | Legge gli attributi di un modello Eloquent con cast tipati e default. |
| [safe-boolean-cast-action.md](../../archive/docs-legacy/contracts/safe-boolean-cast-action.md) | 3 / 1 | Converte un valore `mixed` in `bool` con default. |
| [safe-eloquent-cast-action.md](../../archive/docs-legacy/contracts/safe-eloquent-cast-action.md) | 3 / 2 | Versione Eloquent dei getter tipati, con fallback su un secondo attributo. |
| [safe-float-cast-action.md](../../archive/docs-legacy/contracts/safe-float-cast-action.md) | 4 / 1 | Converte un valore `mixed` in `float` con default, con helper per intervallo, precisione, percentuale e valuta. |
| [safe-int-cast-action.md](../../archive/docs-legacy/contracts/safe-int-cast-action.md) | 4 / 2 | Converte un valore `mixed` in `int` con default. |
| [safe-nullable-string-cast-action.md](../../archive/docs-legacy/contracts/safe-nullable-string-cast-action.md) | 2 / 0 | Converte un valore in `?string`: la stringa vuota diventa null. |
| [safe-object-cast-action.md](../../archive/docs-legacy/contracts/safe-object-cast-action.md) | 4 / 1 | Legge proprietà di un oggetto generico con controllo `isset` e default; chiama metodi in modo protetto. |
| [safe-string-cast-action.md](../../archive/docs-legacy/contracts/safe-string-cast-action.md) | 3 / 2 | Converte un valore `mixed` in `string` senza eccezioni. |

### Actions/Class (1)

| Contratto | INV | Scopo |
|---|---|---|
| [class-get-filename-by-classname-action.md](../../archive/docs-legacy/contracts/class-get-filename-by-classname-action.md) | 3 / 0 | Ritorna il percorso del file sorgente di una classe. |

### Actions/Classes (1)

| Contratto | INV | Scopo |
|---|---|---|
| [classes-get-filename-by-classname-action.md](../../archive/docs-legacy/contracts/classes-get-filename-by-classname-action.md) | 1 / 0 | Ritorna il percorso del file sorgente di una classe. |

### Actions/Collection (1)

| Contratto | INV | Scopo |
|---|---|---|
| [trans-collection-action.md](../../archive/docs-legacy/contracts/trans-collection-action.md) | 3 / 2 | Traduce ogni elemento di una collezione tramite una chiave di traduzione, con fallback che sostituisce i punti con underscore. |

### Actions/Composer (1)

| Contratto | INV | Scopo |
|---|---|---|
| [register-runtime-psr4-namespaces-action.md](../../archive/docs-legacy/contracts/register-runtime-psr4-namespaces-action.md) | 2 / 0 | Registra a runtime i namespace PSR-4 di temi e seeders che restano fuori da `composer.json`. |

### Actions/Config (4)

| Contratto | INV | Scopo |
|---|---|---|
| [get-tenant-config-array-action.md](../../archive/docs-legacy/contracts/get-tenant-config-array-action.md) | 3 / 2 | Legge il file di configurazione del tenant `{name}.php` e restituisce il suo array con sole chiavi stringa. |
| [get-tenant-config-path-action.md](../../archive/docs-legacy/contracts/get-tenant-config-path-action.md) | 1 / 1 | Restituisce il percorso del file di configurazione del tenant aggiungendo `.php` al nome e delegando a `Tenant`. |
| [get-year-options-action.md](../../archive/docs-legacy/contracts/get-year-options-action.md) | 2 / 1 | Restituisce le opzioni anno per un filtro o select condiviso, secondo il modulo a cui appartiene la classe chiamante. |
| [resolve-module-config-data-action.md](../../archive/docs-legacy/contracts/resolve-module-config-data-action.md) | 3 / 1 | Dalla classe di un modello, Resource o pagina di un modulo, risolve la sua `{Modulo}ConfigData` e ne restituisce un'istanza. |

### Actions/Debug (1)

| Contratto | INV | Scopo |
|---|---|---|
| [measure-action.md](../../archive/docs-legacy/contracts/measure-action.md) | 3 / 0 | Esegue una closure, misura tempo e memoria, e mostra il risultato come notifica. |

### Actions/Design (1)

| Contratto | INV | Scopo |
|---|---|---|
| [get-pa-filament-palette-action.md](../../archive/docs-legacy/contracts/get-pa-filament-palette-action.md) | 2 / 0 | Restituisce la palette Filament dei design PA delegando a `PaDesignColorsAction`. |

### Actions/Dummy (1)

| Contratto | INV | Scopo |
|---|---|---|
| [get-products-array-dummy-action.md](../../archive/docs-legacy/contracts/get-products-array-dummy-action.md) | 3 / 1 | Scarica prodotti di prova da `dummyjson.com` e ne tiene otto campi. |

### Actions/Export (11)

| Contratto | INV | Scopo |
|---|---|---|
| [export-pdf-by-html-action.md](../../archive/docs-legacy/contracts/export-pdf-by-html-action.md) | 3 / 0 | Converte HTML in PDF, lo salva su disco e restituisce un download, il contenuto o il percorso in base a `$out`. Versione in namespace Export (duplicata da… |
| [export-xls-by-collection.md](../../archive/docs-legacy/contracts/export-xls-by-collection.md) | 3 / 0 | Esporta una collezione di record o di array in un file Excel tramite `CollectionExport` (Laravel Excel): `execute()` risponde con un download, `executeWithSpreadsheet()`… |
| [export-xls-by-lazy-collection.md](../../archive/docs-legacy/contracts/export-xls-by-lazy-collection.md) | 2 / 0 | Esporta una `LazyCollection` in Excel tramite `LazyCollectionExport`. |
| [export-xls-by-query.md](../../archive/docs-legacy/contracts/export-xls-by-query.md) | 2 / 0 | Esporta il risultato di un Eloquent Builder in Excel, con limite opzionale applicato al builder. |
| [export-xls-by-view.md](../../archive/docs-legacy/contracts/export-xls-by-view.md) | 1 / 0 | Esporta una vista Blade in Excel tramite `ViewExport`. |
| [export-xls-stream-by-lazy-collection.md](../../archive/docs-legacy/contracts/export-xls-stream-by-lazy-collection.md) | 5 / 0 | Esporta una `LazyCollection` come CSV in streaming, con intestazione tradotta opzionale e tre righe finali di tabulazioni. |
| [get-export-file-name-action.md](../../archive/docs-legacy/contracts/get-export-file-name-action.md) | 2 / 1 | Costruisce il nome file (senza estensione) di un export da lista: nome della pagina più i valori scalari dei filtri. |
| [pdf-by-html-action-portrait.md](../../archive/docs-legacy/contracts/pdf-by-html-action-portrait.md) | 2 / 0 | Variante di `Export\PdfByHtmlAction` con orientamento fisso verticale (`P`) e senza parametro `orientation`. |
| [pdf-by-model-action.md](../../archive/docs-legacy/contracts/pdf-by-model-action.md) | 3 / 0 | Genera un PDF da un modello Eloquent: risolve la vista `.show.pdf` della classe e delega il rendering a `Export\PdfByHtmlAction`. |
| [pdf-by-view-action.md](../../archive/docs-legacy/contracts/pdf-by-view-action.md) | 1 / 0 | Renderizza una `View` Laravel e delega la conversione a `Export\PdfByHtmlAction`. |
| [xls-by-model-class-action.md](../../archive/docs-legacy/contracts/xls-by-model-class-action.md) | 4 / 0 | Esporta in Excel le righe di un modello, con filtri di uguaglianza, relazioni, colonne da includere/escludere e callback per riga. |

### Actions/Factory (3)

| Contratto | INV | Scopo |
|---|---|---|
| [get-factory-action.md](../../archive/docs-legacy/contracts/get-factory-action.md) | 4 / 0 | Risolve la factory di un modello, caricandola da disco o generandola con `module:make-factory`. |
| [get-faker-action.md](../../archive/docs-legacy/contracts/get-faker-action.md) | 2 / 0 | Restituisce il frammento di codice Faker da usare per una colonna. |
| [get-properties-from-methods-by-model-action.md](../../archive/docs-legacy/contracts/get-properties-from-methods-by-model-action.md) | 4 / 0 | Cerca nei metodi del modello le relazioni `belongsTo` e propone la chiave esterna con la factory del correlato. |

### Actions/Filament (12)

| Contratto | INV | Scopo |
|---|---|---|
| [auto-label-action.md](../../archive/docs-legacy/contracts/auto-label-action.md) | 3 / 0 | Applica a un componente Filament la label letta dalle traduzioni del modulo. Marcata WIP. |
| [generate-form-by-file-action.md](../../archive/docs-legacy/contracts/generate-form-by-file-action.md) | 3 / 0 | Dato il file di una Resource, conta i campi fillable del modello che corrispondono a metodi della Resource. Nome "Generate" ma non genera. Marcata WIP. |
| [generate-table-columns-by-file-action.md](../../archive/docs-legacy/contracts/generate-table-columns-by-file-action.md) | 3 / 0 | Riscrive il sorgente di una Resource Filament: sostituisce il contenuto di `columns()` e `schema()` con segnaposto `TODO` e, se il modello ha `anno`, inserisce un filtro… |
| [get-modules-navigation-items.md](../../archive/docs-legacy/contracts/get-modules-navigation-items.md) | 3 / 0 | Costruisce le voci di navigazione Filament per i moduli abilitati al tenant, e una variante cache dei dati di configurazione. |
| [get-navigation-item-by-modulename.md](../../archive/docs-legacy/contracts/get-navigation-item-by-modulename.md) | 3 / 0 | Costruisce la voce di navigazione Filament di un singolo modulo. Lancia se la config manca. |
| [get-panels-navigation-items.md](../../archive/docs-legacy/contracts/get-panels-navigation-items.md) | 2 / 0 | Costruisce una voce di navigazione per ogni pannello Filament registrato. |
| [get-related-resource-class-action.md](../../archive/docs-legacy/contracts/get-related-resource-class-action.md) | 3 / 0 | Risolve la `XotBaseResource` del modello mostrato da una pagina di gestione dei record correlati. |
| [get-resource-class-name-by-model-class-action.md](../../archive/docs-legacy/contracts/get-resource-class-name-by-model-class-action.md) | 3 / 0 | Restituisce la Resource Filament registrata nel pannello corrente per un modello. |
| [get-sidebar-state-script-action.md](../../archive/docs-legacy/contracts/get-sidebar-state-script-action.md) | 2 / 0 | Restituisce lo snippet JavaScript che inizializza lo stato dei gruppi della sidebar Filament nel localStorage. |
| [panel-module-action.md](../../archive/docs-legacy/contracts/panel-module-action.md) | 4 / 0 | Legge la configurazione del modulo nwidart a cui appartiene un pannello Filament, con helper statici. |
| [plain-text-from-filament-value-action.md](../../archive/docs-legacy/contracts/plain-text-from-filament-value-action.md) | 3 / 0 | Converte un valore Filament eterogeneo (Htmlable, enum `HasLabel`, scalare) in testo semplice. |
| [render-context-navigation.md](../../archive/docs-legacy/contracts/render-context-navigation.md) | 3 / 0 | Registra due render hook nella sidebar Filament con il nome del modulo e un link alla dashboard. |

### Actions/Filament/Actions (5)

| Contratto | INV | Scopo |
|---|---|---|
| [copy-from-last-year-button.md](../../archive/docs-legacy/contracts/copy-from-last-year-button.md) | 2 / 0 | Costruisce un bottone Filament che copia i dati dell'anno precedente tramite `ModelClass\CopyFromLastYearAction`. |
| [export-button.md](../../archive/docs-legacy/contracts/export-button.md) | 1 / 0 | Bottone Filament per l'export XLS. È visibile, ma l'azione non è implementata. |
| [filament-actions-copy-from-last-year-action.md](../../archive/docs-legacy/contracts/filament-actions-copy-from-last-year-action.md) | 3 / 0 | Azione Filament di copia dei dati dall'anno precedente: valida gli argomenti e delega a `ModelClass\CopyFromLastYearAction`. |
| [filament-actions-view-copy-action.md](../../archive/docs-legacy/contracts/filament-actions-view-copy-action.md) | 1 / 0 | Azione Filament per copiare una vista. Il metodo `execute` è un segnaposto vuoto. |
| [import-button.md](../../archive/docs-legacy/contracts/import-button.md) | 1 / 0 | Bottone Filament per l'import XLS. È visibile, ma l'azione non è implementata. |

### Actions/Filament/Block (1)

| Contratto | INV | Scopo |
|---|---|---|
| [get-view-blocks-options-by-type-action.md](../../archive/docs-legacy/contracts/get-view-blocks-options-by-type-action.md) | 3 / 0 | Elenca i blocchi Blade di un tipo in tutti i moduli, restituendo vista→nome oppure vista→URL dello screenshot. Marcata WIP. |

### Actions/Filament/Filter (1)

| Contratto | INV | Scopo |
|---|---|---|
| [get-year-filter.md](../../archive/docs-legacy/contracts/get-year-filter.md) | 2 / 0 | Costruisce un `SelectFilter` Filament con le opzioni di anno da un valore iniziale a uno finale, inclusi. |

### Actions/File (16)

| Contratto | INV | Scopo |
|---|---|---|
| [add-strict-types-declaration-action.md](../../archive/docs-legacy/contracts/add-strict-types-declaration-action.md) | 5 / 0 | Aggiunge `declare(strict_types=1);` a un file PHP che non lo ha. |
| [asset-action.md](../../archive/docs-legacy/contracts/asset-action.md) | 7 / 2 | Risolve l'URL pubblico di un asset, secondo namespace (modulo o tema) e presenza del file. Non copia nulla: gli asset sono serviti da symlink. |
| [asset-path-action.md](../../archive/docs-legacy/contracts/asset-path-action.md) | 3 / 1 | Restituisce il percorso su disco di un asset: sotto la document root per gli URL pubblici, sotto `resources/` del modulo per `Modulo::file`. |
| [copy-action.md](../../archive/docs-legacy/contracts/copy-action.md) | 4 / 0 | Copia un file nella destinazione senza sovrascriverla, creando la cartella di destinazione se manca. |
| [create-directory-for-filename-action.md](../../archive/docs-legacy/contracts/create-directory-for-filename-action.md) | 2 / 0 | Crea la cartella che contiene un file, se manca. |
| [create-relative-symlink-action.md](../../archive/docs-legacy/contracts/create-relative-symlink-action.md) | 4 / 1 | Crea un symlink con destinazione relativa alla cartella del link, così il progetto resta valido se cambia percorso. |
| [download-zip-by-paths-disk-action.md](../../archive/docs-legacy/contracts/download-zip-by-paths-disk-action.md) | 5 / 0 | Crea uno ZIP temporaneo con i file indicati presi da un disco e lo restituisce come download. |
| [ensure-gitignore-entries-action.md](../../archive/docs-legacy/contracts/ensure-gitignore-entries-action.md) | 4 / 1 | Aggiunge a un `.gitignore` le due righe necessarie per un link di asset (`<nome>/` e `<nome>`), se mancano. |
| [file-get-view-name-space-path-action.md](../../archive/docs-legacy/contracts/file-get-view-name-space-path-action.md) | 3 / 0 | Restituisce il percorso registrato per un namespace di viste, leggendo gli hint del view finder, o la cartella del tema. |
| [fix-path-action.md](../../archive/docs-legacy/contracts/fix-path-action.md) | 1 / 0 | Sostituisce `/` e `\` con il separatore di directory del sistema. |
| [get-class-name-by-path-action.md](../../archive/docs-legacy/contracts/get-class-name-by-path-action.md) | 2 / 0 | Ricava il FQCN di una classe leggendo il file PHP con regex (namespace e prima dichiarazione `class`). |
| [get-components-action.md](../../archive/docs-legacy/contracts/get-components-action.md) | 5 / 0 | Scansiona una cartella di classi componente, ne ricava nome, classe e namespace, e li salva in `_components.json` come cache. |
| [get-module-path-action.md](../../archive/docs-legacy/contracts/get-module-path-action.md) | 4 / 2 | Restituisce la cartella di un modulo, con fallback su `base_path('Modules')` se nwidart non lo trova. |
| [svg-exists-action.md](../../archive/docs-legacy/contracts/svg-exists-action.md) | 2 / 0 | Verifica se un'icona SVG esiste nei set registrati di BladeUI Icons. |
| [view-copy-action.md](../../archive/docs-legacy/contracts/view-copy-action.md) | 1 / 0 | Copia il file Blade di una vista in un'altra vista, risolvendo entrambi i nomi in percorsi. |
| [view-path-action.md](../../archive/docs-legacy/contracts/view-path-action.md) | 2 / 1 | Converte un nome di vista `ns::a.b` nel percorso del file `.blade.php` usando la cartella del namespace risolta da `File\GetViewNameSpacePathAction`. |

### Actions/Generate (1)

| Contratto | INV | Scopo |
|---|---|---|
| [generate-model-by-model-class.md](../../archive/docs-legacy/contracts/generate-model-by-model-class.md) | 5 / 0 | Esegue `module:make-model` per un modello e riscrive il file generato: base class `BaseModel`, import HasXotFactory rimosso, eventuale `$table`. |

### Actions/Geo (1)

| Contratto | INV | Scopo |
|---|---|---|
| [get-distance-expression-action.md](../../archive/docs-legacy/contracts/get-distance-expression-action.md) | 1 / 0 | Costruisce l'espressione SQL per la distanza tra un punto e le righe. |

### Actions/Html (1)

| Contratto | INV | Scopo |
|---|---|---|
| [html-to-pdf-action.md](../../archive/docs-legacy/contracts/html-to-pdf-action.md) | 3 / 0 | Converte HTML in PDF con Html2Pdf, con tre modalità di output selezionate dal parametro `$out`. |

### Actions/Import (1)

| Contratto | INV | Scopo |
|---|---|---|
| [import-csv-action.md](../../archive/docs-legacy/contracts/import-csv-action.md) | 4 / 0 | Importa un file CSV in una tabella con `LOAD DATA LOCAL INFILE`. |

### Actions/Mail (2)

| Contratto | INV | Scopo |
|---|---|---|
| [send-mail-by-record-action.md](send-mail-by-record-action.md) | 4 / 1 | Invia una mail a un record con oggetto e corpo letti dal record, allega il PDF del modello e registra l'invio nei log. |
| [send-mail-by-records-action.md](../../archive/docs-legacy/contracts/send-mail-by-records-action.md) | 2 / 0 | Invia la mail a ciascun record di una collezione, delegando a `SendMailByRecordAction`. |

### Actions/Model (19)

| Contratto | INV | Scopo |
|---|---|---|
| [create-morph-to-one-related-model-action.md](../../archive/docs-legacy/contracts/create-morph-to-one-related-model-action.md) | 2 / 0 | Crea il modello correlato di una relazione morphToOne chiamando `create()` sull'oggetto relazione. |
| [delete-table-index-by-model-class-index-name-action.md](../../archive/docs-legacy/contracts/delete-table-index-by-model-class-index-name-action.md) | 2 / 0 | Elimina un indice dalla tabella di un modello, sulla connessione del modello. |
| [destroy-action.md](../../archive/docs-legacy/contracts/destroy-action.md) | 2 / 1 | Cancella il modello passato e segnala l'esito in sessione. |
| [filter-relations-action.md](../../archive/docs-legacy/contracts/filter-relations-action.md) | 2 / 0 | Indicizza un elenco di relazioni Eloquent per nome breve del modello correlato. |
| [generate-model-by-table-action.md](../../archive/docs-legacy/contracts/generate-model-by-table-action.md) | 1 / 0 | Stub: la generazione di un modello da una tabella non è implementata. |
| [get-all-models-action.md](../../archive/docs-legacy/contracts/get-all-models-action.md) | 2 / 0 | Raccoglie i modelli di tutti i moduli, delegando per modulo a `GetAllModelsByModuleNameAction`. |
| [get-all-models-by-module-name-action.md](../../archive/docs-legacy/contracts/get-all-models-by-module-name-action.md) | 4 / 1 | Elenca le classi modello di un modulo leggendo `app/Models`. |
| [get-first-model-class-by-model-name-action.md](../../archive/docs-legacy/contracts/get-first-model-class-by-model-name-action.md) | 2 / 0 | Risolve il FQCN di un modello per nome snake, scansionando tutti i moduli. |
| [get-model-class-by-model-name-action.md](../../archive/docs-legacy/contracts/get-model-class-by-model-name-action.md) | 3 / 0 | Risolve il FQCN di un modello per nome, prima dal `morph_map` e poi, in mancanza, scansionando i moduli. |
| [get-model-fields-by-model-action.md](../../archive/docs-legacy/contracts/get-model-fields-by-model-action.md) | 1 / 0 | Restituisce i nomi delle colonne della tabella del modello. |
| [get-schema-manager-by-model-class-action.md](../../archive/docs-legacy/contracts/get-schema-manager-by-model-class-action.md) | 2 / 0 | Ottiene lo schema manager Doctrine per la connessione di un modello. |
| [get-sicure-array-by-model-action.md](../../archive/docs-legacy/contracts/get-sicure-array-by-model-action.md) | 2 / 0 | Converte un modello in array tollerando valori enum non validi. |
| [get-table-indexes-by-model-class-action.md](../../archive/docs-legacy/contracts/get-table-indexes-by-model-class-action.md) | 2 / 0 | Elenca gli indici della tabella di un modello, via schema manager Doctrine. |
| [has-column-action.md](../../archive/docs-legacy/contracts/has-column-action.md) | 1 / 0 | Verifica se la tabella del modello ha una colonna, leggendo lo schema a ogni chiamata. |
| [model-get-trans-key-by-model-class-action.md](../../archive/docs-legacy/contracts/model-get-trans-key-by-model-class-action.md) | 2 / 0 | Costruisce la chiave di traduzione `modulo::chiave-kebab` da un FQCN di modello. |
| [model-has-column-action.md](../../archive/docs-legacy/contracts/model-has-column-action.md) | 3 / 1 | Dice se la tabella di un modello ha una colonna, con cache statica per processo. |
| [model-table-exists-by-model-class-actions.md](../../archive/docs-legacy/contracts/model-table-exists-by-model-class-actions.md) | 3 / 0 | Dice se esiste la tabella di un modello. I modelli Sushi sono considerati sempre con tabella. |
| [store-action.md](../../archive/docs-legacy/contracts/store-action.md) | 4 / 0 | Crea e salva un modello, poi applica le relazioni presenti nei dati tramite le Action `Model/Store/<Tipo>Action`. |
| [update-action.md](../../archive/docs-legacy/contracts/update-action.md) | 4 / 0 | Aggiorna un modello (o ne crea/recupera uno dalla chiave) e applica le relazioni presenti nei dati tramite `Model/Update/RelationAction`. |

### Actions/Model/Store (12)

| Contratto | INV | Scopo |
|---|---|---|
| [store-belongs-to-action.md](../../archive/docs-legacy/contracts/store-belongs-to-action.md) | 2 / 0 | Crea il modello correlato di una `belongsTo` e lo associa al padre in memoria. |
| [store-belongs-to-many-action.md](../../archive/docs-legacy/contracts/store-belongs-to-many-action.md) | 2 / 0 | Collega il modello ai correlati di una `belongsToMany` con `sync()`. |
| [store-has-many-action.md](../../archive/docs-legacy/contracts/store-has-many-action.md) | 2 / 0 | Crea un figlio della relazione `hasMany`. |
| [store-has-many-deep-action.md](../../archive/docs-legacy/contracts/store-has-many-deep-action.md) | 1 / 0 | Stub per la creazione di una `hasManyDeep`: non implementato. |
| [store-has-many-through-action.md](../../archive/docs-legacy/contracts/store-has-many-through-action.md) | 1 / 0 | Stub per la creazione di una `hasManyThrough`: non implementato. |
| [store-has-one-action.md](../../archive/docs-legacy/contracts/store-has-one-action.md) | 2 / 0 | Collega un correlato esistente a una `hasOne`, solo nel caso di un id singolo. |
| [store-morph-many-action.md](../../archive/docs-legacy/contracts/store-morph-many-action.md) | 1 / 0 | Stub per la creazione di una `morphMany`: non implementato. |
| [store-morph-one-action.md](../../archive/docs-legacy/contracts/store-morph-one-action.md) | 1 / 0 | Crea o aggiorna il figlio di una `morphOne`. |
| [store-morph-to-many-action.md](../../archive/docs-legacy/contracts/store-morph-to-many-action.md) | 3 / 0 | Sincronizza la relazione `morphToMany` con una lista di id. |
| [store-morph-to-one-action.md](../../archive/docs-legacy/contracts/store-morph-to-one-action.md) | 2 / 0 | Crea il modello correlato di una `morphToOne`, delegando a `CreateMorphToOneRelatedModelAction`. |
| [store-morphed-by-many-action.md](../../archive/docs-legacy/contracts/store-morphed-by-many-action.md) | 1 / 0 | Stub per la creazione di una `morphedByMany`: non implementato. |
| [store-pivot-action.md](../../archive/docs-legacy/contracts/store-pivot-action.md) | 1 / 0 | Stub per la creazione di dati pivot: non implementato. |

### Actions/Model/Update (14)

| Contratto | INV | Scopo |
|---|---|---|
| [custom-relation-action.md](../../archive/docs-legacy/contracts/custom-relation-action.md) | 3 / 1 | Aggiorna i campi delle righe di una relazione custom, senza associarle né scollegarle. |
| [relation-action.md](../../archive/docs-legacy/contracts/relation-action.md) | 2 / 0 | Dispatcher: per ogni relazione trovata nei dati, chiama la Action `Model/Update/<TipoRelazione>Action`. |
| [update-belongs-to-action.md](../../archive/docs-legacy/contracts/update-belongs-to-action.md) | 4 / 0 | Aggiorna la relazione `belongsTo`: associa un correlato esistente per id, oppure aggiorna/crea il correlato con i dati del form. |
| [update-belongs-to-many-action.md](../../archive/docs-legacy/contracts/update-belongs-to-many-action.md) | 3 / 0 | Aggiorna una `belongsToMany`: con `to`/`from` sincronizza gli id; altrimenti aggiorna ogni correlato per chiave e ne collega gli id senza staccare gli altri. |
| [update-has-many-action.md](../../archive/docs-legacy/contracts/update-has-many-action.md) | 3 / 0 | Aggiorna i figli di una `hasMany` e ne gestisce il collegamento al padre. |
| [update-has-many-deep-action.md](../../archive/docs-legacy/contracts/update-has-many-deep-action.md) | 1 / 0 | Stub per l'aggiornamento di una `hasManyDeep`: non implementato. |
| [update-has-many-through-action.md](../../archive/docs-legacy/contracts/update-has-many-through-action.md) | 1 / 0 | Stub per l'aggiornamento di una `hasManyThrough`: non implementato. |
| [update-has-one-action.md](../../archive/docs-legacy/contracts/update-has-one-action.md) | 4 / 0 | Aggiorna il correlato di una `hasOne` o ne crea uno nuovo. |
| [update-morph-many-action.md](../../archive/docs-legacy/contracts/update-morph-many-action.md) | 3 / 1 | Aggiorna i figli di una `morphMany` e li riassocia al padre con `saveMany()`. |
| [update-morph-one-action.md](../../archive/docs-legacy/contracts/update-morph-one-action.md) | 3 / 0 | Aggiorna o crea il figlio di una `morphOne`, impostando `lang` e scartando i valori `null`. |
| [update-morph-to-many-action.md](../../archive/docs-legacy/contracts/update-morph-to-many-action.md) | 3 / 0 | Aggiorna una `morphToMany`: con lista di id fa `sync`, con dati pivot fa `syncWithoutDetaching`. |
| [update-morph-to-one-action.md](../../archive/docs-legacy/contracts/update-morph-to-one-action.md) | 3 / 0 | Gestisce una `morphToOne` nel flusso di aggiornamento. |
| [update-morphed-by-many-action.md](../../archive/docs-legacy/contracts/update-morphed-by-many-action.md) | 1 / 0 | Stub per l'aggiornamento di una `morphedByMany`: non implementato. |
| [update-pivot-action.md](../../archive/docs-legacy/contracts/update-pivot-action.md) | 1 / 0 | Stub per l'aggiornamento dei dati pivot: non implementato. |

### Actions/ModelClass (10)

| Contratto | INV | Scopo |
|---|---|---|
| [count-action.md](../../archive/docs-legacy/contracts/count-action.md) | 2 / 1 | Restituisce il numero di record di un modello dal contatore memorizzato in `InformationSchemaTable`. |
| [fake-seeder-action.md](../../archive/docs-legacy/contracts/fake-seeder-action.md) | 4 / 0 | Inserisce record fittizi generati dalla factory del modello, a blocchi, con limite per chiamata e rinvio in coda del resto. |
| [get-method-body-action.md](../../archive/docs-legacy/contracts/get-method-body-action.md) | 2 / 0 | Restituisce il sorgente di un metodo di classe leggendo le righe dal file. |
| [guess-morph-pivot-action.md](../../archive/docs-legacy/contracts/guess-morph-pivot-action.md) | 2 / 0 | Individua e istanzia la classe pivot morph per una relazione, con nome `{Related}Morph`. |
| [guess-pivot-action.md](../../archive/docs-legacy/contracts/guess-pivot-action.md) | 2 / 0 | Individua e istanzia la classe pivot di una relazione many-to-many, con nome formato dai basename dei due modelli in ordine alfabetico. |
| [guess-pivot-full-class-action.md](../../archive/docs-legacy/contracts/guess-pivot-full-class-action.md) | 3 / 0 | Cerca il FQCN di una classe pivot nel namespace del modello dichiarante, poi in quello del correlato, poi risalendo le classi genitrici. |
| [model-class-copy-from-last-year-action.md](../../archive/docs-legacy/contracts/model-class-copy-from-last-year-action.md) | 3 / 0 | Copia i record dell'anno precedente in quello corrente, cambiando il campo anno. |
| [model-class-table-exists-by-model-class-actions.md](../../archive/docs-legacy/contracts/model-class-table-exists-by-model-class-actions.md) | 3 / 0 | Dice se la tabella del modello esiste nel database; per i modelli Sushi risponde sempre `true`. |
| [select-action.md](../../archive/docs-legacy/contracts/select-action.md) | 1 / 0 | Esegue una query SQL grezza sulla connessione del modello indicato. |
| [update-count-action.md](../../archive/docs-legacy/contracts/update-count-action.md) | 2 / 2 | Scrive nel contatore `InformationSchemaTable` il numero di record indicato per un modello. |

### Actions/Module (5)

| Contratto | INV | Scopo |
|---|---|---|
| [get-module-config-action.md](../../archive/docs-legacy/contracts/get-module-config-action.md) | 3 / 2 | Carica il file di configurazione `{config}.php` della cartella `config` di un modulo e restituisce il suo array con sole chiavi stringa. |
| [get-module-name-by-class-action.md](../../archive/docs-legacy/contracts/get-module-name-by-class-action.md) | 2 / 1 | Estrae il nome del modulo da un FQCN di modello, come il segmento tra `Modules\` e `\Models\`. |
| [get-module-name-by-model-action.md](../../archive/docs-legacy/contracts/get-module-name-by-model-action.md) | 1 / 0 | Dato un modello Eloquent, restituisce il nome del modulo a cui appartiene la sua classe. |
| [get-module-name-by-model-class-action.md](../../archive/docs-legacy/contracts/get-module-name-by-model-class-action.md) | 2 / 1 | Estrae il nome del modulo da un FQCN di modello, come il segmento tra `Modules\` e `\Models\`. È usata da `GetViewByModelClassAction`. |
| [get-module-path-by-generator-action.md](../../archive/docs-legacy/contracts/get-module-path-by-generator-action.md) | 3 / 0 | Restituisce il percorso di una cartella di un modulo, risolto dalla chiave `modules.paths.generator.{generatorPath}.path` della configurazione nwidart. |

### Actions/Panel (2)

| Contratto | INV | Scopo |
|---|---|---|
| [apply-metatag-to-panel-action.md](../../archive/docs-legacy/contracts/apply-metatag-to-panel-action.md) | 2 / 0 | Applica a un pannello Filament colori, logo, nome, favicon letti da `MetatagData`; in caso di errore logga e restituisce il pannello. |
| [apply-tenancy-to-panel-action.md](../../archive/docs-legacy/contracts/apply-tenancy-to-panel-action.md) | 4 / 0 | Configura la multi-tenancy di un pannello Filament con la classe tenant di `XotData`, registrazione e profilo del modulo User. |

### Actions/Pdf (7)

| Contratto | INV | Scopo |
|---|---|---|
| [content-pdf-action.md](../../archive/docs-legacy/contracts/content-pdf-action.md) | 4 / 0 | Genera il contenuto binario di un PDF da HTML diretto o da una vista Blade, per allegati email. |
| [download-pdf-by-view-action.md](../../archive/docs-legacy/contracts/download-pdf-by-view-action.md) | 2 / 0 | Genera un PDF da una vista Blade e restituisce la risposta di download, delegando a `StreamDownloadPdfAction`. |
| [get-pdf-content-by-record-action.md](../../archive/docs-legacy/contracts/get-pdf-content-by-record-action.md) | 5 / 1 | Genera il contenuto binario di un PDF da un record Eloquent, risolvendo la vista per convenzione `modulo::modello.show.pdf`. |
| [make-pdf-spatie-test-action.md](../../archive/docs-legacy/contracts/make-pdf-spatie-test-action.md) | 3 / 0 | Costruisce una risposta di download PDF di prova con `spatie/laravel-pdf` (Browsershot) da una vista di test. |
| [pdf-engine-enum.md](../../archive/docs-legacy/contracts/pdf-engine-enum.md) | 1 / 0 | Enum stub con il solo engine `SPIPU`, duplicato dell'enum `Modules\Xot\Enums\PdfEngineEnum`. Non è una Action. |
| [pdf-pdf-by-html-action.md](../../archive/docs-legacy/contracts/pdf-pdf-by-html-action.md) | 2 / 0 | Converte HTML in PDF tramite `PdfData` e restituisce download o percorso. Namespace `Pdf` (duplicato di `Export\PdfByHtmlAction`). |
| [stream-download-pdf-action.md](../../archive/docs-legacy/contracts/stream-download-pdf-action.md) | 3 / 0 | Genera un PDF da HTML o da vista e restituisce una risposta di download in streaming. |

### Actions/Pdf/Engine (2)

| Contratto | INV | Scopo |
|---|---|---|
| [spatie-pdf-by-html-action.md](../../archive/docs-legacy/contracts/spatie-pdf-by-html-action.md) | 2 / 0 | Engine PDF con nome `Spatie` che in realtà usa `spipu/html2pdf`; corpo identico a `SpipuPdfByHtmlAction`. |
| [spipu-pdf-by-html-action.md](../../archive/docs-legacy/contracts/spipu-pdf-by-html-action.md) | 2 / 0 | Engine PDF basato su `spipu/html2pdf`; corpo identico a `SpatiePdfByHtmlAction`. |

### Actions/Query (3)

| Contratto | INV | Scopo |
|---|---|---|
| [create-table-index-by-model-class-columns-action.md](../../archive/docs-legacy/contracts/create-table-index-by-model-class-columns-action.md) | 5 / 5 | Crea un indice su una tabella di modello, saltandolo se esiste già per nome. |
| [get-fieldnames-by-tablename-action.md](../../archive/docs-legacy/contracts/get-fieldnames-by-tablename-action.md) | 4 / 0 | Restituisce i nomi delle colonne di una tabella su una connessione indicata. |
| [start-query-log-action.md](../../archive/docs-legacy/contracts/start-query-log-action.md) | 2 / 0 | Registra un listener che scrive ogni query SQL su un file di log dedicato. |

### Actions/Route (12)

| Contratto | INV | Scopo |
|---|---|---|
| [build-action-url-action.md](../../archive/docs-legacy/contracts/build-action-url-action.md) | 3 / 2 | Costruisce l'URL di un'azione sulla route corrente, sostituendo l'ultimo segmento del nome route con l'azione richiesta. |
| [build-language-url-action.md](../../archive/docs-legacy/contracts/build-language-url-action.md) | 1 / 1 | Dovrebbe costruire l'URL di cambio lingua. Nel codice restituisce sempre un placeholder. |
| [build-nested-route-name-action.md](../../archive/docs-legacy/contracts/build-nested-route-name-action.md) | 3 / 1 | Costruisce il nome di una route annidata: `[admin.]container0...containerN.azione`. |
| [get-current-route-action-name-action.md](../../archive/docs-legacy/contracts/get-current-route-action-name-action.md) | 1 / 1 | Restituisce il nome del metodo del controller della route corrente, in snake_case. |
| [get-current-route-controller-name-action.md](../../archive/docs-legacy/contracts/get-current-route-controller-name-action.md) | 1 / 1 | Restituisce il nome del controller della route corrente, senza namespace fino a `Http\Controllers\` e senza suffisso `Controller`. |
| [get-current-route-handler-action.md](../../archive/docs-legacy/contracts/get-current-route-handler-action.md) | 2 / 1 | Restituisce la stringa `Classe@metodo` della route corrente. |
| [get-current-route-module-name-action.md](../../archive/docs-legacy/contracts/get-current-route-module-name-action.md) | 1 / 1 | Restituisce il nome del modulo a cui appartiene il controller della route corrente. |
| [get-current-route-view-action.md](../../archive/docs-legacy/contracts/get-current-route-view-action.md) | 3 / 1 | Costruisce un nome di vista in notazione puntata dal controller della route corrente, sostituendo i segmenti con i parametri della route. |
| [get-route-method-action.md](../../archive/docs-legacy/contracts/get-route-method-action.md) | 2 / 1 | Restituisce i metodi HTTP per una definizione di route dinamica. |
| [get-route-parameters-action.md](../../archive/docs-legacy/contracts/get-route-parameters-action.md) | 2 / 0 | Restituisce i parametri della route corrente come array associativo. |
| [is-admin-route-action.md](../../archive/docs-legacy/contracts/is-admin-route-action.md) | 3 / 0 | Stabilisce se la richiesta corrente è una rotta di amministrazione. |
| [register-dynamic-routes-action.md](../../archive/docs-legacy/contracts/register-dynamic-routes-action.md) | 5 / 0 | Registra nel router le route descritte da un array di definizioni: risorsa, azioni extra e sotto-definizioni annidate. |

### Actions/String (5)

| Contratto | INV | Scopo |
|---|---|---|
| [fix-double-encoded-utf8-action.md](../../archive/docs-legacy/contracts/fix-double-encoded-utf8-action.md) | 4 / 3 | Ripara il testo UTF-8 codificato due volte (es. `SÃ¬` → `Sì`) passando per Windows-1252. |
| [get-pronounceable-password-action.md](../../archive/docs-legacy/contracts/get-pronounceable-password-action.md) | 3 / 2 | Genera una password pronunciabile con lettere, una cifra e un simbolo, con sorgente CSPRNG. |
| [get-str-between-starts-with-action.md](../../archive/docs-legacy/contracts/get-str-between-starts-with-action.md) | 3 / 1 | Estrae da `$body` il blocco che inizia alla prima occorrenza di `$start` e si chiude quando il numero di `$open` eguaglia quello di `$close`. |
| [normalize-driver-name-action.md](../../archive/docs-legacy/contracts/normalize-driver-name-action.md) | 2 / 2 | Riduce il nome di un driver a soli caratteri `[a-z0-9]` in minuscolo. |
| [sanitize-action.md](../../archive/docs-legacy/contracts/sanitize-action.md) | 2 / 2 | Rimuove i tag HTML, decodifica le entità e applica `trim`. |

### Actions/Testing (1)

| Contratto | INV | Scopo |
|---|---|---|
| [resolve-shared-sqlite-path-action.md](../../archive/docs-legacy/contracts/resolve-shared-sqlite-path-action.md) | 3 / 0 | Risolve il percorso del file SQLite condiviso dalla suite di test. |

### Actions/Theme (5)

| Contratto | INV | Scopo |
|---|---|---|
| [get-theme-action.md](../../archive/docs-legacy/contracts/get-theme-action.md) | 2 / 1 | Restituisce il nome del tema attivo letto da `config('theme.active')`. |
| [get-theme-context-action.md](../../archive/docs-legacy/contracts/get-theme-context-action.md) | 5 / 0 | Restituisce il contesto tematico della data corrente (natale, pasqua, estate, halloween, default). |
| [get-theme-path-action.md](../../archive/docs-legacy/contracts/get-theme-path-action.md) | 2 / 1 | Restituisce il percorso della cartella del tema attivo sotto `resources/themes`. |
| [is-theme-action.md](../../archive/docs-legacy/contracts/is-theme-action.md) | 2 / 1 | Dice se il tema passato è quello attivo. |
| [set-theme-action.md](../../archive/docs-legacy/contracts/set-theme-action.md) | 2 / 1 | Imposta il tema attivo in memoria, cambiando `config('theme.active')`. |

### Actions/Trans (2)

| Contratto | INV | Scopo |
|---|---|---|
| [get-trans-filename-action.md](../../archive/docs-legacy/contracts/get-trans-filename-action.md) | 3 / 0 | Calcola il percorso assoluto del file di traduzione PHP per il locale corrente, dato un nome nel formato `modulo::file.chiave`. |
| [trans-get-trans-key-by-model-class-action.md](../../archive/docs-legacy/contracts/trans-get-trans-key-by-model-class-action.md) | 2 / 0 | Costruisce la chiave di traduzione `modulo::modello{suffisso}` per una classe modello. |

### Actions/Translation (6)

| Contratto | INV | Scopo |
|---|---|---|
| [apertium-translate-action.md](../../archive/docs-legacy/contracts/apertium-translate-action.md) | 1 / 0 | Provider di traduzione Apertium: implementazione stub che restituisce sempre stringa vuota. |
| [base-translate-action.md](../../archive/docs-legacy/contracts/base-translate-action.md) | 1 / 0 | Classe astratta che fissa la firma comune dei provider di traduzione. Non è eseguibile direttamente. |
| [deep-l-translate-action.md](../../archive/docs-legacy/contracts/deep-l-translate-action.md) | 1 / 0 | Provider di traduzione DeepL: implementazione stub che restituisce sempre stringa vuota. |
| [google-translate-action.md](../../archive/docs-legacy/contracts/google-translate-action.md) | 1 / 0 | Provider di traduzione Google: implementazione stub che restituisce sempre stringa vuota. |
| [my-memory-translate-action.md](../../archive/docs-legacy/contracts/my-memory-translate-action.md) | 1 / 0 | Provider di traduzione MyMemory: implementazione stub che restituisce sempre stringa vuota. |
| [systran-translate-action.md](../../archive/docs-legacy/contracts/systran-translate-action.md) | 1 / 0 | Provider di traduzione Systran: implementazione stub che restituisce sempre stringa vuota. |

### Actions/Tree (1)

| Contratto | INV | Scopo |
|---|---|---|
| [get-tree-options-by-model-class-action.md](../../archive/docs-legacy/contracts/get-tree-options-by-model-class-action.md) | 3 / 0 | Produce le opzioni per un select ad albero da un modello gerarchico. |

### Actions/Trend (1)

| Contratto | INV | Scopo |
|---|---|---|
| [build-trend-collection-action.md](../../archive/docs-legacy/contracts/build-trend-collection-action.md) | 4 / 0 | Costruisce una serie temporale aggregata da una query con `Flowframe\Trend`. |

### Actions/Trend/Adapters (4)

| Contratto | INV | Scopo |
|---|---|---|
| [abstract-adapter.md](../../archive/docs-legacy/contracts/abstract-adapter.md) | 1 / 0 | Classe astratta per gli adapter SQL del trend: definisce `format(column, interval)`. |
| [my-sql-adapter.md](../../archive/docs-legacy/contracts/my-sql-adapter.md) | 1 / 0 | Adapter MySQL per il raggruppamento temporale: produce `date_format(colonna, formato)`. |
| [pgsql-adapter.md](../../archive/docs-legacy/contracts/pgsql-adapter.md) | 1 / 0 | Adapter PostgreSQL per il raggruppamento temporale: produce `to_char(colonna, formato)`. |
| [sqlite-adapter.md](../../archive/docs-legacy/contracts/sqlite-adapter.md) | 1 / 0 | Adapter SQLite per il raggruppamento temporale: produce `strftime(formato, colonna)`. |

### Actions/Trend/Format (4)

| Contratto | INV | Scopo |
|---|---|---|
| [base-format-action.md](../../archive/docs-legacy/contracts/base-format-action.md) | 1 / 0 | Classe astratta delle Action di formato data SQL del trend. Duplica il ruolo di `AbstractAdapter`. |
| [my-sql-format-action.md](../../archive/docs-legacy/contracts/my-sql-format-action.md) | 1 / 0 | Formato data MySQL per il trend, come `Trend\Adapters\MySqlAdapter` ma con `InvalidArgumentException`. |
| [pgsql-format-action.md](../../archive/docs-legacy/contracts/pgsql-format-action.md) | 1 / 0 | Formato data PostgreSQL per il trend, come `Trend\Adapters\PgsqlAdapter` ma con `InvalidArgumentException`. |
| [sqlite-format-action.md](../../archive/docs-legacy/contracts/sqlite-format-action.md) | 1 / 0 | Formato data SQLite per il trend, come `Trend\Adapters\SqliteAdapter` ma con `InvalidArgumentException`. |

### Actions/Url (1)

| Contratto | INV | Scopo |
|---|---|---|
| [is-valid-url-action.md](../../archive/docs-legacy/contracts/is-valid-url-action.md) | 1 / 1 | Verifica sintatticamente una stringa come URL con `filter_var`. |

### Actions/Utilities (2)

| Contratto | INV | Scopo |
|---|---|---|
| [utilities-diff-assoc-recursive-action.md](../../archive/docs-legacy/contracts/utilities-diff-assoc-recursive-action.md) | 3 / 0 | Restituisce gli elementi di primo livello di `$arr_1` che non compaiono in `$arr_2`. |
| [utilities-range-intersect-action.md](../../archive/docs-legacy/contracts/utilities-range-intersect-action.md) | 2 / 0 | Calcola l'intersezione tra due intervalli numerici chiusi `[a, b]` e `[c, d]` come `[max(inizi), min(fini)]`. |

### Actions/View (5)

| Contratto | INV | Scopo |
|---|---|---|
| [get-view-by-model-class-action.md](../../archive/docs-legacy/contracts/get-view-by-model-class-action.md) | 3 / 0 | Trova la vista di un modello nel modulo del modello o, se manca, nei moduli delle classi antenate. |
| [get-view-dir-action.md](../../archive/docs-legacy/contracts/get-view-dir-action.md) | 2 / 0 | Converte un nome di vista `ns::a.b` nella cartella che la contiene su disco. |
| [get-view-path-action.md](../../archive/docs-legacy/contracts/get-view-path-action.md) | 1 / 0 | Converte un nome di vista `ns::a.b` nel percorso del file `.blade.php` su disco. |
| [get-views-siblings-and-self-action.md](../../archive/docs-legacy/contracts/get-views-siblings-and-self-action.md) | 3 / 0 | Elenca le viste `.blade.php` che stanno nella stessa cartella della vista indicata, inclusa la vista stessa. |
| [view-get-view-name-space-path-action.md](../../archive/docs-legacy/contracts/view-get-view-name-space-path-action.md) | 2 / 0 | Restituisce la cartella delle viste di un modulo (`resources/views`), o quella globale `resource_path('views')` se il modulo non è indicato. |

### Actions/Xot (1)

| Contratto | INV | Scopo |
|---|---|---|
| [get-tenant-class-action.md](../../archive/docs-legacy/contracts/get-tenant-class-action.md) | 1 / 0 | Restituisce la classe del modello Tenant. Sostituisce `Modules\Xot\Services\XotService::getTenantClass()`. |

## Contract di framework

Non sono Action: descrivono confini del framework. Hanno `type: framework-contract` e una tabella di invarianti con ID (`XOT-BOOTSTRAP-INV-N`, `XOT-XOTBASE-INV-N`): 6 invarianti, nessuna con group Pest, tre con un test o una regola Pest arch esistente da annotare. Non sono nei conteggi della copertura qui sopra (che riguardano i contratti di Action).

- [bootstrap-provider-registry.md](../../archive/docs-legacy/contracts/bootstrap-provider-registry.md) — Contract — registro dei provider Laravel
- [xotbase-classes.md](../../archive/docs-legacy/contracts/xotbase-classes.md) — Contract — classi base XotBase

## Documenti di metodo (non sono contratti)

- [contract-authoring-standard.md](contract-authoring-standard.md) — standard di authoring dei contratti, valido per ogni modulo e tema.
- [behavioral-contract-template.md](behavioral-contract-template.md), [0000-template.md](0000-template.md), [_template.md](_template.md) — modelli; gli ID segnaposto (`<OWNER>-<OPERATION>-INV-1`, `MODULE-INV-1`) non sono invarianti reali.
- [INDEX.md](INDEX.md), [index.md](../../archive/docs-legacy/contracts/index.md) — elenco alfabetico per titolo e puntatore storico al nome minuscolo.
- [Regola Action Behavioral Contract](../rules/action-behavioral-contract.md) — quando il contratto è obbligatorio.

## Backlog contract

Action di `app/Actions` ancora senza `@contract` (il 2026-11-26, `rg -L "@contract docs/contracts/" app/Actions`):

- `app/Actions/Artisan/Handlers/ModuleCommandHandler.php` — **residuo deprecato senza chiamanti** (`@deprecated` nel docblock; l'alias `app/Services/Artisan/Handlers/ModuleCommandHandler.php` lo estende). Lancia `module:disable <nome>` / `module:enable <nome>` tramite `RunArtisanCommandAction` con un nome preso dal chiamante e non filtrato. Non merita un contratto: proposta di cancellarlo insieme all'alias (decisione umana; l'alias in `app/Services` viola anche la regola «niente Services», ADR 0001).
- `app/Actions/Arr/DiffAssocRecursiveAction.php` — pura, senza effetti collaterali, duplicata da `Utilities/DiffAssocRecursiveAction` (già in [utilities-diff-assoc-recursive-action.md](../../archive/docs-legacy/contracts/utilities-diff-assoc-recursive-action.md)); nessun contratto proprio finché i due non si unificano (vedi [array-action.md](../../archive/docs-legacy/contracts/array-action.md)).

Nessuna Action che scrive dati o chiama un servizio esterno è rimasta senza contratto (lo script `audit_docs.py` non ne segnala più). Il rischio più alto che i contratti segnalano come **Limite noto**, non corretto in questa passata:

- [export-xls-by-collection.md](../../archive/docs-legacy/contracts/export-xls-by-collection.md): `ExportTreeXlsAction` ed `ExportXlsTableAction` esportano campi di record senza un'autorizzazione esplicita nel proprio file (a differenza di `ExportXlsAction`).
- [execute-artisan-command-action.md](execute-artisan-command-action.md): `migrate` è nella lista dei comandi consentiti; da confrontare con la regola sui dati sacri.

## Backlog test

Un'invariante è dimostrata solo se un test con `->group('<ID>')` asserisce ogni affermazione del suo testo. Per ogni contratto qui sotto: aprire il test citato, rafforzarlo (o restringere il testo dell'invariante a ciò che il test prova), aggiungere `->group('<ID>')`, riportare l'ID nella colonna `Group Pest` e togliere la riga da qui. Il guard `ContractInvariantsAreProvenTest` controlla che ogni group dichiarato esista nei test e che ogni `<SCOPE>-INV-<N>` abbia una riga di contratto; non controlla che il test provi davvero la regola.

### A. Il contratto cita un test esistente: letto, ancora da annotare (96 contratti, 208 invarianti)

Passata del 2026-11-26: per ciascuno dei 106 contratti che citavano un test esistente è stato letto il test e confrontato con ogni invariante. Le invarianti il cui test asserisce la regola hanno ora `->group('<ID>')` nel test e l'ID nella colonna `Group Pest` (85 invarianti in 51 file di test; i test annotati non sono stati eseguiti in questa passata). Qui restano i contratti con invarianti ancora senza prova, tra parentesi il numero di invarianti rimaste; dopo il trattino il motivo verificato: il test prova meno di quanto il contratto promette, il test non asserisce nulla, oppure manca un test. Un'invariante si annota solo se il test asserisce ogni affermazione del suo testo: per annotarne una che prova meno si rafforza il test o si restringe il testo, non si annota comunque.

Contano come test solo i file `*Test.php` / `*Tests.php`: guardie di architettura (`tests/Arch/*.php`) e basi di test (`XotBaseTestCase.php`) non sono test da annotare.

- `add-strict-types-declaration-action.md` (5): `tests/Unit/Actions/File/AddStrictTypesDeclarationActionTest.php` — INV-2: il test «does not duplicate…» (`AddStrictTypesDeclarationActionTest.php:43-52`) parte da un file senza la direttiva; INV-1 e INV-3 senza test; INV-4 asserisce la presenza, non la posizione
- `array-action.md` (3): `tests/Unit/Actions/ArrayArrActionsTest.php` — i test citati provano `Arr\RangeIntersectAction` e `Arr\DiffAssocRecursiveAction`, non i metodi di `ArrayAction`
- `array-to-raw-js-action.md` (2): `tests/Unit/Actions/Arr/ArrayToRawJsActionTest.php` — INV-1 e INV-3: nel test l'apice è solo nel valore, mai nella chiave, e manca il backslash
- `asset-action.md` (5): `tests/Unit/Actions/File/FileActionsTest.php`, `tests/Unit/Actions/File/AssetActionsTest.php` — INV-1: asserito solo `https://`; INV-3, INV-4, INV-6, INV-7 senza test
- `asset-path-action.md` (2): `tests/Unit/Actions/File/FileActionsTest.php`, `tests/Unit/Actions/File/AssetActionsTest.php` — INV-1: il frammento `#` non è asserito (solo `?v=2`)
- `build-action-url-action.md` (1): `tests/Unit/Actions/Route/BuildActionUrlActionTest.php`, `tests/Unit/XotExplicitZeroKillersTest.php` — INV-3: i parametri della route corrente non sono asseriti (le route dei test non ne hanno)
- `build-nested-route-name-action.md` (2): `tests/Unit/Actions/Route/RouteActionsTest.php` — INV-1: il test usa `n = 1`, non `n = 0`; INV-3 senza test dedicato
- `class-get-filename-by-classname-action.md` (3): `tests/Unit/Actions/Class/GetFilenameByClassnameActionTest.php` — `GetFilenameByClassnameActionTest.php:17` asserisce solo che il percorso contiene `Log.php`: passerebbe anche col ripiego (INV-2)
- `classes-get-filename-by-classname-action.md` (1): `tests/Unit/Actions/Classes/GetFilenameByClassnameActionTest.php` — come `class-get-filename-by-classname-action`: il test asserisce solo `Log.php` e non-vuoto (`GetFilenameByClassnameActionTest.php:16-17`)
- `count-action.md` (1): `tests/Unit/Actions/ModelClass/CountActionsTest.php` — INV-2: il test non verifica che il valore calcolato sia salvato
- `create-directory-for-filename-action.md` (2): `tests/Unit/Actions/File/CreateDirectoryForFilenameActionTest.php` — INV-1: il modo `0755` non è asserito; INV-2 senza test
- `create-relative-symlink-action.md` (3): `tests/Unit/Actions/File/CreateRelativeSymlinkActionTest.php` — INV-3 (link già esistente) senza test; INV-4: asserito solo il link assoluto; INV-2 senza test
- `custom-relation-action.md` (2): `tests/Unit/Actions/Model/Update/CustomRelationActionTest.php` — INV-1 (elemento non array) e INV-3 (`LogicException`) senza test
- `destroy-action.md` (1): `tests/Unit/Actions/Model/DestroyActionTest.php` — INV-2: il modello restituito è asserito solo quando `delete()` è true
- `ensure-gitignore-entries-action.md` (3): `tests/Unit/Actions/File/EnsureGitignoreEntriesActionTest.php` — INV-1: `trim` e riga esatta non asseriti; INV-3: manca il caso senza header; INV-4 senza test
- `execute-composer-dump-autoload-action.md` (3): `tests/Unit/ComposerNeverRunsInTestsTest.php` — il test prova che composer non parte davvero; nessuna asserzione su radice, timeout, `COMPOSER_HOME`, exit code
- `export-pdf-by-html-action.md` (3): `tests/Unit/Actions/Pdf/PdfActionsTest.php` — il test di `PdfActionsTest.php` prova `Pdf\PdfByHtmlAction`, non questa classe; nessun test dedicato
- `export-xls-by-collection.md` (3): `tests/Unit/Exports/CollectionExportLabelledFieldsTest.php` — i test provano `CollectionExport`, non l'Action; INV-2: la traduzione dell'intestazione implicita non è provata (`CollectionExportLabelledFieldsTest.php:55` usa una chiave inesistente)
- `export-xls-stream-by-lazy-collection.md` (5): `tests/Unit/XotExecuteCoverage50Test.php` — `XotExecuteCoverage50Test.php` (riga 853) è solo copertura: nessuna asserzione sulle regole
- `file-get-view-name-space-path-action.md` (3): `tests/Unit/Actions/File/FileActionsTest.php` — `FileActionsTest.php:24-30` sostituisce proprio questa Action con una classe anonima: non è provata
- `fix-double-encoded-utf8-action.md` (1): `tests/Unit/Actions/String/FixDoubleEncodedUtf8ActionTest.php` — INV-3 (andata e ritorno Windows-1252) non asserita
- `fix-path-action.md` (1): `tests/Unit/Actions/File/FileActionsTest.php`, `tests/Unit/Actions/File/ViewPathActionTest.php` — `FileActionsTest.php:17-19`: l'input non ha backslash e l'atteso rifà lo stesso `str_replace` del codice
- `generate-form-by-file-action.md` (3): `tests/Unit/XotCommandsActionsHundredCoverageTest.php` — INV-1: il test usa un `.txt` esistente, manca il file inesistente; INV-2 e INV-3 senza test
- `generate-table-columns-by-file-action.md` (3): `tests/Unit/XotCommandsActionsHundredCoverageTest.php`, `tests/Unit/XotExecuteCoverage50Test.php` — INV-1: come sopra, solo `.txt`; INV-2: `XotExecuteCoverage50Test.php` non verifica il contenuto riscritto
- `get-all-models-action.md` (2): `tests/Unit/Actions/GetAllModelsActionTest.php` — INV-1 e INV-2 senza test; `GetAllModelsActionTest.php:60-70` non asserisce nulla (`expectNotToPerformAssertions`)
- `get-all-models-by-module-name-action.md` (3): `tests/Unit/ModuleServiceTest.php` — INV-1: manca il caso modulo senza `app/Models`; INV-2 e INV-4 senza test
- `get-class-name-by-path-action.md` (2): `tests/Unit/Actions/File/GetClassNameByPathActionTest.php` — INV-1: «primo match» non asserito (i file di prova hanno un solo namespace e una sola classe); INV-2 senza test
- `get-components-action.md` (5): `tests/Unit/Actions/File/GetComponentsActionTest.php` — INV-2: la cache non è provata (`GetComponentsActionTest.php:36-37` darebbe 1 anche rileggendo); INV-1, INV-3 (sottocartelle), INV-4 (eccezione) senza test
- `get-current-route-handler-action.md` (1): `tests/Unit/Actions/Route/CurrentRouteActionsTest.php` — INV-2: provato il closure, non l'assenza di route
- `get-current-route-view-action.md` (2): `tests/Unit/Actions/Route/CurrentRouteActionsTest.php` — INV-2: nessun segmento omonimo di un parametro; INV-3: «usato solo se» non provato
- `get-export-file-name-action.md` (1): `tests/Unit/Exports/GetExportFileNameActionTest.php` — INV-2: il caso `tableFilters` assente non è provato (solo filtri con valore nullo)
- `get-model-by-model-type-action.md` (2): `tests/Unit/Actions/GetModelActionsTest.php` — INV-1 senza test; INV-3: `GetModelActionsTest.php:71-76` ha `Assert::fail()` dentro il try e `catch (Exception)`: passa anche senza eccezione
- `get-model-class-by-model-type-action.md` (2): `tests/Unit/Actions/GetModelActionsTest.php`, `tests/Unit/Actions/ModelTypeActionsTest.php` — INV-1: `GetModelActionsTest.php:28-33` ha lo stesso difetto del try/catch; INV-2: «valore stringa» non provato
- `get-model-type-by-model-action.md` (1): `tests/Unit/Actions/GetModelActionsTest.php`, `tests/Unit/Actions/ModelTypeActionsTest.php` — i test asseriscono solo `contains('model')` e `is_string` (`GetModelActionsTest.php:84`, `ModelTypeActionsTest.php:23`)
- `get-module-config-action.md` (1): `tests/Unit/Actions/Module/GetModuleConfigActionTest.php` — INV-3 (solo chiavi stringa) senza test
- `get-module-name-by-class-action.md` (1): `tests/Unit/Actions/Module/GetModuleNameActionsTest.php`, `tests/Unit/Actions/Module/ModuleActionsTest.php` — INV-2 è una nota sul codice, non una regola testabile
- `get-module-name-by-model-action.md` (1): `tests/Unit/Actions/Module/GetModuleNameActionsTest.php` — il mock del delegato accetta qualunque argomento: «con `$model::class`» non provato
- `get-module-name-by-model-class-action.md` (1): `tests/Unit/Actions/Module/GetModuleNameActionsTest.php` — INV-2 è una nota sul codice, non una regola testabile
- `get-module-path-action.md` (2): `tests/Unit/Actions/File/GetModulePathActionTest.php`, `tests/Unit/Actions/File/AssetActionsTest.php` — INV-2 e INV-4 senza test
- `get-module-path-by-generator-action.md` (3): `tests/Unit/Actions/Module/GetModuleConfigActionTest.php` — i test citati mockano questa Action: nessuno la esegue
- `get-modules-navigation-items.md` (3): `tests/Unit/XotExecuteCoverage50Test.php` — `XotExecuteCoverage50Test.php` (riga 665): solo `assertNotEmpty`
- `get-pdf-content-by-record-action.md` (4): `tests/Feature/Actions/Pdf/GetPdfContentByRecordActionTest.php` — INV-2 e INV-5: test saltati (`markTestSkipped`, righe 146-150, 180-184); INV-3 senza test; INV-4: i test su `generateFilename` non provano «non restituito né salvato»
- `get-products-array-dummy-action.md` (2): `tests/Unit/Actions/Dummy/GetProductsArrayDummyActionTest.php` — INV-1: `Http::fake` non distingue il metodo HTTP; INV-2 senza test
- `get-pronounceable-password-action.md` (1): `tests/Unit/Actions/String/GetPronounceablePasswordActionTest.php` — INV-3 (alternanza consonante/vocale) non asserita
- `get-properties-from-methods-by-model-action.md` (4): `tests/Unit/XotExecuteCoverage50Test.php` — solo menzione in `XotExecuteCoverage50Test.php`
- `get-route-method-action.md` (1): `tests/Unit/Actions/Route/GetRouteMethodActionTest.php` — INV-1: asserito solo l'array già completo, non l'avvolgimento di uno scalare
- `get-str-between-starts-with-action.md` (2): `tests/Unit/Actions/String/GetStrBetweenStartsWithActionTest.php` — INV-2: «prima occorrenza» non asserita (una sola occorrenza nel test)
- `get-tenant-config-array-action.md` (1): `tests/Unit/Actions/Config/GetTenantConfigActionsTest.php`, `tests/Unit/Actions/Config/GetTenantConfigArrayActionTest.php` — INV-3 (chiavi intere scartate) senza test
- `get-theme-action.md` (1): `tests/Unit/Actions/Theme/ThemeActionsTest.php` — INV-2 (default `'default'`) senza test
- `get-theme-path-action.md` (1): `tests/Unit/Actions/Theme/ThemeActionsTest.php` — INV-2 senza test
- `get-trans-key-action.md` (2): `tests/Unit/Actions/GetTransKeyActionTest.php` — INV-3: `GetTransKeyActionTest.php:10-19` copre `Action` e `RelationManager`, non `_form_schema` né `Resource`; INV-2: misura una tantum
- `get-view-by-class-action.md` (2): `tests/Unit/Actions/ViewActionsTest.php`, `tests/Unit/Actions/View/GetViewByClassActionTest.php` — nessun test asserisce il nome della vista (`View/GetViewByClassActionTest.php:26`: solo `assertIsString`; `ViewActionsTest.php` mocka `ViewFacade::make`)
- `get-year-options-action.md` (1): `tests/Unit/Actions/Config/GetModuleConfigDataActionTest.php` — INV-1 (ConfigData con `YearsConfigContract`) senza test
- `handle-artisan-act-request-action.md` (3): `tests/Unit/Actions/Artisan/HandleArtisanActRequestActionTest.php` — INV-2: i test coprono 9 act, non `clear`, `debugbar:clear`, `error*`; INV-3 e INV-5 senza test
- `has-column-action.md` (1): `tests/Unit/Actions/Model/HasColumnActionTest.php` — tutti e tre i test catturano `Exception` e asseriscono solo `assertIsBool` (`HasColumnActionTest.php:19-24`, `:33-38`, `:47-52`)
- `is-admin-route-action.md` (3): `tests/Unit/Actions/Route/RouteActionsTest.php`, `tests/Unit/XotExecuteCoverage50Test.php` — INV-1: asserito solo `true`; INV-2: solo menzione in `XotExecuteCoverage50Test.php`; INV-3 senza test
- `is-theme-action.md` (1): `tests/Unit/Actions/Theme/ThemeActionsTest.php` — INV-2 senza test
- `list-main-module-candidates-action.md` (2): `tests/Unit/Datas/XotConfigDataTest.php` — INV-1 (solo moduli abilitati) e INV-3 (ordinamento) non asseriti
- `list-supported-locales-action.md` (2): `tests/Unit/Datas/XotConfigDataTest.php` — il test asserisce solo le chiavi `it` e `en` (`XotConfigDataTest.php:83`)
- `make-pdf-spatie-test-action.md` (3): `tests/Unit/Actions/Pdf/MakePdfSpatieTestActionTest.php` — il test non asserisce formato `a4`, `showBackground`, binari; INV-1 e INV-3 senza test
- `measure-action.md` (3): `tests/Unit/Actions/Debug/MeasureActionTest.php` — INV-1: «una sola volta» non asserito; INV-2: la notifica non è verificata
- `model-class-table-exists-by-model-class-actions.md` (3): `tests/Unit/HasXotTableTest.php` — `HasXotTableTest.php` sostituisce l'Action con un mock `overload:`: non la esegue
- `model-has-column-action.md` (2): `tests/Unit/Actions/ModelHasColumnActionTest.php` — INV-2 (cache per processo) e INV-3 senza test
- `model-table-exists-by-model-class-actions.md` (3): `tests/Unit/HasXotTableTest.php` — `HasXotTableTest.php` sostituisce l'Action con un mock `overload:`: non la esegue
- `pa-design-colors-action.md` (2): `tests/Unit/MetatagDataTest.php` — `MetatagDataTest.php:29` confronta il risultato con l'output della stessa Action
- `parse-print-page-string-action.md` (2): `tests/Unit/Actions/Parse/ParsePrintPageStringActionTest.php` — INV-2 e INV-3: test `->todo()` (`ParsePrintPageStringActionTest.php:19`, `:26`)
- `pdf-engine-enum.md` (1): `tests/Unit/Actions/Pdf/PdfActionsTest.php`, `tests/Unit/XotHundredPercentCoverageTest.php` — solo menzione nei test di copertura
- `pdf-pdf-by-html-action.md` (2): `tests/Unit/Actions/Pdf/PdfActionsTest.php` — `PdfActionsTest.php:16-21`: try/catch su `Throwable` che passa sia col risultato sia con l'errore, nessuna regola asserita
- `range-intersect-action.md` (2): `tests/Unit/Actions/Arr/RangeIntersectActionTest.php` — INV-4: il ramo «b1 > b0» non è asserito; INV-5: il caso residuo non è raggiunto (`RangeIntersectActionTest.php:23-27`: i commenti «Case 6» e «Final fallback» descrivono rami che le asserzioni non eseguono)
- `register-blade-components-action.md` (2): `tests/Unit/Actions/Blade/RegisterBladeComponentsActionTest.php` — le asserzioni (`RegisterBladeComponentsActionTest.php:37`, `:55-58`) riguardano la collezione di input, non il registro Blade
- `register-dynamic-routes-action.md` (5): `tests/Unit/Actions/Route/RegisterDynamicRoutesActionTest.php` — INV-1: asserita la classe `InvalidArgumentException`, non il messaggio; INV-2, INV-3 (`[0-9]+`), INV-4 (prefisso `as`), INV-5 senza test
- `resolve-module-config-data-action.md` (2): `tests/Unit/Actions/Config/GetModuleConfigDataActionTest.php` — INV-2: manca la classe esistente che non estende `Data`; INV-3 senza test
- `safe-array-by-model-cast-action.md` (2): `tests/Unit/Actions/Cast/SafeArrayByModelCastActionTest.php`, `tests/Unit/Actions/Cast/EloquentCastActionsTest.php` — INV-1: asserisce chiavi, non l'uguaglianza con `attributesToArray()`; INV-2: il mock non ha un attributo che fallisce
- `safe-array-cast-action.md` (1): `tests/Unit/Actions/Cast/SafeArrayCastActionTest.php`, `tests/Unit/Actions/Cast/SafeCastActionsTest.php` — INV-5 (nessuna eccezione per i tipi non gestiti) non asserita su tutti i tipi
- `safe-attribute-cast-action.md` (3): `tests/Unit/Actions/Cast/SafeAttributeCastActionTest.php` — INV-1: manca il default del getter su null; INV-3 e INV-4 senza test
- `safe-boolean-cast-action.md` (2): `tests/Unit/Actions/Cast/SafeBooleanCastActionTest.php` — INV-2: `si`, `sì`, `on`, `off` non asseriti nel test citato; INV-3 documenta un bug senza test
- `safe-eloquent-cast-action.md` (1): `tests/Unit/Actions/Cast/SafeEloquentCastActionTest.php`, `tests/Unit/Actions/Cast/SafeObjectEloquentCastActionsTest.php` — INV-3 senza test
- `safe-float-cast-action.md` (3): `tests/Unit/Actions/Cast/SafeFloatCastActionTest.php` — INV-2: INF/NAN asseriti solo da stringa, non da float; INV-3 e INV-4 senza test
- `safe-int-cast-action.md` (2): `tests/Unit/Actions/Cast/SafeIntCastActionTest.php`, `tests/Unit/Actions/Cast/SafeCastActionsTest.php` — INV-3 e INV-4 documentano bug senza test
- `safe-nullable-string-cast-action.md` (2): `tests/Unit/Actions/Cast/SafeNullableStringCastActionTest.php` — INV-1: la stringa vuota non è asserita; INV-2 senza test
- `safe-object-cast-action.md` (3): `tests/Unit/Actions/Cast/SafeObjectCastActionTest.php` — INV-1: `isset` su proprietà null non asserito per `hasProperty`; INV-3: il test lancia `Exception`, non `Error`; INV-4 senza test
- `safe-string-cast-action.md` (1): `tests/Unit/Actions/Cast/SafeStringCastActionTest.php` — INV-3 (nessuna eccezione per nessun tipo) senza test
- `save-array-action.md` (1): `tests/Unit/Actions/ArrayArrActionsTest.php` — INV-1: i test asseriscono `true`, non quale strategia ha scritto il file
- `save-json-array-action.md` (3): `tests/Unit/Actions/ArrayArrActionsTest.php`, `tests/Unit/Actions/Arr/SaveArrayActionsTest.php` — INV-2: formattazione non asserita; INV-3 e INV-4 senza test
- `save-php-array-action.md` (2): `tests/Unit/Actions/ArrayArrActionsTest.php` — INV-4 e INV-5 senza test
- `set-theme-action.md` (1): `tests/Unit/Actions/Theme/ThemeActionsTest.php` — INV-2 senza test
- `start-query-log-action.md` (2): `tests/Unit/Actions/Query/QueryActionsTest.php` — `QueryActionsTest.php:15-19`: l'asserzione sta solo nel catch
- `store-has-many-action.md` (2): `tests/Unit/XotHasManyWidgetCoverageTest.php` — nessun test diretto
- `store-pivot-action.md` (1): `tests/Unit/NoDebugCallsInModuleAppCodeTest.php` — nessun test diretto
- `svg-exists-action.md` (2): `tests/Unit/Actions/File/SvgExistsActionTest.php` — INV-1: «senza interrogare il factory» non asserito; INV-2: caso `true` non asserito
- `trans-collection-action.md` (1): `tests/Unit/Actions/Collection/TransCollectionActionTest.php` — INV-3 (elemento vuoto) senza test
- `update-action.md` (4): `tests/Unit/Actions/Model/Update/CustomRelationActionTest.php` — solo test indiretti (con `UpdateAction` sostituita da uno spy)
- `update-has-many-action.md` (3): `tests/Unit/XotHasManyWidgetCoverageTest.php` — nessun test diretto
- `update-morph-many-action.md` (2): `tests/Unit/Actions/Model/Update/MorphManyActionTest.php` — INV-1: `saved === []` non distingue «`saveMany([])` chiamato»; INV-3 senza test
- `utilities-diff-assoc-recursive-action.md` (3): `tests/Unit/Actions/ArrayArrActionsTest.php` — INV-1: `ArrayArrActionsTest.php:41-48` ha `Assert::fail()` dentro il try con `catch (Exception)`: passa anche senza eccezione; INV-2: confronto lasco e strict non distinti
- `view-path-action.md` (1): `tests/Unit/Actions/File/FileActionsTest.php`, `tests/Unit/Actions/File/ViewPathActionTest.php` — INV-2 senza test

### B. Nessun test citato che esista: da scrivere (130 contratti)

Ordine: prima le aree che scrivono su filesystem o lanciano processi (`File`, `Artisan`, `Actions` radice, `Arr`), poi posta, PDF ed export, poi i servizi esterni (traduzione, Ollama), poi le restanti per numero di contratti.

- **Actions/File** (3): `copy-action`, `download-zip-by-paths-disk-action`, `view-copy-action`
- **Actions/Artisan** (6): `clear-artisan-debugbar-files-action`, `clear-artisan-error-log-action`, `clear-artisan-session-files-action`, `run-artisan-command-action`, `show-artisan-error-log-action`, `show-artisan-route-list-action`
- **Actions** (9): `config-action`, `execute-artisan-command-action`, `generate-pdf-action`, `get-view-action`, `html-action`, `module-action`, `theme-action`, `url-action`, `xot-action`
- **Actions/Arr** (1): `ensure-keys-action`
- **Actions/Mail** (2): `send-mail-by-record-action`, `send-mail-by-records-action`
- **Actions/Pdf** (3): `content-pdf-action`, `download-pdf-by-view-action`, `stream-download-pdf-action`
- **Actions/Pdf/Engine** (2): `spatie-pdf-by-html-action`, `spipu-pdf-by-html-action`
- **Actions/Export** (7): `export-xls-by-lazy-collection`, `export-xls-by-query`, `export-xls-by-view`, `pdf-by-html-action-portrait`, `pdf-by-model-action`, `pdf-by-view-action`, `xls-by-model-class-action`
- **Actions/Import** (1): `import-csv-action`
- **Actions/Translation** (6): `apertium-translate-action`, `base-translate-action`, `deep-l-translate-action`, `google-translate-action`, `my-memory-translate-action`, `systran-translate-action`
- **Actions/AI/Ollama** (2): `chat-ollama-action`, `generate-ollama-action`
- **Actions/Model** (12): `create-morph-to-one-related-model-action`, `delete-table-index-by-model-class-index-name-action`, `filter-relations-action`, `generate-model-by-table-action`, `get-first-model-class-by-model-name-action`, `get-model-class-by-model-name-action`, `get-model-fields-by-model-action`, `get-schema-manager-by-model-class-action`, `get-sicure-array-by-model-action`, `get-table-indexes-by-model-class-action`, `model-get-trans-key-by-model-class-action`, `store-action`
- **Actions/Model/Update** (11): `relation-action`, `update-belongs-to-action`, `update-belongs-to-many-action`, `update-has-many-deep-action`, `update-has-many-through-action`, `update-has-one-action`, `update-morph-one-action`, `update-morph-to-many-action`, `update-morph-to-one-action`, `update-morphed-by-many-action`, `update-pivot-action`
- **Actions/Model/Store** (10): `store-belongs-to-action`, `store-belongs-to-many-action`, `store-has-many-deep-action`, `store-has-many-through-action`, `store-has-one-action`, `store-morph-many-action`, `store-morph-one-action`, `store-morph-to-many-action`, `store-morph-to-one-action`, `store-morphed-by-many-action`
- **Actions/Filament** (9): `auto-label-action`, `get-navigation-item-by-modulename`, `get-panels-navigation-items`, `get-related-resource-class-action`, `get-resource-class-name-by-model-class-action`, `get-sidebar-state-script-action`, `panel-module-action`, `plain-text-from-filament-value-action`, `render-context-navigation`
- **Actions/ModelClass** (7): `fake-seeder-action`, `get-method-body-action`, `guess-morph-pivot-action`, `guess-pivot-action`, `guess-pivot-full-class-action`, `model-class-copy-from-last-year-action`, `select-action`
- **Actions/Filament/Actions** (5): `copy-from-last-year-button`, `export-button`, `filament-actions-copy-from-last-year-action`, `filament-actions-view-copy-action`, `import-button`
- **Actions/View** (5): `get-view-by-model-class-action`, `get-view-dir-action`, `get-view-path-action`, `get-views-siblings-and-self-action`, `view-get-view-name-space-path-action`
- **Actions/Trend/Adapters** (4): `abstract-adapter`, `my-sql-adapter`, `pgsql-adapter`, `sqlite-adapter`
- **Actions/Trend/Format** (4): `base-format-action`, `my-sql-format-action`, `pgsql-format-action`, `sqlite-format-action`
- **Actions/Factory** (2): `get-factory-action`, `get-faker-action`
- **Actions/Panel** (2): `apply-metatag-to-panel-action`, `apply-tenancy-to-panel-action`
- **Actions/Trans** (2): `get-trans-filename-action`, `trans-get-trans-key-by-model-class-action`
- **Actions/Composer** (1): `register-runtime-psr4-namespaces-action`
- **Actions/Design** (1): `get-pa-filament-palette-action`
- **Actions/Filament/Block** (1): `get-view-blocks-options-by-type-action`
- **Actions/Filament/Filter** (1): `get-year-filter`
- **Actions/Generate** (1): `generate-model-by-model-class`
- **Actions/Geo** (1): `get-distance-expression-action`
- **Actions/Html** (1): `html-to-pdf-action`
- **Actions/Query** (1): `get-fieldnames-by-tablename-action`
- **Actions/Route** (1): `get-route-parameters-action`
- **Actions/Testing** (1): `resolve-shared-sqlite-path-action`
- **Actions/Theme** (1): `get-theme-context-action`
- **Actions/Tree** (1): `get-tree-options-by-model-class-action`
- **Actions/Trend** (1): `build-trend-collection-action`
- **Actions/Utilities** (1): `utilities-range-intersect-action`
- **Actions/Xot** (1): `get-tenant-class-action`

### C. Contract di framework (2 contratti, 6 invarianti)

- `bootstrap-provider-registry.md`: `XOT-BOOTSTRAP-INV-2` e `XOT-BOOTSTRAP-INV-3` hanno un test (`tests/Unit/Bootstrap/FolioProviderNotRegisteredTest.php`, `tests/Unit/Bootstrap/ModuleProvidersDeclareTheirNamespaceTest.php`); `XOT-BOOTSTRAP-INV-1` non ne ha.
- `xotbase-classes.md`: `XOT-XOTBASE-INV-1` ha le regole Pest arch di `tests/Arch/ArchitectureTest.php` (righe 29-38 e 165), `XOT-XOTBASE-INV-2` il test dei provider; `XOT-XOTBASE-INV-3` è una voce di review senza controllo.

## Avvertenze

- Gli ID di `save-php-array-action`, `save-json-array-action`, `execute-artisan-command-action` e `send-mail-by-record-action` sono stati rinominati per coincidere con i group che i loro test portavano già (`XOT-SAVE-PHP-INV-N`, `XOT-SAVE-JSON-INV-N`, `XOT-ARTISAN-EXEC-INV-N`, `XOT-MAIL-RECORD-INV-N`); la corrispondenza vecchio→nuovo è scritta sotto la tabella di ciascun contratto. I contratti non erano ancora tracciati in Git e nessun altro documento cita gli ID precedenti.
- Gli altri contratti sono stati riportati al formato `| ID | Regola | Group Pest |` senza riscriverne il contenuto: il testo di ogni regola, i riferimenti a riga e i test citati sono quelli del contratto precedente (colonne «Prova nel codice» e «Test esistente» confluite nella cella Regola come «Codice:» e «Test citato»).
- Riferimenti a riga: «classe a riga N» e «`execute()` a riga N» sono stati ricontrollati contro il sorgente il 2026-11-26 e corretti (128 numeri in 65 contratti, scarto da 1 a 5 righe). Gli intervalli «righe N-M» dentro le tabelle non sono stati ricontrollati contratto per contratto e possono avere lo stesso scarto: fanno fede il nome del metodo e la regola, non il numero.
- Il numero di invarianti dimostrate (93) non è una misura di qualità del codice: dice solo quante promesse hanno un comando `--group` che le prova.

## Harness minimo: ownership, evidenza e recupero (2026-11-27)

I contratti di **module_xot_fila5** restano accanto alle Action, interfacce o superfici di questo package; root e Xot definiscono lo standard, non copiano le promesse. Un contratto comportamentale esplicita **Input, Output, Invarianti, Effetti collaterali, Errori, Non fa**; ogni ID di invariante punta a un group Pest effettivo oppure segnala `non dimostrata`. Se esiste la classe, il docblock deve rimandare al file con `@contract` e `@see`; per temi senza classi PHP non inventare Action/contratti.

- [Standard Xot](https://github.com/laraxot/module_xot_fila5/blob/dev/docs/contracts/contract-authoring-standard.md) · [ownership root](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/adr/0001-harness-minimo-e-ownership.md) · [runbook ECC/Second Brain](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/harness/README.md).
- **BMAD**: prima di cambiare una promessa, fissa nella story owner scope, esclusioni, evidenza e approvazioni richieste.
- **ECC**: i marker di merge rendono invalido l'indice; citare una suite non significa averla eseguita. Distingui `pass`, `fail`, `non eseguito` e registra il debito in [rollout #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).

## Documenti del package da riconciliare nell'indice

I seguenti file **esistono nel repository su `dev`** e non erano tutti collegati nel ramo d'indice più recente. Sono preservati come puntatori documentali; il loro stato di approvazione, la copertura e l'eventuale sostituzione con ADR numerati devono essere verificati nell'owner. Nessuna prova di esecuzione è implicita.

- [ExecuteArtisanCommandAction](./execute-artisan-command-action.md)
- [SaveArrayAction](./save-array-action.md)
- [SaveJsonArrayAction](./save-json-array-action.md)
- [SavePhpArrayAction](./save-php-array-action.md)
- [SendMailByRecordAction](./send-mail-by-record-action.md)
