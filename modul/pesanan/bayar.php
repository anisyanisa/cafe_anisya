


<style type="text/css">
.border_kiri {
	border-left-style: none;
	border-bottom-style: ridge;
}
.border_atas_bawah {
	border-top-style: ridge;
	border-bottom-style: ridge;
}
</style>

<?php
    
    include "config/koneksi.php";
    include "config/ubah_tanggal.php";        
            
    $id=$_GET['no_trans'];
	$rbayar=$_POST['bayar'];
	
	$diskon=$_POST['diskon'];
	
	$ppn=$_POST['ppn'];
	
	$vip=$_POST['vip'];
	
	$no_transaksi=$_POST['no_transaksi'];
	
	$tgl_transaksi=$_POST['tgl_transaksi'];
           
	if(isset($_POST['id_waitress']))
            {
            foreach($_POST['id_waitress'] as $key => $value) 
           
            {
                //$text_values= $_POST['qtys'] [$key];

                $query = "INSERT INTO layanan_waitress2 VALUES('$no_transaksi','$value','$tgl_transaksi')";
                $result = mysql_query($query) or die(mysql_error());
            
            }
            
            }
			
	
	//$pindahtemp=mysql_query("insert into pesanan (no_transaksi,tgl_transaksi,id_menu,qty,no_meja,kd_kasir)select no_transaksi,tgl_transaksi,id_menu,qty,no_meja,kd_kasir from pesanan_temp where no_meja='$id'");
	
	//$pindahtempkebayar=mysql_query("insert into bayar values('$no_transaksi','$rbayar','$diskon','SELESAI')");
	
	//$pindahtempkebayar=mysql_query("insert into bayar (no_transaksi,bayar,status)select no_transaksi,'','' from pesanan_temp where no_transaksi='$no_transaksi'");
	
//	$simpan=mysql_query("update bayar set bayar='$rbayar',status='SELESAI' where no_transaksi='$no_transaksi'");
	
	//$updatemeja=mysql_query("update meja set status='Tersedia' where no_meja='$id'");
	
	

	$c=mysql_query("
	select * from pesanan_temp where no_meja='$id'
	");
	
    $row=mysql_fetch_assoc($c);

 

?>            

            
  <form class="form-horizontal" role="form" action="?modul=cetak&no_trans=<?php echo $_GET['no_trans'];?>" method="POST">              
<div id="fontsa">
<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="370" class="border_kiri">Berry's Coffee and Foods<br>
      Jl. dr. Sutomo No. 84<br>
    Open 9 a.m - 10 p.m</td>
    </tr>
  <tr>
    <td class="border_kiri">
    
     <table width="500" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="85">No. Trans</td>
        <td width="84">: <?php echo $row['no_transaksi'];?>
          <input name="no_transaksi" type="hidden" id="hiddenField4" value="<?php echo $row['no_transaksi'];?>" /></td>
      </tr>
      <tr>
        <td>Tanggal</td>
        <td>: <?php echo ubahFormatZ($row['tgl_transaksi']);?></td>
      </tr>
      <tr>
        <td>Meja</td>
        <td>: <?php echo $row['no_meja'];?></td>
      </tr>
     
    </table>
    
    </td>
    </tr>
</table>
<table width="411" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="221" rowspan="3" valign="top">
    <table width="221" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="border_kiri" width="110">Nama</td>
        <td width="100" class="border_kiri">Qty x Harga</td>
      </tr>
         <?php

                                    
                       

                                    $no=1;
                                   
                                    $res=mysql_query("

                                      SELECT * from pesanan_temp where no_meja='$_GET[no_trans]'
                                      ") or die(mysql_error());
                                    
                                    while($rows=mysql_fetch_array($res)){
										
										$menu=mysql_query("select * from menu where id_menu='$rows[id_menu]'");
										$rmenu=mysql_fetch_array($menu);

                                        $total=$rows['qty']*$rmenu['harga'];

                                        $totals=$totals+$total;

                                ?>
      <tr>
        <td align="left"><?php echo $rmenu['nama_menu']; ?></td>
        <td valign="top"><?php echo $rows['qty'];?> x <?php echo number_format($rmenu[harga],0,'','.');?></td>
      </tr>
      <?php }?>
      
    </table>
  </td>
    <td width="191" valign="top">
    <table width="177" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>
        <td colspan="2" align="left" scope="row">&nbsp;</td>
        </tr>
     
      
      
      <tr>
        <td>&nbsp;</td>
        <td align="left" scope="row" width="48">VIP </td>
        <td width="118" valign="top">: <?php echo number_format($vip,0,'','.');?>
          <input type="hidden" name="vip" id="hiddenField" value="<?php echo $vip;?>"/></td>
      </tr>
      <tr>
      <?php
	  $ppn_akhir=$ppn*$totals;
	  ?>
        <td>&nbsp;</td>
        <td align="left" scope="row">PPN</td>
        <td valign="top">: <?php echo number_format($ppn,0,'','.');?>
          <input type="hidden" name="ppn" id="hiddenField3" value="<?php echo $ppn;?>"/></td>
      </tr>
      <tr>
        <td width="11">&nbsp;</td>
        <td align="left" scope="row" width="48">Jumlah</td>
        <td valign="top">: <?php echo number_format($totals,0,'','.');?></td>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th>
        <td align="left" scope="row">Diskon</td><?php
								
								$disc=$totals*($diskon/100);
								?>
        <td valign="top">: - <?php echo number_format($disc,0,'','.');  ?>
          <input type="hidden" name="diskon" id="hiddenField2" value="<?php echo $diskon;?>"/></td>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th><?php
                                  $grandtotal=$totals-$disc+$ppn+$vip;
                                ?>
        <td align="left" >Total</td>
        <td valign="top">: <?php echo number_format($grandtotal,0,'','.'); ?></td>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th>
        <td align="left" >Bayar</td>
        <td valign="top">: 
          <input name="bayar" type="text" id="textfield" size="8" autofocus="autofocus"/></td>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th>
        <td align="left">&nbsp;</td> <?php $kembali=$rbayar-$grandtotal;?>
        <td valign="top">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
  <td>&nbsp;
  </td>
  </tr>
   <tr>
  <td>&nbsp;
  </td>
  </tr>
   <tr>
     <td class="border_kiri">&nbsp;</td>
     <td class="border_kiri">&nbsp;</td>
   </tr>
   <tr>
     <td colspan="2" align="center" class="border_kiri"><font face="Times New Roman, Times, serif"><em>Terima Kasih atas Kunjungannya</em></font></td>
    </tr>
</table>

 
 <?php
/*
                                  $datetime1 = strtotime($row['tanggalmasuk']);
                                  $datetime2 = strtotime($row['tanggalcekout']);
                                  $selisih = $datetime2 - $datetime1;
                                  $lama = $selisih / (60*60*24);
  */                                
                                  ?>
                                 
             
            

<div>

                  
                        
                    
                      
  </div> <!-- font sa--> 
   <button type="submit" class="btn btn-primary" >Bayar</button>
   
   <button type="button" class="btn btn-danger" onclick=location.href='<?php echo "javascript:history.back(-1)"; ?>'>Kembali</button>              
     </form>                  
</div>

     <?php
/*
$hapustemp=mysql_query("delete from pesanan_temp where no_meja='$id'");
*/
?>         
                
                
                <div class="row">
                    <div class="col-lg-6">
                      <!-- <button class="btn btn-warning" type="button" href="javascript:void(0);" onClick="javascript:window.print();">SELESAI</button> -->
                    
                  </div>
                   
</div>


</body>