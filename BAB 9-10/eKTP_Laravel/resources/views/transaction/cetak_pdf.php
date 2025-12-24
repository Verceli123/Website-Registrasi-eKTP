<?php
require '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

include '../koneksi.php';

$id = $_GET['id'];
$q = mysqli_query($koneksi, "SELECT * FROM pengajuan WHERE id_pengajuan='$id'");
$d = mysqli_fetch_assoc($q);

// SOLUSI 1: Convert gambar ke base64 (RECOMMENDED)
$fotoPath = "../uploads/" . $d['foto'];
$fotoData = "";

if (file_exists($fotoPath) && !empty($d['foto'])) {
    $imageType = pathinfo($fotoPath, PATHINFO_EXTENSION);
    $imageData = file_get_contents($fotoPath);
    $fotoData = 'data:image/' . $imageType . ';base64,' . base64_encode($imageData);
} else {
    // Fallback jika gambar tidak ada
    $fotoData = "data:image/svg+xml;base64," . base64_encode(
        '<svg width="80" height="100" xmlns="http://www.w3.org/2000/svg">
            <rect width="80" height="100" fill="#f0f0f0"/>
            <text x="40" y="50" text-anchor="middle" fill="#666" font-family="Arial" font-size="12">No Photo</text>
        </svg>'
    );
}

$dompdf = new Dompdf();
$dompdf->set_option('isRemoteEnabled', true);
$dompdf->set_option('isPhpEnabled', true);

$html = "
<h2 style='text-align:center;'>e-KTP Indonesia</h2>

<div style='width:330px; height:210px; border:2px solid #333; padding:15px; border-radius:8px; margin:0 auto; font-family:Arial; font-size:14px;'>
    <img src='$fotoData' style='width:80px; height:100px; float:right; border:1px solid #ccc; border-radius:4px; object-fit:cover;' />
    
    <div style='margin-right: 90px;'>
        <p><strong>NIK:</strong> {$d['nik']}</p>
        <p><strong>Nama:</strong> {$d['nama']}</p>
        <p><strong>Alamat:</strong> {$d['alamat']}</p>
        <p><strong>Tanggal Lahir:</strong> {$d['tanggal_lahir']}</p>
        <p><strong>Status:</strong> {$d['status']}</p>
    </div>
</div>
";

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("KTP_".$d['nik'].".pdf", ["Attachment" => false]);
?>