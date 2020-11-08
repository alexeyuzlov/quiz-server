<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@if(Auth::check())
    User is {{Auth::id()}} and {{Auth::getName()}}

    <form action="/logout" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
@else
    <form id="loginForm" action="/login" method="post" novalidate>
        @csrf

        <div>
            <label>
                Email
                <input type="email" name="email" autocomplete="off" value="{{$user->email}}"/>
            </label>
        </div>

        <div>
            <label>
                Password
                <input type="password" name="password" autocomplete="off" value="password"/>
            </label>
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>
@endif

</body>
</html>
