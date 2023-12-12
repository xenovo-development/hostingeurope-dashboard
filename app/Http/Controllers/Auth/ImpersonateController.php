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
    public function impersonate($id): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        session(['impersonate' => auth()->id()]);
        Auth::loginUsingId($id);

        return redirect('/home');
    }

    /**
     * Return to the admin user.
     *
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     */
    public function leave(): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        Auth::loginUsingId(session('impersonate'));
        session()->forget('impersonate');

        return redirect('/home');
    }
}
