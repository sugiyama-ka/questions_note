<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateQuestionRequest;
use App\Question_group;
use App\User;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index()
    {
        return view('question.index');
    }

    public function edit()
    {
        return view('question.edit');
    }

    public function new()
    {
        return view('question.new');
    }

        public function newCreate(CreateQuestionRequest $request)
    {
        $question = new Question_group;
        $login_user_id = Auth::user()->id;

        $question->fill([
            'name' => $request->name,
            'user_id' => $login_user_id,
            'category' => $request->category,
        ]);

        $question->save();

        return redirect('/question/index');
    }
}

