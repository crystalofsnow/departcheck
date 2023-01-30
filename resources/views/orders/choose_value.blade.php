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
            <x-slot name="header">Choose Value</x-slot>
            <form action="/orders/count" method="POST">
                @csrf
                <div class="flex justify-center m-20">
                    <table class="table-auto text-left">
                        <tr class="bg-gray-500 text-white">
                            <th scope="col" class="p-4">商品</th>
                            <th scope="col" class="p-4">単価</th> 
                            <th scope="col" class="p-4">在庫</th> 
                            <th scope="col" class="p-4">個数</th>
                        </tr>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-300 bg-white">
                    @foreach ($mercs as $merc)
                    <input type="hidden" name="merc_value[{{ $merc->name }}][product_id]" value={{ $merc->id }}>
                    <tr class="p-4">
                        <!-- <h2>value:{{$merc}}</h2> -->
                        <td class="p-4">{{ $merc->name }}</td>
                        <td class="p-4">{{ $merc->price }}</td> 
                        <td class="p-4">{{ $merc->stock }} </td>
                        <td class="p-4">
                            <input type="number" name="merc_value[{{ $merc->name }}][amount]" placeholder="1" value="1" min="1">
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>    
                
                
            
            <div class="flex justify-center m-20">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Subtotal</button>
                </div>
                <!-- <input type="button" onclick="location.href='/orders/choose_value'" value="choose">  -->
            </form>
            <div class="footer">
                <div class="flex justify-center m-20">
                    <a href="/orders/choose" class="my-2 px-4 py-2 border-2 border-blue-500 hover:opacity-75 rounded-full font-bold">back</a>
                    
                </div>
                
                
            </div>
        </x-app-layout>
    </body>
</html>

