@extends('layouts.app')

@section('title', 'Pembayaran - CameraHub')

@section('content')
    <div class="checkout-container">
        <!-- Progress Indicator -->
        <div class="checkout-progress">
            <div class="progress-line">
                <div class="progress-fill" style="width: 33%"></div>
            </div>
            <div class="step active">
                <div class="step-circle">1</div>
                <div class="step-label">Informasi Pengiriman</div>
            </div>
            <div class="step">
                <div class="step-circle">2</div>
                <div class="step-label">Pembayaran</div>
            </div>
            <div class="step">
                <div class="step-circle">3</div>
                <div class="step-label">Selesai</div>
            </div>
        </div>

        <div class="checkout-content">
            <!-- Order Summary -->
            <div class="order-summary">
                <div class="summary-card">
                    <h2 class="summary-title">Ringkasan Pesanan</h2>
                    <div class="product-item">
                        <div class="product-image">
                            <img src="https://via.placeholder.com/300x300?text=Canon+EOS+R5" alt="Canon EOS R5">
                        </div>
                        <div class="product-details">
                            <h4>Canon EOS R5 Body Only</h4>
                            <div class="product-meta">
                                <span class="product-price">Rp49.999.000</span>
                                <span class="product-quantity">×1</span>
                            </div>
                            <div class="product-specs">
                                <span class="spec-badge"><i data-feather="aperture"></i> 45MP</span>
                                <span class="spec-badge"><i data-feather="box"></i> Stok Tersedia</span>
                            </div>
                        </div>
                    </div>

                    <div class="summary-divider"></div>

                    <div class="summary-details">
                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span>Rp49.999.000</span>
                        </div>
                        <div class="summary-row">
                            <span>Ongkos Kirim</span>
                            <span>Rp20.000</span>
                        </div>
                        <div class="summary-row discount">
                            <span>Diskon</span>
                            <span>-Rp1.000.000</span>
                        </div>
                        <div class="summary-row total">
                            <span>Total Pembayaran</span>
                            <span class="total-amount">Rp49.019.000</span>
                        </div>
                    </div>
                </div>
                
                <div class="customer-support">
                    <i data-feather="help-circle"></i>
                    <div>
                        <h4>Butuh Bantuan?</h4>
                        <p>Hubungi kami di <a href="tel:+628123456789">0812-3456-789</a></p>
                    </div>
                </div>
            </div>

            <!-- Payment Form -->
            <div class="payment-form">
                <div class="form-card">
                    <h2 class="form-title">Informasi Pengiriman</h2>
                    <form id="checkoutForm">
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" id="name" placeholder="Masukkan nama lengkap" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" placeholder="email@contoh.com" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="phone">No. Telepon</label>
                                <input type="tel" id="phone" placeholder="0812-3456-7890" required>
                            </div>
                            
                            <div class="form-group full-width">
                                <label for="address">Alamat Lengkap</label>
                                <textarea id="address" rows="3" placeholder="Jl. Contoh No. 123, RT/RW 001/002" required></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="province">Provinsi</label>
                                <select id="province" required>
                                    <option value="">Pilih Provinsi</option>
                                    <option>DKI Jakarta</option>
                                    <option>Jawa Barat</option>
                                    <option>Jawa Tengah</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="city">Kota/Kabupaten</label>
                                <select id="city" required>
                                    <option value="">Pilih Kota</option>
                                    <option>Jakarta Selatan</option>
                                    <option>Bandung</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="district">Kecamatan</label>
                                <select id="district" required>
                                    <option value="">Pilih Kecamatan</option>
                                    <option>Kebayoran Baru</option>
                                    <option>Setiabudi</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="postal">Kode Pos</label>
                                <input type="text" id="postal" placeholder="12345" required>
                            </div>
                            
                            <div class="form-group full-width">
                                <label for="notes">Catatan (Opsional)</label>
                                <textarea id="notes" rows="2" placeholder="Contoh: Tinggal di sebelah minimarket"></textarea>
                            </div>
                        </div>

                        <div class="shipping-method">
                            <h3 class="section-title">Metode Pengiriman</h3>
                            <div class="shipping-options">
                                <label class="shipping-option">
                                    <input type="radio" name="shipping" checked>
                                    <div class="option-content">
                                        <div class="option-header">
                                            <span class="courier-name">JNE</span>
                                            <span class="delivery-time">1-2 hari kerja</span>
                                        </div>
                                        <span class="shipping-price">Rp20.000</span>
                                    </div>
                                </label>
                                
                                <label class="shipping-option">
                                    <input type="radio" name="shipping">
                                    <div class="option-content">
                                        <div class="option-header">
                                            <span class="courier-name">SiCepat</span>
                                            <span class="delivery-time">2-3 hari kerja</span>
                                        </div>
                                        <span class="shipping-price">Rp15.000</span>
                                    </div>
                                </label>
                                
                                <label class="shipping-option">
                                    <input type="radio" name="shipping">
                                    <div class="option-content">
                                        <div class="option-header">
                                            <span class="courier-name">GoSend</span>
                                            <span class="delivery-time">Hari ini</span>
                                        </div>
                                        <span class="shipping-price">Rp35.000</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="payment-method">
                            <h3 class="section-title">Metode Pembayaran</h3>
                            <div class="payment-options">
                                <div class="payment-tabs">
                                    <button type="button" class="tab-button active" data-tab="bank">Transfer Bank</button>
                                    <button type="button" class="tab-button" data-tab="ewallet">E-Wallet</button>
                                    <button type="button" class="tab-button" data-tab="credit">Kartu Kredit</button>
                                </div>
                                
                                <div class="tab-content active" id="bank-tab">
                                    <div class="bank-options">
                                        <label class="bank-option">
                                            <input type="radio" name="bank" checked>
                                            <div class="bank-logo">
                                                <img src="https://via.placeholder.com/40x40?text=BCA" alt="BCA">
                                            </div>
                                            <div class="bank-details">
                                                <span class="bank-name">Bank Central Asia (BCA)</span>
                                                <span class="account-number">1234567890 - CameraHub</span>
                                            </div>
                                        </label>
                                        
                                        <label class="bank-option">
                                            <input type="radio" name="bank">
                                            <div class="bank-logo">
                                                <img src="https://via.placeholder.com/40x40?text=Mandiri" alt="Mandiri">
                                            </div>
                                            <div class="bank-details">
                                                <span class="bank-name">Bank Mandiri</span>
                                                <span class="account-number">9876543210 - CameraHub</span>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="tab-content" id="ewallet-tab">
                                    <div class="ewallet-options">
                                        <label class="ewallet-option">
                                            <input type="radio" name="ewallet" checked>
                                            <div class="ewallet-logo">
                                                <img src="https://via.placeholder.com/40x40?text=DANA" alt="DANA">
                                            </div>
                                            <span class="ewallet-name">DANA</span>
                                        </label>
                                        
                                        <label class="ewallet-option">
                                            <input type="radio" name="ewallet">
                                            <div class="ewallet-logo">
                                                <img src="https://via.placeholder.com/40x40?text=OVO" alt="OVO">
                                            </div>
                                            <span class="ewallet-name">OVO</span>
                                        </label>
                                        
                                        <label class="ewallet-option">
                                            <input type="radio" name="ewallet">
                                            <div class="ewallet-logo">
                                                <img src="https://via.placeholder.com/40x40?text=ShopeePay" alt="ShopeePay">
                                            </div>
                                            <span class="ewallet-name">ShopeePay</span>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="tab-content" id="credit-tab">
                                    <div class="credit-card-form">
                                        <div class="form-group">
                                            <label>Nomor Kartu</label>
                                            <input type="text" placeholder="1234 5678 9012 3456" class="card-input">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label>Masa Berlaku</label>
                                                <input type="text" placeholder="MM/YY" class="card-input">
                                            </div>
                                            <div class="form-group">
                                                <label>CVV</label>
                                                <input type="text" placeholder="123" class="card-input">
                                            </div>
                                        </div>
                                        <div class="saved-cards">
                                            <label class="saved-card">
                                                <input type="radio" name="saved-card" checked>
                                                <div class="card-details">
                                                    <div class="card-logo">
                                                        <img src="https://via.placeholder.com/30x20?text=VISA" alt="VISA">
                                                    </div>
                                                    <span class="card-number">•••• •••• •••• 4242</span>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="pay-now-btn">
                                <i data-feather="lock"></i>
                                Bayar Sekarang - Rp49.019.000
                            </button>
                            <div class="secure-payment">
                                <i data-feather="shield"></i>
                                <span>Pembayaran Aman & Terenkripsi</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Success Modal -->
    <div class="modal-overlay" id="paymentModal">
        <div class="modal-container">
            <div class="payment-success">
                <div class="success-icon">
                    <div class="icon-circle">
                        <i data-feather="check"></i>
                    </div>
                </div>
                <h2>Pembayaran Berhasil!</h2>
                <p class="success-message">Pesanan Anda #ORD12345 telah diterima dan sedang diproses</p>
                
                <div class="order-details">
                    <div class="detail-item">
                        <span class="detail-label">Metode Pembayaran</span>
                        <span class="detail-value">Transfer Bank (BCA)</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Total Pembayaran</span>
                        <span class="detail-value">Rp49.019.000</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Estimasi Pengiriman</span>
                        <span class="detail-value">2-3 hari kerja</span>
                    </div>
                </div>
                
                <div class="action-buttons">
                    <a href="/orders/ORD12345" class="view-order-btn">
                        <i data-feather="file-text"></i>
                        Lihat Detail Pesanan
                    </a>
                    <a href="/products" class="continue-shopping-btn">
                        <i data-feather="shopping-bag"></i>
                        Lanjutkan Belanja
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Base Styles */
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --secondary: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --light: #f9fafb;
            --dark: #1f2937;
            --gray: #6b7280;
            --gray-light: #e5e7eb;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --radius: 12px;
            --transition: all 0.3s ease;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: var(--dark);
            background-color: #f5f7fa;
            line-height: 1.6;
        }
        
        h2, h3, h4 {
            font-weight: 600;
            color: var(--dark);
        }
        
        a {
            text-decoration: none;
            color: inherit;
        }
        
        /* Checkout Container */
        .checkout-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        
        /* Progress Indicator */
        .checkout-progress {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 3rem;
            padding: 0 2rem;
        }
        
        .progress-line {
            position: absolute;
            top: 15px;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gray-light);
            z-index: 1;
            border-radius: 2px;
        }
        
        .progress-fill {
            height: 100%;
            background: var(--primary);
            border-radius: 2px;
            transition: var(--transition);
        }
        
        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
            width: 33.33%;
        }
        
        .step-circle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--gray-light);
            color: var(--gray);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.5rem;
            font-weight: 600;
            transition: var(--transition);
            border: 2px solid white;
        }
        
        .step-label {
            color: var(--gray);
            font-size: 0.9rem;
            font-weight: 500;
            text-align: center;
            transition: var(--transition);
        }
        
        .step.active .step-circle {
            background: var(--primary);
            color: white;
            transform: scale(1.1);
        }
        
        .step.active .step-label {
            color: var(--primary);
            font-weight: 600;
        }
        
        /* Checkout Content Layout */
        .checkout-content {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 2rem;
        }
        
        /* Order Summary */
        .order-summary {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .summary-card {
            background: white;
            border-radius: var(--radius);
            padding: 1.5rem;
            box-shadow: var(--shadow);
        }
        
        .summary-title {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--gray-light);
        }
        
        .product-item {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .product-image {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            overflow: hidden;
            flex-shrink: 0;
        }
        
        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .product-details {
            flex: 1;
        }
        
        .product-details h4 {
            font-size: 1rem;
            margin-bottom: 0.25rem;
        }
        
        .product-meta {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }
        
        .product-price {
            color: var(--primary);
            font-weight: 600;
        }
        
        .product-quantity {
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        .product-specs {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }
        
        .spec-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.75rem;
            color: var(--gray);
            background: var(--light);
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
        }
        
        .spec-badge i {
            width: 12px;
            height: 12px;
        }
        
        .summary-divider {
            height: 1px;
            background: var(--gray-light);
            margin: 1.5rem 0;
        }
        
        .summary-details {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            font-size: 0.95rem;
        }
        
        .summary-row.discount {
            color: var(--secondary);
        }
        
        .summary-row.total {
            margin-top: 0.5rem;
            padding-top: 0.75rem;
            border-top: 1px solid var(--gray-light);
            font-weight: 700;
            font-size: 1.1rem;
        }
        
        .total-amount {
            color: var(--primary);
            font-size: 1.2rem;
        }
        
        .customer-support {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: white;
            border-radius: var(--radius);
            padding: 1.5rem;
            box-shadow: var(--shadow);
        }
        
        .customer-support i {
            width: 24px;
            height: 24px;
            color: var(--primary);
        }
        
        .customer-support h4 {
            font-size: 1rem;
            margin-bottom: 0.25rem;
        }
        
        .customer-support p {
            font-size: 0.9rem;
            color: var(--gray);
        }
        
        .customer-support a {
            color: var(--primary);
        }
        
        /* Payment Form */
        .payment-form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .form-card {
            background: white;
            border-radius: var(--radius);
            padding: 1.5rem;
            box-shadow: var(--shadow);
        }
        
        .form-title {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--gray-light);
        }
        
        .section-title {
            font-size: 1.1rem;
            margin: 1.5rem 0 1rem;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
        
        .form-group {
            margin-bottom: 1rem;
        }
        
        .form-group.full-width {
            grid-column: span 2;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray-light);
            border-radius: 8px;
            font-size: 0.95rem;
            transition: var(--transition);
            background: white;
        }
        
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }
        
        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }
        
        /* Shipping Method */
        .shipping-options {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }
        
        .shipping-option {
            display: block;
            position: relative;
        }
        
        .shipping-option input {
            position: absolute;
            opacity: 0;
        }
        
        .option-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border: 1px solid var(--gray-light);
            border-radius: 8px;
            transition: var(--transition);
            cursor: pointer;
        }
        
        .shipping-option input:checked + .option-content {
            border-color: var(--primary);
            background: rgba(79, 70, 229, 0.05);
        }
        
        .option-header {
            display: flex;
            flex-direction: column;
        }
        
        .courier-name {
            font-weight: 600;
        }
        
        .delivery-time {
            font-size: 0.85rem;
            color: var(--gray);
        }
        
        .shipping-price {
            font-weight: 600;
            color: var(--primary);
        }
        
        /* Payment Method */
        .payment-tabs {
            display: flex;
            border-bottom: 1px solid var(--gray-light);
            margin-bottom: 1rem;
        }
        
        .tab-button {
            padding: 0.75rem 1rem;
            background: none;
            border: none;
            border-bottom: 2px solid transparent;
            font-weight: 500;
            color: var(--gray);
            cursor: pointer;
            transition: var(--transition);
        }
        
        .tab-button.active {
            color: var(--primary);
            border-bottom-color: var(--primary);
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        /* Bank Options */
        .bank-options {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }
        
        .bank-option {
            display: block;
            position: relative;
        }
        
        .bank-option input {
            position: absolute;
            opacity: 0;
        }
        
        .bank-option .bank-logo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
        }
        
        .bank-option .bank-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        .bank-option-content {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            border: 1px solid var(--gray-light);
            border-radius: 8px;
            transition: var(--transition);
            cursor: pointer;
        }
        
        .bank-option input:checked + .bank-option-content {
            border-color: var(--primary);
            background: rgba(79, 70, 229, 0.05);
        }
        
        .bank-details {
            flex: 1;
        }
        
        .bank-name {
            display: block;
            font-weight: 500;
        }
        
        .account-number {
            display: block;
            font-size: 0.85rem;
            color: var(--gray);
        }
        
        /* E-Wallet Options */
        .ewallet-options {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.75rem;
        }
        
        .ewallet-option {
            display: block;
            position: relative;
        }
        
        .ewallet-option input {
            position: absolute;
            opacity: 0;
        }
        
        .ewallet-option-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem;
            border: 1px solid var(--gray-light);
            border-radius: 8px;
            transition: var(--transition);
            cursor: pointer;
        }
        
        .ewallet-option input:checked + .ewallet-option-content {
            border-color: var(--primary);
            background: rgba(79, 70, 229, 0.05);
        }
        
        .ewallet-logo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
        }
        
        .ewallet-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        .ewallet-name {
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        /* Credit Card Form */
        .credit-card-form {
            padding: 1rem 0;
        }
        
        .form-row {
            display: flex;
            gap: 1rem;
        }
        
        .card-input {
            background: white;
            border: 1px solid var(--gray-light);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            transition: var(--transition);
            width: 100%;
        }
        
        .card-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }
        
        .saved-cards {
            margin-top: 1rem;
        }
        
        .saved-card {
            display: block;
            position: relative;
        }
        
        .saved-card input {
            position: absolute;
            opacity: 0;
        }
        
        .saved-card-content {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem;
            border: 1px solid var(--gray-light);
            border-radius: 8px;
            transition: var(--transition);
            cursor: pointer;
        }
        
        .saved-card input:checked + .saved-card-content {
            border-color: var(--primary);
            background: rgba(79, 70, 229, 0.05);
        }
        
        .card-logo {
            width: 30px;
            height: 20px;
            overflow: hidden;
        }
        
        .card-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        .card-number {
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        /* Form Actions */
        .form-actions {
            margin-top: 2rem;
        }
        
        .pay-now-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: 0 4px 6px rgba(79, 70, 229, 0.1);
        }
        
        .pay-now-btn:hover {
            background: linear-gradient(135deg, var(--primary-dark), #5b50e8);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(79, 70, 229, 0.15);
        }
        
        .secure-payment {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1rem;
            font-size: 0.85rem;
            color: var(--gray);
        }
        
        .secure-payment i {
            width: 16px;
            height: 16px;
            color: var(--secondary);
        }
        
        /* Payment Success Modal */
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
            transition: var(--transition);
        }
        
        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        .modal-container {
            background: white;
            border-radius: var(--radius);
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            transform: translateY(20px);
            transition: var(--transition);
        }
        
        .modal-overlay.active .modal-container {
            transform: translateY(0);
        }
        
        .payment-success {
            text-align: center;
            padding: 2.5rem;
        }
        
        .success-icon {
            margin-bottom: 1.5rem;
        }
        
        .icon-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(16, 185, 129, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }
        
        .icon-circle i {
            width: 40px;
            height: 40px;
            color: var(--secondary);
        }
        
        .payment-success h2 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        
        .success-message {
            color: var(--gray);
            margin-bottom: 2rem;
        }
        
        .order-details {
            background: var(--light);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            text-align: left;
        }
        
        .detail-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
        }
        
        .detail-item:last-child {
            margin-bottom: 0;
        }
        
        .detail-label {
            color: var(--gray);
        }
        
        .detail-value {
            font-weight: 500;
        }
        
        .action-buttons {
            display: flex;
            gap: 1rem;
        }
        
        .view-order-btn,
        .continue-shopping-btn {
            flex: 1;
            padding: 0.75rem;
            border-radius: 8px;
            font-weight: 600;
            text-align: center;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .view-order-btn {
            background: var(--primary);
            color: white;
        }
        
        .view-order-btn:hover {
            background: var(--primary-dark);
        }
        
        .continue-shopping-btn {
            border: 1px solid var(--gray-light);
            color: var(--dark);
        }
        
        .continue-shopping-btn:hover {
            background: var(--light);
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .checkout-content {
                grid-template-columns: 1fr;
            }
            
            .order-summary {
                order: 2;
            }
        }
        
        @media (max-width: 768px) {
            .checkout-progress {
                padding: 0;
            }
            
            .step-label {
                font-size: 0.8rem;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .form-group.full-width {
                grid-column: span 1;
            }
            
            .ewallet-options {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .action-buttons {
                flex-direction: column;
            }
        }
        
        @media (max-width: 480px) {
            .step-label {
                display: none;
            }
            
            .checkout-progress {
                justify-content: space-around;
            }
            
            .step {
                width: auto;
            }
            
            .ewallet-options {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Feather Icons
            feather.replace();
            
            // Handle form submission
            const checkoutForm = document.getElementById('checkoutForm');
            const paymentModal = document.getElementById('paymentModal');
            
            checkoutForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Show payment success modal
                paymentModal.classList.add('active');
                document.body.style.overflow = 'hidden';
                
                // In a real app, you would process payment here
                // and handle the response
            });
            
            // Close modal if clicked outside
            paymentModal.addEventListener('click', function(e) {
                if (e.target === paymentModal) {
                    paymentModal.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
            
            // Tab functionality
            const tabButtons = document.querySelectorAll('.tab-button');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    
                    // Remove active class from all buttons and tabs
                    document.querySelectorAll('.tab-button').forEach(btn => {
                        btn.classList.remove('active');
                    });
                    document.querySelectorAll('.tab-content').forEach(tab => {
                        tab.classList.remove('active');
                    });
                    
                    // Add active class to clicked button and corresponding tab
                    this.classList.add('active');
                    document.getElementById(`${tabId}-tab`).classList.add('active');
                });
            });
            
            // Auto-scroll to payment section if coming from product page
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('checkout')) {
                document.querySelector('.payment-form').scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    </script>
@endpush