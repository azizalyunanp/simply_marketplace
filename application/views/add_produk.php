         <div class="col-sm-9 col-lg-9 col-md-9">
        <?php if(isset($error)) { 
          echo "<div class='alert alert-danger alert-dismissable fade in'>
                <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>$error</strong>.
                </div>"; 
          }

          if(isset($_GET['status']) && $_GET['status']=='sukses') {
            echo "<div class='alert alert-success alert-dismissable fade in'>
            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Berhasil menambahkan produk</strong>.
                </div>"; 
          } 
        ?>
         <form method="post" class="form-horizontal" action="<?=site_url('home/add_produk');?>" enctype="multipart/form-data">
            <div class="panel panel-default"> <!--PANEL 1 -->
              <div class="panel-heading">Apa yang anda jual</div>
              <div class="panel-body">
                
                  <div class="form-group">
                    <label class="col-sm-2">Nama Produk</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="nama_brg">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2">Kategori</label>
                    <div class="col-sm-6">
                      <select class="form-control" name="kategori">
                      <?php
                        foreach ($kategori as $k) {
                          echo "<option value=$k->id_kategori>$k->kategori</option>";
                      } ?>
                      </select>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-2">Deskripsi</label>
                    <div class="col-sm-6">
                      <textarea class="form-control" name="deskripsi"></textarea>
                    </div>
                    </div>
                  </div>
                </div>

                <div class="panel panel-default"> <!--PANEL 2-->
                  <div class="panel-heading">Gambar Produk</div>
                    <div class="panel-body">
                      <div class="form-group">
                      <label class="col-sm-2">Gambar</label>
                        <div class="col-sm-6">
                        <input type="file" class="form-control" name="gambar">
                        </div>
                      </div>
                    </div>
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading">Detil Produk</div>
                  <div class="panel-body">
                    <div class="form-group">
                      <label class="col-sm-2">Harga</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="harga">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2">Status</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="status">
                          <option>Stok Tersedia</option>
                          <option>Stok Kosong</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2">Berat</label>
                      <div class="col-sm-2">
                        <select class="form-control" name="d_berat">
                          <option>Gram</option>
                          <option>Kilogram</option>
                        </select>
                      </div>
                      <div class="col-sm-4">
                        <input type="number" class="form-control" name="berat">
                      </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2">Kondisi</label>
                        <div class="col-sm-4">
                          <select class="form-control" name="kondisi">
                            <option>Baru</option>
                            <option>Bekas</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="pull-right">
                          <button class="btn btn-danger">Batal</button>
                          <button class="btn btn-success" type="submit">Simpan & Tambah Baru</button>
                        </div>
                      </div>
                </div>
             </div> <!--CLOSE PANEL-->
      </form>
</div>
</div>