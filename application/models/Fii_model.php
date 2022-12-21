<?php

class Fii_model extends CI_Model {

    private $tableName;
    private $secret;
    private $_batchImport;

    function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->table_parent = 'issue_items';
    }

    function addParent($data) {
        $query = $this->db->insert($this->table_parent, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function getAllParent() {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('buyer_status', 1);
        $this->db->order_by('ii_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getParentByVendorIdAndEoiId($param1, $param2) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        $this->db->where('bc_vendor_id', $param1);
        $this->db->where('bc_eoi_id', $param2);
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
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
        $this->db->order_by('ii_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            $mCurated = array();
            foreach ($data as $key => $value) {
                $mSelectedVendors = json_decode($value['eoi_vendors_selected']);
                if (in_array($mSessionKey, $mSelectedVendors)) {
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
        $this->db->order_by('ii_id', 'DESC');
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
        $this->db->where('ii_id', $param);
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

    public function getAllParentByTowKey($param) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        if ($param == 66) {
            //Get All General Bri for Civil
            $this->db->or_where('ii_tow', "23");
            //$this->db->or_where('ii_tow', "62");
        } else if ($param == 67) {
            //Get All General Bri for MEP
            $this->db->or_where('ii_tow', "32");
            $this->db->or_where('ii_tow', "33");
            $this->db->or_where('ii_tow', "41");
            //$this->db->or_where('ii_tow', "62");
        } else if ($param == 68) {
            //Get All General Bri for Finishing
            $this->db->or_where('ii_tow', "27");
            $this->db->or_where('ii_tow', "30");
            //$this->db->or_where('ii_tow', "62");
        } else if ($param == 61 || $param == 63 || $param == 62) {
            $this->db->or_where('ii_tow', "23");
            $this->db->or_where('ii_tow', "32");
            $this->db->or_where('ii_tow', "33");
            $this->db->or_where('ii_tow', "41");
            $this->db->or_where('ii_tow', "27");
            $this->db->or_where('ii_tow', "30");
        } else {
            $this->db->where('ii_tow', $param);
        }

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
        $this->db->where('ii_id', $param);
        $query1 = $this->db->update($this->table_parent);
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deleteParentByKey($param) {
        $this->db->where('ii_id', $param);
        $mDelete = $this->db->delete($this->table_parent);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>