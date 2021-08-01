<div class="card">
	<div class="card-header">
		<!-- <h3 class="text-center">Invoice</h3> -->
		<button class="btn btn-default" onclick="printDiv()"><i class="fa fa-print" style="font-size: xx-large;"></i> </button>
		<button class="btn btn-default" onclick="pdf()"><i class="fa fa-file-pdf-o" style="font-size: xx-large;color: red;"></i> </button>
	</div>
	<div class="card-body" style="overflow-y: scroll;" id="GFG">
		<div class="row">
			<div class="col-md-12 text-right" style="text-align: right;">
				<h3 class="text-center" style="text-align: center;font-size: 30px;">Invoice</h3>
				<h4 style="font-size: 25px">Invoice No: <?=$result['invoice_no']?></h4>
				<label><b>Invoice Date:</b> <?=$result['invoice_date']?></label><br>
				<label><b>Invoice Due Date:</b> <?=$result['due_date']?></label>
			</div>
			<div class="col-md-12" style="margin-bottom: 20px;">
				<label><b>Billed To:</b> <?=$result['client_name']?></label><br>
				<label><b>Address:</b> <?=$result['address']?></label><br>
				<label><b>Phone:</b> <?=$result['mobile']?></label>
			</div>
		</div>
	 		<table class="table table-striped table-bordered">
				<thead>
				<tr>
					<th style="width: 5%;padding: 10px;">No</th>
					<th style="padding: 10px;text-align: left;">Service</th>
					<th style="padding: 10px;text-align: left;">Description</th>
					<th style="text-align: left;width: 15%;padding: 10px;">Rate</th>
					<th style="text-align: right;width: 15%;padding: 10px;">Amount</th>
				</tr>
				</thead>
			    <tbody>
				<?php 	$service = explode(',', $result['service']);
						$rate= explode(',', $result['rate']);
						$amount= explode(',', $result['paid_amount']);
						$tax= explode(',', $result['tax']);
						$desc= explode(',', $result['description']);
						$stotal=0;
					foreach($service as $key => $v){ 
						foreach($amount as $key1 => $a){ 
							foreach($rate as $key2 => $r){
								foreach($desc as $key3 => $d){  
									if ($key ==$key1 && $key==$key2 && $key==$key3) {
										$stotal+=$a;?>
					<tr>
						<td style="padding: 10px"><?=$key+1;?></td>
						<td style="padding: 10px"><?php 
							foreach($services as $s){
                            	if($s['id'] ==$v){
                             		echo $s['service_title'];
                    	    	}
                     		};?></td>
						<td style="padding: 10px"><?=$d;?></td>
						<td style="padding: 10px"><?=$r;?></td>
						<td align="right" style="padding: 10px"><?=$a;?></td>
					</tr>
				<?php }}}}}?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="5" style="text-align: right;padding: 5px;">Sub Total: <?=$stotal?></th>
					</tr>
					<?php   $taxname= explode(',', $result['tax_name']);
                    		$tax= explode(',', $result['tax']);
		                foreach($taxname as $key => $tname){
		                    foreach($tax as $key1 => $t){
		                    if ($key1==$key) {?>
					<tr>
						<th colspan="5" style="text-align: right;padding: 5px;"><?=$tname.': '.$t?></th>	
					</tr>
					<?php }}}?>
					<tr>
						<th colspan="5" style="text-align: right;padding: 5px;">Total: <?=$stotal+array_sum($tax)?></th>
					</tr>
				</tfoot>
			</table>
		  	
	</div>
</div>	

<script>
    function printDiv() {
        var divContents = document.getElementById("GFG").innerHTML;
        var a = window.open('', '', 'height=500, width=500');
        a.document.write('<html>');
        a.document.write('<body>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }
    function pdf() {
        var divContents = document.getElementById("GFG").innerHTML;
        var a = window.open('', '', 'height=500, width=1000');
        a.document.write('<html>');
        a.document.write('<body>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }
</script>