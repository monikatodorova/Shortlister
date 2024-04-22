<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Illuminate\Validation\ValidationException;

class UserService {

    private UserRepository $userRepository;
    private UserValidator $userValidator;

    public function __construct(UserRepository $userRepository, UserValidator $userValidator)
    {
        $this->userRepository = $userRepository;
        $this->userValidator = $userValidator;
    }

    /**
     * @return Collection
     */
    public function getAllUsers() {
        return $this->userRepository->getAllUsers();
    }

    /**
     * @param array $details
     * 
     * @return array
     */
    public function addUser(array $details) {
        try {
            $this->userValidator->validate($details);
        } catch (ValidationException $e) {
            return [
                'status' => 'error',
                'messages' => $e->validator->errors()->all(),
            ];
        }

        $user = $this->userRepository->createUser($details);
        return [
            'status' => 'success',
            'user' => $user,
        ];
    }

    /**
     * @param int $id
     * 
     * @return void
     */
    public function deleteUser(int $id)
    {
        $this->userRepository->delete($id);
    }

}