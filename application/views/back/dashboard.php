<?php $this->load->view('back/meta') ?>

<div class="wrapper">
  <?php $this->load->view('back/head') ?>
  <?php $this->load->view('back/sidebar') ?>
  <!-- Content Wrapper. Contains page content -->
  <div id="siteBreadcrumb" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jumlahKelas ?></h3>

              <p>Kelas</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-folder"></i>
            </div>
            <a href="<?php echo base_url('admin/kelas') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $jumlahDataPemilih ?></h3>

              <p>Jumlah Data Pemilih</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="<?php echo base_url('admin/data_pemilih') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $jumlahKandidat ?></h3>

              <p>Kandidat</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url('admin/kandidat') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $jumlahSuaraMasuk ?></h3>

              <p>Jumlah Suara Masuk</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

      </div>
      <!-- /.row -->

      <!-- Main Row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Suara Masuk</h3>
            </div>
            <div class="box-body ">
              <div class="chart">
                <canvas id="myChart" style="height:300px"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <?php $this->load->view('back/footer') ?>
</div>

<?php $this->load->view('back/js') ?>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/template/frontend/') ?>plugins/chart.js/Chart.min.js"></script>

<!-- page script -->

<?php
$suara = array();
$label = array();
$noUrut = array();
foreach ($kandidatData as $data) {
  $suara[] = $data['jumlahSuara'];
  $label[] = $data['nama'];
  $noUrut[] = $data['noUrut'];
}
?>

<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($label); ?>,
      datasets: [{
        label: 'Suara',
        data: <?php echo json_encode($suara); ?>,
        backgroundColor: [
          'rgba(221, 72, 57, 0.5)',
          'rgba(0, 192, 239, 0.5)',
          'rgba(243, 156, 18, 0.5)',
          'rgba(0, 166, 90, 0.5)',
        ],
        borderColor: [
          'rgba(221, 72, 57, 0.5)',
          'rgba(0, 192, 239, 0.5)',
          'rgba(243, 156, 18, 0.5)',
          'rgba(0, 166, 90, 0.5)',
        ],
        borderWidth: 1
      }]
    },
    options: {
      legend: {
        display: false,
        position: 'top',
        labels: {
          fontColor: '# 000 '
        }
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>
</body>

</html>