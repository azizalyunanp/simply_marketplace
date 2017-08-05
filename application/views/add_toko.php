    <div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal custom-form" method="post" action="<?=site_url('home/new_store');?>">
                <h1>TAMBAH TOKO</h1>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Nama Toko</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" required="" maxlength="100" autocomplete="off" name="nama_toko" id="nama_toko">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="email-input-field">Deskripsi</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <textarea class="form-control" autocomplete="off" name="deskripsi" id="deskripsi"></textarea>
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
                        <textarea class="form-control" name="lokasi" id="alamat"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="repeat-pawssword-input-field">Status</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <select class="form-control" name="status" id="status">
                            <option>Buka</option>
                            <option>Tutup</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-default submit-button" type="button" onclick="add_store()">TAMBAH</button>
            </form>
        </div>
    </div>