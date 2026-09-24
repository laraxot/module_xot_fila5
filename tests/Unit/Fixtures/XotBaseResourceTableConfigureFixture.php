<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Fixtures;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

final class XotBaseResourceTableConfigureFixture extends XotBaseResourceTable
{
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_NlBMYd
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
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
=======
=======
>>>>>>> .merge_file_h9ahnh
>>>>>>> laraxot/dev
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
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
=======
>>>>>>> 8d801bbe (Check & fix styling)
>>>>>>> laraxot/dev
}
