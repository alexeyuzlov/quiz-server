<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class CursorPagingRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pageSize' => 'integer|min:1',

            'sort' => 'nullable',
            'sort.field' => [Rule::in('id', 'created_at', 'updated_at')],
            'sort.asc' => 'boolean',

            'cursor' => 'nullable'
        ];
    }
}
