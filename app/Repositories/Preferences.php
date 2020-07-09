<?php

namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\Session;

class Preferences
{
    /**
     * @var \App\User
     */
    protected $user;

    public function __construct()
    {
        $this->user = auth()->check() ? auth()->user() : new User;

        $this->settings = auth()->check() ? $this->user->preferences->settings : static::defaults();
    }

    public static function defaults()
    {
        return (object) [
            'theme' => Session::get('preferences.theme','Dark'),
            'timezone' => Session::get('preferences.timezone','America/Los_Angeles'),
        ];
    }

    public static function get($key)
    {
        return (new static)->settings->$key;
    }

    public static function set($key,$value)
    {
        
    }
}
