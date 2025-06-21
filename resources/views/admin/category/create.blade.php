@extends('layouts.admin')

@section('title', 'Tambah Kategori Baru - Admin')

@push('styles')
<style>
/* Form Container */
.form-container {
    background: var(--white);
    border-radius: 12px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray);
    padding: 2rem;
    max-width: 800px;
    margin: 0 auto;
}

.form-header {
    margin-bottom: 2rem;
}

.form-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--dark);
    margin: 0 0 0.5rem 0;
}

.form-subtitle {
    font-size: 0.875rem;
    color: var(--gray-darker);
    margin: 0;
}

.form-section {
    margin-bottom: 2rem;
}

.section-title {
    font-size: 1rem;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid var(--gray);
}

/* Form Grid */
.form-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
}

@media (min-width: 768px) {
    .form-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Form Group */
.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    font-size: 0.875rem;
    font-weight: 500;
    margin-bottom: 0.5rem;
    color: var(--dark);
}

.form-label .required {
    color: var(--danger);
}

.form-control {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid var(--gray);
    border-radius: 8px;
    font-size: 0.875rem;
    transition: all 0.2s ease;
    background: var(--white);
}

.form-control:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
}

.form-select {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 1rem;
}

.form-textarea {
    min-height: 120px;
    resize: vertical;
}

/* Form Help Text */
.form-help {
    font-size: 0.75rem;
    color: var(--gray-darker);
    margin-top: 0.5rem;
}

/* Form Actions */
.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
    margin-top: 2rem;
    padding-top: 1.5rem;
    border-top: 1px solid var(--gray);
}

.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-size: 0.875rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
}

.btn-primary {
    background: var(--primary);
    color: white;
    border: none;
}

.btn-primary:hover {
    background: var(--primary-dark);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

.btn-secondary {
    background: var(--white);
    color: var(--dark);
    border: 1px solid var(--gray);
}

.btn-secondary:hover {
    background: var(--gray-light);
    border-color: var(--gray-darker);
}

/* Icon Preview */
.icon-preview {
    width: 60px;
    height: 60px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.75rem;
    color: white;
    margin-bottom: 1rem;
    background: var(--primary);
}

/* Color Picker */
.color-picker {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.color-option {
    width: 32px;
    height: 32px;
    border-radius: 6px;
    cursor: pointer;
    border: 2px solid transparent;
    transition: all 0.2s ease;
}

.color-option:hover {
    transform: scale(1.1);
}

.color-option.selected {
    border-color: var(--dark);
    transform: scale(1.1);
}

/* Status Toggle */
.status-toggle {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.toggle-switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 24px;
}

.toggle-switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.toggle-slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: var(--gray);
    transition: .4s;
    border-radius: 24px;
}

.toggle-slider:before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
}

input:checked + .toggle-slider {
    background-color: var(--success);
}

input:checked + .toggle-slider:before {
    transform: translateX(26px);
}

.toggle-label {
    font-size: 0.875rem;
    color: var(--dark);
}

/* Parent Category Select */
.parent-category-select {
    position: relative;
}

.parent-category-select .form-control {
    padding-left: 2.5rem;
}

.parent-category-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    color: var(--gray-darker);
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .form-container {
        padding: 1.5rem;
    }
    
    .form-actions {
        flex-direction: column-reverse;
    }
    
    .btn {
        width: 100%;
    }
}
</style>
@endpush

