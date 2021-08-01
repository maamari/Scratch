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
            <!-- <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button> -->
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
                            <img src="<?php echo base_url('assets/images/EM logo-page-001.jpg');?>" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col" style="float: right; margin-left: 50%">
                       <img src="<?php echo base_url('assets/images/health_care.jpg');?>" style="height:165px">
                    </div>
                    
                </div>
              <p style= "margin-bottom:5px; font-family: 'Roboto', sans-serif; font-size:20pt; font-weight: bold; color: black">COVID-19 RT-PCR SARS-CoV-2 nucleic acid test Results:</p>
              <div style="border-top: 2px solid black">
            </header>
            <main>
                <div class="row contacts" style="margin-bottom: 40px">
                    <center>
                    <table width="97%;" style="margin-left: 2%; font-family: Courier New; color: black">
                        <tbody>
              <tr>
                        <td style="background: none">Barcode Number</td>
                         <td style="background: none">Name</td>
                         <td style="background: none">DOB</td>
                          <td style="background: none">Result</td>
                           <td style="background: none">Date Swab<br>Taken</td>
                         
                           <td style="background: none">Date Received</td>
                             <td style="background: none">Passport Number</td>
                           <td style="background: none">Authorised By</td>
                             <td style="background: none">Test Result Date</td>
                          
                    </tr>
                     <tr >
                        <td width="10%" style="background: none"><?php echo  $patients['bar_code_no']; ?></td>
                        <td width="12%" style="background: none"><?php echo  $patients['patient_name']."<br>".$patients['patient_last_name']; ?></td>
                         <td width="12%" style="background: none"><?php echo  $patients['dob_patients']; ?></td>
                        <td width="10%" style="background: none;"><?php echo  $patients['result']; ?></td>
     <td width="12%" style="background: none"><?php echo  $patients['date_swab_taken_patient']."<br>".$patients['time_swab_taken_patient']; ?></td>
                        <td width="12%" style="background: none"><?php echo  $patients['date_swab_taken']."<br>".$patients['time_received']; ?></td> 
                        <td width="10%" style="background: none"><?php echo  $patients['passport']; ?></td> 
                        <td width="12%" style="background: none"><?php echo  $patients['created_by']; ?></td>
                        <td width="14%" style="background: none"><?php echo  $patients['date_result_received']."<br>".$patients['time_result_received']; ?></td>
                          
                    </tr>
                    </tbody>
                    </table>
                    </center>
             <!--        <div class="col invoice-to">
                        <div class="text-gray-light">Name:</div>
                        <h2 class="to"><?php echo $patients['patient_name']; ?></h2>
                        <div class="address">Passport Number: <?php echo $patients['passport']; ?></div>
                        <div class="address">Address: <?php echo $patients['patient_address']; ?></div>
                        <div class="email"><a href="mailto:john@example.com"><?php echo $patients['patient_email']; ?></a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">Barcode No: <?php echo  $patients['bar_code_no']; ?></h1>
                        <div class="date">Date Swab Taken: <?php echo  $patients['date_swab_taken']; ?></div>
                        <div class="date">Authorised By: <?php echo  $patients['created_by']; ?></div>
                    <div class="date">Test Result Date: <?php echo  $patients['date_created']; ?></div>
                    </div> -->

                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                      <!--   <tr>
                            <th colspan="5" style="text-align: center;">COVID-19 RT-PCR SARS-CoV-2 nucleic acid test Results</th>
                           
                        </tr> -->
                    </thead>
                    <tbody>
                      <!--   <tr>
                            <td class="no" style="width:40% "><h3 style="color: white">
                                 Result
                                </a>
                                </h3>
                               </td>
                            <td class="unit" style="text-align: center;"><?php echo  $patients['result']; ?></td>
                            
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
                            <td colspan="2" style="text-align: left; font-family: 'Roboto', sans-serif;"">*Patient identifiable information supplied by the above named person</td>
                            </tr>
                        <tr>
                            <!-- <td colspan="3"></td> -->
                            <td colspan="2" style="text-align: left; font-family: 'Roboto', sans-serif; color:black"><br><b>Lead Clinical Scientist</b><br> Dr Mohammed Ayub</td>
                            </tr>
                        <tr>
                            <td colspan="3"></td>
                          
                        </tr>
                       
                    </tfoot>
                </table><br><br>
                <hr style="border-top: 2px solid black">
                <!-- <div class="thanks">Thank you!</div> -->
                <div class="notices">
                    <p style="text-align: justify; font-family: Arial; color:black;">The above test is carried out via CE-IVD certified testing its using validated methods and in laboratories with quality management systems operating to ISO15189.<br>
Expert Medicals is carrying out these methods in line with ISO15189:2012 (Medical Laboratories - requirements for quality and competence).<br>UKAS reference: 22885
</p><br>
                    <div class="notice"><p style="text-align: justify; font-family: Arial; color:black;">
                       
                       The possible outcomes of the COVID test are as follows:<br>
                       <b>Positive:</b> The RT-PCR test has detected SARS-CoV-2. Consult your GP/healthcare provider*<br>
                      <b>Negative:</b> The RT-PCR test has not detected SARS-CoV-2**<br>
                      <b>Inconclusive Re-test:</b> The RT-PCR test has not returned a result that is clearly positive or negative, for example this may be because the<br>
                     outcome is on the cusp of detectability, or because the test assay targets multiple markers and only one marker has been detected.<br>
                     Re-swab at the next scheduled time unless clinically indicated to do sooner.<br>
<b>Repeat testing on-going:</b> The original test result did not meet quality control thresholds. The test will be repeated as a priority and reported<br>
within 24 hours.<br>
<b>Rejected:</b> Sample damaged and test could not be performed. Re-swab at the next scheduled time.<br><br>
<b>Specimen Type:</b> Upper respiratory and nasopharyngeal swab<br>
<b>Test Type:</b> COVID-19 PCR SARS-CoV-2 nucleic acid test.<br>
<br>
<p style="font-family: Arial; color:black;"><b>All results are subject to the signed Terms and Conditions.</b> *Physicians need to avoid patient treatment based solely on any single test result and should interpret all results in the context of other clinical and
laboratory parameters. **Not detected results do not preclude SARS-CoV-2 infection and should not be used as the sole basis for patient management decisions. Negative results must be interpreted in the context
of clinical observations, patient history, and epidemiological information.</p></p><br><br>
</div>
                </div>
            </main>
            <br>
            <footer>
                <div class="col-md-3" >
                        <a target="_blank">
                            <img src="<?php echo base_url('assets/images/EM logo-page-001.jpg');?>" data-holder-rendered="true"  />
                            </a>
                    </div>
                    <div style="margin-left: 88px">

     Expert Medicals, 12 New John Street, Bradford, BD1 2QY, UK<br>
<b>Tel: +44(0)1274 397 650</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: mail@expert-medicals.co.uk
</div>
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
