@extends('layouts.app')

@section('title', 'Edit Profil')

@push('styles')
<style>
.profile-section {
    background: var(--white, #fff);
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    padding: 2rem;
    margin-bottom: 2rem;
}

.profile-section .section-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--dark, #2d3748);
    margin-bottom: 1.5rem;
}

.profile-section form label {
    font-weight: 500;
    color: var(--dark, #2d3748);
}

.profile-section form input,
.profile-section form select,
.profile-section form textarea {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid var(--gray, #e2e8f0);
    border-radius: 8px;
    margin-bottom: 1rem;
    font-size: 1rem;
    background: var(--light, #f7fafc);
    color: var(--dark, #2d3748);
    transition: border-color 0.2s;
}

.profile-section form input:focus,
.profile-section form select:focus,
.profile-section form textarea:focus {
    border-color: var(--primary, #667eea);
    outline: none;
}

.profile-section .btn-primary {
    background: var(--primary, #667eea);
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 0.75rem 2rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
}

.profile-section .btn-primary:hover {
    background: #5a67d8;
}

button,
input[type="submit"] {
    background: var(--primary, #667eea);
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 0.75rem 2rem;
    font-weight: 600;
    cursor: pointer;
    font-size: 1rem;
    transition: background 0.2s, box-shadow 0.2s;
    box-shadow: 0 2px 8px rgba(102, 126, 234, 0.08);
    margin-top: 0.5rem;
    display: inline-block;
}

button:hover,
input[type="submit"]:hover {
    background: #5a67d8;
    box-shadow: 0 4px 16px rgba(102, 126, 234, 0.15);
}


</style>
@endpush

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="profile-section">
                <div class="section-title">Informasi Profil</div>
                @include('profile.partials.update-profile-information-form')
            </div>
            <div class="profile-section">
                <div class="section-title">Ubah Password</div>
                @include('profile.partials.update-password-form')
            </div>
            <div class="profile-section">
                <div class="section-title">Hapus Akun</div>
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection