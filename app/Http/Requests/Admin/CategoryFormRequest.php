<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class CategoryFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
       $rules = [
        'name' =>[
            'required',
            'string',
            'max:200'
        ],
        'slug' =>[
            'required',
            'string',
            'max:200'
        ],
        'desp' =>[
            'required'
        ],
        'image' =>[
            'nullable',
            'mimes:jpeg,jpg,png'
        ],
        'meta_title' =>[
            'required',
            'string',
            'max:200'
        ],
        'meta_desp' =>[
            'required',
            'string'
        ],
        'meta_keyword' =>[
            'required',
            'string'
        ],
        'navbar_status' =>[
            'nullable'
        ],
        'status' =>[
            'nullable'
        ],
        ];

        return $rules;
    }
}
