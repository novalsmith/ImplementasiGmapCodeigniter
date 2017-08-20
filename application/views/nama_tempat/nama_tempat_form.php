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
        <h2 style="margin-top:0px">Nama_tempat <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lat <?php echo form_error('lat') ?></label>
            <input type="text" class="form-control" name="lat" id="lat" placeholder="Lat" value="<?php echo $lat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Long <?php echo form_error('long') ?></label>
            <input type="text" class="form-control" name="long" id="long" placeholder="Long" value="<?php echo $long; ?>" />
        </div>
	    <div class="form-group">
            <label for="blob">Gambar <?php echo form_error('gambar') ?></label>
            <input type="text" class="form-control" name="gambar" id="gambar" placeholder="Gambar" value="<?php echo $gambar; ?>" />
        </div>
	    <div class="form-group">
            <label for="ket_nama_tempat">Ket Nama Tempat <?php echo form_error('ket_nama_tempat') ?></label>
            <textarea class="form-control" rows="3" name="ket_nama_tempat" id="ket_nama_tempat" placeholder="Ket Nama Tempat"><?php echo $ket_nama_tempat; ?></textarea>
        </div>
	    <input type="hidden" name="id_nama_tempat" value="<?php echo $id_nama_tempat; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('nama_tempat') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>