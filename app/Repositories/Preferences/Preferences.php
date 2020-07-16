<?php

namespace App\Repositories\Preferences;

use App\Repositories\Preferences\Drivers\DriverContract;
use App\Repositories\Preferences\Drivers\Guest;
use App\Repositories\Preferences\Drivers\User;
use Illuminate\Support\Facades\Session;

class Preferences
{

    public static function defaults()
    {
        return (object) [
            'theme' => Session::get('preferences.theme','Dark'),
            'timezone' => Session::get('preferences.timezone','America/Los_Angeles'),
            'weekly_day' => Session::get('preferences.weekly_day','Monday'),
            'monthly_day' => Session::get('preferences.monthly_day','first'),
        ];
    }

    public function get($key)
    {
        return $this->driver()->get($key);
    }

    public function set($key,$value)
    {
        $this->driver()->set($key,$value);
    }

    public function driver()
    {
        if ( auth()->check() )
            return new User(auth()->user());

        return new Guest;
    }
}
