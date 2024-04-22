<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository {

    /**
     * @return Collection
     */
    public function getAllUsers()
    {
        return User::orderBy('id', 'DESC')->paginate(10);
    }

    /**
     * @param array $details
     * 
     * @return User
     */
    public function createUser(array $details)
    {
        return User::create([
            'name' => $details['name'],
            'email' => $details['email'],
            'phone' => $details['phone'],
            'birthDate' => $details['birthDate'],
        ]);
    }

    /**
     * @param int $id
     * 
     * @return void
     */
    public function delete(int $id)
    {
        User::destroy($id);
    }

}