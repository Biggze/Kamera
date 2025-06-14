@extends('layouts.admin')

@section('title', 'Kelola Ulasan - Admin')

@push('styles')
<style>
/* Review Dashboard */
.review-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 2rem;
    gap: 1rem;
    max-width: 100%;
    overflow-x: hidden;
}

.review-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--dark);
    margin: 0;
    white-space: nowrap;
}

.review-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.search-box {
    position: relative;
    width: 100%;
    max-width: 300px;
}

.search-input {
    padding: 0.75rem 1rem 0.75rem 2.5rem;
    border: 1px solid var(--gray);
    border-radius: 8px;
    background: var(--white);
    font-size: 0.875rem;
    width: 100%;
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
    white-space: nowrap;
}

.filter-btn:hover {
    border-color: var(--primary);
    background: var(--primary-light);
}

/* Review Stats */
.review-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
    width: 100%;
}

.review-stat-card {
    background: var(--white);
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    min-width: 0;
}

.review-stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
}

.review-stat-card.total::before {
    background: var(--primary);
}
.review-stat-card.positive::before {
    background: var(--success);
}
.review-stat-card.neutral::before {
    background: var(--warning);
}
.review-stat-card.negative::before {
    background: var(--danger);
}

.stat-value {
    display: flex;
    align-items: flex-end;
    gap: 0.5rem;
    margin-bottom: 0.5rem;
}

.stat-number {
    font-size: 1.75rem;
    font-weight: 700;
    line-height: 1;
}

.stat-change {
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    border-radius: 50px;
    font-weight: 500;
}

.stat-change.positive {
    background: rgba(72, 187, 120, 0.1);
    color: var(--success);
}
.stat-change.negative {
    background: rgba(245, 101, 101, 0.1);
    color: var(--danger);
}

.stat-label {
    font-size: 0.875rem;
    color: var(--gray-darker);
    margin-bottom: 0.5rem;
}

.stat-comparison {
    font-size: 0.75rem;
    color: var(--gray-darker);
}

/* Review Table */
.review-table-card {
    background: var(--white);
    border-radius: 12px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray);
    padding: 1.5rem;
    width: 100%;
    overflow: hidden;
}

.table-header {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1.5rem;
    gap: 1rem;
    width: 100%;
}

.table-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--dark);
    white-space: nowrap;
}

.table-actions {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.table-actions select {
    max-width: 180px;
}

.table-responsive {
    width: 100%;
    overflow-x: auto;
}

.review-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.875rem;
    table-layout: fixed;
}

.review-table th {
    padding: 1rem;
    text-align: left;
    border-bottom: 2px solid var(--gray);
    font-weight: 600;
    color: var(--gray-darker);
    text-transform: uppercase;
    letter-spacing: 0.025em;
    white-space: nowrap;
}

