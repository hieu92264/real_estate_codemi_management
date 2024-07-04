<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePropertiesRequest extends FormRequest
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
            'type' => 'required|string',
            'updated_by_id' => 'nullable',
            'status' => 'required|in:available,sold,pending',
            'owner' => 'nullable|string|max:50',
            'phone_number' => 'nullable|string|max:255',
            'gmail' => 'nullable|email',
            'acreage' => 'required|numeric',
            'price' => 'required|string|max:50',
            'frontage' => 'nullable|numeric|min:0|max:4',//mặt tiền
            'house_direction' => 'nullable|string|max:20',//hướng nhà
            'floors' => 'nullable|integer',
            'bedrooms' => 'nullable|integer',
            'toilets' => 'nullable|integer',
            'legality' => 'nullable|string|max:50',
            'furniture' => 'nullable|string|max:255',
            'other_description' => 'nullable|string',
            'city' => 'required|string|max:100',
            'district' => 'nullable|string|max:100',
            'ward' => 'nullable|string|max:100',
            'street' => 'nullable|string|max:100',
            'full_address' => 'nullable|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'type.required' => 'Trường loại bất động sản là bắt buộc.',
            'status.required' => 'Trường trạng thái là bắt buộc.',
            'status.in' => 'Trạng thái phải là "available", "sold", hoặc "pending".',
            'acreage.required' => 'Trường diện tích là bắt buộc.',
            'acreage.numeric' => 'Trường diện tích phải là số.',
            'price.required' => 'Trường giá là bắt buộc.',
            'images.*.image' => 'File ảnh không đúng định dạng.',
            'images.*.mimes' => 'File ảnh phải có định dạng jpeg, png, jpg hoặc gif.',
            'images.*.max' => 'Dung lượng của file ảnh không được vượt quá 2MB.',
        ];
    }
}
