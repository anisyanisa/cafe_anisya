<?php 
include "../config/koneksi.php";
include "../config/ubah_tanggal.php";

switch($_GET['act']){
default:

?>
            <div class="page-header">
              <h1><img width="70px" src="assets/images/avtar/Dining.png" alt="...">Beli Bahan</h1></div>
            
                <div class="panel panel-default">
                   
                   

                    
                      
                            <div class="panel-heading"><a href="?modul=belibahan&act=add" class="btn btn-primary">Tambah Data</a></div>
                            <div class="panel-body">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal </th>
                                    <th>ID Bahan </th>
                                    <th>Nama Bahan </th>
                                    <th>QTY </th>
                                    <th>Satuan </th>
                                    <th>Harga Beli </th>
                                    <th>Aksi</th>
                                    </tr>
                            </thead>
                            <tbody>


                                <?php
                                    
                                    $no=1;

                                    $res=mysql_query("SELECT * FROM belibahan ORDER BY tgl_transaksi ASC") or die(mysql_error());
                                    while($row=mysql_fetch_array($res)){

                                     $q1=mysql_query("select * from bahan where id_bahan='$row[id_bahan]'");
									 $r1=mysql_fetch_array($q1);
                                ?>
                                <tr class="odd gradeX">
                                    <td align="center"><?php echo $no;?></td>
                                    <td align="center"><?php echo $row['tgl_transaksi'];?></td>
                                    <td align="center"><?php echo $row['id_bahan'];?></td>
                                    <td align="center"><?php echo $r1['nama_bahan'];?></td>
                                    <td align="center"><?php echo $row['qty'];?></td>
                                    <td align="center"><?php echo $row['id_satuan'];?></td>
                                    <td align="center"><?php echo $row['harga_beli'];?></td>
                                    <td align="center"><a href="?modul=belibahan&act=edit&tgl=<?php echo $row['tgl_transaksi'];?>&id=<?php echo $row['id_bahan'];?>"> <i title="rubah" class="fa fa-edit"></i></a> | 
                                    <a href="modul/belibahan/hapus.php?tgl=<?php echo $row['tgl_transaksi'];?>&id=<?php echo $row['id_bahan'];?>"> <i title="hapus" class="fa fa-trash"></i></a> </td> 
                                   
                                   
                                </tr>
                                <?php $no++; } ?> <!-- Akhir While-->
                            </tbody>

                            <?php ?> <!-- Akhir ELSE IF-->

                        </table>

                    </div>
                </div>
<?php 

    break;
    case "add":

  $queryPeriksa = mysql_query("SELECT * FROM belibahan");
  $di=1;
  $tot = array();
  while($row = mysql_fetch_row($queryPeriksa)) {
    $tot[$di]=str_replace('KTGR00','',$row[0]);
    $di++;
  }
  if(count($tot)==0){
    $akhir=1;
  }else{
    $akhir = max($tot);
    $akhir++;
  }
  $kode = "BLBHN00".$akhir;

?>
<script language='javascript'>
function validAngka(a)
{
  if(!/^[0-9.]+$/.test(a.value))
  {
  a.value = a.value.substring(0,a.value.length-1000);
  }
}
function validHuruf(b)
{
  if(!/^[a-zA-Z ]+(([\'\,\.\-\ ][a-zA-Z ])?[a-zA-Z]*)*$/.test(b.value))
  {
  b.value = b.value.substring(0,b.value.length-1000);
  }
}
 //var namaValid    = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if ((charCode < 65) || (charCode == 32))
            return false;        
         return true;
      }
</script>
        <div class="page-header"><h1>Data Bahan</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Input Pembelian Bahan</div>
                        <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/belibahan/simpan.php" method="POST">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal</label>
                                    <div class="col-sm-3">
                                      <div class='input-group date' id="datetimerangepicker1" >
                                            <input type='text' required class="form-control" data-date-format="YYYY-MM-DD"  name="tgl_transaksi" />
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                   </div>
                                  <hr class="dotted">
                                  
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">ID bahan</label>
                                    <div class="col-sm-7">
                                      <select class="form-control chosen-select" name="id_bahan" required data-placeholder="Pilih Bahan">
                                        
                                        <option></option>
                                        <?php 
                                        $qu=mysql_query("SELECT * FROM bahan ORDER BY id_bahan ASC ") or die(mysql_error());
                                        while($ro=mysql_fetch_array($qu)){ 
                                        ?>

                                        <option value="<?php echo $ro['id_bahan'];?>"><?php echo $ro['id_bahan'];?> - <?php echo $ro['nama_bahan'];?></option>
                                        
                                        <?php } ?>

                                      </select> 
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Qty</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyUp='validAngka(this)'  title="Isikan Jumlah Beli dengan Angka" class="form-control form-control-flat" autofocus placeholder='Jumlah Beli' maxlength="17" name="qty" value="" required>
                                      <!--onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)
                                      
                                      onkeyup='return isNumberKey(event)'-->
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  
                                   <div class="form-group">
                                    <label class="col-sm-2 control-label">Satuan</label>
                                    <div class="col-sm-7">
                                      <select class="form-control chosen-select" name="id_satuan" required data-placeholder="Pilih Satuan">
                                        
                                        <option></option>
                                        <?php 
                                        $qu=mysql_query("SELECT * FROM satuan ORDER BY id_satuan ASC ") or die(mysql_error());
                                        while($ro=mysql_fetch_array($qu)){ 
                                        ?>

                                        <option value="<?php echo $ro['id_satuan'];?>"><?php echo $ro['id_satuan'];?> - <?php echo $ro['nama_satuan'];?></option>
                                        
                                        <?php } ?>

                                      </select> 
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
									 <div class="form-group">
                                    <label class="col-sm-2 control-label">Harga Beli</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyUp='validAngka(this)'  title="Isikan Harga Beli dengan Angka" class="form-control form-control-flat" autofocus placeholder='Harga Beli' maxlength="17" name="harga_beli" value="" required>
                                      <!--onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)
                                      
                                      onkeyup='return isNumberKey(event)'-->
                                    </div>
                                  </div>
                                  <hr class="dotted">

									


                                  


                                 

                                 


									
							
                                
                                
                                  <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-7">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-danger" onclick=location.href='?modul=belibahan'>Batal</button>
                                  </div>
                                  </div>

                            </form>

                        </div>
                    </div>
                 </div>
            
            </div>

<?php 

    break;
    case "edit":

    $id=$_GET['id'];
	$tgl=$_GET['tgl'];

    $q=mysql_query("SELECT * FROM belibahan WHERE tgl_transaksi='$tgl' AND id_bahan='$id'") or die(mysql_error());
    $row=mysql_fetch_array($q);

?>

        <div class="page-header"><h1>Data Pembelian Bahan</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Ubah Data</div>
                        <div class="panel-body">
                           <form class="form-horizontal" role="form" action="modul/belibahan/ubah.php" method="POST">
                             <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal</label>
                                    <div class="col-sm-3">
                                      <div class='input-group date' id="datetimerangepicker1" >
                                            <input type='text' required class="form-control" data-date-format="YYYY-MM-DD"  name="tgl_transaksi" value="<?php echo $row['tgl_transaksi'];?>"/>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                   </div>
                                  <hr class="dotted">
                                  
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">ID bahan</label>
                                    <div class="col-sm-7">
                                      <select class="form-control chosen-select" name="id_bahan" data-placeholder="Pilih Bahan">
                                        
                                        <option></option>
                                        <?php 
                                        $que=mysql_query("SELECT id_bahan,nama_bahan FROM bahan") or die(mysql_error());
                                        while($rows=mysql_fetch_array($que)){ 
                                          if($row['id_bahan']==$rows['id_bahan']){
                                        ?>

                                        <option value="<?php echo $rows['id_bahan'];?>" selected><?php echo $rows['id_bahan'];?> - <?php echo $rows['nama_bahan'];?></option>
                                        
                                        <?php }else{ ?>

                                        <option value="<?php  echo $rows['id_bahan'];?>"><?php echo $rows['id_bahan'];?> - <?php echo $rows['nama_bahan'];?></option>
                                        
                                        <?php } } ?>

                                      </select>   
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Qty</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyUp='validAngka(this)'  title="Isikan Jumlah Beli dengan Angka" class="form-control form-control-flat" autofocus placeholder='Jumlah Beli' maxlength="17" name="qty" value="<?php echo $row['qty'];?>" required>
                                      
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  
                                   <div class="form-group">
                                    <label class="col-sm-2 control-label">Satuan</label>
                                    <div class="col-sm-7">
                                     <select class="form-control chosen-select" name="id_satuan" data-placeholder="Pilih Bahan">
                                        
                                        <option></option>
                                        <?php 
                                        $que=mysql_query("SELECT id_satuan,nama_satuan FROM satuan") or die(mysql_error());
                                        while($rows=mysql_fetch_array($que)){ 
                                          if($row['id_satuan']==$rows['id_satuan']){
                                        ?>

                                        <option value="<?php echo $rows['id_satuan'];?>" selected><?php echo $rows['id_satuan'];?> - <?php echo $rows['nama_satuan'];?></option>
                                        
                                        <?php }else{ ?>

                                        <option value="<?php  echo $rows['id_satuan'];?>"><?php echo $rows['id_satuan'];?> - <?php echo $rows['nama_satuan'];?></option>
                                        
                                        <?php } } ?>

                                      </select>
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
									 <div class="form-group">
                                    <label class="col-sm-2 control-label">Harga Beli</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyUp='validAngka(this)'  title="Isikan Harga Beli dengan Angka" class="form-control form-control-flat" autofocus placeholder='Harga Beli' maxlength="17" name="harga_beli" value="<?php echo $row['harga_beli'];?>" required>
                                      <!--onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)
                                      
                                      onkeyup='return isNumberKey(event)'-->
                                    </div>
                                  </div>
                                  <hr class="dotted">

									


                                  


                                 

                                 


									
								
                                
                                <!--
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Pekerjaan</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" placeholder='Pekerjaan Pasien' name="pekerjaan" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">
								-->
                                
                                
                                  <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-7">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-danger" onclick=location.href='?modul=belibahan'>Batal</button>
                                  </div>
                                  </div>
</form>
                        </div>
                    </div>
                 </div>
            
            </div>

<?php } ?>