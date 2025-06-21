@extends('layouts.app')

@section('title', 'Brand Kamera - CameraHub')

@section('content')
    <!-- Hero Section -->
    <section class="brand-hero" id="brands">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Brand <span>Kamera</span> Terbaik</h1>
                <p>Temukan koleksi lengkap produk dari brand-brand ternama dunia dengan kualitas terjamin dan garansi resmi.</p>
                <div class="search-container">
                    <input type="text" class="search-bar" placeholder="Cari brand kamera...">
                    <button class="search-btn">
                        <i data-feather="search"></i>
                        Cari
                    </button>
                </div>
            </div>
            <div class="hero-image">
                <div class="brand-showcase">
                    <div class="brand-logo-grid">
                        <div class="brand-logo-item" style="background: #D70000;">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/45/Canon_logo.svg/800px-Canon_logo.svg.png" alt="Canon">
                        </div>
                        <div class="brand-logo-item" style="background: #000;">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Nikon_logo.svg/800px-Nikon_logo.svg.png" alt="Nikon">
                        </div>
                        <div class="brand-logo-item" style="background: #000;">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Sony_logo_%28white%29.png/800px-Sony_logo_%28white%29.png" alt="Sony">
                        </div>
                        <div class="brand-logo-item" style="background: #ED1C24;">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Fujifilm_logo.svg/800px-Fujifilm_logo.svg.png" alt="Fujifilm">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <div class="breadcrumb-container">
            <nav>
                <a href="#">Beranda</a>
                <i data-feather="chevron-right"></i>
                <span>Brand</span>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Filter Bar -->
        <div class="filter-bar">
            <div class="filter-left">
                <div class="filter-item">
                    <label>Urutkan:</label>
                    <select class="filter-select">
                        <option>Populer</option>
                        <option>A-Z</option>
                        <option>Z-A</option>
                        <option>Produk Terbanyak</option>
                    </select>
                </div>
                <div class="results-count">
                    Menampilkan 24 brand
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

        <!-- Brands Section -->
        <section class="brands-section">
            <div class="brands-grid">
                <!-- Brand Card 1 -->
                <div class="brand-card">
                    <div class="brand-header" style="background: linear-gradient(135deg, #000000, #333333);">
                        <div class="product-image">
                            <img src="{{ asset('img/canon.jpg') }}" alt="Canon">
                        </div>
                    </div>
                    <div class="brand-content">
                        <h3 class="brand-title">Canon</h3>
                        <p class="brand-description">Pionir kamera DSLR dengan teknologi canggih dan lensa berkualitas tinggi.</p>
                        <div class="brand-stats">
                            <span class="product-count">1,250+ Produk</span>
                            <a href="#" class="brand-link">
                                Lihat Produk
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Brand Card 2 -->
                <div class="brand-card">
                    <div class="brand-header" style="background: linear-gradient(135deg, #000000, #333333);">
                        <div class="product-image">
                            <img src="{{ asset('img/nicon.jpg') }}" alt="Nikon">
                        </div>
                    </div>
                    <div class="brand-content">
                        <h3 class="brand-title">Nikon</h3>
                        <p class="brand-description">Inovator dalam teknologi optik dengan sensor beresolusi tinggi.</p>
                        <div class="brand-stats">
                            <span class="product-count">980+ Produk</span>
                            <a href="{{ route('user.brand.detail') }}" class="brand-link">
                                Lihat Produk
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Brand Card 3 -->
                <div class="brand-card">
                    <div class="brand-header" style="background: linear-gradient(135deg, #000000, #333333);">
                        <div class="product-image">
                            <img src="{{ asset('img/Sony.jpg') }}" alt="Sony">
                        </div>
                    </div>
                    <div class="brand-content">
                        <h3 class="brand-title">Sony</h3>
                        <p class="brand-description">Pemimpin pasar mirrorless dengan teknologi sensor terdepan.</p>
                        <div class="brand-stats">
                            <span class="product-count">1,150+ Produk</span>
                            <a href="#" class="brand-link">
                                Lihat Produk
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Brand Card 4 -->
                <div class="brand-card">
                    <div class="brand-header" style="background: linear-gradient(135deg, #000000, #333333);">
                        <div class="product-image">
                            <img src="{{ asset('img/Fujifilm.jpg') }}" alt="Fujifilm">
                        </div>
                    </div>
                    <div class="brand-content">
                        <h3 class="brand-title">Fujifilm</h3>
                        <p class="brand-description">Spesialis kamera retro dengan kualitas warna legendaris.</p>
                        <div class="brand-stats">
                            <span class="product-count">620+ Produk</span>
                            <a href="#" class="brand-link">
                                Lihat Produk
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Brand Card 5 -->
                <div class="brand-card">
                    <div class="brand-header" style="background: linear-gradient(135deg, #000000, #333333);">
                        <div class="product-image">
                            <img src="{{ asset('img/olympus.jpg') }}" alt="Olympus">
                        </div>
                    </div>
                    <div class="brand-content">
                        <h3 class="brand-title">Olympus</h3>
                        <p class="brand-description">Pakar sistem Micro Four Thirds dengan stabilisasi gambar terbaik.</p>
                        <div class="brand-stats">
                            <span class="product-count">450+ Produk</span>
                            <a href="#" class="brand-link">
                                Lihat Produk
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Brand Card 6 -->
                <div class="brand-card">
                    <div class="brand-header" style="background: linear-gradient(135deg, #000000, #333333);">
                        <div class="product-image">
                            <img src="{{ asset('img/panasonic.jpg') }}" alt="Panasonic">
                        </div>
                    </div>
                    <div class="brand-content">
                        <h3 class="brand-title">Panasonic</h3>
                        <p class="brand-description">Kamera hybrid unggulan untuk fotografi dan videografi profesional.</p>
                        <div class="brand-stats">
                            <span class="product-count">380+ Produk</span>
                            <a href="#" class="brand-link">
                                Lihat Produk
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Brand Card 7 -->
                <div class="brand-card">
                    <div class="brand-header" style="background: linear-gradient(135deg, #000000, #333333);">
                        <div class="product-image">
                            <img src="{{ asset('img/leica.jpg') }}" alt="Leica">
                        </div>
                    </div>
                    <div class="brand-content">
                        <h3 class="brand-title">Leica</h3>
                        <p class="brand-description">Merek premium dengan kualitas optik tak tertandingi.</p>
                        <div class="brand-stats">
                            <span class="product-count">280+ Produk</span>
                            <a href="#" class="brand-link">
                                Lihat Produk
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Brand Card 8 -->
                <div class="brand-card">
                    <div class="brand-header" style="background: linear-gradient(135deg, #000000, #333333);">
                        <div class="product-image">
                            <img src="{{ asset('img/gopro.jpg') }}" alt="GoPro">
                        </div>
                    </div>
                    <div class="brand-content">
                        <h3 class="brand-title">GoPro</h3>
                        <p class="brand-description">Spesialis kamera aksi untuk petualangan ekstrem.</p>
                        <div class="brand-stats">
                            <span class="product-count">175+ Produk</span>
                            <a href="#" class="brand-link">
                                Lihat Produk
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pagination -->
        <div class="pagination">
            <a href="#" class="page-item disabled">
                <i data-feather="chevron-left"></i>
            </a>
            <a href="#" class="page-item active">1</a>
            <a href="#" class="page-item">2</a>
            <a href="#" class="page-item">3</a>
            <a href="#" class="page-item">4</a>
            <a href="#" class="page-item">
                <i data-feather="chevron-right"></i>
            </a>
        </div>
    </main>
