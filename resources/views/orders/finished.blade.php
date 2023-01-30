<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>finish</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class>
        <x-app-layout>
            <x-slot name="header">finish</x-slot>
                <div class="flex justify-center m-20">
                    <table class="table-auto text-left bg-white">
                        <tr class="bg-gray-500 text-white">
                            <th scope="col" class="p-4">商品</th>
                            <th scope="col" class="p-4">単価</th> 
                            <th scope="col" class="p-4">個数</th>
                        </tr>
                        @foreach ($datas['info'] as $data)
                        <tr>
                            <td class="p-4">{{ $data['product'] ->name }}</td>
                            <td class="p-4">{{ $data['product']->price }}</td>
                            <td class="p-4">{{ $data['amount']}}</td>
                        </tr>
                    @endforeach
                    </table>
                </div>
                <div class="flex justify-center m-40">
                    <table class="table-fixed text-center bg-white">
                        <tr>
                            <th scope="col" class="bg-yellow-50 p-4">小計</th>
                            <td class="p-4">{{ $datas['total_price'] }}</td>
                        </tr>
                        <tr>
                            <th scope="col" class="bg-yellow-50 p-4">小計(TAX)</th>
                            <td class="p-4">{{ $datas['total_price_tax'] }}</td>
                        </tr>
                        <tr>
                            <th scope="col" class="bg-yellow-50 p-4">総量</th>
                            <td class="p-4">{{ $datas['total_amount'] }}</td>
                        </tr>
                        
                    </table>
                </div>
                
             <div class="footer">
                <div class="flex justify-center m-20">
                    <a href="/orders/choose" class="my-2 px-4 py-2 border-2 border-blue-500 hover:opacity-75 rounded-full font-bold">back</a>
                    
                </div>
            </div>
        </x-app-layout>
    </body>
</html>
