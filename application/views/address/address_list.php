 
 <br>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px"><?php echo $judul ?></h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('address/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('address/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('address/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Name</th>
		    <th>Posisi</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($address_data as $address)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $address->name ?></td>
		    <td><?php echo $address->posisi ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('address/read/'.$address->id_add),'Read'); 
			echo ' | '; 
			echo anchor(site_url('address/update/'.$address->id_add),'Update'); 
			echo ' | '; 
			echo anchor(site_url('address/delete/'.$address->id_add),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
  