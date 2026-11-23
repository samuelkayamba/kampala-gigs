<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    ////Show Registration Form
    public function register(){
        return view('users.register');
    }

    //Store a User
    public function store(Request $request){
       $formFields = $request->validate([
    'name' => ['required', 'string', 'min:3', 'max:255'],
    'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
    'password' => ['required', 'confirmed', 'min:6'],
]);

    //Hashing Password
        $formFields['password'] = bcrypt($formFields['password']);
    //creating New User
    $user=User::create($formFields);

    //Logging In
    auth()->login($user);
        return Redirect('/')->with('successMessage','User Created and Logged In');
    }

    //User Log Out
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('successMessage',"You've LoggedOut");



    }

    // Display login form
public function showLogin()
{
    return view('users.login');
}
  //  logging in
public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
    'password' => ['required'],
    ]);
    if(auth()->attempt($credentials)) {
        $request->session()->regenerateToken();
        return Redirect('/')->with('successMessage',"Welcome Back");

    }

    return back()->withErrors(['email'=>'wrong Credentials'])
       -> onlyInput('email');
}

}
