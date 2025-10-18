<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Panel Admin e-KTP</title>
<style>
  body { font-family: Arial, sans-serif; margin:0; padding:0; background:#f9f9f9; color:#222; text-align:center; transition: background 0.3s, color 0.3s;}
  header { background:#0066cc; color:white; padding:10px; transition: background 0.3s;}
  nav a { color:white; margin:0 10px; text-decoration:none;}
  nav a:hover { text-decoration:underline;}
  section { margin-top:20px;}
  .admin-actions { margin-top:20px; display:flex; justify-content:center; gap:10px; flex-wrap:wrap;}
  button { padding:8px 14px; border:none; border-radius:6px; background:#0066cc; color:white; cursor:pointer; transition: background 0.3s;}
  button:hover { background:#004d99;}
  .dark { background:#0f1724; color:#e6eef8;}
  .dark header { background:#111e33;}
  footer { margin-top:30px; background:#f0f0f0; padding:10px;}
  .fetch-box { background:#fff; margin:20px auto; max-width:600px; padding:15px; border-radius:8px; box-shadow:0 4px 10px rgba(0,0,0,0.08); transition: background 0.3s, color 0.3s;}
  .dark .fetch-box { background:#1c2a40; color:#e6eef8;}
  ul { list-style:none; padding:0; }
  ul li { margin:5px 0; }
</style>
</head>
<body>
<header>
  <h1 id="text">Panel Admin e-KTP</h1>
  <h3 id="date"></h3>
  <nav>
    <a href="#" id="navDashboard">Dashboard</a>
    <a href="#" id="navRegistrasi">Data Registrasi</a>
    <a href="#" id="navVerifikasi">Verifikasi</a>
    <a href="#" id="navLogout">Logout</a>
  </nav>
</header>

<main>
<section>
  <h2 id="sectionTitle">Kelola Data e-KTP</h2>

  <div class="admin-actions">
    <button id="btnAlert">Tampilkan Peringatan</button>
    <button id="btnConfirm">Konfirmasi Logout</button>
    <button id="btnPrompt">Input Nama Admin</button>
    <button id="btnDarkMode">Mode Gelap</button>
    <button id="btnFetch">Ambil Data Penduduk</button>
  </div>

  <div id="fetchResult" class="fetch-box"></div>
</section>
</main>

<footer>
  <p>&copy; Admin e-KTP 2025 | Dinas Kependudukan dan Catatan Sipil</p>
</footer>

<script>
  // ------------------ POPUP BOXES ------------------
  document.getElementById("btnAlert").addEventListener("click", () => {
    alert("Pastikan kamu memiliki hak akses Admin untuk melanjutkan!");
  });

  document.getElementById("btnConfirm").addEventListener("click", () => {
    logout();
  });

  document.getElementById("btnPrompt").addEventListener("click", () => {
    const nama = prompt("Masukkan nama admin:");
    if(nama) {
      localStorage.setItem("adminName", nama);
      alert(`Halo, ${nama}! Nama tersimpan di localStorage.`);
      document.getElementById("text").textContent = `Panel Admin - ${nama}`;
    }
  });

  // ------------------ EVENT ------------------
  document.addEventListener("DOMContentLoaded", () => {
    // Tanggal & waktu
    const dateNow = new Date().toLocaleString("id-ID", {
      weekday:"long", day:"numeric", month:"long", year:"numeric",
      hour:"2-digit", minute:"2-digit"
    });
    document.getElementById("date").textContent = dateNow;

    // Ambil nama admin dari storage
    const storedName = localStorage.getItem("adminName");
    if(storedName) document.getElementById("text").textContent = `Panel Admin - ${storedName}`;

    // Tampilkan default dashboard
    showDashboard();
  });

  document.getElementById("text").addEventListener("mouseenter", () => {
    document.getElementById("text").textContent = "Selamat Datang, Admin e-KTP!";
  });

  document.addEventListener("keydown", e => {
    if(e.key.toLowerCase() === "a") alert("Shortcut: Mode Admin Aktif!");
  });

  window.addEventListener("scroll", () => {
    console.log("Sedang scroll halaman admin...");
  });

  // ------------------ DARK MODE ------------------
  const btnDarkMode = document.getElementById("btnDarkMode");
  btnDarkMode.addEventListener("click", () => {
    const isDark = document.body.classList.toggle("dark");
    localStorage.setItem("darkModeEktp", isDark);
  });
  if(localStorage.getItem("darkModeEktp")==="true") document.body.classList.add("dark");

  // ------------------ NAVIGATION ------------------
  document.getElementById("navDashboard").addEventListener("click", showDashboard);
  document.getElementById("navRegistrasi").addEventListener("click", showRegistrasi);
  document.getElementById("navVerifikasi").addEventListener("click", showVerifikasi);
  document.getElementById("navLogout").addEventListener("click", logout);

  function showDashboard() {
    document.getElementById("sectionTitle").textContent = "Dashboard Admin";
    document.getElementById("fetchResult").innerHTML = `<p>Selamat datang di Dashboard Admin e-KTP.</p>`;
  }

  function showRegistrasi() {
    document.getElementById("sectionTitle").textContent = "Data Registrasi Penduduk";
    fetchData()
      .then(data => {
        document.getElementById("fetchResult").innerHTML = data.map(item => `
          <p><strong>${item.nama}</strong> - ${item.nik} - ${item.alamat} - ${item.status}</p>
        `).join('');
      })
      .catch(err => document.getElementById("fetchResult").textContent = "Gagal memuat data: " + err);
  }

  function showVerifikasi() {
    document.getElementById("sectionTitle").textContent = "Data Verifikasi Penduduk";
    fetchData()
      .then(data => {
        const verified = data.filter(item => item.status === "Sudah Terverifikasi");
        document.getElementById("fetchResult").innerHTML = verified.map(item => `
          <p><strong>${item.nama}</strong> - ${item.nik} - ${item.alamat}</p>
        `).join('');
      })
      .catch(err => document.getElementById("fetchResult").textContent = "Gagal memuat data: " + err);
  }

  function logout() {
    const keluar = confirm("Apakah kamu yakin ingin Logout?");
    if(keluar){
      localStorage.clear();
      alert("Berhasil logout!");
      window.location.href = "index.html"; // arahkan ke halaman login
    }
  }

  // ------------------ FETCH ASYNCHRONOUS ------------------
  const btnFetch = document.getElementById("btnFetch");
  btnFetch.addEventListener("click", () => showRegistrasi());

  function fetchData() {
    return new Promise((resolve, reject) => {
      setTimeout(() => {
        const data = [
          {nama:"Teofilus Verceli Ngamal", nik:"3578026512990007", alamat:"Manggarai, NTT", status:"Sudah Terverifikasi"},
          {nama:"Budi Santoso", nik:"3578026512990008", alamat:"Kupang, NTT", status:"Belum Terverifikasi"},
          {nama:"Siti Aminah", nik:"3578026512990009", alamat:"Maumere, NTT", status:"Sudah Terverifikasi"}
        ];
        resolve(data);
      }, 1000);
    });
  }
</script>
</body>
</html>
