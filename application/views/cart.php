<div class="row">
<div class="container">
	<div class="col-sm-12">
		<div class="panel panel-default">
		  	<div class="panel-body">
		  		<div class="pull-right">
		  			<p class="p-header"><strong>Total Pembayaran</strong></p>
		  			<p class="p-store">Rp <?=number_format($total['total_bayar'],0,",",".");?></p>
		  		</div>
		  	</div>
		  	<div class="panel-footer">
		  		<a class="btn btn-danger pull-left" href="<?=base_url('home');?>"><i class="fa fa-arrow-left"></i> Lanjutkan Belanja</a>

		  		<a class="btn btn-success pull-right" href="<?=base_url('checkout');?>"><i class="fa fa-arrow-right"></i> Lanjutkan Pembayaran</a>
		  	</div>
		</div>

		<br>
		<?php			
			foreach ($toko as $t) {
			$id_toko 	= $t->id_toko;

		?>
		<table class="table table-bordered table-responsive">
			<thead>
				<tr>
					<td colspan="4"><strong>Pembelian <?=$t->nama_toko;?></strong></td>
				</tr>
			</thead>
			<?php 
				$tot_qty 	= 0;
				$subtotal 	= 0;
				$cart = $this->M_transaction->v_cart(session_id(),$id_toko)->result();
				foreach ($cart as $c) {
				$tot_qty 	+= $c->qty;
				$harg_sub 	= $c->harga * $c->qty;
				$subtotal 	+= $harg_sub; 
			?>
			<tr>
				<td>
					<div style="display: inline-block;vertical-align:top;">
						<img src="<?=base_url('gambar/').$c->photo;?>" class="img-responsive" width="100" height="100">
					</div>
					<div style="display: inline-block;padding-left: 15px;">
						<p class="p-header"><?=$c->nama_brg;?></p>
						<p class="p-store"><?=$c->qty;?> Barang</p>
					</div>
				</td>
				<td>
					<p class="p-header"><strong>Harga Barang</strong></p>
					<p class="p-store">Rp <?=number_format($c->harga,0,",",".");?></p>
				</td>

				<td colspan="2">
					<p class="p-header">Keterangan</p>
					<p class="p-store"> <?=$c->keterangan;?> </p>
					<p><a onclick="hapus_cart(<?=$c->id_cart;?>);"><i class="fa fa-trash"></i> Hapus</a></p>
				</td>
			</tr>
		<?php } ?>
			<tr>
				<td>
					<p class="p-header"><strong>Alamat Tujuan</strong></p>
					<p class="p-store"><?=$c->alamat;?></p>
					<p class="p-store"><?=$c->kurir;?> - <?=$c->service;?></p>
					<p class="p-store"><?=$c->nama_lengkap;?></p>
					<p class="p-store"><?=$c->no_hp;?></p>
				</td>
				<td>
					<p class="p-header"><strong>Total Barang</strong></p>
					<p class="p-store"><?=$tot_qty;?></p>
				</td>

				<td>
					<p class="p-header"><strong>Subtotal</strong></p>
					<p class="p-store">Rp <?=number_format($subtotal,0,",",".");?></p>
				</td>

				<td>
					<p class="p-header"><strong>Ongkos Kirim</strong>
					<p class="p-store">Rp <?=number_format($c->shipping_cost,0,",",".");?></p>
				</p>
			</td>
			</tr>

		</table>
	<?php } ?>











	</div>
</div>
</div>
