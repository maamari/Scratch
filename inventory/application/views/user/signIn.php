<?php include('header.php'); ?>
<section id="contact" class="home-section bg-gray">
    	<div class="container">
      		<div class="row">
        		<div class="col-md-offset-2 col-md-8">
          			<div class="section-heading">
            			<h2>Sign In</h2>
                  <div class="heading-line"></div>
          			</div>
        		</div>
      		</div>
      		<div class="row">
        		<div class="col-md-offset-2 col-md-8">
          			<div id="sendmessage">Your message has been sent. Thank you!</div>
          			<div id="errormessage"></div>
                  <?= form_open('userController/'); ?>
          				<!-- <form action="" method="post" class="form-horizontal contactForm" role="form"> -->
            				<div class="col-md-offset-2 col-md-8">
              					<div class="form-group">
                					<input type="email" class="form-control" name="" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                					<div class="validation"></div>
              					</div>
            				</div>
            				<div class="col-md-offset-2 col-md-8">
              					<div class="form-group">
                					<input type="password" class="form-control" name="" id="subject" placeholder="Your Password" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                					<div class="validation"></div>
              					</div>
            				</div>
            				<div class="form-group">
              					<div class="col-md-offset-2 col-md-8">
                					<button type="submit" class="btn btn-theme btn-lg btn-block" value="submit">Sign In</button>
              					</div>
            				</div>
            				<div class="col-md-offset-2 col-md-8">
            					<a href="<?= base_url(); ?>userController/signUp">Don't have account? Create now</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="<?= base_url(); ?>userController/forgotPassword">Forgot Password</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="<?= base_url(); ?>userController/index">Back to Home</a>
            				</div>
          				</form>
			        </div>
      			</div>
		    </div>
  	</section>
<?php include('footer.php'); ?>