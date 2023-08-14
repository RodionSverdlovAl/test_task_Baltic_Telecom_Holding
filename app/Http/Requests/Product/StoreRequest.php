<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'name' => 'required|min:10',
            'article' => 'required|unique:products|regex:/^[A-Za-z0-9]+$/',
            'status' => '',
            'attributes' => '',
        ];
    }

    public function messages() : array
    {
        return [
            'name.required' => 'Поле "Название" обязательно для заполнения.',
            'name.min' => 'Поле "Название" должно содержать не менее :min символов.',
            'article.required' => 'Поле "Артикул" обязательно для заполнения.',
            'article.unique' => 'Такой "Артикул" уже существует в таблице.',
            'article.regex' => 'Поле "Артикул" должно содержать только латинские символы и цифры.',
        ];
    }

    protected function failedValidation(Validator $validator) : void
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], ResponseAlias::HTTP_UNPROCESSABLE_ENTITY));
    }
}
