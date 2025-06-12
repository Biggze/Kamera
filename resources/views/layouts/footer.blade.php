
<footer style="background: #1e293b; color: white; padding: 3rem 0;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 2rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem;">
        <div>
            <a href="#" style="font-size: 1.8rem; font-weight: bold; color: #667eea; display: flex; align-items: center; gap: 0.5rem; text-decoration: none; margin-bottom: 1rem;">
                <i data-feather="camera"></i>
                CameraHub
            </a>
            <p style="color: #94a3b8; margin-bottom: 1.5rem;">Toko kamera online terlengkap dengan produk berkualitas dan harga terbaik di Indonesia.</p>
            <div style="display: flex; gap: 1rem;">
                <a href="#" style="color: white; background: #334155; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i data-feather="facebook"></i>
                </a>
                <a href="#" style="color: white; background: #334155; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i data-feather="instagram"></i>
                </a>
                <a href="#" style="color: white; background: #334155; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i data-feather="twitter"></i>
                </a>
                <a href="#" style="color: white; background: #334155; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i data-feather="youtube"></i>
                </a>
            </div>
        </div>
        <div>
            <h3 style="font-size: 1.2rem; font-weight: 600; margin-bottom: 1.5rem;">Tautan Cepat</h3>
            <ul style="list-style: none; display: flex; flex-direction: column; gap: 0.8rem;">
                <li><a href="#" style="color: #94a3b8; text-decoration: none; transition: color 0.3s ease;">Beranda</a></li>
                <li><a href="#" style="color: #94a3b8; text-decoration: none; transition: color 0.3s ease;">Produk</a></li>
                <li><a href="#" style="color: #94a3b8; text-decoration: none; transition: color 0.3s ease;">Promo</a></li>
                <li><a href="#" style="color: #94a3b8; text-decoration: none; transition: color 0.3s ease;">Tentang Kami</a></li>
                <li><a href="#" style="color: #94a3b8; text-decoration: none; transition: color 0.3s ease;">Kontak</a></li>
            </ul>
        </div>
        <div>
            <h3 style="font-size: 1.2rem; font-weight: 600; margin-bottom: 1.5rem;">Kategori</h3>
            <ul style="list-style: none; display: flex; flex-direction: column; gap: 0.8rem;">
                <li><a href="#" style="color: #94a3b8; text-decoration: none; transition: color 0.3s ease;">DSLR</a></li>
                <li><a href="#" style="color: #94a3b8; text-decoration: none; transition: color 0.3s ease;">Mirrorless</a></li>
                <li><a href="#" style="color: #94a3b8; text-decoration: none; transition: color 0.3s ease;">Action Camera</a></li>
                <li><a href="#" style="color: #94a3b8; text-decoration: none; transition: color 0.3s ease;">Lensa</a></li>
                <li><a href="#" style="color: #94a3b8; text-decoration: none; transition: color 0.3s ease;">Aksesoris</a></li>
            </ul>
        </div>
        <div>
            <h3 style="font-size: 1.2rem; font-weight: 600; margin-bottom: 1.5rem;">Kontak Kami</h3>
            <ul style="list-style: none; display: flex; flex-direction: column; gap: 0.8rem; color: #94a3b8;">
                <li style="display: flex; align-items: center; gap: 0.5rem;">
                    <i data-feather="map-pin" style="width: 16px;"></i>
                    Jl. Fotografi No. 123, Jakarta
                </li>
                <li style="display: flex; align-items: center; gap: 0.5rem;">
                    <i data-feather="mail" style="width: 16px;"></i>
                    info@camerahub.id
                </li>
                <li style="display: flex; align-items: center; gap: 0.5rem;">
                    <i data-feather="phone" style="width: 16px;"></i>
                    (021) 1234-5678
                </li>
                <li style="display: flex; align-items: center; gap: 0.5rem;">
                    <i data-feather="clock" style="width: 16px;"></i>
                    Senin - Jumat: 09.00 - 18.00
                </li>
            </ul>
        </div>
    </div>
    <div style="max-width: 1200px; margin: 0 auto; padding: 2rem; border-top: 1px solid #334155; margin-top: 2rem; text-align: center; color: #94a3b8; font-size: 0.9rem;">
        <p>© {{ date('Y') }} CameraHub. All rights reserved.</p>
    </div>
</footer>
<script>
    feather.replace();
</script>

<style>
     .footer {
            background: #1a202c;
            color: white;
            padding: 4rem 0 2rem;
        }
        
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        
        .footer-section h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #ffd700;
        }
        
        .footer-section ul {
            list-style: none;
        }
        
        .footer-section ul li {
            margin-bottom: 0.5rem;
        }
        
        .footer-section ul li a {
            color: #cbd5e0;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-section ul li a:hover {
            color: #ffd700;
        }
        
        .footer-bottom {
            border-top: 1px solid #2d3748;
            margin-top: 2rem;
            padding-top: 2rem;
            text-align: center;
            color: #718096;
        }
</style>