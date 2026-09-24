# Widget Implementation Rules - Xot Module

## 🎯 Regole Fondamentali per Widget

### 1. **Tipi di Widget Disponibili**

#### **XotBaseWidget** - Per widget con form
```php
// ✅ CORRETTO - Widget con form
class MyFormWidget extends XotBaseWidget
{
    public function getFormSchema(): array
    {
        return [
            // Form components
        ];
    }
}
```

#### **XotBaseTableWidget** - Per widget di tabella
```php
// ✅ CORRETTO - Widget di tabella
class MyTableWidget extends XotBaseTableWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns($this->getTableColumns());
    }
}
```

### 2. **MAI mescolare i tipi**
```php
// ❌ SBAGLIATO - XotBaseWidget per tabella
class MyTableWidget extends XotBaseWidget
{
    public function table(Table $table): Table
    {
        // XotBaseWidget richiede getFormSchema()!
    }
}

// ✅ CORRETTO - XotBaseTableWidget per tabella
class MyTableWidget extends XotBaseTableWidget
{
    public function table(Table $table): Table
    {
        // XotBaseTableWidget è progettato per tabelle
    }
}
```

### 3. **Metodi Obbligatori per Tipo**

#### **XotBaseWidget**
- `getFormSchema(): array` - **OBBLIGATORIO**

#### **XotBaseTableWidget**
- `table(Table $table): Table` - **OBBLIGATORIO**
- `getTableQuery()` - **OBBLIGATORIO**
- `getTableColumns(): array` - **OBBLIGATORIO**

## 🏗️ Implementazione Corretta

### 1. **Widget con Filtri (XotBaseWidget)**
```php
<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\<nome progetto>\Filament\Widgets;
=======
>>>>>>> laraxot/dev
=======
<<<<<<< HEAD
namespace Modules\<nome progetto>\Filament\Widgets;
=======
>>>>>>> laraxot/dev
=======
namespace Modules\<nome progetto>\Filament\Widgets;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
namespace Modules\<nome progetto>\Filament\Widgets;
>>>>>>> 8d801bbe (Check & fix styling)
=======
namespace Modules\<nome progetto>\Filament\Widgets;
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DmPadP

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

class QuestionChartFilterWidget extends XotBaseWidget
{
    protected static ?string $heading = 'Filter Options';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 1;

    public ?string $dateFrom = null;
    public ?string $dateTo = null;
    public ?string $answerFilter = null;

    public function getFormSchema(): array
    {
        return [
            DatePicker::make('dateFrom')
                ->live()
                ->afterStateUpdated(fn () => $this->updateFilters()),
<<<<<<< HEAD
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_DmPadP

            DatePicker::make('dateTo')
                ->live()
                ->afterStateUpdated(fn () => $this->updateFilters()),

<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_DmPadP
=======
            
            DatePicker::make('dateTo')
                ->live()
                ->afterStateUpdated(fn () => $this->updateFilters()),
            
>>>>>>> laraxot/dev
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_DmPadP
            Select::make('answerFilter')
                ->options([
                    'all' => 'All Answers',
                    'answered' => 'Answered Only',
                    'not_answered' => 'Not Answered',
                ])
                ->default('all')
                ->live()
                ->afterStateUpdated(fn () => $this->updateFilters()),
        ];
    }

    public function updateFilters(): void
    {
        $this->dispatch('filters-updated', [
            'dateFrom' => $this->dateFrom,
            'dateTo' => $this->dateTo,
            'answerFilter' => $this->answerFilter,
        ]);
    }
}
```

### 2. **Widget di Tabella (XotBaseTableWidget)**
```php
<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\<nome progetto>\Filament\Widgets;
=======
>>>>>>> laraxot/dev
=======
<<<<<<< HEAD
namespace Modules\<nome progetto>\Filament\Widgets;
=======
>>>>>>> laraxot/dev
=======
namespace Modules\<nome progetto>\Filament\Widgets;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
namespace Modules\<nome progetto>\Filament\Widgets;
>>>>>>> 8d801bbe (Check & fix styling)
=======
namespace Modules\<nome progetto>\Filament\Widgets;
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DmPadP

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Xot\Filament\Widgets\XotBaseTableWidget;

class QuestionChartDataWidget extends XotBaseTableWidget
{
    protected static ?string $heading = 'Question Answer Data';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns([
                TextColumn::make('submitdate')
                    ->dateTime()
                    ->sortable()
                    ->searchable(),
<<<<<<< HEAD
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_DmPadP

=======
                
>>>>>>> laraxot/dev
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
=======
=======

>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======

>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_DmPadP
                TextColumn::make('answert')
                    ->limit(50)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        return strlen($state) > 50 ? $state : null;
                    })
                    ->searchable(),
<<<<<<< HEAD
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_DmPadP

=======
                
>>>>>>> laraxot/dev
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
=======
=======

>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======

>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_DmPadP
                TextColumn::make('answer_lang')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'it' => 'success',
                        'en' => 'info',
                        'fr' => 'warning',
                        'de' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
            ])
            ->defaultSort('submitdate', 'desc')
            ->paginated([10, 25, 50, 100])
            ->poll('30s');
    }

    protected function getTableQuery()
    {
        $record = $this->getRecord();
<<<<<<< HEAD
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_DmPadP

        if (!$record) {
            return $record->answers()->whereRaw('1 = 0');
        }

<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_DmPadP
=======
        
        if (!$record) {
            return $record->answers()->whereRaw('1 = 0');
        }
        
>>>>>>> laraxot/dev
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_DmPadP
        return $record->answers()
            ->select(['submitdate', 'answert', 'answer_lang'])
            ->when($record->date_from, function ($query, $dateFrom) {
                $query->where('submitdate', '>=', $dateFrom);
            })
            ->when($record->date_to, function ($query, $dateTo) {
                $query->where('submitdate', '<=', $dateTo);
            });
    }

    protected function getRecord()
    {
        return $this->getTableRecord();
    }
}
```

