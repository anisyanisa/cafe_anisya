<?php 
include "config/koneksi.php";
include "config/ubah_tanggal.php";

$kode=$_GET['no_trans'];


?>
            <div class="page-header">
              <h1><img width="70px" src="assets/images/avtar/Dining.png" alt="...">Data Diskon</h1></div>
            
                <div class="panel panel-default">
                   
                   

                   
                        <div class="panel-body">
                       
                      <!-- Akhir IF-->
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                             <form class="form-horizontal" role="form" action="../../main.php?modul=viewmeja&act=pesan&no=<?php echo $_GET['no']; ?>" method="POST">
                            <div class="form-group">
                                    <label class="col-sm-2 control-label">No Transaksi</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat"   name="no_transaksi" required value="<?php echo $kode;?>">
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Diskon</label>
                                    <div class="col-sm-7">
                                       <select name="diskon" class="form-control chosen-select" id="diskon" data-placeholder="Pilih Keterangan" required="required">
  <option value="15">15%</option>
  <option value="10">10%</option>
  <option value="5">5%</option>
</select>
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                 
</form><br />
          <button type="submit" class="btn btn-primary">Simpan</button>                 

                    </div>
                </div>

<script language='javascript'>
function validAngka(a)
{
  if(!/^[0-9.]+$/.test(a.value))
  {
  a.value = a.value.substring(0,a.value.length-1000);
  }
}
function validHuruf(b)
{
  if(!/^[a-zA-Z ]+(([\'\,\.\-\ ][a-zA-Z ])?[a-zA-Z]*)*$/.test(b.value))
  {
  b.value = b.value.substring(0,b.value.length-1000);
  }
}
</script>