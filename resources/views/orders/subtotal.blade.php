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
        <h1>Subtotal</h1>
        <table >
            
            <tr>
                <th>商品</th> <th>単価</th> <th>在庫</th> <th>個数</th>
            </tr>
            
            <tr>
                <td>name</td> <td>price</td> <td>stock</td> <td>0</td>
            </tr>
        </table>
        <h2>小計</h2>
        <div class="footer">
            <input type="button" onclick="location.href='/orders/subtotal'" value="Subtotal">
            <a href="/">back</a>
        </div>
    </body>
</html>
