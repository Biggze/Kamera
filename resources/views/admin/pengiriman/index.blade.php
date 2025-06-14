@extends('layouts.admin')

@section('title', 'Kelola Pengiriman - Admin')

@push('styles')
<style>

.shipping-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 2rem;
    gap: 1rem;
}

.shipping-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--dark);
    margin: 0;
}

.shipping-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.search-box {
    position: relative;
    width: 300px;
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
}

.filter-btn:hover {
    border-color: var(--primary);
    background: var(--primary-light);
}

.add-shipping-btn {
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

.add-shipping-btn:hover {
    background: var(--primary-dark);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
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

/* Shipping Stats */
.shipping-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.shipping-stat-card {
    background: var(--white);
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.shipping-stat-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.shipping-stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
}

.shipping-stat-card.total::before {
    background: var(--primary);
}
.shipping-stat-card.delivered::before {
    background: var(--success);
}
.shipping-stat-card.progress::before {
    background: var(--warning);
}
.shipping-stat-card.problem::before {
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

/* Shipping Table */
.shipping-table-card {
    background: var(--white);
    border-radius: 12px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray);
    padding: 1.5rem;
}

.table-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1.5rem;
}

.table-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--dark);
}

.table-actions {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

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

.table-responsive {
    overflow-x: auto;
}

.shipping-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.875rem;
}

.shipping-table th {
    padding: 1rem;
    text-align: left;
    border-bottom: 2px solid var(--gray);
    font-weight: 600;
    color: var(--gray-darker);
    text-transform: uppercase;
    letter-spacing: 0.025em;
    white-space: nowrap;
}

.shipping-table td {
    padding: 1rem;
    border-bottom: 1px solid var(--gray-light);
    vertical-align: middle;
}

.shipping-id {
    font-weight: 600;
    color: var(--primary);
}

.order-id {
    font-weight: 500;
    color: var(--dark);
}

.customer-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.customer-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--gray-light);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    flex-shrink: 0;
}

.customer-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.customer-avatar.initials {
    font-weight: 600;
    color: var(--primary);
}

.customer-name {
    font-weight: 500;
    color: var(--dark);
}

