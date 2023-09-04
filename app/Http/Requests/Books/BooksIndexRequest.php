<?php

namespace App\Http\Requests\Books;

use App\Enum\LangEnum;
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
            'id' => ['required', 'integer'],
            'created_at' => ['required', 'integer'],
            'updated_at' => ['required', 'integer'],
            'year' => 'sometimes | integer | min:1970 | max:' . date('Y'),
            'lang' => ['sometimes', Rule::enum(LangEnum::class)],
        ];
    }
}
