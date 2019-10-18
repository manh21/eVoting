<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Kandidat Read</h2>
        <table class="table">
	    <tr><td>Organisasi</td><td><?php echo $organisasi; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Nourut</td><td><?php echo $nourut; ?></td></tr>
	    <tr><td>Jumlahsuara</td><td><?php echo $jumlahsuara; ?></td></tr>
	    <tr><td>Visi</td><td><?php echo $visi; ?></td></tr>
	    <tr><td>Misi</td><td><?php echo $misi; ?></td></tr>
	    <tr><td>Foto</td><td><?php echo $foto; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kandidat') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>