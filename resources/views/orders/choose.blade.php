<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Choose merchandise</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class>
        <x-app-layout>
            <x-slot name="header">Choose merchandise</x-slot>
            <form action="/orders/merc" method="POST">
                @csrf
                <div class="flex justify-center m-20">
                    <table class="table-auto text-left">
                        <tr class="bg-gray-500 text-white">
                            <th scope="col" class="p-4"> checkbox </th>
                            <th scope="col" class="p-4">商品</th>
                            <th scope="col" class="p-4">単価</th> 
                            <th scope="col" class="p-4">在庫</th> 
                        </tr>
                        @foreach($products as $product)
                        <tr class="p-4">
                           <td class="p-4">
                            <input type="checkbox" name="merc[][product_id]" value="{{ $product->id }}"><!-- listにしたければnameに[]-->
                            <!-- <input type="checkbox" name="merc[{{ $product->id }}]" value="{{ $product->id }}"><!-- listにしたければnameに[]-->
                           </td> 
                           <td class="p-4">{{ $product->name }}</td>
                           <td class="p-4">{{ $product->price }}</td> 
                           <td class="p-4">{{ $product->stock }} </td> 
                        @endforeach
                    </table>
                </div>
                
                <div class="flex justify-center m-20">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Choose</button>
                </div>
                <!-- <input type="button" onclick="location.href='/orders/choose_value'" value="choose">  -->
            </form>
            <div class="footer">
                <div class="flex justify-center m-20">
                    <a href="/" class="my-2 px-4 py-2 border-2 border-blue-500 hover:opacity-75 rounded-full font-bold">back</a>
                    <!-- <h2>{{ session('dates') }}</h2> -->
                </div>
            
        </x-app-layout>
    </body>
</html>

