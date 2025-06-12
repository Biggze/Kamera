
@extends('layouts.app')

@section('title', 'CameraHub - Marketplace Kamera Terlengkap')

@section('content')
    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Temukan Kamera <span>Impian</span> Anda</h1>
                <p>Marketplace kamera terlengkap dengan koleksi DSLR, Mirrorless, Action Camera, dan aksesoris fotografi berkualitas tinggi dari brand terpercaya.</p>
                <div class="hero-buttons">
                    <a href="#" class="btn-primary">
                        <i data-feather="search"></i>
                        Jelajahi Produk
                    </a>
                    <a href="#" class="btn-secondary">
                        <i data-feather="play-circle"></i>
                        Lihat Demo
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <div class="camera-showcase">
                    <div class="camera-grid">
                        <div class="camera-item">
                            <div class="camera-icon">
                                <i data-feather="camera"></i>
                            </div>
                            <h4>DSLR</h4>
                            <p>2000+ Produk</p>
                        </div>
                        <div class="camera-item">
                            <div class="camera-icon">
                                <i data-feather="video"></i>
                            </div>
                            <h4>Mirrorless</h4>
                            <p>1500+ Produk</p>
                        </div>
                        <div class="camera-item">
                            <div class="camera-icon">
                                <i data-feather="zap"></i>
                            </div>
                            <h4>Action Cam</h4>
                            <p>800+ Produk</p>
                        </div>
                        <div class="camera-item">
                            <div class="camera-icon">
                                <i data-feather="package"></i>
                            </div>
                            <h4>Aksesoris</h4>
                            <p>3000+ Produk</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="stats-container">
            <div class="stat-item">
                <div class="stat-number">50K+</div>
                <p>Pelanggan Puas</p>
            </div>
            <div class="stat-item">
                <div class="stat-number">7K+</div>
                <p>Produk Tersedia</p>
            </div>
            <div class="stat-item">
                <div class="stat-number">100+</div>
                <p>Brand Terpercaya</p>
            </div>
            <div class="stat-item">
                <div class="stat-number">24/7</div>
                <p>Customer Support</p>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="features-container">
            <h2 class="section-title">Mengapa Memilih CameraHub?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i data-feather="shield-check"></i>
                    </div>
                    <h3>Produk Original</h3>
                    <p>Semua produk dijamin 100% original dengan garansi resmi dari distributor dan service center terpercaya.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i data-feather="truck"></i>
                    </div>
                    <h3>Pengiriman Cepat</h3>
                    <p>Pengiriman same day untuk area Jakarta, dan 1-3 hari ke seluruh Indonesia dengan packaging aman.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i data-feather="credit-card"></i>
                    </div>
                    <h3>Pembayaran Fleksibel</h3>
                    <p>Berbagai pilihan pembayaran: transfer bank, e-wallet, kartu kredit, dan cicilan 0% hingga 24 bulan.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i data-feather="users"></i>
                    </div>
                    <h3>Konsultasi Expert</h3>
                    <p>Tim ahli fotografi siap membantu Anda memilih kamera yang sesuai dengan kebutuhan dan budget.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i data-feather="refresh-cw"></i>
                    </div>
                    <h3>Trade-In Program</h3>
                    <p>Tukar tambah kamera lama Anda dengan yang baru, dapatkan harga terbaik untuk upgrade peralatan.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i data-feather="award"></i>
                    </div>
                    <h3>Workshop Gratis</h3>
                    <p>Akses gratis ke workshop fotografi, tips & tricks, dan komunitas fotografer untuk mengasah skill.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-content">
            <h2>Siap Mulai Petualangan Fotografi?</h2>
            <p>Bergabunglah dengan ribuan fotografer yang telah mempercayai CameraHub sebagai partner terbaik untuk kebutuhan fotografi mereka.</p>
            <a href="#" class="btn-primary">
                <i data-feather="arrow-right"></i>
                Mulai Belanja Sekarang
            </a>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    feather.replace();
