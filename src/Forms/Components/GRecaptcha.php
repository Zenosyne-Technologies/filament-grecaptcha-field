<?php

namespace Zenosyne\FilamentEnterpriseGRecaptchaField\Forms\Components;

use Filament\Forms\Components\Field;
use Zenosyne\FilamentEnterpriseGRecaptchaField\Rules\ReCaptchaEnterpriseRule;

class GRecaptcha extends Field
{
    protected string $view = 'filament-enterprise-grecaptcha-field::forms.components.g-recaptcha';


    public function setUp(): void
    {
        parent::setUp();
        $this->rules(['required', new ReCaptchaEnterpriseRule]);
        $this->dehydrated(false);
        $this->label('');
    }
}
