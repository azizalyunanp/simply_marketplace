
      <div class="row">
      <div class="container">
        <div class="col-sm-12">
          <div class="col-sm-2">
            <img class="img-responsive" src="https://ecs12.tokopedia.net/newimg/cache/300/default_v3-usrnophoto1.png" width="200" height="200">
          </div>

          <div class="col-sm-10">
            <ul class="list-group">
            <?php
              foreach ($users as $u) {
            ?>
              <li class="list-group-item"><strong><?=$u->nama_lengkap;?></strong>
                  <a class="btn btn-primary btn-sm" href='<?=base_url("home/$u->username");?>'><i class="fa fa-wrench"></i> Edit</a>
              </li>
              <li class="list-group-item"><i class="fa fa-envelope"></i> <?=$u->email;?></li>
              <li class="list-group-item"><i class="fa fa-birthday-cake"></i> <?=$u->tgl_lahir;?></li>
              <li class="list-group-item"><i class="fa fa-home"></i> <?=$u->alamat;?></li>
            <?php } ?>
            </ul>
          </div>
          </div>
          <div class="col-sm-12">
          <br>
          <div class="panel-group">
            <div class="panel panel-default">
              <div class="panel-heading">Toko Saya</div>
              <div class="panel-body">
                <?php
                  $toko = $toko['nama_toko'];
                  if($toko == "") {
                    echo "<strong>BELUM ADA TOKO</strong><br><br>";
                    echo "<a href=".base_url('home/tambah_toko')." class='btn btn-primary'><i class='fa fa-plus'></i> Tambah Toko</a>";
                  } else {
                    echo $toko;
                  }
                ?>
              </div>
            </div>
          </div>
          </div>
      </div>
      </div>
   