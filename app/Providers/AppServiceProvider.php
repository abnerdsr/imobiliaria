<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use Laravel\Octane\Facades\Octane;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Swoole Cron Timer
     *
     * @return void
     */
    private function swooleCronTasks(): void
    {
        // Cron em milisegundos do Swoole substituindo o cron por minuto do linux
        // https://openswoole.com/docs/modules/swoole-timer
        Octane::tick('schedule-tasks', function () {
            if (Carbon::now()->second == 0) {
                Artisan::call('schedule:run');
            }
        })->immediate();
    }
}
