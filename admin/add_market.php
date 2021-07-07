<?php include('includes/header.php'); ?>
<div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon">
                                <i class="icon-pencil"></i>
                            </span>
                            <h5>Add Fees         Date:

                            <?php 
                                $date = date('d-m-y');
                                echo $date;
                            ?>

                            </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form id="form-wizard" class="form-horizontal" action="" method="post">
                                <div id="form-wizard-1" class="step">
                                <div class="control-group">
                                        <label class="control-label">Title</label>
                                        <div class="controls">
                                            <input id="password2" type="text" name="fees_title" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">No. of Students</label>
                                        <div class="controls">
                                            <input id="username" type="text" name="no_students" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Amount</label>
                                        <div class="controls">
                                            <input id="password" type="text" name="fees_amount" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Month</label>
                                        <div class="controls">
                                           <select name="fees_month" id="">
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
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Year</label>
                                        <div class="controls">
                                           <select name="fees_year" id="">
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

                                </div>

                                <div class="form-actions">
                                <div id="submitted"></div>
                                    <input id="next" name="save" class="btn btn-success" type="submit" value="Save" />

                                </div>

                                  <?php 
                                      
                                      if(isset($_POST['save'])){
                                        $fees_title = $_POST['fees_title'];
                                        $no_students = $_POST['no_students'];
                                        $fees_amount = $_POST['fees_amount'];
                                        $fees_month = $_POST['fees_month'];
                                        $fees_year = $_POST['fees_year'];
                                        


                                        $sql = "SELECT * FROM fees WHERE fees_month = '{$fees_month}' AND fees_year = '{$fees_year}'";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            $fees_id = $row["fees_id"];
                                            $check_month = $row["fees_month"];
                                            $check_year= $row["fees_year"]; 

                                            }
                                        }

                                        if($check_month === $fees_month){
                                            echo "<p class='alert alert-danger text-center'>This record has been entered before</p>";
                                        }else{

                                            // echo "<p class='alert alert-success text-center'>Your record was successfully added</p>";
                                            $sql = "INSERT INTO fees (fees_title, no_students, fees_amount, fees_date, fees_month, fees_year)
                                            VALUES ('{$fees_title}','{$no_students}', {$fees_amount}, now(),'{$fees_month}', '{$fees_year}')";
                                            
                                            if ($conn->query($sql) === TRUE) {
                                              echo "<p class='alert alert-success text-center'>Your record was successfully added</p>";
                                            } else {
                                              echo "Error: " . $sql . "<br>" . $conn->error;
                                            }              
                                  
                                  
                                        }


                                    
                                        }


                                    ?>
                              
                            </form>

                        </div>
                    </div>
                </div>
            </div>


       
    <?php include('includes/footer.php'); ?>