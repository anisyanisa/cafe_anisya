<?php
include "config/koneksi.php";
include "config/ubah_tanggal.php";
?>

<div class="page-header"><h1>Report Menu</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body">

                           <!-- <form class="form-horizontal" role="form" action="r_menu.php" method="POST" target="_blank">
                                <div class="form-group">
                                   
                                    <div class="col-sm-3">
                                     Report Keseluruhan
                                    </div>
                                    <div class="col-sm-3">
                                    
                                    </div>

                            
                            
                                  </div>
                                  <hr class="dotted">
<button type="submit" class="btn btn-primary">Lihat</button>
                            
                            <hr class="dotted">
                             </form>
                             -->
                          
                          <form class="form-horizontal" role="form" action="r_menu_divide_per_kategori.php" method="POST" target="_blank">
                                <div class="form-group">
                                   
                                    <div class="col-sm-3">
                                     Report Keseluruhan
                                    </div>
                                    <div class="col-sm-3">
                                    
                                    </div>

                            
                            
                                  </div>
                                  
<button type="submit" class="btn btn-primary">LIHAT</button>
                            
                            <hr class="dotted">
                             </form>
                          
                              <form class="form-horizontal" role="form" action="r_menu_kategori.php" method="POST" target="_blank">
                                <div class="form-group">
                                   
                                    <div class="col-sm-3">
                                     Berdasarkan Kategori
                                    </div>
                                    <div class="col-sm-7">
                                     <select class="form-control chosen-select" name="id_kategori" required data-placeholder="Pilih Kategori">
                                        
                                        <option></option>
                                        <?php 
                                        $qu=mysqli_query($conn,"SELECT * FROM kategori ORDER BY id_kategori ASC ") or die(mysqli_error($conn));
                                        while($ro=mysqli_fetch_array($qu)){ 
                                        ?>

                                        <option value="<?php echo $ro['id_kategori'];?>"><?php echo $ro['id_kategori'];?> - <?php echo $ro['nama_kategori'];?></option>
                                        
                                        <?php } ?>

                                      </select>
                                    </div>

                                    
                            
                            
                                  </div>
                                 


                            <button type="submit" class="btn btn-primary">Lihat</button>
                             </form>

                        

                          

                        </div>
                    </div>
                 </div>
            
            </div>