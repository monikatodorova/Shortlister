<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserValidator
{
    /**
     * @param array $data
     * 
     * @return void
     * 
     * @throws ValidationException
     */
    public function validate(array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|regex:/^\S+@\S+\.\S+$/',
            'phone' => 'required|string|max:20|regex:/^\+?\d+$/',
            'birthDate' => 'required|date|before_or_equal:today',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
