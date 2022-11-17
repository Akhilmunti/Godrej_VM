<?php

class Eoi_model extends CI_Model {

    private $tableName;
    private $secret;
    private $_batchImport;

    function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->table_parent = 'eoi_list';
    }

    function addParent($data) {
        $query = $this->db->insert($this->table_parent, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function check($param, $param2, $param3, $param4, $param5) {
        $this->db->where('eoi_project', $param);
        $this->db->where('eoi_zone', $param2);
        $this->db->where('eoi_type', $param3);
        $this->db->where('eoi_for', $param4);
        $this->db->where('eoi_tow', $param5);
        $query = $this->db->get($this->table_parent);
        return $query->row();
    }
    
    public function checkVendor($param, $param2, $param3, $param4, $param5, $param6) {
        $this->db->where('eoi_project', $param);
        $this->db->where('eoi_zone', $param2);
        $this->db->where('eoi_type', $param3);
        $this->db->where('eoi_for', $param4);
        $this->db->where('eoi_tow', $param5);
        $this->db->where('eoi_vendor_id', $param6);
        $query = $this->db->get($this->table_parent);
        return $query->row();
    }

    public function getAllParent() {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('buyer_status', 1);
        $this->db->order_by('eoi_id', 'DESC');
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
        $this->db->join('projects', 'projects.project_id = eoi_list.eoi_project');
        $this->db->join('typeofwork', 'typeofwork.id = eoi_list.eoi_tow');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('buyer_status', 1);
        $this->db->order_by('eoi_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            $mCurated = array();
            foreach ($data as $key => $value) {
                $mSelectedVendors = json_decode($value['eoi_vendors_selected']);
                if(in_array($mSessionKey, $mSelectedVendors)){
                    $mCurated[] = $value;
                }
            }
            return $mCurated;
        } else {
            return false;
        }
    }
    
    public function getAllParentByZone($mZone) {
        $mSessionKey = $this->session->userdata('session_vendor_id');
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        $this->db->where('eoi_zone', $mZone);
        $this->db->or_where('eoi_status', 1);
        $this->db->or_where('eoi_status', 2);
        $this->db->join('projects', 'projects.project_id = eoi_list.eoi_project');
        $this->db->join('typeofwork', 'typeofwork.id = eoi_list.eoi_tow');
        $this->db->order_by('eoi_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            $mCurated = array();
            foreach ($data as $key => $value) {
                $mSelectedVendors = json_decode($value['eoi_vendors_selected']);
                if(in_array($mSessionKey, $mSelectedVendors)){
                    $mCurated[] = $value;
                }
            }
            return $mCurated;
        } else {
            return false;
        }
    }

    public function getAllParentByBuyerId($buyer, $param, $param2, $param3, $param4, $param5) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('eoi_buyer_id', $buyer);
        $this->db->where('eoi_project', $param);
        $this->db->where('eoi_zone', $param2);
        $this->db->where('eoi_type', $param3);
        $this->db->where('eoi_for', $param4);
        $this->db->where('eoi_tow', $param5);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('buyer_status', 1);
        $this->db->order_by('eoi_id', 'DESC');
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
        $this->db->where('eoi_project', $param);
        $this->db->where('eoi_zone', $param2);
        $this->db->where('eoi_type', $param3);
        $this->db->where('eoi_for', $param4);
        $this->db->where('eoi_tow', $param5);
        $this->db->or_where('eoi_status', 1);
        $this->db->or_where('eoi_status', 2);
        $this->db->or_where('eoi_status', 11);
        $this->db->join('projects', 'projects.project_id = eoi_list.eoi_project');
        $this->db->join('typeofwork', 'typeofwork.id = eoi_list.eoi_tow');
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('buyer_status', 1);
        $this->db->order_by('eoi_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
    
    public function getAllParentForShortlistingPending() {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->or_where('eoi_status', 1);
        $this->db->or_where('eoi_status', 2);
        $this->db->or_where('eoi_status', 11);
        $this->db->join('projects', 'projects.project_id = eoi_list.eoi_project');
        $this->db->join('typeofwork', 'typeofwork.id = eoi_list.eoi_tow');
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('buyer_status', 1);
        $this->db->order_by('eoi_id', 'DESC');
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
        $this->db->where('eoi_id', $param);
        $this->db->join('projects', 'projects.project_id = eoi_list.eoi_project');
        $this->db->join('typeofwork', 'typeofwork.id = eoi_list.eoi_tow');
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
        $this->db->where('eoi_id', $param);
        $query1 = $this->db->update($this->table_parent);
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deleteParentByKey($param) {
        $this->db->where('eoi_id', $param);
        $mDelete = $this->db->delete($this->table_parent);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>