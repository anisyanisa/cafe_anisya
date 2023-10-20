<?php
 session_start();
  session_destroy();
  
  echo "<script>alert('Anda telah sukses keluar sistem [LOGOUT]')
  document.location.href='./'</script>";
	
?>