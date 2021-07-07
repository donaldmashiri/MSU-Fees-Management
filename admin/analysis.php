<?php include('includes/header.php'); ?>
<div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon">
                                <i class="icon-file"></i>
                            </span>
                            <h5>Recent information</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <ul class="recent-posts">
                            <?php 


$sql = "SELECT * FROM fees ORDER BY fees_id DESC LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $fees_id = $row["fees_id"];
      $fees_title = $row["fees_title"];
      $fees_date = $row["fees_date"];
      $no_students = $row["no_students"];
      $fees_amount = $row["fees_amount"];
      $fees_month = $row["fees_month"];
      $fees_year= $row["fees_year"];

  
?>

                                <li>
                                    <div class="user-thumb"> <img width="40" height="40" alt="User"
                                            src="img/demo/av1.jpg"> </div>
                                    <div class="article-post">
                                        <div class="fr"> <a
                                                href="view.php?view=<?php echo $fees_id ?>" class="btn btn-success btn-mini">Analysis</a> 
                                            </div>
                                        <span class="user-info"> By: admin / Date: <?php echo $fees_date ?> / Year: <?php echo $fees_year ?> </span>
                                        <p><a href="#"><?php echo $fees_title ?></a>
                                        </p>
                                    </div>
                                </li>
                                <?php }
                            } else {
                              echo "0 results";
                            }
                            ?>

                            </ul>
                        </div>
                    </div>
            
                </div>

            </div>


          
       
    <?php include('includes/footer.php'); ?>