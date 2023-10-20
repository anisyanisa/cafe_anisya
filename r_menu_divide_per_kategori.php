<?php
error_reporting(0);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print</title>
<!--<style>
.line_a{
	border-top:thin #333 solid;
}
.line_ki{
	border-left:thin #333 solid;
}
.line_ka{
	border-right:thin #333 solid;
}
.line_ba{
	border-bottom:thin #333 solid;
}
</style>
-->
</head>

<body onload="javascript:window.print();">
<?php
include "config/koneksi.php";
include "config/ubah_tanggal.php";

$bulan=$_POST['bulan'];
$date=date('d M Y');
?>
<center>
<font size="-1">
<table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr>
    
    <th colspan="3" ><p align="center"><strong>Bery's Coffee and Food <br /> 
    </strong>Jalan dr. Sutomo Kota Padang</br>Telp. </p></th>
    
  </tr>
  <tr>
    <th colspan="4" ></th>
  </tr> 
</table>
<table width="600" border="0" cellspacing="0" cellpadding="0">
<tr>
    <th colspan="3"><div align="center"><strong>REPORT MENU</strong></div></th>
</tr>
<tr>
    <th colspan="3"><div align="center"><p>Tanggal: <?php echo $date;?></div><br /><br /></tr></p></th>
</tr>

</table>


<?php
$first=mysqli_query($conn,"select * from kategori");
$no=1;
while ($rfirst=mysqli_fetch_array($first)){ 
//$total=$total+$aa['jlh'];
?>

<table width="600" border="0" cellspacing="0" cellpadding="0">
<tr>
<td ><div align="left" >Kategori : <?php echo $rfirst['nama_kategori'];?></div>

</td><td></td><td></td>
</tr>
</table>
<br />
<table width="600" border="0" cellspacing="0" cellpadding="5">
<tr><td colspan="5">
<hr /></td>
</tr>
  <tr>
    <th  class="line_ba line_ki line_ka line_a">NO.</th>
    <th  class="line_ba line_ka line_a">ID MENU</th>
    <th  class="line_ba line_ka line_a">NAMA MENU</th>
    <th  class="line_ba line_ka line_a">MODAL</th>
    <th  class="line_ba line_ka line_a">HARGA</th>
  </tr>
  <tr><td colspan="5">
<hr /></td>
</tr>
<?php
$def=mysqli_query($conn,"select * from menu,menukategori,kategori where kategori.id_kategori=menukategori.id_kategori AND menukategori.id_menu=menu.id_menu AND kategori.id_kategori='$rfirst[id_kategori]' order by kategori.id_kategori");
while($rdef=mysqli_fetch_array($def)){?>

  
  <tr>
    <td align="center" class="line_ki line_ka line_ba"><?php echo $no; ?></td>
    <td align="center" class="line_ka line_ba"><?php echo $rdef['id_menu'];?></td>
    <td class="line_ka line_ba"><?php echo $rdef['nama_menu'];?></td>
    <td align="center" class="line_ka line_ba">Rp.<?php echo number_format($rdef['modal'],0,'','.');?></td>
    <td align="center" class="line_ka line_ba">Rp.<?php echo number_format($rdef['harga'],0,'','.');?></td>
  </tr>
  
  
<?php $no++; } ?> 
<tr>
  <td colspan="5"><hr /><br /></td>
  </tr>
<?php ?></table><?php } ?>
<?php

$a=mysqli_query($conn,"select * from menu,menukategori,kategori where kategori.id_kategori=menukategori.id_kategori AND menukategori.id_menu=menu.id_menu order by kategori.id_kategori") or die(mysql_error());


?>





  
  
  <?php

   $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
  ?>
  <table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr>
  <td colspan="2"></td>
  
  </tr>
  <tr>
      <td width="361"></td>
      <td width="219" align="center"></br>Padang, <?php echo $hari[date("w")].", ".date("n")." ".$bulan[date("n")]." ".date("Y");?></td>
   </tr>
   <tr>
      <td></td>
      <td align="center">Manager</td>
   </tr>
   <tr>
      <td></td>
   </tr>
   <tr>
      <td ></td>
   </tr>
    <tr>
      <td></td>
   </tr>
   <tr>
      <td></td>
   </tr>
   <tr>
      <td></td>
   </tr>
   <tr>
      <td></td>
      <td align="center" ><strong>Novita</strong></td>
   </tr>
   
</table>
</font>
</center>
</body>
</html>