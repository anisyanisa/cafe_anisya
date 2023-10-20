<?php 
include "config/koneksi.php";
include "config/ubah_tanggal.php";

switch($_GET['act']){
default:

?>
            <div class="page-header">
              <h1><img width="70px" src="assets/images/avtar/Dining.png" alt="...">Data Menu</h1></div>
            
                <div class="panel panel-default">
                   
                   

                    <?php if($r['level']=='pimpinan'){ ?>
                        <div class="panel-body">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID Menu</th>
                                    <th>Nama Menu</th>
                                    <th>Harga</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                    
                                    $no=1;

                                    $res=mysqli_query($conn,"SELECT menu.id_menu,menu.nama_menu,menu.harga,kategori.id_kategori,kategori.nama_kategori,menukategori.id_menu,menukategori.id_kategori FROM menu,menukategori,kategori WHERE menu.id_menu=menukategori.id_menu AND kategori.id_kategori=menukategori.id_kategori") or die(mysqli_error($conn));
                                    while($row=mysqli_fetch_array($res)){

                                     
                                ?>
                                <tr class="odd gradeX">
                                    <td align="center"><?php echo $no;?></td>
                                    <td align="center"><?php echo $row['id_menu'];?></td>
                                    <td align="center"><?php echo $row['nama_menu'];?></td>
                                    <td align="center">Rp. <?php echo number_format($row['harga'],0,'','.');?></td>
                                    <td align="center"><?php echo $row['nama_kategori'];?></td>
                                </tr>
                                <?php $no++; } ?> <!-- Akhir While -->
                            </tbody>

                      <?php }else{ ?> <!-- Akhir IF-->
                            <div class="panel-heading"><a href="?modul=menu&act=add" class="btn btn-primary">Tambah Data</a></div>
                            <div class="panel-body">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID Menu</th>
                                    <th>Nama Menu</th>
                                    <th>Modal</th>
                                    <th>Harga Jual</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                    </tr>
                            </thead>
                            <tbody>


                                <?php
                                    
                                    $no=1;

                                    $res=mysqli_query($conn,"SELECT menu.id_menu,menu.modal,menu.nama_menu,menu.harga,kategori.id_kategori,kategori.nama_kategori,menukategori.id_menu,menukategori.id_kategori FROM menu,menukategori,kategori WHERE menu.id_menu=menukategori.id_menu AND kategori.id_kategori=menukategori.id_kategori") or die(mysqli_error($conn));
                                    while($row=mysqli_fetch_array($res)){

                                     
                                ?>
                                <tr class="odd gradeX">
                                    <td align="center"><?php echo $no;?></td>
                                    <td align="center"><?php echo $row['id_menu'];?></td>
                                    <td align="center"><?php echo $row['nama_menu'];?></td>
                                    <td align="center">Rp. <?php echo number_format($row['modal'],0,'','.');?></td>
                                    <td align="center">Rp. <?php echo number_format($row['harga'],0,'','.');?></td>
                                    <td align="center"><?php echo $row['nama_kategori'];?></td>
                                    <td align="center"><a href="?modul=menu&act=edit&id=<?php echo $row['id_menu'];?>"> <i title="rubah" class="fa fa-edit"></i></a> | 
                                    <a href="modul/menu/hapus.php?id=<?php echo $row['id_menu'];?>&&idk=<?php echo $row[id_kategori]; ?>"> <i title="hapus" class="fa fa-trash"></i></a> </td> 
                                   
                                   
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
*/
  $queryPeriksa = mysqli_query($conn,"SELECT * FROM menu");
  $di=1;
  $tot = array();
  while($row = mysqli_fetch_row($queryPeriksa)) {
    $tot[$di]=str_replace('MENU00','',$row[0]);
    $di++;
  }
  if(count($tot)==0){
    $akhir=1;
  }else{
    $akhir = max($tot);
    $akhir++;
  }
  $kode = "MENU00".$akhir;

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
        <div class="page-header"><h1>Data Menu</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Input Data Menu</div>
                        <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/menu/simpan.php" method="POST">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">ID Menu</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" readonly  name="id_menu" required value="<?php echo $kode;?>">
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Menu</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyUp=''   autofocus class="form-control form-control-flat" title="Isikan Nama Menu - Tidak Boleh Menggunakan karakter selain huruf" placeholder='Nama Menu' maxlength="30" name="nama_menu" value="" required>
                                      <!--onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)
                                      
                                      onkeyup='return isNumberKey(event)'-->
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  
                                  
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Kategori</label>
                                    <div class="col-sm-7">
                                    
                                      <select class="form-control chosen-select" name="id_kategori" required data-placeholder="Pilih Kategori">
                                        
                                        <option></option>
                                        <?php 
                                        $qu=mysql_query("SELECT * FROM kategori ORDER BY id_kategori ASC ") or die(mysql_error());
                                        while($ro=mysql_fetch_array($qu)){ 
                                        ?>

                                        <option value="<?php echo $ro['id_kategori'];?>"><?php echo $ro['id_kategori'];?> - <?php echo $ro['nama_kategori'];?></option>
                                        
                                        <?php } ?>

                                      </select>                                    
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Modal</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" onkeyUp='validAngka(this)' placeholder='Modal' name="modal" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Harga</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" onkeyUp='validAngka(this)' placeholder='Harga Menu' name="harga" required>
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
                                    <button type="button" class="btn btn-danger" onclick=location.href='?modul=menu'>Batal</button>
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

    $q=mysql_query("SELECT menu.id_menu,menu.nama_menu,menu.modal,menu.harga,kategori.id_kategori,kategori.nama_kategori,menukategori.id_menu,menukategori.id_kategori FROM menu,menukategori,kategori WHERE menu.id_menu=menukategori.id_menu AND kategori.id_kategori=menukategori.id_kategori AND menukategori.id_menu='$id'") or die(mysql_error());
    $row=mysql_fetch_array($q);

?>

        <div class="page-header"><h1>Data Menu</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Ubah Data Menu</div>
                        <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/menu/ubah.php" method="POST">
                                  <input type="hidden" name="id_menu" value="<?php echo $row['id_menu'];?>">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">ID Menu</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" name="id_menu" value="<?php echo $row['id_menu'];?>" disabled>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Menu</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyup="validHuruf(this)"  class="form-control form-control-flat" maxlength="30" name="nama_menu"  value="<?php echo $row['nama_menu'];?>" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                   <div class="form-group">
                                    <label class="col-sm-2 control-label">Kategori</label>
                                    <div class="col-sm-7">
                                    
                                      <select class="form-control chosen-select" name="id_kategori" data-placeholder="Pilih Kategori">
                                        
                                        <option></option>
                                        <?php 
                                        $que=mysqli_query($conn,"SELECT id_kategori,nama_kategori FROM kategori") or die(mysqli_error($conn));
                                        while($rows=mysqli_fetch_array($que)){ 
                                          if($row['id_kategori']==$rows['id_kategori']){
                                        ?>

                                        <option value="<?php echo $rows['id_kategori'];?>" selected><?php echo $rows['id_kategori'];?> - <?php echo $rows['nama_kategori'];?></option>
                                        
                                        <?php }else{ ?>

                                        <option value="<?php  echo $rows['id_kategori'];?>"><?php echo $rows['id_kategori'];?> - <?php echo $rows['nama_kategori'];?></option>
                                        
                                        <?php } } ?>

                                      </select>                                    
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Modal</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" onkeyUp='validAngka(this)' placeholder='Modal' name="modal" value="<?php echo $row['modal'];?>"required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

									<div class="form-group">
                                    <label class="col-sm-2 control-label">Harga</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" onkeyUp='validAngka(this)' placeholder='Harga Menu' name="harga" value="<?php echo $row['harga'];?>"required>
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
                                    <button type="button" class="btn btn-danger" onclick=location.href='?modul=menu'>Batal</button>
                                  </div>
                                  </div>
                                                                    
                          </form>

                        </div>
                    </div>
                 </div>
            
            </div>

<?php } ?>