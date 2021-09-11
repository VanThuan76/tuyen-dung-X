<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobStoreRequest extends FormRequest
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
            'title'=>'required|max:255|min:2',
            'body'=>'required|max:2000|min:2',
            'address'=>'required|max:255|min:2',
            'job_type'=>'required|numeric|max:2|min:1',
            'experience'=>'required|numeric|min:0|max:3',
            'category_id' => 'required|numeric',
            'duties'=>'required|max:2000|min:2',
            'startingDate'=>'required|max:255|min:2',
            'price_type'=>'required|numeric|max:2|min:1',
            'price'=>'required|max:255|min:2'
        ];
    }
}
