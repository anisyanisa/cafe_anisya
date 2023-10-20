<?php 
include "config/koneksi.php";
include "config/ubah_tanggal.php";

switch($_GET['act']){
default:

?>
            <div class="page-header"><h1><img width="70px" src="assets/images/avtar/Dining.png" alt="...">Data Kasir</h1></div>
            
                <div class="panel panel-default">
                   
                   

                    <?php if($r['level']=='pimpinan'){ ?>
                        <div class="panel-body">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Kasir</th>
                                    <th>Nomor Identitas</th>
                                    <th>Nama Kasir</th>
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

                                    $res=mysqli_query($conn,"SELECT * FROM kasir ORDER BY kd_kasir ASC") or die(mysqli_error($conn));
                                    while($row=mysqli_fetch_array($res)){

                                     
                                ?>
                                <tr class="odd gradeX">
                                    <td align="center"><?php echo $no;?></td>
                                    <td align="center"><?php echo $row['kd_kasir'];?></td>
                                    <td align="center"><?php echo $row['nik'];?></td>
                                    <td align="center"><?php echo $row['nama_kasir'];?></td>
                                    <td align="center"><?php echo $row['jekel'];?></td>
                                    <td align="center"><?php echo $row['tempat_lahir'];?></td>
                                    <td align="center"><?php echo ubahFormatZ($row['tanggal_lahir']);?></td>
                                    <td align="center"><?php echo $row['alamat_kasir'];?></td>
                                    <td align="center"><?php echo $row['nohp_kasir'];?></td>
                                    <td align="center"><?php echo ubahFormatZ($row['tgl_bergabung']);?></td>
                                    
                                    
                                </tr>
                                <?php $no++; } ?> <!-- Akhir While -->
                            </tbody>

                      <?php }else{ ?> <!-- Akhir IF-->
                            <div class="panel-heading"><a href="?modul=kasir&act=add" class="btn btn-primary">Tambah Data</a></div>
                            <div class="panel-body">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Kasir</th>
                                    <th>Nama Kasir</th>
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

                                    $res=mysqli_query($conn,"SELECT * FROM kasir ORDER BY kd_kasir ASC") or die(mysqli_error($conn));
                                    while($row=mysqli_fetch_array($res)){

                                     
                                ?>
                                <tr class="odd gradeX">
                                    <td align="center"><?php echo $no;?></td>
                                    <td align="center"><?php echo $row['kd_kasir'];?></td>
                                    <td align="center"><?php echo $row['nama_kasir'];?></td>
                                    <td align="center"><?php echo $row['jekel'];?></td>
                                    <td align="center"><?php echo $row['tempat_lahir'];?> / <?php echo ubahFormatZ($row['tanggal_lahir']);?></td>
                                    <td align="center"><?php echo $row['nohp_kasir'];?></td>
                                    <td align="center"><?php echo ubahFormatZ($row['tgl_bergabung']);?></td>
                                
                                    <td align="center"><a href="?modul=kasir&act=edit&id=<?php echo $row['kd_kasir'];?>"> <i title="rubah" class="fa fa-edit"></i></a> | 
                                    <a href="modul/kasir/hapus.php?id=<?php echo $row['kd_kasir'];?>"> <i title="hapus" class="fa fa-trash"></i></a> |</td> 
                                   
                                   
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

  $queryPeriksa = mysqli_query($conn,"SELECT * FROM kasir");
  $di=1;
  $tot = array();
  while($row = mysqli_fetch_row($queryPeriksa)) {
    $tot[$di]=str_replace('P00','',$row[0]);
    $di++;
  }
  if(count($tot)==0){
    $akhir=1;
  }else{
    $akhir = max($tot);
    $akhir++;
  }
  $kode = "P00".$akhir;

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
        <div class="page-header"><h1>Data Kasir</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Input Data Kasir</div>
                        <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/kasir/simpan.php" method="POST">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Kode Kasir</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" readonly name="kd_kasir" required value="<?php echo $kode;?>">
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nomor Identitas</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyup="validAngka(this)"  class="form-control form-control-flat" autofocus placeholder='Nomor Identitas Kasir KTP/SIM/Kartu Pelajar' maxlength="17" name="nik" value="" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Lengkap</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" onkeyup="validHuruf(this)"  placeholder='Nama Lengkap Kasir' name="nama_kasir" required>
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
                                      <input type="text" class="form-control form-control-flat" placeholder='Tempat Lahir Kasir' name="tempat_lahir" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">


                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control inputmask" name="tanggal_lahir" placeholder='Tanggal Lahir Kasir' data-inputmask="'alias': 'date'" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">


                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" placeholder='Alamat Lengkap Kasir' name="alamat_kasir" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Telp/HP</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyup="validAngka(this)" class="form-control form-control-flat" placeholder='Nomor Telepon/HP Kasir' maxlength="12" name="nohp_kasir" required>
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
                                    <button type="button" class="btn btn-danger" onclick=location.href='?modul=kasir'>Batal</button>
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

    $q=mysqli_query($conn,"SELECT * FROM kasir WHERE kd_kasir='$id'") or die(mysqli_error($conn));
    $row=mysqli_fetch_array($q);

?>

        <div class="page-header"><h1>Data Kasir</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Ubah Data Kasir</div>
                        <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/kasir/ubah.php" method="POST">
                                  <input type="hidden" name="kd_kasir" value="<?php echo $row['kd_kasir'];?>">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Kode Kasir</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" name="kd_kasir" value="<?php echo $row['kd_kasir'];?>" disabled>
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
                                      <input type="text" class="form-control form-control-flat" name="nama_kasir" value="<?php echo $row['nama_kasir'];?>" required>
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
                                      <input type="text" class="form-control form-control-flat" name="alamat_kasir" required value="<?php echo $row['alamat_kasir'];?>">
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Telp/HP</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyup="validAngka(this)" class="form-control form-control-flat" name="nohp_kasir" required value="<?php echo $row['nohp_kasir'];?>">
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