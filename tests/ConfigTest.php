<?php
declare(strict_types=1);

namespace Ramsey\Laravel\OAuth2\Instagram\Test;

class ConfigTest extends InstagramTestCase
{
    public function testConfigReturnsArray(): void
    {
        $config = include dirname(__DIR__) . '/src/config/instagram.php';

        $this->assertIsArray($config);
        $this->assertArrayHasKey('clientId', $config);
        $this->assertArrayHasKey('clientSecret', $config);
        $this->assertArrayHasKey('redirectUri', $config);
    }
}
