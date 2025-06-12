
@extends('layouts.admin')

@section('title', 'Dashboard Admin')


<style>
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    display: flex;
    align-items: center;
    gap: 1rem;
}

.stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
}

.stat-info {
    flex: 1;
}

.stat-value {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 0.25rem;
}

.stat-label {
    font-size: 0.875rem;
    color: var(--gray-dark);
}

.stat-change {
    font-size: 0.875rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.stat-change.positive {
    color: var(--success);
}

.stat-change.negative {
    color: var(--danger);
}

/* Charts Row */
.charts-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.chart-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    padding: 1.5rem;
}

.chart-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1.5rem;
}

.chart-header h3 {
    font-size: 1.25rem;
    font-weight: 600;
}

.chart-period {
    padding: 0.5rem 1rem;
    border: 1px solid var(--gray);
    border-radius: 8px;
    background: white;
    font-size: 0.875rem;
    cursor: pointer;
}

.chart-container {
    height: 280px;
    position: relative;
}

/* Bottom Row */
.bottom-row {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 1.5rem;
}

.table-card, .products-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    padding: 1.5rem;
}

.table-header, .products-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1.5rem;
}

.table-header h3, .products-header h3 {
    font-size: 1.25rem;
    font-weight: 600;
}

.view-all {
    font-size: 0.875rem;
    color: var(--primary);
    text-decoration: none;
    font-weight: 500;
}

.table-responsive {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 1rem;
    text-align: left;
    border-bottom: 1px solid var(--gray);
    white-space: nowrap;
}

th {
    font-weight: 600;
    font-size: 0.875rem;
    color: var(--gray-dark);
    text-transform: uppercase;
}

td {
    font-size: 0.875rem;
}

.status {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 500;
}

.status.pending {
    background: rgba(237, 137, 54, 0.1);
    color: var(--warning);
}

.status.processing {
    background: rgba(66, 153, 225, 0.1);
    color: var(--info);
}

.status.shipped {
    background: rgba(102, 126, 234, 0.1);
    color: var(--primary);
}

.status.completed {
    background: rgba(72, 187, 120, 0.1);
    color: var(--success);
}

.action-btn {
    background: none;
    border: none;
    color: var(--gray-dark);
    cursor: pointer;
    transition: all 0.3s ease;
}

.action-btn:hover {
    color: var(--primary);
}

/* Products List */
.products-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.product-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.75rem 0;
    border-bottom: 1px solid var(--gray);
}

.product-item:last-child {
    border-bottom: none;
}

