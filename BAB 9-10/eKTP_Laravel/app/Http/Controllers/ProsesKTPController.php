<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Dompdf\Dompdf;
use Dompdf\Options;

class ProsesKTPController extends Controller
{
    public function index()
    {
        $data = Pengajuan::where('status', 'diterima')
                    ->orderBy('id_pengajuan', 'desc')
                    ->get();

        return view('admin.proses-ektp', compact('data'));
    }

    public function cetak($id)
    {
        $d = Pengajuan::findOrFail($id);

        $fotoPath = public_path('uploads/' . $d->foto);

        if (file_exists($fotoPath)) {
            $imageData = base64_encode(file_get_contents($fotoPath));
            $fotoBase64 = 'data:image/' . pathinfo($fotoPath, PATHINFO_EXTENSION) . ';base64,' . $imageData;
        } else {
            $fotoBase64 = "";
        }

        $html = view('admin.template-ktp', compact('d', 'fotoBase64'))->render();

        $options = new Options();
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream("KTP_{$d->nik}.pdf", ["Attachment" => false]);
    }
}
