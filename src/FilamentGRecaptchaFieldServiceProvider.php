<?php

namespace Zenosyne\FilamentEnterpriseGRecaptchaField;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentGRecaptchaFieldServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-enterprise-grecaptcha-field')
            ->hasConfigFile()
            ->hasViews();
    }
}
