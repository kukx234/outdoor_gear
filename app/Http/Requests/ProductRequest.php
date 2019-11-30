<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\ProductController;

class ProductRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $category = ProductController::validateCall($request);
        return [
            'title' => 'string|required',
            'category_id' => 'required|numeric',
            'description' => 'string|nullable',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
        ];
    }
}
