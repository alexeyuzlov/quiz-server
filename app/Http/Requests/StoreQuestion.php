<?php

namespace App\Http\Requests;

class StoreQuestion extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question' => 'required|max:255',
            'answers' => 'array|required|min:1',
            'answers.*.value' => 'required',
            'answers.*.correct' => 'boolean'
        ];
    }
}
