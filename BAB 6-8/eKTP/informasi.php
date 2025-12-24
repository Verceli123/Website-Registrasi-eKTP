<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Pengajuan e-KTP</title>

    <style>
        /* ====== Base ====== */
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: left;
        }

        h2 {
            text-align: center;
            color: #0066cc;
            margin-bottom: 10px;
        }

        p {
            font-size: 14px;
            margin-bottom: 15px;
        }

        input, button {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: #3399ff;
            box-shadow: 0 0 5px rgba(51,153,255,0.4);
            outline: none;
        }

        /* ====== Tombol ====== */
        button {
            background: #0066cc;  /* tombol biru */
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background: #004d99; /* biru lebih gelap saat hover */
            transform: scale(1.03);
        }

        /* ====== Kotak hasil ====== */
        .result-box {
            margin-top: 20px;
            padding: 15px;
            background: #e8e8e8;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .result-box p {
            margin: 6px 0;
        }

        /* ====== Link kembali ====== */
        a {
            display: inline-block;
            text-decoration: none;
            color: #0066cc;
            font-weight: bold;
            margin-top: 15px;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #004d99;
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Informasi Pengajuan e-KTP</h2>
    <p>Cek status pengajuan dengan memasukkan NIK di bawah ini.</p>

    <form method="POST">
        <label>Masukkan NIK</label>
        <input type="text" name="nik" maxlength="16" required>
        <button type="submit" name="cek">Cek Status</button>
    </form>

    <?php
    if (isset($_POST["cek"])) {
        $nik = $_POST["nik"];

        $cek = mysqli_query($koneksi, "SELECT * FROM pengajuan WHERE nik='$nik' ORDER BY id_pengajuan DESC LIMIT 1");

        if (mysqli_num_rows($cek) > 0) {
            $d = mysqli_fetch_array($cek);

            echo "
            <div class='result-box'>
                <p><strong>Nama:</strong> $d[nama]</p>
                <p><strong>NIK:</strong> $d[nik]</p>
                <p><strong>Alamat:</strong> $d[alamat]</p>
                <p><strong>Status:</strong> " . ucfirst($d['status']) . "</p>
            </div>
            ";
        } else {
            echo "<p style='color:red;margin-top:10px;'>NIK tidak ditemukan atau belum mengajukan.</p>";
        }
    }
    ?>

    <a href="index.php">← Kembali ke Beranda</a>
</div>

</body>
</html>
