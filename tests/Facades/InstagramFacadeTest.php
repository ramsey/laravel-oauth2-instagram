<?php
declare(strict_types=1);

namespace Ramsey\Laravel\OAuth2\Instagram\Test\Facades;

use Ramsey\Laravel\OAuth2\Instagram\Facades\Instagram;
use Ramsey\Laravel\OAuth2\Instagram\Test\InstagramTestCase;
use League\OAuth2\Client\Provider\Instagram as LeagueInstagram;

class InstagramFacadeTest extends InstagramTestCase
{
    public function testInstagramFacade(): void
    {
        $this->assertInstanceOf(
            LeagueInstagram::class,
            Instagram::getFacadeRoot()
        );
    }
}
