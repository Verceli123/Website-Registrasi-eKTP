<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<link rel="icon" href="assets/logo.png" />
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

  .link-register {
    display: block;
    margin-top: 12px;
    font-size: 15px;
    color: #0066cc;
    text-decoration: none;
  }
  .link-register:hover {
    text-decoration: underline;
    color: #004b99;
  }

  .toggle-dark { margin-top: 10px; font-size: 14px; color: #0066cc; cursor: pointer; }
  footer { margin-top: 50px; background: #f0f0f0; padding: 15px; }

  .dark { background: #0f1724; color: #e6eef8; }
  .dark form { background: #091124; color: #e6eef8; }
  .dark footer { background: #1c1c1c; color: #e6eef8; }
  .dark .link-register { color: #66aaff; }
  .dark .link-register:hover { color: #99c6ff; }
</style>
</head>
<body>

<header>
  <nav>
    <a href="index.php">Home</a>
    <a href="register.php">Register</a>
    <a href="login.php">Login</a>
  </nav>
</header>

<main>
  <div class="logo">
    <img src="assets/login.png" alt="Logo e-KTP" />
  </div>

  <form action="login-proses.php" method="POST">
    <h2>Login Admin e-KTP</h2>

    <!-- FIX: Ganti NIK menjadi USERNAME -->
    <input type="text" name="username" placeholder="Username" required />

    <input type="password" name="password" placeholder="Password" required />
    
    <button type="submit">Masuk</button>

    <a href="register.php" class="link-register">Register</a>
  </form>

  <div class="toggle-dark" id="toggleDark">Mode Gelap</div>
</main>

<footer>
  <h4>&copy; Registrasi e-KTP 2025</h4>
</footer>

<script>
  const toggleDark = document.getElementById("toggleDark");
  toggleDark.addEventListener("click", ()=>{
    document.body.classList.toggle("dark");
    localStorage.setItem("theme", document.body.classList.contains("dark")?"Dark":"Light");
  });

  window.onload = () => {
    if(localStorage.getItem("theme")==="Dark") document.body.classList.add("dark");
  };
</script>

</body>
</html>