### 3. **Widget di Grafico (XotBaseWidget)**
```php
<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\<nome progetto>\Filament\Widgets;
=======
>>>>>>> laraxot/dev
=======
<<<<<<< HEAD
namespace Modules\<nome progetto>\Filament\Widgets;
=======
>>>>>>> laraxot/dev
=======
namespace Modules\<nome progetto>\Filament\Widgets;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
namespace Modules\<nome progetto>\Filament\Widgets;
>>>>>>> 8d801bbe (Check & fix styling)
=======
namespace Modules\<nome progetto>\Filament\Widgets;
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DmPadP

use Filament\Widgets\ChartWidget;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

class QuestionChartWidget extends XotBaseWidget
{
    protected static ?string $heading = 'Question Chart Visualization';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 3;

    public function getFormSchema(): array
    {
        return []; // No form needed for chart widget
    }

    protected function getData(): array
    {
        $record = $this->getRecord();
<<<<<<< HEAD
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_DmPadP

=======
        
>>>>>>> laraxot/dev
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
=======
=======

>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======

>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_DmPadP
        if (!$record) {
            return [
                'datasets' => [],
                'labels' => [],
            ];
        }
<<<<<<< HEAD
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_DmPadP

        $chartData = $this->getChartData($record);

=======
        
        $chartData = $this->getChartData($record);
        
>>>>>>> laraxot/dev
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
=======
=======

        $chartData = $this->getChartData($record);

>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======

        $chartData = $this->getChartData($record);

>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_DmPadP
        return [
            'datasets' => [
                [
                    'label' => 'Answer Distribution',
                    'data' => $chartData['values'],
                    'backgroundColor' => $this->getChartColors(count($chartData['values'])),
                    'borderColor' => $this->getChartColors(count($chartData['values']), 0.8),
                    'borderWidth' => 2,
                ],
            ],
            'labels' => $chartData['labels'],
        ];
    }

    protected function getType(): string
    {
        $record = $this->getRecord();
<<<<<<< HEAD
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_DmPadP

        if (!$record) {
            return 'bar';
        }

<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_DmPadP
=======
        
        if (!$record) {
            return 'bar';
        }
        
>>>>>>> laraxot/dev
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_DmPadP
        return match ($record->chart_type) {
            'pie' => 'pie',
            'doughnut' => 'doughnut',
            'line' => 'line',
            default => 'bar',
        };
    }

    protected function getChartData($record): array
    {
        $answers = $record->answers()
            ->select(['answert', 'answer_lang'])
            ->whereNotNull('answert')
            ->when($record->date_from, function ($query, $dateFrom) {
                $query->where('submitdate', '>=', $dateFrom);
            })
            ->when($record->date_to, function ($query, $dateTo) {
                $query->where('submitdate', '<=', $dateTo);
            })
            ->get();
<<<<<<< HEAD
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_DmPadP

        $grouped = $answers->groupBy('answer_lang');

        $labels = [];
        $values = [];

<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_DmPadP
=======
        
        $grouped = $answers->groupBy('answer_lang');
        
        $labels = [];
        $values = [];
        
>>>>>>> laraxot/dev
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_DmPadP
        foreach ($grouped as $lang => $langAnswers) {
            $labels[] = $lang ?: 'Unknown';
            $values[] = $langAnswers->count();
        }
<<<<<<< HEAD
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_DmPadP

=======
        
>>>>>>> laraxot/dev
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
=======
=======

>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======

>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_DmPadP
        return [
            'labels' => $labels,
            'values' => $values,
        ];
    }

    protected function getChartColors(int $count, float $alpha = 1.0): array
    {
        $baseColors = [
            'rgba(54, 162, 235, ' . $alpha . ')',
            'rgba(255, 99, 132, ' . $alpha . ')',
            'rgba(255, 205, 86, ' . $alpha . ')',
            'rgba(75, 192, 192, ' . $alpha . ')',
            'rgba(153, 102, 255, ' . $alpha . ')',
            'rgba(255, 159, 64, ' . $alpha . ')',
            'rgba(199, 199, 199, ' . $alpha . ')',
            'rgba(83, 102, 255, ' . $alpha . ')',
        ];
<<<<<<< HEAD
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_DmPadP

=======
        
>>>>>>> laraxot/dev
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
=======
=======

>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======

>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_DmPadP
        $colors = [];
        for ($i = 0; $i < $count; $i++) {
            $colors[] = $baseColors[$i % count($baseColors)];
        }
<<<<<<< HEAD
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_DmPadP

=======
        
>>>>>>> laraxot/dev
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
=======
=======

>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======

>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_DmPadP
        return $colors;
    }
}
```

