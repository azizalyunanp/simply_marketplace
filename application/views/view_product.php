<div class="col-sm-9 col-lg-9 col-md-9">
  <?php if(isset($error)) { 
    echo "<div class='alert alert-danger alert-dismissable fade in'>
    <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>$error</strong>.
    </div>"; 
   }
  if(isset($_GET['status']) && $_GET['status']=='sukses') {
    echo "<div class='alert alert-success alert-dismissable fade in'>
    <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Berhasil menambahkan produk</strong>.
    </div>"; 
  } elseif (isset($_GET['status']) && $_GET['status']=='update') {
     echo "<div class='alert alert-success alert-dismissable fade in'>
    <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Berhasil update produk</strong>.
    </div>"; 
  } elseif (isset($_GET['status']) && $_GET['status']=='delete') {
     echo "<div class='alert alert-success alert-dismissable fade in'>
    <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Berhasil menghapus produk</strong>.
    </div>"; 
  }
    ?> 
    <table class="table table-stripped" id="user_product">
     <thead>
        <tr>
          <td>No</td>
          <td>Images</td>
          <td>Nama Barang</td>
          <td>Kategori</td>
          <td>Harga</td>
          <td>Status</td>
          <td>Kondisi</td>
          <td>Edit</td>
          <td>Delete</td>
         </tr>
    </thead>
     <tbody></tbody>
    </table>
  </div>
  </div>
 </div>
   