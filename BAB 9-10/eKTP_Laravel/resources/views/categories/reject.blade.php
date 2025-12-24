<h2>Konfirmasi Penolakan</h2>

<p>Yakin ingin menolak & menghapus pengajuan ini?</p>

<p><strong>Nama:</strong> {{ $pengajuan->nama }}</p>
<p><strong>NIK:</strong> {{ $pengajuan->nik }}</p>

<a href="/categories/reject/{{ $pengajuan->id_pengajuan }}"
   style="padding:10px; background:red; color:white; text-decoration:none;">
   YA, TOLAK
</a>

<a href="/categories"
   style="padding:10px; background:gray; color:white; text-decoration:none;">
   BATAL
</a>
