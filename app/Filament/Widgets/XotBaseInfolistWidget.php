<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Contracts\Support\Htmlable;
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
>>>>>>> 8d801bbe (Check & fix styling)

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

    /** @var view-string */
<<<<<<< .merge_file_75OTA4
=======
 */
abstract class XotBaseInfolistWidget extends FilamentWidget implements HasSchemas
{
    use InteractsWithSchemas;
    use TransTrait;

>>>>>>> 8d801bbe (Check & fix styling)
    protected string $view = 'xot::filament.widgets.infolist';
=======
    /** @var view-string */
    protected string $view;
>>>>>>> .merge_file_d7pGUd

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
>>>>>>> 8d801bbe (Check & fix styling)
     */
    abstract protected function getInfolistSchema(): array;

    abstract protected function getInfolistRecord(): ?Model;

    public function infolist(Schema $schema): Schema
    {
        $record = $this->getInfolistRecord();
<<<<<<< .merge_file_75OTA4
<<<<<<< HEAD
<<<<<<< HEAD
        if ($record !== null) {
=======
        if (null !== $record) {
>>>>>>> laraxot/dev
=======
        if (null !== $record) {
>>>>>>> 8d801bbe (Check & fix styling)
=======
        if ($record !== null) {
>>>>>>> .merge_file_d7pGUd
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
