@extends('layouts.admin')

@section('title', 'Tambah Pelanggan - Admin')

@push('styles')
<style>
    .customer-form-container {
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
    
    .avatar-preview {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 1px dashed var(--gray);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin-bottom: 1rem;
        background-color: #f8f9fa;
    }
    
    .avatar-preview img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
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
</style>
@endpush

@section('content')
<div class="customers-header">
    <h1 class="customers-title">Tambah Pelanggan Baru</h1>
    <div class="customers-actions">
        <a href="{{ route('admin.customer.index') }}" class="add-customer-btn" style="background: var(--gray);">
            <i data-feather="arrow-left"></i>
            Kembali ke Daftar
        </a>
    </div>
</div>

<div class="customer-form-container">
    <form action="{{ route('admin.customer.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-grid">
            <!-- Kolom Kiri -->
            <div>
                <div class="form-group">
                    <label for="name">Nama Lengkap *</label>
                    <input type="text" id="name" name="name" class="form-control" required 
                           placeholder="Contoh: John Doe">
                </div>
                
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" class="form-control" required
                           placeholder="Contoh: john@example.com">
                </div>
                
                <div class="form-group">
                    <label for="phone">Nomor Telepon *</label>
                    <input type="tel" id="phone" name="phone" class="form-control" required
                           placeholder="Contoh: 081234567890">
                </div>
                <div class="form-group">
                    <label for="join_date">Tanggal Bergabung *</label>
                    <input type="date" id="join_date" name="join_date" class="form-control" required
                        value="{{ old('join_date', now()->format('Y-m-d')) }}">
                </div>
                 </div>
            
            <!-- Kolom Kanan -->
            <div>
                <div class="form-group">
                    <label for="status">Status *</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="">Pilih Status</option>
                        <option value="active">Aktif</option>
                        <option value="inactive">Tidak Aktif</option>
                        <option value="new">Baru</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="avatar">Foto Profil</label>
                    <input type="file" id="avatar" name="avatar" class="form-control" accept="image/*">
                    <div class="avatar-preview mt-2">
                        <span style="color: var(--gray-darker);">Preview</span>
                    </div>
                </div>
            </div>
            
            <div class="form-group full-width">
                <button type="submit" class="btn-submit">
                    <i data-feather="save"></i> Simpan Pelanggan
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
    
    // Preview avatar sebelum upload
    const avatarInput = document.getElementById('avatar');
    const avatarPreview = document.querySelector('.avatar-preview');
    
    avatarInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran gambar terlalu besar. Maksimal 2MB');
                this.value = '';
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(event) {
                avatarPreview.innerHTML = `<img src="${event.target.result}" alt="Preview Avatar">`;
            }
            reader.readAsDataURL(file);
        }
    });
});
</script>
@endpush