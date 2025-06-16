@extends('layouts.admin')

@section('title', 'Edit Pelanggan - Admin')

@push('styles')
<style>
/* Form Styles */
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
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-row {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    font-size: 0.875rem;
    font-weight: 500;
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

.form-select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 1rem;
}

.form-textarea {
    min-height: 120px;
    resize: vertical;
}

.avatar-upload {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.avatar-preview {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: var(--gray-light);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    position: relative;
}

.avatar-preview img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.avatar-preview .initials {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--primary);
}

.avatar-upload-controls {
    flex: 1;
}

.avatar-upload-btn {
    display: inline-block;
    padding: 0.5rem 1rem;
    background: var(--primary-light);
    color: var(--primary);
    border: 1px dashed var(--primary);
    border-radius: 6px;
    font-size: 0.875rem;
    cursor: pointer;
    transition: all 0.2s ease;
    margin-bottom: 0.5rem;
}

.avatar-upload-btn:hover {
    background: var(--primary);
    color: white;
}

.avatar-remove-btn {
    display: inline-block;
    font-size: 0.75rem;
    color: var(--danger);
    cursor: pointer;
    transition: all 0.2s ease;
}

.avatar-remove-btn:hover {
    text-decoration: underline;
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid var(--gray);
}

.btn {
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-size: 0.875rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
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

/* Responsive Design */
@media (max-width: 768px) {
    .form-row {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .form-container {
        padding: 1.5rem;
    }
}
</style>
@endpush

@section('content')
<div class="form-container">
    <div class="form-header">
        <h1 class="form-title">Edit Pelanggan</h1>
        <p class="form-subtitle">Perbarui informasi pelanggan di bawah ini</p>
    </div>
    
    <form action="{{ route('admin.customer.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <div class="avatar-upload">
                <div class="avatar-preview">
                    @if($customer->avatar)
                        <img src="{{ asset('storage/' . $customer->avatar) }}" alt="{{ $customer->name }}">
                    @else
                        <div class="initials">{{ substr($customer->name, 0, 2) }}</div>
                    @endif
                </div>
                <div class="avatar-upload-controls">
                    <input type="file" id="avatar" name="avatar" class="d-none" accept="image/*">
                    <label for="avatar" class="avatar-upload-btn">Ubah Foto</label>
                    @if($customer->avatar)
                        <div class="avatar-remove-btn" id="removeAvatar">Hapus Foto</div>
                        <input type="hidden" name="remove_avatar" id="removeAvatarInput" value="0">
                    @endif
                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $customer->name) }}" required>
            </div>
            
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $customer->email) }}" required>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="phone" class="form-label">Telepon</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $customer->phone) }}" required>
            </div>
            
            <div class="form-group">
                <label for="join_date" class="form-label">Tanggal Bergabung</label>
                <input type="date" id="join_date" name="join_date" class="form-control" value="{{ old('join_date', $customer->join_date->format('Y-m-d')) }}">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-control form-select" required>
                    <option value="active" {{ old('status', $customer->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ old('status', $customer->status) == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="order_count" class="form-label">Jumlah Pesanan</label>
                <input type="number" id="order_count" name="order_count" class="form-control" value="{{ old('order_count', $customer->order_count) }}" min="0">
            </div>
        </div>
        
        <div class="form-group">
            <label for="total_spending" class="form-label">Total Belanja (Rp)</label>
            <input type="number" id="total_spending" name="total_spending" class="form-control" value="{{ old('total_spending', $customer->total_spending) }}" min="0">
        </div>
        
        <div class="form-actions">
            <a href="{{ route('admin.customer.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Feather icons
    feather.replace();
    
    // Avatar upload preview
    const avatarInput = document.getElementById('avatar');
    const avatarPreview = document.querySelector('.avatar-preview');
    const initialsPreview = document.querySelector('.avatar-preview .initials');
    const removeAvatarBtn = document.getElementById('removeAvatar');
    const removeAvatarInput = document.getElementById('removeAvatarInput');
    
    if(avatarInput) {
        avatarInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if(file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    if(avatarPreview.querySelector('img')) {
                        avatarPreview.querySelector('img').src = e.target.result;
                    } else {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        avatarPreview.innerHTML = '';
                        avatarPreview.appendChild(img);
                    }
                    
                    if(initialsPreview) {
                        initialsPreview.style.display = 'none';
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    }
    
    // Remove avatar
    if(removeAvatarBtn && removeAvatarInput) {
        removeAvatarBtn.addEventListener('click', function() {
            avatarPreview.innerHTML = '';
            if(initialsPreview) {
                initialsPreview.style.display = 'flex';
                avatarPreview.appendChild(initialsPreview);
            }
            removeAvatarInput.value = '1';
            avatarInput.value = '';
            this.style.display = 'none';
        });
    }
    
    // Form validation
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        let valid = true;
        
        // Simple validation example
        const nameInput = document.getElementById('name');
        if(!nameInput.value.trim()) {
            valid = false;
            nameInput.style.borderColor = 'var(--danger)';
        } else {
            nameInput.style.borderColor = 'var(--gray)';
        }
        
        const emailInput = document.getElementById('email');
        if(!emailInput.value.trim() || !emailInput.checkValidity()) {
            valid = false;
            emailInput.style.borderColor = 'var(--danger)';
        } else {
            emailInput.style.borderColor = 'var(--gray)';
        }
        
        if(!valid) {
            e.preventDefault();
            Swal.fire({
                title: 'Form Tidak Valid',
                text: 'Silakan periksa kembali data yang Anda masukkan',
                icon: 'error',
                confirmButtonColor: 'var(--primary)'
            });
        }
    });
});
</script>
@endpush