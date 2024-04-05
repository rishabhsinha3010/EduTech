<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "edu_tech"; 

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
  $username = $_POST['Username'];
  $date = $_POST['Date'];
  $Start_time = $_POST['Start_time'];
  $End_time = $_POST['End_time'];
  $chapter_topic = $_POST['chapter_topic'];

  $sql= "INSERT INTO `edu_tech`.`schedule_class` (`username`, `date`, `Start_time`, `End_time`, `chapter_topic`,`tstamp`) VALUES ('$username', '$date', '$Start_time', '$End_time', '$chapter_topic', current_timestamp())";
  $result = mysqli_query($conn, $sql);

  // if($result){
  //   echo "The record has been inserted sucessfully!<br>";
  // }
  // else {
  //   echo "The record was not inserted --> " .
 //   mysqli_error($conn);    
  // }
}
?> 




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Schedule Class</title>
    <link rel="stylesheet" href="Schedule_class_t.css">
<link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eMg/x3yoiggUDtc4vAzPCTjC2I2ZBL3wDqxiigqjEFyTwe/lBwXjDjhZYp9+a1g4" crossorigin="anonymous"></script> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


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
        <div class="sidebar">

        <div class="sidebar_elements">
          <a href="http://localhost/web/Teacher_profile.php"></a><img src="image/profile_main.svg" alt="">
        </div>

        <div class="sidebar_elements">
          <a href="fees_t.html"> <img src="image/fees_main.svg" alt=""></a>
        </div>

        <div class="element_last">
          <a href="home.html"> <img src="image/logout_main.svg" alt=""></a>
        </div>
    </div>

        <div class="main_dashboard">
          <div>
            <a href="Teacher_dashboard.html"><img class="back_button" src="image/Back Button.svg" alt=""></a>
            <img class="Schedule" src="image/Schedule_Class_title.svg" alt="Schedule class">
          </div>


          <div class="Teacher_info" >


            <form id="scheduleForm" action="Schedule_class_t.php" method="POST" >
            
            <div class="Teacher_element">
              <label for="Username">Username</label>
              <br>
              <input type="text" id="username" name="Username" required>
            </div> 
             
            <div class="Teacher_element">
              <label for="Date">Date</label>
              <br>
              <input type="date" id="Date" name="Date" required>
            </div>

            <div class="Teacher_element">
              <label for="Start_time">Start time</label>
              <br>
              <input type="time" id="Start_time" name="Start_time" required>
            </div>

            <div class="Teacher_element">
              <label for="End_time">End time</label>
              <br>
              <input type="time" id="End_time" name="End_time" required>
            </div> 

            <div class="Teacher_element" >
              <label for="chapter_topic">Chapter & Topic</label>
              <br>
              <input type="text" id="chapter_topic" name="chapter_topic" required>
            </div>

            <div class="button_teacher Teacher_element">
                 <button type="submit" id="add_note" >Add Class</button>
            </div>
          </form>

            </div>

  <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Username</th>
      <th scope="col">Date</th>
      <th scope="col">Start time</th>
      <th scope="col">End time</th>
      <th scope="col">Chapter & Topic</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
 <?php 
      $sql = "SELECT * FROM `schedule_class`";
      $result = mysqli_query($conn, $sql);
      $sno = 0;
      while($row = mysqli_fetch_assoc($result)){
        $sno = $sno + 1;
        echo "<tr>
        <th scope='row'>".$sno."</th>
        <td>".$row['Username']."</td>
        <td>".$row['Date']."</td>
        <td>".$row['Start_time']."</td>
        <td>".$row['End_time']."</td>
        <td>".$row['chapter_topic']."</td>
        <td>
        <button class='edit btn btn-sm btn-primary'>
        <a href='https://us05web.zoom.us/j/81167170659?pwd=55OH6MLbjP91ByabVZobPGak7zzVbT.1'>Start</a>
        </button>
        </td>
      </tr>";
    }
    
    
      ?> 
   </tbody>
</table> 
        
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

    
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eMg/x3yoiggUDtc4vAzPCTjC2I2ZBL3wDqxiigqjEFyTwe/lBwXjDjhZYp9+a1g4" crossorigin="anonymous"></script> -->

<script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
<script>
  let table = new DataTable('#myTable');
</script>
  </body>
</html>