## 🚫 Errori Comuni da Evitare

### 1. **Usare XotBaseWidget per Tabelle**
```php
// ❌ SBAGLIATO
class MyTableWidget extends XotBaseWidget
{
    public function table(Table $table): Table
    {
        // XotBaseWidget richiede getFormSchema()!
    }
}

// ✅ CORRETTO
class MyTableWidget extends XotBaseTableWidget
{
    public function table(Table $table): Table
    {
        // XotBaseTableWidget è per tabelle
    }
}
```

### 2. **Non Implementare Metodi Obbligatori**
```php
// ❌ SBAGLIATO - Manca getFormSchema()
class MyWidget extends XotBaseWidget
{
    // Errore: deve implementare getFormSchema()
}

// ✅ CORRETTO
class MyWidget extends XotBaseWidget
{
    public function getFormSchema(): array
    {
        return [];
    }
}
```

### 3. **Mescolare Responsabilità**
```php
// ❌ SBAGLIATO - Widget che fa tutto
class MyWidget extends XotBaseWidget
{
    public function getFormSchema(): array
    {
        return []; // Form vuoto
    }
<<<<<<< HEAD
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_DmPadP

=======
    
>>>>>>> laraxot/dev
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
=======
=======

>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======

>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_DmPadP
    public function table(Table $table): Table
    {
        // Tabella in widget di form
    }
}

// ✅ CORRETTO - Separare responsabilità
class MyFilterWidget extends XotBaseWidget
{
    public function getFormSchema(): array
    {
        return [/* form components */];
    }
}

class MyTableWidget extends XotBaseTableWidget
{
    public function table(Table $table): Table
    {
        return $table->columns(/* table columns */);
    }
}
```

## 📋 Checklist Implementazione

### ✅ Prima di Implementare
- [ ] Decidere se widget ha form o tabella
- [ ] Scegliere XotBaseWidget o XotBaseTableWidget
- [ ] Verificare metodi obbligatori da implementare

### ✅ Durante Implementazione
- [ ] Implementare tutti i metodi obbligatori
- [ ] Seguire convenzioni naming
- [ ] Usare type hints corretti
- [ ] Documentare PHPDoc

### ✅ Dopo Implementazione
- [ ] Verificare PHPStan livello 10
- [ ] Controllare conformità PSR-12
- [ ] Testare funzionalità
- [ ] Aggiornare documentazione

## 📚 Riferimenti

- [XotBaseWidget Implementation](./xotbasewidget_implementation.md)
- [XotBaseTableWidget Implementation](./xotbasetablewidget_implementation.md)
- [Laraxot Architecture Rules](./LARAXOT_ARCHITECTURE_RULES.md)
<<<<<<< .merge_file_dMfMcM
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_DmPadP

Queste regole garantiscono implementazione corretta dei widget seguendo l'architettura Laraxot.
<<<<<<< .merge_file_dMfMcM
=======
=======
<<<<<<< HEAD
<<<<<<< .merge_file_F7TLz3
<<<<<<< HEAD
Queste regole garantiscono implementazione corretta dei widget seguendo l'architettura Laraxot.
=======
=======

>>>>>>> .merge_file_eBUNek
Queste regole garantiscono implementazione corretta dei widget seguendo l'architettura Laraxot.
>>>>>>> laraxot/dev
=======
- [Laraxot Architecture Rules](./laraxot_architecture_rules.md)

>>>>>>> laraxot/dev
Queste regole garantiscono implementazione corretta dei widget seguendo l'architettura Laraxot.
>>>>>>> laraxot/dev
=======

Queste regole garantiscono implementazione corretta dei widget seguendo l'architettura Laraxot.
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_DmPadP
