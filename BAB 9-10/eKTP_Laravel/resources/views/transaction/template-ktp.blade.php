<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial; }
        .box {
            width: 330px;
            height: 210px;
            border: 2px solid #333;
            padding: 15px;
            border-radius: 8px;
            font-size: 14px;
        }
        .foto {
            width: 80px;
            height: 100px;
            float: right;
            border: 1px solid #ccc;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<h3 style="text-align:center;">e-KTP Indonesia</h3>

<div class="box">

    @if ($foto)
        <img src="{{ $foto }}" class="foto">
    @else
        <div style="width:80px;height:100px;background:#ddd;float:right;text-align:center;line-height:100px;">
            No Photo
        </div>
    @endif

    <p><strong>NIK:</strong> {{ $data->nik }}</p>
    <p><strong>Nama:</strong> {{ $data->nama }}</p>
    <p><strong>Alamat:</strong> {{ $data->alamat }}</p>
    <p><strong>Tanggal Lahir:</strong> {{ $data->tanggal_lahir }}</p>
    <p><strong>Status:</strong> {{ $data->status }}</p>

</div>

</body>
</html>
