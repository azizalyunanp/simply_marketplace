    <div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal custom-form" method="post" action="<?=site_url('home/proses_register');?>" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('please agree'); return false; }">
                <h1>Daftar</h1>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Username </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" required="" maxlength="100" autocomplete="off" name="username">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="email-input-field">Nama Lengkap</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" maxlength="100" autocomplete="off" name="nama_lengkap">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="pawssword-input-field">Email </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="email" inputmode="email" autocomplete="off" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="repeat-pawssword-input-field">Password </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="password" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="dropdown-input-field">No HP</label>
                    </div>
                    <div class="col-sm-4 input-column">
                        <input class="form-control" type="text" maxlength="14" autocomplete="off" name="no_hp">
                    </div>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="agree">I've read and accept the terms and conditions</label>
                </div>
                <button class="btn btn-default submit-button" type="submit">DAFTAR </button>
            </form>
        </div>
    </div>