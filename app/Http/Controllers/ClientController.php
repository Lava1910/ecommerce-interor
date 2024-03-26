<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    public function loginHandler(Request $request) {
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if($fieldType == 'email'){
            $request->validate([
                'login_id' => 'required|email|exists:clients,email',
                'password' => 'required|min:5|max:45'
            ],[
                'login_id.required' => "Email or UserName is required",
                'login_id.email' => "Invalid email address",
                'login_id.exists' => "Email is not exists in system.",
                'password.required' => "Password is required"
            ]);
        } else {
            $request->validate([
                'login_id' => 'required|exists:clients,email',
                'password' => 'required|min:5|max:45'
            ],[
                'login_id.required' => "Email or UserName is required",
                'login_id.exists' => "Username is not exists in system.",
                'password.required' => "Password is required"
            ]);
        }

        $creds = array(
            $fieldType => $request -> login_id,
            'password' => $request -> password
        );

        if(Auth::guard('client')->attempt($creds)) {
            $user = Auth::guard('client')->user();
            session()->flash('success', 'Welcome, ' . $user->name . '!');
            return redirect("/");
        } else {
            session()->flash('fail','Incorrect credentials');
            return redirect()->route('client.login');
        }
    }

    public function logoutHandler(Request $request){
        Auth::guard('client')->logout();
        session()->flash('fail','You are logged out!');
        session()->forget('cart');
        return redirect("/");
    }

    public function registerHandler(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255|unique:clients',
            'username' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
            'confirmPassword' => 'required|string'
        ],[
            'name.required' => 'UserName không được để trống',
            'address.required' => 'Address không được để trống',
            'phone.required' => 'Phone không được để trống',
            'email.required' => 'Email không được để trống',
            'password.required' => 'Password không được để trống',
            'confirmPassword.required' => 'Không được để trống'     
        ]);

//        $request->validate([
//            'confirmPassword' => [
//                'required',
//                'string',
//                Rule::in([$request->input('password')]),
//            ],
//        ]);

        Client::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect('/')->with('success', 'Registration successful!'); // Redirect to your desired page
    }
}
