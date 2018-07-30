<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreWorkOrderRequest extends FormRequest
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
            'machine_id'    => 'required_unless:status,pending|exists:machines,id|nullable',
            'notes'         => 'nullable|max:255',
            'status'        => Rule::in(['pending', 'assigned', 'in process', 'complete', 'archived']) . '|nullable',
        ];
    }
}
