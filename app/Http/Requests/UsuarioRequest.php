<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {



        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', $this->validacaoCampoUnico('email')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    protected function validacaoCampoUnico(string $campo)
    {
        $campoUnico = 'unique:App\Models\User,' . $campo;
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $campoUnico = $campoUnico . ',' . $this->route('usuario');
        }

        return $campoUnico;
    }
}