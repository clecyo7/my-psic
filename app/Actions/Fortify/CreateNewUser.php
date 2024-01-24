<?php

namespace App\Actions\Fortify;

use App\Models\User;
use GuzzleHttp\Psr7\UploadedFile;
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
        //dd($input);
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cpf' => ['required', 'string', 'max:14', 'unique:users'],
            'date_birth' => ['required', 'date'],
            'specialty' => ['required', 'string', 'max:255'],
            'number_register' => ['required', 'string', 'max:255'],
            'uf' => ['required', 'string', 'max:2'],
            'naturalness' => ['required', 'string', 'max:255'],
            'uf_birth' => ['required', 'string', 'max:2'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();


        if (request()->hasFile('profile_photo')) {
            $input['profile_photo_path'] = request()->file('profile_photo')->store("user/{$input['name']}");
        }

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'cpf' => $input['cpf'], 
            'date_birth' => $input['date_birth'],
            'specialty' => $input['specialty'],
            'number_register' => $input['number_register'],
            'uf' => $input['uf'],
            'naturalness' => $input['naturalness'],
            'uf_birth' => $input['uf_birth'],
            'profile_photo_path' => $input['profile_photo_path'] ?? null, // Adicione o caminho do perfil
            'password' => Hash::make($input['password']),
        ]);
    }
}
