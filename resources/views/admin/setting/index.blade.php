@extends('layouts.admin')

@section('title', 'Pengaturan Umum - Admin')

@push('styles')
<style>
/* Settings Dashboard */
.settings-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 2rem;
    gap: 1rem;
    max-width: 100%;
}

.settings-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--dark);
    margin: 0;
}

.settings-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
}

/* Settings Content */
.settings-content {
    background: var(--white);
    border-radius: 12px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray);
    padding: 1.5rem;
}

/* Settings Card */
.settings-card {
    margin-bottom: 2rem;
}

.settings-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1.5rem;
    padding-bottom: 0.75rem;
    border-bottom: 1px solid var(--gray-light);
}

.settings-card-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--dark);
    margin: 0;
}

/* Form Elements */
.setting-form-group {
    margin-bottom: 1.5rem;
}

.setting-form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: var(--dark);
}

.setting-form-control {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid var(--gray);
    border-radius: 6px;
    font-size: 0.875rem;
    transition: all 0.2s ease;
}

.setting-form-control:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
}

.setting-form-text {
    font-size: 0.75rem;
    color: var(--gray-darker);
    margin-top: 0.5rem;
}

/* Switch Toggle */
.setting-switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 26px;
}

.setting-switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.setting-slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: var(--gray);
    transition: .4s;
    border-radius: 34px;
}

/* Button Styles */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.625rem 1.25rem;
    border-radius: 6px;
    font-size: 0.875rem;
    font-weight: 500;
    line-height: 1.5;
    cursor: pointer;
    transition: all 0.2s ease;
    border: 1px solid transparent;
    gap: 0.5rem;
}

/* Primary Button */
.btn-primary {
    background-color: var(--primary);
    color: white;
    border-color: var(--primary-dark);
}

