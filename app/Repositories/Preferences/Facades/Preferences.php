<?php

namespace App\Repositories\Preferences\Facades;

use Illuminate\Support\Facades\Facade;

class Preferences extends Facade
{
    public static function getFacadeAccessor()
    {
        return \App\Repositories\Preferences\Preferences::class;
    }
}
