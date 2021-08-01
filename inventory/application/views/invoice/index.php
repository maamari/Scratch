<style>
     /* Dropdown Button */
.dropbtn {
  background-color: gray;
  color: white;
  padding: 5px 10px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 5px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: gray;} 
}
</style>
<div class="card">
	<div class="card-header">
		<h3>Invoices</h3>
		<div class="pull-right">
			<a href="<?php echo site_url('invoice-add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
		</div>
	</div>
	<div class="card-body">
	 		<table id="myTable" class="table table-striped table-bordered">
				<thead>
				<tr>
					<th>ID</th>
					<!-- <th>Service</th> -->
					<th>Amount</th>
					<th>Due Date</th>
					<th>Created by</th>
					<th style="width: 12%">Actions</th>
				</tr>
				</thead>
			    <tbody>
				<?php foreach($results as $r){ ?>
					<tr>
						<td><?php echo $r['id']; ?></td>
						<!-- <td><?php echo $r['service_title']; ?></td> -->
						<td><?php echo $r['paid_amount']; ?></td>
						<td><?php echo $r['due_date']; ?></td>
						<td><?php echo $r['first_name'].' '.$r['last_name']; ?></td>
						<td>
							<div class="dropdown">
   							 	<button class="dropbtn"> 
							      <i class="fa fa-ellipsis-h"></i>
							    </button>
							    <div class="dropdown-content">
							      <a href="<?php echo site_url('invoice-view/'.$r['id']); ?>"><i class="fa fa-eye"></i> View</a>
							      <a href="<?php echo site_url('invoice-edit/'.$r['id']); ?>"><i class="fa fa-edit"></i> Edit</a>
							      <a href="javascript:void(0)" data-toggle="modal" data-target="#payment" onclick="get_invoiceID(<?=$r['id']?>)"><i class="fa fa-rupee"></i> Payment Receive</a>
							      <a href="javascript:void(0)" data-toggle="modal" data-target="#history" onclick="get_history(<?=$r['id']?>)"><i class="fa fa-history"></i> Payment History</a>
							      <a href="<?php echo site_url('invoice-remove/'.$r['id']); ?>"><i class="fa fa-trash"></i> Delete</a>
							    </div>
							  </div>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>	
	</div>
</div>
<!-- Modal -->
<div id="payment" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Payment</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <?php echo form_open('payment'); ?>
	      	<div class="modal-body">
	        <div class="row">
	            <div class="col-md-12">
	                <div class="contct-info">
	                    <div class="form-group">
	                        <label class="discount_text">Amount
	                            <span class="text-danger">*</span>
	                        </label>
	                        <input type="text" id="amount" name="amount" class="form-control" value="" autocomplete="off">
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-md-12">
	                <div class="contct-info">
	                    <div class="form-group">
	                        <label class="discount_text">Receiving date
	                            <span class="text-danger">*</span>
	                        </label>
	                        <input type="date" id="receive_date" name="receive_date" class="form-control date_picker" autocomplete="off">
	                    </div>
	                </div>
	            </div>
	        </div>

	        <div class="row">
	            <div class="col-md-12">
	                <div class="contct-info">
	                    <div class="form-group">
	                        <label class="discount_text">Payment Method
	                            <span class="text-danger">*</span>
	                        </label>
	                        <select class="form-control select2" id="method" name="method">
	                            <option value="">Select Payment Method</option>
	                            <option value="Cash">Cash</option>
	                            <option value="Cheque">Cheque</option>
	                            <option value="Net Banking">Net Banking</option>
	                            <option value="Other">Other</option>
	                        </select>


	                    </div>
	                </div>
	            </div>
	        </div>

	        <div class="row">
	            <div class="col-md-12">
	                <div class="contct-info">
	                    <div class="form-group">
	                        <label class="discount_text">Reference Number
	                            <span class="text-danger">*</span>
	                        </label>
	                        <input type="text" id="referance_number" name="referance_number" class="form-control " value="" autocomplete="off">
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-md-12">
	                <div class="contct-info">
	                    <div class="form-group">
	                        <label class="discount_text">Note</label>
	                        <textarea id="note" name="note" class="form-control"></textarea>
	                    </div>
	                </div>
	            </div>
	        </div>

    	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
      </div>
    </div>
    <?php echo form_close(); ?>

  </div>
</div>	
<!-- Modal -->
<div id="history" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Payment History</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      	<button class="btn btn-default pdf"><i class="fa fa-file-pdf-o" style="color: red;font-size: xx-large;"></i></button>
      	<div id="content">
	        <table class="table" style="width: 100% !important">
	        	<tr>
	        		<th style="border-bottom: 1px solid #dee2e6;border-top: none;">Invoice No</th>
	        		<th style="border-bottom: 1px solid #dee2e6;border-top: none;">Amount</th>
	        		<th style="border-bottom: 1px solid #dee2e6;border-top: none;">Receiving Date</th>
	        		<th style="border-bottom: 1px solid #dee2e6;border-top: none;">Payment Method</th>
	        		<th style="border-bottom: 1px solid #dee2e6;border-top: none;">Reference Number</th>
	        		<th style="border-bottom: 1px solid #dee2e6;border-top: none;">Note</th>
	        	</tr>
	        	<tbody id="history_load"></tbody>
	        </table>
	       	<div id="editor"></div>
	       </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script>
	$(".pdf").on("click", function () {
            var divContents = $("#content").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>DIV Contents</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
	var doc = new jsPDF();
	var specialElementHandlers = {
	    '#editor': function (element, renderer) {
	        return true;
	    }
	};

	$('.pdff').click(function () {
	    doc.fromHTML($('#content').html(), 5, 5, {
	        'width': 1000,
	            'elementHandlers': specialElementHandlers
	    });
	    doc.save('sample-file.pdf');
	});
	function get_invoiceID(id) {
		$('#payment .modal-body').append('<input hidden name="invoice_id" value="'+id+'">')
	}
	function get_history(id) {
		 $.ajax({
	        url: "<?=base_url('get-history/')?>"+id,
	        type: "post",
	        success: function(response) {
	        	$('#history_load').html(response);
	        }
	    });
	}
</script>