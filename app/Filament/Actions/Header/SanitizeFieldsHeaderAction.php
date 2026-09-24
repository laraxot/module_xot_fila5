<?php

<<<<<<< .merge_file_hrNwMw
declare(strict_types=1);
=======
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_0irvyA
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

<<<<<<< .merge_file_hrNwMw
=======
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
>>>>>>> .merge_file_0irvyA
namespace Modules\Xot\Filament\Actions\Header;

// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Actions\Action;
<<<<<<< HEAD
=======
use Filament\Actions\Action;
>>>>>>> laraxot/dev
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\String\SanitizeAction;
<<<<<<< HEAD
use Modules\Xot\Filament\Actions\XotBaseAction;
use Webmozart\Assert\Assert;

class SanitizeFieldsHeaderAction extends XotBaseAction
=======
use Webmozart\Assert\Assert;

class SanitizeFieldsHeaderAction extends Action
>>>>>>> laraxot/dev
{
    /** @var list<string> */
    public array $fields = [];

    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->tooltip('sanitize')
            ->icon('heroicon-o-shield-exclamation')
            ->action(function (ListRecords $livewire): void {
                $resource = $livewire->getResource();
                $modelClass = $resource::getModel();
                Assert::subclassOf($modelClass, Model::class);
                /** @var class-string<Model> $modelClass */
                $rows = $modelClass::query()->get();
                if (! is_iterable($rows)) {
                    $rows = [];
                }
                $c = 0;
                foreach ($rows as $row) {
                    Assert::isInstanceOf($row, Model::class);
                    $save = false;
                    foreach ($this->fields as $field) {
                        $fieldName = is_string($field) ? $field : (string) $field;
                        $item = $row->{$fieldName};
                        Assert::string($item, __FILE__.':'.__LINE__.' - '.class_basename(self::class));
                        $string = app(SanitizeAction::class)->execute($item);
                        if ($string !== $item) {
                            $row->{$fieldName} = $string;
                            $save = true;
<<<<<<< .merge_file_hrNwMw
                            $c++;
=======
<<<<<<< HEAD
                            $c++;
=======
                            ++$c;
>>>>>>> laraxot/dev
>>>>>>> .merge_file_0irvyA
                        }
                    }
                    if ($save) {
                        $row->save();
                    }
                }
                Notification::make()
                    ->title(''.$c.' record sanitized')
                    ->success()
                    ->send();
            });
    }

    /**
<<<<<<< .merge_file_hrNwMw
     * @param  list<string>  $fields
=======
<<<<<<< HEAD
     * @param  list<string>  $fields
=======
     * @param list<string> $fields
>>>>>>> laraxot/dev
>>>>>>> .merge_file_0irvyA
     */
    public function setFields(array $fields): self
    {
        $this->fields = $fields;

        return $this;
    }

    public static function getDefaultName(): ?string
    {
        return 'sanitize-fields-header';
    }
}
