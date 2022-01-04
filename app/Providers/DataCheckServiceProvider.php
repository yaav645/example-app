<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DataCheckServiceProvider extends ServiceProvider {
    public function register()
    {
        $this->app->bind('dataCheck', 'App\Services\DataCheck');
    }
}
