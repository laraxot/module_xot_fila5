<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Fixtures;

use Filament\Support\Contracts\TranslatableContentDriver;
<<<<<<< .merge_file_CAb6CF
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
=======
<<<<<<< HEAD
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
=======
<<<<<<< HEAD
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
=======
<<<<<<< HEAD
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
=======
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> .merge_file_QEFWkK
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

/**
<<<<<<< .merge_file_CAb6CF
 * Harness minimo per istanziare {@see Table::make()}.
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
 * Harness minimo per istanziare {@see \Filament\Tables\Table::make()}.
>>>>>>> .merge_file_QEFWkK
 */
final class XotTableConfigureLivewireHarness extends Component implements HasTable
{
    use InteractsWithTable;

    public function render(): string
    {
        return '';
    }

    public function makeFilamentTranslatableContentDriver(): ?TranslatableContentDriver
    {
        return null;
    }

<<<<<<< .merge_file_CAb6CF
=======
  /**
   * @return Builder<Model>
   */
  protected function getTableQuery(): Builder
  {
    return Model::query();
  }
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
 * Harness minimo per istanziare {@see Table::make()}.
 */
final class XotTableConfigureLivewireHarness extends Component implements HasTable
{
    use InteractsWithTable;

    public function render(): string
    {
        return '';
    }

    public function makeFilamentTranslatableContentDriver(): ?TranslatableContentDriver
    {
        return null;
    }

>>>>>>> .merge_file_QEFWkK
    /**
     * @return Builder<Model>
     */
    protected function getTableQuery(): Builder
    {
        return Model::query();
    }
<<<<<<< .merge_file_CAb6CF
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> .merge_file_QEFWkK
}
