 <!--
  * Developed by Hafiz Hassan 
 * Phon# +92303 7859398
 * Date: 2/7/2020  -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Indeed</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?=base_url('assets/');?>css/bootstrap.css" rel='stylesheet' type='text/css' />
  <link href="<?=base_url('assets/');?>css/fontawesome-all.css" rel="stylesheet">
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0" hidden>
  <h1>My First Bootstrap 4 Page</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="<?=base_url('website')?>">Indeed</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav" style="width: 90%">
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('dashboard/index')?>">Jobs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('dashboard/application')?>">Applications</a>
      </li>
      <li class="nav-item" hidden>
        <a class="nav-link" href="#">Link</a>
      </li> 
    </ul>
    <a class="btn btn-danger btn-sm" href="<?=base_url('login/logout')?>"><i class="fa fa-sign-out-alt"></i> Logout</a>
  </div>  
</nav> 
<?php                    
    if(isset($_view) && $_view)
        $this->load->view($_view);
?>  
<script src="<?=base_url('assets/');?>js/jquery-2.2.3.min.js"></script>
<script src="<?=base_url('assets/');?>js/bootstrap.js"></script>

</body>
</html>
