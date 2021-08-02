<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Inventory Management System</title>
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/style-starter.css">
  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
</head>
<body class="sidebar-menu-collapsed" >
<section>
  <!-- sidebar menu start -->
  <div class="sidebar-menu sticky-sidebar-menu">

    <!-- logo start -->
    <div class="logo">
      <h1><a href="<?=base_url()?>index.php"></a></h1>
    </div>
    <div class="logo-icon text-center" style="padding-top: 15px">
    </div>
    <!-- //logo end -->

    <div class="sidebar-menu-inner">

      <!-- sidebar nav start -->
      <ul class="nav nav-pills nav-stacked custom-nav">
        
        <li class="active"><a href="<?=base_url()?>index.php"><i class="fa fa-pencil-square-o"></i><span> New items</span></a>
        </li>
       
          <!-- <li><a href="<?=base_url()?>user/index"><i class="fa fa-users"></i> <span>Users</span></a></li> -->
     
         <!-- <li><a href="<?=base_url()?>items/index"><i class="fa fa-database"></i> <span>Items</span></a></li> -->
          <li><a href="<?=base_url()?>Procurements"><i class="fa fa-user-o"></i> <span>Procurements</span></a></li>
               <li><a href="<?=base_url()?>Ordered_items/index"><i class="fa fa-shopping-cart"></i> <span>Ordered items</span></a></li>
	       <li><a href="<?=base_url()?>Forms/index"><i class="fa fa-file-text-o"></i> <span>Forms</span></a></li> 
         <?php if($this->session->userdata('role') == MANAGER  OR $this->session->userdata('role') == DRIVER  OR $this->session->userdata('role') == ADMIN){ ?>
  
               <?php } ?>

        
      
      </ul>
      <!-- //sidebar nav end -->
      <!-- toggle button start -->
      <a class="toggle-btn">
        <i class="fa fa-angle-double-left menu-collapsed__left"><span>Collapse Sidebar</span></i>
        <i class="fa fa-angle-double-right menu-collapsed__right"></i>
      </a>
      <!-- //toggle button end -->
    </div>
  </div>
  <!-- //sidebar menu end -->
  <!-- header-starts -->
  <div class="header sticky-header">

    <!-- notification menu start -->
    <div class="menu-right">
      <div class="navbar user-panel-top">
      <!--   <div class="search-box">
          <form action="#search-results.html" method="get">
            <input class="search-input" placeholder="Search Here..." type="search" id="search">
            <button class="search-submit" value=""><span class="fa fa-search"></span></button>
          </form>
        </div> -->
        <div class="user-dropdown-details d-flex">
         
          <div class="profile_details">
            <ul>
              <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu3" aria-haspopup="true"
                  aria-expanded="false">
                  <!-- <div class="profile_img">
                    <img src="<?=base_url()?>assets/images/profileimg.jpg" class="rounded-circle" alt="" />
                    <div class="user-active">
                      <span></span>
                    </div>
                  </div> -->
                </a>
                <ul hidden class="dropdown-menu drp-mnu" aria-labelledby="dropdownMenu3">
                  <li class="user-info">
                    <h5 class="user-name"><?php echo $this->session->userdata('first_name'); ?></h5>
                    <span class="status ml-2">Available</span>
                  </li>
                  
                
                  <li class="logout"> <a href="<?php echo base_url('login/logout');?>"><i class="fa fa-power-off"></i> Logout</a> </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--notification menu end -->
  </div>
  <!-- //header-ends -->
  <!-- main content start -->
<div class="main-content">

  <!-- content -->
  <div class="container-fluid content-top-gap">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </nav>
    

   

    <!-- charts -->
    <div class="chart">
    
         <div id="page-inner">
            <?php
            if(isset($_view) && $_view)
                $this->load->view($_view);
            ?>
            <!-- /. ROW  -->
            <hr />

      
      </div>
    </div>
    <!-- //charts -->

    <!-- chatting -->
    
    <!-- //chatting -->

    <!-- accordions -->
    

    <!-- modals -->
   
    <!-- //modals -->

  </div>
  <!-- //content -->
</div>
<!-- main content end-->
</section>
  <!--footer section start-->
<footer class="dashboard" hidden>
  <p>&copy 2021 Inventory Management System. All Rights Reserved | Design & Developed by <a href="#" target="_blank"
      class="text-primary">M Waqar Aslam.</a></p>
</footer>
<!--footer section end-->
<!-- move top -->
<button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
  <span class="fa fa-angle-up"></span>
</button>
<script>

  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction()
  };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("movetop").style.display = "block";
    } else {
      document.getElementById("movetop").style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
</script>
<!-- /move top -->


<script src="<?=base_url()?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery-1.10.2.min.js"></script>

<!-- chart js -->
<script src="<?=base_url()?>assets/js/Chart.min.js"></script>
<script src="<?=base_url()?>assets/js/utils.js"></script>
<!-- //chart js -->

<!-- Different scripts of charts.  Ex.Barchart, Linechart -->
<script src="<?=base_url()?>assets/js/bar.js"></script>
<script src="<?=base_url()?>assets/js/linechart.js"></script>
<!-- //Different scripts of charts.  Ex.Barchart, Linechart -->


<script src="<?=base_url()?>assets/js/jquery.nicescroll.js"></script>
<script src="<?=base_url()?>assets/js/scripts.js"></script>

<!-- close script -->
<script>
  var closebtns = document.getElementsByClassName("close-grid");
  var i;

  for (i = 0; i < closebtns.length; i++) {
    closebtns[i].addEventListener("click", function () {
      this.parentElement.style.display = 'none';
    });
  }
</script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/Datatables/jquery.dataTables.min.css">
<script type="text/javascript" src="<?=base_url()?>assets/Datatables/jquery.dataTables.min.js"></script>
<!-- //close script -->

<!-- disable body scroll when navbar is in active -->
<script>
  $(function () {
    $('.sidebar-menu-collapsed').click(function () {
      $('body').toggleClass('noscroll');

    })
    $('#myTable').DataTable();

  });

</script>


<!-- disable body scroll when navbar is in active -->

 <!-- loading-gif Js -->
 <script src="<?=base_url()?>assets/js/modernizr.js"></script>
 <script>
     $(window).load(function () {
         // Animate loader off screen
         $(".se-pre-con").fadeOut("slow");;
     });
 </script>
 <!--// loading-gif Js -->

<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

</body>

</html>
  
