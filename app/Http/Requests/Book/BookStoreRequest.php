<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
