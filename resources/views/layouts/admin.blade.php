<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin - CameraHub')</title>
    <script src="https://unpkg.com/feather-icons"></script>
    @stack('styles')
    <style>
       :root {
    --primary: #667eea;
    --primary-light: rgba(102, 126, 234, 0.1);
    --secondary: #764ba2;
    --success: #48bb78;
    --danger: #f56565;
    --warning: #ed8936;
    --info: #4299e1;
    --dark: #2d3748;
    --light: #f7fafc;
    --gray: #e2e8f0;
    --gray-dark: #a0aec0;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f7fa;
    color: #2d3748;
}

.admin-container {
    display: flex;
    min-height: 100vh;
}

/* Sidebar Styles */
.admin-sidebar {
    width: 280px;
    background: white;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
    z-index: 100;
}

.sidebar-header {
    padding: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid var(--gray);
}

.logo {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    color: var(--primary);
    font-weight: 700;
    font-size: 1.25rem;
}

.logo i {
    width: 24px;
    height: 24px;
}

.logo small {
    font-size: 0.75rem;
    font-weight: 400;
    color: var(--gray-dark);
    display: block;
    margin-top: 0.25rem;
}

.sidebar-toggle {
    background: none;
    border: none;
    color: var(--gray-dark);
    cursor: pointer;
    display: none;
}

.sidebar-menu {
    flex: 1;
    padding: 1.5rem;
    overflow-y: auto;
}

.sidebar-menu ul {
    list-style: none;
}

.sidebar-menu li {
    margin-bottom: 0.5rem;
}

.sidebar-menu a {
    display: flex;
    align-items: center;
    padding: 0.75rem 1rem;
    color: var(--dark);
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.3s ease;
    position: relative;
}

.sidebar-menu a:hover {
    background: var(--primary-light);
    color: var(--primary);
}

.sidebar-menu a.active {
    background: var(--primary-light);
    color: var(--primary);
    font-weight: 500;
}

.sidebar-menu a i {
    width: 20px;
    height: 20px;
    margin-right: 0.75rem;
}

.sidebar-menu .badge {
    margin-left: auto;
    background: var(--primary);
    color: white;
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    border-radius: 50px;
}

.sidebar-footer {
    padding: 1.5rem;
    border-top: 1px solid var(--gray);
}

.user-profile {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    overflow: hidden;
}

.avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.user-info {
    flex: 1;
}

.user-info .name {
    font-weight: 600;
    font-size: 0.9rem;
}

.user-info .role {
    font-size: 0.75rem;
    color: var(--gray-dark);
}

.logout {
    color: var(--gray-dark);
    transition: all 0.3s ease;
}

.logout:hover {
    color: var(--danger);
}

/* Admin Content */
.admin-content {
    flex: 1;
    padding: 2rem;
    overflow-x: hidden;
}

/* Admin Header */
.admin-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 2rem;
}

.admin-header h1 {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--dark);
}

.header-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.search-box {
    position: relative;
    width: 250px;
}

.search-box i {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--gray-dark);
}

.search-box input {
    width: 100%;
    padding: 0.75rem 1rem 0.75rem 2.5rem;
    border: 1px solid var(--gray);
    border-radius: 8px;
    background: white;
    transition: all 0.3s ease;
}

.search-box input:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
}

.notifications {
    position: relative;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: white;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.notifications:hover {
    background: var(--primary-light);
    color: var(--primary);
}

.notifications .badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: var(--danger);
    color: white;
    font-size: 0.6rem;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Responsive */
@media (max-width: 1200px) {
    .admin-sidebar {
        position: fixed;
        left: -280px;
        height: 100vh;
    }
    .admin-sidebar.active {
        left: 0;
    }
    .sidebar-toggle {
        display: block;
    }
    .admin-content {
        margin-left: 0;
        width: 100%;
    }
    .bottom-row {
        grid-template-columns: 1fr;
    }
}
@media (max-width: 768px) {
    .charts-row {
        grid-template-columns: 1fr;
    }
    .stats-grid {
        grid-template-columns: 1fr 1fr;
    }
    .header-actions {
        width: 100%;
        justify-content: flex-end;
    }
    .search-box {
        width: auto;
        flex: 1;
    }
}
@media (max-width: 576px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }
    .admin-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }
}
    </style>
</head>
<body>
    <div class="admin-container" style="display: flex; min-height: 100vh;">
        @include('layouts.sidebar')
        <div style="flex:1; display: flex; flex-direction: column;">
            @include('layouts.header')
            <main class="admin-content" style="flex:1;">
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
    <script>
        feather.replace();
    </script>
</body>
</html>