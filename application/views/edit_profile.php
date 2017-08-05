    <div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal custom-form" method="post" action="<?=site_url('home/update_profile');?>">
                <h1>LENGKAPI PROFIL</h1>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Tanggal Lahir</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input type="date" class="form-control" name="tanggal" id="tanggal" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="email-input-field">Provinsi</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <select class="form-control" name="provinsi" id="p_asal">
                            <?php $this->load->view('ongkirApi/province');?> 
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="pawssword-input-field">Kota</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <select class="form-control" name="kota" id="c_asal">
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="repeat-pawssword-input-field">Alamat Lengkap</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <textarea class="form-control" name="alamat" id="alamat"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="dropdown-input-field">Rek Bank</label>
                    </div>
                    <div class="col-sm-4 input-column">
                        <select class="form-control" name="rek_bank" id="rek_bank">
                            <option>BCA</option>
                            <option>BNI</option>
                            <option>MANDIRI</option>
                            <option>BRI</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="dropdown-input-field">No Rekening</label>
                    </div>
                    <div class="col-sm-4 input-column">
                        <input type="number" class="form-control" name="no_rek" id="no_rek">
                    </div>
                </div>
                <button class="btn btn-default submit-button" type="button" onclick="update_profile()">DAFTAR </button>
            </form>
        </div>
    </div>