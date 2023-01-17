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
        <h1>Choose merchandise</h1>
        <form action="/orders/merc" method="POST">
            @csrf
            <table>
                <tr>
                    <th>商品</th> <th>単価</th> <th>在庫</th> <th>個数</th>
                </tr>
                @foreach($products as $product)
                <tr>
                   <td>
                    <input type="checkbox" name="merc[][product_id]" value="{{ $product->id }}"><!-- listにしたければnameに[]-->
                    <!-- <input type="checkbox" name="merc[{{ $product->id }}]" value="{{ $product->id }}"><!-- listにしたければnameに[]-->
                   </td> 
                   <td>{{ $product->name }}</td> <td>{{ $product->price }}</td> <td>{{ $product->stock }} </td> <td>0</td>
                </tr>
                @endforeach
            </table>
            <input type="submit" value="choose">
            <!-- <input type="button" onclick="location.href='/orders/choose_value'" value="choose">  -->
        </form>
        <div class="footer">
                <a href="/">back</a>
                <!-- <h2>{{ session('dates') }}</h2> -->
            </div>
    </body>
</html>

