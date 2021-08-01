<div class="row">
    <div class="col-md-12">
        <h2>Admin Dashboard</h2>
        <h5>Welcome <b><?=$this->session->userdata('first_name').' '.$this->session->userdata('last_name');?></b> , Love to see you back. </h5>
    </div>
</div>
<hr />

    <div class="statistics">
      <div class="row">
        <div class="col-xl-6 pr-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="fa fa-users"> </i>
                <h3 class="text-primary number"><?php echo $users_count;?></h3>
                <p class="stat-text">Total Users</p>
              </div>
            </div>
        
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-eye"> </i>
                <h3 class="text-secondary number"><?php echo $services_count;?></h3>
                <p class="stat-text">Total Services</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 pl-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-cloud-download"> </i>
                <h3 class="text-success number"><?php echo $items;?></h3>
                <p class="stat-text">Total Items</p>
              </div>
            </div>
           <!--  <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="fa fa-money"> </i>
                <h3 class="text-danger number"><?php echo $results_count;?></h3>
                <p class="stat-text">Total Results</p>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
     <div class="chart">
      <div class="row">
        <div class="col-lg-6 pr-lg-2 chart-grid">
          <div class="card text-center card_border">
            <div class="card-header chart-grid__header">
              Bar Chart
            </div>
            <div class="card-body">
              <!-- bar chart -->
              <div id="container">
                <canvas id="barchart"></canvas>
              </div>
              <!-- //bar chart -->
            </div>
            <div class="card-footer text-muted chart-grid__footer">
              Updated 2 hours ago
            </div>
          </div>
        </div>
        <div class="col-lg-6 pl-lg-2 chart-grid">
          <div class="card text-center card_border">
            <div class="card-header chart-grid__header">
              Line Chart
            </div>
            <div class="card-body">
              <!-- line chart -->
              <div id="container">
                <canvas id="linechart"></canvas>
              </div>
              <!-- //line chart -->
            </div>
            <div class="card-footer text-muted chart-grid__footer">
              Updated just now
            </div>
          </div>
        </div>
      </div>
    </div>
