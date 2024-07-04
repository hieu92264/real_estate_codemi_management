<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertiesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'type' => 'required|string',
            // 'updated_by_id' => 'nullable',
            // 'status' => 'required|in:available,sold,pending',
            // 'owner' => 'nullable|string|max:50',
            // 'phone_number' => 'nullable|string|max:255',
            // 'gmail' => 'nullable|email',
            // 'acreage' => 'required|numeric',
            // 'price' => 'required|string|max:50',
            // 'frontage' => 'nullable|numeric|min:0|max:4',//mặt tiền
            // 'house_direction' => 'nullable|string|max:20',//hướng nhà
            // 'floors' => 'nullable|integer',
            // 'bedrooms' => 'nullable|integer',
            // 'toilets' => 'nullable|integer',
            // 'legality' => 'nullable|string|max:50',
            // 'furniture' => 'nullable|string|max:255',
            // 'other_description' => 'nullable|string',
            // 'city' => 'required|string|max:100',
            // 'district' => 'nullable|string|max:100',
            // 'ward' => 'nullable|string|max:100',
            // 'street' => 'nullable|string|max:100',
            // 'full_address' => 'nullable|string|max:255',
            // 'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // tạm thời không dùng
        ];
    }
}
