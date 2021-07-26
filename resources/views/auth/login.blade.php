@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="GET" action="{{ route('loginshop') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="shop-name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Enter Shop Name') }}</label>

                                <div class="col-md-6">
                                    <input id="shop-name" type="text"
                                        class="form-control @error('shop-name') is-invalid @enderror" name="shop-name"
                                        value="{{ old('shop-name') }}" required autocomplete="shop-name" autofocus>

                                    @error('shop-name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @if (session('success'))
                                        <span class="login-invalid-feedback" role="alert">
                                            <strong>{{ session('success') }}</strong>
                                        </span>
                                    @endif
                                    @if (session('error'))
                                        <span class="login-invalid-feedback" role="alert">
                                            <strong>{{ session('error') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                            {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
