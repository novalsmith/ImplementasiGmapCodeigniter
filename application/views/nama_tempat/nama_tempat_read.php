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
        <h2 style="margin-top:0px">Nama_tempat Read</h2>
        <table class="table">
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Lat</td><td><?php echo $lat; ?></td></tr>
	    <tr><td>Long</td><td><?php echo $long; ?></td></tr>
	    <tr><td>Gambar</td><td><?php echo $gambar; ?></td></tr>
	    <tr><td>Ket Nama Tempat</td><td><?php echo $ket_nama_tempat; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('nama_tempat') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>