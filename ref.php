<div class="Teacher_info" >
      <?php 
      $sql = "SELECT * FROM `schedule_class`";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        echo $row['sno']. ". Username". $row['username']. "Date ".$row["Date"]. "Start_time".$row["Start_time"]."End_time".$row["End_time"]. "chapter_topic".$row["chapter_topic"];
        echo "<br>";
      }
      ?>
    </div>