<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              Voter
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $voter['voter']; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              Vote
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $voting['voting']; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>


  </div>

  <div class="row">
    <div class="col-xl-6 ">
      <!-- Donut Chart -->
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3">
          <h3 class="m-0 font-weight-bold text-primary">Quick Count</h3>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-pie pt-4">
            <canvas id="myPieChart"></canvas>
          </div>
          <hr>
        </div>
      </div>
    </div>
  </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content