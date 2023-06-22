<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    
    // Menyimpan data registrasi ke dalam tabel
    $sql = "INSERT INTO registrasi (name, email, password) VALUES ('$name', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
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

        <form action="" method="post">
            <h3>create new account!</h3> 
            <input type="text" required name="name" maxlength="20" 
            placeholder="enter your name" class="input">
            <input type="email" required name="email" maxlength="50" 
            placeholder="enter your email" class="input">
            <input type="password" required name="pass" maxlength="20" 
            placeholder="enter your password" class="input">
            <input type="password" required name="c_pass" maxlength="20" 
            placeholder="confirm your password" class="input">
            <p>already have an account? <a href="login.php">login now</a></p>
            <input type="submit" value="register now" name="submit" class="btn">
        </form>
    
    </section>

</div>



<footer class="footer">

    <section class="grid">

        <div class="box">
            <h3>quick links</h3>
            <a href="home.php"><i class="fas fa-angle-right"> home </i></a>
            <a href="about.html"><i class="fas fa-angle-right"> about </i></a>
            <a href="jobs.php"><i class="fas fa-angle-right"> all jobs </i></a>
            <a href="contact.html"><i class="fas fa-angle-right"> contact us </i></a>
            <a href="#"><i class="fas fa-angle-right"> filter search </i></a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#"><i class="fas fa-angle-right"> account </i></a>
            <a href="login.php"><i class="fas fa-angle-right"> login </i></a>
            <a href="register.php"><i class="fas fa-angle-right"> register </i></a>
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


<script>
    // Mendapatkan referensi elemen form
var form = document.querySelector('form');

// Menambahkan event listener pada form saat dikirim
form.addEventListener('submit', function(event) {
  event.preventDefault(); // Mencegah form dikirim secara default

  // Mendapatkan referensi elemen input
  var nameInput = document.querySelector('input[name="name"]');
  var emailInput = document.querySelector('input[name="email"]');
  var passwordInput = document.querySelector('input[name="pass"]');
  var confirmPasswordInput = document.querySelector('input[name="c_pass"]');

  // Mendapatkan nilai dari input
  var name = nameInput.value;
  var email = emailInput.value;
  var password = passwordInput.value;
  var confirmPassword = confirmPasswordInput.value;

  // Validasi jika form belum terisi lengkap
  if (name === '' || email === '' || password === '' || confirmPassword === '') {
    alert('Harap isi semua field!');
    return;
  }

  // Validasi jika password dan konfirmasi password tidak cocok
  if (password !== confirmPassword) {
    alert('Konfirmasi password tidak cocok!');
    return;
  }

  // Registrasi berhasil, menampilkan pop-up
  alert('Registrasi berhasil!');

  // Mengosongkan nilai input setelah registrasi berhasil
  nameInput.value = '';
  emailInput.value = '';
  passwordInput.value = '';
  confirmPasswordInput.value = '';
});
</script>

</body>
</html>