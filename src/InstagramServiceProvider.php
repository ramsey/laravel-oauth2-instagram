<?php
/**
 * This file is part of the ramsey/laravel-oauth2-instagram library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license http://opensource.org/licenses/MIT MIT
 * @link https://packagist.org/packages/ramsey/laravel-oauth2-instagram Packagist
 * @link https://github.com/ramsey/laravel-oauth2-instagram GitHub
 */

namespace Ramsey\Laravel\OAuth2\Instagram;

use Illuminate\Support\ServiceProvider;
use League\OAuth2\Client\Provider\Instagram as LeagueInstagram;

/**
 * The InstagramServiceProvider provides easy access to league/oauth2-instagram
 * for use with Laravel
 */
class InstagramServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/instagram.php' => config_path('instagram.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LeagueInstagram::class, function ($app) {
            return new LeagueInstagram([
                'clientId' => config('instagram.clientId'),
                'clientSecret' => config('instagram.clientSecret'),
                'redirectUri' => config('instagram.redirectUri'),
            ]);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            LeagueInstagram::class
        ];
    }
}
