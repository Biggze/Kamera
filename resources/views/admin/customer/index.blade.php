@extends('layouts.admin')

@section('title', 'Kelola Pelanggan - Admin')

@push('styles')

<style>

.customers-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 2rem;
    gap: 1rem;
}

.customers-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--dark);
    margin: 0;
}

.customers-actions {
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

.add-customer-btn {
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

.add-customer-btn:hover {
    background: var(--primary-dark);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

/* Customers Stats */
.customers-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.customer-stat-card {
    background: var(--white);
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.customer-stat-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.customer-stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
}

.customer-stat-card.total::before {
    background: var(--primary);
}
.customer-stat-card.active::before {
    background: var(--success);
}
.customer-stat-card.new::before {
    background: var(--info);
}
.customer-stat-card.inactive::before {
    background: var(--warning);
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

/* Customers Table */
.customers-table-card {
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

.customers-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.875rem;
}

.customers-table th {
    padding: 1rem;
    text-align: left;
    border-bottom: 2px solid var(--gray);
    font-weight: 600;
    color: var(--gray-darker);
    text-transform: uppercase;
    letter-spacing: 0.025em;
    white-space: nowrap;
}

.customers-table td {
    padding: 1rem;
    border-bottom: 1px solid var(--gray-light);
    vertical-align: middle;
}

.customer-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.customer-avatar {
    width: 40px;
    height: 40px;
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

.customer-details {
    min-width: 0;
}

.customer-name {
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 0.25rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.customer-email {
    font-size: 0.75rem;
    color: var(--gray-darker);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.customer-phone {
    font-weight: 500;
    color: var(--dark);
    white-space: nowrap;
}

.customer-join-date {
    font-size: 0.75rem;
    color: var(--gray-darker);
}

.customer-status {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 500;
    text-transform: capitalize;
}

.customer-status.active {
    background: rgba(72, 187, 120, 0.1);
    color: var(--success);
}
.customer-status.inactive {
    background: rgba(245, 101, 101, 0.1);
    color: var(--danger);
}
.customer-status.new {
    background: rgba(102, 126, 234, 0.1);
    color: var(--primary);
}

.customer-orders {
    font-weight: 600;
    color: var(--dark);
}

.customer-spending {
    font-weight: 600;
    color: var(--dark);
}

.customer-actions {
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

/* Customer Segments */
.customer-segments {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
    margin-top: 2rem;
}

.segment-card {
    background: var(--white);
    border-radius: 12px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray);
    padding: 1.5rem;
}

.segment-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1.5rem;
}

.segment-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--dark);
}

.segment-view-all {
    font-size: 0.75rem;
    color: var(--primary);
    cursor: pointer;
}

.segment-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.segment-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.75rem;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.segment-item:hover {
    background: var(--gray-light);
}

.segment-item-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--gray-light);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    flex-shrink: 0;
}

.segment-item-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.segment-item-avatar.initials {
    font-weight: 600;
    color: var(--primary);
}

.segment-item-info {
    flex: 1;
    min-width: 0;
}

.segment-item-name {
    font-weight: 500;
    color: var(--dark);
    margin-bottom: 0.25rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.segment-item-meta {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.75rem;
    color: var(--gray-darker);
}

.segment-item-value {
    font-weight: 600;
    color: var(--dark);
    white-space: nowrap;
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

/* Responsive Design */
@media (max-width: 1024px) {
    .customers-header {
        flex-direction: column;
        align-items: stretch;
        gap: 1rem;
    }
    
    .customers-actions {
        flex-wrap: wrap;
        justify-content: space-between;
    }
    
    .search-box {
        width: 100%;
    }
}

@media (max-width: 768px) {
    .customers-stats {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .customer-segments {
        grid-template-columns: 1fr;
    }
    
    .customers-table-card {
        padding: 1rem;
    }
    
    .customers-table th,
    .customers-table td {
        padding: 0.75rem 0.5rem;
    }
}

@media (max-width: 576px) {
    .customers-stats {
        grid-template-columns: 1fr;
    }
    
    .customers-actions {
        flex-direction: column;
        align-items: stretch;
    }
    
    .pagination-wrapper {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
}
</style>
@endpush

@section('content')
<!-- Page Header -->
<div class="customers-header">
    <h1 class="customers-title">Kelola Pelanggan</h1>
    <div class="customers-actions">
        <div class="search-box">
            <i data-feather="search" class="search-icon"></i>
            <input type="text" class="search-input" placeholder="Cari pelanggan...">
        </div>
        <div class="filter-dropdown">
            <button class="filter-btn">
                <i data-feather="filter"></i>
                Filter
            </button>
        </div>
        <a href="{{ route('admin.customer.create') }}" class="add-customer-btn">
            <i data-feather="plus"></i>
            Tambah Pelanggan
        </a>
    </div>
</div>

<!-- Customers Stats -->
<div class="customers-stats">
    <div class="customer-stat-card total">
        <div class="stat-value">
            <div class="stat-number">1,248</div>
            <div class="stat-change positive">+8%</div>
        </div>
        <div class="stat-label">Total Pelanggan</div>
    </div>
    <div class="customer-stat-card active">
        <div class="stat-value">
            <div class="stat-number">1,024</div>
            <div class="stat-change positive">+5%</div>
        </div>
        <div class="stat-label">Pelanggan Aktif</div>
    </div>
    <div class="customer-stat-card inactive">
        <div class="stat-value">
            <div class="stat-number">100</div>
            <div class="stat-change negative">-3%</div>
        </div>
        <div class="stat-label">Tidak Aktif</div>
    </div>
</div>

<!-- Customers Table -->
<div class="customers-table-card">
    <div class="table-header">
        <h3 class="table-title">Daftar Pelanggan</h3>
        <div class="table-actions">
           <select class="chart-period-selector">
            <option value="semua">Semua</option>
            <option value="active">Aktif</option>
            <option value="new">Baru</option>
            <option value="inactive">Tidak Aktif</option>
            </select>
        </div>
    </div>
    
    <!-- Bulk Actions -->
    <div class="bulk-actions" id="bulkActions">
        <div class="bulk-actions-text">
            <span id="selectedCount">0</span> pelanggan dipilih
        </div>
        <button class="bulk-btn">
            <i data-feather="mail"></i>
            Kirim Email
        </button>
        <button class="bulk-btn">
            <i data-feather="tag"></i>
            Tambah Tag
        </button>
        <button class="bulk-btn danger">
            <i data-feather="trash-2"></i>
            Hapus
        </button>
    </div>
    
    <div class="table-responsive">
        <table class="customers-table">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" id="selectAll" class="select-checkbox">
                    </th>
                    <th>Pelanggan</th>
                    <th>Telepon</th>
                    <th>Bergabung</th>
                    <th>Status</th>
                    <th>Pesanan</th>
                    <th>Total Belanja</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
    @foreach($customers as $customer)
    <tr data-status="{{ strtolower($customer->status) }}">
        <td>
            <input type="checkbox" class="select-checkbox row-checkbox">
        </td>
        <td>
            <div class="customer-info">
                <div class="customer-avatar">
                    @if($customer->avatar)
                        <img src="{{ asset('storage/' . $customer->avatar) }}" alt="{{ $customer->name }}">
                    @else
                        <div class="customer-avatar initials">{{ substr($customer->name, 0, 2) }}</div>
                    @endif
                </div>
                <div class="customer-details">
                    <div class="customer-name">{{ $customer->name }}</div>
                    <div class="customer-email">{{ $customer->email }}</div>
                </div>
            </div>
        </td>
        <td class="customer-phone">{{ $customer->phone }}</td>
        <td>
            <div class="customer-join-date">{{ $customer->join_date->format('d M Y') }}</div>
        </td>
        <td>
            <span class="customer-status {{ $customer->status }}">{{ ucfirst($customer->status) }}</span>
        </td>
        <td class="customer-orders">{{ $customer->order_count }}</td>
        <td class="customer-spending">Rp {{ number_format($customer->total_spending, 0, ',', '.') }}</td>
        <td>
            <div class="customer-actions">
                <button class="action-btn view" title="Lihat Detail">
                    <i data-feather="eye"></i>
                </button>
                    <a href="{{ route('admin.customer.edit', $customer->id) }}" class="action-btn edit" title="Edit Pelanggan">
                        <i data-feather="edit"></i>
                    </a>
                   <form action="{{ route('admin.customer.destroy', $customer->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                            <button type="button" class="action-btn delete" title="Hapus Pelanggan" onclick="confirmDelete(this)">
                                <i data-feather="trash-2"></i>
                            </button>
                    </form>
            </div>
        </td>
    </tr>
    @endforeach
</tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="pagination-wrapper">
        <div class="pagination-info">
            Menampilkan 1-5 dari 1,248 pelanggan
        </div>
        <div class="pagination">
            <button class="pagination-btn disabled">
                <i data-feather="chevron-left"></i>
            </button>
            <button class="pagination-btn active">1</button>
            <button class="pagination-btn">2</button>
            <button class="pagination-btn">3</button>
            <button class="pagination-btn">...</button>
            <button class="pagination-btn">250</button>
            <button class="pagination-btn">
                <i data-feather="chevron-right"></i>
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(button) {
    Swal.fire({
        title: 'Hapus Pelanggan?',
        text: "Anda tidak akan bisa mengembalikan data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            button.closest('form').submit();
        }
    });
}
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
    const addCustomerBtn = document.querySelector('.add-customer-btn');
    const statusFilter = document.querySelector('.chart-period-selector');
    const viewAllLinks = document.querySelectorAll('.segment-view-all');
    
    // Create loading indicator
    const loadingIndicator = document.createElement('div');
    loadingIndicator.className = 'admin-loading';
    loadingIndicator.innerHTML = `
        <div class="admin-loading-spinner"></div>
        <span>Memuat data pelanggan...</span>
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
        document.querySelector('.customers-table-card').insertBefore(loadingIndicator, document.querySelector('.table-responsive'));
        document.querySelector('.table-responsive').style.opacity = '0.5';
        
        searchTimeout = setTimeout(() => {
            fetchCustomers(query).finally(() => {
                loadingIndicator.remove();
                document.querySelector('.table-responsive').style.opacity = '1';
            });
        }, 500);
    });

    // Filter by status
   statusFilter.addEventListener('change', function() {
    const selected = this.value.toLowerCase();
    const rows = document.querySelectorAll('.customers-table tbody tr');
    rows.forEach(row => {
        const rowStatus = row.getAttribute('data-status');
        if (selected === 'semua' || selected === '') {
            row.style.display = '';
        } else if (rowStatus === selected) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

    // Simulated API call for customers
    async function fetchCustomers(query = '', filters = {}) {
        try {
            console.log('Fetching customers with query:', query, 'and filters:', filters);
            await new Promise(resolve => setTimeout(resolve, 800));
            return [];
        } catch (error) {
            console.error('Error fetching customers:', error);
            showError('Gagal memuat data pelanggan');
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
        
        document.querySelector('.customers-table-card').appendChild(errorElement);
        setTimeout(() => errorElement.remove(), 3000);
    }

    // Filter dropdown functionality
    filterBtn.addEventListener('click', function() {
        console.log('Opening customer filter dropdown');
        openCustomerFilterModal();
    });

    function openCustomerFilterModal() {
        console.log('Customer filter modal would open here');
        // Implementation would show filter options
    }


    // View all segment links
    viewAllLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const segment = this.closest('.segment-header').querySelector('.segment-title').textContent;
            console.log('Viewing all customers in segment:', segment);
            // In a real app, this would filter the main table by segment
        });
    });

    function openEditCustomerModal(id, name) {
        console.log(`Opening edit modal for customer: ${name} (ID: ${id})`);
        // Implementation would open a modal with customer edit form
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

    // Pagination
    document.querySelectorAll('.pagination-btn:not(.disabled)').forEach(btn => {
        btn.addEventListener('click', function() {
            if(!this.classList.contains('active')) {
                const page = this.textContent.trim();
                console.log('Navigating to page:', page);
                loadCustomerPage(page);
            }
        });
    });

    function loadCustomerPage(page) {
        showLoading();
        setTimeout(() => {
            hideLoading();
            updateCustomerPaginationUI(page);
        }, 800);
    }

    function updateCustomerPaginationUI(page) {
        document.querySelectorAll('.pagination-btn').forEach(btn => {
            btn.classList.remove('active');
            if(btn.textContent.trim() === page.toString()) {
                btn.classList.add('active');
            }
        });
    }

    // Initialize the table
    fetchCustomers();
});
</script>
@endpush