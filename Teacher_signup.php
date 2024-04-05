<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") { 
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "edu_tech";

        $conn = mysqli_connect($server, $username, $password, $database);
        if(!$conn){
            die("connection to this database is failed due to ".mysqli_connect_error());
        }
        // echo "connect to db";
        $username = $_POST['Username'];
        $email = $_POST['email'];
        $password = $_POST['Password'];
        $sql= "INSERT INTO `edu_tech`.`teacher_ls` (`Username`, `email`, `Password`, `time`) VALUES ('$username', '$email', '$password', current_timestamp())";
        // echo $sql;
        if($conn->query($sql) == true){
            echo "Signup Successful Please Login ";
        }
        else{
            echo "Error : $sql <br> $conn->error";
        }
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Signup</title>
    <link rel="stylesheet" href="Teacher_signup.css">
</head>
<body>
    <nav>
    <ul>
    <a href="#"><img id="main-logo" src="image/logo.svg" alt="EduTech logo" align="left" ></a>
    <li><a href="home.html">Home</a></li>
    <li><a href="Teacher_dashboard.html">Dashboard</a></li>
    <li><a href="pricing.html">Pricing</a></li>
    <li><a href="about.html">About</a></li>
    </ul>
    </nav>

    <div class="hero">
      <div class="main-content">
          <a href="home.html"><img id="back_button" src="image/Back Button.svg" alt=""></a>
        <div class="content">
          <form action="Teacher_signup.php" method="POST">
              <span>Teacher</span>
              <br>
                <label for="Username">User Name</label>
                <br>
                <input type="text" id="Username" name="Username" placeholder="Username"><br>
                <br>
                <label for="Email">Email</label>
                <br>
                <input type="email" id="email" name="email" placeholder="Email"><br>
                <br>
                <label for="Password">Password</label>
                <br>
                <input type="password" id="Password" name="Password" placeholder="Password"><br><br>
                <input id="Login" type="submit" value="SignUp">
                <a href="Teacher_login.php">
                    <p id="back_login">Back To <b>LOGIN</b></p>
                </a>
            </form>
        </div>
      </div> 
    </div>
    

    <div class="footer">

      <div class="right">
        <img src="image/logo.svg" alt="mainlogo">
        <br>
        <p class="logotext">EduTech</p>
        
      </div>

      <div class="right2">
        <p class="foothead">Legal</p>
        <p><a href="terms_conditions.html">Terms & Condition</a></p>
        <p><a href="privacy_policy.html">Privacypolicy</a></p>
      </div>

      <div class="right3">
        <p class="foothead">Support</p>
        <p><a href="contact_us.html">Contact Us</a></p>
        <p><a href="help.html">Help</a></p>
      </div>

      <div class="left">
        <p class="foothead">Find us on</p>
        <p class="footer-logo"><a href="https://www.instagram.com/vedant.kale33/"><img src="image/instagram logo.svg" alt="instagram"></p></a>
        <p class="footer-logo"><a href="https://twitter.com/vedantkale123"><img src="image/twitter logo.svg" alt="twitter"></p></a>
        <p class="footer-logo"><a href="https://www.facebook.com/profile.php?id=100008838940188"><img src="image/facebook logo.svg" alt="facebook"></p></a>
      </div>

    </div>
</body>
</html>