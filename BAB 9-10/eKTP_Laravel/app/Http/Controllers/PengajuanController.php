<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PengajuanController extends Controller
{
    /* ===============================
       LIST PENGAJUAN (ADMIN)
    =============================== */
    public function categories()
    {
        $pengajuan = Pengajuan::orderBy('id_pengajuan', 'DESC')->get();
        return view('categories.categories', compact('pengajuan'));
    }

    /* ===============================
       FORM CREATE (JIKA DIPAKAI)
    =============================== */
    public function create()
    {
        return view('pengajuan.create');
    }

    /* ===============================
       STORE PENGAJUAN
    =============================== */
    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required',
            'nik'           => 'required',
            'alamat'        => 'required',
            'tanggal_lahir' => 'required',
            'foto'          => 'required|image',
            'foto_kk'       => 'required|image'
        ]);

        // Upload foto diri
        $fotoName = time() . '_foto.' . $request->foto->extension();
        $request->foto->move(public_path('uploads'), $fotoName);

        // Upload foto KK
        $kkName = time() . '_kk.' . $request->foto_kk->extension();
        $request->foto_kk->move(public_path('uploads'), $kkName);

        // Simpan ke DB
        Pengajuan::create([
            'nama'          => $request->nama,
            'nik'           => $request->nik,
            'alamat'        => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'foto'          => $fotoName,
            'foto_kk'       => $kkName,
            'status'        => 'pending'
        ]);

        // Simpan NIK ke session untuk progress user
        session()->put('nik', $request->nik);

        return redirect('/')->with('success', 'Pengajuan berhasil dikirim!');
    }

    /* ===============================
       APPROVE PAGE
    =============================== */
    public function approvePage($id)
    {
        $pengajuan = Pengajuan::where('id_pengajuan', $id)->firstOrFail();
        return view('categories.approve', compact('pengajuan'));
    }

    /* ===============================
       APPROVE
    =============================== */
    public function approve($id)
    {
        Pengajuan::where('id_pengajuan', $id)->update([
            'status' => 'diterima'
        ]);

        return redirect('/categories')->with('success', 'Pengajuan disetujui!');
    }

    /* ===============================
       REJECT PAGE
    =============================== */
    public function rejectPage($id)
    {
        $pengajuan = Pengajuan::where('id_pengajuan', $id)->firstOrFail();
        return view('categories.reject', compact('pengajuan'));
    }

    /* ===============================
       REJECT & DELETE
    =============================== */
    public function reject($id)
    {
        $data = Pengajuan::where('id_pengajuan', $id)->first();

        if ($data) {

            // hapus foto diri
            if ($data->foto && File::exists(public_path('uploads/' . $data->foto))) {
                File::delete(public_path('uploads/' . $data->foto));
            }

            // hapus foto kk
            if ($data->foto_kk && File::exists(public_path('uploads/' . $data->foto_kk))) {
                File::delete(public_path('uploads/' . $data->foto_kk));
            }

            $data->delete();
        }

        return redirect('/categories')->with('success', 'Pengajuan ditolak & dihapus!');
    }
}
