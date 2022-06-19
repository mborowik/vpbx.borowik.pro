<?php

namespace App\Http\Requests;

use App\Rules\Multiplenumber;
use Illuminate\Foundation\Http\FormRequest;

class StoreNumbersRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
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
            
            'number_start' => ['numeric'],//, 'numeric','unique:numbers','digits:11'
            'number_end' => ['numeric'],//, 'numeric','unique:numbers','digits:11'
            'number' => [new Multiplenumber()],//, 'numeric','unique:numbers','digits:11'
        ];
    }



    protected function prepareForValidation()
    {
        $this->merge([
        'number' => $this->number_start.'-'.$this->number_end,
        ]);
    }

    

}
