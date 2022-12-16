<?php

class Vendor_model extends CI_Model {

    private $tableName;
    private $secret;
    private $_batchImport;

    function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->table_parent = 'registration';
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
        $this->db->where('delisted', 0);
        $query = $this->db->get($this->table_parent);
        return $query->row();
    }

    public function getAllParent() {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('delisted', 0);
        $this->db->order_by('id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getAllParentByZone($mPan) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        $this->db->where('location', $mPan);
        $this->db->where('delisted', 0);
        $this->db->order_by('id', 'DESC');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getStageOneModel($mSessionKey) {
        $sql = "SELECT r.id,n.name as natureName,r.nature_of_business_id as nid,t.name as typeOfWork,r.company_name,r.user_name,r.email,r.contact_number,r.password,r.turn_over_of_last_3years,r.location,r.interested_zones,r.city_name,r.profile,r.clientele,r.address,r.website,r.pan,r.active,r.stage_one_return_remarks,r.stage_two_return_remarks FROM registration as r LEFT JOIN natureofbusiness AS n ON n.id = r.nature_of_business_id LEFT JOIN typeofwork as t ON t.id = r.type_of_work_id WHERE r.id=$mSessionKey";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        return $res;
    }

    public function getStageTwo($mSessionKey) {
        $sql = " SELECT `company_name`,`type_Of_firm`,`registration_no`,`date_of_incorpartion`,`GST`,`PF_no`,`PAN_no`,`address`,`contact_number`,`fax`,`website`,`contact_person`,`email`,`no_of_years_vendor`,`type_of_work`,`field_chkbox_1`,`details_of_corrent_work`,`field_1`,`field_2_img`,`total_value_of_completed_works`,`type_of_brand_does_vendor_represent`,`sales_service_facilities`,`details_of_manufacturing_facilities`,`HR_own_employees`,`financial_referees`,`field_3_img`,`actual_previous_three_years_data`,`type_of_brand`,qualityAssuranceProgram,iSO9001certification,iSO45001certification,otherCertificatesAwards,industryAcceptedProgram,sitesVisitA,sitesVisitB,sitesVisitC,`conformation` FROM `vendor_stage_two_vendor` WHERE user_id=$mSessionKey";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        return $res;
    }

    public function getStageOneVendorsForAssigned($mSessionZone) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('typeofwork', 'typeofwork.id = registration.type_of_work_id');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('buyer_status', 1);
        $this->db->where('delisted', 0);
        $this->db->order_by('registration.id', 'DESC');
        $mRecords = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $mRecords = $mQuery_Res->result_array();
            $mCurated = array();
            foreach ($mRecords as $key => $mRecord) {
                $mZonesSelected = $mRecord['location'];
                $mZonesTransferredFrom = $mRecord['tranferred_from'];
                $mZonesTransferredTo = $mRecord['tranferred_to'];
                if (($mZonesSelected == $mSessionZone && $mZonesTransferredFrom != $mSessionZone) || $mZonesTransferredTo == $mSessionZone) {
                    $mCurated[] = $mRecord;
                }
            }

            $mVendors = array();
            if (!empty($mCurated)) {
                foreach ($mCurated as $key => $mVendor) {
                    if ($mVendor['nature_of_business_id'] == 2) {
                        $mSiteVisitReport = $this->svr->getConsultantParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->const->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stcon_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    } else if ($mVendor['nature_of_business_id'] == 3) {
                        $mSiteVisitReport = $this->svrc->getParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->cst->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stc_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    } else if ($mVendor['nature_of_business_id'] == 1) {
                        $mSiteVisitReport = $this->svr->getParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->vst->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stv_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    }
                }
            }

            return $mVendors;
        } else {
            return false;
        }
    }

    public function getVendorsByTow($mTow, $mType) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('nature_of_business_id', $mType);
        $this->db->where('type_of_work_id', $mTow);
        $this->db->where('delisted', 0);
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getVendorsByTowForGpl($mTow, $mType, $mZone) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        if ($mTow != "All") {
            $this->db->where('type_of_work_id', $mTow);
        }
        if ($mType != "All") {
            $this->db->where('nature_of_business_id', $mType);
        }
        if ($mZone != "All") {
            $this->db->where('location', $mZone);
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

    public function getTowsByFilter($mTow, $mSearchKey, $mType) {
        $this->db->select('*');
        $this->db->from('typeofwork');
        $this->db->where('natureofbusiness_id', $mType);
        $this->db->like('name', $mSearchKey);
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

    public function getTowsByFilterForGpl($mTow, $mSearchKey, $mType) {
        $this->db->select('*');
        $this->db->from('typeofwork');
        if ($mType != "All") {
            $this->db->where('natureofbusiness_id', $mType);
        }
        $this->db->like('name', $mSearchKey);
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
    
    public function getVendorsData($mType) {
        $this->db->select('*');
        $this->db->from('registration');
        if ($mType) {
            $this->db->where('nature_of_business_id', $mType);
        }
        $this->db->where('active', 2);
        $this->db->where('delisted', 0);
        //$this->db->join('typeofwork', 'typeofwork.id = registration.type_of_work_id');
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function getStageOneVendorsForEoi($mSessionZone, $mTow, $mType) {
        $mCurated = array();
        if ($mTow == 66) {
            //Get All General Tows for Civil
            $mGetTowsByFilter = $this->getTowsByFilter($mTow, "Civil", $mType);

            foreach ($mGetTowsByFilter as $key => $mGetTow) {
                $mVendorByTows = $this->getVendorsByTow($mGetTow['id'], $mType);
                if (!empty($mVendorByTows)) {
                    foreach ($mVendorByTows as $key => $mRecord) {
                        $mZonesSelected = $mRecord['location'];
                        $mInterestedZones = json_decode($mRecord['interested_zones']);
                        //Primary zone vendors
                        if ($mZonesSelected == $mSessionZone) {
                            $mCurated[] = $mRecord;
                        }
                        //Secondary zone vendors
                        if (!empty($mInterestedZones)) {
                            if (in_array($mSessionZone, $mInterestedZones)) {
                                $mCurated[] = $mRecord;
                            }
                        }
                    }
                }
            }
            
        } else if ($mTow == 67) {
            //Get All General Tows for MEP
            $mGetTowsByFilter = $this->getTowsByFilter($mTow, "MEP", $mType);
            foreach ($mGetTowsByFilter as $key => $mGetTow) {
                $mVendorByTows = $this->getVendorsByTow($mGetTow['id'], $mType);
                if (!empty($mVendorByTows)) {
                    foreach ($mVendorByTows as $key => $mRecord) {
                        $mZonesSelected = $mRecord['location'];
                        $mInterestedZones = json_decode($mRecord['interested_zones']);
                        //Primary zone vendors
                        if ($mZonesSelected == $mSessionZone) {
                            $mCurated[] = $mRecord;
                        }
                        //Secondary zone vendors
                        if (!empty($mInterestedZones)) {
                            if (in_array($mSessionZone, $mInterestedZones)) {
                                $mCurated[] = $mRecord;
                            }
                        }
                    }
                }
            }
        } else if ($mTow == 68) {
            //Get All General Tows for Finishing
            $mGetTowsByFilter = $this->getTowsByFilter($mTow, "Finishing", $mType);
            foreach ($mGetTowsByFilter as $key => $mGetTow) {
                $mVendorByTows = $this->getVendorsByTow($mGetTow['id'], $mType);
                if (!empty($mVendorByTows)) {
                    foreach ($mVendorByTows as $key => $mRecord) {
                        $mZonesSelected = $mRecord['location'];
                        $mInterestedZones = json_decode($mRecord['interested_zones']);
                        //Primary zone vendors
                        if ($mZonesSelected == $mSessionZone) {
                            $mCurated[] = $mRecord;
                        }
                        //Secondary zone vendors
                        if (!empty($mInterestedZones)) {
                            if (in_array($mSessionZone, $mInterestedZones)) {
                                $mCurated[] = $mRecord;
                            }
                        }
                    }
                }
            }
        } else {
            $mVendorByTows = $this->getVendorsByTow($mTow, $mType);
            if (!empty($mVendorByTows)) {
                foreach ($mVendorByTows as $key => $mRecord) {
                    $mZonesSelected = $mRecord['location'];
                    $mInterestedZones = json_decode($mRecord['interested_zones']);
                    //Primary zone vendors
                    if ($mZonesSelected == $mSessionZone) {
                        $mCurated[] = $mRecord;
                    }
                    //Secondary zone vendors
                    if (!empty($mInterestedZones)) {
                        if (in_array($mSessionZone, $mInterestedZones)) {
                            $mCurated[] = $mRecord;
                        }
                    }
                }
            }
        }

        $mVendors = array();
        if (!empty($mCurated)) {
            foreach ($mCurated as $key => $mVendor) {
                if ($mVendor['nature_of_business_id'] == 2) {
                    $mSiteVisitReport = $this->svr->getConsultantParentByVendorKey($mVendor['id']);
                    $mStageTwo = $this->const->getParentByVendorKey($mVendor['id']);
                    $mAllDescs = array();
                    if (!empty($mStageTwo)) {
                        $mGetSelectedTowsIds = json_decode($mStageTwo['stcon_tow']);
                        foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                            $mAllDescs[] = $mGetTowDesc['name'];
                        }
                        $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                    } else {
                        $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                        $mAllDescs[] = $mGetTowDesc['name'];
                        $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                    }
                    if (!empty($mSiteVisitReport)) {
                        $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                    } else {
                        $mVendors[] = $mVendor;
                    }
                } else if ($mVendor['nature_of_business_id'] == 3) {
                    $mSiteVisitReport = $this->svrc->getParentByVendorKey($mVendor['id']);
                    $mStageTwo = $this->cst->getParentByVendorKey($mVendor['id']);
                    $mAllDescs = array();
                    if (!empty($mStageTwo)) {
                        $mGetSelectedTowsIds = json_decode($mStageTwo['stc_tow']);
                        foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                            $mAllDescs[] = $mGetTowDesc['name'];
                        }
                        $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                    } else {
                        $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                        $mAllDescs[] = $mGetTowDesc['name'];
                        $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                    }
                    if (!empty($mSiteVisitReport)) {
                        $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                    } else {
                        $mVendors[] = $mVendor;
                    }
                } else if ($mVendor['nature_of_business_id'] == 1) {
                    $mSiteVisitReport = $this->svr->getParentByVendorKey($mVendor['id']);
                    $mStageTwo = $this->vst->getParentByVendorKey($mVendor['id']);
                    $mAllDescs = array();
                    if (!empty($mStageTwo)) {
                        $mGetSelectedTowsIds = json_decode($mStageTwo['stv_tow']);
                        foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                            $mAllDescs[] = $mGetTowDesc['name'];
                        }
                        $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                    } else {
                        $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                        $mAllDescs[] = $mGetTowDesc['name'];
                        $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                    }
                    if (!empty($mSiteVisitReport)) {
                        $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                    } else {
                        $mVendors[] = $mVendor;
                    }
                }
            }
        }

        return $mVendors;
    }

    public function getStageOneVendorsForGpl($mSessionZone, $mTow, $mType) {
        $mCurated = array();
        if ($mTow == 66) {
            //Get All General Tows for Civil
            $mGetTowsByFilter = $this->getTowsByFilterForGpl($mTow, "Civil", $mType);
            foreach ($mGetTowsByFilter as $key => $mGetTow) {
                $mVendorByTows = $this->getVendorsByTowForGpl($mGetTow['id'], $mType, $mSessionZone);
                if (!empty($mVendorByTows)) {
                    foreach ($mVendorByTows as $key => $mRecord) {
                        $mCurated[] = $mRecord;
                    }
                }
            }
        } else if ($mTow == 67) {
            //Get All General Tows for MEP
            $mGetTowsByFilter = $this->getTowsByFilterForGpl($mTow, "MEP", $mType);
            foreach ($mGetTowsByFilter as $key => $mGetTow) {
                $mVendorByTows = $this->getVendorsByTowForGpl($mGetTow['id'], $mType, $mSessionZone);
                if (!empty($mVendorByTows)) {
                    foreach ($mVendorByTows as $key => $mRecord) {
                        $mCurated[] = $mRecord;
                    }
                }
            }
        } else if ($mTow == 68) {
            //Get All General Tows for Finishing
            $mGetTowsByFilter = $this->getTowsByFilterForGpl($mTow, "Finishing", $mType);
            foreach ($mGetTowsByFilter as $key => $mGetTow) {
                $mVendorByTows = $this->getVendorsByTowForGpl($mGetTow['id'], $mType, $mSessionZone);
                if (!empty($mVendorByTows)) {
                    foreach ($mVendorByTows as $key => $mRecord) {
                        $mCurated[] = $mRecord;
                    }
                }
            }
        } else {
            $mVendorByTows = $this->getVendorsByTowForGpl($mTow, $mType, $mSessionZone);
            if (!empty($mVendorByTows)) {
                foreach ($mVendorByTows as $key => $mRecord) {
                    $mCurated[] = $mRecord;
                }
            }
        }

        $mVendors = array();
        if (!empty($mCurated)) {
            foreach ($mCurated as $key => $mVendor) {
                if ($mVendor['nature_of_business_id'] == 2) {
                    $mSiteVisitReport = $this->svr->getConsultantParentByVendorKey($mVendor['id']);
                    $mStageTwo = $this->const->getParentByVendorKey($mVendor['id']);
                    $mAllDescs = array();
                    if (!empty($mStageTwo)) {
                        $mGetSelectedTowsIds = json_decode($mStageTwo['stcon_tow']);
                        foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                            $mAllDescs[] = $mGetTowDesc['name'];
                        }
                        $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                    } else {
                        $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                        $mAllDescs[] = $mGetTowDesc['name'];
                        $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                    }
                    if (!empty($mSiteVisitReport)) {
                        $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                    } else {
                        $mVendors[] = $mVendor;
                    }
                } else if ($mVendor['nature_of_business_id'] == 3) {
                    $mSiteVisitReport = $this->svrc->getParentByVendorKey($mVendor['id']);
                    $mStageTwo = $this->cst->getParentByVendorKey($mVendor['id']);
                    $mAllDescs = array();
                    if (!empty($mStageTwo)) {
                        $mGetSelectedTowsIds = json_decode($mStageTwo['stc_tow']);
                        foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                            $mAllDescs[] = $mGetTowDesc['name'];
                        }
                        $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                    } else {
                        $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                        $mAllDescs[] = $mGetTowDesc['name'];
                        $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                    }
                    if (!empty($mSiteVisitReport)) {
                        $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                    } else {
                        $mVendors[] = $mVendor;
                    }
                } else if ($mVendor['nature_of_business_id'] == 1) {
                    $mSiteVisitReport = $this->svr->getParentByVendorKey($mVendor['id']);
                    $mStageTwo = $this->vst->getParentByVendorKey($mVendor['id']);
                    $mAllDescs = array();
                    if (!empty($mStageTwo)) {
                        $mGetSelectedTowsIds = json_decode($mStageTwo['stv_tow']);
                        foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                            $mAllDescs[] = $mGetTowDesc['name'];
                        }
                        $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                    } else {
                        $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                        $mAllDescs[] = $mGetTowDesc['name'];
                        $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                    }
                    if (!empty($mSiteVisitReport)) {
                        $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                    } else {
                        $mVendors[] = $mVendor;
                    }
                }
            }
        }

        return $mVendors;
    }

    public function getStageOneVendorsForAssignedForMain($mSessionZone) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('typeofwork', 'typeofwork.id = registration.type_of_work_id');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('buyer_status', 1);
        $this->db->where('delisted', 0);
        $this->db->order_by('registration.id', 'DESC');
        $mRecords = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $mRecords = $mQuery_Res->result_array();
            $mCurated = array();
            foreach ($mRecords as $key => $mRecord) {
                $mCheckInPre = $this->pre_model->check($mRecord['pan']);
                if (empty($mCheckInPre)) {
                    $mZonesSelected = $mRecord['location'];
                    if ($mZonesSelected == $mSessionZone) {
                        $mCurated[] = $mRecord;
                    }
                } else {
                    if ($mCheckInPre->pre_pq_score) {
                        $mCurated[] = $mRecord;
                    }
                }
            }

            $mVendors = array();
            if (!empty($mCurated)) {
                foreach ($mCurated as $key => $mVendor) {
                    if ($mVendor['nature_of_business_id'] == 2) {
                        $mSiteVisitReport = $this->svr->getConsultantParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->const->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stcon_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    } else if ($mVendor['nature_of_business_id'] == 3) {
                        $mSiteVisitReport = $this->svrc->getParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->cst->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stc_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    } else if ($mVendor['nature_of_business_id'] == 1) {
                        $mSiteVisitReport = $this->svr->getParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->vst->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stv_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    }
                }
            }

            return $mVendors;
        } else {
            return false;
        }
    }

    public function getAllTransferredVendors() {
        $mSessionKey = $this->session->userdata('session_id');
        $this->db->select('*');
        $this->db->from('registration');
        $this->db->where('tranferred_to', $mSessionKey);
        $this->db->where('delisted', 0);
        $mRecords = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $mRecords = $mQuery_Res->result_array();
            $mCurated = array();
            foreach ($mRecords as $key => $mRecord) {
                $mCheckInPre = $this->pre_model->check($mRecord['pan']);
                if (empty($mCheckInPre)) {
                    $mCurated[] = $mRecord;
                } else {
                    if ($mCheckInPre->pre_pq_score) {
                        $mCurated[] = $mRecord;
                    }
                }
            }

            $mVendors = array();
            if (!empty($mCurated)) {
                foreach ($mCurated as $key => $mVendor) {
                    if ($mVendor['nature_of_business_id'] == 2) {
                        $mSiteVisitReport = $this->svr->getConsultantParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->const->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stcon_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    } else if ($mVendor['nature_of_business_id'] == 3) {
                        $mSiteVisitReport = $this->svrc->getParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->cst->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stc_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    } else if ($mVendor['nature_of_business_id'] == 1) {
                        $mSiteVisitReport = $this->svr->getParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->vst->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stv_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    }
                }
            }

            return $mVendors;
        } else {
            return false;
        }
    }

    public function getStageOneVendorsForAssignedPending($mSessionZone) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('typeofwork', 'typeofwork.id = registration.type_of_work_id');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        $this->db->or_where('active', 1);
        $this->db->or_where('active', 0);
        $this->db->where('delisted', 0);
        $this->db->order_by('registration.id', 'DESC');
        $mRecords = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $mRecords = $mQuery_Res->result_array();
            $mCurated = array();
            foreach ($mRecords as $key => $mRecord) {
                $mCheckInPre = $this->pre_model->check($mRecord['pan']);
                if (empty($mCheckInPre)) {
                    $mZonesSelected = $mRecord['location'];
                    $mZonesTransferredFrom = $mRecord['tranferred_from'];
                    $mZonesTransferredTo = $mRecord['tranferred_to'];
                    if (($mZonesSelected == $mSessionZone && $mZonesTransferredFrom != $mSessionZone) || $mZonesTransferredTo == $mSessionZone) {
                        $mCurated[] = $mRecord;
                    }
                }
            }

            $mVendors = array();
            if (!empty($mCurated)) {
                foreach ($mCurated as $key => $mVendor) {
                    if ($mVendor['nature_of_business_id'] == 2) {
                        $mSiteVisitReport = $this->svr->getConsultantParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->const->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stcon_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    } else if ($mVendor['nature_of_business_id'] == 3) {
                        $mSiteVisitReport = $this->svrc->getParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->cst->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stc_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    } else if ($mVendor['nature_of_business_id'] == 1) {
                        $mSiteVisitReport = $this->svr->getParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->vst->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stv_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    }
                }
            }



            return $mVendors;
        } else {
            return false;
        }
    }

    public function getStageOneVendorsForAssignedByZoneAndProject($mSessionZone = null, $mNab, $mTow) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('typeofwork', 'typeofwork.id = registration.type_of_work_id');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        $this->db->where('type_of_work_id', $mTow);
        $this->db->where('nature_of_business_id', $mNab);
        $this->db->where('delisted', 0);
        $this->db->order_by('registration.id', 'DESC');
        $mRecords = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $mRecords = $mQuery_Res->result_array();
            $mCurated = array();
            foreach ($mRecords as $key => $mRecord) {
                $mZonesSelected = $mRecord['location'];
                $mZonesTransferredFrom = $mRecord['tranferred_from'];
                $mZonesTransferredTo = $mRecord['tranferred_to'];
                if (($mZonesSelected == $mSessionZone && $mZonesTransferredFrom != $mSessionZone) || $mZonesTransferredTo == $mSessionZone) {
                    $mCurated[] = $mRecord;
                }
            }

            $mVendors = array();
            if (!empty($mCurated)) {
                foreach ($mCurated as $key => $mVendor) {
                    if ($mVendor['nature_of_business_id'] == 2) {
                        $mSiteVisitReport = $this->svr->getConsultantParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->const->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stcon_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    } else if ($mVendor['nature_of_business_id'] == 3) {
                        $mSiteVisitReport = $this->svrc->getParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->cst->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stc_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    } else if ($mVendor['nature_of_business_id'] == 1) {
                        $mSiteVisitReport = $this->svr->getParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->vst->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stv_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    }
                }
            }

            return $mVendors;
        } else {
            return false;
        }
    }

    public function getStageOneVendorsForAssignedByZoneAndProjectForGplVendorData($mSessionZone = null, $mNab, $mTow) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('typeofwork', 'typeofwork.id = registration.type_of_work_id');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        if ($mTow != "All") {
            $this->db->where('type_of_work_id', $mTow);
        }
        if ($mNab != "All") {
            $this->db->where('nature_of_business_id', $mNab);
        }
        if ($mSessionZone != "All") {
            $this->db->where('location', $mSessionZone);
        }
        $this->db->where('delisted', 0);
        $this->db->order_by('registration.id', 'DESC');
        $mRecords = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $mRecords = $mQuery_Res->result_array();
            $mVendors = array();
            if (!empty($mRecords)) {
                foreach ($mRecords as $key => $mVendor) {
                    if ($mVendor['nature_of_business_id'] == 2) {
                        $mSiteVisitReport = $this->svr->getConsultantParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->const->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stcon_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    } else if ($mVendor['nature_of_business_id'] == 3) {
                        $mSiteVisitReport = $this->svrc->getParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->cst->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stc_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    } else if ($mVendor['nature_of_business_id'] == 1) {
                        $mSiteVisitReport = $this->svr->getParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->vst->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stv_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    }
                }
            }

            return $mVendors;
        } else {
            return false;
        }
    }

    public function getStageOneVendorsForAssignedByZoneAndProjectForProcess($mSessionZone = null, $mNab, $mTow) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('typeofwork', 'typeofwork.id = registration.type_of_work_id');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        if ($mTow != "All") {
            $this->db->where('type_of_work_id', $mTow);
        }
        if ($mNab != "All") {
            $this->db->where('nature_of_business_id', $mNab);
        }
        $this->db->where('delisted', 0);
        $this->db->order_by('registration.id', 'DESC');
        $mRecords = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $mRecords = $mQuery_Res->result_array();
            $mCurated = array();
            foreach ($mRecords as $key => $mRecord) {
                $mZonesSelected = $mRecord['location'];
                $mZonesTransferredFrom = $mRecord['tranferred_from'];
                $mZonesTransferredTo = $mRecord['tranferred_to'];
                if (($mZonesSelected == $mSessionZone && $mZonesTransferredFrom != $mSessionZone) || $mZonesTransferredTo == $mSessionZone) {
                    $mCurated[] = $mRecord;
                }
            }

            $mVendors = array();
            if (!empty($mCurated)) {
                foreach ($mCurated as $key => $mVendor) {
                    if ($mVendor['nature_of_business_id'] == 2) {
                        $mSiteVisitReport = $this->svr->getConsultantParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->const->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stcon_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    } else if ($mVendor['nature_of_business_id'] == 3) {
                        $mSiteVisitReport = $this->svrc->getParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->cst->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stc_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    } else if ($mVendor['nature_of_business_id'] == 1) {
                        $mSiteVisitReport = $this->svr->getParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->vst->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stv_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    }
                }
            }

            return $mVendors;
        } else {
            return false;
        }
    }

    public function getStageOneVendors($mSessionZone) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->join('typeofwork', 'typeofwork.id = registration.type_of_work_id');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('buyer_status', 1);
        $this->db->where('delisted', 0);
        $this->db->order_by('registration.id', 'DESC');
        $mRecords = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $mRecords = $mQuery_Res->result_array();
            $mCurated = array();
            foreach ($mRecords as $key => $mRecord) {
                $mZonesSelected = $mRecord['location'];
                $mZonesTransferredFrom = $mRecord['tranferred_from'];
                $mZonesTransferredTo = $mRecord['tranferred_to'];
                if (($mZonesSelected == $mSessionZone && $mZonesTransferredFrom != $mSessionZone) || $mZonesTransferredTo == $mSessionZone) {
                    $mCurated[] = $mRecord;
                }
            }
            return $mCurated;
        } else {
            return false;
        }
    }

    public function getStageOneVendorsTransferred($mSessionZone, $mSessionKey) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('categories', 'categories.category_key = article.category_key');
        //$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
        //$this->db->where('buyer_status', 1);
        $this->db->where('delisted', 0);
        $this->db->order_by('id', 'DESC');
        $mRecords = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $mRecords = $mQuery_Res->result_array();
            $mCurated = array();
            foreach ($mRecords as $key => $mRecord) {
                $mZonesSelected = $mRecord['location'];
                $mZonesTransferred = $mRecord['tranferred_to'];
                if ($mSessionZone == $mZonesSelected && ($mZonesTransferred != "" || $mZonesTransferred != null)) {
                    $mCurated[] = $mRecord;
                }
            }
            $mVendors = array();
            if (!empty($mCurated)) {
                foreach ($mCurated as $key => $mVendor) {
                    if ($mVendor['nature_of_business_id'] == 2) {
                        $mSiteVisitReport = $this->svr->getConsultantParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->const->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stcon_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    } else if ($mVendor['nature_of_business_id'] == 3) {
                        $mSiteVisitReport = $this->svrc->getParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->cst->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stc_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    } else if ($mVendor['nature_of_business_id'] == 1) {
                        $mSiteVisitReport = $this->svr->getParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->vst->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stv_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    }
                }
            }

            return $mVendors;
        } else {
            return false;
        }
    }

    public function getVendorsForSiteVisitReport($mBuyerId) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        //$this->db->join('vendor_site_visit_report', 'vendor_site_visit_report.svr_vendor_id = registration.id', 'LEFT');
        $this->db->where('pr', $mBuyerId);
        $this->db->where('delisted', 0);
        $this->db->order_by('id', 'DESC');
        $mRecords = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $mRecords = $mQuery_Res->result_array();
            $mVendors = array();
            if (!empty($mRecords)) {
                foreach ($mRecords as $key => $mVendor) {
                    if ($mVendor['nature_of_business_id'] == 2) {
                        $mSiteVisitReport = $this->svr->getConsultantParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->const->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stcon_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    } else if ($mVendor['nature_of_business_id'] == 3) {
                        $mSiteVisitReport = $this->svrc->getParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->cst->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stc_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    } else if ($mVendor['nature_of_business_id'] == 1) {
                        $mSiteVisitReport = $this->svr->getParentByVendorKey($mVendor['id']);
                        $mStageTwo = $this->vst->getParentByVendorKey($mVendor['id']);
                        $mAllDescs = array();
                        if (!empty($mStageTwo)) {
                            $mGetSelectedTowsIds = json_decode($mStageTwo['stv_tow']);
                            foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                $mAllDescs[] = $mGetTowDesc['name'];
                            }
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                        } else {
                            $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                            $mAllDescs[] = $mGetTowDesc['name'];
                            $mVendor = array_merge($mVendor, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                        }
                        if (!empty($mSiteVisitReport)) {
                            $mVendors[] = array_merge($mVendor, $mSiteVisitReport);
                        } else {
                            $mVendors[] = $mVendor;
                        }
                    }
                }
            }

            return $mVendors;
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
        $this->db->where('registration.id', $param);
        //$this->db->join('typeofwork', 'typeofwork.id = registration.type_of_work_id');
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

    public function getParentStageTwoByKey($param) {
        $this->db->select('*');
        $this->db->from('vendor_stage_two_vendor');
        $this->db->where('user_id', $param);
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
        $this->db->where('id', $param);
        $query1 = $this->db->update($this->table_parent);
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deleteParentByKey($param) {
        $this->db->where('id', $param);
        $mDelete = $this->db->delete($this->table_parent);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>