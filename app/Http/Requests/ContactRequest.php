<?php

namespace App\Http\Requests;

use App\FormRequestAppendable;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    use FormRequestAppendable;
    protected $appends = ['fullname'];

    public function getContactAttribute($values) {

        if($this->filled('first_name', 'last_name')) {

            return $values['first_name'] .':'. $values['last_name'];
        }
    }
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'postcode' => 'required|max:8',
            'address'  => 'required',
            'opinion'  => 'required|max:120',
        ];
    }
}
