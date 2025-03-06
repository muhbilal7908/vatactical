<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SettingModel;
use Illuminate\Support\Facades\Config;
class BankfulConfigServiceProvider extends ServiceProvider
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
        $emailServices_smtp=SettingModel::find(1);
        $config = array(
            'username' => $emailServices_smtp['bankful_username'],
            'password' => $emailServices_smtp['bankful_password'],
        );
        Config::set('bankful', $config);
    }
}
