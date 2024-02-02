<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConvenioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string',
            'registro_ans' => 'string',
            'cidade' => 'string',
            'uf' => 'integer',
            'dias_retorno' => 'integer',
            'limite_diario' => 'integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'O nome precisa ser uma string',
            'registro_ans.string' => 'O nome precisa ser uma string',
            'cidade.string' => 'O Nome da cidade precisa ser uma string',
            'uf.string' => 'UF precisa ser um número',
            'dias_retorno.integer' => 'Dias de retorno precisa ser um número',
            'limite_diario.integer' => 'Limite diário precisa ser um número',
        ];
    }
}
