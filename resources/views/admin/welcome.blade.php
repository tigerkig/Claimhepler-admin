<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('admin.login'))
                <div class="top-right links">
                    @auth('admin-web')
                        <a href="{{ url('/admin/home') }}">Home</a>
                    @else
                        <a href="{{ route('admin.login') }}">Login</a>

                        @if (Route::has('admin.register'))
                            <a href="{{ route('admin.register') }}">Register</a>
                        @endif
                    @endauth
                    <a href="{{ route('welcome') }}">User</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Admin
                </div>
            </div>
        </div>
    </body>
</html>
