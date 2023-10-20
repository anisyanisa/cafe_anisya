
<?php
$no_transaksi=$_POST['no_transaksi'];
$jam_masuk=time("H:m:s");
$sql=mysql_query("insert into rent_vip values('1','$jam_masuk','')")or die();
?>