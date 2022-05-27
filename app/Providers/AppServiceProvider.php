<?php

namespace App\Providers;

use App\Macros\ViewMacros;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        View::mixin(new ViewMacros());
    }

    public function boot()
    {
    }
}
