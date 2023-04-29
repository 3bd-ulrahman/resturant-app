<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class MenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'categories_id' => ['required'],
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
        ];

        if (Route::current()->getActionMethod() === 'store') {
            $rules += ['image' => ['required', 'image', 'max:2048']];
        }

        if (Route::current()->getActionMethod() === 'update') {
            $rules += ['image' => ['nullable', 'image', 'max:2048']];
        }

        return $rules;
    }
}
