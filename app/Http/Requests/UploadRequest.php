<?php

namespace App\Http\Requests;

class UploadRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file' => 'required|file',
            'desc' => 'required'
        ];
    }
}
