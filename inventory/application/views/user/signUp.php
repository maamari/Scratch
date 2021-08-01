<?php include('header.php'); ?>
<section id="contact" class="home-section bg-gray">
    	<div class="container">
      		<div class="row">
        		<div class="col-md-offset-2 col-md-8">
          			<div class="section-heading">
            			<h2>Sign Up</h2>
                  <div class="heading-line"></div>
          			</div>
        		</div>
      		</div>
      		<div class="row">
        		<div class="col-md-offset-2 col-md-8">
          			<div id="errormessage"></div>
                  <?= form_open('userController/addUser'); ?>
          				<!-- <form action="" method="post" class="form-horizontal contactForm" role="form"> -->
                    <div class="form-group">
                      <div class="col-md-offset-2 col-md-8">
                        <label class="radio-inline">
                          <input type="radio" name="optradio" value="<?=INVESTOR?>" checked>Investor
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="optradio" value="<?=MENTOR?>">Mentor
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="optradio" value="<?=OWNER?>">Idea Owner
                        </label>
                      </div>
                    </div><br><br>
                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group">
                          <input type="text" name="f_name" class="form-control" id="name" placeholder="First Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        </div>
                    </div>
                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group">
                          <input type="text" name="l_name" class="form-control" id="name" placeholder="Last Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        </div>
                    </div>
                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group">
                          <input type="text" name="u_name" class="form-control" id="name" placeholder="Username" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        </div>
                    </div>
                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group">
                          <input type="password" name="c_password" class="form-control" id="name" placeholder="Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        </div>
                    </div>
                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group">
                          <input type="number" name="number" class="form-control" id="name" placeholder="Contact No" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        </div>
                    </div>
                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group">
                          <input type="text" name="address" class="form-control" id="name" placeholder="Address" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                          <div class="validation"></div>
                        </div>
                    </div>
            				<div class="col-md-offset-2 col-md-8">
              					<div class="form-group">
                					<input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
              					</div>
            				</div>
            				<div class="form-group">
              					<div class="col-md-offset-2 col-md-8">
                					<button type="submit" class="btn btn-theme btn-lg btn-block" value="submit">Create</button>
              					</div>
            				</div>
            				<div class="col-md-offset-2 col-md-8">
            					<a href="<?= base_url(); ?>userController/login">Already have account? Sign In</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="<?= base_url(); ?>userController/index">Back to Home</a>
            				</div>
          				</form>
			        </div>
      			</div>
		    </div>
  	</section>
<?php include('footer.php'); ?>