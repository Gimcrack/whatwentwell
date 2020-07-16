<?php

namespace App;

use App\Repositories\Prompts\Prompts;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        static::created( function($model) {
           $model->preferences()->create();

           Prompts::defaults()->each(function($prompt) use ($model) {
               $model->prompts()->save($prompt);
           });
        });
    }

    public function preferences()
    {
        return $this->hasOne(Preferences::class);
    }

    public function prompts()
    {
        return $this->hasMany(Prompt::class);
    }
}
