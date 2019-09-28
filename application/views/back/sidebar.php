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
      <li>
        <a href="<?php echo base_url('admin/kelas') ?>">
          <i class="glyphicon glyphicon-blackboard"></i> <span>Kelas</span>
        </a>
      </li>
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
      <li class="header">Dev</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
  </section>
  <!-- /.sidebar -->
</aside>