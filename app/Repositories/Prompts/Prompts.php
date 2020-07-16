<?php

namespace App\Repositories\Prompts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class Prompts
{
    public static function get()
    {
        return auth()->check() ? auth()->user()->prompts()->get() : static::defaults();
    }

    public static function defaults()
    {
        return Defaults::get();
    }

    public static function forToday()
    {
        return static::get()->filter->shouldAppearToday();
    }
}
