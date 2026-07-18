<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Sangkuriang - Sewa Tenda Premium</title>
    
    <!-- LOGO TITLE BROWSER -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
    
    <!-- FONTS & ICONS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- CUSTOM CSS (External) -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        /* =========================================
           MOBILE FIRST & RESPONSIVE FIX
           ========================================= */
        
        :root {
            --primary: #4CAF50;
            --primary-dark: #2E7D32;
            --gold: #FFD54F;
            --glass-bg: rgba(20, 20, 20, 0.7);
            --glass-border: rgba(255, 255, 255, 0.1);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; scroll-behavior: smooth; -webkit-tap-highlight-color: transparent; }
        
        body { 
            font-family: 'Poppins', sans-serif; 
            color: #ffffff; 
            overflow-x: hidden; 
            background: transparent; 
            width: 100%;
        }

        /* --- VIDEO BACKGROUND FIXED --- */
        .fixed-video-bg {
            position: fixed; top: 0; left: 0; width: 100vw; height: 100vh;
            z-index: -9999; pointer-events: none; overflow: hidden;
        }
        .fixed-video-bg video {
            width: 100%; height: 100%; object-fit: cover; transform: scale(1.1);
        }

        /* Overlay Gelap Global */
        .global-overlay {
            position: fixed; inset: 0;
            background: rgba(0, 0, 0, 0.65);
            z-index: -9998; pointer-events: none;
        }

        /* --- NAVBAR FLOATING GLASS --- */
        .navbar {
            position: fixed; top: 0; left: 0; width: 100%; z-index: 1000;
            padding: 15px 0; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: transparent;
        }
        .navbar.scrolled {
            padding: 10px 0; background: rgba(10, 10, 10, 0.9);
            backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }
        .nav-flex { display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        .logo { font-size: 1.2rem; font-weight: 800; color: white; display: flex; align-items: center; gap: 8px; text-decoration: none; }
        .logo i { color: var(--primary); font-size: 1.4rem; }
        
        /* Desktop Menu */
        .nav-menu { display: flex; gap: 30px; list-style: none; }
        .nav-menu a { color: rgba(255,255,255,0.8); text-decoration: none; font-weight: 500; transition: 0.3s; }
        .nav-menu a:hover, .nav-menu a.active { color: var(--primary); }
        .btn-nav { background: var(--primary); color: #fff; padding: 8px 20px; border-radius: 50px; font-weight: 600; text-decoration: none; transition: 0.3s; font-size: 0.9rem; }
        .btn-nav:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(76,175,80,0.4); }
        
        /* Hamburger Mobile */
        .hamburger { display: none; cursor: pointer; flex-direction: column; gap: 6px; z-index: 1001; }
        .hamburger span { width: 25px; height: 2px; background: #fff; transition: 0.3s; }
        .hamburger.active span:nth-child(1) { transform: rotate(45deg) translate(5px, 6px); }
        .hamburger.active span:nth-child(2) { opacity: 0; }
        .hamburger.active span:nth-child(3) { transform: rotate(-45deg) translate(5px, -6px); }

        /* --- HERO SECTION RESPONSIVE --- */
        .hero-video-section {
            position: relative; min-height: 100vh; width: 100%;
            display: flex; align-items: center; justify-content: center; background: transparent;
            padding: 80px 20px 40px; /* Padding atas buat navbar */
        }
        .hero-content-video {
            position: relative; z-index: 10; text-align: center; color: white;
            max-width: 1000px; animation: fadeInUp 1s ease-out;
            text-shadow: 0 4px 20px rgba(0,0,0,0.8); 
        }
        .marquee-wrapper {
            width: 100%; overflow: hidden; margin-bottom: 20px;
            border-top: 1px solid rgba(255,255,255,0.2); border-bottom: 1px solid rgba(255,255,255,0.2);
            padding: 10px 0; background: rgba(0,0,0,0.3); backdrop-filter: blur(10px); border-radius: 10px;
        }
        .marquee-text { display: inline-block; white-space: nowrap; font-size: clamp(0.7rem, 2vw, 1rem); letter-spacing: 2px; text-transform: uppercase; animation: scrollText 25s linear infinite; }
        @keyframes scrollText { 0% { transform: translateX(100%); } 100% { transform: translateX(-100%); } }
        
        /* Judul Responsif */
        .main-title { font-size: clamp(2.5rem, 8vw, 5.5rem); font-weight: 800; line-height: 1.1; margin-bottom: 15px; }
        .highlight-green { color: var(--primary); text-shadow: 0 0 40px rgba(76, 175, 80, 0.6); }
        
        .hero-desc { font-size: clamp(0.9rem, 2.5vw, 1.2rem); color: rgba(255,255,255,0.95); margin-bottom: 30px; line-height: 1.6; }
        
        .btn-glass-hero {
            background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.4);
            color: white; padding: 12px 25px; border-radius: 50px; font-weight: 600;
            backdrop-filter: blur(12px); transition: all 0.3s ease; text-decoration: none; 
            display: inline-flex; align-items: center; gap: 8px; margin: 5px; font-size: 0.9rem;
        }
        .btn-glass-hero:hover { background: var(--primary); border-color: var(--primary); transform: translateY(-3px); }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(40px); } to { opacity: 1; transform: translateY(0); } }

        /* --- GLOBAL GLASS CARD STYLE --- */
        .section { padding: 60px 0; position: relative; z-index: 1; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        .glass-card {
            background: var(--glass-bg); border: 1px solid var(--glass-border);
            backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px);
            border-radius: 16px; transition: 0.3s;
        }
        .glass-card:hover { background: rgba(30, 30, 30, 0.8); border-color: rgba(76, 175, 80, 0.3); transform: translateY(-5px); }

        /* --- 3D MAP RESPONSIVE --- */
        .map-3d-container {
            position: relative; border-radius: 20px; overflow: hidden;
            height: 400px; border: 2px solid rgba(76, 175, 80, 0.4);
            box-shadow: 0 20px 50px rgba(0,0,0,0.5), 0 0 30px rgba(76, 175, 80, 0.15);
            transition: all 0.4s; cursor: pointer; transform: perspective(1000px) rotateX(2deg);
            display: block; margin-bottom: 30px;
        }
        .map-3d-container:hover { transform: perspective(1000px) rotateX(0deg) scale(1.02); border-color: var(--primary); }
        .map-click-overlay {
            position: absolute; inset: 0; background: rgba(0,0,0,0.2);
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            z-index: 10; transition: 0.3s; pointer-events: none;
        }
        .map-3d-container:hover .map-click-overlay { background: rgba(0,0,0,0.0); opacity: 0; }
        .map-btn-float {
            background: rgba(76, 175, 80, 0.9); color: white; padding: 10px 20px;
            border-radius: 50px; font-weight: 600; backdrop-filter: blur(5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3); animation: pulseMap 2s infinite;
            display: flex; align-items: center; gap: 8px; font-size: 0.9rem;
        }
        @keyframes pulseMap { 0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(76, 175, 80, 0.7); } 70% { transform: scale(1.05); box-shadow: 0 0 0 15px rgba(76, 175, 80, 0); } 100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(76, 175, 80, 0); } }

        /* --- RESPONSIVE MEDIA QUERIES (MOBILE FIX) --- */
        @media(max-width: 768px) {
            /* Navbar Mobile */
            .nav-menu {
                position: fixed; top: 0; right: -100%; width: 80%; max-width: 300px; height: 100vh;
                background: rgba(5, 5, 5, 0.98); backdrop-filter: blur(20px);
                flex-direction: column; padding: 100px 30px 30px; transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                border-left: 1px solid rgba(255,255,255,0.1); z-index: 999;
                box-shadow: -10px 0 30px rgba(0,0,0,0.5);
            }
            .nav-menu.active { right: 0; }
            .hamburger { display: flex; }
            
            /* Hero Mobile */
            .hero-video-section { padding-top: 100px; min-height: auto; padding-bottom: 60px; }
            .main-title { margin-bottom: 15px; }
            .btn-glass-hero { width: 100%; justify-content: center; margin: 8px 0; padding: 14px; }
            
            /* Grid Mobile */
            .grid-catalog, .grid-features, .social-grid { grid-template-columns: 1fr !important; gap: 20px; }
            
            /* Map Mobile */
            .map-3d-container { height: 280px; transform: none; border-radius: 16px; }
            .map-3d-container:hover { transform: scale(1.02); }
            .map-btn-float { font-size: 0.8rem; padding: 8px 16px; }
            
            /* Section Spacing */
            .section { padding: 40px 0; }
            .section-header h2 { font-size: 1.8rem !important; }
            
            /* Modal Mobile */
            .modal-content { width: 95% !important; padding: 20px !important; }
            .modal-slider-container { height: 200px !important; }
        }
    </style>
