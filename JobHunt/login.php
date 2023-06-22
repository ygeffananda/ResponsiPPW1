<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Membuat koneksi ke database
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'jobportal';
    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Mengambil data dari form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Mengecek data login dalam tabel registrasi
    $sql = "SELECT * FROM registrasi WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        // Login berhasil
        header("Location: home.php");
        exit();
    } else {
        // Login gagal
        $errorMessage = "Email atau password salah.";
    }

    // Menutup koneksi ke database
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">

    <script>
        // Mendapatkan referensi elemen form
        var form = document.querySelector('form');

        // Menambahkan event listener pada form saat dikirim
        form.addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah form dikirim secara default

        // Mendapatkan referensi elemen input
        var emailInput = document.querySelector('input[name="email"]');
        var passwordInput = document.querySelector('input[name="pass"]');

        // Mendapatkan nilai dari input
        var email = emailInput.value;
        var password = passwordInput.value;

        // Validasi jika form belum terisi lengkap
        if (email === '' || password === '') {
            alert('Harap isi semua field!');
            return;
        }

        // Submit form
        form.submit();
    });
    </script>

</head>
<body>
    
<header class="header">
    
    <section class="flex">

        <div id="menu-btn" class="fas fa-bars-staggered"></div>

        <a href="home.php" class="logo"><i class="fas fa-briefcase"></i>JobHunt</a>
        

        <nav class="navbar">
            <a href="home.php">home</a>
            <a href="about.html">about us</a>
            <a href="jobs.php">all jobs</a>
            <a href="contact.html">contact us</a>
            <a href="login.php">account</a>
        </nav>

        <a href="#" class="btn" style="margin-top: 0;">post job</a>
    </section>

</header>

<div class="account-form-container">

    <section class="account-form">

        <form action="" method="post" id="loginForm">
            <h3>welcome back!</h3> 
            <input type="email" required name="email" maxlength="50" placeholder="enter your email" class="input">
            <input type="password" required name="password" maxlength="20" placeholder="enter your password" class="input">
            <p>don't have an account? <a href="register.php">register now</a></p>
            <input type="submit" value="login now" name="submit" class="btn">
            <?php if (isset($errorMessage)) { ?>
                <p><?php echo $errorMessage; ?></p>
            <?php } ?>
        </form>
    
    </section>

</div>


<footer class="footer">

    <section class="grid">

        <div class="box">
            <h3>quick links</h3>
            <a href="home.html"><i class="fas fa-angle-right"> home </i></a>
            <a href="about.html"><i class="fas fa-angle-right"> about </i></a>
            <a href="jobs.html"><i class="fas fa-angle-right"> all jobs </i></a>
            <a href="contact.html"><i class="fas fa-angle-right"> contact us </i></a>
            <a href="#"><i class="fas fa-angle-right"> filter search </i></a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#"><i class="fas fa-angle-right"> account </i></a>
            <a href="login.html"><i class="fas fa-angle-right"> login </i></a>
            <a href="register.html"><i class="fas fa-angle-right"> register </i></a>
            <a href="#"><i class="fas fa-angle-right"> post job </i></a>
            <a href="#"><i class="fas fa-angle-right"> dashboard </i></a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#"><i class="fab fa-facebook-f"> facebook </i></a>
            <a href="#"><i class="fab fa-twitter"> twitter </i></a>
            <a href="#"><i class="fab fa-instagram"> instagram </i></a>
            <a href="#"><i class="fab fa-linkedin"> linkedin </i></a>
            <a href="#"><i class="fab fa-youtube"> youtube </i></a>
        </div>

    </section>

    <div class="credit">Copyright 2023 by <span> Geffa Production</span></div>

</footer>

</body>
</html>