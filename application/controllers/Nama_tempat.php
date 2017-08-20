<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nama_tempat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nama_tempat_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $nama_tempat = $this->Nama_tempat_model->get_all();

        $data = array(
            'nama_tempat_data' => $nama_tempat
        );

        $this->load->view('nama_tempat/nama_tempat_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Nama_tempat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nama_tempat' => $row->id_nama_tempat,
		'nama' => $row->nama,
		'lat' => $row->lat,
		'long' => $row->long,
		'gambar' => $row->gambar,
		'ket_nama_tempat' => $row->ket_nama_tempat,
	    );
            $this->load->view('nama_tempat/nama_tempat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nama_tempat'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('nama_tempat/create_action'),
	    'id_nama_tempat' => set_value('id_nama_tempat'),
	    'nama' => set_value('nama'),
	    'lat' => set_value('lat'),
	    'long' => set_value('long'),
	    'gambar' => set_value('gambar'),
	    'ket_nama_tempat' => set_value('ket_nama_tempat'),
	);
        $this->load->view('nama_tempat/nama_tempat_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'lat' => $this->input->post('lat',TRUE),
		'long' => $this->input->post('long',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'ket_nama_tempat' => $this->input->post('ket_nama_tempat',TRUE),
	    );

            $this->Nama_tempat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('nama_tempat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Nama_tempat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('nama_tempat/update_action'),
		'id_nama_tempat' => set_value('id_nama_tempat', $row->id_nama_tempat),
		'nama' => set_value('nama', $row->nama),
		'lat' => set_value('lat', $row->lat),
		'long' => set_value('long', $row->long),
		'gambar' => set_value('gambar', $row->gambar),
		'ket_nama_tempat' => set_value('ket_nama_tempat', $row->ket_nama_tempat),
	    );
            $this->load->view('nama_tempat/nama_tempat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nama_tempat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nama_tempat', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'lat' => $this->input->post('lat',TRUE),
		'long' => $this->input->post('long',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'ket_nama_tempat' => $this->input->post('ket_nama_tempat',TRUE),
	    );

            $this->Nama_tempat_model->update($this->input->post('id_nama_tempat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('nama_tempat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Nama_tempat_model->get_by_id($id);

        if ($row) {
            $this->Nama_tempat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('nama_tempat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nama_tempat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('lat', 'lat', 'trim|required');
	$this->form_validation->set_rules('long', 'long', 'trim|required');
	$this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
	$this->form_validation->set_rules('ket_nama_tempat', 'ket nama tempat', 'trim|required');

	$this->form_validation->set_rules('id_nama_tempat', 'id_nama_tempat', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "nama_tempat.xls";
        $judul = "nama_tempat";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Lat");
	xlsWriteLabel($tablehead, $kolomhead++, "Long");
	xlsWriteLabel($tablehead, $kolomhead++, "Gambar");
	xlsWriteLabel($tablehead, $kolomhead++, "Ket Nama Tempat");

	foreach ($this->Nama_tempat_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->long);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gambar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ket_nama_tempat);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=nama_tempat.doc");

        $data = array(
            'nama_tempat_data' => $this->Nama_tempat_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('nama_tempat/nama_tempat_doc',$data);
    }

}

/* End of file Nama_tempat.php */
/* Location: ./application/controllers/Nama_tempat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-19 03:30:26 */
/* http://harviacode.com */