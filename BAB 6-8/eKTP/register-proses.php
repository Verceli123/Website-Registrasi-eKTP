<?php
include "koneksi.php";

$username = $_POST['username'];
$email    = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
// password_hash agar aman

// CEK EMAIL SUDAH TERDAFTAR
$cekEmail = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE email='$email'");
if (mysqli_num_rows($cekEmail) > 0) {
    echo "<script>
            alert('Email sudah terdaftar!');
            window.location='register.php';
          </script>";
    exit;
}

// CEK USERNAME SUDAH TERPAKAI
$cekUser = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE username='$username'");
if (mysqli_num_rows($cekUser) > 0) {
    echo "<script>
            alert('Username sudah digunakan!');
            window.location='register.php';
          </script>";
    exit;
}

// INSERT KE tbl_admin
$query = mysqli_query($koneksi, "
    INSERT INTO tbl_admin (username, email, password)
    VALUES ('$username', '$email', '$password')
");

if ($query) {
    echo "<script>
            alert('Registrasi berhasil!');
            window.location='login.php';
          </script>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
