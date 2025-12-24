<?php
include '../koneksi.php';

$id = $_GET['id'];

// Gunakan nilai ENUM yang sesuai  
$query = "UPDATE pengajuan SET status = 'diterima' WHERE id_pengajuan = '$id'";

if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Pengajuan berhasil disetujui!'); window.location='categories.php';</script>";
} else {
    echo "<script>alert('Gagal menyetujui pengajuan.'); window.location='categories.php';</script>";
}
?>
