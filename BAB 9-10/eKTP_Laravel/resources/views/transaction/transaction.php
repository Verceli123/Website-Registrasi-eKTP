<?php include '../koneksi.php'; ?> 
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="../assets/logo.png" />
  <title>e-KTP Registration - Transaksi</title>
  <link rel="stylesheet" href="../css/style.css" />
</head>
<body>

<header>
  <nav>
    <a href="../index.php">Home</a>
    <a href="../dashboard.php">Dashboard</a>
    <a href="../categories/categories.php">Data Pengajuan</a>
  </nav>
</header>

<main>
  <div class="logo">
    <img src="../assets/logo.png" alt="Logo e-KTP" />
  </div>

  <h2>Data Transaksi e-KTP</h2>

  <table>
    <tr>
      <th>ID</th>
      <th>NIK</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>

    <?php
    // Ambil hanya yang statusnya 'diterima'
    $q = mysqli_query($koneksi, 
        "SELECT * FROM pengajuan WHERE status='diterima' ORDER BY id_pengajuan DESC"
    );

    if (mysqli_num_rows($q) > 0) {
      while ($d = mysqli_fetch_assoc($q)) {

        echo "
        <tr>
          <td>{$d['id_pengajuan']}</td>
          <td>{$d['nik']}</td>
          <td>{$d['nama']}</td>
          <td>{$d['alamat']}</td>
          <td>".ucfirst($d['status'])."</td>

          <td>
            <!-- Hanya tombol Cetak PDF -->
            <a href='cetak_pdf.php?id={$d['id_pengajuan']}' class='btn-print' target='_blank'>
              Cetak PDF
            </a>
          </td>
        </tr>
        ";
      }
    } 
    else {
      echo "<tr><td colspan='6'>Belum ada transaksi.</td></tr>";
    }
    ?>
  </table>
</main>

<footer>
  <h4>&copy; Registrasi e-KTP 2025</h4>
</footer>

</body>
</html>
