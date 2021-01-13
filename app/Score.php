<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'question_id',
        'report_id',
        'answer',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
