<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;

class RegisterConfirmationController extends Controller
{
    /**
     * Confirm a user's email address.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $user = User::where('confirmation_token', request('token'))->first();

        if (! $user) {
            return redirect(route('threads'))->with('flash', 'Unknown token.');
        }

        $user->confirm();

        return redirect(route('threads'))
            ->with('flash', 'Your account is now confirmed! You may post to the forum.');
    }
}
