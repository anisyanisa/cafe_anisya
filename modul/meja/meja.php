<?php 
include "config/koneksi.php";
include "config/ubah_tanggal.php";

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

</script>
<?php

switch($_GET['act']){
	
	
	
default:


?>
 <div class="page-header"><h1>Nomor Meja </h1></div>
 
 <div class="panel panel-default">

			 <div class="panel-heading">Nomor Meja (klik Logo Meja)</div>
			 <div class="panel-body">
            <!-- <form class="form-horizontal" role="form" action="modul/pesanan/Backuppesanan.php" method="POST">-->
             <form class="form-horizontal" role="form" action="?modul=pesan" method="POST">
                              <div class="form-group">
                             
                                    <div class="col-sm-7" style="overflow:auto; height:100px">
                                    
                                      
                                        <?php 
                                        $n=1;
                                        $qu=mysqli_query($conn,"SELECT * FROM meja where ket='VIP Room'") or die(mysqli_error($conn));
                                        while($ro=mysqli_fetch_array($qu)){ 
                                          
                                        ?>

                                        <th align="center"><td><a href="?modul=viewmeja&act=pesan&no=<?php echo $ro['no_meja']; ?>"><img src="assets/images/avtar/vip.png" class="img-circle" alt="..." width="50" /><br>Meja<?php echo $ro['no_meja'];?> </a></td>
                                        <td>|  Status : <?php echo $ro['status'];?> | 
                                        <form class="form-horizontal" role="form" action="modul/pesanan/Backuppesanan.php" method="POST">
                                        <!--<button type="submit" class="btn btn-primary">Mulai</button>-->
                                        </form></td>
                                        </th><br/><hr>

                                        <?php $n++; } ?>

                                                                          
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                   <div class="col-sm-7" style="overflow:auto; height:300px">
                                    
                                      
                                        <?php 
                                        $n=1;
                                        $qu=mysqli_query($conn,"SELECT * FROM meja where ket='Reguler'") or die(mysqli_error($conn));
                                        while($ro=mysqli_fetch_array($qu)){ 
                                          
                                        ?>

                                        <th align="center"><td><a href="?modul=viewmeja&act=pesan&no=<?php echo $ro['no_meja']; ?>"><img src="assets/images/avtar/Dining.png" class="img-circle" alt="..." /><br>Meja<?php echo $ro['no_meja'];?> </a></td>
                                        <td>|  Status : <?php echo $ro['status'];?></td>
                                        </th><br/><hr>

                                        <?php $n++; } ?>

                                                                          
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  </form>
</div>
</div> 


<?php 


break;
    case "pesan":

?>

<div class="panel-heading"><a href="?modul=viewmeja&act=add&nomor=<?php echo $_GET['no']; ?>" class="btn btn-primary">Tambah Data</a>
<button type="button" class="btn btn-danger" onclick=location.href='?modul=viewmeja'>View Meja</button>
<button type="button" class="btn btn-bayar" onclick=location.href='?modul=kwitansi&no_trans=<?php echo $_GET['no']; ?>'>Bayar</button>
<button type="button" class="btn btn-bayar" onclick=location.href='?modul=viewmeja&act=pindah&nomor=<?php echo $_GET['no']; ?>'>Pindah Meja</button>

</div>
                            <div class="panel-body">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No Transaksi</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Kasir</th>
                                    <th>No.Meja</th>
                                    <th>Menu</th>
                                    <th>QTY</th>
                                     <th>Status</th>
                                    <th>Aksi</th>
                                   
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                    
                                    $no=1;

                                    $res=mysqli_query($conn,"SELECT * FROM pesanan_temp where no_meja='$_GET[no]' ORDER BY no_transaksi ASC") or die(mysqli_error($conn));
                                    while($row=mysqli_fetch_array($res)){
										$h=mysqli_query($conn,"select * from menu where id_menu='$row[id_menu]'");
										$rh=mysqli_fetch_array($h);

                                     
                                ?>
                                <tr class="odd gradeX">
                                    <td align="center"><?php echo $no;?></td>
                                    <td align="center"><?php echo $row['no_transaksi'];?><input name="no_transaksi" type="hidden" value="<?php echo $row['no_transaksi'];?>" /></td>
                                    <td align="center"><?php echo ubahFormatZ($row['tgl_transaksi']);?></td>
                                    <td align="center"><?php echo $row['kd_kasir'];?></td>
                                    <td align="center"><?php echo $row['no_meja'];?></td>
                                    <td align="center"><?php echo $rh['nama_menu'];?></td>
                                    <td align="center"><?php echo $row['qty'];?></td>
                                    <td align="center"><?php echo $row['status'];?></td>
                                    
                                
                                    <td align="center"><a href="?modul=viewmeja&act=edit&id=<?php echo $row['no_meja'];?>&pesanan=<?php echo $row['id_menu'];?>"> <i title="rubah" class="fa fa-edit"></i></a> | 
                                    <a href="modul/pesanan/hapus_pesanan.php?id=<?php echo $row['no_meja'];?>&id_menu=<?php echo $row['id_menu'];?>"> <i title="hapus" class="fa fa-trash"></i></a> |</td> 
                                   
                                   
                                </tr>
                                <?php $no++; } ?> <!-- Akhir While-->
                            </tbody>

                             <!-- Akhir ELSE IF-->

                        </table>

                    </div>
                </div>

     
<?php 


break;
    case "add":

?>




            <div class="page-header">
              <h1><img width="70px" src="assets/images/avtar/Dining.png" alt="...">Data Pemesanan</h1></div>
            
                
<?php 

    
/*	function ketemu()
	{
	$a=mysql_query("select no_meja from meja");
	$ra=mysql_fetch_array($a);
	
	if($ra==$_POST[no_meja])
	{
		
	}
	}
*/
  $queryPeriksa = mysqli_query($conn,"SELECT * FROM pesanan_temp");
  $di=1;
  $tot = array();
  while($row = mysqli_fetch_row($queryPeriksa)) {
    $tot[$di]=str_replace('TRANS00','',$row[0]);
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
        $cariuser=mysqli_query($conn,"SELECT * FROM user WHERE iduser='$iduser'") or die (mysqli_error($conn));  
        $rcariuser=mysqli_fetch_array($cariuser); 
		
		$d=mysqli_query($conn,"select * from kasir where nama_kasir='$rcariuser[namauser]'")or die (mysqli_error($conn));
		$rd=mysqli_fetch_array($d);
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

</script>
        <div class="page-header"><h1></h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Input Data Pemesanan</div>
                        <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/pesanan/simpan.php" method="POST">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">No Transaksi</label>
                                    <div class="col-sm-7">
                           <?php
						   
						   $ceknotrans=mysqli_query($conn,"select no_transaksi from pesanan_temp where no_meja='$_GET[nomor]'");
						   $ketemu=mysqli_num_rows($ceknotrans);
						   $rceknotrans=mysqli_fetch_array($ceknotrans);
						   $no_trans=date("YmdHis");
						   ?>
                                      <input type="text" class="form-control form-control-flat"   name="no_transaksi" required value="<?php if($ketemu>0)
									  {
										  echo $rceknotrans['no_transaksi'];
									  }
									  else
									  {
										  echo $no_trans;
									  }
									  
									  
									  ?>" readonly="readonly">
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <?php $tgl=date('d-m-Y'); ?>
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal Transaksi</label>
                                    <div class="col-sm-7">
                                      <input type="hidden" name="tgl_transaksi" value="<?php echo date('Y-m-d');?>">
                                            <input type='text' class="form-control form-control-flat" required class="form-control" data-date-format="DD-MM-YYYY"   value=<?php echo $tgl;?> readonly="readonly"/>
                                            
                                      
                                    </div>
                                  </div>  
                                  <hr class="dotted">
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">ID Kasir</label>
                                    
                                     <div class="col-sm-7">
                                            <input type='text' class="form-control form-control-flat" required class="form-control" name="kd_kasir" value="<?php echo $rcariuser['namauser'];?>" readonly />
                                                                               
                                    </div>
                                  </div>  
                                  <hr class="dotted">
                                  
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nomor Meja </label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyUp='validHuruf(this)' class="form-control form-control-flat" readonly placeholder='No Meja' maxlength="30" name="no_meja" value="<?php echo $_GET['nomor']; ?>" required>
                                      <!--onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)
                                      
                                      onkeyup='return isNumberKey(event)'-->
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Pesanan Makanan & Minuman</label>
                                    <div class="col-sm-7" style="overflow:auto; height:300px">
                                    
                                      
                                        <?php 
                                        $n1=1;
                                        $qu1=mysqli_query($conn,"SELECT menu.id_menu,menu.nama_menu,menu.harga,kategori.id_kategori,kategori.nama_kategori,menukategori.id_menu,menukategori.id_kategori FROM menu,menukategori,kategori WHERE menu.id_menu=menukategori.id_menu AND kategori.id_kategori=menukategori.id_kategori") or die(mysqli_error($conn));
                                        while($ro1=mysqli_fetch_array($qu1)){ 
                                          
                                        ?>

                                        <input type="checkbox" name="id_menus[<?php echo $n1; ?>]" value="<?php echo $ro1['id_menu'];?>"> <?php echo $ro1['nama_menu']; ?> - <?php echo $ro1['harga']; ?>
                                        <input type="text" onkeyup="validAngka(this)" name="qtys[<?php echo $n1; ?>]" class="jlh"  placeholder="jumlah"><br/><hr>

                                        <?php $n1++; } ?>

                                                                          
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  
                                  
                                  
                                 
                                  <!--
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Pesanan Makanan</label>
                                    <div class="col-sm-7" style="overflow:auto; height:300px">
                                    
                                      
                                        <?php 
                                        /*$n1=1;
                                        $qu1=mysql_query("SELECT menu.id_menu,menu.nama_menu,menu.harga,kategori.id_kategori,kategori.nama_kategori,menukategori.id_menu,menukategori.id_kategori FROM menu,menukategori,kategori WHERE menu.id_menu=menukategori.id_menu AND kategori.id_kategori=menukategori.id_kategori AND kategori.nama_kategori like '%Makanan%'") or die(mysql_error());
                                        while($ro1=mysql_fetch_array($qu1)){ 
                                          
                                        ?>

                                        <input type="checkbox" name="id_menu[<?php echo $n1; ?>]" value="<?php echo $ro1['id_menu'];?>"> <?php echo $ro1['nama_menu']; ?> - <?php echo $ro1['harga']; ?>
                                        <input type="text" onkeyup="validAngka(this)" name="qty[<?php echo $n1; ?>]" class="jlh"  placeholder="jumlah"><br/><hr>

                                        <?php $n1++; } ?>

                                                                          
                                    </div>
                                  </div>
                                  <hr class="dotted"> 
                                  
                                  
                                   <div class="form-group">
                                    <label class="col-sm-2 control-label">Pesanan Minuman</label>
                                    <div class="col-sm-7" style="overflow:auto; height:300px">
                                    
                                      
                                        <?php 
                                        $n=1;
                                        $qu=mysql_query("SELECT menu.id_menu,menu.nama_menu,menu.harga,kategori.id_kategori,kategori.nama_kategori,menukategori.id_menu,menukategori.id_kategori FROM menu,menukategori,kategori WHERE menu.id_menu=menukategori.id_menu AND kategori.id_kategori=menukategori.id_kategori AND kategori.nama_kategori like '%Minuman%'") or die(mysql_error());
                                        while($ro=mysql_fetch_array($qu)){ 
                                          
                                        ?>

                                        <input type="checkbox" name="id_menu[<?php echo $n; ?>]" value="<?php echo $ro['id_menu'];?>"> <?php echo $ro['nama_menu']; ?> - <?php echo $ro['harga']; ?>
                                        <input type="text" onkeyup="validAngka(this)" name="qty[<?php echo $n; ?>]" class="jlh"  placeholder="jumlah"><br/><hr>

                                        <?php $n++; } ?>

                                                                          
                                    </div>
                                  </div>
                                  <hr class="dotted"> 
								  
-->
     */    ?>                         
                                  
                                  

									


                                  


                                 

                                 


									
								
                                
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
                                    <button type="button" class="btn btn-danger" onclick=location.href='?modul=viewmeja'>Batal</button>
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
	$pesanan=$_GET['pesanan'];

// SELECT * from pesanan_temp.no_transaksi,pesanan_temp.tgl_transaksi,pesanan_temp.id_menu,pesanan_temp.qty,pesanan_temp.no_meja,pesanan_temp.kd_kasir,pesanan_temp.status,menu.id_menu,menu_nama_menu,menu.harga where pesanan_temp.id_menu=menu.id_menu AND pesanan_temp.no_meja='$id'
    $q=mysqli_query($conn,"SELECT * from pesanan_temp,menu where pesanan_temp.id_menu=menu.id_menu AND pesanan_temp.no_meja='$id' AND pesanan_temp.id_menu='$pesanan'") or die(mysqli_error($conn));
    $row=mysqli_fetch_array($q);

?>

        <div class="page-header"><h1>Data Pemesanan</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Ubah Data Pemesanan</div>
                        <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/pesanan/ubah.php" method="POST">
                                 <!-- <div class="form-group">
                                    <label class="col-sm-2 control-label">No Transaksi</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat"   name="no_transaksi" required value="<?php // echo $row['no_transaksi'];?>" readonly="readonly">
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  -->

                                  <?php //$tgl=date('d-m-Y'); ?>
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">No Meja</label>
                                    <div class="col-sm-7">
                                      <input type="text" readonly="readonly" class="form-control form-control-flat"  value="<?php echo $id;?>">
                                      <input type="hidden" name="no_meja" value="<?php echo $id;?>">
                                            
                                            
                                      
                                    </div>
                                  </div>  
                                  <hr class="dotted">
                                  
                                   <div class="form-group">
                                    <label class="col-sm-2 control-label">Pesanan Makanan</label>
                                    <div class="col-sm-7">
                                    <?php
                                     $que=mysqli_query($conn,"SELECT * from menu") or die(mysqli_error($conn));
                                        while($rows=mysqli_fetch_array($que)){ 
                                          if($_GET['pesanan']==$rows['id_menu']){
											  ?>
                                      <input name="menu_awal" type="hidden" value="<?php echo $pesanan;?>" /><input type="text" class="form-control form-control-flat" readonly required class="form-control" name="" value="<?php echo $_GET['pesanan']."-".$rows['nama_menu'];?>"> <?php } }?>
                                            
                                            
                                      
                                    </div>
                                  </div>  
                                  <hr class="dotted">
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Ubah</label>
                                    
                                     <div class="col-sm-7">
                                     <table border="0">
                                     <tr>
                                     <td>  <select class="form-control chosen-select" name="menu_akhir" data-placeholder="Pilih Menu">
                                        
                                        <option></option>
                                        <?php 
                                        $que=mysqli_query($conn,"SELECT * from menu") or die(mysqli_error($conn));
                                        while($rows=mysqli_fetch_array($que)){ 
                                         
                                        ?>

                                        <option value="<?php echo $rows['id_menu'];?>" selected="selected"><?php echo $rows['id_menu'];?> - <?php echo $rows['nama_menu'];?></option>
                                        
                                        <?php ?>

                                       
                                        
                                        <?php  } ?>

                                      </select>  
                                     </td>
                                     <td>&nbsp;&nbsp;&nbsp;
                                     </td>
                                     <td>Jumlah&nbsp;&nbsp;
                                     </td>
                                     <td>
                                     <input type="text" onkeyup='validAngka(this)' class="form-control form-control-flat"  placeholder='QTY' maxlength="30" name="qty" value="<?php echo $row['qty']; ?>" title='Entrikan Jumlah Pesanan-Berupa Angka' required>
                                     </td>
                                     </tr>
                                     </table>
                                          
                                                                               
                                    </div>
                                  </div>  
                                  <hr class="dotted">
                                  
                                  
                                
                               
                                  
                                  <!-- TES RUBAH PESANAN -->
                                  
                                   

                                  
                                  
                                 <!-- AKHIR TEST-->
                                  
                                  
                                 
                                  <!--
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Pesanan Makanan</label>
                                    <div class="col-sm-7" style="overflow:auto; height:300px">
                                    
                                      
                                            
                                
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
                                    <button type="button" class="btn btn-danger" onclick=location.href='javascript:history.back(-1)'>Batal</button>
                                  </div>
                                  </div>

                            </form>

                        </div>

                    </div>
                 </div>
            
            </div>

<?php
break;
case 'pindah';
$no=$_GET['no'];
?>
<div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Pindah Meja</div>
                        <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/meja/pindahmeja.php" method="POST">
                                 <!-- <div class="form-group">
                                    <label class="col-sm-2 control-label">No Transaksi</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat"   name="no_transaksi" required value="<?php //echo $kode;?>" readonly="readonly">
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  -->
									 <!--	
                                  <?php //$tgl=date('d-m-Y'); ?>
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal Transaksi</label>
                                    <div class="col-sm-7">
                                      <input type="hidden" name="tgl_transaksi" value="<?php //echo date('Y-m-d');?>">
                                            <input type='text' class="form-control form-control-flat" required class="form-control" data-date-format="DD-MM-YYYY"   value=<?php //echo $tgl;?> readonly="readonly"/>
                                            
                                      
                                    </div>
                                  </div>  
                                  <hr class="dotted">
                                  -->
                                  
                                   <!--
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">ID Kasir</label>
                                    
                                     <div class="col-sm-7">
                                            <input type='text' class="form-control form-control-flat" required class="form-control" name="kd_kasir" value="<?php //echo $rcariuser['namauser'];?>" readonly />
                                                                               
                                    </div>
                                  </div>  
                                  <hr class="dotted">
                                  -->
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nomor Meja </label>
                                    <div class="col-sm-7"><input name="no_meja" type="hidden" value="<?php echo $_GET['nomor']; ?>" />
                                      <input type="text" onkeyUp='validHuruf(this)' class="form-control form-control-flat" readonly placeholder='No Meja' maxlength="30" name="no_meja" value="<?php echo $_GET['nomor']; ?>" required>
                                      <!--onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)
                                      
                                      onkeyup='return isNumberKey(event)'-->
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Pindah ke-</label>
                                    <div class="col-sm-7">
                                    
                                      
                                         <select class="form-control chosen-select" name="nomejapindah" required data-placeholder="Pilih No Meja">
                                        
                                        <option></option>
                                      <?php 
                                        $que=mysqli_query($conn,"SELECT * FROM meja where status='Tersedia'") or die(mysqli_error($conn));
                                        while($rows=mysqli_fetch_array($que)){ 
                                         
                                        ?>

                                        

                                        <option value="<?php  echo $rows['no_meja'];?>"><?php echo $rows['no_meja'];?> - <?php echo $rows['ket'];?></option>
                                        
                                        <?php  } ?>

                                      </select>  

                                                                          
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  
                                  
                                  
                                 
                                            
                                  
                                  

									


                                  


                                 

                                 


									
								
                                
                           
                                
                                
                                  <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-7">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-danger" onclick=location.href='?modul=viewmeja'>Batal</button>
                                  </div>
                                  </div>

                            </form>

                        </div>
                    </div>
                 </div>
            
            </div>



         <?php }?>                         