---
title: "Inventario Xot — Livewire HTTP → Filament (canone)"
type: inventory
module: Xot
status: verified
related:
  - ./livewire-widget-conversion.md
  - ./livewire-widget-prd.md
  - ./livewire-widget-architecture.md
  - ./livewire-widget-tech-spec.md
  - ./livewire-widget-product-brief.md
  - ./livewire-widget-epics.md
  - ./livewire-widget-decision-log.md
  - ./livewire-widget-project-context.md
  - ./livewire-widget-brainstorming.md
  - ./livewire-widget-ux.md
  - ../stories/12.1.xot-livewire-aliases.story.md
  - ../../User/docs/bmad/livewire-inventory.md
---

# Inventario Xot: Livewire HTTP → Filament

Xot è il modulo piattaforma: qui non vivono feature applicative, quindi il perimetro reale di
questo inventario è molto più piccolo di un modulo foglia (User, Job, Lang, ecc.). Nessuna
classe concreta da convertire in widget; il lavoro utile è ritirare alias Blade orfani che
puntano a componenti Livewire mai esistiti o risolti verso un modulo estraneo.

## Classi Livewire reali

| Classe | Percorso | Note |
|---|---|---|
| `XotBaseComponent` | `app/Http/Livewire/XotBaseComponent.php` | Astratta, unica classe del modulo. Fornisce `getView()`/`render()` generici per le classi foglia di altri moduli. Non è mai registrata nel registro Livewire: `GetComponentsAction::execute()` scarta le classi astratte via `ReflectionClass::isAbstract()` (`app/Actions/File/GetComponentsAction.php:104-107`). Nessun alias, nessun mount hook, nessuna vista propria da verificare. |

Non esiste nessun'altra classe in `app/Http/Livewire/` di Xot. È l'intero contenuto della
directory.

## Alias nelle viste admin, niente classe PHP in Http/Livewire

