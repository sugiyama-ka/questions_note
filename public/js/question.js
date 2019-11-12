/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/question.js":
/*!**********************************!*\
  !*** ./resources/js/question.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  // 解答の追加
  $('.js-add_answer').on('click', function () {
    // 末尾のAnswer要素を取得する
    var lastAnswerElement = $(this).parents('.problem_main').find('.problem_answer_content_add').last(); // console.log(lastAnswerElement);
    // 取得したAnswer要素からdata-idを取得し、name属性に割り振る番号を作る。

    var answerNextId = lastAnswerElement.data()['answerid'] + 1;
    var problemId = $(this).parents('.problem_main').find('.problem_info').data()['problemid'];
    console.log(answerNextId);
    console.log(problemId); // デフォルトの答えをクローンする

    var answerElemet = $('.problem_default .js-add').clone(true); // 各項目にname属性をつける。

    answerElemet.find('.problem_answer_content_no .form-control').attr('name', 'problems[' + problemId + '][answer][' + answerNextId + '][index]');
    answerElemet.find('.problem_answer_content_content .form-control').attr('name', 'problems[' + problemId + '][answers][' + answerNextId + '][content]');
    answerElemet.find('.problem_answer_content_correct .form_correct').attr('name', 'problems[' + problemId + '][answers][' + answerNextId + '][correct]'); // nama属性の番号を管理しているdata-id属性を書き換える。

    answerElemet.data('answerid', answerNextId); // その問題の一番最後の解答の後ろに追加

    $(this).parents('.problem_main').find('.problem_answer_content_main').last().append(answerElemet);
  }); // 解答の削除

  $('.js-problem_answer_head_btn').on('click', function () {
    // 末尾のAnswer要素を取得する
    var lastAnswerElement = $(this).parents('.problem_main').find('.problem_answer_content_add').last(); // 現在表示されているAnswer要素の数を数える。

    var answerElementLengh = $(this).parents('.problem_main').find('.problem_answer_content_add').length; // 現在表示されている解答の数が1より少ない場合はAnswer要素を削除しない。

    if (answerElementLengh > 1) {
      lastAnswerElement.remove();
    }
  }); // 問題の追加

  $('#js-add_problem').on('click', function () {
    // problem要素をデフォルトから問題をコピーする。
    var problemElement = $(this).parents('#problem_all').find('.problem_default').clone(true); // 取得したProblem要素からdata-idを取得し、name属性に割り振る番号を作る。

    var problemInput = $(this).parents('#problem_all').find('.problem_main').last().find('.problem_info');
    var problemNextId = problemInput.data('problemid') + 1;
    console.log(problemNextId); // 画面を表示。

    problemElement.css('display', ''); // クラス名を変更

    problemElement.removeClass('problem_default');
    problemElement.addClass('problem_main'); // 各項目にname属性をつける

    problemElement.find('.problem_info_no .form-control').attr('name', 'problems[' + problemNextId + '][index]');
    problemElement.find('.problem_info_title .form-control').attr('name', 'problems[' + problemNextId + '][content]');
    problemElement.find('.problem_info_weight .form-control').attr('name', 'problems[' + problemNextId + '][weight]');
    problemElement.find('.problem_answer_content_no .form-control').attr('name', 'problems[' + problemNextId + '][answer][0][index]');
    problemElement.find('.problem_answer_content_content .form-control').attr('name', 'problems[' + problemNextId + '][answer][0][content]');
    problemElement.find('.problem_answer_content_content .form-control').attr('name', 'problems[' + problemNextId + '][answer][0][correct]'); // nama属性の番号を管理しているdata-id属性を変更する。

    problemElement.find('.problem_info').data('problemid', problemNextId); // 表示されている問題の最後にproblem要素を追加する。

    $(this).parents('#problem_all').find('#problem').last().append(problemElement);
  }); // 問題の削除

  $('.js-delete-problem').on('click', function () {
    // 末尾のProblem要素を取得する
    var lastProblemElement = $(this).parents('#problem_all').find('#problem .problem_main').last(); // 現在表示されている問題の数を取得

    var problemElementLengh = $(this).parents('#problem_all').find('#problem .problem_main').length; // 表示されている問題の数が1以下の場合は削除しない

    if (problemElementLengh > 1) {
      lastProblemElement.remove();
    }
  });
});

/***/ }),

/***/ 1:
/*!****************************************!*\
  !*** multi ./resources/js/question.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/resources/js/question.js */"./resources/js/question.js");


/***/ })

/******/ });