.review-table td {
    padding: 1rem;
    border-bottom: 1px solid var(--gray-light);
    vertical-align: middle;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Review Rating */
.review-rating {
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.star {
    color: var(--gray-light);
    font-size: 1rem;
}

.star.filled {
    color: var(--warning);
}

/* Review Content */
.review-content {
    max-width: 300px;
    white-space: normal;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

/* Review Status */
.review-status {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 500;
    text-transform: capitalize;
}

.review-status.published {
    background: rgba(72, 187, 120, 0.1);
    color: var(--success);
}
.review-status.pending {
    background: rgba(156, 163, 175, 0.1);
    color: var(--gray-darker);
}
.review-status.hidden {
    background: rgba(245, 101, 101, 0.1);
    color: var(--danger);
}

/* Review Actions */
.review-actions {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.action-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.2s ease;
    background: transparent;
}

.action-btn.view {
    color: var(--primary);
}

.action-btn.view:hover {
    background: var(--primary-light);
}

.action-btn.approve {
    color: var(--success);
}

.action-btn.approve:hover {
    background: rgba(72, 187, 120, 0.1);
}

.action-btn.reject {
    color: var(--danger);
}

.action-btn.reject:hover {
    background: rgba(245, 101, 101, 0.1);
}

.action-btn.delete {
    color: var(--danger);
}

.action-btn.delete:hover {
    background: rgba(245, 101, 101, 0.1);
}

.action-btn i {
    width: 16px;
    height: 16px;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .review-content {
        max-width: 200px;
    }
}

@media (max-width: 1024px) {
    .review-header {
        flex-direction: column;
        align-items: stretch;
    }
    
    .review-actions {
        width: 100%;
    }
    
    .search-box {
        max-width: 100%;
    }
    
    .review-content {
        max-width: 150px;
    }
}

@media (max-width: 768px) {
    .review-stats {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .review-table-card {
        padding: 1rem;
    }
    
    .review-table th,
    .review-table td {
        padding: 0.75rem 0.5rem;
    }
    
    /* Sembunyikan beberapa kolom di mobile */
    .review-table th:nth-child(4),
    .review-table td:nth-child(4),
    .review-table th:nth-child(5),
    .review-table td:nth-child(5) {
        display: none;
    }
    
    /* Sesuaikan lebar kolom yang tersisa */
    .review-table th:nth-child(1),
    .review-table td:nth-child(1) {
        width: 30px;
    }
    
    .review-table th:nth-child(2),
    .review-table td:nth-child(2) {
        width: 120px;
    }
    
    .review-table th:nth-child(3),
    .review-table td:nth-child(3) {
        width: 150px;
    }
    
    .review-table th:nth-child(6),
    .review-table td:nth-child(6) {
        width: 80px;
    }
    
    .review-table th:nth-child(7),
    .review-table td:nth-child(7) {
        width: 100px;
    }
    
    .review-table th:nth-child(8),
    .review-table td:nth-child(8) {
        width: 100px;
    }
}

@media (max-width: 576px) {
    .review-stats {
        grid-template-columns: 1fr;
    }
    
    .review-actions {
        flex-direction: column;
        align-items: stretch;
    }
    
    .filter-btn {
        width: 100%;
        justify-content: center;
    }
    
    /* Sembunyikan lebih banyak kolom di mobile kecil */
    .review-table th:nth-child(3),
    .review-table td:nth-child(3) {
        display: none;
    }
}
</style>
@endpush

@section('content')
<!-- Page Header -->
<div class="review-header">
    <h1 class="review-title">Kelola Ulasan</h1>
    <div class="review-actions">
        <div class="search-box">
            <i data-feather="search" class="search-icon"></i>
            <input type="text" class="search-input" placeholder="Cari produk atau pelanggan...">
        </div>
        <div class="filter-dropdown">
            <button class="filter-btn">
                <i data-feather="filter"></i>
                Filter
            </button>
        </div>
    </div>
</div>

<!-- Review Stats -->
<div class="review-stats">
    <div class="review-stat-card total">
        <div class="stat-value">
            <div class="stat-number">342</div>
            <div class="stat-change positive">+15%</div>
        </div>
        <div class="stat-label">Total Ulasan</div>
        <div class="stat-comparison">vs 298 minggu lalu</div>
    </div>
    <div class="review-stat-card positive">
        <div class="stat-value">
            <div class="stat-number">278</div>
            <div class="stat-change positive">+12%</div>
        </div>
        <div class="stat-label">Ulasan Positif</div>
        <div class="stat-comparison">vs 248 minggu lalu</div>
    </div>
    <div class="review-stat-card neutral">
        <div class="stat-value">
            <div class="stat-number">42</div>
            <div class="stat-change negative">-3%</div>
        </div>
        <div class="stat-label">Ulasan Netral</div>
        <div class="stat-comparison">vs 45 minggu lalu</div>
    </div>
    <div class="review-stat-card negative">
        <div class="stat-value">
            <div class="stat-number">22</div>
            <div class="stat-change negative">-1%</div>
        </div>
        <div class="stat-label">Ulasan Negatif</div>
        <div class="stat-comparison">vs 23 minggu lalu</div>
    </div>
</div>

<!-- Review Table -->
<div class="review-table-card">
    <div class="table-header">
        <h3 class="table-title">Daftar Ulasan</h3>
        <div class="table-actions">
            <select class="chart-period-selector">
                <option>Semua Status</option>
                <option>Published</option>
                <option>Pending</option>
                <option>Hidden</option>
            </select>
            <select class="chart-period-selector">
                <option>Semua Rating</option>
                <option>5 Bintang</option>
                <option>4 Bintang</option>
                <option>3 Bintang</option>
                <option>2 Bintang</option>
                <option>1 Bintang</option>
            </select>
        </div>
    </div>
    
    <!-- Bulk Actions -->
    <div class="bulk-actions" id="bulkActions">
        <div class="bulk-actions-text">
            <span id="selectedCount">0</span> ulasan dipilih
        </div>
        <button class="bulk-btn">
            <i data-feather="check"></i>
            Approve
        </button>
        <button class="bulk-btn">
            <i data-feather="x"></i>
            Reject
        </button>
        <button class="bulk-btn danger">
            <i data-feather="trash-2"></i>
            Hapus
        </button>
    </div>
    
    <div class="table-responsive">
        <table class="review-table">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" id="selectAll" class="select-checkbox">
                    </th>
                    <th>ID Ulasan</th>
                    <th>Produk</th>
                    <th>Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Rating</th>
                    <th>Ulasan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="checkbox" class="select-checkbox row-checkbox">
                    </td>
                    <td class="review-id">#REV-2023-00125</td>
                    <td>
                        <div class="product-info">
                            <div class="product-name">Smartphone X Pro</div>
                            <div class="product-category">Elektronik</div>
                        </div>
                    </td>
                    <td>
                        <div class="customer-info">
                            <div class="customer-name">Andi Budiman</div>
                            <div class="customer-email">andi@example.com</div>
                        </div>
                    </td>
                    <td>
                        <div class="review-date">12 Nov 2023</div>
                    </td>
                    <td>
                        <div class="review-rating">
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                        </div>
                    </td>
                    <td>
                        <div class="review-content">
                            Produk sangat bagus, pengiriman cepat. Saya sangat puas dengan pembelian ini. Fitur-fitur yang ditawarkan lengkap sesuai dengan kebutuhan saya.
                        </div>
                    </td>
                    <td>
                        <span class="review-status published">Published</span>
                    </td>
                    <td>
                        <div class="review-actions">
                            <button class="action-btn view" title="Lihat Detail">
                                <i data-feather="eye"></i>
                            </button>
                            <button class="action-btn reject" title="Tolak">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="select-checkbox row-checkbox">
                    </td>
                    <td class="review-id">#REV-2023-00124</td>
                    <td>
                        <div class="product-info">
                            <div class="product-name">Laptop Ultra Slim</div>
                            <div class="product-category">Elektronik</div>
                        </div>
                    </td>
                    <td>
                        <div class="customer-info">
                            <div class="customer-name">Citra Dewi</div>
                            <div class="customer-email">citra@example.com</div>
                        </div>
                    </td>
                    <td>
                        <div class="review-date">11 Nov 2023</div>
                    </td>
                    <td>
                        <div class="review-rating">
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star">★</span>
                        </div>
                    </td>
                    <td>
                        <div class="review-content">
                            Produk cukup bagus, tapi baterai cepat habis. Desainnya slim dan ringan, cocok untuk dibawa bepergian.
                        </div>
                    </td>
                    <td>
                        <span class="review-status published">Published</span>
                    </td>
                    <td>
                        <div class="review-actions">
                            <button class="action-btn view" title="Lihat Detail">
                                <i data-feather="eye"></i>
                            </button>
                            <button class="action-btn reject" title="Tolak">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="select-checkbox row-checkbox">
                    </td>
                    <td class="review-id">#REV-2023-00123</td>
                    <td>
                        <div class="product-info">
                            <div class="product-name">Headphone Wireless</div>
                            <div class="product-category">Aksesoris</div>
                        </div>
                    </td>
                    <td>
                        <div class="customer-info">
                            <div class="customer-name">Eko Fajar</div>
                            <div class="customer-email">eko@example.com</div>
                        </div>
                    </td>
                    <td>
                        <div class="review-date">10 Nov 2023</div>
                    </td>
                    <td>
                        <div class="review-rating">
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                        </div>
                    </td>
                    <td>
                        <div class="review-content">
                            Kualitas suara cukup baik untuk harganya, tapi koneksi Bluetooth kadang terputus-putus.
                        </div>
                    </td>
                    <td>
                        <span class="review-status published">Published</span>
                    </td>
                    <td>
                        <div class="review-actions">
                            <button class="action-btn view" title="Lihat Detail">
                                <i data-feather="eye"></i>
                            </button>
                            <button class="action-btn reject" title="Tolak">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="select-checkbox row-checkbox">
                    </td>
                    <td class="review-id">#REV-2023-00122</td>
                    <td>
                        <div class="product-info">
                            <div class="product-name">Smart TV 55"</div>
                            <div class="product-category">Elektronik</div>
                        </div>
                    </td>
                    <td>
                        <div class="customer-info">
                            <div class="customer-name">Gita Hartono</div>
                            <div class="customer-email">gita@example.com</div>
                        </div>
                    </td>
                    <td>
                        <div class="review-date">9 Nov 2023</div>
                    </td>
                    <td>
                        <div class="review-rating">
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                        </div>
                    </td>
                    <td>
                        <div class="review-content">
                            Gambar kurang tajam, warna terlalu terang. Tidak sesuai ekspektasi untuk harga segini.
                        </div>
                    </td>
                    <td>
                        <span class="review-status pending">Pending</span>
                    </td>
                    <td>
                        <div class="review-actions">
                            <button class="action-btn view" title="Lihat Detail">
                                <i data-feather="eye"></i>
                            </button>
                            <button class="action-btn approve" title="Setujui">
                                <i data-feather="check"></i>
                            </button>
                            <button class="action-btn reject" title="Tolak">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="select-checkbox row-checkbox">
                    </td>
                    <td class="review-id">#REV-2023-00121</td>
                    <td>
                        <div class="product-info">
                            <div class="product-name">Kamera Mirrorless</div>
                            <div class="product-category">Elektronik</div>
                        </div>
                    </td>
                    <td>
                        <div class="customer-info">
                            <div class="customer-name">Indra Jaya</div>
                            <div class="customer-email">indra@example.com</div>
                        </div>
                    </td>
                    <td>
                        <div class="review-date">8 Nov 2023</div>
                    </td>
                    <td>
                        <div class="review-rating">
                            <span class="star filled">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                        </div>
                    </td>
                    <td>
                        <div class="review-content">
                            Produk datang dalam keadaan rusak. Lensa tidak berfungsi dengan baik. Sangat kecewa!
                        </div>
                    </td>
                    <td>
                        <span class="review-status hidden">Hidden</span>
                    </td>
                    <td>
                        <div class="review-actions">
                            <button class="action-btn view" title="Lihat Detail">
                                <i data-feather="eye"></i>
                            </button>
                            <button class="action-btn approve" title="Setujui">
                                <i data-feather="check"></i>
                            </button>
                            <button class="action-btn delete" title="Hapus">
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
            Menampilkan 1-5 dari 342 ulasan
        </div>
        <div class="pagination">
            <button class="pagination-btn disabled">
                <i data-feather="chevron-left"></i>
            </button>
            <button class="pagination-btn active">1</button>
            <button class="pagination-btn">2</button>
            <button class="pagination-btn">3</button>
            <button class="pagination-btn">...</button>
            <button class="pagination-btn">69</button>
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
    const statusFilter = document.querySelectorAll('.chart-period-selector');
    
    // Create loading indicator
    const loadingIndicator = document.createElement('div');
    loadingIndicator.className = 'admin-loading';
    loadingIndicator.innerHTML = `
        <div class="admin-loading-spinner"></div>
        <span>Memuat data ulasan...</span>
    `;

    // Select all functionality
    selectAllCheckbox.addEventListener('change', function() {
        const isChecked = this.checked;
        rowCheckboxes.forEach(checkbox => {
            checkbox.checked = isChecked;
        });
        
        // Update bulk actions visibility
        updateBulkActions();
    });

    // Row checkbox functionality
    rowCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            // Uncheck "select all" if any row is unchecked
            if (!this.checked && selectAllCheckbox.checked) {
                selectAllCheckbox.checked = false;
            }
            // Check "select all" if all rows are checked
            else if (Array.from(rowCheckboxes).every(cb => cb.checked)) {
                selectAllCheckbox.checked = true;
            }
            
            updateBulkActions();
        });
    });

    // Update bulk actions based on selected rows
    function updateBulkActions() {
        const selectedRows = document.querySelectorAll('.row-checkbox:checked');
        const count = selectedRows.length;
        
        selectedCount.textContent = count;
        
        if (count > 0) {
            bulkActions.classList.add('show');
        } else {
            bulkActions.classList.remove('show');
        }
    }

    // Search functionality
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('.review-table tbody tr');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Filter dropdown functionality
    filterBtn.addEventListener('click', function() {
        // In a real app, this would open a filter modal/dropdown
        console.log('Filter button clicked - would open filter options');
    });

    // Status filter functionality
    statusFilter.forEach(filter => {
        filter.addEventListener('change', function() {
            const filterType = this.parentElement.classList.contains('table-actions') ? 
                              (this.selectedIndex === 0 ? 'status' : 'rating') : 'status';
            const value = this.value.toLowerCase();
            const rows = document.querySelectorAll('.review-table tbody tr');
            
            if (value.includes('semua')) {
                rows.forEach(row => row.style.display = '');
                return;
            }
            
            rows.forEach(row => {
                if (filterType === 'status') {
                    const statusElement = row.querySelector('.review-status');
                    if (statusElement) {
                        const rowStatus = statusElement.textContent.toLowerCase();
                        if (rowStatus.includes(value)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    }
                } else {
                    const ratingElement = row.querySelector('.review-rating');
                    if (ratingElement) {
                        const starCount = ratingElement.querySelectorAll('.star.filled').length;
                        if (parseInt(value) === starCount) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    }
                }
            });
        });
    });

    // Action buttons functionality
    document.querySelectorAll('.action-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const action = this.classList.contains('view') ? 'view' :
                          this.classList.contains('approve') ? 'approve' :
                          this.classList.contains('reject') ? 'reject' :
                          this.classList.contains('delete') ? 'delete' : '';
            
            const row = this.closest('tr');
            const reviewId = row.querySelector('.review-id').textContent;
            
            switch(action) {
                case 'view':
                    // View details
                    console.log('View review:', reviewId);
                    // Example: window.location.href = `/admin/reviews/${reviewId}`;
                    break;
                case 'approve':
                    // Approve review
                    if (confirm(`Setujui ulasan ${reviewId}?`)) {
                        console.log('Approving review:', reviewId);
                        // In a real app, this would make an API call
                        row.querySelector('.review-status').textContent = 'Published';
                        row.querySelector('.review-status').className = 'review-status published';
                    }
                    break;
                case 'reject':
                    // Reject review
                    if (confirm(`Tolak ulasan ${reviewId}?`)) {
                        console.log('Rejecting review:', reviewId);
                        // In a real app, this would make an API call
                        row.querySelector('.review-status').textContent = 'Hidden';
                        row.querySelector('.review-status').className = 'review-status hidden';
                    }
                    break;
                case 'delete':
                    // Delete review
                    if (confirm(`Hapus ulasan ${reviewId} secara permanen?`)) {
                        console.log('Deleting review:', reviewId);
                        // In a real app, this would make an API call
                        row.remove();
                    }
                    break;
            }
        });
    });

    // Pagination functionality
    document.querySelectorAll('.pagination-btn').forEach(btn => {
        if (btn.classList.contains('disabled')) return;
        
        btn.addEventListener('click', function() {
            if (this.classList.contains('active')) return;
            
            // In a real app, this would load the corresponding page
            console.log('Loading page:', this.textContent);
            
            // Show loading indicator
            document.querySelector('.review-table-card').appendChild(loadingIndicator);
            
            // Simulate loading
            setTimeout(() => {
                // Remove loading indicator
                const loading = document.querySelector('.admin-loading');
                if (loading) loading.remove();
                
                // Update active page
                document.querySelectorAll('.pagination-btn').forEach(b => {
                    b.classList.remove('active');
                });
                this.classList.add('active');
            }, 1000);
        });
    });

    // Bulk action buttons
    document.querySelectorAll('.bulk-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const selected = Array.from(document.querySelectorAll('.row-checkbox:checked'))
                                .map(cb => cb.closest('tr').querySelector('.review-id').textContent);
            
            if (selected.length === 0) return;
            
            if (this.classList.contains('danger')) {
                // Delete action
                if (confirm(`Anda yakin ingin menghapus ${selected.length} ulasan terpilih?`)) {
                    console.log('Deleting reviews:', selected);
                    // In a real app, this would make an API call to delete reviews
                }
            } else if (this.textContent.includes('Approve')) {
                // Approve action
                console.log('Approving reviews:', selected);
                // In a real app, this would make an API call to approve reviews
            } else {
                // Reject action
                console.log('Rejecting reviews:', selected);
                // In a real app, this would make an API call to reject reviews
            }
        });
    });
});
</script>

