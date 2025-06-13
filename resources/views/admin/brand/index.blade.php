@extends('layouts.admin')

@section('title', 'Kelola Brand - Admin')

@push('styles')
<style>
/* Brands Grid */
.brands-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 2rem;
    gap: 1rem;
}

.brands-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--dark);
    margin: 0;
}

.brands-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.search-box {
    position: relative;
}

.search-input {
    padding: 0.75rem 1rem 0.75rem 2.5rem;
    border: 1px solid var(--gray);
    border-radius: 8px;
    background: var(--white);
    font-size: 0.875rem;
    width: 280px;
    transition: all 0.2s ease;
}

.search-input:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
}

.search-icon {
    position: absolute;
    left: 0.75rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--gray-darker);
    width: 18px;
    height: 18px;
}

.filter-dropdown {
    position: relative;
}

.filter-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1rem;
    border: 1px solid var(--gray);
    border-radius: 8px;
    background: var(--white);
    font-size: 0.875rem;
    cursor: pointer;
    transition: all 0.2s ease;
    color: var(--dark);
}

.filter-btn:hover {
    border-color: var(--primary);
    background: var(--primary-light);
}

.add-brand-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    background: var(--primary);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 0.875rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
}

.add-brand-btn:hover {
    background: var(--primary-dark);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

/* Brands Stats */
.brands-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: var(--white);
    border-radius: 12px;
    padding: 1.25rem;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray);
    text-align: center;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.stat-number {
    font-size: 1.75rem;
    font-weight: 700;
    margin-bottom: 0.25rem;
}

.stat-number.total { color: var(--primary); }
.stat-number.active { color: var(--success); }
.stat-number.featured { color: var(--warning); }
.stat-number.products { color: var(--info); }

.stat-text {
    font-size: 0.875rem;
    color: var(--gray-darker);
    font-weight: 500;
}

/* Brands Cards Grid */
.brands-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.brand-card {
    background: var(--white);
    border-radius: 12px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray);
    overflow: hidden;
    transition: all 0.3s ease;
    position: relative;
}

.brand-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.brand-card-header {
    position: relative;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    height: 120px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.brand-logo {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.95);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    position: relative;
    z-index: 2;
}

.brand-logo img {
    width: 60px;
    height: 60px;
    object-fit: contain;
    border-radius: 8px;
}

.brand-card-body {
    padding: 1.5rem;
}

.brand-name {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 0.5rem;
}

.brand-description {
    color: var(--gray-darker);
    font-size: 0.875rem;
    line-height: 1.5;
    margin-bottom: 1rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.brand-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1rem;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.brand-products-count {
    display: flex;
    align-items: center;
    gap: 0.25rem;
    font-size: 0.75rem;
    color: var(--gray-darker);
}

.brand-status {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 500;
    text-transform: capitalize;
}

.brand-status.active {
    background: rgba(72, 187, 120, 0.1);
    color: var(--success);
}

.brand-status.inactive {
    background: rgba(245, 101, 101, 0.1);
    color: var(--danger);
}

.brand-status.featured {
    background: rgba(237, 137, 54, 0.1);
    color: var(--warning);
}

.brand-actions {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    justify-content: center;
}

.action-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.2s ease;
    background: transparent;
    font-size: 0.875rem;
}

.action-btn.edit {
    color: var(--primary);
    background: var(--primary-light);
}

.action-btn.edit:hover {
    background: var(--primary);
    color: white;
}

.action-btn.delete {
    color: var(--danger);
    background: rgba(245, 101, 101, 0.1);
}

.action-btn.delete:hover {
    background: var(--danger);
    color: white;
}

.action-btn.view {
    color: var(--gray-darker);
    background: var(--gray-light);
}

.action-btn.view:hover {
    background: var(--gray-darker);
    color: white;
}

.action-btn i {
    width: 16px;
    height: 16px;
}

/* View Toggle */
.view-toggle {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: var(--gray-light);
    border-radius: 8px;
    padding: 0.25rem;
}

.view-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.2s ease;
    background: transparent;
    color: var(--gray-darker);
}

.view-btn.active {
    background: var(--primary);
    color: white;
}

.view-btn:hover:not(.active) {
    background: rgba(102, 126, 234, 0.1);
    color: var(--primary);
}

