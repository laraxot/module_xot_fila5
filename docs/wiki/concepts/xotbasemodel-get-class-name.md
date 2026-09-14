---
title: "XotBaseModel::getClassName — basename da static, namespace dal chiamante"
type: concept
module: Xot
tags: [xotbasemodel, getclassname, phpstan, dry, leaf, models, backtrace]
created: 2026-07-27
updated: 2026-09-02
qmd: "XotBaseModel getClassName static backtrace caller namespace CriteriOption BaseScheda StabiDirigente"
related:
  - ./basemodel-connection-religion.md
  - ../../../Ptv/docs/wiki/concepts/criteri-model-class-resolution.md
  - ../../../Ptv/docs/dynamic-class-resolution-pattern.md
---

# XotBaseModel::getClassName

> **Rettifica 2026-09-02.** La versione precedente di questa pagina documentava una
> firma `getClassName(string $fallback)` che **non è mai esistita nel codice**
> (verificato con `git log -S 'function getClassName'` + `git show` sulle versioni
> storiche: la firma è sempre stata senza argomenti). Un agente si era già fidato
> della pagina e aveva riscritto i chiamanti su un'API inventata. La verifica sul
> codice (`git log -S`) batte la documentazione — sempre.

## Perché

I modelli base in moduli piattaforma (es. `Ptv\BaseScheda`, `Ptv\StabiDirigente`)
devono risolvere il **concreto del modulo chiamante** nello stesso namespace
`Models\` (es. `Progressioni\Models\CriteriOption`), non restare sul prototype Ptv.

## API reale (senza argomenti)

```php
/** @return class-string<\Illuminate\Database\Eloquent\Model> */
public static function getClassName(): string
```

Meccanica:

1. **basename** ← `static::class` (la classe su cui chiami il metodo, es. `CriteriOption`)
2. **namespace** ← l'**oggetto chiamante** trovato in `debug_backtrace()`
   (primo frame con `object` la cui classe contiene `Models\` o `Filament\Resources\`;
   se l'oggetto espone `getModelClass()`, si usa quello)
3. risultato = `{namespace-chiamante}\Models\{basename}` con `Assert::classExists`
   + `Assert::subclassOf(Model)`

Ecco perché **non servono argomenti**: la classe invocata dà il basename, il
chiamante dà il namespace. Un argomento non avrebbe niente da aggiungere.

## Chiamata corretta

```php
// da Progressioni\Models\Scheda → Progressioni\Models\CriteriOption
CriteriOption::getClassName();

// da un contesto Filament di Ptv → Ptv\Models\StabiDirigente
StabiDirigente::getClassName();
```

## Anti-pattern

```php
StabiDirigente::getClassName(StabiDirigente::class); // ❌ firma inesistente
static::getClassName(CriteriOption::class);          // ❌ firma inesistente
static::getClassName();                              // ❌ LSB: perde il basename voluto
                                                     //    se chiamato dal base per un sibling
