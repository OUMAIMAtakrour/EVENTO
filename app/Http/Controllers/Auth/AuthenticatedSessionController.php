<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Organizer;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();


        $user = Auth::user();
        if ($user->role == 'admin') {
            return redirect('/dashboard');
        } elseif ($user->role == 'organizer') {
            if (!$user->organizers->isBanned) {
                return redirect('dash');
            } else {
                Auth::logout();
                abort('500', 'You Are Banned');
            }
        } else {
            if (!$user->clients->isBanned) {
                return redirect('/index');
            } else {
                Auth::logout();
                abort('401', 'You Are Banned');
            }
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
