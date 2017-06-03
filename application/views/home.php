
   <!-- main-slider -->
      <ul id="demo1">
         <li>
            <img src="<?=base_url();?>assets/img/slideshow/1.jpg" alt="" />
            <!--Slider Description example-->
            <!-- <div class="slide-desc">
               <h3>Buy Rice Products Are Now On Line With Us</h3>
            </div> -->
         </li>
         <li>
            <img src="<?=base_url();?>assets/img/slideshow/2.jpg" alt="" />
              <!-- <div class="slide-desc">
               <h3>Whole Spices Products Are Now On Line With Us</h3>
            </div> -->
         </li>
         
      </ul>
   <!-- //main-slider -->
   <!-- //top-header and slider -->
<!-- new -->
   <div class="newproducts-w3agile">
      <div class="container">
         <h3>PRODUK</h3>
            <div class="agile_top_brands_grids">
            <?php
               foreach ($product as $p) {
            ?>
               <div class="col-md-3 top_brand_left-1">
                  <div class="hover14 column">
                     <div class="agile_top_brand_left_grid">
                        <!-- <div class="agile_top_brand_left_grid_pos">
                           <div class="tanda">OFFER</div>
                        </div> -->
                        <div class="agile_top_brand_left_grid1">
                           <figure>
                              <div class="snipcart-item block">
                                 <div class="snipcart-thumb">
                                    <a href='<?=base_url("home/detail_product/$p->links");?>'><img title=" " alt=" " src="<?=base_url("assets/img/products/$p->images");?>"></a>    
                                    <p><a href='<?=base_url("home/detail_product/$p->links");?>'><?=$p->product;?></a></p>
                                    <div class="stars">
                                       <!--RATING-->
                                    </div>
                                       <h4>Rp <?=$p->price;?></h4>
                                 </div>
                                 <div class="snipcart-details top_brand_home_details">
                                    <form action="#" method="post">
                                       <fieldset>
                                          <input  id="id_product" value="1" style="display: none;">
                                          <input  id="qty_<?=$p->id_product;?>" value="1" style="display: none;">
                                          <input  id="nm_brg_<?=$p->id_product;?>" value="<?=$p->product;?>" style="display: none;">
                                          <input  id="price_<?=$p->id_product;?>" value="<?=$p->price;?>" style="display: none;">
                                          <button id="add_cart" type="button" name="submit"  value="Add to cart" class="btn btn-primary" id="add_cart" onclick="tambah_cart(<?=$p->id_product;?>);">
                                          <i class="fa fa-cart-arrow-down"></i> Add to Cart</button>

                                       </fieldset>
                                    </form>
                                 </div>
                              </div>
                           </figure>
                        </div>
                     </div>
                  </div>
               </div>
            <?php } ?>
                  <div class="clearfix"> </div>
            </div>
      </div>
   </div>
<!-- //new -->