```

## Vincolo sul chiamante

Il backtrace deve contenere un oggetto con `Models\` o `Filament\Resources\` nel
FQCN (o con `getModelClass()`): chiamate da contesti anonimi/closure pure lanciano
`RuntimeException('Unable to resolve caller object...')`.

<<<<<<< HEAD
<<<<<<< HEAD
## Un resolver scritto a mano **non** e' un'alternativa: e' il difetto

> **Rettifica 2026-09-09.** La prima stesura di questa sezione sosteneva il contrario —
> che `HasRatingsTrait::resolveRatingClass()` non fosse sostituibile da
> `Rating::getClassName()` perche' aveva un fallback. Era sbagliato, e sbagliato nel
> modo peggiore: difendeva il duplicato invece di misurarlo. Lasciata la traccia
> perche' l'errore e' istruttivo.

`HasRatingsTrait` aveva un metodo privato che rifaceva a mano quello che
`getClassName()` fa gia':

```php
$namespace = Str::beforeLast(static::class, '\Models\');
$moduleRatingClass = $namespace.'\Models\Rating';
if (class_exists($moduleRatingClass) && is_subclass_of($moduleRatingClass, BaseRating::class)) {
    return $moduleRatingClass;
}
return Rating::class;   // <- il "fallback"
```

### Perche' quel fallback e' una perdita di dati, non una rete di sicurezza

Ogni modulo ha il **suo** `Models\Rating`, e ognuno vive su una **connessione
diversa** con lo **stesso nome di tabella**:

| modulo | connessione | tabella |
|---|---|---|
| `Rating` | `rating` | `ratings` |
| `Progressioni` | `progressione` | `ratings` |
| `IndennitaResponsabilita` | `indennita_responsabilita` | `ratings` |
| `Ptv` | `ptv` | `ratings` |
| `Performance` | `performance` | `ratings` |
| `IndennitaCondizioniLavoro` | `indennita_condizioni_lavoro` | `ratings` |

Un host il cui modulo non ha ancora il proprio `Models\Rating` non riceveva un errore:
riceveva `Modules\Rating\Models\Rating`, e quindi **leggeva e scriveva le valutazioni
sul database di un altro modulo**. Stessa tabella, connessione diversa, zero eccezioni.
E' la forma esatta di «l'errore che funziona non si vede».

`getClassName()` in quel caso fa `Assert::classExists()` e **lancia**. Non e' una
regressione: e' la diagnosi. Dice «a questo modulo manca `Models\Rating`», che e'
l'unica cosa vera da dire.

### Le tre obiezioni che sembravano buone e non lo sono

1. **«Il backtrace e' fragile.»** Dal corpo di un metodo del trait il chiamante e'
   sempre `$this`, cioe' l'host, il cui FQCN contiene `Models\`. Il caso
   «nessun frame utile» non e' raggiungibile da li'. Il rischio era inventato.
2. **«`static::class` e' un dato certo.»** Lo e' finche' l'host sta in un namespace
   `\Models\`. `Str::beforeLast()` con l'ago assente **restituisce l'intera stringa**:
   un host fuori da `\Models\` produceva un candidato inesistente e cadeva nel
   fallback — di nuovo, in silenzio, sul DB sbagliato.
3. **«La guardia `is_subclass_of` si perde.»** No: ogni chiamante fa gia'
   `Assert::subclassOf($related, BaseRating::class)` subito dopo. La guardia nel
   resolver era ridondante, e serviva solo a trasformare un errore in un ripiego.

### La regola

Dove esiste una primitiva del framework, **il resolver scritto a mano e' il difetto**,
non un vincolo su cui progettare. `getClassName()` risolve il gemello nello stesso
namespace del chiamante e **pretende che esista**: e' quello che vogliamo, perche' in
questo monorepo «il gemello non esiste» significa «stai per scrivere su un altro
database».

Sostituzione applicata il 2026-09-09 su tutti e cinque i punti di
`HasRatingsTrait` (`ratingMorphs`, `ratings`, `ratingObjectives`, `myRatings`,
`syncRatingsWhere`), metodo `resolveRatingClass()` rimosso. Verifica funzionale:
`Progressioni\Models\Scheda::ratings()` -> `Progressioni\Models\Rating` su
connessione `progressione`; `Ptv\Models\Scheda::ratings()` -> `Ptv\Models\Rating`
su connessione `ptv`.

=======
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
## Gate

Introdotto per azzerare PHPStan L10 su `Modules` (2026-07-27): 30 errori in
`Ptv\BaseScheda` per metodo inesistente.

## Vedi

- [criteri-model-class-resolution](../../../Ptv/docs/wiki/concepts/criteri-model-class-resolution.md) (canon Ptv, rettificato 2026-08-05)
- [dynamic-class-resolution-pattern](../../../Ptv/docs/dynamic-class-resolution-pattern.md)
