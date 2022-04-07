<?php
    include 'constants.php';
    $conn=mysqli_connect(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>