<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/template/backend/') ?>dist/img/avatar5.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('userName') ?></p>
        <a href="#"><?php echo $this->session->userdata('identity'); ?></a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li>
        <a href="<?php echo base_url('admin') ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <!-- ./Dashboard -->
      <li>
        <a href="<?php echo base_url('admin/filemanager') ?>">
          <i class="fa fa-folder"></i> <span>Filemanager</span>
        </a>
      </li>
      <!-- ./Filemanager -->
      <li>
        <a href="<?php echo base_url('admin/kelas') ?>">
          <i class="glyphicon glyphicon-blackboard"></i> <span>Kelas</span>
        </a>
      </li>
      <!-- ./Kelas -->
      <li>
        <a href="<?php echo base_url('admin/pemilih') ?>">
          <i class="fa fa-user"></i> <span>Data Pemilih</span>
        </a>
      </li>
      <!-- ./Data Pemilih -->
      <li>
        <a href="<?php echo base_url('admin/kandidat') ?>">
          <i class="fa fa-user-secret"></i> <span>Kandidat</span>
        </a>
      </li>
      <!-- ./Kandidat -->
      <!-- <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-stats"></i>
          <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="<?php echo base_url('admin/laporan') ?>" target="_blank">
              <i class="fa fa-circle-o"></i> Berita Acara
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('admin/laporan/model_c1') ?>" target="_blank">
              <i class="fa fa-circle-o"></i> Model C1
            </a>
          </li>
        </ul>
      </li> -->
      <!-- ./Laporan -->
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>User Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="<?php echo base_url('admin/auth') ?>">
              <i class="fa fa-circle-o"></i> User List
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('admin/auth/group') ?>">
              <i class="fa fa-circle-o"></i> User Group
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="<?php echo base_url('admin/settings') ?>">
          <i class="fa fa-gear"></i> <span>Settings</span>
        </a>
      </li>
      <!-- ./Settings -->
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>