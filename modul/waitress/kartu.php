<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

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
	include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";
	
	$idpasien=$_GET['id'];
	
	$a=mysql_query("SELECT * FROM pasien WHERE idpasien='$idpasien'") or die (mysql_error());
	$aa=mysql_fetch_array($a);
	
?>
<center>
<table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <th  rowspan="1" class="line_a line_ki"><img width="70px" src="../../assets/images/avtar/logo_rsa.png" alt="..."></th>
    <th colspan="3" class="line_a"><p align="center"><strong>RSUD dr. MUHAMMAD ZEIN PAINAN KAB. PESSEL</strong></br>Jalan dr. A Rivai PainanPainan,Pesisir Selatan, Sumatera BaratTelp. (0756) 214-282151</br></br>Kartu Berobat </p></th>
    <th rowspan="1" class="line_a line_ka"><img width="70px" src="../../assets/images/avtar/kab.jpg" alt="..."></th>
  </tr>
  <tr>
    <td rowspan="5" class="line_ki line_a">&nbsp;</td>
    <td width="416" height="29" class="line_a"> NO. RM</td>
    <td colspan="2" class="line_a">: <?php echo $aa['idpasien'];?></td>
    <td rowspan="5" class="line_a line_ka"></td>
  </tr>
  <tr>
    <td height="30"> NAMA</td>
    <td colspan="2">: <?php echo $aa['namapasien'];?></td>
  </tr>
  <tr>
    <td>TANGGAL LAHIR</td>
    <td colspan="2">: <?php echo DateToIndo($aa['tgllahir']);?></td>
  </tr>
  <tr>
    <td>ALAMAT</td>
    <td colspan="2">: <?php echo $aa['alamat'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="416">&nbsp;</td>
    <td width="416">&nbsp;</td>
  </tr>
  <tr>
    <td class="line_ki ">&nbsp;</td>
    <td colspan="3" >&nbsp;</td>
    <td class="line_ka">&nbsp;</td>
  </tr>
  <tr>
    <td class="line_ki line_ba"></td>
    <td class="line_ba"></td>
    <td align="right" colspan="3" class="line_ba line_ka">*kartu harus dibawa setiap berobat</td>
  </tr>
</table>
</center>
</body>
</html>