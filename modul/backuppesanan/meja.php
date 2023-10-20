 <div class="page-header"><h1>Nomor Meja</h1></div>
 
 <div class="panel panel-default">

			 <div class="panel-heading">Nomor Meja </div>\
             <div class="panel-body">
                              <div class="form-group">
                                
                                    <div class="col-sm-7" style="overflow:auto; height:300px">
                                    
                                      
                                        <?php 
                                        $n=1;
                                        $qu=mysql_query("SELECT * FROM meja") or die(mysql_error());
                                        while($ro=mysql_fetch_array($qu)){ 
                                          
                                        ?>

                                        <th align="center"><td><a href=""><img src="assets/images/avtar/Dining.png" class="img-circle" alt="..." /><br>Meja<?php echo $ro[no_meja];?> </a></td>
                                        <td>|  Status : <?php echo $ro[status];?></td>
                                        </th><br/><hr>

                                        <?php $n++; } ?>

                                                                          
                                    </div>
                                  </div>
                                  <hr class="dotted">
</div>
</div>                           
                                  