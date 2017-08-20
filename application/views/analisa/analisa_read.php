 <br>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Analisa Read</h2>
        <table class="table">
	    <tr><td>Id Nama Tempat</td><td><?php echo $id_nama_tempat; ?></td></tr>
	    <tr><td>Rb</td><td><?php echo $rb; ?></td></tr>
	    <tr><td>Lk</td><td><?php echo $lk; ?></td></tr>
	    <tr><td>Ga</td><td><?php echo $ga; ?></td></tr>
	    <tr><td>Max</td><td><?php echo $max; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('analisa') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
   