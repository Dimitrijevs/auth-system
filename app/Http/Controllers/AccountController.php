<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Display my account page
     *
     * @return Response
     */
    public function index(): Response
    {
        return response()->view('page.account');
    }

    /**
     * Login user in to the system
     *
     * @param Request $request
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login-email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/')->with('errorMessage', "Data is not valid");
        }

        $user = User::where('email', $request->input('login-email'))->first();

        if (!$user || !password_verify($request->input('password'), $user->password)) {
            return redirect('/')->with('errorMessage', 'Invalid email or password');
        }

        Auth::login($user);

        if (auth()->user()) {
            return redirect('/success');
        }
    }


    /**
     * Logout user from the system
     *
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/')->with('successMessage', 'User logged out successfully!');
    }

    /**
     * Register user in the system
     *
     * @param Request $request
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'register-email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:8|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
        ]);

        if ($validator->fails()) {
            return redirect('/')->with('errorMessage', "Data is not valid");
        }

        $user = new User();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('register-email');
        $user->password = bcrypt($request->input('password'));
        $user->subscribed = $request->input('subscribed');
        $user->save();

        return redirect('/')->with('successMessage', 'User registered successfully!');
    }

    /**
     * Display a success message for logged-in users
     *
     */
    public function success()
    {
        $firstname = auth()->user()->firstname;
        $lastname = auth()->user()->lastname;

        if (isset($firstname) && isset($lastname)) {
            return view('page.success', ['firstname' => $firstname, 'lastname' => $lastname]);
        }

        return redirect('/')->with('errorMessage', 'You are not authorized to view this page');
    }
}
