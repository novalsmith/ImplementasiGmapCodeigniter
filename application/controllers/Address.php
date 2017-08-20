<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Address extends CI_Controller
{

        public $lokasi = "Data Atribut Lokasi"; 
        public $ReadLokasi = "Read Data Atribut Lokasi"; 



    function __construct()
    {
        parent::__construct();
        $this->load->model('Address_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $address = $this->Address_model->get_all();

        $data = array(
            'judul'         => $this->lokasi,
            'content'       => 'address/address_list',
            'address_data' => $address,

        );

        $this->load->view('templateMap', $data);
    }

    public function read($id) 
    {
        $row = $this->Address_model->get_by_id($id);
        if ($row) {
            $data = array(
                 'judul'   => $this->ReadLokasi,
            'content' => 'address/address_read',
		'id_add' => $row->id_add,
		'name' => $row->name,
		'posisi' => $row->posisi,
	    );
            $this->load->view('templateMap', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('address'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul'   => $this->lokasi,
            'content' => 'address/address_form',
            'button' => 'Create',
            'action' => site_url('address/create_action'),
	    'id_add' => set_value('id_add'),
	    'name' => set_value('name'),
	    'posisi' => set_value('posisi'),
	);
        $this->load->view('templateMap', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

         


        $this->load->library('upload');
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/img/AtributGambar/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '3072'; //maksimum besar file 3M
        $config['max_width']  = '5000'; //lebar maksimum 5000 px
        $config['max_height']  = '5000'; //tinggi maksimu 5000 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya


        $this->upload->initialize($config);

        if($_FILES['AtributGambar']['name'])
        {
            if ($this->upload->do_upload('AtributGambar'))
            {
                $gbr = $this->upload->data();

              $data = array(
        'name' => $this->input->post('name',TRUE),
        'posisi' => $this->input->post('posisi',TRUE),
        'AtributGambar' => $gbr['file_name'],
        );

              $this->Address_model->insert($data);

                $config2['image_library'] = 'gd2';
                $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config2['new_image'] = './assets/img/AtributGambar/'; // folder tempat menyimpan hasil resize
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 500; //lebar setelah resize menjadi 100 px
                $config2['height'] = 500; //lebar setelah resize menjadi 100 px

                $this->load->library('image_lib',$config2);

                $this->image_lib->initialize($config2);
                $this->image_lib->resize();
                 $this->image_lib->clear();
                unset($configs);





                //pesan yang muncul jika resize error dimasukkan pada session flashdata
                if ( !$this->image_lib->resize()){
                $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));
              }




                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("message",
                '
                <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Sukses !</strong> Data Atribut Lokasi
      <a class="alert-link" href=" '.site_url('address').'  ">' .$this->input->post('name').'</a> Berhasil Tersimpan
                </div> ');

                redirect('address/create'); //jika berhasil maka akan ditampilkan view upload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("message",
                '
                <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Sukses !</strong> Data Atribut Lokasi
            <a class="alert-link" href=" '.site_url('address').'  ">' .
            $this->upload->display_errors('<p>', '</p>').'</a> Coba Lagi          </div> ');
                $this->create_action;
            }
        }else {
          $this->session->set_flashdata("message",
          '
          <div class="alert alert-warning alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Perhatian !</strong> Gambar Atribut Harus Di Masukan, Data Anda Belum Tersimpan, Coba Lagi
          </div> ');

          redirect('address/create'); //jika berhasil maka akan ditampilkan view upload
        }














        }
    }
    
    public function update($id) 
    {
        $row = $this->Address_model->get_by_id($id);

        if ($row) {
            $data = array(
        'view_imgOnUpdate' => $this->Address_model->get_by_id($id),
           'judul'   => $this->lokasi,
            'content' => 'address/address_form',
                'button' => 'Update',
                'action' => site_url('address/update_action'),
		'id_add' => set_value('id_add', $row->id_add),
		'name' => set_value('name', $row->name),
		'posisi' => set_value('posisi', $row->posisi),
        'AtributGambar' => set_value('AtributGambar', $row->AtributGambar),

	    );
            $this->load->view('templateMap', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('address'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_add', TRUE));
        } else {
  

  $filefoto_lama = $this->input->post('filefoto_lama');
      
      $this->load->library('upload');
      $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
      $config['upload_path'] = './assets/img/AtributGambar/'; //path folder
      $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
      $config['max_size'] = '3072'; //maksimum besar file 3M
      $config['max_width']  = '5000'; //lebar maksimum 5000 px
      $config['max_height']  = '5000'; //tinggi maksimu 5000 px
      $config['file_name'] = $nmfile; //nama yang terupload nantinya


      $this->upload->initialize($config);

      if($_FILES['AtributGambar']['name'])
      {
          if ($this->upload->do_upload('AtributGambar'))
          {
              $gbr = $this->upload->data();

       $data = array(
        'name' => $this->input->post('name',TRUE),
        'posisi' => $this->input->post('posisi',TRUE),
        'AtributGambar' => $gbr['file_name'],
        );

            //$this->Kerja_sama_model->insert($data);
            $this->Address_model->update($this->input->post('id_add', TRUE), $data);

            unlink('./assets/img/AtributGambar/'.$filefoto_lama);
 


              $config2['image_library'] = 'gd2';
              $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
              $config2['new_image'] = './assets/img/AtributGambar/'; // folder tempat menyimpan hasil resize
              $config2['maintain_ratio'] = TRUE;
              $config2['width'] = 300; //lebar setelah resize menjadi 100 px
              $config2['height'] = 300; //lebar setelah resize menjadi 100 px

              $this->load->library('image_lib',$config2);

              $this->image_lib->initialize($config2);
              $this->image_lib->resize();
               $this->image_lib->clear();
              unset($configs);





              //pesan yang muncul jika resize error dimasukkan pada session flashdata
              if ( !$this->image_lib->resize()){
              $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));
            }




              //pesan yang muncul jika berhasil diupload pada session flashdata
              $this->session->set_flashdata("message",
              '
              <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Sukses !</strong> Data Atribut Lokasi
    <a class="alert-link" href=" '.site_url('address').'  ">' .$this->input->post('name').'</a> Berhasil Tersimpan
              </div> ');

              redirect('address/update/'.$this->input->post('id_add')); //jika berhasil maka akan ditampilkan view upload
          }else{
              //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
              $this->session->set_flashdata("message",
              '
              <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Sukses !</strong> Data Atribut Lokasi
          <a class="alert-link" href=" '.site_url('address').'  ">' .
          $this->upload->display_errors('<p>', '</p>').'</a> Coba Lagi          </div> ');
          redirect('kerja_sama/update/'.$this->input->post('id_add')); //jika berhasil maka akan ditampilkan view upload
          }
      }else {

      $data = array(
        'name' => $this->input->post('name',TRUE),
        'posisi' => $this->input->post('posisi',TRUE),
       // 'AtributGambar' => $gbr['file_name'],
        );

  $this->Address_model->update($this->input->post('id_add', TRUE), $data);

      //  $this->Kerja_sama_model->insert($data);
        $this->session->set_flashdata("message",
        '
        <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Sukses !</strong> Data Berhasil Tersimpan Dengan Gambar tidak di Ubah
        </div> ');
        redirect('address/update/'.$this->input->post('id_add')); //jika berhasil maka akan ditampilkan view upload
      } 

















        }
    }
    
    public function delete($id) 
    {
        $row = $this->Address_model->get_by_id($id);

        if ($row) {
            $this->Address_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('address'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('address'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('posisi', 'posisi', 'trim|required');

	$this->form_validation->set_rules('id_add', 'id_add', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "address.xls";
        $judul = "address";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Posisi");

	foreach ($this->Address_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->posisi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=address.doc");

        $data = array(
            'address_data' => $this->Address_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('address/address_doc',$data);
    }

}

/* End of file Address.php */
/* Location: ./application/controllers/Address.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-19 03:30:26 */
/* http://harviacode.com */