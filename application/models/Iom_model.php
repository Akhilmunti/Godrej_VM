<?php

class Iom_model extends CI_Model {

    private $tableName;
    private $secret;
    private $_batchImport;

    function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->table_contracts = 'award_recomm_contract_salient';
        $this->table_procurement = 'award_recomm_procurement_salient';
    }

    public function getAllParent($mZone, $mProject) {
        $this->db->select('*');
        $this->db->from($this->table_contracts);
        if ($mZone) {
            $this->db->where('zone', $mZone);
        }
        if ($mProject) {
            $this->db->where('project_id', $mProject);
        }
        $this->db->where('nfa_status', "A");
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllParentPro($mZone, $mProject) {
        $this->db->select('*');
        $this->db->from($this->table_procurement);
        if ($mZone) {
            $this->db->where('zone', $mZone);
        }
        if ($mProject) {
            $this->db->where('project_id', $mProject);
        }
        $this->db->where('nfa_status', "A");
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllParentProCount($mZone, $mProject) {
        $mPresentYear = date("Y");
        $this->db->select('*');
        $this->db->from($this->table_procurement);
        if ($mZone) {
            $this->db->where('zone', $mZone);
        }
        if ($mProject) {
            $this->db->where('project_id', $mProject);
        }
        $this->db->where('nfa_status', "A");
        $this->db->like('last_updated', $mPresentYear);
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
    
    public function getAllParentProCountOngoing($mZone, $mProject) {
        $mPresentYear = date("Y");
        $this->db->select('*');
        $this->db->from($this->table_procurement);
        if ($mZone) {
            $this->db->where('zone', $mZone);
        }
        if ($mProject) {
            $this->db->where('project_id', $mProject);
        }
        $this->db->where('nfa_status !=', "A");
        $this->db->like('last_updated', $mPresentYear);
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllParentConCount($mZone, $mProject) {
        $mPresentYear = date("Y");
        $this->db->select('*');
        $this->db->from($this->table_contracts);
        if ($mZone) {
            $this->db->where('zone', $mZone);
        }
        if ($mProject) {
            $this->db->where('project_id', $mProject);
        }
        $this->db->where('nfa_status', "A");
        $this->db->like('last_updated', $mPresentYear);
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
    
    public function getAllParentConCountOngoing($mZone, $mProject) {
        $mPresentYear = date("Y");
        $this->db->select('*');
        $this->db->from($this->table_contracts);
        if ($mZone) {
            $this->db->where('zone', $mZone);
        }
        if ($mProject) {
            $this->db->where('project_id', $mProject);
        }
        $this->db->where('nfa_status !=', "A");
        $this->db->like('last_updated', $mPresentYear);
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllParentProLastPrice($mProType, $mZone, $mProject) {
        $this->db->select('*');
        $this->db->from($this->table_procurement);
        if ($mZone) {
            $this->db->where('zone', $mZone);
        }
        if ($mProject) {
            $this->db->where('project_id', $mProject);
        }
        if ($mProType) {
            $this->db->where('type_work_id', $mProType);
        }
        $this->db->where('nfa_status', "A");
        $this->db->order_by('last_updated', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            return $data;
        } else {
            return false;
        }
    }

}

?>