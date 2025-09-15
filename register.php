<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Karyawan</title>
    <style>
        /* Reset dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: url('https://k.top4top.io/p_3545igma31.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: rgba(255, 255, 255, 0.9); /* transparansi putih */
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.4);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        h2 {
            color: #d4af37;
            margin-bottom: 25px;
            font-size: 2rem;
            text-shadow: 1px 1px 4px rgba(212, 175, 55, 0.4);
        }

        input[type="text"], input[type="email"], textarea, input[type="file"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #d4af37;
            border-radius: 8px;
            background: #fffbe0;
            transition: 0.3s;
            font-size: 1rem;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        input:focus, textarea:focus, input[type="file"]:focus {
            border-color: #ffd700;
            outline: none;
            box-shadow: 0 0 8px rgba(212, 175, 55, 0.5);
        }

        label {
            display: block;
            text-align: left;
            margin-top: 10px;
            font-weight: bold;
            color: #d4af37;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, #ffd700, #daa520);
            color: #1a1a1a;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            font-size: 1rem;
        }

        button:hover {
            background: linear-gradient(135deg, #ffec8b, #e6be2d);
            transform: translateY(-2px);
        }

        p.error, p.success {
            margin-top: 10px;
        }

        p.error {
            color: red;
        }

        p.success {
            color: green;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Form Pendaftaran Calon Karyawan</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="telepon" placeholder="Telepon">
        <textarea name="alamat" placeholder="Alamat" required></textarea>
        <input type="text" name="pendidikan" placeholder="Pendidikan Terakhir">
        <textarea name="pengalaman" placeholder="Pengalaman Kerja"></textarea>
        <input type="text" name="posisi" placeholder="Posisi yang Dilamar" required>
        <label>Upload CV (PDF/DOC):</label>
        <input type="file" name="cv" accept=".pdf,.doc,.docx" required>
        <button type="submit" name="daftar">Daftar</button>
    </form>
</div>
</body>
</html>
