<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class>
        <x-app-layout>
            <x-slot name="header">入荷数</x-slot>
             <form action="/orders/firststock" method="POST">
                @csrf
                <div class="flex justify-center m-20">
                    <table class="table-auto text-left divide-y divide-gray-200 dark:divide-gray-700">
                        <tr class="bg-gray-500 text-white">
                           <th scope="col" class="p-4">商品</th> <th scope="col" class="p-4">単価</th> <th scope="col" class="p-4">入荷数</th> 
                        </tr>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-300">
                        @foreach($products as $product)
                        <tr class="p-4">
                           <td class="p-4">{{ $product->name }}</td> <td class="p-4">￥{{ $product->price }}</td> 
                           <td class="p-4">
                                <input type="hidden" name="firststock[{{ $product->name }}][product_id]" value="{{ $product->id }}">
                                <input type="number" name="firststock[{{ $product->name }}][stock]" placeholder="1"  value="1" min="1">
                            </td>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                <div class="flex justify-center m-20">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">OK</button>
                </div>
                <!-- <input type="button" onclick="location.href='/orders/choose_value'" value="choose">  -->
            </form>
            <!-- <input type="button" onclick="location.href='/orders/choose'" value="NEXT"> -->
        </x-app-layout>
    </body>
</html>
