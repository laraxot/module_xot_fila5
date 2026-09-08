<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

<<<<<<< HEAD
use Filament\Schemas\Components\Utilities\Get;
=======
>>>>>>> c7fd73eb (.)
use Filament\Actions\Action;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Colors\Color;
use Modules\Tenant\Services\TenantService;
use Modules\Xot\Datas\MetatagData;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
use Webmozart\Assert\Assert;
use Filament\Schemas\Schema;
=======
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Filament\Support\Colors\Color;
use Modules\Tenant\Actions\Config\SaveTenantConfigAction;
use Modules\Xot\Datas\MetatagData;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
>>>>>>> c7fd73eb (.)

/**
 * @property Schema $form
 */
<<<<<<< HEAD
class MetatagPage extends Page implements HasForms
{
    use InteractsWithForms;
    use NavigationLabelTrait;

    public null|array $data = [];

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';
=======
class MetatagPage extends XotBasePage
{
    use NavigationLabelTrait;

    public array $data = [];

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';
>>>>>>> c7fd73eb (.)

    protected string $view = 'xot::filament.pages.metatag';

    public function mount(): void
    {
<<<<<<< HEAD
        Assert::isArray($data = config('metatag'));

        // @phpstan-ignore argument.type
        $this->form->fill($data);
    }

    public function form(Schema $schema): Schema
=======
        $config = config('metatag');
        if (! is_array($config)) {
            $config = [];
        }

        $state = [];
        foreach ($config as $key => $value) {
            if (! is_string($key)) {
                continue;
            }
            $state[$key] = $value;
        }

        $this->form->fill($state);
    }

    public function schema(Schema $schema): Schema
>>>>>>> c7fd73eb (.)
    {
        $metatag = MetatagData::make();

        return $schema
            ->components([
                TextInput::make('title')->required(),
                TextInput::make('sitename'),
                TextInput::make('subtitle'),
                TextInput::make('generator'),
                TextInput::make('charset'),
                TextInput::make('author'),
                TextInput::make('description'),
                TextInput::make('keywords'),
<<<<<<< HEAD
                /*
                 * FileUpload::make('logo_header')
                 * ->preserveFilenames()
                 * ->image()
                 * ->imageEditor()
                 * ->moveFiles()
                 * ->disk('public')
                 * ->visibility('public')
                 * ->directory('logo')
                 * ->formatStateUsing(fn ($state): array =>[basename($state)])
                 * //->formatStateUsing(fn ($state): array =>['/uploads/photos/pexels-giona-mason-19138633.jpg'])
                 * ->dehydrateStateUsing(fn ($state) => collect($state)->map(function($item){
                 * return Storage::disk('public')->url($item);
                 * })->first() )
                 * ,
                 */
=======
>>>>>>> c7fd73eb (.)
                TextInput::make('logo_header'),
                TextInput::make('logo_header_dark')->helperText('logo for dark css'),
                TextInput::make('logo_height'),
                Repeater::make('colors')
                    ->schema([
                        Select::make('key')
<<<<<<< HEAD
                            ->label('Chiave')
                            ->required()
                            ->options($metatag->getFilamentColors()),
                        Select::make('color')
                            ->label('Colore')
                            ->options(array_combine(array_keys(Color::all()), array_keys(Color::all())))
                            ->reactive(),
                        ColorPicker::make('hex')
                            ->label('Colore personalizzato')
                            ->visible(fn($get) => $get('color') === 'custom')
=======
                            ->required()
                            ->options($metatag->getFilamentColors()),
                        Select::make('color')
                            ->options(array_combine(array_keys(Color::all()), array_keys(Color::all())))
                            ->reactive(),
                        ColorPicker::make('hex')
>>>>>>> c7fd73eb (.)
                            ->required(),
                    ])
                    ->columns(3),
            ])
            ->columns(2)
            ->statePath('data');
    }

    public function save(): void
    {
<<<<<<< HEAD
        $data = $this->form->getState();
        TenantService::saveConfig('metatag', $data);

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }

=======
        /** @var array<string, mixed> $data */
        $data = $this->form->getState();
        app(SaveTenantConfigAction::class)->execute('metatag', $data);

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/edit-record.notifications.saved.title'))
            ->send();
    }

    /** @return list<Action> */
>>>>>>> c7fd73eb (.)
    protected function getFormActions(): array
    {
        return [
            Action::make('save')->submit('save'),
        ];
    }
}
