<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\LoginRequest;
use Laravel\Sanctum\Sanctum;

class AuthController extends Controller
{
    public function signup(SignupRequest $request) {

        if (is_null(auth('sanctum')->id()))
        {
            $added_by = 1;
        } else {
            $added_by = auth('sanctum')->id();
        }

        $newUser = new User;
        $newUser->uuid = fake()->uuid();
        $newUser->full_name = $request->full_name;
        $newUser->username = $request->username;
        $newUser->email = $request->email;
        // TODO add profile_pic
        $newUser->job_title = $request->job_title;
        $newUser->added_by = $added_by;
        $newUser->permission_id = $request->permission_id;
        $newUser->role = $request->role;
        $newUser->last_login_ip = $request->ip();
        $newUser->last_login_at = Carbon::now();
        $newUser->password = bcrypt($request->password);
        $newUser->save();

        $token = $newUser->createToken($request->full_name)->plainTextToken;


        return response([
                'user' => $newUser,
                'token' => $token
        ], 201);
    }

    public function login() {
        //
    }
}
