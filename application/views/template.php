<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Bakasur - Menu Administration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Le styles -->
  <link rel="stylesheet" type="text/css" href="<?php print base_url()?>assets/css/metro-bootstrap.min.css">
  <link rel="stylesheet" href="<?php print base_url()?>assets/css/iconFont.css">
  <link rel="stylesheet" href="<?php print base_url()?>assets/css/docs.css">
</head>
<body>
  <!-- Static navbar -->
  <div class="navbar navbar-default navbar-static-top bsnavbar">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar">dd</span>
          <span class="icon-bar">cc</span>
          <span class="icon-bar">ee</span>
        </button>
        <a class="navbar-brand"><img src="<?php print base_url()?>assets/images/logo_100.png"></a>
      </div>
      <div class="collapse navbar-collapse">
        <div class="navbar-left ml150">
          <div class=""></div>
          <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <?php if( $this->session->userdata('username'))  { ?>
              <ul class="nav navbar-nav">
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
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="container bs-docs-container">
    <div class="row">
      <div class="col-md-1" role="main"></div>
      <div class="col-md-9" role="main">
      </div>
      <?php $this->load->view($content);?>
    </div>
    <div class="col-md-1" role="main"></div>
  </div>
</div>
<footer class="bs-footer" role="contentinfo">
  <div class="container">
    © 2014 www.bakasur.mxbit.co.in All rights resereved -  <a href="http://mxbit.co.in">mxbit technology innovations pvt ltd</a>
  </div>
</footer>
<script type="text/javascript">

// var _gaq = _gaq || [];
// _gaq.push(['_setAccount', 'UA-36060270-1']);
// _gaq.push(['_trackPageview']);

// (function() {
//   var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
//   ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
//   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
// })();

</script>
</body>
</html>

