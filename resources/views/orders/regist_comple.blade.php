<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Completion of registration</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class>
        <x-app-layout>
            <x-slot name="header">New member</x-slot>
            <div class="flex justify-center m-40 bg-white">
                <h1 class="font-bold m-10">Completion of registration</p>
                
                <p class="m-10">{{ $new_guest ->name }} さんの会員番号は　</p>
                
                <p class="font-bold text-red-700 m-10">No. {{ $new_guest->id }}</p>
            </div>
        </x-app-layout>
    </body>
</html>
