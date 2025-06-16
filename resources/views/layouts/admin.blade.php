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
            --primary-dark: #5a67d8;
            --secondary: #764ba2;
            --success: #48bb78;
            --danger: #f56565;
            --warning: #ed8936;
            --info: #4299e1;
            --dark: #2d3748;
            --light: #f7fafc;
            --gray: #e2e8f0;
            --gray-light: #f8f9fa;
            --gray-dark: #a0aec0;
            --gray-darker: #718096;
            --white: #ffffff;
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --sidebar-width: 280px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: var(--gray-light);
            color: var(--dark);
            line-height: 1.6;
        }

        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .admin-sidebar {
            width: var(--sidebar-width);
            background: var(--white);
            box-shadow: var(--shadow-lg);
            display: flex;
            flex-direction: column;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 100;
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            border-right: 1px solid var(--gray);
        }

        .sidebar-header {
            padding: 1.5rem 1.25rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--gray);
            background: var(--white);
            min-height: 80px;
        }

        .logo {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            color: var(--primary);
            font-weight: 700;
            font-size: 1.25rem;
            line-height: 1.2;
        }

        .logo i {
            width: 28px;
            height: 28px;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .logo-text {
            display: flex;
            flex-direction: column;
        }

        .logo-text span {
            font-size: 1.25rem;
            font-weight: 700;
            line-height: 1.2;
        }

        .logo-text small {
            font-size: 0.75rem;
            font-weight: 400;
            color: var(--gray-darker);
            margin-top: 2px;
            line-height: 1;
        }

        .sidebar-toggle {
            background: none;
            border: none;
            color: var(--gray-darker);
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 6px;
            display: none;
            transition: all 0.2s ease;
        }

        .sidebar-toggle:hover {
            background: var(--gray);
            color: var(--dark);
        }

        .sidebar-menu {
            flex: 1;
            padding: 1.5rem 0;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: var(--gray) transparent;
        }

        .sidebar-menu::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-menu::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-menu::-webkit-scrollbar-thumb {
            background: var(--gray);
            border-radius: 2px;
        }

        .sidebar-menu ul {
            list-style: none;
            padding: 0 1.25rem;
        }

        .sidebar-menu li {
            margin-bottom: 0.25rem;
        }

        .sidebar-menu li.active a {
            background: var(--primary-light);
            color: var(--primary-dark);
            font-weight: 600;
            border-left: 3px solid var(--primary);
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 0.875rem 1rem;
            color: var(--dark);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            font-size: 0.875rem;
            font-weight: 500;
            border-left: 3px solid transparent;
        }

        .sidebar-menu a:hover {
            background: var(--primary-light);
            color: var(--primary-dark);
            transform: translateX(2px);
        }

        .sidebar-menu a i {
            width: 20px;
            height: 20px;
            margin-right: 0.875rem;
            flex-shrink: 0;
            stroke-width: 2;
        }

        .sidebar-menu a span {
            flex: 1;
        }

        .sidebar-menu .badge {
            background: var(--primary);
            color: var(--white);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.5rem;
            border-radius: 12px;
            min-width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: auto;
        }

        .sidebar-footer {
            padding: 1.25rem;
            border-top: 1px solid var(--gray);
            background: var(--white);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.875rem;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .user-profile:hover {
            background: var(--gray-light);
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid var(--gray);
            flex-shrink: 0;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-info {
            flex: 1;
            min-width: 0;
        }

        .user-info .name {
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--dark);
            line-height: 1.4;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-info .role {
            font-size: 0.75rem;
            color: var(--gray-darker);
            line-height: 1.2;
        }

        .logout {
            color: var(--gray-darker);
            transition: all 0.2s ease;
            padding: 0.5rem;
            border-radius: 6px;
            flex-shrink: 0;
        }

        .logout:hover {
            color: var(--danger);
            background: rgba(245, 101, 101, 0.1);
        }

        .logout i {
            width: 18px;
            height: 18px;
        }

        /* Admin Content */
        .admin-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 2rem;
            overflow-x: hidden;
            min-height: 100vh;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Admin Header */
        .admin-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
            background: var(--white);
            padding: 1.5rem 2rem;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray);
          
        }

        .admin-header h1 {
              margin-left: 300px;
            font-size: 1.875rem;
            font-weight: 700;
            color: var(--dark);
            line-height: 1.2;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .search-box {
            position: relative;
            width: 280px;
        }

          .search-box i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-darker);
            width: 18px;
            height: 18px;
            z-index: 2;
        }

        .search-box input {
            width: 100%;
            padding: 0.875rem 1rem 0.875rem 2.75rem;
            border: 1px solid var(--gray);
            border-radius: 8px;
            background: var(--white);
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 0.875rem;
            color: var(--dark);
        }

        .search-box input::placeholder {
            color: var(--gray-darker);
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
            background: var(--white);
        }

        .notifications {
            position: relative;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--white);
            border: 1px solid var(--gray);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .notifications:hover {
            background: var(--primary-light);
            color: var(--primary);
            border-color: var(--primary);
        }

        .notifications i {
            width: 20px;
            height: 20px;
        }

        .notifications .badge {
            position: absolute;
            top: -6px;
            right: -6px;
            background: var(--danger);
            color: var(--white);
            font-size: 0.625rem;
            font-weight: 700;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid var(--white);
            box-shadow: var(--shadow-sm);
        }

        /* Dashboard Content */
        .dashboard-content {
            background: var(--white);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray);
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .admin-sidebar {
                left: calc(-1 * var(--sidebar-width));
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
            
            .admin-header {
                margin: 0 -2rem 2rem -2rem;
                border-radius: 0;
                border-left: none;
                border-right: none;
            }
        }

        @media (max-width: 768px) {
            .admin-content {
                padding: 1rem;
            }
            
            .admin-header {
                flex-direction: column;
                align-items: stretch;
                gap: 1rem;
                margin: 0 -1rem 1rem -1rem;
                padding: 1.25rem 1rem;
            }
            
            .admin-header h1 {
                font-size: 1.5rem;
            }
            
            .header-actions {
                width: 100%;
                justify-content: space-between;
            }
            
            .search-box {
                flex: 1;
                max-width: none;
                margin-right: 1rem;
            }
            
            .notifications {
                flex-shrink: 0;
            }
        }

        @media (max-width: 576px) {
            .admin-header {
                padding: 1rem;
            }
            
            .admin-header h1 {
                font-size: 1.375rem;
            }
            
            .search-box {
                width: 100%;
                margin-right: 0.75rem;
            }
            
            .search-box input {
                padding: 0.75rem 1rem 0.75rem 2.5rem;
                font-size: 0.875rem;
            }
            
            .sidebar-header {
                padding: 1rem;
            }
            
            .sidebar-menu {
                padding: 1rem 0;
            }
            
            .sidebar-menu ul {
                padding: 0 1rem;
            }
            
            .sidebar-footer {
                padding: 1rem;
            }
        }

        /* Sidebar Mobile Overlay */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 99;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        @media (min-width: 1201px) {
            .sidebar-overlay {
                display: none;
            }
        }

        /* Custom Pagination Style */
.pagination {
    justify-content: center;
    margin-top: 1.5rem;
    margin-bottom: 1.5rem;
}

.pagination .page-item {
    margin: 0 2px;
}

.pagination .page-link {
    color: #007bff;
    border: 1px solid #dee2e6;
    background: #fff;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    transition: background 0.2s, color 0.2s;
    font-weight: 500;
}

.pagination .page-link:hover {
    background: #007bff;
    color: #fff;
    text-decoration: none;
}

.pagination .page-item.active .page-link {
    background: #007bff;
    color: #fff;
    border-color: #007bff;
    font-weight: bold;
}

.pagination .page-item.disabled .page-link {
    color: #aaa;
    background: #f8f9fa;
    border-color: #dee2e6;
    cursor: not-allowed;
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