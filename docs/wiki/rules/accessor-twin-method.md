---
title: "Contratto accessor Eloquent e gemello nello stesso file"
type: rule
module: Xot
status: active
created: 2026-11-05
updated: 2026-11-05
tags: [eloquent, accessor, mutator, same-file, quality]
qmd: "Eloquent get Attribute accessor public value gemello get stesso file delega calcolo puro cache"
related:
  - ../../../../Sigma/docs/bmad/accessor-twin-method.md
  - ../../../../Ptv/docs/bmad/accessor-twin-method.md
  - ../../bmad/stories/accessor-twin-contract-audit.story.md
---

# Contratto accessor Eloquent e gemello nello stesso file

## Regola

Per ogni accessor Eloquent legacy `get{Nome}Attribute()` nel codice applicativo,
`get{Nome}()` deve essere dichiarato nello **stesso file e nella stessa classe o
trait**. L'accessor è pubblico, accetta un solo parametro pubblico `$value` con
tipo esplicito coerente con il valore grezzo e delega il calcolo al gemello.
Anche il gemello è pubblico e ha un tipo di ritorno esplicito.

```php
public function getGgParttimevertAnnoAttribute(?float $value): ?float
{
    if ($value !== null) {
        return $value;
    }

    $value = $this->getGgParttimevertAnno();

    if ($this->getKey() !== null) {
        static::withoutEvents(function () use ($value): void {
            $this->update(['gg_parttimevert_anno' => $value]);
        });
    }

    return $value;
}

public function getGgParttimevertAnno(): float
{
    // Calcolo di dominio senza scritture sul modello.
}
```

L'esempio è il contratto, non una ricetta universale per persistire ogni
accessor. Il comportamento di cache e scrittura resta quello deciso dal dominio.

## Perché la coppia è divisa

- **Accessor:** confine Eloquent per leggere il valore grezzo già presente,
  delegare quando manca e, solo quando previsto, aggiornare la cache persistita.
- **Gemello:** calcolo richiamabile direttamente da Action, UI, query applicative
  e test; non modifica `$this->attributes`, non chiama `save()`/`update()` e non
  dipende dal fatto che Eloquent stia serializzando il modello.
- **Stesso file e tipo:** il codice che dichiara il contratto Eloquent ne contiene
  anche l'implementazione richiamata. Un gemello in un altro file può sparire,
  essere shadowed o non essere quello invocato dalla composizione dei trait.
- **Visibilità pubblica:** il calcolo è un punto d'ingresso applicativo; `protected`
  porta la chiamata esterna a cadere nel `__call()` magico di Eloquent.
- **Valore grezzo tipizzato:** `$value` è il dato passato da Eloquent per quello
  specifico attributo. Non si rilegge `$this->attributes['x']` senza guardia e non
  si forza un default che sovrascriva un valore reale.

## Accessori derivati e relazioni

Un attributo derivato senza colonna ha comunque il gemello nello stesso file e
l'accessor delega direttamente; non aggiunge scritture o una cache inesistente.
Prima di introdurre un accessor, verificare che non mascheri una relazione
Eloquent omonima. Non generare accessor automaticamente dai gemelli: la regola è
accessor → gemello, non il contrario.

I nuovi accessor moderni che restituiscono `Illuminate\Database\Eloquent\Casts\Attribute`
seguono il contratto Laravel moderno e non sono metodi `get{Nome}Attribute()`;
non rientrano in questa regola legacy.

## Verifica e inventario

Il controllo automatico deve segnalare separatamente:

1. gemello mancante nello stesso file/tipo;
2. accessor o gemello non pubblico;
3. `$value` assente o senza tipo, o firma accessor diversa da un solo parametro;
4. accessor che non invoca `$this->get{Nome}()`.

Riferimento operativo: `php artisan xot:check-accessor-twins --fail-on-missing`.
La reportistica deve deduplicare per file e riga: il medesimo trait può comparire
in molte classi concrete e non va contato più volte.
