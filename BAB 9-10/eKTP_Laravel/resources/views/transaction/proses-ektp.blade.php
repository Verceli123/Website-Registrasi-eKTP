@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Proses Cetak e-KTP</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        @foreach($data as $d)
        <tr>
            <td>{{ $d->id_pengajuan }}</td>
            <td>{{ $d->nik }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->alamat }}</td>
            <td>{{ ucfirst($d->status) }}</td>
            <td>
                <!-- CETAK HALAMAN (HTML) -->
                <a href="{{ route('cetak.ktp', $d->id_pengajuan) }}" 
                   class="btn btn-primary" 
                   target="_blank">
                    Cetak KTP
                </a>

                <!-- CETAK PDF -->
                <a href="{{ route('cetak.ktp.pdf', $d->id_pengajuan) }}" 
                   class="btn btn-danger" 
                   target="_blank">
                    Cetak KTP (PDF)
                </a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
