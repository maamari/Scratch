<script>
	<?php if($this->session->flashdata('info')){  ?>
    toastr.info("<?=$this->session->flashdata('info'); ?>");
    <?php }if($this->session->flashdata('error')){  ?>
    	toastr.error("<?=$this->session->flashdata('error'); ?>");
    <?php }?>
</script>
<div class="container" style="max-width: 100%;padding-top: 10px;">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="col-lg-12 col-md-12 col-sm-12" style="background-color: white">
                <?php echo form_open('website/search'); ?>
				<div class="row">
					<div class="col-lg-1 col-md-1 col-sm-1"></div>
					<div class="col-lg-3 col-md-3 col-sm-3" style="padding-right: 0">
						<h6 style="font-weight: bolder;">What</h6>
						<p style="color: #767676 !important;font-size: .6875rem;font-weight:400;line-height: 1.46;margin-bottom: 0.5rem">job title,keywords or company</p>
						<input type="text" name="title" placeholder="Job title,keywords or company" class="form-control" style="color: #2d2d2d !important;padding: 0.375rem 0.65rem">
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3">
						<h6 style="font-weight: bolder;">Where</h6>
						<p style="color: #767676 !important;font-size: .6875rem;font-weight:400;line-height: 1.46;margin-bottom: 0.5rem">city, province, or region</p>
						<input type="text" name="title" placeholder="City or province" class="form-control" style="color: #2d2d2d !important;padding: 0.375rem 0.65rem">
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2" style="padding-left: 0">
						<button type="submit" class="btn btn-primary" style="margin-top: 50px;padding: .3rem 1rem;border-radius: 0.5rem;box-shadow: inset 0 1px 0.25rem rgba(0,0,0,0.2);cursor: pointer;font-size: .875rem;font-weight: 700;line-height: 1.5rem;background-color: #1c56ac !important">Find Jobs</button>
					</div>
				</div>
                <?php echo form_close(); ?>
                <hr>
			</div>
		</div>
	</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                   <div class="col-lg-6 col-md-6 col-sm-6">
                        <a href="#" style="color: #1c56ac !important;font-size: 16px;font-weight: 700;line-height: 1.67">Post Your CV</a>
                        <span> – </span>
                        <span style="font-weight: bold">Let employers find you</span>
                        <hr>
                        <p style="color: #767676 !important;font-size: .6875rem;font-weight:400;line-height: 1.46;margin-bottom: 0.5rem"><?=$title.' jobs in '.$loc?></p>
                        <?php foreach ($posts as $p) {
                            $saved  = $this->Website_model->get_save_job($p['id']);?>
                        <div class="card" onclick="get_job_detail(<?=$p['id']?>)" id="job<?=$p['id']?>" style="padding: 1rem;cursor: pointer;">
                            <a href="#" style="color: black"><h5 style="font-weight: bold"><?=$p['title']?></h5></a>
                            <a href="#" style="line-height: 1.5rem !important;font-size: 1rem;font-weight: 400;color: #2d2d2d !important"><?=$p['company']?></a>
                            <p style="line-height: 1.5rem !important;font-size: 1rem;font-weight: 400;color: #2d2d2d !important"><?=$p['location']?></p>
                            <span style="font-weight: bold"><?=$p['salary']?></span>
                            <p style="color: #767676"><i class="fa fa-circle-o"></i> <?=substr($p['description'], 0, 120).'...'?> </p>
                            <p><span style="font-size: 0.75rem !important;color: gray">14 days ago</span> <a title="Save job" href="<?=base_url('website/save_job/'.$p['id'])?>" style="font-size: 0.75rem !important;color: #1c56ac !important"><?php if ($saved['status'] == ACTIVE) {
                                echo "Saved";
                            }else{
                                echo "Save job";
                            } ?></a> </p>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="card" id="detail" style="padding: 1rem;"></div>
                    </div> 
                </div>  
            </div>
        </div>
    </div>
</div>

<!--/Login-->
<div class="modal fade" id="applymodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center" hidden>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="apply"></div>
        </div>
    </div>
</div>
<!--//Login-->
<script>
    function add_letter() {
        $("#ad").hide(500);
        $("#msg").show(500);
        $("#letter").show(500);
    }
    function get_job_detail(id) {
        console.log(id);
        $.ajax({
            url: "<?=site_url('website/job_detail/');?>"+id,
            success: function (data) {
                $("#detail").html(data);
            }
        });
    }
    function appy_job(id) {
        console.log(id);
        $.ajax({
            url: "<?=site_url('website/job_apply/');?>"+id,
            success: function (data) {
                $("#apply").html(data);
            }
        });
    }
</script>