<?php
session_start();
include "koneksi.php";

if(isset($_POST['kirim'])){
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    // Validasi foto diri
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){
        $foto_tmp = $_FILES['foto']['tmp_name'];
        $foto_name = uniqid() . "_" . $_FILES['foto']['name'];
        move_uploaded_file($foto_tmp, "uploads/$foto_name");
    } else {
        die("Foto diri belum diupload!");
    }

    // Validasi foto KK
    if(isset($_FILES['foto_kk']) && $_FILES['foto_kk']['error'] == 0){
        $kk_tmp = $_FILES['foto_kk']['tmp_name'];
        $kk_name = uniqid() . "_" . $_FILES['foto_kk']['name'];
        move_uploaded_file($kk_tmp, "uploads/$kk_name");
    } else {
        die("Foto KK belum diupload!");
    }

    // INSERT ke tabel sesuai kolom lama — diperbaiki!
    $sql = "INSERT INTO pengajuan 
            (nama, nik, alamat, tanggal_lahir, foto, foto_kk, status) 
            VALUES 
            ('$nama', '$nik', '$alamat', '$tanggal_lahir', '$foto_name', '$kk_name', 'pending')";

    if(mysqli_query($koneksi, $sql)){
        echo "<script>alert('Pengajuan berhasil dikirim!');window.location='index.php';</script>";
    } else {
        echo 'Error: ' . mysqli_error($koneksi);
    }
}
?>

