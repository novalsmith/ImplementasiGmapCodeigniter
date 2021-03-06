<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Geocoding_model extends CI_Model
{

    public $table = 'geocoding';
    public $id = 'id_geo';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('address a', 'a.id_add = g.id_add');
        return $this->db->get('geocoding g')->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_geo', $q);
	$this->db->or_like('id_add', $q);
	$this->db->or_like('lat', $q);
	$this->db->or_like('long', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_geo', $q);
	$this->db->or_like('id_add', $q);
	$this->db->or_like('lat', $q);
	$this->db->or_like('long', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert('geocoding', $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Geocoding_model.php */
/* Location: ./application/models/Geocoding_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-19 03:30:26 */
/* http://harviacode.com */