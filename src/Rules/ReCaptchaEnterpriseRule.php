<?php

namespace Zenosyne\FilamentEnterpriseGRecaptchaField\Rules;

use Illuminate\Contracts\Validation\ValidationRule as Rule;
use Closure;
use Http;
use Illuminate\Support\Facades\Log;

class ReCaptchaEnterpriseRule implements Rule
{
  
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $response = \Http::asJson()->post($this->recaptchaEnterpriseVerificationUrl(), [
            'event' => [
                'token' => $value,
                'site_key' => $this->getSiteKey(),
                'expectedAction' => 'login',
            ]
        ]);

        if ($response->status() === 403) {
            $fail(__('Unauthorized app'));
        }

        if ($response->status() !== 200) {
            $fail(__('reCaptcha failed'));
            Log::error('reCaptcha failed');
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Unable to validate recaptcha token';
    }

    private function recaptchaEnterpriseVerificationUrl(): string
    {
        return "https://recaptchaenterprise.googleapis.com/v1/projects/{$this->getProjectId()}/assessments?key={$this->getApiKey()}";
    }

    private function getProjectId(): ?string
    {
       return config('filament-enterprise-grecaptcha-field.google_project_id');
    }

    private function getApiKey(): ?string
    {
        return config('filament-enterprise-grecaptcha-field.google_api_key');
    }

    private function getSiteKey(): ?string 
    {
        return config('filament-enterprise-grecaptcha-field.google_site_key');
    }
}