<?php include('includes/header.php'); ?>

<?php 

$id = $_GET['view'];


// $sql = "SELECT * FROM fees JOIN salaries ON fees.fees_id = salaries.fees_id WHERE fees.fees_id = $id";
$sql = "SELECT * FROM fees WHERE fees_id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $fees_id = $row["fees_id"];
      $salary_id = $row["salary_id"];
      $salary = $row["salary"];


      $fees_title = $row["fees_title"];
      $fees_date = $row["fees_date"];
      $no_students = $row["no_students"];
      $fees_amount = $row["fees_amount"];
      $fees_month = $row["fees_month"];
      $fees_year= $row["fees_year"];
      $fees_status= $row["fees_status"];

      $cal =  ($fees_amount - $salary);
      $per =  ($cal/$fees_amount)*100;


    }
}

// Salary




  
?>
  <div class="widget-box widget-plain">
                <div class="center">
                    <ul class="stat-boxes">
                    
                 <?php 
                //  SELECT LAST (CUSTOMER_NAME) AS LAST_CUSTOMER FROM CUSTOMERS;  
$sql = "SELECT * FROM salaries WHERE fees_id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $fees_id = $row["fees_id"];
      $salary_id = $row["salary_id"];
      $salary = $row["salary"];
      $salary = $row["salary"];

        include('anas.php');

    }
}else{
    echo "<p class='alert alert-danger'>Salary not recorded yet for Anaysis</p>";
}
 ?>
                    
                    </ul>
                </div>
            </div>




<div class="row-fluid">
                <div class="span12">

                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon"><i class="icon-time"></i></span>
                            <h5>Analysis</h5>
                        </div>
                        <div class="widget-content nopadding">

                        <form id="form-wizard" class="form-horizontal" action="" method="post">
                            <div id="form-wizard-1" class="step">
                            <div class="control-group">
                                    <label class="control-label">Salary</label>
                                    <div class="controls">
                                        <input id="password2" type="text" name="salary" />
                                        <input type="submit" name="submit" class="btn btn-success" value="Submit" />
                                    </div>
                                </div>
                            </div>

                            <?php

                            if(isset($_POST['submit'])){
                                                                    
                                $salary = $_POST['salary'];
                                
                                $sql = "INSERT INTO salaries (fees_id, salary)
                                VALUES ('{$fees_id}', {$fees_amount})";
                                
                                if ($conn->query($sql) === TRUE) {
                                    header("Location: view.php?view=".$id );
                                // echo "<p class='alert alert-success text-center'>Your record was successfully added</p>";
                                } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            }

                            ?>

                        </form>

                      

                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Amount</th>
                                        <th>No of Students</th>
                                        <th>Status</th>
                                        <th>Month</th>
                                        <th>Year</th>
                                        <th>Date submited</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $fees_id ?></td>
                                        <td class="taskDesc"><i class="icon-info-sign"></i> <?php echo $fees_title ?> </td>
                                        <td class="taskStatus"><span class="text-danger">$<?php echo $fees_amount ?></span></td>
                                        <td class="taskStatus"><?php echo $no_students ?></td>
                                        <td class="taskStatus"><span class="in-progress"><?php echo $fees_status ?></span></td>
                                        <td class="taskStatus"><?php echo $fees_month ?></td>
                                        <td class="taskStatus"><?php echo $fees_year ?></td>
                                        <td class="taskStatus"><?php echo $fees_date ?></td>
                                       
                                        <!-- <td class="taskOptions"><a href="#" class="tip-top"
                                                data-original-title="Update"><i class="icon-ok"></i></a> <a href="#"
                                                class="tip-top" data-original-title="Delete"><i
                                                    class="icon-remove"></i></a></td> -->
                                    </tr>
                               
                                </tbody>
                            </table>
                        </div>      

                        <form id="form-wizard" class="form-horizontal mt-5" action="" method="post">
                            <div id="form-wizard-1" class="step">
                            <div class="control-group">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Approve" />
                                </div>
                            </div>

                            <?php

                            if(isset($_POST['submit'])){
                                                                    
                                $status = "approved";

                                $query = "UPDATE fees SET ";
                                $query .= "fees_status  = '{$status}' ";
                                $query .= "WHERE fees_id = $id ";
                            
                                $update_query = mysqli_query($conn, $query);
                                header("Location: view.php?view=".$id );
                            
                                if (!$update_query) {
                                    die("Query failed" . mysqli_error($conn));
                                }
                                
                            }

                            ?>

                        </form>

                    </div>
                </div>
            </div>

    <?php include('includes/footer.php'); ?>