@extends('layouts.admin')

@section('content')
    <!-- Main Content -->
    <div class="admin-container">
        @include('sidebar')
        @include('header')

        <!-- Content Area -->
        <main class="admin-content">
            <!-- Konten dashboard di sini -->
        </main>
    </div>
@endsection

@push('styles')
<style>
/* Sidebar Styles */
.admin-sidebar {
    width: 280px;
    background: white;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
    z-index: 100;
}
.sidebar-header {
    padding: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid #e2e8f0;
}
.logo {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    color: #667eea;
    font-weight: 700;
    font-size: 1.25rem;
}
.logo i {
    width: 24px;
    height: 24px;
}
.logo small {
    font-size: 0.75rem;
    font-weight: 400;
    color: #a0aec0;
    display: block;
    margin-top: 0.25rem;
}
.sidebar-menu {
    flex: 1;
    padding: 1.5rem;
    overflow-y: auto;
}
.sidebar-menu ul {
    list-style: none;
}
.sidebar-menu li {
    margin-bottom: 0.5rem;
}
.sidebar-menu a {
    display: flex;
    align-items: center;
    padding: 0.75rem 1rem;
    color: #2d3748;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.3s ease;
    position: relative;
}
.sidebar-menu a:hover,
.sidebar-menu a.active {
    background: rgba(102, 126, 234, 0.1);
    color: #667eea;
    font-weight: 500;
}
.sidebar-menu a i {
    width: 20px;
    height: 20px;
    margin-right: 0.75rem;
}
.sidebar-menu .badge {
    margin-left: auto;
    background: #667eea;
    color: white;
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    border-radius: 50px;
}
.sidebar-footer {
    padding: 1.5rem;
    border-top: 1px solid #e2e8f0;
}
.user-profile {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}
.avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    overflow: hidden;
}
.avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.user-info .name {
    font-weight: 600;
    font-size: 0.9rem;
}
.user-info .role {
    font-size: 0.75rem;
    color: #a0aec0;
}
.logout {
    color: #a0aec0;
    transition: all 0.3s ease;
}
.logout:hover {
    color: #f56565;
}

/* Header Styles */
.admin-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 2rem;
}
.admin-header h1 {
    font-size: 1.75rem;
    font-weight: 700;
    color: #2d3748;
}
.header-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
}
.search-box {
    position: relative;
    width: 250px;
}
.search-box i {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #a0aec0;
}
.search-box input {
    width: 100%;
    padding: 0.75rem 1rem 0.75rem 2.5rem;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    background: white;
    transition: all 0.3s ease;
}
.search-box input:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
}
.notifications {
    position: relative;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: white;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
}
.notifications:hover {
    background: rgba(102, 126, 234, 0.1);
    color: #667eea;
}
.notifications .badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: #f56565;
    color: white;
    font-size: 0.6rem;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
@endpush
