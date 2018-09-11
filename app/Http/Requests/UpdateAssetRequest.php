<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAssetRequest extends FormRequest
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
            'number' => 'sometimes|alpha_num',
            'name' => 'sometimes|max:40',
            'description' => 'sometimes|max:255|nullable',
            'type' => 'sometimes|' . Rule::in(['Machine', 'Part']),
        ];
    }
}
