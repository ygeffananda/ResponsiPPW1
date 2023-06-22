<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<header class="header">
    
    <section class="flex">

        <div id="menu-btn" class="fas fa-bars-staggered"></div>

        <a href="home.php" class="logo"><i class="fas fa-briefcase"></i>JobPortal</a>
        

        <nav class="navbar">
            <a href="home.php">home</a>
            <a href="about.html">about us</a>
            <a href="jobs.php">all jobs</a>
            <a href="contact.php">contact us</a>
            <a href="login.php">account</a>
        </nav>

        <a href="#" class="btn" style="margin-top: 0;">post job</a>
    </section>

</header>


<div class="home-container">

    <section class="home">

        <form action="" method="post">
        
            <h3>find your next job</h3>
            <p>job title<span>*</span></p>
            <input type="text" name="title" placeholder="keyword, category or company" required maxlength="20" class="input">
            <p>job location <span>*</span></p>
            <input type="text" name="location" placeholder="city, state, or country" required maxlength="50" class="input">
            <input type="submit" value="search job" name="search" class="btn">
        </form>
    
    </section>

</div>

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
    $title = $_POST['title'];
    $location = $_POST['location'];

    // Query pencarian
    $sql = "SELECT * FROM job_table WHERE title LIKE '%$title%' AND location LIKE '%$location%'";
    $result = mysqli_query($conn, $sql);

    // Memeriksa apakah terdapat hasil pencarian
    if (mysqli_num_rows($result) > 0) {
        // Tampilkan hasil pencarian
        // Tampilkan pop-up jika terdapat data pencarian
        echo '<script>alert("Data ditemukan.");</script>';
    } else {
        // Tampilkan pop-up jika tidak ada data pencarian
        echo '<script>alert("Tidak ditemukan hasil pencarian.");</script>';
    }

    // Menutup koneksi ke database
    mysqli_close($conn);
}
?>


<section class="category">

    <h1 class="heading">job categories</h1>

    <div class="box-container">

        <a href="#" class="box">
            <i class="fas fa-code"></i>
            <div>
                <h3>development</h3>
                <span>2200 jobs</span>
            </div>
        </a>

        <a href="#" class="box">
            <i class="fas fa-pen"></i>
            <div>
                <h3>designer</h3>
                <span>500 jobs</span>
            </div>
        </a>

        <a href="#" class="box">
            <i class="fas fa-bullhorn"></i>
            <div>
                <h3>marketing</h3>
                <span>1200 jobs</span>
            </div>
        </a>

        <a href="#" class="box">
            <i class="fas fa-headset"></i>
            <div>
                <h3>service</h3>
                <span>3100 jobs</span>
            </div>
        </a>

        <a href="#" class="box">
            <i class="fas fa-wrench"></i>
            <div>
                <h3>engineer</h3>
                <span>400 jobs</span>
            </div>
        </a>

        <a href="#" class="box">
            <i class="fas fa-hand-holding-dollar"></i>
            <div>
                <h3>finance</h3>
                <span>1000 jobs</span>
            </div>
        </a>

        <a href="#" class="box">
            <i class="fas fa-person-digging"></i>
            <div>
                <h3>labour</h3>
                <span>4000 jobs</span>
            </div>
        </a>

    </div>

</section>
<section class="jobs-container">
    <h1 class="heading">latest jobs</h1>
    <div class="box-container">
    <?php
        // Establish a connection to the MySQL database
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'jobportal';
        $conn = mysqli_connect($host, $username, $password, $database);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        // Fetch job card data from the database
        $sql = "SELECT * FROM jobcard";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                
                <div class="box">
                    <div class="company">
                        <img src="images/' . $row['Logo'] . '.svg" alt="">
                        <div>
                            <h3>' . $row['Company_Name'] . '</h3>
                            
                        </div>
                    </div>
                    <h3 class="job-title">' . $row['Job_Title'] . '</h3>
                    <p class="location"><i class="fas fa-map-marker-alt"></i>
                    <span>' . $row['Company_Location'] . '</span></p>
                    <div class="tags">
                        <p><i class="fas fa-sharp fa-regular fa-rupiah-sign"></i><span>' . $row['Salary'] . '</span></p>
                        <p><i class="fas fa-briefcase"></i><span>' . $row['Job_Type'] . '</span></p>
                        <p><i class="fas fa-clock"></i><span>' . $row['Shift'] . '</span></p>
                    </div>
                    <div class="flex-btn">
                    <a href="jobdetails.php?id_card=' . $row['id_card'] . '" class="btn">view details</a>


                        <button class="far fa-heart"></button>
                    </div>
                </div>
                ';
            }
        } else {
            echo 'No jobs found.';
        }
        
        mysqli_close($conn);
        ?>
    </div>
</section>



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


<script>
    let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
}

window.onscroll = () =>{
    navbar.classList.remove('active');
}

document.querySelectorAll('input[type="number"]').forEach(inputNumber => {
    inputNumber.oninput = () =>{
        if(inputNumber.ariaValueMax.length > inputNumber.maxLength) inputNumber.value 
        = inputNumber.value.slice(0, inputNumber.maxLength);
    };
});
</script>
</body>
</html>