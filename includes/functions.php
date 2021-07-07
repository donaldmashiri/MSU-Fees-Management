<?php

function fill_form()
{
   global $connection;
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $real_pass = $_POST['password'];
   $re_password = $_POST['re_password'];

   // $status = "pending";

   $query = mysqli_query($connection, "SELECT email FROM students WHERE email='$email'");
   $numrows = mysqli_num_rows($query);

   if (!$numrows >= 1) {
      $row = mysqli_fetch_array($query);
      if ($password != $re_password) {

         echo "<p class='alert alert-danger'>Password didnt match</p>";
      } else {
         $query = "INSERT INTO users(firstname, lastname, email, password) ";
         $query .= "VALUES('{$firstname}','{$lastname}','{$email}','{$real_pass}') ";
         $signup_query = mysqli_query($connection, $query);


         if (!$signup_query) {
            die("Query failed" . mysqli_error($connection));
         }

         echo "<p class='alert alert-success'>Your Account was successfully registered. Wait for the Lecturer approval and login.</p>";
      }
   } else {
      echo "<p class='alert alert-danger'>Email already taken</p>";
   }
}


// Login Student
function loginStudent()
{
   global $connection;
   $std_email =  $_POST['std_email'];
   $std_password =  $_POST['std_password'];

   $query = mysqli_query($connection, "SELECT user_id FROM users WHERE email='$std_email' and password='$std_password' and status = 'approved'");

   $granted_students = mysqli_query($connection, $query);
   $row = mysqli_fetch_assoc($granted_students);
   $status = $row['status'];

   $numrows = mysqli_num_rows($query);

   if ($numrows >= 1) {
      $row = mysqli_fetch_array($query);
      $_SESSION['user_id'] = $row['user_id'];

      header('location:home.php');
   }else {
      echo "<p class='alert alert-danger'>Your not yet approved</p>";
   }
}


// Login Lecturer
function loginLecturer()
{
   global $connection;
   $lec_email = $_POST['lec_email'];
   $lec_pass = $_POST['lec_pass'];

   if ($lec_email === "lecturer@gmail.com" && $lec_pass === "12345") {
?>
      <script>
         window.open("lecturer/index.php");
      </script>
   <?php
   } else {
      echo "<p class='alert alert-danger'>Lecturer: Invalid credentials</p>";
   }
}


?>