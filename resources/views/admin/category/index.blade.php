@extends('layouts.admin')

@section('title', 'Kelola Kategori - Admin')

@push('styles')

<style>
/* Categories Grid */
.categories-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 2rem;
    gap: 1rem;
}

.categories-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--dark);
    margin: 0;
}

.categories-actions {
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

.add-category-btn {
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

.add-category-btn:hover {
    background: var(--primary-dark);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

/* Categories Stats */
.categories-stats {
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
.stat-number.empty { color: var(--warning); }
.stat-number.parent { color: var(--info); }

.stat-text {
    font-size: 0.875rem;
    color: var(--gray-darker);
    font-weight: 500;
}

/* Categories Table */
.categories-table-card {
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

.categories-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.875rem;
}

.categories-table th {
    padding: 1rem;
    text-align: left;
    border-bottom: 2px solid var(--gray);
    font-weight: 600;
    color: var(--gray-darker);
    text-transform: uppercase;
    letter-spacing: 0.025em;
    white-space: nowrap;
}

.categories-table td {
    padding: 1rem;
    border-bottom: 1px solid var(--gray);
    vertical-align: middle;
}

.category-info {
    display: flex;
    align-items: center;
    gap: 1rem;
    min-width: 250px;
}

.category-icon {
    width: 50px;
    height: 50px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    flex-shrink: 0;
}

.category-icon.dslr { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
.category-icon.mirrorless { background: linear-gradient(135deg, #48bb78 0%, #38a169 100%); }
.category-icon.action-cam { background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%); }
.category-icon.lensa { background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%); }
.category-icon.aksesoris { background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%); }
.category-icon.tripod { background: linear-gradient(135deg, #9f7aea 0%, #805ad5 100%); }

.category-details h4 {
    font-weight: 600;
    margin-bottom: 0.25rem;
    color: var(--dark);
    line-height: 1.3;
}

.category-slug {
    font-size: 0.75rem;
    color: var(--gray-darker);
}

.category-hierarchy {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.75rem;
    color: var(--gray-darker);
}

.hierarchy-separator {
    color: var(--gray);
}

.product-count {
    font-weight: 600;
    color: var(--dark);
    white-space: nowrap;
}

.product-count.empty {
    color: var(--warning);
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

.status-badge.inactive {
    background: rgba(245, 101, 101, 0.1);
    color: var(--danger);
}

.category-actions {
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

.action-btn.add-subcategory {
    color: var(--info);
}

.action-btn.add-subcategory:hover {
    background: rgba(66, 153, 225, 0.1);
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
    .categories-header {
        flex-direction: column;
        align-items: stretch;
        gap: 1rem;
    }
    
    .categories-actions {
        flex-wrap: wrap;
        justify-content: space-between;
    }
    
    .search-input {
        width: 100%;
        min-width: 200px;
    }
}

@media (max-width: 768px) {
    .categories-stats {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .categories-table-card {
        padding: 1rem;
    }
    
    .table-responsive {
        margin: 0 -1rem;
        padding: 0 1rem;
    }
    
    .categories-table th,
    .categories-table td {
        padding: 0.75rem 0.5rem;
    }
    
    .category-info {
        min-width: 200px;
    }
    
    .category-icon {
        width: 40px;
        height: 40px;
        font-size: 1.25rem;
    }
}

@media (max-width: 576px) {
    .categories-stats {
        grid-template-columns: 1fr;
    }
    
    .categories-actions {
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

/* Tree View Toggle */
.tree-toggle {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border: 1px solid var(--gray);
    border-radius: 6px;
    background: var(--white);
    font-size: 0.875rem;
    cursor: pointer;
    transition: all 0.2s ease;
    color: var(--dark);
}

.tree-toggle:hover {
    border-color: var(--primary);
    background: var(--primary-light);
}

.tree-toggle.active {
    background: var(--primary);
    border-color: var(--primary);
    color: white;
}
</style>
@endpush

@section('content')
<!-- Page Header -->
<div class="categories-header">
    <h1 class="categories-title">Kelola Kategori</h1>
    <div class="categories-actions">
        <div class="search-box">
            <i data-feather="search" class="search-icon"></i>
            <input type="text" class="search-input" placeholder="Cari kategori...">
        </div>
        <button class="tree-toggle" id="treeToggle">
            <i data-feather="list"></i>
            Tampilan Tree
        </button>
        <div class="filter-dropdown">
            <button class="filter-btn">
                <i data-feather="filter"></i>
                Filter
            </button>
        </div>
        <a href="{{ route('admin.category.create') }}" class="add-category-btn">
            <i data-feather="plus"></i>
            Tambah Kategori
        </a>
    </div>
</div>

<!-- Categories Stats -->
<div class="categories-stats">
    <div class="stat-card">
        <div class="stat-number total">15</div>
        <div class="stat-text">Total Kategori</div>
    </div>
    <div class="stat-card">
        <div class="stat-number active">12</div>
        <div class="stat-text">Kategori Aktif</div>
    </div>
    <div class="stat-card">
        <div class="stat-number parent">6</div>
        <div class="stat-text">Kategori Induk</div>
    </div>
    <div class="stat-card">
        <div class="stat-number empty">3</div>
        <div class="stat-text">Kategori Kosong</div>
    </div>
</div>

<!-- Bulk Actions (Hidden by default) -->
<div class="bulk-actions" id="bulkActions">
    <div class="bulk-actions-text">
        <span id="selectedCount">0</span> kategori dipilih
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

<!-- Categories Table -->
<div class="categories-table-card">
    <div class="table-responsive">
        <table class="categories-table">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" id="selectAll" class="select-checkbox">
                    </th>
                    <th>Kategori</th>
                    <th>Jumlah Produk</th>
                    <th>Status</th>
                    <th>Tanggal Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
<tbody>
    @forelse($categories as $category)
    <tr>
        <td>
            <input type="checkbox" class="select-checkbox row-checkbox">
        </td>
        <td>
            <div class="category-info">
                <div class="category-icon {{ $category->slug }}">
                    <i data-feather="{{ $category->icon ?? 'tag' }}"></i>
                </div>
                <div class="category-details">
                    <h4>{{ $category->name }}</h4>
                    <div class="category-slug">{{ $category->slug }}</div>
                </div>
            </div>
        </td>

        <td class="product-count">
            {{ $category->products->count() }} Produk
        </td>
        <td>
            <span class="status-badge {{ $category->is_active ? 'active' : 'inactive' }}">
                {{ $category->is_active ? 'Aktif' : 'Nonaktif' }}
            </span>
        </td>
        <td>{{ $category->created_at->format('d M Y') }}</td>
        <td>
            <div class="category-actions">
                  <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="bulk-btn danger" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                    <i data-feather="trash-2"></i> Hapus
                </button>
            </form>
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="7" style="text-align:center;">Belum ada kategori.</td>
    </tr>
    @endforelse
</tbody>
        </table>
    </div>
    <!-- Pagination -->
    <div class="pagination-wrapper">
        <div class="pagination-info">
            Menampilkan 1-10 dari 15 kategori
        </div>
        <div class="pagination">
            <button class="pagination-btn disabled">
                <i data-feather="chevron-left"></i>
            </button>
            <button class="pagination-btn active">1</button>
            <button class="pagination-btn">2</button>
            <button class="pagination-btn">
                <i data-feather="chevron-right"></i>
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/feather-icons"></script>

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
    const addCategoryBtn = document.querySelector('.add-category-btn');
    const treeToggle = document.getElementById('treeToggle');
    const categoriesTable = document.querySelector('.categories-table');
    const loadingIndicator = document.createElement('div');
    
    // Create loading indicator
    loadingIndicator.className = 'loading';
    loadingIndicator.innerHTML = `
        <div class="loading-spinner"></div>
        <span>Memuat data...</span>    `;

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
        categoriesTable.parentNode.insertBefore(loadingIndicator, categoriesTable);
        categoriesTable.style.display = 'none';
        
        searchTimeout = setTimeout(() => {
            fetchCategories(query).finally(() => {
                loadingIndicator.remove();
                categoriesTable.style.display = 'table';
            });
        }, 500);
    });

    // Simulated API call for categories
    async function fetchCategories(query = '', filters = {}) {
        try {
            console.log('Fetching categories with query:', query, 'and filters:', filters);
            await new Promise(resolve => setTimeout(resolve, 800));
            return [];
        } catch (error) {
            console.error('Error fetching categories:', error);
            showError('Gagal memuat data kategori');
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
        
        categoriesTable.parentNode.insertBefore(errorElement, categoriesTable.nextSibling);
        setTimeout(() => errorElement.remove(), 3000);
    }

    function openViewCategoryModal(id) {
        console.log(`Opening view modal for category ID: ${id}`);
    }

    function openAddSubcategoryModal(parentId, parentName) {
        console.log(`Opening add subcategory modal for parent category: ${parentName} (ID: ${parentId})`);
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

    // Tree view toggle
    treeToggle.addEventListener('click', function() {
        this.classList.toggle('active');
        const isTreeView = this.classList.contains('active');
        this.querySelector('i').setAttribute('data-feather', isTreeView ? 'grid' : 'list');
        feather.replace();
        
        console.log(`Switched to ${isTreeView ? 'Tree' : 'Table'} view`);
        // In a real app, this would toggle between table and tree views
    });

    // Filter dropdown functionality
    filterBtn.addEventListener('click', function() {
        console.log('Opening category filter dropdown');
        openCategoryFilterModal();
    });

    function openCategoryFilterModal() {
        console.log('Category filter modal would open here');
    }

    // Add category button
    // addCategoryBtn.addEventListener('click', function(e) {
    //     e.preventDefault();
    //     console.log('Opening add category form');
    //     openAddCategoryModal();
    // });

    // function openAddCategoryModal() {
    //     console.log('Add category modal would open here');
    // }

    // Pagination
    document.querySelectorAll('.pagination-btn:not(.disabled)').forEach(btn => {
        btn.addEventListener('click', function() {
            if(!this.classList.contains('active')) {
                const page = this.textContent.trim();
                console.log('Navigating to page:', page);
                loadCategoryPage(page);
            }
        });
    });

    function loadCategoryPage(page) {
        showLoading();
        setTimeout(() => {
            hideLoading();
            updateCategoryPaginationUI(page);
        }, 800);
    }

    function updateCategoryPaginationUI(page) {
        document.querySelectorAll('.pagination-btn').forEach(btn => {
            btn.classList.remove('active');
            if(btn.textContent.trim() === page.toString()) {
                btn.classList.add('active');
            }
        });
    }

    // Initialize the table
    fetchCategories();


    const bulkDeleteBtn = document.querySelector('.bulk-btn.danger');

// Event listener untuk bulk delete
bulkDeleteBtn.addEventListener('click', function(e) {
    e.preventDefault();
    const checkedBoxes = document.querySelectorAll('.row-checkbox:checked');
    if (checkedBoxes.length === 0) return;

    if (confirm(`Yakin ingin menghapus ${checkedBoxes.length} kategori terpilih?`)) {
        // Ambil ID kategori yang dicentang
        const ids = Array.from(checkedBoxes).map(cb => 
            cb.closest('tr').querySelector('form').action.split('/').pop()
        );
        // Kirim request ke backend (AJAX atau form submit massal)
        // Contoh simulasi:
        console.log('Menghapus kategori dengan ID:', ids);
        showSuccess('Kategori terpilih berhasil dihapus (simulasi)');
        // Uncheck semua setelah aksi
        checkedBoxes.forEach(cb => cb.checked = false);
        updateBulkActions();
    }
});

});
</script>
@endpush