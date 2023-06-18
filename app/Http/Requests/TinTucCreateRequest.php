<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TinTucCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'matintuc'=>'required',
            'tieude'=>'required',
            'matheloai'=>'required'
        ];
    }
    public function messages(): array
    {
        return [
            'matintuc.required' => 'Không được để trống Mã tin tức',
            'matheloai.required' => 'Không được để trống Mã thể loại',
            'tieude.required' => 'Không được để trống tiêu đề',
        ];
    }
}