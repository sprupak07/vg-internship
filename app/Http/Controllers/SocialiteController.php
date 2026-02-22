<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Check if the user already exists in the database
        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            // If the user doesn't exist, create a new user
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => Hash::make(Str::random(24)), // Generate a random password
                'profile' => $googleUser->getAvatar(), // Store the user's avatar URL
            ]);
        }

        // update the user's info if it has changed
        $user->update([
            'name' => $googleUser->getName(),
            'profile' => $googleUser->getAvatar(),
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to the dashboard or any other page
        return redirect()->route('dashboard');
    }

    public function redirectToGitHub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGitHubCallback()
    {
        $githubUser = Socialite::driver('github')->user();

        // Check if the user already exists in the database
        $user = User::where('email', $githubUser->getEmail())->first();

        if (!$user) {
            // If the user doesn't exist, create a new user
            $user = User::create([
                'name' => $githubUser->getName(),
                'email' => $githubUser->getEmail(),
                'password' => Hash::make(Str::random(24)), // Generate a random password
                'profile' => $githubUser->getAvatar(), // Store the user's avatar URL
            ]);
        }

        // Log the user in
        Auth::login($user);

        // Redirect to the dashboard or any other page
        return redirect()->route('dashboard');
    }
}
