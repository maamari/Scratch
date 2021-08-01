<!doctype html>
<html lang="en">
  <head>
    <title>Jacosamp Management System || Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="<?=base_url()?>assets/login/css/style.css">

    </head>
    <body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Jacosamp Management System || Login</h2>
                    <?php if($this->session->flashdata('error') || form_error('password') || form_error('username')) {?>
                            <div class="alert alert-danger alert-dismissible">
                                <?php echo form_error('password'); ?>
                                <?php echo form_error('email'); ?>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div  class="img" style="background-image: url(assets/login/images/em_covid-01.png);background-size: contain; background-color: #7A1F2F">
                  </div>
                        <div class="login-wrap p-4 p-md-5">
                    <div class="d-flex">
                        <div class="w-100" >
                            <h3 class="mb-4">Sign In</h3>
                        </div>
                               <!--  <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                    </p>
                                </div> -->
                    </div>
                            <?php echo form_open('login/do_login'); ?>
                        <div class="form-group mb-3">
                            <label class="label" for="name">Email</label>
                            <input type="email" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" placeholder="abc@xyz.com" required>
                        </div>
                    <div class="form-group mb-3">
                        <label class="label" for="password">Password</label>
                      <input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn rounded submit px-3" style="background: #7A1F2F; color: white">Sign In</button>
                    </div>
                   <!--  <div class="form-group d-md-flex">
                        <div class="w-50 text-left">
                            <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                      <input type="checkbox" checked>
                                      <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#">Forgot Password</a>
                                    </div>
                    </div> -->
                     <?php echo form_close(); ?>
                  <!-- <p class="text-center">Not a member? <a data-toggle="tab" href="#signup">Sign Up</a></p> -->
                </div>
              </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?=base_url()?>assets/login/js/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/login/js/popper.js"></script>
  <script src="<?=base_url()?>assets/login/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/login/js/main.js"></script>

    </body>
</html>