/* Table View */
.brands-table-card {
    background: var(--white);
    border-radius: 12px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray);
    padding: 1.5rem;
    display: none;
}

.brands-table-card.active {
    display: block;
}

.table-responsive {
    overflow-x: auto;
    margin: 0 -1.5rem;
    padding: 0 1.5rem;
}

.brands-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.875rem;
}

.brands-table th {
    padding: 1rem;
    text-align: left;
    border-bottom: 2px solid var(--gray);
    font-weight: 600;
    color: var(--gray-darker);
    text-transform: uppercase;
    letter-spacing: 0.025em;
    white-space: nowrap;
}

.brands-table td {
    padding: 1rem;
    border-bottom: 1px solid var(--gray);
    vertical-align: middle;
}

.brand-info {
    display: flex;
    align-items: center;
    gap: 1rem;
    min-width: 250px;
}

.brand-logo-small {
    width: 50px;
    height: 50px;
    background: var(--gray-light);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    color: var(--primary);
    flex-shrink: 0;
}

.brand-logo-small img {
    width: 40px;
    height: 40px;
    object-fit: contain;
    border-radius: 6px;
}

.brand-details h4 {
    font-weight: 600;
    margin-bottom: 0.25rem;
    color: var(--dark);
    line-height: 1.3;
}

.brand-code {
    font-size: 0.75rem;
    color: var(--gray-darker);
}

/* Pagination */
.pagination-wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 1.5rem;
    padding-top: 1rem;
    border-top: 1px solid var(--gray);
}

.pagination-info {
    font-size: 0.875rem;
    color: var(--gray-darker);
}

.pagination {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.pagination-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border: 1px solid var(--gray);
    border-radius: 6px;
    background: var(--white);
    color: var(--gray-darker);
    font-size: 0.875rem;
    cursor: pointer;
    transition: all 0.2s ease;
}

.pagination-btn:hover:not(.disabled) {
    border-color: var(--primary);
    color: var(--primary);
}

.pagination-btn.active {
    background: var(--primary);
    border-color: var(--primary);
    color: white;
}

.pagination-btn.disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

/* Bulk Actions */
.bulk-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: var(--primary-light);
    border-radius: 8px;
    margin-bottom: 1rem;
    display: none;
}

.bulk-actions.show {
    display: flex;
}

.bulk-actions-text {
    font-size: 0.875rem;
    color: var(--primary);
    font-weight: 500;
}

.bulk-btn {
    padding: 0.5rem 1rem;
    border: 1px solid var(--primary);
    border-radius: 6px;
    background: var(--white);
    color: var(--primary);
    font-size: 0.875rem;
    cursor: pointer;
    transition: all 0.2s ease;
}

.bulk-btn:hover {
    background: var(--primary);
    color: white;
}

.bulk-btn.danger {
    border-color: var(--danger);
    color: var(--danger);
}

.bulk-btn.danger:hover {
    background: var(--danger);
    color: white;
}

/* Loading States */
.loading {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 3rem;
    color: var(--gray-darker);
}

.loading-spinner {
    width: 24px;
    height: 24px;
    border: 2px solid var(--gray);
    border-top-color: var(--primary);
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin-right: 0.5rem;
}

@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}

/* Responsive Design */
@media (max-width: 1024px) {
    .brands-header {
        flex-direction: column;
        align-items: stretch;
        gap: 1rem;
    }
    
    .brands-actions {
        flex-wrap: wrap;
        justify-content: space-between;
    }
    
    .search-input {
        width: 100%;
        min-width: 200px;
    }
    
    .brands-grid {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    }
}

