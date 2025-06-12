@extends('layouts.app')

@section('title', 'Tentang Kami - CameraHub')

@section('content')
<!-- Tentang Kami Hero Section -->
<section class="about-hero">
    <div class="about-hero-content">
        <div class="about-hero-text">
            <h1><span>Tentang</span> CameraHub</h1>
            <p>CameraHub adalah marketplace kamera dan aksesoris fotografi terlengkap yang didedikasikan untuk membantu setiap orang menemukan peralatan terbaik untuk hobi dan profesi fotografi mereka.</p>
            <div class="about-hero-buttons">
                <a href="{{ url('/') }}" class="about-btn-primary">
                    <i data-feather="home"></i> Kembali ke Beranda
                </a>
                <a href="#tim" class="about-btn-secondary">
                    <i data-feather="users"></i> Tim Kami
                </a>
            </div>
        </div>
        <div class="about-hero-image">
            <div class="about-camera-showcase">
                <div class="about-camera-grid">
                    <div class="about-camera-item">
                        <div class="about-camera-icon"><i data-feather="heart"></i></div>
                        <h4>Komunitas</h4>
                        <p>Ribuan fotografer aktif</p>
                    </div>
                    <div class="about-camera-item">
                        <div class="about-camera-icon"><i data-feather="star"></i></div>
                        <h4>Penghargaan</h4>
                        <p>Marketplace terpercaya 2025</p>
                    </div>
                    <div class="about-camera-item">
                        <div class="about-camera-icon"><i data-feather="target"></i></div>
                        <h4>Visi</h4>
                        <p>Fotografi untuk semua</p>
                    </div>
                    <div class="about-camera-item">
                        <div class="about-camera-icon"><i data-feather="trending-up"></i></div>
                        <h4>Fokus</h4>
                        <p>Teknologi dan inovasi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Misi dan Nilai -->
<section class="about-features">
    <div class="about-features-container">
        <h2 class="about-section-title">Misi & Nilai Kami</h2>
        <div class="about-features-grid">
            <div class="about-feature-card">
                <div class="about-feature-icon"><i data-feather="target"></i></div>
                <h3>Misi</h3>
                <p>Menyediakan akses mudah dan terpercaya ke peralatan fotografi terbaik.</p>
            </div>
            <div class="about-feature-card">
                <div class="about-feature-icon"><i data-feather="smile"></i></div>
                <h3>Kepercayaan</h3>
                <p>Menjaga transparansi dan kepuasan pelanggan.</p>
            </div>
            <div class="about-feature-card">
                <div class="about-feature-icon"><i data-feather="activity"></i></div>
                <h3>Inovasi</h3>
                <p>Selalu berkembang dalam layanan dan teknologi.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="about-cta-section" id="tim">
    <div class="about-cta-content">
        <h2>Mulailah Cerita Fotografi Terbaikmu di CameraHub</h2>
        <p>Temukan gear yang sempurna, upgrade kamera lamamu, dan jadilah bagian dari komunitas fotografer yang inspiratif dan suportif.</p>
        <div class="about-hero-buttons" style="justify-content: center;">
            <a href="{{ route('user.brand') }}" class="about-btn-primary">
                <i data-feather="shopping-bag"></i> Lihat Katalog Produk
            </a>
            <!-- <a href="{{ route('user.category') }}" class="about-btn-secondary">
                <i data-feather="calendar"></i> Kategori
            </a> -->
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>feather.replace();</script>

<style>
/* Hero */
.about-hero {
    min-height: 100vh;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    overflow: hidden;
    position: relative;
}
.about-hero-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
    position: relative;
    z-index: 2;
}
.about-hero-text h1 {
    font-size: 3.5rem;
    font-weight: 700;
    color: white;
    margin-bottom: 1rem;
    line-height: 1.2;
}
.about-hero-text h1 span {
    background: linear-gradient(45deg, #ffd700, #ffed4e);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.about-hero-text p {
    font-size: 1.2rem;
    color: rgba(255,255,255,0.9);
    margin-bottom: 2rem;
}
.about-hero-buttons {
    display: flex;
    gap: 1rem;
}
.about-btn-primary, .about-btn-secondary {
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1.1rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}
.about-btn-primary {
    background: linear-gradient(135deg, #ffd700, #ffed4e);
    color: #333;
}
.about-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(255, 215, 0, 0.4);
}
.about-btn-secondary {
    background: transparent;
    color: white;
    border: 2px solid rgba(255,255,255,0.3);
}
.about-btn-secondary:hover {
    background: rgba(255,255,255,0.1);
    border-color: rgba(255,255,255,0.6);
    transform: translateY(-2px);
}

/* Camera Grid */
.about-camera-showcase {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 2rem;
    border: 1px solid rgba(255,255,255,0.2);
}
.about-camera-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}
.about-camera-item {
    background: rgba(255,255,255,0.9);
    padding: 1rem;
    border-radius: 15px;
    text-align: center;
    transition: transform 0.3s ease;
}
.about-camera-item:hover {
    transform: scale(1.05);
}
.about-camera-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 0.5rem;
    color: white;
}

/* Features */
.about-features {
    padding: 6rem 0;
    background: #f8fafc;
}
.about-section-title {
    text-align: center;
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 3rem;
}
.about-features-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}
.about-features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}
.about-feature-card {
    background: white;
    padding: 2rem;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 1px solid #e2e8f0;
    transition: all 0.3s ease;
}
.about-feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}
.about-feature-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
    color: white;
}

/* CTA */
.about-cta-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 6rem 0;
    text-align: center;
    color: white;
    position: relative;
}
.about-cta-content {
    max-width: 800px;
    margin: 0 auto;
    padding: 0 2rem;
}
.about-cta-content h2 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
}
.about-cta-content p {
    font-size: 1.2rem;
    margin-bottom: 2rem;
    opacity: 0.9;
}

/* Responsive */
@media (max-width: 768px) {
    .about-hero-content {
        grid-template-columns: 1fr;
        text-align: center;
        gap: 2rem;
    }
    .about-hero-text h1 {
        font-size: 2.5rem;
    }
    .about-hero-buttons {
        flex-direction: column;
        align-items: center;
    }
    .about-cta-content h2 {
        font-size: 2rem;
    }
}
</style>
@endpush
