<?php

namespace Deposito\Http\Requests;

use Deposito\Http\Requests\Request;

class ProductoCreateRequest extends Request
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
            'nombre'=>'required|unique:productos|max:255',
            'preciocompra'=>'required',
            'precioventa'=>'required'
        ];
    }
}
