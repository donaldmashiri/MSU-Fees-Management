<?php
   ob_start();

   session_start();


   $servername = "localhost";
   $username = "root";
   $password = "";
   $db_name = "kruz";


   // Create connection
   $connection = mysqli_connect($servername, $username, $password, $db_name);

   // Check connection
   if (!$connection) {
      die("Connection failed: " . mysqli_connect_error());
   }
   // echo "Connected successfully";
