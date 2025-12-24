<h2>Konfirmasi Penyetujuan</h2>

<p>Yakin ingin menyetujui pengajuan berikut?</p>

<p><strong>Nama:</strong> {{ $pengajuan->nama }}</p>
<p><strong>NIK:</strong> {{ $pengajuan->nik }}</p>

<a href="/categories/approve/{{ $pengajuan->id_pengajuan }}"
   style="padding:10px; background:green; color:white; text-decoration:none;">
   YA, SETUJUI
</a>

<a href="/categories"
   style="padding:10px; background:gray; color:white; text-decoration:none;">
   BATAL
</a>
