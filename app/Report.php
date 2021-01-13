<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'final',
        'E',
        'I',
        'S',
        'N',
        'T',
        'F',
        'J',
        'P',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }

    public function getIsIntroversionAttribute()
    {
        return $this->I < $this->E ? false : true;
    }
}
