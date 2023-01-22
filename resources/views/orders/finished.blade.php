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
                    <table>
                    <tr>
                        <th>商品</th> <th>単価</th> <th>個数</th> 
                    </tr>
                    @foreach ($datas['info'] as $data)
                    <tr>
                        <td>{{ $data['product'] ->name }}</td>
                        <td>{{ $data['product']->price }}</td>
                        <td>{{ $data['amount']}}</td>
                    </tr>
                    @endforeach
                </table>    
                <p>小計 {{ $datas['total_price'] }}</p>
                <p>小計(tax) {{ $datas['total_price_tax'] }}</p>
                <p>総量 {{ $datas['total_amount'] }}</p>
            <div class="footer">
                
                <a href="/orders/choose">back</a>
            </div>
        </x-app-layout>
    </body>
</html>
