<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Question;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;

class QuestionController extends Controller
{
    /**
     * Display questions listing.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return QuestionResource::collection(Question::all());
    }
}