<style>
/* Loading Indicator */

/* Bulk Actions Styles */
.bulk-actions {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 1rem;
    background-color: rgba(102, 126, 234, 0.1); /* Light primary color */
    border-radius: 8px;
    margin-bottom: 1rem;
    border: 1px solid rgba(102, 126, 234, 0.2);
    display: none;
}

.bulk-actions.show {
    display: flex;
    animation: fadeIn 0.3s ease;
}

.bulk-actions-text {
    font-size: 0.875rem;
    font-weight: 500;
    color: var(--primary);
    margin-right: 0.5rem;
}

.bulk-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    font-size: 0.875rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    border: 1px solid transparent;
    background-color: white;
}

.bulk-btn i {
    width: 16px;
    height: 16px;
}

/* Primary Bulk Button */
.bulk-btn.primary {
    border-color: var(--primary);
    color: var(--primary);
}

.bulk-btn.primary:hover {
    background-color: var(--primary);
    color: white;
}

/* Success Bulk Button */
.bulk-btn.success {
    border-color: var(--success);
    color: var(--success);
}

.bulk-btn.success:hover {
    background-color: var(--success);
    color: white;
}

/* Danger Bulk Button */
.bulk-btn.danger {
    border-color: var(--danger);
    color: var(--danger);
}

.bulk-btn.danger:hover {
    background-color: var(--danger);
    color: white;
}

