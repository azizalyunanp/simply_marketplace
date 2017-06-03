<!-- //footer -->
<div class="footer">
      <div class="container">
         <div class="w3_footer_grids">
            <div class="col-md-3 w3_footer_grid">
               <h3>Contact</h3>
               
               <ul class="address">
                  <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                     Jl. Kebangkitan Nasional, Toko Buku No. 21-22
                     Belakang Sriwedari, Solo, Jawa Tengah, Indonesia.
                  </li>
                  <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>tokobukuantik@gmail.com</li>
                  <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+0271-7655232</li>
                  <li><i class="fa fa-whatsapp"></i> 085725363887</li>
               </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
               <h3>Information</h3>
               <ul class="info"> 
                  <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Tentang Kami</a></li>
                  <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Kontak </a></li>
                   <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Cara Order</a></li>
               </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
               <h3>Category</h3>
               <ul class="info"> 
                  <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Buku Baru</a></li>
                  <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Buku Bekas</a></li>
                  <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Mainan</a></li>
                  <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Alat Peraga</a></li>
               </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
               <h3>Profile</h3>
               <ul class="info"> 
                  <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="checkout.html">Keranjang Saya</a></li>
                  <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="login.html">Login</a></li>
                  <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="registered.html">Daftar Baru</a></li>
               </ul>
            </div>
            <div class="clearfix"> </div>
         </div>
      </div>
      
      <div class="footer-copy">
         
         <div class="container">
            <p>© 2017 TOKO BUKU RAHMA. All rights reserved</p>
         </div>
      </div>
      
   </div>   
   <div class="footer-botm">
         <div class="container">
            <div class="w3layouts-foot">
               <ul>
                  <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                  <li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
               </ul>
            </div>
            <div class="clearfix"> </div>
         </div>
      </div>
<!-- //footer --> 
<script src="<?=base_url();?>assets/js/jquery-3.2.1.js"></script>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?=base_url();?>assets/js/move-top.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/easing.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sweetalert.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sweetalert-dev.js');?>"></script>
<!-- top-header and slider -->
<!-- here stars scrolling icon -->

<!-- main slider-banner -->
<script src="<?=base_url();?>assets/js/skdslider.min.js"></script>
<link href="<?=base_url();?>assets/css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
      jQuery(document).ready(function(){
         jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
                  
         jQuery('#responsive').change(function(){
           $('#responsive_wrapper').width(jQuery(this).val());
         });
      });
</script>   
<!-- //main slider-banner --> 

<!--MY JS-->
<script>
$(document).ready(function () {
   $(".scroll").click(function(event){    
         event.preventDefault();
         $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
      });
});
</script>

<script type="text/javascript">
   function tambah_cart(id) {
      $.ajax({
         method   : 'POST',
         url      : '<?=site_url("home/add_cart");?>',
         data     : "id_product=" + id + "&qty=" + $('#qty_'+id).val() + "&item_name=" + $('#nm_brg_'+id).val() + "&price=" + $('#price_'+id).val(),
         dataType : 'text',
      success:function(data) {
         swal("Success", "Cart berhasil ditambahkan", "success")
      }
      });
   }
</script>
</body>
</html>