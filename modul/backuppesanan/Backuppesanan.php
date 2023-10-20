<?php 
include "config/koneksi.php";
include "config/ubah_tanggal.php";

switch($_GET['act']){
	
	
	
default:


break;
    case "pesan":

?>




            <div class="page-header">
              <h1><img width="70px" src="assets/images/avtar/Dining.png" alt="...">Data Pemesanan</h1></div>
            
                <div class="panel panel-default">
                   
                   

                    <?php if($r['level']=='pimpinan'){ ?>
                        <div class="panel-body">
                       
                      <?php }else{ ?> <!-- Akhir IF-->
                            <div class="panel-heading"><a href="?modul=menu&act=add" class="btn btn-primary">Tambah Data</a></div>
                            <div class="panel-body">
                           


                                

                            <?php } ?> <!-- Akhir ELSE IF-->

                       

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
  $queryPeriksa = mysql_query("SELECT * FROM menu");
  $di=1;
  $tot = array();
  while($row = mysql_fetch_row($queryPeriksa)) {
    $tot[$di]=str_replace('MENU00','',$row[0]);
    $di++;
  }
  if(count($tot)==0){
    $akhir=1;
  }else{
    $akhir = max($tot);
    $akhir++;
  }
  $kode = "TRANS00".$akhir;

//$cariuser=mysql_query("select * from user");
$iduser=$_SESSION['iduser'];

        include "config/koneksi.php";
        $cariuser=mysql_query("SELECT * FROM user WHERE iduser='$iduser'") or die (mysql_error());  
        $rcariuser=mysql_fetch_array($q); 
		
		$d=mysql_query("select * from kasir where nama_kasir='$rcariuser[namauser]'")or die (mysql_error());
		$rd=mysql_fetch_array($d);
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
                          
                            <form class="form-horizontal" role="form" action="modul/pesanan/simpan.php" method="POST">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">No Transaksi</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat"   name="no_transaksi" required value="<?php echo $kode;?>">
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <?php $tgl=date('d-m-Y'); ?>
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal Transaksi</label>
                                    <div class="col-sm-2">
                                      
                                            <input type='text' class="form-control form-control-flat" required class="form-control" data-date-format="DD-MM-YYYY"  name="tgl_transaksi" value=<?php echo $tgl;?>/>
                                            
                                      
                                    </div>
                                  </div>  
                                  <hr class="dotted">
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">ID Kasir</label>
                                    
                                     <div class="col-sm-7">
                                            <input type='text' class="form-control form-control-flat" required class="form-control" name="kd_kasir" value="<?php echo $rcariuser['namauser'];?>" />
                                                                               
                                    </div>
                                  </div>  
                                  <hr class="dotted">
                                  
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nomor Meja</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyUp='validHuruf(this)' class="form-control form-control-flat" readonly placeholder='No Meja' maxlength="30" name="no_meja" value="<?php echo $no; ?>" required>
                                      <!--onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)
                                      
                                      onkeyup='return isNumberKey(event)'-->
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  
                                  
                                  
                                  
                                  
                                 
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Pesanan Makanan</label>
                                    <div class="col-sm-7" style="overflow:auto; height:300px">
                                    
                                      
                                        <?php 
                                        $n=1;
                                        $qu=mysql_query("SELECT menu.id_menu,menu.nama_menu,menu.harga,kategori.id_kategori,kategori.nama_kategori,menukategori.id_menu,menukategori.id_kategori FROM menu,menukategori,kategori WHERE menu.id_menu=menukategori.id_menu AND kategori.id_kategori=menukategori.id_kategori AND kategori.nama_kategori like '%Makanan%'") or die(mysql_error());
                                        while($ro=mysql_fetch_array($qu)){ 
                                          
                                        ?>

                                        <input type="checkbox" name="id_menu[<?php echo $n; ?>]" value="<?php echo $ro['id_menu'];?>"> <?php echo $ro['nama_menu']; ?> - <?php echo $ro['harga']; ?>
                                        <input type="text" onkeyup="validAngka(this)" name="jumlah[<?php echo $n; ?>]" class="jlh"  placeholder="jumlah"><br/><hr>

                                        <?php $n++; } ?>

                                                                          
                                    </div>
                                  </div>
                                  <hr class="dotted"> 


<div class="form-group">
                                    <label class="col-sm-2 control-label">Mulai Ruangan VIP</label><button type="submit" class="btn btn-primary">Simpan</button>
                                    
                                  </div>
                                  <hr class="dotted"> 
                                  
						
								
                                                              
                                
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

    $q=mysql_query("SELECT menu.id_menu,menu.nama_menu,menu.harga,kategori.id_kategori,kategori.nama_kategori,menukategori.id_menu,menukategori.id_kategori FROM menu,menukategori,kategori WHERE menu.id_menu=menukategori.id_menu AND kategori.id_kategori=menukategori.id_kategori AND menukategori.id_menu='$id'") or die(mysql_error());
    $row=mysql_fetch_array($q);

?>

        <div class="page-header"><h1>Data Pesanan</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Ubah Data Pesanan</div>
                       <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/pesanan/simpan.php" method="POST">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">No Transaksi</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat"   name="no_transaksi" required value="<?php echo $kode;?>">
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <?php $tgl=date('d-m-Y'); ?>
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal Transaksi</label>
                                    <div class="col-sm-2">
                                      
                                            <input type='text' class="form-control form-control-flat" required class="form-control" data-date-format="DD-MM-YYYY"  name="tgl_transaksi" value=<?php echo $tgl;?>/>
                                            
                                      
                                    </div>
                                  </div>  
                                  <hr class="dotted">
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">ID Kasir</label>
                                    
                                     <div class="col-sm-7">
                                            <input type='text' class="form-control form-control-flat" required class="form-control" name="kd_kasir" value="<?php echo $rcariuser['namauser'];?>" />
                                                                               
                                    </div>
                                  </div>  
                                  <hr class="dotted">
                                  
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nomor Meja</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyUp='validHuruf(this)' class="form-control form-control-flat" readonly placeholder='No Meja' maxlength="30" name="no_meja" value="<?php echo $no; ?>" required>
                                      <!--onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)
                                      
                                      onkeyup='return isNumberKey(event)'-->
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  
                                  
                                  
                                  
                                  
                                 
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Pesanan Makanan</label>
                                    <div class="col-sm-7" style="overflow:auto; height:300px">
                                    
                                      
                                        <?php 
                                        $n=1;
                                        $qu=mysql_query("SELECT menu.id_menu,menu.nama_menu,menu.harga,kategori.id_kategori,kategori.nama_kategori,menukategori.id_menu,menukategori.id_kategori FROM menu,menukategori,kategori WHERE menu.id_menu=menukategori.id_menu AND kategori.id_kategori=menukategori.id_kategori AND kategori.nama_kategori like '%Makanan%'") or die(mysql_error());
                                        while($ro=mysql_fetch_array($qu)){ 
                                          
                                        ?>

                                        <input type="checkbox" name="id_menu[<?php echo $n; ?>]" value="<?php echo $ro['id_menu'];?>"> <?php echo $ro['nama_menu']; ?> - <?php echo $ro['harga']; ?>
                                        <input type="text" onkeyup="validAngka(this)" name="jumlah[<?php echo $n; ?>]" class="jlh"  placeholder="jumlah"><br/><hr>

                                        <?php $n++; } ?>

                                                                          
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

<?php } ?>