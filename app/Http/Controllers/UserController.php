<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Http\Requests\NewUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(NewUserRequest $request)
    {
        $request['password'] = Hash::make($request['password']);
        $user = User::create($request->all());
        $user->generateToken();
        return response(['data' => $user], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->revokeToken();
        return response([
            'data' => ['msg' => 'Logout successfully']
        ]);
    }
}
