<?php   
        session_start();
error_reporting(0);
        if(empty($_SESSION['iduser'])){
        echo "<script>alert('Maaf Anda tidak berhak mengakses halaman ini, silahkan login dulu')</script>";
        echo "<script>window.location.href='index.php';</script>";
        }else{

        $iduser=$_SESSION['iduser'];

        include "config/koneksi.php";
        $q=mysqli_query($conn,"SELECT * FROM user WHERE iduser='$iduser'") or die (mysql_error());  
        $r=mysqli_fetch_array($q); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>DR's Coffee and Food</title>

	<meta name="description" content="">
	<meta name="author" content="sis">

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css" /> 

	<!-- Calendar Styling  -->
    <link rel="stylesheet" href="assets/css/plugins/calendar/calendar.css" />
    
<!-- Typeahead Styling  -->
    <link rel="stylesheet" href="assets/css/plugins/typeahead/typeahead.css" />
    
    <!-- TagsInput Styling  -->
    <link rel="stylesheet" href="assets/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" />
    
    <!-- Chosen Select  -->
    <link rel="stylesheet" href="assets/css/plugins/bootstrap-chosen/chosen.css" />
    
    <!-- DateTime Picker  -->
    <link rel="stylesheet" href="assets/css/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.css" />

    <!-- Fonts  -->
   <!--<link href='http://fonts.googleapis.com/css?family=Hind:400,500,600,300' rel='stylesheet' type='text/css'>-->
    <!-- Base Styling  -->
    <link rel="stylesheet" href="assets/css/app/app.v1.css" />

    <script language="javascript">
    <!--
      function keluar()
      {
      tanya=confirm("Apakah anda yakin akan keluar ?")
        if (tanya !="0")
        {
        top.location="./logout.php"
        }
      }
    -->
    </script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body data-ng-app>  

	<aside class="left-panel">
    		
            <div class="user text-center">
                  <img src="assets/images/avtar/Dining.png" class="img-circle" alt="...">
                  <h2 class="user-name"><?php //echo $r['namauser'];?></h2>
                  <h3 class="user-name">(<?php echo $r['level'];?>)<h3>
                   <div class="dropdown user-login">
                    <a role="menuitem" onclick="keluar()"  href="#"><i  class="fa fa-circle status-icon signout"></i> Log Out</a>
                  </div>  
            </div>
            
            
            <?php if($r['level']=='admin'){ ?>

            <nav class="navigation">
            	<ul class="list-unstyled">
                    <li class="active"><a href="?modul=home"><i class="fa fa-laptop"></i><span class="nav-label">Home</span></a></li>
                    <li class="has-submenu"><a href="#"><i class="fa fa-file-text"></i> <span class="nav-label">Master Data</span></a>
                        <ul class="list-unstyled">
                          <li><a href="?modul=kasir">Kasir</a></li>  
                          <li><a href="?modul=dokter">Dokter</a></li>  
                          <li><a href="?modul=kamar">Kamar</a></li>
                          <li><a href="?modul=jenispelayanan">Jenis Pelayanan</a></li>
                        </ul>
                  </li>
                   <li class="has-submenu"><a href="?modul=cek_in"><i class="fa fa-mail-forward"></i> <span class="nav-label">Check In</span></a>
                 
                    
              </ul>
            </nav>
            <?php }elseif($r['level']=='pelayanan'){ ?>

            <nav class="navigation">
              <ul class="list-unstyled">
                    <li class="active"><a href="?modul=home"><i class="fa fa-laptop"></i><span class="nav-label">Home</span></a></li>
               <li class="has-submenu"><a href="?modul=pelayanan"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Pelayanan Rawat Jalan</span></a>
                   <li class="has-submenu"><a href="?modul=pelayanan_inap"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Pelayanan Rawat Inap</span></a>
                     
                    
              </ul>
            </nav>

            <?php }elseif($r['level']=='admin_pembayaran'){ ?>

            <nav class="navigation">
              <ul class="list-unstyled">
                    <li class="active"><a href="?modul=home"><i class="fa fa-laptop"></i><span class="nav-label">Home</span></a></li>
               <li class="has-submenu"><a href="?modul=cek_out"><i class="fa fa-reply"></i> <span class="nav-label">Check Out</span></a>
                        
                    
              </ul>
            </nav>

<?php }elseif($r['level']=='superuser'){ ?>

                  <nav class="navigation">
              <ul class="list-unstyled">
                  <li class="active"><a href="?modul=home"><i class="fa fa-laptop"></i><span class="nav-label">Home</span></a></li>
                  <li class="has-submenu"><a href=""><i class="fa fa-file-text"></i> <span class="nav-label">Master Data</span></a>
                        <ul class="list-unstyled">
                          <li><a href="?modul=kasir">Kasir</a></li>
			   <li><a href="?modul=waitress">Waitress</a></li>
                          <li><a href="?modul=kategori">Kategori</a></li>  
                          <li><a href="?modul=satuan">Satuan</a></li>   
                          <li><a href="?modul=bahan">Bahan</a></li> 
                          <li><a href="?modul=meja">Meja</a></li>
                          <li><a href="?modul=menu">Menu</a></li>
                          <li><a href="?modul=user">User</a></li>
                        </ul>
                  </li>
                  <li class="has-submenu"><a href="?modul=viewmeja"><i class="fa fa-newspaper-o"></i> <span class="nav-label">View Meja</span></a>
                 <li class="has-submenu"><a href="?modul=belibahan"><i class="fa fa-file-text"></i> <span class="nav-label">Beli Bahan</span></a></li>
                  <li class="has-submenu">
                  <li class="has-submenu">
                  <li class="has-submenu">
                  <li class="has-submenu"><a href=""><i class="fa fa-file-text"></i> <span class="nav-label">Grafik</span></a>
                       <ul class="list-unstyled">
                          <li><a href="?modul=m_menu">Report Menu</a></li>
			  <li><a href="?modul=m_pendapatan">Report Pendapatan</a></li>
                          <li><a href="?modul=m_pesanan">Statistik Pemesanan</a></li> 
			  <li><a href="?modul=m_waitress">Statistik Layanan Waitress</a></li> 
													  
                          
                        </ul>
                  </li>
              </ul>
            </nav>          

            <?php }else if($r['level']=='kasir'){ ?>
            
            <nav class="navigation">
              <ul class="list-unstyled">
                  <li class="active"><a href="?modul=home"><i class="fa fa-laptop"></i><span class="nav-label">Home</span></a></li>
                  <li class="has-submenu"><a href=""><i class="fa fa-file-text"></i> <span class="nav-label">Master Data</span></a>
                        <ul class="list-unstyled">
                          
			   <li><a href="?modul=waitress">Waitress</a></li>
                          <li><a href="?modul=kategori">Kategori</a></li>  
                          <li><a href="?modul=satuan">Satuan</a></li>   
                          <li><a href="?modul=bahan">Bahan</a></li> 
                          <li><a href="?modul=meja">Meja</a></li>
                          <li><a href="?modul=menu">Menu</a></li>
                         <!-- <li><a href="?modul=user">User</a></li>-->
                        </ul>
                  </li>
                  <li class="has-submenu"><a href="?modul=viewmeja"><i class="fa fa-newspaper-o"></i> <span class="nav-label">View Meja</span></a>
                 <li class="has-submenu"><a href="?modul=belibahan"><i class="fa fa-file-text"></i> <span class="nav-label">Beli Bahan</span></a></li>
                  <li class="has-submenu">
                  <li class="has-submenu">
                  <li class="has-submenu">
                  <li class="has-submenu"><a href=""><i class="fa fa-file-text"></i> <span class="nav-label">Grafik</span></a>
                       <ul class="list-unstyled">
                          <li><a href="?modul=m_menu">Report Menu</a></li>
                          <li><a href="?modul=m_pesanan">Statistik Pemesanan</a></li> 
							<li><a href="?modul=m_bahan">Report Belanja Bahan</a></li> 						  
                          
                        </ul>
                  </li>
              </ul>
            </nav>
            
            <?php } ?>
            
    </aside>
    <!-- Aside Ends-->
    
    <section class="content">
    
    	
        <header class="top-head container-fluid">
            <button type="button" class="navbar-toggle pull-left">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            
        </header>
        <!-- Header Ends -->
        
        
        <div class="warper container-fluid">
                     
        <?php include "content.php"; ?>    
            
        </div>
        <!-- Warper Ends Here (working area) -->
        
        
        <footer class="container-fluid footer">
        	Copyright &copy; 2023 <a href="#" >DR's Coffee and Food @Anisya</a>
            <a href="#" class="pull-right scrollToTop"><i class="fa fa-chevron-up"></i></a>
        </footer>
        
    
    </section>
    <!-- Content Block Ends Here (right box)-->
    
    
    <!-- JQuery v1.9.1 -->
  	<script src="assets/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
     <script src="assets/js/plugins/underscore/underscore-min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    
    <!-- Globalize -->
    <script src="assets/js/globalize/globalize.min.js"></script>
    
    <!-- NanoScroll -->
    <script src="assets/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
    
    <!-- Chart JS -->
    <script src="assets/js/plugins/DevExpressChartJS/dx.chartjs.js"></script>
    <script src="assets/js/plugins/DevExpressChartJS/world.js"></script>
   	<!-- For Demo Charts -->
    <script src="assets/js/plugins/DevExpressChartJS/demo-charts.js"></script>
    <script src="assets/js/plugins/DevExpressChartJS/demo-vectorMap.js"></script>
    
    <!-- Sparkline JS -->
    <script src="assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- For Demo Sparkline -->
    <script src="assets/js/plugins/sparkline/jquery.sparkline.demo.js"></script>
    
    <!-- Angular JS -->
    <!-- ToDo List Plugin -->
    <script src="assets/js/angular/todo.js"></script>

    <script src="assets/js/jquery.validate.js"></script>
    
    
    
    <!-- Calendar JS -->
    <script src="assets/js/plugins/calendar/calendar.js"></script>
    <!-- Calendar Conf -->
    <script src="assets/js/plugins/calendar/calendar-conf.js"></script>
	
      <!-- TypeaHead -->
    <script src="assets/js/plugins/typehead/typeahead.bundle.js"></script>

    <script src="ambil.js"></script>

    <!-- InputMask -->
    <script src="assets/js/plugins/inputmask/jquery.inputmask.bundle.js"></script>
    
    <!-- TagsInput -->
    <script src="assets/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    
    <!-- Chosen -->
    <script src="assets/js/plugins/bootstrap-chosen/chosen.jquery.js"></script>
    
    <!-- moment -->
    <script src="assets/js/moment/moment.js"></script>
    
    <!-- DateTime Picker -->
    <script src="assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>  

    <!-- Data Table -->
    // <script src="assets/js/plugins/datatables/jquery.dataTables.js"></script>
    <script src="assets/js/plugins/datatables/DT_bootstrap.js"></script>
    <script src="assets/js/plugins/datatables/jquery.dataTables-conf.js"></script>
    
    <!-- Custom JQuery -->
  	<script src="assets/js/app/custom.js" type="text/javascript"></script>
 
   
<script type="text/javascript">
    $(document).ready(function() {
        $('#form_ku').submit(function() {
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(data) {
                    $('#result').html(data);
                }
            })
            return false;
        });
    })
    </script>

    <script type="text/javascript">
    function checkRead(idjenispelayanan,jumlah)
    {
            if (document.getElementById(idjenispelayanan).checked)
                    document.getElementById(jumlah).readOnly=false;
            else
                    document.getElementById(idjenispelayanan).readOnly=true;
    }

    </script>
    
	
    
</body>
</html>
<?php } ?>