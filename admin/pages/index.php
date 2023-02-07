<?php
  // check session
  include dirname(__FILE__).'/layouts/isadmin.php';
  $title[] = 'Test';
  $rating[] = 7;
  $data = array();
  array_push($data, $title);
  array_push($data, $rating);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include dirname(__FILE__) . '/layouts/css.php'; ?>
  <title><?= $site_name ?></title>
  <!DOCTYPE html>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <?php include dirname(__FILE__) . '/layouts/preloader.php'; ?>

    <?php include dirname(__FILE__) . '/layouts/navbar.php'; ?>
    <?php include dirname(__FILE__) . '/layouts/sidebar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="card p-3">
          <div class="card-header border-0">
            <h3 class="card-title">High Categories History Report</h3>
            <div class="card-tools">
              <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-download"></i>
              </a>
              <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-bars"></i>
              </a>
            </div>
          </div>
          <div class="card-body  p-0">
            <div class="row">
              <div class="col-md-6">
                <canvas id="myChart" width="100" height="100"></canvas>
              </div>
              <div class="col-md-6">
                <h3 class="text-muted">Categories List</h3>
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-user"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text"><?= $title[0] ?></span>
                    <span class="info-box-number"><?= $rating[0] ?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- ./wrapper -->

  <?php include dirname(__FILE__) . '/layouts/script.php' ?>
  <script>
    const labels = <?php echo json_encode($title) ?>;
    const rating = <?php echo json_encode($rating) ?>;
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'rating',
          data: rating,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
          ],
          borderWidth: 2
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>

</body>

</html>