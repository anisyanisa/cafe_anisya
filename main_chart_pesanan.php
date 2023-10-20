<?php
include "config/koneksi.php";
include "config/ubah_tanggal.php";
?>

<div class="page-header"><h1>&nbsp;Statistik Jumlah Pesanan</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body">

                            <form class="form-horizontal" role="form" action="g_pesanan_periode.php" method="POST" target="_blank">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Periode</label>
                                    <div class="col-sm-3">
                                      <div class='input-group date' id="datetimerangepicker1" >
                                            <input type='text' required class="form-control" data-date-format="YYYY-MM-DD"  name="tanggal_awal" />
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                      <div class='input-group date' id="datetimerangepicker2" >
                                            <input type='text' required class="form-control" data-date-format="YYYY-MM-DD" name="tanggal_akhir" />
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Lihat</button>
                                  </div>
                                  <hr class="dotted">

                            </form>
                          <!--
                          
                            <form class="form-horizontal" role="form" action="g_pesanan_bulan.php" method="POST" target="_blank">

                                  <div class="form-group">

                                    <label class="col-sm-2 control-label">Bulan</label>
                                    <div class="col-sm-7">
                                    
                                      <select class="form-control chosen-select col-sm-3" required name="bulan" data-placeholder="Pilih Bulan">
                                        
                                        <option></option>
                                        <?php 
                                      //  $qu=mysql_query("SELECT pesanan.tgl_transaksi FROM pesanan GROUP BY MONTH(tgl_transaksi),YEAR(tgl_transaksi)") or die(mysql_error());
                                      //  while($ro=mysql_fetch_array($qu)){ 
//
                                        //    $tg=DateToIndo($ro['tgl_transaksi']);
                                        //    $tg_=substr($tg,3);

                                        ?>

                                        <option value="<?php // echo substr($ro['tgl_transaksi'],0,7);?>"><?php //echo $tg_;?></option>
                                        
                                        <?php //} ?>

                                      </select>   

                                    </div>

                                    <button type="submit" class="btn btn-primary">Lihat</button>
                                  
                                  </div>
                                  <hr class="dotted">

                          </form>

                          <form class="form-horizontal" role="form" action="g_pesanan_tahun.php" method="POST" target="_blank">

                                  <div class="form-group">

                                    <label class="col-sm-2 control-label">Tahun</label>
                                     <div class="col-sm-7">
                                    
                                    <select class="form-control chosen-select col-sm-3" required name="tahun" data-placeholder="Pilih Tahun">
                                        
                                        <option></option>
                                        <?php 
                                      //  $qu=mysql_query("SELECT YEAR(tgl_transaksi) as tahun FROM pesanan GROUP BY YEAR(tgl_transaksi)") or die(mysql_error());
                                     //   while($ro=mysql_fetch_array($qu)){ 

                                        ?>

                                        <option value="<?php //echo $ro['tahun'];?>"><?php //echo DateToIndo($ro['tahun']);?></option>
                                        
                                        <?php //} ?>

                                      </select>   

                                    </div>
                                    <button type="submit" class="btn btn-primary">Lihat</button>
                                  
                                  </div>
                                  <hr class="dotted">

                          </form>
-->
                        </div>
                    </div>
                 </div>
            
            </div>