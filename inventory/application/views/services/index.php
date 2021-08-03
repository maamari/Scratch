

 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<div class="pull-right">
	<a href="<?php echo site_url('add-items'); ?>" class="btn btn-success">Add</a> <br>
</div>
<h1>All Procurements</h1>


<div class="table-responsive">
<table id="myTable" class="table table-striped table-bordered table">
	<thead>
	<tr>
		<th>Order ID</th>
    <th>Contact email</th>
      <th>PR number</th>
		<th>PR status</th>
		<th>Required delivery date</th>
		<th>Tagging required</th>
		<th>Approval required</th>
		<th>Associated system(s)</th>
		<th>Number of items</th>
	
		
		<th style="min-width: 150px">Actions</th>
	</tr>
	</thead>
    <tbody>
	<?php $count=0; foreach($services as $u){ $count++; ?>
		<tr>
			<td><?php echo $u['id']; ?></td> 
      <td><?php echo $u['contact_email']; ?></td> 
      <td><?php echo $u['pr_number']; ?></td> 
			<td><?php echo $u['pr_status']; ?></td>
			<td><?php echo $u['delivery_date']; ?></td>
			<td><?php echo $u['tagging_req']; ?></td> 
			<td><?php echo $u['approval_req']; ?></td>
		    <td><?php echo $u['associated_systems']; ?></td> 
			<td><?php echo $u['no_of_items']; ?></td> 
			
			<td>
		
				<a href="<?php echo site_url('edit-items/'.$u['id']); ?>" class="btn btn-info btn-xs">Edit</a>
				<a href="<?php echo site_url('services/remove/'.$u['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
			</td>
		</tr>

	<?php } ?>
	</tbody>
</table>

<button id="btnExport" class="btn-info" onclick="javascript:xport.toCSV('myTable');"> Export to CSV</button>
<!-- <button onclick="myTable()" class="btn-primary">Print OR Save</button>
 -->
<script type="text/javascript">
 var xport = {
  _fallbacktoCSV: true,  
  toXLS: function(tableId, filename) {   
    this._filename = (typeof filename == 'undefined') ? tableId : filename;
    
    //var ieVersion = this._getMsieVersion();
    //Fallback to CSV for IE & Edge
    if ((this._getMsieVersion() || this._isFirefox()) && this._fallbacktoCSV) {
      return this.toCSV(tableId);
    } else if (this._getMsieVersion() || this._isFirefox()) {
      alert("Not supported browser");
    }

    //Other Browser can download xls
    var htmltable = document.getElementById(tableId);
    var html = htmltable.outerHTML;

    this._downloadAnchor("data:application/vnd.ms-excel" + encodeURIComponent(html), 'xls'); 
  },
  toCSV: function(tableId, filename) {
    this._filename = (typeof filename === 'undefined') ? tableId : filename;
    // Generate our CSV string from out HTML Table
    var csv = this._tableToCSV(document.getElementById(tableId));
    // Create a CSV Blob
    var blob = new Blob([csv], { type: "text/csv" });

    // Determine which approach to take for the download
    if (navigator.msSaveOrOpenBlob) {
      // Works for Internet Explorer and Microsoft Edge
      navigator.msSaveOrOpenBlob(blob, this._filename + ".csv");
    } else {      
      this._downloadAnchor(URL.createObjectURL(blob), 'csv');      
    }
  },
  _getMsieVersion: function() {
    var ua = window.navigator.userAgent;

    var msie = ua.indexOf("MSIE ");
    if (msie > 0) {
      // IE 10 or older => return version number
      return parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)), 10);
    }

    var trident = ua.indexOf("Trident/");
    if (trident > 0) {
      // IE 11 => return version number
      var rv = ua.indexOf("rv:");
      return parseInt(ua.substring(rv + 3, ua.indexOf(".", rv)), 10);
    }

    var edge = ua.indexOf("Edge/");
    if (edge > 0) {
      // Edge (IE 12+) => return version number
      return parseInt(ua.substring(edge + 5, ua.indexOf(".", edge)), 10);
    }

    // other browser
    return false;
  },
  _isFirefox: function(){
    if (navigator.userAgent.indexOf("Firefox") > 0) {
      return 1;
    }
    
    return 0;
  },
  _downloadAnchor: function(content, ext) {
      var anchor = document.createElement("a");
      anchor.style = "display:none !important";
      anchor.id = "downloadanchor";
      document.body.appendChild(anchor);

      // If the [download] attribute is supported, try to use it
      
      if ("download" in anchor) {
        anchor.download = this._filename + "." + ext;
      }
      anchor.href = content;
      anchor.click();
      anchor.remove();
  },
  _tableToCSV: function(table) {
    // We'll be co-opting `slice` to create arrays
    var slice = Array.prototype.slice;

    return slice
      .call(table.rows)
      .map(function(row) {
        return slice
          .call(row.cells)
          .map(function(cell) {
            return '"t"'.replace("t", cell.textContent);
          })
          .join(",");
      })
      .join("\r\n");
  }
};

</script>
</div>
<script type="text/javascript">
    $(document).ready(function() {
 $('.js-example-basic-single').select2();
        $("input[id^='upload_file']").each(function() {
            var id = parseInt(this.id.replace("upload_file", ""));
            $("#upload_file" + id).change(function() {
                if ($("#upload_file" + id).val() !== "") {
                    $("#moreImageUploadLink").show();
                }
            });
        });
    });
</script>
<script type="text/javascript">
	function abc() {
      $('.js-example-basic-single').select2();
    }

</script>
