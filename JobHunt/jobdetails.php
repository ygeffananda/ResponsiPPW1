<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Jobs</title>
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

<section class="job-details">

    <h1 class="heading">job details</h1>
    <div class="details">
    
    <?php
// Mendapatkan id_card dari URL
$id_card = $_GET['id_card'];

// Menyambungkan ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'jobportal';
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mendapatkan detail pekerjaan berdasarkan id_card
$sql = "SELECT * FROM jobdetails WHERE id_card = $id_card";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Tampilkan data pekerjaan
        echo '
        <div class="job-info">
            <div>
                <h3>' . $row['job_title'] . '</h3>
                <a href="view_company.php">' . $row['company_name'] . '</a>
                <p><i class="fas fa-map-marker-alt"></i> ' . $row['company_location'] . '</p>
            </div>
            
            <div class="basic-details">
            
            <h3>Salary</h3>
            <p>' . $row['salary'] . '</p>
            
            <h3>Benefits</h3>
            <p>' . $row['Benefits'] .'</p>

            <h3>Job Type</h3>
            <p>' .$row['job_type'] . '</p>

            <h3>Schedule</h3>
            <p>' .$row['shift'] . '</p>
            </div>


            <ul>
                <h3>Requirements</h3>
                <p>' . $row['requirement'] . '</p>
            </ul>
            <ul>
                <h3>Qualification</h3>
                <p>' . $row['qualification'] . '</p>
            </ul>
            <ul>
                <h3>Skills</h3>
                <p>' .$row['skills'] .'</p>
            </ul>

            <div class="description">
                <h3>Job Description</h3>
                <p>' .$row['job_description'] . '</p>
            </div>
            <form action="" method="post" class="flex-btn">
            <input type="submit" value="apply now" name="apply" class="btn">
            <button type="submit" class="save"><i class="far fa-heart"></i><span>save job</span></button>
        </form>
        </div>
        ';
    }
} else {
    echo 'Pekerjaan tidak ditemukan.';
}

mysqli_close($conn);
?>

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

=

    <script>
        // Ambil semua elemen dengan class "details"
        const jobDetails = document.querySelectorAll('.details');

        // Loop melalui setiap elemen "details"
        jobDetails.forEach((details) => {
        // Ambil elemen dengan tag "h3" di dalam elemen "details"
        const jobTitle = details.querySelector('h3').innerText;
  
        // Ambil elemen dengan class "description" di dalam elemen "details"
        const description = details.querySelector('.description');
  
        // Tambahkan event listener pada tombol "apply now"
        const applyButton = details.querySelector('input[name="apply"]');
        applyButton.addEventListener('click', () => {
        // Tampilkan deskripsi pekerjaan yang sesuai
        console.log(`Job Title: ${jobTitle}`);
        console.log(`Job Description: ${description.querySelector('p').innerText}`);
  });
});

    </script>
</body>
</html>