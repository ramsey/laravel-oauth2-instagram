<?php
namespace Ramsey\Laravel\OAuth2\Instagram\Test\Facades;

use Instagram;
use Ramsey\Laravel\OAuth2\Instagram\Test\InstagramTestCase;
use League\OAuth2\Client\Provider\Instagram as LeagueInstagram;

class InstagramFacadeTest extends InstagramTestCase
{
    public function testInstagramFacade()
    {
        $this->assertInstanceOf(
            LeagueInstagram::class,
            Instagram::getFacadeRoot()
        );
    }
}
