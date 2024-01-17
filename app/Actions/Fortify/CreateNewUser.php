<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cpf' => ['required', 'string', 'max:14', 'unique:users'],
            'date_birth' => ['required', 'date'],
            'specialty' => ['required', 'string', 'max:255'],
            'number_registro' => ['required', 'string', 'max:255'],
            'uf' => ['required', 'string', 'max:2'],
            'naturalness' => ['required', 'string', 'max:255'],
            'uf_birth' => ['required', 'string', 'max:2'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'cpf' => $input['cpf'], 
            'date_birth' => $input['date_birth'],
            'specialty' => $input['specialty'],
            'number_registro' => $input['number_registro'],
            'uf' => $input['uf'],
            'naturalness' => $input['naturalness'],
            'uf_birth' => $input['uf_birth'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
