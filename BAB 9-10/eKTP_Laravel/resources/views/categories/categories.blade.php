<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pengajuan e-KTP</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<header>
    <nav>
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/dashboard') }}">Dashboard</a>
        <a href="{{ url('/categories') }}">Proses e-KTP</a>
        <a href="{{ url('/logout') }}" class="logout">Logout</a>
    </nav>
</header>

<main>
    <h2>Daftar Pengajuan e-KTP</h2>

    @if(session('success'))
        <p style="color:green; font-weight:bold;">{{ session('success') }}</p>
    @endif

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Foto Diri</th>
            <th>Foto KK</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        @foreach($pengajuan as $p)
        <tr>
            <td>{{ $p->id_pengajuan }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->nik }}</td>
            <td>{{ $p->alamat }}</td>
            <td>{{ $p->tanggal_lahir }}</td>

            <td><img src="{{ asset('uploads/' . ($p->foto ?? 'noimage.png')) }}" width="90"></td>
            <td><img src="{{ asset('uploads/' . ($p->foto_kk ?? 'noimage.png')) }}" width="90"></td>

            <td>{{ ucfirst($p->status) }}</td>

            <td>
                <a class="btn-acc" href="/categories/approve/page/{{ $p->id_pengajuan }}">Setujui</a>
                <a class="btn-tolak" href="/categories/reject/page/{{ $p->id_pengajuan }}">Tolak</a>
            </td>
        </tr>
        @endforeach
    </table>
</main>

</body>
</html>
