<?php

namespace Zenosyne\FilamentEnterpriseGRecaptchaField;

use Filament\Facades\Filament;
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

    public function register()
    {
        parent::register();

        $sciprts = [
            '<script src="https://www.google.com/recaptcha/enterprise.js?render=' . config('filament-enterprise-grecaptcha-field.google_site_key') . '"></script>',
            '<script>const fercaptcha = ' . json_encode(['g_site_key' => config('filament-enterprise-grecaptcha-field.google_site_key')]) . '</script>'
        ];

        Filament::registerRenderHook('head.end', function () use ($sciprts) {
            return join(' ', $sciprts);
        });
    }
}
