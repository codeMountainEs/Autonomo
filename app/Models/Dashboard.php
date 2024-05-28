<?php

namespace App\Models;

use App\Filament\Resources\DashboardResource\Widgets\StatsOverview;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
   
        protected function getHeaderWidget(): array
        {
            return [
                StatsOverview::class,
            ];
        }
}
