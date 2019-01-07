<?php
namespace Ramsey\Laravel\OAuth2\Instagram\Test;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Orchestra\Testbench\TestCase;
use Ramsey\Laravel\OAuth2\Instagram\Facades\Instagram;
use Ramsey\Laravel\OAuth2\Instagram\InstagramServiceProvider;

class InstagramTestCase extends TestCase
{
    use MockeryPHPUnitIntegration;

    protected function getEnvironmentSetup($app)
    {
        $app['config']->set('instagram.clientId', 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');
        $app['config']->set('instagram.clientSecret', 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');
        $app['config']->set('instagram.redirectUri', 'http://localhost/instagram');
    }

    protected function getPackageProviders($app)
    {
        return [
            InstagramServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Instagram' => Instagram::class,
        ];
    }
}
