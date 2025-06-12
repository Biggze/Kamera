@extends('layouts.guest')

@section('title', 'Register - CameraHub')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="logo">
            <h1><i data-feather="camera"></i> CameraHub</h1>
            <p>Marketplace Kamera Terlengkap</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="auth-form">
            @csrf

            <!-- Username -->
            <div class="form-group">
                <label class="form-label" for="name">Username</label>
                <div class="input-icon">
                    <i data-feather="user"></i>
                    <input id="name" 
                           class="form-input @error('name') error @enderror" 
                           type="text" 
                           name="name" 
                           value="{{ old('name') }}" 
                           required 
                           autofocus 
                           autocomplete="username"
                           placeholder="Masukkan username">
                </div>
                @error('name')
                    <div class="error-message" style="display: block;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <div class="input-icon">
                    <i data-feather="mail"></i>
                    <input id="email" 
                           class="form-input @error('email') error @enderror" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autocomplete="email"
                           placeholder="Masukkan email Anda">
                </div>
                @error('email')
                    <div class="error-message" style="display: block;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <div class="input-icon">
                    <i data-feather="lock"></i>
                    <input id="password" 
                           class="form-input @error('password') error @enderror"
                           type="password"
                           name="password"
                           required 
                           autocomplete="new-password"
                           placeholder="Masukkan password">
                    <i data-feather="eye" class="password-toggle" onclick="togglePassword('password')"></i>
                </div>
                @error('password')
                    <div class="error-message" style="display: block;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                <div class="input-icon">
                    <i data-feather="lock"></i>
                    <input id="password_confirmation" 
                           class="form-input @error('password_confirmation') error @enderror"
                           type="password"
                           name="password_confirmation"
                           required 
                           autocomplete="new-password"
                           placeholder="Konfirmasi password">
                    <i data-feather="eye" class="password-toggle" onclick="togglePassword('password_confirmation')"></i>
                </div>
                @error('password_confirmation')
                    <div class="error-message" style="display: block;">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-primary">
                Daftar
            </button>

            <div class="divider">
                <span>atau</span>
            </div>

        </form>

        <div class="auth-footer">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
        </div>
    </div>
</div>
@endsection