<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventOrganiser extends Model
{
    
    protected $primaryKey = 'key';
    public $incrementing = false;
    const UPDATED_AT = 'updated_at';
    protected $fillable = [
        'key', 'company_name', 'description', 'address', 'phone', 'email', 'website', 'user_key'
    ];
    protected $hidden = [

    ];
    protected $guarded = [
        'id',
    ];
    protected $casts = [
        'id' => 'integer',
    ];
    public $timestamps = true;
    protected $dates = [
        'created_at', 'updated_at', 
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_key');
    }

    public function event()
    {
        return $this->hasMany('App\Models\Events');
    }
}
