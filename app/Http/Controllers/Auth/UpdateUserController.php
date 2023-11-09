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
        ]);

        $user = User::where('email',$request['email'])->first();
        $user->update(
            [
                'password' => Hash::make($request['password']) ?? $user['password'],
                'name' => $request['name'] ?? $user['name'],
            ]);

        $user->save();

        return back()->with('success', 'User Updated!');
    }
}
