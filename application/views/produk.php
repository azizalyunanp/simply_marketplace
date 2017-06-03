<!--- PRODUCTS -->
   <div class="products">
      <div class="container">
         <div class="col-md-4 products-left">
            <div class="categories">
               <h2>KATEGORI</h2>
               <ul class="cate">
               <?php
                  foreach ($category as $c) {
               ?>
                  <li>
                     <a href='<?=site_url("category/$c->links");?>'><i class="fa fa-arrow-right" aria-hidden="true"></i><?=$c->category;?></a>
                  </li>
               <?php } ?>
               </ul>
            </div>                                                                                                                                    
         </div>
         <div class="col-md-8 products-right">
            <div class="agile_top_brands_grids">
            <?php 
               foreach($product as $p) { 
            ?>
               <div class="col-md-4 top_brand_left">
                  <div class="hover14 column">
                     <div class="agile_top_brand_left_grid">
                        <div class="agile_top_brand_left_grid_pos">
                           <!--KATEGORI-->
                        </div>
                        <div class="agile_top_brand_left_grid1">
                           <figure>
                              <div class="snipcart-item block">
                                 <div class="snipcart-thumb">
                                    <a href='<?=base_url("home/detail_product/$p->links");?>'><img title=" " alt=" " src="<?=base_url("assets/img/products/$p->images");?>"></a>    
                                    <p><a href='<?=base_url("home/detail_product/$p->links");?>'><?=$p->product;?></a></p>
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
                  <div class="clearfix"> </div>
            </div>
            <nav class="numbering">
               <ul class="pagination paging">
                  <li>
                     <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                     </a>
                  </li>
                  <li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                     <a href="#" aria-label="Next">
                     <span aria-hidden="true">&raquo;</span>
                     </a>
                  </li>
               </ul>
            </nav>
         </div>
         <div class="clearfix"> </div>
      </div>
   </div>