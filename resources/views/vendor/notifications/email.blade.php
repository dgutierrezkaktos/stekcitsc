@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# @lang('Error!')
@else
# @lang('Hola!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ 'Link de Recuperación de Contraseñas de Usuario.' }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ 'Si usted no solicito este correo, favor haga caso omiso de esto.' }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Regards'),<br>{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
@lang(
    "Si usted hace clic en \":actionText\" y el navegador no abre el link\n".
    'tambien puede ingresar desde el siguiente Link: [:actionURL](:actionURL)',
    [
        'actionText' => $actionText,
        'actionURL' => $actionUrl
    ]
)
@endcomponent
@endisset
@endcomponent
