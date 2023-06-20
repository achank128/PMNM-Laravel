<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaiLieuCreateRequest extends FormRequest
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
            'matailieu'=>'required',
            'tentailieu'=>'required',
            'tomtat'=>'required',
            'madanhmuc'=>'required'
        ];
    }
    public function messages(): array
    {
        return [
            'matailieu.required' => 'Không được để trống Mã tài liệu',
            'tentailieu.required' => 'Không được để trống Tên tài liệu',
            'tomtat.required' => 'Không được để trống tóm tắt',
            'madanhmuc.required' => 'Không được để trống Mã danh mục',
        ];
    }
}