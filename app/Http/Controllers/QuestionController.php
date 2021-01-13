<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Traits\ApiResponse;

class QuestionController extends Controller
{
    use ApiResponse;

    /**
     * Display questions listing.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->withInfo(Question::get());
    }
}
