<?php

namespace App;

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

    public function ads()
    {
        return $this->hasMany(Ad::class, 'creator_id');
    }

    public function planners()
    {
        return $this->hasMany(Planner::class, 'creator_id');
    }

    public function items()
    {
        return $this->hasManyThrough(Item::class, Ad::class, 'creator_id', 'ad_id', 'id', 'id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
