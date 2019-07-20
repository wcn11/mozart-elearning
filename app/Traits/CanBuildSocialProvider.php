<?php

namespace App\Traits;

use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\ProviderInterface;

trait CanBuildSocialProvider {

    /**
     * Creates an Instance of a Provider with config
     *
     * @param string|null $redirectUrl
     *
     * @return ProviderInterface
     */
    public function buildSocialProvider(string $redirectUrl = null): ProviderInterface
    {
        $providerClass = ucfirst($this->provider);
        $provider = strtoupper($this->provider);
        $config = [
            'client_id' => env($provider . '_CLIENT_ID'),
            'client_secret' => env($provider. '_CLIENT_SECRET'),
            'redirect' => $redirectUrl,
        ];

        return Socialite::buildProvider('\Laravel\Socialite\Two\\' . $providerClass . 'Provider', $config);
    }
}