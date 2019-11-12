<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sort' => 'required',
            'question_content' => 'required',
            'question_weight' =>'required',
            'sort1' => 'required',
            'question_content1' => 'required',
            'question_weight1' =>'required',

        ];
    }

        public function messages()
    {
        return [
            'sort.required' => 'NO.を入力してください。',
            'question_content.required' => '問題を入力してください。',
            'question_weight.required' => '配点を入力してください。',
            'sort1.required' => 'NO.を入力してください。',
            'question_content1.required' => '問題を入力してください。',
            'question_weight1.required' => '配点を入力してください。',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  Validator  $validator
     * @return void
     *
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
//        throw (new ValidationException($validator))
//            ->errorBag($this->errorBag)
//            ->redirectTo($this->getRedirectUrl());

        $request = $this->all();
        $errors = (new ValidationException($validator))->errors();

        throw (new ValidationException(
            $validator,
            redirect($this->getRedirectUrl())
                ->withErrors($errors)
                ->withInput($request),
            $this->errorBag
        ));
    }
}
