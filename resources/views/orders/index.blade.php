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
        <h1>入荷数</h1>
        
         <form action="/orders/firststock" method="POST">
            @csrf
            <table>
                <tr>
                   <th>商品</th> <th>単価</th> <th>入荷数</th> 
                </tr>
                @foreach($products as $product)
                <tr>
                   <td>{{ $product->name }}</td> <td>{{ $product->price }}</td> 
                   <td>
                        <input type="hidden" name="firststock[{{ $product->name }}][product_id]" value="{{ $product->id }}">
                        <input type="number" name="firststock[{{ $product->name }}][stock]" placeholder="1">
                    </td>
                @endforeach
            </table>
            <input type="submit" value="OK">
            <!-- <input type="button" onclick="location.href='/orders/choose_value'" value="choose">  -->
        </form>
        <!-- <input type="button" onclick="location.href='/orders/choose'" value="NEXT"> -->
    </body>
</html>
