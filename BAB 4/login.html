<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Admin e-KTP</title>
<style>
  body {
    font-family: Arial, sans-serif;
    text-align: center;
    background: #f9f9f9;
    margin: 0;
    transition: background 0.4s, color 0.4s;
  }
  header { background: #0066cc; padding: 15px; }
  nav { display: flex; justify-content: center; gap: 20px; }
  nav a { color: white; text-decoration: none; font-weight: bold; }
  nav a:hover { text-decoration: underline; }
  main { margin-top: 40px; }
  .logo img { width: 220px; margin-bottom: 25px; }
  form {
    background: white;
    padding: 20px;
    border-radius: 8px;
    width: 300px;
    margin: auto;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
    transition: background 0.4s, color 0.4s;
  }
  input {
    width: 90%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  button {
    padding: 10px 20px;
    background: #0066cc;
    border: none;
    border-radius: 6px;
    color: white;
    cursor: pointer;
    width: 95%;
    margin-top: 10px;
    transition: background 0.3s, transform 0.2s;
  }
  button:hover { background: #004d99; transform: scale(1.05); }
  .toggle-dark { margin-top: 10px; font-size: 14px; color: #0066cc; cursor: pointer; }
  footer { margin-top: 50px; background: #f0f0f0; padding: 15px; transition: background 0.4s, color 0.4s; }

  /* Toast Notification */
  .toast-wrap { position: fixed; right: 18px; bottom: 18px; z-index: 9999; display: flex; flex-direction: column; gap: 10px; }
  .toast {
    min-width: 200px;
    padding: 10px 14px;
    border-radius: 8px;
    color: #fff;
    background: rgba(0,0,0,0.8);
    display: flex;
    justify-content: space-between;
    align-items: center;
    opacity: 0;
    transform: translateY(20px);
    animation: toastIn 0.3s forwards;
  }
  .toast.success { background: #28a745; }
  .toast.error { background: #dc3545; }
  .toast button.close { background: transparent; border: none; color: #fff; font-weight: 700; cursor: pointer; }

  @keyframes toastIn { to { opacity:1; transform: translateY(0); } }

  /* Dark Mode */
  .dark { background: #0f1724; color: #e6eef8; }
  .dark form { background: #091124; color: #e6eef8; }
  .dark footer { background: #1c1c1c; color: #e6eef8; }
</style>
</head>
<body>

<header>
  <nav>
    <a href="index.html">Home</a>
    <a href="register.html">Register</a>
    <a href="login.html">Login</a>
  </nav>
</header>

<main>
  <div class="logo">
    <img src="assets/login.png" alt="Logo e-KTP" />
  </div>
  <form id="loginForm">
    <h2>Login Admin e-KTP</h2>
    <input type="text" id="nik" placeholder="NIK" required />
    <input type="password" id="password" placeholder="Password" required />
    <button type="submit">Masuk</button>
  </form>
  <div class="toggle-dark" id="toggleDark">Mode Gelap</div>
</main>

<footer>
  <h4>&copy; Registrasi e-KTP 2025</h4>
</footer>

<div class="toast-wrap" id="toastWrap"></div>

<script>
  // ===== Admin Credentials =====
  const admin = { nik: "3578026512990007", password: "ektp2025" };

  // ===== Toast Function =====
  function showToast(msg, type="success", duration=3000){
    const wrap = document.getElementById("toastWrap");
    const toast = document.createElement("div");
    toast.className = `toast ${type}`;
    toast.innerHTML = `<span>${msg}</span><button class="close">&times;</button>`;
    wrap.appendChild(toast);
    toast.querySelector(".close").addEventListener("click", ()=>toast.remove());
    setTimeout(()=>toast.remove(), duration);
  }

  // ===== Login Form =====
  document.getElementById("loginForm").addEventListener("submit", function(e){
    e.preventDefault();
    const nik = document.getElementById("nik").value;
    const pass = document.getElementById("password").value;

    if(nik === admin.nik && pass === admin.password){
      localStorage.setItem("loggedIn", "true");
      showToast("Login Berhasil!", "success");
      setTimeout(()=>{ window.location.href = "dashboard.html"; }, 800);
    } else {
      showToast("NIK atau Password salah!", "error");
    }
  });

  // ===== Dark Mode Toggle =====
  const toggleDark = document.getElementById("toggleDark");
  toggleDark.addEventListener("click", ()=>{
    document.body.classList.toggle("dark");
    localStorage.setItem("theme", document.body.classList.contains("dark")?"Dark":"Light");
  });

  // ===== Apply stored theme =====
  window.onload = () => {
    if(localStorage.getItem("theme")==="Dark") document.body.classList.add("dark");
  };
</script>

</body>
</html>

