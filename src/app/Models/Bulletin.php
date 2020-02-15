<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    protected $fillable = [
        'user_id', 'title', 'description', 'country',
        'phone', 'email', 'end_date', 'image', 'latitude',
        'longitude'
    ];

    protected $dates = [
        'end_date',
    ];

    public function getImageAttribute($value)
    {
        if ($value != null) {
            return config('app.full_path') . $value;
        }
    }
}
