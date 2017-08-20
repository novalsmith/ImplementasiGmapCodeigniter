<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Geocoding extends CI_Controller
{

     public $Kordinat = "Data Atribut Kordinat"; 
        public $ReadKordinat = "Read Data Atribut Kordinat"; 


    function __construct()
    {
        parent::__construct();
        $this->load->model('Geocoding_model');
        $this->load->model('Address_model');

        $this->load->library('form_validation');
    }

    public function index()
    {
        $geocoding = $this->Geocoding_model->get_all();

        $data = array(
            'geocoding_data' => $geocoding,
             'judul'   => $this->Kordinat,
            'content' => 'geocoding/geocoding_list',
        );

        $this->load->view('templateMap', $data);
    }

    public function read($id) 
    {
        $row = $this->Geocoding_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_geo' => $row->id_geo,
		'id_add' => $row->id_add,
		'lat' => $row->lat,
		'long' => $row->long,
	    );
            $this->load->view('geocoding/geocoding_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('geocoding'));
        }
    }

    public function create() 
    {
                $address = $this->Address_model->get_all();

        $data = array(
               // 'geocoding_data' => $geocoding,
             'judul'   => $this->Kordinat,
            'content' => 'geocoding/geocoding_form',
            'button' => 'Create',
            'action' => site_url('geocoding/create_action'),
	    'id_geo' => set_value('id_geo'),
	    'id_add' => set_value('id_add'),
	    'lat' => set_value('lat'),
	    'long' => set_value('long'),
	);
        $this->load->view('templateMap', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_add' => $this->input->post('id_add',TRUE),
		'lat' => $this->input->post('lat',TRUE),
		'long' => $this->input->post('long',TRUE),
	    );

            $this->Geocoding_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('geocoding'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Geocoding_model->get_by_id($id);

        if ($row) {
            $data = array(
                  'judul'   => $this->Kordinat,
            'content' => 'geocoding/geocoding_form',
                'button' => 'Update',
                'action' => site_url('geocoding/update_action'),
		'id_geo' => set_value('id_geo', $row->id_geo),
		'id_add' => set_value('id_add', $row->id_add),
		'lat' => set_value('lat', $row->lat),
		'long' => set_value('long', $row->long),
	    );
            $this->load->view('templateMap', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('geocoding'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_geo', TRUE));
        } else {
            $data = array(
		'id_add' => $this->input->post('id_add',TRUE),
		'lat' => $this->input->post('lat',TRUE),
		'long' => $this->input->post('long',TRUE),
	    );

            $this->Geocoding_model->update($this->input->post('id_geo', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('geocoding'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Geocoding_model->get_by_id($id);

        if ($row) {
            $this->Geocoding_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('geocoding'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('geocoding'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_add', 'id add', 'trim|required');
	$this->form_validation->set_rules('lat', 'lat', 'trim|required');
	$this->form_validation->set_rules('long', 'long', 'trim|required');

	$this->form_validation->set_rules('id_geo', 'id_geo', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "geocoding.xls";
        $judul = "geocoding";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Add");
	xlsWriteLabel($tablehead, $kolomhead++, "Lat");
	xlsWriteLabel($tablehead, $kolomhead++, "Long");

	foreach ($this->Geocoding_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_add);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->long);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=geocoding.doc");

        $data = array(
            'geocoding_data' => $this->Geocoding_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('geocoding/geocoding_doc',$data);
    }

}

/* End of file Geocoding.php */
/* Location: ./application/controllers/Geocoding.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-19 03:30:26 */
/* http://harviacode.com */