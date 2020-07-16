<?php

namespace App\Providers;

use App\Repositories\Preferences\Drivers\Guest;
use App\Repositories\Preferences\Drivers\User;
use App\Repositories\Preferences\Preferences;
use Illuminate\Support\ServiceProvider;

class PreferencesProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(Preferences::class, function() {
            $driver = auth()->check() ?
                new User(auth()->user()) :
                new Guest;

            return new Preferences($driver);
        });
    }
}
