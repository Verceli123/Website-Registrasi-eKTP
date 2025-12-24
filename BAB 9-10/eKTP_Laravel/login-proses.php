<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// CEK USERNAME DI DATABASE
$query = "SELECT * FROM tbl_admin WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);

    // VERIFIKASI PASSWORD HASH
    if (password_verify($password, $data['password'])) {

        // SIMPAN SESSION LOGIN
        $_SESSION['username'] = $data['username'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['role'] = "Admin";

        echo "<script>
                alert('Login Berhasil! Selamat datang, ".$data['username']."');
                window.location='dashboard.php';
              </script>";

    } else {
        // PASSWORD SALAH
        echo "<script>
                alert('Password salah!');
                window.location='login.php';
              </script>";
    }

} else {
    // USERNAME TIDAK ADA
    echo "<script>
            alert('Username tidak ditemukan!');
            window.location='login.php';
          </script>";
}
?>