/* Warning Bulk Button */
.bulk-btn.warning {
    border-color: var(--warning);
    color: var(--warning);
}

.bulk-btn.warning:hover {
    background-color: var(--warning);
    color: white;
}

/* Disabled State */
.bulk-btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Style untuk Chart Period Selector */
.chart-period-selector {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    padding: 0.5rem 2rem 0.5rem 1rem;
    border: 1px solid var(--gray);
    border-radius: 6px;
    background-color: white;
    font-size: 0.875rem;
    color: var(--dark);
    cursor: pointer;
    transition: all 0.2s ease;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 1rem;
    min-width: 120px;
}

.chart-period-selector:hover {
    border-color: var(--primary);
    box-shadow: 0 0 0 1px var(--primary);
}

.chart-period-selector:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 2px rgba(102, 126, 234, 0.2);
}

/* Dark Mode Variant */
.chart-period-selector.dark {
    background-color: var(--dark);
    border-color: var(--gray-darker);
    color: white;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23e2e8f0' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
}

/* Small Size */
.chart-period-selector.sm {
    padding: 0.375rem 1.75rem 0.375rem 0.75rem;
    font-size: 0.75rem;
    min-width: 100px;
    background-size: 0.75rem;
    background-position: right 0.5rem center;
}

/* Large Size */
.chart-period-selector.lg {
    padding: 0.625rem 2.25rem 0.625rem 1.25rem;
    font-size: 1rem;
    min-width: 140px;
}

