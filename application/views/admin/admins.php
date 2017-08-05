<div class="main-content">
<div class="page-content">
   <div class="page-header">
      <h1>
      ADMINS
      </h1>
   </div><!-- /.page-header -->
<div class="row">
   <div class="col-xs-12">
      <?php 
    if( $this->uri->segment(3)=='wrong') {
        echo '<div class="alert alert-danger">
                    <strong>Wrong Type !</strong> Input password tidak sesuai.
                </div>';
    }
    ?>
      <form method="post" action="<?=site_url('admin/input_admin');?>" class="form-horizontal"> 
        <div class="form-group">
        <label class="col-sm-4">Username</label>
            <div class="col-sm-6">
                <input type="text" class="col-sm-6" name="username">
            </div>    
        </div>
        <div class="form-group">
        <label class="col-sm-4">Name</label>
            <div class="col-sm-6">
                <input type="text" class="col-sm-6" name="name">
            </div>    
        </div>

        <div class="form-group">
        <label class="col-sm-4">Password</label>
            <div class="col-sm-6">
                <input type="password" class="col-sm-6" name="password">
            </div>    
        </div>

        <div class="form-group">
            <div class="col-sm-5">
                <button class="btn btn-success" type="submit">Simpan</button>
                <button class="btn btn-danger" type="reset">Reset</button>
            </div>
        </div>
      </form>
      <br>
      <table class="table table-bordered">
        <thead>
            <tr>
                <td>Username</td>
                <td>Name</td>
                <td>Options</td>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach ($admins as $a) {
        ?>
            <tr>
                <td><?=$a->username;?></td>
                <td><?=$a->name;?></td>
                <td>
                 <a href='<?=site_url("admin/edit_admin/$a->id_admins");?>' class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                 <a href='<?=site_url("admin/change_pass/$a->id_admins");?>' class="btn btn-warning"><i class="fa fa-lock"></i> Change Password</a>
                 <a href='<?=site_url("admin/del_admin/$a->id_admins");?>' class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
   </div>
</div>
</div>
</div>