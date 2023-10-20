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

$tgl_awal=$_POST['tgl_awal'];
$tgl_akhir=$_POST['tgl_akhir'];

$a=mysql_query("select  pesanan.tgl_transaksi, pesanan.id_menu,menu.modal, menu.nama_menu, sum(pesanan.qty) as jlh, menu.harga FROM pesanan,menu WHERE pesanan.id_menu=menu.id_menu AND tgl_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir' GROUP BY pesanan.id_menu ORDER BY pesanan.tgl_transaksi ASC") or die(mysql_error());


?>
<center>
  <table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
   
    <th colspan="3" ><p align="left"><strong>Bery's Coffee and Food</strong></br>Jalan dr. Sutomo Kota Padang</br>Telp.  </p></th>
    <th rowspan="1"></th>
  </tr>
  <tr>
    <th colspan="4" ><hr></th>
  </tr>
  </br>
  <tr>
    <td colspan="3"  ></td>
    <td colspan="3"></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>

    <th colspan="3"><p align="left"><strong>LAPORAN JUMLAH PESANAN</strong></p></th>
</tr>
<tr>
    <th colspan="3"><div align="left">Periode: <?php echo DateToIndo($tgl_awal); ?> s/d <?php echo DateToIndo($tgl_akhir); ?></tr></div></th>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <th bgcolor="#999999"><div align="center">NO.</div></th>
    <th bgcolor="#999999"><div >MENU</div></th>
    <th bgcolor="#999999"><div align="center">JUMLAH PESANAN</div></th>
    
  </tr>
  <?php $no=1; while ($aa=mysql_fetch_array($a)){ 
  $total=$total+$aa['harga']; 
  ?>
  <tr>
    <td align="center"><?php echo $no; ?></td>
    <td align="left"><?php echo $aa['nama_menu'];?></td>
    <td align="center"><?php echo $aa['jlh'];?></td>
    
    <?php $gt=$gt+$grand;?>
  </tr>
  <?php $no++; } 

   $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
  ?>
  <tr>
  <td colspan="3"><hr /></td>
  </tr>
   <tr>
    <td colspan="3" align="center">&nbsp;</td>
   
  </tr>
  <tr>
  <td></td><td></td>
      <td align="center"></br>Padang, <?php echo $hari[date("w")].", ".date("j")." ".$bulan[date("n")]." ".date("Y");?></td>
   </tr>
   <tr>
    <td></td><td></td>
      <td align="center">Manager</td>
   </tr>
   <tr>
      <td colspan="3" class="header"></td>
   </tr>
   <tr>
      <td colspan="3" class="header"></td>
   </tr>
    <tr>
      <td colspan="3" class="header"></td>
   </tr>
   <tr>
      <td colspan="3" class="header"></td>
   </tr>
   <tr>
      <td colspan="3" class="header"></td>
   </tr>
   <tr>
      <td></td><td></td>
      <td align="center"><strong>Novita</strong></td>
   </tr>
   <tr>
      <td colspan="1"></td>
      <td colspan="2" align="center"><strong></strong></td>
   </tr>
   <tr>
      <td colspan="3" class="header"></td>
   </tr>
   <tr>
      <td colspan="3" class="header"></td>
   </tr>
    <tr>
      <td colspan="3" class="header"></td>
   </tr>
   <tr>
      <td colspan="3" class="header"></td>
   </tr>
   </table>
   </center>
</body>
</html>