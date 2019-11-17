<?php $this->load->view('back/meta') ?>

<div class="wrapper">
	<?php $this->load->view('back/head') ?>
	<?php $this->load->view('back/sidebar') ?>
	<!-- Content Wrapper. Contains page content -->
	<div id="siteBreadcrumb" class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				User Data
			</h1>
			<ol class="breadcrumb">
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
													<div class="btn-group">
														<?php foreach ($user->groups as $group) : ?>
															<a href="<?php echo base_url('admin/auth/edit_group/' . $group->id) ?>" class="btn btn-flat btn-sm btn-default"><?php echo $group->name ?></a>
														<?php endforeach ?>
													</div>
												</td>
												<td class="text-center"><?php echo ($user->active) ? anchor("admin/auth/deactivate/" . $user->id, lang('index_active_link'), 'class="label label-info"') : anchor("admin/auth/activate/" . $user->id, lang('index_inactive_link'), 'class="label label-info"'); ?></td>
												<td class="text-center">
													<a href="<?php echo base_url('admin/auth/edit_user/' . $user->id) ?>" class="btn btn-sm btn-flat bg-orange"><i class="fa fa-edit"></i></a>
													<button type="button" class="btn btn-sm btn-flat btn-danger" data-whatever="<?php echo base_url('admin/auth/delete_user/' . $user->id) ?>" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-trash"></i></button>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>

								<div class="btn-group"><a href="<?php echo base_url('admin/auth/create_user') ?>" class="btn btn-sm bg-blue btn-flat">Buat User Baru</a></div>
							</div>
						</div>
					</div>
				</div><!-- /.row (main row) -->
			</div>
			<div class="modal modal-danger fade" id="modal-danger">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Apakah anda yakin</h4>
						</div>
						<div class="modal-body">
							<p>Semua perubahan tidak dapat diulang kembali</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
							<a href="" type="button" class="btn btn-outline" id="saveChanges">Save changes</a>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
		</section><!-- /.content -->
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
	// DataTables Script
	$(function() {
		$('#example1').DataTable({
			'info': false,
		})
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
<script>
	$('#modal-danger').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var link = button.data('whatever') // Extract info from data-* attributes
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		// modal.find('#saveChanges').val(link)
		var modal = document.getElementById("saveChanges")
		modal.setAttribute("href", link);
	})
</script>

</body>

</html>