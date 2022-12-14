<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class AuthController extends Controller
{

    public function index() {
        return response([
            'data' => User::select([
                'id',
                'full_name',
                'username',
                'job_title',
                'role',
                'created_by',
                'updated_by',
                'created_at',
                'updated_at',
                'last_login_at'
            ])
                ->with('permissions:id,name')
                ->get(),

            'permissions' => Permission::select(['id', 'name'])->orderBy('id')->get()
        ]);
    }

    public function signup(SignupRequest $request) {

        if (is_null(auth('sanctum')->id()))
        {
            $created_by = 1;
        } else {
            $created_by = auth('sanctum')->id();
        }

        $newUser = new User;
        $newUser->uuid = Str::uuid();
        $newUser->full_name = $request->full_name;
        $newUser->username = $request->username;
        $newUser->job_title = $request->job_title;
        $newUser->role = $request->role;
        $newUser->last_login_ip = $request->ip();
        $newUser->last_login_at = Carbon::now();
        $newUser->password = bcrypt($request->password);
        $newUser->created_by = $created_by;
        $newUser->save();

        $token = $newUser->createToken($request->full_name)->plainTextToken;

        // Create Permissions
        // Reset cached roles and permissions
        App()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Attach the permissions
        if (!is_null($request->permissions)) {
            $newUser->givePermissionTo($request->permissions);
        }

        return $this->index();
    }

    public function login(LoginRequest $request) {

        $user = User::where('username', '=', $request->username)
            ->with('permissions:id,name')
            ->first();

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

    public function logout() {
        auth('sanctum')->user()->currentAccessToken()->delete();

        return response([
            'message' => 'Logged out successfully!'
        ]);
    }

    public function getUser() {
        return response([
            'user' => User::where('id', '=', auth('sanctum')->user()->id)
                ->with('permissions:id,name')
                ->first()
        ]);
    }

    public function update(Request $request) {

        // Update User Information
        if (!is_null($request->password)) {
            User::where('id', '=', $request->id)->update([
                'full_name' => $request->full_name,
                'username'  => $request->username,
                'job_title' => $request->job_title,
                'role'      => $request->role,
                'password'  => Hash::make($request->password),
                'updated_by' => auth('sanctum')->user()->id
            ]);
        } else {
            User::where('id', '=', $request->id)->update([
                'full_name' => $request->full_name,
                'username'  => $request->username,
                'job_title' => $request->job_title,
                'role'      => $request->role,
                'updated_by' => auth('sanctum')->user()->id
            ]);
        }

        // Update Permissions
        if (!is_null($request->permissions)) {
            // Delete old permissions
            User::where('id', '=', $request->id)->first()
                ->syncPermissions();

            // Attach the permissions
            User::where('id', '=', $request->id)->first()
                ->givePermissionTo($request->permissions);

            // Reset cached roles and permissions
            App()[PermissionRegistrar::class]->forgetCachedPermissions();
        }

        return $this->index();
    }

    public function destroy(Request $request)
    {
        User::where('id', '=', $request->id)->delete();

        return $this->index();
    }
}
