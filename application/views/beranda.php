          <div class="pull-right">
            <form method="post" class="form-inline">
            <div class="form-group">
              <input type="text" class="form-control" name="search">
            </div>
            <div class="form-group">
              <select class="form-control" name="kategori">
                <option value="*">Semua Kategori</option>
                <?php
                  foreach ($kategori as $k) {
                    echo "<option value=$k->id_kategori>$k->kategori</option>";
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit">Cari</button>
            </div>
            </form>
          </div>
            <br><br>
         <?php
          foreach ($produk as $p) {
        ?>
        <div class="col-sm-3 col-lg-3 col-md-3">
            <div class="thumbnail">
               <img src='<?=base_url("gambar/$p->photo");?>' alt="" class="img-responsive" width="250" height="250">
               <div class="caption">
                  <p class="p-header"><a href='<?=base_url("detail_product/$p->id_brg");?>'><?=$p->nama_brg;?></a></p>
                  <p class="p-cost">Rp <?=number_format($p->harga,0,".",".");?></p>
                  <p class="p-store"><i class="fa fa-home"></i> <?=$p->nama_toko;?></p>
                  <p class="p-store"><i class="fa fa-map-marker"></i> <?=$p->province .', ' .$p->city;?></p>
               </div>
            </div>
        </div>
      <?php } ?>

      
      </div>
      </div>
   