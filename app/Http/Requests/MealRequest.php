<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:50',
            'description' => 'required|string|min:3|max:500',
            'small_meal_price' => 'required|numeric',
            'medium_meal_price' => 'required|numeric',
            'large_meal_price' => 'required|numeric',
            'category' => 'required',
            'image' => 'mimes:png,jpg,jpeg,svg',
        ];
    }
}