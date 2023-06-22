<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Jobs</title>
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

<section class="job-filter">

    <h1 class="heading">filter jobs</h1>

    <form action="" method="post">
        <div class="flex">
            <div class="box">
                <p>job tittle <span>*</span></p>
                <input type="text" name="title" placeholder="keyword, category or company" required maxlength="20" class="input">
            </div>
            <div class="box">
                <p>job location <span>*</span></p>
            <input type="text" name="location" placeholder="city, state, or country" required maxlength="50" class="input">
            </div>
        </div>
        <div class="dropdown-container">
            <div class="dropdown">
                <input type="text" readonly placeholder="data posted" name="date" 
                maxlength="20" class="output">
                <div class="lists">
                    <p class="items">today</p>
                    <p class="items">3 days ago</p>
                    <p class="items">7 days ago</p>
                    <p class="items">10 days ago</p>
                    <p class="items">15 days ago</p>
                    <p class="items">30 days ago</p>
                </div>
            </div>
            <div class="dropdown">
                <input type="text" readonly name="date" placeholder="estimated salary" 
                maxlength="20" class="output">
                <div class="lists">
                    <p class="items">1.000.000 or less</p>
                    <p class="items">1.000.000 - 2.000.000</p>
                    <p class="items">3.000.000 - 4.000.000</p>
                    <p class="items">4.000.000 - 5.000.000</p>
                    <p class="items">5.000.000 - 7.500.000</p>
                    <p class="items">7.500.000 - 10.000.000</p>
                    <p class="items">10.000.000 - 15.000.000</p>
                    <p class="items">15.000.000 - 20.000.000</p>
                    <p class="items">20.000.000 - 25.000.000</p>
                    <p class="items">25.000.000 - 50.000.000</p>
                    <p class="items">50.000.000 - 75.000.000</p>
                    <p class="items">75.000.000 - 100.000.000</p>
                    <p class="items">100.000.000 or more</p>
                </div>
            </div>
            <div class="dropdown">
                <input type="text" readonly name="date" placeholder="job type" 
                maxlength="20" class="output">
                <div class="lists">
                    <p class="items">full-time</p>
                    <p class="items">part-time</p>
                    <p class="items">internship</p>
                    <p class="items">contract</p>
                    <p class="items">temperary</p>
                    <p class="items">fresher</p>
                </div>
            </div>
            <div class="dropdown">
                <input type="text" readonly name="date" placeholder="education level" 
                maxlength="20" class="output">
                <div class="lists">
                    <p class="items">10th pass</p>
                    <p class="items">12th pass</p>
                    <p class="items">bachelor's degree</p>
                    <p class="items">master's degree</p>
                    <p class="items">diploma</p>
                </div>
            </div>
            <div class="dropdown">
                <input type="text" readonly name="date" placeholder="work shifts"
                maxlength="20" class="output">
                <div class="lists">
                    <p class="items">day-shift</p>
                    <p class="items">night-shift</p>
                    <p class="items">flexible-shift</p>
                    <p class="items">remote</p>
                </div>
            </div>
        </div>
    </form>

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


    <script src="js/script.js"></script>

    <script>

    let dropdown_items = document.querySelectorAll('.job-filter form .dropdown-container .dropdown .lists .items');

    dropdown_items.forEach(items =>{
        items.onclick = () =>{
            items_parent = items.parentElement.parentElement;
            let output = items_parent.querySelector('.output');
            output.value = items.innerText;
        }
    })
    </script>
</body>
</html>