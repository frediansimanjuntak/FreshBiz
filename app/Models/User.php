<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'key';
    public $incrementing = false;
    protected $fillable = [
        'name', 'email', 'phone', 'key', 'user_id', 'photo_url', 'disabled', 'administrator'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function event_organisers()
    {
        return $this->hasMany('App\Models\EventOrganiser');
    }
}