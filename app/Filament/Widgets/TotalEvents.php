<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalEvents extends BaseWidget
{

    protected int | string | array $columnSpan = '1';
    protected function getStats(): array
    {
        return [
            \App\Models\Event::count()
        ];
    }
}
