 <br>

 <div class="col-md-6">
        <h2 style="margin-top:0px">Analisa <?php echo $button ?></h2>
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
            <label for="varchar">Rawan Banjir (Rb) <?php echo form_error('rb') ?></label>
            <input type="text" class="form-control" name="rb" id="rb" placeholder="Rb" value="<?php echo $rb; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lingkungan Kotor (Lk) <?php echo form_error('lk') ?></label>
            <input type="text" class="form-control" name="lk" id="lk" placeholder="Lk" value="<?php echo $lk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Genangan Air (Ga) <?php echo form_error('ga') ?></label>
            <input type="text" class="form-control" name="ga" id="ga" placeholder="Ga" value="<?php echo $ga; ?>" />
        </div>
	   
	    <input type="hidden" name="id_analisa" value="<?php echo $id_analisa; ?>" /> 
	    <button type="submit" class="btn btn-primary btn-lg"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('analisa') ?>" class="btn btn-default btn-lg">Cancel</a>
	</form>
  </div>

  <div class="col-md-4 alert alert-info">
    <p>Silahkan Berikan bobot nilai dengan Maksimal adalah 3</p>
    <p>1. Aman</p>
    
    <p>2. Waspada</p>

<p>3. Darurat</p>
  </div>