.btn-primary:hover {
    background-color: var(--primary-dark);
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Outline Buttons */
.btn-outline-primary {
    border-color: var(--primary);
    color: var(--primary);
    background-color: transparent;
}

.btn-outline-primary:hover {
    background-color: var(--primary);
    color: white;
}

.btn-outline-danger {
    border-color: var(--danger);
    color: var(--danger);
    background-color: transparent;
}

.btn-outline-danger:hover {
    background-color: var(--danger);
    color: white;
}

/* Button Sizes */
.btn-sm {
    padding: 0.5rem 0.875rem;
    font-size: 0.8125rem;
}

/* Button States */
.btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

/* Loading State */
.btn .animate-spin {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* Icon in Buttons */
.btn i {
    width: 16px;
    height: 16px;
}

.setting-slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
}

input:checked + .setting-slider {
    background-color: var(--primary);
}

input:checked + .setting-slider:before {
    transform: translateX(24px);
}

/* Responsive Design */
@media (max-width: 576px) {
    .settings-header {
        flex-direction: column;
        align-items: stretch;
    }
    
    .settings-actions {
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .settings-card-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.75rem;
    }
}
</style>
@endpush

@section('content')
<!-- Page Header -->
<div class="settings-header">
    <h1 class="settings-title">Pengaturan Umum</h1>
    <div class="settings-actions">
        <button class="btn btn-primary" id="saveSettings">
            <i data-feather="save"></i>
            Simpan Perubahan
        </button>
    </div>
</div>

<!-- Main Content -->
<div class="settings-content">
    <!-- General Settings -->
    <div class="settings-card">
        <div class="settings-card-header">
            <h2 class="settings-card-title">
                <i data-feather="settings" class="mr-2"></i>
                Pengaturan Aplikasi
            </h2>
        </div>
        
        <div class="setting-form-group">
            <label class="setting-form-label">Nama Aplikasi</label>
            <input type="text" class="setting-form-control" id="appName" value="MyShop Admin">
            <p class="setting-form-text">Nama yang akan ditampilkan di dashboard dan email</p>
        </div>
        
        <div class="setting-form-group">
            <label class="setting-form-label">Alamat Email Admin</label>
            <input type="email" class="setting-form-control" id="adminEmail" value="admin@myshop.com">
            <p class="setting-form-text">Email utama untuk menerima notifikasi sistem</p>
        </div>
        
        <div class="setting-form-group">
            <label class="setting-form-label">Zona Waktu</label>
            <select class="setting-form-control" id="timezone">
                <option value="Asia/Jakarta">Asia/Jakarta (WIB)</option>
                <option value="Asia/Makassar">Asia/Makassar (WITA)</option>
                <option value="Asia/Jayapura">Asia/Jayapura (WIT)</option>
            </select>
        </div>
        
        <div class="setting-form-group">
            <label class="setting-form-label">Format Tanggal</label>
            <select class="setting-form-control" id="dateFormat">
                <option value="d/m/Y">DD/MM/YYYY (31/12/2023)</option>
                <option value="m/d/Y">MM/DD/YYYY (12/31/2023)</option>
                <option value="Y-m-d">YYYY-MM-DD (2023-12-31)</option>
            </select>
        </div>
        
        <div class="setting-form-group">
            <label class="setting-form-label">Mode Pemeliharaan</label>
            <div class="d-flex align-items-center gap-3">
                <label class="setting-switch">
                    <input type="checkbox" id="maintenanceMode">
                    <span class="setting-slider"></span>
                </label>
                <span>Nonaktifkan akses publik ke website</span>
            </div>
        </div>
    </div>
    
    <!-- Business Information -->
    <div class="settings-card">
        <div class="settings-card-header">
            <h2 class="settings-card-title">
                <i data-feather="info" class="mr-2"></i>
                Informasi Bisnis
            </h2>
        </div>
        
        <div class="setting-form-group">
            <label class="setting-form-label">Nama Bisnis</label>
            <input type="text" class="setting-form-control" id="businessName" value="MyShop Indonesia">
        </div>
        
        <div class="setting-form-group">
            <label class="setting-form-label">Alamat Bisnis</label>
            <textarea class="setting-form-control" id="businessAddress" rows="3">Jl. Sudirman No. 123, Jakarta Pusat</textarea>
        </div>
        
        <div class="setting-form-group">
            <label class="setting-form-label">Nomor Telepon</label>
            <input type="tel" class="setting-form-control" id="businessPhone" value="+62 812 3456 7890">
        </div>
        
        <div class="setting-form-group">
            <label class="setting-form-label">Logo Aplikasi</label>
            <div class="d-flex align-items-center gap-3">
                <div class="avatar avatar-lg">
                    <img src="https://via.placeholder.com/150/667eea/ffffff?text=LOGO" alt="Logo" id="logoPreview">
                </div>
                <button class="btn btn-outline-primary btn-sm" id="uploadLogoBtn">
                    <i data-feather="upload"></i>
                    Unggah Logo Baru
                </button>
                <button class="btn btn-outline-danger btn-sm" id="removeLogoBtn">
                    <i data-feather="trash-2"></i>
                    Hapus
                </button>
            </div>
            <p class="setting-form-text">Format: PNG, JPG maksimal 2MB. Ukuran disarankan: 200x200px</p>
            <input type="file" id="logoUpload" accept="image/*" style="display: none;">
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Feather icons
    feather.replace();
    
    // Form submission
    const saveButton = document.getElementById('saveSettings');
    saveButton.addEventListener('click', function() {
        // Collect all form data
        const settings = {
            appName: document.getElementById('appName').value,
            adminEmail: document.getElementById('adminEmail').value,
            timezone: document.getElementById('timezone').value,
            dateFormat: document.getElementById('dateFormat').value,
            maintenanceMode: document.getElementById('maintenanceMode').checked,
            businessName: document.getElementById('businessName').value,
            businessAddress: document.getElementById('businessAddress').value,
            businessPhone: document.getElementById('businessPhone').value,
            logo: document.getElementById('logoPreview').src
        };
        
        // Show loading state
        const originalContent = saveButton.innerHTML;
        saveButton.innerHTML = '<i data-feather="loader" class="animate-spin"></i> Menyimpan...';
        saveButton.disabled = true;
        feather.replace();
        
        // Simulate save action (in real app, this would be an API call)
        console.log('Settings to save:', settings);
        
        setTimeout(() => {
            // Show success state
            saveButton.innerHTML = '<i data-feather="check"></i> Perubahan Disimpan';
            feather.replace();
            
            // Reset button after 2 seconds
            setTimeout(() => {
                saveButton.innerHTML = originalContent;
                saveButton.disabled = false;
                feather.replace();
            }, 2000);
        }, 1500);
    });
    
    // Logo upload functionality
    const uploadLogoBtn = document.getElementById('uploadLogoBtn');
    const removeLogoBtn = document.getElementById('removeLogoBtn');
    const logoUpload = document.getElementById('logoUpload');
    const logoPreview = document.getElementById('logoPreview');
    
    uploadLogoBtn.addEventListener('click', function() {
        logoUpload.click();
    });
    
    logoUpload.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file maksimal 2MB');
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(event) {
                logoPreview.src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
    
    removeLogoBtn.addEventListener('click', function() {
        logoPreview.src = 'https://via.placeholder.com/150/667eea/ffffff?text=LOGO';
    });
});
</script>
@endpush