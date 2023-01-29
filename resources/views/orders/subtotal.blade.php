<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Subtotal</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class>
        <x-app-layout>
            <x-slot name="header">Subtotal</x-slot>
            <form action="/orders/comfirm" method="POST">
                @csrf
                <table>
                    <tr>
                        <th>商品</th> <th> </th><th>単価</th> <th>個数</th>
                    </tr>
                    @foreach ($datas['info'] as $data)
                    <input type="hidden" name="merc_value[{{ $data['product']->name }}][product_id]" value={{ $data['product']->id }}>
                    <input type="hidden" name="merc_value[{{ $data['product']->name }}][amount]" value={{ $data['amount'] }}>
                    <tr>
                        <td>{{ $data['product'] ->name }}</td>
                        <td><img src="{{ $data['product'] ->image_url }}" alt="No image"/></td>
                        <td>{{ $data['product']->price }}</td>
                        <td>{{ $data['amount']}}</td>
                    </tr>
                    @endforeach
                </table>    
                <p>小計 {{ $datas['total_price'] }}</p>
                <p>小計(tax) {{ $datas['total_price_tax'] }}</p>
                <p>総量 {{ $datas['total_amount'] }}</p>
                <input type="number" name="guest_id" placeholder="0000"/>
                <input type="submit" value="comfirm">
            </form>
            <div class="footer">
                
                <a href="/orders/choose_value">back</a>
            </div>
        </x-app-layout>
    </body>
</html>
