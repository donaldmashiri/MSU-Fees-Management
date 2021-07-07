<?php include('includes/header.php'); ?>
            <div class="row-fluid">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
                        <h5>Manage Users</h5>
                        <div class="buttons"><a href="#" class="btn btn-mini btn-success"><i class="icon-refresh"></i>
                                Update stats</a></div>
                    </div>
                    <div class="widget-content">
                        <div class="row-fluid">
                            <div class="span8">
                            
                            <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                            <h5>Users/Student</h5>
                        </div>
                        <div class="widget-content nopadding">
                          
                        <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $user_id = $row["user_id"];
      $firstname = $row["firstname"];
      $lastname = $row["lastname"];
      $email = $row["email"];
      $status = $row["status"];
     
?>
                            

                                    <tr>
                                        <td><?php echo $user_id ?></td>
                                        <td class="taskDesc"> <?php echo $firstname ?> </td>
                                        <td class="taskStatus"><span class="text-danger"><?php echo $lastname ?></span></td>
                                        <td class="taskStatus"><?php echo $email ?></td>
                                        <td class="taskStatus"><?php echo $status ?></td>
                                        <td>
                                        <div class="article-post">
                                        <a href="users.php?approve=<?php echo $user_id ?>" class="btn btn-success btn-mini">Approve</a> 
                                        <a href="users.php?decline=<?php echo $user_id ?>" class="btn btn-danger btn-mini">Decline</a> 
                                    </div>  
                                        </td>
                                    </tr>

                                    <?php }
                            } else {
                              echo "0 results";
                            }
                            ?>            
                               
                                </tbody>
                            </table>

                        </div>
                    </div>


<?php 


if (isset($_GET['approve'])) {
    
    $approve_id = $_GET['approve'];
    $query = "UPDATE users SET ";
    $query .= "status  = 'approved' ";
    $query .= "WHERE user_id = $approve_id ";

   
    $update_query = mysqli_query($conn, $query);
    header("Location: users.php");
    
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }

}

if (isset($_GET['decline'])) {
    
    $approve_id = $_GET['decline'];
    $query = "UPDATE users SET ";
    $query .= "status  = 'declined' ";
    $query .= "WHERE user_id = $approve_id ";

   
    $update_query = mysqli_query($conn, $query);
    header("Location: users.php");
    
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }
}

  
?>



                            </div>
                            <div class="span4">
                                <ul class="stat-boxes2">
                                    <li>
                                        <div class="left peity_bar_neutral"><span><span
                                                    style="display: none;">12,4,9,7,12,10,12</span>
                                            <canvas width="50" height="24"></canvas>
                                            </span></div>
                                        <div class="right"> <strong> Midlands State University</strong></div>
                                    </li>
                                    <li>
                                        <div class="left peity_line_neutral"><span><span
                                                    style="display: none;">10,15,8,14,13,10,10,15</span>
                                            <canvas width="50" height="24"></canvas>
                                            </span></div>
                                        <div class="right"> <strong>
                                        
                                        <?php
                                        $query = "SELECT count(user_id) As CartNo FROM users";
                                        $result = $conn->query($query);

                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                $count = $row['CartNo'];}}
                                        echo $count;
                                                        ?>
                                                        
                                        
                                        </strong> All Users </div>
                                    </li>
                                    <li>
                                        <div class="left peity_bar_bad"><span><span
                                                    style="display: none;">3,5,6,16,8,10,6</span>
                                            <canvas width="50" height="24"></canvas>
                                            </span></div>
                                        <div class="right"> <strong>
                                        <?php
                                        $query = "SELECT count(user_id) As CartNo FROM users WHERE status ='declined'";
                                        $result = $conn->query($query);

                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                $count = $row['CartNo'];}}
                                        echo $count;
                                                        ?>
                                        </strong> declined</div>
                                    </li>
                                    <li>
                                        <div class="left peity_line_good"><span><span
                                                    style="display: none;">12,6,9,13,14,10,17</span>
                                            <canvas width="50" height="24"></canvas>
                                            </span></div>
                                        <div class="right"> <strong>
                                        <?php
                                        $query = "SELECT count(user_id) As CartNo FROM users WHERE status ='approved'";
                                        $result = $conn->query($query);

                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                $count = $row['CartNo'];}}
                                        echo $count;
                                                        ?></strong> Approved </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     
   
    <?php include('includes/footer.php'); ?>