<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;

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
}
