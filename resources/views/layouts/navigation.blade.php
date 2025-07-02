<style>
      .navbar {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #667eea;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }
        
        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }
        
        .nav-links a:hover {
            color: #667eea;
        }
        
        .nav-links a.active {
            color: #667eea;
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: #667eea;
            transition: width 0.3s ease;
        }
        
        .nav-links a:hover::after,
        .nav-links a.active::after {
            width: 100%;
        }
        
        .cta-button {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }
    .user-dropdown {
    position: relative;
    display: inline-block;
}

.user-btn {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    padding: 0.6rem 1.2rem;
    border: none;
    border-radius: 50px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.user-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

.user-btn:active {
    transform: translateY(0);
}

.user-avatar {
    width: 28px;
    height: 28px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
}

.user-name {
    font-weight: 500;
    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.dropdown-arrow {
    font-size: 16px;
    transition: transform 0.3s ease;
}

.user-dropdown.active .dropdown-arrow {
    transform: rotate(180deg);
}

.dropdown-content {
    display: none;
    position: absolute;
    right: 0;
    top: calc(100% + 0.5rem);
    background: white;
    min-width: 280px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    border-radius: 16px;
    z-index: 1001;
    overflow: hidden;
    border: 1px solid rgba(0, 0, 0, 0.1);
    animation: dropdownSlide 0.3s ease-out;
    backdrop-filter: blur(10px);
}

@keyframes dropdownSlide {
    from {
        opacity: 0;
        transform: translateY(-10px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.dropdown-content.show {
    display: block;
}

.dropdown-header {
    padding: 1.5rem 1.2rem 1rem;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.user-avatar-large {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
}

.user-info {
    flex: 1;
    min-width: 0;
}

.user-full-name {
    font-weight: 600;
    font-size: 1rem;
    margin: 0 0 0.2rem 0;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.user-email {
    font-size: 0.8rem;
    opacity: 0.9;
    margin: 0;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.dropdown-divider {
    height: 1px;
    background: #e5e7eb;
    margin: 0.5rem 0;
}

.dropdown-item {
    color: #374151;
    padding: 0.8rem 1.2rem;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 0.8rem;
    background: none;
    border: none;
    width: 100%;
    text-align: left;
    font: inherit;
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 0.9rem;
}

.dropdown-item:hover {
    background: linear-gradient(135deg, #f8fafc, #f1f5f9);
    color: #667eea;
    transform: translateX(4px);
}

.dropdown-item i {
    width: 18px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.dropdown-form {
    margin: 0;
}

.logout-btn {
    color: #dc2626 !important;
    border-top: 1px solid #e5e7eb;
}

.logout-btn:hover {
    background: linear-gradient(135deg, #fef2f2, #fee2e2) !important;
    color: #dc2626 !important;
}

/* Click outside to close */
.dropdown-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: none;
}

.dropdown-overlay.show {
    display: block;
}
</style>
<nav class="navbar" id="navbar">
    <div class="nav-container">
        <div class="logo">
            <i data-feather="camera"></i>
            CameraHub
        </div>
            <ul class="nav-links">
                <li>
                    <a href="{{ route('dashboard') }}"
                    class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.category') }}"
                    class="{{ request()->routeIs('user.category') ? 'active' : '' }}">
                        Kategori
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.product') }}"
                    class="{{ request()->routeIs('user.product') ? 'active' : '' }}">
                        Produk
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.about') }}"
                    class="{{ request()->routeIs('user.about') ? 'active' : '' }}">
                        Tentang
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.contact') }}"
                    class="{{ request()->routeIs('user.contact') ? 'active' : '' }}">
                        Kontak
                    </a>
                </li>
            </ul>
        @auth
            <div class="user-dropdown">
                <button class="user-btn" onclick="toggleDropdown()" type="button">
                    {{ Auth::user()->name }}
                    <span class="dropdown-arrow">&#x25BC;</span>
                </button>
                <div class="dropdown-content" id="userDropdown">
                    <div class="dropdown-header">
                        <div class="user-avatar-large">
                            <i data-feather="user"></i>
                        </div>
                        <div class="user-info">
                            <div class="user-full-name">{{ Auth::user()->name }}</div>
                            <div class="user-email">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i data-feather="settings"></i> Profile
                    </a>
                    
<form method="POST" action="{{ route('logout') }}" onsubmit="event.stopPropagation();">
    @csrf
    <button type="submit" class="dropdown-item logout-btn">
        <i data-feather="log-out"></i> Logout
    </button>
</form>
                </div>
            </div>
        @endauth
        @guest
            <a href="{{ route('login') }}" class="cta-button">Masuk / Daftar</a>
        @endguest
    </div>
</nav>

 <script>
   // User Dropdown Functions
function toggleDropdown() {
    const dropdown = document.getElementById('userDropdown');
    const userDropdown = document.querySelector('.user-dropdown');
    const overlay = document.querySelector('.dropdown-overlay') || createOverlay();
    
    if (dropdown.classList.contains('show')) {
        closeDropdown();
    } else {
        openDropdown();
    }
    
    function openDropdown() {
        dropdown.classList.add('show');
        userDropdown.classList.add('active');
        overlay.classList.add('show');
        // Re-initialize feather icons for new elements (if using feather icons)
        if (typeof feather !== 'undefined') {
            setTimeout(() => feather.replace(), 10);
        }
    }
    
    function closeDropdown() {
        dropdown.classList.remove('show');
        userDropdown.classList.remove('active');
        overlay.classList.remove('show');
    }
    
    function createOverlay() {
        const overlay = document.createElement('div');
        overlay.className = 'dropdown-overlay';
        overlay.onclick = closeDropdown;
        document.body.appendChild(overlay);
        return overlay;
    }
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    const userDropdown = document.querySelector('.user-dropdown');
    const dropdown = document.getElementById('userDropdown');
    
    if (userDropdown && !userDropdown.contains(event.target)) {
        dropdown?.classList.remove('show');
        userDropdown.classList.remove('active');
        document.querySelector('.dropdown-overlay')?.classList.remove('show');
    }
});

// Close dropdown on escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const dropdown = document.getElementById('userDropdown');
        const userDropdown = document.querySelector('.user-dropdown');
        dropdown?.classList.remove('show');
        userDropdown?.classList.remove('active');
        document.querySelector('.dropdown-overlay')?.classList.remove('show');
    }
});
</script>