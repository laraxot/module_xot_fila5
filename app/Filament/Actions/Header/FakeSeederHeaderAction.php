<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Xot\Filament\Actions\Header;

// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Actions\Action;
<<<<<<< HEAD
use Filament\Actions\Action;
=======
>>>>>>> c7fd73eb (.)
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\ModelClass\FakeSeederAction;
<<<<<<< HEAD
use Webmozart\Assert\Assert;

class FakeSeederHeaderAction extends Action
=======
use Modules\Xot\Filament\Actions\XotBaseAction;
use Webmozart\Assert\Assert;

class FakeSeederHeaderAction extends XotBaseAction
>>>>>>> c7fd73eb (.)
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->tooltip(__('xot::actions.fake_seeder'))
            ->icon('fas-seedling')
            ->schema([
                TextInput::make('qty')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->integer(),
            ])
<<<<<<< HEAD
            ->action(function (array $data, ListRecords $livewire) {
=======
            ->action(function (array $data, ListRecords $livewire): void {
>>>>>>> c7fd73eb (.)
                $resource = $livewire->getResource();
                /** @var class-string<Model> $modelClass */
                $modelClass = $resource::getModel();
                Assert::classExists($modelClass);

                $qtyRaw = $data['qty'];
                Assert::numeric($qtyRaw);
                $qty = max(1, (int) $qtyRaw);
                Assert::greaterThanEq($qty, 1, 'Quantity must be greater than 0');

                app(FakeSeederAction::class)->onQueue()->execute($modelClass, $qty);

<<<<<<< HEAD
                $title = 'On Queue ' . $qty . ' ' . $modelClass;
=======
                $title = 'On Queue '.$qty.' '.$modelClass;
>>>>>>> c7fd73eb (.)
                Notification::make()
                    ->title($title)
                    ->success()
                    ->send();
            })
            ->visible(false);
    }

<<<<<<< HEAD
    public static function getDefaultName(): null|string
=======
    public static function getDefaultName(): ?string
>>>>>>> c7fd73eb (.)
    {
        return 'fake_seeder';
    }
}
