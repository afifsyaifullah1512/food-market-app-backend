<?php

namespace App\Http\Controllers\api;

use App\Actions\Fortify\PasswordValidationRules;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use PasswordValidationRules;

    public function login(Request $request)
    {
        try {
            // Validasi Input Email & Password
            $request->all([
                'email' => 'email|required',
                'password' => 'password',
            ]);

            // Check username password (bener apa kaga)
            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error(
                    [
                        'message' => 'Unauthorized',
                    ],
                    'Authentication Failed',
                    500
                );
            }

            // Check Hash dari pasword dan email, untuk dicocokkan, apabila tidak cocok akan memberi error.
            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            //Jika berhasil maka akan login dan membuat token
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success(
                [
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                    'user' => $user,
                ],
                'Authenticated'
            );
        } catch (Exception $error) { //Catch apabila terjadi kesalahan diluar login, akan showing error
            return ResponseFormatter::error(
                [
                    'message' => 'Something went wrong',
                    'error' => $error,
                ],
                'Authentication Failed',
                500
            );
        }
    }

    public function register(Request $request)
    {
        try {
            //Validasi nama field yang harus di isi.
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => $this->passwordRules()
            ]);

            // Input into Database
            User::create([
               'name' => $request->name,
               'email' => $request->email,
               'password' => Hash::make($request->name),
               'address' => $request->address,
               'houseNumber' => $request->houseNumber,
               'phoneNumber' => $request->phoneNumber,
               'city' => $request->city,
            ]);

            $user = User::where('email', $request->email)->first();

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ]);

        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function logout(Request $request)
    {
        //Fungsi Logout, currentAccessToken() adalah library Laravel Sanctum, you can see on Laravel.com/docs/8.x/sanctum
        $token = $request->user()->currentAccessToken()->delete();
        return ResponseFormatter::success($token, 'Token Revoked');
    }

    public function fetch(Request $request)
    {
        return ResponseFormatter::success($request->user(), 'Data Profile berhasil diambil');
    }

    public function updateProfile(Request $request) //Kalau error disini balik ke API Update Profile.
    {
        // Kalau error balik ke API USER UPDATE
        $user = Auth::user();
        $user->update($request->validated());

        return ResponseFormatter::success($user, 'Profile Updated');

    }

    public function updatePhoto(Request $request)
    {
        $validator = Validator::make($request->validate(),
        [
            'file' => 'required|image|max:2048'
        ]);

        if($validator->fails()) {
            return ResponseFormatter::error(
                ['error' => $validator->errors()],
                'Update photo fails', 401
            );
        }

        if($request->file('file')) {

            $file = $request->file->store('assets/user','public');

            $user = Auth::user();
            $user->profile_photo_path = $file;
            $user->update();

            return ResponseFormatter::success([$file], 'Files successfully uploaded');
        }
    }


}
