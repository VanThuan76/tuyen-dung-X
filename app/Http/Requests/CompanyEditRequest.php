<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyEditRequest extends FormRequest
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
            'name'=>'required|max:255|min:2',
            'surname'=>'required|max:255|min:2',
            'email' => 'required|max:255|min:5|unique:users,email,' . auth()->user()->id,
            'about' => 'max:2000',
            'industry'=>'required|max:255|min:2',
            'capacity'=>'required|max:255|min:2',
            'address'=>'required|max:255|min:2',
            'tel'=>'required|numeric|digits_between:7,12',
            'website'=>'required|max:255|min:2',

        ];
    }
    public function messages(){
        return [
            'name.required'=>'Emri duhet të plotesohet.',
            'name.max'=>'Emri duhet të ketë maksimum 255 karaktere.',
            'name.min'=>'Emri duhet të ketë minimum 2 karaktere.',
            'surname.required'=>'Mbiemri duhet të plotësohet.',
            'surname.max'=>'Mbiemri duhet të ketë maksimum 255 karaktere.',
            'surname.min'=>'Mbiemri duhet të ketë minimum 2 karaktere.',
            'email.required'=>'Emaili duhet të plotesohet.',
            'email.max'=>'Emaili duhet të ketë maksimum 255 karaktere.',
            'email.min'=>'Emaili duhet të ketë minimum 5 karaktere.',
            'email.unique'=>'Ky email është në përdorim.',
            'about.max'=>'Bio duhet të ketë maksimum 255 karaktere.',
            'industry.required'=>'Industria duhet të plotësohet.',
            'industry.max'=>'Industria duhet të ketë maksimum 255 karaktere.',
            'industry.min'=>'Industria duhet të ketë minimum 2 karaktere.',
            'capacity.required'=>'Kapaciteti duhet të plotësohet.',
            'capacity.max'=>'Kapaciteti duhet të ketë maksimum 255 karaktere.',
            'capacity.min'=>'Kapaciteti duhet të ketë minimum 2 karaktere.',
            'address.required'=>'Adresa duhet të plotësohet.',
            'address.max'=>'Adresa duhet të ketë maksimum 255 karaktere.',
            'address.min'=>'Adresa duhet të ketë minimum 2 karaktere.',
            'tel.required'=>'Telefoni duhet të plotësohet.',
            'tel.max'=>'Telefoni duhet të ketë maksimum 255 karaktere.',
            'tel.min'=>'Telefoni duhet të ketë minimum 2 karaktere.',
            'tel.numeric'=>'Telefoni duhet të jetë me karaktere numerike.',
            'website.required'=>'Website duhet të plotësohet.',
            'website.max'=>'Website duhet të ketë maksimum 255 karaktere.',
            'website.min'=>'Website duhet të ketë minimum 2 karaktere.',

        ];
    }
}
