<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Enums\{ MorphType, UserRole };
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //

    public function update(Request $request, $id)
    {
        // Update the profile
        User::findOrFail($id)->update([
            'name' => $request->input('name'),
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
        ]);
        $message = 'Profile update successfully';
        return response()->json(['message' => $message]);
    }

    /**
     * have access to an Account, Charity or Event or if super admin
     *
     * @author Igor
     * @return \Illuminate\Http\Response
     */
    public function getPermission() {
        $user = Auth::user();
        $roleCount = \DB::table('userables')
            ->where('role', [UserRole::Admin, UserRole::ReadOnly])
            ->count();

        if (isset($user) && $user->is_superadmin == 0 && $roleCount > 0) {
            return response()->json(['success'=>true, 'msg'=>'You have a permission.']);
        }
        return response()->json(['success'=>false, 'msg'=>'You have no permission.']);
    }
}
