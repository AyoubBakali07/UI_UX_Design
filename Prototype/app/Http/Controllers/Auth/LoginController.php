<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Apprenant;
use App\Models\Formateur;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/formateur/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle a login request to the application.
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $request->only('email', 'password');

        // Try formateur login first
        if (Formateur::where('email', $credentials['email'])->exists()) {
            if (Auth::guard('formateur')->attempt($credentials, $request->filled('remember'))) {
                return redirect()->intended(route('formateur.dashboard'));
            }
        }
        // Then try apprenant login
        elseif (Apprenant::where('email', $credentials['email'])->exists()) {
            if (Auth::guard('apprenant')->attempt($credentials, $request->filled('remember'))) {
                return redirect()->intended(route('Apprenant.dashboard'));
            }
        }

        // If login failed
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Redirect users after login based on their email.
     */
    protected function authenticated($request, $user)
    {
        if (Auth::guard('formateur')->check()) {
            return redirect()->route('formateur.dashboard');
        }
        if (Auth::guard('apprenant')->check()) {
            return redirect()->route('Apprenant.dashboard');
        }
    }

    public function logout(Request $request)
    {
        if (Auth::guard('formateur')->check()) {
            Auth::guard('formateur')->logout();
        }
        if (Auth::guard('apprenant')->check()) {
            Auth::guard('apprenant')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
