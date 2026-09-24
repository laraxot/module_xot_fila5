<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Fixtures;

use Filament\Support\Contracts\TranslatableContentDriver;
<<<<<<< .merge_file_H8hCM2
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
=======
<<<<<<< .merge_file_h3apgy
<<<<<<< HEAD
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
=======
<<<<<<< HEAD
=======
>>>>>>> 8d801bbe (Check & fix styling)
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
=======
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
>>>>>>> .merge_file_XWiyWQ
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
>>>>>>> .merge_file_a5oWo0
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

/**
<<<<<<< .merge_file_H8hCM2
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_h3apgy
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
 * Harness minimo per istanziare {@see \Filament\Tables\Table::make()}.
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

  /**
   * @return Builder<Model>
   */
  protected function getTableQuery(): Builder
  {
    return Model::query();
  }
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_XWiyWQ
>>>>>>> laraxot/dev
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_a5oWo0
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

    /**
     * @return Builder<Model>
     */
    protected function getTableQuery(): Builder
    {
        return Model::query();
    }
<<<<<<< .merge_file_H8hCM2
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_h3apgy
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_XWiyWQ
=======
>>>>>>> 8d801bbe (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_a5oWo0
}
