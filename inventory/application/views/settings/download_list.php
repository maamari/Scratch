<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<!-- <div class="container" style="margin: 20px 0;padding: 0;"> -->
  <!-- <img src="<?=base_url('assets/images/cranbrook-college-logo2.png')?>" style="float: left;width: 200px !important"> -->
  <h4 style="width: 80%;text-align: center;">Lawyer</h4>
  <p style="text-align: center;">Address:</p>
  <p style="text-align: center;">Phone:</p> 
  <hr>
  <h4 style="text-align: center;"><?=$title?></h4>        
  <table class="table table-bordered" style="width: 100% !important;border-collapse: collapse;border-spacing: 2px;border: 1px solid #dee2e6;overflow: auto;">
    <thead>
    <tr>
        <th style="display: table-cell;font-weight: bold;padding: 0.55rem;border: 1px solid #dee2e6;text-align: inherit;">Client Name</th>
        <th style="display: table-cell;font-weight: bold;padding: 0.55rem;border: 1px solid #dee2e6;text-align: inherit;">SR.No</th>
        <th style="display: table-cell;font-weight: bold;padding: 0.55rem;border: 1px solid #dee2e6;text-align: inherit;">Business Name</th>
        <!-- <th style="display: table-cell;font-weight: bold;padding: 0.55rem;border: 1px solid #dee2e6;text-align: inherit;">DOB</th> -->
        <!-- <th style="display: table-cell;font-weight: bold;padding: 0.55rem;border: 1px solid #dee2e6;text-align: inherit;">Category</th> -->
        <!-- <th style="display: table-cell;font-weight: bold;padding: 0.55rem;border: 1px solid #dee2e6;text-align: inherit;">File Loc.</th> -->
        <th style="display: table-cell;font-weight: bold;padding: 0.55rem;border: 1px solid #dee2e6;text-align: inherit;">NTN</th>
        <th style="display: table-cell;font-weight: bold;padding: 0.55rem;border: 1px solid #dee2e6;text-align: inherit;">STRN/ Reference</th>
        <th style="display: table-cell;font-weight: bold;padding: 0.55rem;border: 1px solid #dee2e6;text-align: inherit;">Contact No</th>
        <th style="display: table-cell;font-weight: bold;padding: 0.55rem;border: 1px solid #dee2e6;text-align: inherit;">User ID/ Reg No</th>
        <th style="display: table-cell;font-weight: bold;padding: 0.55rem;border: 1px solid #dee2e6;text-align: inherit;">Password</th>
        <th style="display: table-cell;font-weight: bold;padding: 0.55rem;border: 1px solid #dee2e6;text-align: inherit;">Pin Code</th>
        <th style="display: table-cell;font-weight: bold;padding: 0.55rem;border: 1px solid #dee2e6;text-align: inherit;">Email</th>
        <!-- <th style="display: table-cell;font-weight: bold;padding: 0.55rem;border: 1px solid #dee2e6;text-align: inherit;">Email Password</th> -->
        <th style="display: table-cell;font-weight: bold;padding: 0.55rem;border: 1px solid #dee2e6;text-align: inherit;">Status</th>
        <!-- <th style="display: table-cell;font-weight: bold;padding: 0.55rem;border: 1px solid #dee2e6;text-align: inherit;">Status2</th> -->
        <!-- <th style="display: table-cell;font-weight: bold;padding: 0.55rem;border: 1px solid #dee2e6;text-align: inherit;">Address</th> -->
    </tr>
    </thead>
    <tbody>
    <?php foreach ($results as $r) {?>
    <tr>
      <td style="padding: 0.75rem;border: 1px solid #dee2e6"><?=$r['client_name'];?></td>
      <td style="padding: 0.75rem;border: 1px solid #dee2e6"><?=$r['sno'];?></td>
      <td style="padding: 0.75rem;border: 1px solid #dee2e6"><?=$r['business_name']; ?></td>
      <!-- <td style="padding: 0.75rem;border: 1px solid #dee2e6"><?=$r['dob']; ?></td> -->
      <!-- <td style="padding: 0.75rem;border: 1px solid #dee2e6"><?=$r['category'];?></td> -->
      <!-- <td style="padding: 0.75rem;border: 1px solid #dee2e6"><?=$r['file_loc'];?></td> -->
      <td style="padding: 0.75rem;border: 1px solid #dee2e6"><?=$r['ntn'];?></td>
      <td style="padding: 0.75rem;border: 1px solid #dee2e6"><?=$r['strn'];?></td>
      <td style="padding: 0.75rem;border: 1px solid #dee2e6"><?=$r['contact'];?></td>
      <td style="padding: 0.75rem;border: 1px solid #dee2e6"><?=$r['reg_no'];?></td>
      <td style="padding: 0.75rem;border: 1px solid #dee2e6"><?=$r['password'];?></td>
      <td style="padding: 0.75rem;border: 1px solid #dee2e6"><?=$r['pin_code'];?></td>
      <td style="padding: 0.75rem;border: 1px solid #dee2e6"><?=$r['email'];?></td>
      <!-- <td style="padding: 0.75rem;border: 1px solid #dee2e6"><?=$r['email_password'];?></td> -->
      <td style="padding: 0.75rem;border: 1px solid #dee2e6"><?=$r['status'];?></td>
      <!-- <td style="padding: 0.75rem;border: 1px solid #dee2e6"><?=$r['status2'];?></td> -->
      <!-- <td style="padding: 0.75rem;border: 1px solid #dee2e6"><?=$r['address'];?></td> -->
    </tr>
    <?php }?>
    </tbody>
  </table>
<!-- </div> -->

</body>
</html>
