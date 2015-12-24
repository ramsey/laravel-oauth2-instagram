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

namespace Ramsey\Laravel\OAuth2\Instagram\Facades;

use Illuminate\Support\Facades\Facade;
use League\OAuth2\Client\Provider\Instagram as LeagueInstagram;

/**
 * Provides a static accessor to the InstagramServiceProvider through
 * a named alias in Laravel
 */
class Instagram extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return LeagueInstagram::class;
    }
}
