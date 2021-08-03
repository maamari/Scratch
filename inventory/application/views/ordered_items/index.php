<!-- <div class="pull-right">
	<a href="<?php echo site_url('ordered_items/add'); ?>" class="btn btn-success">Add</a> <br>
</div> -->

<h1>All Ordered Items</h1>
<div class="table-responsive">
<table id="myTable" class="table table-striped table-bordered table">
	<thead>
	<tr>
		<th>Order ID</th>
		<th>Part Number</th>
		<th>Description</th>
		<th>Quantity</th>
		<th>Price Per Unit</th>
		<th>Location</th>
		<th style="min-width: 200px">Actions</th>
	</tr>
	</thead>
    <tbody>
	<?php $count=0; foreach($ordered_items as $u){ $count++; ?>
		<tr>
			<td><?php echo $u['rec_id']; ?></td> 
			<td><?php echo $u['part_no']; ?></td>
			<td><?php echo $u['description']; ?></td>
			<td><?php echo $u['quantity']; ?></td> 
			<td><?php echo $u['ppu']; ?></td>
		    <td><?php echo $u['location']; ?></td> 
		  		<td>
              <a href="<?php echo site_url('ordered_items/edit/'.$u['id']); ?>" class="btn btn-info btn-xs">Edit</a>
				
				<a href="<?php echo site_url('ordered_items/remove/'.$u['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
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
