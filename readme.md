# PHP Steam Login

Forked from Ehesp/Steam-Login to focus on being specific and updated for Laravel.

This package enables you to easily log users in via Steam, using their OpenID service. However, this package does not require that you have the OpenID PHP module installed!

Note: The package can also easily be used with the Laravel 5.3+ PHP Framework.

## Installation

Begin by installing this package via Composer:

```
{
    "require": {
        "captbrogers/steam-login": "~1.0"
    }
}
```

### Add Service Provider and Facade

If you're using the Laravel 5.3+ PHP Framework, add the following to your `config/app.php` file's providers array:

```php
Captbrogers\SteamLogin\Laravel\SteamLoginServiceProvider::class,
```

And the following to your aliases array in the same file:

```php
'SteamLogin' => Captbrogers\SteamLogin\Laravel\Facades\SteamLogin::class,
```

You now have access to the `SteamLogin` facade.

## Usage

Before starting, please note you're unable to redirect a user to the Steam OpenID login portal. In other words, they must be able to click the link themselves.

Use the `SteamLogin` class and create a new instance of it:

```php
// view.blade.php
<a href="{{ SteamLogin::url() }}">Login via Steam!</a>
```

To validate the Steam Login:

```php
// routes/web.php
Route::get('/', function()
{
    return SteamLogin::validate();
});
```

## Changing the return URL

The return URL must be a valid URL which contains either the http or https URI scheme.

If you want your users to be sent to a specific URL/route after login, this is easily done. Simply add the URL as a parameter in the `url()` method:

```php
// config/services.php
'steam' => [
    'login' => 'http://mywebsite.com/login',
],
```

Then simply access this in the `url` method:

```php
SteamLogin::url(config(('services.steam.login'));
```

## To Do

* Add PHPUnit tests
