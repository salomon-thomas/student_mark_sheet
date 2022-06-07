<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function __construct()
    {
        $this->HOME = route('index');
    }
    public function register(Request $request)
    {
        switch ($request->method()) {
            case 'POST':
                $validator = Validator::make($request->all(), [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                    'password_confirmation' => 'min:6'
                ]);
                if ($validator->fails()) {
                    return back()->with('error', $validator->errors()->all());
                }
                $data=$validator->validated();
                User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                ]);
                $auth = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                if ($auth === true) {
                    return redirect()->intended($this->HOME);
                } else {
                    return back()->with('error', 'Unable to register.')->withInput();
                }
            case 'GET':
                return view('auth.register');
        }
    }
}
