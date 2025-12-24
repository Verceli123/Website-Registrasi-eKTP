// === Fungsi untuk menampilkan toast / notifikasi ===
function showToast(message, type = "info") {
  const toastWrap = document.getElementById("toastWrap");

  // Buat elemen toast
  const toast = document.createElement("div");
  toast.className = `toast ${type}`;
  toast.innerHTML = `
    <span>${message}</span>
    <button class="close">&times;</button>
  `;

  // Tambahkan ke wrapper
  toastWrap.appendChild(toast);

  // Tombol tutup manual
  toast.querySelector(".close").addEventListener("click", () => {
    toast.remove();
  });

  // Hilang otomatis setelah 3 detik
  setTimeout(() => {
    toast.style.opacity = "0";
    setTimeout(() => toast.remove(), 400);
  }, 3000);
}

// === Jalankan setelah halaman siap ===
document.addEventListener("DOMContentLoaded", () => {
  const infoCard = document.getElementById("infoCard");
  const guideContainer = document.getElementById("guideContainer");

  const btnInfo = document.getElementById("btnInfo");
  const btnGuide = document.getElementById("btnGuide");
  const btnToggleDark = document.getElementById("btnToggleDark");

  // === 1. Tombol Info e-KTP ===
  btnInfo.addEventListener("click", () => {
    const visible = infoCard.style.display === "block";
    infoCard.style.display = visible ? "none" : "block";
    guideContainer.innerHTML = ""; // sembunyikan panduan jika ada
    showToast(visible ? "Info e-KTP disembunyikan" : "Info e-KTP ditampilkan", "info");
  });

  // === 2. Tombol Mode Gelap / Terang ===
  btnToggleDark.addEventListener("click", () => {
    document.body.classList.toggle("dark");
    const isDark = document.body.classList.contains("dark");
    btnToggleDark.textContent = isDark ? "Mode Terang" : "Mode Gelap";
    showToast(isDark ? "Mode Gelap diaktifkan" : "Mode Terang diaktifkan", "success");
  });

  // === 3. Tombol Panduan Registrasi ===
  btnGuide.addEventListener("click", () => {
    const hasGuide = guideContainer.innerHTML.trim() !== "";
    guideContainer.innerHTML = hasGuide
      ? ""
      : `
      <div class="info-card" style="display:block;">
        <h3>Panduan Registrasi e-KTP</h3>
        <ol class="guide-list">
          <li>Klik tombol <b>Mulai Registrasi</b> pada halaman utama.</li>
          <li>Isi data sesuai dengan Kartu Keluarga secara lengkap dan benar.</li>
          <li>Pastikan semua kolom telah diisi, lalu klik tombol <b>Kirim</b>.</li>
          <li>Tunggu proses verifikasi dari pihak Disdukcapil setempat.</li>
          <li>Setelah verifikasi berhasil, kamu akan menerima jadwal pengambilan e-KTP.</li>
        </ol>
      </div>
    `;
    infoCard.style.display = "none"; // sembunyikan info e-KTP
    showToast(hasGuide ? "Panduan disembunyikan" : "Panduan Registrasi ditampilkan", "info");
  });
});
