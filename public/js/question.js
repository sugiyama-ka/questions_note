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
  var numberAnswer = 2;
  var numberId = 1; //解答の追加

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
  }); // 解答の削除

  $('.js-delete_answer').on('click', function () {
    var answerMinCount = 1; // 現在表示されている問題数の数を取得する

    var answerInput = $(this).parents('.js-answer_delete_target').find('.js-answer_unit');
    var answerInputCount = answerInput.length; //解答が１問未満の時は削除しない。

    if (answerInputCount > answerMinCount) {
      $(this).parents('.js-answer_delete_target').find('.js-answer_unit:last-child').remove();
      numberAnswer--;
      return;
    }
  });
  var numberProblem = 2; // 問題の追加

  $('#js-add_problem').on('click', function () {
    var numberProblemData = $('#js-problem_default .problem_number'); // console.log(numberProblemData);

    var numberProblemNow = numberProblemData.text('No.' + numberProblem); // console.log(numberProblemNow);

    var problemElement = $('#js-problem_default').clone(true);
    problemElement.removeAttr('id');
    problemElement.css('display', '');
    problemElement.addClass('problem_main');
    $('#js-problem_default').parent().append(problemElement);
    numberProblem++;
    return;
  }); // 問題の削除

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