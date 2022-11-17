<?php

class Pre_model extends CI_Model {

    private $tableName;
    private $secret;
    private $_batchImport;

    function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->table_parent = 'pre_vendor';
    }

    function addParent($data) {
        $query = $this->db->insert($this->table_parent, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function check($param1) {
        $this->db->where('pre_pan', $param1);
        $query = $this->db->get($this->table_parent);
        return $query->row();
    }

    public function getAllParent() {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('buyer_status', 1);
        $this->db->order_by('pre_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getParentByKey($param) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('pre_id', $param);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->order_by("article.article_id");
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getParentByPan($param) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('pre_pan', $param);
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function updateParentByKey($param, $data) {
        $this->db->set($data);
        $this->db->where('pre_id', $param);
        $query1 = $this->db->update($this->table_parent);
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deleteParentByKey($param) {
        $this->db->where('pre_id', $param);
        $mDelete = $this->db->delete($this->table_parent);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>