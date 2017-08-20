 <br>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Analisa List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('analisa/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('analisa/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('analisa/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nama Lokasi</th>
		    <th>Rb</th>
		    <th>Lk</th>
		    <th>Ga</th>
		    <th>Max</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($analisa_data as $analisa)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $analisa->name ?></td>
		    <td><?php echo $analisa->rb ?></td>
		    <td><?php echo $analisa->lk ?></td>
		    <td><?php echo $analisa->ga ?></td>
		    <td><?php echo $analisa->max ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('analisa/read/'.$analisa->id_analisa),'Read'); 
			echo ' | '; 
			echo anchor(site_url('analisa/update/'.$analisa->id_analisa),'Update'); 
			echo ' | '; 
			echo anchor(site_url('analisa/delete/'.$analisa->id_analisa),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
 