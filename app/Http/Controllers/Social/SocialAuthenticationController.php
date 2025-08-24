<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\SocialProviderEnum;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthenticationController extends Controller
{
    public function redirect(SocialProviderEnum $provider)
    {
        return Socialite::driver($provider->value)->redirect();
    }

    public function callback(SocialProviderEnum $provider)
    {
        $providerUser = Socialite::driver($provider->value)->user();

        $existingUser = User::query()
            ->where('provider_name', $provider->value)
            ->where('provider_id', $providerUser->getId())
            ->first();

        if ($existingUser) {
            Auth::login($existingUser);

            return to_route('dashboard');
        }

        $user = User::create([
            'name' => $providerUser->getName(),
            'email' => $providerUser->getEmail(),
            'provider_name' => $provider->value,
            'provider_id' => $providerUser->getId(),
            // 'password' => str()->random(),
        ]);

        Auth::login($user);

        return to_route('dashboard');
    }
}
