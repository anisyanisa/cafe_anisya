<?php 
include "config/koneksi.php";
include "config/ubah_tanggal.php";

switch($_GET['act']){
default:

?>
            <div class="page-header">
              <h1><img width="70px" src="assets/images/avtar/Dining.png" alt="...">Data Waitress</h1></div>
            
                <div class="panel panel-default">
                   
                   

                    <?php if($r['level']=='pimpinan'){ ?>
                        <div class="panel-body">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Waitress</th>
                                    <th>Nomor Identitas</th>
                                    <th>Nama Waitress</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Tanggal Bergabung</th>
                                   
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                    
                                    $no=1;

                                    $res=mysql_query("SELECT * FROM waitress ORDER BY id_waitress ASC") or die(mysql_error());
                                    while($row=mysql_fetch_array($res)){

                                     
                                ?>
                                <tr class="odd gradeX">
                                    <td align="center"><?php echo $no;?></td>
                                    <td align="center"><?php echo $row['id_waitress'];?></td>
                                    <td align="center"><?php echo $row['nik'];?></td>
                                    <td align="center"><?php echo $row['nama_waitress'];?></td>
                                    <td align="center"><?php echo $row['jekel'];?></td>
                                    <td align="center"><?php echo $row['tempat_lahir'];?></td>
                                    <td align="center"><?php echo ubahFormatZ($row['tanggal_lahir']);?></td>
                                    <td align="center"><?php echo $row['alamat_waitress'];?></td>
                                    <td align="center"><?php echo $row['nohp_waitress'];?></td>
                                    <td align="center"><?php echo ubahFormatZ($row['tgl_bergabung']);?></td>
                                    
                                    
                                </tr>
                                <?php $no++; } ?> <!-- Akhir While -->
                            </tbody>

                      <?php }else{ ?> <!-- Akhir IF-->
                            <div class="panel-heading"><a href="?modul=waitress&act=add" class="btn btn-primary">Tambah Data</a></div>
                            <div class="panel-body">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode waitress</th>
                                    <th>Nama waitress</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Lahir / Tanggal Lahir</th>
                                    
                                    <th>No HP</th>
                                    <th>Tanggal Bergabung</th>
                                    <th>Aksi</th>
                                   
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                    
                                    $no=1;

                                    $res=mysql_query("SELECT * FROM waitress ORDER BY id_waitress ASC") or die(mysql_error());
                                    while($row=mysql_fetch_array($res)){

                                     
                                ?>
                                <tr class="odd gradeX">
                                    <td align="center"><?php echo $no;?></td>
                                    <td align="center"><?php echo $row['id_waitress'];?></td>
                                    <td align="center"><?php echo $row['nama_waitress'];?></td>
                                    <td align="center"><?php echo $row['jekel'];?></td>
                                    <td align="center"><?php echo $row['tempat_lahir'];?> / <?php echo ubahFormatZ($row['tanggal_lahir']);?></td>
                                    <td align="center"><?php echo $row['nohp_waitress'];?></td>
                                    <td align="center"><?php echo ubahFormatZ($row['tgl_bergabung']);?></td>
                                
                                    <td align="center"><a href="?modul=waitress&act=edit&id=<?php echo $row['id_waitress'];?>"> <i title="rubah" class="fa fa-edit"></i></a> | 
                                    <a href="modul/waitress/hapus.php?id=<?php echo $row['id_waitress'];?>"> <i title="hapus" class="fa fa-trash"></i></a> |</td> 
                                   
                                   
                                </tr>
                                <?php $no++; } ?> <!-- Akhir While-->
                            </tbody>

                            <?php } ?> <!-- Akhir ELSE IF-->

                        </table>

                    </div>
                </div>
<?php 

    break;
    case "add":

  $queryPeriksa = mysql_query("SELECT * FROM waitress");
  $di=1;
  $tot = array();
  while($row = mysql_fetch_row($queryPeriksa)) {
    $tot[$di]=str_replace('W00','',$row[0]);
    $di++;
  }
  if(count($tot)==0){
    $akhir=1;
  }else{
    $akhir = max($tot);
    $akhir++;
  }
  $kode = "W00".$akhir;

?>
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
        <div class="page-header"><h1>Data Waitress</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Input Data Waitress</div>
                        <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/waitress/simpan.php" method="POST">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Kode Waitress</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" readonly name="id_waitress" required value="<?php echo $kode;?>">
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nomor Identitas</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyup="validAngka(this)"  class="form-control form-control-flat" autofocus placeholder='Nomor Identitas Waitress KTP/SIM/Kartu Pelajar' maxlength="17" name="nik" value="" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Lengkap</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" onkeyup="validHuruf(this)"  placeholder='Nama Lengkap Waitress' name="nama_waitress" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-7">
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-6" name="jekel" type="radio" checked="" value="Laki-laki">
                                            Laki-laki
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-7" name="jekel" type="radio" value="Perempuan">
                                            Perempuan
                                        </div>
                                    </div>
                                  </div>
                                  <hr class="dotted">

									<div class="form-group">
                                    <label class="col-sm-2 control-label">Tempat Lahir</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" placeholder='Tempat Lahir Waitress' name="tempat_lahir" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">


                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control inputmask" name="tanggal_lahir" placeholder='Tanggal Lahir Waitress' data-inputmask="'alias': 'date'" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">


                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" placeholder='Alamat Lengkap Waitress' name="alamat_waitress" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Telp/HP</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyup="validAngka(this)" class="form-control form-control-flat" placeholder='Nomor Telepon/HP Waitress' maxlength="12" name="nohp_waitress" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">


									<div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal Bergabung</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control inputmask" name="tgl_bergabung" placeholder='Tanggal Bergabung' data-inputmask="'alias': 'date'" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">
								
                                
                                <!--
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Pekerjaan</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" placeholder='Pekerjaan Pasien' name="pekerjaan" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">
								-->
                                
                                
                                  <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-7">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-danger" onclick=location.href='?modul=waitress'>Batal</button>
                                  </div>
                                  </div>

                            </form>

                        </div>
                    </div>
                 </div>
            
            </div>

<?php 

    break;
    case "edit":

    $id=$_GET['id'];

    $q=mysql_query("SELECT * FROM waitress WHERE id_waitress='$id'") or die(mysql_error());
    $row=mysql_fetch_array($q);

?>

        <div class="page-header"><h1>Data Waitress</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Ubah Data Wasir</div>
                        <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/waitress/ubah.php" method="POST">
                                  <input type="hidden" name="id_waitress" value="<?php echo $row['id_waitress'];?>">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Kode Waitress</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" name="id_waitress" value="<?php echo $row['id_waitress'];?>" disabled>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nomor Identitas</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyup="validAngka(this)"  class="form-control form-control-flat" maxlength="17" name="nik"  value="<?php echo $row['nik'];?>" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Lengkap</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" name="nama_waitress" value="<?php echo $row['nama_waitress'];?>" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                   <div class="form-group">
                                    <label class="col-sm-2 control-label">Jenis Kelamin</label>
                                    <?php if($row['jekel']=='Laki-laki'){ ?>
                                    <div class="col-sm-7">
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-6" name="jekel" type="radio" checked="" value="Laki-laki">
                                            Laki-laki
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-7" name="jekel" type="radio" value="Perempuan">
                                            Perempuan
                                        </div>
                                    </div>
                                    <?php }else{ ?>
                                    <div class="col-sm-7">
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-6" name="jekel" type="radio" value="Laki-laki">
                                            Laki-laki
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-7" name="jekel" type="radio" checked="" value="Perempuan">
                                            Perempuan
                                        </div>
                                    </div>
                                    <?php } ?>
                                  </div>

                                  <hr class="dotted">
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Tempat Lahir</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" name="tempat_lahir" required value="<?php echo $row['tempat_lahir'];?>">
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control inputmask" name="tanggal_lahir" data-inputmask="'alias': 'date'" value="<?php echo ubahFormatZ($row['tanggal_lahir']);?>" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                 

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" name="alamat_waitress" required value="<?php echo $row['alamat_waitress'];?>">
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Telp/HP</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyup="validAngka(this)" class="form-control form-control-flat" name="nohp_waitress" required value="<?php echo $row['nohp_waitress'];?>">
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal Bergabung</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control inputmask" name="tgl_bergabung" data-inputmask="'alias': 'date'" value="<?php echo ubahFormatZ($row['tgl_bergabung']);?>" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">
<!--
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Pekerjaan</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" name="pekerjaan" required value="<?php //echo $row['pekerjaan'];?>">
                                    </div>
                                  </div>
                                  <hr class="dotted">
                                  -->

                                  <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-7">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-danger" onclick=location.href='javascript:history.back(-1)'>Batal</button>
                                  </div>
                                  </div>
                                                                    
                          </form>

                        </div>
                    </div>
                 </div>
            
            </div>

<?php } ?>