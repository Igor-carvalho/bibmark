<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show admin login
     * 
     * @return view
     */
    public function login()
    {
    	return view('admin.pages.login');
    }

    /**
     * Show admin reset password
     * 
     * @return view
     */
    public function resetPassword($token)
    {
    	return view('admin.pages.reset-password',[
            'token' => $token
        ]);
    }

    /**
     * Show admin dashboard
     * 
     * @return view
     */
    public function dashboard()
    {
    	return redirect('/dashboard/accounts');
    }
}
