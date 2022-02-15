<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="YAAV">
    <meta name="generator" content="Hugo 0.88.1">
    <title>@yield('title')</title>



    <!-- Bootstrap core CSS -->
    <!-- <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="/assets/css/dashboard.css" rel="stylesheet">
</head>
<body>

<x-admin.header></x-admin.header>

<div class="container-fluid">
    <div class="row">
        <x-admin.sidebar></x-admin.sidebar>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('content')

        </main>
    </div>
</div>
@stack('js')

</body>
</html>
