<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Analisa extends CI_Controller
{

  public $analisa = "Data Pembobotan"; 
        public $Readanalisa = "Read Data Pembobotan"; 

    function __construct()
    {
        parent::__construct();
        $this->load->model('Analisa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $analisa = $this->Analisa_model->get_all();

        $data = array(
             //    'geocoding_data' => $geocoding,
             'judul'   => $this->analisa,
            'content' => 'analisa/analisa_list',
            'analisa_data' => $analisa,
        );

        $this->load->view('templateMap', $data);
    }

    public function read($id) 
    {
        $row = $this->Analisa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_analisa' => $row->id_analisa,
		'id_nama_tempat' => $row->id_nama_tempat,
		'rb' => $row->rb,
		'lk' => $row->lk,
		'ga' => $row->ga,
		'max' => $row->max,
	    );
            $this->load->view('analisa/analisa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('analisa'));
        }
    }

    public function create() 
    {
        $data = array(
              'judul'   => $this->analisa,
            'content' => 'analisa/analisa_form',
             'button' => 'Create',
            'action' => site_url('analisa/create_action'),
	    'id_analisa' => set_value('id_analisa'),
	    'id_add' => set_value('id_add'),
	    'rb' => set_value('rb'),
	    'lk' => set_value('lk'),
	    'ga' => set_value('ga'),
 	   
	);
        $this->load->view('templateMap', $data);
    }
    
    public function create_action() 
    {
        

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
              $rb = $this->input->post('rb',TRUE);
        $lk = $this->input->post('lk',TRUE);
        $ga = $this->input->post('ga',TRUE);
            $data = array(
		'id_add' => $this->input->post('id_add',TRUE),
		'rb' => $rb,
		'lk' => $lk,
		'ga' => $ga,
        'max' => $rb+$lk+$ga,
	    );

            $this->Analisa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('analisa'));
        }
    }
    
      public function update($id) 
    {
        $row = $this->Analisa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                  'content'   => 'analisa/analisa_form',
                'action' => site_url('analisa/update_action'),
        'id_analisa' => set_value('id_analisa', $row->id_analisa),
        'id_add' => set_value('id_add', $row->id_add),
        'rb' => set_value('rb', $row->rb),
        'lk' => set_value('lk', $row->lk),
        'ga' => set_value('ga', $row->ga),
        'max' => $row->rb+$row->lk+$row->ga,
        );
            $this->load->view('templateMap', $data);
        } else {
            $this->session->set_flashdata('message', '<p class="alert alert-danger">Record Not Found</p>');
            redirect(site_url('analisa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_analisa', TRUE));
        } else {
           $rb = $this->input->post('rb',TRUE);
        $lk = $this->input->post('lk',TRUE);
        $ga = $this->input->post('ga',TRUE);
            $data = array(
        'id_add' => $this->input->post('id_add',TRUE),
        'rb' => $rb,
        'lk' => $lk,
        'ga' => $ga,
        'max' => $rb+$lk+$ga,
        );

            $this->Analisa_model->update($this->input->post('id_analisa', TRUE), $data);
            $this->session->set_flashdata('message', '<p class="alert alert-success">Update Record Success</p>');
            redirect(site_url('analisa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Analisa_model->get_by_id($id);

        if ($row) {
            $this->Analisa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('analisa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('analisa'));
        }
    }

    public function _rules() 
    {
	//$this->form_validation->set_rules('id_analisa', 'Nama Lokasi', 'trim|required');
	$this->form_validation->set_rules('rb', 'rb', 'trim|required');
	$this->form_validation->set_rules('lk', 'lk', 'trim|required');
	$this->form_validation->set_rules('ga', 'ga', 'trim|required');
	//$this->form_validation->set_rules('max', 'max', 'trim|required');

	//$this->form_validation->set_rules('id_analisa', 'id_analisa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "analisa.xls";
        $judul = "analisa";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Nama Tempat");
	xlsWriteLabel($tablehead, $kolomhead++, "Rb");
	xlsWriteLabel($tablehead, $kolomhead++, "Lk");
	xlsWriteLabel($tablehead, $kolomhead++, "Ga");
	xlsWriteLabel($tablehead, $kolomhead++, "Max");

	foreach ($this->Analisa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_nama_tempat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rb);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ga);
	    xlsWriteNumber($tablebody, $kolombody++, $data->max);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=analisa.doc");

        $data = array(
            'analisa_data' => $this->Analisa_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('analisa/analisa_doc',$data);
    }

}

/* End of file Analisa.php */
/* Location: ./application/controllers/Analisa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-19 03:30:26 */
/* http://harviacode.com */