<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventCategories extends Model
{
    //    
    protected $primaryKey = 'key';
    public $incrementing = false;
    const UPDATED_AT = 'updated_at';
    protected $fillable = [
        'key', 'name', 'description', 'disabled'
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

    public function event()
    {
        return $this->hasMany('App\Models\Events');
    }
}
