<div class="card"> 
  <div class="card-header">
      <h4 style="font-weight: bolder;">Case Types</h4>
      <span></span>
      <div class="pull-right" >
            <button class="btn btn-success add" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Case Type</button>
        </div>
  </div>
  <div class="card-body">
      <div class="table-responsive dt-responsive">
          <table id="myTable" class="table table-striped table-bordered nowrap">
              <thead>
                  <tr>
                      <th style="width: 5%">#</th>
                      <th>Title</th>
                      <th style="width: 12%">Action</th>
                  </tr>
              </thead>
              <tbody>
              <?php $count=1; foreach($results as $r){ ?>
                  <tr>
                      <td><?=$r['id']?></td>
                      <td class="title<?=$r['id']?>"><?=$r['casetype_title']?></td>
                      <td>
                        <button data-toggle="modal" data-target="#myModal" onclick="get_casetype(<?=$r['id']?>)" class="btn btn-info btn-sm">Edit</button>
                        <a href="<?php echo site_url('user/remove/'.$r['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                      </td>
                  </tr>
              <?php } ?>
              </tbody>
          </table>
      </div>
  </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-plus"></i> New Case Type</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <?php echo form_open('case-types'); ?>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <label class=" control-label"><span class="text-danger">*</span>Title</label>
                <input type="text" name="title" value="<?php echo $this->input->post('title'); ?>" class="form-control" id="title" required/>
                <span class="text-danger"><?php echo form_error('ttle');?></span>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="client"><i class="fa fa-check"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
      <?php echo form_close(); ?>
    </div>

  </div>
</div>
<script>
  $(function() {
    $('.add').click(function() {
      $('.modal-title').html('<i class="fa fa-plus"></i> New Case Type');
      $('#title').val(''); 
    })
  })
  function get_casetype(id) {
    $('.modal-title').html('<i class="fa fa-pencil"></i> Edit Case Type');
    let title = $('.title'+id).text(); 
     $('#title').val(title); 
    $('.modal-body').append('<input hidden name="id" value="'+id+'">');
  }
</script>