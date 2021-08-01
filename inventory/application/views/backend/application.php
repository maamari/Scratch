<!-- datatable -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="container">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h2 class="box-title text-center">Applications Listing</h2>
            </div>
            <div class="box-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
						<th>ID</th>
                        <th>Job Title</th>
						<th>Name</th>
						<th>Email</th>
                        <th>Phone</th>
                        <th>CV</th>
						<th style="width: 3%">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($apllications as $ap){ 
                        $id = urlencode(base64_encode($ap['id']));?>
                    <tr>
						<td><?php echo $ap['id']; ?></td>
                        <td><?php echo $ap['title']; ?></td>
						<td><?php echo $ap['name']; ?></td>
						<td><?php echo $ap['email']; ?></td>
                        <td><?php echo $ap['phone']; ?></td>
                        <td><a href="<?=base_url('dashboard/download/'.$ap['cv'])?>"><?=$ap['cv'];?></a></td>
						<td>
                            <a hidden title="Edit" href="<?php echo site_url('dashboard/edit/'.$id); ?>" class="btn btn-info btn-sm"><span class="fa fa-edit"></span></a> 
                            <a title="Delete" href="<?php echo site_url('dashboard/remove/'.$ap['id']); ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Job Title</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>CV</th>
                        <th style="width: 3%">Actions</th>
                    </tr>
                    </tfoot>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
<link href="https://code.jquery.com/jquery-3.5.1.js" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" rel="stylesheet">
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>