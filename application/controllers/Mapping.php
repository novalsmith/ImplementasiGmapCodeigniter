<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mapping extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('googlemaps');
		$this->load->model('Analisa_model');
	}

	public function index()
	{

$config['trafficOverlay'] = TRUE;
 $config['zoom'] = 'auto';
$this->googlemaps->initialize($config);


$this->db->join('address a', 'a.id_add = g.id_add');
//$this->db->where('a.name', 'Klampis');
 $get = $this->db->get('geocoding g');
 $dataGet = array();

foreach ($get->result() as $key) {
  	$dataGet[]=$key->lat.','.$key->long;
 }

 	$polygon = array();
 	$polygon['points']=$dataGet;
	$polygon['strokeColor'] = '#cb4700';
	$polygon['fillColor'] = '#ff7328';
$this->googlemaps->add_polygon($polygon);

 foreach ($get->result() as $key) {
$get = explode(",", $key->posisi);
$marker = array();
$marker['position'] = $get[0].','.$get[1];
$marker['animation'] = 'DROP';
$marker['infowindow_content'] = '<h2><a  href="'.base_url().'Mapping/detail/'.$key->id_add.'"  data-toggle="modal" data-target="#myModal">'.$key->name.'</a></h2><br><img src="'.base_url('assets/img/AtributGambar/'.$key->AtributGambar).'">';



$marker['icon'] =base_url().'assets/img/pin-19.png';
$this->googlemaps->add_marker($marker);
 
}
 $data['map'] = $this->googlemaps->create_map();
$this->load->view('templateMapHome', $data);
	}



 public function rawan()
	{
 
	
$config['trafficOverlay'] = TRUE;
 $config['zoom'] = 'auto';
$this->googlemaps->initialize($config);

 
 $get = $this->Analisa_model->rawan();
 $dataGet = array();

foreach ($get->result() as $key) {
  	$dataGet[]=$key->lat.','.$key->long;
 }

 	$polygon = array();
 	$polygon['points']=$dataGet;
	$polygon['strokeColor'] = '#cb0000';
		$polygon['fillColor'] = '#ff0000';
$this->googlemaps->add_polygon($polygon);

 foreach ($get->result() as $key) {
$get = explode(",", $key->posisi);
$marker = array();
$marker['position'] = $get[0].','.$get[1];
$marker['animation'] = 'DROP';
$marker['infowindow_content'] = '<h2><a  href="'.base_url().'Mapping/detail/'.$key->id_add.'"  data-toggle="modal" data-target="#myModal">'.$key->name.'</a></h2><br><img src="'.base_url('assets/img/AtributGambar/'.$key->AtributGambar).'">';



$marker['icon'] =base_url().'assets/img/pin-19.png';
$this->googlemaps->add_marker($marker);
 
}
 $data['map'] = $this->googlemaps->create_map();
$this->load->view('templateMapHome', $data);
	}
	public function waspada()
	{
 
	
$config['trafficOverlay'] = TRUE;
 $config['zoom'] = 'auto';
$this->googlemaps->initialize($config);


 
 $get = $get = $this->Analisa_model->avgs();

 $dataGet = array();

foreach ($get->result() as $key) {
  	$dataGet[]=$key->lat.','.$key->long;
 }

 	$polygon = array();
 	$polygon['points']=$dataGet;
		$polygon['strokeColor'] = '#cb4700';
		$polygon['fillColor'] = '#ff7328';
$this->googlemaps->add_polygon($polygon);

 foreach ($get->result() as $key) {
$get = explode(",", $key->posisi);
$marker = array();
$marker['position'] = $get[0].','.$get[1];
$marker['animation'] = 'DROP';
$marker['infowindow_content'] = '<h2><a  href="'.base_url().'Mapping/detail/'.$key->id_add.'"  data-toggle="modal" data-target="#myModal">'.$key->name.'</a></h2><br><img src="'.base_url('assets/img/AtributGambar/'.$key->AtributGambar).'">';



$marker['icon'] =base_url().'assets/img/pin-19.png';
$this->googlemaps->add_marker($marker);
 
}
 $data['map'] = $this->googlemaps->create_map();
$this->load->view('templateMapHome', $data);
	}
	public function aman()
	{
 
$config['trafficOverlay'] = TRUE;
 $config['zoom'] = 'auto';
$this->googlemaps->initialize($config);


 
 $get = $get = $this->Analisa_model->aman();

 $dataGet = array();

foreach ($get->result() as $key) {
  	$dataGet[]=$key->lat.','.$key->long;
 }

 	$polygon = array();
 	$polygon['points']=$dataGet;
	$polygon['strokeColor'] = '#007e35';
		$polygon['fillColor'] = '#00cb56';
$this->googlemaps->add_polygon($polygon);

 foreach ($get->result() as $key) {
$get = explode(",", $key->posisi);
$marker = array();
$marker['position'] = $get[0].','.$get[1];
$marker['animation'] = 'DROP';
$marker['infowindow_content'] = '<h2><a  href="'.base_url().'Mapping/detail/'.$key->id_add.'"  data-toggle="modal" data-target="#myModal">'.$key->name.'</a></h2><br><img src="'.base_url('assets/img/AtributGambar/'.$key->AtributGambar).'">';



$marker['icon'] =base_url().'assets/img/pin-19.png';
$this->googlemaps->add_marker($marker);
 
}
 $data['map'] = $this->googlemaps->create_map();
$this->load->view('templateMapHome', $data);
	
	}

}

/* End of file Mapping.php */
/* Location: ./application/controllers/Mapping.php */