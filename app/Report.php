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

    public function getIsIntraversionAttribute()
    {
        return $this->I >= $this->E ? true : false;
    }

    public function getIsSensingAttribute()
    {
        return $this->S >= $this->N ? true : false;
    }

    public function getIsThinkingAttribute()
    {
        return $this->T >= $this->F ? true : false;
    }

    public function getIsJudgingAttribute()
    {
        return $this->J >= $this->P ? true : false;
    }
}
