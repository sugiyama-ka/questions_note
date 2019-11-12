$(function () {

  // 解答の追加
  $('.js-add_answer').on('click', function () {
    // 末尾のAnswer要素を取得する
    const lastAnswerElement = $(this).parents('.problem_main')
      .find('.problem_answer_content_add').last();
    // console.log(lastAnswerElement);

    // 取得したAnswer要素からdata-idを取得し、name属性に割り振る番号を作る。
    const answerNextId = lastAnswerElement.data()['answerid'] + 1;
    const problemId = $(this).parents('.problem_main').find('.problem_info').data()['problemid'];
    console.log(answerNextId);
    console.log(problemId);

    // デフォルトの答えをクローンする
    const answerElemet = $('.problem_default .js-add').clone(true);

    // 各項目にname属性をつける。
    answerElemet.find('.problem_answer_content_no .form-control').attr('name', 'problems[' + problemId + '][answer][' + answerNextId + '][index]');
    answerElemet.find('.problem_answer_content_content .form-control').attr('name', 'problems[' + problemId + '][answers][' + answerNextId + '][content]');
    answerElemet.find('.problem_answer_content_correct .form_correct').attr('name', 'problems[' + problemId + '][answers][' + answerNextId + '][correct]');

    // nama属性の番号を管理しているdata-id属性を書き換える。
    answerElemet.data('answerid', answerNextId);

    // その問題の一番最後の解答の後ろに追加
    $(this).parents('.problem_main').find('.problem_answer_content_main').last().append(answerElemet);
  });

  // 解答の削除
  $('.js-problem_answer_head_btn').on('click', function () {

    // 末尾のAnswer要素を取得する
    const lastAnswerElement = $(this).parents('.problem_main').find('.problem_answer_content_add').last();

    // 現在表示されているAnswer要素の数を数える。
    const answerElementLengh = $(this).parents('.problem_main').find('.problem_answer_content_add').length;

    // 現在表示されている解答の数が1より少ない場合はAnswer要素を削除しない。
    if (answerElementLengh > 1) {
      lastAnswerElement.remove();
    }
  });

  // 問題の追加
  $('#js-add_problem').on('click', function () {

    // problem要素をデフォルトから問題をコピーする。
    const problemElement = $(this).parents('#problem_all').find('.problem_default').clone(true);

    // 取得したProblem要素からdata-idを取得し、name属性に割り振る番号を作る。
    const problemInput = $(this).parents('#problem_all').find('.problem_main').last().find('.problem_info');
    const problemNextId = problemInput.data('problemid') + 1;
    console.log(problemNextId);

    // 画面を表示。
    problemElement.css('display', '');

    // クラス名を変更
    problemElement.removeClass('problem_default');
    problemElement.addClass('problem_main');

    // 各項目にname属性をつける
    problemElement.find('.problem_info_no .form-control').attr('name', 'problems[' + problemNextId + '][index]');
    problemElement.find('.problem_info_title .form-control').attr('name', 'problems[' + problemNextId + '][content]');
    problemElement.find('.problem_info_weight .form-control').attr('name', 'problems[' + problemNextId + '][weight]');
    problemElement.find('.problem_answer_content_no .form-control').attr('name', 'problems[' + problemNextId + '][answer][0][index]');
    problemElement.find('.problem_answer_content_content .form-control').attr('name', 'problems[' + problemNextId + '][answer][0][content]');
    problemElement.find('.problem_answer_content_content .form-control').attr('name', 'problems[' + problemNextId + '][answer][0][correct]');

    // nama属性の番号を管理しているdata-id属性を変更する。
    problemElement.find('.problem_info').data('problemid', problemNextId);

    // 表示されている問題の最後にproblem要素を追加する。
    $(this).parents('#problem_all').find('#problem').last().append(problemElement);
  })

  // 問題の削除
  $('.js-delete-problem').on('click', function () {

    // 末尾のProblem要素を取得する
    const lastProblemElement = $(this).parents('#problem_all').find('#problem .problem_main').last();

    // 現在表示されている問題の数を取得
    const problemElementLengh = $(this).parents('#problem_all').find('#problem .problem_main').length;

    // 表示されている問題の数が1以下の場合は削除しない
    if (problemElementLengh > 1) {
      lastProblemElement.remove();
    }
  });
});
