<?php 
include "config/koneksi.php";
include "config/ubah_tanggal.php";

switch($_GET['act']){
default:

?>
            <div class="page-header">
              <h1><img width="70px" src="assets/images/avtar/Dining.png" alt="...">Data Meja</h1></div>
            
                <div class="panel panel-default">
                   
                   

                    <?php if($r['level']=='pimpinan'){ ?>
                        <div class="panel-body">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No Meja</th>
                                    <th>Kapasitas</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                    
                                    $no=1;

                                    $res=mysql_query("SELECT * FROM meja ORDER BY no_meja ASC") or die(mysql_error());
                                    while($row=mysql_fetch_array($res)){

                                     
                                ?>
                                <tr class="odd gradeX">
                                    <td align="center"><?php echo $no;?></td>
                                    <td align="center"><?php echo $row['no_meja'];?></td>
                                    <td align="center"><?php echo $row['kapasitas'];?></td>
                                    <td align="center"><?php echo $row['status'];?></td>
                                </tr>
                                <?php $no++; } ?> <!-- Akhir While -->
                            </tbody>

                      <?php }else{ ?> <!-- Akhir IF-->
                            <div class="panel-heading"><a href="?modul=meja&act=add" class="btn btn-primary">Tambah Data</a></div>
                            <div class="panel-body">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No Meja</th>
                                    <th>Kapasitas</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                    </tr>
                            </thead>
                            <tbody>


                                <?php
                                    
                                    $no=1;

                                    $res=mysql_query("SELECT * FROM meja ORDER BY no_meja ASC") or die(mysql_error());
                                    while($row=mysql_fetch_array($res)){

                                     
                                ?>
                                <tr class="odd gradeX">
                                    <td align="center"><?php echo $no;?></td>
                                    <td align="center"><?php echo $row['no_meja'];?></td>
                                    <td align="center"><?php echo $row['kapasitas'];?></td>
                                    <td align="center"><?php echo $row['ket'];?></td>
                                    <td align="center"><?php echo $row['status'];?></td>
                                    <td align="center"><a href="?modul=meja&act=edit&id=<?php echo $row['no_meja'];?>"> <i title="rubah" class="fa fa-edit"></i></a> | 
                                    <a href="modul/meja/hapus.php?id=<?php echo $row['no_meja'];?>"> <i title="hapus" class="fa fa-trash"></i></a> </td> 
                                   
                                   
                                </tr>
                                <?php $no++; } ?> <!-- Akhir While-->
                            </tbody>

                            <?php } ?> <!-- Akhir ELSE IF-->

                        </table>

                    </div>
                </div>
<?php 

    break;
    case "add":
/*	function ketemu()
	{
	$a=mysql_query("select no_meja from meja");
	$ra=mysql_fetch_array($a);
	
	if($ra==$_POST[no_meja])
	{
		
	}
	}

  $queryPeriksa = mysql_query("SELECT * FROM meja");
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
  $kode = "BHN00".$akhir;
*/
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
        <div class="page-header"><h1>Data Meja</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Input Data Meja</div>
                        <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/meja/simpan.php" method="POST">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">No Meja</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" onkeyUp='validAngka(this)' title="Isikan No Meja dengan 2 digit angka" autofocus placeholder='No Meja' name="no_meja" required value="">
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Kapasitas</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyUp='validAngka(this)'  title="Isikan Kapasitas dengan Angka" class="form-control form-control-flat"  placeholder='Kapasitas Meja' maxlength="17" name="kapasitas" value="" required>
                                      <!--onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)
                                      
                                      onkeyup='return isNumberKey(event)'-->
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                   <div class="form-group">
                                    <label class="col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-7">
                                        <select class="form-control chosen-select" name="keterangan" required data-placeholder="Pilih Keterangan">
                                        
                                        <option></option>
                                       

                                        <option value="VIP Room">VIP Room </option>
                                        <option value="Reguler">Reguler </option>
                                      

                                      </select>   
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-7">
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-3" name="status" type="radio" checked="" value="Tersedia">
                                            Tersedia
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-7" name="status" type="radio" value="Tidak Tersedia">
                                            Tidak Tersedia
                                        </div>
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
                                    <button type="button" class="btn btn-danger" onclick=location.href='?modul=meja'>Batal</button>
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

    $q=mysql_query("SELECT * FROM meja WHERE no_meja='$id'") or die(mysql_error());
    $row=mysql_fetch_array($q);

?>

        <div class="page-header"><h1>Data Meja</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Ubah Data Meja</div>
                        <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/meja/ubah.php" method="POST">
                                  <input type="hidden" name="no_meja" value="<?php echo $row['no_meja'];?>">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">No Meja</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" name="no_meja" value="<?php echo $row['no_meja'];?>" disabled>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Kapasitas</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyup="validAngka(this)"  class="form-control form-control-flat" maxlength="17" name="kapasitas"  value="<?php echo $row['kapasitas'];?>" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-7">
                                        <select class="form-control chosen-select" name="keterangan" required data-placeholder="Pilih Keterangan">
                                        
                                        <option></option>
                                      <?php 
                                        $que=mysql_query("SELECT * FROM meja") or die(mysql_error());
                                        while($rows=mysql_fetch_array($que)){ 
                                          if($row['ket']==$rows['ket']){
                                        ?>

                                        <option value="<?php echo $rows['ket'];?>" selected><?php echo $rows['ket'];?></option>
                                        
                                        <?php }else{ ?>

                                        <option value="<?php  echo $rows['ket'];?>"><?php echo $rows['ket'];?></option>
                                        
                                        <?php } } ?>

                                      </select>   
                                    </div>
                                  </div>
                                  <hr class="dotted">


						<div class="form-group">
                                    <label class="col-sm-2 control-label">Status</label>
                                    <?php if($row['status']=='Tersedia'){ ?>
                                    <div class="col-sm-7">
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-3" name="status" type="radio" checked="" value="Tersedia">
                                            Tersedia
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-7" name="status" type="radio" value="Tidak Tersedia">
                                            Tidak Tersedia
                                        </div>
                                    </div>
                                    <?php }else{ ?>
                                    <div class="col-sm-7">
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-3" name="status" type="radio"  value="Tersedia">
                                            Tersedia
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-7" name="status" type="radio" checked="" value="Tidak Tersedia">
                                            Tidak Tersedia
                                        </div>
                                    </div>
                                    <?php } ?>
                                  </div>
                                  
                                  <hr class="dotted">
                                
                                  
                                 

                                 

<!--
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Pekerjaan</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" name="pekerjaan" required value="<?php //echo $row['pekerjaan'];?>">
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  -->

                                  <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-7">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-danger" onclick=location.href='?modul=meja'>Batal</button>
                                  </div>
                                  </div>
                                                                    
                          </form>

                        </div>
                    </div>
                 </div>
            
            </div>

<?php } ?>