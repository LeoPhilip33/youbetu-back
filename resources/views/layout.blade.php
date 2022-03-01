<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <title>Laravue</title>

    </head>
    <body>
        <div id="app">
            <router-link to="/">
                <p>Home</p>
            </router-link>
            <router-link to="/register">
                <p>register</p>
            </router-link>
            <router-link to="/login">
                <p>login</p>
            </router-link>
                

            
            <div class="rooter-view-container">
                <router-view></router-view>
            </div>

        </div>


        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
