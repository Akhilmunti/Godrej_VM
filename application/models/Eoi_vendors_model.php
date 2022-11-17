<?php

class Eoi_vendors_model extends CI_Model {

    private $tableName;
    private $secret;
    private $_batchImport;

    function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->table_parent = 'eoi_vendors_list';
    }

    function addParent($data) {
        $query = $this->db->insert($this->table_parent, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function check($param, $param2) {
        $this->db->where('ev_eoi_id', $param);
        $this->db->where('ev_vendor_id', $param2);
        $query = $this->db->get($this->table_parent);
        return $query->row();
    }

    public function getAllParent() {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('buyer_status', 1);
        $this->db->order_by('ev_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllParentByVendorId() {
        $mSessionKey = $this->session->userdata('session_vendor_id');
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('ev_vendor_id', $mSessionKey);
        $this->db->join('projects', 'projects.project_id = eoi_vendors_list.ev_project');
        $this->db->join('typeofwork', 'typeofwork.id = eoi_vendors_list.ev_tow');
        $this->db->join('eoi_list', 'eoi_list.eoi_id = eoi_vendors_list.ev_eoi_id');
        $this->db->order_by('ev_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
    
    public function getParentByVendorIdAndEoiId($mEoiId) {
        $mSessionKey = $this->session->userdata('session_vendor_id');
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('ev_vendor_id', $mSessionKey);
        $this->db->where('ev_eoi_id', $mEoiId);
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllParentByBuyerId($buyer, $param, $param2, $param3, $param4, $param5) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('eoi_buyer_id', $buyer);
        $this->db->where('ev_project', $param);
        $this->db->where('eoi_zone', $param2);
        $this->db->where('eoi_type', $param3);
        $this->db->where('eoi_for', $param4);
        $this->db->where('ev_tow', $param5);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('buyer_status', 1);
        $this->db->order_by('ev_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
    
    public function getAllParentForShortlisting($param, $param2, $param3, $param4, $param5) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('ev_project', $param);
        $this->db->where('eoi_zone', $param2);
        $this->db->where('eoi_type', $param3);
        $this->db->where('eoi_for', $param4);
        $this->db->where('ev_tow', $param5);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('buyer_status', 1);
        $this->db->order_by('ev_id', 'DESC');
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
        $this->db->where('ev_id', $param);
        $this->db->join('projects', 'projects.project_id = eoi_vendors_list.ev_project');
        $this->db->join('typeofwork', 'typeofwork.id = eoi_vendors_list.ev_tow');
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

    public function getParentByCategoryKey($param) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('category_key', $param);
        $this->db->order_by("article.article_id");
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getParentBySubcategoryKey($param) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('subcategory_key', $param);
        $this->db->order_by("article.article_id");
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getParentBySource($param) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('source', $param);
        $this->db->order_by("article.article_id");
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
        $this->db->where('ev_id', $param);
        $query1 = $this->db->update($this->table_parent);
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deleteParentByKey($param) {
        $this->db->where('ev_id', $param);
        $mDelete = $this->db->delete($this->table_parent);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>