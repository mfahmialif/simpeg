@extends('layouts.loginregister')
@section('title')
    Login SIMPEG
@endsection
@section('content')
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-md-10 mx-auto col-lg-5">
                <form class="p-4 p-md-5 shadow-lg custom" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3 text-center">
                        <a href="{{ route('home') }}"><img src="{{ asset('home/images/logo_putih.png') }}" alt=""
                                width="100%" /></a>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" placeholder="name@example.com" value="{{ old('email') }}" autocomplete="email"
                            autofocus required />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            id="password" placeholder="Password" autocomplete="current-password" required />
                        <label for="password">Password</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-success" type="submit">
                        Masuk
                    </button>
                    <hr class="my-2" />

                    <small class="text-muted">Belum Punya Akun?
                        <a href="{{ route('register') }}" class="text-light">Daftar Sekarang</a></small>

                </form>
            </div>
        </div>
    </div>
@endsection
