<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'section_name' => 'required|unique:sections|max:255',
           'description' => 'required|max:1000',

        ];

        if($this->method() == "POST"){
            $id = $request->id;

            $rules['section_name'] = 'required|max:255|unique:sections,section_name,'.$id;

        }
        return $rules ;
    }



    public function messages(): array
    {
        return [
            'section_name.required' =>'يرجي ادخال اسم القسم',
            'section_name.unique' =>'اسم القسم مسجل مسبقا',
            'description.required' =>'يرجي ادخال  البيان',

        ];
    }


}
