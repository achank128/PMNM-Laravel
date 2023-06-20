<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhMucCreateRequest extends FormRequest
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
            'madanhmuc'=>'required',
            'tendanhmuc'=>'required',
            'mota'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'madanhmuc.required' => 'Không được để trống Mã danh mục',
            'tendanhmuc.required' => 'Không được để trống Tên danh mục',
            'mota.required' => 'Không được để trống Mô tả',
        ];
    }
}