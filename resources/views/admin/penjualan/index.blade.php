@extends('layouts.admin')

@section('title', 'Kelola Penjualan - Admin')

@push('styles')
<style>
/* Sales Dashboard */
.sales-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 2rem;
    gap: 1rem;
}

.sales-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--dark);
    margin: 0;
}

.sales-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.date-range-picker {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1rem;
    border: 1px solid var(--gray);
    border-radius: 8px;
    background: var(--white);
    font-size: 0.875rem;
    cursor: pointer;
    transition: all 0.2s ease;
}

.date-range-picker:hover {
    border-color: var(--primary);
    background: var(--primary-light);
}

.export-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    background: var(--success);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 0.875rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
}

.export-btn:hover {
    background: var(--success-dark);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(72, 187, 120, 0.3);
}

/* Sales Stats */
.sales-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.sales-stat-card {
    background: var(--white);
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.sales-stat-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.sales-stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
}

.sales-stat-card.total::before {
    background: var(--primary);
}
.sales-stat-card.completed::before {
    background: var(--success);
}
.sales-stat-card.pending::before {
    background: var(--warning);
}
.sales-stat-card.canceled::before {
    background: var(--danger);
}

.stat-value {
    display: flex;
    align-items: flex-end;
    gap: 0.5rem;
    margin-bottom: 0.5rem;
}

.stat-number {
    font-size: 1.75rem;
    font-weight: 700;
    line-height: 1;
}

.stat-change {
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    border-radius: 50px;
    font-weight: 500;
}

.stat-change.positive {
    background: rgba(72, 187, 120, 0.1);
    color: var(--success);
}
.stat-change.negative {
    background: rgba(245, 101, 101, 0.1);
    color: var(--danger);
}

.stat-label {
    font-size: 0.875rem;
    color: var(--gray-darker);
    margin-bottom: 0.5rem;
}

.stat-comparison {
    font-size: 0.75rem;
    color: var(--gray-darker);
}

/* Sales Charts */
.sales-charts {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.chart-card {
    background: var(--white);
    border-radius: 12px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray);
    padding: 1.5rem;
}

.chart-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1.5rem;
}

.chart-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--dark);
}

.chart-actions {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.chart-period-selector {
    padding: 0.5rem 0.75rem;
    border: 1px solid var(--gray);
    border-radius: 6px;
    font-size: 0.75rem;
    background: var(--white);
    cursor: pointer;
}

.chart-container {
    height: 300px;
    position: relative;
}

/* Recent Orders */
.recent-orders-card {
    background: var(--white);
    border-radius: 12px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray);
    padding: 1.5rem;
}

.orders-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1.5rem;
}

.orders-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--dark);
}

.orders-filter {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.order-filter-btn {
    padding: 0.5rem 1rem;
    border: 1px solid var(--gray);
    border-radius: 6px;
    font-size: 0.75rem;
    background: var(--white);
    cursor: pointer;
    transition: all 0.2s ease;
}

.order-filter-btn:hover {
    border-color: var(--primary);
    color: var(--primary);
}

.order-filter-btn.active {
    background: var(--primary);
    border-color: var(--primary);
    color: white;
}

.table-responsive {
    overflow-x: auto;
}

.orders-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.875rem;
}

.orders-table th {
    padding: 1rem;
    text-align: left;
    border-bottom: 2px solid var(--gray);
    font-weight: 600;
    color: var(--gray-darker);
    text-transform: uppercase;
    letter-spacing: 0.025em;
    white-space: nowrap;
}

.orders-table td {
    padding: 1rem;
    border-bottom: 1px solid var(--gray-light);
    vertical-align: middle;
}

.order-id {
    font-weight: 600;
    color: var(--primary);
}

.order-customer {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.customer-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--gray-light);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.customer-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.customer-name {
    font-weight: 500;
    color: var(--dark);
}

.order-date {
    color: var(--gray-darker);
    font-size: 0.75rem;
}

.order-amount {
    font-weight: 600;
    color: var(--dark);
}

.order-status {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 500;
    text-transform: capitalize;
}

.order-status.completed {
    background: rgba(72, 187, 120, 0.1);
    color: var(--success);
}
.order-status.processing {
    background: rgba(56, 178, 172, 0.1);
    color: var(--teal);
}
.order-status.pending {
    background: rgba(237, 137, 54, 0.1);
    color: var(--warning);
}
.order-status.canceled {
    background: rgba(245, 101, 101, 0.1);
    color: var(--danger);
}
.order-status.shipped {
    background: rgba(102, 126, 234, 0.1);
    color: var(--primary);
}

.order-actions {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.view-order-btn {
    padding: 0.5rem;
    border: none;
    border-radius: 6px;
    background: var(--primary-light);
    color: var(--primary);
    cursor: pointer;
    transition: all 0.2s ease;
}

.view-order-btn:hover {
    background: var(--primary);
    color: white;
}

/* Top Products */
.top-products-card {
    background: var(--white);
    border-radius: 12px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray);
    padding: 1.5rem;
}

.top-products-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1.5rem;
}