</script>


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }
        
        /* Animated background */
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><radialGradient id="g" cx="50%" cy="50%" r="50%"><stop offset="0%" style="stop-color:rgba(255,255,255,0.1)"/><stop offset="100%" style="stop-color:rgba(255,255,255,0)"/></radialGradient></defs><circle cx="25" cy="25" r="20" fill="url(%23g)"><animate attributeName="cy" values="25;75;25" dur="4s" repeatCount="indefinite"/></circle><circle cx="75" cy="75" r="15" fill="url(%23g)"><animate attributeName="cx" values="75;25;75" dur="6s" repeatCount="indefinite"/></circle></svg>') repeat;
            animation: float 20s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        /* Navigation */
       
        /* Hero Content */
        .hero-content {
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
        
        .hero-text h1 {
            font-size: 3.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
            line-height: 1.2;
            animation: slideInLeft 1s ease-out;
        }
        
        .hero-text h1 span {
            background: linear-gradient(45deg, #ffd700, #ffed4e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .hero-text p {
            font-size: 1.2rem;
            color: rgba(255,255,255,0.9);
            margin-bottom: 2rem;
            animation: slideInLeft 1s ease-out 0.2s both;
        }
        
        .hero-buttons {
            display: flex;
            gap: 1rem;
            animation: slideInLeft 1s ease-out 0.4s both;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #ffd700, #ffed4e);
            color: #333;
            padding: 1rem 2rem;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(255, 215, 0, 0.4);
        }
        
        .btn-secondary {
            background: transparent;
            color: white;
            padding: 1rem 2rem;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-secondary:hover {
            background: rgba(255,255,255,0.1);
            border-color: rgba(255,255,255,0.6);
            transform: translateY(-2px);
        }
        
        /* Hero Image */
        .hero-image {
            position: relative;
            animation: slideInRight 1s ease-out;
        }
        
        .camera-showcase {
            position: relative;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            border: 1px solid rgba(255,255,255,0.2);
        }
        
        .camera-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1rem;
        }
        
        .camera-item {
            background: rgba(255,255,255,0.9);
            padding: 1rem;
            border-radius: 15px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .camera-item:hover {
            transform: scale(1.05);
        }
        
        .camera-icon {
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
        
        /* Stats Section */
        .stats {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            padding: 4rem 0;
            color: white;
        }
        
        .stats-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: center;
        }
        
        .stat-item {
            padding: 2rem;
            border-radius: 15px;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease;
        }
        
        .stat-item:hover {
            transform: translateY(-10px);
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            background: linear-gradient(45deg, #ffd700, #ffed4e);
        }
@keyframes dropdownSlide {
    from {
        opacity: 0;
        transform: translateY(-10px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.dropdown-content.show {
    display: block;
}

.dropdown-header {
    padding: 1.5rem 1.2rem 1rem;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.user-avatar-large {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
}

.user-info {
    flex: 1;
    min-width: 0;
}

.user-full-name {
    font-weight: 600;
    font-size: 1rem;
    margin: 0 0 0.2rem 0;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.user-email {
    font-size: 0.8rem;
    opacity: 0.9;
    margin: 0;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.dropdown-divider {
    height: 1px;
    background: #e5e7eb;
    margin: 0.5rem 0;
}

.dropdown-item {
    color: #374151;
    padding: 0.8rem 1.2rem;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 0.8rem;
    background: none;
    border: none;
    width: 100%;
    text-align: left;
    font: inherit;
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 0.9rem;
}

.dropdown-item:hover {
    background: linear-gradient(135deg, #f8fafc, #f1f5f9);
    color: #667eea;
    transform: translateX(4px);
}

.dropdown-item i {
    width: 18px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.dropdown-form {
    margin: 0;
}

.logout-btn {
    color: #dc2626 !important;
    border-top: 1px solid #e5e7eb;
}

.logout-btn:hover {
    background: linear-gradient(135deg, #fef2f2, #fee2e2) !important;
    color: #dc2626 !important;
}

/* Click outside to close */
.dropdown-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: none;
}

.dropdown-overlay.show {
    display: block;
}
        
        /* Features Section */
        .features {
            padding: 6rem 0;
            background: #f8fafc;
        }
        
        .features-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 3rem;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .feature-icon {
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
        
        .feature-card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #333;
        }
        
        .feature-card p {
            color: #666;
            line-height: 1.6;
        }
        
        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 6rem 0;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"><animate attributeName="r" values="2;10;2" dur="3s" repeatCount="indefinite"/></circle></svg>') repeat;
            animation: sparkle 10s linear infinite;
        }
        
        @keyframes sparkle {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .cta-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }
        
        .cta-content h2 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .cta-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        /* Footer */
       
        
        /* Animations */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 2rem;
            }
            
            .hero-text h1 {
                font-size: 2.5rem;
            }
            
            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .cta-content h2 {
                font-size: 2rem;
            }
        }
    </style>

@endpush