<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class RolesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::directive('perm', function ($perm){
            return "<?php if(auth()->check() && auth()->user()->hasPermission({$perm})): ?>";
        });

        Blade::directive('endperm', function ($perm){
            return "<?php endif; ?>";
        });
    }
}
