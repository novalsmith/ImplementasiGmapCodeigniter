 <br>

 <div class="col-md-6">
        <div class="col-md-12 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>

        <h2 style="margin-top:0px"> <?php echo $judul.' '.$button ?></h2>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Posisi <?php echo form_error('posisi') ?></label>
            <input type="text" class="form-control" name="posisi" id="posisi" placeholder="Posisi Latitude, Longitude ex : -77236923, 12371930" value="<?php echo $posisi; ?>" />
        </div>

        <input type="hidden" name="id_add" value="<?php echo $id_add; ?>" /> 
        <button type="submit" class="btn btn-primary btn-lg"><?php echo $button ?></button> 
        <a href="<?php echo site_url('address') ?>" class="btn btn-default btn-lg">Cancel</a>
  </div>

 
<div class="col-md-4">
        <div class="form-group">
            <label for="blob">Gambar Lokasi  </label>


        <?php if ($this->uri->segment(3)==''): ?>
          <input type="file" name="AtributGambar" class="form-control">

        <?php else: ?>

 
          <input type="file" name="AtributGambar" class="form-control">
          <input type="hidden" name="filefoto_lama" class="form-control"
           value="<?php echo $view_imgOnUpdate->AtributGambar ?>">
        <!-- thumbnail image wrapped in a link -->
        <a href="#img1">
          <img src="<?php echo base_url().'assets/img/AtributGambar/'.$view_imgOnUpdate->AtributGambar?>"
           alt=""           id="view_imgOnUpdate"   class="thumbnail">
        </a>
       
           

        <?php endif; ?>
  </div>

</div>




 
  

 


	</form>
