<?php 
include "config/koneksi.php";
include "config/ubah_tanggal.php";

switch($_GET['act']){
default:

?>
            <div class="page-header"><h1>Data User</h1></div>
            
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="?modul=user&act=add" class="btn btn-primary">Tambah Data</a></div>
                    <div class="panel-body">
                    
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID User</th>
                                    <th>Nama Lengkap</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    
                                    $no=1;

                                    $res=mysql_query("SELECT * FROM user ORDER BY iduser ASC") or die(mysql_error());
                                    while($row=mysql_fetch_array($res)){

                                ?>
                                <tr class="odd gradeX">
                                    <td align="center"><?php echo $no;?></td>
                                    <td align="center"><?php echo $row['iduser'];?></td>
                                    <td align="center"><?php echo $row['namauser'];?></td>
                                    <td align="center"><?php echo $row['username'];?></td>
                                    <td align="center" class="center"><?php echo $row['level'];?></td>
                                    <td align="center" class="center">
                                    <?php if($row['iduser']=='U001') {  ?>
                                    Tidak Bisa Dirubah
                                    <?php } else{ ?>
                                    <a href="?modul=user&act=edit&id=<?php echo $row['iduser'];?>"> <i class="fa fa-edit"></i> </a> | 
                                    <a href="modul/user/hapus.php?id=<?php echo $row['iduser'];?>"> <i class="fa fa-trash"></i></a>
                                    <?php }?>
                                    </td>
                                </tr>
                                <?php $no++; } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
<?php 

    break;
    case "add":

    

  $queryPeriksa = mysql_query("SELECT * FROM user");
  $di=1;
  $tot = array();
  while($row = mysql_fetch_row($queryPeriksa)) {
    $tot[$di]=str_replace('U00','',$row[0]);
    $di++;
  }
  if(count($tot)==0){
    $akhir=1;
  }else{
    $akhir = max($tot);
    $akhir++;
  }
  $kode = "U00".$akhir;

?>

        <div class="page-header"><h1>Data User</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Input Data User</div>
                        <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/user/simpan.php" method="POST">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">ID User</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" name="iduser" readonly required value="<?php echo $kode;?>">
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Lengkap</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" name="namauser" value="" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" name="username" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                   <div class="form-group">
                                    <label class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-7">
                                      <input type="password" class="form-control form-control-flat" name="password" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Level</label>
                                    <div class="col-sm-7">
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-6" name="level" type="radio" checked="" value="pelayanan">
                                            Kasir
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-7" name="level" type="radio" value="admin">
                                            Superuser
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-6" name="level" type="radio" value="admin_pembayaran">
                                            Admin Pembayaran
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-7" name="level" type="radio" value="pimpinan">
                                            Pimpinan
                                        </div>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-7">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-danger" onclick=location.href='?modul=user'>Batal</button>
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

    $q=mysql_query("SELECT * FROM user WHERE iduser='$id'") or die(mysql_error());
    $row=mysql_fetch_array($q);

?>

        <div class="page-header"><h1>Data User</h1></div>

            <div class="row">
            
              <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Ubah Data User</div>
                        <div class="panel-body">
                          
                            <form class="form-horizontal" role="form" action="modul/user/ubah.php" method="POST">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">ID User</label>
                                    <div class="col-sm-7">
                                      <input type="hidden" name="iduser" value="<?php echo $row['iduser']; ?>">
                                      <input type="text" class="form-control form-control-flat" name="idusers" required value="<?php echo $row['iduser'];?>" disabled>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Lengkap</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" name="namauser" value="<?php echo $row['namauser'];?>" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control form-control-flat" name="username" value="<?php echo $row['username'];?>" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                   <div class="form-group">
                                    <label class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-7">
                                      <input type="password" class="form-control form-control-flat" name="password" value="<?php echo $row['password'];?>" required>
                                    </div>
                                  </div>
                                  <hr class="dotted">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Level</label>
                                    <?php if($row['level']=='kasir'){ ?>
                                    <div class="col-sm-7">
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-6" name="level" type="radio" checked="" value="kasir">
                                            Kasir
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-7" name="level" type="radio" value="admin">
                                            Superuser
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-6" name="level" type="radio" value="admin_pembayaran">
                                            Admin Pembayaran
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-7" name="level" type="radio" value="pimpinan">
                                            Pimpinan
                                        </div>
                                    </div>
                                    <?php }elseif($row['level']=='superuser'){ ?>
                                    <div class="col-sm-7">
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-6" name="level" type="radio" value="kasir">
                                            Kasir
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-7" name="level" type="radio" checked="" value="admin">
                                            Superuser
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-6" name="level" type="radio" value="admin_pembayaran">
                                            Admin Pembayaran
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-7" name="level" type="radio" value="pimpinan">
                                            Pimpinan
                                        </div>
                                    </div>
                                    <?php }elseif($row['level']=='admin_pembayaran'){ ?>
                                    <div class="col-sm-7">
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-6" name="level" type="radio" value="pelayanan">
                                            Pelayanan
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-7" name="level" type="radio" value="admin">
                                            Admin
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-6" name="level" type="radio" checked="" value="admin_pembayaran">
                                            Admin Pembayaran
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-7" name="level" type="radio" value="pimpinan">
                                            Pimpinan
                                        </div>
                                    </div>
                                    <?php }elseif($row['level']=='pimpinan'){ ?>
                                    <div class="col-sm-7">
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-6" name="level" type="radio" value="pelayanan">
                                            Pelayanan
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-7" name="level" type="radio" value="admin">
                                            Admin
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-6" name="level" type="radio" value="admin_pembayaran">
                                            Admin Pembayaran
                                        </div>
                                        <div class="switch-button showcase-switch-button">
                                            <input id="switch-button-7" name="level" type="radio" checked="" value="pimpinan">
                                            Pimpinan
                                        </div>
                                    </div>
                                    <?php } ?>
                                  </div>

                                  <hr class="dotted">

                                  <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-7">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-danger" onclick=location.href='?modul=user'>Batal</button>
                                  </div>
                                  </div>
                                                                    
                          </form>

                        </div>
                    </div>
                 </div>
            
            </div>

<?php } ?>