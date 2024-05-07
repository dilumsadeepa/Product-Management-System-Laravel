@extends('layouts.auth')

@section('auth-content')
    <div class="row justify-content-center">

        <div class="col-sm-4 mt-5 mb-5">
            <div class="card mt-5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="d-inline-block mb-5">
                            <img src="{{ asset('images/login-img.svg') }}" class="img-fluid mx-auto d-block auth-img" alt="lobac" height="80px" />
                        </div>
                        <h3 class="text-dark mt-5">Login to Your Account</h3>
                    </div>

                    <div class="p-2 mt-3">
                        @if ($errors->any())
                            <div role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="error">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>


                    <div class="p-2 mt-3">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                    name="email">
                            </div>

                            <div class="mb-3">
                                <label for="pwd" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                                    name="password">
                            </div>

                            <div class="mt-4 mb-3">
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </div>

                            <div class="mt-5">
                                <label class="form-check-label">If you haven't account</label>
                                <a href="{{ route('register') }}" class="text-muted float-end">Register</a>
                            </div>

                        </form>

                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
