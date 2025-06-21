@extends('layouts.app')

@section('title', 'Produk Nikon - CameraHub')

@section('content')
    <section class="brand-hero" style="background: linear-gradient(135deg, #1a1a1a 0%, #333333 100%);">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Jelajahi Produk dari <span>Nikon</span></h1>
                <p>Kualitas optik superior dan inovasi tak tertandingi untuk setiap momen berharga Anda.</p>
                <div class="search-container">
                    <input type="text" class="search-bar" placeholder="Cari produk Nikon...">
                    <button class="search-btn">
                        <i data-feather="search"></i>
                        Cari
                    </button>
                </div>
            </div>
            <div class="hero-image">
                <img src="{{ asset('img/.jpg') }}" alt="Produk Hero Nikon" class="brand-hero-product-img">
            </div>
        </div>
    </section>

    <section class="breadcrumb">
        <div class="breadcrumb-container">
            <nav>
                <a href="{{ route('dashboard') }}">Beranda</a>
                <i data-feather="chevron-right"></i>
                <a href="{{ route('user.brand') }}">Brand</a>
                <i data-feather="chevron-right"></i>
                <span>Nikon</span>
            </nav>
        </div>
    </section>

    <main class="main-content">
        <div class="filter-bar">
            <div class="filter-left">
                <div class="filter-item">
                    <label>Urutkan:</label>
                    <select class="filter-select">
                        <option>Populer</option>
                        <option>Terbaru</option>
                        <option>Harga Terendah</option>
                        <option>Harga Tertinggi</option>
                    </select>
                </div>
                <div class="filter-item">
                    <label>Kategori:</label>
                    <select class="filter-select">
                        <option>Semua</option>
                        <option>Mirrorless</option>
                        <option>DSLR</option>
                        <option>Lensa</option>
                    </select>
                </div>
                <div class="results-count">
                    Menampilkan 6 produk
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

        <section class="products-section">
            <div class="products-grid">
                <div class="product-card">
                    <div class="product-image-container">
                        <img src="{{ asset('img/nicon.jpg') }}" alt="Nikon Z9">
                        <span class="product-tag">Unggulan</span>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Mirrorless</span>
                        <h3 class="product-title">Nikon Z9</h3>
                        <div class="product-rating">
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <span>(4.9)</span>
                        </div>
                        <p class="product-price">Rp 85.000.000</p>
                        <div class="product-actions">
                            <button class="btn btn-primary">
                                <i data-feather="shopping-cart"></i> Keranjang
                            </button>
                            <button class="btn btn-secondary">Detail</button>
                        </div>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image-container">
                        <img src="{{ asset('img/nikon-d850.jpg') }}" alt="Nikon D850">
                    </div>
                    <div class="product-info">
                        <span class="product-category">DSLR</span>
                        <h3 class="product-title">Nikon D850</h3>
                        <div class="product-rating">
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star"></i>
                            <span>(4.8)</span>
                        </div>
                        <p class="product-price">Rp 45.500.000</p>
                        <div class="product-actions">
                            <button class="btn btn-primary">
                                <i data-feather="shopping-cart"></i> Keranjang
                            </button>
                            <button class="btn btn-secondary">Detail</button>
                        </div>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image-container">
                        <img src="{{ asset('img/nikon-z6ii.jpg') }}" alt="Nikon Z6 II">
                        <span class="product-tag new">Terbaru</span>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Mirrorless</span>
                        <h3 class="product-title">Nikon Z6 II</h3>
                        <div class="product-rating">
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star-half"></i>
                            <span>(4.7)</span>
                        </div>
                        <p class="product-price">Rp 32.000.000</p>
                        <div class="product-actions">
                            <button class="btn btn-primary">
                                <i data-feather="shopping-cart"></i> Keranjang
                            </button>
                            <button class="btn btn-secondary">Detail</button>
                        </div>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image-container">
                        <img src="{{ asset('img/nikon-zfc.jpg') }}" alt="Nikon Z FC">
                    </div>
                    <div class="product-info">
                        <span class="product-category">Mirrorless Retro</span>
                        <h3 class="product-title">Nikon Z FC</h3>
                        <div class="product-rating">
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star"></i>
                            <span>(4.6)</span>
                        </div>
                        <p class="product-price">Rp 15.000.000</p>
                        <div class="product-actions">
                            <button class="btn btn-primary">
                                <i data-feather="shopping-cart"></i> Keranjang
                            </button>
                            <button class="btn btn-secondary">Detail</button>
                        </div>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image-container">
                        <img src="{{ asset('img/nikkor-50mm.jpg') }}" alt="Nikkor Z 50mm f/1.8 S">
                    </div>
                    <div class="product-info">
                        <span class="product-category">Lensa</span>
                        <h3 class="product-title">Nikkor Z 50mm f/1.8 S</h3>
                        <div class="product-rating">
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <span>(5.0)</span>
                        </div>
                        <p class="product-price">Rp 9.800.000</p>
                        <div class="product-actions">
                            <button class="btn btn-primary">
                                <i data-feather="shopping-cart"></i> Keranjang
                            </button>
                            <button class="btn btn-secondary">Detail</button>
                        </div>
                    </div>
                </div>
                
                <div class="product-card">
                    <div class="product-image-container">
                        <img src="{{ asset('img/nikon-d7500.jpg') }}" alt="Nikon D7500">
                    </div>
                    <div class="product-info">
                        <span class="product-category">DSLR</span>
                        <h3 class="product-title">Nikon D7500</h3>
                        <div class="product-rating">
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star"></i>
                            <span>(4.5)</span>
                        </div>
                        <p class="product-price">Rp 14.500.000</p>
                        <div class="product-actions">
                            <button class="btn btn-primary">
                                <i data-feather="shopping-cart"></i> Keranjang
                            </button>
                            <button class="btn btn-secondary">Detail</button>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <div class="pagination">
            <a href="#" class="page-item disabled">
                <i data-feather="chevron-left"></i>
            </a>
            <a href="#" class="page-item active">1</a>
            <a href="#" class="page-item">2</a>
            <a href="#" class="page-item">
                <i data-feather="chevron-right"></i>
            </a>
        </div>
    </main>
