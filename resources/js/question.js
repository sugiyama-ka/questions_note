$(function () {

    var numberAnswer = 2;
    var numberId = 1;

    //解答の追加
    $('.js-add_answer').on('click', function () {

        // display:none;しているデフォルトから解答欄を取得
        var element = $('#js-problem_default .problem_content_main').clone(true);
        $(this).parents('.js-add_answer_target:last-child').append(element);

        var number = $(this).parents('.js-problem').find('.problem_content_main:last');
        var numberNow = number.find('.answer_number');
        console.log(number);
        var now = numberNow.text().split('.');
        var a = now[1];
        a++;
        numberNow.text('No.' + a);
        console.log(numberNow);

        numberAnswer++;
        return;
    });
    // 解答の削除
    $('.js-delete_answer').on('click', function () {
        var answerMinCount = 1;
        // 現在表示されている問題数の数を取得する
        var answerInput = $(this).parents('.js-answer_delete_target').find('.js-answer_unit');
        var answerInputCount = answerInput.length;
        //解答が１問未満の時は削除しない。
        if (answerInputCount > answerMinCount) {
            $(this).parents('.js-answer_delete_target').find('.js-answer_unit:last-child').remove();

            numberAnswer--;
            return;
        }
    });

    var numberProblem = 2;

    // 問題の追加
    $('#js-add_problem').on('click', function () {

        var numberProblemData = $('#js-problem_default .problem_number');
        // console.log(numberProblemData);
        var numberProblemNow = numberProblemData.text('No.' + numberProblem);
        // console.log(numberProblemNow);

        var problemElement = $('#js-problem_default').clone(true);
        problemElement.removeAttr('id');
        problemElement.css('display', '');
        problemElement.addClass('problem_main')
        $('#js-problem_default').parent().append(problemElement);

        numberProblem++;
        return;
    })

    // 問題の削除
    $('.js-delete_problem').on('click', function () {
        // 問題が1問未満の時は削除しない。
        var problemMinCount = 1;
        var problemInput = $(this).parents('.js-problem_target').find('.problem_main');
        var problemInputCount = problemInput.length;
        if (problemInputCount > problemMinCount) {
            $(this).parents('.js-problem_target').find('.js-problem:last-child').remove();
            numberProblem--;
            return;
        }
    });
});