.top-products-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--dark);
}

.top-products-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.top-product-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.75rem;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.top-product-item:hover {
    background: var(--gray-light);
}

.product-rank {
    width: 24px;
    height: 24px;
    border-radius: 6px;
    background: var(--primary-light);
    color: var(--primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    font-weight: 600;
    flex-shrink: 0;
}

.top-product-info {
    flex: 1;
    min-width: 0;
}

.top-product-name {
    font-weight: 500;
    color: var(--dark);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.top-product-sales {
    font-size: 0.75rem;
    color: var(--gray-darker);
}

.top-product-revenue {
    font-weight: 600;
    color: var(--dark);
    white-space: nowrap;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .sales-charts {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 1024px) {
    .sales-header {
        flex-direction: column;
        align-items: stretch;
        gap: 1rem;
    }
    
    .sales-actions {
        flex-wrap: wrap;
        justify-content: space-between;
    }
}

@media (max-width: 768px) {
    .sales-stats {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .recent-orders-card,
    .top-products-card {
        padding: 1rem;
    }
}

@media (max-width: 576px) {
    .sales-stats {
        grid-template-columns: 1fr;
    }
    
    .sales-actions {
        flex-direction: column;
        align-items: stretch;
    }
    
    .orders-filter {
        flex-wrap: wrap;
    }
}
</style>
@endpush

@section('content')
<!-- Page Header -->
<div class="sales-header">
    <h1 class="sales-title">Dashboard Penjualan</h1>
    <div class="sales-actions">
        <div class="date-range-picker">
            <i data-feather="calendar"></i>
            <span>Hari Ini</span>
            <i data-feather="chevron-down"></i>
        </div>
        <button class="export-btn">
            <i data-feather="download"></i>
            Export Laporan
        </button>
    </div>
</div>

<!-- Sales Stats -->
<div class="sales-stats">
    <div class="sales-stat-card total">
        <div class="stat-value">
            <div class="stat-number">Rp 42.850.000</div>
            <div class="stat-change positive">+12%</div>
        </div>
        <div class="stat-label">Total Penjualan</div>
        <div class="stat-comparison">vs Rp 38.250.000 minggu lalu</div>
    </div>
    <div class="sales-stat-card completed">
        <div class="stat-value">
            <div class="stat-number">128</div>
            <div class="stat-change positive">+8%</div>
        </div>
        <div class="stat-label">Pesanan Selesai</div>
        <div class="stat-comparison">vs 118 minggu lalu</div>
    </div>
    <div class="sales-stat-card pending">
        <div class="stat-value">
            <div class="stat-number">24</div>
            <div class="stat-change negative">-4%</div>
        </div>
        <div class="stat-label">Pesanan Pending</div>
        <div class="stat-comparison">vs 25 minggu lalu</div>
    </div>
    <div class="sales-stat-card canceled">
        <div class="stat-value">
            <div class="stat-number">5</div>
            <div class="stat-change negative">-2%</div>
        </div>
        <div class="stat-label">Pesanan Dibatalkan</div>
        <div class="stat-comparison">vs 7 minggu lalu</div>
    </div>
</div>

<!-- Sales Charts -->
<div class="sales-charts">
    <div class="chart-card">
        <div class="chart-header">
            <h3 class="chart-title">Grafik Penjualan</h3>
            <div class="chart-actions">
                <select class="chart-period-selector">
                    <option>Minggu Ini</option>
                    <option>Bulan Ini</option>
                    <option>Tahun Ini</option>
                    <option>Custom</option>
                </select>
            </div>
        </div>
        <div class="chart-container">
            <!-- Chart will be rendered here -->
            <canvas id="salesChart"></canvas>
        </div>
    </div>
    <div class="chart-card">
        <div class="chart-header">
            <h3 class="chart-title">Kategori Produk Terlaris</h3>
        </div>
        <div class="chart-container">
            <!-- Chart will be rendered here -->
            <canvas id="categoriesChart"></canvas>
        </div>
    </div>
</div>

<!-- Recent Orders -->
<div class="recent-orders-card">
    <div class="orders-header">
        <h3 class="orders-title">Pesanan Terbaru</h3>
        <div class="orders-filter">
            <button class="order-filter-btn active">Semua</button>
            <button class="order-filter-btn">Selesai</button>
            <button class="order-filter-btn">Proses</button>
            <button class="order-filter-btn">Pending</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="orders-table">
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
                    <td class="order-id">#ORD-2023-00125</td>
                    <td>
                        <div class="order-customer">
                            <div class="customer-avatar">
                                <img src="https://via.placeholder.com/36x36/667eea/ffffff?text=AB" alt="Customer">
                            </div>
                            <div>
                                <div class="customer-name">Andi Budiman</div>
                                <div class="order-date">12 Nov 2023, 14:30</div>
                            </div>
                        </div>
                    </td>
                    <td>12 Nov 2023</td>
                    <td class="order-amount">Rp 3.250.000</td>
                    <td><span class="order-status completed">Selesai</span></td>
                    <td>
                        <button class="view-order-btn">
                            <i data-feather="eye"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="order-id">#ORD-2023-00124</td>
                    <td>
                        <div class="order-customer">
                            <div class="customer-avatar">
                                <img src="https://via.placeholder.com/36x36/48bb78/ffffff?text=CD" alt="Customer">
                            </div>
                            <div>
                                <div class="customer-name">Citra Dewi</div>
                                <div class="order-date">12 Nov 2023, 11:45</div>
                            </div>
                        </div>
                    </td>
                    <td>12 Nov 2023</td>
                    <td class="order-amount">Rp 5.750.000</td>
                    <td><span class="order-status shipped">Dikirim</span></td>
                    <td>
                        <button class="view-order-btn">
                            <i data-feather="eye"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="order-id">#ORD-2023-00123</td>
                    <td>
                        <div class="order-customer">
                            <div class="customer-avatar">
                                <img src="https://via.placeholder.com/36x36/ed8936/ffffff?text=EF" alt="Customer">
                            </div>
                            <div>
                                <div class="customer-name">Eko Fajar</div>
                                <div class="order-date">11 Nov 2023, 16:20</div>
                            </div>
                        </div>
                    </td>
                    <td>11 Nov 2023</td>
                    <td class="order-amount">Rp 2.150.000</td>
                    <td><span class="order-status processing">Proses</span></td>
                    <td>
                        <button class="view-order-btn">
                            <i data-feather="eye"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="order-id">#ORD-2023-00122</td>
                    <td>
                        <div class="order-customer">
                            <div class="customer-avatar">
                                <img src="https://via.placeholder.com/36x36/f56565/ffffff?text=GH" alt="Customer">
                            </div>
                            <div>
                                <div class="customer-name">Gita Hartono</div>
                                <div class="order-date">11 Nov 2023, 09:15</div>
                            </div>
                        </div>
                    </td>
                    <td>11 Nov 2023</td>
                    <td class="order-amount">Rp 1.850.000</td>
                    <td><span class="order-status pending">Pending</span></td>
                    <td>
                        <button class="view-order-btn">
                            <i data-feather="eye"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="order-id">#ORD-2023-00121</td>
                    <td>
                        <div class="order-customer">
                            <div class="customer-avatar">
                                <img src="https://via.placeholder.com/36x36/9f7aea/ffffff?text=IJ" alt="Customer">
                            </div>
                            <div>
                                <div class="customer-name">Indra Jaya</div>
                                <div class="order-date">10 Nov 2023, 18:40</div>
                            </div>
                        </div>
                    </td>
                    <td>10 Nov 2023</td>
                    <td class="order-amount">Rp 4.500.000</td>
                    <td><span class="order-status completed">Selesai</span></td>
                    <td>
                        <button class="view-order-btn">
                            <i data-feather="eye"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Feather icons
    feather.replace();
    
    // Initialize Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            datasets: [{
                label: 'Total Penjualan',
                data: [4500000, 5200000, 4800000, 6200000, 7500000, 6800000, 8200000],
                borderColor: 'rgba(102, 126, 234, 1)',
                backgroundColor: 'rgba(102, 126, 234, 0.1)',
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
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Rp ' + context.raw.toLocaleString('id-ID');
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });

    // Initialize Categories Chart
    const categoriesCtx = document.getElementById('categoriesChart').getContext('2d');
    const categoriesChart = new Chart(categoriesCtx, {
        type: 'doughnut',
        data: {
            labels: ['DSLR', 'Mirrorless', 'Lensa', 'Aksesoris', 'Action Cam'],
            datasets: [{
                data: [35, 28, 20, 12, 5],
                backgroundColor: [
                    'rgba(102, 126, 234, 0.8)',
                    'rgba(72, 187, 120, 0.8)',
                    'rgba(237, 137, 54, 0.8)',
                    'rgba(156, 163, 175, 0.8)',
                    'rgba(245, 101, 101, 0.8)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.label + ': ' + context.raw + '%';
                        }
                    }
                }
            },
            cutout: '70%'
        }
    });

    // Date Range Picker
    const dateRangePicker = document.querySelector('.date-range-picker');
    dateRangePicker.addEventListener('click', function() {
        // In a real app, this would open a date picker
        console.log('Opening date range picker');
    });

    // Export Button
    const exportBtn = document.querySelector('.export-btn');
    exportBtn.addEventListener('click', function() {
        console.log('Exporting sales report');
        // In a real app, this would trigger report generation
    });

    // Order Filter Buttons
    const orderFilterBtns = document.querySelectorAll('.order-filter-btn');
    orderFilterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            orderFilterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const filter = this.textContent.toLowerCase();
            console.log('Filtering orders by:', filter);
            // In a real app, this would filter the orders table
        });
    });

    // View Order Buttons
    const viewOrderBtns = document.querySelectorAll('.view-order-btn');
    viewOrderBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const orderId = this.closest('tr').querySelector('.order-id').textContent;
            console.log('Viewing order:', orderId);
            // In a real app, this would open an order detail modal
        });
    });
});
</script>
@endpush