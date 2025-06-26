<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController
{
    public function userSignin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:8|max:25|exists:users,username',
            'password' => 'required|min:8|max:25',
        ], [
            'username.required' => 'Username is required.',
            'username.min' => 'Username must be at least 8 characters.',
            'username.max' => 'Username must not exceed 25 characters.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.max' => 'Password must not exceed 25 characters.',
        ]);

        if ($validator->fails()){
            $message = $validator->errors()->first();
            notyf()->error($message);
            return redirect()->back()->withInput();
        }

        $user = User::where('username', $request->username)->first();
        if (!Hash::check($request->password, $user->password)){
            notyf()->error('Invalid credentials');
            return redirect()->back()->withInput();
        }

        Auth::login($user);
        notyf()->success('You\'re now signed in.');
        return redirect()->route('landingPage');
    }

    public function userSignup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|max:35|regex:/^[A-Za-z\s]+$/',
            'username' => 'required|unique:users,username|min:8|max:25',
            'phone' => 'required|regex:/^9[0-9]{9}$/',
            'password' => 'required|min:8|max:25',
        ], [
            'fullname.required' => 'Full name is required.',
            'fullname.max' => 'Full name must not exceed 35 characters.',
            'fullname.alpha' => 'Full name must contain letters only.',
            'username.required' => 'Username is required.',
            'username.min' => 'Username must be at least 8 characters.',
            'username.max' => 'Username must not exceed 25 characters.',
            'phone.required' => 'Phone number is required.',
            'phone.regex' => 'Phone number must be a valid phone number.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.max' => 'Password must not exceed 25 characters.',
        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->first();
            notyf()->error($message);
            return redirect()->back()->withInput();
        }

        User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'phone_number' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'customer',
        ]);

        notyf()->success('Your account was created successfully.');
        return redirect()->route('signinPage');
    }

    public function userSignout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        notyf()->success('Successfully signed out.');
        return redirect()->route('landingPage');
    }
}