</head>
<body>

    <!-- VIDEO BACKGROUND FIXED -->
    <div class="fixed-video-bg">
        <video id="bgVideo" autoplay muted loop playsinline preload="auto" poster="{{ asset('assets/images/logo.png') }}">
            <source src="{{ asset('uploads/products/bg.mp4') }}" type="video/mp4">
        </video>
    </div>
    <div class="global-overlay"></div>

    <!-- NAVBAR FLOATING GLASS -->
    <nav class="navbar" id="navbar">
        <div class="nav-flex">
            <a href="#" class="logo"><i class="fas fa-mountain"></i> <span>SANGKURIANG</span></a>
            <ul class="nav-menu" id="navMenu">
                <li><a href="#home" class="active">Home</a></li>
                <li><a href="#katalog">Katalog</a></li>
                <li><a href="#keunggulan">Keunggulan</a></li>
                <li><a href="#kontak">Lokasi</a></li>
            </ul>
            <a href="https://wa.me/6281324481252" target="_blank" class="btn-nav">Hubungi Admin</a>
            <div class="hamburger" id="hamburger"><span></span><span></span><span></span></div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="hero-video-section" id="home">
        <div class="hero-content-video">
            <div class="marquee-wrapper">
                <div class="marquee-text">SEWA TENDA FAMILY CAMP &nbsp;&bull;&nbsp; PREMIUM QUALITY &nbsp;&bull;&nbsp; BEST PRICE IN SUBANG &nbsp;&bull;&nbsp; BOOKING SEKARANG</div>
            </div>
            <h1 class="main-title">Sewa Tenda <br><span class="highlight-green">Family Camp</span></h1>
            <p class="hero-desc">Nikmati petualangan keluarga yang tak terlupakan dengan perlengkapan camping premium berkualitas tinggi.</p>
            <div class="hero-btns">
                <a href="#katalog" class="btn-glass-hero"><i class="fas fa-list-ul"></i> Lihat Katalog</a>
                <a href="#kontak" class="btn-glass-hero"><i class="fas fa-map-marker-alt"></i> Cek Lokasi</a>
            </div>
        </div>
        <div style="position: absolute; bottom: 30px; left: 50%; transform: translateX(-50%); z-index: 10; text-align: center; color: rgba(255,255,255,0.8);">
            <div style="width: 24px; height: 40px; border: 2px solid rgba(255,255,255,0.6); border-radius: 20px; margin: 0 auto 10px; position: relative;">
                <div style="width: 4px; height: 8px; background: var(--primary); border-radius: 2px; position: absolute; top: 8px; left: 50%; transform: translateX(-50%); animation: scrollMouse 1.5s infinite;"></div>
            </div>
            <span style="font-size: 0.7rem; letter-spacing: 3px; text-transform: uppercase;">Scroll Down</span>
        </div>
    </section>

    <!-- KATALOG SECTION -->
    <section class="section" id="katalog">
        <div class="container">
            <div class="section-header text-center" style="margin-bottom:40px;">
                <span style="color:var(--primary); letter-spacing:2px; font-size:0.8rem; font-weight:700;">PRODUK UNGGULAN</span>
                <h2 style="font-size:2rem; margin:10px 0;">Koleksi Tenda Premium</h2>
                <p style="color:#aaa; font-size:0.9rem;">Pilih perlengkapan terbaik untuk kenyamanan keluarga Anda.</p>
            </div>
            <div class="grid-catalog" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px;">
                @foreach($products as $product)
                    @php $firstImg = !empty($product['images']) ? $product['images'][0] : 'placeholder.jpg'; @endphp
                    <div class="product-card glass-card" style="overflow:hidden;">
                        <div class="product-img" style="height: 200px; position: relative; overflow: hidden;">
                            @if($product['is_best_seller'])
                                <span style="position:absolute; top:10px; left:10px; background:var(--gold); color:#000; padding:4px 12px; border-radius:20px; font-size:0.65rem; font-weight:700; z-index:2;"><i class="fas fa-crown"></i> BEST SELLER</span>
                            @endif
                            <img src="{{ asset('uploads/products/' . $firstImg) }}" alt="{{ $product['name'] }}" loading="lazy" style="width:100%; height:100%; object-fit:cover; transition:0.5s;">
                            <span style="position:absolute; top:10px; right:10px; background:rgba(0,0,0,0.8); color:var(--gold); padding:4px 12px; border-radius:20px; font-weight:700; font-size:0.8rem; z-index:2;">{{ $product['price'] }}</span>
                        </div>
                        <div class="product-body" style="padding: 20px;">
                            <h3 style="margin-bottom:8px; font-size:1.1rem;">{{ $product['name'] }}</h3>
                            <p style="color:#aaa; font-size:0.85rem; margin-bottom:15px; line-height:1.5;">{{ Str::limit($product['description'], 70) }}</p>
                            <div style="display:flex; gap:8px;">
                                <button onclick='openModal(@json($product))' style="flex:1; padding:10px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); color:white; border-radius:8px; cursor:pointer; font-size:0.8rem;"><i class="fas fa-images"></i> Detail</button>
                                <a href="https://wa.me/6281324481252?text=Booking {{ urlencode($product['name']) }}" target="_blank" style="background:#25D366; color:white; padding:10px 15px; border-radius:8px; text-decoration:none; display:flex; align-items:center; gap:5px; font-size:0.8rem;"><i class="fab fa-whatsapp"></i> Booking</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- KEUNGGULAN SECTION -->
    <section class="section" id="keunggulan">
        <div class="container">
            <div class="section-header text-center" style="margin-bottom:40px;">
                <span style="color:var(--primary); letter-spacing:2px; font-size:0.8rem; font-weight:700;">MENGAPA MEMILIH KAMI?</span>
                <h2 style="font-size:2rem; margin:10px 0;">Keunggulan Sangkuriang</h2>
            </div>
            <div class="grid-features" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                <div class="glass-card" style="padding: 30px 20px; text-align: center;">
                    <div style="width:50px; height:50px; background:linear-gradient(135deg, var(--primary), #2E7D32); border-radius:12px; display:flex; align-items:center; justify-content:center; margin:0 auto 15px; font-size:1.3rem; color:white;"><i class="fas fa-shield-alt"></i></div>
                    <h3 style="font-size:1.1rem; margin-bottom:8px;">Kualitas Terjamin</h3><p style="color:#aaa; font-size:0.85rem;">Sterilisasi & pengecekan ketat setiap selesai sewa.</p>
                </div>
                <div class="glass-card" style="padding: 30px 20px; text-align: center;">
                    <div style="width:50px; height:50px; background:linear-gradient(135deg, var(--primary), #2E7D32); border-radius:12px; display:flex; align-items:center; justify-content:center; margin:0 auto 15px; font-size:1.3rem; color:white;"><i class="fas fa-headset"></i></div>
                    <h3 style="font-size:1.1rem; margin-bottom:8px;">Support 24/7</h3><p style="color:#aaa; font-size:0.85rem;">Tim siap bantu instalasi & kendala teknis kapan saja.</p>
                </div>
                <div class="glass-card" style="padding: 30px 20px; text-align: center;">
                    <div style="width:50px; height:50px; background:linear-gradient(135deg, var(--primary), #2E7D32); border-radius:12px; display:flex; align-items:center; justify-content:center; margin:0 auto 15px; font-size:1.3rem; color:white;"><i class="fas fa-tags"></i></div>
                    <h3 style="font-size:1.1rem; margin-bottom:8px;">Harga Transparan</h3><p style="color:#aaa; font-size:0.85rem;">Tanpa biaya tersembunyi, paket all-in essentials.</p>
                </div>
                <div class="glass-card" style="padding: 30px 20px; text-align: center;">
                    <div style="width:50px; height:50px; background:linear-gradient(135deg, var(--primary), #2E7D32); border-radius:12px; display:flex; align-items:center; justify-content:center; margin:0 auto 15px; font-size:1.3rem; color:white;"><i class="fas fa-map-marker-alt"></i></div>
                    <h3 style="font-size:1.1rem; margin-bottom:8px;">Lokasi Terbaik</h3><p style="color:#aaa; font-size:0.85rem;">Mitra area camping terbaik di Subang & sekitarnya.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION LOKASI & 3D MAP -->
    <section class="section" id="kontak">
        <div class="container">
            <div class="section-header text-center" style="margin-bottom:40px;">
                <span style="color:var(--primary); letter-spacing:2px; font-size:0.8rem; font-weight:700;">TEMUKAN KAMI</span>
                <h2 style="font-size:2rem; margin:10px 0;">Lokasi Basecamp Sangkuriang</h2>
                <p style="color:#aaa; max-width:600px; margin: 0 auto; font-size:0.9rem;">Klik peta di bawah untuk langsung membuka navigasi Google Maps ke lokasi kami.</p>
            </div>
            
            <div style="margin-top: 30px;">
                <!-- 3D INTERACTIVE MAP WRAPPER -->
                <a href="https://maps.app.goo.gl/FUEFtybG71BiThAz7" target="_blank" class="map-3d-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.588888888889!2d107.635!3d-6.785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e688c0c0c0c0c0c%3A0x0!2zNsKwNDcnMDYuMCJTIDEwN8KwMzgnMDYuMCJF!5e0!3m2!1sid!2sid!4v1700000000000" 
                        allowfullscreen="" loading="lazy" style="width:100%; height:100%; border:0; filter: invert(90%) hue-rotate(180deg) brightness(0.8) contrast(1.2);" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <div class="map-click-overlay">
                        <div class="map-btn-float"><i class="fas fa-location-arrow"></i> KLIK UNTUK NAVIGASI</div>
                    </div>
                </a>

                <!-- INFO KONTAK DI BAWAH MAP -->
                <div class="social-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 15px;">
                    <div class="glass-card" style="padding: 20px; text-align: center;">
                        <i class="fab fa-whatsapp" style="font-size: 1.8rem; color: #25D366; margin-bottom: 10px;"></i>
                        <h4 style="font-size:1rem; margin-bottom:5px;">WhatsApp Admin</h4>
                        <a href="https://wa.me/6281324481252" style="display:inline-block; margin-top:8px; background:#25D366; color:white; padding:8px 18px; border-radius:20px; text-decoration:none; font-size:0.85rem;">Chat Sekarang</a>
                    </div>
                    <div class="glass-card" style="padding: 20px; text-align: center;">
                        <i class="fas fa-phone-alt" style="font-size: 1.8rem; color: var(--primary); margin-bottom: 10px;"></i>
                        <h4 style="font-size:1rem; margin-bottom:5px;">Telepon Langsung</h4>
                        <a href="tel:081324481252" style="color: var(--primary); font-weight: bold; font-size: 1rem; display:block; margin-top:8px;">081-324-481-252</a>
                    </div>
                    <div class="glass-card" style="padding: 20px; text-align: center;">
                        <i class="fab fa-instagram" style="font-size: 1.8rem; color: #E1306C; margin-bottom: 10px;"></i>
                        <h4 style="font-size:1rem; margin-bottom:5px;">Instagram</h4>
                        <a href="https://www.instagram.com/sewa_tenda_camp_ciater_subang?igsh=ejd4bTdud3QzNDJu" target="_blank" style="color: #E1306C; font-weight: bold; font-size: 0.9rem; display:block; margin-top:8px;">@sewa_tenda_camp_ciater_subang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER (GLASS) -->
    <footer style="background: rgba(0,0,0,0.8); backdrop-filter: blur(10px); padding: 30px 0; text-align: center; border-top: 1px solid rgba(255,255,255,0.1); position: relative; z-index: 1;">
        <div class="container">
            <h3 style="color: var(--primary); margin-bottom: 8px; font-size:1.2rem;"><i class="fas fa-mountain"></i> Sangkuriang</h3>
            <a href="https://maps.app.goo.gl/Mjfhnvq9FZZ1v5Ly6" target="_blank" rel="noopener noreferrer" style="color: #666; font-size: 0.8rem; text-decoration: none; cursor: pointer; display: inline-block;">
    &copy; Bengkel Komputer 2. All rights reserved.
