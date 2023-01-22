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
                <table>
                    <tr>
                        <th>商品</th> <th>単価</th> <th>在庫</th> <th>個数</th>
                    </tr>
                    
                    @foreach ($mercs as $merc)
                    <input type="hidden" name="merc_value[{{ $merc->name }}][product_id]" value={{ $merc->id }}>
                    <tr>
                        <!-- <h2>value:{{$merc}}</h2> -->
                        <td>{{ $merc->name }}</td> <td>{{ $merc->price }}</td> <td>{{ $merc->stock }} </td>
                        <td>
                            <input type="number" name="merc_value[{{ $merc->name }}][amount]" placeholder="1">
                        </td>
                    </tr>
                    @endforeach
                    
                </table>
                <input type="submit" value="subtotal">
            </form>
            <div class="footer">
                <!--<input type="button" onclick="location.href='/orders/subtotal'" value="subtotal">-->
                <a href="/orders/choose">back</a>
                
                
                
            </div>
        </x-app-layout>
    </body>
</html>

