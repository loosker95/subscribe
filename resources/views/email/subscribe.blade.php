<x-mail::message>
# Confirmation subscription email

This is email is to confirm you have been subscribe successfully

Here is you confirmation code 


<code>{{$confirmation}}</code>

{{-- <x-mail::button :url="''">
    Button Text
</x-mail::button> --}}

Thanks, Fabien<br>
{{ config('app.name') }}
</x-mail::message>
