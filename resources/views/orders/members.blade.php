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
            <form action="/orders/regist_comple" method="POST">
                @csrf
                <div class="flex justify-center m-40">
                    <table class="table-fixed text-center bg-white">
                    
                    <tr>
                        <th scope="col" class="bg-yellow-50 p-4">Name</th>
                        <td class="p-4"><input type="text" name="name" placeholder="name"></td>
                    </tr>
                    <tr>
                        <th scope="col" class="bg-yellow-50 p-4">email</th>
                        <td class="p-4"><input type="email" name="email" placeholder="email"></td>
                    </tr>
                     <tr>
                        <th scope="col" class="bg-yellow-50 p-4">password</th>
                        <td class="p-4"><input type="password" name="password" placeholder="password"></td>
                    </tr>
                   
                    </table>
                </div>
                <div class="flex justify-center m-20">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Register</button>
                </div>
            </form>
            <div class="footer">
                
                <div class="flex justify-center m-20">
                    <a href="/orders/choose_value" class="my-2 px-4 py-2 border-2 border-blue-500 hover:opacity-75 rounded-full font-bold">back</a>
                    
                </div>
            </div>
        </x-app-layout>
    </body>
</html>