.shipping-method {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.shipping-method-icon {
    width: 24px;
    height: 24px;
    border-radius: 4px;
    background: var(--gray-light);
    display: flex;
    align-items: center;
    justify-content: center;
}

.shipping-address {
    max-width: 250px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.shipping-date {
    font-size: 0.75rem;
    color: var(--gray-darker);
}

.shipping-status {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 500;
    text-transform: capitalize;
}

.shipping-status.pending {
    background: rgba(156, 163, 175, 0.1);
    color: var(--gray-darker);
}
.shipping-status.processing {
    background: rgba(56, 178, 172, 0.1);
    color: var(--teal);
}
.shipping-status.shipped {
    background: rgba(102, 126, 234, 0.1);
    color: var(--primary);
}
.shipping-status.delivered {
    background: rgba(72, 187, 120, 0.1);
    color: var(--success);
}
.shipping-status.failed {
    background: rgba(245, 101, 101, 0.1);
    color: var(--danger);
}
.shipping-status.returned {
    background: rgba(237, 137, 54, 0.1);
    color: var(--warning);
}

.shipping-actions {
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

.action-btn.edit {
    color: var(--warning);
}

.action-btn.edit:hover {
    background: rgba(237, 137, 54, 0.1);
}

.action-btn.track {
    color: var(--info);
}

.action-btn.track:hover {
    background: rgba(56, 178, 172, 0.1);
}

.action-btn.print {
    color: var(--gray-darker);
}

.action-btn.print:hover {
    background: var(--gray-light);
}

.action-btn i {
    width: 16px;
    height: 16px;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .shipping-header {
        flex-direction: column;
        align-items: stretch;
        gap: 1rem;
    }
    
    .shipping-actions {
        flex-wrap: wrap;
        justify-content: space-between;
    }
    
    .search-box {
        width: 100%;
    }
}

@media (max-width: 768px) {
    .shipping-stats {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .shipping-table-card {
        padding: 1rem;
    }
    
    .shipping-table th,
    .shipping-table td {
        padding: 0.75rem 0.5rem;
    }
}

@media (max-width: 576px) {
    .shipping-stats {
        grid-template-columns: 1fr;
    }
    
    .shipping-actions {
        flex-direction: column;
        align-items: stretch;
    }
}
</style>
@endpush

@section('content')
<!-- Page Header -->
<div class="shipping-header">
    <h1 class="shipping-title">Kelola Pengiriman</h1>
    <div class="shipping-actions">
        <div class="search-box">
            <i data-feather="search" class="search-icon"></i>
            <input type="text" class="search-input" placeholder="Cari nomor resi atau pelanggan...">
        </div>
        <div class="filter-dropdown">
            <button class="filter-btn">
                <i data-feather="filter"></i>
                Filter
            </button>
        </div>
        <a href="#" class="add-shipping-btn">
            <i data-feather="plus"></i>
            Tambah Pengiriman
        </a>
    </div>
</div>

<!-- Shipping Stats -->
<div class="shipping-stats">
    <div class="shipping-stat-card total">
        <div class="stat-value">
            <div class="stat-number">128</div>
            <div class="stat-change positive">+12%</div>
        </div>
        <div class="stat-label">Total Pengiriman</div>
        <div class="stat-comparison">vs 114 minggu lalu</div>
    </div>
    <div class="shipping-stat-card delivered">
        <div class="stat-value">
            <div class="stat-number">98</div>
            <div class="stat-change positive">+8%</div>
        </div>
        <div class="stat-label">Terkirim</div>
        <div class="stat-comparison">vs 91 minggu lalu</div>
    </div>
    <div class="shipping-stat-card progress">
        <div class="stat-value">
            <div class="stat-number">24</div>
            <div class="stat-change negative">-3%</div>
        </div>
        <div class="stat-label">Dalam Proses</div>
        <div class="stat-comparison">vs 27 minggu lalu</div>
    </div>
    <div class="shipping-stat-card problem">
        <div class="stat-value">
            <div class="stat-number">6</div>
            <div class="stat-change negative">-1%</div>
        </div>
        <div class="stat-label">Masalah</div>
        <div class="stat-comparison">vs 7 minggu lalu</div>
    </div>
</div>

<!-- Shipping Table -->
<div class="shipping-table-card">
    <div class="table-header">
        <h3 class="table-title">Daftar Pengiriman</h3>
        <div class="table-actions">
            <select class="chart-period-selector">
                <option>Semua Status</option>
                <option>Terkirim</option>
                <option>Dalam Proses</option>
                <option>Pending</option>
                <option>Masalah</option>
            </select>
        </div>
    </div>
    
    <!-- Bulk Actions -->
    <div class="bulk-actions" id="bulkActions">
        <div class="bulk-actions-text">
            <span id="selectedCount">0</span> pengiriman dipilih
        </div>
        <button class="bulk-btn">
            <i data-feather="truck"></i>
            Update Status
        </button>
        <button class="bulk-btn">
            <i data-feather="printer"></i>
            Cetak Label
        </button>
        <button class="bulk-btn danger">
            <i data-feather="trash-2"></i>
            Batalkan
        </button>
    </div>
    
    <div class="table-responsive">
        <table class="shipping-table">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" id="selectAll" class="select-checkbox">
                    </th>
                    <th>ID Pengiriman</th>
                    <th>Pesanan</th>
                    <th>Pelanggan</th>
                    <th>Metode</th>
                    <th>Alamat</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="checkbox" class="select-checkbox row-checkbox">
                    </td>
                    <td class="shipping-id">#SHIP-2023-00125</td>
                    <td class="order-id">#ORD-2023-00125</td>
                    <td>
                        <div class="customer-info">
                            <div class="customer-avatar">
                                <img src="https://via.placeholder.com/36x36/667eea/ffffff?text=AB" alt="Customer">
                            </div>
                            <div class="customer-name">Andi Budiman</div>
                        </div>
                    </td>
                    <td>
                        <div class="shipping-method">
                            <div class="shipping-method-icon">
                                <i data-feather="truck"></i>
                            </div>
                            <span>JNE Reguler</span>
                        </div>
                    </td>
                    <td class="shipping-address">Jl. Merdeka No. 123, Jakarta Pusat, 10110</td>
                    <td>
                        <div class="shipping-date">12 Nov 2023</div>
                    </td>
                    <td>
                        <span class="shipping-status delivered">Terkirim</span>
                    </td>
                    <td>
                        <div class="shipping-actions">
                            <button class="action-btn view" title="Lihat Detail">
                                <i data-feather="eye"></i>
                            </button>
                            <button class="action-btn print" title="Cetak Label">
                                <i data-feather="printer"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="select-checkbox row-checkbox">
                    </td>
                    <td class="shipping-id">#SHIP-2023-00124</td>
                    <td class="order-id">#ORD-2023-00124</td>
                    <td>
                        <div class="customer-info">
                            <div class="customer-avatar initials">CD</div>
                            <div class="customer-name">Citra Dewi</div>
                        </div>
                    </td>
                    <td>
                        <div class="shipping-method">
                            <div class="shipping-method-icon">
                                <i data-feather="truck"></i>
                            </div>
                            <span>SiCepat</span>
                        </div>
                    </td>
                    <td class="shipping-address">Jl. Sudirman Kav. 1, Jakarta Selatan, 12190</td>
                    <td>
                        <div class="shipping-date">12 Nov 2023</div>
                    </td>
                    <td>
                        <span class="shipping-status shipped">Dikirim</span>
                    </td>
                    <td>
                        <div class="shipping-actions">
                            <button class="action-btn view" title="Lihat Detail">
                                <i data-feather="eye"></i>
                            </button>
                            <button class="action-btn track" title="Lacak">
                                <i data-feather="map-pin"></i>
                            </button>
                            <button class="action-btn print" title="Cetak Label">
                                <i data-feather="printer"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="select-checkbox row-checkbox">
                    </td>
                    <td class="shipping-id">#SHIP-2023-00123</td>
                    <td class="order-id">#ORD-2023-00123</td>
                    <td>
                        <div class="customer-info">
                            <div class="customer-avatar">
                                <img src="https://via.placeholder.com/36x36/48bb78/ffffff?text=EF" alt="Customer">
                            </div>
                            <div class="customer-name">Eko Fajar</div>
                        </div>
                    </td>
                    <td>
                        <div class="shipping-method">
                            <div class="shipping-method-icon">
                                <i data-feather="truck"></i>
                            </div>
                            <span>J&T Express</span>
                        </div>
                    </td>
                    <td class="shipping-address">Jl. Gatot Subroto No. 45, Jakarta Barat, 11470</td>
                    <td>
                        <div class="shipping-date">11 Nov 2023</div>
                    </td>
                    <td>
                        <span class="shipping-status processing">Proses</span>
                    </td>
                    <td>
                        <div class="shipping-actions">
                            <button class="action-btn view" title="Lihat Detail">
                                <i data-feather="eye"></i>
                            </button>
                            <button class="action-btn edit" title="Edit">
                                <i data-feather="edit"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="select-checkbox row-checkbox">
                    </td>
                    <td class="shipping-id">#SHIP-2023-00122</td>
                    <td class="order-id">#ORD-2023-00122</td>
                    <td>
                        <div class="customer-info">
                            <div class="customer-avatar initials">GH</div>
                            <div class="customer-name">Gita Hartono</div>
                        </div>
                    </td>
                    <td>
                        <div class="shipping-method">
                            <div class="shipping-method-icon">
                                <i data-feather="truck"></i>
                            </div>
                            <span>Ninja Express</span>
                        </div>
                    </td>
                    <td class="shipping-address">Jl. Thamrin No. 10, Jakarta Pusat, 10350</td>
                    <td>
                        <div class="shipping-date">11 Nov 2023</div>
                    </td>
                    <td>
                        <span class="shipping-status pending">Pending</span>
                    </td>
                    <td>
                        <div class="shipping-actions">
                            <button class="action-btn view" title="Lihat Detail">
                                <i data-feather="eye"></i>
                            </button>
                            <button class="action-btn edit" title="Edit">
                                <i data-feather="edit"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="select-checkbox row-checkbox">
                    </td>
                    <td class="shipping-id">#SHIP-2023-00121</td>
                    <td class="order-id">#ORD-2023-00121</td>
                    <td>
                        <div class="customer-info">
                            <div class="customer-avatar">
                                <img src="https://via.placeholder.com/36x36/ed8936/ffffff?text=IJ" alt="Customer">
                            </div>
                            <div class="customer-name">Indra Jaya</div>
                        </div>
                    </td>
                    <td>
                        <div class="shipping-method">
                            <div class="shipping-method-icon">
                                <i data-feather="truck"></i>
                            </div>
                            <span>Pos Indonesia</span>
                        </div>
                    </td>
                    <td class="shipping-address">Jl. Kebon Sirih No. 5, Jakarta Pusat, 10340</td>
                    <td>
                        <div class="shipping-date">10 Nov 2023</div>
                    </td>
                    <td>
                        <span class="shipping-status failed">Gagal</span>
                    </td>
                    <td>
                        <div class="shipping-actions">
                            <button class="action-btn view" title="Lihat Detail">
                                <i data-feather="eye"></i>
                            </button>
                            <button class="action-btn edit" title="Edit">
                                <i data-feather="edit"></i>
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
            Menampilkan 1-5 dari 128 pengiriman
        </div>
        <div class="pagination">
            <button class="pagination-btn disabled">
                <i data-feather="chevron-left"></i>
            </button>
            <button class="pagination-btn active">1</button>
            <button class="pagination-btn">2</button>
            <button class="pagination-btn">3</button>
            <button class="pagination-btn">...</button>
            <button class="pagination-btn">26</button>
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
    const addShippingBtn = document.querySelector('.add-shipping-btn');
    const statusFilter = document.querySelector('.chart-period-selector');
    
    // Create loading indicator
    const loadingIndicator = document.createElement('div');
    loadingIndicator.className = 'admin-loading';
    loadingIndicator.innerHTML = `
        <div class="admin-loading-spinner"></div>
        <span>Memuat data pengiriman...</span>
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
        const rows = document.querySelectorAll('.shipping-table tbody tr');
        
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
    statusFilter.addEventListener('change', function() {
        const status = this.value.toLowerCase();
        const rows = document.querySelectorAll('.shipping-table tbody tr');
        
        if (status === 'semua status') {
            rows.forEach(row => row.style.display = '');
            return;
        }
        
        rows.forEach(row => {
            const statusElement = row.querySelector('.shipping-status');
            if (statusElement) {
                const rowStatus = statusElement.textContent.toLowerCase();
                if (rowStatus.includes(status)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    });

    // Add shipping button functionality
    addShippingBtn.addEventListener('click', function(e) {
        e.preventDefault();
        // In a real app, this would open a modal/form to add new shipping
        console.log('Add new shipping button clicked');
        // Example: window.location.href = '/admin/shipping/create';
    });

    // Action buttons functionality
    document.querySelectorAll('.action-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const action = this.classList.contains('view') ? 'view' :
                          this.classList.contains('edit') ? 'edit' :
                          this.classList.contains('track') ? 'track' :
                          this.classList.contains('print') ? 'print' : '';
            
            const row = this.closest('tr');
            const shippingId = row.querySelector('.shipping-id').textContent;
            
            switch(action) {
                case 'view':
                    // View details
                    console.log('View shipping:', shippingId);
                    // Example: window.location.href = `/admin/shipping/${shippingId}`;
                    break;
                case 'edit':
                    // Edit shipping
                    console.log('Edit shipping:', shippingId);
                    break;
                case 'track':
                    // Track shipping
                    console.log('Track shipping:', shippingId);
                    break;
                case 'print':
                    // Print label
                    console.log('Print label for:', shippingId);
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
            document.querySelector('.shipping-table-card').appendChild(loadingIndicator);
            
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
                                .map(cb => cb.closest('tr').querySelector('.shipping-id').textContent);
            
            if (selected.length === 0) return;
            
            if (this.classList.contains('danger')) {
                // Delete action
                if (confirm(`Anda yakin ingin membatalkan ${selected.length} pengiriman terpilih?`)) {
                    console.log('Canceling shipments:', selected);
                    // In a real app, this would make an API call to cancel shipments
                }
            } else if (this.textContent.includes('Update')) {
                // Update status action
                console.log('Updating status for:', selected);
                // In a real app, this would open a status update modal
            } else {
                // Print labels action
                console.log('Printing labels for:', selected);
            }
        });
    });
});
</script>

<style>
/* Loading Indicator */
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
</style>
@endpush