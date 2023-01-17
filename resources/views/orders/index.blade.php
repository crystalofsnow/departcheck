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
        <h1>Comfirm Date</h1>
        
        <form action="/orders" method="POST">
            @csrf
            <div class="date">
                <h2>date</h2>
                <input type="text" name="orders[date]" placeholder="1/1(半角入力)"/>
            </div>
            <input type="submit" value="store"/>
        </form>
        <!-- <input type="button" onclick="location.href='/orders/choose'" value="NEXT"> -->
    </body>
</html>
