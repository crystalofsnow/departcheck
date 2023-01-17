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
        <h1>Choose Value</h1>
        <table >
            <tr>
                <th>商品</th> <th>単価</th> <th>在庫</th> <th>個数</th>
            </tr>
            
            @foreach ($mercs as $merc)
            <tr>
                <!-- <h2>value:{{$merc}}</h2> -->
                <td>{{ $merc->name }}</td> <td>{{ $merc->price }}</td> <td>{{ $merc->stock }} </td> <td>0</td>
            </tr>
            @endforeach
            
        </table>
        <div class="footer">
            <input type="button" onclick="location.href='/orders/subtotal'" value="subtotal">
            <a href="/">back</a>
            
            
            
        </div>
    </body>
</html>

