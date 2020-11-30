<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function create(UserRequest $request)
    {
        $user = new User();
        $user->fill($request->validated());
        return $user;
    }
}
