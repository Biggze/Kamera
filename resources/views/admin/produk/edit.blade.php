@extends('layouts.admin')

@section('title', 'Edit Produk Kamera - Admin')

@push('styles')
<style>
    .product-form-container {
        background: white;
        border-radius: 12px;
        box-shadow: var(--shadow-sm);
        padding: 2rem;
        margin-top: 1.5rem;
    }
    
    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: var(--dark);
    }
    
    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--gray);
        border-radius: 8px;
        font-size: 0.875rem;
        transition: all 0.2s ease;
    }
    
    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
        outline: none;
    }
    
    .form-group.full-width {
        grid-column: span 2;
    }
    
    .image-preview {
        width: 150px;
        height: 150px;
        border: 1px dashed var(--gray);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin-bottom: 1rem;
        background-color: #f8f9fa;
    }
    
    .image-preview img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }
    
    .btn-submit {
        background: var(--primary);
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .btn-submit:hover {
        background: var(--primary-dark);
    }
    
    .description-counter {
        font-size: 0.75rem;
        color: var(--gray-darker);
        text-align: right;
        margin-top: 0.25rem;
    }
</style>
@endpush

@section('content')
<div class="products-header">
    <h1 class="products-title">Edit Produk Kamera</h1>
    <div class="products-actions">
        <a href="{{ route('admin.product') }}" class="add-product-btn" style="background: var(--gray);">
            <i data-feather="arrow-left"></i>
            Kembali ke Daftar Produk
        </a>
    </div>
</div>

<div class="product-form-container">
    <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-grid">
            <!-- Kolom Kiri -->
            <div>
                <div class="form-group">
                    <label for="name">Nama Produk *</label>
                    <input type="text" id="name" name="name" class="form-control" required 
                           value="{{ old('name', $product->name) }}"
                           placeholder="Contoh: Canon EOS R6 Mark II">
                </div>
                
                <div class="form-group">
                    <label for="category">Kategori Kamera *</label>
                    <select id="category" name="category" class="form-control" required>
                        <option value="">Pilih Kategori Kamera</option>
                        <option value="DSLR Camera" {{ old('category', $product->category) == 'DSLR Camera' ? 'selected' : '' }}>DSLR Camera</option>
                        <option value="Mirrorless Camera" {{ old('category', $product->category) == 'Mirrorless Camera' ? 'selected' : '' }}>Mirrorless Camera</option>
                        <option value="Action Camera" {{ old('category', $product->category) == 'Action Camera' ? 'selected' : '' }}>Action Camera</option>
                        <option value="Lensa Kamera" {{ old('category', $product->category) == 'Lensa Kamera' ? 'selected' : '' }}>Lensa Kamera</option>
                        <option value="Instant Camera" {{ old('category', $product->category) == 'Instant Camera' ? 'selected' : '' }}>Instant Camera</option>
                        <option value="Aksesoris" {{ old('category', $product->category) == 'Aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="price">Harga (Rp) *</label>
                    <input type="number" id="price" name="price" class="form-control" min="0" required
                           value="{{ old('price', $product->price) }}"
                           placeholder="Contoh: 12500000">
                </div>
            </div>
            
            <!-- Kolom Kanan -->
            <div>
                <div class="form-group">
                    <label for="sku">Kode Produk (SKU) *</label>
                    <div style="display: flex; gap: 0.5rem;">
                        <input type="text" id="sku" name="sku" class="form-control" required
                               value="{{ old('sku', $product->sku) }}"
                               placeholder="Contoh: CAM-R6M2-001">
                        <button type="button" id="generate-sku" class="btn-submit" style="padding: 0 1rem;">
                            Generate
                        </button>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="stock">Stok Tersedia *</label>
                    <input type="number" id="stock" name="stock" class="form-control" min="0" required
                           value="{{ old('stock', $product->stock) }}"
                           placeholder="Jumlah unit yang tersedia">
                </div>
                
                <div class="form-group">
                    <label for="status">Status Produk *</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="draft" {{ old('status', $product->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $product->status) == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="archived" {{ old('status', $product->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label style="display: flex; align-items: center; gap: 0.5rem;">
                        <input type="checkbox" name="featured" value="1" {{ old('featured', $product->featured) ? 'checked' : '' }}> 
                        Jadikan Produk Unggulan
                    </label>
                </div>
            </div>
            
            <!-- Full Width -->
            <div class="form-group full-width">
                <label for="description">Deskripsi Produk *</label>
                <textarea id="description" name="description" class="form-control" rows="6" required
                          placeholder="Deskripsi lengkap produk termasuk spesifikasi teknis, fitur utama, dan keunggulan">{{ old('description', $product->description) }}</textarea>
                <div class="description-counter">
                    <span id="char-count">{{ strlen(old('description', $product->description)) }}</span>/1000 karakter
                </div>
            </div>
            
            <!-- Upload Gambar Utama -->
            <div class="form-group full-width">
                <label for="image">Gambar Utama</label>
                <small style="display: block; margin-bottom: 0.5rem; color: var(--gray-darker);">
                    Format: JPG/PNG, Maksimal 2MB, Rasio 1:1 (persegi)
                </small>
                <input type="file" id="image" name="image" class="form-control" accept="image/jpeg,image/png">
                <div class="image-preview mt-2">
                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" alt="Current Image">
                    @else
                        <span style="color: var(--gray-darker);">Preview gambar utama</span>
                    @endif
                </div>
                @if($product->image)
                    <div style="margin-top: 0.5rem;">
                        <label style="display: flex; align-items: center; gap: 0.5rem;">
                            <input type="checkbox" name="remove_image" value="1"> 
                            Hapus gambar saat ini
                        </label>
                    </div>
                @endif
            </div>
            
            <div class="form-group full-width">
                <button type="submit" class="btn-submit">
                    <i data-feather="save"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    feather.replace();
    
    // Image Preview
    const imageInput = document.getElementById('image');
    const imagePreview = document.querySelector('.image-preview');
    
    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran gambar terlalu besar. Maksimal 2MB');
                this.value = '';
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(event) {
                imagePreview.innerHTML = `<img src="${event.target.result}" alt="Preview Gambar Utama">`;
            }
            reader.readAsDataURL(file);
        }
    });
    
    // Auto generate SKU
    document.getElementById('generate-sku').addEventListener('click', function() {
        const name = document.getElementById('name').value.trim();
        const category = document.getElementById('category').value;
        
        if (!name) {
            alert('Silakan isi nama produk terlebih dahulu');
            return;
        }
        
        if (!category) {
            alert('Silakan pilih kategori terlebih dahulu');
            return;
        }
        
        // Get category code
        let categoryCode = '';
        if (category.includes('DSLR')) categoryCode = 'DSLR';
        else if (category.includes('Mirrorless')) categoryCode = 'MIR';
        else if (category.includes('Action')) categoryCode = 'ACT';
        else if (category.includes('Lensa')) categoryCode = 'LEN';
        else if (category.includes('Instant')) categoryCode = 'INS';
        else categoryCode = 'ACC';
        
        // Get initials from product name
        const initials = name.split(' ')
            .filter(word => word.length > 0)
            .map(word => word[0].toUpperCase())
            .join('')
            .substring(0, 3);
        
        const random = Math.floor(Math.random() * 900) + 100;
        document.getElementById('sku').value = `${categoryCode}-${initials}-${random}`;
    });
    
    // Character counter for description
    const descriptionTextarea = document.getElementById('description');
    const charCount = document.getElementById('char-count');
    
    descriptionTextarea.addEventListener('input', function() {
        const count = this.value.length;
        charCount.textContent = count;
        
        if (count > 1000) {
            this.value = this.value.substring(0, 1000);
            charCount.textContent = 1000;
        }
    });
});
</script>
@endpush