<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan e-KTP Online</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        /* =========================== NAVBAR ============================= */
        header nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #0077cc;
            padding: 10px 20px;
        }

        header nav .logo h2 {
            margin: 0;
            color: white;
            font-size: 20px;
        }

        header nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 20px;
        }

        header nav ul li a {
            color: white;
            font-weight: bold;
            text-decoration: none;
        }

        header nav ul li a.active {
            text-decoration: underline;
        }

        header .btn-nav {
            background: #ffb72b;
            color: #fff;
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            margin-left: 10px;
        }

        header .btn-nav.blue {
            background: #1d7dfa;
        }

        /* ========== MODAL ========= */
        .modal-container {
            display: none;
            position: fixed;
            top: 0;left: 0;
            width: 100%;height: 100%;
            background: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-dialog {
            background: #fff;
            padding: 20px;
            max-width: 500px;
            width: 90%;
            border-radius: 8px;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-body input,
        .modal-body textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .modal-footer {
            margin-top: 15px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .modal-footer button[type="submit"] {
            background-color: #ffb72b;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
        }

        .modal-footer button[type="button"] {
            background-color: #ccc;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
        }

        .status-box {
            max-width: 800px;
            margin: 25px auto;
            padding: 18px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: Roboto, sans-serif;
        }

        .jumbotron {
            text-align: center;
            margin: 30px auto;
            padding: 20px;
        }

        /* =========================== STEP PROGRESS =========================== */
        .progress-box {
            max-width: 800px;
            margin: 25px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #ddd;
        }
        .stepper {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }
        .step {
            text-align: center;
            width: 25%;
        }
        .step-circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #ccc;
            margin: auto;
            line-height: 30px;
            font-weight: bold;
            color: white;
        }
        .active-step {
            background: #0077cc !important;
        }

        /* =========================== INFO TAMBAHAN =========================== */
        .info-box {
            max-width: 800px;
            margin: 25px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        /* =========================== TOAST =========================== */
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #0077cc;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            z-index: 2000;
            display: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        /* =========================== PANDUAN =========================== */
        .panduan-section {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
        }

        .panduan-container {
            display: flex;
            align-items: center;
            gap: 20px;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .panduan-img {
            width: 200px;
            border-radius: 12px;
        }

        .panduan-teks p {
            margin: 6px 0;
            font-size: 15px;
            text-align: justify;
        }
    </style>
</head>

<body>

    <!-- TOAST -->
    <div id="toast" class="toast">Selamat datang!</div>

    <header>
        <nav>
            <div class="logo">
                <h2>e-KTP Online</h2>
            </div>

            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>

            <div>
                <a href="#" onclick="bukaModal()" class="btn-nav">Buat e-KTP</a>
                <a href="informasi.php" class="btn-nav blue">Informasi Pengajuan</a>
            </div>
        </nav>
    </header>

    <main>

        <!-- STATUS USER LAMA (TIDAK DIUBAH) -->
        <?php
        $user_status = "";
        if (isset($_SESSION['nik'])) {
            $nik_user = $_SESSION['nik'];
            $cek = mysqli_query($koneksi, "SELECT * FROM pengajuan WHERE nik='$nik_user' ORDER BY id_pengajuan DESC LIMIT 1");

            if (mysqli_num_rows($cek) > 0) {
                $d = mysqli_fetch_array($cek);
                $user_status = $d['status'];

                echo "
                <div class='status-box'>
                    <h3>Status Pengajuan Terbaru</h3>
                    <p><strong>Status:</strong> " . ucfirst($d['status']) . "</p>
                </div>";
            }
        }
        ?>

        <div class="jumbotron">
            <h1>Pengajuan e-KTP dari Rumah</h1>
            <p>Mempermudah proses pembuatan e-KTP tanpa harus datang ke kantor</p>
        </div>

        <!-- ===================== DOM STATUS BARU ===================== -->
        <?php if ($user_status != "") { ?>
        <div class="status-box">
            <h3>Status Pengajuan (DOM)</h3>
            <p>
                <?php
                if ($user_status == "pending") echo "Pengajuan telah dikirim, menunggu verifikasi.";
                if ($user_status == "diproses") echo "Admin sedang memproses dokumen Anda.";
                if ($user_status == "dicetak") echo "e-KTP Anda sedang dicetak.";
                if ($user_status == "selesai") echo "e-KTP sudah selesai! Silakan ambil di kantor.";
                if ($user_status == "ditolak") echo "Pengajuan ditolak. Periksa kembali data.";
                ?>
            </p>
        </div>
        <?php } ?>

        <!-- ===================== DOM PROGRESS ===================== -->
        <?php
        $step = 1;
        if ($user_status == "pending") $step = 1;
        if ($user_status == "diproses") $step = 2;
        if ($user_status == "dicetak") $step = 3;
        if ($user_status == "selesai") $step = 4;
        ?>
        <div class="progress-box">
            <h3>Progress Pengajuan</h3>

            <div class="stepper">
                <div class="step">
                    <div class="step-circle <?php if ($step>=1) echo 'active-step'; ?>">1</div>
                    <p>Kirim</p>
                </div>

                <div class="step">
                    <div class="step-circle <?php if ($step>=2) echo 'active-step'; ?>">2</div>
                    <p>Diproses</p>
                </div>

                <div class="step">
                    <div class="step-circle <?php if ($step>=3) echo 'active-step'; ?>">3</div>
                    <p>Dicetak</p>
                </div>

                <div class="step">
                    <div class="step-circle <?php if ($step>=4) echo 'active-step'; ?>">4</div>
                    <p>Selesai</p>
                </div>
            </div>
        </div>

        <!-- ===================== DOM INFORMASI TAMBAHAN ===================== -->
        <div class="info-box">
            <h3>Informasi Tambahan</h3>
            <p><strong></strong> Pastikan data yang Anda masukkan benar dan sesuai KK.</p>
            <p><strong></strong> Proses pengajuan membutuhkan waktu 1–3 hari kerja.</p>
            <p><strong></strong> Cek status pengajuan di Informasi Pengajuan.</p>
        </div>

        <!-- =========================== PANDUAN =========================== -->
        <section class="panduan-section">
            <div class="panduan-container">
                <img src="assets/panduan.jpg" class="panduan-assets" alt="Panduan e-KTP">
                <div class="panduan-teks">
                    <h2>Panduan Pengajuan e-KTP</h2>
                    <p>1. Siapkan foto diri dengan latar polos.</p>
                    <p>2. Siapkan foto KK yang jelas dan terbaca.</p>
                    <p>3. Isi data sesuai Kartu Keluarga.</p>
                    <p>4. Pastikan NIK sesuai tanpa kesalahan.</p>
                    <p>5. Klik tombol “Buat e-KTP” untuk mulai mengisi.</p>
                </div>
            </div>
        </section>

        <!-- ======================= MODAL FORM ========================= -->
        <div id="modalForm" class="modal-container" onclick="tutupModal()">
            <div class="modal-dialog" onclick="event.stopPropagation()">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Form Pengajuan e-KTP</h2>
                        <button type="button" onclick="tutupModal()">X</button>
                    </div>
                    <form action="proses_pengajuan.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" required>

                            <label for="nik">NIK</label>
                            <input type="text" id="nik" name="nik" maxlength="16" required>

                            <label for="alamat">Alamat</label>
                            <textarea id="alamat" name="alamat" required></textarea>

                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>

                            <label for="foto">Foto Diri (JPG/PNG)</label>
                            <input type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png" required>

                            <label for="foto_kk">Foto KK (JPG/PNG)</label>
                            <input type="file" id="foto_kk" name="foto_kk" accept=".jpg,.jpeg,.png" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" onclick="tutupModal()">Batal</button>
                            <button type="submit" name="kirim">Kirim Pengajuan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>

    <footer>
        <p>&copy; 2025 Layanan e-KTP Online</p>
    </footer>

    <script>
        function bukaModal() {
            document.getElementById('modalForm').style.display = 'flex';
        }

        function tutupModal() {
            document.getElementById('modalForm').style.display = 'none';
        }

        // ==== TOAST ====
        <?php if(isset($_SESSION['welcome'])) { ?>
        document.getElementById('toast').style.display = 'block';
        setTimeout(() => {
            document.getElementById('toast').style.display = 'none';
        }, 3000);
        <?php unset($_SESSION['welcome']); } ?>
    </script>

</body>

</html>
