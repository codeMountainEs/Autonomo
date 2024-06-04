<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use App\Filament\Resources\DashboardResource\Pages\Dashboard;
use App\Filament\Resources\DashboardResource\Widgets\StatsOverview;
use App\Models\Dashboard as ModelsDashboard;
use Filament\Pages\Dashboard as PagesDashboard;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard as HtmlDashboard;

class DashboardResource extends Resource
{
    public static function getPages(): array
    {
        return [
            'index' => ModelsDashboard::class,
        ];
    }

    public static function getWidgets(): array
    {
        return [
           //StatsOverview::class,
        ];
    }
}
