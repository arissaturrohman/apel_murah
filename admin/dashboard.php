<div class="row">
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pending</div>
          <?php 
          
          $sql = mysqli_fetch_array($conn->query("SELECT COUNT(*) FROM tb_pengajuan WHERE status = 'pending'"))[0];

          echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>".$sql."</div>";
          ?>
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
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Diterima</div>
          <?php 
          $sql = mysqli_fetch_array($conn->query("SELECT COUNT(*) FROM tb_pengajuan WHERE status = 'diterima'"))[0];
          echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>".$sql."</div>";
          ?>
        </div>
        <div class="col-auto">
          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Setujui</div>
          <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            
            <?php 
            $sql = mysqli_fetch_array($conn->query("SELECT COUNT(*) FROM tb_pengajuan WHERE status = 'setuju'"))[0];
            echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>".$sql."</div>";
            ?>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Selesai</div>
          <?php 
            $sql = mysqli_fetch_array($conn->query("SELECT COUNT(*) FROM tb_pengajuan WHERE status = 'selesai'"))[0];
            echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>".$sql."</div>";
            ?>
            </div>
        <div class="col-auto">
          <i class="fas fa-comments fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
