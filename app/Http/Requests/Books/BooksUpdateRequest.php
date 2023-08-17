<?php

namespace App\Http\Requests\Books;

use App\Enum\LangEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BooksUpdateRequest extends FormRequest
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
            'id' => 'exists:books,id',
            'name' => 'required' | 'string',
            'year' => 'sometimes | integer | min:1970 | max:' . date('Y'),
            'lang' => ['sometimes', Rule::enum(LangEnum::class)],
            'pages' => ['required', 'integer', 'min:10', 'max:55000'],
        ];
    }
}
