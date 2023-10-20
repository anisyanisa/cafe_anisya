<?php 
include "../config/koneksi.php";
include "../config/ubah_tanggal.php";

switch($_GET['act']){
default:

?>
            <div class="page-header">
              <h1><img width="70px" src="assets/images/avtar/Dining.png" alt="...">Data Bahan</h1></div>
            
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
                            <div class="panel-heading"><a href="?modul=bahan&act=add" class="btn btn-primary">Tambah Data</a></div>
                            <div class="panel-body">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID Bahan</th>
                                    <th>Nama </th>
                                    
                                    <th>Aksi</th>
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
                                    <td align="center"><a href="?modul=bahan&act=edit&id=<?php echo $row['id_bahan'];?>"> <i title="rubah" class="fa fa-edit"></i></a> | 
                                    <a href="modul/bahan/hapus.php?id=<?php echo $row['id_bahan'];?>"> <i title="hapus" class="fa fa-trash"></i></a> </td> 
                                   
                                   
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

  $queryPeriksa = mysqli_query($conn,"SELECT * FROM bahan");
  $di=1;
  $tot = array();
  while($row = mysqli_fetch_row($queryPeriksa)) {
    $tot[$di]=str_replace('BHN00','',$row[0]);
    $di++;
  }
  if(count($tot)==0){
    $akhir=1;
  }else{
    $akhir = max($tot);
    $akhir++;
  }
  $kode = "BHN00".$akhir;

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
                        <div class="panel-heading">Input Data Bahan</div>
                        <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/bahan/simpan.php" method="POST">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">ID bahan</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" readonly name="id_bahan" required value="<?php echo $kode;?>">
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Bahan</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyUp='validHuruf(this)'  title="Isikan Nama Bahan dengan Huruf" class="form-control form-control-flat" autofocus placeholder='Nama Bahan' maxlength="17" name="nama_bahan" value="" required>
                                      <!--onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)
                                      
                                      onkeyup='return isNumberKey(event)'-->
                                    </div>
                                  </div>
                                  <hr class="dotted">
<!--
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Satuan</label>
                                    <div class="col-sm-7">
                                       <select class="form-control chosen-select" name="satuan" required data-placeholder="Pilih Satuan">
                                        
                                         <option value=""></option> <option value="Buah">Buah</option>
                                         <option value="Botol">Botol</option>
                                         <option value="Bungkus">Bungkus</option>
                                         <option value="KG">KG</option>
                                         <option value="Butir">Butir</option>
                                         <option value="Kotak">Kotak</option>
                                        

                                      </select> 
                                      <!--onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)
                                      
                                      onkeyup='return isNumberKey(event)'
                                    </div>
                                  </div>
                                  <hr class="dotted"> -->
                                  
                                  

									


                                  


                                 

                                 


									
								
                                
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
                                    <button type="button" class="btn btn-danger" onclick=location.href='?modul=bahan'>Batal</button>
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

    $q=mysqli_query($conn,"SELECT * FROM bahan WHERE id_bahan='$id'") or die(mysqli_error($conn));
    $row=mysqli_fetch_array($q);

?>

        <div class="page-header"><h1>Data Bahan</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Ubah Data Bahan</div>
                        <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/bahan/ubah.php" method="POST">
                                  <input type="hidden" name="id_bahan" value="<?php echo $row['id_bahan'];?>">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">ID Bahan</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" name="id_bahan" value="<?php echo $row['id_bahan'];?>" disabled>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Bahan</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyup="validAngka(this)"  class="form-control form-control-flat" maxlength="17" name="nama_bahan"  value="<?php echo $row['nama_bahan'];?>" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">
<!--
                                 <select class="form-control chosen-select" name="satuan" required data-placeholder="Pilih Satuan">
                                        
                                         <option value=""></option> <option value="Buah">Buah</option>
                                         <option value="Botol">Botol</option>
                                         <option value="Bungkus">Bungkus</option>
                                         <option value="KG">KG</option>
                                         <option value="Butir">Butir</option>
                                         <option value="Kotak">Kotak</option>
                                        

                                      </select> 
                                  <select class="form-control chosen-select" name="satuan" required data-placeholder="Pilih Satuan">
                                        
                                        <option></option>
                                        <?php 
                                        /*$qu=mysql_query("SELECT * FROM bahan ORDER BY id_bahan ASC ") or die(mysql_error());
                                        while($ro=mysql_fetch_array($qu)){ 
                                        ?>

                                        <option value="<?php echo $ro['id_kategori'];?>"><?php echo $ro['id_kategori'];?> - <?php echo $ro['nama_kategori'];?></option>
                                        
                                        <?php } */?>

                                      </select> 
                                 

                                 
-->
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
                                    <button type="button" class="btn btn-danger" onclick=location.href='?modul=bahan'>Batal</button>
                                  </div>
                                  </div>
                                                                    
                          </form>

                        </div>
                    </div>
                 </div>
            
            </div>

<?php } ?>