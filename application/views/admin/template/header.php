<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <meta charset="utf-8" />
      <title>MARKETPLACE ADMINISTRATOR</title>
      <meta name="description" content="Aplikasi Administrasi Bengkel" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
      <!-- bootstrap & fontawesome -->
      <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css" />
      <link rel="stylesheet" href="<?=base_url();?>assets/css/font-awesome.min.css" />
      <!-- text fonts -->
      <link rel="stylesheet" href="<?=base_url();?>assets/fonts/fonts.googleapis.com.css" />
      <!-- ace styles -->
      <link rel="stylesheet" href="<?=base_url();?>assets/css/ace.min.css" class="ace-main-stylesheet"/>
      <!--DATE TIME PICKER-->
      <link rel="stylesheet" href="<?=base_url();?>assets/css/DateTimePicker.css">
      <!--SWEET ALERT-->
      <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/sweetalert.css">
      <!--SELECT 2 -->
      <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/select2.min.css">
      <!--MY STYLES-->
      <link rel="stylesheet" href="<?=base_url();?>assets/css/mystyle.css">
      <link rel="stylesheet" href="<?=base_url();?>assets/css/jquery.dynatable.css">
      <!--JQUERY-->
      <script src="<?=base_url();?>assets/js/jquery-3.1.0.min.js"></script>
      <script type="text/javascript" src="<?=base_url();?>assets/js/DateTimePicker.js"></script>
      <script type="text/javascript" src="<?=base_url();?>assets/js/tinymce/tinymce.min.js"></script>
      <script type="text/javascript" src="<?=base_url();?>assets/js/tinymce/jquery.tinymce.min.js"></script>
      <?php 
      if(isset($css_files)) {
      foreach($css_files as $file): ?>
      <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
      <?php endforeach; ?>
      <?php foreach($js_files as $file): ?>
      <script src="<?php echo $file; ?>"></script>
      <?php endforeach;
      } ?>
      <script>tinymce.init({ selector:'textarea' });</script>
   </head>
   <body class="no-skin">
   <div id="navbar" class="navbar navbar-default">
      <div class="navbar-container" id="navbar-container">
         <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>

         <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
               <small>
                  <i class="fa fa-books"></i>
                  MARKETPLACE ADMINISTRATOR
               </small>
            </a>
         </div>

         <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
               <li class="light-blue">
                  <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                     <img class="nav-user-photo" src="<?=base_url();?>assets/images/user.png" />
                     <span class="user-info">
                        <small>Welcome,</small>
                           <?=$this->session->userdata('username');?>
                     </span>

                     <i class="ace-icon fa fa-caret-down"></i>
                  </a>

                  <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                     <li class="divider"></li>

                     <li>
                        <a href="<?=site_url('admin/logout');?>">
                           <i class="ace-icon fa fa-power-off"></i>
                           Logout
                        </a>
                     </li>
                  </ul>
               </li>
            </ul>
         </div>
      </div><!-- /.navbar-container -->
   </div>

<!--SIDEBAR-->
<div class="main-container" id="main-container">
<div id="sidebar" class="sidebar responsive">
   <ul class="nav nav-list">
      <li><a href="<?=site_url('admin/users');?>"><i class="menu-icon fa fa-caret-right"></i>Users</a></li>
      <li><a href="<?=site_url('admin/category');?>"><i class="menu-icon fa fa-caret-right"></i>Category</a></li>
      <li><a href="<?=site_url('admin/logout');?>"><i class="menu-icon fa fa-sign-out"></i>Logout</a></li>
   </ul>
   <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
      <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
   </div>

   <script type="text/javascript">
      try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
   </script>
</div>
<!--SIDEBAR-->

               