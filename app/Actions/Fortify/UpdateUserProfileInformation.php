<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, mixed>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'cpf' => ['required', 'string', 'max:14', Rule::unique('users')->ignore($user->id)],
            'date_birth' => ['required', 'date', Rule::unique('users')->ignore($user->id)],
            'specialty' => ['required', 'string', 'max:255'],
            'number_register' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'uf' => ['required', 'string', 'max:2'],
            'naturalness' => ['required', 'string', 'max:255'],
            'uf_birth' => ['required', 'string', 'max:2'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'cpf' => $input['cpf'],
                'date_birth' => $input['date_birth'],
                'specialty' => $input['specialty'],
                'number_register' => $input['number_register'],
                'uf' => $input['uf'],
                'naturalness' => $input['naturalness'],
                'uf_birth' => $input['uf_birth'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
