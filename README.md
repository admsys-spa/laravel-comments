# Sistema de comentarios hecho simple.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/adiazm/laravel-comments.svg?style=flat-square)](https://packagist.org/packages/adiazm/laravel-comments)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/adiazm/laravel-comments/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/adiazm/laravel-comments/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/adiazm/laravel-comments/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/adiazm/laravel-comments/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/adiazm/laravel-comments.svg?style=flat-square)](https://packagist.org/packages/adiazm/laravel-comments)

Este paquete proporciona un sistema de comentarios simple para aplicaciones Laravel.

## Installation

You can install the package via composer:

```bash
composer require adiazm/laravel-comments
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-comments-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="comments-config"
```

This is the contents of the published config file:

```php
return [

    'model' => \Adiazm\Comments\Models\Comment::class,
    'user' => \App\Models\User::class,

];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-comments-views"
```

## Usage
Start by using the `Adiazm\Comments\Concerns\HasComments` trait on your model.
```php
use Adiazm\Comments\Concerns\HasComments;

class Post extends Model
{
    use HasComments;
}
```
This trait adds a `comments(): MorphMany` relationship on your model. It also adds a new `comment()` method that can be used to quickly add a comment to your model.

```php
$post = Post::first();

$post->comment('Hello, world!');
```

By default, the package will use the authenticated user's ID as the "commentor". You can customise this by providing a custom `User` to the `comment()` method.

```php
$post->comment('Hello, world!', user: User::first());
```

The package also supports `parent -> children` relationships for comments. This means that a comment can `belongTo` another comment.

```php
$post->comment('Thanks for commenting!', parent: Comment::find(2));
```


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Alexander Díaz](https://github.com/adiazm)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
