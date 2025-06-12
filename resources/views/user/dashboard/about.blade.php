@extends('layouts.app')

@section('title', 'Tentang Kami - CameraHub')

@section('content')
    <!-- About Hero Section -->
    <section class="hero" id="about">
        <div class="hero-content">
            <div class="hero-text">
                <h1><span>Tentang</span> CameraHub</h1>
                <p>CameraHub adalah marketplace kamera dan aksesoris fotografi terlengkap yang didedikasikan untuk membantu setiap orang menemukan peralatan terbaik untuk hobi dan profesi fotografi mereka.</p>
                <div class="hero-buttons">
                    <a href="{{ url('/') }}" class="btn-primary">
                        <i data-feather="home"></i>
                        Kembali ke Beranda
                    </a>
                    <a href="#team" class="btn-secondary">
                        <i data-feather="users"></i>
                        Tim Kami
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <div class="camera-showcase">
                    <div class="camera-grid">
                        <div class="camera-item">
                            <div class="camera-icon">
                                <i data-feather="heart"></i>
                            </div>
                            <h4>Komunitas</h4>
                            <p>Ribuan fotografer aktif</p>
                        </div>
                        <div class="camera-item">
                            <div class="camera-icon">
                                <i data-feather="star"></i>
                            </div>
                            <h4>Penghargaan</h4>
                            <p>Marketplace terpercaya 2025</p>
                        </div>
                        <div class="camera-item">
                            <div class="camera-icon">
                                <i data-feather="target"></i>
                            </div>
                            <h4>Visi</h4>
                            <p>Membantu semua orang jadi fotografer handal</p>
                        </div>
                        <div class="camera-item">
                            <div class="camera-icon">
                                <i data-feather="trending-up"></i>
                            </div>
                            <h4>Fokus</h4>
                            <p>Inovasi & teknologi fotografi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Misi & Nilai Section -->
    <section class="features">
        <div class="features-container">
            <h2 class="section-title">Misi & Nilai Kami</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i data-feather="target"></i>
                    </div>
                    <h3>Misi</h3>
                    <p>Menyediakan akses mudah dan terpercaya ke peralatan fotografi berkualitas dengan pelayanan terbaik.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i data-feather="smile"></i>
                    </div>
                    <h3>Kepercayaan</h3>
                    <p>Menjaga transparansi dan kepuasan pelanggan melalui produk original dan layanan jujur.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i data-feather="activity"></i>
                    </div>
                    <h3>Inovasi</h3>
                    <p>Terus mengembangkan fitur dan program untuk mendukung ekosistem fotografi di Indonesia.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Join Section -->
    <section class="cta-section" id="team">
        <div class="cta-content">
            <h2>Bergabung dengan Perjalanan Kami</h2>
            <p>CameraHub bukan hanya tempat jual beli, tetapi tempat belajar, berkembang, dan berkomunitas. Ayo tumbuh bersama kami!</p>
            <a href="{{ url('/register') }}" class="btn-primary">
                <i data-feather="user-plus"></i>
                Daftar Sekarang
            </a>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    feather.replace();
</script>
@endpush