@endsection

@push('styles')
    <style>
        /* Brand Hero */
        .brand-hero {
            min-height: 70vh;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
            padding: 4rem 0;
        }
        
        .brand-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><radialGradient id="g" cx="50%" cy="50%" r="50%"><stop offset="0%" style="stop-color:rgba(255,255,255,0.1)"/><stop offset="100%" style="stop-color:rgba(255,255,255,0)"/></radialGradient></defs><circle cx="25" cy="25" r="20" fill="url(%23g)"><animate attributeName="cy" values="25;75;25" dur="4s" repeatCount="indefinite"/></circle><circle cx="75" cy="75" r="15" fill="url(%23g)"><animate attributeName="cx" values="75;25;75" dur="6s" repeatCount="indefinite"/></circle></svg>') repeat;
            animation: float 20s ease-in-out infinite;
        }
        
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
        }
        
        /* Search Bar */
        .search-container {
            max-width: 100%;
            position: relative;
            margin-top: 2rem;
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
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .search-btn:hover {
            transform: translateY(-50%) scale(1.05);
        }
        
        /* Brand Showcase */
        .brand-showcase {
            position: relative;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            border: 1px solid rgba(255,255,255,0.2);
        }
        
        .brand-logo-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        
        .brand-logo-item {
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        
        .brand-logo-item:hover {
            transform: scale(1.05);
        }
        
        .brand-logo-item img {
            max-width: 100%;
            max-height: 100%;
            filter: brightness(0) invert(1);
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
        
        /* Brands Grid */
        .brands-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .brand-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .brand-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .brand-header {
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
        }
        
        .brand-header::after {
            content: '';
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 40px;
            background: inherit;
            clip-path: polygon(0 0, 100% 0, 50% 100%);
            z-index: 1;
        }
        
        .brand-logo {
            max-width: 80%;
            max-height: 80px;
            filter: brightness(0) invert(1);
            transition: transform 0.3s ease;
        }
        
        .brand-card:hover .brand-logo {
            transform: scale(1.1);
        }
        
        .brand-content {
            padding: 2rem 1.5rem;
            text-align: center;
            position: relative;
            z-index: 2;
        }
        
        .brand-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #333;
        }
        
        .brand-description {
            color: #6b7280;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        
        .brand-stats {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .product-count {
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            color: #374151;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px; /* jika ingin sudut membulat */
        }
        .product-image {
            width: 120px;
            height: 120px;
            overflow: hidden;
            border-radius: 8px;
        }
        
        .brand-link {
            color: #667eea;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.3rem;
            transition: all 0.3s ease;
        }
        
        .brand-link:hover {
            color: #4f46e5;
            transform: translateX(4px);
        }
        
        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 3rem;
        }
        
        .page-item {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: white;
            color: #6b7280;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
        }
        
        .page-item:hover {
            background: #f3f4f6;
            color: #667eea;
        }
        
        .page-item.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-color: transparent;
        }
        
        .page-item.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 2rem;
            }
            
            .hero-text h1 {
                font-size: 2.5rem;
            }
            
            .brand-logo-grid {
                grid-template-columns: 1fr;
            }
            
            .brands-grid {
                grid-template-columns: 1fr;
            }
            
            .filter-bar {
                flex-direction: column;
                align-items: stretch;
            }
            
            .filter-left {
                justify-content: center;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        feather.replace();
        
        // Toggle view between grid and list
        const viewBtns = document.querySelectorAll('.view-btn');
        const brandsGrid = document.querySelector('.brands-grid');
        
        viewBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                viewBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                
                if (btn.querySelector('i').getAttribute('data-feather') === 'list') {
                    brandsGrid.style.gridTemplateColumns = '1fr';
                    brandsGrid.querySelectorAll('.brand-card').forEach(card => {
                        card.style.display = 'flex';
                        card.style.alignItems = 'center';
                        card.querySelector('.brand-header').style.width = '200px';
                        card.querySelector('.brand-header').style.height = 'auto';
                        card.querySelector('.brand-header').style.minHeight = '200px';
                        card.querySelector('.brand-header::after').style.display = 'none';
                    });
                } else {
                    brandsGrid.style.gridTemplateColumns = 'repeat(auto-fill, minmax(280px, 1fr))';
                    brandsGrid.querySelectorAll('.brand-card').forEach(card => {
                        card.style.display = 'block';
                        card.querySelector('.brand-header').style.width = 'auto';
                        card.querySelector('.brand-header').style.height = '150px';
                        card.querySelector('.brand-header::after').style.display = 'block';
                    });
                }
            });
        });
    </script>
@endpush