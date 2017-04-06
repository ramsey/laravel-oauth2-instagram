# ramsey/laravel-oauth2-instagram

[![Source Code][badge-source]][source]
[![Latest Version][badge-release]][release]
[![Software License][badge-license]][license]
[![Build Status][badge-build]][build]
[![Coverage Status][badge-coverage]][coverage]
[![Total Downloads][badge-downloads]][downloads]

ramsey/laravel-oauth2-instagram is a [Laravel 5](https://laravel.com/) service provider for [league/oauth2-instagram](https://github.com/thephpleague/oauth2-instagram).

This project adheres to a [Contributor Code of Conduct][conduct]. By participating in this project and its community, you are expected to uphold this code.


## Installation

The preferred method of installation is via [Packagist][] and [Composer][]. Run
the following command to install the package and add it as a requirement to
your project's `composer.json`:

```bash
composer require ramsey/laravel-oauth2-instagram
```

After requiring the package with Composer, you'll need to add the following to the `providers` array in `config/app.php`:

``` php
Ramsey\Laravel\OAuth2\Instagram\InstagramServiceProvider::class
```

Then, add the following to the `aliases` array in the same file:

``` php
'Instagram' => Ramsey\Laravel\OAuth2\Instagram\Facades\Instagram::class
```

Now, run the following to properly set up the package with your Laravel application:

``` bash
php artisan vendor:publish
```

Finally, [register your application with Instagram](https://www.instagram.com/developer/) and add your client ID, client secret, and redirect URI to `config/instagram.php`.


## Examples

Create an authorization URL and redirect users to it in order to request access to their Instagram account:

``` php
$authUrl = Instagram::authorize([], function ($url, $provider) use ($request) {
    $request->session()->put('instagramState', $provider->getState());
    return $url;
});

return redirect()->away($authUrl);
```

In the route for the redirect URI, check the state and authorization code, and use the code to get an access token. Store the token to the session or to the user's profile in your data store.

``` php
if (!$request->has('state') || $request->state !== $request->session()->get('instagramState')) {
    abort(400, 'Invalid state');
}

if (!$request->has('code')) {
    abort(400, 'Authorization code not available');
}

$token = Instagram::getAccessToken('authorization_code', [
    'code' => $request->code,
]);

$request->session()->put('instagramToken', $token);
```

Use the access token to make authenticated requests to Instagram.

``` php
$instagramToken = $request->session()->get('instagramToken');

$instagramUser = Instagram::getResourceOwner($instagramToken);
$name = $instagramUser->getName();
$bio = $instagramUser->getDescription();

$feedRequest = Instagram::getAuthenticatedRequest(
    'GET',
    'https://api.instagram.com/v1/users/self/feed',
    $instagramToken
);

$client = new \GuzzleHttp\Client();
$feedResponse = $client->send($feedRequest);
$instagramFeed = json_decode($feedResponse->getBody()->getContents());
```


## Contributing

Contributions are welcome! Please read [CONTRIBUTING][] for details.


## Copyright and License

The ramsey/laravel-oauth2-instagram library is copyright © [Ben Ramsey](https://benramsey.com/) and licensed for use under the MIT License (MIT). Please see [LICENSE][] for more information.



[conduct]: https://github.com/ramsey/laravel-oauth2-instagram/blob/master/CODE_OF_CONDUCT.md
[packagist]: https://packagist.org/packages/ramsey/laravel-oauth2-instagram
[composer]: http://getcomposer.org/
[contributing]: https://github.com/ramsey/laravel-oauth2-instagram/blob/master/CONTRIBUTING.md

[badge-source]: http://img.shields.io/badge/source-ramsey/laravel--oauth2--instagram-blue.svg?style=flat-square
[badge-release]: https://img.shields.io/packagist/v/ramsey/laravel-oauth2-instagram.svg?style=flat-square
[badge-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[badge-build]: https://img.shields.io/travis/ramsey/laravel-oauth2-instagram/master.svg?style=flat-square
[badge-coverage]: https://img.shields.io/coveralls/ramsey/laravel-oauth2-instagram/master.svg?style=flat-square
[badge-downloads]: https://img.shields.io/packagist/dt/ramsey/laravel-oauth2-instagram.svg?style=flat-square

[source]: https://github.com/ramsey/laravel-oauth2-instagram
[release]: https://packagist.org/packages/ramsey/laravel-oauth2-instagram
[license]: https://github.com/ramsey/laravel-oauth2-instagram/blob/master/LICENSE
[build]: https://travis-ci.org/ramsey/laravel-oauth2-instagram
[coverage]: https://coveralls.io/r/ramsey/laravel-oauth2-instagram?branch=master
[downloads]: https://packagist.org/packages/ramsey/laravel-oauth2-instagram
