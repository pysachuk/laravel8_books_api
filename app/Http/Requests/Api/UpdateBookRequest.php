<?php

namespace App\Http\Requests\Api;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $book = $this->route('book');
        return Gate::allows('update-book', $book);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'pages_amount' => 'required|integer',
            'annotation' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'author_id' => 'required|integer',
        ];
    }
}
