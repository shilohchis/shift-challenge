<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'desc',
        'dimension',
        'direction',
        'meaning'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function getDirectionAttribute($val)
    {
        return intval($val) == -1 ? false : true;
    }
}
