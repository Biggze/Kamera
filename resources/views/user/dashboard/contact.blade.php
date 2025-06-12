@extends('layouts.app')

@section('title', 'Kontak Kami - CameraHub')

@section('content')
<!-- Contact Hero -->
<section class="contact-hero">
    <div class="contact-hero-content">
        <div class="contact-hero-text">
            <h1><span>Hubungi</span> Kami</h1>
            <p>Kami siap membantu Anda. Jika ada pertanyaan seputar produk, layanan, atau komunitas CameraHub — jangan ragu untuk menghubungi kami.</p>
        </div>
    </div>
</section>

<!-- Contact Info & Form (Dummy) -->
<section class="contact-main">
    <div class="contact-container">
        <div class="contact-info">
            <h2>Info Kontak</h2>
            <ul>
                <li><i data-feather="map-pin"></i> Jl. Lensa No. 5, Jakarta</li>
                <li><i data-feather="phone"></i> (021) 1234-5678</li>
                <li><i data-feather="mail"></i> support@camerahub.id</li>
                <li><i data-feather="clock"></i> Senin - Jumat, 09.00 - 18.00</li>
            </ul>
        </div>

        <div class="contact-form">
            <h2>Kirim Pesan</h2>
            <form>
                <input type="text" placeholder="Nama Anda" >
                <input type="email" placeholder="Email Anda" >
                <textarea rows="5" placeholder="Pesan Anda" ></textarea>
                <button type="button" class="contact-btn-primary" >
                    <i data-feather="send"></i> Kirim Pesan
                </button>
            </form>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>feather.replace();</script>

<style>
/* (CSS tetap sama seperti sebelumnya) */

.contact-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 6rem 0 3rem;
    color: white;
    text-align: center;
}
.contact-hero-text h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
}
.contact-hero-text h1 span {
    background: linear-gradient(45deg, #ffd700, #ffed4e);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.contact-hero-text p {
    font-size: 1.2rem;
    opacity: 0.9;
}

.contact-main {
    padding: 4rem 0;
    background: #f9fafb;
}
.contact-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
}
.contact-info h2,
.contact-form h2 {
    font-size: 1.8rem;
    margin-bottom: 1rem;
    color: #333;
}
.contact-info ul {
    list-style: none;
    padding: 0;
}
.contact-info li {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
    font-size: 1rem;
    color: #555;
}
.contact-info li i {
    color: #667eea;
}
.contact-form form {
    display: flex;
    flex-direction: column;
}
.contact-form input,
.contact-form textarea {
    padding: 1rem;
    border: 1px solid #d1d5db;
    border-radius: 10px;
    margin-bottom: 1rem;
    font-size: 1rem;
    background-color: #f3f4f6;
    color: #999;
}
.contact-form textarea {
    resize: vertical;
}
.contact-btn-primary {
    padding: 1rem 2rem;
    border-radius: 50px;
    background: linear-gradient(135deg, #ffd700, #ffed4e);
    color: #333;
    font-weight: 600;
    font-size: 1.1rem;
    cursor: not-allowed;
    border: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    opacity: 0.6;
}
@media (max-width: 768px) {
    .contact-container {
        grid-template-columns: 1fr;
    }
    .contact-hero-text h1 {
        font-size: 2.5rem;
    }
}
</style>
@endpush
