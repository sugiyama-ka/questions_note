<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Support\Facades\Validator;
use App\QuestionGroup;
use Illuminate\Http\Request;
use App\Http\Requests\CreateQuestionGroupRequest;
use App\Http\Requests\EditRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class QuestionController extends Controller
{
    /**
     * Creating prpblem list page.
     *
     * 問題一覧ページの作成
     *
     * @return void
     */
    public function index()
    {
        // DB::enableQueryLog();
        $login_user_id = auth()->user()->id;
        // このユーザーIDを条件にquestionsテーブルとquestionsgrpupテーブルの情報を取得
        $questions = QuestionGroup::where('user_id', $login_user_id)->orderBy('id','desc')->paginate(10);
        // dd(DB::getQueryLog());

        return view('question.index',compact('questions'));
    }
    /**
     * Undocumented function
     *
     * @param request $request
     * @return void
     */
    public function edit(request $request)
    {
        // $errors = $request->session()->get('errors');
        // if(!empty($errors))
        // {
        //     $nameError = Arr::pluck($errors, '"bags":protected.default."messages":protected.category');
        // } else {
        //     $nameError = "";
        // }
        $errors = $request->session()->get('errors');
        Log::debug($errors);


        return view('question.edit');
    }

    public function editCreate(Request $request)
    {
        $problems = $request->input('problems');
        Log::debug($problems);
        $validator = Validator::make($problems, [
            'problems.*.index' => 'required',
            'problems.*.content' => 'required',
            'problems.*.weight' =>'required',
            'problems.*.answer.*.index' => 'required',
            'problems.*.answer.*.content' =>'required',
        ]);

        if($validator->fails()){
            return redirect('/question/edit')
                ->withErrors($validator)
                ->withInput($request->all());
        }

        foreach($problems as $problem){
            $question = new Question();
            $question->sort = $problem['index'];
            $question->content = $problem['content'];
            $question->weight = $problem['weight'];
            $question->save();
            Log::debug($problem);
        }
//        foreach($questions as $answers){
//
//        }


        // questionGroupテーブルにinsert処理
        // $questionGroup = new QuestionGroup;
        // $questionGroup->fill([
        //     'user_id' => auth()->user()->id,
        //     'name' => $request->title,
        // ]);
        // $questionGroup->save();

    }

    public function new(Request $request)
    {
        $errors = $request->session()->get('errors');

        if(!empty($errors))
            {
                $nameError = Arr::pluck($errors, '"bags":protected.default."messages":protected.category');
            } else {
                $nameError = "";
            }
        return view('question.new');
        // errors変数を渡すとエラーになる
    }

    public function newCreate(CreateQuestionGroupRequest $request)
    {
        $login_user_id = auth()->user()->id;
        // ヘルパー関数のauth()を呼んでいる。
        $category = $request->category;
        $name = $request->name;
        $errors = $request->session()->get('errors');

        QuestionGroup::create([
            'category' => $category,
            'user_id' => $login_user_id,
            'name' => $name,
        ]);
        return redirect('/question/index');
    }
}

