
@extends('layouts.app')

@section('title', 'Kategori Kamera - CameraHub')

@section('content')
    
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
            background: #f8fafc;
        }
        
        /* Navigation */
      
        
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 4rem 0;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="25" cy="25" r="2" fill="rgba(255,255,255,0.1)"><animate attributeName="r" values="2;8;2" dur="4s" repeatCount="indefinite"/></circle><circle cx="75" cy="75" r="3" fill="rgba(255,255,255,0.1)"><animate attributeName="r" values="3;12;3" dur="6s" repeatCount="indefinite"/></circle></svg>') repeat;
            animation: float 15s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }
        
        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }
        
        /* Search Bar */
        .search-container {
            max-width: 600px;
            margin: 0 auto;
            position: relative;
        }
        
        .search-bar {
            width: 100%;
            padding: 1rem 1.5rem;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            outline: none;
        }
        
        .search-bar::placeholder {
            color: #666;
        }
        
        .search-btn {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, #ffd700, #ffed4e);
            border: none;
            border-radius: 50px;
            padding: 0.7rem 1.5rem;
            color: #333;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .search-btn:hover {
            transform: translateY(-50%) scale(1.05);
        }
        
        /* Breadcrumb */
        .breadcrumb {
            background: white;
            padding: 1rem 0;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .breadcrumb-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .breadcrumb nav {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }
        
        .breadcrumb a {
            color: #667eea;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .breadcrumb a:hover {
            color: #4f46e5;
        }
        
        .breadcrumb span {
            color: #6b7280;
        }
        
        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 2rem;
        }
        
        /* Filter Bar */
        .filter-bar {
            background: white;
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .filter-left {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .filter-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .filter-select {
            padding: 0.5rem 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 25px;
            background: white;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .filter-select:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .results-count {
            color: #6b7280;
            font-weight: 500;
        }
        
        .view-toggle {
            display: flex;
            background: #f3f4f6;
            border-radius: 8px;
            padding: 4px;
        }
        
        .view-btn {
            padding: 0.5rem;
            border: none;
            background: transparent;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            color: #6b7280;
        }
        
        .view-btn.active {
            background: white;
            color: #667eea;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        /* Categories Grid */
        .categories-section {
            margin-bottom: 3rem;
        }
        
        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .category-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }
        
        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .category-image {
            height: 200px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .category-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.2)"/><circle cx="80" cy="80" r="3" fill="rgba(255,255,255,0.1)"/><circle cx="60" cy="30" r="1" fill="rgba(255,255,255,0.3)"/></svg>') repeat;
            animation: sparkle 10s linear infinite;
        }
        
        @keyframes sparkle {
            0% { transform: translateX(0); }
            100% { transform: translateX(100px); }
        }
        
        .category-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: white;
            z-index: 2;
            position: relative;
        }
        
        .category-content {
            padding: 1.5rem;
        }
        
        .category-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
        }
        
        .category-description {
            color: #6b7280;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        
        .category-stats {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .product-count {
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            color: #374151;
        }
        
        .category-arrow {
            color: #667eea;
            transition: transform 0.3s ease;
        }
        
        .category-card:hover .category-arrow {
            transform: translateX(4px);
        }
        
        /* Popular Brands Section */
        .brands-section {
            background: white;
            padding: 3rem 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            margin-bottom: 3rem;
        }
        
        .brands-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .brand-item {
            text-align: center;
            padding: 1.5rem;
            border: 2px solid #f3f4f6;
            border-radius: 16px;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .brand-item:hover {
            border-color: #667eea;
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.15);
        }
        
        .brand-logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-weight: bold;
            color: #374151;
            font-size: 1.2rem;
        }
        
        .brand-name {
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
        }
        
        .brand-count {
            font-size: 0.8rem;
            color: #6b7280;
        }
        
        /* Featured Products Preview */
        .featured-section {
            margin-bottom: 3rem;
        }
        
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        
        .product-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        
        .product-image {
            height: 180px;
            background: linear-gradient(45deg, #f3f4f6, #e5e7eb);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #9ca3af;
        }
        
        .product-info {
            padding: 1rem;
        }
        
        .product-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        
        .product-price {
            color: #667eea;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .product-rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.8rem;
            color: #6b7280;
        }
        
        .stars {
            color: #fbbf24;
        }
        
        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 4rem 2rem;
            border-radius: 20px;
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
        
        .cta-content {
            position: relative;
            z-index: 2;
        }
        
        .cta-content h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .cta-content p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.9;
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
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .filter-bar {
                flex-direction: column;
                align-items: stretch;
            }
            
            .filter-left {
                justify-content: center;
            }
            
            .categories-grid {
                grid-template-columns: 1fr;
            }
            
            .brands-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .cta-content h2 {
                font-size: 1.8rem;
            }
        }
    </style>

    <section class="hero">
        <div class="hero-content">
            <h1>Jelajahi Kategori Kamera</h1>
            <p>Temukan kamera yang sesuai dengan kebutuhan fotografi Anda dari berbagai kategori terlengkap</p>
            <div class="search-container">
                <input type="text" class="search-bar" placeholder="Cari kamera, lensa, atau aksesoris...">
                <button class="search-btn">
                    <i data-feather="search"></i>
                    Cari
                </button>
            </div>
        </div>
    </section>

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <div class="breadcrumb-container">
            <nav>
                <a href="#">Beranda</a>
                <i data-feather="chevron-right"></i>
                <span>Kategori</span>
            </nav>
        </div>
    </section>

   
    <main class="main-content">
        <!-- Filter Bar -->
        <div class="filter-bar">
            <div class="filter-left">
                <div class="filter-item">
                    <label>Urutkan:</label>
                    <select class="filter-select">
                        <option>Terpopuler</option>
                        <option>Terbaru</option>
                        <option>Harga Terendah</option>
                        <option>Harga Tertinggi</option>
                        <option>Rating Tertinggi</option>
                    </select>
                </div>
                <div class="filter-item">
                    <label>Harga:</label>
                    <select class="filter-select">
                        <option>Semua Harga</option>
                        <option>< Rp 5 Juta</option>
                        <option>Rp 5-15 Juta</option>
                        <option>Rp 15-30 Juta</option>
                        <option>> Rp 30 Juta</option>
                    </select>
                </div>
                <div class="results-count">
                    Menampilkan 24 kategori
                </div>
            </div>
            <div class="view-toggle">
                <button class="view-btn active">
                    <i data-feather="grid"></i>
                </button>
                <button class="view-btn">
                    <i data-feather="list"></i>
                </button>
            </div>
        </div>

        <!-- Categories Section -->
        <section class="categories-section">
            <h2 class="section-title">Kategori Kamera</h2>
            <div class="categories-grid">
                <div class="category-card">
                    <div class="category-image">
                        <div class="category-icon">
                            <i data-feather="camera"></i>
                        </div>
                    </div>
                    <div class="category-content">
                        <h3 class="category-title">DSLR Camera</h3>
                        <p class="category-description">Kamera profesional dengan kualitas gambar terbaik untuk fotografi serius</p>
                        <div class="category-stats">
                            <span class="product-count">2,150+ Produk</span>
                            <i data-feather="arrow-right" class="category-arrow"></i>
                        </div>
                    </div>
                </div>

                <div class="category-card">
                    <div class="category-image">
                        <div class="category-icon">
                            <i data-feather="video"></i>
                        </div>
                    </div>
                    <div class="category-content">
                        <h3 class="category-title">Mirrorless Camera</h3>
                        <p class="category-description">Kamera compact dengan teknologi terdepan dan kemudahan penggunaan</p>
                        <div class="category-stats">
                            <span class="product-count">1,890+ Produk</span>
                            <i data-feather="arrow-right" class="category-arrow"></i>
                        </div>
                    </div>
                </div>

                <div class="category-card">
                    <div class="category-image">
                        <div class="category-icon">
                            <i data-feather="zap"></i>
                        </div>
                    </div>
                    <div class="category-content">
                        <h3 class="category-title">Action Camera</h3>
                        <p class="category-description">Kamera tangguh untuk petualangan dan aktivitas ekstrem</p>
                        <div class="category-stats">
                            <span class="product-count">675+ Produk</span>
                            <i data-feather="arrow-right" class="category-arrow"></i>
                        </div>
                    </div>
                </div>

                <div class="category-card">
                    <div class="category-image">
                        <div class="category-icon">
                            <i data-feather="aperture"></i>
                        </div>
                    </div>
                    <div class="category-content">
                        <h3 class="category-title">Lensa Kamera</h3>
                        <p class="category-description">Koleksi lensa lengkap untuk semua kebutuhan fotografi</p>
                        <div class="category-stats">
                            <span class="product-count">3,240+ Produk</span>
                            <i data-feather="arrow-right" class="category-arrow"></i>
                        </div>
                    </div>
                </div>

                <div class="category-card">
                    <div class="category-image">
                        <div class="category-icon">
                            <i data-feather="smartphone"></i>
                        </div>
                    </div>
                    <div class="category-content">
                        <h3 class="category-title">Instant Camera</h3>
                        <p class="category-description">Kamera polaroid untuk momen spontan dan kenangan instant</p>
                        <div class="category-stats">
                            <span class="product-count">320+ Produk</span>
                            <i data-feather="arrow-right" class="category-arrow"></i>
                        </div>
                    </div>
                </div>

                <div class="category-card">
                    <div class="category-image">
                        <div class="category-icon">
                            <i data-feather="package"></i>
                        </div>
                    </div>
                    <div class="category-content">
                        <h3 class="category-title">Aksesoris</h3>
                        <p class="category-description">Tripod, flash, tas kamera, dan aksesoris pendukung lainnya</p>
                        <div class="category-stats">
                            <span class="product-count">4,580+ Produk</span>
                            <i data-feather="arrow-right" class="category-arrow"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Popular Brands -->
        <section class="brands-section">
            <h2 class="section-title">Brand Populer</h2>
            <div class="brands-grid">
                <div class="brand-item">
                    <div class="brand-logo">C</div>
                    <div class="brand-name">Canon</div>
                    <div class="brand-count">1,250+ Produk</div>
                </div>
                <div class="brand-item">
                    <div class="brand-logo">N</div>
                    <div class="brand-name">Nikon</div>
                    <div class="brand-count">980+ Produk</div>
                </div>
                <div class="brand-item">
                    <div class="brand-logo">S</div>
                    <div class="brand-name">Sony</div>
                    <div class="brand-count">1,150+ Produk</div>
                </div>
                <div class="brand-item">
                    <div class="brand-logo">F</div>
                    <div class="brand-name">Fujifilm</div>
                    <div class="brand-count">620+ Produk</div>
                </div>
                <div class="brand-item">
                    <div class="brand-logo">O</div>
                    <div class="brand-name">Olympus</div>
                    <div class="brand-count">450+ Produk</div>
                </div>
                <div class="brand-item">
                    <div class="brand-logo">P</div>
                    <div class="brand-name">Panasonic</div>
                    <div class="brand-count">380+ Produk</div>
                </div>
            </div>
        </section>

        <!-- Featured Products -->
        <section class="featured-section">
            <h2 class="section-title">Produk Unggulan</h2>
            <div class="products-grid">
                <div class="product-card">
                    <div class="product-image">
                        <i data-feather="camera"></i>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">Canon EOS R6 Mark II Body</h3>
                        <div class="product-price">Rp 42.999.000</div>
                        <div class="product-rating">
                            <div class="stars">★★★★★</div>
                            <span>(128 ulasan)</span>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                     <div class="product-image">
                        <i data-feather="video"></i>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">Sony A7 IV Body Only</h3>
                        <div class="product-price">Rp 38.500.000</div>
                        <div class="product-rating">
                            <div class="stars">★★★★☆</div>
                            <span>(96 ulasan)</span>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <i data-feather="zap"></i>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">GoPro HERO11 Black</h3>
                        <div class="product-price">Rp 7.999.000</div>
                        <div class="product-rating">
                            <div class="stars">★★★★★</div>
                            <span>(215 ulasan)</span>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <i data-feather="aperture"></i>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">Canon RF 24-70mm f/2.8L</h3>
                        <div class="product-price">Rp 32.750.000</div>
                        <div class="product-rating">
                            <div class="stars">★★★★★</div>
                            <span>(75 ulasan)</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="cta-content">
                <h2>Siap Memulai Perjalanan Fotografi Anda?</h2>
                <p>Bergabunglah dengan komunitas kami dan dapatkan akses ke penawaran eksklusif, tutorial, dan tips fotografi terbaik</p>
                <a href="#" class="btn-primary">
                    Daftar Sekarang
                    <i data-feather="arrow-right"></i>
                </a>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
<script>
    feather.replace();

    // Animasi untuk icon kategori
    document.querySelectorAll('.category-card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            const icon = card.querySelector('.category-icon i');
            icon.style.animation = 'bounce 0.5s ease';
            setTimeout(() => {
                icon.style.animation = '';
            }, 500);
        });
    });

    // Toggle view
    const viewBtns = document.querySelectorAll('.view-btn');
    viewBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            viewBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const grid = document.querySelector('.categories-grid');
            if (btn.querySelector('i').getAttribute('data-feather') === 'list') {
                grid.style.gridTemplateColumns = '1fr';
            } else {
                grid.style.gridTemplateColumns = 'repeat(auto-fit, minmax(280px, 1fr))';
            }
        });
    });
</script>
@endpush