<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

    #invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    font-size: 1.4em;
    border-top: 1px
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>


<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->

<script type="text/javascript">
     function PrintDiv(invoice)
     {
       var printContents = document.getElementById('invoice').outerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
     }
</script>
<!------ Include the above in your HEAD tag ---------->

<!--Author      : @arboshiki-->
 <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" onclick="PrintDiv()" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
         <a href="<?php echo base_url('Send_Email/index/'.$id)?>"><button class="btn btn-info"><i class="fa fa-share"></i> Send By Mail</button></a>
        </div>
        <hr>
    </div>
<div id="invoice">

   
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header style="background-color: white">
                <div class="row">
                    <div class="col">
                        <a target="_blank">
                            <img src="<?php echo base_url('assets/images/HORIZON LOGO BLACK TAGLINE.png');?>" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col" style="float: right; margin-left: 50%; ">
                     <!--   <img src="<?php echo base_url('assets/images/health_care.jpg');?>" style="height:165px"> -->
                    </div>
                    
                </div>
              <p style= "margin-bottom:5px; font-family: 'Roboto', sans-serif; font-size:20pt; font-weight: bold; color: black">Service Details</p>
              <div style="border-top: 2px solid black">
            </header>
            <main>
                <div class="row contacts" style="margin-bottom: 40px">
                    <center>
                    <table width="100%;" style="margin-left: 12%; border: none; font-family: Courier New; color: black" class="table-striped table-hover ">
                        <tbody>
                            <tr>
                                <td colspan="1" style="background-color: white;border: none;" ><strong> Service Code:</strong></td>
                                <td style="background-color: white;border: none;"><?php echo  $services['service_id']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="1" style="background-color: white;border: none;" ><strong> Date:</strong></td>
                                <td colspan="2" style="background-color: white; border: none;"><?php echo  $services['date_service']; ?></td>
                                <td colspan="3" style="background-color: white;border: none;"></td>
                                  <td  style="background-color: white;border: none;" ><strong>PICK UP TIME: </strong></td>
                                <td style="background-color: white;border: none;"><?php echo  $services['time_service']; ?></td>
                            </tr>

              <tr style="margin-top: 60px">
         <th colspan="2">DRIVER Name</th>
        <th colspan="2">DRIVER Cell</th>
     
         <th colspan="2">SERVICE TYPE</th>
       
        <th>VEHICLE</th>
   
        <th>FLIGHT / TRAIN</th>
                          
                    </tr>
                     <tr style="width: 100%">
                 
                         <td colspan="2"style="background: none"><?php echo  $services['driver_name']; ?></td>
                        <td colspan="2" style="background: none"><?php echo  $services['driver_cell']; ?></td> 
 <td  style="background: none" colspan="2"><?php echo  $services['service_type_name']; ?></td> 
                        <td  style="background: none;"><?php echo  $services['vehicle_name']; ?></td>
   
                       
                        <td  style="background: none"><?php echo  $services['ft_code']; ?></td>
                      
                          
                    </tr>
  <tr style="margin-top: 60px">
         <th colspan="4">Client Name</th>
        <th colspan="4">Client Cell</th>
      </tr>
                     <tr style="width: 100%">
                   <td colspan="4"style="background: none"><?php echo  $services['client_name']; ?></td>
    <td colspan="4" style="background: none"><?php echo  $services['client_cell']; ?></td> 
  </tr>
    <tr style="margin-top: 60px">
         <th colspan="4">PICK UP Location</th>
        <th colspan="4">DESTINATION</th>
      </tr>
                     <tr style="width: 100%">
                   <td colspan="4"style="background: none"><?php echo  $services['pickup_location']; ?></td>
    <td colspan="4" style="background: none"><?php echo  $services['destination']; ?></td> 
  </tr>
                  </tbody>
                    </table>
                    </center>
                 

                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
              <!--      <tr style="border: none; margin-top: 80px">
                                <td colspan="1" style="background-color: white;border: none;" ><strong> PICK UP Location:</strong></td>
                                <td colspan="2" style="background-color: white; border: none;"><?php echo  $services['pickup_location']; ?></td>
                                <td colspan="4" style="background-color: white;border: none;"></td>
                                  <td colspan="1" style="background-color: white;border: none;" ><strong>DESTINATION: </strong></td>
                                <td style="background-color: white;border: none;"><?php echo  $services['destination']; ?></td>
                            </tr> -->
                    </thead>
                    <tbody>
                      <!--   <tr>
                            <td class="no" style="width:40% "><h3 style="color: white">
                                 Result
                                </a>
                                </h3>
                               </td>
                            <td class="unit" style="text-align: center;"><?php echo  $services['result']; ?></td>
                            
                        </tr> -->
                       
                    </tbody>
                    <div style="border-top: 2px solid black"></div><br>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                          
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                          
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                          
                        </tr>
                        <tr>
                            <p style="margin-top:-10px"></p>
                            <!-- <td colspan="3"></td> -->
    <td colspan="2" style="text-align: left; font-family: 'Roboto', sans-serif;"><strong>GREETING SIGN:</strong> ______________</td>

    <td colspan="2" style="text-align: left; font-family: 'Roboto', sans-serif; border: none;"><strong>PASSENGER NOTE:</strong> <?php echo  $services['pass_note']; ?></td>

    
                            </tr>
                       <tr>
                           <td></td>
                       </tr>
                        <tr>
                           <td></td>
                       </tr>
                      <?php echo form_open('Send_Email/update_status/'.$services['id'],array("class"=>"form-horizontal")); ?>
                        <tr>
                            <td colspan="2"></td>
                            <td>
                            <select name="status"  class="form-control select2">
                                <option value="0">UPDATE STATUS</option>
                                <option value="1">On Site</option>
                                <option value="2">Picked Up</option>
                                <option value="3">Service End</option>

                            </select>
                          </td>
                          <td>
                      <button type="submit" class="btn btn-success">Update</button>
                             </td>
                        </tr>
                      <?php echo form_close(); ?>
                       
                    </tfoot>
                </table><br><br>
                <hr style="border-top: 2px solid black">
              
            </main>
           
            <footer>
                <div class="col-md-3" >
                        <a target="_blank">
                            <img src="<?php echo base_url('assets/images/HORIZON LOGO BLACK TAGLINE.png');?>" data-holder-rendered="true"  />
                            </a>
                    </div>
                    <div style="margin-left: 88px">

    <a href="https://horizoninternationalgroup.com/">WWW.horizoninternationalgroup.com</a><br>
<!-- <b>Tel: +44(0)1274 397 650</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: mail@expert-medicals.co.uk -->
</div>
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
