<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth; 
use App\Http\Requests\User\LoginRequest;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Authenticate a user
     * 
     * @param LoginRequest $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $data = $request->all();
        $authenticated = Auth::attempt([
            'email' => $data['email'],
            'password' => $data['password']
        ]);
        if ($authenticated) {
            $user = Auth::user();
            $result['user_id'] = $user->id;
            $result['token'] = $user->createToken('BibMark')->accessToken;
            return $this->sendSuccess($result);
        } else {
            return $this->sendError('Email or Password is not correct.');
        }
    }
}
