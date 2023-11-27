<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Validator;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Render the create user view
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Create new user.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->cannot('update',User::class)){
            abort(403,'Authorization failed.');
        }
        $this->validateUser($request, 'create');
        User::create($request);

        return back()->with('success', 'User Created!');
    }

    /**
     * Validates the given user instance.
     *
     * @param $data
     * @param $option
     * @return Validator
     */
    private function validateUser($data, $option): Validator
    {
        $user = User::where('email', $data['email'])->first();
        if ($user) {
            abort('409', 'User already exists.');
        }

        switch ($option) {
            case 'store' :
                return Validator::make($data, [
                    'name' => 'required',
                    'email' => 'required',
                    'password' => 'required|confirmed'
                ]);
            case 'update':
                return Validator::make($data, [
                    'password' => 'required'
                ]);
        }
    }
}
