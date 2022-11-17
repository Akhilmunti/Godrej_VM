<?php

class Vendorlog_model extends CI_Model {

    private $tableName;
    private $secret;
    private $_batchImport;

    function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->table_parent = 'vendor_logs';
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
        $this->db->join('projects', 'projects.project_id = vendor_logs.vl_project');
        $this->db->join('typeofwork', 'typeofwork.id = vendor_logs.vl_package');
        //$this->db->join('registration', 'registration.id = vendor_logs.vl_vendor');
        $this->db->order_by('vl_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
    
    public function getParentByProjectAndZone($param1, $param2) {
        $mSessionKey = $this->session->userdata('session_id');
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->join('projects', 'projects.project_id = vendor_logs.vl_project');
        $this->db->join('typeofwork', 'typeofwork.id = vendor_logs.vl_package');
        //$this->db->join('registration', 'registration.id = vendor_logs.vl_vendor');
        $this->db->where('vl_project', $param1);
        $this->db->where('vl_zone', $param2);
        $this->db->where('vl_buyer_id', $mSessionKey);
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllParentByZone($param1) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('vl_zone', $param1);
        $this->db->join('projects', 'projects.project_id = vendor_logs.vl_project');
        $this->db->join('typeofwork', 'typeofwork.id = vendor_logs.vl_package');
        //$this->db->join('registration', 'registration.id = vendor_logs.vl_vendor');
        $this->db->order_by('vl_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
    
    public function getAllParentByFilter($mZone = null, $mProject = null, $mStatus = null) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        if($mZone){
            $this->db->where('vl_zone', $mZone);
        }
        if($mProject){
            $this->db->where('vl_project', $mProject);
        }
        if($mStatus){
            $this->db->where('vl_status_toggle', $mStatus);
        }
        $this->db->join('projects', 'projects.project_id = vendor_logs.vl_project');
        $this->db->join('typeofwork', 'typeofwork.id = vendor_logs.vl_package');
        //$this->db->join('registration', 'registration.id = vendor_logs.vl_vendor');
        $this->db->order_by('vl_id', 'DESC');
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
        $this->db->where('vl_id', $param);
        $this->db->join('projects', 'projects.project_id = vendor_logs.vl_project');
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

    public function updateParentByKey($param, $data) {
        $this->db->set($data);
        $this->db->where('vl_id', $param);
        $query1 = $this->db->update($this->table_parent);
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deleteParentByKey($param) {
        $this->db->where('vl_id', $param);
        $mDelete = $this->db->delete($this->table_parent);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>