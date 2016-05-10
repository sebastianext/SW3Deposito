<?php

namespace Deposito\Http\Requests;

use Deposito\Http\Requests\Request;

class ClienteCreateRequest extends Request
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
            'cedula'=>'required|unique:clientes|max:255',
            'nombres'=>'required|max:255',
            'apellidos'=>'required|max:255'
        ];
    }
}