@section('content')
<div class="form-container">
    <div class="form-header">
        <h1 class="form-title">Tambah Kategori Baru</h1>
        <p class="form-subtitle">Isi form berikut untuk menambahkan kategori baru ke dalam sistem</p>
    </div>
    
  <form id="categoryForm" action="{{ route('admin.category.store') }}" method="POST">
    @csrf
        <div class="form-section">
            <h2 class="section-title">Informasi Dasar</h2>
            <div class="form-grid">
                <div class="form-group">
                    <label for="categoryName" class="form-label">
                        Nama Kategori <span class="required">*</span>
                    </label>
                    <input type="text" id="categoryName" class="form-control" placeholder="Contoh: DSLR Camera" required name="name">
                    <p class="form-help">Nama kategori yang akan ditampilkan di frontend</p>
                </div>
                
                <div class="form-group">
                    <label for="categorySlug" class="form-label">
                        Slug URL <span class="required">*</span>
                    </label>
                    <input type="text" id="categorySlug" class="form-control" placeholder="Contoh: dslr-camera" required name="slug" >
                    <p class="form-help">URL-friendly version of the name (auto-generated)</p>
                </div>
            </div>
            
            <div class="form-group">
                <label for="categoryDescription" class="form-label">Deskripsi</label>
                <textarea id="categoryDescription" class="form-control form-textarea" placeholder="Tambahkan deskripsi singkat tentang kategori ini" name="description"></textarea>
                <p class="form-help">Deskripsi akan ditampilkan di halaman kategori</p>
            </div>
        </div>    
        <!-- Tampilan & Ikon -->
        <div class="form-section">
            <h2 class="section-title">Tampilan & Ikon</h2>
            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">Warna Kategori</label>
                    <div class="color-picker">
                        <div class="color-option selected" style="background: #667eea;" data-color="#667eea"></div>
                        <div class="color-option" style="background: #48bb78;" data-color="#48bb78"></div>
                        <div class="color-option" style="background: #ed8936;" data-color="#ed8936"></div>
                        <div class="color-option" style="background: #f56565;" data-color="#f56565"></div>
                        <div class="color-option" style="background: #9f7aea;" data-color="#9f7aea"></div>
                        <div class="color-option" style="background: #4299e1;" data-color="#4299e1"></div>
                    </div>
                    <input type="hidden" id="categoryColor" value="#667eea" name="color">
                </div>
                
                <div class="form-group">
                    <label for="categoryIcon" class="form-label">Ikon Kategori</label>
                    <div class="icon-preview">
                        <i data-feather="camera" id="iconPreview"></i>
                    </div>
                    <select id="categoryIcon" class="form-control form-select" name="icon">
                        <option value="camera">Kamera</option>
                        <option value="video">Video</option>
                        <option value="image">Gambar</option>
                        <option value="box">Kotak</option>
                        <option value="layers">Lapisan</option>
                        <option value="aperture">Aperture</option>
                    </select>
                </div>
            </div>
        </div>
        
        <!-- Pengaturan -->
        <div class="form-section">
            <h2 class="section-title">Pengaturan</h2>
            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <div class="status-toggle">
                        <label class="toggle-switch">
                            <input type="checkbox" id="categoryStatus" checked name="is_active" value="1">
                            <span class="toggle-slider"></span>
                        </label>
                        <span class="toggle-label" id="statusLabel">Aktif</span>
                    </div>
                    <p class="form-help">Nonaktifkan untuk menyembunyikan kategori</p>
                </div>
                <div class="form-group">
                    <label for="displayOrder" class="form-label">Urutan Tampilan</label>
                    <input type="number" id="displayOrder" class="form-control" value="0" min="0" name="display_order">
                    <p class="form-help">Angka lebih rendah akan muncul lebih dulu</p>
                </div>
            </div>
        </div>
        
        <!-- Form Actions -->
        <div class="form-actions">
            <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">
                <i data-feather="x"></i> Batal
            </a>
            <button type="submit" class="btn btn-primary">
                <i data-feather="save"></i> Simpan Kategori
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Feather icons
    feather.replace();
    
    // Auto-generate slug from category name
    const categoryName = document.getElementById('categoryName');
    const categorySlug = document.getElementById('categorySlug');
    
    categoryName.addEventListener('input', function() {
        const slug = this.value.toLowerCase()
            .replace(/[^\w\s-]/g, '') // Remove special chars
            .replace(/[\s]+/g, '-')    // Replace spaces with -
            .replace(/^-+|-+$/g, '');  // Trim - from start/end
            
        categorySlug.value = slug;
    });
    
    // Color picker functionality
    const colorOptions = document.querySelectorAll('.color-option');
    const categoryColor = document.getElementById('categoryColor');
    const iconPreview = document.querySelector('.icon-preview');
    
    colorOptions.forEach(option => {
        option.addEventListener('click', function() {
            colorOptions.forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
            const color = this.dataset.color;
            categoryColor.value = color;
            iconPreview.style.background = color;
        });
    });
    
    // Icon selector
    const iconSelect = document.getElementById('categoryIcon');
    iconSelect.addEventListener('change', function() {
        const icon = this.value;
        document.getElementById('iconPreview').setAttribute('data-feather', icon);
        feather.replace();
    });
    
    // Status toggle
    const statusToggle = document.getElementById('categoryStatus');
    const statusLabel = document.getElementById('statusLabel');
    
    statusToggle.addEventListener('change', function() {
        statusLabel.textContent = this.checked ? 'Aktif' : 'Nonaktif';
    });
    
    // Form submission
 
    function showSuccess(message) {
        const successElement = document.createElement('div');
        successElement.className = 'admin-success-message';
        successElement.textContent = message;
        successElement.style.color = 'var(--success)';
        successElement.style.padding = '1rem';
        successElement.style.textAlign = 'center';
        successElement.style.marginBottom = '1.5rem';
        successElement.style.borderRadius = '8px';
        successElement.style.backgroundColor = 'rgba(72, 187, 120, 0.1)';
        
        categoryForm.prepend(successElement);
        setTimeout(() => successElement.remove(), 3000);
    }
});
</script>
@endpush