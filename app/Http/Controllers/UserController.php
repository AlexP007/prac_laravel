<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Http\Requests\NewUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(NewUserRequest $request)
    {
        $request['password'] = Hash::make($request['password']);
        $user = User::create($request->all());
        $user->generateToken();
        return response(['data' => $user], 201);
    }
}
