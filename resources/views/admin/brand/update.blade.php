@extends('layouts.admin')

@section('title', 'Edit Brand - Admin')

@push('styles')
{{-- Style yang digunakan sama persis dengan halaman create --}}
<style>
/* Menggunakan beberapa variabel dari style utama untuk konsistensi */
:root {
    --primary: #667eea;
    --primary-light: rgba(102, 126, 234, 0.1);
    --secondary: #a0aec0;
    --dark: #2d3748;
    --gray: #e2e8f0;
    --gray-darker: #718096;
    --white: #ffffff;
    --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
}

.page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 2rem;
}

.page-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--dark);
    margin: 0;
}

.page-title .brand-name-highlight {
    color: var(--primary);
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-size: 0.875rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
    border: 1px solid transparent;
}

.btn-primary {
    background: var(--primary);
    color: white;
}
.btn-primary:hover {
    background: #5a67d8; /* primary-dark */
}

.btn-outline-secondary {
    background: var(--white);
    color: var(--gray-darker);
    border-color: var(--gray);
}
.btn-outline-secondary:hover {
    background: var(--primary-light);
    border-color: var(--primary);
    color: var(--primary);
}


.form-card {
    background: var(--white);
    border-radius: 12px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray);
    padding: 2rem;
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2rem;
}

@media (min-width: 768px) {
    .form-grid {
        grid-template-columns: 2fr 1fr;
    }
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 0.5rem;
}

.form-control {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid var(--gray);
    border-radius: 8px;
    background: var(--white);
    font-size: 0.875rem;
    transition: all 0.2s ease;
}

.form-control:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
}

textarea.form-control {
    resize: vertical;
    min-height: 120px;
}

.image-preview-wrapper {
    position: relative;
    width: 100%;
    padding-top: 100%; /* 1:1 Aspect Ratio */
    border: 2px dashed var(--gray);
    border-radius: 8px;
    background: #f7fafc; /* gray-100 */
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.image-preview {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 0.5rem;
}

.image-upload-label {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: var(--gray-darker);
    text-align: center;
    background: rgba(255,255,255,0.8);
    opacity: 0;
    transition: opacity 0.2s ease;
}
.image-preview-wrapper:hover .image-upload-label {
    opacity: 1;
}

.image-upload-label span {
    font-size: 0.8rem;
    font-weight: 600;
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
    padding-top: 1.5rem;
    border-top: 1px solid var(--gray);
    margin-top: 1rem;
}
</style>
@endpush

@section('content')
<div class="page-header">
    {{-- Asumsi Anda mengirimkan variabel $brand dari controller --}}
    <h1 class="page-title">Edit Brand: <span class="brand-name-highlight">{{ $brand->name }}</span></h1>
    {{-- Ganti '#' dengan route yang sesuai, contoh: route('admin.brands.index') --}}
    <a href="#" class="btn btn-outline-secondary">
        <i data-feather="arrow-left"></i>
        Kembali
    </a>
</div>

<div class="form-card">
<form action="{{ route('admin.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-grid">
        <div class="main-info">
            <div class="form-group">
                <label for="name" class="form-label">Nama Brand</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $brand->name) }}" placeholder="Contoh: Canon" required>
            </div>
            <div class="form-group">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', $brand->slug) }}" placeholder="contoh: canon" required>
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea id="description" name="description" class="form-control" rows="5" placeholder="Deskripsi singkat mengenai brand...">{{ old('description', $brand->description) }}</textarea>
            </div>
        </div>
        <div class="side-info">
            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-control">
                    <option value="active" {{ old('status', $brand->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="featured" {{ old('status', $brand->status) == 'featured' ? 'selected' : '' }}>Unggulan</option>
                    <option value="inactive" {{ old('status', $brand->status) == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>
            <div class="form-group">
                <label for="logo" class="form-label">Logo Brand</label>
                <small class="d-block mb-2 text-muted">Kosongkan jika tidak ingin mengubah logo.</small>
                <input type="file" id="logo" name="logo" class="form-control" accept="image/*" style="display: none;">
                <div class="image-preview-wrapper">
                    <img id="imagePreview"
                         src="{{ $brand->logo_path ? asset('storage/'.$brand->logo_path) : '' }}"
                         alt="Logo Saat Ini"
                         class="image-preview"
                         style="{{ $brand->logo_path ? '' : 'display:none;' }}">
                    <label for="logo" class="image-upload-label" id="imageUploadLabel">
                        <i data-feather="edit" style="width: 32px; height: 32px; margin-bottom: 0.5rem;"></i>
                        <span>Ubah Logo</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <a href="{{ route('admin.brand') }}" class="btn btn-outline-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">
            <i data-feather="save"></i>
            Update Brand
        </button>
    </div>
</form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    feather.replace();

    const logoInput = document.getElementById('logo');
    const imagePreview = document.getElementById('imagePreview');
    
    logoInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
});
</script>
@endpush