.product-image {
    width: 60px;
    height: 60px;
    border-radius: 8px;
    overflow: hidden;
    background: var(--light);
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.product-info {
    flex: 1;
}

.product-info h4 {
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.product-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    font-size: 0.75rem;
    color: var(--gray-dark);
}

.product-meta .sales {
    color: var(--dark);
    font-weight: 500;
}

.product-meta .price {
    color: var(--primary);
    font-weight: 600;
}
</style>
@section('content')
    <div class="admin-container">
        <main class="admin-content">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(102, 126, 234, 0.1); color: #667eea;">
                        <i data-feather="dollar-sign"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-value">Rp 42.850.000</div>
                        <div class="stat-label">Pendapatan Hari Ini</div>
                        
                        <div class="stat-change positive">
                            <i data-feather="trending-up"></i>
                            12.5%
                        </div>
                    </div>
                    
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(75, 192, 192, 0.1); color: #4bc0c0;">
                        <i data-feather="shopping-bag"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-value">48</div>
                        <div class="stat-label">Pesanan Hari Ini</div>
                    </div>
                    <div class="stat-change positive">
                        <i data-feather="trending-up"></i>
                        8.3%
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(255, 159, 64, 0.1); color: #ff9f40;">
                        <i data-feather="users"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-value">24</div>
                        <div class="stat-label">Pelanggan Baru</div>
                    </div>
                    <div class="stat-change negative">
                        <i data-feather="trending-down"></i>
                        4.2%
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(153, 102, 255, 0.1); color: #9966ff;">
                        <i data-feather="package"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-value">128</div>
                        <div class="stat-label">Produk Tersedia</div>
                    </div>
                    <div class="stat-change positive">
                        <i data-feather="trending-up"></i>
                        5.6%
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="charts-row">
                <!-- Sales Chart -->
                <div class="chart-card">
                    <div class="chart-header">
                        <h3>Statistik Penjualan</h3>
                        <select class="chart-period">
                            <option>7 Hari Terakhir</option>
                            <option>30 Hari Terakhir</option>
                            <option selected>Bulan Ini</option>
                            <option>Tahun Ini</option>
                        </select>
                    </div>
                    <div class="chart-container">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
                
                <!-- Revenue Chart -->
                <div class="chart-card">
                    <div class="chart-header">
                        <h3>Pendapatan Bulanan</h3>
                        <select class="chart-period">
                            <option>2023</option>
                            <option selected>2024</option>
                        </select>
                    </div>
                    <div class="chart-container">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Bottom Row -->
            <div class="bottom-row">
                <!-- Recent Orders -->
                <div class="table-card">
                    <div class="table-header">
                        <h3>Pesanan Terbaru</h3>
                        <a href="#" class="view-all">Lihat Semua</a>
                    </div>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID Pesanan</th>
                                    <th>Pelanggan</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#CH7852</td>
                                    <td>Andi Wijaya</td>
                                    <td>12 Mei 2024</td>
                                    <td>Rp 8.750.000</td>
                                    <td><span class="status shipped">Dikirim</span></td>
                                    <td>
                                        <button class="action-btn">
                                            <i data-feather="eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#CH7851</td>
                                    <td>Budi Santoso</td>
                                    <td>12 Mei 2024</td>
                                    <td>Rp 12.499.000</td>
                                    <td><span class="status processing">Diproses</span></td>
                                    <td>
                                        <button class="action-btn">
                                            <i data-feather="eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#CH7850</td>
                                    <td>Citra Dewi</td>
                                    <td>11 Mei 2024</td>
                                    <td>Rp 5.250.000</td>
                                    <td><span class="status completed">Selesai</span></td>
                                    <td>
                                        <button class="action-btn">
                                            <i data-feather="eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#CH7849</td>
                                    <td>Dian Permata</td>
                                    <td>11 Mei 2024</td>
                                    <td>Rp 32.999.000</td>
                                    <td><span class="status pending">Menunggu Pembayaran</span></td>
                                    <td>
                                        <button class="action-btn">
                                            <i data-feather="eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#CH7848</td>
                                    <td>Eko Prasetyo</td>
                                    <td>10 Mei 2024</td>
                                    <td>Rp 7.850.000</td>
                                    <td><span class="status shipped">Dikirim</span></td>
                                    <td>
                                        <button class="action-btn">
                                            <i data-feather="eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Top Products -->
                <div class="products-card">
                    <div class="products-header">
                        <h3>Produk Terlaris</h3>
                        <a href="#" class="view-all">Lihat Semua</a>
                    </div>
                    <div class="products-list">
                        <div class="product-item">
                            <div class="product-image">
                                <img src="https://via.placeholder.com/60" alt="Canon EOS R6">
                            </div>
                            <div class="product-info">
                                <h4>Canon EOS R6 Mark II</h4>
                                <div class="product-meta">
                                    <span class="sales">28 Terjual</span>
                                    <span class="price">Rp 42.999.000</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="product-image">
                                <img src="https://via.placeholder.com/60" alt="Sony A7 IV">
                            </div>
                            <div class="product-info">
                                <h4>Sony A7 IV Body</h4>
                                <div class="product-meta">
                                    <span class="sales">24 Terjual</span>
                                    <span class="price">Rp 38.500.000</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="product-image">
                                <img src="https://via.placeholder.com/60" alt="GoPro HERO11">
                            </div>
                            <div class="product-info">
                                <h4>GoPro HERO11 Black</h4>
                                <div class="product-meta">
                                    <span class="sales">22 Terjual</span>
                                    <span class="price">Rp 7.999.000</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="product-image">
                                <img src="https://via.placeholder.com/60" alt="Canon RF 24-70mm">
                            </div>
                            <div class="product-info">
                                <h4>Canon RF 24-70mm f/2.8L</h4>
                                <div class="product-meta">
                                    <span class="sales">18 Terjual</span>
                                    <span class="price">Rp 32.750.000</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="product-image">
                                <img src="https://via.placeholder.com/60" alt="Nikon Z6 II">
                            </div>
                            <div class="product-info">
                                <h4>Nikon Z6 II Body</h4>
                                <div class="product-meta">
                                    <span class="sales">15 Terjual</span>
                                    <span class="price">Rp 36.750.000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    @stack('scripts')






    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        feather.replace();
        
        // Toggle sidebar on mobile
        const sidebarToggle = document.querySelector('.sidebar-toggle');
        const sidebar = document.querySelector('.admin-sidebar');
        
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
        
        // Initialize charts
        document.addEventListener('DOMContentLoaded', function() {
            // Sales Chart
            const salesCtx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(salesCtx, {
                type: 'line',
                data: {
                    labels: ['1 Mei', '5 Mei', '10 Mei', '15 Mei', '20 Mei', '25 Mei', '30 Mei'],
                    datasets: [{
                        label: 'Penjualan',
                        data: [12, 19, 15, 25, 18, 30, 28],
                        backgroundColor: 'rgba(102, 126, 234, 0.1)',
                        borderColor: '#667eea',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
            
            // Revenue Chart
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(revenueCtx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        label: 'Pendapatan (Juta Rp)',
                        data: [85, 92, 78, 95, 120, 105, 110, 115, 125, 140, 130, 150],
                        backgroundColor: [
                            'rgba(102, 126, 234, 0.7)',
                            'rgba(102, 126, 234, 0.7)',
                            'rgba(102, 126, 234, 0.7)',
                            'rgba(102, 126, 234, 0.7)',
                            'rgba(102, 126, 234, 0.7)',
                            'rgba(102, 126, 234, 0.7)',
                            'rgba(102, 126, 234, 0.7)',
                            'rgba(102, 126, 234, 0.7)',
                            'rgba(102, 126, 234, 0.7)',
                            'rgba(102, 126, 234, 0.7)',
                            'rgba(102, 126, 234, 0.7)',
                            'rgba(102, 126, 234, 0.7)'
                        ],
                        borderColor: [
                            '#667eea',
                            '#667eea',
                            '#667eea',
                            '#667eea',
                            '#667eea',
                            '#667eea',
                            '#667eea',
                            '#667eea',
                            '#667eea',
                            '#667eea',
                            '#667eea',
                            '#667eea'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
@endsection