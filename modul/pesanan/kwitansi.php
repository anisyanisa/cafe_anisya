<?php

include "config/koneksi.php";
include "config/ubah_tanggal.php";

$id = $_GET['no_trans'];


$c = mysqli_query($conn, "select * from pesanan_temp where no_meja='$id'");

$row = mysqli_fetch_assoc($c);

$ncekin = $row['no_transaksi'];

?>


<div class="page-header">
</div>

<div class="row">

  <div class="col-md-6">

    <address>
      Bukti Pembayaran
      <hr>
    </address>



  </div>

</div>

<div class="row">


  <?php
  /*
                                  $datetime1 = strtotime($row['tanggalmasuk']);
                                  $datetime2 = strtotime($row['tanggalcekout']);
                                  $selisih = $datetime2 - $datetime1;
                                  $lama = $selisih / (60*60*24);
  */
  ?>


</div>
<table>
  <tr>
    <td width="500">
      <form class="form-horizontal" role="form" action="?modul=bayar&no_trans=<?php echo $_GET['no_trans']; ?>" method="POST">
        <div class="panel-body">

          <?php



          ?>
          <font size="-4">

            <table cellpadding="0" cellspacing="0" border="0">


              <tr>
                <td colspan="2">
                  <font size="-4"><strong>Berry's Coffee and Food</strong><br />
                    Jalan Dr. Sutomo<br />
                    Padang, Sumatera Barat<br />
                    Open 9 a.m - 11 p.m</font>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>

                <td width="86">
                  <font size="-4">Transaksi</font>
                </td>
                <td width="26">
                  <input type="hidden" name="no_transaksi" value="<?php echo $row['no_transaksi']; ?>">
                  <?php echo $row['no_transaksi']; ?>
                </td>
              </tr>
              <tr>
                <td>
                  <font size="-4">Tanggal</font>
                </td>
                <td><?php echo ubahFormatZ($row['tgl_transaksi']); ?>
                  <input name="tgl_transaksi" type="hidden" id="tgl_transaksi" value="<?php echo $row['tgl_transaksi']; ?>" />
                </td>

              </tr>
              <tr>
                <td>
                  <font size="-4">Kasir</font>
                </td>
                <td><?php echo $row['kd_kasir']; ?></td>

              </tr>
              <tr>
                <td>
                  <font size="-4">Meja</font>
                </td>
                <td><?php echo $row['no_meja']; ?></td>

              </tr>

            </table>
          </font>
          <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered thead">


            <tbody>
              <tr>
                <th colspan="2">Rincian Pesanan</th>
              </tr>


              <?php


              //echo $ncekin;

              $no = 1;
              $totals = 0;
              $res = mysqli_query($conn, "SELECT * from pesanan_temp where no_meja='$_GET[no_trans]'
                                      ") or die(mysqli_error($conn));

              while ($rows = mysqli_fetch_array($res)) {

                $menu = mysqli_query($conn, "select * from menu where id_menu='$rows[id_menu]'");
                $rmenu = mysqli_fetch_array($menu);

                $total = $rows['qty'] * $rmenu['harga'];

                $totals = $totals + $total;

              ?>

                <tr class="odd gradeX">

                  <td colspan="2"></td>


                </tr>

                <tr class="odd gradeX">
                  <td><?php echo $rmenu['nama_menu']; ?></td>
                  <td><?php echo $rows['qty']; ?> x <?php echo number_format($rmenu['harga'], 0, '', '.'); ?></td>
                </tr>

              <?php  } ?>

            </tbody>
            <tfoot>
              <tr>
                <td>Sub Total</td>
                <td>Rp. <?php echo number_format($totals, 0, '', '.'); ?></td>
              </tr>

              <?php
              $ppn = 0.10 * $totals;
              ?>
              <tr>
                <td>PPN (10%)</td>
                <td>Rp. <?php echo number_format($ppn, 0, '', '.'); ?>
                  <input type="hidden" name="ppn" id="hiddenField" value="<?php echo $ppn; ?>" />
                </td>
              </tr>
              <tr>
                <td>Diskon (%)</td>

                <td><input class="form-control form-control-flat" name="diskon" type="text" required="required" id="diskon" placeholder="Diskon" onkeyup="validAngka(this)" value="" size="4" />
                  <div align="center">

                </td>
              </tr>
              <tr>
                <td>VIP Fee</td>
                <td><input class="form-control form-control-flat" name="vip" type="text" required="required" id="vip" placeholder="VIP" onkeyup="validAngka(this)" value="" size="8" /></td>
              </tr>
              <tr>
                <td colspan="2"></td>

              </tr>
              <?php
              $grandtotal = $totals;
              ?>

              <tr>
                <td valign="top">Bayar</td>
                <td>

                  <div class="form-group">
                    <div class="col-sm-7" style="overflow:auto; height:200px">

                      <?php //$n++; } 
                      ?>


                    </div>
                  </div>
                  <hr class="dotted">


                </td>
              </tr>
            </tfoot>
          </table>


        </div>




        <div class="row">
          <div class="col-lg-6"> <!--<button class="btn btn-warning" type="button" href="javascript:void(0);" onclick="javascript:window.print();">Cetak Kartu</button>-->

            <!--<a href="?modul=cetak&no_trans=<?php //echo $_GET['no_trans'];
                                                ?>&bayar=<?php //echo $_POST['bayar']; 
                                                                                        ?>" class="btn btn-primary">Cetak Bukti</a>
                    -->

            <button type="submit" class="btn btn-primary" onclick="">Bayar</button>
            <button type="button" class="btn btn-danger" onclick=location.href='<?php echo "javascript:history.back(-1)"; ?>'>Kembali</button>
          </div>

        </div>
      </form>
    </td>
    <td>
      <script language="JavaScript" type="text/javascript">
        <!--
        function hitung() {
          var myForm = document.formdiskon;
          var x = eval(myForm.x.value);
          var y = eval(myForm.y.value);
          var hasil = x - (x * (y / 100));
          myForm.hasil.value = hasil;
        }

        //
        -->
      </script>
      <font size="-4">
        <form name="formdiskon" action="#">

          Kalkulator Diskon : <br />
          <p> SubTotal :
            <input type="text" name="x" />
          </p>
          <p>Diskon
            :
            <input type="text" name="y" />
            <font color="#FF0000">&nbsp;*isi diskonnya disini</font>
          </p>
          <p>Hasil : <input type="text" name="hasil" /></p>
          <p>
            <input type="button" value="HITUNG" onClick="hitung()" />
        </form>
      </font>
    </td>
  </tr>
</table>