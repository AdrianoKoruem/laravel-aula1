<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestVenda extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $request = [];
        if ($this->method() == 'POST') {
            return [
                'id_cliente' => 'required',
                'id_produto' => 'required',
            ];
        }
        return $request;
    }
}
