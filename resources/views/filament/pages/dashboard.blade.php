<?php

declare(strict_types=1);

?>
<x-filament-panels::page class="fi-dashboard-page">
    @if (method_exists($this, 'filtersForm'))
        {{ // @var mixed filtersForm }}
    @endif

    <x-filament-widgets::widgets 
        :columns="// @var mixed getColumns(
        :data="[...(data_get($this, 'filters') !== null ? ['filters' => data_get($this, 'filters')] : []), ...// @var mixed getWidgetData(
        :widgets="// @var mixed getVisibleWidgets(
    />
</x-filament-panels::page>
