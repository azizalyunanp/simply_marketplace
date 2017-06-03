<!DOCTYPE html>
<html>
<head>
<title>Toko Buku RAHMA</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="TOKO BUKU RAHMA Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
      function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?=base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?=base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="<?=base_url();?>assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->

<link href="<?=base_url('assets/css/sweetalert.css');?>" rel="stylesheet">
</head>
   
<body>
<!-- header -->
   <div class="agileits_header">
      <div class="container">
         <div class="w3l_offers">
            <!--OFFERS-->
         </div>
         <div class="agile-login">
            <ul>
               <li><a href="<?=site_url('home/register');?>">Register</a></li>
               <li><a href="<?=site_url('home/login');?>">Login</a></li>
               <li><a href="#">Cara Order</a></li>
               
            </ul>
         </div>
         <div class="product_list_header">  
               <form action="#" method="post" class="last"> 
                  <input type="hidden" name="cmd" value="_cart">
                  <input type="hidden" name="display" value="1">
                  <a href="<?=site_url('home/checkout');?>" style="color: white;"><i class="fa fa-cart-arrow-down fa-2x" aria-hidden="true"></i> My Cart</a>
                  <!-- <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button> -->
               </form>  
         </div>
         <div class="clearfix"> </div>
      </div>
   </div>

   <div class="logo_products">
      <div class="container">
      <div class="w3ls_logo_products_left1">
            <ul class="phone_email">
               <li><i class="fa fa-phone" aria-hidden="true"></i> Telepon kami : 0271-7655232</li>
            </ul>
         </div>
         <div class="w3ls_logo_products_left">
            <img src="<?=base_url('assets/img/logo.png');?>">
         </div>
      <div class="w3l_search">
         <form action="#" method="post">
            <input type="search" name="Search" placeholder="Search for a Product..." required="">
            <button type="submit" class="btn btn-default search" aria-label="Left Align">
               <i class="fa fa-search" aria-hidden="true"> </i>
            </button>
            <div class="clearfix"></div>
         </form>
      </div>
         
         <div class="clearfix"> </div>
      </div>
   </div>
   <div class="navigation-agileits">
      <div class="container">
         <nav class="navbar navbar-default">
            <div class="navbar-header nav_2">
               <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>
            </div> 
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
               <ul class="nav navbar-nav">
                  <li><a href="<?=site_url('home');?>" class="act">Home</a></li>
                  <li><a href="<?=site_url('home/produk');?>">Produk</a></li>
                  <li><a href="#">Kontak</a></li>
               </ul>
            </div>
         </nav>
      </div>
   </div>   
<!-- //navigation -->