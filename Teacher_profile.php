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
        echo "connect to db";
        $username = $_POST['Username'];
        $email = $_POST['email'];
        $contact = $_POST['Contact'];
        $experiance = $_POST['Experiance'];
        $designation = $_POST['Designation'];
        $country = $_POST['Country'];
        $state = $_POST['State'];
        $district = $_POST['District'];
        $description = $_POST['Description'];
        // $password = $_POST['Password'];
        $sql= "INSERT INTO `edu_tech`.`teacher_profile` (`Username`, `email`, `Contact`, `Experiance`, `Designation`, `Country`, `State`, `District`, `Description`, `date` ) 
        VALUES ('$username', '$email', '$$contact', '$experiance', '$designation', '$country', '$state', '$district', '$description', current_timestamp())";
        // echo $sql;
        if($conn->query($sql) == true){
            echo "Information saveded successfully";
            header("location: Teacher_dashboard.html");
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
    <title>Teacher Profile</title>
    <link rel="stylesheet" href="Teacher_profile.css">
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
            <form action="Teacher_profile.php" method="POST">
                <span>Teacher</span>
                <div class="profile_photo">
                       <img src="image/change_profile_teacher.svg" alt="Chnage Profile">
                </div>
                <br>
                  <label for="Username">Full Name</label>
                  <br>
                  <input type="text" id="Username" name="Username" placeholder="Username" required autofocus><br>
                  <br>
                  <label for="Email">Email</label>
                  <br>
                  <input type="email" id="email" name="email" placeholder="Email" required><br>
                  <br>
                  <label for="Contact">Contact Number</label>
                  <br>
                  <input type="tel" id="Contact" name="Contact" placeholder="Phone" required><br>
                  <br>
                  <label for="Work_experiace">Work Experiance</label>
                  <br>
                  <input type="number" id="Experiance" name="Experiance" placeholder="Work experiance(in years)"><br>
                  <br>
                  <label for="Designation">Designation</label>
                  <br>
                  <input type="text" id="Designation" name="Designation" placeholder="Present or Previous"><br>
                  <br>


                <div class="CSD">
                  <label for="Country">Country</label>
                  <br>
                  <input class="CSD_input" type="text" id="Country" name="Country" placeholder="County" required>
                </div>
                <div class="CSD">
                  <label class="move" for="State">State</label>
                  <br>
                  <input class="CSD_input" type="text" id="State" name="State" placeholder="State" required>
                </div>
                <div class="CSD">
                  <label class="move" for="District">District</label>
                  <br>
                  <input class="CSD_input" type="text" id="District" name="District" placeholder="District" required>
                </div><br>
                <br>
                <label for="Description">Description</label>
                  <br>
                  <textarea name="Description" id="Description" rows="10" cols="30" placeholder="Description(In 50 to 100 Words)"></textarea><br>
                  <br>
                  <button id="Create" type="submit" value="Create">Create</button>
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
        <p class="footer-logo"><a href=""><img src="image/instagram logo.svg" alt="instagram"></p></a>
        <p class="footer-logo"><a href=""><img src="image/twitter logo.svg" alt="twitter"></p></a>
        <p class="footer-logo"><a href=""><img src="image/facebook logo.svg" alt="facebook"></p></a>
      </div>

    </div>
</body>
</html>