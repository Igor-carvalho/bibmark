<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    public function homePage() {
        return view('front.home');
    }

    public function loginPage() {
        return view('front.auth.login');
    }

    public function joinPage() {
        return view('front.auth.join');
    }

    public function forgotPasswordPage() {
        return view('front.auth.forgot-password');
    }

    public function resetPasswordPage($token, $email) {
        return view('front.auth.reset-password')->with(
            ['token' => $token, 'email' => $email]
        );
    }

    public function showResetForm(Request $request) {

    }

    public function profilePage() {
        return view('front.profile');
    }

    public function editAccountPage() {
        return view('front.edit-account');
    }

    public function doLogin()
    {
    // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); 
        } else {

            // create our user data for the authentication
            $userdata = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {

                return Redirect::to('/profile');

            } else {        

                // validation not successful, send back to form 
                // return Redirect::to('login');
                return Redirect::back()->withErrors('Incorrect email or password');

            }

        }
    }
    public function doLogout()
    {
        Auth::logout();

        return redirect('/login');
    }

}
