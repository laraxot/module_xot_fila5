<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Contracts\Support\Htmlable;
=======
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
>>>>>>> 3792da0d (Check & fix styling)
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\View\GetViewByClassAction;
=======
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Filament\Widgets\Widget as FilamentWidget;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\View\GetViewByClassAction;
use Modules\Xot\Filament\Traits\TransTrait;
>>>>>>> 930f8146 (Check & fix styling)

/**
 * Base per widget FO/pannello che rendono un Infolist Filament v5 (schema unificato).
 *
 * Le sottoclassi forniscono record + componenti; la vista default espone {{ $this->infolist }}.
<<<<<<< HEAD
 * Estende XotBaseWidget per coerenza con il pattern di widget XotBase*.
 */
abstract class XotBaseInfolistWidget extends XotBaseWidget implements HasSchemas
{
    use InteractsWithSchemas;

<<<<<<< HEAD
    /** @var view-string */
=======
<<<<<<< HEAD
    /** @phpstan-ignore property.defaultValue */
>>>>>>> 3792da0d (Check & fix styling)
=======
 */
abstract class XotBaseInfolistWidget extends FilamentWidget implements HasSchemas
{
    use InteractsWithSchemas;
    use TransTrait;

>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    protected string $view = 'xot::filament.widgets.infolist';

    protected int|string|array $columnSpan = 'full';

    public function __construct()
    {
        $this->resolveView();
    }

    /**
<<<<<<< HEAD
     * @return array<int|string, Component|Htmlable|string>
=======
     * @return array<int|string, \Filament\Schemas\Components\Component|\Illuminate\Contracts\Support\Htmlable|string>
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    abstract protected function getInfolistSchema(): array;

    abstract protected function getInfolistRecord(): ?Model;

    public function infolist(Schema $schema): Schema
    {
        $record = $this->getInfolistRecord();
<<<<<<< .merge_file_0SOF9V
<<<<<<< HEAD
<<<<<<< HEAD
        if ($record !== null) {
=======
        if (null !== $record) {
>>>>>>> laraxot/dev
=======
        if (null !== $record) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($record !== null) {
>>>>>>> .merge_file_3wiIVi
            $schema->record($record);
        }

        return $schema->components($this->getInfolistSchema());
    }

    public static function getNavigationLabel(): string
    {
        return static::transFunc(__FUNCTION__);
    }

    private function resolveView(): void
    {
        $defaultView = 'xot::filament.widgets.infolist';

        if ($this->view !== $defaultView && view()->exists($this->view)) {
            return;
        }

        try {
            $view = app(GetViewByClassAction::class)->execute(static::class);
            if (view()->exists($view)) {
                $this->view = $view;
            }
        } catch (\Exception) {
        }
    }
}
