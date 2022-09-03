<?php

namespace App\Http\Controllers;

use Faker\Generator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function signup(SignupRequest $request) {
        $newUser = new User;
        $newUser->uuid = fake()->uuid();
        $newUser->full_name = $request->full_name;
        $newUser->username = $request->username;
        $newUser->email = $request->email;
        // TODO add profile_pic
        $newUser->job_title = $request->job_title;
        $newUser->added_by = 1; // TODO replace [1] with Auth ID
        $newUser->permission_id = $request->permission_id;
        $newUser->role = $request->role;
        $newUser->last_login_ip = $request->ip();
        $newUser->password = bcrypt($request->password);
        $newUser->save();

        return response([
            'data' => 'Signup succeed!'
        ]);
    }

    public function login() {
        //
    }
}
