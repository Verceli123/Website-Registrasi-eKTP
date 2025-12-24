<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Pengajuan e-KTP</title>

    <style>
        body { font-family: Arial; background:#f4f4f4; padding:20px; color:#333; }
        .container {
            max-width:500px; margin:auto; background:white; padding:25px;
            border-radius:10px; box-shadow:0 5px 15px rgba(0,0,0,0.1);
        }
        h2 { text-align:center; color:#0066cc; margin-bottom:10px; }
        p { font-size:14px; margin-bottom:15px; }
        input, button {
            width:100%; padding:12px; margin-top:10px; border-radius:6px;
            border:1px solid #ccc; font-size:14px;
        }
        input:focus { border-color:#3399ff; outline:none; }
        button {
            background:#0066cc; color:white; font-weight:bold;
            cursor:pointer; border:none;
        }
        button:hover { background:#004d99; }
        .result-box {
            margin-top:20px; padding:15px; background:#e8e8e8;
            border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.05);
        }
        a { text-decoration:none; color:#0066cc; font-weight:bold; display:block; margin-top:15px; }
        a:hover { color:#004d99; text-decoration:underline; }
    </style>
</head>

<body>

<div class="container">
    <h2>Informasi Pengajuan e-KTP</h2>
    <p>Cek status pengajuan dengan memasukkan NIK di bawah ini.</p>

    <form action="{{ route('informasi') }}" method="POST">
        @csrf
        <label>Masukkan NIK</label>
        <input type="text" name="nik" maxlength="16" required value="{{ $nik ?? '' }}">
        <button type="submit">Cek Status</button>
    </form>

    @if (isset($data) && $data)
        <div class="result-box">
            <p><strong>Nama:</strong> {{ $data->nama }}</p>
            <p><strong>NIK:</strong> {{ $data->nik }}</p>
            <p><strong>Alamat:</strong> {{ $data->alamat }}</p>
            <p><strong>Status:</strong> {{ ucfirst($data->status) }}</p>
        </div>
    @elseif(isset($nik) && $notFound)
        <p style="color:red;margin-top:10px;">NIK tidak ditemukan atau belum mengajukan.</p>
    @endif

    <a href="{{ url('/') }}">← Kembali ke Beranda</a>
</div>

</body>
</html>
