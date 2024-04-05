<?php
    $login = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "edu_tech";

        $conn = mysqli_connect($server, $username, $password, $database);
        if(!$conn){
            die("connection to this database is failed due to ".mysqli_connect_error());
        }
        //echo "connect to db";
        $username = $_POST["Username"];
        $password = $_POST["Password"];

        $sql = "Select * from teacher_ls where Username='$username' AND Password='$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        if ($num == 1){
          $login = true;
          session_start();
          $_SESSION['loggesin'] = true;
          $_SESSION['Username'] = $username;
          header("location: http://localhost/web/Teacher_profile.php");
          // echo "success!";
        }
        else{
          $showError = "Invalid Credentials";
        }
        // $conn->close();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login</title>
    <link rel="stylesheet" href="Teacher_login.css">
</head>
<body>
<?php
  if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You are logged in successfully
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
    </button>
    </div>';
  }
  if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong>'. $showError.'
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
    </button>
    </div>';
}
?>
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
          <form action="Teacher_login.php" method="POST" >
              <span>Teacher</span>
              <br>
                <label for="Username">User Name/Email</label>
                <br>
                <input type="text" id="Username" name="Username" placeholder="Username or Email"><br>
                <br>
                <label for="Password">Password</label>
                <br>
                <input type="password" id="Password" name="Password" placeholder="Password"><br><br>
                <button id="Login" type="submit" value="Login" >Login</button>
                <p style="color: black;  margin:20px 0px 0px 128px;" >OR</p>
                <button id="SignUp" type="submit" value="SignUp"><a href="Teacher_signup.php" style="color: rgb(255, 102, 0);"> SignUp </a></button> 
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
        <p><a href="privacy_policy.html">Privacy policy</a></p>
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