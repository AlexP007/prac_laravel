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

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $user->generateToken();
                return response(['data' => ['token' => $user->token()]]);
            } else {
                return response(['data' => ['msg' => 'Password missmatch']], 422);
            }
        } else {
            return response(['data' => ['msg' => 'User does not exist']], 422);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->revokeToken();
        return response([
            'data' => ['msg' => 'Logout successfully']
        ]);
    }
}
