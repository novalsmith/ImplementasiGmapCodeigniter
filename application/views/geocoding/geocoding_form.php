 <br>
       
<div class="col-md-6">
        <h2 style="margin-top:0px">Geocoding <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    

  <div class="form-group">
        <label for="int">Menu <?php echo form_error('id_add') ?></label>
        <select name="id_add" class="form-control" required="required" >
         <option value="">Pilih Menu Berita</option>
                 <?php
                $add = $this->db->get('address');
                     foreach ($add->result() as $key): ?>
                       <option
                     <?php if ($id_add==$key->id_add) { ?>
                     value="<?php echo $id_add?>" selected

                    <?php } ?>


                               value="<?php echo $key->id_add ?>"><?php echo $key->name?></option>
                             <?php endforeach ?>
                       </select>

          </div>






	    <div class="form-group">
            <label for="varchar">Lat <?php echo form_error('lat') ?></label>
            <input type="text" class="form-control" name="lat" id="lat" placeholder="Lat" value="<?php echo $lat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Long <?php echo form_error('long') ?></label>
            <input type="text" class="form-control" name="long" id="long" placeholder="Long" value="<?php echo $long; ?>" />
        </div>
	    <input type="hidden" name="id_geo" value="<?php echo $id_geo; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('geocoding') ?>" class="btn btn-default">Cancel</a>
	</form>
 </div>