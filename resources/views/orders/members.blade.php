<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>New member</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class>
        <x-app-layout>
            <x-slot name="header">New member</x-slot>
            <form action="/orders/member_submit" method="POST">
                @csrf
                <table>
                    
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name" placeholder="name"></td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td><input type="email" name="email" placeholder="email"></td>
                    </tr>
                     <tr>
                        <td>password</td>
                        <td><input type="password" name="password" placeholder="password"></td>
                    </tr>
                   
                </table>
                <input type="submit" value="register">
            </form>
            <div class="footer">
                
                <a href="/orders/choose_value">back</a>
            </div>
        </x-app-layout>
    </body>
</html>
