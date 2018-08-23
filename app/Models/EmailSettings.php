<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailSettings extends Model
{
    //
    const UPDATED_AT = 'updated_at';
    protected $fillable = [
        'from_name', 'from_email', 'mandrill_key', 'feedback_email_to'
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
