<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="../assets/logo.png" />
  <title>e-KTP Registration - Tambah Layanan</title>
  <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
  <header>
    <nav>
      <a href="../index.php">Home</a>
      <a href="../register.php">Register</a>
      <a href="../login.php">Login</a>
      <a href="../dashboard.php">Dashboard</a>
      <a href="categories-entry.php">Layanan</a>
    </nav>
  </header>

  <main>
    <div class="logo">
      <img src="../assets/logo.png" alt="Logo e-KTP" />
    </div>

    <h2>Tambah Layanan e-KTP</h2>

    <form action="categories-proses.php" method="post" enctype="multipart/form-data">
      <label>Kategori Layanan e-KTP:</label><br>
      <select name="kategori" required>
        <option value="">-- Pilih Kategori Layanan --</option>
        <option value="Perekaman Baru">Perekaman Baru</option>
        <option value="Perubahan Data">Perubahan Data</option>
        <option value="Pencetakan Ulang">Pencetakan Ulang</option>
        <option value="Aktivasi e-KTP Digital">Aktivasi e-KTP Digital</option>
      </select><br><br>

      <label>Wilayah Pelayanan:</label><br>
      <input type="text" name="wilayah" placeholder="Contoh: Kecamatan Malang" required /><br><br>

      <label>Jadwal Pelayanan:</label><br>
      <input type="date" name="tanggal" required /><br><br>

      <label>Unggah Foto Pendukung (opsional):</label><br>
      <input type="file" name="photo"><br><br>

      <button type="submit" name="simpan">Simpan</button>
    </form>
  </main>

  <footer>
    <h4>&copy; Registrasi e-KTP 2025</h4>
  </footer>
</body>
</html>
