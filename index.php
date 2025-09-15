<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Karyawan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: #e6f2e6; /* krem kehijauan lembut */
            color: #333;
        }

        /* Navbar atas */
        .top-nav {
            background: #fff8e7;
            border-bottom: 2px solid #d4af37;
            padding: 10px 20px;
            z-index: 1000;
        }

        .top-nav .btn-gold {
            background: linear-gradient(135deg, #ffd700, #daa520);
            color: #1a1a1a;
            font-weight: bold;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.4);
            transition: all 0.3s ease;
            margin-left: 10px;
        }

        .top-nav .btn-gold:hover {
            background: linear-gradient(135deg, #ffec8b, #e6be2d);
            transform: translateY(-2px);
        }

        header {
            text-align: center;
            padding: 60px 20px 40px 20px;
            background: #fff8e7;
            border-bottom: 2px solid #d4af37;
        }

        header h1 {
            font-size: 2.5rem;
            color: #d4af37;
            margin-bottom: 10px;
            text-shadow: 1px 1px 4px rgba(212, 175, 55, 0.4);
        }

        header p {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 20px;
        }

        .info-section {
            padding: 60px 20px;
        }

        .info-right h2 {
            color: #d4af37;
            font-size: 2rem;
            margin-bottom: 15px;
            text-shadow: 1px 1px 4px rgba(212, 175, 55, 0.3);
        }

        .info-right p {
            color: #555;
            margin-bottom: 20px;
            font-size: 1.1rem;
        }

        footer {
            text-align: center;
            padding: 30px 20px;
            background: #fff8e7;
            border-top: 2px solid #d4af37;
            color: #555;
        }

        footer a {
            color: #d4af37;
            text-decoration: none;
            margin-left: 15px;
        }

        footer a:hover {
            text-shadow: 1px 1px 3px rgba(212, 175, 55, 0.5);
        }

        /* Responsif gambar */
        .info-section img {
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <!-- Navbar sticky atas -->
   <nav class="top-nav d-flex justify-content-end sticky-top">
        <a href="register.php" class="btn btn-gold">Daftar</a>
        <a href="login.php" class="btn btn-gold">Login</a>
    </nav>

    <!-- Header -->
    <header>
        <h1>Pendaftaran Karyawan Perusahaan X</h1>
        <p>Bergabunglah dan daftarkan dirimu sekarang!</p>
    </header>

    <!-- Info Section -->
    <section class="info-section container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="https://k.top4top.io/p_3545igma31.jpg" alt="Karyawan Diskusi" class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-6 info-right">
                <h2>Bergabunglah Bersama Perusahaan X</h2>
                <p>Daftarkan diri Anda sekarang dan jadilah bagian dari transformasi perusahaan yang modern dan profesional. Isi formulir pendaftaran untuk memulai proses lamaran kerja.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Perusahaan X. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
