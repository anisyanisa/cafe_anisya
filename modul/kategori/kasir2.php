<?php 
include "config/koneksi.php";
include "config/ubah_tanggal.php";

switch($_GET['act']){
default:

?>
            <div class="page-header"><h1><img width="70px" src="assets/images/avtar/logo_rsa.png" alt="...">Data Pasien</h1></div>
            
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
                                    <th>Tempat Lahir/Tanggal Lahir</th>
                                    
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Tanggal Bergabung</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                    
                                    $no=1;

                                    $res=mysql_query("SELECT * FROM pasien ORDER BY idpasien ASC") or die(mysql_error());
                                    while($row=mysql_fetch_array($res)){

                                     
                                ?>
                                <tr class="odd gradeX">
                                    <td align="center"><?php echo $no;?></td>
                                    <td align="center"><?php echo $row['idpasien'];?></td>
                                    <td align="center"><?php echo $row['nik'];?></td>
                                    <td align="center"><?php echo $row['namapasien'];?></td>
                                    <td align="center"><?php echo ubahFormatZ($row['tgllahir']);?></td>
                                    <td align="center"><?php echo $row['jeniskelamin'];?></td>
                                    <td align="center"><?php echo $row['telp'];?></td>
                                    <td>
                                      <?php if($row['status'] =='Inap'){ ?>

                                      <span class="label label-success">Inap</span>
                                      
                                      <?php }elseif($row['status']=='Jalan'){ ?>
                                      
                                      <span class="label label-warning">Jalan</span>

                                      <?php }elseif($row['status']=='Keluar'){ ?>
                                      
                                      <span class="label label-danger">Keluar</span>

                                      <?php }else{ ?>
                                      -
                                      <?php } ?>

                                    </td>
                                </tr>
                                <?php $no++; } ?>
                            </tbody>

                      <?php }else{ ?>
                            <div class="panel-heading"><a href="?modul=pasien&act=add" class="btn btn-primary">Tambah Data</a></div>
                            <div class="panel-body">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Kasir</th>
                                   	<th>Nomor Identitas</th>
                                    <th>Nama Kasir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Lahir/Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Tanggal Bergabung</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                    
                                    $no=1;

                                    $res=mysql_query("SELECT * FROM kasir ORDER BY kd_kasir ASC") or die(mysql_error());
                                    while($row=mysql_fetch_array($res)){

                                     
                                ?>
                                <tr class="odd gradeX">
                                    <td align="center"><?php echo $no;?></td>
                                    <td align="center"><?php echo $row['kd_kasir'];?></td>
                                    <td align="center"><?php echo $row['nik'];?></td>
                                    <td align="center"><?php echo $row['nama_kasir'];?></td>
                                    <td align="center"><?php echo $row['jekel'];?></td>
                                    <td align="center"><?php echo $row['tempat_lahir'];?> / <?php echo $row['tanggal_lahir'];?></td>
                                    <!-- <td align="center"><?php //echo $row['tanggal_lahir'];?></td> -->
                                    <td align="center"><?php echo $row['alamat_kasir'];?></td>
                                    <td align="center"><?php echo $row['nohp_kasir'];?></td>
                                    <td align="center"><?php echo ubahFormatZ($row['tgl_bergabung']);?></td>
                                   
                                        
                                    <td align="center"><a href="?modul=pasien&act=edit&id=<?php echo $row['idpasien'];?>"> <i title="rubah" class="fa fa-edit"></i></a> | 
                                    <a href="modul/pasien/hapus.php?id=<?php echo $row['idpasien'];?>"> <i title="hapus" class="fa fa-trash"></i></a> | 
                                    <a href="modul/pasien/kartu.php?id=<?php echo $row['idpasien'];?>" target="_blank"> <i title="cetak kartu berobat" class="fa fa-file"></i></a> |
                                   </td>
                                </tr>
                                <?php $no++; } ?>
                            </tbody>

                            <?php } ?>

                        </table>

                    </div>
                </div>
<?php 

    break;
    case "add":

  $queryPeriksa = mysql_query("SELECT * FROM pasien");
  $di=1;
  $tot = array();
  while($row = mysql_fetch_row($queryPeriksa)) {
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
</script>
        <div class="page-header"><h1>Data Pasien</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Input Data Pasien</div>
                        <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/pasien/simpan.php" method="POST">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nomor RM</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" readonly name="idpasien" required value="<?php echo $kode;?>">
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nomor Identitas</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyup="validAngka(this)"  class="form-control form-control-flat" autofocus placeholder='Nomor Identitas Pasien KTP/SIM/Kartu Pelajar' maxlength="17" name="nik" value="" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Lengkap</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" placeholder='Nama Lengkap Pasien' name="namapasien" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control inputmask" name="tgllahir" placeholder='Tanggal Lahir Pasien' data-inputmask="'alias': 'date'" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-7">
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-6" name="kelamin" type="radio" checked="" value="Laki-laki">
                                            Laki-laki
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-7" name="kelamin" type="radio" value="Perempuan">
                                            Perempuan
                                        </div>
                                    </div>
                                  </div>

                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" placeholder='Alamat Lengkap Pasien' name="alamat" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Telp/HP</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyup="validAngka(this)" class="form-control form-control-flat" placeholder='Nomor Telepon/HP Pasien' maxlength="12" name="telp" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Pekerjaan</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" placeholder='Pekerjaan Pasien' name="pekerjaan" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-7">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-danger" onclick=location.href='?modul=pasien'>Batal</button>
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

    $q=mysql_query("SELECT * FROM pasien WHERE idpasien='$id'") or die(mysql_error());
    $row=mysql_fetch_array($q);

?>

        <div class="page-header"><h1>Data Pasien</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Ubah Data Pasien</div>
                        <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/pasien/ubah.php" method="POST">
                                  <input type="hidden" name="idpasien" value="<?php echo $row['idpasien'];?>">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nomor RM</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" name="idpasie" value="<?php echo $row['idpasien'];?>" disabled>
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
                                      <input type="text" class="form-control form-control-flat" name="namapasien" value="<?php echo $row['namapasien'];?>" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control inputmask" name="tgllahir" data-inputmask="'alias': 'date'" value="<?php echo ubahFormatZ($row['tgllahir']);?>" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Jenis Kelamin</label>
                                    <?php if($row['jeniskelamin']=='Laki-laki'){ ?>
                                    <div class="col-sm-7">
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-6" name="kelamin" type="radio" checked="" value="Laki-laki">
                                            Laki-laki
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-7" name="kelamin" type="radio" value="Perempuan">
                                            Perempuan
                                        </div>
                                    </div>
                                    <?php }else{ ?>
                                    <div class="col-sm-7">
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-6" name="kelamin" type="radio" value="Laki-laki">
                                            Laki-laki
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-7" name="kelamin" type="radio" checked="" value="Perempuan">
                                            Perempuan
                                        </div>
                                    </div>
                                    <?php } ?>
                                  </div>

                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" name="alamat" required value="<?php echo $row['alamat'];?>">
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Telp/HP</label>
                                    <div class="col-sm-7">
                                      <input type="text" onkeyup="validAngka(this)" class="form-control form-control-flat" name="telp" required value="<?php echo $row['telp'];?>">
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Pekerjaan</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" name="pekerjaan" required value="<?php echo $row['pekerjaan'];?>">
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-7">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-danger" onclick=location.href='?modul=pasien'>Batal</button>
                                  </div>
                                  </div>
                                                                    
                          </form>

                        </div>
                    </div>
                 </div>
            
            </div>

<?php } ?>