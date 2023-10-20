<?php 
include "../config/koneksi.php";
include "../config/ubah_tanggal.php";

switch($_GET['act']){
default:

?>
            <div class="page-header">
              <h1><img width="70px" src="assets/images/avtar/Dining.png" alt="...">Data Satuan</h1></div>
            
                <div class="panel panel-default">
                   
                   

                    <?php if($r['level']=='pimpinan'){ ?>
                        <div class="panel-body">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID Bahan</th>
                                    <th>Nama Bahan</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                    
                                    $no=1;

                                    $res=mysqli_query($conn,"SELECT * FROM bahan ORDER BY id_bahan ASC") or die(mysqli_error($conn));
                                    while($row=mysqli_fetch_array($res)){

                                     
                                ?>
                                <tr class="odd gradeX">
                                    <td align="center"><?php echo $no;?></td>
                                    <td align="center"><?php echo $row['id_bahan'];?></td>
                                    <td align="center"><?php echo $row['nama_bahan'];?></td>
                                </tr>
                                <?php $no++; } ?> <!-- Akhir While -->
                            </tbody>

                      <?php }else{ ?> <!-- Akhir IF-->
                            <div class="panel-heading"><a href="?modul=satuan&act=add" class="btn btn-primary">Tambah Data</a></div>
                            <div class="panel-body">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID Satuan</th>
                                    <th>Nama </th>
                                    
                                    <th>Aksi</th>
                                    </tr>
                            </thead>
                            <tbody>


                                <?php
                                    
                                    $no=1;

                                    $res=mysqli_query($conn,"SELECT * FROM satuan ORDER BY id_satuan ASC") or die(mysqli_error($conn));
                                    while($row=mysqli_fetch_array($res)){

                                     
                                ?>
                                <tr class="odd gradeX">
                                    <td align="center"><?php echo $no;?></td>
                                    <td align="center"><?php echo $row['id_satuan'];?></td>
                                    <td align="center"><?php echo $row['nama_satuan'];?></td>
                                    <td align="center"><a href="?modul=satuan&act=edit&id=<?php echo $row['id_satuan'];?>"> <i title="rubah" class="fa fa-edit"></i></a> | 
                                    <a href="modul/satuan/hapus.php?id=<?php echo $row['id_satuan'];?>"> <i title="hapus" class="fa fa-trash"></i></a> </td> 
                                   
                                   
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

  $queryPeriksa = mysqli_query($conn,"SELECT * FROM satuan");
  $di=1;
  $tot = array();
  while($row = mysqli_fetch_row($queryPeriksa)) {
    $tot[$di]=str_replace('SAT00','',$row[0]);
    $di++;
  }
  if(count($tot)==0){
    $akhir=1;
  }else{
    $akhir = max($tot);
    $akhir++;
  }
  $kode = "SAT00".$akhir;

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
        <div class="page-header"><h1>Data Satuan</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Input Data Satuan</div>
                        <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/satuan/simpan.php" method="POST">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">ID Satuan</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" readonly name="id_satuan" required value="<?php echo $kode;?>">
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Satuan</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyUp='validHuruf(this)'  title="Isikan Nama Satuan dengan Huruf" class="form-control form-control-flat" autofocus placeholder='Nama Satuan' maxlength="17" name="nama_satuan" value="" required>
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
                                    <button type="button" class="btn btn-danger" onclick=location.href='?modul=satuan'>Batal</button>
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

    $q=mysqli_query($conn,"SELECT * FROM satuan WHERE id_satuan='$id'") or die(mysqli_error($conn));
    $row=mysqli_fetch_array($q);

?>

        <div class="page-header"><h1>Data Satuan</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Ubah Data Satuan</div>
                        <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/satuan/ubah.php" method="POST">
                                  <input type="hidden" name="id_satuan" value="<?php echo $row['id_satuan'];?>">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">ID Satuan</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" name="id_satuan" value="<?php echo $row['id_satuan'];?>" disabled>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Satuan</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyup="validAngka(this)"  class="form-control form-control-flat" maxlength="17" name="nama_satuan"  value="<?php echo $row['nama_satuan'];?>" required>
                                    </div>
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
                                    <button type="button" class="btn btn-danger" onclick=location.href='?modul=satuan'>Batal</button>
                                  </div>
                                  </div>
                                                                    
                          </form>

                        </div>
                    </div>
                 </div>
            
            </div>

<?php } ?>