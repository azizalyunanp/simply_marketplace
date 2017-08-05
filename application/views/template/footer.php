<footer>
        <div class="row">
            <div class="col-md-4 footer-about">
                <h4>Tentang Kami</h4>
                <p> Dengan marketplace memudahkan dalam hal bertransaksi online
                </p>
                <div class="social-links social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-github"></i></a></div>
            </div>
        </div>
    </footer>
    <script src="<?=base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/sweetalert.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/pikaday-responsive-modernizr.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/pikaday-package.min.js');?>"></script>
    <script type="text/javascript">
    var $date1 = $("#tanggal");
    var instance1 = pikadayResponsive($date1);
    $(document).ready(function(){

        $('#user_product').DataTable({ 
        "processing": true, 
        "serverSide": true, 
        "order": [], 
        "ajax": {

            "url": "<?=base_url('home/ajax_user_product');?>",
            "type": "POST"
        },
        "columnDefs": [
        { 
            "targets": [ 0 ], 
            "orderable": false,
        },
        ],

        });

        $("#p_asal").click(function(){ //API RAJA ONGKIR PROVINCE
            $.post("<?php echo base_url(); ?>transaction/get_city/"+$('#p_asal').val(),function(obj){
                $('#c_asal').html(obj);
            });
        }); 

    })


    function harga_product() {
        $('#harga').val(convertToRupiah($('#harga_dup').val().replace(".","") * $('#qty').val()));
        cost_ship();
    }

    function cost_ship() {
        var harga   = $('#harga').val().replace(".","");
        var bayar   = $('#bayar').val();
        $.ajax({
            method  : 'POST',
            url     : "<?=base_url();?>transaction/get_cost",
            data    : "origin=" + $('#city').val() + "&weight=" +  $('#berat').val() + "&courier=" +
            $('#kurir option:selected').val() + "&type=" + $('#type option:selected').val(),
            dataType:'text',
            success : function(data) {
                $('#ongkir').val(data);
                $('#bayar').val(convertToRupiah(parseInt(harga) + parseInt(data.replace(".",""))));
            }
        })
    }

    function convertToRupiah(angka) {
        var rupiah = '';    
        var angkarev = angka.toString().split('').reverse().join('');
        for(var i = 0; i < angkarev.length; i++) 
          if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
        return rupiah.split('',rupiah.length-1).reverse().join('');
    }

    function update_profile() {
        $.ajax({
            method  : 'POST',
            url     : "<?=base_url();?>home/update_profile",
            data    : "tgl_lahir=" + $('#tanggal').val() + "&provinsi=" + $('#p_asal option:selected').text() +
            "&id_province=" + $('#p_asal option:selected').val() + "&city=" + $('#c_asal option:selected').text() + "&id_city=" + $('#c_asal option:selected').val() + "&alamat=" + $('#alamat').val() + "&rek_bank=" + $('#rek_bank option:selected').val() + "&no_rek=" + $('#no_rek').val(),
            dataType : 'text',
            success : function(data) {
                sweetAlert("Success", "Data berhasil Disimpan", "success");
                setTimeout(function(){     
                window.location = "<?php echo base_url('home');?>";
            }, 3000); 
            }
        })
    }

    function add_store() {
        $.ajax({
            method  : 'POST',
            url     : "<?=base_url();?>home/new_store",
            data    : "nama_toko=" + $('#nama_toko').val() + "&provinsi=" + $('#p_asal option:selected').text() +
            "&id_province=" + $('#p_asal option:selected').val() + "&city=" + $('#c_asal option:selected').text() + "&id_city=" + $('#c_asal option:selected').val() + "&deskripsi=" + $('#deskripsi').val() + "&status=" + $('#status option:selected').val() + "&alamat=" + $('#alamat').val(),
            dataType : 'text',
            success : function(data) {
                sweetAlert("Success", "Data berhasil Disimpan", "success");
                setTimeout(function(){     
                    window.location = "<?php echo base_url('home');?>";
                }, 3000); 
            }
        })
    }

    function modal_cart() {
        var sess  = $('#sess').val();
        if(sess == "belum_log") {
            sweetAlert("Oops...", "Login terlebih dahulu !", "error");
            window.location = "<?=base_url('login');?>";
        } else {
            $('#modalcart').modal("show");
        }
    }

    function add_cart() {
        var kurir = $('#kurir option:selected').val();

        if(kurir == "") {
            sweetAlert("Oops...", "Pilih kurir terlebih dahulu !", "error");
        } else {
        $.ajax({
            method  : 'POST',
            url     : "<?=base_url();?>transaction/add_cart",
            data    : "id_toko=" + $('#toko_id').val() + "&id_brg=" + $('#id_brg').val() + "&nama_brg=" + $('#nama_brg').val() + "&qty=" + $('#qty').val() + "&harga=" + $('#harga').val() + "&keterangan=" + $('#keterangan').val() + "&kurir="+ $('#kurir option:selected').text() + "&service=" + $('#type option:selected').text() + "&ongkir=" + $('#ongkir').val(),
            dataType: 'text',

            success : function(data) {
               sweetAlert("Add cart", "Cart berhasil ditambahkan", "success");
               $('#modalcart').modal("hide");
            }
        })
        }
    }

    function hapus_cart(id) {
        swal({
          title: "Hapus Item?",
          text: "Hapus item keranjang ??",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Ya",
          closeOnConfirm: false
        },
        function(){
            window.location = "<?=base_url('transaction/delete_cart/');?>" + id;
            swal("Deleted!", "Item berhasil dihapus", "success");
        });
    }

    function change_bayar() {
        var no_rek = $('#no_rek').val();
        if (no_rek == "") { 
            sweetAlert("NO REK", "No Rekening harus di isi ! ! !", "warning");
        } else {
        $.ajax({
            method  : 'POST',
            url     : "<?=base_url();?>transaction/change_bayar",
            data    : "rek_bank=" + $('#rek_bank option:selected').val() + "&no_rek=" +
            $('#no_rek').val(),
            dataType : 'text',
            success:function(data) {
                sweetAlert("Ganti Pembayaran", "Ganti Pembayaran Berhasil", "success");
                setTimeout(function(){     
                    window.location = "<?php echo base_url('checkout');?>";
                }, 3000); 
            }
        })
        }
    }

    </script>
</body>

</html>
jok0u8765555555t
