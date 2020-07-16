<?php

namespace App\Repositories\Preferences\Drivers;

interface DriverContract
{
    public function get($key);

    public function set($key, $value);
}
