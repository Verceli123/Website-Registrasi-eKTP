<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    // Ambil data dari form
    $kategori = $_POST['kategori'];
    $wilayah = $_POST['wilayah'];
    $tanggal = $_POST['tanggal'];

    // Ambil data file upload
    $image = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $error = $_FILES['photo']['error'];

    // Tentukan folder penyimpanan file
    $target_dir = "../assets/uploads/";

    // Pastikan folder ada
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Buat nama file unik
    $file_name = uniqid() . "_" . basename($image);
    $target_file = $target_dir . $file_name;

    // Jika ada foto diunggah
    if ($error === 0 && !empty($image)) {

        if (move_uploaded_file($tmp_name, $target_file)) {

            // Simpan data ke tabel tbl_layanan
            $sql = "INSERT INTO tbl_layanan (kategori, wilayah, tanggal, photo)
                    VALUES ('$kategori', '$wilayah', '$tanggal', '$file_name')";

            if (mysqli_query($koneksi, $sql)) {
                echo "<script>
                        alert('Data layanan berhasil disimpan!');
                        window.location.href = 'categories.php';   // 🔥 Redirect ke halaman kategori
                      </script>";
            } else {
                echo "<p style='color:red'>Gagal menyimpan ke database: " . mysqli_error($koneksi) . "</p>";
            }
        } else {
            echo "<p style='color:red'>Upload foto gagal!</p>";
        }

    } else {
        // Jika tidak ada foto
        $sql = "INSERT INTO tbl_layanan (kategori, wilayah, tanggal, photo)
                VALUES ('$kategori', '$wilayah', '$tanggal', NULL)";

        if (mysqli_query($koneksi, $sql)) {
            echo "<script>
                    alert('Data layanan berhasil disimpan tanpa foto.');
                    window.location.href = 'categories.php';   // 🔥 Redirect ke halaman kategori
                  </script>";
        } else {
            echo "<p style='color:red'>Gagal menyimpan ke database: " . mysqli_error($koneksi) . "</p>";
        }
    }

} else {
    echo "<p>Akses langsung tidak diperbolehkan.</p>";
}
?>
