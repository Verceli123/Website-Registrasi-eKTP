<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan e-KTP Online</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        /* === NAVBAR === */
        header nav {
            display:flex;justify-content:space-between;align-items:center;
            background:#0077cc;padding:10px 20px;
        }
        header nav .logo h2 { margin:0;color:white;font-size:20px; }
        header nav ul { list-style:none;display:flex;gap:20px;margin:0;padding:0; }
        header nav ul li a { color:white;text-decoration:none;font-weight:bold; }
        header nav .btn-nav {
            background:#ffb72b;color:white;padding:8px 14px;border-radius:6px;font-weight:bold;
        }
        header .btn-nav.blue { background:#1d7dfa; }

        /* MODAL */
        .modal-container { display:none;position:fixed;top:0;left:0;width:100%;height:100%;
            background:rgba(0,0,0,0.6);justify-content:center;align-items:center;z-index:1000; }
        .modal-dialog { background:white;padding:20px;width:90%;max-width:500px;border-radius:8px; }

        .modal-body input, .modal-body textarea {
            width:100%;padding:8px;margin-top:5px;border:1px solid #ccc;border-radius:4px;
        }

        /* STATUS BOX */
        .status-box {
            max-width:800px;margin:25px auto;background:white;padding:18px;
            border:1px solid #ddd;border-radius:8px;
        }

        /* PROGRESS */
        .progress-box {
            max-width:800px;margin:25px auto;background:white;padding:20px;border-radius:10px;
            border:1px solid #ddd;
        }
        .stepper { display:flex;justify-content:space-between;margin-top:15px; }
        .step-circle {
            width:30px;height:30px;border-radius:50%;background:#ccc;color:white;
            line-height:30px;font-weight:bold;margin:auto;
        }
        .active-step { background:#0077cc !important; }

        /* PANDUAN */
        .panduan-section { max-width:900px;margin:40px auto;padding:20px; }
        .panduan-container {
            display:flex;gap:20px;background:white;padding:25px;border-radius:12px;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
        }
        .panduan-img { width:200px;border-radius:12px; }
    </style>
</head>
<body>

<!-- NAVBAR -->
<header>
    <nav>
        <div class="logo"><h2>e-KTP Online</h2></div>

        <ul>
            <li><a href="/" class="active">Home</a></li>
            <li><a href="/login">Login</a></li>
        </ul>

        <div>
            <a href="#" onclick="bukaModal()" class="btn-nav">Buat e-KTP</a>
            <a href="/informasi" class="btn-nav blue">Informasi Pengajuan</a>
        </div>
    </nav>
</header>

<main>

    <!-- STATUS PENGAJUAN USER -->
    @if ($latestPengajuan)
    <div class="status-box">
        <h3>Status Pengajuan Terbaru</h3>
        <p><strong>Status:</strong> {{ ucfirst($latestPengajuan->status) }}</p>
    </div>
    @endif

    <!-- JUMBOTRON -->
    <div class="jumbotron" style="text-align:center;margin:30px auto;">
        <h1>Pengajuan e-KTP dari Rumah</h1>
        <p>Mempermudah proses tanpa harus ke kantor</p>
    </div>

    <!-- PROGRESS -->
    <div class="progress-box">
        <h3>Progress Pengajuan</h3>

        <div class="stepper">
            <div class="step">
                <div class="step-circle @if($step>=1) active-step @endif">1</div>
                <p>Kirim</p>
            </div>
            <div class="step">
                <div class="step-circle @if($step>=2) active-step @endif">2</div>
                <p>Diproses</p>
            </div>
            <div class="step">
                <div class="step-circle @if($step>=3) active-step @endif">3</div>
                <p>Dicetak</p>
            </div>
            <div class="step">
                <div class="step-circle @if($step>=4) active-step @endif">4</div>
                <p>Selesai</p>
            </div>
        </div>
    </div>

    <!-- PANDUAN -->
    <section class="panduan-section">
        <div class="panduan-container">
            <img src="{{ asset('assets/panduan.jpg') }}" class="panduan-img">
            <div>
                <h2>Panduan e-KTP</h2>
                <p>1. Siapkan foto diri.</p>
                <p>2. Siapkan foto KK.</p>
                <p>3. Isi data sesuai KK.</p>
                <p>4. Pastikan NIK benar.</p>
                <p>5. Klik tombol “Buat e-KTP”.</p>
            </div>
        </div>
    </section>

    <!-- MODAL FORM -->
    <div id="modalForm" class="modal-container" onclick="tutupModal()">
        <div class="modal-dialog" onclick="event.stopPropagation()">
            <h2>Form Pengajuan e-KTP</h2>

            <form action="/pengajuan/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <label>Nama</label>
                    <input type="text" name="nama" required>

                    <label>NIK</label>
                    <input type="text" name="nik" maxlength="16" required>

                    <label>Alamat</label>
                    <textarea name="alamat" required></textarea>

                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" required>

                    <label>Foto Diri</label>
                    <input type="file" name="foto" accept=".jpg,.png" required>

                    <label>Foto KK</label>
                    <input type="file" name="foto_kk" accept=".jpg,.png" required>

                </div>

                <div class="modal-footer" style="margin-top:15px;text-align:right;">
                    <button type="button" onclick="tutupModal()">Batal</button>
                    <button type="submit">Kirim</button>
                </div>
            </form>
        </div>
    </div>

</main>

<script>
function bukaModal() {
    document.getElementById('modalForm').style.display = 'flex';
}
function tutupModal() {
    document.getElementById('modalForm').style.display = 'none';
}
</script>

</body>
</html>
