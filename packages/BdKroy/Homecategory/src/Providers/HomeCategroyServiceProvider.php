<?php

namespace BdKroy\Homecategory\Providers;
use Illuminate\Support\ServiceProvider;

class HomeCategroyServiceProvider extends ServiceProvider
{

    public function boot() {
        include __DIR__ . '/../Http/routes.php';
    }

    public function register() {

    }
}
