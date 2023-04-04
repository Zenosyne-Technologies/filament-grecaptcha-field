@push('scripts')
    <script type="text/javascript">

    grecaptcha.enterprise.ready(async () => {
        const token = await grecaptcha.enterprise.execute(fercaptcha.g_site_key, {action: 'homepage'});
        fercaptcha.token = token;
        window.Livewire.find('{{$this->id}}').$set('{{$getStatePath()}}', token);
    });

    document.addEventListener('livewire:load', function () {
        window.Livewire.find('{{$this->id}}').$set('{{$getStatePath()}}', 'meh')
    });

    
</script>
@endpush

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-action="$getHintAction()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div x-data="{ state: $wire.entangle('{{ $getStatePath() }}').defer }"
         wire:ignore
         x-on:expand-concealing-component.window="
  error = $el.parentElement.querySelector('[data-validation-error]');
  if (!error) return;
  setTimeout(() => $el.scrollIntoView({
    behavior: 'smooth',
    block: 'start',
    inline: 'start'
  }), 200);                       
               ">
    </div>
</x-dynamic-component>