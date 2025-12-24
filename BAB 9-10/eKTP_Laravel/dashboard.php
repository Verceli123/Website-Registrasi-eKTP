<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Admin e-KTP</title>

<style>
  body { font-family: Arial, sans-serif; margin:0; padding:0; background:#f9f9f9; color:#222; text-align:center; transition: background 0.3s, color 0.3s; }
  header { background:#0066cc; color:white; padding:12px; }
  nav a { color:white; margin:0 12px; font-weight:bold; text-decoration:none; }
  nav a:hover { text-decoration:underline; }
  section { margin-top:20px; }
  .admin-actions { margin-top:20px; display:flex; justify-content:center; gap:10px; flex-wrap:wrap; }
  button { padding:9px 15px; border:none; border-radius:6px; background:#0066cc; color:white; cursor:pointer; transition: background 0.3s; }
  button:hover { background:#004d99; }
  .dark { background:#0f1724; color:#e6eef8; }
  .dark header { background:#111e33; }
  footer { margin-top:30px; background:#f0f0f0; padding:10px; }
  .fetch-box { background:#fff; margin:20px auto; max-width:700px; padding:18px; border-radius:8px; box-shadow:0 4px 10px rgba(0,0,0,0.08); transition: background 0.3s, color 0.3s;}
  .dark .fetch-box { background:#1c2a40; color:#e6eef8; }
</style>

</head>
<body>

<header>
  <h1 id="text">Dashboard Admin e-KTP</h1>
  <h3 id="date"></h3>

  <nav>
    <a href="#" id="navDashboard">Dashboard</a>
    <a href="categories/categories.php" id="navKategori">Data Pengajuan</a>
    <a href="transaction/transaction.php" id="navTransaksi">Proses e-KTP</a>
    <a href="logout.php">Logout</a>
  </nav>
</header>

<main>
<section>
  <h2 id="sectionTitle">Menu Dashboard</h2>

  <div class="admin-actions">
    <button id="btnAlert">Tampilkan Alert</button>
    <button id="btnConfirm">Konfirmasi Logout</button>
    <button id="btnPrompt">Set Nama Admin</button>
    <button id="btnDarkMode">Mode Gelap</button>
  </div>

  <div id="fetchResult" class="fetch-box"></div>
</section>
</main>

<footer>
  <p>&copy; Dashboard Admin e-KTP 2025</p>
</footer>

<script>
// ------------------------ ALERT ---------------------------
document.getElementById("btnAlert").addEventListener("click", () => {
  alert("Pastikan kamu memiliki akses Admin!");
});

// ------------------------ CONFIRM LOGOUT ------------------
document.getElementById("btnConfirm").addEventListener("click", () => {
  if(confirm("Yakin ingin logout?")) window.location="logout.php";
});

// ------------------------ PROMPT ADMIN --------------------
document.getElementById("btnPrompt").addEventListener("click", () => {
  const nama = prompt("Masukkan nama admin:");
  if(nama){
    localStorage.setItem("adminName", nama);
    alert(`Halo ${nama}, nama tersimpan!`);
    document.getElementById("text").textContent = `Dashboard e-KTP - ${nama}`;
  }
});

// ------------------------ LOAD PAGE -----------------------
document.addEventListener("DOMContentLoaded", () => {

  // TANGGAL
  const dateNow = new Date().toLocaleString("id-ID", {
    weekday:"long", day:"numeric", month:"long", year:"numeric",
    hour:"2-digit", minute:"2-digit"
  });
  document.getElementById("date").textContent = dateNow;

  // NAMA ADMIN TERSIMPAN
  const storedName = localStorage.getItem("adminName");
  if(storedName){
    document.getElementById("text").textContent = `Dashboard e-KTP - ${storedName}`;
  }

  showDashboard();

  // 🔥 AUTO PROMPT SAAT BARU LOGIN
  <?php if (isset($_SESSION['login_success'])) { ?>
      setTimeout(() => {
        const nama = prompt("Selamat datang! Masukkan nama admin:");
        if(nama){
          localStorage.setItem("adminName", nama);
          alert(`Halo ${nama}, selamat bekerja!`);
          document.getElementById("text").textContent = `Dashboard e-KTP - ${nama}`;
        }
      }, 500);

      <?php unset($_SESSION['login_success']); } ?>
});

// ------------------------ EVENT ---------------------------
document.getElementById("text").addEventListener("mouseenter", () => {
  document.getElementById("text").textContent = "Selamat Datang Admin e-KTP!";
});

document.addEventListener("keydown", e => {
  if(e.key.toLowerCase() === "a") alert("Shortcut: Mode Admin Aktif!");
});

window.addEventListener("scroll", () => {
  console.log("Admin sedang scroll halaman…");
});

// ------------------------ DARK MODE ------------------------
document.getElementById("btnDarkMode").addEventListener("click", () => {
  const dark = document.body.classList.toggle("dark");
  localStorage.setItem("darkModeEktp", dark);
});

if(localStorage.getItem("darkModeEktp")==="true") {
  document.body.classList.add("dark");
}

// ------------------------ NAVIGATION -----------------------
document.getElementById("navDashboard").addEventListener("click", showDashboard);

// ------------------------ DASHBOARD ------------------------
function showDashboard() {
  document.getElementById("sectionTitle").textContent = "Dashboard Admin";
  document.getElementById("fetchResult").innerHTML =
    `<p>Selamat datang di Dashboard Admin e-KTP!<br>
      Silakan kelola Data Pengajuan dan Proses e-KTP.</p>`;
}

</script>

</body>
</html>
