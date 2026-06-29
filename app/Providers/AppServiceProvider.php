<?php

namespace App\Providers;

use Illuminate\Database\Schema\Builder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Cegah error "Specified key was too long" di MySQL/MariaDB versi lama
        // (umum terjadi di hosting MySQL gratis seperti freesqldatabase.com)
        Builder::defaultStringLength(191);
    }
}
