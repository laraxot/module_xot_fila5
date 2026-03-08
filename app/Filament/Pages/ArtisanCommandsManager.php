<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Enums\IconPosition;
use Livewire\Attributes\On;
use Modules\Xot\Actions\ExecuteArtisanCommandAction;

/**
 * ---.
 */
class ArtisanCommandsManager extends XotBasePage
{
    public array $output = [];

    public string $currentCommand = '';

    public string $status = '';

    public bool $isRunning = false;

    /**
     * Livewire event listeners for this component.
     *
     * @var array<string, string>
     *
     * @phpstan-var array<string, string>
     */
    protected $listeners = [
        'refresh-component' => '$refresh',
        'artisan-command.started' => 'handleCommandStarted',
        'artisan-command.output' => 'handleCommandOutput',
        'artisan-command.completed' => 'handleCommandCompleted',
        'artisan-command.failed' => 'handleCommandFailed',
        'artisan-command.error' => 'handleCommandError',
    ];

    public function executeCommand(string $command): void
    {
        // @var mixed reset(['output', 'status'];
        // @var mixed currentCommand = $command;
        // @var mixed isRunning = true;

        try {
            app(ExecuteArtisanCommandAction::class)->execute($command);
        } catch (\Exception $e) {
            Notification::make()
                ->title((string) __('xot::artisan-commands-manager.notifications.error'))
                ->body($e->getMessage())
                ->danger()
                ->send();

            // @var mixed isRunning = false;
        }
    }

    #[On('artisan-command.started')]
    public function handleCommandStarted(string $command): void
    {
        // @var mixed isRunning = true;
    }

    #[On('artisan-command.output')]
    public function handleCommandOutput(string $command, string $output): void
    {
        // @var mixed output[] = $output;
        // @var mixed dispatch('terminal-update';
    }

    #[On('artisan-command.completed')]
    public function handleCommandCompleted(string $command): void
    {
        // @var mixed status = 'completed';
        // @var mixed isRunning = false;

        Notification::make()
            ->title((string) __('xot::artisan-commands-manager.notifications.success'))
            ->success()
            ->send();
    }

    #[On('artisan-command.failed')]
    public function handleCommandFailed(string $command, string $error): void
    {
        // @var mixed status = 'failed';
        // @var mixed isRunning = false;
        // @var mixed output[] = "[ERROR] {$error}";

        Notification::make()
            ->title((string) __('xot::artisan-commands-manager.notifications.error'))
            ->body($error)
            ->danger()
            ->send();
    }

    #[On('artisan-command.error')]
    public function handleCommandError(string $command, string $error): void
    {
        // @var mixed status = 'failed';
        // @var mixed isRunning = false;
        // @var mixed output[] = "[ERROR] {$error}";

        Notification::make()
            ->title((string) __('xot::artisan-commands-manager.notifications.error'))
            ->body($error)
            ->danger()
            ->send();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('migrate')
                ->label((string) __('xot::artisan-commands-manager.commands.migrate.label'))
                ->icon('heroicon-o-circle-stack')
                ->color('primary')
                ->size('lg')
                ->iconPosition(IconPosition::Before)
                ->disabled(fn () => // @var mixed isRunning
                ->action(fn () => // @var mixed executeCommand('migrate'
            Action::make('filament_upgrade')
                ->label((string) __('xot::artisan-commands-manager.commands.filament_upgrade.label'))
                ->icon('heroicon-o-arrow-path')
                ->color('warning')
                ->size('lg')
                ->iconPosition(IconPosition::Before)
                ->disabled(fn () => // @var mixed isRunning
                ->action(fn () => // @var mixed executeCommand('filament:upgrade'
            Action::make('filament_optimize')
                ->label((string) __('xot::artisan-commands-manager.commands.filament_optimize.label'))
                ->icon('heroicon-o-sparkles')
                ->color('success')
                ->size('lg')
                ->iconPosition(IconPosition::Before)
                ->disabled(fn () => // @var mixed isRunning
                ->action(fn () => // @var mixed executeCommand('filament:optimize'
            Action::make('view_cache')
                ->label((string) __('xot::artisan-commands-manager.commands.view_cache.label'))
                ->icon('heroicon-o-eye')
                ->color('gray')
                ->size('lg')
                ->iconPosition(IconPosition::Before)
                ->disabled(fn () => // @var mixed isRunning
                ->action(fn () => // @var mixed executeCommand('view:cache'
            Action::make('config_cache')
                ->label((string) __('xot::artisan-commands-manager.commands.config_cache.label'))
                ->icon('heroicon-o-cog-6-tooth')
                ->color('gray')
                ->size('lg')
                ->iconPosition(IconPosition::Before)
                ->disabled(fn () => // @var mixed isRunning
                ->action(fn () => // @var mixed executeCommand('config:cache'
            Action::make('route_cache')
                ->label((string) __('xot::artisan-commands-manager.commands.route_cache.label'))
                ->icon('heroicon-o-map')
                ->color('gray')
                ->size('lg')
                ->iconPosition(IconPosition::Before)
                ->disabled(fn () => // @var mixed isRunning
                ->action(fn () => // @var mixed executeCommand('route:cache'
            Action::make('event_cache')
                ->label((string) __('xot::artisan-commands-manager.commands.event_cache.label'))
                ->icon('heroicon-o-bell')
                ->color('gray')
                ->size('lg')
                ->iconPosition(IconPosition::Before)
                ->disabled(fn () => // @var mixed isRunning
                ->action(fn () => // @var mixed executeCommand('event:cache'
            Action::make('queue_restart')
                ->label((string) __('xot::artisan-commands-manager.commands.queue_restart.label'))
                ->icon('heroicon-o-arrow-path')
                ->color('gray')
                ->size('lg')
                ->iconPosition(IconPosition::Before)
                ->disabled(fn () => // @var mixed isRunning
                ->action(fn () => // @var mixed executeCommand('queue:restart'
        ];
    }
}
