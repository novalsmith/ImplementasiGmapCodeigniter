<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Nama_tempat List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Lat</th>
		<th>Long</th>
		<th>Gambar</th>
		<th>Ket Nama Tempat</th>
		
            </tr><?php
            foreach ($nama_tempat_data as $nama_tempat)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $nama_tempat->nama ?></td>
		      <td><?php echo $nama_tempat->lat ?></td>
		      <td><?php echo $nama_tempat->long ?></td>
		      <td><?php echo $nama_tempat->gambar ?></td>
		      <td><?php echo $nama_tempat->ket_nama_tempat ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>