Tre viste sotto `admin/**` montano un alias Livewire per cui **non esiste alcuna classe PHP nel
repository** (vendor escluso, verificato con `grep -rln "class ManageLangModule\|class Test" Modules
--include=*.php` incrociato con l'assenza di un namespace Xot per `test`):

| Alias | Vista (file:line) | Classe risolta nel registro globale | Esito |
|---|---|---|---|
| `manage_lang_module` | `app/Resources/views/admin/index/acts/manage_lang_module.blade.php:18` | Nessuna — nessuna classe `ManageLangModule` in tutto il repo | Alias orfano |
| `manage_lang_module` | `app/Resources/views/admin/acts/manage_lang_module.blade.php:8` | Nessuna | Alias orfano |
| `test` | `app/Resources/views/admin/index/acts/test.blade.php:8` | `Modules\Geo\Http\Livewire\Test` (`Modules/Geo/app/Http/Livewire/Test.php:16`) | Risolve a un modulo estraneo (Geo), non a Xot |

Ognuna di queste viste ha un duplicato byte-identico sotto `resources/views/admin/...`
(verificato con `diff`, non un symlink): il mirror storico `app/Resources/views` ↔
`resources/views` si applica anche a questi file morti.

## Meccanismo di registrazione: perché `test` risolve a Geo e non a Xot

`Modules/Xot/app/Providers/XotBaseServiceProvider.php:140-144` chiama
`registerLivewireComponents()` con `$prefix = ''` **sempre**, per ogni modulo. Il loop in
`Modules/Xot/app/Actions/Livewire/RegisterLivewireComponentsAction.php` esegue
`Livewire::component($comp->name, $comp->ns)` senza namespacing per modulo: è un registro
globale piatto. Il nome viene calcolato da
`Modules/Xot/app/Actions/File/GetComponentsAction.php:83`
(`Str::slug(Str::snake(Str::replace('\\', ' ', $class_name)))`), quindi due moduli con una
classe omonima in `Http/Livewire` collidono nello stesso alias. `Modules\Geo\Http\Livewire\Test`
(`Modules/Geo/app/Http/Livewire/Test.php`, classe concreta, riga 16) vince la registrazione per
l'alias `test` semplicemente perché è l'unica classe concreta con quel nome nel repository:
montare `@livewire('test')` in una vista Xot non aggancerebbe mai codice di Xot.

## Widget gemello verificato e scartato

Prima di proporre un nuovo widget per l'alias `test`, verificato se esiste già un gemello in
`Modules/Xot/app/Filament/Widgets/`. Esiste `TestWidget.php` (`app/Filament/Widgets/TestWidget.php`,
24 righe), ma **non è un gemello funzionale** della vista `admin/index/acts/test.blade.php`: è
un widget di autoverifica interno, referenziato solo da
`Modules/Xot/tests/Unit/XotExecuteCoverage50Test.php` alle righe 69, 450, 694, mai montato in
nessun `AdminPanelProvider` né collegato all'alias Livewire `test`. Non è quindi un caso Cluster
B (nessun ritiro HTTP verso un gemello esistente): l'alias `test` è semplicemente orfano/dead
code, punto pieno.

## Perché queste viste non sono solo da ritirare per pulizia, sono già codice morto

Le directory `admin/index/acts/` e `admin/acts/` (con i duplicati sotto `resources/views/...`)
non sono raggiungibili da nessuna rotta, controller o `@include` del repository. Verificato con:

```bash
grep -rn "index\.acts\|home\.acts\|admin\.acts" Modules --include=*.php --include=*.blade.php
```

L'unico risultato è la regola di riscrittura in `Modules/Xot/app/Actions/GetViewAction.php:68`,
che mappa `::panels.actions.*-action` verso `::admin.home.acts.*` (fuori pannello:
`::home.acts.*`) — nota il segmento `home`, non `index`: questa regola non raggiunge mai
`admin/index/acts/` né `admin/acts/`. Nessun'altra Action, provider o rotta dinamica referenzia
questi due path. Il segmento `acts` compare anche in `RegisterDynamicRoutesAction` /
`RouteDynAction` / `RouteDynService`, ma è un meccanismo di routing diverso (sotto-azioni di
configurazione route), non le directory Blade `admin/*/acts/`: i due usi della parola vanno
tenuti distinti.

La vista `app/Resources/views/livewire/manage_lang_module.blade.php` (quella che un ipotetico
componente `ManageLangModule` userebbe via `XotBaseComponent::getView()`) è a sua volta
irraggiungibile: l'unico riferimento a `xot::livewire.manage_lang_module.edit` in tutto il repo
è dentro un commento HTML nella stessa vista (righe 26-27), non in codice PHP eseguibile. È fuori
scope della story 12.1 (quella è sotto `admin/`, questa sotto `livewire/`), segnalata come
follow-up.

## Alias fuori scope, non toccati in questa campagna

| Alias | Vista (file:line) | Classe | Motivo esclusione |
|---|---|---|---|
| `rate_single` | `app/Resources/views/livewire/rate_it.blade.php:9` | Nessuna | FO voto, non chrome admin — fuori scope PRD ([Source: livewire-widget-prd.md#out-of-scope]) |
| `rate.single` | `app/Resources/views/livewire/rate/multi.blade.php:15` | Nessuna | Idem |

## Classificazione finale (Cluster A/B/C)

- **Cluster A (chrome montato via render hook, candidato a nuovo `XotBaseWidget`): 0.**
  Nessun render hook nei tre provider Filament di Xot monta un alias `@livewire()`.
- **Cluster B (HTTP orfano con gemello widget funzionante, si ritira solo l'HTTP): 0.**
  `TestWidget.php` non è un gemello funzionale (vedi sopra): non c'è nessun caso B reale in
  Xot.
- **Cluster C (non candidato a widget, va solo documentato/escluso): 1 classe reale +
  3 alias orfani.**
  - `XotBaseComponent.php`: base strutturale piattaforma, non un controllo da montare
    (`FR-X004`, [Source: livewire-widget-prd.md#FR-X004]).
  - `manage_lang_module` (×2 viste), `test`: alias morti, nessuna classe Xot dietro, viste
    irraggiungibili da rotta. Vedi story 12.1 per il ritiro.
  - `rate_single` / `rate.single`: alias orfani ma esplicitamente fuori scope (FO voto).

## Stato implementazione

Le tre viste `manage_lang_module`/`test` sotto `admin/index/acts/` e `admin/acts/` (e i
duplicati sotto `resources/views/...`, 6 file totali) risultano **già cancellate su disco**
(`git status --short` le mostra come ` D`, non ancora committate) — coerente con gli AC #1-#3
della story 12.1, ma questa sessione di documentazione non ha eseguito la cancellazione. Va
verificato da chi ha eseguito l'implementazione, prima del commit, che corrisponda esattamente
allo scope della story (solo questi 6 file, `rate_it.blade.php`/`rate/multi.blade.php` e
`XotBaseComponent.php` esclusi — confermato invariati con `git diff --stat`).

## Vedi anche

- [livewire-widget-project-context.md](./livewire-widget-project-context.md) — costituzione piattaforma
- [livewire-widget-prd.md](./livewire-widget-prd.md) — FR-X001..FR-X004
- [12.1.xot-livewire-aliases.story.md](../stories/12.1.xot-livewire-aliases.story.md) — story di ritiro
- [User/docs/bmad/livewire-inventory.md](../../User/docs/bmad/livewire-inventory.md) — riferimento di stile e metodo
