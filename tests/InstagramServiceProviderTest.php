<?php
declare(strict_types=1);

namespace Ramsey\Laravel\OAuth2\Instagram\Test;

use League\OAuth2\Client\Provider\Instagram as LeagueInstagram;
use Ramsey\Laravel\OAuth2\Instagram\InstagramServiceProvider;

class InstagramServiceProviderTest extends InstagramTestCase
{
    public function testInstagramServiceProviderRegistered(): void
    {
        $this->assertInstanceOf(
            LeagueInstagram::class,
            $this->app[LeagueInstagram::class]
        );
    }
}
