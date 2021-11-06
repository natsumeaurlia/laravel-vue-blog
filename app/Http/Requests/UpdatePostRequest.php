<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return (bool)Auth::user();
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:50',
            'content' => 'required|string',
            'published' => 'required|boolean',
        ];
    }
}
