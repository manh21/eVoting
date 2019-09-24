<?php $this->load->view('back/meta') ?>
<?php $this->load->view('back/head') ?>
<?php $this->load->view('back/sidebar') ?>

<div class="wrapper">
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				User Data
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">User</li>
			</ol>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<!-- Small boxes (Stat box) -->
				<div class="row">
					<div class="col-lg-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Data Users Table</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div id="infoMessage"><?php echo $message; ?></div>

								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th><?php echo lang('index_fname_th'); ?></th>
											<th><?php echo lang('index_lname_th'); ?></th>
											<th><?php echo lang('index_email_th'); ?></th>
											<th><?php echo lang('index_groups_th'); ?></th>
											<th><?php echo lang('index_status_th'); ?></th>
											<th><?php echo lang('index_action_th'); ?></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($users as $user) : ?>
											<tr>
												<td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
												<td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
												<td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
												<td>
													<?php foreach ($user->groups as $group) : ?>
														<?php echo anchor("admin/auth/edit_group/" . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')); ?><br />
													<?php endforeach ?>
												</td>
												<td><?php echo ($user->active) ? anchor("admin/auth/deactivate/" . $user->id, lang('index_active_link')) : anchor("admin/auth/activate/" . $user->id, lang('index_inactive_link')); ?></td>
												<td><?php echo anchor("admin/auth/edit_user/" . $user->id, 'Edit'); ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>

								<p><?php echo anchor('admin/auth/create_user', lang('index_create_user_link')) ?> | <?php echo anchor('admin/auth/create_group', lang('index_create_group_link')) ?></p>
							</div>
						</div>
					</div>
				</div>
				<!-- /.row (main row) -->
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<?php $this->load->view('back/footer') ?>
</div>
<!-- ./wrapper -->

<?php $this->load->view('back/js') ?>

<!-- DataTables -->
<script src="<?php echo base_url('assets/template/backend/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/template/backend/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
	$(function() {
		$('#example1').DataTable()
		$('#example2').DataTable({
			'paging': true,
			'lengthChange': false,
			'searching': false,
			'ordering': true,
			'info': true,
			'autoWidth': false
		})
	})
</script>

</body>

</html>