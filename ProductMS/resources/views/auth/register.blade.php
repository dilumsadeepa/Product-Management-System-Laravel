@extends('layouts.auth')

@section('auth-content')
    <div class="row justify-content-center">

        <div class="col-sm-4 mt-5 mb-5">
            <div class="card mt-5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="d-inline-block mb-3 mt-5">
                            <img src="{{ asset('images/login-img.svg') }}" class="img-fluid mx-auto d-block auth-img"
                                alt="lobac" height="80px" />
                        </div>

                        <h3 class="text-dark mt-5">Register With Us</h3>
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

                        <form method="POST" action="{{ route('register') }}">

                            @csrf

                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" placeholder="Enter Name" :value="old('name')" name="name" required autofocus autocomplete="name">
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" placeholder="Enter Email" name="email"
                                :value="old('email')" required autocomplete="email">
                            </div>

                            <div class="mb-3">
                                <label for="pwd" class="form-label">Password:</label>
                                <input type="password" class="form-control" placeholder="Enter Password" name="password"
                                    required autocomplete="new-password">
                            </div>

                            <div class="mb-3">
                                <label for="cpwd" class="form-label">Confirm Password:</label>
                                <input type="password" class="form-control" placeholder="Enter Confirm Password"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Submit</button>

                            <hr>
                            <p>If You're already a user <a href="{{ route('login') }}"
                                    class="text-muted float-end">Login</a></p>

                        </form>

                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
