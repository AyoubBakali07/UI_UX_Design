<?php
// admin/dashboard/index.php
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once '../../layouts/head.php'; ?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include_once '../../layouts/nav.php '; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once '../../layouts/aside.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>Dashboard</h1>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- ====================== -->
        <!-- 1. Charts Row Section -->
        <!-- ====================== -->
        <div class="row">
          <!-- Line Chart (Progress Over Time) -->
          <div class="col-md-6">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Progress Over Time</h3>
              </div>
              <div class="card-body">
                <canvas id="progressChart"></canvas>
              </div>
            </div>
          </div>

          <!-- Doughnut Chart (Completion Rates) -->
          <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Completion Rates</h3>
              </div>
              <div class="card-body">
                <canvas id="completionChart"></canvas>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->

        <!-- ================================ -->
        <!-- 2. Horizontal Scrollable Cards -->
        <!-- ================================ -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Scrollable Horizontal Cards</h3>
          </div>
          <div class="card-body">
            <!-- Scrollable container -->
            <div class="d-flex overflow-auto" style="gap: 1rem;">
              <!-- Card 1 -->
              <div class="card" style="width: 15rem; flex-shrink: 0;">
                <img src="../../assets/images/lv.png" class="card-img-top" alt="Card 1">
                <div class="card-body">
                  <h5 class="card-title">Front End HTML/CSS</h5>
                  <p class="card-text">Some quick example text.</p>
                  <a href="../Sanction Rules/create.php" class="btn btn-primary">Enroll Now</a>
                </div>
              </div>

              <!-- Card 2 -->
              <div class="card" style="width: 15rem; flex-shrink: 0;">
                <img src="../../assets/images/lv.png" class="card-img-top" alt="Card 2">
                <div class="card-body">
                  <h5 class="card-title">PHP</h5>
                  <p class="card-text">Some quick example text.</p>
                  <a href="../Sanction Rules/create.php" class="btn btn-primary">Enroll Now</a>
                </div>
              </div>

              <!-- Card 3 -->
              <div class="card" style="width: 15rem; flex-shrink: 0;">
                <img src="../../assets/images/lv.png" class="card-img-top" alt="Card 3">
                <div class="card-body">
                  <h5 class="card-title">Laravel</h5>
                  <p class="card-text">Some quick example text.</p>
                  <a href="../Sanction Rules/create.php" class="btn btn-primary">Enroll Now</a>
                </div>
              </div>

              <!-- Card 4 -->
              <div class="card" style="width: 15rem; flex-shrink: 0;">
                <img src="../../assets/images/lv.png" class="card-img-top" alt="Card 4">
                <div class="card-body">
                  <h5 class="card-title">JavaScript Basics</h5>
                  <p class="card-text">Some quick example text.</p>
                  <a href="../Sanction Rules/create.php" class="btn btn-primary">Enroll Now</a>
                </div>
              </div>

              <!-- Card 5 -->
              <div class="card" style="width: 15rem; flex-shrink: 0;">
                <img src="../../assets/images/lv.png" class="card-img-top" alt="Card 5">
                <div class="card-body">
                  <h5 class="card-title">Laravel Advanced</h5>
                  <p class="card-text">Some quick example text.</p>
                  <a href="../Sanction Rules/create.php" class="btn btn-primary">Enroll Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card -->

        <!-- ====================== -->
        <!-- 3. Sample Progress Table -->
        <!-- ====================== -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Mes Informations</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered border-primary">
              <thead>
                <tr>
                  <th scope="col">Course Name</th>
                  <th scope="col">Start</th>
                  <th scope="col">Progress</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">HTML/CSS</th>
                  <td>May 12</td>
                  <td><span class="badge badge-primary">100%</span></td>
                </tr>
                <tr>
                  <th scope="row">PHP Eloquent</th>
                  <td>Junary 03</td>
                  <td>
                    <div class="progress">
                      <div
                        class="progress-bar"
                        role="progressbar"
                        style="width: 25%;"
                        aria-valuenow="25"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      >
                        25%
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <?php include_once '../partials/footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- Scripts -->
<?php include_once '../../layouts/script-link.php'; ?>

<!-- Chart.js (CDN) -->
<!-- If you prefer local, download and adjust the path accordingly -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  // =============== Progress Over Time (Line Chart) ===============
  var ctxProgress = document.getElementById('progressChart').getContext('2d');
  var progressChart = new Chart(ctxProgress, {
    type: 'line',
    data: {
      labels: ['Week 1','Week 2','Week 3','Week 4','Week 5'],
      datasets: [{
        label: 'Progress (%)',
        data: [20, 40, 50, 70, 90], // Example data
        backgroundColor: 'rgba(60,141,188,0.2)',
        borderColor: 'rgba(60,141,188,1)',
        borderWidth: 2,
        fill: true
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          max: 100
        }
      }
    }
  });

  // =============== Completion Rates (Doughnut Chart) ===============
  var ctxCompletion = document.getElementById('completionChart').getContext('2d');
  var completionChart = new Chart(ctxCompletion, {
    type: 'doughnut',
    data: {
      labels: ['Completed', 'In Progress', 'Not Started'],
      datasets: [{
        data: [60, 25, 15], // Example data
        backgroundColor: ['#28a745', '#ffc107', '#dc3545'],
      }]
    },
    options: {
      responsive: true
    }
  });
</script>
</body>
</html>