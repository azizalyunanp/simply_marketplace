
      <div class="jumbotron hero-technology">
        <h1 class="hero-title">MarketPlace </h1>
        <p class="hero-subtitle">Kemudahan dalam bertransaksi jual beli online</p>
      </div>
      <div class="row">
      <div class="container">
      <h3 class="text-left text-danger">Kategori </h3>
        <div class="col-sm-3">
         <ul class="list-group">
          <?php 
          foreach ($kategori as $k) { ?>
            <li class="list-group-item"><a href='<?=site_url("product/kategori/$k->id_kategori");?>'><?=$k->kategori;?></a></li>
          <?php } ?>
         </ul>
         </div>
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
               <img src='<?=base_url("gambar/$p->photo");?>' alt="" class="img-responsive" width="300" height="300">
               <div class="caption">
                  <p class="p-header"><a href='<?=base_url("detail_product/$p->id_brg");?>'><?=$p->nama_brg;?></a></p>
                  <p class="p-cost">Rp <?=number_format($p->harga,0,".",".");?></p>
                  <p><?=substr($p->deskripsi,0,15);?> . . . </p>
                  <p class="p-store"><i class="fa fa-home"></i> Toko A</p>
                  <p class="p-store"><i class="fa fa-marker"></i> Lokasi </p>
               </div>
            </div>
        </div>
      <?php } ?>
      </div>
      </div>
   