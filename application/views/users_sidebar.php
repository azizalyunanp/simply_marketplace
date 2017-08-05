  <div class="row">
      <div class="container">
        <div class="col-sm-3" style="min-height: 700px;">
          <div class="panel panel-default">
              <div class="panel-heading">Profil Saya</div>
                <div class="panel-body">
                    <h4>
                      <a href="<?=base_url('users');?>"><?=$this->session->userdata('username');?></a>
                    </h4>
                </div>
          </div> <br>
          <div class="panel panel-default">
              <div class="panel-heading">Toko Saya</div>
                <div class="panel-body">
                    <table class="table table-stripped">
                    <?php
                      if($toko['nama_toko']=="") {
                        echo "<strong>BELUM ADA TOKO</strong><br><br>";
                        echo "<a href=".base_url('home/tambah_toko')." class='btn btn-primary'><i class='fa fa-plus'></i> Buat Toko</a>";
                      } else {
                      ?>
                         <tr>
                            <td><strong><?=$toko['nama_toko'];?></strong></td>
                        </tr>
                        <tr>
                          <td><a href="">Penjualan</a></td>
                        </tr>
                        <tr>
                          <td><a href="<?=base_url('tambah_produk');?>">Tambah Produk</a></td>
                        </tr>
                        <tr>
                          <td><a href="<?=base_url('view_produk');?>">Daftar Produk</a></td>
                        </tr>
                        <tr>
                          <td><a href="">Laporan Penjualan</a></td>
                        </tr>
                      <?php } ?>
                    </table>
                      
                </div>
          </div>

          <div class="panel panel-default">
              <div class="panel-heading">PROFIL SAYA</div>
                <div class="panel-body">
                    <table class="table table-stripped">
                         <tr>
                            <td><a href="">Pembelian</a></td>
                        </tr>
                        <tr>
                          <td><a href="">Pengaturan</a></td>
                        </tr>
                    </table>
                      
                </div>
          </div>
          </div>