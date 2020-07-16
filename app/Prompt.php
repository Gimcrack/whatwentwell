<?php

namespace App;

use App\Repositories\Preferences\Facades\Preferences as PreferencesFacade;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Prompt extends Model
{
    const DAILY = 'DAILY';
    const WEEKLY = 'WEEKLY';
    const MONTHLY = 'MONTHLY';
    const RANDOM = 'RANDOM';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function scopeUnanswered(Builder $query)
    {
        return $query->whereDoesntHave('posts');
    }

    public function shouldAppearToday()
    {
        switch ($this->interval) {
            case static::DAILY :
                return true;

            case static::WEEKLY :
                return Carbon::now()->format('l') == PreferencesFacade::get('weekly_day');

            case static::MONTHLY :
                $monthly_day = PreferencesFacade::get('monthly_day') === 'first' ? 1 : Carbon::now()->format('t');
                return Carbon::now()->format('j') == $monthly_day;

            case static::RANDOM :
                return app(\Faker\Generator::class)->boolean(30);
        }
    }


}
