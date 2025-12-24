<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "db_ektp";

$koneksi = mysqli_connect($server, $user, $pass, $db);

if (!$koneksi) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
?>
