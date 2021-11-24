<?php

namespace App\Providers;

use App\Http\View\Composer\CategoryComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
    {
        View::composer(['main'], CategoryComposer::class);
    }
}
