<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;

class TransactionController extends Controller
{
    // ================================
    //   TAMPIL DATA TRANSAKSI E-KTP
    // ================================
    public function index()
    {
        $data = Pengajuan::where('status', 'diterima')
                         ->orderBy('id_pengajuan', 'DESC')
                         ->get();

        return view('transaction.proses-ektp', compact('data'));
    }

    // ================================
    //      CETAK KTP (HALAMAN HTML)
    // ================================
    public function cetak($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        // Convert foto → base64
        $fotoBase64 = null;
        if ($pengajuan->foto && file_exists(public_path('uploads/' . $pengajuan->foto))) {
            $path = public_path('uploads/' . $pengajuan->foto);
            $fotoBase64 = "data:image/jpeg;base64," . base64_encode(file_get_contents($path));
        }

        return view('transaction.template-ktp', [
            'data' => $pengajuan,
            'foto' => $fotoBase64
        ]);
    }

    // ================================
    //      CETAK KTP (PDF DOMPDF)
    // ================================
    public function cetakKTP($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        // Convert foto → base64
        $fotoBase64 = null;
        if ($pengajuan->foto && file_exists(public_path('uploads/'.$pengajuan->foto))) {
            $path = public_path('uploads/'.$pengajuan->foto);
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $img = file_get_contents($path);
            $fotoBase64 = 'data:image/' . $type . ';base64,' . base64_encode($img);
        }

        $pdf = \PDF::loadView('transaction.template-ktp', [
            'data' => $pengajuan,
            'foto' => $fotoBase64
        ]);

        return $pdf->stream("KTP_".$pengajuan->nik.".pdf");
    }
}
