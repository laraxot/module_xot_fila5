<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Fixtures;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

final class XotBaseResourceTableConfigureFixture extends XotBaseResourceTable
{
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< .merge_file_NlBMYd
<<<<<<< HEAD
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
  /**
   * @return array<string, TextColumn>
   */
  public function getTableColumns(): array
  {
    return [
      'id' => TextColumn::make('id'),
    ];
  }

  /**
   * @return array<string, Filter>
   */
  public function getTableFilters(): array
  {
    return [
      'fixture_filter' => Filter::make('fixture_filter'),
    ];
  }
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_h9ahnh
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
    /**
     * @return array<string, TextColumn>
     */
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id'),
        ];
    }

    /**
     * @return array<string, Filter>
     */
    public function getTableFilters(): array
    {
        return [
            'fixture_filter' => Filter::make('fixture_filter'),
        ];
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_NlBMYd
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_h9ahnh
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
}
