<?php include('header.php'); ?>
<section id="contact" class="home-section bg-gray">
    	<div class="container">
      		<div class="row">
        		<div class="col-md-offset-2 col-md-8">
          			<div class="section-heading">
            			<h2>Change Password</h2>
                  <div class="heading-line"></div>
          			</div>
        		</div>
      		</div>
      		<div class="row">
        		<div class="col-md-offset-2 col-md-8">
                  <?= form_open('userController/'); ?>
          				<!-- <form action="" method="post" class="form-horizontal contactForm" role="form"> -->
            				<div class="col-md-offset-2 col-md-8">
              					<div class="form-group">
                					<input type="password" class="form-control" name="o_password" id="subject" placeholder="Old Password" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              					</div>
            				</div>
                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group">
                          <input type="password" class="form-control" name="n_password" id="subject" placeholder="New Password" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                        </div>
                    </div>
                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group">
                          <input type="password" class="form-control" name="c_password" id="subject" placeholder="Confirm Password" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                        </div>
                    </div>
            				<div class="form-group">
              					<div class="col-md-offset-2 col-md-8">
                					<button type="submit" class="btn btn-theme btn-lg btn-block" value="submit">Change</button>
              					</div>
            				</div>
            				<div class="col-md-offset-2 col-md-8">
            					<a href="<?= base_url(); ?>userController/login">Back</a>
            				</div>
          				</form>
			        </div>
      			</div>
		    </div>
  	</section>
<?php include('footer.php'); ?>