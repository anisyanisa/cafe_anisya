<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print</title>
<style>
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
</head>

<body onload="javascript:window.print();">
<?php
include "config/koneksi.php";
include "config/ubah_tanggal.php";

$tahun=$_POST['tahun'];

$a=mysql_query("select  MONTH(reportpendapatan.tgl_transaksi) as bulan,YEAR(reportpendapatan.tgl_transaksi) as tahun,sum(reportpendapatan.grand) as grand FROM reportpendapatan WHERE reportpendapatan.tgl_transaksi LIKE '$bulan%' group by MONTH(reportpendapatan.tgl_transaksi), YEAR(reportpendapatan.tgl_transaksi)  ORDER BY reportpendapatan.tgl_transaksi ASC") or die(mysql_error());


?>
<center>
 <table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <th colspan="2" align="left" ><strong>Bery,<br /> 
    Coffee and Foods</strong></br>Jalan dr. Sutomo Kota Padang</br>Telp.  </th>
  </tr>
  <tr>
    <th colspan="4" ><hr></th>
  </tr>
 
 
</table>

<table width="600" border="0" cellspacing="0" cellpadding="0">
<tr>
    <th colspan="3" align="left"><div align="center"><strong>LAPORAN PESANAN TAHUNAN</strong></div></th>
</tr>
<tr>
  <th colspan="3" align="left"><div align="center"><p>Tahun: <?php echo DateToIndo($tahun);?></tr><td align="left"></div><br /></p></th>
</tr>

</table>
<table width="50%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <th bgcolor="#CCCCCC"><div align="center">NO.</div></th>
    <th bgcolor="#CCCCCC" ><div >BULAN</div></th>
    <th bgcolor="#CCCCCC"><div align="center">JUMLAH </div></th>
  </tr>
  <?php $no=1; while ($aa=mysql_fetch_array($a)){ $total=$total+$aa['grand']?>
  <tr>
    <td align="center" ><?php echo $no; ?></td>
    <td align="center" ><?php echo ($aa['bulan']);?> - <?php echo $aa['tahun'];?></td>
    <td align="center">Rp. <?php echo number_format($aa['grand'],0,'','.');?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
    <td colspan="2" align="center"><strong>TOTAL</strong></td>
    <td  align="center"><strong>Rp. <?php echo number_format($total,'0','','.');?></strong></td>
  </tr>
   <?php

   $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
  ?>
  <tr>
      <td colspan="1"></td>
      <td colspan="2" align="center"></br>Painan, <?php echo $hari[date("w")].", ".date("j")." ".$bulan[date("n")]." ".date("Y");?></td>
   </tr>
   <tr>
      <td colspan="1"></td>
      <td colspan="2" align="center">Manager</td>
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
      <td colspan="1"></td>
      <td colspan="2" align="center"><strong>Novita</strong></td>
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
</body>
</html>