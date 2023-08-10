<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BooksIndexRequest extends FormRequest
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
            "created_at" => ['required', 'integer'],
            'updated_at' => ['required', 'integer'],
            'year' => 'sometimes | integer | min:1970 | max:' . date('Y'),
            'lang' => ['sometimes', Rule::in(['en', 'ua', 'pl', 'de'])],
        ];
    }
}
