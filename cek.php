<?php include "config/koneksi.php";

$usern=mysqli_real_escape_string($conn,$_POST['user']);
$pass=mysqli_real_escape_string($conn,$_POST['pass']);
//$passw=md5($pass);

$login=mysqli_query($conn,"SELECT * FROM user WHERE username='$usern' AND password='$pass'") or die(mysql_error());
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);
// Apabila username dan password ditemukan
if ($ketemu > 0){  

	session_start();
	
	$_SESSION['iduser'] 	= $r['iduser'];
	$_SESSION['namauser']  	= $r['namauser'];
	$_SESSION['username'] 	= $r['username'];
	$_SESSION['password']   = $r['password'];
	
	header('location:main.php?modul=viewmeja');
}
else{ 
?>
<script> alert("password atau username salah, silahkan coba lagi..!!");</script>
<?php
include "login.php";

}
?>