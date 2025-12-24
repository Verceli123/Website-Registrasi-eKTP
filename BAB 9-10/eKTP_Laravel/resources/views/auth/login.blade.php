<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<link rel="icon" href="{{ asset('assets/logo.png') }}" />
<title>Login Admin e-KTP</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header>
  <nav>
    <a href="{{ url('/') }}">Home</a>
    <a href="{{ route('register') }}">Register</a>
    <a href="{{ route('login') }}">Login</a>
  </nav>
</header>

<main>
  <div class="logo">
    <img src="{{ asset('assets/login.png') }}" alt="Logo e-KTP" />
  </div>

  <form action="{{ route('login.proses') }}" method="POST">
    @csrf
    <h2>Login Admin e-KTP</h2>

    <input type="text" name="username" placeholder="Username" required />
    <input type="password" name="password" placeholder="Password" required />
    
    <button type="submit">Masuk</button>

    <a href="{{ route('register') }}" class="link-register">Register</a>
  </form>

  <div class="toggle-dark" id="toggleDark">Mode Gelap</div>
</main>

<footer>
  <h4>&copy; Registrasi e-KTP 2025</h4>
</footer>

<script>
  const toggleDark = document.getElementById("toggleDark");
  if(toggleDark){
    toggleDark.addEventListener("click", ()=>{
      document.body.classList.toggle("dark");
      localStorage.setItem("theme", document.body.classList.contains("dark")?"Dark":"Light");
    });
  }
  window.onload = () => {
    if(localStorage.getItem("theme")==="Dark") document.body.classList.add("dark");
  };
</script>

</body>
</html>
