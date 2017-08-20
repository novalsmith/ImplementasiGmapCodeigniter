 <br> 
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px"><?php echo $judul; ?></h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('geocoding/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('geocoding/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('geocoding/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nama Lokasi</th>
		    <th>Lat</th>
		    <th>Long</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($geocoding_data as $geocoding)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $geocoding->name ?></td>
		    <td><?php echo $geocoding->lat ?></td>
		    <td><?php echo $geocoding->long ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('geocoding/read/'.$geocoding->id_geo),'Read'); 
			echo ' | '; 
			echo anchor(site_url('geocoding/update/'.$geocoding->id_geo),'Update'); 
			echo ' | '; 
			echo anchor(site_url('geocoding/delete/'.$geocoding->id_geo),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
     