@media (max-width: 768px) {
    .brands-stats {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .brands-grid {
        grid-template-columns: 1fr;
    }
    
    .brands-table-card {
        padding: 1rem;
    }
    
    .table-responsive {
        margin: 0 -1rem;
        padding: 0 1rem;
    }
    
    .brands-table th,
    .brands-table td {
        padding: 0.75rem 0.5rem;
    }
    
    .brand-info {
        min-width: 200px;
    }
}

@media (max-width: 576px) {
    .brands-stats {
        grid-template-columns: 1fr;
    }
    
    .brands-actions {
        flex-direction: column;
        align-items: stretch;
    }
    
    .pagination-wrapper {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .brand-card-body {
        padding: 1rem;
    }
}
</style>
@endpush

@section('content')
<!-- Page Header -->
<div class="brands-header">
    <h1 class="brands-title">Kelola Brand</h1>
    <div class="brands-actions">
        <div class="search-box">
            <i data-feather="search" class="search-icon"></i>
            <input type="text" class="search-input" placeholder="Cari brand atau kode...">
        </div>
        <div class="view-toggle">
            <button class="view-btn active" data-view="grid" title="Tampilan Grid">
                <i data-feather="grid"></i>
            </button>
            <button class="view-btn" data-view="table" title="Tampilan Tabel">
                <i data-feather="list"></i>
            </button>
        </div>
        <div class="filter-dropdown">
            <button class="filter-btn">
                <i data-feather="filter"></i>
                Filter
            </button>
        </div>
        <a href="#" class="add-brand-btn">
            <i data-feather="plus"></i>
            Tambah Brand
        </a>
    </div>
</div>

<!-- Brands Stats -->
<div class="brands-stats">
    <div class="stat-card">
        <div class="stat-number total">24</div>
        <div class="stat-text">Total Brand</div>
    </div>
    <div class="stat-card">
        <div class="stat-number active">20</div>
        <div class="stat-text">Brand Aktif</div>
    </div>
    <div class="stat-card">
        <div class="stat-number featured">8</div>
        <div class="stat-text">Brand Unggulan</div>
    </div>
    <div class="stat-card">
        <div class="stat-number products">1,248</div>
        <div class="stat-text">Total Produk</div>
    </div>
</div>

<!-- Bulk Actions (Hidden by default) -->
<div class="bulk-actions" id="bulkActions">
    <div class="bulk-actions-text">
        <span id="selectedCount">0</span> brand dipilih
    </div>
    <button class="bulk-btn">
        <i data-feather="edit"></i>
        Edit Massal
    </button>
    <button class="bulk-btn">
        <i data-feather="eye-off"></i>
        Nonaktifkan
    </button>
    <button class="bulk-btn danger">
        <i data-feather="trash-2"></i>
        Hapus
    </button>
</div>

<!-- Brands Grid View -->
<div class="brands-grid active" id="brandsGrid">
    <div class="brand-card">
        <div class="brand-card-header">
            <div class="brand-logo">
                <img src="https://via.placeholder.com/60x60/ffffff/667eea?text=CANON" alt="Canon">
            </div>
        </div>
        <div class="brand-card-body">
            <h3 class="brand-name">Canon</h3>
            <p class="brand-description">Perusahaan multinasional Jepang yang mengkhususkan diri dalam produk pencitraan dan optik.</p>
            <div class="brand-meta">
                <div class="brand-products-count">
                    <i data-feather="package"></i>
                    <span>342 Produk</span>
                </div>
                <span class="brand-status featured">Unggulan</span>
            </div>
            <div class="brand-actions">
                <button class="action-btn view" title="Lihat Detail">
                    <i data-feather="eye"></i>
                </button>
                <button class="action-btn edit" title="Edit Brand">
                    <i data-feather="edit"></i>
                </button>
                <button class="action-btn delete" title="Hapus Brand">
                    <i data-feather="trash-2"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="brand-card">
        <div class="brand-card-header">
            <div class="brand-logo">
                <img src="https://via.placeholder.com/60x60/ffffff/48bb78?text=SONY" alt="Sony">
            </div>
        </div>
        <div class="brand-card-body">
            <h3 class="brand-name">Sony</h3>
            <p class="brand-description">Konglomerat multinasional Jepang yang bergerak di bidang elektronik konsumen dan peralatan profesional.</p>
            <div class="brand-meta">
                <div class="brand-products-count">
                    <i data-feather="package"></i>
                    <span>289 Produk</span>
                </div>
                <span class="brand-status featured">Unggulan</span>
            </div>
            <div class="brand-actions">
                <button class="action-btn view" title="Lihat Detail">
                    <i data-feather="eye"></i>
                </button>
                <button class="action-btn edit" title="Edit Brand">
                    <i data-feather="edit"></i>
                </button>
                <button class="action-btn delete" title="Hapus Brand">
                    <i data-feather="trash-2"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="brand-card">
        <div class="brand-card-header">
            <div class="brand-logo">
                <img src="https://via.placeholder.com/60x60/ffffff/ed8936?text=NIKON" alt="Nikon">
            </div>
        </div>
        <div class="brand-card-body">
            <h3 class="brand-name">Nikon</h3>
            <p class="brand-description">Perusahaan multinasional Jepang yang mengkhususkan diri dalam optics dan imaging products.</p>
            <div class="brand-meta">
                <div class="brand-products-count">
                    <i data-feather="package"></i>
                    <span>198 Produk</span>
                </div>
                <span class="brand-status active">Aktif</span>
            </div>
            <div class="brand-actions">
                <button class="action-btn view" title="Lihat Detail">
                    <i data-feather="eye"></i>
                </button>
                <button class="action-btn edit" title="Edit Brand">
                    <i data-feather="edit"></i>
                </button>
                <button class="action-btn delete" title="Hapus Brand">
                    <i data-feather="trash-2"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="brand-card">
        <div class="brand-card-header">
            <div class="brand-logo">
                <img src="https://via.placeholder.com/60x60/ffffff/4299e1?text=FUJI" alt="Fujifilm">
            </div>
        </div>
        <div class="brand-card-body">
            <h3 class="brand-name">Fujifilm</h3>
            <p class="brand-description">Perusahaan multinasional Jepang yang bergerak di bidang fotografi, pencitraan, dan dokumen bisnis.</p>
            <div class="brand-meta">
                <div class="brand-products-count">
                    <i data-feather="package"></i>
                    <span>156 Produk</span>
                </div>
                <span class="brand-status active">Aktif</span>
            </div>
            <div class="brand-actions">
                <button class="action-btn view" title="Lihat Detail">
                    <i data-feather="eye"></i>
                </button>
                <button class="action-btn edit" title="Edit Brand">
                    <i data-feather="edit"></i>
                </button>
                <button class="action-btn delete" title="Hapus Brand">
                    <i data-feather="trash-2"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="brand-card">
        <div class="brand-card-header">
            <div class="brand-logo">
                <img src="https://via.placeholder.com/60x60/ffffff/764ba2?text=PANA" alt="Panasonic">
            </div>
        </div>
        <div class="brand-card-body">
            <h3 class="brand-name">Panasonic</h3>
            <p class="brand-description">Perusahaan elektronik multinasional Jepang yang memproduksi berbagai produk elektronik konsumen.</p>
            <div class="brand-meta">
                <div class="brand-products-count">
                    <i data-feather="package"></i>
                    <span>89 Produk</span>
                </div>
                <span class="brand-status active">Aktif</span>
            </div>
            <div class="brand-actions">
                <button class="action-btn view" title="Lihat Detail">
                    <i data-feather="eye"></i>
                </button>
                <button class="action-btn edit" title="Edit Brand">
                    <i data-feather="edit"></i>
                </button>
                <button class="action-btn delete" title="Hapus Brand">
                    <i data-feather="trash-2"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="brand-card">
        <div class="brand-card-header">
            <div class="brand-logo">
                <img src="https://via.placeholder.com/60x60/ffffff/f56565?text=GO" alt="GoPro">
            </div>
        </div>
        <div class="brand-card-body">
            <h3 class="brand-name">GoPro</h3>
            <p class="brand-description">Perusahaan teknologi Amerika yang mengembangkan kamera aksi dan aksesori terkait.</p>
            <div class="brand-meta">
                <div class="brand-products-count">
                    <i data-feather="package"></i>
                    <span>42 Produk</span>
                </div>
                <span class="brand-status active">Aktif</span>
            </div>
            <div class="brand-actions">
                <button class="action-btn view" title="Lihat Detail">
                    <i data-feather="eye"></i>
                </button>
                <button class="action-btn edit" title="Edit Brand">
                    <i data-feather="edit"></i>
                </button>
                <button class="action-btn delete" title="Hapus Brand">
                    <i data-feather="trash-2"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Brands Table View -->
<div class="brands-table-card" id="brandsTable">
    <div class="table-responsive">
        <table class="brands-table">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" id="selectAll" class="select-checkbox">
                    </th>
                    <th>Brand</th>
                    <th>Kode</th>
                    <th>Jumlah Produk</th>
                    <th>Status</th>
                    <th>Tanggal Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="checkbox" class="select-checkbox row-checkbox">
                    </td>
                    <td>
                        <div class="brand-info">
                            <div class="brand-logo-small">
                                <img src="https://via.placeholder.com/40x40/ffffff/667eea?text=C" alt="Canon">
                            </div>
                            <div class="brand-details">
                                <h4>Canon</h4>
                                <div class="brand-code">BRD-CAN-001</div>
                            </div>
                        </div>
                    </td>
                    <td>CANON</td>
                    <td>342 Produk</td>
                    <td>
                        <span class="brand-status featured">Unggulan</span>
                    </td>
                    <td>15 Jan 2024</td>
                    <td>
                        <div class="brand-actions">
                            <button class="action-btn view" title="Lihat Detail">
                                <i data-feather="eye"></i>
                            </button>
                            <button class="action-btn edit" title="Edit Brand">
                                <i data-feather="edit"></i>
                            </button>
                            <button class="action-btn delete" title="Hapus Brand">
                                <i data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="select-checkbox row-checkbox">
                    </td>
                    <td>
                        <div class="brand-info">
                            <div class="brand-logo-small">
                                <img src="https://via.placeholder.com/40x40/ffffff/48bb78?text=S" alt="Sony">
                            </div>
                            <div class="brand-details">
                                <h4>Sony</h4>
                                <div class="brand-code">BRD-SON-001</div>
                            </div>
                        </div>
                                            </td>
                    <td>SONY</td>
                    <td>289 Produk</td>
                    <td>
                        <span class="brand-status featured">Unggulan</span>
                    </td>
                    <td>15 Jan 2024</td>
                    <td>
                        <div class="brand-actions">
                            <button class="action-btn view" title="Lihat Detail">
                                <i data-feather="eye"></i>
                            </button>
                            <button class="action-btn edit" title="Edit Brand">
                                <i data-feather="edit"></i>
                            </button>
                            <button class="action-btn delete" title="Hapus Brand">
                                <i data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="select-checkbox row-checkbox">
                    </td>
                    <td>
                        <div class="brand-info">
                            <div class="brand-logo-small">
                                <img src="https://via.placeholder.com/40x40/ffffff/ed8936?text=N" alt="Nikon">
                            </div>
                            <div class="brand-details">
                                <h4>Nikon</h4>
                                <div class="brand-code">BRD-NIK-001</div>
                            </div>
                        </div>
                    </td>
                    <td>NIKON</td>
                    <td>198 Produk</td>
                    <td>
                        <span class="brand-status active">Aktif</span>
                    </td>
                    <td>14 Jan 2024</td>
                    <td>
                        <div class="brand-actions">
                            <button class="action-btn view" title="Lihat Detail">
                                <i data-feather="eye"></i>
                            </button>
                            <button class="action-btn edit" title="Edit Brand">
                                <i data-feather="edit"></i>
                            </button>
                            <button class="action-btn delete" title="Hapus Brand">
                                <i data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="select-checkbox row-checkbox">
                    </td>
                    <td>
                        <div class="brand-info">
                            <div class="brand-logo-small">
                                <img src="https://via.placeholder.com/40x40/ffffff/4299e1?text=F" alt="Fujifilm">
                            </div>
                            <div class="brand-details">
                                <h4>Fujifilm</h4>
                                <div class="brand-code">BRD-FUJ-001</div>
                            </div>
                        </div>
                    </td>
                    <td>FUJIFILM</td>
                    <td>156 Produk</td>
                    <td>
                        <span class="brand-status active">Aktif</span>
                    </td>
                    <td>12 Jan 2024</td>
                    <td>
                        <div class="brand-actions">
                            <button class="action-btn view" title="Lihat Detail">
                                <i data-feather="eye"></i>
                            </button>
                            <button class="action-btn edit" title="Edit Brand">
                                <i data-feather="edit"></i>
                            </button>
                            <button class="action-btn delete" title="Hapus Brand">
                                <i data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="select-checkbox row-checkbox">
                    </td>
                    <td>
                        <div class="brand-info">
                            <div class="brand-logo-small">
                                <img src="https://via.placeholder.com/40x40/ffffff/764ba2?text=P" alt="Panasonic">
                            </div>
                            <div class="brand-details">
                                <h4>Panasonic</h4>
                                <div class="brand-code">BRD-PAN-001</div>
                            </div>
                        </div>
                    </td>
                    <td>PANASONIC</td>
                    <td>89 Produk</td>
                    <td>
                        <span class="brand-status active">Aktif</span>
                    </td>
                    <td>10 Jan 2024</td>
                    <td>
                        <div class="brand-actions">
                            <button class="action-btn view" title="Lihat Detail">
                                <i data-feather="eye"></i>
                            </button>
                            <button class="action-btn edit" title="Edit Brand">
                                <i data-feather="edit"></i>
                            </button>
                            <button class="action-btn delete" title="Hapus Brand">
                                <i data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="select-checkbox row-checkbox">
                    </td>
                    <td>
                        <div class="brand-info">
                            <div class="brand-logo-small">
                                <img src="https://via.placeholder.com/40x40/ffffff/f56565?text=G" alt="GoPro">
                            </div>
                            <div class="brand-details">
                                <h4>GoPro</h4>
                                <div class="brand-code">BRD-GOP-001</div>
                            </div>
                        </div>
                    </td>
                    <td>GOPRO</td>
                    <td>42 Produk</td>
                    <td>
                        <span class="brand-status active">Aktif</span>
                    </td>
                    <td>8 Jan 2024</td>
                    <td>
                        <div class="brand-actions">
                            <button class="action-btn view" title="Lihat Detail">
                                <i data-feather="eye"></i>
                            </button>
                            <button class="action-btn edit" title="Edit Brand">
                                <i data-feather="edit"></i>
                            </button>
                            <button class="action-btn delete" title="Hapus Brand">
                                <i data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="pagination-wrapper">
        <div class="pagination-info">
            Menampilkan 1-6 dari 24 brand
        </div>
        <div class="pagination">
            <button class="pagination-btn disabled">
                <i data-feather="chevron-left"></i>
            </button>
            <button class="pagination-btn active">1</button>
            <button class="pagination-btn">2</button>
            <button class="pagination-btn">3</button>
            <button class="pagination-btn">4</button>
            <button class="pagination-btn">
                <i data-feather="chevron-right"></i>
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Feather icons
    feather.replace();
    
    // DOM Elements
    const selectAllCheckbox = document.getElementById('selectAll');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');
    const bulkActions = document.getElementById('bulkActions');
    const selectedCount = document.getElementById('selectedCount');
    const searchInput = document.querySelector('.search-input');
    const filterBtn = document.querySelector('.filter-btn');
    const addBrandBtn = document.querySelector('.add-brand-btn');
    const viewToggleBtns = document.querySelectorAll('.view-btn');
    const brandsGrid = document.getElementById('brandsGrid');
    const brandsTable = document.getElementById('brandsTable');
    const loadingIndicator = document.createElement('div');
    
    // Create loading indicator
    loadingIndicator.className = 'admin-loading';
    loadingIndicator.innerHTML = `
        <div class="admin-loading-spinner"></div>
        <span>Memuat data brand...</span>
    `;

    // Select all functionality
    selectAllCheckbox.addEventListener('change', function() {
        const isChecked = this.checked;
        rowCheckboxes.forEach(checkbox => {
            checkbox.checked = isChecked;
        });
        updateBulkActions();
    });

    // Individual row selection
    rowCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            updateSelectAll();
            updateBulkActions();
        });
    });

    function updateSelectAll() {
        const checkedBoxes = document.querySelectorAll('.row-checkbox:checked');
        selectAllCheckbox.checked = checkedBoxes.length === rowCheckboxes.length;
        selectAllCheckbox.indeterminate = checkedBoxes.length > 0 && checkedBoxes.length < rowCheckboxes.length;
    }

    function updateBulkActions() {
        const checkedBoxes = document.querySelectorAll('.row-checkbox:checked');
        const count = checkedBoxes.length;
        
        if (count > 0) {
            bulkActions.classList.add('show');
            selectedCount.textContent = count;
        } else {
            bulkActions.classList.remove('show');
        }
    }

    // Search functionality with debounce
    let searchTimeout;
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const query = this.value.trim();
        
        // Show loading indicator
        document.querySelector('.brands-table-card').insertBefore(loadingIndicator, brandsTable);
        brandsTable.style.opacity = '0.5';
        
        searchTimeout = setTimeout(() => {
            fetchBrands(query).finally(() => {
                loadingIndicator.remove();
                brandsTable.style.opacity = '1';
            });
        }, 500);
    });

    // Simulated API call for brands
    async function fetchBrands(query = '', filters = {}) {
        try {
            console.log('Fetching brands with query:', query, 'and filters:', filters);
            await new Promise(resolve => setTimeout(resolve, 800));
            return [];
        } catch (error) {
            console.error('Error fetching brands:', error);
            showError('Gagal memuat data brand');
            return [];
        }
    }

    // Error handling
    function showError(message) {
        const errorElement = document.createElement('div');
        errorElement.className = 'admin-error-message';
        errorElement.textContent = message;
        errorElement.style.color = 'var(--danger)';
        errorElement.style.padding = '1rem';
        errorElement.style.textAlign = 'center';
        
        document.querySelector('.brands-table-card').appendChild(errorElement);
        setTimeout(() => errorElement.remove(), 3000);
    }

    // View toggle functionality
    viewToggleBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            viewToggleBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const viewType = this.dataset.view;
            if (viewType === 'grid') {
                brandsGrid.classList.add('active');
                brandsTable.classList.remove('active');
            } else {
                brandsGrid.classList.remove('active');
                brandsTable.classList.add('active');
            }
            
            // Update icon
            feather.replace();
        });
    });

    // Action buttons for brands
    document.querySelectorAll('.action-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const action = this.classList.contains('edit') ? 'edit' : 
                          this.classList.contains('delete') ? 'delete' : 'view';
            const card = this.closest('.brand-card, tr');
            const brandId = card.dataset.id;
            const brandName = card.querySelector('.brand-name, .brand-details h4').textContent;
            
            switch(action) {
                case 'edit':
                    openEditBrandModal(brandId, brandName);
                    break;
                case 'delete':
                    openDeleteBrandModal(brandId, brandName);
                    break;
                case 'view':
                    openViewBrandModal(brandId);
                    break;
            }
        });
    });

    // Modal functions for brands
    function openEditBrandModal(id, name) {
        console.log(`Opening edit modal for brand: ${name} (ID: ${id})`);
        // Implementation would open a modal with brand edit form
    }

    function openDeleteBrandModal(id, name) {
        if(confirm(`Apakah Anda yakin ingin menghapus brand "${name}"?`)) {
            showLoading();
            setTimeout(() => {
                hideLoading();
                showSuccess(`Brand "${name}" berhasil dihapus`);
            }, 1000);
        }
    }

    function openViewBrandModal(id) {
        console.log(`Opening view modal for brand ID: ${id}`);
        // Implementation would open a modal with brand details
    }

    // Loading states
    function showLoading() {
        document.body.style.cursor = 'wait';
    }

    function hideLoading() {
        document.body.style.cursor = '';
    }

    function showSuccess(message) {
        const successElement = document.createElement('div');
        successElement.className = 'admin-success-message';
        successElement.textContent = message;
        successElement.style.color = 'var(--success)';
        successElement.style.padding = '1rem';
        successElement.style.textAlign = 'center';
        
        document.body.appendChild(successElement);
        setTimeout(() => successElement.remove(), 3000);
    }

    // Filter dropdown functionality
    filterBtn.addEventListener('click', function() {
        console.log('Opening brand filter dropdown');
        openBrandFilterModal();
    });

    function openBrandFilterModal() {
        console.log('Brand filter modal would open here');
        // Implementation would show filter options
    }

    // Add brand button
    addBrandBtn.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Opening add brand form');
        openAddBrandModal();
    });

    function openAddBrandModal() {
        console.log('Add brand modal would open here');
        // Implementation would show add brand form
    }

    // Pagination
    document.querySelectorAll('.pagination-btn:not(.disabled)').forEach(btn => {
        btn.addEventListener('click', function() {
            if(!this.classList.contains('active')) {
                const page = this.textContent.trim();
                console.log('Navigating to page:', page);
                loadBrandPage(page);
            }
        });
    });

    function loadBrandPage(page) {
        showLoading();
        setTimeout(() => {
            hideLoading();
            updateBrandPaginationUI(page);
        }, 800);
    }

    function updateBrandPaginationUI(page) {
        document.querySelectorAll('.pagination-btn').forEach(btn => {
            btn.classList.remove('active');
            if(btn.textContent.trim() === page.toString()) {
                btn.classList.add('active');
            }
        });
    }

    // Initialize the view
    fetchBrands();
});
</script>
@endpush