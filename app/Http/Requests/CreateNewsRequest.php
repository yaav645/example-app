<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:150'],
            'author' => ['required', 'string', 'min:2', 'max:100'],
            'category_id' => ['required', 'integer'],
            'status' => ['required', 'string'],
            'description' => ['sometimes']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Данное поле с именем :attribute необходимо заполнить',
            'min' => [
                'string' => 'Поле :attribute должно содержать не меньше :min символов'
            ]
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Заголовок',
            'author' => 'Автор',
            'description' => 'Описание'
        ];
    }
}
