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
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\String\SanitizeAction;
<<<<<<< HEAD
use Webmozart\Assert\Assert;

class SanitizeFieldsHeaderAction extends Action
{
=======
use Modules\Xot\Filament\Actions\XotBaseAction;
use Webmozart\Assert\Assert;

class SanitizeFieldsHeaderAction extends XotBaseAction
{
    /** @var list<string> */
>>>>>>> c7fd73eb (.)
    public array $fields = [];

    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->tooltip('sanitize')
            ->icon('heroicon-o-shield-exclamation')
<<<<<<< HEAD
            ->action(function (ListRecords $livewire) {
                $resource = $livewire->getResource();
                $modelClass = $resource::getModel();
                // @phpstan-ignore staticMethod.nonObject
                $rows = $modelClass::get();
                if (!is_iterable($rows)) {
=======
            ->action(function (ListRecords $livewire): void {
                $resource = $livewire->getResource();
                $modelClass = $resource::getModel();
                Assert::subclassOf($modelClass, Model::class);
                /** @var class-string<Model> $modelClass */
                $rows = $modelClass::query()->get();
                if (! is_iterable($rows)) {
>>>>>>> c7fd73eb (.)
                    $rows = [];
                }
                $c = 0;
                foreach ($rows as $row) {
                    Assert::isInstanceOf($row, Model::class);
                    $save = false;
                    foreach ($this->fields as $field) {
<<<<<<< HEAD
                        Assert::string($item = $row->{$field}, __FILE__ . ':' . __LINE__ . ' - ' . class_basename(__CLASS__));
                        $string = app(SanitizeAction::class)->execute($item);
                        if ($string !== $item) {
                            $row->{$field} = $string;
=======
                        $fieldName = is_string($field) ? $field : (string) $field;
                        $item = $row->{$fieldName};
                        Assert::string($item, __FILE__.':'.__LINE__.' - '.class_basename(self::class));
                        $string = app(SanitizeAction::class)->execute($item);
                        if ($string !== $item) {
                            $row->{$fieldName} = $string;
>>>>>>> c7fd73eb (.)
                            $save = true;
                            ++$c;
                        }
                    }
                    if ($save) {
                        $row->save();
                    }
                }
                Notification::make()
<<<<<<< HEAD
                    ->title('' . $c . ' record sanitized')
=======
                    ->title(''.$c.' record sanitized')
>>>>>>> c7fd73eb (.)
                    ->success()
                    ->send();
            });
    }

<<<<<<< HEAD
=======
    /**
     * @param list<string> $fields
     */
>>>>>>> c7fd73eb (.)
    public function setFields(array $fields): self
    {
        $this->fields = $fields;

        return $this;
    }

<<<<<<< HEAD
    public static function getDefaultName(): null|string
=======
    public static function getDefaultName(): ?string
>>>>>>> c7fd73eb (.)
    {
        return 'sanitize-fields-header';
    }
}
