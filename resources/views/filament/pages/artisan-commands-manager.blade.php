<?php

declare(strict_types=1);

?>
<x-filament::page>
    <div class="space-y-6" wire:poll.visible="{{ // @var mixed isRunning ? '100' : '1000' }}">
        @if(// @var mixed isRunning
            <div class="text-sm text-gray-500 bg-gray-50 p-2 rounded-lg border border-gray-200">
                {{ __('xot::artisan-commands-manager.hints.running') }}
                <br>
                {{ __('xot::artisan-commands-manager.hints.disabled') }}
            </div>
        @endif
        
        <div 
            x-data="{ 
                init() {
                    this.$el.scrollTop = this.$el.scrollHeight;
                    this.$watch('$wire.output', () => {
                        this.$el.scrollTop = this.$el.scrollHeight;
                    });
                }
            }"
            class="bg-gray-900 text-gray-100 font-mono p-4 rounded-lg overflow-auto max-h-96 relative"
        >
            @if(filled(// @var mixed currentCommand
                <div class="flex items-center justify-between mb-4 sticky top-0 bg-gray-900 py-2 border-b border-gray-700">
                    <h3 class="text-lg font-medium">Comando in esecuzione: {{ // @var mixed currentCommand }}</h3>
                    <div>
                        @if(// @var mixed status === 'completed'
                            <x-filament::badge color="success">
                                {{ __('xot::artisan-commands-manager.status.completed') }}
                            </x-filament::badge>
                        @elseif(// @var mixed status === 'failed'
                            <x-filament::badge color="danger">
                                {{ __('xot::artisan-commands-manager.status.failed') }}
                            </x-filament::badge>
                        @elseif(// @var mixed isRunning
                            <div class="flex items-center space-x-2">
                                <x-filament::loading-indicator class="h-5 w-5" />
                                <span class="text-sm">{{ __('xot::artisan-commands-manager.status.running') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                @if(empty(// @var mixed output
                    <div class="text-gray-400">
                        {{ __('xot::artisan-commands-manager.status.waiting') }}
                    </div>
                @else
                    @foreach(// @var mixed output as $line
                        @if(str_starts_with($line, '[ERROR]'))
                            <div class="whitespace-pre-wrap text-red-400 font-bold">{{ $line }}</div>
                        @else
                            <div class="whitespace-pre-wrap">{{ $line }}</div>
                        @endif
                    @endforeach
                @endif
            @endif
        </div>

        @if(!empty(// @var mixed output
            <div class="text-xs text-gray-500 text-right">
                {{ __('xot::artisan-commands-manager.hints.scroll') }}
            </div>
        @endif
    </div>
</x-filament::page>
