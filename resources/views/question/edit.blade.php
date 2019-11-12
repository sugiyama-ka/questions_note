@extends('layouts.app')

@section('js')
    <script src="{{ asset('js/question.js') }}" defer></script>
@endsection


@section('content')

<div class="container" id="problem_all">

    <div class="row mt-5 mb-5">
        <div class="col-md-6">
            <button type="button" id="js-add_problem" class="btn btn-primary"
            >問題の追加</button>
            <button type="button" class="btn btn-danger js-delete-problem ml-4" >問題の削除</button>
            <button type="submit" form="question_edit_form" class="btn btn-primary ml-4"
            >保存</button>
            <button type="button" class="btn btn-primary ml-4"
             onclick="history.back()">キャンセル</button>
        </div>
    </div>

    <form class="js-problem_target" id="question_edit_form" method="POST" action="{{ route('question.edit.create') }}">
      @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">タイトル</label>
                <input type="text" class="
                form-control" id="title" name="title" value="{{ $title->name }}">
            </div>
        </div>

        <hr size="1" color="#3490dc" noshade>

        <div class="problem_default" style="display:none;">
            @include('layouts.problem')
        </div>

        @if(empty(old('problems')))
        <div id="problem">
            <div class="problem_main">
                @include('layouts.problem')
            </div>
        </div>
        @else
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @foreach (old('problems') as $problem)
        <div id="problem">
            <div class="problem_main">
                @include('layouts.problem', ['problem' => $problem])
            </div>
        </div>
        @endforeach
        @endif
    </form>
</div>

@endsection

