[<img src="https://cloud.githubusercontent.com/assets/1529454/5291635/1c426412-7b88-11e4-8d16-46161a081ece.gif" />](https://github.com/zenosyne/filament-enterprise-grecaptcha-field)

# Provides a Google reCaptcha Enterpise for the Filament Login page.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/zenosyne/filament-enterprise-grecaptcha-field.svg?style=flat-square)](https://packagist.org/packages/zenosyne/filament-enterprise-grecaptcha-field)
[![Total Downloads](https://img.shields.io/packagist/dt/zenosyne/filament-enterprise-grecaptcha-field.svg?style=flat-square)](https://packagist.org/packages/zenosyne/filament-enterprise-grecaptcha-field)


## Installation

You can install the package via composer:

```bash
composer require zenosyne/filament-enterprise-grecaptcha-field
```

### Configuration

Add these in your `.env` file :

```
GOOGLE_RECAPTCHA_PROJECT_ID=
GOOGLE_RECAPTCHA_API_KEY=
GOOGLE_RECAPTCHA_SITE_KEY=
```

(You can obtain them from [here](https://www.google.com/recaptcha/admin))

## Usage

You'll need to create a filament page for your login which extends the original Filament login controller and add the field.

```php

<?php

namespace App\Filament\Pages;

use Filament\Http\Livewire\Auth\Login as BaseLoginPage;
use Zenosyne\FilamentEnterpriseGRecaptchaField\Forms\Components\GRecaptcha;

class Login extends BaseLoginPage
{
    protected function getFormSchema(): array
    {
        $formSchema = parent::getFormSchema();
        $formSchema[] = GRecaptcha::make('g-recaptcha');
        return $formSchema;
    }
}

```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

If you discover any security related issues, please create an issue.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
