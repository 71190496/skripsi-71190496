@extends('peserta.layouts.main')
@section('container')

    <body class="text-left">
        <main class="form-signin w-100 m-auto">
            <img class="mb-4 mt-6" src="/img/stc.png" alt="" width="170" height="70" style="align-items: center">
            <h1 class="h3 mb-4 fw-normal text-center">Form Registrasi</h1>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name" placeholder="Nama"
                        @error('name') is-invalid 
                    @enderror  autocomplete="name">
                    <label for="name">Nama</label>
                    @error('name')
                        <div class="text-danger mt-2" style="text-align: left">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email" placeholder="name@example.com"
                        @error('email') is-invalid 
                @enderror  autocomplete="email">
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="text-danger mt-2" style="text-align: left">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>
                    @error('password')
                    <div class="text-danger mt-2" style="text-align: left">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <button class="w-100 btn btn-lg btn-success" type="submit">Sign in</button>
            </form>
            <div class="signup-wrapper text-center mt-4 mb-3">
                <a href="/login">Sudah punya akun? <span class="text-success">Login</span></a>
            </div>
            </form>
        </main>
    </body>
@endsection
