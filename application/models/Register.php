<?php

class Register extends CI_Model {

    public function __construct() {
        //parent::Model(); 
        parent::__construct();
        $this->load->database();
    }

    public function insert($tableName, $data) {
        $this->db->insert($tableName, $data);
        return $this->db->insert_id();
    }

    public function update($tableName, $data, $where) {
        $this->db->update($tableName, $data, $where);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return false;
        } else {

            return true;
        }
    }

    public function getVendor() {
        $sql = "SELECT id,name FROM natureofbusiness WHERE isActive=1";
        $query = $this->db->query($sql);
        $res = $query->result();
        return $res;
    }

    public function getVendorByPan($param) {
        $this->db->select('*');
        $this->db->from('registration');
        $this->db->where('pan', $param);
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllWorks($data) {
        $this->db->select('*');
        $this->db->from('typeofwork');
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        $this->db->where('natureofbusiness_id', $data);
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

    public function getAllWorksForProcess() {
        $this->db->select('*');
        $this->db->from('typeofwork');
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
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

    public function getWorkById($param) {
        $this->db->select('*');
        $this->db->from('typeofwork');
        $this->db->where('id', $param);
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            return $data;
        } else {
            return false;
        }
    }

    public function get_type_of_work($id) {
        $sql = "SELECT id,natureofbusiness_id,name FROM typeofwork WHERE isActive=1 and natureofbusiness_id='$id' ORDER BY name";
        // print_r($sql);
        $query = $this->db->query($sql);
        $res = $query->result();
        return $res;
    }

    public function get_type_of_work2() {
        $sql = "SELECT id,natureofbusiness_id,name FROM typeofwork WHERE isActive=1 and natureofbusiness_id=2 ORDER BY name";
        $query = $this->db->query($sql);
        $res = $query->result();
        return $res;
    }

    public function get_type_of_work3() {
        $sql = "SELECT id,natureofbusiness_id,name FROM typeofwork WHERE isActive=1 and natureofbusiness_id=3 ORDER BY name";
        $query = $this->db->query($sql);
        $res = $query->result();
        return $res;
    }

    public function get_type_of_work4() {
        $sql = "SELECT id,natureofbusiness_id,name FROM typeofwork WHERE isActive=1 and natureofbusiness_id=4 ORDER BY name";
        $query = $this->db->query($sql);
        $res = $query->result();
        return $res;
    }

    public function getLocation() {
        $sql = "SELECT `id`,`name` FROM `location` WHERE isActive=1";
        $query = $this->db->query($sql);
        $res = $query->result();
        return $res;
    }

    public function userLogin($userNname, $password) {
        $this->db->where('user_name', $userNname);
        // $this->db->where('password', md5($password));
        $this->db->where('password', $password);
        $this->db->where('active', 1);
        $query = $this->db->get('registration');
        // print_r($this->db->last_query()); 
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        return false;
    }

    public function buyerLogin($userNname, $password) {
        $this->db->select('*');
        $this->db->where('buyer_email', $userNname);
        $this->db->where('buyer_password', $password);
        $this->db->where('buyer_status', 1);
        $this->db->from('buyers');
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $this->setBuyerSession($mQuery_Res->row_array());
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function buyerLoginByEmail($userNname) {
        $this->db->select('*');
        $this->db->where('buyer_email', $userNname);
        $this->db->where('buyer_status', 1);
        $this->db->from('buyers');
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $this->setBuyerSession($mQuery_Res->row_array());
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function setBuyerSession($data) {
        $this->session->set_userdata('session_id', $data['buyer_id']);
        $this->session->set_userdata('session_name', $data['buyer_name']);
        $this->session->set_userdata('session_email', $data['buyer_email']);
        $this->session->set_userdata('session_mobile', $data['buyer_mobile']);
        $this->session->set_userdata('session_zone', $data['buyer_zone']);
        $this->session->set_userdata('session_role', $data['buyer_role']);
        $this->session->set_userdata('session_pm', $data['buyer_is_pr']);
        $this->db->select('*');
        $this->db->from("zonal_specification");
        $this->db->order_by("zs_id");
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            foreach ($data as $key => $value) {
                if ($value['zs_zone'] == "NCR") {
                    $this->session->set_userdata('session_link_ncr', $value['zs_linked']);
                } else if ($value['zs_zone'] == "South") {
                    $this->session->set_userdata('session_link_south', $value['zs_linked']);
                } else if ($value['zs_zone'] == "Mumbai") {
                    $this->session->set_userdata('session_link_mumbai', $value['zs_linked']);
                } else if ($value['zs_zone'] == "Pune") {
                    $this->session->set_userdata('session_link_pune', $value['zs_linked']);
                } else if ($value['zs_zone'] == "Kolkata") {
                    $this->session->set_userdata('session_link_kolkata', $value['zs_linked']);
                }
            }
        }
    }

    public function vendorLogin($userNname, $password) {
        $this->db->select('*');
        $this->db->where('email', $userNname);
        $this->db->where('password', $password);
        $this->db->from('registration');
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $this->setVendorSession($mQuery_Res->row_array());
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function setVendorSession($data) {
        $this->session->set_userdata('session_vendor_id', $data['id']);
        $this->session->set_userdata('session_vendor_name', $data['user_name']);
        $this->session->set_userdata('session_vendor_type', $data['nature_of_business_id']);
        $this->session->set_userdata('session_vendor_email', $data['email']);
        $this->session->set_userdata('session_vendor_mobile', $data['contact_number']);
        $this->session->set_userdata('session_vendor_zone', $data['location']);
        $this->session->set_userdata('session_vendor_status', $data['active']);
        $this->session->set_userdata('session_vendor_small', $data['is_small']);
    }

    public function getVendorByEmail($param) {
        $this->db->select('*');
        $this->db->from('registration');
        $this->db->where('email', $param);
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

    public function getVendorById($param) {
        $this->db->select('*');
        $this->db->from('registration');
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

    public function getAllVendorsByTow($param) {
        $this->db->select('*');
        $this->db->from('registration');
        $this->db->where('type_of_work_id', $param);
        $this->db->where('delisted', 0);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->order_by("article.article_id");
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllActiveVendors() {
        $this->db->select('*');
        $this->db->from('registration');
        $this->db->where('active', 2);
        $this->db->where('delisted', 0);
        $this->db->group_by('pan');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getVendorManagement() {
        $sql = "SELECT r.id,r.turn_over_of_last_3years,r.`created_at` as submissionDate,r.`company_name`,n.name as natureName,t.name as typeOfWork FROM registration as r
       LEFT JOIN natureofbusiness
       AS n ON n.id = r.nature_of_business_id
       LEFT JOIN typeofwork as t ON t.id = r.type_of_work_id
       WHERE r.isActive=1";
        $query = $this->db->query($sql);
        $res = $query->result();
        return $res;
    }

    public function getStageOne($id) {
        $sql = "SELECT r.id,n.name as natureName,t.name as typeOfWork,r.company_name,r.user_name,r.email,r.contact_number,r.password,r.turn_over_of_last_3years,r.location,r.interested_zones,r.city_name,r.profile,r.clientele,r.address,r.website FROM registration as r LEFT JOIN natureofbusiness AS n ON n.id = r.nature_of_business_id LEFT JOIN typeofwork as t ON t.id = r.type_of_work_id WHERE r.isActive=1 and r.id=$id";
        $query = $this->db->query($sql);
        $res = $query->result();
        return $res;
    }

    public function getStageTwo($id) {
        $sql = " SELECT `company_name`,`type_Of_firm`,`registration_no`,`date_of_incorpartion`,`GST`,`PF_no`,`PAN_no`,`address`,`contact_number`,`fax`,`website`,`contact_person`,`email`,`no_of_years_vendor`,`type_of_work`,`field_chkbox_1`,`details_of_corrent_work`,`field_1`,`field_2_img`,`total_value_of_completed_works`,`type_of_brand_does_vendor_represent`,`sales_service_facilities`,`details_of_manufacturing_facilities`,`HR_own_employees`,`financial_referees`,`field_3_img`,`actual_previous_three_years_data`,`type_of_brand`,`visited_website`,`conformation` FROM `vendor_stage_two_vendor` WHERE isActive=1 and id=$id";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        return $res;
    }

    public function updateParentByKey($param, $data) {
        $this->db->set($data);
        $this->db->where('id', $param);
        $query1 = $this->db->update('registration');
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>