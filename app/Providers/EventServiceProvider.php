<?php
namespace App\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Login::class => [
            'App\Listeners\LogSuccessfulLogin',
        ],

        Logout::class => [
            'App\Listeners\LogSuccessfulLogout',
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}