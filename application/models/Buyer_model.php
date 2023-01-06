<?php

class Buyer_model extends CI_Model {

    private $tableName;
    private $secret;
    private $_batchImport;

    function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->table_parent = 'buyers';
    }

    function addParent($data) {
        $query = $this->db->insert($this->table_parent, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function check($param) {
        $this->db->where('buyer_email', $param);
        $query = $this->db->get($this->table_parent);
        return $query->row();
    }

    public function getAllParent() {
        $mSessionKey = $this->session->userdata('session_id');
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        $this->db->where('buyer_id !=', $mSessionKey);
        $this->db->order_by('buyer_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllParentByZone($mZone) {
        $mSessionKey = $this->session->userdata('session_id');
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('buyer_zone', $mZone);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        $this->db->where('buyer_id !=', $mSessionKey);
        $this->db->order_by('buyer_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllParentByZoneForZonal($mZone) {
        $mSessionKey = $this->session->userdata('session_id');
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('buyer_zone', $mZone);
        $this->db->order_by('buyer_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            if (!empty($data)) {
                $mCumulated = array();
                foreach ($data as $key => $value) {
                    if ($value['buyer_role'] == "Regional C&P Head") {
                        $mCumulated[] = $value;
                    } else if ($value['buyer_role'] == "Regional C&P Team") {
                        $mCumulated[] = $value;
                    } else if ($value['buyer_role'] == "PCM") {
                        $mCumulated[] = $value;
                    }
                }
                return $mCumulated;
            } else {
                return $data;
            }
        } else {
            return false;
        }
    }

    public function getAllParentByZoneAndRole($mZone, $mRole) {
        $mSessionKey = $this->session->userdata('session_id');
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('buyer_zone', $mZone);
        $this->db->where('buyer_role', $mRole);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('buyer_id !=', $mSessionKey);
        $this->db->order_by('buyer_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllPcmAndRot($mZone, $mPcm, $mRot) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('buyer_zone', $mZone);
        $this->db->where('buyer_role', $mPcm);
        $this->db->or_where('buyer_role', $mRot);
        $this->db->order_by('buyer_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllParentByRole($mRole) {
        $mSessionKey = $this->session->userdata('session_id');
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('buyer_role', $mRole);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        $this->db->where('buyer_id !=', $mSessionKey);
        $this->db->order_by('buyer_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllParentForPr() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('buyer_status', 1);
        $this->db->where('buyer_role', "Project Manager");
        $this->db->where('buyer_id !=', $mSessionKey);
        $this->db->where('buyer_zone', $mSessionZone);
        $this->db->order_by('buyer_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
    
    public function getAllPetZone() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('buyer_status', 1);
        $this->db->where('buyer_role', "Project Execution Team");
        $this->db->where('buyer_id !=', $mSessionKey);
        $this->db->where('buyer_zone', $mSessionZone);
        $this->db->order_by('buyer_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllParentForAssign() {
        $mSessionZone = $this->session->userdata('session_zone');
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('buyer_status', 1);
        $this->db->or_where('buyer_role', "Project Manager");
        $this->db->or_where('buyer_role', "Project Director");
        $this->db->or_where('buyer_role', "PCM");
        $this->db->where('buyer_zone', $mSessionZone);
        $this->db->order_by('buyer_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllParentForTransfer() {
        $mSessionZone = $this->session->userdata('session_zone');
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('buyer_status', 1);
        $this->db->or_where('buyer_role', "Regional C&P Head");
        $this->db->or_where('buyer_role', "Regional C&P Team");
        $this->db->or_where('buyer_role', "PCM");
        $this->db->where('buyer_zone', $mSessionZone);
        $this->db->order_by('buyer_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllParentForTransferByRole($mRole) {
        $mSessionZone = $this->session->userdata('session_zone');
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('buyer_status', 1);
        $this->db->or_where('buyer_role', $mRole);
        $this->db->where('buyer_zone', $mSessionZone);
        $this->db->order_by('buyer_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllPorgs() {
        $this->db->select('*');
        $this->db->from('purchase_orgs');
        $this->db->order_by('porg_id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllParentForSite() {
        $this->db->select('*');
        $this->db->where('article_status', 1);
        $this->db->from($this->table_parent);
        $this->db->join('categories', 'categories.category_key = article.category_key');
        $this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllTopParentForSite() {
        $this->db->select('*');
        $this->db->where('article_status', 1);
        $this->db->from($this->table_parent);
        $this->db->join('categories', 'categories.category_key = article.category_key');
        $this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            $filteredData = array();
            foreach ($data as $key => $value) {
                if (!empty($value['article_like'])) {
                    $filteredData[] = $value;
                }
            }
            return $filteredData;
        } else {
            return false;
        }
    }

    public function getParentByKey($param) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('buyer_id', $param);
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

    public function getPorgByKey($param) {
        $this->db->select('*');
        $this->db->from('purchase_orgs');
        $this->db->where('porg_code', $param);
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getParentByZone($param) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('buyer_zone', $param);
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

    public function getAllTowsForVendorLogs() {
        $this->db->select('*');
        $this->db->from("typeofwork");
        $this->db->or_where('natureofbusiness_id', 1);
        $this->db->or_where('natureofbusiness_id', 2);
        $this->db->or_where('natureofbusiness_id', 3);
        $this->db->order_by("name");
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getTypeOfWork($param) {
        $this->db->select('*');
        $this->db->from("typeofwork");
        $this->db->where('id', $param);
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

    public function getAllTypeOfWorkByVendorType($param) {
        $this->db->select('*');
        $this->db->from("typeofwork");
        $this->db->where('natureofbusiness_id', $param);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->order_by("article.article_id");
        $this->db->order_by("name");
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
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
        $this->db->where('buyer_id', $param);
        $query1 = $this->db->update($this->table_parent);
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deleteParentByKey($param) {
        $this->db->where('buyer_id', $param);
        $mDelete = $this->db->delete($this->table_parent);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getAllZonalSpecs() {
        $this->db->select('*');
        $this->db->from("zonal_specification");
        $this->db->order_by("zs_id");
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getZonalSpecById($param) {
        $this->db->select('*');
        $this->db->from("zonal_specification");
        $this->db->where('zs_id', $param);
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getZonalSpecByZone($param) {
        $this->db->select('*');
        $this->db->from("zonal_specification");
        $this->db->where('zs_zone', $param);
        $this->db->join('buyers', 'buyers.buyer_id = zonal_specification.zs_linked');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            return $data;
        } else {
            return false;
        }
    }

    public function updateZonalParentByKey($param, $data) {
        $this->db->set($data);
        $this->db->where('zs_id', $param);
        $query1 = $this->db->update("zonal_specification");
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>