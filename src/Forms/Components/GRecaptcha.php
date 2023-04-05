<?php

namespace Zenosyne\FilamentEnterpriseGRecaptchaField\Forms\Components;

use Filament\Forms\Components\Field;
use Zenosyne\FilamentEnterpriseGRecaptchaField\Rules\ReCaptchaEnterpriseRule;

class GRecaptcha extends Field
{
    protected string $view = 'filament-enterprise-grecaptcha-field::forms.components.g-recaptcha';


    public function setUp(): void
    {
        $sciprts = [
            '<script src="https://www.google.com/recaptcha/enterprise.js?render=' . config('filament-enterprise-grecaptcha-field.google_site_key') . '"></script>',
            '<script>const fercaptcha = ' . json_encode(['g_site_key' => config('filament-enterprise-grecaptcha-field.google_site_key')]) . '</script>'
        ];

        \Filament\Facades\Filament::registerRenderHook('head.end', function () use ($sciprts) {
            return join(' ', $sciprts);
        });
        
        parent::setUp();
        $this->rules(['required', new ReCaptchaEnterpriseRule]);
        $this->dehydrated(false);
        $this->label('');
    }
}
