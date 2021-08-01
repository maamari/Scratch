<!-- <script>
    <?php if($this->session->flashdata('success')){  ?>
    toastr.success("<?=$this->session->flashdata('success'); ?>");
    <?php } if($this->session->flashdata('info')){  ?>
    toastr.info("<?=$this->session->flashdata('info'); ?>");
    <?php }if($this->session->flashdata('error')){  ?>
    	toastr.error("<?=$this->session->flashdata('error'); ?>");
    <?php }?>
</script> -->
<div class="container" style="max-width: 100%;padding-top: 70px;">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="col-lg-12 col-md-12 col-sm-12" data-aos="zoom-in" style="background-color: white;height: 200px;">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 text-center">
                        <?php if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success success" onmouseover="dismissed()"><i class="fa fa-check"></i> <?=$this->session->flashdata('success');?></div>
                        <?php }if ($this->session->flashdata('info')) { ?>
                            <div class="alert alert-info info" onmouseover="dismissed()"><i class="fa fa-info"></i>  <?=$this->session->flashdata('info');?></div>
                        <?php }if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger error" onmouseover="dismissed()"><i class="fa fa-close"></i>  <?=$this->session->flashdata('error');?></div>
                        <?php } ?>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <?php echo form_open('website/search'); ?>
				<div class="row">
					<div class="col-lg-2 col-md-2 col-sm-2"></div>
					<div class="col-lg-4 col-md-4 col-sm-4" style="padding-right: 0">
						<h4 style="font-weight: bolder;">What</h4>
						<p style="color: #767676 !important;font-size: .6875rem;font-weight:400;line-height: 1.46;margin-bottom: 0.5rem">job title,keywords or company</p>
						<input type="text" name="title" placeholder="Job title,keywords or company" class="form-control" style="color: #2d2d2d !important;padding: 0.475rem 0.85rem">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4">
						<h4 style="font-weight: bolder;">Where</h4>
						<p style="color: #767676 !important;font-size: .6875rem;font-weight:400;line-height: 1.46;margin-bottom: 0.5rem">city, province, or region</p>
						<input type="text" name="location" placeholder="City or province" class="form-control" style="color: #2d2d2d !important;padding: 0.475rem 0.85rem">
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2" style="padding-left: 0">
						<button type="submit" class="btn btn-primary" style="margin-top: 60px;padding: .5rem 1.5rem;border-radius: 0.5rem;box-shadow: inset 0 1px 0.25rem rgba(0,0,0,0.2);cursor: pointer;font-size: .875rem;font-weight: 700;line-height: 1.5rem;background-color: #1c56ac !important">Find Jobs</button>
					</div>
				</div>
                <?php echo form_close(); ?>
				<div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2"></div>
                    <div class="col-lg-8 col-md-8 col-sm-8 text-center" style="padding-top: 20px">
                        <a href="#" style="color: #1c56ac !important;font-size: 16px;font-weight: 700;line-height: 1.67">Post Your CV</a>
                        <span class="icl-TextPromo-divider"> – </span>
                        <span class="icl-TextPromo-text">It only takes a few seconds</span>
                    </div>    
                    <div class="col-lg-2 col-md-2 col-sm-2"></div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2"></div>
                    <div class="col-lg-8 col-md-8 col-sm-8 text-center" style="padding-top: 15px">
                        <a href="#" style="color: #1c56ac !important;font-size: 16px;font-weight: 700;line-height: 1.67">Employers: Post a job</a>
                        <span class="icl-TextPromo-divider"> – </span>
                        <span class="icl-TextPromo-text">Your next hire is here</span>
                    </div>    
                    <div class="col-lg-2 col-md-2 col-sm-2"></div>
                </div>
			</div>
		</div>
	</div>
    <section style="background-color: #faf9f8 !important;padding: 1rem">
        <div class="row">
           <div class="col-lg-3 col-md-3 col-sm-3"></div>
           <div class="col-lg-6 col-md-6 col-sm-6">
               <span style="color: #2d2d2d !important;font-size: 1.125rem;letter-spacing: -.06px;font-weight: 700;line-height: 1.34 ">Recent searches</span>
               <a href="#" class="btn btn-default" style="font-weight: bold;border-radius: 0.5rem;background: #fff;float: right;color: gray">Edit</a>
               <div style="background-color: #fff;padding: 1rem;margin-top: 20px">
                   <a href="#" style="color: #2d2d2d !important">Codeigniter Developer - lahore  <span style="float: right;color: #9c2f5f !important;font-size: .75rem">5 new <i class="fa fa-angle-right" style="color: gray;font-size: large;margin: 5px 2px 0"></i></span></a>
                  
               </div>
           </div>
           <div class="col-lg-3 col-md-3 col-sm-3"></div>
        </div>
    </section>
</div>

<!--/Login-->
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-center mb-4">Login Now</h5>
                    	<?php echo form_open('login/do_login'); ?>
                        <div class="form-group">
                            <label class="mb-2">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required="">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="" required="">
                        </div>
                        <button type="submit" class="btn btn-primary submit mt-2">Sign In</button>
                        <p class="text-center pb-4">
                            <a href="#" data-toggle="modal" aria-pressed="false" data-target="#exampleModalCenter3"> Don't have an account?</a>
                        </p>
                    	<?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--//Login-->
<div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-center mb-4">Sign Up Now</h5>
                    	<?php echo form_open('website/signup'); ?>
                        <div class="form-group">
                            <label class="mb-2">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="" name="name" required>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Phone</label>
                            <input type="number" class="form-control" id="phone" placeholder="" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="" required="">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="" required="">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Confirm Password</label>
                            <input type="password" name="cpass" class="form-control"  placeholder="" required="">
                        </div>
                        <button type="submit" class="btn btn-primary submit mt-2">Sign Up</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function dismissed() {
        $(".success").hide(500);
        $(".info").hide(500);
        $(".error").hide(500);
    }
</script>