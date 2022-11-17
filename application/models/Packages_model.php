<?php

class Packages_model extends CI_Model {

    private $tableName;
    private $secret;
    private $_batchImport;

    function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->table_parent = 'packages';
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
        $this->db->join('typeofwork', 'typeofwork.id = packages.package_selected_id');
        $this->db->join('projects', 'projects.project_id = packages.package_project');
        //$this->db->where('buyer_status', 1);
        $this->db->order_by('package_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
    
    public function getAllParentByProjectAndZoneAndType($project, $zone, $type) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->join('typeofwork', 'typeofwork.id = packages.package_selected_id');
        $this->db->join('projects', 'projects.project_id = packages.package_project');
        $this->db->where('package_zone', $zone);
        $this->db->where('package_project', $project);
        $this->db->where('package_type', $type);
        $this->db->order_by('package_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
    
    public function getAllParentByZoneAndProject($zone, $project) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->join('typeofwork', 'typeofwork.id = packages.package_selected_id');
        $this->db->join('projects', 'projects.project_id = packages.package_project');
        $this->db->where('package_zone', $zone);
        $this->db->where('package_project', $project);
        $this->db->order_by('package_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
    
    public function getAllParentByProjectAndZoneAndTypeAndPro($project, $zone, $type, $procureType) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->join('typeofwork', 'typeofwork.id = packages.package_selected_id');
        $this->db->join('projects', 'projects.project_id = packages.package_project');
        $this->db->where('package_zone', $zone);
        $this->db->where('package_project', $project);
        $this->db->where('package_type', $type);
        $this->db->where('package_pro_type', $procureType);
        $this->db->order_by('package_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
    
    public function getAllParentByZone($zone) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->join('typeofwork', 'typeofwork.id = packages.package_selected_id');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        $this->db->where('package_zone', $zone);
        $this->db->order_by('package_id', 'DESC');
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
        $this->db->where('package_id', $param);
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
        $this->db->where('package_id', $param);
        $query1 = $this->db->update($this->table_parent);
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deleteParentByKey($param) {
        $this->db->where('package_id', $param);
        $mDelete = $this->db->delete($this->table_parent);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>