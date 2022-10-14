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
use App\Models\LoginHistory;

class AuthController extends Controller
{
    public function signup(SignupRequest $request) {

        if (is_null(auth('sanctum')->id()))
        {
            $created_by = 1;
        } else {
            $created_by = auth('sanctum')->id();
        }

        $newUser = new User;
        $newUser->uuid = fake()->uuid();
        $newUser->full_name = $request->full_name;
        $newUser->username = $request->username;
        // TODO add profile_pic
        $newUser->job_title = $request->job_title;
        $newUser->permission_id = $request->permission_id;
        $newUser->role = $request->role;
        $newUser->last_login_ip = $request->ip();
        $newUser->last_login_at = Carbon::now();
        $newUser->password = bcrypt($request->password);
        $newUser->created_by = $created_by;
        $newUser->save();

        $token = $newUser->createToken($request->full_name)->plainTextToken;


        return response([
                'user' => $newUser,
                'token' => $token
        ], 201);
    }

    public function login(LoginRequest $request) {

        $user = User::where('username', '=', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            // Stare Failed Logins
            $FailedLogin = new FailedLoginController();
            $FailedLogin->store($request->username, $request->password, $request->ip());

            return response([
                'message' => 'Invalid credentials'
            ], 401);
        } else {
            $token = $user->createToken($user->full_name)->plainTextToken;
            // Store Login History
            $loginHistory = new LoginHistoryController();
            $loginHistory->store($user->id, $user->full_name, $request->ip());

            return response([
                'user' => $user,
                'token' => $token
            ], 200);
        }
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response([
            'message' => 'Logged out successfully!'
        ]);
    }
}
