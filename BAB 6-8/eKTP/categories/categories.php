<?php include '../koneksi.php'; ?> 
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pengajuan e-KTP</title>
    <link rel="stylesheet" href="../css/style.css">

    <style>
        body { font-family: Arial; background:#f4f6f8; }
        header nav { 
            background:#0077cc; 
            padding:10px; 
            text-align:left; 
            overflow:hidden;
        }
        header nav a { 
            color:white; 
            margin:0 10px; 
            font-weight:bold; 
            text-decoration:none; 
            float:left;
        }
        header nav a.logout { float:right; }
        main { 
            width:90%; 
            margin:20px auto; 
            background:white; 
            padding:20px; 
            border-radius:10px; 
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }
        table { 
            width:100%; 
            border-collapse:collapse; 
            margin-top:15px;
        }
        th, td { 
            border:1px solid #ccc; 
            padding:10px; 
            text-align:center;
        }
        th { background:#0077cc; color:white; }
        img { border-radius:8px; }

        .btn-acc { background:#28a745; color:white; padding:5px 10px; border-radius:5px; text-decoration:none; }
        .btn-tolak { background:#dc3545; color:white; padding:5px 10px; border-radius:5px; text-decoration:none; }
    </style>
</head>

<body>
<header>
    <nav>
        <a href="../index.php">Home</a>
        <a href="../dashboard.php">Dashboard</a>
        <!-- 🔥 TOMBOL PROSES e-KTP MENUJU transaction.php -->
           <a href="../transaction/transaction.php">Proses e-KTP</a>

        <a href="../logout.php" class="logout">Logout</a>
    </nav>
</header>

<main>

    <h2>Daftar Pengajuan e-KTP</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Foto Diri</th>
            <th>Foto KK</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php
        // AMBIL DATA PENGAJUAN
        $query = mysqli_query($koneksi, "SELECT * FROM pengajuan ORDER BY id_pengajuan DESC");

        if (mysqli_num_rows($query) > 0) {
            while ($p = mysqli_fetch_assoc($query)) {

                $foto_diri = !empty($p['foto']) ? $p['foto'] : "noimage.png";
                $foto_kk = !empty($p['foto_kk']) ? $p['foto_kk'] : "noimage.png";

                echo "<tr>";
                echo "<td>{$p['id_pengajuan']}</td>";
                echo "<td>{$p['nama']}</td>";
                echo "<td>{$p['nik']}</td>";
                echo "<td>{$p['alamat']}</td>";
                echo "<td>{$p['tanggal_lahir']}</td>";

                echo "<td><img src='../uploads/{$foto_diri}' width='90'></td>";
                echo "<td><img src='../uploads/{$foto_kk}' width='90'></td>";

                echo "<td>".ucfirst($p['status'])."</td>";

                echo "<td>
                        <a class='btn-acc' href='approve.php?id={$p['id_pengajuan']}'>Setujui</a>
                        <a class='btn-tolak' href='reject.php?id={$p['id_pengajuan']}'>Tolak</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>Belum ada pengajuan.</td></tr>";
        }
        ?>
    </table>

</main>
</body>
</html>
