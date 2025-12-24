<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $pengajuans = Pengajuan::all();
        $nik = session()->get('nik');
        $latestPengajuan = null;
        $step = 1;

        if ($nik) {
            $latestPengajuan = Pengajuan::where('nik', $nik)
                ->orderBy('id_pengajuan', 'DESC')
                ->first();

            if ($latestPengajuan) {
                $status = $latestPengajuan->status;

                if ($status == "pending")   $step = 1;
                if ($status == "diproses")  $step = 2;
                if ($status == "dicetak")   $step = 3;
                if ($status == "selesai")   $step = 4;
                if ($status == "ditolak")   $step = 1;
            }
        }

        return view('welcome', compact('pengajuans', 'latestPengajuan', 'step'));
    }


    public function informasi(Request $request)
    {
        $data = null;
        $notFound = false;

        if ($request->isMethod('post')) {
            $nik = $request->nik;

            $data = Pengajuan::where('nik', $nik)
                ->orderBy('id_pengajuan', 'DESC')
                ->first();

            if (!$data) {
                $notFound = true;
            }
        }

        return view('informasi', compact('data', 'notFound'));
    }


    // ============================================================
    // REGISTER PROSES (SESUDAH REGISTER → LANGSUNG LOGIN)
    // ============================================================
    public function registerProses(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required|numeric',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'foto' => 'required|image',
            'foto_kk' => 'required|image',
        ]);

        // Upload foto KTP
        $foto = $request->file('foto');
        $namaFoto = time() . '_ktp.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('uploads'), $namaFoto);

        // Upload foto KK
        $fotoKk = $request->file('foto_kk');
        $namaFotoKk = time() . '_kk.' . $fotoKk->getClientOriginalExtension();
        $fotoKk->move(public_path('uploads'), $namaFotoKk);

        // Simpan database
        Pengajuan::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'foto' => $namaFoto,
            'foto_kk' => $namaFotoKk,
            'status' => 'pending'
        ]);

        // Simpan nik untuk tracking progress e-KTP
        session()->put('nik', $request->nik);

        // LANGSUNG LOGIN setelah register
        session()->put('login_admin', true);

        return redirect('/dashboard-admin')->with('success', 'Registrasi berhasil! Anda otomatis login.');
    }


    // ============================================================
    // LOGIN ADMIN
    // ============================================================
    public function loginProses(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Login sementara (hardcode)
        $adminUsername = "admin";
        $adminPassword = "admin123";

        if ($request->username === $adminUsername && $request->password === $adminPassword) {

            session()->put('login_admin', true);

            return redirect('/dashboard-admin')->with('success', 'Berhasil login admin!');
        }

        return back()->with('error', 'Username atau password salah!');
    }
}
