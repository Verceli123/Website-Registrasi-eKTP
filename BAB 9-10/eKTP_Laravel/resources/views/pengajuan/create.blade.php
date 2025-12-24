@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- Cek apakah user punya pengajuan terakhir --}}
    @if(isset($latestPengajuan))

        <div class="alert alert-info">
            <strong>Status Pengajuan Terakhir:</strong>
            {{ ucfirst($latestPengajuan->status) }}
        </div>

        {{-- Progress Step --}}
        <div class="mb-4">
            <h5>Progres Pengajuan:</h5>
            <div class="progress" style="height: 25px;">
                <div class="progress-bar 
                    @if($step == 1) bg-secondary 
                    @elseif($step == 2) bg-warning 
                    @elseif($step == 3) bg-info 
                    @elseif($step == 4) bg-success 
                    @endif" 
                    role="progressbar"
                    style="width: {{ $step * 25 }}%;">
                    Step {{ $step }}/4
                </div>
            </div>
        </div>

        {{-- Jika status selesai atau ditolak → Boleh membuat baru --}}
        @if($latestPengajuan->status == 'selesai' || $latestPengajuan->status == 'ditolak')

        <div class="alert alert-success mt-4">
            Pengajuan sebelumnya sudah <strong>{{ $latestPengajuan->status }}</strong>.  
            Anda boleh membuat pengajuan baru.
        </div>

        @else
        {{-- Jika masih pending/diproses/dicetak → Tidak boleh membuat baru --}}
        <div class="alert alert-warning mt-4">
            Anda tidak dapat membuat pengajuan baru sebelum proses sebelumnya selesai.
        </div>

        <a href="{{ url('/') }}" class="btn btn-secondary mt-3">Kembali ke Beranda</a>
        @endif

    @endif


    {{-- Form hanya tampil jika belum ada pengajuan, atau status selesai/ditolak --}}
    @if(!isset($latestPengajuan) || $latestPengajuan->status == 'selesai' || $latestPengajuan->status == 'ditolak')

    <div class="card mt-4">
        <div class="card-header">
            <strong>Form Pengajuan e-KTP</strong>
        </div>

        <div class="card-body">
            <form action="{{ route('pengajuan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">NIK</label>
                    <input type="text" name="nik" class="form-control" required value="{{ session('nik') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>

                <button class="btn btn-primary">Kirim Pengajuan</button>
            </form>
        </div>
    </div>

    @endif

</div>
@endsection
