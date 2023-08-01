<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'id' => 'exists:books,id',
            'name' => 'required' | 'string',
            'author' => 'require' | 'string',
            'year' => 'require' | 'integer',
            'countPages' => 'require' | 'integer',
        ];
    }
}
