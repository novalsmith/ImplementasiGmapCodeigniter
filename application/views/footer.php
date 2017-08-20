

<nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
   <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo base_url(); ?>">Gis App Rawan Banjir</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
     
      <li class="active dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Demo GisApp <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url('address'); ?>">Data Atrbut Lokasi</a></li>
          <li><a href="<?php echo base_url('geocoding'); ?>">Data Atrbut Kordinat</a></li>
                    <li class="divider"></li>

          <li><a href="<?php echo base_url('analisa'); ?>">Pembobotan</a></li>
                             <li class="divider"></li>
          <li><a href="<?php echo base_url('Mapping/rawan'); ?>">Lokasi Rawan Banjir</a></li>
          <li><a href="<?php echo base_url('Mapping/waspada'); ?>">Lokasi Waspada Banjir</a></li>
          <li><a href="<?php echo base_url('Mapping/aman'); ?>">Lokasi Aman Banjir</a></li>

        </ul>
      </li>


     <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Examples <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Data Atrbut Lokasi</a></li>
          <li><a href="#">Data Atrbut Kordinat</a></li>
                    <li class="divider"></li>

          <li><a href="#">Pembobotan</a></li>
         
        </ul>
      </li>

    </ul>
 
   
  </div><!-- /.navbar-collapse -->
 
</nav> 




      <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
    
 

     <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
     <script src="<?php echo base_url('assets/bootstrap//js/bootstrap.min.js') ?>"></script>

   </body>
</html>
