<?php

namespace App\Repositories\Preferences\Drivers;

use App\Repositories\Preferences\Preferences;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class Guest implements DriverContract
{
    protected $session_id;

    public function __construct()
    {
        $this->session_id = Session::getId();

        $this->model = Cache::get($this->getCacheKey(), Preferences::defaults());
    }

    public function get($key)
    {
        return $this->model->$key;
    }

    public function set($key, $value)
    {
        $this->model->$key = $value;

        Cache::forever($this->getCacheKey(), $this->model);
    }

    protected function getCacheKey()
    {
        return "preferences.guest.{$this->session_id}";
    }
}
