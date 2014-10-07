<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Bakasur - Menu Administration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Le styles -->
  <!-- <link rel="stylesheet" type="text/css" href="<?php print base_url()?>assets/css/metro-bootstrap.min.css">
  <link rel="stylesheet" href="<?php print base_url()?>assets/css/iconFont.css">
  <link rel="stylesheet" href="<?php print base_url()?>assets/css/docs.css"> -->
    <link href="<?php print base_url()?>assets/css/metro/metro-bootstrap.css?v=2" rel="stylesheet">
    <link href="<?php print base_url()?>assets/css/metro/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php print base_url()?>assets/css/metro/iconFont.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php print base_url()?>assets/css/docs.css">  



</head>
<body class="metro">
  <!-- Static navbar -->

            <div class="navigation-bar" style="margin-bottom:20px;">
                <div class="navigation-bar-content" style="height:150px">
                    <a href="/" class="element" style="height:150px">
                    <span class=""></span> <img src="<?php print base_url()?>assets/images/logo_100.png"></sup>
                    </a>
                    <span class="element-divider" style="height:150px"></span>

                    <a class="pull-menu" href="#"></a>
                    <ul class="element-menu drop-up" style="margin-top:50px">
                     <?php if( $this->session->userdata('username'))  { ?>
                        <li><a href="<?php echo site_url('menu_list/all')?>">Menu List</a></li>
                        <?php if(!$this->session->userdata('client_id')) { ?>
                          <li><a href="<?php echo site_url('category/list_all')?>">Types</a></li>
                          <li><a href="<?php echo site_url('subcategory/all')?>">Categories</a></li>
                          <li><a href="<?php echo site_url('cuisine/all')?>">Cuisine</a></li>
                          <li><a href="<?php echo site_url('client/all')?>">Clients</a></li>
                          <li><a href="<?php echo site_url('groups/all')?>">Groups</a></li>
                          <li><a href="<?php echo site_url('users/all')?>">Users</a></li>
                        <?php } ?>
                        <li><a href="<?php echo site_url('auth/logout')?>">Logout</a></li>
                       <?php } ?>
                    </ul>
                </div>
            </div>


<div class="grid fluid">
  <div class="row padding20">
    <div class="span2">
      
<?php if( $this->session->userdata('username'))  { ?>
        <nav class="sidebar light">
            <ul>
                <li class="title">Quick Links</li>
                 <li class="stick bg-emerald"><a  href="#"><i class="icon-user"></i>Customer List</a></li>
                 <li class="stick bg-emerald"><a  href="#"><i class="icon-basket"></i>Orders Placed</a></li>
                 <li class="stick bg-emerald"><a  href="#"><i class="icon-thumbs-up"></i>Orders Delivered</a></li>
                 <li class="stick bg-emerald"><a  href="#"><i class="icon-stats-up"></i>Analytics</a></li>
                 <li class="stick bg-emerald"><a  href="#"><i class="icon-mail"></i>Notification</a></li>
                 <li class="stick bg-emerald"><a  href="#"><i class="icon-equalizer"></i>Settings</a></li>
            </ul>
        </nav>
      <?php } ?>  

    </div>
    <div class="span10"><?php $this->load->view($content);?></div>
  </div>
</div>


<footer class="bs-footer" role="contentinfo">
  <div class="container">
    <blockquote class="place-right">
    <small> © 2014 www.bakasur.mxbit.co.in All rights resereved -  <a href="http://mxbit.co.in">mxbit technology innovations pvt ltd</a></small>
</blockquote>
   
  </div>
</footer>

   <!-- <script src="<?php print base_url()?>assets/js/metro/jquery/jquery_v2.0.1.js"></script>-->
    <script src="<?php print base_url()?>assets/js/metro/jquery/jquery.widget.min.js"></script>
    <script src="<?php print base_url()?>assets/js/metro/metro.min.js">
    <script src="<?php print base_url()?>assets/js/metro/metro/metro-dropdown.js"></script> 
</body>
</html>

