<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:10'],
            'post_creator'=> ['exists:App\Models\User,id']
        ];
    }

     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'You Must Write Title Of Your Post',
            'title.min' => 'You Must Write Minmum 3 Letters',
            'description.required' => 'You Must Write Description Of Your Post',
            'description.min' => 'You Must Write Minmum 10 Letters',
        ];
    }
}
