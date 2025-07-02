
@extends('layouts.app')

@section('title', 'Produk Kamera - CameraHub')

@section('content')
    <!-- Hero Section -->
    <section class="product-hero" id="products">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Koleksi <span>Kamera</span> Terbaik</h1>
                <p>Temukan kamera impian Anda dari berbagai brand ternama dengan kualitas terjamin dan garansi resmi.</p>
                <div class="search-container">
                    <input type="text" class="search-bar" placeholder="Cari produk kamera...">
                    <button class="search-btn">
                        <i data-feather="search"></i>
                        Cari
                    </button>
                </div>
            </div>
            <div class="hero-image">
                <div class="product-showcase">
                    <div class="product-slider">
                        <div class="slide">
                            <img src="https://via.placeholder.com/400x300?text=DSLR+Professional" alt="DSLR Professional">
                        </div>
                        <div class="slide">
                            <img src="https://via.placeholder.com/400x300?text=Mirrorless+Advanced" alt="Mirrorless Advanced">
                        </div>
                        <div class="slide">
                            <img src="https://via.placeholder.com/400x300?text=Action+Camera" alt="Action Camera">
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
                <a href="#">Produk</a>
                <i data-feather="chevron-right"></i>
                <span>Kamera</span>
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
                        <option>Harga Terendah</option>
                        <option>Harga Tertinggi</option>
                        <option>Terbaru</option>
                        <option>Diskon Terbesar</option>
                    </select>
                </div>
                <div class="filter-item">
                    <label>Kategori:</label>
                    <select class="filter-select">
                        <option>Semua Kategori</option>
                        <option>DSLR</option>
                        <option>Mirrorless</option>
                        <option>Kamera Aksi</option>
                        <option>Kamera Film</option>
                        <option>Kamera Instan</option>
                    </select>
                </div>
                <div class="filter-item">
                    <label>Brand:</label>
                    <select class="filter-select">
                        <option>Semua Brand</option>
                        <option>Canon</option>
                        <option>Nikon</option>
                        <option>Sony</option>
                        <option>Fujifilm</option>
                    </select>
                </div>
                <div class="filter-item">
                    <label>Harga:</label>
                    <select class="filter-select">
                        <option>Semua Harga</option>
                        <option>Rp0 - Rp5.000.000</option>
                        <option>Rp5.000.000 - Rp10.000.000</option>
                        <option>Rp10.000.000 - Rp20.000.000</option>
                        <option>Rp20.000.000+</option>
                    </select>
                </div>
                <div class="results-count">
                    Menampilkan 12 produk
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

        <!-- Products Section -->
        <section class="products-section">
            <div class="products-grid">
                <!-- Previous code remains the same until Product 1 section -->

                <!-- Product 1 -->
                <div class="product-card">
                    <div class="product-badge">Diskon 15%</div>
                    <div class="product-header">
                        <img src="https://via.placeholder.com/300x300?text=Canon+EOS+R5" alt="Canon EOS R5">
                        <div class="product-actions">
                            <button class="wishlist-btn">
                                <i data-feather="heart"></i>
                            </button>
                            <button class="quick-view-btn" data-product-id="1">
                                <i data-feather="eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-rating">
                            <div class="stars">
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star"></i>
                                <span>(24)</span>
                            </div>
                        </div>
                        <h3 class="product-title">Canon EOS R5 Body Only</h3>
                        <div class="product-category">Kamera Mirrorless</div>
                        <div class="product-price">
                            <span class="current-price">Rp49.999.000</span>
                            <span class="original-price">Rp58.999.000</span>
                        </div>
                        <div class="product-specs">
                            <div class="spec-item">
                                <i data-feather="box"></i>
                                <span>Stok: 5</span>
                            </div>
                            <div class="spec-item">
                                <i data-feather="aperture"></i>
                                <span>45MP</span>
                            </div>
                        </div>
                        <div class="product-description">
                            <p>Canon EOS R5 adalah kamera mirrorless flagship dengan sensor full-frame 45MP yang mampu merekam video 8K RAW internal. Dilengkapi dengan stabilisasi gambar in-body 5-axis hingga 8 stop dan autofokus Dual Pixel CMOS AF II yang mencakup 100% area gambar.</p>
                        </div>
                       <button class="buy-now-btn" data-product-id="1">
                            <i data-feather="shopping-bag"></i>
                            Beli Sekarang
                        </button>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="product-card">
                    <div class="product-badge">Terlaris</div>
                    <div class="product-header">
                        <img src="https://via.placeholder.com/300x300?text=Sony+A7+IV" alt="Sony A7 IV">
                        <div class="product-actions">
                            <button class="wishlist-btn">
                                <i data-feather="heart"></i>
                            </button>
                            <button class="quick-view-btn" data-product-id="2">
                                <i data-feather="eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-rating">
                            <div class="stars">
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="half-filled"></i>
                                <span>(42)</span>
                            </div>
                        </div>
                        <h3 class="product-title">Sony Alpha A7 IV Body Only</h3>
                        <div class="product-category">Kamera Mirrorless</div>
                        <div class="product-price">
                            <span class="current-price">Rp32.999.000</span>
                        </div>
                        <div class="product-specs">
                            <div class="spec-item">
                                <i data-feather="box"></i>
                                <span>Stok: 12</span>
                            </div>
                            <div class="spec-item">
                                <i data-feather="aperture"></i>
                                <span>33MP</span>
                            </div>
                        </div>
                        <div class="product-description">
                            <p>Sony A7 IV menawarkan sensor full-frame 33MP BSI CMOS dengan performa low-light yang luar biasa. Kamera ini memiliki autofokus real-time yang akurat, kemampuan merekam video 4K 60p, dan body yang tahan cuaca dengan ergonomi yang ditingkatkan.</p>
                        </div>
                       <button class="buy-now-btn" data-product-id="1">
                        <i data-feather="shopping-bag"></i>
                        Beli Sekarang
                        </button>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="product-card">
                    <div class="product-badge">Baru</div>
                    <div class="product-header">
                        <img src="https://via.placeholder.com/300x300?text=Nikon+Z8" alt="Nikon Z8">
                        <div class="product-actions">
                            <button class="wishlist-btn">
                                <i data-feather="heart"></i>
                            </button>
                            <button class="quick-view-btn" data-product-id="3">
                                <i data-feather="eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-rating">
                            <div class="stars">
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="filled"></i>
                                <span>(18)</span>
                            </div>
                        </div>
                        <h3 class="product-title">Nikon Z8 Body Only</h3>
                        <div class="product-category">Kamera Mirrorless</div>
                        <div class="product-price">
                            <span class="current-price">Rp54.999.000</span>
                        </div>
                        <div class="product-specs">
                            <div class="spec-item">
                                <i data-feather="box"></i>
                                <span>Stok: 3</span>
                            </div>
                            <div class="spec-item">
                                <i data-feather="aperture"></i>
                                <span>45MP</span>
                            </div>
                        </div>
                        <div class="product-description">
                            <p>Nikon Z8 adalah kamera mirrorless profesional dengan sensor stacked CMOS full-frame 45.7MP yang menawarkan kecepatan burst hingga 120 fps. Dilengkapi dengan sistem stabilisasi 5-axis, video 8K 60p, dan autofokus canggih yang ideal untuk fotografi olahraga dan wildlife.</p>
                        </div>
                       <button class="buy-now-btn" data-product-id="1">
                            <i data-feather="shopping-bag"></i>
                            Beli Sekarang
                        </button>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="product-card">
                    <div class="product-badge low-stock">Stok Terbatas</div>
                    <div class="product-header">
                        <img src="https://via.placeholder.com/300x300?text=Fujifilm+X-T5" alt="Fujifilm X-T5">
                        <div class="product-actions">
                            <button class="wishlist-btn">
                                <i data-feather="heart"></i>
                            </button>
                            <button class="quick-view-btn" data-product-id="4">
                                <i data-feather="eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-rating">
                            <div class="stars">
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star"></i>
                                <span>(31)</span>
                            </div>
                        </div>
                        <h3 class="product-title">Fujifilm X-T5 Body Only</h3>
                        <div class="product-category">Kamera Mirrorless</div>
                        <div class="product-price">
                            <span class="current-price">Rp24.999.000</span>
                        </div>
                        <div class="product-specs">
                            <div class="spec-item">
                                <i data-feather="box"></i>
                                <span>Stok: 2</span>
                            </div>
                            <div class="spec-item">
                                <i data-feather="aperture"></i>
                                <span>40MP</span>
                            </div>
                        </div>
                        <div class="product-description">
                            <p>Fujifilm X-T5 menggabungkan sensor X-Trans CMOS 5 HR 40MP dengan prosesor X-Processor 5 yang powerful. Kamera ini menawarkan desain klasik dengan kontrol manual, kemampuan video 6.2K, dan lebih dari 19 film simulation modes yang khas Fujifilm.</p>
                        </div>
                        <button class="buy-now-btn" data-product-id="1">
                            <i data-feather="shopping-bag"></i>
                            Beli Sekarang
                        </button>
                    </div>
                </div>

                <!-- Product 5 -->
                <div class="product-card">
                    <div class="product-badge">Diskon 10%</div>
                    <div class="product-header">
                        <img src="https://via.placeholder.com/300x300?text=Canon+EOS+R6+II" alt="Canon EOS R6 II">
                        <div class="product-actions">
                            <button class="wishlist-btn">
                                <i data-feather="heart"></i>
                            </button>
                            <button class="quick-view-btn" data-product-id="5">
                                <i data-feather="eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-rating">
                            <div class="stars">
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="half-filled"></i>
                                <span>(29)</span>
                            </div>
                        </div>
                        <h3 class="product-title">Canon EOS R6 Mark II</h3>
                        <div class="product-category">Kamera Mirrorless</div>
                        <div class="product-price">
                            <span class="current-price">Rp35.999.000</span>
                            <span class="original-price">Rp39.999.000</span>
                        </div>
                        <div class="product-specs">
                            <div class="spec-item">
                                <i data-feather="box"></i>
                                <span>Stok: 7</span>
                            </div>
                            <div class="spec-item">
                                <i data-feather="aperture"></i>
                                <span>24MP</span>
                            </div>
                        </div>
                        <div class="product-description">
                            <p>Canon EOS R6 Mark II menawarkan sensor full-frame 24.2MP dengan performa low-light yang luar biasa. Kamera ini mampu menangkap gambar hingga 40 fps dengan electronic shutter, merekam video 4K 60p tanpa crop, dan memiliki stabilisasi in-body hingga 8 stop.</p>
                        </div>
                        <button class="buy-now-btn" data-product-id="1">
                            <i data-feather="shopping-bag"></i>
                            Beli Sekarang
                        </button>
                    </div>
                </div>

                <!-- Product 6 -->
                <div class="product-card">
                    <div class="product-badge out-of-stock">Stok Habis</div>
                    <div class="product-header">
                        <img src="https://via.placeholder.com/300x300?text=Sony+ZV-E1" alt="Sony ZV-E1">
                        <div class="product-actions">
                            <button class="wishlist-btn">
                                <i data-feather="heart"></i>
                            </button>
                            <button class="quick-view-btn" data-product-id="6">
                                <i data-feather="eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-rating">
                            <div class="stars">
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star" class="filled"></i>
                                <i data-feather="star"></i>
                                <span>(15)</span>
                            </div>
                        </div>
                        <h3 class="product-title">Sony ZV-E1 Full-Frame</h3>
                        <div class="product-category">Kamera Mirrorless</div>
                        <div class="product-price">
                            <span class="current-price">Rp28.999.000</span>
                        </div>
                        <div class="product-specs">
                            <div class="spec-item">
                                <i data-feather="box"></i>
                                <span>Stok: 0</span>
                            </div>
                            <div class="spec-item">
                                <i data-feather="aperture"></i>
                                <span>12MP</span>
                            </div>
                        </div>
                        <div class="product-description">
                            <p>Sony ZV-E1 adalah kamera full-frame ringkas yang dirancang khusus untuk content creator. Menggunakan sensor 12.1MP yang sama dengan A7S III, kamera ini unggul dalam performa low-light dan mampu merekam video 4K 120p dengan kualitas sinematik serta fitur AI-powered autofocus.</p>
                        </div>
                        <button class="add-to-cart-btn out-of-stock" disabled>
                            <i data-feather="x-circle"></i>
                            Stok Habis
                        </button>
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
            <a href="#" class="page-item">
                <i data-feather="chevron-right"></i>
            </a>
        </div>
    </main>

    <!-- Quick View Modal -->
    <div class="modal-overlay" id="quickViewModal">
        <div class="modal-container">
            <button class="close-modal">
                <i data-feather="x"></i>
            </button>
            <div class="modal-content">
                <div class="modal-product-images">
                    <div class="main-image">
                        <img src="https://via.placeholder.com/600x500?text=Product+Image" alt="Product Image" id="modalMainImage">
                    </div>
                    <div class="thumbnail-images">
                        <div class="thumbnail active">
                            <img src="https://via.placeholder.com/100x100?text=Thumb+1" alt="Thumbnail 1">
                        </div>
                        <div class="thumbnail">
                            <img src="https://via.placeholder.com/100x100?text=Thumb+2" alt="Thumbnail 2">
                        </div>
                        <div class="thumbnail">
                            <img src="https://via.placeholder.com/100x100?text=Thumb+3" alt="Thumbnail 3">
                        </div>
                    </div>
                </div>
                <div class="modal-product-details">
                    <h2>Canon EOS R5 Body Only</h2>
                    <div class="modal-rating">
                        <div class="stars">
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star" class="filled"></i>
                            <i data-feather="star"></i>
                            <span>(24 reviews)</span>
                        </div>
                        <a href="#" class="review-link">Lihat semua review</a>
                    </div>
                    <div class="modal-price">
                        <span class="current">Rp49.999.000</span>
                        <span class="original">Rp58.999.000</span>
                        <span class="discount">15% off</span>
                    </div>
                    <div class="modal-availability">
                        <i data-feather="check-circle"></i>
                        <span>Stok Tersedia (5 unit)</span>
                    </div>
                    <div class="modal-description">
                        <p>Canon EOS R5 adalah kamera mirrorless full-frame dengan resolusi 45MP, kemampuan merekam video 8K RAW internal, stabilisasi gambar in-body 5-axis, dan autofokus Dual Pixel CMOS AF II yang canggih.</p>
                    </div>
                    <div class="modal-specs">
                        <h3>Spesifikasi Teknis</h3>
                        <ul>
                            <li><strong>Sensor:</strong> Full-frame CMOS 45MP</li>
                            <li><strong>Prosesor:</strong> DIGIC X</li>
                            <li><strong>Video:</strong> 8K 30p, 4K 120p</li>
                            <li><strong>Stabilisasi:</strong> 5-axis IBIS (hingga 8 stops)</li>
                            <li><strong>AF:</strong> Dual Pixel CMOS AF II (100% coverage)</li>
                            <li><strong>Burst:</strong> 20 fps (electronic shutter)</li>
                        </ul>
                    </div>
                    <div class="modal-actions">
                        <div class="quantity-selector">
                            <button class="decrease-qty">-</button>
                            <input type="number" value="1" min="1" max="5" id="productQuantity">
                            <button class="increase-qty">+</button>
                        </div>
                        <button class="add-to-cart-btn">
                            <i data-feather="shopping-cart"></i>
                            Tambah ke Keranjang
                        </button>
                        <button class="buy-now-btn">
                            Beli Sekarang
                        </button>
                    </div>
                    <div class="modal-wishlist">
                        <button class="wishlist-btn">
                            <i data-feather="heart"></i>
                            Tambah ke Wishlist
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Sidebar -->
    <div class="cart-sidebar" id="cartSidebar">
        <div class="cart-header">
            <h3>Keranjang Belanja</h3>
            <button class="close-cart">
                <i data-feather="x"></i>
            </button>
        </div>
        <div class="cart-items">
            <div class="empty-cart">
                <i data-feather="shopping-cart"></i>
                <p>Keranjang belanja Anda kosong</p>
                <button class="continue-shopping">Lanjutkan Belanja</button>
            </div>
        </div>
        <div class="cart-summary">
            <div class="summary-row">
                <span>Subtotal</span>
                <span class="subtotal">Rp0</span>
            </div>
            <div class="summary-row">
                <span>Ongkos Kirim</span>
                <span class="shipping">-</span>
            </div>
            <div class="summary-row total">
                <span>Total</span>
                <span class="total-price">Rp0</span>
            </div>
            <button class="checkout-btn">Proses ke Checkout</button>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Product Hero */
        .product-hero {
            min-height: 70vh;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
            padding: 4rem 0;
        }
        
        .product-hero::before {
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
        
        /* Product Showcase */
        .product-showcase {
            position: relative;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            border: 1px solid rgba(255,255,255,0.2);
            height: 100%;
        }
        
        .product-slider {
            display: flex;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .product-slider .slide {
            min-width: 100%;
            transition: transform 0.5s ease;
        }
        
        .product-slider .slide img {
            width: 100%;
            height: auto;
            display: block;
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
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }
        
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .product-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #ff4757;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            z-index: 2;
        }
        
        .product-badge.out-of-stock {
            background: #6b7280;
        }
        
        .product-badge.low-stock {
            background: #f59e0b;
        }
        
        .product-header {
            height: 200px;
            position: relative;
            overflow: hidden;
        }
        
        .product-header img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .product-card:hover .product-header img {
            transform: scale(1.05);
        }
        
        .product-actions {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 2;
        }
        
        .product-card:hover .product-actions {
            opacity: 1;
        }
        
        .wishlist-btn, .quick-view-btn {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .wishlist-btn:hover, .quick-view-btn:hover {
            background: #667eea;
            color: white;
        }
        
        .product-content {
            padding: 1.5rem;
        }
        
        .product-rating {
            margin-bottom: 0.5rem;
        }
        
        .stars {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }
        
        .stars i {
            width: 16px;
            height: 16px;
            color: #e5e7eb;
        }
        
        .stars i.filled {
            color: #ffd700;
        }
        
        .stars i.half-filled {
            position: relative;
            color: #e5e7eb;
        }
        
        .stars i.half-filled::after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 50%;
            height: 100%;
            overflow: hidden;
            color: #ffd700;
        }
        
        .stars span {
            margin-left: 0.5rem;
            font-size: 0.8rem;
            color: #6b7280;
        }
        
        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #333;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            height: 3em;
            line-height: 1.5em;
        }
        
        .product-category {
            font-size: 0.8rem;
            color: #6b7280;
            margin-bottom: 0.75rem;
        }
        
        .product-price {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }
        
        .current-price {
            font-size: 1.25rem;
            font-weight: 700;
            color: #333;
        }
        
        .original-price {
            font-size: 0.9rem;
            text-decoration: line-through;
            color: #9ca3af;
        }
        
        .product-specs {
            display: flex;
            gap: 0.75rem;
            margin-bottom: 1.25rem;
            flex-wrap: wrap;
        }
        
        .spec-item {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            background: #f3f4f6;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
        }
        
        .spec-item i {
            width: 12px;
            height: 12px;
        }
        
        .add-to-cart-btn {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .add-to-cart-btn:hover {
                        background: linear-gradient(135deg, #5a67d8, #6b46c1);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }
        
        .add-to-cart-btn:active {
            transform: translateY(0);
        }
        
        .add-to-cart-btn.out-of-stock {
            background: #9ca3af;
            cursor: not-allowed;
        }
        
        .add-to-cart-btn.out-of-stock:hover {
            transform: none;
            box-shadow: none;
            background: #9ca3af;
        }
        
        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            margin-top: 3rem;
        }
        
        .page-item {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background: white;
            color: #6b7280;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
        }
        
        .page-item:hover:not(.disabled, .active) {
            background: #f3f4f6;
            color: #4f46e5;
        }
        
        .page-item.active {
            background: #4f46e5;
            color: white;
            border-color: #4f46e5;
        }
        
        .page-item.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        /* Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        .modal-container {
            background: white;
            border-radius: 16px;
            width: 90%;
            max-width: 1000px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }
        
        .modal-overlay.active .modal-container {
            transform: translateY(0);
        }
        
        .close-modal {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f3f4f6;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 2;
            transition: all 0.3s ease;
        }
        
        .close-modal:hover {
            background: #e5e7eb;
        }
        
        .modal-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            padding: 3rem;
        }
        
        .modal-product-images {
            position: sticky;
            top: 0;
        }
        
        .main-image {
            margin-bottom: 1rem;
            border-radius: 12px;
            overflow: hidden;
        }
        
        .main-image img {
            width: 100%;
            height: auto;
            display: block;
        }
        
        .thumbnail-images {
            display: flex;
            gap: 0.75rem;
        }
        
        .thumbnail {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }
        
        .thumbnail.active {
            border-color: #4f46e5;
        }
        
        .thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .modal-product-details h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #333;
        }
        
        .modal-rating {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .review-link {
            font-size: 0.9rem;
            color: #667eea;
            text-decoration: none;
        }
        
        .review-link:hover {
            text-decoration: underline;
        }
        
        .modal-price {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .modal-price .current {
            font-size: 1.75rem;
            font-weight: 700;
            color: #333;
        }
        
        .modal-price .original {
            font-size: 1.25rem;
            text-decoration: line-through;
            color: #9ca3af;
        }
        
        .modal-price .discount {
            background: #ff4757;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .modal-availability {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #10b981;
            margin-bottom: 1.5rem;
        }
        
        .modal-description {
            margin-bottom: 2rem;
            line-height: 1.6;
            color: #4b5563;
        }
        
        .modal-specs {
            margin-bottom: 2rem;
        }
        
        .modal-specs h3 {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            color: #333;
        }
        
        .modal-specs ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
        }
        
        .modal-specs li {
            font-size: 0.9rem;
            color: #4b5563;
        }
        
        .modal-specs strong {
            color: #333;
        }
        
        .modal-actions {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .quantity-selector {
            display: flex;
            align-items: center;
            background: #f3f4f6;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .quantity-selector button {
            width: 40px;
            height: 40px;
            border: none;
            background: #e5e7eb;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .quantity-selector button:hover {
            background: #d1d5db;
        }
        
        .quantity-selector input {
            width: 50px;
            height: 40px;
            border: none;
            text-align: center;
            background: transparent;
            font-weight: 600;
        }
        
        .quantity-selector input::-webkit-outer-spin-button,
        .quantity-selector input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        
        .buy-now-btn {
            flex: 1;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, #10b981, #059669);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.15);
}
        
        .buy-now-btn:hover {
            background: linear-gradient(135deg, #059669, #047857);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }
        
        .modal-wishlist button {
            width: 100%;
            padding: 0.75rem;
            background: transparent;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            color: #4b5563;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .modal-wishlist button:hover {
            border-color: #d1d5db;
            background: #f9fafb;
        }
        
        /* Cart Sidebar */
        .cart-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100vh;
            background: white;
            box-shadow: -5px 0 30px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            transition: right 0.3s ease;
            z-index: 1000;
        }
        
        .cart-sidebar.active {
            right: 0;
        }
        
        .cart-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .cart-header h3 {
            margin: 0;
            font-size: 1.25rem;
        }
        
        .close-cart {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #f3f4f6;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .close-cart:hover {
            background: #e5e7eb;
        }
        
        .cart-items {
            flex: 1;
            overflow-y: auto;
            padding: 1.5rem;
        }
        
        .empty-cart {
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #6b7280;
        }
        
        .empty-cart i {
            width: 48px;
            height: 48px;
            margin-bottom: 1rem;
            color: #d1d5db;
        }
        
        .empty-cart p {
            margin-bottom: 1.5rem;
        }
        
        .continue-shopping {
            padding: 0.75rem 1.5rem;
            background: #4f46e5;
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .continue-shopping:hover {
            background: #4338ca;
        }
        
        .cart-summary {
            padding: 1.5rem;
            border-top: 1px solid #e5e7eb;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
        }
        
        .summary-row.total {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #e5e7eb;
            font-weight: 700;
            font-size: 1.1rem;
        }
        
        .checkout-btn {
            width: 100%;
            padding: 1rem;
            margin-top: 1.5rem;
            background: linear-gradient(135deg, #10b981, #059669);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .checkout-btn:hover {
            background: linear-gradient(135deg, #059669, #047857);
        }
        
        /* Animations */
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .hero-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .hero-text {
                text-align: center;
            }
            
            .search-container {
                margin: 0 auto;
                max-width: 500px;
            }
            
            .modal-content {
                grid-template-columns: 1fr;
            }
            
            .modal-product-images {
                position: static;
            }
        }
        
        @media (max-width: 768px) {
            .hero-text h1 {
                font-size: 2.5rem;
            }
            
            .filter-left {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .filter-item {
                width: 100%;
            }
            
            .filter-select {
                width: 100%;
            }
            
            .modal-specs ul {
                grid-template-columns: 1fr;
            }
            
            .cart-sidebar {
                width: 100%;
                max-width: 350px;
            }
        }
        
        @media (max-width: 480px) {
            .hero-text h1 {
                font-size: 2rem;
            }
            
            .products-grid {
                grid-template-columns: 1fr;
            }
            
            .modal-actions {
                flex-direction: column;
            }
            
            .quantity-selector {
                width: 100%;
                justify-content: space-between;
            }
        }
    </style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Feather Icons
            feather.replace();
            
            // Product slider
            const productSlider = document.querySelector('.product-slider');
            if (productSlider) {
                let currentSlide = 0;
                const slides = document.querySelectorAll('.product-slider .slide');
                const totalSlides = slides.length;
                
                function nextSlide() {
                    currentSlide = (currentSlide + 1) % totalSlides;
                    updateSlider();
                }
                
                function updateSlider() {
                    productSlider.style.transform = `translateX(-${currentSlide * 100}%)`;
                }
                
                setInterval(nextSlide, 3000);
            }
            
            // Quick View Modal
            const quickViewButtons = document.querySelectorAll('.quick-view-btn');
            const quickViewModal = document.getElementById('quickViewModal');
            const closeModalButton = document.querySelector('.close-modal');
            
            quickViewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    // In a real app, you would fetch product data based on productId
                    quickViewModal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
            });
            
            closeModalButton.addEventListener('click', function() {
                quickViewModal.classList.remove('active');
                document.body.style.overflow = '';
            });
            
            quickViewModal.addEventListener('click', function(e) {
                if (e.target === quickViewModal) {
                    quickViewModal.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
            
            // Thumbnail click handler
            const thumbnails = document.querySelectorAll('.thumbnail');
            const mainImage = document.getElementById('modalMainImage');
            
            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', function() {
                    // Remove active class from all thumbnails
                    thumbnails.forEach(t => t.classList.remove('active'));
                    // Add active class to clicked thumbnail
                    this.classList.add('active');
                    // Update main image (in a real app, you would use the actual image source)
                    mainImage.src = this.querySelector('img').src.replace('100x100', '600x500');
                });
            });
            
            // Quantity selector
            const decreaseQty = document.querySelector('.decrease-qty');
            const increaseQty = document.querySelector('.increase-qty');
            const quantityInput = document.getElementById('productQuantity');
            
            if (decreaseQty && increaseQty && quantityInput) {
                decreaseQty.addEventListener('click', function() {
                    let value = parseInt(quantityInput.value);
                    if (value > 1) {
                        quantityInput.value = value - 1;
                    }
                });
                
                increaseQty.addEventListener('click', function() {
                    let value = parseInt(quantityInput.value);
                    quantityInput.value = value + 1;
                });
            }
            
            // Cart functionality
            const addToCartButtons = document.querySelectorAll('.add-to-cart-btn:not(.out-of-stock)');
            const cartSidebar = document.getElementById('cartSidebar');
            const closeCartButton = document.querySelector('.close-cart');
            const continueShoppingButton = document.querySelector('.continue-shopping');
            
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    // In a real app, you would add the product to cart
                    console.log(`Added product ${productId} to cart`);
                    // Show cart sidebar
                    cartSidebar.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
            });
            
            closeCartButton.addEventListener('click', function() {
                cartSidebar.classList.remove('active');
                document.body.style.overflow = '';
            });
            
            continueShoppingButton.addEventListener('click', function() {
                cartSidebar.classList.remove('active');
                document.body.style.overflow = '';
            });
            
            // View toggle
            const viewButtons = document.querySelectorAll('.view-btn');
            
            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    viewButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    // In a real app, you would toggle between grid and list view
                });
            });
            
            
            document.querySelectorAll('.buy-now-btn').forEach(button => {
    button.addEventListener('click', function() {
        const productId = this.getAttribute('data-product-id');
        
        // Tampilkan modal konfirmasi
        Swal.fire({
            title: 'Langsung Checkout?',
            text: 'Produk akan langsung diproses ke pembayaran',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Lanjutkan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `/user/payment/ `;
            }
        });
    });
});
 });
    </script>
@endpush