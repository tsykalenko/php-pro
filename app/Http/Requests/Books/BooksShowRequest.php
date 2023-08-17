<?php

namespace App\Http\Requests\Books;

use Illuminate\Foundation\Http\FormRequest;

class BooksShowRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('id')
        ]);
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'integer'],
        ];
    }
}
