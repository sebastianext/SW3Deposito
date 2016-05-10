<?php

namespace Deposito\Http\Requests;

use Deposito\Http\Requests\Request;

class UsuarioUpdateRequest extends Request
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
            'name'=>'required|max:255',
            'email'=>'required|max:255'
        ];
    }
}
