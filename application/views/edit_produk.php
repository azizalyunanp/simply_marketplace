         <div class="col-sm-9 col-lg-9 col-md-9">
         <form method="post" class="form-horizontal" action="<?=site_url('home/update_product');?>" enctype="multipart/form-data">

            <div class="panel panel-default"> <!--PANEL 1 -->
              <div class="panel-heading">Edit Produk</div>
              <div class="panel-body">
                <?php foreach ($produk as $p) { ?>  
                  <div class="form-group">
                    <label class="col-sm-2">Nama Produk</label>
                    <div class="col-sm-6">
                      <input type="hidden" class="form-control" name="id_brg" value="<?=$p->id_brg;?>">
                      <input type="text" class="form-control" name="nama_brg" value="<?=$p->nama_brg;?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2">Kategori</label>
                    <div class="col-sm-6">
                      <select class="form-control" name="kategori">
                      <option value="<?=$p->id_kategori;?>"><?=$p->kategori;?></option>
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
                      <textarea class="form-control" name="deskripsi"><?=$p->deskripsi;?></textarea>
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
                        <img class="img-responsive" width="100" height="100" src='<?=base_url("gambar/$p->photo");?>'>
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
                        <input type="text" class="form-control" name="harga" value="<?=$p->harga;?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2">Status</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="status">
                        <?php if($p->status=='Stok Tersedia') { ?>
                          <option><?=$p->status;?></option>
                          <option>Stok Kosong</option>
                        <?php } else { ?>
                        <option>Stok Kosong</option>
                        <option>Stok Tersedia</option>
                        <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2">Berat</label>
                      <div class="col-sm-2">
                        <select class="form-control" name="d_berat">
                        <?php
                          if($p->j_berat=='Gram') { 
                          echo "<option>Gram</option>
                          <option>Kilogram</option>"; 
                        } else {
                          echo "<option>Kilogram</option>
                          <option>Gram</option>"; 
                        }
                        ?>
                        </select>
                      </div>
                      <div class="col-sm-4">
                        <input type="number" class="form-control" name="berat" value="<?=$p->berat;?>">
                      </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2">Kondisi</label>
                        <div class="col-sm-4">
                          <select class="form-control" name="kondisi">
                          <?php if($p->kondisi=='Baru') { ?>
                            <option><?=$p->kondisi;?></option>
                            <option>Bekas</option>
                          <?php } else {  ?>
                          <option><?=$p->kondisi;?></option>
                          <option>Baru</option>
                          <?php } ?>
                          </select>
                        </div>
                      </div>
                  <?php } ?>
                      <div class="form-group">
                        <div class="pull-right">
                          <button class="btn btn-danger">Batal</button>
                          <button class="btn btn-success" type="submit">Update data</button>
                        </div>
                      </div>
                </div>
             </div> <!--CLOSE PANEL-->
      </form>
</div>
</div>