<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReportResource;
use Illuminate\Http\Request;
use App\Report;
use App\Question;
use App\Score;
use App\User;

class AnswerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $user = User::create([
            'email' => request('email')
        ]);
        $report = Report::create([
            'user_id' => $user->id
        ]);
        $data = collect([
            'E' => 0,
            'I' => 0,
            'S' => 0,
            'N' => 0,
            'T' => 0,
            'F' => 0,
            'J' => 0,
            'P' => 0
        ]);
        foreach(request('answers') as $a) {
            $q = Question::find($a['id']);
            Score::create([
                'question_id' => $a['id'],
                'answer' => $a['value'],
                'report_id' => $report->id
            ]);
            if($a['value'] == 4) {
                $data[ $q->dimension[0] ] += 1;
            } else {
                $data[ $q->dimension[intval($a['value'] > 4 ? $q->direction : !$q->direction)] ] += $a['value'] % 4;
            }
        }
        $data->chunk(2)->each(function($row, $index) use($report) {
            $arr = $row->toArray();
            $keys = array_keys($arr, max($arr));
            $report->final = $report->final.$keys[0];
        });
        $data->each(function($val, $key) use($report) {
            $report->$key = $val;
        });
        $report->save();
        return new ReportResource($report);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
        //
    }
}