@endsection

@push('styles')
    {{-- Menggunakan kembali beberapa style dari halaman brand --}}
    <style>
        /* Hero Section for Brand Detail */
        .brand-hero {
            min-height: 60vh;
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
            padding: 4rem 0;
        }
        
        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            align-items: center;
            position: relative;
            z-index: 2;
        }
        
        .hero-text h1 {
            font-size: 3.2rem;
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
            font-size: 1.1rem;
            color: rgba(255,255,255,0.9);
            margin-bottom: 2rem;
        }

        .brand-hero-product-img {
            max-width: 100%;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            transform: rotate(5deg) scale(1.05);
            transition: transform 0.3s ease;
        }

        .brand-hero-product-img:hover {
            transform: rotate(0deg) scale(1);
        }

        /* Search Bar (reused) */
        .search-container { max-width: 100%; position: relative; margin-top: 2rem; }
        .search-bar { width: 100%; padding: 1rem 1.5rem; border: none; border-radius: 50px; font-size: 1rem; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); outline: none; }
        .search-bar::placeholder { color: #666; }
        .search-btn { position: absolute; right: 8px; top: 50%; transform: translateY(-50%); background: linear-gradient(135deg, #ffd700, #ffed4e); border: none; border-radius: 50px; padding: 0.7rem 1.5rem; color: #333; font-weight: 600; cursor: pointer; transition: all 0.3s ease; display: flex; align-items: center; gap: 0.5rem; }
        .search-btn:hover { transform: translateY(-50%) scale(1.05); }

        /* Breadcrumb (reused) */
        .breadcrumb { background: white; padding: 1rem 0; border-bottom: 1px solid #e5e7eb; }
        .breadcrumb-container { max-width: 1200px; margin: 0 auto; padding: 0 2rem; }
        .breadcrumb nav { display: flex; align-items: center; gap: 0.5rem; font-size: 0.9rem; }
        .breadcrumb a { color: #667eea; text-decoration: none; transition: color 0.3s ease; }
        .breadcrumb a:hover { color: #4f46e5; }
        .breadcrumb span { color: #6b7280; }

        /* Main Content & Filter Bar (reused) */
        .main-content { max-width: 1200px; margin: 0 auto; padding: 3rem 2rem; }
        .filter-bar { background: white; padding: 1.5rem; border-radius: 16px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; }
        .filter-left { display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap; }
        .filter-item { display: flex; align-items: center; gap: 0.5rem; }
        .filter-select { padding: 0.5rem 1rem; border: 2px solid #e5e7eb; border-radius: 25px; background: white; font-size: 0.9rem; cursor: pointer; transition: all 0.3s ease; -webkit-appearance: none; appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 0.7rem center; padding-right: 2.5rem; }
        .filter-select:focus { outline: none; border-color: #667eea; }
        .results-count { color: #6b7280; font-weight: 500; }
        .view-toggle { display: flex; background: #f3f4f6; border-radius: 8px; padding: 4px; }
        .view-btn { padding: 0.5rem; border: none; background: transparent; border-radius: 6px; cursor: pointer; transition: all 0.3s ease; color: #6b7280; }
        .view-btn.active { background: white; color: #667eea; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); }
        
        /* Products Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .product-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }

        .product-image-container {
            position: relative;
            background: #f3f4f6;
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .product-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .product-card:hover .product-image-container img {
            transform: scale(1.05);
        }

        .product-tag {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .product-tag.new {
            background: linear-gradient(135deg, #ffd700, #fca503);
            color: #333;
        }

        .product-info {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1; /* Penting agar semua kartu sama tinggi */
        }
        
        .product-category {
            color: #667eea;
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }

        .product-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 0.75rem;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 0.2rem;
            margin-bottom: 1rem;
            color: #f59e0b;
        }

        .product-rating svg {
            width: 16px;
            height: 16px;
        }
        
        .product-rating .filled {
            fill: #f59e0b;
        }
        
        .product-rating span {
            font-size: 0.9rem;
            color: #6b7280;
            margin-left: 0.5rem;
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e3c72;
            margin-top: auto; /* Mendorong harga ke bawah */
            margin-bottom: 1.5rem;
        }

        .product-actions {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 0.75rem;
        }

        .btn {
            padding: 0.8rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        .btn svg { width: 16px; height: 16px; }

        .btn-primary {
            background: #667eea;
            color: white;
        }

        .btn-primary:hover {
            background: #5a67d8;
        }

        .btn-secondary {
            background: white;
            color: #667eea;
            border-color: #e5e7eb;
        }

        .btn-secondary:hover {
            background: #f3f4f6;
            border-color: #d1d5db;
        }
        
        /* Pagination (reused) */
        .pagination { display: flex; justify-content: center; gap: 0.5rem; margin-top: 3rem; }
        .page-item { width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 10px; background: white; color: #6b7280; text-decoration: none; font-weight: 600; transition: all 0.3s ease; border: 1px solid #e5e7eb; }
        .page-item:hover { background: #f3f4f6; color: #667eea; }
        .page-item.active { background: linear-gradient(135deg, #667eea, #764ba2); color: white; border-color: transparent; }
        .page-item.disabled { opacity: 0.5; cursor: not-allowed; }
        
        /* Responsive (reused) */
        @media (max-width: 768px) {
            .hero-content { grid-template-columns: 1fr; text-align: center; }
            .brand-hero-product-img { transform: none; }
            .products-grid { grid-template-columns: 1fr; }
            .filter-bar { flex-direction: column; align-items: stretch; }
            .filter-left { justify-content: center; }
        }

    </style>
@endpush

@push('scripts')
    <script>
        // Pastikan feather.replace() dipanggil untuk merender semua ikon baru
        feather.replace();
    </script>
@endpush