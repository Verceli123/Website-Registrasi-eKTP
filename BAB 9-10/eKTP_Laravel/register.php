<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="assets/logo.png" />
    <title>e-KTP Registration - Register</title>

    <!-- HUBUNGKAN CSS EKSTERNAL -->
    <link rel="stylesheet" href="css/style.css">
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
        <img src="assets/logo.png" alt="Logo e-KTP" />
    </div>

    <form action="register-proses.php" method="POST" class="form-card">
        <h2>Form Registrasi e-KTP</h2>

        <input type="text" name="username" placeholder="Username" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />

        <button type="submit">Daftar</button>

        <div class="bottom-text">
            <a href="login.php">Sudah punya akun? Login</a>
        </div>
    </form>
</main>

<footer>
    <h4>&copy; Registrasi e-KTP 2025</h4>
</footer>

</body>
</html>
