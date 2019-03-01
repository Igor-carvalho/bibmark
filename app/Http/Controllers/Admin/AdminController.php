<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\{PasswordResetRequest};
use App\Models\User;
use Illuminate\Support\Facades\Mail;

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
//    public function resetPassword($token)
//    {
//    	return view('admin.pages.reset-password',[
//            'token' => $token
//        ]);
//    }

    /**
     * Show admin dashboard
     *
     * @return view
     */
    public function dashboard()
    {
        return view('admin.pages.dashboard.dashboard', [
            'isAdmin' => Auth::user()->isSuperAdmin(),
            'userId' => Auth::user()->id
        ]);
    }

    /**
     * Show detailed page account
     *
     * @param integer $accountId
     * @return view
     */
    public function dashboardAccount($accountId)
    {
        return view('admin.pages.dashboard.account', [
            'accountId' => $accountId
        ]);
    }

    /**
     * Show detailed page charity
     *
     * @param integer $charityId
     * @return view
     */
    public function dashboardCharity($charityId)
    {
        return view('admin.pages.dashboard.charity', [
            'charityId' => $charityId
        ]);
    }

    /**
     * Show detailed page event
     *
     * @param integer $eventId
     * @return view
     */
    public function dashboardEvent($eventId)
    {
        return view('admin.pages.dashboard.event', [
            'eventId' => $eventId
        ]);
    }

    /**
     * forgot-password
     *
     * @author Igor
     *
     */
    public function forgotPassword(PasswordResetRequest $request)
    {
        $email = $request->get('email');
        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json(['success'=>false, 'msg' => 'The user for this email does not exist.']);
        }

        $token = app('auth.password.broker')->createToken($user);

        Mail::send('emails.password', ['token' => $token, 'email' => $email], function ($message) use ($user, $email) {
            $message->to($email)->subject('Reset Password');
        });
        return response()->json(['success'=>true, 'msg' => 'The email was sent. Please check your email box']);
    }

    public function resetPassword(Request $request)
    {
//        $email = $request->get('email');
//        $token = $request->get('token');
//        $password = $request->get('password');

        $user = User::where('email', $request->get('email'))->first();
        if (!$user) {
            return response()->json(['success'=>false,'error' => 'The user for this email does not exist.']);
        }

        $token = \DB::table('password_resets')
            ->where('email', $user->email)
            ->first();

        if (!$token) {
            return response()->json(['success'=>false, 'msg'=>'We can not find a user with that email address.']);
        }

        $user->password = bcrypt($request->get('password'));
        $user->save();

        \DB::table('password_resets')->where('email', $token->email)->delete();

        return response()->json(['success'=>true, 'msg'=>'Your password has been reset.']);
    }
}
