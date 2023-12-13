<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class ImpersonateController extends Controller
{
    /**
     * Impersonate a user via admin user.
     *
     * @param $id
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     */
    public function impersonate(Request $request): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        session(['impersonate' => auth()->id()]);
        Auth::loginUsingId($request['user_id'], true);

        return redirect('index')->with('success', 'Successfully logged in as user. You can go back to your user via dropdown menu at the top right corner of the screen');
    }

    /**
     * Return to the admin user.
     *
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     */
    public function leave(): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        Auth::loginUsingId(session('impersonate'), true);
        session()->forget('impersonate');

        return redirect('index')->with('success', 'Successfully logged in back to the main account.');
    }
}
