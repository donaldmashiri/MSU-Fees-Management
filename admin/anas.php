<?php 

$cal =  ($fees_amount - $salary);
$per =  ($cal/$fees_amount)*100;

                        if($per <= 50){
                       
                    ?>
                        <li>
                            <div class="left peity_bar_bad"><span><span style="display: none;">3,5,6,16,8,10,6</span>
                                    <canvas width="50" height="24"></canvas>
                                </span><?php echo $per ?>%</div>
                            <div class="right"> <strong>$<?php echo $cal ?></strong> <?php echo $fees_month .'/'. $fees_year ?></div>
                            <p class="text-danger">Loss</p>
                        </li>



                      
                        <?php  }else{
                         ?>
                          <li>
                            <div class="left peity_line_good"><span><span
                                        style="display: none;">12,6,9,23,14,10,17</span>
                                    <canvas width="50" height="24"></canvas>
                                    </span>+<?php echo $per ?>%</div>
                            <div class="right"> <strong>$<?php echo $cal ?></strong> <?php echo $fees_month .'/'. $fees_year ?></div>
                            <p class="text-success">Profit</p>
                        </li>

                          <?php  }?> 


                         
                <ul class="quick-actions">
                    <p class="text-info">Comparison: The different = $<?php echo $salary - $fees_amount ?>.00</p>
                    <li>
                        <a href="#"> <i class="icon-dashboard"></i> Salaries = <?php echo $salary; ?> </a>
                    </li>
                    <li>
                        <a href="#"> <i class="icon-shopping-bag"></i>Feess = <?php echo $fees_amount; ?> </a>
                    </li>
                </ul>
     

