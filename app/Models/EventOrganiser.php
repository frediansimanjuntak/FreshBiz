<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventOrganiser extends Model
{
    const UPDATED_AT = 'updated_at';
    protected $fillable = [
        'company_name', 'description', 'address', 'phone', 'email', 'website', 'user_key'
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
}
