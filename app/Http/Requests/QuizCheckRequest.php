<?php

namespace App\Http\Requests;

use App\Rules\DbIdRule;

class QuizCheckRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'questions' => 'array|present',
            'questions.*.id' => ['required', new DbIdRule()],
            'questions.*.answerIds' => ['array', 'present'],
            'questions.*.answerIds.*' => new DbIdRule(),
        ];
    }
}