</a>
            <!-- <a href="https://www.instagram.com/sewa_tenda_camp_ciater_subang?igsh=ejd4bTdud3QzNDJu" target="_blank" style="color: #E1306C; margin-top: 10px; display: inline-block; font-size:0.9rem;"><i class="fab fa-instagram"></i> Follow Us</a> -->
        </div>
    </footer>

    <!-- MODAL DETAIL -->
    <div class="modal-overlay" id="productModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.9); z-index: 2000; align-items: center; justify-content: center; padding:20px;">
        <div class="modal-content" onclick="event.stopPropagation()" style="background: #1a1a1a; padding: 25px; border-radius: 15px; max-width: 500px; width: 95%; position: relative; border:1px solid rgba(255,255,255,0.1);">
            <button onclick="closeModal()" style="position: absolute; top: 15px; right: 15px; background: none; border: none; color: white; font-size: 1.5rem; cursor: pointer;"><i class="fas fa-times"></i></button>
            <div style="position: relative; height: 250px; background: #000; border-radius: 10px; overflow: hidden; margin-bottom: 20px;">
                <div id="modalSlider" style="display: flex; height: 100%; transition: transform 0.5s;"></div>
                <button onclick="changeSlide(-1)" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); background: rgba(0,0,0,0.5); border: none; color: white; padding: 8px; border-radius: 50%; cursor: pointer;"><i class="fas fa-chevron-left"></i></button>
                <button onclick="changeSlide(1)" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: rgba(0,0,0,0.5); border: none; color: white; padding: 8px; border-radius: 50%; cursor: pointer;"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div id="modalBody"></div>
        </div>
    </div>

    <!-- FLOATING WA -->
    <a href="https://wa.me/6281324481252" target="_blank" style="position: fixed; bottom: 20px; right: 20px; width: 55px; height: 55px; background: #25D366; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.8rem; box-shadow: 0 5px 20px rgba(37,211,102,0.4); z-index: 999; text-decoration:none;">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- SCRIPTS -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        // Navbar Floating Effect Logic
        window.addEventListener('scroll', () => {
            const nav = document.getElementById('navbar');
            if(window.scrollY > 50) nav.classList.add('scrolled');
            else nav.classList.remove('scrolled');
        });

        // Mobile Menu Toggle
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('navMenu');
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
        });

        // Close menu when clicking link
        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
            });
        });

        // Video Auto-Play Fix
        window.addEventListener('load', function() {
            var video = document.getElementById('bgVideo');
            if(video) {
                video.play().catch(function(error) {
                    var source = video.querySelector('source');
                    var src = source.src;
                    source.src = ''; 
                    setTimeout(function(){ source.src = src; video.load(); video.play(); }, 100);
                });
            }
        });

        // Modal Logic
        function openModal(product) {
            const modal = document.getElementById('productModal');
            const slider = document.getElementById('modalSlider');
            const body = document.getElementById('modalBody');
            slider.innerHTML = ''; slider.style.transform = 'translateX(0)';
            
            if(product.images && product.images.length > 0) {
                product.images.forEach(img => {
                    slider.innerHTML += `<img src="{{ asset('uploads/products/') }}/${img}" style="min-width:100%; height:100%; object-fit:cover;">`;
                });
            } else {
                slider.innerHTML = `<img src="{{ asset('assets/images/placeholder.jpg') }}" style="min-width:100%; height:100%; object-fit:cover;">`;
            }

            body.innerHTML = `
                <h2 style="margin-bottom:10px; font-size:1.3rem;">${product.name}</h2>
                <p style="color:#aaa; margin-bottom:20px; font-size:0.9rem; line-height:1.6;">${product.description}</p>
                <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:10px;">
                    <span style="font-size:1.3rem; color:#FFD54F; font-weight:bold;">${product.price}</span>
                    <a href="https://wa.me/6281324481252?text=Booking ${product.name}" target="_blank" style="background:#25D366; color:white; padding:10px 20px; border-radius:20px; text-decoration:none; font-size:0.9rem;">Booking Now</a>
                </div>`;
            modal.style.display = 'flex';
        }
        function closeModal() { document.getElementById('productModal').style.display = 'none'; }
        let currentSlide = 0;
        function changeSlide(direction) {
            const slider = document.getElementById('modalSlider');
            const totalSlides = slider.children.length;
            currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
            slider.style.transform = `translateX(-${currentSlide * 100}%)`;
        }
    </script>
</body>
</html>