---
title: "ADR 0008 — No standalone Livewire, usa Filament widget"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-26
qmd: "0008 filament widgets over standalone livewire"
issues:
  - "https://github.com/laraxot/module_xot_fila5/issues/ADR-0008"
---

# ADR 0008: No standalone Livewire, usa Filament widget

## Contesto

Il progetto usa Filament 5 come pannello amministrativo e come sistema di componenti UI. Livewire è una dipendenza di Filament, ma l'uso di componenti Livewire standalone (senza passare per Filament) introduce complessità:

- Due sistemi di componenti paralleli da mantenere
- Duplicazione della logica di validazione e autorizzazione
- Difficoltà nel testare componenti Livewire isolati (richiedono LivewireTestCase)
- Incoerenza nello stile e nei pattern del codice

## Decisione

**Non si usano componenti Livewire standalone.** Tutti i componenti UI interattivi devono essere implementati come:

1. **Filament Widget** — per componenti riutilizzabili (dashboard, statistiche, form)
2. **Filament Resource** — per CRUD e tabelle
3. **Filament Page** — per pagine standalone
4. **Blade + Alpine.js** — per logica frontend semplice senza backend PHP

## Driver della decisione

- I widget devono appartenere al pannello che li espone.
- Il modulo Xot deve riusare i punti di estensione Filament invece di creare superfici Livewire parallele.

## Alternative scartate

- Creare componenti Livewire standalone per ogni interazione: duplica stato,
  lifecycle e autorizzazione già forniti da Filament.
- Usare Blade e JavaScript ad hoc come superficie primaria: rompe l'integrazione
  con gli schemi Filament e rende più difficile il test.
- Duplicazione dello stesso widget in più moduli.

## Conseguenze

### Positive
- Un solo sistema di componenti da mantenere
- Coerenza stilistica e funzionale
- Testing semplificato tramite FilamentTestCase
- Supporto per temi, plugin e configurazioni centralizzate

### Negative
- Per componenti molto specifici, Filament può sembrare sovra-strutturato
- La curva di apprendimento di Filament è più ripida rispetto a Livewire puro

## Esempio di codice

### Errato (Livewire standalone)
```php
// app/Livewire/Stats.php
class Stats extends Component
{
    public function render()
    {
        return view('livewire.stats');
    }
}
```

### Corretto (Filament Widget)
```php
// Modules/Fixcity/app/Filament/Widgets/StatsWidget.php
class StatsWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    public function mount(): void
    {
        $this->data = $this->loadStats();
    }
}
```

## Quando NON si applica

- Componenti legacy già esistenti: si possono mantenere finché non vengono refactorizzati
- Librerie esterne che dipendono da Livewire: si integrano tramite wrapper Filament

## Cross-link

- Wiki: no-standalone-livewire-classes (riferimento non presente in questo checkout)
- [Filament 5 Docs](https://filamentphp.com/docs/5.x)
- [Laravel Livewire Docs](https://livewire.laravel.com/docs) (per riferimento)

## Conferma

Conferma parziale: `Modules/Xot/tests/Unit/NoLivewireDirectoriesInModulesTest.php` (da `laravel/`: `vendor/bin/pest Modules/Xot/tests/Unit/NoLivewireDirectoriesInModulesTest.php`) fallisce se ricompare una cartella `Modules/*/app/Http/Livewire`. Non prova che i widget siano Filament né che non esistano componenti Livewire altrove: per questo resta una voce di review (una classe `Livewire\Component` nuova in un modulo si respinge con un rimando a questo ADR). Il test c'è ma non è eseguito in questa passata.
