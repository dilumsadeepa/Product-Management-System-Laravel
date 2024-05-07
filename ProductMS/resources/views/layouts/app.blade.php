<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    {{-- css --}}

    <link rel="stylesheet" href="{{asset('css/style.css')}}">


    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-light bg-light mb-5">
        <div class="container">
            <a class="navbar-brand" href="{{route('dashboard')}}">Product Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>

            <div class="collapse navbar-collapse float-end" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto float-end" style="justify-content: space-between">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">Home</a>
                    </li>
                    <li class="nav-item" style="margin-left: 10px">
                        <a class="btn btn-primary mr-2" href="{{ route('products.create') }}">Create Product</a>
                    </li>
                    <li class="nav-item" style="margin-left: 10px">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container-fluid mt-3 mb-5">
        @yield('content')
    </div>

</body>

</html>
