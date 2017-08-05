<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="<?=base_url();?>assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/Pretty-Header.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/Material-Card.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/Hero-Technology.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/sweetalert.css">
<!--     <link rel="stylesheet" href="<?=base_url();?>assets/css/dataTables.bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?=base_url();?>assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/css/pikaday-package.min.css');?>">
    <style type="text/css">
        .p-header {
            font-family: 'Calibri';
            font-size: 16px;
        }

        .p-cost {
            font-family: 'Calibri';
            font-size: 14px;
            color: red;
        }

        .p-store {
            font-family: 'Calibri';
            font-size: 14px;
        }

        .panel-footer {
            height: 65px !important;
        }

        #sep {
            margin-top: 10px;
        }

        .panel-body {
            background: #f3f3f3 !important;
        }
        
    </style>
    <script type="text/javascript">
        function konfirmasi() {
            tanya = confirm("Hapus Data ?");
            if (tanya == true) return true;
            else return false;
        }
    </script>
</head>

<body>
    <nav class="navbar navbar-default custom-header">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="<?=base_url('home');?>">Marketplace </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">         
                <ul class="nav navbar-nav  navbar-links navbar-right">
                <?php
                if(!$this->session->userdata('username')) { 
                ?>
                    <li role="presentation"><a href="<?=base_url('register');?>">DAFTAR</a></li>
                    <li role="presentation"><a href="<?=base_url('login');?>">MASUK</a></li>
                <?php } ?>
                	<?php
                    if($this->session->has_userdata('username')) { ?>
                    <li><a href="<?=base_url('keranjang');?>"><i class="fa fa-shopping-cart fa-2x" style="color: white;"></i><span class="badge">1</span> </a>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> <span class="caret"></span><img src="<?=base_url();?>assets/img/avatar.jpg" class="dropdown-image"></a>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li><a href="<?=base_url('users');?>">Profile <?=$this->session->has_userdata('id_toko');?></a></li>
                            <li role="presentation"><a href="#">Settings </a></li>
                            <li role="presentation"><a href="#">Payments </a></li>
                            <li role="presentation"><a href="<?=base_url('logout');?>">Logout </a></li>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>

            </div>
        </div>
    </nav>