@extends('layouts.app')

@section('content')
<style>
  body { background:#f9f9f9; color:#222; text-align:center; }
  header { background:#0066cc; color:white; padding:12px; }
  nav a { color:white; margin:0 12px; font-weight:bold; text-decoration:none; }
  nav a:hover { text-decoration:underline; }
  section { margin-top:20px; }
  .admin-actions { margin-top:20px; display:flex; justify-content:center; gap:10px; flex-wrap:wrap; }
  button { padding:9px 15px; border:none; border-radius:6px; background:#0066cc; color:white; cursor:pointer; }
  button:hover { background:#004d99; }
  footer { margin-top:30px; background:#f0f0f0; padding:10px; }
  .fetch-box { background:#fff; margin:20px auto; max-width:700px; padding:18px; border-radius:8px; }
</style>

<header>
  <h1 id="text">Dashboard Admin e-KTP</h1>
  <h3 id="date"></h3>

  <nav>
    <a href="#" id="navDashboard">Dashboard</a>
    <a href="{{ url('/categories') }}">Data Pengajuan</a>
    <a href="{{ url('/transaction') }}">Proses e-KTP</a>
    <a href="{{ url('/logout') }}">Logout</a>
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
// ------------------------ TANGGAL ---------------------------
document.addEventListener("DOMContentLoaded", () => {

  const dateNow = new Date().toLocaleString("id-ID", {
    weekday:"long", day:"numeric", month:"long", year:"numeric",
    hour:"2-digit", minute:"2-digit"
  });
  document.getElementById("date").textContent = dateNow;

  const storedName = localStorage.getItem("adminName");
  if(storedName){
    document.getElementById("text").textContent = `Dashboard e-KTP - ${storedName}`;
  }

  showDashboard();
});

// ------------------------ ALERT ---------------------------
document.getElementById("btnAlert").onclick = () => {
  alert("Pastikan kamu memiliki akses Admin!");
};

// ------------------------ CONFIRM LOGOUT -------------------
document.getElementById("btnConfirm").onclick = () => {
  if(confirm("Yakin ingin logout?")) window.location="{{ url('/logout') }}";
};

// ------------------------ PROMPT ADMIN ---------------------
document.getElementById("btnPrompt").onclick = () => {
  const nama = prompt("Masukkan nama admin:");
  if(nama){
    localStorage.setItem("adminName", nama);
    document.getElementById("text").textContent = `Dashboard e-KTP - ${nama}`;
  }
};

// ------------------------ DARK MODE ------------------------
document.getElementById("btnDarkMode").onclick = () => {
  document.body.classList.toggle("dark");
};

// ------------------------ DASHBOARD ------------------------
document.getElementById("navDashboard").onclick = showDashboard;

function showDashboard() {
  document.getElementById("sectionTitle").textContent = "Dashboard Admin";
  document.getElementById("fetchResult").innerHTML =
    `<p>Selamat datang di Dashboard Admin e-KTP!<br>
      Silakan kelola Data Pengajuan dan Proses e-KTP.</p>`;
}

</script>
@endsection
