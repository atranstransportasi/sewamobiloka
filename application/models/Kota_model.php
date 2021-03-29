<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kota_model extends CI_Model
{
    //load database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_kota($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('kota');
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_kota_blog()
    {
        $this->db->select('*');
        $this->db->from('kota');
        $this->db->where('kota_type', 'Blog');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_kota_iklan()
    {
        $this->db->select('*');
        $this->db->from('kota');
        $this->db->where('kota_type', 'Iklan');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_kota_home()
    {
        $this->db->select('*');
        $this->db->from('kota');
        $this->db->where('kota_type', 'Iklan');
        $this->db->limit(5);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_kota_sidebar()
    {
        $this->db->select('*');
        $this->db->from('kota');
        $this->db->where('kota_type', 'Blog');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function detail_kota($id)
    {
        $this->db->select('*');
        $this->db->from('kota');
        $this->db->where('id', $id);
        $this->db->order_by('id');
        $query = $this->db->get();
        return $query->row();
    }
    //Read Berita
    public function read($kota_slug)
    {
        $this->db->select('*');
        $this->db->from('kota');
        // Join

        //End Join
        $this->db->where(array(
            'kota.kota_slug'      =>  $kota_slug
        ));
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }

    public function create($data)
    {
        $this->db->insert('kota', $data);
    }
    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('kota', $data);
    }
    //Delete Data
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('kota', $data);
    }

    public function total_row()
    {
        $this->db->select('*');
        $this->db->from('kota');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}
