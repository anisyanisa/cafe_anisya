<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
	
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "lazara";

	// Koneksi dan memilih database di server
	mysql_connect($server,$username,$password) or die("Koneksi gagal");
	mysql_select_db($database) or die("Database tidak bisa dibuka");
	
	error_reporting(0);
?>

<form action="simpantes.php" method="post">
  <input type="submit" name="mulai" id="mulai" value="Mulai" /><input type="hidden" name="no_transaksi" id="hiddenField" value="<?php echo date("ddmmYYYY"); ?>">

  <input type="submit" name="berhenti" id="berhenti" value="Berhenti" />
</form>
</body>
</html>