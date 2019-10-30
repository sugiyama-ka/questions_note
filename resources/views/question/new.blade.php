@extends('layouts.app')

@section('js')
    <script src="{{ asset('js/question.js') }}" defer></script>
@endsection

@section('content')

<div class="container">

    <div class="row mt-5 mb-5">
        <div class="col-md-6">
            <a href="#!" class="btn btn-primary mr-3 test">保存</a>
            <a href="#!" class="btn btn-primary mr-3 cancel">キャンセル</a>
            <button type="button" id="js-add_problem" class="btn btn-primary"
            >問題の追加</button>
        </div>
    </div>

    <form class="js-problem_target">
      @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">タイトル</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="">
            </div>
        </div>

        <hr size="1" color="#3490dc" noshade>

        <div id="js-problem_default" class="js-problem" style="display:none;">
            <div class="card mb-3">
                <div class="card-body js-add_answer_target js-answer_delete_target">

                    <div class="problem_header">
                        <div class="row mt-3 mb-3">
                            <div class="col-md-6 offset-1">
                                <h5>問題</h5>
                            </div>
                            <div class="col-md-3">
                                <h5>配点</h5>
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <div class="col-md-1">
                                <h5 class="problem_number">No.1</h5>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" placeholder="">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="title" placeholder="">
                            </div>
                            <div class="col-md-2">
                                <button type="button" id="js-add_problem" class="btn btn-primary js-delete_problem">問題の削除</button>
                            </div>
                        </div>
                    </div>

                    <div class="problem_content">
                        <div class="problem_content_add_btn">
                            <div class="row mt-5 mb-5">
                                <div class="col-2">
                                    <button type="button" class="btn btn-primary js-add_answer" >解答の追加</button>
                                </div>
                            </div>
                        </div>

                        <div class="problem_content_header">
                            <div class="row mt-5 mb-3">
                                <div class="col-md-6 offset-1">
                                    <h5>解答</h5>
                                </div>
                                <div class="col-md-2 text-center ">
                                    <h5>正否</h5>
                                </div>
                            </div>
                        </div>

                        <div class="problem_content_main">
                            <div class="js-answer_unit">
                                <div class="row mb-3">
                                    <div class="col-1">
                                        <h5 class="answer_number" data-id="1">No.1</h5>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="title" placeholder="">
                                    </div>
                                    <div class="col-2 text-center">
                                        <input type="radio" name="hyouka" value="good">
                                    </div>
                                    <div class="col-1">
                                        <button type="button" id="js-add_problem" class="btn btn-primary js-delete_answer">削除</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="js-problem problem_main">
            <div class="card mb-3">
                <div class="card-body js-add_answer_target js-answer_delete_target">

                    <div class="problem_header">
                        <div class="row mt-3 mb-3">
                            <div class="col-md-6 offset-1">
                                <h5>問題</h5>
                            </div>
                            <div class="col-md-3">
                                <h5>配点</h5>
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <div class="col-md-1">
                                <h5>No.1</h5>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" placeholder="">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="title" placeholder="">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary js-delete_problem">問題の削除</button>
                            </div>
                        </div>
                    </div>

                    <div class="problem_content">
                        <div class="problem_content_add_btn">
                            <div class="row mt-5 mb-5">
                                <div class="col-2">
                                    <button type="button" class="btn btn-primary js-add_answer" >解答の追加</button>
                                </div>
                            </div>
                        </div>

                        <div class="problem_content_header">
                            <div class="row mt-5 mb-3">
                                <div class="col-md-6 offset-1">
                                    <h5>解答</h5>
                                </div>
                                <div class="col-md-2 text-center ">
                                    <h5>正否</h5>
                                </div>
                            </div>
                        </div>

                        <div class="problem_content_main">
                            <div class="js-answer_unit">
                                <div class="row mb-3">
                                    <div class="col-1">
                                        <h5 class="answer_number" data-id="1">No.1</h5>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="title" placeholder="">
                                    </div>
                                    <div class="col-2 text-center">
                                        <input type="radio" name="hyouka" value="good">
                                    </div>
                                    <div class="col-2">
                                        <button type="button" id="js-add_problem" class="btn btn-primary js-delete_answer">削除</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

