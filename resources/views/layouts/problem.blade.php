    <div class="card mb-3">
        <div class="card-body">
            <div class="problem_tool row p-3">
                <div class="col-5">
                    <button type="button" class="btn btn-primary js-add_answer mr-3" >解答の追加</button>
                    <button type="button" class="btn btn-primary js-problem_answer_head_btn" >解答の削除</button>
                </div>
            </div>

            <div class="problem_info p-2" data-problemid="0">
                <div class="mt-3 mb-3 row">
                    <div class="col-1 problem_info_no">
                        <h5 class="mb-4">No.</h5>
                        <input type="text" class="form-control" name="problems[0][index]">
                    </div>
                    <div class="col-6 problem_info_title">
                        <h5 class="mb-4">問題</h5>
                        <input type="text" class="form-control"  placeholder="" value="{{ @$problem['content'] }}" name="problems[0][content]">
                    </div>
                    <div class="col-3 problem_info_weight">
                        <h5 class="mb-4">配点</h5>
                        <input type="text" class="form-control" placeholder="" value="{{ @$problem['weight'] }}" name="problems[0][weight]">
                    </div>
                </div>
            </div>

            <div class="problem_answer p-2">
                <div class="problem_answer_head row mb-2">
                    <div class="col-1 problem_answer_head_no">
                        <h5>No.</h5>
                    </div>
                    <div class="col-3 problem_answer_head_content">
                        <h5>解答</h5>
                    </div>
                    <div class="col-3 problem_answer_head_content">
                    </div>
                    <div class="col-2 problem_answer_head_btn text-center">
                        <h5>正否</h5>
                    </div>
                </div>
                <div class="problem_answer_content">
                    <div class="problem_answer_content_main">
                        <div class="row mb-3 js-add problem_answer_content_add" data-answerid="0">
                            <div class="col-1 problem_answer_content_no">
                                <input type="text" class="form-control" name="problems[0][answer][0][index]" value="{{ @$problem['answer'][0]['index'] }}">
                            </div>
                            <div class="col-6 problem_answer_content_content">
                                <input type="text" class="form-control " placeholder="" name="problems[0][answer][0][content]" value="{{ @$problem['answer'][0]['content'] }}">
                            </div>
                            <div class="col-2 text-center problem_answer_content_correct">
                                <input type="radio" class="form_correct" value="good" name="correct">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

