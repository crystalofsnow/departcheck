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
            <x-slot name="header">Sale Datas</x-slot>
             <table>
                    
                    <th> ID </th><th>Total Amount</th> <th>Total Price</th> <th>日時</th> <th>詳細</th>
                    
                    @foreach($datas as $data)
                    <tr>
                       
                       <td>{{ $data->id }}</td> <td>{{ $data->total_amount }}</td> <td>{{ $data->total_price }} </td> <td>{{ $data->created_at }} </td>
                       <td><form action="/orders/more_post" method="POST">
                        @csrf
                       <input type="hidden" name="id" value={{ $data->id }}>
                       <input type="submit" value="more">
                       </form>
                       </td>
                    @endforeach
                </table>
        </x-app-layout>
    </body>
</html>
