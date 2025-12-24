<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="{{ asset('assets/logo.png') }}" />
    <title>e-KTP Registration - Register</title>
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
        <img src="{{ asset('assets/logo.png') }}" alt="Logo e-KTP" />
    </div>

    <form action="{{ route('register.proses') }}" method="POST" class="form-card">
        @csrf
        <h2>Form Registrasi e-KTP</h2>

        <input type="text" name="username" placeholder="Username" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />

        <button type="submit">Daftar</button>

        <div class="bottom-text">
            <a href="{{ route('login') }}">Sudah punya akun? Login</a>
        </div>
    </form>
</main>

<footer>
    <h4>&copy; Registrasi e-KTP 2025</h4>
</footer>

</body>
</html>
