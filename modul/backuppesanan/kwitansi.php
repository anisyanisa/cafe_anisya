<?php
    
    include "config/koneksi.php";
    include "config/ubah_tanggal.php";        
            
    $id=$_GET['no_trans'];


	$c=mysql_query("
	select * from pesanan_temp where no_meja='$id'
	");
	
    $row=mysql_fetch_assoc($c);

    $ncekin=$row['nocekin'];

?>            

            <div class="page-header">
              </div>
                
                <div class="row">

                    <div class="col-md-6">
                    
                        <address>
                        Bukti Pembayaran<br /><hr>
                        <font size="-4">
                          <strong>Berry's Coffee and Food</strong><br>
                          Jalan Dr. Sutomo<br>
                          Padang, Sumatera Barat<br>
                          Open 9 a.m - 11 p.m</font>
                        </address>
                        
                         
                        
                    </div>
                
                </div>
                
                <div class="row">
            
                                  
                                  <?php
/*
                                  $datetime1 = strtotime($row['tanggalmasuk']);
                                  $datetime2 = strtotime($row['tanggalcekout']);
                                  $selisih = $datetime2 - $datetime1;
                                  $lama = $selisih / (60*60*24);
  */                                
                                  ?>
                                 
             
            </div>
					<form class="form-horizontal" role="form" action="?modul=cetak&no_trans=<?php echo $_GET['no_trans'];?>" method="POST">
                    <div class="panel-body">

                    <?php

                    

                    ?>
                    <font size="-4">
                        <table cellpadding="0" cellspacing="0" border="0" >
                            <tr>

                              <td width="86"><font size="-4">Transaksi</font></td><td width="26">
							  <input type="hidden" name="no_transaksi" value="<?php echo $row['no_transaksi'];?>">
							  <?php echo $row['no_transaksi'];?></td>
                            </tr>
                            <tr>
                                <td><font size="-4">Tanggal</font></td><td><?php echo ubahFormatZ($row['tgl_transaksi']);?></td>
                             
                          </tr>
                            <tr>
                                <td><font size="-4">Kasir</font></td><td><?php echo $row['kd_kasir'];?></td>
                             
                            </tr>
                            <tr>
                                <td><font size="-4">Meja</font></td><td><?php echo $row['no_meja'];?></td>
                           
                            </tr>
                            
                        </table>
                    </font>
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered thead">
                           

                            <tbody>
                                <tr><th colspan="3">Rincian Pesanan</th></tr>
                                             

                                <?php

                                    
                                    //echo $ncekin;

                                    $no=1;
                                   
                                    $res=mysql_query("

                                      SELECT * from pesanan_temp where no_meja='$_GET[no_trans]'
                                      ") or die(mysql_error());
                                    
                                    while($rows=mysql_fetch_array($res)){
										
										$menu=mysql_query("select * from menu where id_menu='$rows[id_menu]'");
										$rmenu=mysql_fetch_array($menu);

                                        $total=$rows['qty']*$rmenu['harga'];

                                        $totals=$totals+$total;

                                ?>

                                <tr class="odd gradeX">
                                   
                                    <td colspan="3"></td>
                                    
                                    
                                </tr>
                                
                                <tr class="odd gradeX">
                                <td colspan="2"><?php echo $rmenu['nama_menu']; ?></td><td><?php echo $rows['qty'];?> x <?php echo number_format($rmenu[harga],0,'','.');?></td>
                                </tr>

                                <?php  } ?>

                            </tbody>
                            <tfoot>
                              <tr>
                                <td colspan="2">Sub Total</td>
                                <td>Rp. <?php echo number_format($totals,0,'','.');?></td>
                              </tr>
                              <tr>
                                <td colspan="2">Diskon</td>
                                <?php
								//$ppn=0.10*$totals;
								?>
                                <td><input type="text" size="4" class=""   name="no_transaksi2" required="required" value="" onkeyup="validAngka(this)" placeholder="0" /></td>
                              </tr>
                              <tr>
                                <td colspan="3"></td>
                               
                              </tr>
                                <?php
                                  $grandtotal=$totals;
                                ?>
                              <tr>
                                <td colspan="2"> Grand Total</td>
                                <td>Rp. <?php echo number_format($grandtotal,0,'','.'); ?> - <?php echo $d; ?></td>
                              </tr>
                              <tr>
                                <td colspan="2"> Bayar</td>
                                <td><input type="text" onkeyup="validAngka(this)"  class="form-control form-control-flat" autofocus placeholder='Bayar' maxlength="10" name="bayar" value="" required></td>
                              </tr>
                              <tr>
                                <td colspan="2" valign="top">Waitress</td>
                                <td>
                                
                                 <div class="form-group">
                                   <div class="col-sm-7" style="overflow:auto; height:200px">
                                    
                                      
                                       <?php 
                                        $n=1;
                                        $waitress=mysql_query("SELECT * from waitress") or die(mysql_error());
                                        while($rw=mysql_fetch_array($waitress)){ 
                                          
                                        ?>

                                       <input type="checkbox" name="id_waitress[<?php echo $n; ?>]" value="<?php echo $rw['id_waitress'];?>"> <?php echo $rw['nama_waitress']; ?> 
                                       <br/><br/>

                                        <?php $n++; } ?>

                                                                          
                                   </div>
                                  </div>
                                  <hr class="dotted"> 

                                
                                </td>
                              </tr>
                            </tfoot>
                        </table>
                        
                       
                    </div>

              
                
                
                <div class="row">
                   <div class="col-lg-6"> <!--<button class="btn btn-warning" type="button" href="javascript:void(0);" onclick="javascript:window.print();">Cetak Kartu</button>-->
                    
                    <!--<a href="?modul=cetak&no_trans=<?php //echo $_GET['no_trans'];?>&bayar=<?php //echo $_POST['bayar']; ?>" class="btn btn-primary">Cetak Bukti</a>
                    -->
                    
                    <button type="submit" class="btn btn-primary">Bayar</button>
                    <button type="button" class="btn btn-danger" onclick=location.href='<?php echo "javascript:history.back(-1)"; ?>'>Kembali</button>
                    </div>
                   
                </div>
</form>