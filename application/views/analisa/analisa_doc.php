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
        <h2>Analisa List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Nama Tempat</th>
		<th>Rb</th>
		<th>Lk</th>
		<th>Ga</th>
		<th>Max</th>
		
            </tr><?php
            foreach ($analisa_data as $analisa)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $analisa->id_nama_tempat ?></td>
		      <td><?php echo $analisa->rb ?></td>
		      <td><?php echo $analisa->lk ?></td>
		      <td><?php echo $analisa->ga ?></td>
		      <td><?php echo $analisa->max ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>