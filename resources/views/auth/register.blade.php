@extends('layouts.loginregister')
@section('title')
    Register SIMPEG
@endsection
@section('content')
    <div class="container col-xl-10 col-xxl-8 px-4 pt-3">
        <div class="row align-items-center g-lg-5 py-4">
            <div class="col-md-10 mx-auto col-lg-5">
                <form class="p-4 p-md-5 shadow-lg custom" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3 text-center">
                        <a href="{{ route('home') }}"><img src="{{ asset('home/images/logo_putih.png') }}" alt=""
                                width="100%" /></a>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="name" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" autocomplete="name" autofocus id="floatingInput" placeholder="Name"
                            required />
                        <label for="floatingInput">Name</label>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" autocomplete="email" id="floatingInput"
                            placeholder="name@example.com" required />
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            autocomplete="new-password" id="floatingPassword" placeholder="Password" required />
                        <label for="floatingPassword">Password</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            autocomplete="new-password" placeholder="Konfirmasi Password" required />
                        <label for="password-confirm">Konfirmasi Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-success" type="submit">
                        Daftar
                    </button>
                    <hr class="my-2" />
                    <small class="text-muted">Sudah Punya Akun? <a href="{{ route('login') }}" class="text-light">Masuk
                            Sekarang</a></small>
                </form>
            </div>
        </div>
    </div>
@endsection
