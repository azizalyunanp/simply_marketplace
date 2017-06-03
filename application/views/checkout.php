<!-- breadcrumbs -->
   <div class="breadcrumbs">
      <div class="container">
         <ol class="breadcrumb breadcrumb1">
            <li><a href="<?=base_url('home');?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Checkout Page</li>
         </ol>
      </div>
   </div>
<!-- //breadcrumbs -->
<!-- checkout -->
   <div class="checkout">
      <div class="container">
         <h2>Your shopping cart : <span><?=count($this->cart->contents());?> Products</span></h2>
         <div class="checkout-right">
            <table class="timetable_sub">
               <thead>
                  <tr>
                     <th>No Trans.</th>   
                     <th>Produk</th>
                     <th>Nama Produk</th>
                     <th>Juml. Beli</th>
                     <th>Harga</th>
                     <th>SubTotal</th>
                     <th>Hapus</th>
                  </tr>
               </thead>
               <tbody>
               <?php 
               $no = 1;
               foreach ($this->cart->contents() as $items) { ?>
                  <tr class="rem1">
                     <td class="invert"><?=$no++;?></td>
                     <td class="invert-image"><img src="<?=base_url();?>assets/img/products/1.jpg" alt=" " class="img-responsive" /></td>
                     <td class="invert"><?=$items['name'];?></td>
                     <td class="invert">
                         <div class="quantity"> 
                           <div class="quantity-select">                           
                              <a href='<?=site_url("home/min_cart/$items[rowid]/$items[qty]");?>'><div class="entry value-minus active"></div></a>
                              <div class="entry value"><span><?=$items['qty'];?></span></div>
                              <a href='<?=site_url("home/plus_cart/$items[rowid]/$items[qty]");?>'><div class="entry value-plus active"></div></a>
                           </div>
                        </div>
                     </td>
                     <td class="invert">Rp <?=number_format($items['price'],0,".",".");?></td>
                     <td class="invert">Rp <?=number_format($items['qty']*$items['price'],0,".",".");?></td>
                     <td class="invert">
                       <a class="btn btn-danger" href='<?=site_url("home/del_cart/$items[rowid]");?>'><i class="fa fa-trash"></i></a>
                     </td>
                  </tr>
               <?php } ?>
               </tbody>
            </table>
         </div>
         <div class="checkout-left">   
            <div class="checkout-left-basket">
               <a href=""><h4>LANJUTKAN PEMESANAN</h4></a>
               <ul>
                  <li>Total <i>-</i> <span>Rp <?=number_format($this->cart->total(),0,".",".");?></span></li>
               </ul>
            </div>
            <div class="checkout-right-basket">
               <a href="#"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>LANJUT BELANJA</a>
            </div>
            <div class="clearfix"> </div>
         </div>
      </div>
   </div>
<!-- //checkout -->