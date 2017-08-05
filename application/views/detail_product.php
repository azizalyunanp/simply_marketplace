<div class="row">
<div class="container">
<?php
	foreach ($product as $p) {
?>
	<div class="col-sm-3 col-md-3 col-xs-3">
		<img src='<?=base_url("gambar/$p->photo");?>' height="300" width="300" class="img-responsive">
	</div>

	<div class="col-sm-5 col-md-5 col-xs-5">
		<h4 style="font-style: 'Calibri';"><?=$p->nama_brg;?></h4>
		<ul class="nav nav-tabs">
		  	<li><a href="#">Informasi Produk</a></li>
		  	<li><a href="#">Ulasan</a></li>
		</ul>
		<table class="table">
			<tr>
				<td><strong>Terjual</strong></td>
				<td><?=$terjual['jumlah'];?></td>
			</tr>
			<tr>
				<td><strong>Kondisi</strong></td>
				<td><?=$p->kondisi;?></td>
			</tr>
			<tr>
				<td><strong>Berat</strong></td>
				<td><?=$p->berat." ".$p->j_berat;?></td>
			</tr>
		</table>

		<br>
		<strong><p class="p-header">DESKRIPSI PRODUK</p></strong>
		<br>
		<p class="p-store"><?=$p->deskripsi;?></p>

	</div>

	<div class="col-sm-4 col-md-4 col-xs-4">
		<div class="panel panel-default">
			<div class="panel-body">
				<center><strong>Rp <?=number_format($p->harga,0,",",".");?></strong></center>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<button class="btn btn-success btn-lg btn-block" type="button" onclick="modal_cart()">BELI PRODUK INI</button>
			</div>
		</div>

		<input type="text" style="display: none"  id="sess" value="<?php if(!$this->session->has_userdata('username')) {
	    	echo 'belum_log'; 
	    	} else { 
	    	echo $this->session->userdata('username'); 
	    } ?>">
		<div class="panel panel-default">
			<div class="panel panel-heading"><strong>Informasi Penjual</strong></div>
			<div class="panel-body">
				<p class="p-header">Toko anu</p>
				<p class="p-store">Lokasi</p>
			</div>
		</div>
	</div>

	<!-- Modal -->
<div id="modalcart" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">BELI</h4>
      </div>
      <form method="post" class="form-horizontal" action="<?=site_url('transaction/add_cart');?>">
      <div class="modal-body">
      	<div class="form-group">
	      	<label class="col-sm-2">Nama Produk</label>
	        <div class="col-sm-4">
	        	<p class="p-header"><?=$p->nama_brg;?></p>
	        	<input type="text" style="display: none;" name="id_brg" id="id_brg" value="<?=$p->id_brg;?>">
	        	<input type="text" style="display: none;" name="nama_brg" id="nama_brg" value="<?=$p->nama_brg;?>">
	        	<input type="text" style="display: none;" name="id_toko" id="toko_id" value="<?=$p->id_toko;?>">
	        	<input type="text" style="display: none;" name="berat" id="berat" value="<?=$p->berat;?>">
	        	<input type="text" style="display: none;" name="city" id="city" value="<?=$p->id_city;?>">
	        </div>

	        <div class="col-sm-6">
	        	<textarea class="form-control" rows="5" placeholder="Keterangan . . " name="keterangan" id="keterangan"></textarea>
	        </div>
	    </div>

	    <div class="form-group">
        	<label class="col-sm-2">Jumlah Barang</label>
        	<div class="col-sm-3">
        		<input type="number" name="qty" class="form-control" id="qty" onchange="harga_product();" min="1">
        	</div>
        </div>

        <div class="form-group">
        	<label class="col-sm-2">Harga</label>
	    	<div class="col-sm-3">
	    		<input type="text" style="display: none;" id="harga_dup" value="<?=number_format($p->harga,0,",",".");?>">
	    		<input type="text" readonly="true" name="harga" class="form-control" value="<?=number_format($p->harga,0,",",".");?>" id="harga">

	    	</div>
	    </div>

	    <div class="form-group">
	    	<label class="col-sm-2">Agen Kurir</label>
	    	<div class="col-sm-4">
	    		<select class="form-control" name="kurir" id="kurir" onchange="cost_ship()">
	    			<option value="">Pilih Kurir</option>
	    			<option value="jne">JNE</option>
	    		</select>
	    	</div>

	    	<div class="col-sm-4">
	    		<select class="form-control" id="type" onchange="cost_ship()">
	    			<option value="CTC">REG</option>
	    			<option value="CTCOKE">OKE</option>
	    			<option value="CTCYES">YES</option>
	    		</select>
	    	</div>
	    </div>

	    <div class="form-group">
	    	<label class="col-sm-2">Biaya Ongkir</label>
	    	<div class="col-sm-4">
	    		<input class="form-control" name="ongkir" type="text" id="ongkir" readonly="true">
	    	</div>
	    </div>

	    <div class="form-group">
	    	<label class="col-sm-2">Total Bayar</label>
	    	<div class="col-sm-4">
	    		<input type="text" class="form-control" name="bayar" id="bayar" readonly="true">
	    	</div>
	    </div>

      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-block btn-lg" onclick="add_cart()">BELI PRODUK INI</button>
      </div>
     </form>
    </div>

  </div>
</div>
</div>
<?php } ?>
</div>
</div>
