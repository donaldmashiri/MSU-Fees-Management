<?php
include("includes/db.php");
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

   
<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
   <div class="container">
      <a href="index.php" class="navbar-brand">Staff</a>
      <buttton class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
         <span class="navbar-toggler-icon"></span>
      </buttton>
      <div class="collapse navbar-collapse" id="navbarCollapse">
         <ul class="navbar-nav">
            <li class="nav-item px-2">
               <a href="index.php" class="nav-link">Home</a>
            </li>
         </ul>

         <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown mr-3">
               <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                  <i class="fas fa-user"></i>
                Staff
               </a>
            </li>
            <li class="nav-item">
               <a href="index.php" class="nav-link">
                  <i class="fas fa-user-times"></i> Logout
               </a>
            </li>
         </ul>
      </div>
   </div>
</nav>

<section class="py-3 mb-3 bg-light">
    <div class="info-header">
     
    <div class="container">
    <h5 class="text-info">
         MSU Analysis
       </h5>
       <hr>
        <div class="row ">
                <form class="form-inline" action="" method="get">
                <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2">Month</label>
                        <br>
                        <select name="fees_month"  class="form-control ml-2" id="">
                        <option value="">---</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                        </select>
                    </div>
                   
                    <div class="form-group mx-sm-3 mb-2">
                                <label class="control-label">Year</label>
                                    <div class=" controls">
                                        <select class="form-control" name="fees_year" id="">
                                        <option value="2015">---</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                        </select>
                                    </div>
                    </div>
                    <button type="submit" name="action" class="btn btn-primary mb-2">Apply filter</button>
                </form>
        </div>
    </div>

    </div>
 </section>



 <section class="py-3 mb-3 bg-secondary">
    <div class="info-header">
     
    <div class="container">
    <h5 class="text-info">
        Results
       </h5>
       <hr>
        <div class="row ">
        <?php

if(isset($_GET['action'])){
    $year = $_GET['fees_year'];
    $month = $_GET['fees_month'];
    

      $sql = "SELECT * FROM fees JOIN salaries ON fees.fees_id = salaries.fees_id WHERE fees_year = '{$year}' AND fees_month = '{$month}' ";
         $result = $conn->query($sql);

         if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
            $fees_id = $row["fees_id"];
            $fees_month = $row["fees_month"];
            $fees_year= $row["fees_year"]; 
            $fees_amount= $row["fees_amount"]; 

            $salary_id = $row["salary_id"];
            $salary = $row["salary"];

            $cal =  ($fees_amount - $salary);
             $per = ($cal/$fees_amount)*100;

            }
         }

         if($fees_year === $year && $fees_month === $month){

         echo  "<ul class='list-group'>";
         echo  "<li class='list-group-item'>Month : $fees_month || Fees : $fees_year</li>";
         echo  "<li class='list-group-item'>Salary required : $ $salary.00</li>";
         echo  "<li class='list-group-item'>Monthly Fees  : $ $fees_amount.00</li>";
         echo  "<li class='list-group-item'>Percentage : $per%</li>";
         echo  "</ul>";



         }else{

            echo "<p class='alert alert-success text-danger'>No information for this record</p>";
   
         }
   
}

if(isset($_POST['pay'])){

    

}

            
            ?>
        </div>
    </div>

    </div>
 </section>




   <?php include("includes/footer.php"); ?>