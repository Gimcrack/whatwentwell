<?php

namespace App\Repositories\Preferences\Drivers;

class User implements DriverContract
{
    /**
     * @var \App\Preferences
     */
    protected $model;

    public function __construct(\App\User $user)
    {
        $this->model = $user->preferences;
    }

    public function get($key)
    {
        return $this->model->settings->$key;
    }

    public function set($key,$value)
    {
        $this->model->update([
           "settings->$key" => $value
        ]);
    }
}
