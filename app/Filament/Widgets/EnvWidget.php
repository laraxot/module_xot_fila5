<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< HEAD
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Component;
use Illuminate\Support\Arr;
use Modules\Xot\Datas\EnvData;

class EnvWidget extends XotBaseSchemaWidget
{
    /** @var array<string, mixed>|null */
    public ?array $data = [];
=======
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Filament\Widgets\Widget;
use Illuminate\Support\Arr;
use Modules\Xot\Datas\EnvData;

/**
 * @property Schema                    $form
 * @property array<string, mixed>|null $data
 */
class EnvWidget extends Widget implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;
>>>>>>> laraxot/dev

    /** @var list<string> */
    public array $only = [];

<<<<<<< HEAD
    /** @var view-string */
=======
    /**
     * @var array<string, mixed>|null
     */
    public ?array $data = [];

>>>>>>> laraxot/dev
    protected string $view = 'xot::filament.widgets.env';

    public function mount(): void
    {
<<<<<<< HEAD
        /** @var array<string, mixed> */
=======
        /** @var array<string, mixed> $data */
>>>>>>> laraxot/dev
        $data = EnvData::make()->toArray();
        $this->data = $data;

        $this->form->fill($this->data);
    }

<<<<<<< HEAD
    public function submit(): void
    {
        if (! is_array($this->data)) {
            return;
        }
        EnvData::make()->update($this->data);
=======
    public function schema(Schema $schema): Schema
    {
        return $schema->components($this->getFormSchema())->columns(1)->statePath('data');
    }

    public function submit(): void
    {
        if (null !== $this->data) {
            EnvData::make()->update($this->data);
        }
>>>>>>> laraxot/dev
        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();

        /*
         * dddx([
         * 'data' => $this->data,
         * // 'data1' => $this->form->getState(),
         * ]);
         */
    }

    /**
     * @return array<Component>
     */
    public function getFormSchema(): array
    {
        $all = [
            'app_url' => TextInput::make('app_url')
                ->placeholder('http://localhost')
                ->helperText('Required for file uploads and other internal configs')
                ->required(),
            'debugbar_enabled' => Toggle::make('debugbar_enabled')->helperText(
                'Enable/Disable debug mode to help debug errors',
            ),
            'google_maps_api_key' => TextInput::make('google_maps_api_key')
                ->placeholder('AIzaSyAuB_...')
                ->helperText('google maps api key'),
            'telegram_bot_token' => TextInput::make('telegram_bot_token')
                ->placeholder('AIzaSyAuB_...')
                ->helperText('telegram_bot_token'),
        ];
        $selected = [] === $this->only ? $all : Arr::only($all, $this->only);

        /** @var array<Component> $components */
        $components = array_values($selected);

        return $components;
    }
}
