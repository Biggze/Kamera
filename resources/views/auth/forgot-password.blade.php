@extends('layouts.guest')

@section('title', 'Lupa Password - CameraHub')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="logo">
            <h1><i data-feather="lock"></i> Lupa Password</h1>
            <p>Masukkan email Anda untuk reset password</p>
        </div>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Lupa password? Masukkan email Anda dan kami akan mengirimkan link untuk reset password.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="auth-form">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label class="form-label" for="email">{{ __('Email') }}</label>
                <div class="input-icon">
                    <i data-feather="mail"></i>
                    <input id="email" 
                           class="form-control"
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus 
                           placeholder="Masukkan email Anda" />
                </div>
                @error('email')
                    <div class="error-message" style="display: block;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions" style="margin-top: 1.5rem;">
                <button type="submit" class="btn-primary w-full">
                    {{ __('Kirim Link Reset Password') }}
                </button>
            </div>
        </form>

        <div class="auth-footer" style="margin-top: 1.5rem;">
            <a href="{{ route('login') }}" class="btn btn-link">
                <i data-feather="arrow-left"></i> Kembali ke Login
            </a>
        </div>
    </div>
</div>
@endsection