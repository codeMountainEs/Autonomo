<?php

namespace App\Providers;

use App\Filament\Resources\DashboardResource\Widgets\StatsOverview;
use App\Models\Dashboard as ModelsDashboard;
use Filament\Dashboard\Dashboard;
use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    public function boot()
    {
        ModelsDashboard::registerWidgets([
            StatsOverview::class,
        ]);
    }
}