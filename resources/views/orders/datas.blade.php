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
            <div class="flex justify-center m-20">
                    <table class="table-auto text-left bg-white">
                        <tr class="bg-gray-500 text-white">
                    
                            <th scope="col" class="p-4"> ID </th>
                            <th scope="col" class="p-4">Total Amount</th> 
                            <th scope="col" class="p-4">Total Price</th> 
                            <th scope="col" class="p-4">日時</th> 
                            <th scope="col" class="p-4">詳細</th>
                    
                    @foreach($datas as $data)
                    <tr>
                       
                       <td class="p-4">{{ $data->id }}</td>
                       <td class="p-4">{{ $data->total_amount }}</td> 
                       <td class="p-4">￥{{ $data->total_price }} </td> 
                       <td>{{ $data->created_at }} </td>
                       <td class="p-4 text-red-700"><form action="/orders/more_post" method="POST">
                        @csrf
                       <input type="hidden" name="id" value={{ $data->id }}>
                       <input type="submit" value="more">
                       </form>
                       </td>
                    @endforeach
                </table>
            </div>
        </x-app-layout>
    </body>
</html>
