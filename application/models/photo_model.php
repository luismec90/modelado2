<?php

class Photo_model extends CI_Model
{

    private static $table;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'photo';
    }

    public function create($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function read($where)
    {
        $this->db->from($this->table);
        $this->db->where($where);
        return $this->db->get()->result();
    }

    public function update($data, $where)
    {
        $this->db->update($this->table, $data, $where);
    }

    public function delete($where)
    {
        $this->db->delete($this->table, $where);
    }

}
