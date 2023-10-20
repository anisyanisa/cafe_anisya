<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

$a=mysqli_query($conn,"select * from menu,menukategori,kategori where kategori.id_kategori=menukategori.id_kategori AND menukategori.id_menu=menu.id_menu order by kategori.id_kategori") or die(mysql_error());


?>
<center>
<font size="-1">

<table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr>
    
    <th colspan="3" ><p align="left"><strong>DR's Coffee and Food <br /> 
    </strong>Jalan dr. Sutomo Kota Padang</br>Telp. </p></th>
    <th rowspan="1"></th>
  </tr>
  <tr>
    <th colspan="4" ><hr></th>
  </tr> 
</table>

<table width="600" border="0" cellspacing="0" cellpadding="0">
<tr>
    <th colspan="3"><div align="left"><strong>REPORT MENU</strong></div></th>
</tr>
<tr>
    <th colspan="3"><div align="left"><p>Tanggal: <?php echo $date;?></tr></div><br /></p></th>
</tr>

</table>
<table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <th bgcolor="#999999" class="line_ba line_ki line_ka line_a"><div align="center">NO.</div></th>
    <th bgcolor="#999999" class="line_ba line_ka line_a"><div align="center">ID MENU</div></th>
    <th bgcolor="#999999" class="line_ba line_ka line_a"><div >NAMA MENU</div></th>
    <th bgcolor="#999999" class="line_ba line_ka line_a"><div align="center">MODAL</div></th>
    <th bgcolor="#999999" class="line_ba line_ka line_a"><div align="center">HARGA</div></th>
  </tr>
  <?php $no=1; while ($aa=mysqli_fetch_array($a)){ $total=$total+$aa['jlh']; ?>
  <tr>
    <td align="center" class="line_ki line_ka line_ba"><?php echo $no; ?></td>
    <td align="center" class="line_ka line_ba"><?php echo $aa['id_menu'];?></td>
    <td class="line_ka line_ba"><?php echo $aa['nama_menu'];?></td>
    <td align="center" class="line_ka line_ba">Rp.<?php echo number_format($aa['modal'],0,'','.');?></td>
    <td align="center" class="line_ka line_ba">Rp.<?php echo number_format($aa['harga'],0,'','.');?></td>
  </tr>
  <?php $no++; } ?>
  
  <?php

   $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
  ?>
  <tr>
  <td colspan="5"><hr /></td>
  
  </tr>
  <tr>
      <td colspan="3"></td>
      <td colspan="2" align="center"></br>Padang, <?php echo $hari[date("w")].", ".date("n")." ".$bulan[date("n")]." ".date("Y");?></td>
   </tr>
   <tr>
      <td colspan="3"></td>
      <td colspan="2" align="center">Manager</td>
   </tr>
   <tr>
      <td colspan="4" class="header"></td>
   </tr>
   <tr>
      <td colspan="4" class="header"></td>
   </tr>
    <tr>
      <td colspan="4" class="header"></td>
   </tr>
   <tr>
      <td colspan="4" class="header"></td>
   </tr>
   <tr>
      <td colspan="4" class="header"></td>
   </tr>
   <tr>
      <td colspan="3"></td>
      <td colspan="2" align="center"><strong>Anisya</strong></td>
   </tr>
   <tr>
      <td colspan="3"></td>
      <td colspan="2" align="center"><strong></strong></td>
   </tr>
   <tr>
      <td colspan="4" class="header"></td>
   </tr>
   <tr>
      <td colspan="4" class="header"></td>
   </tr>
    <tr>
      <td colspan="4" class="header"></td>
   </tr>
   <tr>
      <td colspan="4" class="header"></td>
   </tr>
</table>
</font>
</center>
</body>
</html>