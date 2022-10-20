<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Closure;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;

class Dashboard extends Page
{
    protected static ?string $title = 'Imobiliária dos Super Devs';

    protected static ?string $slug = 'dashboard';

    protected static ?string $navigationLabel = 'Dashboard';

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?int $navigationSort = -2;

    protected static string $view = 'filament.pages.dashboard';

    public static function getRoutes(): Closure
    {
        return function () {
            Route::get('/', static::class)->name(static::getSlug());
        };
    }

    protected function getWidgets(): array
    {
        return Filament::getWidgets();
    }

    protected function getColumns(): int | array
    {
        return 2;
    }
}
