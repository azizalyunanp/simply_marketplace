    <div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal custom-form" method="post" action="<?=site_url('transaction/save_trans');?>">
                <h1>Checkout</h1>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">TOTAL BAYAR</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <div class="p-header">Rp <?=number_format($total['total_bayar'],0,",",".");?></div>
                        <input class="form-control" type="hidden" readonly="true" autocomplete="off" name="bayar" value="<?=$total['total_bayar'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="email-input-field">REK. BANK</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input type="text" name="rek_bank" class="form-control" value="<?=$bayar['rek_bank'];?>" readonly="true">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="pawssword-input-field">NO REK</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="number" readonly="true"  autocomplete="off" name="no_rek" value="<?=$bayar['no_rek'];?>">
                    </div>
                </div>
                <button type="button" class="btn btn-warning btn-lg" data-target="#myModal" data-toggle="modal"><i class="fa fa-pencil"></i> Ganti Pembayaran</button>
                <button class="btn btn-default submit-button" type="submit"><i class="fa fa-check"></i> CHECKOUT </button>
            </form>
        </div>
    </div>

    <!--MODAL GANTI PEMBAYARAN-->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ganti Pembayaran</h4>
      </div>
       <form class="form-horizontal" >
      <div class="modal-body">
            <div class="form-group">
                <label class="col-sm-4">REK. BANK</label>
                <div class="col-sm-4">
                    <select class="form-control" name="rek_bank" id="rek_bank">
                        <option>BCA</option>
                        <option>BNI</option>
                        <option>MANDIRI</option>
                        <option>BRI</option>
                     </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">NO REK</label>
                <div class="col-sm-6">
                     <input type="number" class="form-control" name="rek_bank" id="no_rek" required="true" >
                </div>  
            </div>

      </div>
      <div class="modal-footer">
        <a class="btn btn-primary" onclick="change_bayar()">SIMPAN</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>
<!--END MODAL-->