/* Disabled State */
.chart-period-selector:disabled {
    background-color: var(--gray-light);
    cursor: not-allowed;
    opacity: 0.7;
}

/* Grouped Selectors */
.select-group {
    display: flex;
    gap: 0.5rem;
}

.select-group .chart-period-selector {
    border-radius: 0;
    margin-right: -1px;
}

.select-group .chart-period-selector:first-child {
    border-top-left-radius: 6px;
    border-bottom-left-radius: 6px;
}

.select-group .chart-period-selector:last-child {
    border-top-right-radius: 6px;
    border-bottom-right-radius: 6px;
    margin-right: 0;
}
.admin-loading {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 2rem;
    background: rgba(255, 255, 255, 0.8);
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 100;
}

.admin-loading-spinner {
    width: 40px;
    height: 40px;
    border: 4px solid rgba(102, 126, 234, 0.2);
    border-radius: 50%;
    border-top-color: var(--primary);
    animation: spin 1s ease-in-out infinite;
    margin-bottom: 1rem;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* Pagination */
.pagination-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 1.5rem;
    padding-top: 1rem;
    border-top: 1px solid var(--gray-light);
}

.pagination-info {
    font-size: 0.875rem;
    color: var(--gray-darker);
}

.pagination {
    display: flex;
    gap: 0.5rem;
}

.pagination-btn {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--gray);
    border-radius: 6px;
    background: var(--white);
    color: var(--dark);
    cursor: pointer;
    transition: all 0.2s ease;
}

.pagination-btn:hover:not(.disabled):not(.active) {
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

/* Product Info */
.product-info {
    display: flex;
    flex-direction: column;
}

.product-name {
    font-weight: 500;
    color: var(--dark);
}

.product-category {
    font-size: 0.75rem;
    color: var(--gray-darker);
}

/* Customer Info */
.customer-info {
    display: flex;
    flex-direction: column;
}

.customer-name {
    font-weight: 500;
    color: var(--dark);
}

.customer-email {
    font-size: 0.75rem;
    color: var(--gray-darker);
}
</style>
@endpush