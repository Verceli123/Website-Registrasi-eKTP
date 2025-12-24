<?php
include '../koneksi.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan.'); window.location='categories.php';</script>";
    exit;
}

$id = $_GET['id'];

// HAPUS DATA LANGSUNG DARI DATABASE
$query = "DELETE FROM pengajuan WHERE id_pengajuan = '$id'";

if (mysqli_query($koneksi, $query)) {
    echo "<script>
            alert('Pengajuan berhasil ditolak dan data telah dihapus.');
            window.location='categories.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menghapus data pengajuan.');
            window.location='categories.php';
          </script>";
}
?>
