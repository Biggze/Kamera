@extends('layouts.admin')

@section('title', 'Kelola Produk - Admin')

@push('styles')
<style>
/* Products Grid */
.products-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 2rem;
    gap: 1rem;
}

.products-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--dark);
    margin: 0;
}

.products-actions {
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

.add-product-btn {
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

.add-product-btn:hover {
    background: var(--primary-dark);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

/* Products Stats */
.products-stats {
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
.stat-number.draft { color: var(--warning); }
.stat-number.low-stock { color: var(--danger); }

.stat-text {
    font-size: 0.875rem;
    color: var(--gray-darker);
    font-weight: 500;
}

/* Products Table */
.products-table-card {
    background: var(--white);
    border-radius: 12px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray);
    padding: 1.5rem;
}

.table-header {
    display: flex;
    align-items: center;
    justify-content: between;
    margin-bottom: 1.5rem;
}

.table-responsive {
    overflow-x: auto;
    margin: 0 -1.5rem;
    padding: 0 1.5rem;
}

.products-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.875rem;
}

.products-table th {
    padding: 1rem;
    text-align: left;
    border-bottom: 2px solid var(--gray);
    font-weight: 600;
    color: var(--gray-darker);
    text-transform: uppercase;
    letter-spacing: 0.025em;
    white-space: nowrap;
}

.products-table td {
    padding: 1rem;
    border-bottom: 1px solid var(--gray);
    vertical-align: middle;
}

.product-info {
    display: flex;
    align-items: center;
    gap: 1rem;
    min-width: 250px;
}

.product-image {
    width: 60px;
    height: 60px;
    border-radius: 8px;
    overflow: hidden;
    background: var(--gray-light);
    flex-shrink: 0;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.product-details h4 {
    font-weight: 600;
    margin-bottom: 0.25rem;
    color: var(--dark);
    line-height: 1.3;
}

.product-sku {
    font-size: 0.75rem;
    color: var(--gray-darker);
}

.product-category {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    background: var(--primary-light);
    color: var(--primary);
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 500;
}

.product-price {
    font-weight: 600;
    color: var(--dark);
    white-space: nowrap;
}

.stock-badge {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 500;
    white-space: nowrap;
}

.stock-badge.in-stock {
    background: rgba(72, 187, 120, 0.1);
    color: var(--success);
}

.stock-badge.low-stock {
    background: rgba(237, 137, 54, 0.1);
    color: var(--warning);
}

.stock-badge.out-of-stock {
    background: rgba(245, 101, 101, 0.1);
    color: var(--danger);
}

.status-badge {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 500;
    text-transform: capitalize;
}

.status-badge.active {
    background: rgba(72, 187, 120, 0.1);
    color: var(--success);
}

.status-badge.draft {
    background: rgba(156, 163, 175, 0.1);
    color: var(--gray-darker);
}

.status-badge.inactive {
    background: rgba(245, 101, 101, 0.1);
    color: var(--danger);
}

.product-actions {
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

.action-btn.edit {
    color: var(--primary);
}

.action-btn.edit:hover {
    background: var(--primary-light);
}

.action-btn.delete {
    color: var(--danger);
}

.action-btn.delete:hover {
    background: rgba(245, 101, 101, 0.1);
}

.action-btn.view {
    color: var(--gray-darker);
}

.action-btn.view:hover {
    background: var(--gray-light);
}

.action-btn i {
    width: 16px;
    height: 16px;
}

/* Pagination */
.pagination-wrapper {
    display: flex;
    align-items: center;
    justify-content: between;
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
    .products-header {
        flex-direction: column;
        align-items: stretch;
        gap: 1rem;
    }
    
    .products-actions {
        flex-wrap: wrap;
        justify-content: space-between;
    }
    
    .search-input {
        width: 100%;
        min-width: 200px;
    }
}

@media (max-width: 768px) {
    .products-stats {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .products-table-card {
        padding: 1rem;
    }
    
    .table-responsive {
        margin: 0 -1rem;
        padding: 0 1rem;
    }
    
    .products-table th,
    .products-table td {
        padding: 0.75rem 0.5rem;
    }
    
    .product-info {
        min-width: 200px;
    }
    
    .product-image {
        width: 50px;
        height: 50px;
    }
}

@media (max-width: 576px) {
    .products-stats {
        grid-template-columns: 1fr;
    }
    
    .products-actions {
        flex-direction: column;
        align-items: stretch;
    }
    
    .pagination-wrapper {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
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

.product-description {
    white-space: pre-line;
    word-break: break-word;
    max-width: 250px;
}
</style>
@endpush
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="products-header">
    <h1 class="products-title">Kelola Produk</h1>
    <div class="products-actions">
        <div class="search-box">
            <i data-feather="search" class="search-icon"></i>
            <input type="text" class="search-input" placeholder="Cari produk, SKU, atau kategori...">
        </div>
        <div class="filter-dropdown">
            <button class="filter-btn">
                <i data-feather="filter"></i>
                Filter
            </button>
        </div>
        <a href="{{ route('admin.product.create') }}" class="add-product-btn">
            <i data-feather="plus"></i>
            Tambah Produk
        </a>
    </div>
</div>

<!-- Products Stats -->
<div class="products-stats">
    <div class="stat-card">
        <div class="stat-number total">{{ $totalProducts }}</div>
        <div class="stat-text">Total Produk</div>
    </div>
    <div class="stat-card">
        <div class="stat-number active">{{ $activeProducts }}</div>
        <div class="stat-text">Produk Aktif</div>
    </div>
    <div class="stat-card">
        <div class="stat-number draft">{{ $draftProducts }}</div>
        <div class="stat-text">Draft</div>
    </div>
    <div class="stat-card">
        <div class="stat-number low-stock">{{ $lowStockProducts }}</div>
        <div class="stat-text">Stok Menipis</div>
    </div>
</div>

<!-- Bulk Actions (Hidden by default) -->
<div class="bulk-actions" id="bulkActions">
    <div class="bulk-actions-text">
        <span id="selectedCount">0</span> produk dipilih
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
 
<!-- Products Table -->
<div class="products-table-card">
    <div class="table-responsive">
            <table class="products-table">
    <thead>
        <tr>
            <th width="40px"><input type="checkbox" id="selectAll" class="select-checkbox"></th>
            <th>Produk</th>
            <th>Deskripsi</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Status</th>
            <th>Tanggal Dibuat</th>
            <th width="120px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <!-- Kolom Checkbox -->
            <td><input type="checkbox" class="row-checkbox" value="{{ $product->id }}"></td>
            
            <!-- Kolom Produk -->
            <td>
                <div class="product-info">
                    <div class="product-image">
                        <img src="{{ asset($product->image ? 'storage/'.$product->image : 'https://via.placeholder.com/60') }}" alt="{{ $product->name }}">
                    </div>
                    <div class="product-details">
                        <h4>{{ $product->name }}</h4>
                        <div class="product-sku">SKU: {{ $product->sku }}</div>
                    </div>
                </div>
            </td>
            
            <!-- Kolom Deskripsi -->
            <td class="product-description">
                {{ Str::limit($product->description, 100) }}
                @if(strlen($product->description) > 100)
                    <span class="read-more" data-description="{{ $product->description }}">... [selengkapnya]</span>
                @endif
            </td>
            
            <!-- Kolom Kategori -->
            <td>
                <span class="product-category {{ str_replace(' ', '-', strtolower($product->category)) }}">
                    {{ $product->category }}
                </span>
            </td>
            
            <!-- Kolom Harga -->
            <td class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
            
            <!-- Kolom Stok -->
            <td>
                <span class="stock-badge {{ $product->stock > 5 ? 'in-stock' : ($product->stock > 0 ? 'low-stock' : 'out-of-stock') }}">
                    {{ $product->stock }} Unit
                </span>
            </td>
            
            <!-- Kolom Status -->
            <td>
                <span class="status-badge {{ $product->status }}">
                    {{ ucfirst($product->status) }}
                </span>
            </td>
            
            <td>{{ $product->created_at->format('d M Y') }}</td>
            
            <td>
                    <div class="product-actions">
                        <a href="{{ route('admin.product.edit', $product->id) }}" class="action-btn edit" title="Edit">
                            <i data-feather="edit"></i>
                        </a>
                            <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" class="form-delete" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="action-btn delete btn-delete" title="Hapus" data-id="{{ $product->id }}">
                                    <i data-feather="trash-2"></i>
                                </button>
                            </form>
                        <button class="action-btn view" title="Lihat">
                            <i data-feather="eye"></i>
                        </button>
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
        Menampilkan {{ $products->firstItem() }}-{{ $products->lastItem() }} dari {{ $products->total() }} produk
    </div>
</div>
</div>
@endsection

@push('scripts')
@push('scripts')
<script>
document.querySelectorAll('.btn-delete').forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        const form = this.closest('form');
        Swal.fire({
            title: 'Yakin hapus produk ini?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Tampilkan loading SweetAlert
                Swal.fire({
                    title: 'Menghapus...',
                    text: 'Mohon tunggu',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                // Submit form setelah sedikit delay agar loading terlihat
                setTimeout(() => {
                    form.submit();
                }, 600);
            }
        });
    });
});

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
    const addProductBtn = document.querySelector('.add-product-btn');
    const productsTable = document.querySelector('.products-table');
    const loadingIndicator = document.createElement('div');
    
    // Create loading indicator
    loadingIndicator.className = 'loading';
    loadingIndicator.innerHTML = `
        <div class="loading-spinner"></div>
        <span>Memuat data...</span>
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
        productsTable.parentNode.insertBefore(loadingIndicator, productsTable);
        productsTable.style.display = 'none';
        
        searchTimeout = setTimeout(() => {
            fetchProducts(query).finally(() => {
                loadingIndicator.remove();
                productsTable.style.display = 'table';
            });
        }, 500);
    });
    
    // Simulated API call
    async function fetchProducts(query = '', filters = {}) {
        try {
            // In a real app, this would be an actual API call
            console.log('Fetching products with query:', query, 'and filters:', filters);
            
            // Simulate network delay
            await new Promise(resolve => setTimeout(resolve, 800));
            
            // Return mock data or process real response
            return [];
        } catch (error) {
            console.error('Error fetching products:', error);
            showError('Gagal memuat data produk');
            return [];
        }
    }
    
    // Error handling
    function showError(message) {
        const errorElement = document.createElement('div');
        errorElement.className = 'error-message';
        errorElement.textContent = message;
        errorElement.style.color = 'var(--danger)';
        errorElement.style.padding = '1rem';
        errorElement.style.textAlign = 'center';
        
        productsTable.parentNode.insertBefore(errorElement, productsTable.nextSibling);
        setTimeout(() => errorElement.remove(), 3000);
    }
    

document.querySelectorAll('.action-btn.view').forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        const row = this.closest('tr');
        const productId = row.querySelector('.row-checkbox').value;
        openViewModal(productId);
    });
});
    
    // Modal functions
    function openEditModal(id, name) {
        console.log(`Opening edit modal for product: ${name} (ID: ${id})`);
        // In a real app, this would open a modal with a form
    }
    

    
    function openViewModal(id) {
        console.log(`Opening view modal for product ID: ${id}`);
        // In a real app, this would open a modal with product details
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
        successElement.className = 'success-message';
        successElement.textContent = message;
        successElement.style.color = 'var(--success)';
        successElement.style.padding = '1rem';
        successElement.style.textAlign = 'center';
        
        document.body.appendChild(successElement);
        setTimeout(() => successElement.remove(), 3000);
    }
    
    // Filter dropdown functionality
    filterBtn.addEventListener('click', function() {
        // In a real app, this would open a filter dropdown
        console.log('Opening filter dropdown');
        openFilterModal();
    });
    


    
    // Pagination
    document.querySelectorAll('.pagination-btn:not(.disabled)').forEach(btn => {
        btn.addEventListener('click', function() {
            if(!this.classList.contains('active')) {
                const page = this.textContent.trim();
                console.log('Navigating to page:', page);
                loadPage(page);
            }
        });
    });
    
    function loadPage(page) {
        showLoading();
        // Simulate page load
        setTimeout(() => {
            hideLoading();
            updatePaginationUI(page);
        }, 800);
    }
    
    function updatePaginationUI(page) {
        document.querySelectorAll('.pagination-btn').forEach(btn => {
            btn.classList.remove('active');
            if(btn.textContent.trim() === page.toString()) {
                btn.classList.add('active');
            }
        });
    }
    
    // Initialize the table
    fetchProducts();
});
</script>
@endpush