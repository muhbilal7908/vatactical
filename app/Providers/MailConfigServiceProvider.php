<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use App\Models\SettingModel;
class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $emailServices_smtp=SettingModel::find(1);
        $config = array(
            'driver' => $emailServices_smtp['mailer_driver'],
            'host' => $emailServices_smtp['mailer_host'],
            'port' => $emailServices_smtp['mailer_port'],
            'username' => $emailServices_smtp['mailer_username'],
            'password' => $emailServices_smtp['mailer_password'],
            'encryption' => $emailServices_smtp['mailer_encryption'],
            'from' => array('address' => $emailServices_smtp['mailer_email_id'], 'name' => $emailServices_smtp['mailer_name']),
            'sendmail' => '/usr/sbin/sendmail -bs',
            'pretend' => false,
        );
        Config::set('mail', $config);
    }
}
