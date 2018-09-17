<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookManagementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:2|string',
            'author' => 'required|min:2|string',
            'edition' => 'min:2|string',
            'session' => 'required|min:2',
            'category_id' => 'required|min:1|numeric',
            'page' => 'required|min:2|numeric',
            'publisher' => 'required|string',
            'language' => 'required|min:2|string',
            'isbn' => 'required|min:2|string|unique:book_managements,isbn',
            'purchase_date' => 'required|date',
            'quantity' => 'required|min:1|numeric',
            'price' => 'required|numeric',
            'shelf_id' => 'required|min:1|numeric',
            'image' => 'image',
        ];
    }
}