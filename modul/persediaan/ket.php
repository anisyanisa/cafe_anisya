<?php 
include "config/koneksi.php";
include "config/ubah_tanggal.php";
?> 

<div class="page-header"><h1>Data Pasien</h1></div>
            
                <div class="panel panel-default">
                    <div class="panel-heading">Tanggal check-in dan check-out pasien</div>
                    <div class="panel-body">
                    
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NO. RM</th>
                                    <th>Nama Pasien</th>
                                    <th>Tanggal Check-in</th>
                                    <th>Tanggal Check-Out</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                   

                                    $idpasien=$_GET['id'];
                               
                                    
                                    $no=1;

                                    $res=mysql_query("SELECT pasien.idpasien,pasien.namapasien,cek_in.tanggalmasuk,cek_out.tanggalcekout FROM pasien,cek_in,cek_out WHERE pasien.idpasien=cek_in.idpasien AND cek_out.nocekin=cek_in.nocekin AND pasien.idpasien='$idpasien'"  ) or die(mysql_error());
                                    while($row=mysql_fetch_array($res)){

                                       

                                ?>

                                <tr class="odd gradeX">
                                    <td align="center"><?php echo $no;?></td>
                                    <td align="center"><?php echo $row['idpasien'];?></td>
                                    <td align="center"><?php echo $row['namapasien']; ?></td>
                                    <td align="center"><?php echo ubahFormatZ($row['tanggalmasuk']); ?></td>
                                    <td align="center"><?php echo ubahFormatZ($row['tanggalcekout']); ?></td>
                                </tr>

                                <?php $no++; } ?>
                            
                            </tbody>

                        </table>

                    </div>

                </div>