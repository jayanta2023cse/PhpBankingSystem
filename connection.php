<?php
   $servername = "localhost:3307";
   $username = "root";
   $password = "";
   $dbname = "test";

   $conn = mysqli_connect($servername, $username, $password, $dbname);

   if(!$conn){
      die("vannot connected to the database due to".mysqli_connect_error());
   }

?>