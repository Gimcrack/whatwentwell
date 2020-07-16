<?php

namespace App;

use App\Repositories\Preferences\Facades\Preferences as PreferencesRepo;
use Illuminate\Database\Eloquent\Model;

class Preferences extends Model
{
    protected $guarded = [];

    protected $casts = [
        'settings' => 'object'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->settings = PreferencesRepo::defaults();
        });
    }

    public function setSettingsAttribute($value)
    {
        $this->attributes['settings'] = json_encode($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
