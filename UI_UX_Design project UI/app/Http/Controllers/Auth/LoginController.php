<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Apprenant;

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
        $this->middleware('auth')->only('logout');
    }

    /**
     * Handle a login request to the application.
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $request->only('email', 'password');

        // Check if the email exists in the apprenants table
        if (Apprenant::where('email', $credentials['email'])->exists()) {
            if (Auth::guard('apprenant')->attempt($credentials, $request->filled('remember'))) {
                // Login successful as apprenant
                return redirect()->intended(route('Apprenant.dashboard'));
            }
        } else {
            // Try default login (web guard)
            if (Auth::guard('web')->attempt($credentials, $request->filled('remember'))) {
                // Login successful as formateur (or default user)
                return redirect()->intended($this->redirectTo);
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
        // Check if the email exists in the Apprenant table
        if (Apprenant::where('email', $user->email)->exists()) {
            return redirect()->route('Apprenant.dashboard');
        }
        // Otherwise, redirect to formateur dashboard
        return redirect()->route('formateur.dashboard');
    }
}
