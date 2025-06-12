@extends('layouts.guest')

@section('title', 'Login - CameraHub')

<strong></strong>
@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="logo">
            <h1><i data-feather="camera"></i> CameraHub</h1>
            <p>Marketplace Kamera Terlengkap</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label class="form-label" for="email">{{ __('Email') }}</label>
                <div class="input-icon">
                    <i data-feather="mail"></i>
                    <input id="email" 
                           class="form-input @error('email') error @enderror" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus 
                           autocomplete="username"
                           placeholder="Masukkan email Anda">
                </div>
                @error('email')
                    <div class="error-message" style="display: block;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label class="form-label" for="password">{{ __('Password') }}</label>
                <div class="input-icon">
                    <i data-feather="lock"></i>
                    <input id="password" 
                           class="form-input @error('password') error @enderror"
                           type="password"
                           name="password"
                           required 
                           autocomplete="current-password"
                           placeholder="Masukkan password Anda">
                    <i data-feather="eye" class="password-toggle" onclick="togglePassword('password')"></i>
                </div>
                @error('password')
                    <div class="error-message" style="display: block;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="checkbox-group">
                <input id="remember_me" type="checkbox" class="checkbox" name="remember">
                <label for="remember_me" class="checkbox-label">{{ __('Remember me') }}</label>
            </div>

            <!-- Forgot Password Link -->
            <div class="forgot-password">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <button type="submit" class="btn-primary">
                {{ __('Log in') }}
            </button>

            <div class="divider">
                <span>atau</span>
            </div>

            <!-- Social Login (Optional - requires additional packages) -->
          
        </form>

        <div class="auth-footer">
            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
        </div>
    </div>
</div>
@endsection