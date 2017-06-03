<!-- breadcrumbs -->
   <div class="breadcrumbs">
      <div class="container">
         <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="<?=base_url('home');?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Detail Product</li>
         </ol>
      </div>
   </div>
<!-- //breadcrumbs -->
   <div class="products">
      <div class="container">
         <div class="agileinfo_single">
            
            <div class="col-md-4 agileinfo_single_left">
               <img id="example" src="<?=base_url('assets/img/products/1.jpg');?>" alt=" " class="img-responsive">
            </div>
            <div class="col-md-8 agileinfo_single_right">
            <?php 
               foreach($product as $p) {
            ?>

            <h2><?=$p->product;?></h2>
               <div class="w3agile_description">
                  <h4>Description :</h4>
                  <p><?=$p->description;?></p>
               </div>
               <div class="snipcart-item block">
                  <div class="snipcart-thumb agileinfo_single_right_snipcart">
                     <h4 class="m-sing">Rp <?=number_format($p->price,0,".",".");?></h4>
                  </div>
                  <div class="snipcart-details agileinfo_single_right_details">
                     <form action="#" method="post">
                        <fieldset>
                           <input  id="id_product" value="1" style="display: none;">
                           <input  id="qty_<?=$p->id_product;?>" value="1" style="display: none;">
                           <input  id="nm_brg_<?=$p->id_product;?>" value="<?=$p->product;?>" style="display: none;">
                           <input  id="price_<?=$p->id_product;?>" value="<?=$p->price;?>" style="display: none;">
                           <input type="button" id="add_cart" name="submit"  value="Add to cart" class="button" id="add_cart" onclick="tambah_cart(<?=$p->id_product;?>);">
                        </fieldset>
                     </form>
                  
                  </div>
               </div>
            </div>
            <?php } ?>
            <div class="clearfix"> </div>
         </div>
      </div>
   </div>