<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\SettingModel;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\Login;
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

        $recaptcha = SettingModel::find(1);


        if (isset($recaptcha) && $recaptcha['recaptcha_status'] == 1) {
            $secret_key = $recaptcha['recaptcha_secreat_password'];
            $response = $request->input('g-recaptcha-response');
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $response;

            // Send a POST request to Google reCAPTCHA for verification
            $client = new \GuzzleHttp\Client();
            $response = $client->post($url);
            $body = json_decode($response->getBody());

            if (!$body->success) {
                return back()->with("error","Recaptcha Failed");
            }
        }

        $request->authenticate();

        $request->session()->regenerate();

        $user=Auth::user();
        mail::to($request->email)->send(new Login($user));
        if($user->role==="user"){

            return redirect()->intended(RouteServiceProvider::HOME);
        }
        else{
            return redirect()->intended(RouteServiceProvider::DASHBOARD);
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
