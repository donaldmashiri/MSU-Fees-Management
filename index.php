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
 ?>

<?php
include("includes/functions.php");

error_reporting(0);
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>MSU | Stock Analysis</title>

   <!-- Link Boostrap css -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



</head>

<body>

   <!-- HEADER -->
   <header id="main-header" class="py-2 bg-primary text-white">
      <div class="container">
         <div class="row">
            <div class="col-md-6 m-auto text-center">
               <img src="images/main-logo.png" alt="">
               <h5>MSU | Stock Analysis</h5>
            </div>
         </div>
      </div>
   </header>


   <!-- Brief -->
   <section id="actions" class="py-3 bg-light">
      <div class="container text-center">
         <p>This system was developed by Kudakwashe Gumbo Midlands State University student doing Information
            for ful-fillment on their level 4.2.

            
         </p>
         <?php
         if (isset($_POST['fill_form'])) {
            fill_form();
         }

         if (isset($_POST['std_login'])) {
            session_start();
            loginStudent();
         }

         if (isset($_POST['lecturer_login'])) {
            loginLecturer();
         }
         ?>

      </div>
   </section>


   <!-- CONTACT SECTION -->
   <section id="contact" class="py-3 text-center">
      <div class="container">
         <div class="row">
            <div class="col-md-4">
               <div class="info-header mb-1">
                  <h1 class="text-info">
                     Already Registered
                  </h1>
               </div>
               <div class="card">
                  <div class="card-header">
                     <h4>Login</h4>
                  </div>
                  <div class="card-body">
                     <form action="" method="POST">
                        <div class="form-group">
                           <label for="email">Email</label>
                           <input type="email" name="std_email" class="form-control">
                        </div>
                        <div class="form-group">
                           <label for="password">Password</label>
                           <input type="password" name="std_password" class="form-control">
                        </div>
                        <input type="submit" name="std_login" value="Login" class="btn btn-primary btn-block">

                        <!-- Student Login -->
                     </form>

                     <br>
                     <!-- Lecturer -->
        
                  </div>
               </div>
            </div>
            <div class="col-md-8">
               <div class="card p-4">
                  <div class="card-body">
                     <h3 class="text-center">Fill out this form to be granted access to the system</h3>
                     <hr>
                     <div class="row">
                        <div class="col-md-6">
                           <form action="" method="post">
                              <div class="form-group">
                                 <input type="text" name="firstname" class="form-control" placeholder="First name" required>
                              </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input type="text" name="lastname" class="form-control" placeholder="Last name" required>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <input type="text" name="email" class="form-control" placeholder="Email" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input type="password" name="password" class="form-control" placeholder="Enter Pasword" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input type="password" name="re_password" class="form-control" placeholder="Confirm Pasword" required>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <input type="submit" name="fill_form" value="Submit" class="btn btn-outline-primary btn-block">
                           </div>
                        </div>
                     </div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>



   <?php include("includes/footer.php"); ?>