<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAssetRequest extends FormRequest
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
    public function rules()
    {
        return [
            'number'        => 'required|alpha_num|unique:assets,number',
            'name'          => 'required|max:40',
            'description'   => 'sometimes|max:255|nullable',
            'type'          => 'required|' . Rule::in(['Machine', 'Part']),
        ];
    }
}
