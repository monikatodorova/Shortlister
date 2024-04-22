<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private UserService $userService;

    public function __construct(UserService $userService) 
    {
        $this->userService = $userService;
    }

    /**
     * @return View
     */
    public function index()
    {
        $users = $this->userService->getAllUsers();
        return view('users.index', compact('users'));
    }

    /**
     * @param Request $request
     * 
     * @return RedirectResponse
     */
    public function store(Request $request) {
        $response = $this->userService->addUser($request->all());

        if ($response['status'] === 'success') {
            return redirect()->route('users.index')->with('success', 'User added successfully.');
        } else {
            $errors = $response['messages'];
            return redirect()->back()->withErrors($errors);
        }
    }

    /**
     * @param int $id
     * 
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $this->userService->deleteUser($id);
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

}