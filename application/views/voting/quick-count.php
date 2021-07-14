<div class="container-fluid">
  <div class="row">
    <div class="col-lg">
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
  <div class="row">
    <div class="col-lg">
      <?php foreach ($voting as $v): ?>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $v['name']; ?></div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $v['voting']; ?> Suara</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-vote-yea fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      
    </div>
  </div>
</div>
</div>