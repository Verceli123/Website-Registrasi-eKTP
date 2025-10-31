<?php
if (isset($_POST['simpan'])) {
  $kategori = $_POST['kategori'];
  $wilayah = $_POST['wilayah'];
  $tanggal = $_POST['tanggal'];
  $image = $_FILES['photo']['name'];

  echo "<h2>Data Layanan e-KTP Berhasil Diterima</h2>";
  echo "Kategori Layanan : " . htmlspecialchars($kategori) . "<br>";
  echo "Wilayah Pelayanan : " . htmlspecialchars($wilayah) . "<br>";
  echo "Jadwal Pelayanan : " . htmlspecialchars($tanggal) . "<br>";
  echo "Nama File Foto : " . htmlspecialchars($image) . "<br>";
}
?>
