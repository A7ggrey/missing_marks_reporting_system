<?php
    
   $session = $_SESSION['id'];

   $query123 = "SELECT * FROM examcoordinators WHERE myschid = '$session'";
   $result123 = mysqli_query($conn, $query123);

   if (mysqli_num_rows($result123) > 0) {
      while ($rows123 = mysqli_fetch_assoc($result123)) {
         $sch123 = $rows123['school'];
      }
   }
?>