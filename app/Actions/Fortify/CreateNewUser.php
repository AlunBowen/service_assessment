<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Models\Organisation;


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
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'organisation_id' => ['required', 'integer'],
            
        ])->validate();
            
        $user = new User([
            'name' => $input['name'],
            'email' => $input['email'], 
            'password' => Hash::make($input['password']),
            'organisation_id' => null,
           
        ]);
        $org = Organisation::find($input['organisation_id']);
        error_log(json_encode($org));
        $user->organisation()->associate(Organisation::find($input['organisation_id']));
        $user->save();
        return $user;
        
    }
}
