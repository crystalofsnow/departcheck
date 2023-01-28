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
                    
                    @foreach($details as $detail)
                    
                    <tr>
                       
                       
                       <td>{{ $detail->name }}</td>
                       <td>{{ $detail->price }}</td>
                       <td>{{ $detail->amount }}</td> 
                 @endforeach
                 
                    </table>
                
                <a href="/orders/datas">back</a>
            </div>
        </x-app-layout>
    </body>
</html>
