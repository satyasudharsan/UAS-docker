<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use App\Events\UserLoggedIn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Location;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $request->authenticate();

        // Create an instance of Location and populate it with data
        $location = new Location([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'temperature_min' => $request->temperature_min,
            'temperature_max' => $request->temperature_max,
        ]);

        // Save the location to associate it with the user
        $request->user()->location()->save($location); // Mengganti recommendation() dengan location()

        // Pemanggilan event UserLoggedIn setelah pengguna login
        event(new UserLoggedIn(
            Auth::user(),
            $location  // Pass the instance of Location
        ));

        // Menyimpan data temperatur ke dalam sesi
        session(['temperature_min' => $request->temperature_min]);
        session(['temperature_max' => $request->temperature_max]);

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
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
