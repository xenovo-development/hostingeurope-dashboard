<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateUserController extends Controller
{
    /**
     * Update user fields.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'old_password' => 'required',
        ]);
        $user = User::where('email',$request['email'])->first();
        if(Hash::check($request['old_password'],$user['password'])){
            $user->update([
                'password' => Hash::make($request['password']) ?? $user['password'],
                'name' => $request['name'] ?? $user['name'],
            ]);

            $user->save();
            return back()->with('success', 'Field(s) updated successfully!');
        }else{
            throw \Illuminate\Validation\ValidationException::withMessages(['password'=>['Wrong password']]);
        }
    }
}
