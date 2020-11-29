<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
          integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
          crossorigin="anonymous"/>
</head>
<body class="antialiased">
<h1>It works</h1>

<form action="/api/public/files" method="post" enctype="multipart/form-data">
    @csrf

    <label>
        Upload
        <input type="file" name="file">
    </label>

    <label>
        Prop
        <input type="text" name="desc" value="myvalue">
    </label>

    <button type="submit">Submit</button>
</form>
</body>
</html>
