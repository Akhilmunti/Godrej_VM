<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('buyer_model');
        $this->load->model('vendor_model', 'vendor');
        $this->load->model('buyer_model', 'buyer');
        $this->load->model('svr_model', 'svr');
        $this->load->model('svrc_model', 'svrc');
        $this->load->model('pqv_model', 'pqv');
        $this->load->model('pqc_model', 'pqc');
        $this->load->model('vendor_stage_two_model', 'vst');
        $this->load->model('contractor_stage_two_model', 'cst');
        $this->load->model('consultant_stage_two_model', 'const');
        $this->load->model('feedback_model', 'feedback');
        $this->load->model('feedbackform_model', 'feedbackforms');
        $this->load->model('register');
        $this->load->model('projects_model', 'projects');
        $this->load->model('packages_model', 'packages');
        $this->load->model('eoi_model', 'eoi');
        $this->load->model('eoipro_model', 'eoi_pro');
        $this->load->model('eoi_vendors_model', 'ev');
        $this->load->model('bidcapacity_model', 'bc');
        $this->load->model('shortlisting_model', 'short');
        $this->load->model('shortlistingpro_model', 'shortpro');
        $this->load->model('delisting_model', 'delisting');
        $this->load->model('bri_model', 'bri');
        $this->load->model('fii_model', 'fii');
        $this->load->model('vendorlog_model', 'vendorlog');
        $this->load->model('pre_model');
        $this->load->model('purchase_model');
        $this->load->model('Award_recomm_contract_model', 'awardRecommContract');
        $this->load->model('Award_procurement_model', 'awardRecommProcurement');
        $this->load->model('iom_model', 'iom');
        date_default_timezone_set("Asia/Kolkata");
        $this->load->helper('date');
        error_reporting(0);
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
    }

    public function index() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionPm = $this->session->userdata('session_pm');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $mFilterBy = $this->input->post('filter');
            $data['home'] = "vendor";
            $mVendors = $this->vendor->getStageOneVendorsForAssignedForMain($mSessionZone);
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $mUsers = $this->buyer->getAllParentForTransfer();

            $mCumulated = array();
            foreach ($mUsers as $key => $value) {
                if ($value['buyer_zone'] == $mSessionZone) {
                    $mCumulated[] = $value;
                }
            }

            $data['mUsers'] = $mCumulated;
            if ($mFilterBy == "All" || $mFilterBy == "" || $mFilterBy == null) {
                $data['mRecords'] = $mVendors;
                $data['selectedfilter'] = "All";
                $this->load->view('buyer/manage_vendor', $data);
            } else {
                $mCurated = array();
                if ($mFilterBy == "1") {
                    $mCountPending = 0;
                    foreach ($mVendors as $key => $mRecord) {
                        $mTows = json_decode($mRecord['consolidated_tows']);
                        $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                        foreach ($mTows as $key => $value) {
                            if ($mRecord['nature_of_business_id'] == 1) {
                                $mStageTwo = $this->vst->getParentByVendorKey($mRecord['id']);
                                $mPqScore = $this->pqv->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                if (empty($mPqScore) && !empty($mStageTwo)) {
                                    $mCountPending++;
                                }
                            } else if ($mRecord['nature_of_business_id'] == 3) {
                                $mStageTwo = $this->cst->getParentByVendorKey($mRecord['id']);
                                $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                if (empty($mPqScore) && !empty($mStageTwo)) {
                                    $mCountPending++;
                                }
                            }
                        }
                        if ($mCountPending > 0) {
                            $mCurated[] = $mRecord;
                        }
                    }
                } else if ($mFilterBy == "2") {
                    foreach ($mVendors as $key => $mRecord) {
                        if ($mRecord['active'] == 0) {
                            $mCurated[] = $mRecord;
                        }
                    }
                } else if ($mFilterBy == "3") {
                    foreach ($mVendors as $key => $mRecord) {
                        if ($mRecord['active'] == 1) {
                            $mCurated[] = $mRecord;
                        }
                    }
                }
                $data['mRecords'] = $mCurated;
                $data['selectedfilter'] = $mFilterBy;
                $this->load->view('buyer/manage_vendor', $data);
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function filterZonalDashboard($mSessionZone) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionRole = $this->session->userdata('session_role');
        if ($mSessionKey) {
            $data['home'] = "home";
            $data['tovs'] = $this->register->getVendor();
            $mZone = $this->input->post('zone');
            $mProject = $this->input->post('project');
            $mVendors = $this->vendor->getStageOneVendorsForAssigned($mZone);
            $mApprovedPqCount = 0;
            $mPendingPqCount = 0;
            $mPendingSvrCount = 0;
            $data['svrs'] = $this->vendor->getVendorsForSiteVisitReport($mSessionKey);
            foreach ($data['svrs'] as $key => $mRecord) {
                $mTows = json_decode($mRecord['consolidated_tows']);
                $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                foreach ($mTows as $key => $value) {
                    if ($mRecord['nature_of_business_id'] == 2) {
                        $mSiteReport = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                        $mSiteReportAdded = strtotime($mSiteReport['stcon_date_added']);
                        $mSiteReportAdded = date("d-m-Y H:i:s", $mSiteReportAdded);
                    } else if ($mRecord['nature_of_business_id'] == 3) {
                        $mSiteReport = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                        $mSiteReportAdded = strtotime($mSiteReport['svrc_date_updated']);
                        $mSiteReportAdded = date("d-m-Y H:i:s", $mSiteReportAdded);
                    } else if ($mRecord['nature_of_business_id'] == 1) {
                        $mSiteReport = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                        $mSiteReportAdded = strtotime($mSiteReport['svr_date_updated']);
                        $mSiteReportAdded = date("d-m-Y H:i:s", $mSiteReportAdded);
                    }
                }

                if ($mRecord['nature_of_business_id'] == 1) {
                    if (empty($mSiteReport)) {
                        $mPendingSvrCount++;
                    }
                } else if ($mRecord['nature_of_business_id'] == 2) {
                    if (empty($mSiteReport)) {
                        $mPendingSvrCount++;
                    }
                } else if ($mRecord['nature_of_business_id'] == 3) {
                    if (empty($mSiteReport)) {
                        $mPendingSvrCount++;
                    }
                }
            }
            if (!empty($mVendors)) {
                foreach ($mVendors as $key => $mRecord) {
                    if ($mRecord['is_small'] == 1) {
                        $mTows = json_decode($mRecord['consolidated_tows']);
                        $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                        $mRecordCheck = 0;
                        foreach ($mTows as $key => $value) {
                            if ($mRecord['nature_of_business_id'] == 1) {
                                $mPqScore = $this->pqv->getParentByVendorKey($mRecord['id']);
                                if (!empty($mPqScore)) {
                                    $mRecordCheck++;
                                }
                                $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                                $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                            } else if ($mRecord['nature_of_business_id'] == 3) {
                                $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                                $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                if (!empty($mPqScore)) {
                                    $mRecordCheck++;
                                }
                            } else if ($mRecord['nature_of_business_id'] == 2) {
                                $mPqScore = array();
                            }
                        }

                        if ($mRecordCheck > 0) {
                            $mApprovedPqCount++;
                        } else {
                            $mPendingPqCount++;
                        }
                    } else {

                        $mTows = json_decode($mRecord['consolidated_tows']);
                        $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                        foreach ($mTows as $key => $value) {
                            if ($mRecord['nature_of_business_id'] == 1) {
                                $mPqScore = $this->pqv->getParentByVendorKey($mRecord['id']);
                                $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                                $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                            } else if ($mRecord['nature_of_business_id'] == 3) {
                                $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                                $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                            } else if ($mRecord['nature_of_business_id'] == 2) {
                                $mPqScore = array();
                            }
                        }

                        if (!empty($mPqScore)) {
                            $mApprovedPqCount++;
                        } else {
                            $mPendingPqCount++;
                        }
                    }
                }
            }
            $data['vendors'] = $mVendors;
            $data['pendingpq'] = $mPendingPqCount;
            $data['pendingsvr'] = $mPendingSvrCount;
            $data['projects'] = $this->projects->getAllParentByZone($mZone);
            $data['zone'] = $mZone;
            if ($mProject == "All") {
                $data['project'] = $mProject;
            } else {
                $data['project'] = $this->projects->getParentByKey($mProject);
            }
            //$data['projects'] = $this->projects->getAllParentByZoneAndUser($mSessionZone);
            $data['getVendor'] = $this->register->getVendor();
            $data['actions'] = $this->eoi->getAllParentByZone($mSessionZone);
            $this->load->view('buyer/index_zonal_read', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function zonalDashboard($mSessionZone) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionRole = "Zonal CEO";
        if ($mSessionKey) {
            $data['home'] = "home";
            $data['iomdata'] = $this->getIomDashboardData($mSessionZone, "");
            $data['tovs'] = $this->register->getVendor();
            $mVendors = $this->vendor->getStageOneVendorsForAssigned($mSessionZone);
            $mApprovedPqCount = 0;
            $mPendingPqCount = 0;
            $mPendingSvrCount = 0;
            $data['svrs'] = $this->vendor->getVendorsForSiteVisitReport($mSessionKey);
            foreach ($data['svrs'] as $key => $mRecord) {
                $mTows = json_decode($mRecord['consolidated_tows']);
                $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                foreach ($mTows as $key => $value) {
                    if ($mRecord['nature_of_business_id'] == 2) {
                        $mSiteReport = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                        $mSiteReportAdded = strtotime($mSiteReport['stcon_date_added']);
                        $mSiteReportAdded = date("d-m-Y H:i:s", $mSiteReportAdded);
                    } else if ($mRecord['nature_of_business_id'] == 3) {
                        $mSiteReport = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                        $mSiteReportAdded = strtotime($mSiteReport['svrc_date_updated']);
                        $mSiteReportAdded = date("d-m-Y H:i:s", $mSiteReportAdded);
                    } else if ($mRecord['nature_of_business_id'] == 1) {
                        $mSiteReport = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                        $mSiteReportAdded = strtotime($mSiteReport['svr_date_updated']);
                        $mSiteReportAdded = date("d-m-Y H:i:s", $mSiteReportAdded);
                    }
                }

                if ($mRecord['nature_of_business_id'] == 1) {
                    if (empty($mSiteReport)) {
                        $mPendingSvrCount++;
                    }
                } else if ($mRecord['nature_of_business_id'] == 2) {
                    if (empty($mSiteReport)) {
                        $mPendingSvrCount++;
                    }
                } else if ($mRecord['nature_of_business_id'] == 3) {
                    if (empty($mSiteReport)) {
                        $mPendingSvrCount++;
                    }
                }
            }
            if (!empty($mVendors)) {
                foreach ($mVendors as $key => $mRecord) {
                    if ($mRecord['is_small'] == 1) {
                        $mTows = json_decode($mRecord['consolidated_tows']);
                        $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                        $mRecordCheck = 0;
                        foreach ($mTows as $key => $value) {
                            if ($mRecord['nature_of_business_id'] == 1) {
                                $mPqScore = $this->pqv->getParentByVendorKey($mRecord['id']);
                                if (!empty($mPqScore)) {
                                    $mRecordCheck++;
                                }
                                $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                                $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                            } else if ($mRecord['nature_of_business_id'] == 3) {
                                $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                                $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                if (!empty($mPqScore)) {
                                    $mRecordCheck++;
                                }
                            } else if ($mRecord['nature_of_business_id'] == 2) {
                                $mPqScore = array();
                            }
                        }

                        if ($mRecordCheck > 0) {
                            $mApprovedPqCount++;
                        } else {
                            $mPendingPqCount++;
                        }
                    } else {

                        $mTows = json_decode($mRecord['consolidated_tows']);
                        $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                        foreach ($mTows as $key => $value) {
                            if ($mRecord['nature_of_business_id'] == 1) {
                                $mPqScore = $this->pqv->getParentByVendorKey($mRecord['id']);
                                $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                                $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                            } else if ($mRecord['nature_of_business_id'] == 3) {
                                $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                                $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                            } else if ($mRecord['nature_of_business_id'] == 2) {
                                $mPqScore = array();
                            }
                        }

                        if (!empty($mPqScore)) {
                            $mApprovedPqCount++;
                        } else {
                            $mPendingPqCount++;
                        }
                    }
                }
            }

            $data['vendors'] = $mVendors;
            $data['pendingpq'] = $mPendingPqCount;
            $data['pendingsvr'] = $mPendingSvrCount;
            $data['projects'] = $this->projects->getAllParentByZone($mSessionZone);
            $data['zone'] = $mSessionZone;
            //$data['projects'] = $this->projects->getAllParentByZoneAndUser($mSessionZone);
            $data['getVendor'] = $this->register->getVendor();
            $data['actions'] = $this->eoi->getAllParentByZone($mSessionZone);
            $data['project'] = "All";
            $this->load->view('buyer/index_zonal_read', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function dashboard() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        $mSessionRole = $this->session->userdata('session_role');
                
        if ($mSessionKey) {
            $data['home'] = "home";
            $data['tovs'] = $this->register->getVendor();
            $mVendors = $this->vendor->getStageOneVendorsForAssigned($mSessionZone);
            $mApprovedPqCount = 0;
            $mPendingPqCount = 0;
            $mPendingSvrCount = 0;
            $data['svrs'] = $this->vendor->getVendorsForSiteVisitReport($mSessionKey);
            foreach ($data['svrs'] as $key => $mRecord) {
                $mTows = json_decode($mRecord['consolidated_tows']);
                $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                foreach ($mTows as $key => $value) {
                    if ($mRecord['nature_of_business_id'] == 2) {
                        $mSiteReport = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                        $mSiteReportAdded = strtotime($mSiteReport['stcon_date_added']);
                        $mSiteReportAdded = date("d-m-Y H:i:s", $mSiteReportAdded);
                    } else if ($mRecord['nature_of_business_id'] == 3) {
                        $mSiteReport = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                        $mSiteReportAdded = strtotime($mSiteReport['svrc_date_updated']);
                        $mSiteReportAdded = date("d-m-Y H:i:s", $mSiteReportAdded);
                    } else if ($mRecord['nature_of_business_id'] == 1) {
                        $mSiteReport = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                        $mSiteReportAdded = strtotime($mSiteReport['svr_date_updated']);
                        $mSiteReportAdded = date("d-m-Y H:i:s", $mSiteReportAdded);
                    }
                }

                if ($mRecord['nature_of_business_id'] == 1) {
                    if (empty($mSiteReport)) {
                        $mPendingSvrCount++;
                    }
                } else if ($mRecord['nature_of_business_id'] == 2) {
                    if (empty($mSiteReport)) {
                        $mPendingSvrCount++;
                    }
                } else if ($mRecord['nature_of_business_id'] == 3) {
                    if (empty($mSiteReport)) {
                        $mPendingSvrCount++;
                    }
                }
            }
            if (!empty($mVendors)) {
                foreach ($mVendors as $key => $mRecord) {
                    if ($mRecord['is_small'] == 1) {
                        $mTows = json_decode($mRecord['consolidated_tows']);
                        $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                        $mRecordCheck = 0;
                        foreach ($mTows as $key => $value) {
                            if ($mRecord['nature_of_business_id'] == 1) {
                                $mPqScore = $this->pqv->getParentByVendorKey($mRecord['id']);
                                if (!empty($mPqScore)) {
                                    $mRecordCheck++;
                                }
                                $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                                $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                            } else if ($mRecord['nature_of_business_id'] == 3) {
                                $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                                $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                if (!empty($mPqScore)) {
                                    $mRecordCheck++;
                                }
                            } else if ($mRecord['nature_of_business_id'] == 2) {
                                $mPqScore = array();
                            }
                        }

                        if ($mRecordCheck > 0) {
                            $mApprovedPqCount++;
                        } else {
                            $mPendingPqCount++;
                        }
                    } else {

                        $mTows = json_decode($mRecord['consolidated_tows']);
                        $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                        foreach ($mTows as $key => $value) {
                            if ($mRecord['nature_of_business_id'] == 1) {
                                $mPqScore = $this->pqv->getParentByVendorKey($mRecord['id']);
                                $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                                $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                            } else if ($mRecord['nature_of_business_id'] == 3) {
                                $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                                $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                            } else if ($mRecord['nature_of_business_id'] == 2) {
                                $mPqScore = array();
                            }
                        }

                        if (!empty($mPqScore)) {
                            $mApprovedPqCount++;
                        } else {
                            $mPendingPqCount++;
                        }
                    }
                }
            }
            $data['vendors'] = $mVendors;
            $data['pendingpq'] = $mPendingPqCount;
            $data['pendingsvr'] = $mPendingSvrCount;
            $data['projects'] = $this->projects->getAllParentByZone($mSessionZone);
            $data['zone'] = $mSessionZone;
            $data['short_count'] = $this->shortlistingPendingCount();
            
//$data['actions'] = $this->eoi->getAllParentForShortlisting($project, $zone);
            if ($mSessionRole == "COO" || $mSessionRole == "Managing Director" || $mSessionRole == "Head of Contracts & Procurement" || $mSessionRole == "HO - C&P" || $mSessionRole == "HO Operations") {
                $data['getVendors'] = $this->register->getAllActiveVendors();
                $data['getVendorsThisYear'] = $this->register->getAllActiveVendorsThisYear();
                $data['iomdata'] = $this->getIomDashboardData($mSessionZone, "");
                $awdType = "Contract";
                $pending_iom_arr = $this->awardRecommContract->getContractData($awdType,'','','Pending','');
                if(is_array($pending_iom_arr))
                    $pending_iom_count = sizeof($pending_iom_arr);
                else
                    $pending_iom_count = 0;
                
                $awdType = "Procurement";
               
                $pending_proc_iom_arr = $this->awardRecommProcurement->getProcurementData($awdType,'','','Pending','');
                
                if(is_array($pending_proc_iom_arr))
                    $pending_proc_iom_count = sizeof($pending_proc_iom_arr);
                else
                    $pending_proc_iom_count = 0;
                $data['pending_sum_count']=  $pending_iom_count+$pending_proc_iom_count;
                $this->load->view('buyer/index', $data);
            } else if ($mSessionRole == "Project Manager") {
                $data['projects'] = $this->projects->getAllParentByZoneAndUser($mSessionZone);
                $mFeedbackArray = array();
                $mFeedbacks = $this->feedback->getParentByPmId($mSessionKey);
                foreach ($mFeedbacks as $key => $record) {
                    $mFormRecord = $this->feedbackforms->getParentByTypeAndFeedbackId($record['feedback_id']);
                    if (empty($mFormRecord)) {
                        $mFeedbackArray[] = $record;
                    }
                }
                $data['feedbacks'] = $mFeedbackArray;
                $data['getVendors'] = $this->register->getAllActiveVendorsByZone($mSessionZone);
                $data['getVendorsThisYear'] = $this->register->getAllActiveVendorsThisYearByZone($mSessionZone);
                $data['actions'] = $this->eoi->getAllParentByZone($mSessionZone);
                $data['iomdata'] = $this->getIomDashboardData($mSessionZone, $data['projects'][0]['project_id']);
                $awdType = "Contract";               
                $projects = $data['projects'];
                $mProjectId = $projects[0]['project_id'];                
                $pending_iom_arr = $this->awardRecommContract->getContractData($awdType,$mProjectId,'','Pending',$mSessionZone);
                if(is_array($pending_iom_arr))
                    $data['pending_iom_count']= sizeof($pending_iom_arr);
                else
                    $data['pending_iom_count']=0;               
                $awdType = "Procurement";
                $pending_proc_iom_arr = $this->awardRecommProcurement->getProcurementData($awdType,$mProjectId,'','Pending',$mSessionZone);
                if(is_array($pending_proc_iom_arr))
                    $pending_proc_iom_count = sizeof($pending_proc_iom_arr);
                else
                    $pending_proc_iom_count = 0;
                $data['pending_proc_iom_count']= $pending_proc_iom_count;
                $data['pending_sum_count']=  $pending_iom_count+$pending_proc_iom_count;
                $this->load->view('buyer/index_pm', $data);
            } else if ($mSessionRole == "Project Execution Team") {
                $data['projects'] = $this->projects->getAllParentByZoneAndUser($mSessionZone);
                $mFeedbackArray = array();
                $mFeedbacks = $this->feedback->getParentByPmId($mSessionKey);
                foreach ($mFeedbacks as $key => $record) {
                    $mFormRecord = $this->feedbackforms->getParentByTypeAndFeedbackId($record['feedback_id']);
                    if (empty($mFormRecord)) {
                        $mFeedbackArray[] = $record;
                    }
                }
                $data['feedbacks'] = $mFeedbackArray;
                $data['getVendors'] = $this->register->getAllActiveVendorsByZone($mSessionZone);
                $data['getVendorsThisYear'] = $this->register->getAllActiveVendorsThisYearByZone($mSessionZone);
                $data['actions'] = $this->eoi->getAllParentByZone($mSessionZone);
                $data['iomdata'] = $this->getIomDashboardData($mSessionZone, $data['projects'][0]['project_id']);
                $this->load->view('buyer/index_pet', $data);
            } else if ($mSessionRole == "PCM") {
                $data['projects'] = $this->projects->getAllParentByZoneAndUser($mSessionZone);
                $data['getVendors'] = $this->register->getAllActiveVendorsByZone($mSessionZone);
                $data['getVendorsThisYear'] = $this->register->getAllActiveVendorsThisYearByZone($mSessionZone);
                $data['actions'] = $this->eoi->getAllParentByZone($mSessionZone);
                $data['iomdata'] = $this->getIomDashboardData($mSessionZone, $data['projects'][0]['project_id']);
                $this->load->view('buyer/index_pcm', $data);
            } else if ($mSessionRole == "Project Director") {
                $data['projects'] = $this->projects->getAllParentByZoneAndUser($mSessionZone);
                $data['getVendors'] = $this->register->getAllActiveVendorsByZone($mSessionZone);
                $data['getVendorsThisYear'] = $this->register->getAllActiveVendorsThisYearByZone($mSessionZone);
                $data['actions'] = $this->eoi->getAllParentByZone($mSessionZone);
                $data['iomdata'] = $this->getIomDashboardData($mSessionZone, $data['projects'][0]['project_id']);
                $this->load->view('buyer/index_pcm', $data);
            } else if ($mSessionRole == "Zonal CEO" || $mSessionRole == "Regional Head" || $mSessionRole == "Operations Head" || $mSessionRole == "Construction Head" || $mSessionRole == "Regional C&P Team" || $mSessionRole == "Regional C&P Head") {
                $data['projects'] = $this->projects->getAllParentByZone($mSessionZone);
                $data['getVendors'] = $this->register->getAllActiveVendorsByZone($mSessionZone);
                $data['getVendorsThisYear'] = $this->register->getAllActiveVendorsThisYearByZone($mSessionZone);
                $data['actions'] = $this->eoi->getAllParentByZone($mSessionZone);
                $data['project'] = "All";
                $data['iomdata'] = $this->getIomDashboardData($mSessionZone, "");
                $awdType = "Contract";
                $pending_iom_arr = $this->awardRecommContract->getContractData($awdType,'','','Pending','');
                if(is_array($pending_iom_arr))
                    $pending_iom_count = sizeof($pending_iom_arr);
                else
                    $pending_iom_count = 0;
                
                $awdType = "Procurement";
              
                $pending_proc_iom_arr = $this->awardRecommProcurement->getProcurementData($awdType,'','','Pending','');
                
                if(is_array($pending_proc_iom_arr))
                    $pending_proc_iom_count = sizeof($pending_proc_iom_arr);
                else
                    $pending_proc_iom_count = 0;
                $data['pending_sum_count']=  $pending_iom_count+$pending_proc_iom_count;
                $this->load->view('buyer/index_zonal', $data);
            } else {
                $data['actions'] = $this->eoi->getAllParentByZone($mSessionZone);
                $this->load->view('buyer/index_update', $data);
            }
        } else {
            $awdType = "Contract";
                 
            $pending_iom_arr = $this->awardRecommContract->getContractData($awdType,'','','Pending','');
            if(is_array($pending_iom_arr))
                $pending_iom_count = sizeof($pending_iom_arr);
            else
                $pending_iom_count = 0;
            $awdType = "Procurement";
            $pending_proc_iom_arr = $this->awardRecommProcurement->getProcurementData($awdType,'','','Pending','');
                
            if(is_array($pending_proc_iom_arr))
                $pending_proc_iom_count = sizeof($pending_proc_iom_arr);
            else
                $pending_proc_iom_count = 0;
           
            $data['pending_sum_count']=  $pending_iom_count+$pending_proc_iom_count;
            $this->load->view('index', $data);
        }
    }

    public function filterDashboard() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        $mSessionRole = $this->session->userdata('session_role');
        if ($mSessionKey) {
            $data['home'] = "home";
            $data['tovs'] = $this->register->getVendor();
            $mZone = $this->input->post('zone');
            $mProject = $this->input->post('project');
            $mVendors = $this->vendor->getStageOneVendorsForAssigned($mZone);
            $mApprovedPqCount = 0;
            $mPendingPqCount = 0;
            $mPendingSvrCount = 0;
            $data['svrs'] = $this->vendor->getVendorsForSiteVisitReport($mSessionKey);
            foreach ($data['svrs'] as $key => $mRecord) {
                $mTows = json_decode($mRecord['consolidated_tows']);
                $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                foreach ($mTows as $key => $value) {
                    if ($mRecord['nature_of_business_id'] == 2) {
                        $mSiteReport = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                        $mSiteReportAdded = strtotime($mSiteReport['stcon_date_added']);
                        $mSiteReportAdded = date("d-m-Y H:i:s", $mSiteReportAdded);
                    } else if ($mRecord['nature_of_business_id'] == 3) {
                        $mSiteReport = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                        $mSiteReportAdded = strtotime($mSiteReport['svrc_date_updated']);
                        $mSiteReportAdded = date("d-m-Y H:i:s", $mSiteReportAdded);
                    } else if ($mRecord['nature_of_business_id'] == 1) {
                        $mSiteReport = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                        $mSiteReportAdded = strtotime($mSiteReport['svr_date_updated']);
                        $mSiteReportAdded = date("d-m-Y H:i:s", $mSiteReportAdded);
                    }
                }

                if ($mRecord['nature_of_business_id'] == 1) {
                    if (empty($mSiteReport)) {
                        $mPendingSvrCount++;
                    }
                } else if ($mRecord['nature_of_business_id'] == 2) {
                    if (empty($mSiteReport)) {
                        $mPendingSvrCount++;
                    }
                } else if ($mRecord['nature_of_business_id'] == 3) {
                    if (empty($mSiteReport)) {
                        $mPendingSvrCount++;
                    }
                }
            }
            if (!empty($mVendors)) {
                foreach ($mVendors as $key => $mRecord) {
                    if ($mRecord['is_small'] == 1) {
                        $mTows = json_decode($mRecord['consolidated_tows']);
                        $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                        $mRecordCheck = 0;
                        foreach ($mTows as $key => $value) {
                            if ($mRecord['nature_of_business_id'] == 1) {
                                $mPqScore = $this->pqv->getParentByVendorKey($mRecord['id']);
                                if (!empty($mPqScore)) {
                                    $mRecordCheck++;
                                }
                                $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                                $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                            } else if ($mRecord['nature_of_business_id'] == 3) {
                                $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                                $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                if (!empty($mPqScore)) {
                                    $mRecordCheck++;
                                }
                            } else if ($mRecord['nature_of_business_id'] == 2) {
                                $mPqScore = array();
                            }
                        }

                        if ($mRecordCheck > 0) {
                            $mApprovedPqCount++;
                        } else {
                            $mPendingPqCount++;
                        }
                    } else {

                        $mTows = json_decode($mRecord['consolidated_tows']);
                        $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                        foreach ($mTows as $key => $value) {
                            if ($mRecord['nature_of_business_id'] == 1) {
                                $mPqScore = $this->pqv->getParentByVendorKey($mRecord['id']);
                                $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                                $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                            } else if ($mRecord['nature_of_business_id'] == 3) {
                                $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                                $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                            } else if ($mRecord['nature_of_business_id'] == 2) {
                                $mPqScore = array();
                            }
                        }

                        if (!empty($mPqScore)) {
                            $mApprovedPqCount++;
                        } else {
                            $mPendingPqCount++;
                        }
                    }
                }
            }

            $data['vendors'] = $mVendors;
            $data['pendingpq'] = $mPendingPqCount;
            $data['pendingsvr'] = $mPendingSvrCount;
            $data['projects'] = $this->projects->getAllParentByZone($mZone);
            $data['zone'] = $mZone;
            if ($mProject == "All") {
                $data['project'] = $mProject;
            } else {
                $data['project'] = $this->projects->getParentByKey($mProject);
            }
            if ($mSessionRole == "COO" || $mSessionRole == "Managing Director" || $mSessionRole == "Head of Contracts & Procurement" || $mSessionRole == "HO - C&P" || $mSessionRole == "HO Operations") {
                if ($mSessionRole == "COO") {
                    $data['getVendors'] = $this->register->getAllActiveVendors();
                } else {
                    $data['getVendors'] = $mVendors;
                }
                $data['getVendorsThisYear'] = $this->register->getAllActiveVendorsThisYear();
                $this->load->view('buyer/index', $data);
            } else if ($mSessionRole == "Project Manager" || $mSessionRole == "Project Execution Team") {
                $data['projects'] = $this->projects->getAllParentByZoneAndUser($mSessionZone);
                $mFeedbackArray = array();
                $mFeedbacks = $this->feedback->getParentByPmId($mSessionKey);
                foreach ($mFeedbacks as $key => $record) {
                    $mFormRecord = $this->feedbackforms->getParentByTypeAndFeedbackId($record['feedback_id']);
                    if (empty($mFormRecord)) {
                        $mFeedbackArray[] = $record;
                    }
                }
                $data['feedbacks'] = $mFeedbackArray;
                $data['getVendors'] = $this->register->getAllActiveVendorsByZone($mSessionZone);
                $data['getVendorsThisYear'] = $this->register->getAllActiveVendorsThisYearByZone($mSessionZone);
                $data['actions'] = $this->eoi->getAllParentByZone($mSessionZone);
                $data['iomdata'] = $this->getIomDashboardData($mSessionZone, $mProject);
                $projects = $data['projects'];
                $project = $data['project'];
                if ($project['project_id']) {
                    $mProjectId= $project['project_id'];
                } else {
                    $mProjectId= $projects[0]['project_name'];
                }
                $awdType = "Contract";
                $data['pending_iom'] = $this->awardRecommContract->getContractData($awdType,$mProjectId,'','Pending',$mSessionZone);
                $data['pending_iom_count']= sizeof($data['pending_iom']);
                $awdType = "Procurement";
                $data['pending_proc_iom'] = $this->awardRecommProcurement->getProcurementData($awdType,$mProjectId,'','Pending',$mSessionZone);
                $data['pending_proc_iom_count']= sizeof($data['pending_proc_iom']);
                $this->load->view('buyer/index_pm', $data);
            } else if ($mSessionRole == "PCM") {
                $data['projects'] = $this->projects->getAllParentByZoneAndUser($mSessionZone);
                $data['getVendors'] = $this->register->getAllActiveVendorsByZone($mSessionZone);
                $data['getVendorsThisYear'] = $this->register->getAllActiveVendorsThisYearByZone($mSessionZone);
                $data['actions'] = $this->eoi->getAllParentByZone($mSessionZone);
                $data['iomdata'] = $this->getIomDashboardData($mSessionZone, $mProject);
                $this->load->view('buyer/index_pcm', $data);
            } else if ($mSessionRole == "Project Director") {
                $data['projects'] = $this->projects->getAllParentByZoneAndUser($mSessionZone);
                $data['getVendors'] = $this->register->getAllActiveVendorsByZone($mSessionZone);
                $data['getVendorsThisYear'] = $this->register->getAllActiveVendorsThisYearByZone($mSessionZone);
                $data['actions'] = $this->eoi->getAllParentByZone($mSessionZone);
                $data['iomdata'] = $this->getIomDashboardData($mSessionZone, $mProject);
                $this->load->view('buyer/index_pcm', $data);
            } else if ($mSessionRole == "Zonal CEO" || $mSessionRole == "Regional Head" || $mSessionRole == "Operations Head" || $mSessionRole == "Construction Head" || $mSessionRole == "Regional C&P Team" || $mSessionRole == "Regional C&P Head") {
                $data['projects'] = $this->projects->getAllParentByZone($mSessionZone);
                $data['getVendors'] = $this->register->getAllActiveVendorsByZone($mSessionZone);
                $data['getVendorsThisYear'] = $this->register->getAllActiveVendorsThisYearByZone($mSessionZone);
                $data['actions'] = $this->eoi->getAllParentByZone($mSessionZone);
                $data['iomdata'] = $this->getIomDashboardData($mSessionZone, $mProject);
                $awdType = "Contract";
                if($mProjectId=="A")
                    $pending_iom_arr = $this->awardRecommContract->getContractData($awdType,'','','Pending','');
                else
                    $pending_iom_arr = $this->awardRecommContract->getContractData($awdType,$mProjectId,'','Pending',$mSessionZone);
                if(is_array($pending_iom_arr))
                    $pending_iom_count= sizeof($pending_iom_arr);
                else
                    $pending_iom_count=0;
                $data['pending_iom_count'] = $pending_iom_count;
                $awdType = "Procurement";
                if($mProjectId=="A")
                    $pending_proc_iom_arr = $this->awardRecommProcurement->getProcurementData($awdType,'','','Pending','');
                else
                    $pending_proc_iom_arr = $this->awardRecommProcurement->getProcurementData($awdType,$mProjectId,'','Pending',$mSessionZone);
                if(is_array($pending_proc_iom_arr))
                    $pending_proc_iom_count= sizeof($pending_proc_iom_arr);
                else
                    $pending_proc_iom_count=0;
                $data['pending_proc_iom_count'] = $pending_proc_iom_count;   
                $data['pending_sum_count']=  $pending_iom_count+$pending_proc_iom_count;
                $this->load->view('buyer/index_zonal', $data);
            } else {
                $data['actions'] = $this->eoi->getAllParentByZone($mSessionZone);
                $this->load->view('buyer/index_update', $data);
            }
        } else {
            $awdType = "Contract";
            $pending_iom_arr = $this->awardRecommContract->getContractData($awdType,'','','Pending','');
            if(is_array($pending_iom_arr))
                $pending_iom_count = sizeof($pending_iom_arr);
            else
                $pending_iom_count = 0;
            
            $awdType = "Procurement";
           
            $pending_proc_iom_arr = $this->awardRecommProcurement->getProcurementData($awdType,'','','Pending','');
            
            if(is_array($pending_proc_iom_arr))
                $pending_proc_iom_count = sizeof($pending_proc_iom_arr);
            else
                $pending_proc_iom_count = 0;
            $data['pending_sum_count']=  $pending_iom_count+$pending_proc_iom_count;
            $this->load->view('index', $data);
        }
    }

    public function actionTotal() {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "home";
            $this->load->view('buyer/dashboard_total', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionContracts() {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "home";
            $this->load->view('buyer/dashboard_total_contracts', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionProcurement() {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "home";
            $this->load->view('buyer/dashboard_total_procurement', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionByType() {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "home";
            $this->load->view('buyer/dashboard_total_type', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionByTypeProcurement() {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "home";
            $this->load->view('buyer/dashboard_total_type_procurement', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionProjectWise() {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "home";
            $this->load->view('buyer/dashboard_total_project', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
    
    public function actionIomCount() {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "home";
            $this->load->view('buyer/dashboard_total_iom', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
    
    public function actionTatCount() {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "home";
            $this->load->view('buyer/dashboard_total_tat', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
    
    public function actionSteel() {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "home";
            $this->load->view('buyer/dashboard_steel', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function shortlistingPendingCount() {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "short";
            $mRecords = $this->eoi->getAllParentForShortlistingPending();
            $mCurated = array();
            foreach ($mRecords as $key => $mRecord) {
                $mShort = $this->short->getParentByEoiKey($mRecord['eoi_id']);
                $mApprovers = json_decode($mShort['s_approvers']);
                $mApprovedBy = json_decode($mShort['s_approved_by']);
                $mSessionKey = $this->session->userdata('session_id');
                $mCountLeft = 0;
                if (!empty($mApprovedBy)) {
                    $mCountLeft = count($mApprovers) - count($mApprovedBy);
                    $mCountLeft = count($mApprovers) - $mCountLeft;
                }
                
                if (empty($mApprovedBy)) {
                    if (($mSessionKey == $mApprovers[$mCountLeft]) && $mRecord['eoi_status'] != "11") {
                        $mCurated[] = $mRecord;
                    }
                } else {
                    if (($mSessionKey == $mApprovers[$mCountLeft]) && $mRecord['eoi_status'] != "11") {
                        $mCurated[] = $mRecord;
                    }
                }
            }

            $mRecordsPro = $this->eoi_pro->getAllParentForShortlistingPending();
            foreach ($mRecordsPro as $key => $mRecord) {
                $mShort = $this->shortpro->getParentByEoiKey($mRecord['eoi_id']);
                $mApprovers = json_decode($mShort['s_approvers']);
                $mApprovedBy = json_decode($mShort['s_approved_by']);
                $mSessionKey = $this->session->userdata('session_id');
                $mCountLeft = 0;
                if (!empty($mApprovedBy)) {
                    $mCountLeft = count($mApprovers) - count($mApprovedBy);
                    $mCountLeft = count($mApprovers) - $mCountLeft;
                }

                if (empty($mApprovedBy)) {
                    if (($mSessionKey == $mApprovers[$mCountLeft]) && $mRecord['eoi_status'] != "11") {
                        $mCurated[] = $mRecord;
                    }
                } else {
                    if (($mSessionKey == $mApprovers[$mCountLeft]) && $mRecord['eoi_status'] != "11") {
                        $mCurated[] = $mRecord;
                    }
                }
            }

            return count($mCurated);
        } else {
            return "";
        }
    }

    public function getIomDashboardData($mZone, $mProject) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionRole = $this->session->userdata('session_role');
        $mSessionZone = $mZone;
        $mSessionProject = $mProject;
        if ($mSessionKey) {
            if ($mSessionRole == "COO" || $mSessionRole == "Managing Director" || $mSessionRole == "Head of Contracts & Procurement" || $mSessionRole == "HO - C&P" || $mSessionRole == "HO Operations") {
                //Contracts
                $mRecords = $this->iom->getAllParent("", "");
                $mTotalBudgetContracts = 0;
                $mTotalFinalisedContracts = 0;
                foreach ($mRecords as $key => $value) {
                    $mTotalBudgetContracts += $value['total_budget_esc'];
                    $mTotalFinalisedContracts += $value['total_finalized_award_value'];
                }
                $mEscOrSavContracts = $mTotalFinalisedContracts - $mTotalBudgetContracts;

                $mConAvg = ($mEscOrSavContracts / $mTotalBudgetContracts);

                $mContractArray = array(
                    'a' => round($mTotalBudgetContracts, 2),
                    'b' => round($mTotalFinalisedContracts, 2),
                    'c' => round($mEscOrSavContracts, 2),
                    'avg' => $mConAvg
                );

                //Procurement
                $mRecordsPro = $this->iom->getAllParentPro("", "");
                $mTotalBudgetProcurement = 0;
                $mTotalFinalisedProcurement = 0;

                foreach ($mRecordsPro as $key => $value) {
                    $mTotalBudgetProcurement += $value['total_budget_esc'];
                    $mTotalFinalisedProcurement += $value['total_finalized_award_value'];
                }
                $mEscOrSavProcurement = $mTotalFinalisedProcurement - $mTotalBudgetProcurement;

                $mProAvg = ($mEscOrSavProcurement / $mTotalBudgetProcurement) * 100;

                //count
                $mCountContracts = $this->iom->getAllParentConCount("", "");
                if (!empty($mCountContracts)) {
                    $mCountContracts = count($this->iom->getAllParentConCount("", ""));
                } else {
                    $mCountContracts = "-";
                }
                $mCountProcurements = $this->iom->getAllParentProCount("", "");
                if (!empty($mCountProcurements)) {
                    $mCountProcurements = count($this->iom->getAllParentProCount("", ""));
                } else {
                    $mCountProcurements = "-";
                }

                $mProcurementArray = array(
                    'a' => round($mTotalBudgetProcurement, 2),
                    'b' => round($mTotalFinalisedProcurement, 2),
                    'c' => round($mEscOrSavProcurement, 2),
                    'avg' => round($mProAvg, 2),
                    'count_con' => $mCountContracts,
                    'count_pro' => $mCountProcurements
                );

                //Zonal level price - Procurement
                $mCementNcr = $this->iom->getAllParentProLastPrice("4", "NCR", "");
                $mCementSouth = $this->iom->getAllParentProLastPrice("4", "South", "");
                $mCementMumbai = $this->iom->getAllParentProLastPrice("4", "Mumbai", "");
                $mCementPune = $this->iom->getAllParentProLastPrice("4", "Pune", "");

                $mLatestCementPrice = array(
                    'NCR' => $mCementNcr,
                    'South' => $mCementSouth,
                    'Mumbai' => $mCementMumbai,
                    'Pune' => $mCementPune,
                );

                $mSteelNcr = $this->iom->getAllParentProLastPrice("3", "NCR", "");
                $mSteelSouth = $this->iom->getAllParentProLastPrice("3", "South", "");
                $mSteelMumbai = $this->iom->getAllParentProLastPrice("3", "Mumbai", "");
                $mSteelPune = $this->iom->getAllParentProLastPrice("3", "Pune", "");

                $mLatestSteelPrice = array(
                    'NCR' => $mSteelNcr,
                    'South' => $mSteelSouth,
                    'Mumbai' => $mSteelMumbai,
                    'Pune' => $mSteelPune,
                );

                $mAluminiumNcr = $this->iom->getAllParentProLastPrice("1", "NCR", "");
                $mAluminiumSouth = $this->iom->getAllParentProLastPrice("1", "South", "");
                $mAluminiumMumbai = $this->iom->getAllParentProLastPrice("1", "Mumbai", "");
                $mAluminiumPune = $this->iom->getAllParentProLastPrice("1", "Pune", "");

                $mLatestAluminiumPrice = array(
                    'NCR' => $mAluminiumNcr,
                    'South' => $mAluminiumSouth,
                    'Mumbai' => $mAluminiumMumbai,
                    'Pune' => $mAluminiumPune,
                );

                $mResponseArray = array(
                    'contracts' => $mContractArray,
                    'procurement' => $mProcurementArray,
                    'total' => ($mContractArray['b'] + $mProcurementArray['b']),
                    'total_avg' => ($mContractArray['c'] + $mProcurementArray['c']),
                    'total_contracts' => $mCountContracts,
                    'total_procurements' => $mCountProcurements,
                    'latest_cement_price' => $mLatestCementPrice,
                    'latest_steel_price' => $mLatestSteelPrice,
                    'latest_aluminium_price' => $mLatestAluminiumPrice,
                );

                //echo "<pre>";
                //print_r($mResponseArray['latest_cement_price']['NCR']['uom_value']);
                //exit;

                return $mResponseArray;
            } else if ($mSessionRole == "Project Manager" || $mSessionRole == "Project Execution Team") {
                //Contracts
                $mRecords = $this->iom->getAllParent($mZone, $mProject);
                $mTotalBudgetContracts = 0;
                $mTotalFinalisedContracts = 0;
                foreach ($mRecords as $key => $value) {
                    $mTotalBudgetContracts += $value['total_budget_esc'];
                    $mTotalFinalisedContracts += $value['total_finalized_award_value'];
                }
                $mEscOrSavContracts = $mTotalFinalisedContracts - $mTotalBudgetContracts;

                $mConAvg = ($mEscOrSavContracts / $mTotalBudgetContracts);

                $mContractArray = array(
                    'a' => round($mTotalBudgetContracts, 2),
                    'b' => round($mTotalFinalisedContracts, 2),
                    'c' => round($mEscOrSavContracts, 2),
                    'avg' => $mConAvg
                );

                //Procurement
                $mRecordsPro = $this->iom->getAllParentPro($mZone, $mProject);
                $mTotalBudgetProcurement = 0;
                $mTotalFinalisedProcurement = 0;
                foreach ($mRecordsPro as $key => $value) {
                    $mTotalBudgetProcurement += $value['total_budget_esc'];
                    $mTotalFinalisedProcurement += $value['total_finalized_award_value'];
                }
                $mEscOrSavProcurement = $mTotalFinalisedProcurement - $mTotalBudgetProcurement;

                if ($mEscOrSavProcurement > 0) {
                    $mProAvg = ($mEscOrSavProcurement / $mTotalBudgetProcurement) * 100;
                } else {
                    $mProAvg = ($mEscOrSavProcurement / $mTotalBudgetProcurement) * 100;
                }

                //count
                $mCountContracts = $this->iom->getAllParentConCount($mZone, $mProject);
                if (!empty($mCountContracts)) {
                    $mCountContracts = count($this->iom->getAllParentConCount($mZone, $mProject));
                } else {
                    $mCountContracts = "-";
                }
                $mCountProcurements = $this->iom->getAllParentProCount($mZone, $mProject);
                if (!empty($mCountProcurements)) {
                    $mCountProcurements = count($this->iom->getAllParentProCount($mZone, $mProject));
                } else {
                    $mCountProcurements = "-";
                }

                //count Ongoing
                $mCountContractsOngoing = $this->iom->getAllParentConCountOngoing($mZone, $mProject);
                if (!empty($mCountContractsOngoing)) {
                    $mCountContractsOngoing = count($this->iom->getAllParentConCountOngoing($mZone, $mProject));
                } else {
                    $mCountContractsOngoing = "-";
                }
                $mCountProcurementsOngoing = $this->iom->getAllParentProCountOngoing($mZone, $mProject);
                if (!empty($mCountProcurementsOngoing)) {
                    $mCountProcurementsOngoing = count($this->iom->getAllParentProCountOngoing($mZone, $mProject));
                } else {
                    $mCountProcurementsOngoing = "-";
                }

                $mProcurementArray = array(
                    'a' => round($mTotalBudgetProcurement, 2),
                    'b' => round($mTotalFinalisedProcurement, 2),
                    'c' => round($mEscOrSavProcurement, 2),
                    'avg' => round($mProAvg, 2),
                    'count_con' => $mCountContracts,
                    'count_pro' => $mCountProcurements
                );

                //Zonal level price - Procurement
                $mCementNcr = $this->iom->getAllParentProLastPrice("4", "NCR", $mProject);
                $mCementSouth = $this->iom->getAllParentProLastPrice("4", "South", $mProject);
                $mCementMumbai = $this->iom->getAllParentProLastPrice("4", "Mumbai", $mProject);
                $mCementPune = $this->iom->getAllParentProLastPrice("4", "Pune", $mProject);

                $mLatestCementPrice = array(
                    'NCR' => $mCementNcr,
                    'South' => $mCementSouth,
                    'Mumbai' => $mCementMumbai,
                    'Pune' => $mCementPune,
                );

                $mSteelNcr = $this->iom->getAllParentProLastPrice("3", "NCR", $mProject);
                $mSteelSouth = $this->iom->getAllParentProLastPrice("3", "South", $mProject);
                $mSteelMumbai = $this->iom->getAllParentProLastPrice("3", "Mumbai", $mProject);
                $mSteelPune = $this->iom->getAllParentProLastPrice("3", "Pune", $mProject);

                $mLatestSteelPrice = array(
                    'NCR' => $mSteelNcr,
                    'South' => $mSteelSouth,
                    'Mumbai' => $mSteelMumbai,
                    'Pune' => $mSteelPune,
                );

                $mAluminiumNcr = $this->iom->getAllParentProLastPrice("1", "NCR", $mProject);
                $mAluminiumSouth = $this->iom->getAllParentProLastPrice("1", "South", $mProject);
                $mAluminiumMumbai = $this->iom->getAllParentProLastPrice("1", "Mumbai", $mProject);
                $mAluminiumPune = $this->iom->getAllParentProLastPrice("1", "Pune", $mProject);

                $mLatestAluminiumPrice = array(
                    'NCR' => $mAluminiumNcr,
                    'South' => $mAluminiumSouth,
                    'Mumbai' => $mAluminiumMumbai,
                    'Pune' => $mAluminiumPune,
                );

                $mResponseArray = array(
                    'contracts' => $mContractArray,
                    'procurement' => $mProcurementArray,
                    'total' => ($mContractArray['c'] + $mProcurementArray['c']),
                    'total_contracts' => $mCountContracts,
                    'total_procurements' => $mCountProcurements,
                    'total_contracts_ongoing' => $mCountContractsOngoing,
                    'total_procurements_ongoing' => $mCountProcurementsOngoing,
                    'latest_cement_price' => $mLatestCementPrice,
                    'latest_steel_price' => $mLatestSteelPrice,
                    'latest_aluminium_price' => $mLatestAluminiumPrice,
                );

                //echo "<pre>";
                //print_r($mResponseArray['latest_cement_price']['NCR']['uom_value']);
                //exit;

                return $mResponseArray;
            } else if ($mSessionRole == "PCM") {
                //Contracts
                $mRecords = $this->iom->getAllParent($mZone, $mProject);
                $mTotalBudgetContracts = 0;
                $mTotalFinalisedContracts = 0;
                foreach ($mRecords as $key => $value) {
                    $mTotalBudgetContracts += $value['total_budget_esc'];
                    $mTotalFinalisedContracts += $value['total_finalized_award_value'];
                }
                $mEscOrSavContracts = $mTotalFinalisedContracts - $mTotalBudgetContracts;

                $mConAvg = ($mEscOrSavContracts / $mTotalBudgetContracts);

                $mContractArray = array(
                    'a' => round($mTotalBudgetContracts, 2),
                    'b' => round($mTotalFinalisedContracts, 2),
                    'c' => round($mEscOrSavContracts, 2),
                    'avg' => $mConAvg
                );

                //Procurement
                $mRecordsPro = $this->iom->getAllParentPro($mZone, $mProject);
                $mTotalBudgetProcurement = 0;
                $mTotalFinalisedProcurement = 0;
                foreach ($mRecordsPro as $key => $value) {
                    $mTotalBudgetProcurement += $value['total_budget_esc'];
                    $mTotalFinalisedProcurement += $value['total_finalized_award_value'];
                }
                $mEscOrSavProcurement = $mTotalFinalisedProcurement - $mTotalBudgetProcurement;

                if ($mEscOrSavProcurement > 0) {
                    $mProAvg = ($mEscOrSavProcurement / $mTotalBudgetProcurement) * 100;
                } else {
                    $mProAvg = ($mEscOrSavProcurement / $mTotalBudgetProcurement) * 100;
                }

                //count
                $mCountContracts = $this->iom->getAllParentConCount($mZone, $mProject);
                if (!empty($mCountContracts)) {
                    $mCountContracts = count($this->iom->getAllParentConCount($mZone, $mProject));
                } else {
                    $mCountContracts = "-";
                }
                $mCountProcurements = $this->iom->getAllParentProCount($mZone, $mProject);
                if (!empty($mCountProcurements)) {
                    $mCountProcurements = count($this->iom->getAllParentProCount($mZone, $mProject));
                } else {
                    $mCountProcurements = "-";
                }

                //count Ongoing
                $mCountContractsOngoing = $this->iom->getAllParentConCountOngoing($mZone, $mProject);
                if (!empty($mCountContractsOngoing)) {
                    $mCountContractsOngoing = count($this->iom->getAllParentConCountOngoing($mZone, $mProject));
                } else {
                    $mCountContractsOngoing = "-";
                }
                $mCountProcurementsOngoing = $this->iom->getAllParentProCountOngoing($mZone, $mProject);
                if (!empty($mCountProcurementsOngoing)) {
                    $mCountProcurementsOngoing = count($this->iom->getAllParentProCountOngoing($mZone, $mProject));
                } else {
                    $mCountProcurementsOngoing = "-";
                }

                $mProcurementArray = array(
                    'a' => round($mTotalBudgetProcurement, 2),
                    'b' => round($mTotalFinalisedProcurement, 2),
                    'c' => round($mEscOrSavProcurement, 2),
                    'avg' => round($mProAvg, 2),
                    'count_con' => $mCountContracts,
                    'count_pro' => $mCountProcurements
                );

                //Zonal level price - Procurement
                $mCementNcr = $this->iom->getAllParentProLastPrice("4", "NCR", $mProject);
                $mCementSouth = $this->iom->getAllParentProLastPrice("4", "South", $mProject);
                $mCementMumbai = $this->iom->getAllParentProLastPrice("4", "Mumbai", $mProject);
                $mCementPune = $this->iom->getAllParentProLastPrice("4", "Pune", $mProject);

                $mLatestCementPrice = array(
                    'NCR' => $mCementNcr,
                    'South' => $mCementSouth,
                    'Mumbai' => $mCementMumbai,
                    'Pune' => $mCementPune,
                );

                $mSteelNcr = $this->iom->getAllParentProLastPrice("3", "NCR", $mProject);
                $mSteelSouth = $this->iom->getAllParentProLastPrice("3", "South", $mProject);
                $mSteelMumbai = $this->iom->getAllParentProLastPrice("3", "Mumbai", $mProject);
                $mSteelPune = $this->iom->getAllParentProLastPrice("3", "Pune", $mProject);

                $mLatestSteelPrice = array(
                    'NCR' => $mSteelNcr,
                    'South' => $mSteelSouth,
                    'Mumbai' => $mSteelMumbai,
                    'Pune' => $mSteelPune,
                );

                $mAluminiumNcr = $this->iom->getAllParentProLastPrice("1", "NCR", $mProject);
                $mAluminiumSouth = $this->iom->getAllParentProLastPrice("1", "South", $mProject);
                $mAluminiumMumbai = $this->iom->getAllParentProLastPrice("1", "Mumbai", $mProject);
                $mAluminiumPune = $this->iom->getAllParentProLastPrice("1", "Pune", $mProject);

                $mLatestAluminiumPrice = array(
                    'NCR' => $mAluminiumNcr,
                    'South' => $mAluminiumSouth,
                    'Mumbai' => $mAluminiumMumbai,
                    'Pune' => $mAluminiumPune,
                );

                $mResponseArray = array(
                    'contracts' => $mContractArray,
                    'procurement' => $mProcurementArray,
                    'total' => ($mContractArray['c'] + $mProcurementArray['c']),
                    'total_contracts' => $mCountContracts,
                    'total_procurements' => $mCountProcurements,
                    'total_contracts_ongoing' => $mCountContractsOngoing,
                    'total_procurements_ongoing' => $mCountProcurementsOngoing,
                    'latest_cement_price' => $mLatestCementPrice,
                    'latest_steel_price' => $mLatestSteelPrice,
                    'latest_aluminium_price' => $mLatestAluminiumPrice,
                );

                //echo "<pre>";
                //print_r($mResponseArray['latest_cement_price']['NCR']['uom_value']);
                //exit;

                return $mResponseArray;
            } else if ($mSessionRole == "Project Director") {
                
            } else if ($mSessionRole == "Zonal CEO" || $mSessionRole == "Regional Head" || $mSessionRole == "Operations Head" || $mSessionRole == "Construction Head" || $mSessionRole == "Regional C&P Team" || $mSessionRole == "Regional C&P Head") {
                //Contracts
                $mRecords = $this->iom->getAllParent($mSessionZone, "");
                $mTotalBudgetContracts = 0;
                $mTotalFinalisedContracts = 0;
                foreach ($mRecords as $key => $value) {
                    $mTotalBudgetContracts += $value['total_budget_esc'];
                    $mTotalFinalisedContracts += $value['total_finalized_award_value'];
                }
                $mEscOrSavContracts = $mTotalFinalisedContracts - $mTotalBudgetContracts;

                $mConAvg = ($mEscOrSavContracts / $mTotalBudgetContracts);

                $mContractArray = array(
                    'a' => $mTotalBudgetContracts,
                    'b' => $mTotalFinalisedContracts,
                    'c' => $mEscOrSavContracts,
                    'avg' => $mConAvg
                );

                //Procurement
                $mRecordsPro = $this->iom->getAllParentPro($mSessionZone, "");
                $mTotalBudgetProcurement = 0;
                $mTotalFinalisedProcurement = 0;
                foreach ($mRecordsPro as $key => $value) {
                    $mTotalBudgetProcurement += $value['total_budget_esc'];
                    $mTotalFinalisedProcurement += $value['total_finalized_award_value'];
                }
                $mEscOrSavProcurement = $mTotalFinalisedProcurement - $mTotalBudgetProcurement;

                if ($mEscOrSavProcurement > 0) {
                    $mProAvg = ($mEscOrSavProcurement / $mTotalBudgetProcurement) * 100;
                } else {
                    $mProAvg = ($mEscOrSavProcurement / $mTotalBudgetProcurement) * 100;
                }

                //count
                $mCountContracts = count($this->iom->getAllParentConCount($mSessionZone, ""));
                $mCountProcurements = count($this->iom->getAllParentProCount($mSessionZone, ""));

                $mProcurementArray = array(
                    'a' => $mTotalBudgetProcurement,
                    'b' => $mTotalFinalisedProcurement,
                    'c' => $mEscOrSavProcurement,
                    'avg' => $mProAvg,
                    'count_con' => $mCountContracts,
                    'count_pro' => $mCountProcurements
                );

                $mResponseArray = array(
                    'contracts' => $mContractArray,
                    'procurement' => $mProcurementArray,
                    'total' => ($mContractArray['c'] + $mProcurementArray['c']),
                    'total_contracts' => $mCountContracts,
                    'total_procurements' => $mCountProcurements,
                );

                return $mResponseArray;
            }
        } else {
            return "";
        }
    }

    public function actionFilterGplData($mZone, $mNob = null, $mTow = null, $fc = null, $scoretype = null) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "process";
            if ($this->input->post('zone_filter')) {
                $data['zone'] = $this->input->post('zone_filter');
            } else {
                $data['zone'] = $mZone;
            }
            if ($this->input->post('fc_filter')) {
                $data['fc'] = $this->input->post('fc_filter');
            } else {
                $data['fc'] = "All";
            }
            if ($this->input->post('score_filter')) {
                $data['scoretype'] = $this->input->post('score_filter');
            } else {
                $data['scoretype'] = "All";
            }
            if ($this->input->post('nature_of_business')) {
                $data['nob'] = $this->input->post('nature_of_business');
                $mNob = $this->input->post('nature_of_business');
            } else {
                $data['nob'] = $mNob;
            }
            if ($this->input->post('type_of_work')) {
                $data['tow'] = $this->input->post('type_of_work');
                $mTow = $this->input->post('type_of_work');
            } else {
                $data['tow'] = $mTow;
            }
            $data['getVendor'] = $this->register->getVendor();
            if ($mNob == "All") {
                $data['packages'] = $this->register->getAllWorksForProcess();
            } else {
                $data['packages'] = $this->register->getAllWorks($mNob);
            }

            $mRecords = $this->vendor->getStageOneVendorsForGpl($data['zone'], $data['tow'], $data['nob']);

//            echo $data['zone'];
//            echo $data['tow'];
//            echo $data['nob'];
//            exit;
            //Create GPL Vendor Data
            $mCount = 0;
            $mFc = "";
            $mFeedbackScore = "";
            $mCountTow = 0;
            $mCuratedVendors = array();
            foreach ($mRecords as $key => $mRecord) {

//                echo "<pre>";
//                print_r($mRecord);
//                exit;

                $mCount++;
                $mStageOneAdded = strtotime($mRecord['created_at']);
                $mStageOneAdded = date("d-m-Y H:i:s", $mStageOneAdded);
                if ($mRecord['pr']) {
                    $mPrRecord = $this->buyer->getParentByKey($mRecord['pr']);
                } else {
                    $mPrRecord = "";
                }
                $mGetWork = $this->buyer->getTypeOfWork($mRecord['type_of_work_id']);

                if ($mRecord['nature_of_business_id'] == 1) {
                    if (empty($mStageTwo)) {
                        //echo $mRecord['turn_over_of_last_3years'] * 0.5;
                        if ($mRecord['turn_over_of_last_3years'] * 0.5 < 10) {
                            $mFc = "Very Small";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 10 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 50) {
                            $mFc = "Small";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 50 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 100) {
                            $mFc = "Medium";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 100 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 150) {
                            $mFc = "Large";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 150) {
                            $mFc = "Very Large";
                        }
                    } else {
                        $mStageTwoTurn = json_decode($mStageTwo['stv_turnover']);
                        $mStageTwoTurn = array_sum($mStageTwoTurn) / 4;
                        $mStageTwoTurn = $mStageTwoTurn * 0.5;
                        if ($mStageTwoTurn * 10000000 < 50000000) {
                            $mFc = "Very Small";
                        } else if ($mStageTwoTurn * 10000000 > 50000000 && $mStageTwoTurn * 10000000 <= 250000000) {
                            $mFc = "Small";
                        } else if ($mStageTwoTurn * 10000000 > 250000000 && $mStageTwoTurn * 10000000 <= 500000000) {
                            $mFc = "Medium";
                        } else if ($mStageTwoTurn * 10000000 > 500000000 && $mStageTwoTurn * 10000000 <= 1000000000) {
                            $mFc = "Large";
                        } else if ($mStageTwoTurn * 10000000 > 1000000000) {
                            $mFc = "Very Large";
                        }
                    }
                } else if ($mRecord['nature_of_business_id'] == 2) {
                    if (empty($mStageTwo)) {
                        if ($mRecord['turn_over_of_last_3years'] * 0.5 < 10) {
                            $mFc = "Very Small";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 10 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 50) {
                            $mFc = "Small";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 50 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 100) {
                            $mFc = "Medium";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 100 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 150) {
                            $mFc = "Large";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 150) {
                            $mFc = "Very Large";
                        }
                    } else {
                        $mStageTwoTurn = json_decode($mStageTwo['stc_turnover']);
                        $mStageTwoTurn = array_sum($mStageTwoTurn) / 4;
                        $mStageTwoTurn = $mStageTwoTurn * 0.5;
                        if ($mStageTwoTurn * 10000000 < 10000000) {
                            $mFc = "Very Small";
                        } else if ($mStageTwoTurn * 10000000 > 10000000 && $mStageTwoTurn * 10000000 <= 500000000) {
                            $mFc = "Small";
                        } else if ($mStageTwoTurn * 10000000 > 500000000 && $mStageTwoTurn * 10000000 <= 1000000000) {
                            $mFc = "Medium";
                        } else if ($mStageTwoTurn * 10000000 > 1000000000 && $mStageTwoTurn * 10000000 <= 1500000000) {
                            $mFc = "Large";
                        } else if ($mStageTwoTurn * 10000000 > 1500000000) {
                            $mFc = "Very Large";
                        }
                    }
                } else if ($mRecord['nature_of_business_id'] == 3) {
                    if (empty($mStageTwo)) {
                        if ($mRecord['turn_over_of_last_3years'] * 0.5 < 5) {
                            $mFc = "Very Small";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 5 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 25) {
                            $mFc = "Small";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 25 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 50) {
                            $mFc = "Medium";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 50 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 100) {
                            $mFc = "Large";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 100) {
                            $mFc = "Very Large";
                        }
                    } else {
                        $mStageTwoTurn = json_decode($mStageTwo['stc_turnover']);
                        $mStageTwoTurn = ($mStageTwoTurn[0] + $mStageTwoTurn[1] + $mStageTwoTurn[2]) / 3;
                        $mStageTwoTurn = $mStageTwoTurn * 0.5;
                        if ($mStageTwoTurn * 10000000 < 50000000) {
                            $mFc = "Very Small";
                        } else if ($mStageTwoTurn * 10000000 > 50000000 && $mStageTwoTurn * 10000000 <= 250000000) {
                            $mFc = "Small";
                        } else if ($mStageTwoTurn * 10000000 > 250000000 && $mStageTwoTurn * 10000000 <= 500000000) {
                            $mFc = "Medium";
                        } else if ($mStageTwoTurn * 10000000 > 500000000 && $mStageTwoTurn * 10000000 <= 1000000000) {
                            $mFc = "Large";
                        } else if ($mStageTwoTurn * 10000000 > 1000000000) {
                            $mFc = "Very Large";
                        }
                    }
                } else {
                    if (empty($mStageTwo)) {
                        if ($mRecord['turn_over_of_last_3years'] * 0.5 < 10) {
                            $mFc = "Very Small";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 10 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 50) {
                            $mFc = "Small";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 50 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 100) {
                            $mFc = "Medium";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 100 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 150) {
                            $mFc = "Large";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 150) {
                            $mFc = "Very Large";
                        }
                    } else {
                        $mStageTwoTurn = json_decode($mStageTwo['stc_turnover']);
                        $mStageTwoTurn = ($mStageTwoTurn[0] + $mStageTwoTurn[1] + $mStageTwoTurn[2]) / 3;
                        $mStageTwoTurn = $mStageTwoTurn * 0.5;
                        if ($mStageTwoTurn * 10000000 < 10000000) {
                            $mFc = "Very Small";
                        } else if ($mStageTwoTurn * 10000000 > 10000000 && $mStageTwoTurn * 10000000 <= 500000000) {
                            $mFc = "Small";
                        } else if ($mStageTwoTurn * 10000000 > 500000000 && $mStageTwoTurn * 10000000 <= 1000000000) {
                            $mFc = "Medium";
                        } else if ($mStageTwoTurn * 10000000 > 1000000000 && $mStageTwoTurn * 10000000 <= 1500000000) {
                            $mFc = "Large";
                        } else if ($mStageTwoTurn * 10000000 > 1500000000) {
                            $mFc = "Very Large";
                        }
                    }
                }
                $mFeedback = $this->feedback->getParentByVendorKey($mRecord['id']);
                if (!empty($mFeedback)) {
                    $mFormRecord = $this->feedbackforms->getAllParentByTypeAndFeedbackId($mFeedback['feedback_id']);
                    if (!empty($mFormRecord)) {
                        $mTotalScore = 0;
                        foreach ($mFormRecord as $key => $value) {
                            $mTotalScore += $value['ff_final_score'];
                        }
                        $mFeedbackScore = $mTotalScore / count($mFormRecord);
                    } else {
                        $mFeedbackScore = "-";
                    }
                } else {
                    $mFeedbackScore = "-";
                }

                if ($mRecord['active'] == 2) {
                    if ($data['tow'] != "All" && $data['tow'] != "66" && $data['tow'] != "67" && $data['tow'] != "68") {
                        $mTows = json_decode($mRecord['consolidated_tows']);
                        $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                        foreach ($mTows as $key => $value) {
                            $mCountTow++;
                            if ($data['tow'] == $mTowsIds[$key]) {
                                if ($mRecord['nature_of_business_id'] == 1) {
                                    $mPqScore = $this->pqv->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                    $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                                    $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                    $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                } else if ($mRecord['nature_of_business_id'] == 3) {
                                    $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                    $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                                    $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                    $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                } else if ($mRecord['nature_of_business_id'] == 2) {
                                    $mPqScore = array();
                                }

                                if (!empty($mPqScore)) {
                                    if ($mRecord['nature_of_business_id'] == 1) {
                                        $mPqId = $mPqScore['pqv_id'];
                                        $mPqTotalScore = $mPqScore['pqv_total'];
                                        $mPqDate = strtotime($mPqScore['pqv_date_updated']);
                                        $mPqDate = date("d-m-Y H:i:s", $mPqDate);
                                    } else if ($mRecord['nature_of_business_id'] == 3) {
                                        $mPqId = $mPqScore['pqc_id'];
                                        $mPqTotalScore = $mPqScore['pqc_total'];
                                        $mPqDate = strtotime($mPqScore['pqc_date_updated']);
                                        $mPqDate = date("d-m-Y H:i:s", $mPqDate);
                                    } else if ($mRecord['nature_of_business_id'] == 2) {
                                        $mPqId = "";
                                        $mPqTotalScore = "";
                                        $mPqDate = "";
                                    }
                                }

                                $mVendorArray = array(
                                    'sl' => $mCountTow,
                                    'vendor_id' => $mRecord['id'],
                                    'company' => $mRecord['company_name'],
                                    'email' => $mRecord['email'],
                                    'contact_number' => $mRecord['contact_number'],
                                    'location' => $mRecord['location'],
                                    'tow_id' => $mTowsIds[$key],
                                    'tow_name' => $value,
                                    'financial_categorizarion' => $mFc,
                                    'pq_id' => $mPqId,
                                    'pq_score' => $mPqTotalScore,
                                    'fb_score' => $mFeedbackScore,
                                    'fb_data' => $mFormRecord,
                                    'date' => $mPqDate
                                );

                                $mCuratedVendors[] = $mVendorArray;
                            }
                        }
                    } else {

                        $mTows = json_decode($mRecord['consolidated_tows']);
                        $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);

                        foreach ($mTows as $key => $value) {
                            $mCountTow++;
                            if ($mRecord['nature_of_business_id'] == 1) {
                                $mPqScore = $this->pqv->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                                $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                            } else if ($mRecord['nature_of_business_id'] == 3) {
                                $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                                $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                            } else if ($mRecord['nature_of_business_id'] == 2) {
                                $mPqScore = array();
                            }

                            if (!empty($mPqScore)) {
                                if ($mRecord['nature_of_business_id'] == 1) {
                                    $mPqId = $mPqScore['pqv_id'];
                                    $mPqTotalScore = $mPqScore['pqv_total'];
                                    $mPqDate = strtotime($mPqScore['pqv_date_updated']);
                                    $mPqDate = date("d-m-Y H:i:s", $mPqDate);
                                } else if ($mRecord['nature_of_business_id'] == 3) {
                                    $mPqId = $mPqScore['pqc_id'];
                                    $mPqTotalScore = $mPqScore['pqc_total'];
                                    $mPqDate = strtotime($mPqScore['pqc_date_updated']);
                                    $mPqDate = date("d-m-Y H:i:s", $mPqDate);
                                } else if ($mRecord['nature_of_business_id'] == 2) {
                                    $mPqId = "";
                                    $mPqTotalScore = "";
                                    $mPqDate = "";
                                }
                            }

                            $mVendorArray = array(
                                'sl' => $mCountTow,
                                'vendor_id' => $mRecord['id'],
                                'company' => $mRecord['company_name'],
                                'email' => $mRecord['email'],
                                'contact_number' => $mRecord['contact_number'],
                                'location' => $mRecord['location'],
                                'tow_id' => $mTowsIds[$key],
                                'tow_name' => $value,
                                'financial_categorizarion' => $mFc,
                                'pq_id' => $mPqId,
                                'pq_score' => $mPqTotalScore,
                                'fb_score' => $mFeedbackScore,
                                'fb_data' => $mFormRecord,
                                'date' => $mPqDate
                            );

                            $mCuratedVendors[] = $mVendorArray;
                        }
                    }
                }
            }
            //echo "<pre>";
            //print_r($mCuratedVendors);
            //exit;
            $data['mRecords'] = $mCuratedVendors;
            $this->load->view('buyer/filter_gpl', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionFilterGplDataProcess() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "process";
            if ($this->input->post('zone_filter')) {
                $data['zone'] = $this->input->post('zone_filter');
            } else {
                $data['zone'] = $mSessionZone;
            }
            if ($this->input->post('fc_filter')) {
                $data['fc'] = $this->input->post('fc_filter');
            } else {
                $data['fc'] = "All";
            }
            if ($this->input->post('score_filter')) {
                $data['scoretype'] = $this->input->post('score_filter');
            } else {
                $data['scoretype'] = "All";
            }
            if ($this->input->post('nature_of_business')) {
                $data['nob'] = $this->input->post('nature_of_business');
                $mNob = $this->input->post('nature_of_business');
            } else {
                $data['nob'] = $mNob;
            }
            if ($this->input->post('type_of_work')) {
                $data['tow'] = $this->input->post('type_of_work');
                $mTow = $this->input->post('type_of_work');
            } else {
                $data['tow'] = $mTow;
            }
            $data['getVendor'] = $this->register->getVendor();
            if ($mNob == "All") {
                $data['packages'] = $this->register->getAllWorksForProcess();
            } else {
                $data['packages'] = $this->register->getAllWorks($mNob);
            }

            //echo $data['tow'];


            $mRecords = $this->vendor->getStageOneVendorsForGpl($data['zone'], $data['tow'], $data['nob']);

            //Create GPL Vendor Data
            $mCount = 0;
            $mFc = "";
            $mFeedbackScore = "";
            $mCountTow = 0;
            $mCuratedVendors = array();
            foreach ($mRecords as $key => $mRecord) {
                $mCount++;
                $mStageOneAdded = strtotime($mRecord['created_at']);
                $mStageOneAdded = date("d-m-Y H:i:s", $mStageOneAdded);
                if ($mRecord['pr']) {
                    $mPrRecord = $this->buyer->getParentByKey($mRecord['pr']);
                } else {
                    $mPrRecord = "";
                }
                $mGetWork = $this->buyer->getTypeOfWork($mRecord['type_of_work_id']);

                if ($mRecord['nature_of_business_id'] == 1) {
                    if (empty($mStageTwo)) {
                        //echo $mRecord['turn_over_of_last_3years'] * 0.5;
                        if ($mRecord['turn_over_of_last_3years'] * 0.5 < 10) {
                            $mFc = "Very Small";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 10 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 50) {
                            $mFc = "Small";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 50 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 100) {
                            $mFc = "Medium";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 100 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 150) {
                            $mFc = "Large";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 150) {
                            $mFc = "Very Large";
                        }
                    } else {
                        $mStageTwoTurn = json_decode($mStageTwo['stv_turnover']);
                        $mStageTwoTurn = array_sum($mStageTwoTurn) / 4;
                        $mStageTwoTurn = $mStageTwoTurn * 0.5;
                        if ($mStageTwoTurn * 10000000 < 50000000) {
                            $mFc = "Very Small";
                        } else if ($mStageTwoTurn * 10000000 > 50000000 && $mStageTwoTurn * 10000000 <= 250000000) {
                            $mFc = "Small";
                        } else if ($mStageTwoTurn * 10000000 > 250000000 && $mStageTwoTurn * 10000000 <= 500000000) {
                            $mFc = "Medium";
                        } else if ($mStageTwoTurn * 10000000 > 500000000 && $mStageTwoTurn * 10000000 <= 1000000000) {
                            $mFc = "Large";
                        } else if ($mStageTwoTurn * 10000000 > 1000000000) {
                            $mFc = "Very Large";
                        }
                    }
                } else if ($mRecord['nature_of_business_id'] == 2) {
                    if (empty($mStageTwo)) {
                        if ($mRecord['turn_over_of_last_3years'] * 0.5 < 10) {
                            $mFc = "Very Small";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 10 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 50) {
                            $mFc = "Small";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 50 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 100) {
                            $mFc = "Medium";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 100 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 150) {
                            $mFc = "Large";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 150) {
                            $mFc = "Very Large";
                        }
                    } else {
                        $mStageTwoTurn = json_decode($mStageTwo['stc_turnover']);
                        $mStageTwoTurn = array_sum($mStageTwoTurn) / 4;
                        $mStageTwoTurn = $mStageTwoTurn * 0.5;
                        if ($mStageTwoTurn * 10000000 < 10000000) {
                            $mFc = "Very Small";
                        } else if ($mStageTwoTurn * 10000000 > 10000000 && $mStageTwoTurn * 10000000 <= 500000000) {
                            $mFc = "Small";
                        } else if ($mStageTwoTurn * 10000000 > 500000000 && $mStageTwoTurn * 10000000 <= 1000000000) {
                            $mFc = "Medium";
                        } else if ($mStageTwoTurn * 10000000 > 1000000000 && $mStageTwoTurn * 10000000 <= 1500000000) {
                            $mFc = "Large";
                        } else if ($mStageTwoTurn * 10000000 > 1500000000) {
                            $mFc = "Very Large";
                        }
                    }
                } else if ($mRecord['nature_of_business_id'] == 3) {
                    if (empty($mStageTwo)) {
                        if ($mRecord['turn_over_of_last_3years'] * 0.5 < 5) {
                            $mFc = "Very Small";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 5 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 25) {
                            $mFc = "Small";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 25 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 50) {
                            $mFc = "Medium";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 50 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 100) {
                            $mFc = "Large";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 100) {
                            $mFc = "Very Large";
                        }
                    } else {
                        $mStageTwoTurn = json_decode($mStageTwo['stc_turnover']);
                        $mStageTwoTurn = ($mStageTwoTurn[0] + $mStageTwoTurn[1] + $mStageTwoTurn[2]) / 3;
                        $mStageTwoTurn = $mStageTwoTurn * 0.5;
                        if ($mStageTwoTurn * 10000000 < 50000000) {
                            $mFc = "Very Small";
                        } else if ($mStageTwoTurn * 10000000 > 50000000 && $mStageTwoTurn * 10000000 <= 250000000) {
                            $mFc = "Small";
                        } else if ($mStageTwoTurn * 10000000 > 250000000 && $mStageTwoTurn * 10000000 <= 500000000) {
                            $mFc = "Medium";
                        } else if ($mStageTwoTurn * 10000000 > 500000000 && $mStageTwoTurn * 10000000 <= 1000000000) {
                            $mFc = "Large";
                        } else if ($mStageTwoTurn * 10000000 > 1000000000) {
                            $mFc = "Very Large";
                        }
                    }
                } else {
                    if (empty($mStageTwo)) {
                        if ($mRecord['turn_over_of_last_3years'] * 0.5 < 10) {
                            $mFc = "Very Small";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 10 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 50) {
                            $mFc = "Small";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 50 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 100) {
                            $mFc = "Medium";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 100 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 150) {
                            $mFc = "Large";
                        } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 150) {
                            $mFc = "Very Large";
                        }
                    } else {
                        $mStageTwoTurn = json_decode($mStageTwo['stc_turnover']);
                        $mStageTwoTurn = ($mStageTwoTurn[0] + $mStageTwoTurn[1] + $mStageTwoTurn[2]) / 3;
                        $mStageTwoTurn = $mStageTwoTurn * 0.5;
                        if ($mStageTwoTurn * 10000000 < 10000000) {
                            $mFc = "Very Small";
                        } else if ($mStageTwoTurn * 10000000 > 10000000 && $mStageTwoTurn * 10000000 <= 500000000) {
                            $mFc = "Small";
                        } else if ($mStageTwoTurn * 10000000 > 500000000 && $mStageTwoTurn * 10000000 <= 1000000000) {
                            $mFc = "Medium";
                        } else if ($mStageTwoTurn * 10000000 > 1000000000 && $mStageTwoTurn * 10000000 <= 1500000000) {
                            $mFc = "Large";
                        } else if ($mStageTwoTurn * 10000000 > 1500000000) {
                            $mFc = "Very Large";
                        }
                    }
                }
                $mFeedback = $this->feedback->getParentByVendorKey($mRecord['id']);
                if (!empty($mFeedback)) {
                    $mFormRecord = $this->feedbackforms->getAllParentByTypeAndFeedbackId($mFeedback['feedback_id']);
                    if (!empty($mFormRecord)) {
                        $mTotalScore = 0;
                        foreach ($mFormRecord as $key => $value) {
                            $mTotalScore += $value['ff_final_score'];
                        }
                        $mFeedbackScore = $mTotalScore / count($mFormRecord);
                    } else {
                        $mFeedbackScore = "-";
                    }
                } else {
                    $mFeedbackScore = "-";
                }

                if ($mRecord['active'] == 2) {
                    if ($data['tow'] != "All" && $data['tow'] != "66" && $data['tow'] != "67" && $data['tow'] != "68") {
                        $mTows = json_decode($mRecord['consolidated_tows']);
                        $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                        foreach ($mTows as $key => $value) {
                            $mCountTow++;
                            if ($data['tow'] == $mTowsIds[$key]) {
                                if ($mRecord['nature_of_business_id'] == 1) {
                                    $mPqScore = $this->pqv->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                    $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                                    $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                    $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                } else if ($mRecord['nature_of_business_id'] == 3) {
                                    $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                    $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                                    $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                    $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                } else if ($mRecord['nature_of_business_id'] == 2) {
                                    $mPqScore = array();
                                }

                                if (!empty($mPqScore)) {
                                    if ($mRecord['nature_of_business_id'] == 1) {
                                        $mPqId = $mPqScore['pqv_id'];
                                        $mPqTotalScore = $mPqScore['pqv_total'];
                                        $mPqDate = strtotime($mPqScore['pqv_date_updated']);
                                        $mPqDate = date("d-m-Y H:i:s", $mPqDate);
                                    } else if ($mRecord['nature_of_business_id'] == 3) {
                                        $mPqId = $mPqScore['pqc_id'];
                                        $mPqTotalScore = $mPqScore['pqc_total'];
                                        $mPqDate = strtotime($mPqScore['pqc_date_updated']);
                                        $mPqDate = date("d-m-Y H:i:s", $mPqDate);
                                    } else if ($mRecord['nature_of_business_id'] == 2) {
                                        $mPqId = "";
                                        $mPqTotalScore = "";
                                        $mPqDate = "";
                                    }
                                }

                                $mVendorArray = array(
                                    'sl' => $mCountTow,
                                    'vendor_id' => $mRecord['id'],
                                    'company' => $mRecord['company_name'],
                                    'email' => $mRecord['email'],
                                    'contact_number' => $mRecord['contact_number'],
                                    'location' => $mRecord['location'],
                                    'tow_id' => $mTowsIds[$key],
                                    'tow_name' => $value,
                                    'financial_categorizarion' => $mFc,
                                    'pq_id' => $mPqId,
                                    'pq_score' => $mPqTotalScore,
                                    'fb_score' => $mFeedbackScore,
                                    'fb_data' => $mFormRecord,
                                    'date' => $mPqDate
                                );

                                $mCuratedVendors[] = $mVendorArray;
                            }
                        }
                    } else {

                        $mTows = json_decode($mRecord['consolidated_tows']);
                        $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);

                        foreach ($mTows as $key => $value) {
                            $mCountTow++;
                            if ($mRecord['nature_of_business_id'] == 1) {
                                $mPqScore = $this->pqv->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                                $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                            } else if ($mRecord['nature_of_business_id'] == 3) {
                                $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                                $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                            } else if ($mRecord['nature_of_business_id'] == 2) {
                                $mPqScore = array();
                            }

                            if (!empty($mPqScore)) {
                                if ($mRecord['nature_of_business_id'] == 1) {
                                    $mPqId = $mPqScore['pqv_id'];
                                    $mPqTotalScore = $mPqScore['pqv_total'];
                                    $mPqDate = strtotime($mPqScore['pqv_date_updated']);
                                    $mPqDate = date("d-m-Y H:i:s", $mPqDate);
                                } else if ($mRecord['nature_of_business_id'] == 3) {
                                    $mPqId = $mPqScore['pqc_id'];
                                    $mPqTotalScore = $mPqScore['pqc_total'];
                                    $mPqDate = strtotime($mPqScore['pqc_date_updated']);
                                    $mPqDate = date("d-m-Y H:i:s", $mPqDate);
                                } else if ($mRecord['nature_of_business_id'] == 2) {
                                    $mPqId = "";
                                    $mPqTotalScore = "";
                                    $mPqDate = "";
                                }
                            }

                            $mVendorArray = array(
                                'sl' => $mCountTow,
                                'vendor_id' => $mRecord['id'],
                                'company' => $mRecord['company_name'],
                                'email' => $mRecord['email'],
                                'contact_number' => $mRecord['contact_number'],
                                'location' => $mRecord['location'],
                                'tow_id' => $mTowsIds[$key],
                                'tow_name' => $value,
                                'financial_categorizarion' => $mFc,
                                'pq_id' => $mPqId,
                                'pq_score' => $mPqTotalScore,
                                'fb_score' => $mFeedbackScore,
                                'fb_data' => $mFormRecord,
                                'date' => $mPqDate
                            );

                            $mCuratedVendors[] = $mVendorArray;
                        }
                    }
                }
            }
            $data['mRecords'] = $mCuratedVendors;
            $this->load->view('buyer/filter_gpl_process', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function listFeedback() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "home";
            $this->load->view('buyer/list_feedback', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionFilterDataFromDashboard() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "home";
            $this->load->view('buyer/filter_data_from_dash', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function shortListingData() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "process";
            $data['getVendor'] = $this->register->getVendor();
            $data['getlocation'] = $this->register->getLocation();
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['mRecords'] = $this->feedback->getAllParentByZone($mSessionZone);
//$this->load->view('buyer/shortlisting_data_procurement', $data);
            $this->load->view('buyer/shortlisting_data', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function approveShortlisting($mEoiId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mEoiId) {
            $data['home'] = "process";
            $data['getVendor'] = $this->register->getVendor();
            $data['getlocation'] = $this->register->getLocation();
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['records'] = $this->feedback->getAllParentByZone($mSessionZone);
            $data['mEoi'] = $this->eoi->getParentByKey($mEoiId);
            $data['mShort'] = $this->short->getParentByEoiKey($mEoiId);
            $mApproversSelected = json_decode($data['mShort']['s_approvers']);
            $mReturnUsersData = array();
            foreach ($mApproversSelected as $key => $value) {
                if ($mSessionKey == $value) {
                    break;
                } else {
                    $mBuyer = $this->buyer->getParentByKey($value);
                    $mReturnUsersData[] = $mBuyer;
                }
            }
            if (empty($mReturnUsersData)) {
                $mBuyer = $this->buyer->getParentByKey($data['mShort']['s_buyer_id']);
                $mReturnUsersData[] = $mBuyer;
            }
            $data['returnBuyersList'] = $mReturnUsersData;
            $this->load->view('buyer/shortlisting_approve', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function approveShortlistingProcurement($mEoiId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mEoiId) {
            $data['home'] = "process";
            $data['getVendor'] = $this->register->getVendor();
            $data['getlocation'] = $this->register->getLocation();
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['records'] = $this->feedback->getAllParentByZone($mSessionZone);
            $data['mEoi'] = $this->eoi_pro->getParentByKey($mEoiId);
            $data['mShort'] = $this->shortpro->getParentByEoiKey($mEoiId);
            $this->load->view('buyer/shortlisting_approve_procurement', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionChangeStatusShort($mId, $mEoiId, $mStatus) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mEoiId) {
            $data['home'] = "process";
            $mShort = $this->short->getParentByKey($mId);
            $mEoiData = $this->eoi->getParentByKey($mEoiId);
            $mBuyersApprovers = json_decode($mShort['s_approvers']);
            $mBuyersAccepted = json_decode($mShort['s_approved_by']);
            $mBuyersRejected = json_decode($mShort['s_rejected_by']);

            $mProjectData = $this->projects->getParentByKey($mEoiData['eoi_project']);
            $mProjectName = $mProjectData['project_name'];
            $mApprovers = array_filter($this->input->post('s_approvers'));
            $mTow = $this->register->getWorkById($mEoiData['eoi_tow']);
            $mTowName = $mTow['name'];

            $mNextAppr = count($mBuyersAccepted) + 1;

            if (empty($mBuyersAccepted)) {
                $mBuyersAccepted = array();
                $mBuyersAccepted[] = $mSessionKey;
            } else {
                $mSessionArrayAcc = array();
                $mSessionArrayAcc[] = $mSessionKey;
                $mBuyersAccepted = array_merge($mBuyersAccepted, $mSessionArrayAcc);
            }

            if (empty($mBuyersRejected)) {
                $mBuyersRejected = array();
                $mBuyersRejected[] = $mSessionKey;
            } else {
                $mBuyersRejectedAcc = array();
                $mBuyersRejectedAcc[] = $mSessionKey;
                $mBuyersRejected = array_merge($mBuyersRejected, $mBuyersRejectedAcc);
            }

            if ($mStatus == 1) {

                $mBuyerData = $this->buyer->getParentByKey($mBuyersApprovers[$mNextAppr]);
                $mBuyerName = $mBuyerData['buyer_name'];
                $mBuyerEmail = $mBuyerData['buyer_email'];
                $wSubject = "Shortlisting Approval";
                $wMessage = "
<html>
<head>
</head>
<body>
<h3>Dear $mBuyerName,</h3>
<p>
Request your approval for Bidder list of $mTowName for $mProjectName, $mSessionZone.
</p>
<h4>Regards, <br> Contracts & Procurement Team <br> " . COMPANY_NAME . "</h4>
</body>
</html>";
                $mSendMail = $this->wSendMail($mBuyerEmail, $wSubject, $wMessage);

                $shortdata = array(
                    's_approved_by' => json_encode($mBuyersAccepted),
                    's_date_updated' => date("Y-m-d H:i:s"),
                );
                $mUpdate = $this->short->updateParentByKey($mId, $shortdata);
                if ($mUpdate == true) {
                    if (count($mBuyersAccepted) == count($mBuyersApprovers)) {
                        $eoidata = array(
                            'eoi_status' => 9,
                            'eoi_date_updated' => date("Y-m-d H:i:s"),
                        );
                        $this->eoi->updateParentByKey($mEoiId, $eoidata);
                        $this->session->set_flashdata('success', 'Approved successfully.');
                    } else {
                        $this->session->set_flashdata('success', 'Approved successfully.');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
                }
            } else {
                $shortdata = array(
                    's_rejected_by' => json_encode($mBuyersRejected),
                    's_date_updated' => date("Y-m-d H:i:s"),
                );
                $mUpdate = $this->short->updateParentByKey($mId, $shortdata);
                if ($mUpdate == true) {
                    if (count($mBuyersAccepted) == count($mBuyersApprovers)) {
                        $eoidata = array(
                            'eoi_status' => 11,
                            'eoi_date_updated' => date("Y-m-d H:i:s"),
                        );
                        $this->eoi->updateParentByKey($mEoiId, $eoidata);
                        $this->session->set_flashdata('success', 'Rejected successfully.');
                    } else {
                        $this->session->set_flashdata('success', 'Rejected successfully.');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
                }
            }
            redirect('buyer/vendor/shortlisting/' . $mEoiData['eoi_project'] . "/" . $mEoiData['eoi_zone'] . "/" . $mEoiData['eoi_type'] . "/" . $mEoiData['eoi_for'] . "/" . $mEoiData['eoi_tow']);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionReturnApproval($mId, $mEoiId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mEoiId) {
            $data['home'] = "process";
            $mShort = $this->short->getParentByKey($mId);
            $mEoiData = $this->eoi->getParentByKey($mEoiId);
            $shortdata = array(
                's_returned_by' => $mSessionKey,
                's_returned_to' => $this->input->post('s_returned_to'),
                's_returned_comment_from' => $this->input->post('s_returned_comment_from'),
                's_returned_comment_to' => $this->input->post('s_returned_comment_to'),
                's_date_updated' => date("Y-m-d H:i:s"),
            );
            $mUpdate = $this->short->updateParentByKey($mId, $shortdata);
            if ($mUpdate == true) {
                $eoidata = array(
                    'eoi_status' => 11,
                    'eoi_date_updated' => date("Y-m-d H:i:s"),
                );
                $this->eoi->updateParentByKey($mEoiId, $eoidata);
                $this->session->set_flashdata('success', 'Returned successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
            }
            redirect('buyer/vendor/shortlisting/' . $mEoiData['eoi_project'] . "/" . $mEoiData['eoi_zone'] . "/" . $mEoiData['eoi_type'] . "/" . $mEoiData['eoi_for'] . "/" . $mEoiData['eoi_tow']);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionReApproval($mId, $mEoiId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mEoiId) {
            $data['home'] = "process";
            $mShort = $this->short->getParentByKey($mId);
            $mEoiData = $this->eoi->getParentByKey($mEoiId);
            $shortdata = array(
                's_returned_comment_to' => $this->input->post('s_returned_comment_to'),
                's_date_updated' => date("Y-m-d H:i:s"),
            );
            $mUpdate = $this->short->updateParentByKey($mId, $shortdata);
            if ($mUpdate == true) {
                $eoidata = array(
                    'eoi_status' => 2,
                    'eoi_date_updated' => date("Y-m-d H:i:s"),
                );
                $this->eoi->updateParentByKey($mEoiId, $eoidata);
                $this->session->set_flashdata('success', 'Returned successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
            }
            redirect('buyer/vendor/shortlisting/' . $mEoiData['eoi_project'] . "/" . $mEoiData['eoi_zone'] . "/" . $mEoiData['eoi_type'] . "/" . $mEoiData['eoi_for'] . "/" . $mEoiData['eoi_tow']);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionChangeStatusShortProcurement($mId, $mEoiId, $mStatus) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mEoiId) {
            $data['home'] = "process";
            $mShort = $this->shortpro->getParentByKey($mId);
            $mEoiData = $this->eoi_pro->getParentByKey($mEoiId);
            $mBuyersApprovers = json_decode($mShort['s_approvers']);
            $mBuyersAccepted = json_decode($mShort['s_approved_by']);
            $mBuyersRejected = json_decode($mShort['s_rejected_by']);

            if (empty($mBuyersAccepted)) {
                $mBuyersAccepted = array();
                $mBuyersAccepted[] = $mSessionKey;
            } else {
                $mSessionArrayAcc = array();
                $mSessionArrayAcc[] = $mSessionKey;
                $mBuyersAccepted = array_merge($mBuyersAccepted, $mSessionArrayAcc);
            }

            if (empty($mBuyersRejected)) {
                $mBuyersRejected = array();
                $mBuyersRejected[] = $mSessionKey;
            } else {
                $mBuyersRejectedAcc = array();
                $mBuyersRejectedAcc[] = $mSessionKey;
                $mBuyersRejected = array_merge($mBuyersRejected, $mBuyersRejectedAcc);
            }

            if ($mStatus == 1) {
                $shortdata = array(
                    's_approved_by' => json_encode($mBuyersAccepted),
                    's_date_updated' => date("Y-m-d H:i:s"),
                );
                $mUpdate = $this->shortpro->updateParentByKey($mId, $shortdata);
                if ($mUpdate == true) {
                    if (count($mBuyersAccepted) == count($mBuyersApprovers)) {
                        $eoidata = array(
                            'eoi_status' => 9,
                            'eoi_date_updated' => date("Y-m-d H:i:s"),
                        );
                        $this->eoi->updateParentByKey($mEoiId, $eoidata);
                        $this->session->set_flashdata('success', 'Approved successfully.');
                    } else {
                        $this->session->set_flashdata('success', 'Approved successfully.');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
                }
            } else {
                $shortdata = array(
                    's_rejected_by' => json_encode($mBuyersRejected),
                    's_date_updated' => date("Y-m-d H:i:s"),
                );
                $mUpdate = $this->shortpro->updateParentByKey($mId, $shortdata);
                if ($mUpdate == true) {
                    if (count($mBuyersAccepted) == count($mBuyersApprovers)) {
                        $eoidata = array(
                            'eoi_status' => 9,
                            'eoi_date_updated' => date("Y-m-d H:i:s"),
                        );
                        $this->eoi->updateParentByKey($mEoiId, $eoidata);
                        $this->session->set_flashdata('success', 'Approved successfully.');
                    } else {
                        $this->session->set_flashdata('success', 'Approved successfully.');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
                }
            }
            redirect('buyer/vendor/shortlistingProcurement/' . $mEoiData['eoi_project'] . "/" . $mEoiData['eoi_zone'] . "/" . $mEoiData['eoi_type'] . "/" . $mEoiData['eoi_for'] . "/" . $mEoiData['eoi_tow'] . "/" . "1");
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionReturnApprovalProcurement($mId, $mEoiId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mEoiId) {
            $data['home'] = "process";
            $mShort = $this->short->getParentByKey($mId);
            $mEoiData = $this->eoi->getParentByKey($mEoiId);
            $shortdata = array(
                's_returned_by' => $mSessionKey,
                's_returned_to' => $this->input->post('s_returned_to'),
                's_returned_comment_from' => $this->input->post('s_returned_comment_from'),
                's_returned_comment_to' => $this->input->post('s_returned_comment_to'),
                's_date_updated' => date("Y-m-d H:i:s"),
            );
            $mUpdate = $this->short->updateParentByKey($mId, $shortdata);
            if ($mUpdate == true) {
                $eoidata = array(
                    'eoi_status' => 11,
                    'eoi_date_updated' => date("Y-m-d H:i:s"),
                );
                $this->eoi->updateParentByKey($mEoiId, $eoidata);
                $this->session->set_flashdata('success', 'Returned successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
            }
            redirect('buyer/vendor/shortlisting/' . $mEoiData['eoi_project'] . "/" . $mEoiData['eoi_zone'] . "/" . $mEoiData['eoi_type'] . "/" . $mEoiData['eoi_for'] . "/" . $mEoiData['eoi_tow']);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionReApprovalProcurement($mId, $mEoiId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mEoiId) {
            $data['home'] = "process";
            $mShort = $this->short->getParentByKey($mId);
            $mEoiData = $this->eoi->getParentByKey($mEoiId);
            $shortdata = array(
                's_returned_comment_to' => $this->input->post('s_returned_comment_to'),
                's_date_updated' => date("Y-m-d H:i:s"),
            );
            $mUpdate = $this->short->updateParentByKey($mId, $shortdata);
            if ($mUpdate == true) {
                $eoidata = array(
                    'eoi_status' => 2,
                    'eoi_date_updated' => date("Y-m-d H:i:s"),
                );
                $this->eoi->updateParentByKey($mEoiId, $eoidata);
                $this->session->set_flashdata('success', 'Returned successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
            }
            redirect('buyer/vendor/shortlisting/' . $mEoiData['eoi_project'] . "/" . $mEoiData['eoi_zone'] . "/" . $mEoiData['eoi_type'] . "/" . $mEoiData['eoi_for'] . "/" . $mEoiData['eoi_tow']);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function process() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "process";
            $data['getVendor'] = $this->register->getVendor();
            $data['getlocation'] = $this->register->getLocation();
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['zone'] = $mSessionZone;
            $data['records'] = $this->feedback->getAllParentByZone($mSessionZone);
            $this->load->view('buyer/process', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function filterPcmDashboard() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "process";
            $data['getVendor'] = $this->register->getVendor();
            $data['getlocation'] = $this->register->getLocation();
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['records'] = $this->feedback->getAllParentByZone($mSessionZone);
            $this->load->view('buyer/process', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function selectProject($param) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "process";
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['zone'] = $param;
            $data['records'] = $this->projects->getAllParentByZone($param);
            $data['pms'] = $this->buyer->getAllParentByZoneAndRole($param, "Project Manager");
            $data['pcms'] = $this->buyer->getAllParentByZoneAndRole($param, "PCM");
            $data['pds'] = $this->buyer->getAllParentByZoneAndRole($param, "Project Director");
            $this->load->view('buyer/select_project', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function selectProjectByUser($param) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "process";
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['zone'] = $param;
            $data['pms'] = $this->buyer->getAllParentByZoneAndRole($mSessionZone, "Project Manager");
            $data['pcms'] = $this->buyer->getAllParentByZoneAndRole($mSessionZone, "PCM");
            $data['pds'] = $this->buyer->getAllParentByZoneAndRole($mSessionZone, "Project Director");
            $data['records'] = $this->projects->getAllParentByZoneAndUser($mSessionZone);
            $this->load->view('buyer/select_project_user', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function vendorLogs($mProjectId, $mZone) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "process";
            $data['zone'] = $mZone;
            $data['project'] = $this->projects->getParentByKey($mProjectId);
            $data['records'] = $this->vendorlog->getParentByProjectAndZone($mProjectId, $mZone);
            $this->load->view('buyer/vendor_logs', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function viewAllVendorLogs($mZone = null) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "process";
            $data['zone'] = $mZone;
            $data['project'] = $this->projects->getParentByKey($mProjectId);
            if ($mZone) {
                $data['records'] = $this->vendorlog->getAllParentByZone($mZone);
                $data['projects'] = $this->projects->getAllParentByZone($mZone);
                //print_r($data['projects']);exit;
                $this->load->view('buyer/vendor_logs_others', $data);
            } else {
                $data['records'] = $this->vendorlog->getAllParent();
                $this->load->view('buyer/vendor_logs_others_all', $data);
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function viewAllVendorLogsFilter() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "process";
            $mZone = $this->input->post('zone');
            $mProject = $this->input->post('project');
            $mStatus = $this->input->post('status');
            $mFrom = $this->input->post('from');
            $mTo = $this->input->post('to');
            $mCriticality = $this->input->post('criticality');
            $data['records'] = $this->vendorlog->getAllParentByFilter($mZone, $mProject, $mStatus, $mFrom, $mTo, $mCriticality);
            $data['zone'] = $mZone;
            $data['project'] = $mProject;
            $data['status'] = $mStatus;
            $data['from'] = $mFrom;
            $data['to'] = $mTo;
            $data['criticality'] = $mCriticality;
            $data['projects'] = $this->projects->getAllParentByZone($mZone);
            if ($mZone) {
                //$data['records'] = $this->vendorlog->getAllParentByZone($mZone);
                $data['projects'] = $this->projects->getAllParentByZone($mZone);
                //print_r($data['projects']);exit;
                $this->load->view('buyer/vendor_logs_others', $data);
            } else {
                $data['records'] = $this->vendorlog->getAllParent();
                $this->load->view('buyer/vendor_logs_others_all', $data);
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function viewAllVendorLogsFilterAll() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "process";
            $mZone = $this->input->post('zone');
            $mProject = $this->input->post('project');
            $mStatus = $this->input->post('status');
            $mFrom = $this->input->post('from');
            $mTo = $this->input->post('to');
            $mCriticality = $this->input->post('criticality');
            $data['records'] = $this->vendorlog->getAllParentByFilter($mZone, $mProject, $mStatus, $mFrom, $mTo, $mCriticality);
            $data['zone'] = $mZone;
            $data['project'] = $mProject;
            $data['status'] = $mStatus;
            $data['from'] = $mFrom;
            $data['to'] = $mTo;
            $data['criticality'] = $mCriticality;
            $data['projects'] = $this->projects->getAllParentByZone($mZone);
            //$data['records'] = $this->vendorlog->getAllParent();
            $this->load->view('buyer/vendor_logs_others_all', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function addVendorLog($mProjectId, $mZone) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "process";
            $data['zone'] = $mZone;
            $data['project'] = $this->projects->getParentByKey($mProjectId);
            $data['vendors'] = $this->vendor->getStageOneVendorsForAssigned($mZone);
            $data['packages'] = $this->buyer->getAllTowsForVendorLogs();
            $this->load->view('buyer/vendor_logs_add', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionAddVendorLog($mProjectId, $mZone) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $mData = array(
                'vl_buyer_id' => $mSessionKey,
                'vl_zone' => $mZone,
                'vl_project' => $mProjectId,
                'vl_package' => $this->input->post('vl_package'),
                'vl_vendor' => $this->input->post('vl_vendor'),
                'vl_date' => $this->input->post('vl_date'),
                'vl_issue' => $this->input->post('vl_issue'),
                'vl_pain' => $this->input->post('vl_pain'),
                'vl_criticality' => $this->input->post('vl_criticality'),
                'vl_date_added' => date("Y-m-d H:i:s"),
                'vl_date_updated' => date("Y-m-d H:i:s"),
            );
            $mActionAdd = $this->vendorlog->addParent($mData);
            if ($mActionAdd == true) {
                $this->session->set_flashdata('success', 'Vendor Log added successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('buyer/vendor/vendorLogs/' . $mProjectId . "/" . $mZone);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function changeLogStatus($mId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mId) {
            $mLog = $this->vendorlog->getParentByKey($mId);
            $data = array(
                'vl_status' => $this->input->post('vl_status'),
                'vl_status_toggle' => $this->input->post('vl_status_toggle'),
                'vl_criticality' => $this->input->post('vl_criticality'),
                'vl_date_updated' => date("Y-m-d H:i:s"),
            );
            $mUpdate = $this->vendorlog->updateParentByKey($mId, $data);
            if ($mUpdate == true) {
                $this->session->set_flashdata('success', 'Status updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
            }
            redirect('buyer/vendor/vendorLogs/' . $mLog['vl_project'] . "/" . $mLog['vl_zone']);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function changeLogStatusForZone($mId, $mZone) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mId) {
            $mLog = $this->vendorlog->getParentByKey($mId);
            $data = array(
                'vl_status' => $this->input->post('vl_status'),
                'vl_status_toggle' => $this->input->post('vl_status_toggle'),
                'vl_criticality' => $this->input->post('vl_criticality'),
                'vl_date_updated' => date("Y-m-d H:i:s"),
            );
            $mUpdate = $this->vendorlog->updateParentByKey($mId, $data);
            if ($mUpdate == true) {
                $this->session->set_flashdata('success', 'Status updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
            }
            $data['zone'] = $mZone;
            redirect('buyer/vendor/viewAllVendorLogs/' . $mZone);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function changeLogStatusForZoneAll($mId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mId) {
            $mLog = $this->vendorlog->getParentByKey($mId);
            $data = array(
                'vl_status' => $this->input->post('vl_status'),
                'vl_status_toggle' => $this->input->post('vl_status_toggle'),
                'vl_criticality' => $this->input->post('vl_criticality'),
                'vl_date_updated' => date("Y-m-d H:i:s"),
            );
            $mUpdate = $this->vendorlog->updateParentByKey($mId, $data);
            if ($mUpdate == true) {
                $this->session->set_flashdata('success', 'Status updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
            }
            redirect('buyer/vendor/viewAllVendorLogs');
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionChangeLogPainStatus($mId, $mPain) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mId) {
            $mLog = $this->vendorlog->getParentByKey($mId);
            if ($mPain == "1") {
                $mPain = "Pain to GPL";
            } else {
                $mPain = "Pain to Contractor";
            }

            $eoidata = array(
                'vl_pain' => $mPain,
                'vl_date_updated' => date("Y-m-d H:i:s"),
            );
            $mUpdate = $this->vendorlog->updateParentByKey($mId, $eoidata);
            if ($mUpdate == true) {
                $this->session->set_flashdata('success', 'Updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
            }
            redirect('buyer/vendor/vendorLogs/' . $mLog['vl_project'] . "/" . $mLog['vl_zone']);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function addNewProject($zone) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $mCheck = $this->projects->getParentByProjectNameAndOrg($this->input->post('project'), $this->input->post('purchase'));
            if (empty($mCheck)) {
                $mData = array(
                    'project_zone' => $this->input->post('zone'),
                    'project_name' => $this->input->post('project'),
                    'project_purchase' => $this->input->post('purchase'),
                    'project_bua' => $this->input->post('bua'),
                    'project_towers' => $this->input->post('towers'),
                    'project_building' => $this->input->post('building'),
                    'project_pm' => $this->input->post('pm'),
                    'project_pcm' => $this->input->post('pcm'),
                    'project_pd' => $this->input->post('pd'),
                    'project_date_added' => date("Y-m-d H:i:s"),
                    'project_date_updated' => date("Y-m-d H:i:s"),
                );
                $mActionAdd = $this->projects->addParent($mData);
                if ($mActionAdd == true) {
                    $this->session->set_flashdata('success', 'Project added successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                }
            } else {
                $this->session->set_flashdata('error', 'Project already exists with same purchase organisation.');
            }
            redirect('buyer/vendor/selectProject/' . $zone);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function addNewProjectByUser($zone) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        $mSessionRole = $this->session->userdata('session_role');
        if ($mSessionKey) {
            if ($mSessionRole == "PCM") {
                $mData = array(
                    'project_pcm' => $mSessionKey,
                    'project_zone' => $zone,
                    'project_name' => $this->input->post('project'),
                    'project_purchase' => $this->input->post('purchase'),
                    'project_bua' => $this->input->post('bua'),
                    'project_towers' => $this->input->post('towers'),
                    'project_building' => $this->input->post('building'),
                    'project_date_added' => date("Y-m-d H:i:s"),
                    'project_date_updated' => date("Y-m-d H:i:s"),
                );
            }
            if ($mSessionRole == "Project Manager") {
                $mData = array(
                    'project_pm' => $mSessionKey,
                    'project_zone' => $zone,
                    'project_name' => $this->input->post('project'),
                    'project_purchase' => $this->input->post('purchase'),
                    'project_bua' => $this->input->post('bua'),
                    'project_towers' => $this->input->post('towers'),
                    'project_building' => $this->input->post('building'),
                    'project_date_added' => date("Y-m-d H:i:s"),
                    'project_date_updated' => date("Y-m-d H:i:s"),
                );
            }
            if ($mSessionRole == "Project Director") {
                $mData = array(
                    'project_pd' => $mSessionKey,
                    'project_zone' => $zone,
                    'project_name' => $this->input->post('project'),
                    'project_purchase' => $this->input->post('purchase'),
                    'project_bua' => $this->input->post('bua'),
                    'project_towers' => $this->input->post('towers'),
                    'project_building' => $this->input->post('building'),
                    'project_date_added' => date("Y-m-d H:i:s"),
                    'project_date_updated' => date("Y-m-d H:i:s"),
                );
            }

            $mActionAdd = $this->projects->addParent($mData);
            if ($mActionAdd == true) {
                $this->session->set_flashdata('success', 'Project added successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('buyer/vendor/selectProjectByUser/' . $zone);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function addNewProjectFromLink() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $mCheck = $this->projects->getParentByProjectNameAndOrg($this->input->post('project'), $this->input->post('purchase'));
            if (empty($mCheck)) {
                $mData = array(
                    'project_zone' => $this->input->post('zone'),
                    'project_name' => $this->input->post('project'),
                    'project_purchase' => $this->input->post('purchase'),
                    'project_bua' => $this->input->post('bua'),
                    'project_towers' => $this->input->post('towers'),
                    'project_building' => $this->input->post('building'),
                    'project_pm' => json_encode($this->input->post('pm')),
                    'project_pcm' => json_encode($this->input->post('pcm')),
                    'project_pd' => json_encode($this->input->post('pd')),
                    'project_date_added' => date("Y-m-d H:i:s"),
                    'project_date_updated' => date("Y-m-d H:i:s"),
                );
                $mActionAdd = $this->projects->addParent($mData);
                if ($mActionAdd == true) {
                    $this->session->set_flashdata('success', 'Project added successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                }
            } else {
                $this->session->set_flashdata('error', 'Project already exists with same purchase organisation.');
            }
            redirect('buyer/users/projects');
        } else {
            $this->load->view('index', $data);
        }
    }

    public function addNewPackage($project, $zone, $type, $for) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $mData = array(
                'package_zone' => $zone,
                'package_project' => $project,
                'package_type' => $type,
                'package_selected_id' => $this->input->post('works'),
                'package_misc' => $this->input->post('others'),
                'package_date_added' => date("Y-m-d H:i:s"),
                'package_date_updated' => date("Y-m-d H:i:s"),
            );
            $mActionAdd = $this->packages->addParent($mData);
            if ($mActionAdd == true) {
                $this->session->set_flashdata('success', 'Package added successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('buyer/vendor/selectWork/' . $project . "/" . $zone . "/" . $type . "/" . $for);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function addNewPackageForProcurement($project, $zone, $type, $for, $protype) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $mData = array(
                'package_zone' => $zone,
                'package_project' => $project,
                'package_type' => $type,
                'package_selected_id' => $this->input->post('works'),
                'package_misc' => $this->input->post('others'),
                'package_pro_type' => $protype,
                'package_date_added' => date("Y-m-d H:i:s"),
                'package_date_updated' => date("Y-m-d H:i:s"),
            );
            $mActionAdd = $this->packages->addParent($mData);
            if ($mActionAdd == true) {
                $this->session->set_flashdata('success', 'Package added successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('buyer/vendor/selectPackage/' . $project . "/" . $zone . "/" . $type . "/" . $for . "/" . $protype);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function projectDetails($mKey) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "process";
            $data['record'] = $this->projects->getParentByKey($mKey);
            //print_r($data['record']);exit;
            $this->load->view('buyer/project_details', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function selectWork($project, $zone, $type, $for) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "process";
            $data['works'] = $this->register->getAllWorks($type);
            $data['zone'] = $zone;
            $data['type'] = $type;
            $data['for'] = $for;
            $data['project'] = $this->projects->getParentByKey($project);
            $data['records'] = $this->packages->getAllParentByProjectAndZoneAndType($project, $zone, $type);
            if ($for == "Procurement") {
                $this->load->view('buyer/select_work_pro', $data);
            } else {
                $this->load->view('buyer/select_work', $data);
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function selectPackage($project, $zone, $type, $for, $procureType) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "process";
            $data['works'] = $this->register->getAllWorks($type);
            $data['zone'] = $zone;
            $data['type'] = $type;
            $data['for'] = $for;
            $data['protype'] = $procureType;
            $data['project'] = $this->projects->getParentByKey($project);
            $data['records'] = $this->packages->getAllParentByProjectAndZoneAndTypeAndPro($project, $zone, $type, $procureType);
            $this->load->view('buyer/select_package_pro', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionAddShortlisting($project, $zone, $type, $for, $tow, $procureType) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "short";
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['zone'] = $zone;
            $data['type'] = $type;
            $data['for'] = $for;
            $data['tow'] = $this->register->getWorkById($tow);
            $data['project'] = $this->projects->getParentByKey($project);
            $data['home'] = "vendor";
            $mVendors = $this->vendor->getStageOneVendorsForEoi($zone, $data['tow']['id'], $type);

            $mConsolidated = array();
            foreach ($mVendors as $key => $mRecord) {
                $mCOuntT = 0;
                if ($mRecord['pre_type'] == 1) {
                    $mConsolidated[] = $mRecord;
                } else {
                    if ($mRecord['nature_of_business_id'] == 1) {
                        $mPqScore = $this->pqv->getParentByVendorKey($mRecord['id']);
                        $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mRecord['type_of_work_id']);
                    } else if ($mRecord['nature_of_business_id'] == 3) {
                        $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mRecord['type_of_work_id']);
                        $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mRecord['type_of_work_id']);
                    } else if ($mRecord['nature_of_business_id'] == 2) {
                        $mPqScore = array();
                    }
                    if (!empty($mPqScore)) {
                        $mCOuntT++;
                    }
                    if ($mCOuntT > 0) {
                        $mConsolidated[] = $mRecord;
                    }
                }
            }
            $data['mRecords'] = $mConsolidated;
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['mUsers'] = $this->buyer->getAllParent();
            $data['bris'] = $this->bri->getAllParentByTowKey($tow);
            $data['fiis'] = $this->fii->getAllParentByTowKey($tow);
            $this->load->view('buyer/add_shortlisting_procurement', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionProcess() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "process";
            $this->load->view('buyer/select_process', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function transferred() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "transferred";
            $mVendors = $this->vendor->getAllTransferredVendors();
            $mRecords = array();
            foreach ($mVendors as $key => $mVendor) {
                if ($mVendor['nature_of_business_id'] == 2) {
                    $mSiteVisitReport = $this->svr->getConsultantParentByVendorKey($mVendor['id']);
                    if (!empty($mSiteVisitReport)) {
                        $mRecords[] = array_merge($mVendor, $mSiteVisitReport);
                    } else {
                        $mRecords[] = $mVendor;
                    }
                } else if ($mVendor['nature_of_business_id'] == 3) {
                    $mSiteVisitReport = $this->svrc->getParentByVendorKey($mVendor['id']);
                    if (!empty($mSiteVisitReport)) {
                        $mRecords[] = array_merge($mVendor, $mSiteVisitReport);
                    } else {
                        $mRecords[] = $mVendor;
                    }
                } else {
                    $mSiteVisitReport = $this->svr->getParentByVendorKey($mVendor['id']);
                    if (!empty($mSiteVisitReport)) {
                        $mRecords[] = array_merge($mVendor, $mSiteVisitReport);
                    } else {
                        $mRecords[] = $mVendor;
                    }
                }
            }
            $data['mRecords'] = $mRecords;
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $this->load->view('buyer/manage_vendor_transferred', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

//    public function transferred() {
//        $mSessionKey = $this->session->userdata('session_id');
//        $mSessionZone = $this->session->userdata('session_zone');
//        if ($mSessionKey) {
//            $data['home'] = "transferred";
//            $mVendors = $this->vendor->getStageOneVendorsTransferred($mSessionZone, $mSessionKey);
//            $mRecords = array();
//            foreach ($mVendors as $key => $mVendor) {
//                if ($mVendor['nature_of_business_id'] == 2) {
//                    $mSiteVisitReport = $this->svr->getConsultantParentByVendorKey($mVendor['id']);
//                    if (!empty($mSiteVisitReport)) {
//                        $mRecords[] = array_merge($mVendor, $mSiteVisitReport);
//                    } else {
//                        $mRecords[] = $mVendor;
//                    }
//                } else if ($mVendor['nature_of_business_id'] == 3) {
//                    $mSiteVisitReport = $this->svrc->getParentByVendorKey($mVendor['id']);
//                    if (!empty($mSiteVisitReport)) {
//                        $mRecords[] = array_merge($mVendor, $mSiteVisitReport);
//                    } else {
//                        $mRecords[] = $mVendor;
//                    }
//                } else {
//                    $mSiteVisitReport = $this->svr->getParentByVendorKey($mVendor['id']);
//                    if (!empty($mSiteVisitReport)) {
//                        $mRecords[] = array_merge($mVendor, $mSiteVisitReport);
//                    } else {
//                        $mRecords[] = $mVendor;
//                    }
//                }
//            }
//            $data['mRecords'] = $mRecords;
//            $data['mPrs'] = $this->buyer->getAllParentForPr();
//            $data['mUsers'] = $this->buyer->getAllParent();
//            $this->load->view('buyer/manage_vendor_transferred', $data);
//        } else {
//            $this->load->view('index', $data);
//        }
//    }

    public function feedback() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "feedback";
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            if ($mSessionZone == "HO") {
                $mProjects = $this->projects->getAllParent();
            } else {
                $mProjects = $this->projects->getAllParentByZone($mSessionZone);
            }

            $mTotalFeedbacks = 0;
            $mTotalFeedbackForms = 0;
            foreach ($mProjects as $key => $record) {
                $mFeedbacks = $this->feedback->getAllParentByPurchase($record['project_purchase']);
                if (!empty($mFeedbacks)) {
                    $mTotalFeedbacks += count($mFeedbacks);
                } else {
                    $mTotalFeedbacks += 0;
                }
                $mFeedbackForms = $this->feedbackforms->getAllParentByPurchase($record['project_purchase']);
                if (!empty($mFeedbackForms)) {
                    $mTotalFeedbackForms += count($mFeedbackForms);
                } else {
                    $mTotalFeedbackForms += 0;
                }
            }

            $data['total_feedbacks'] = $mTotalFeedbacks;
            $data['total_feedbackforms'] = $mTotalFeedbackForms;
            $data['records'] = $mProjects;
            $this->load->view('buyer/feedback_buyer_list', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function filterFeedbackByType() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $mSelectedType = $this->input->post('filter');
            if ($mSelectedType == "1") {
                $data['mPrs'] = $this->buyer->getAllParentForPr();
                if ($mSessionZone == "NCR") {
                    $mSessionZone = "North";
                }
                $mPurchaseOrgs = $this->purchase_model->getAllParentByZone($mSessionZone);
                $mCumulatedFeedbacks = array();
                foreach ($mPurchaseOrgs as $key => $mPurchase) {
                    $mGetFeedbacks = $this->feedback->getAllParentByPurchase($mPurchase['porg_code']);
                    if (!empty($mGetFeedbacks)) {
                        foreach ($mGetFeedbacks as $key => $value) {
                            $mCumulatedFeedbacks[] = $value;
                        }
                    }
                }
                $data['records'] = $mCumulatedFeedbacks;
                $this->load->view('buyer/feedback_buyer_list', $data);
            } else {
                $data['mPrs'] = $this->buyer->getAllParentForPr();
                $mVendors = $this->vendor->getAllParentByZone($mSessionZone);
                $mCurated = array();
                foreach ($mVendors as $key => $value) {
                    $mCheckInPre = $this->pre_model->check($value['pan']);
                    if ($mCheckInPre->pre_fb_score) {
                        $mCurated[] = $value;
                    }
                }
                $data['records'] = $mCurated;
                $this->load->view('buyer/feedback_buyer_list_pre', $data);
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function importFile() {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $path = 'uploads/';
            require_once APPPATH . "/third_party/PHPExcel.php";
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls|csv';
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('uploadFile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }

            if (empty($error)) {
                if (!empty($data['upload_data']['file_name'])) {
                    $import_xls_file = $data['upload_data']['file_name'];
                } else {
                    $import_xls_file = 0;
                }

                $inputFileName = $path . $import_xls_file;
                try {
                    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($inputFileName);
                    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    $flag = true;
                    $mCountRows = 0;
                    $mSuccessRows = "";
                    $mFailureRows = "";
                    foreach ($allDataInSheet as $value) {
                        $mCountRows++;
                        if ($flag) {
                            $flag = false;
                            continue;
                        }

                        $mCheck = $this->feedback->getParentByPowo($value['A']);

                        if ($mCountRows > 1) {

                            if ($value['F'] == "00.00.0000") {
                                $value['F'] = "";
                            } else {
                                $value['F'] = $value['F'];
                            }

                            if ($value['G'] == "00.00.0000") {
                                $value['G'] = "";
                            } else {
                                $value['G'] = $value['F'];
                            }

                            $mData = array(
                                'feedback_buyer_id' => $mSessionKey,
                                'feedback_user_type' => $value['K'],
                                'feedback_startdate' => $value['F'],
                                'feedback_enddate' => $value['G'],
                                'feedback_purchase' => $value['O'],
                                'feedback_purchase_group' => $value['P'],
                                'feedback_wo' => $value['A'],
                                'feedback_upload' => "",
                                'feedback_company_code' => $value['Q'],
                                'feedback_wo_details' => $value['S'],
                                'feedback_zone' => $value['N'],
                                'feedback_vendor_code' => $value['H'],
                                'feedback_vendor_details' => $value['I'],
                                'feedback_pan' => $value['L'],
                                'feedback_lfs' => "",
                                'feedback_lfd' => "",
                                'feedback_date_added' => date("Y-m-d H:i:s"),
                                'feedback_date_updated' => date("Y-m-d H:i:s"),
                            );

                            if (empty($mCheck)) {
                                $this->feedback->addParent($mData);
                                $mMessage = $value['A'] . " added successfully.";
                                $mSuccessRows = $mSuccessRows . $mMessage;
                            } else {
                                $mMessage = "Failed, " . $value['A'] . " po already exists.";
                                $mFailureRows = $mFailureRows . $mMessage;
                            }
                        }
                    }
                    $this->session->set_flashdata('success_dump', $mSuccessRows);
                    $this->session->set_flashdata('error_dump', $mFailureRows);
                    redirect('buyer/vendor/feedback');
                } catch (Exception $e) {
                    $this->session->set_flashdata('error', $e->getMessage());
                    redirect('buyer/vendor/feedback');
                }
            } else {
                $this->session->set_flashdata('error', $error['error']);
                redirect('buyer/vendor/feedback');
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function sendFeedbackToPm() {
        $mFeedbackId = $this->input->post('feedback_id');
        $mPrId = $this->input->post('pm');
        if ($mFeedbackId && $mPrId) {
            $userdata = array(
                'feedback_pm' => $mPrId,
                'feedback_pm_date_added' => date('Y-m-d H:i:s'),
                'feedback_date_updated' => date('Y-m-d H:i:s'),
            );
            $mUpdate = $this->feedback->updateParentByKey($mFeedbackId, $userdata);
            if ($mUpdate) {
                $this->session->set_flashdata('success', 'PM assigned successfully.');
                echo "1";
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                echo "0";
            }
        } else {
            $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            echo "0";
        }
    }

    public function transferFeedbackToPm() {
        $mFeedbackId = $this->input->post('feedback_id');
        $mSessionKey = $this->session->userdata('session_id');
        $mPrId = $this->input->post('pm');
        if ($mFeedbackId && $mPrId) {
            $userdata = array(
                'feedback_transfer_from' => $mSessionKey,
                'feedback_transfer' => $mPrId,
                'feedback_transfer_date_added' => date('Y-m-d H:i:s'),
                'feedback_date_updated' => date('Y-m-d H:i:s'),
            );
            $mUpdate = $this->feedback->updateParentByKey($mFeedbackId, $userdata);
            if ($mUpdate) {
                $this->session->set_flashdata('success', 'Feedback transferred successfully.');
                echo "1";
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                echo "0";
            }
        } else {
            $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            echo "0";
        }
    }

    public function addFeedback() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "feedback";
            $data['locations'] = $this->register->getLocation();
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['mPorgs'] = $this->buyer->getAllPorgs();
            $this->load->view('buyer/feedback_add', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function getZoneByPorg() {
        $id = $this->input->post('code');
        if ($id) {
            $mData = $this->buyer->getPorgByKey($id);
            if (!empty($mData)) {
                echo $mData['porg_zone'];
            } else {
                echo "0";
            }
        } else {
            echo "0";
        }
    }

    public function actionFeedbackSave() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $mUpload = $this->input->post('feedback_upload');
            $mUpload = $this->single_File_Upload('feedback_upload', $mUpload);

            $mData = array(
                'feedback_buyer_id' => $mSessionKey,
                'feedback_user_type' => $this->input->post('feedback_user_type'),
                'feedback_startdate' => $this->input->post('feedback_startdate'),
                'feedback_enddate' => $this->input->post('feedback_enddate'),
                'feedback_purchase' => $this->input->post('feedback_purchase'),
                'feedback_purchase_group' => $this->input->post('feedback_purchase_group'),
                'feedback_wo' => $this->input->post('feedback_wo'),
                'feedback_upload' => $mUpload,
                'feedback_company_code' => $this->input->post('feedback_company_code'),
                'feedback_wo_details' => $this->input->post('feedback_wo_details'),
                'feedback_zone' => $this->input->post('feedback_zone'),
                'feedback_vendor_code' => $this->input->post('feedback_vendor_code'),
                'feedback_vendor_details' => $this->input->post('feedback_vendor_details'),
                'feedback_pan' => $this->input->post('feedback_pan'),
                'feedback_lfs' => $this->input->post('feedback_lfs'),
                'feedback_lfd' => $this->input->post('feedback_lfd'),
                'feedback_date_added' => date("Y-m-d H:i:s"),
                'feedback_date_updated' => date("Y-m-d H:i:s"),
            );
            $mActionAdd = $this->feedback->addParent($mData);
            if ($mActionAdd == true) {
                $this->session->set_flashdata('success', 'Feedback added successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('buyer/vendor/feedback');
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionSaveFeedbackForm($mVendorType, $mFeedbackId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $mFeedback = $this->feedback->getParentByKey($mFeedbackId);
            $mData = array(
                'feedback_id' => $mFeedbackId,
                'pm_id' => $mSessionKey,
                'ff_purchase' => $mFeedback['feedback_purchase'],
                'ff_type' => $mVendorType,
                'ff_vendor' => $this->input->post('ff_vendor'),
                'ff_date' => $this->input->post('ff_date'),
                'ff_project' => $this->input->post('ff_project'),
                'ff_category' => $this->input->post('ff_category'),
                'ff_time_period' => $this->input->post('ff_time_period'),
                'ff_one' => $this->input->post('ff_one'),
                'ff_one_marks' => $this->input->post('ff_one_marks'),
                'ff_one_remarks' => $this->input->post('ff_one_remarks'),
                'ff_two' => $this->input->post('ff_two'),
                'ff_two_marks' => $this->input->post('ff_two_marks'),
                'ff_two_remarks' => $this->input->post('ff_two_remarks'),
                'ff_three' => $this->input->post('ff_three'),
                'ff_three_marks' => $this->input->post('ff_three_marks'),
                'ff_three_remarks' => $this->input->post('ff_three_remarks'),
                'ff_four' => $this->input->post('ff_four'),
                'ff_four_marks' => $this->input->post('ff_four_marks'),
                'ff_four_remarks' => $this->input->post('ff_four_remarks'),
                'ff_five' => $this->input->post('ff_five'),
                'ff_five_marks' => $this->input->post('ff_five_marks'),
                'ff_five_remarks' => $this->input->post('ff_five_remarks'),
                'ff_six' => $this->input->post('ff_six'),
                'ff_six_marks' => $this->input->post('ff_six_marks'),
                'ff_six_remarks' => $this->input->post('ff_six_remarks'),
                'ff_seven' => $this->input->post('ff_seven'),
                'ff_seven_marks' => $this->input->post('ff_seven_marks'),
                'ff_seven_remarks' => $this->input->post('ff_seven_remarks'),
                'ff_eight' => $this->input->post('ff_eight'),
                'ff_eight_marks' => $this->input->post('ff_eight_marks'),
                'ff_eight_remarks' => $this->input->post('ff_eight_remarks'),
                'ff_nine' => $this->input->post('ff_nine'),
                'ff_nine_marks' => $this->input->post('ff_nine_marks'),
                'ff_nine_remarks' => $this->input->post('ff_nine_remarks'),
                'ff_remarks' => $this->input->post('ff_remarks'),
                'ff_final_score' => $this->input->post('ff_final_score'),
                'ff_date_added' => date("Y-m-d H:i:s"),
                'ff_date_updated' => date("Y-m-d H:i:s"),
            );
            $mActionAdd = $this->feedbackforms->addParent($mData);
            if ($mActionAdd == true) {
                $this->session->set_flashdata('success', $this->input->post('ff_vendor') . ' feedback added successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('buyer/vendor/getfeedback');
        } else {
            $this->load->view('index', $data);
        }
    }

    public function getFeedback() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "feedback";
            $mPms = $this->buyer->getAllParentForPr();
            $mPets = $this->buyer->getAllPetZone();
            $mCuratedPrs = array();
            foreach ($mPms as $key => $value) {
                $mCuratedPrs[] = $value;
            }
            foreach ($mPets as $key => $value) {
                $mCuratedPrs[] = $value;
            }
            $data['mPrs'] = $mCuratedPrs;
            $mProjects = $this->projects->getAllParentByZone($mSessionZone);
            $mCurated = array();
            foreach ($mProjects as $key => $mProject) {
                $mSelectedPms = json_decode($mProject['project_pm']);
                $mFeedbacks = $this->feedback->getAllParentByPurchase($mProject['project_purchase']);
                foreach ($mFeedbacks as $key => $mFeedback) {
                    if (in_array($mSessionKey, $mSelectedPms) || $mFeedback['feedback_transfer'] == $mSessionKey) {
                        $mCurated[] = $mFeedback;
                    }
                }
            }
            $data['records'] = $mCurated;
            $this->load->view('buyer/feedback_list', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function viewVendorFeedbackScores($mFeedbackId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mFeedbackId) {
            $data['home'] = "feedback";
            $data['feedback'] = $this->feedback->getParentByKey($mFeedbackId);
            //echo "<pre>";
            //print_r($data['feedback']);exit;
            if ($data['feedback']['feedback_pri_zone'] == "Pan India") {
                $data['zone'] = "1";
            } else if ($data['feedback']['feedback_pri_zone'] == "NCR") {
                $data['zone'] = "2";
            } else if ($data['feedback']['feedback_pri_zone'] == "Mumbai") {
                $data['zone'] = "3";
            } else if ($data['feedback']['feedback_pri_zone'] == "Pune") {
                $data['zone'] = "4";
            } else if ($data['feedback']['feedback_pri_zone'] == "South") {
                $data['zone'] = "5";
            } else if ($data['feedback']['feedback_pri_zone'] == "East") {
                $data['zone'] = "6";
            }
            $data['records'] = $this->feedbackforms->getAllParentByProject($data['feedback']['porg_company_name'], $data['feedback']['feedback_pri_zone']);
            $this->load->view('buyer/feedback_list_vendor', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function filterFeedback($mZone, $mPurchase) {
        if ($mZone && $mPurchase) {
            if ($mZone == "1") {
                $zone = "Pan India";
            } else if ($mZone == "2") {
                $zone = "NCR";
            } else if ($mZone == "3") {
                $zone = "Mumbai";
            } else if ($mZone == "4") {
                $zone = "Pune";
            } else if ($mZone == "5") {
                $zone = "South";
            } else if ($mZone == "6") {
                $zone = "East";
            }
            $mFeedbacks = $this->feedback->getAllParentByZoneAndPurchase($zone, $mPurchase);
            $mAllRecords = array();
            foreach ($mFeedbacks as $key => $value) {
                $mRecords = $this->feedbackforms->getAllParentByTypeAndFeedbackId($value['feedback_id']);
                if (!empty($mRecords)) {
                    foreach ($mRecords as $key => $value) {
                        $mAllRecords[] = $value;
                    }
                }
            }
            if ($zone == "Pan India") {
                $data['zone'] = "1";
            } else if ($zone == "NCR") {
                $data['zone'] = "2";
            } else if ($zone == "Mumbai") {
                $data['zone'] = "3";
            } else if ($zone == "Pune") {
                $data['zone'] = "4";
            } else if ($zone == "South") {
                $data['zone'] = "5";
            } else if ($zone == "East") {
                $data['zone'] = "6";
            }
            $data['records'] = $mAllRecords;
            if (!empty($mAllRecords)) {
                $data['feedback'] = $mFeedbacks[0];
            } else {
                $mFeedback = $this->feedback->getParentByPurchaseKey($mPurchase);
                $data['feedback'] = $mFeedback;
            }
            $this->load->view('buyer/feedback_list_vendor_filter', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function viewFeedbackVendor($param) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $param) {
            $data['home'] = "feedback";
            $data['mRecord'] = $this->feedbackforms->getParentByKey($param);
            $this->load->view('buyer/feedback_vendor_view', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function feedbackContractor($mFeedbackId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mFeedbackId) {
            $data['home'] = "feedback";
            $data['record'] = $this->feedback->getParentByKey($mFeedbackId);
            $data['categories'] = $this->register->get_type_of_work("3");
            $this->load->view('buyer/feedback_contractor', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function viewFeedbackContractor($param) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $param) {
            $data['home'] = "feedback";
            $data['mRecord'] = $this->feedbackforms->getParentByKey($param);
            $this->load->view('buyer/feedback_contractor_view', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function feedbackVendor($mFeedbackId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mFeedbackId) {
            $data['home'] = "feedback";
            $data['record'] = $this->feedback->getParentByKey($mFeedbackId);
            $data['categories'] = $this->register->get_type_of_work("1");
            $this->load->view('buyer/feedback_vendor', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function feedbackConsultant($mFeedbackId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mFeedbackId) {
            $data['home'] = "feedback";
            $data['record'] = $this->feedback->getParentByKey($mFeedbackId);
            $data['categories'] = $this->register->get_type_of_work("2");
            $this->load->view('buyer/feedback_consultant', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function viewFeedbackConsultant($param) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $param) {
            $data['home'] = "feedback";
            $data['mRecord'] = $this->feedbackforms->getParentByKey($param);
            $this->load->view('buyer/feedback_consultant_view', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function feedbackAluminium($mFeedbackId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mFeedbackId) {
            $data['home'] = "feedback";
            $data['record'] = $this->feedback->getParentByKey($mFeedbackId);
            $data['categories'] = $this->register->get_type_of_work("1");
            $this->load->view('buyer/feedback_aluminium', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function viewFeedbackAluminium($param) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $param) {
            $data['home'] = "feedback";
            $data['mRecord'] = $this->feedbackforms->getParentByKey($param);
            $data['categories'] = $this->register->get_type_of_work("1");
            $this->load->view('buyer/feedback_aluminium_view', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function eoi($project, $zone, $type, $for, $tow) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "short";
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['zone'] = $zone;
            $data['type'] = $type;
            $data['for'] = $for;
            $data['project'] = $this->projects->getParentByKey($project);
            $data['tow'] = $this->register->getWorkById($tow);
            $data['mRecords'] = $this->eoi->getAllParentByBuyerId($mSessionKey, $project, $zone, $type, $for, $tow);
            $this->load->view('buyer/eoi_list', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function filterTowVendors($mTow, $mType, $mVendors) {
        $mConsolidated = array();
        if ($mTow == "66") {
            $mGetTowsByFilter = $this->vendor->getTowsByFilter($mTow, "Civil -", $mType);
            foreach ($mGetTowsByFilter as $key => $mGetTow) {
                foreach ($mVendors as $key => $mVendor) {
                    if ($mVendor['type_of_work_id'] == $mGetTow['id']) {
                        $mConsolidated[] = $mVendor;
                    }
                }
            }
        } else if ($mTow == "67") {
            $mGetTowsByFilter = $this->vendor->getTowsByFilter($mTow, "MEP -", $mType);
            foreach ($mGetTowsByFilter as $key => $mGetTow) {
                foreach ($mVendors as $key => $mVendor) {
                    if ($mVendor['type_of_work_id'] == $mGetTow['id']) {
                        $mConsolidated[] = $mVendor;
                    }
                }
            }
        } else if ($mTow == "69") {
            $mGetTowsByFilter = $this->vendor->getTowsByFilter($mTow, "Finishing -", $mType);
            foreach ($mGetTowsByFilter as $key => $mGetTow) {
                foreach ($mVendors as $key => $mVendor) {
                    if ($mVendor['type_of_work_id'] == $mGetTow['id']) {
                        $mConsolidated[] = $mVendor;
                    }
                }
            }
        } else if ($mTow == "61" || $mTow == "62" || $mTow == "63") {
            $mGetTowsByFilter = $this->vendor->getTowsByFilter($mTow, "Finishing -", $mType);
            foreach ($mGetTowsByFilter as $key => $mGetTow) {
                foreach ($mVendors as $key => $mVendor) {
                    if ($mVendor['type_of_work_id'] == $mGetTow['id']) {
                        $mConsolidated[] = $mVendor;
                    }
                }
            }
            $mGetTowsByFilter = $this->vendor->getTowsByFilter($mTow, "MEP -", $mType);
            foreach ($mGetTowsByFilter as $key => $mGetTow) {
                foreach ($mVendors as $key => $mVendor) {
                    if ($mVendor['type_of_work_id'] == $mGetTow['id']) {
                        $mConsolidated[] = $mVendor;
                    }
                }
            }
            $mGetTowsByFilter = $this->vendor->getTowsByFilter($mTow, "Civil -", $mType);
            foreach ($mGetTowsByFilter as $key => $mGetTow) {
                foreach ($mVendors as $key => $mVendor) {
                    if ($mVendor['type_of_work_id'] == $mGetTow['id']) {
                        $mConsolidated[] = $mVendor;
                    }
                }
            }
            $mGetTowsByFilter = $this->vendor->getVendorsByTow("61", $mType);
            foreach ($mGetTowsByFilter as $key => $mGetTow) {
                foreach ($mVendors as $key => $mVendor) {
                    if ($mVendor['type_of_work_id'] == $mGetTow['id']) {
                        $mConsolidated[] = $mVendor;
                    }
                }
            }
            $mGetTowsByFilter = $this->vendor->getVendorsByTow("62", $mType);
            foreach ($mGetTowsByFilter as $key => $mGetTow) {
                foreach ($mVendors as $key => $mVendor) {
                    if ($mVendor['type_of_work_id'] == $mGetTow['id']) {
                        $mConsolidated[] = $mVendor;
                    }
                }
            }
            $mGetTowsByFilter = $this->vendor->getVendorsByTow("63", $mType);
            foreach ($mGetTowsByFilter as $key => $mGetTow) {
                foreach ($mVendors as $key => $mVendor) {
                    if ($mVendor['type_of_work_id'] == $mGetTow['id']) {
                        $mConsolidated[] = $mVendor;
                    }
                }
            }
            $mGetTowsByFilter = $this->vendor->getVendorsByTow("66", $mType);
            foreach ($mGetTowsByFilter as $key => $mGetTow) {
                foreach ($mVendors as $key => $mVendor) {
                    if ($mVendor['type_of_work_id'] == $mGetTow['id']) {
                        $mConsolidated[] = $mVendor;
                    }
                }
            }

            $mGetTowsByFilter = $this->vendor->getVendorsByTow("67", $mType);
            foreach ($mGetTowsByFilter as $key => $mGetTow) {
                foreach ($mVendors as $key => $mVendor) {
                    if ($mVendor['type_of_work_id'] == $mGetTow['id']) {
                        $mConsolidated[] = $mVendor;
                    }
                }
            }

            $mGetTowsByFilter = $this->vendor->getVendorsByTow("69", $mType);
            foreach ($mGetTowsByFilter as $key => $mGetTow) {
                foreach ($mVendors as $key => $mVendor) {
                    if ($mVendor['type_of_work_id'] == $mGetTow['id']) {
                        $mConsolidated[] = $mVendor;
                    }
                }
            }
        } else {
            foreach ($mVendors as $key => $mVendor) {
                if ($mVendor['type_of_work_id'] == $mTow) {
                    $mConsolidated[] = $mVendor;
                }
            }
        }

        return $mConsolidated;
    }

    public function filterZoneAndzoneRelatedVendors($mZone, $mVendors) {
        $mConsolidated = array();
        foreach ($mVendors as $key => $mRecord) {
            $mZoneSelected = $mRecord['location'];
            $mInterestedZones = json_decode($mRecord['interested_zones']);
            //Primary zone vendors
            if ($mZoneSelected == $mZone || in_array($mZone, $mInterestedZones)) {
                $mConsolidated[] = $mRecord;
            }
        }

        return $mConsolidated;
    }

    public function getVendorsdata($mZone, $mType, $mTow) {
        $mRecords = $this->vendor->getVendorsData($mType);
        $mConsolidated = array();
        $mFilterZone = $this->filterZoneAndzoneRelatedVendors($mZone, $mRecords);
        $mFilterTows = $this->filterTowVendors($mTow, $mType, $mFilterZone);
        foreach ($mFilterTows as $key => $mRecord) {
            $mGetTow = $this->buyer->getTypeOfWork($mRecord['type_of_work_id']);
            if ($mRecord['nature_of_business_id'] == 1) {
                $mStageTwo = $this->vst->getParentByVendorKey($mRecord['id']);
                if (empty($mStageTwo)) {
                    if ($mRecord['turn_over_of_last_3years'] * 0.5 < 10) {
                        $mTurnover = "Very Small";
                    } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 10 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 50) {
                        $mTurnover = "Small";
                    } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 50 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 100) {
                        $mTurnover = "Medium";
                    } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 100 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 150) {
                        $mTurnover = "Large";
                    } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 150) {
                        $mTurnover = "Very Large";
                    }
                } else {
                    $mStageTwoTurn = json_decode($mStageTwo['stv_turnover']);
                    $mStageTwoTurn = array_sum($mStageTwoTurn) / 4;
                    $mStageTwoTurn = $mStageTwoTurn * 0.5;
                    if ($mStageTwoTurn * 10000000 < 50000000) {
                        $mTurnover = "Very Small";
                    } else if ($mStageTwoTurn * 10000000 > 50000000 && $mStageTwoTurn * 10000000 <= 250000000) {
                        $mTurnover = "Small";
                    } else if ($mStageTwoTurn * 10000000 > 250000000 && $mStageTwoTurn * 10000000 <= 500000000) {
                        $mTurnover = "Medium";
                    } else if ($mStageTwoTurn * 10000000 > 500000000 && $mStageTwoTurn * 10000000 <= 1000000000) {
                        $mTurnover = "Large";
                    } else if ($mStageTwoTurn * 10000000 > 1000000000) {
                        $mTurnover = "Very Large";
                    }
                }
            } else if ($mRecord['nature_of_business_id'] == 3) {
                $mStageTwo = $this->cst->getParentByVendorKey($mRecord['id']);
                if (empty($mStageTwo)) {
                    //echo $mRecord['turn_over_of_last_3years'] * 0.5;
                    if ($mRecord['turn_over_of_last_3years'] * 0.5 < 5) {
                        $mTurnover = "Very Small";
                    } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 5 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 25) {
                        $mTurnover = "Small";
                    } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 25 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 50) {
                        $mTurnover = "Medium";
                    } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 50 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 100) {
                        $mTurnover = "Large";
                    } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 100) {
                        $mTurnover = "Very Large";
                    }
                } else {
                    $mStageTwoTurn = json_decode($mStageTwo['stc_turnover']);
                    $mStageTwoTurn = ($mStageTwoTurn[0] + $mStageTwoTurn[1] + $mStageTwoTurn[2]) / 3;
                    $mStageTwoTurn = $mStageTwoTurn * 0.5;
                    if ($mStageTwoTurn * 10000000 < 50000000) {
                        $mTurnover = "Very Small";
                    } else if ($mStageTwoTurn * 10000000 > 50000000 && $mStageTwoTurn * 10000000 <= 250000000) {
                        $mTurnover = "Small";
                    } else if ($mStageTwoTurn * 10000000 > 250000000 && $mStageTwoTurn * 10000000 <= 500000000) {
                        $mTurnover = "Medium";
                    } else if ($mStageTwoTurn * 10000000 > 500000000 && $mStageTwoTurn * 10000000 <= 1000000000) {
                        $mTurnover = "Large";
                    } else if ($mStageTwoTurn * 10000000 > 1000000000) {
                        $mTurnover = "Very Large";
                    }
                }
            } else if ($mRecord['nature_of_business_id'] == 2) {
                $mStageTwo = $this->const->getParentByVendorKey($mRecord['id']);
                if (empty($mStageTwo)) {
                    //echo $mRecord['turn_over_of_last_3years'] * 0.5;
                    if ($mRecord['turn_over_of_last_3years'] * 0.5 < 10) {
                        $mTurnover = "Very Small";
                    } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 10 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 50) {
                        $mTurnover = "Small";
                    } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 50 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 100) {
                        $mTurnover = "Medium";
                    } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 100 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 150) {
                        $mTurnover = "Large";
                    } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 150) {
                        $mTurnover = "Very Large";
                    }
                } else {
                    $mStageTwoTurn = json_decode($mStageTwo['stc_turnover']);
                    $mStageTwoTurn = array_sum($mStageTwoTurn) / 4;
                    $mStageTwoTurn = $mStageTwoTurn * 0.5;
                    if ($mStageTwoTurn * 10000000 < 10000000) {
                        $mTurnover = "Very Small";
                    } else if ($mStageTwoTurn * 10000000 > 10000000 && $mStageTwoTurn * 10000000 <= 500000000) {
                        $mTurnover = "Small";
                    } else if ($mStageTwoTurn * 10000000 > 500000000 && $mStageTwoTurn * 10000000 <= 1000000000) {
                        $mTurnover = "Medium";
                    } else if ($mStageTwoTurn * 10000000 > 1000000000 && $mStageTwoTurn * 10000000 <= 1500000000) {
                        $mTurnover = "Large";
                    } else if ($mStageTwoTurn * 10000000 > 1500000000) {
                        $mTurnover = "Very Large";
                    }
                }
            } else {
                //echo $mRecord['turn_over_of_last_3years'] * 0.5;
                if ($mRecord['turn_over_of_last_3years'] * 0.5 < 10) {
                    $mTurnover = "Very Small";
                } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 10 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 50) {
                    $mTurnover = "Small";
                } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 50 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 100) {
                    $mTurnover = "Medium";
                } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 100 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 150) {
                    $mTurnover = "Large";
                } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 150) {
                    $mTurnover = "Very Large";
                }
            }

            if ($mRecord['pre_type'] == 1) {
                $mFeedback = $this->feedback->getParentByVendorKey($mRecord['id']);
                if (!empty($mFeedback)) {
                    $mFormRecord = $this->feedbackforms->getAllParentByTypeAndFeedbackId($mFeedback['feedback_id']);
                    if (!empty($mFormRecord)) {
                        $mTotalScore = 0;
                        foreach ($mFormRecord as $key => $value) {
                            $mTotalScore += $value['ff_final_score'];
                        }
                        $mFeedbackScore = $mTotalScore / count($mFormRecord);
                    } else {
                        $mFeedbackScore = "-";
                    }
                    $mFeedbackDate = strtotime($mFormRecord[0]['ff_date_added']);
                    $mFeedbackDate = date("d-m-Y", $mFeedbackDate);
                } else {
                    $mFeedbackScore = "-";
                    $mFeedbackDate = "-";
                }

                if ($mRecord['nature_of_business_id'] == 1) {
                    $mPqScore = $this->pqv->getParentByVendorAndTowKey($mRecord['id'], $mRecord['type_of_work_id']);
                    $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                    $mPqScoreAdded = date("d-m-Y", $mPqScoreAdded);
                } else if ($mRecord['nature_of_business_id'] == 3) {
                    $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mRecord['type_of_work_id']);
                    $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                    $mPqScoreAdded = date("d-m-Y", $mPqScoreAdded);
                } else if ($mRecord['nature_of_business_id'] == 2) {
                    $mPqScore = array();
                    $mPqScoreAdded = "-";
                }

                if (!empty($mPqScore)) {
                    if ($mRecord['nature_of_business_id'] == 1) {
                        $mPqScoreTotal = $mPqScore['pqv_total'];
                        $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                        $mPqScoreAdded = date("d-m-Y", $mPqScoreAdded);
                    } else if ($mRecord['nature_of_business_id'] == 2) {
                        $mPqScoreTotal = "-";
                        $mPqScoreAdded = "-";
                    } else if ($mRecord['nature_of_business_id'] == 3) {
                        $mPqScoreTotal = $mPqScore['pqc_total'];
                        $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                        $mPqScoreAdded = date("d-m-Y", $mPqScoreAdded);
                    }
                } else {
                    $mPqScoreTotal = "-";
                    $mPqScoreAdded = "-";
                }

                $mData = array(
                    'vendor_id' => $mRecord['id'],
                    'vendor_company_name' => $mRecord['company_name'],
                    'vendor_user_name' => $mRecord['user_name'],
                    'vendor_email' => $mRecord['email'],
                    'vendor_contact_number' => $mRecord['contact_number'],
                    'vendor_zone' => $mRecord['location'],
                    'vendor_location' => $mRecord['location'],
                    'vendor_interested' => $mRecord['interested_zones'],
                    'vendor_tow' => $mGetTow['name'],
                    'vendor_tow_id' => $mGetTow['id'],
                    'vendor_turn_over' => $mTurnover,
                    'vendor_pq_score' => $mPqScoreTotal,
                    'vendor_pq_score_date' => $mPqScoreAdded,
                    'vendor_feedback_score' => $mFeedbackScore,
                    'vendor_feedback_score_date' => $mFeedbackDate,
                );

                if (!empty($mFeedback) || !empty($mPqScore)) {
                    $mConsolidated[] = $mData;
                }
            } else {

                if ($mRecord['nature_of_business_id'] == 1) {
                    $mPqScore = $this->pqv->getParentByVendorAndTowKey($mRecord['id'], $mRecord['type_of_work_id']);
                    $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                    $mPqScoreAdded = date("d-m-Y", $mPqScoreAdded);
                } else if ($mRecord['nature_of_business_id'] == 3) {
                    $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mRecord['type_of_work_id']);
                    $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                    $mPqScoreAdded = date("d-m-Y", $mPqScoreAdded);
                } else if ($mRecord['nature_of_business_id'] == 2) {
                    $mPqScore = array();
                    $mPqScoreAdded = "-";
                }


                if (!empty($mPqScore)) {
                    if ($mRecord['nature_of_business_id'] == 1) {
                        if (!empty($mPqScore)) {
                            $mPqScoreTotal = $mPqScore['pqv_total'];
                        }
                    } else if ($mRecord['nature_of_business_id'] == 2) {
                        if (!empty($mPqScore)) {
                            $mPqScoreTotal = $mPqScore['pqc_total'];
                        }
                    } else if ($mRecord['nature_of_business_id'] == 3) {
                        if (!empty($mPqScore)) {
                            $mPqScoreTotal = $mPqScore['pqc_total'];
                        }
                    }
                    $mData = array(
                        'vendor_id' => $mRecord['id'],
                        'vendor_company_name' => $mRecord['company_name'],
                        'vendor_user_name' => $mRecord['user_name'],
                        'vendor_email' => $mRecord['email'],
                        'vendor_contact_number' => $mRecord['contact_number'],
                        'vendor_zone' => $mRecord['location'],
                        'vendor_location' => $mRecord['location'],
                        'vendor_interested' => $mRecord['interested_zones'],
                        'vendor_tow' => $mGetTow['name'],
                        'vendor_tow_id' => $mGetTow['id'],
                        'vendor_turn_over' => $mTurnover,
                        'vendor_pq_score' => $mPqScoreTotal,
                        'vendor_pq_score_date' => $mPqScoreAdded,
                        'vendor_feedback_score' => "-",
                        'vendor_feedback_score_date' => "-",
                    );
                    $mConsolidated[] = $mData;
                }
            }
        }

        return $mConsolidated;
    }

    public function addEoi($project, $zone, $type, $for, $tow) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "short";
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['zone'] = $zone;
            $data['type'] = $type;
            $data['for'] = $for;
            $data['tow'] = $this->register->getWorkById($tow);
            $data['project'] = $this->projects->getParentByKey($project);
            $data['home'] = "vendor";
            $data['mRecords'] = $this->getVendorsdata($zone, $type, $data['tow']['id']);
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['mUsers'] = $this->buyer->getAllParent();
            $data['bris'] = $this->bri->getAllParentByTowKey($tow);
            $data['fiis'] = $this->fii->getAllParentByTowKey($tow);
            $this->load->view('buyer/eoi_add', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function viewEoi($mEoiId) {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey && $mEoiId) {
            $data['home'] = "short";
            $data['mRecord'] = $this->eoi->getParentByKey($mEoiId);
            $this->load->view('buyer/eoi_view', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionSaveEoi($project, $zone, $type, $for, $tow) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $mVendorsSelected = $this->input->post('eoi_vendors_selected');
            $mProjectName = $this->projects->getParentByKey($project);
            $PName = $mProjectName['project_name'];

            $eoiData = array(
                'eoi_buyer_id' => $mSessionKey,
                'eoi_project' => $project,
                'eoi_zone' => $zone,
                'eoi_type' => $type,
                'eoi_for' => $for,
                'eoi_tow' => $tow,
                'eoi_budget' => $this->input->post('eoi_budget'),
                'eoi_scope' => $this->input->post('eoi_scope'),
                'eoi_start_date' => $this->input->post('eoi_start_date'),
                'eoi_schedule' => $this->input->post('eoi_schedule'),
                'eoi_vendors_selected' => json_encode($this->input->post('eoi_vendors_selected')),
                'eoi_configuration' => $this->input->post('eoi_configuration'),
                'eoi_total_bua' => $this->input->post('eoi_total_bua'),
                'eoi_toc' => $this->input->post('eoi_toc'),
                'eoi_bri' => json_encode($this->input->post('eoi_bri')),
                'eoi_fii' => json_encode($this->input->post('eoi_fii')),
                'eoi_pd' => $this->input->post('eoi_pd'),
                'eoi_water' => $this->input->post('eoi_water'),
                'eoi_electicity' => $this->input->post('eoi_electicity'),
                'eoi_labour' => $this->input->post('eoi_labour'),
                'eoi_dlp' => $this->input->post('eoi_dlp'),
                'eoi_dadlp' => $this->input->post('eoi_dadlp'),
                'eoi_others' => $this->input->post('eoi_others'),
                'eoi_date_added' => date("Y-m-d H:i:s"),
                'eoi_date_updated' => date("Y-m-d H:i:s"),
            );
            $mActionAdd = $this->eoi->addParent($eoiData);
            if ($mActionAdd) {
                foreach ($mVendorsSelected as $key => $value) {
                    $mCheck = $this->ev->check($mActionAdd, $value);
                    if (empty($mCheck)) {
                        $eoivData = array(
                            'ev_eoi_id' => $mActionAdd,
                            'ev_vendor_id' => $value,
                            'ev_buyer_id' => $mSessionKey,
                            'ev_project' => $project,
                            'ev_zone' => $zone,
                            'ev_type' => $type,
                            'ev_for' => $for,
                            'ev_tow' => $tow,
                            'ev_budget' => $this->input->post('eoi_budget'),
                            'ev_scope' => $this->input->post('eoi_scope'),
                            'ev_date_added' => date("Y-m-d H:i:s"),
                            'ev_date_updated' => date("Y-m-d H:i:s"),
                        );
                        $this->ev->addParent($eoivData);
                        $mVendor = $this->vendor->getParentByKey($value);
                        $mVendorName = $mVendor['company_name'];
                        $mVendorEmail = $mVendor['email'];
                        $mTow = $this->register->getWorkById($tow);
                        $mTowName = $mTow['name'];
                        $wSubject = "Site Visit Report";
                        $wMessage = "
<html>
<head>
</head>
<body>
<h3>Dear $mVendorName,</h3>
<p>
Godrej Properties Limited invite you to express your interest for participating in the upcoming tendering process for $mTowName for our $PName, $zone.
</p>
<h4>Regards, <br> Contracts & Procurement Team <br> " . COMPANY_NAME . "</h4>
</body>
</html>";
                        $mSendMail = $this->wSendMail($mVendorEmail, $wSubject, $wMessage);
                    }
                }
                $this->session->set_flashdata('success', 'EOI added successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('buyer/vendor/eoi/' . $project . "/" . $zone . "/" . $type . "/" . $for . "/" . $tow);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionSaveEoiProcurement($project, $zone, $type, $for, $tow, $protype) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $mVendorsSelected = $this->input->post('eoi_vendors_selected');
            $eoiData = array(
                'eoi_buyer_id' => $mSessionKey,
                'eoi_project' => $project,
                'eoi_zone' => $zone,
                'eoi_type' => $type,
                'eoi_for' => $for,
                'eoi_tow' => $tow,
                'eoi_subject' => $this->input->post('eoi_subject'),
                'eoi_budget' => $this->input->post('eoi_budget'),
                'eoi_sow' => $this->input->post('eoi_sow'),
                'eoi_award' => $this->input->post('eoi_award'),
                'eoi_vendors_selected' => json_encode($this->input->post('eoi_vendors_selected')),
                'eoi_bri' => $this->input->post('eoi_bri'),
                'eoi_fii' => $this->input->post('eoi_fii'),
                'eoi_status' => 2,
                'eoi_date_added' => date("Y-m-d H:i:s"),
                'eoi_date_updated' => date("Y-m-d H:i:s"),
            );
            $mActionAdd = $this->eoi_pro->addParent($eoiData);
            if ($mActionAdd) {
                foreach ($mVendorsSelected as $key => $value) {
                    $mCheck = $this->ev->check($mActionAdd, $value);
                    if (empty($mCheck)) {
                        $eoivData = array(
                            'ev_eoi_id' => $mActionAdd,
                            'ev_vendor_id' => $value,
                            'ev_buyer_id' => $mSessionKey,
                            'ev_project' => $project,
                            'ev_zone' => $zone,
                            'ev_type' => $type,
                            'ev_for' => $for,
                            'ev_tow' => $tow,
                            'ev_budget' => $this->input->post('eoi_budget'),
                            'ev_scope' => $this->input->post('eoi_sow'),
                            'ev_status' => 1,
                            'ev_date_added' => date("Y-m-d H:i:s"),
                            'ev_date_updated' => date("Y-m-d H:i:s"),
                        );
                        $this->ev->addParent($eoivData);
                    }
                }
//$this->session->set_flashdata('success', 'EOI added successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('buyer/vendor/shortlistingProcurement/' . $project . "/" . $zone . "/" . $type . "/" . $for . "/" . $tow . "/" . $protype);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function shortlisting($project, $zone, $type, $for, $tow) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "short";
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['zone'] = $zone;
            $data['type'] = $type;
            $data['for'] = $for;
            $data['tow'] = $this->register->getWorkById($tow);
            $data['project'] = $this->projects->getParentByKey($project);
            $data['mRecords'] = $this->eoi->getAllParentForShortlisting($project, $zone, $type, $for, $tow);
            $this->load->view('buyer/shortlisting_list', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function bidManagement($project, $zone, $type, $for, $tow) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "short";
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['zone'] = $zone;
            $data['type'] = $type;
            $data['for'] = $for;
            $data['tow'] = $this->register->getWorkById($tow);
            $data['project'] = $this->projects->getParentByKey($project);
            $mVendors = $this->vendor->getStageOneVendorsForEoi($zone, $data['tow']['id'], $type);
            $mConsolidated = array();
            foreach ($mVendors as $key => $mRecord) {
                $mCOuntT = 0;
                if ($mRecord['nature_of_business_id'] == 1) {
                    $mPqScore = $this->pqv->getParentByVendorKey($mRecord['id']);
                    $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mRecord['type_of_work_id']);
                } else if ($mRecord['nature_of_business_id'] == 3) {
                    $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mRecord['type_of_work_id']);
                    $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mRecord['type_of_work_id']);
                } else if ($mRecord['nature_of_business_id'] == 2) {
                    $mPqScore = array();
                }
                if (!empty($mPqScore)) {
                    $mCOuntT++;
                }
                if ($mCOuntT > 0) {
                    $mConsolidated[] = $mRecord;
                }
            }
            $data['mRecords'] = $mConsolidated;
            $this->load->view('buyer/bid_management', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function listApprovalBidders() {
        $this->load->view('buyer/list_bids', $data);
    }

    public function sendForMom() {
        $this->load->view('buyer/send_for_mom', $data);
    }

    public function viewVendorQueries() {
        $this->load->view('buyer/view_query', $data);
    }

    public function addVendorToRfq() {

        $this->load->view('buyer/add_vendor_to_rfq', $data);
    }

    public function sendForAppRfq() {
        $this->load->view('buyer/soa_rfq', $data);
    }

    public function sendForApprovalRFQ() {
        $this->load->view('buyer/list_bids', $data);
    }

    public function sendLoa() {
        $this->load->view('buyer/send_loa', $data);
    }

    public function extendRfq() {
        $this->load->view('buyer/rfq_extend', $data);
    }

    public function viewQuery() {
        $data['home'] = "tendering";
        $this->load->view('buyer/view_bid', $data);
    }

    public function viewBidCapacity($mVendorId, $mEoiId) {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "short";
            $data['mRecord'] = $this->bc->getParentByVendorIdAndEoiId($mVendorId, $mEoiId);
            $this->load->view('buyer/view_bidcapacity', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function shortlistingProcurement($project, $zone, $type, $for, $tow, $protype) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "short";
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['zone'] = $zone;
            $data['type'] = $type;
            $data['for'] = $for;
            $data['tow'] = $this->register->getWorkById($tow);
            $data['project'] = $this->projects->getParentByKey($project);
            $data['mRecords'] = $this->eoi_pro->getAllParentForShortlisting($project, $zone, $type, $for, $tow);
            $this->load->view('buyer/shortlisting_list_procurement', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function delisting() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "delisting";
            $data['records'] = $this->delisting->getAllParentByRecommender($mSessionKey);
            $this->load->view('buyer/delisting_list', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function sendDelisting() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "delisting";
            $data['getVendor'] = $this->register->getVendor();
            $data['getlocation'] = $this->register->getLocation();
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['OH'] = $this->buyer->getAllParentByZoneAndRole("NCR", "OH");
            $data['COO'] = $this->buyer->getAllParentByZoneAndRole("HO", "COO");
            $data['RO'] = $this->buyer->getAllParentByZoneAndRole($mSessionZone, "Regional C&P Head");
            $data['HO'] = $this->buyer->getAllParentByZoneAndRole($mSessionZone, "HO - C&P");
            $this->load->view('buyer/delisting', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionSendForDelisting() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $mCheck = $this->delisting->getParentByVendor($this->input->post('delisting_vendor'));
            if (empty($mCheck)) {

                $mData = array(
                    'delisting_recommender' => $mSessionKey,
                    'delisting_ro' => $this->input->post('delisting_ro'),
                    'delisting_oh' => $this->input->post('delisting_oh'),
                    'delisting_ho' => $this->input->post('delisting_ho'),
                    'delisting_coo' => $this->input->post('delisting_coo'),
                    'delisting_toa' => $this->input->post('delisting_toa'),
                    'delisting_tow' => $this->input->post('delisting_tow'),
                    'delisting_vendor' => $this->input->post('delisting_vendor'),
                    'delisting_reason' => json_encode($this->input->post('delisting_reason')),
                    'delisting_reason_more' => $this->input->post('delisting_reason_more'),
                    'delisting_mail' => $this->input->post('delisting_mail'),
                    'delisting_date_added' => date("Y-m-d H:i:s"),
                    'delisting_date_updated' => date("Y-m-d H:i:s"),
                );
                $mActionAdd = $this->delisting->addParent($mData);
                if ($mActionAdd == true) {
                    $this->session->set_flashdata('success', 'Sent successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                }
                redirect('buyer/vendor/delisting');
            } else {
                $this->session->set_flashdata('success', 'De-listing request already sent.');
                redirect('buyer/vendor/sendDelisting');
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function viewDelistingData($mDelistingId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['record'] = $this->delisting->getParentByKey($mDelistingId);
            $data['home'] = "delisting";
            $data['getVendor'] = $this->register->getVendor();
            $data['getlocation'] = $this->register->getLocation();
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['OH'] = $this->buyer->getAllParentByZoneAndRole("NCR", "OH");
            $data['COO'] = $this->buyer->getAllParentByZoneAndRole("HO", "COO");
            $data['RO'] = $this->buyer->getAllParentByZoneAndRole($mSessionZone, "Regional C&P Head");
            $data['HO'] = $this->buyer->getAllParentByZoneAndRole($mSessionZone, "HO - C&P");
            $this->load->view('buyer/delisting_read', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionChangeDelistingStatus($mStatus, $mDelistingId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data = array(
                'delisting_status' => $mStatus,
                'delisting_date_updated' => date('Y-m-d H:i:s'),
            );
            $mUpdate = $this->delisting->updateParentByKey($mDelistingId, $data);
            if ($mUpdate == true) {
                if ($mStatus == "4") {
                    $mRecord = $this->delisting->getParentByKey($mDelistingId);
                    $data = array(
                        'delisted' => 1,
                    );
                    $mUpdate = $this->register->updateParentByKey($mRecord['delisting_vendor'], $data);
                }
                if ($mStatus == "1" || $mStatus == "2" || $mStatus == "3" || $mStatus == "4") {
                    $this->session->set_flashdata('success', 'Approved successfully.');
                } else if ($mStatus == "5" || $mStatus == "6" || $mStatus == "7" || $mStatus == "8") {
                    $this->session->set_flashdata('success', 'Rejected successfully.');
                }
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('buyer/vendor/delisting');
        } else {
            $this->load->view('index', $data);
        }
    }

    public function addShortlisting() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "short";
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['locations'] = $this->register->getLocation();
            $mNature = 1;
            $data['getTows'] = $this->register->get_type_of_work($mNature);
            $data['getVendor'] = $this->register->getVendor();
//$this->load->view('buyer/shortlisting_add', $data);
            $this->load->view('buyer/shortlisting_add_procurement', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function short_approval() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $this->load->view('buyer/shortlisting_approve', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function refloatApproval($mEoiId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $mShort = $this->short->getParentByEoiKey($mEoiId);
            $mEoiData = $this->eoi->getParentByKey($mEoiId);
            $vendorData = array(
                's_rejected_by' => "",
                's_approved_by' => "",
                's_date_updated' => date("Y-m-d H:i:s"),
            );
            $mActionAdd = $this->short->updateParentByKey($mShort['s_id'], $vendorData);
            if ($mActionAdd == true) {
                $this->session->set_flashdata('success', 'Refloated Successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('buyer/vendor/shortlisting/' . $mEoiData['eoi_project'] . "/" . $mEoiData['eoi_zone'] . "/" . $mEoiData['eoi_type'] . "/" . $mEoiData['eoi_for'] . "/" . $mEoiData['eoi_tow']);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function shortlistApproval($mEoiId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mEoiId) {
            $data['home'] = "short";
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['locations'] = $this->register->getLocation();
            $mNature = 1;
            $data['getTows'] = $this->register->get_type_of_work($mNature);
            $data['getVendor'] = $this->register->getVendor();
            $data['records'] = $this->buyer->getAllParent();
            $data['eoi'] = $this->eoi->getParentByKey($mEoiId);
            $data['RCH'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Regional C&P Head");
            $data['PM'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Project Manager");
            $data['PD'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Project Director");
            $data['CH'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Construction Head");
            $data['OH'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Operations Head");
            $data['RH'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Regional Head");
            $data['ZH'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Zonal CEO");
            $data['COO'] = $this->buyer->getAllParentByZoneAndRole("HO", "COO");
            $data['HO'] = $this->buyer->getAllParentByZoneAndRole("HO", "Head of Contracts & Procurement");
            $data['bris'] = $this->bri->getAllParentByTowKey($data['eoi']['eoi_tow']);
            $data['fiis'] = $this->fii->getAllParentByTowKey($data['eoi']['eoi_tow']);
            $this->load->view('buyer/shortlisting_approval', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function shortlistApprovalManual() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "short";
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['locations'] = $this->register->getLocation();
            $mNature = 1;
            $data['getTows'] = $this->register->get_type_of_work($mNature);
            $data['records'] = $this->buyer->getAllParent();
            $data['RCH'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Regional C&P Head");
            $data['PM'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Project Manager");
            $data['PD'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Project Director");
            $data['CH'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Construction Head");
            $data['OH'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Operations Head");
            $data['RH'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Regional Head");
            $data['ZH'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Zonal CEO");
            $data['COO'] = $this->buyer->getAllParentByZoneAndRole("HO", "COO");
            $data['HO'] = $this->buyer->getAllParentByZoneAndRole("HO", "Head of Contracts & Procurement");
            $data['bris'] = $this->bri->getAllParentByTowKey($data['eoi']['eoi_tow']);
            $data['fiis'] = $this->fii->getAllParentByTowKey($data['eoi']['eoi_tow']);
            $this->load->view('buyer/shortlisting_approval_manual', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function shortlistApprovalManualProcurement() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "short";
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['locations'] = $this->register->getLocation();
            $mNature = 1;
            $data['getTows'] = $this->register->get_type_of_work($mNature);
            $data['records'] = $this->buyer->getAllParent();
            $data['RCH'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Regional C&P Head");
            $data['PM'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Project Manager");
            $data['PD'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Project Director");
            $data['CH'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Construction Head");
            $data['OH'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Operations Head");
            $data['RH'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Regional Head");
            $data['ZH'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Zonal CEO");
            $data['COO'] = $this->buyer->getAllParentByZoneAndRole("HO", "COO");
            $data['HO'] = $this->buyer->getAllParentByZoneAndRole("HO", "Head of Contracts & Procurement");
            $data['bris'] = $this->bri->getAllParentByTowKey($data['eoi']['eoi_tow']);
            $data['fiis'] = $this->fii->getAllParentByTowKey($data['eoi']['eoi_tow']);
            $this->load->view('buyer/shortlisting_approval_manual_procurement', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function shortlistApprovalProcurement($mEoiId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mEoiId) {
            $data['home'] = "short";
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['locations'] = $this->register->getLocation();
            $mNature = 1;
            $data['getTows'] = $this->register->get_type_of_work($mNature);
            $data['getVendor'] = $this->register->getVendor();
            $data['records'] = $this->buyer->getAllParent();
            $data['eoi'] = $this->eoi_pro->getParentByKey($mEoiId);
            $data['RCH'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Regional C&P Head");
            $data['PM'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Project Manager");
            $data['PD'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Project Director");
            $data['CH'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Construction Head");
            $data['OH'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Operations Head");
            $data['RH'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Regional Head");
            $data['ZH'] = $this->buyer->getAllParentByZoneAndRole($data['eoi']['eoi_zone'], "Zonal CEO");
            $data['COO'] = $this->buyer->getAllParentByZoneAndRole("HO", "COO");
            $data['HO'] = $this->buyer->getAllParentByZoneAndRole("HO", "Head of Contracts & Procurement");
            $data['bris'] = $this->bri->getAllParentByTowKey($data['eoi']['eoi_tow']);
            $data['fiis'] = $this->fii->getAllParentByTowKey($data['eoi']['eoi_tow']);
            $this->load->view('buyer/shortlisting_approval_procurement', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function refloatApprovalProcurement($mEoiId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $mShort = $this->shortpro->getParentByEoiKey($mEoiId);
            $mEoiData = $this->eoi_pro->getParentByKey($mEoiId);
            $vendorData = array(
                's_rejected_by' => "",
                's_approved_by' => "",
                's_date_updated' => date("Y-m-d H:i:s"),
            );
            $mActionAdd = $this->shortpro->updateParentByKey($mShort['s_id'], $vendorData);
            if ($mActionAdd == true) {
                $this->session->set_flashdata('success', 'Refloated Successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('buyer/vendor/shortlistingProcurement/' . $mEoiData['eoi_project'] . "/" . $mEoiData['eoi_zone'] . "/" . $mEoiData['eoi_type'] . "/" . $mEoiData['eoi_for'] . "/" . $mEoiData['eoi_tow'] . "/" . "1");
        } else {
            $this->load->view('index', $data);
        }
    }

    public function sendForApproval($mEoiId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mEoiId) {
            $mEoiData = $this->eoi->getParentByKey($mEoiId);
            $mProjectData = $this->projects->getParentByKey($mEoiData['eoi_project']);
            $mProjectName = $mProjectData['project_name'];
            $mApprovers = array_filter($this->input->post('s_approvers'));
            $mTow = $this->register->getWorkById($mEoiData['eoi_tow']);
            $mTowName = $mTow['name'];

            $mArrayApps = array();
            foreach ($mApprovers as $key => $mApprover) {
                $mArrayApps[] = $mApprover;
            }

            $vendorData = array(
                's_buyer_id' => $mSessionKey,
                's_eoi_id' => $mEoiId,
                's_subject' => $this->input->post('s_subject'),
                's_bwoe' => $this->input->post('s_bwoe'),
                's_bwe' => $this->input->post('s_bwe'),
                's_sow' => $this->input->post('s_sow'),
                's_cas' => $this->input->post('s_cas'),
                's_fim' => $this->input->post('s_fim'),
                's_brm' => $this->input->post('s_brm'),
                's_milestone' => $this->input->post('s_milestone'),
                's_milestone_logic' => $this->input->post('s_milestone_logic'),
                's_activity' => json_encode($this->input->post('s_activity')),
                's_fi' => $this->input->post('s_fi'),
                's_fa' => $this->input->post('s_fa'),
                's_cws' => $this->input->post('s_cws'),
                's_comments' => $this->input->post('s_comments'),
                's_vendors_selected' => json_encode($this->input->post('s_vendors_selected')),
                's_approvers' => json_encode($mArrayApps),
                's_date_added' => date("Y-m-d H:i:s"),
                's_date_updated' => date("Y-m-d H:i:s"),
            );
            $mBuyerData = $this->buyer->getParentByKey($mArrayApps[0]);
            $mBuyerName = $mBuyerData['buyer_name'];
            $mBuyerEmail = $mBuyerData['buyer_email'];
            $wSubject = "Shortlisting Approval";
            $wMessage = "
<html>
<head>
</head>
<body>
<h3>Dear $mBuyerName,</h3>
<p>
Request your approval for Bidder list of $mTowName for $mProjectName, $mSessionZone.
</p>
<h4>Regards, <br> Contracts & Procurement Team <br> " . COMPANY_NAME . "</h4>
</body>
</html>";
            $mSendMail = $this->wSendMail($mBuyerEmail, $wSubject, $wMessage);
            $mActionAdd = $this->short->addParent($vendorData);
            if ($mActionAdd == true) {
                $this->session->set_flashdata('success', 'Sent for approval successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('buyer/vendor/shortlisting/' . $mEoiData['eoi_project'] . "/" . $mEoiData['eoi_zone'] . "/" . $mEoiData['eoi_type'] . "/" . $mEoiData['eoi_for'] . "/" . $mEoiData['eoi_tow']);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function sendForApprovalProcurement($mEoiId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey && $mEoiId) {
            $mEoiData = $this->eoi_pro->getParentByKey($mEoiId);
            $mProjectData = $this->projects->getParentByKey($mEoiData['eoi_project']);
            $mProjectName = $mProjectData['project_name'];
            $mApprovers = array_filter($this->input->post('s_approvers'));
            $mTow = $this->register->getWorkById($mEoiData['eoi_tow']);
            $mTowName = $mTow['name'];
            $mApprovers = array_filter($this->input->post('s_approvers'));
            $mArrayApps = array();
            foreach ($mApprovers as $key => $mApprover) {
                $mArrayApps[] = $mApprover;
            }
            $vendorData = array(
                's_buyer_id' => $mSessionKey,
                's_eoi_id' => $mEoiId,
                's_subject' => $this->input->post('s_subject'),
                's_sow' => $this->input->post('s_sow'),
                's_bwe' => $this->input->post('s_bwe'),
                's_award' => $this->input->post('s_award'),
                's_fim' => $this->input->post('s_fim'),
                's_brm' => $this->input->post('s_brm'),
                's_milestone' => $this->input->post('s_milestone'),
                's_milestone_logic' => $this->input->post('s_milestone_logic'),
                's_activity' => json_encode($this->input->post('s_activity')),
                's_comments' => $this->input->post('s_comments'),
                's_fa' => $this->input->post('s_fa'),
                's_approvers' => json_encode($mArrayApps),
                's_date_added' => date("Y-m-d H:i:s"),
                's_date_updated' => date("Y-m-d H:i:s"),
            );
            $mBuyerData = $this->buyer->getParentByKey($mArrayApps[0]);
            $mBuyerName = $mBuyerData['buyer_name'];
            $mBuyerEmail = $mBuyerData['buyer_email'];
            $wSubject = "Shortlisting Approval";
            $wMessage = "
<html>
<head>
</head>
<body>
<h3>Dear $mBuyerName,</h3>
<p>
Request your approval for Bidder list of $mTowName for $mProjectName, $mSessionZone.
</p>
<h4>Regards, <br> Contracts & Procurement Team <br> " . COMPANY_NAME . "</h4>
</body>
</html>";
            $mSendMail = $this->wSendMail($mBuyerEmail, $wSubject, $wMessage);
            $mActionAdd = $this->shortpro->addParent($vendorData);
            if ($mActionAdd == true) {
                $this->session->set_flashdata('success', 'Sent for approval successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('buyer/vendor/shortlistingProcurement/' . $mEoiData['eoi_project'] . "/" . $mEoiData['eoi_zone'] . "/" . $mEoiData['eoi_type'] . "/" . $mEoiData['eoi_for'] . "/" . $mEoiData['eoi_tow'] . "/" . "1");
        } else {
            $this->load->view('index', $data);
        }
    }

    public function getStageOneData($mVendorId, $mAction) {
        $mSessionKey = $this->session->userdata('session_id');
        $data['home'] = "vendor";
        if ($mSessionKey) {
            $data['stageOne'] = $this->vendor->getStageOneModel($mVendorId);
            $data['locations'] = $this->register->getLocation();
            if ($data['stageOne']['natureName'] == "Contractor") {
                $mNature = 3;
            } else if ($data['stageOne']['natureName'] == "Vendor") {
                $mNature = 1;
            } else {
                $mNature = 2;
            }
            $data['getTows'] = $this->register->get_type_of_work($mNature);
            $data['mAction'] = $mAction;
            $this->load->view('buyer/stage_one_view', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function postStageTwoVendor($mRecordId) {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {

            $mGst = $this->input->post('stv_gst_file');
            $mGstUpload = $this->single_File_Upload('stv_gst_file', $mGst);

            $mPf = $this->input->post('stv_pf_file');
            $mPfUpload = $this->single_File_Upload('stv_pf_file', $mPf);

            $mPan = $this->input->post('stv_pan_file');
            $mPanUpload = $this->single_File_Upload('stv_pan_file', $mPan);

            $mAttch = $this->input->post('stv_attachment_one');
            $mAttchUpload = $this->single_File_Upload('stv_attachment_one', $mAttch);

            $mAttchTwo = $this->input->post('stv_attachment_two');
            $mAttchUploadTwo = $this->single_File_Upload('stv_attachment_two', $mAttchTwo);

            $mRecord = $this->vst->getParentByKey($mRecordId);

            if ($mGstUpload) {
                $mGstUpload = $mGstUpload;
            } else {
                $mGstUpload = $mRecord['stv_gst_file'];
            }

            if ($mPfUpload) {
                $mPfUpload = $mPfUpload;
            } else {
                $mPfUpload = $mRecord['stv_pf_file'];
            }

            if ($mPanUpload) {
                $mPanUpload = $mPanUpload;
            } else {
                $mPanUpload = $mRecord['stv_pan_file'];
            }

            if ($mAttchUpload) {
                $mAttchUpload = $mAttchUpload;
            } else {
                $mAttchUpload = $mRecord['stv_attachment_one'];
            }

            if ($mAttchUploadTwo) {
                $mAttchUploadTwo = $mAttchUploadTwo;
            } else {
                $mAttchUploadTwo = $mRecord['stv_attachment_two'];
            }

            $vendorData = array(
                'stv_company' => $this->input->post('stv_company'),
                'stv_tof' => $this->input->post('stv_tof'),
                'stv_reg' => $this->input->post('stv_reg'),
                'stv_doi' => $this->input->post('stv_doi'),
                'stv_gst' => $this->input->post('stv_gst'),
                'stv_gst_file' => $mGstUpload,
                'stv_pf' => $this->input->post('stv_pf'),
                'stv_pf_file' => $mPfUpload,
                'stv_pan' => $this->input->post('stv_pan'),
                'stv_pan_file' => $mPanUpload,
                'stv_address' => $this->input->post('stv_address'),
                'stv_tel' => $this->input->post('stv_tel'),
                'stv_fax' => $this->input->post('stv_fax'),
                'stv_website' => $this->input->post('stv_website'),
                'stv_nocp' => $this->input->post('stv_nocp'),
                'stv_eocp' => $this->input->post('stv_eocp'),
                'stv_noy' => $this->input->post('stv_noy'),
                'stv_tow' => json_encode($this->input->post('stv_tow')),
                'stv_rwgd' => json_encode($this->input->post('stv_rwgd')),
                'stv_scope_of_work' => json_encode($this->input->post('stv_scope_of_work')),
                'stv_work_details' => json_encode($this->input->post('stv_work_details')),
                'stv_attachment_one' => $mAttchUpload,
                'stv_attachment_two' => $mAttchUploadTwo,
                'stv_po_details' => json_encode($this->input->post('stv_po_details')),
                'stv_tobdvr' => $this->input->post('stv_tobdvr'),
                'stv_ssf' => $this->input->post('stv_ssf'),
                'stv_details_of_manufacturing' => json_encode($this->input->post('stv_details_of_manufacturing')),
                'stv_hroe' => $this->input->post('stv_hroe'),
                'stv_financial_referees' => json_encode($this->input->post('stv_financial_referees')),
                'stv_total_assets' => json_encode($this->input->post('stv_total_assets')),
                'stv_current_assets' => json_encode($this->input->post('stv_current_assets')),
                'stv_total_lia' => json_encode($this->input->post('stv_total_lia')),
                'stv_current_lia' => json_encode($this->input->post('stv_current_lia')),
                'stv_turnover' => json_encode($this->input->post('stv_turnover')),
                'stv_profits' => json_encode($this->input->post('stv_profits')),
                'stv_profits_tax' => json_encode($this->input->post('stv_profits_tax')),
                'stv_qap' => $this->input->post('stv_qap'),
                'stv_9001_isoc' => $this->input->post('stv_9001_isoc'),
                'stv_45001_isoc' => $this->input->post('stv_45001_isoc'),
                'stv_oca' => $this->input->post('stv_oca'),
                'stv_iaqap' => $this->input->post('stv_iaqap'),
                'stv_visit_a' => $this->input->post('stv_visit_a'),
                'stv_visit_b' => $this->input->post('stv_visit_b'),
                'stv_visit_c' => $this->input->post('stv_visit_c'),
                'stv_partner_field_1' => $this->input->post('stv_partner_field_1'),
                'stv_partner_field_2' => $this->input->post('stv_partner_field_2'),
                'stv_confirmation' => $this->input->post('stv_confirmation'),
                'stv_date_updated' => date("Y-m-d H:i:s"),
            );
            $mActionAdd = $this->vst->updateParentByKey($mRecordId, $vendorData);
            if ($mActionAdd == true) {
                $this->session->set_flashdata('success', 'Vendor stage two updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('buyer/vendor');
        } else {
            $this->load->view('index', $data);
        }
    }

    public function postStageTwoContractor($mRecordId) {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {

            $mGst = $this->input->post('stc_gst_file');
            $mGstUpload = $this->single_File_Upload('stc_gst_file', $mGst);

            $mPf = $this->input->post('stc_pf_file');
            $mPfUpload = $this->single_File_Upload('stc_pf_file', $mPf);

            $mPan = $this->input->post('stc_pan_file');
            $mPanUpload = $this->single_File_Upload('stc_pan_file', $mPan);

            $mWpcAttachment = $this->input->post('stc_wpc_attachment');
            $mWpcAttachmentUpload = $this->single_File_Upload('stc_wpc_attachment', $mWpcAttachment);

            $mAttchDcw = $this->input->post('stc_dcw_attachment');
            $$mAttchDcwUpload = $this->single_File_Upload('stc_dcw_attachment', $mAttchDcw);

            $mAttchTwo = $this->input->post('stc_attachment_two');
            $mAttchUploadTwo = $this->single_File_Upload('stc_attachment_two', $mAttchTwo);

            $mRecord = $this->cst->getParentByKey($mRecordId);

            if ($mGstUpload) {
                $mGstUpload = $mGstUpload;
            } else {
                $mGstUpload = $mRecord['stc_gst_file'];
            }

            if ($mPfUpload) {
                $mPfUpload = $mPfUpload;
            } else {
                $mPfUpload = $mRecord['stc_pf_file'];
            }

            if ($mPanUpload) {
                $mPanUpload = $mPanUpload;
            } else {
                $mPanUpload = $mRecord['stc_pan_file'];
            }

            if ($mWpcAttachmentUpload) {
                $mWpcAttachmentUpload = $mWpcAttachmentUpload;
            } else {
                $mWpcAttachmentUpload = $mRecord['stc_wpc_attachment'];
            }

            if ($$mAttchDcwUpload) {
                $mAttchDcwUpload = $mAttchDcwUpload;
            } else {
                $mAttchDcwUpload = $mRecord['stc_dcw_attachment'];
            }

            if ($mAttchUploadTwo) {
                $mAttchUploadTwo = $mAttchUploadTwo;
            } else {
                $mAttchUploadTwo = $mRecord['stc_attachment_two'];
            }

            $vendorData = array(
                'stc_company' => $this->input->post('stc_company'),
                'stc_tof' => $this->input->post('stc_tof'),
                'stc_reg' => $this->input->post('stc_reg'),
                'stc_doi' => $this->input->post('stc_doi'),
                'stc_gst' => $this->input->post('stc_gst'),
                'stc_gst_file' => $mGstUpload,
                'stc_pf' => $this->input->post('stc_pf'),
                'stc_pf_file' => $mPfUpload,
                'stc_pan' => $this->input->post('stc_pan'),
                'stc_pan_file' => $mPanUpload,
                'stc_address' => $this->input->post('stc_address'),
                'stc_tel' => $this->input->post('stc_tel'),
                'stc_fax' => $this->input->post('stc_fax'),
                'stc_website' => $this->input->post('stc_website'),
                'stc_nocp' => $this->input->post('stc_nocp'),
                'stc_eocp' => $this->input->post('stc_eocp'),
                'stc_noy' => $this->input->post('stc_noy'),
                'stc_tow' => json_encode($this->input->post('stc_tow')),
                'stc_wpc' => json_encode($this->input->post('stc_wpc')),
                'stc_wpc_details' => json_encode($this->input->post('stc_wpc_details')),
                'stc_wpc_attachment' => $mWpcAttachmentUpload,
                'stc_cc' => $this->input->post('stc_cc'),
                'stc_dcw' => $this->input->post('stc_dcw'),
                'stc_dcw_details' => json_encode($this->input->post('stc_dcw_details')),
                'stc_dcw_attachment' => $$mAttchDcwUpload,
                'stc_hroe' => $this->input->post('stc_hroe'),
                'stc_financial_referees' => json_encode($this->input->post('stc_financial_referees')),
                'stc_attachment_two' => $mAttchUploadTwo,
                'stc_total_assets' => json_encode($this->input->post('stc_total_assets')),
                'stc_current_assets' => json_encode($this->input->post('stc_current_assets')),
                'stc_total_lia' => json_encode($this->input->post('stc_total_lia')),
                'stc_current_lia' => json_encode($this->input->post('stc_current_lia')),
                'stc_turnover' => json_encode($this->input->post('stc_turnover')),
                'stc_profits' => json_encode($this->input->post('stc_profits')),
                'stc_profits_tax' => json_encode($this->input->post('stc_profits_tax')),
                'stc_qac' => json_encode($this->input->post('stc_qac')),
                'stc_qap' => $this->input->post('stc_qap'),
                'stc_9001_isoc' => $this->input->post('stc_9001_isoc'),
                'stc_45001_isoc' => $this->input->post('stc_45001_isoc'),
                'stc_oca' => $this->input->post('stc_oca'),
                'stc_iaqap' => $this->input->post('stc_iaqap'),
                'stc_visit_a' => $this->input->post('stc_visit_a'),
                'stc_visit_b' => $this->input->post('stc_visit_b'),
                'stc_visit_c' => $this->input->post('stc_visit_c'),
                'stc_partner_field_1' => $this->input->post('stc_partner_field_1'),
                'stc_partner_field_2' => $this->input->post('stc_partner_field_2'),
                'stc_confirmation' => $this->input->post('stc_confirmation'),
                'stc_date_updated' => date("Y-m-d H:i:s"),
            );
            $mActionAdd = $this->cst->updateParentByKey($mRecordId, $vendorData);
            if ($mActionAdd == true) {
                $this->session->set_flashdata('success', 'Vendor stage two updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('buyer/vendor');
        } else {
            $this->load->view('index', $data);
        }
    }

    public function postStageTwoConsultant($mRecordId) {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {

            $mGst = $this->input->post('stcon_gst_file');
            $mGstUpload = $this->single_File_Upload('stcon_gst_file', $mGst);

            $mPf = $this->input->post('stcon_pf_file');
            $mPfUpload = $this->single_File_Upload('stcon_pf_file', $mPf);

            $mPan = $this->input->post('stcon_pan_file');
            $mPanUpload = $this->single_File_Upload('stcon_pan_file', $mPan);

            $mWpcAttachment = $this->input->post('stcon_wpc_attachment');
            $mWpcAttachmentUpload = $this->single_File_Upload('stcon_wpc_attachment', $mWpcAttachment);

            $mAttchDcw = $this->input->post('stcon_dcw_attachment');
            $$mAttchDcwUpload = $this->single_File_Upload('stcon_dcw_attachment', $mAttchDcw);

            $mAttchTwo = $this->input->post('stcon_attachment_two');
            $mAttchUploadTwo = $this->single_File_Upload('stcon_attachment_two', $mAttchTwo);

            $vendorData = array(
                'stcon_company' => $this->input->post('stcon_company'),
                'stcon_tof' => $this->input->post('stcon_tof'),
                'stcon_reg' => $this->input->post('stcon_reg'),
                'stcon_doi' => $this->input->post('stcon_doi'),
                'stcon_gst' => $this->input->post('stcon_gst'),
                'stcon_gst_file' => $mGstUpload,
                'stcon_pf' => $this->input->post('stcon_pf'),
                'stcon_pf_file' => $mPfUpload,
                'stcon_pan' => $this->input->post('stcon_pan'),
                'stcon_pan_file' => $mPanUpload,
                'stcon_address' => $this->input->post('stcon_address'),
                'stcon_tel' => $this->input->post('stcon_tel'),
                'stcon_fax' => $this->input->post('stcon_fax'),
                'stcon_website' => $this->input->post('stcon_website'),
                'stcon_nocp' => $this->input->post('stcon_nocp'),
                'stcon_eocp' => $this->input->post('stcon_eocp'),
                'stcon_noy' => $this->input->post('stcon_noy'),
                'stcon_tow' => json_encode($this->input->post('stcon_tow')),
                'stcon_wpc' => $this->input->post('stcon_wpc'),
                'stcon_cc' => $this->input->post('stcon_cc'),
                'stcon_wpc_details' => json_encode($this->input->post('stcon_wpc_details')),
                'stcon_wpc_attachment' => $this->input->post('stcon_wpc_attachment'),
                'stcon_ccc' => $this->input->post('stcon_ccc'),
                'stcon_dcw_details' => json_encode($this->input->post('stcon_dcw_details')),
                'stcon_dcw_attachment' => $mAttchDcwUpload,
                'stcon_hroe' => json_decode($this->input->post('stcon_hroe')),
                'stcon_roe' => $this->input->post('stcon_roe'),
                'stcon_acr' => json_decode($this->input->post('stcon_acr')),
                'stcon_pii' => $this->input->post('stcon_pii'),
                'stcon_financial_referees' => json_decode($this->input->post('stcon_financial_referees')),
                'stcon_total_assets' => json_encode($this->input->post('stcon_total_assets')),
                'stcon_current_assets' => json_encode($this->input->post('stcon_current_assets')),
                'stcon_total_lia' => json_encode($this->input->post('stcon_total_lia')),
                'stcon_current_lia' => json_encode($this->input->post('stcon_current_lia')),
                'stcon_turnover' => json_encode($this->input->post('stcon_turnover')),
                'stcon_profits' => json_encode($this->input->post('stcon_profits')),
                'stcon_profits_tax' => json_encode($this->input->post('stcon_profits_tax')),
                'stcon_qac' => json_encode($this->input->post('stcon_qac')),
                'stcon_qap' => $this->input->post('stcon_qap'),
                'stcon_45001_isoc' => $this->input->post('stcon_45001_isoc'),
                'stcon_45001_isoc' => $this->input->post('stcon_45001_isoc'),
                'stcon_oca' => $this->input->post('stcon_oca'),
                'stcon_iaqap' => $this->input->post('stcon_iaqap'),
                'stcon_partner_field_1' => $this->input->post('stcon_partner_field_1'),
                'stcon_partner_field_2' => $this->input->post('stcon_partner_field_2'),
                'stcon_confirmation' => $this->input->post('stcon_confirmation'),
                'stcon_date_updated' => date("Y-m-d H:i:s"),
            );
            $mActionAdd = $this->const->updateParentByKey($mRecordId, $vendorData);
            if ($mActionAdd == true) {
                $this->session->set_flashdata('success', 'Vendor stage two updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('buyer/vendor');
        } else {
            $this->load->view('index', $data);
        }
    }

    public function saveStageOneData($mVendorId) {
        $mSessionKey = $this->session->userdata('session_id');
        $data['home'] = "vendor";
        if ($mSessionKey) {
            $company_name = $this->input->post('company_name');
            $user_name = $this->input->post('user_name');
            $email = $this->input->post('email');
            $contact_number = $this->input->post('contact_number');
            $turn_over_of_last_3years = $this->input->post('turn_over_of_last_3years');
            $location = $this->input->post('location');
            $interested_zones = $this->input->post('interested_zones');
            $city_name = $this->input->post('city_name');
            $clientele = $this->input->post('clientele');
            $address = $this->input->post('address');
            $website = $this->input->post('website');
            $profile = $this->input->post('profile');

            $profile = $this->input->post('profile');
            $profileUpload = $this->single_File_Upload('profile', $profile);

            $mRecord = $this->vendor->getParentByKey($mVendorId);

            if ($profileUpload) {
                $profileUpload = $profileUpload;
            } else {
                $profileUpload = $mRecord['profile'];
            }

            $userdata = array(
                'company_name' => $company_name,
                'user_name' => $user_name,
                'email' => $email,
                'contact_number' => $contact_number,
                'turn_over_of_last_3years' => $turn_over_of_last_3years,
                'location' => $location,
                'interested_zones' => json_encode($interested_zones),
                'city_name' => $city_name,
                'clientele' => $clientele,
                'address' => $address,
                'website' => $website,
                'profile' => $profileUpload,
                'updated_at' => date("Y-m-d H:i:s"),
            );

            $mUpdate = $this->register->updateParentByKey($mVendorId, $userdata);
            if ($mUpdate == true) {
                $this->session->set_flashdata('success', 'Vendor updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('buyer/vendor/getStageOneData/' . $mVendorId . "/" . "edit");
        } else {
            $this->load->view('index', $data);
        }
    }

    public function getStageTwoData($mVendorId, $mAction, $mSessionType) {
        $mSessionKey = $this->session->userdata('session_id');
// echo $mSessionType;exit();
        $data['home'] = "vendor";
        if ($mSessionKey) {
            $data['getStageTwo'] = $this->vendor->getStageTwo($mVendorId);
            if ($mSessionType == "1") {
                $data['mRecord'] = $this->vst->getParentByVendorKey($mVendorId);
                if ($mAction == "view") {
                    $data['disable'] = "disabled";
                } else {
                    $data['disable'] = "";
                }
                $this->load->view('buyer/fill_stage_two_vendor', $data);
            } else if ($mSessionType == "2") {
                $data['mRecord'] = $this->const->getParentByVendorKey($mVendorId);
                if ($mAction == "view") {
                    $data['disable'] = "disabled";
                } else {
                    $data['disable'] = "";
                }
                $this->load->view('buyer/fill_stage_two_consultant', $data);
            } else if ($mSessionType == "3") {
                $data['mRecord'] = $this->cst->getParentByVendorKey($mVendorId);
                if ($data['mRecord']['stc_small'] == 1) {
                    if ($mAction == "view") {
                        $data['disable'] = "disabled";
                    } else {
                        $data['disable'] = "";
                    }
                    $data['mTows'] = $this->buyer_model->getAllTypeOfWorkByVendorType($mSessionType);
                    $this->load->view('buyer/fill_small_stage_two_contractor', $data);
                } else {
                    if ($mAction == "view") {
                        $data['disable'] = "disabled";
                    } else {
                        $data['disable'] = "";
                    }
                    $data['mTows'] = $this->buyer_model->getAllTypeOfWorkByVendorType($mSessionType);
                    $this->load->view('buyer/fill_stage_two_contractor', $data);
                }
            } else if ($mSessionType == "4") {
                $data['mRecord'] = $this->vst->getParentByVendorKey($mVendorId);
                if ($mAction == "view") {
                    $data['disable'] = "disabled";
                } else {
                    $data['disable'] = "";
                }
                $this->load->view('buyer/fill_stage_two_vendor', $data);
            } else {
                $this->load->view('vendor/project', $data);
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function getSiteReports() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "site_reports";
            $data['mRecords'] = $this->vendor->getVendorsForSiteVisitReport($mSessionKey);
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $this->load->view('buyer/site_reports', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function viewSiteReports($mType, $mVendorId, $mTowId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "site_reports";
            if ($mType == 1) {
                $data['mVendorData'] = $this->vendor->getParentByKey($mVendorId);
                $data['typeofwork'] = $this->vendor->getStageOneModel($mVendorId);
                $data['typeofwork'] = $data['typeofwork']['typeOfWork'];
                $mStageTwo = $this->vst->getParentByVendorKey($mVendorId);
                $mGetTowDesc = $this->buyer->getTypeOfWork($mTowId);
                $mSiteA = json_decode($mStageTwo['stv_visit_a']);
                $mSiteB = $mStageTwo['stv_visit_b'];
                $mSiteC = $mStageTwo['stv_visit_c'];
                $mSites = array();
                if ($mSiteA) {
                    foreach ($mSiteA as $key => $mSite) {
                        array_push($mSites, $mSite);
                    }
                }
                if ($mSiteB) {
                    array_push($mSites, $mSiteB);
                }
                array_push($mSites, "Others");
                $data['mSites'] = $mSites;
                $data['towdata'] = $mGetTowDesc;
                $this->load->view('buyer/view_site_report_vendor', $data);
            } else if ($mType == 2) {
                $data['mVendorData'] = $this->vendor->getParentByKey($mVendorId);
                $this->load->view('buyer/view_site_report_consultant', $data);
            } else if ($mType == 3) {
                $data['mVendorData'] = $this->vendor->getParentByKey($mVendorId);
                $data['typeofwork'] = $this->vendor->getStageOneModel($mVendorId);
                $data['typeofwork'] = $data['typeofwork']['typeOfWork'];
                $mStageTwo = $this->cst->getParentByVendorKey($mVendorId);
                $mGetTowDesc = $this->buyer->getTypeOfWork($mTowId);
                $mSiteA = json_decode($mStageTwo['stc_visit_a']);
                $mSiteB = $mStageTwo['stc_visit_b'];
                $mSiteC = $mStageTwo['stc_visit_c'];
                $mSites = array();
                if ($mSiteA) {
                    foreach ($mSiteA as $key => $mSite) {
                        array_push($mSites, $mSite);
                    }
                }
                if ($mSiteB) {
                    array_push($mSites, $mSiteB);
                }
                array_push($mSites, "Others");
                $data['mSites'] = $mSites;
                $data['towdata'] = $mGetTowDesc;
                $this->load->view('buyer/view_site_report_contractor', $data);
            } else if ($mType == 4) {
                $data['mVendorData'] = $this->vendor->getParentByKey($mVendorId);
                $this->load->view('buyer/view_site_report_project', $data);
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function viewSiteVisitReport($mSvrId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "vendor";
            $data['mRecord'] = $this->svr->getParentByKey($mSvrId);
            $data['mVendorData'] = $this->vendor->getParentByKey($data['mRecord']['svr_vendor_id']);
            $this->load->view('buyer/edit_site_report_vendor', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function viewContractorSiteVisitReport($mSvrId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "vendor";
            $data['mRecord'] = $this->svrc->getParentByKey($mSvrId);
            $data['mVendorData'] = $this->vendor->getParentByKey($data['mRecord']['svrc_vendor_id']);
            $this->load->view('buyer/edit_site_report_contractor', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function viewConsultantSiteVisitReport($mSvrId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "vendor";
            $data['mRecord'] = $this->svr->getConsultantParentByKey($mSvrId);
            $data['mVendorData'] = $this->vendor->getParentByKey($data['mRecord']['svr_vendor_id']);
            $this->load->view('buyer/edit_site_report_consultant', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function editSiteVisitReport($mSvrId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "vendor";
            $data['mRecord'] = $this->svr->getParentByKey($mSvrId);
            $data['mVendorData'] = $this->vendor->getParentByKey($data['mRecord']['svr_vendor_id']);
            $this->load->view('buyer/pm_edit_site_report_vendor', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function editContractorSiteVisitReport($mSvrId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "vendor";
            $data['mRecord'] = $this->svrc->getParentByKey($mSvrId);
            $data['mVendorData'] = $this->vendor->getParentByKey($data['mRecord']['svrc_vendor_id']);
            $this->load->view('buyer/pm_edit_site_report_contractor', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function editConsultantSiteVisitReport($mSvrId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "vendor";
            $data['mRecord'] = $this->svr->getConsultantParentByKey($mSvrId);
            $data['mVendorData'] = $this->vendor->getParentByKey($data['mRecord']['svr_vendor_id']);
            $this->load->view('buyer/pm_edit_site_report_consultant', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function addPqScore($mVendorId, $mType, $mTowId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $mGetTowDesc = $this->buyer->getTypeOfWork($mTowId);
            $data['mTowData'] = $mGetTowDesc;
            if ($mType == 1) {
                $data['home'] = "vendor";
                $data['mVendorData'] = $this->vendor->getParentByKey($mVendorId);
                $mVendorStageTwoData = $this->vst->getParentByVendorKey($mVendorId);
                $mBrandData = $mVendorStageTwoData['stv_tobdvr'];
                if (stripos($mBrandData, "1") !== FALSE) {
                    $mFirstScore = "10";
                }
                if (stripos($mBrandData, "2") !== FALSE) {
                    $mFirstScore = "8";
                }
                if (stripos($mBrandData, "3") !== FALSE) {
                    $mFirstScore = "5";
                }
                if (stripos($mBrandData, "4") !== FALSE) {
                    $mFirstScore = "3";
                }
                if (stripos($mBrandData, "5") !== FALSE) {
                    $mFirstScore = "0";
                }
                $mRegData = $mVendorStageTwoData['stv_rwgd'];
                if (stripos($mRegData, "1") !== FALSE) {
                    $mSecondScore = "15";
                }
                if (stripos($mRegData, "2") !== FALSE) {
                    $mSecondScore = "10";
                }
                if (stripos($mRegData, "3") !== FALSE) {
                    $mSecondScore = "5";
                }
                if (stripos($mRegData, "4") !== FALSE) {
                    $mSecondScore = "0";
                }

                $mSalesData = $mVendorStageTwoData['stv_ssf'];
                if (stripos($mSalesData, "Service center / authorised dealer within city limits in the region") !== FALSE) {
                    $mThirdScore = "10";
                }
                if (stripos($mSalesData, "Service center / authorised dealer beyond city limits in the region ") !== FALSE) {
                    $mThirdScore = "5";
                }
                if (stripos($mSalesData, "No service center in India") !== FALSE) {
                    $mThirdScore = "0";
                }

                $mTurnOver = json_decode($mVendorStageTwoData['stv_turnover']);
                $mLastThreeTurn = 0;
                $mPresentYearTurn = 0;
                foreach ($mTurnOver as $key => $mTurn) {
                    if ($key == 3) {
                        $mPresentYearTurn = $mTurn;
                    } else {
                        $mLastThreeTurn += $mTurn;
                    }
                }
                $mLastThreeTurn = $mLastThreeTurn / 3;

                $mGrowthRatio = $mTurnOver[3] / $mLastThreeTurn;

                if ($mGrowthRatio > 0) {
                    if ($mGrowthRatio > 1.20) {
                        $mSixthScore = "10";
                    } else if ($mGrowthRatio < 1.2 && $mGrowthRatio >= 1.15) {
                        $mSixthScore = "7";
                    } else if ($mGrowthRatio < 1.15 && $mGrowthRatio >= 1) {
                        $mSixthScore = "3";
                    } else {
                        $mSixthScore = "0";
                    }
                } else {
                    $mSixthScore = 0;
                }

//GO AND NOGO
                $data['mSvr'] = $this->svr->getParentByVendorKey($mVendorId);
                $mFifthScore = $data['mSvr']['svr_final_score'];
                $mFifthScore = $mFifthScore * 0.5;

//Quality Data
                $mQuality = $mVendorStageTwoData['stv_9001_isoc'];
                $mQualityTwo = $mVendorStageTwoData['stv_45001_isoc'];
                $mTotalQuality = 0;
                if ($mQuality == "Yes") {
                    $mTotalQuality += 10;
                }

                if ($mQualityTwo == "Yes") {
                    $mTotalQuality += 5;
                }

                $data['mFifthScore'] = $mFifthScore;
                $data['mThirdScore'] = $mThirdScore;
                $data['mFirstScore'] = $mFirstScore;
                $data['mSecondScore'] = $mSecondScore;
                $data['mFinLimit'] = $mTurnOverAvg;
                $data['mTotalQuality'] = $mTotalQuality;
                $data['mStageTwo'] = $mVendorStageTwoData;
                $this->load->view('buyer/add_vendor_pq_score', $data);
            } else if ($mType == 2) {
                $data['mVendorData'] = $this->vendor->getParentByKey($mVendorId);
                $this->load->view('buyer/add_consultant_pq_score', $data);
            } else if ($mType == 3) {
                $data['home'] = "vendor";
                $data['mVendorData'] = $this->vendor->getParentByKey($mVendorId);
                if ($data['mVendorData']['is_small'] == "0") {
                    $mVendorStageTwoData = $this->cst->getParentByVendorKey($mVendorId);
                    $mSvrc = $this->svrc->getParentByVendorAndTowKey($mVendorId, $mTowId);
                    $mBrandData = $mVendorStageTwoData['stc_wpc'];
                    if (stripos($mBrandData, '1') !== FALSE) {
                        $mFirstScore = "10";
                    }
                    if (stripos($mBrandData, '2') !== FALSE) {
                        $mFirstScore = "10";
                    }
                    if (stripos($mBrandData, '3') !== FALSE) {
                        $mFirstScore = "5";
                    }
                    if (stripos($mBrandData, '4') !== FALSE) {
                        $mFirstScore = "3";
                    }
                    if (stripos($mBrandData, '5') !== FALSE) {
                        $mFirstScore = "3";
                    }

                    $mRegData = $mVendorStageTwoData['stc_dcw'];
                    if (stripos($mRegData, '1') !== FALSE) {
                        $mSecondScore = "10";
                    }
                    if (stripos($mRegData, '2') !== FALSE) {
                        $mSecondScore = "10";
                    }
                    if (stripos($mRegData, '3') !== FALSE) {
                        $mSecondScore = "6";
                    }
                    if (stripos($mRegData, '4') !== FALSE) {
                        $mSecondScore = "0";
                    }

                    $mSalesData = $mVendorStageTwoData['stc_cc'];
                    if (stripos($mSalesData, "1") !== FALSE) {
                        $mThirdScore = "10";
                    }
                    if (stripos($mSalesData, "2") !== FALSE) {
                        $mThirdScore = "6";
                    }
                    if (stripos($mSalesData, "3") !== FALSE) {
                        $mThirdScore = "3";
                    }
                    if (stripos($mSalesData, "4") !== FALSE) {
                        $mThirdScore = "0";
                    }

                    $mCurrentAssets = json_decode($mVendorStageTwoData['stc_current_assets']);
                    $mCurrentLia = json_decode($mVendorStageTwoData['stc_current_lia']);

                    $mWcr = $mCurrentAssets[3] / $mCurrentLia[3];

                    if ($mWcr > 1.5) {
                        $mFourthScore = "10";
                    } else if ($mWcr < 1.5 && $mWcr >= 1.15) {
                        $mFourthScore = "7";
                    } else if ($mWcr < 1.14 && $mWcr >= 1) {
                        $mFourthScore = "5";
                    } else {
                        $mFourthScore = "0";
                    }

                    $mProfits = json_decode($mVendorStageTwoData['stc_profits_tax']);
                    $mLastThree = 0;
                    $mPresentYear = 0;
                    foreach ($mProfits as $key => $mProfit) {
                        if ($key == 3) {
                            $mPresentYear = $mProfit;
                        } else {
                            $mLastThree += $mProfit;
                        }
                    }

                    $mLastThree = $mLastThree / 3;

                    $mProfitRatio = $mProfits[3] / $mLastThree;

                    if ($mProfitRatio > 0) {
                        if ($mProfitRatio > 1.25) {
                            $mFifthScore = "10";
                        } else if ($mProfitRatio < 1.25 && $mProfitRatio >= 1.15) {
                            $mFifthScore = "5";
                        } else if ($mProfitRatio < 1.15 && $mProfitRatio >= 1) {
                            $mFifthScore = "3";
                        } else {
                            $mFifthScore = "0";
                        }
                    } else {
                        $mFifthScore = 0;
                    }

                    $mTurnOver = json_decode($mVendorStageTwoData['stc_turnover']);
                    $mLastThreeTurn = 0;
                    $mPresentYearTurn = 0;
                    foreach ($mTurnOver as $key => $mTurn) {
                        if ($key == 3) {
                            $mPresentYearTurn = $mTurn;
                        } else {
                            $mLastThreeTurn += $mTurn;
                        }
                    }
                    $mLastThreeTurn = $mLastThreeTurn / 3;

                    $mGrowthRatio = $mTurnOver[3] / $mLastThreeTurn;

                    if ($mGrowthRatio > 0) {
                        if ($mGrowthRatio > 1.20) {
                            $mSixthScore = "10";
                        } else if ($mGrowthRatio < 1.2 && $mGrowthRatio >= 1.15) {
                            $mSixthScore = "7";
                        } else if ($mGrowthRatio < 1.15 && $mGrowthRatio >= 1) {
                            $mSixthScore = "3";
                        } else {
                            $mSixthScore = "0";
                        }
                    } else {
                        $mSixthScore = 0;
                    }

                    $mSeventhScore = 0;
                    if ($mVendorStageTwoData['stc_9001_isoc'] == "Yes" && $mVendorStageTwoData['stc_45001_isoc'] == "Yes") {
                        $mSeventhScore = "10";
                    } else if ($mVendorStageTwoData['stc_9001_isoc'] == "Yes" || $mVendorStageTwoData['stc_45001_isoc'] == "Yes") {
                        $mSeventhScore = "5";
                    }
                    $mEighthScore = $mSvrc['svrc_final_score'] * 0.3;

                    $mTurnOver = json_decode($mVendorStageTwoData['stv_turnover']);
                    $mTurnOver = array_sum($mTurnOver);
                    $mTurnOverAvg = $mTurnOver / 3;
                    $mTurnOverAvg = $mTurnOverAvg * 0.5;

//Quality Data
                    $mQuality = $mVendorStageTwoData['stv_9001_isoc'];
                    $mQualityTwo = $mVendorStageTwoData['stv_45001_isoc'];
                    $mTotalQuality = 0;
                    if ($mQuality == "Yes") {
                        $mTotalQuality += 10;
                    }

                    if ($mQualityTwo == "Yes") {
                        $mTotalQuality += 5;
                    }

                    $data['mFifthScore'] = $mFifthScore;
                    $data['mThirdScore'] = $mThirdScore;
                    $data['mFirstScore'] = $mFirstScore;
                    $data['mSecondScore'] = $mSecondScore;
                    $data['mFourthScore'] = $mFourthScore;
                    $data['mFifthScore'] = $mFifthScore;
                    $data['mSixthScore'] = $mSixthScore;
                    $data['mSeventhScore'] = $mSeventhScore;
                    $data['mEighthScore'] = round($mEighthScore, 2);
                    $data['mFinLimit'] = $mTurnOverAvg;
                    $data['mTotalQuality'] = $mTotalQuality;
                    $data['mStageTwo'] = $mVendorStageTwoData;
                    $this->load->view('buyer/add_contractor_pq_score', $data);
                } else {
                    $mVendorStageTwoData = $this->cst->getParentByVendorKey($mVendorId);
//$mSvrc = $this->svrc->getParentByVendorAndTowKey($mVendorId, $mTowId);
                    $mBrandData = $mVendorStageTwoData['stc_wpc'];
                    if (stripos($mBrandData, '1') !== FALSE) {
                        $mFirstScore = "30";
                    }
                    if (stripos($mBrandData, '2') !== FALSE) {
                        $mFirstScore = "30";
                    }
                    if (stripos($mBrandData, '3') !== FALSE) {
                        $mFirstScore = "20";
                    }
                    if (stripos($mBrandData, '4') !== FALSE) {
                        $mFirstScore = "20";
                    }
                    if (stripos($mBrandData, '5') !== FALSE) {
                        $mFirstScore = "10";
                    }

                    $mRegData = $mVendorStageTwoData['stc_dcw'];
                    if (stripos($mRegData, '1') !== FALSE) {
                        $mSecondScore = "20";
                    }
                    if (stripos($mRegData, '2') !== FALSE) {
                        $mSecondScore = "20";
                    }
                    if (stripos($mRegData, '3') !== FALSE) {
                        $mSecondScore = "12";
                    }
                    if (stripos($mRegData, '4') !== FALSE) {
                        $mSecondScore = "7";
                    }

                    $mCurrentAssets = json_decode($mVendorStageTwoData['stc_turnover']);
                    $mCurrentAssets = array_sum($mCurrentAssets) / 4;

                    if ($mCurrentAssets > 0.25) {
                        $mThirdScore = "10";
                    } else if ($mCurrentAssets < 0.25 && $mCurrentAssets >= 0.10) {
                        $mThirdScore = "6";
                    } else if ($mCurrentAssets < 0.10) {
                        $mThirdScore = "3";
                    } else {
                        $mThirdScore = "0";
                    }

                    $mCc = $mVendorStageTwoData['stc_cc'];
                    if (stripos($mCc, '1') !== FALSE) {
                        $mFourthScore = "20";
                    }
                    if (stripos($mRegData, '2') !== FALSE) {
                        $mFourthScore = "12";
                    }
                    if (stripos($mRegData, '3') !== FALSE) {
                        $mFourthScore = "6";
                    }

                    $data['mFifthScore'] = $mFifthScore;
                    $data['mThirdScore'] = $mThirdScore;
                    $data['mFirstScore'] = $mFirstScore;
                    $data['mSecondScore'] = $mSecondScore;
                    $data['mFourthScore'] = $mFourthScore;
                    $data['mFifthScore'] = $mFifthScore;
                    $data['mFinLimit'] = $mTurnOverAvg;
                    $data['mTotalQuality'] = $mTotalQuality;
                    $data['mStageTwo'] = $mVendorStageTwoData;
                    $this->load->view('buyer/add_small_contractor_pq_score', $data);
                }
            } else if ($mType == 4) {
                $data['mVendorData'] = $this->vendor->getParentByKey($mVendorId);
                $this->load->view('buyer/view_site_report_project', $data);
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function editPqScore($mPqvId, $mVendorId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "vendor";
            $data['mVendorData'] = $this->vendor->getParentByKey($mVendorId);
            $mVendorStageTwoData = $this->vst->getParentByVendorKey($mVendorId);
            $data['mRecord'] = $this->pqv->getParentByKey($mPqvId);
            $mBrandData = $mVendorStageTwoData['stv_tobdvr'];
            if (stripos($mBrandData, "1") !== FALSE) {
                $mFirstScore = "10";
            }
            if (stripos($mBrandData, "2") !== FALSE) {
                $mFirstScore = "8";
            }
            if (stripos($mBrandData, "3") !== FALSE) {
                $mFirstScore = "5";
            }
            if (stripos($mBrandData, "4") !== FALSE) {
                $mFirstScore = "3";
            }
            if (stripos($mBrandData, "5") !== FALSE) {
                $mFirstScore = "0";
            }
            $mRegData = $mVendorStageTwoData['stv_rwgd'];
            if (stripos($mRegData, "1") !== FALSE) {
                $mSecondScore = "15";
            }
            if (stripos($mRegData, "2") !== FALSE) {
                $mSecondScore = "10";
            }
            if (stripos($mRegData, "3") !== FALSE) {
                $mSecondScore = "5";
            }
            if (stripos($mRegData, "4") !== FALSE) {
                $mSecondScore = "0";
            }

            $mSalesData = $mVendorStageTwoData['stv_ssf'];
            if (stripos($mSalesData, "Service center / authorised dealer within city limits in the region") !== FALSE) {
                $mThirdScore = "10";
            }
            if (stripos($mSalesData, "Service center / authorised dealer beyond city limits in the region ") !== FALSE) {
                $mThirdScore = "5";
            }
            if (stripos($mSalesData, "No service center in India") !== FALSE) {
                $mThirdScore = "0";
            }

            $mTurnOver = json_decode($mVendorStageTwoData['stv_turnover']);
            $mLastThreeTurn = 0;
            $mPresentYearTurn = 0;
            foreach ($mTurnOver as $key => $mTurn) {
                if ($key == 3) {
                    $mPresentYearTurn = $mTurn;
                } else {
                    $mLastThreeTurn += $mTurn;
                }
            }
            $mLastThreeTurn = $mLastThreeTurn / 3;

            $mGrowthRatio = $mTurnOver[3] / $mLastThreeTurn;

            if ($mGrowthRatio > 0) {
                if ($mGrowthRatio > 1.20) {
                    $mSixthScore = "10";
                } else if ($mGrowthRatio < 1.2 && $mGrowthRatio >= 1.15) {
                    $mSixthScore = "7";
                } else if ($mGrowthRatio < 1.15 && $mGrowthRatio >= 1) {
                    $mSixthScore = "3";
                } else {
                    $mSixthScore = "0";
                }
            } else {
                $mSixthScore = 0;
            }

//GO AND NOGO
            $data['mSvr'] = $this->svr->getParentByVendorAndTowKey($mVendorId, $data['mRecord']['pqv_tow_id']);
            $mFifthScore = $data['mSvr']['svr_final_score'];
            $mFifthScore = $mFifthScore * 0.5;

//Quality Data
            $mQuality = $mVendorStageTwoData['stv_9001_isoc'];
            $mQualityTwo = $mVendorStageTwoData['stv_45001_isoc'];
            $mTotalQuality = 0;
            if ($mQuality == "Yes") {
                $mTotalQuality += 10;
            }

            if ($mQualityTwo == "Yes") {
                $mTotalQuality += 5;
            }

            $data['mFifthScore'] = $mFifthScore;
            $data['mThirdScore'] = $mThirdScore;
            $data['mFirstScore'] = $mFirstScore;
            $data['mSecondScore'] = $mSecondScore;
            $data['mFinLimit'] = $mTurnOverAvg;
            $data['mTotalQuality'] = $mTotalQuality;
            $data['mSvr'] = $this->svr->getParentByVendorKey($mVendorId);

            $this->load->view('buyer/edit_vendor_pq_score', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function savePqv($mVendorId, $mPqvId = null) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            if ($mPqvId) {
// Update the record
                $data = array(
                    'pqv_first_score' => $this->input->post('pqv_first_score'),
                    'pqv_first_score_sg' => $this->input->post('pqv_first_score_sg'),
                    'pqv_second_score' => $this->input->post('pqv_second_score'),
                    'pqv_second_score_sg' => $this->input->post('pqv_second_score_sg'),
                    'pqv_third_score' => $this->input->post('pqv_third_score'),
                    'pqv_third_score_sg' => $this->input->post('pqv_third_score_sg'),
                    'pqv_first_score_remarks' => $this->input->post('pqv_first_score_remarks'),
                    'pqv_second_score_remarks' => $this->input->post('pqv_second_score_remarks'),
                    'pqv_third_score_remarks' => $this->input->post('pqv_third_score_remarks'),
                    'pqv_fourth_score' => $this->input->post('pqv_fourth_score'),
                    'pqv_fifth_score' => $this->input->post('pqv_fifth_score'),
                    'pqv_total' => $this->input->post('pqv_total'),
                    'pqv_fin_limit' => $this->input->post('pqv_fin_limit'),
                    'pqv_date_updated' => date('Y-m-d H:i:s'),
                );
                $mUpdate = $this->pqv->updateParentByKey($mPqvId, $data);
                if ($mUpdate == true) {
                    $this->session->set_flashdata('success', 'PQ Score updated submitted successfully.');
                    redirect('buyer/vendor');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor');
                }
            } else {
                $data = array(
                    'pqv_vendor_id' => $mVendorId,
                    'pqv_buyer_id' => $mSessionKey,
                    'pqv_tow_id' => $this->input->post('pqv_tow_id'),
                    'pqv_first_score' => $this->input->post('pqv_first_score'),
                    'pqv_first_score_sg' => $this->input->post('pqv_first_score_sg'),
                    'pqv_second_score' => $this->input->post('pqv_second_score'),
                    'pqv_second_score_sg' => $this->input->post('pqv_second_score_sg'),
                    'pqv_third_score' => $this->input->post('pqv_third_score'),
                    'pqv_third_score_sg' => $this->input->post('pqv_third_score_sg'),
                    'pqv_first_score_remarks' => $this->input->post('pqv_first_score_remarks'),
                    'pqv_second_score_remarks' => $this->input->post('pqv_second_score_remarks'),
                    'pqv_third_score_remarks' => $this->input->post('pqv_third_score_remarks'),
                    'pqv_fourth_score' => $this->input->post('pqv_fourth_score'),
                    'pqv_fifth_score' => $this->input->post('pqv_fifth_score'),
                    'pqv_total' => $this->input->post('pqv_total'),
                    'pqv_fin_limit' => $this->input->post('pqv_fin_limit'),
                    'pqv_date_added' => date('Y-m-d H:i:s'),
                    'pqv_date_updated' => date('Y-m-d H:i:s'),
                );
                $mInsert = $this->pqv->addParent($data);
                if ($mInsert) {
                    $mVendor = $this->vendor->getParentByKey($mVendorId);
                    $mVendorEmail = $mVendor['email'];
                    $mPmData = $this->buyer->getZonalSpecByZone($mVendor['location']);
                    $mBuyerData = $this->buyer->getParentByKey($mPmData['zs_linked']);
                    $mBuyerName = $mBuyerData['buyer_name'];
                    $mBuyerEmail = $mBuyerData['buyer_email'];
                    $mTow = $this->register->getWorkById($this->input->post('pqv_tow_id'));
                    $mTowName = $mTow['name'];
                    $wSubject = "PQ Generation";
                    $wMessage = "
<html>
<head>
</head>
<body>
PQ Generated successfully ($mTowName)
</p>
<h4>Regards, <br> " . COMPANY_NAME . "</h4>
</body>
</html>";
                    $mSendMail = $this->wSendMail($mBuyerEmail, $wSubject, $wMessage);
                    $mSendMail = $this->wSendMail($mVendorEmail, $wSubject, $wMessage);
                    $this->session->set_flashdata('success', 'PQ Score submitted successfully.');
                    redirect('buyer/vendor');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor');
                }
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function savePqc($mVendorId, $mPqvId = null) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            if ($mPqvId) {
// Update the record
                $data = array(
                    'pqc_first_score' => $this->input->post('pqc_first_score'),
                    'pqc_first_score_sg' => $this->input->post('pqc_first_score_sg'),
                    'pqc_first_remarks' => $this->input->post('pqc_first_remarks'),
                    'pqc_second_score' => $this->input->post('pqc_second_score'),
                    'pqc_second_score_sg' => $this->input->post('pqc_second_score_sg'),
                    'pqc_second_remarks' => $this->input->post('pqc_second_remarks'),
                    'pqc_third_score' => $this->input->post('pqc_third_score'),
                    'pqc_third_score_sg' => $this->input->post('pqc_third_score_sg'),
                    'pqc_third_remarks' => $this->input->post('pqc_third_remarks'),
                    'pqc_fourth_score' => $this->input->post('pqc_fourth_score'),
                    'pqc_fourth_score_sg' => $this->input->post('pqc_fourth_score_sg'),
                    'pqc_fourth_remarks' => $this->input->post('pqc_fourth_remarks'),
                    'pqc_fifth_score' => $this->input->post('pqc_fifth_score'),
                    'pqc_fifth_score_sg' => $this->input->post('pqc_fifth_score_sg'),
                    'pqc_fifth_remarks' => $this->input->post('pqc_fifth_remarks'),
                    'pqc_sixth_score' => $this->input->post('pqc_sixth_score'),
                    'pqc_sixth_score_sg' => $this->input->post('pqc_sixth_score_sg'),
                    'pqc_sixth_remarks' => $this->input->post('pqc_sixth_remarks'),
                    'pqc_seventh_score_sg' => $this->input->post('pqc_seventh_score_sg'),
                    'pqc_eighth_score_sg' => $this->input->post('pqc_eighth_score_sg'),
                    'pqc_total' => $this->input->post('pqc_total'),
                    'pqc_fin_limit' => $this->input->post('pqc_fin_limit'),
                    'pqc_date_updated' => date('Y-m-d H:i:s'),
                );
                $mUpdate = $this->pqc->updateParentByKey($mPqvId, $data);
                if ($mUpdate == true) {
                    $mVendor = $this->vendor->getParentByKey($mVendorId);
                    $mVendorEmail = $mVendor['email'];
                    $mPmData = $this->buyer->getZonalSpecByZone($mVendor['location']);
                    $mBuyerData = $this->buyer->getParentByKey($mPmData['zs_linked']);
                    $mBuyerName = $mBuyerData['buyer_name'];
                    $mBuyerEmail = $mBuyerData['buyer_email'];
                    $mTow = $this->register->getWorkById($this->input->post('pqv_tow_id'));
                    $mTowName = $mTow['name'];
                    $wSubject = "PQ Generation";
                    $wMessage = "
<html>
<head>
</head>
<body>
PQ Generated successfully ($mTowName)
</p>
<h4>Regards, <br> " . COMPANY_NAME . "</h4>
</body>
</html>";
                    $mSendMail = $this->wSendMail($mBuyerEmail, $wSubject, $wMessage);
                    $mSendMail = $this->wSendMail($mVendorEmail, $wSubject, $wMessage);
                    $this->session->set_flashdata('success', 'PQ Score updated submitted successfully.');
                    redirect('buyer/vendor');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor');
                }
            } else {
                $data = array(
                    'pqc_vendor_id' => $mVendorId,
                    'pqc_buyer_id' => $mSessionKey,
                    'pqc_tow_id' => $this->input->post('pqc_tow_id'),
                    'pqc_first_score' => $this->input->post('pqc_first_score'),
                    'pqc_first_score_sg' => $this->input->post('pqc_first_score_sg'),
                    'pqc_first_remarks' => $this->input->post('pqc_first_remarks'),
                    'pqc_second_score' => $this->input->post('pqc_second_score'),
                    'pqc_second_score_sg' => $this->input->post('pqc_second_score_sg'),
                    'pqc_second_remarks' => $this->input->post('pqc_second_remarks'),
                    'pqc_third_score' => $this->input->post('pqc_third_score'),
                    'pqc_third_score_sg' => $this->input->post('pqc_third_score_sg'),
                    'pqc_third_remarks' => $this->input->post('pqc_third_remarks'),
                    'pqc_fourth_score' => $this->input->post('pqc_fourth_score'),
                    'pqc_fourth_score_sg' => $this->input->post('pqc_fourth_score_sg'),
                    'pqc_fourth_remarks' => $this->input->post('pqc_fourth_remarks'),
                    'pqc_fifth_score' => $this->input->post('pqc_fifth_score'),
                    'pqc_fifth_score_sg' => $this->input->post('pqc_fifth_score_sg'),
                    'pqc_fifth_remarks' => $this->input->post('pqc_fifth_remarks'),
                    'pqc_sixth_score' => $this->input->post('pqc_sixth_score'),
                    'pqc_sixth_score_sg' => $this->input->post('pqc_sixth_score_sg'),
                    'pqc_sixth_remarks' => $this->input->post('pqc_sixth_remarks'),
                    'pqc_seventh_score_sg' => $this->input->post('pqc_seventh_score_sg'),
                    'pqc_eighth_score_sg' => $this->input->post('pqc_eighth_score_sg'),
                    'pqc_total' => $this->input->post('pqc_total'),
                    'pqc_fin_limit' => $this->input->post('pqc_fin_limit'),
                    'pqc_date_added' => date('Y-m-d H:i:s'),
                    'pqc_date_updated' => date('Y-m-d H:i:s'),
                );
                $mInsert = $this->pqc->addParent($data);
                if ($mInsert) {

                    $mVendor = $this->vendor->getParentByKey($mVendorId);
                    $mVendorEmail = $mVendor['email'];
                    $mPmData = $this->buyer->getZonalSpecByZone($mVendor['location']);
                    $mBuyerData = $this->buyer->getParentByKey($mPmData['zs_linked']);
                    $mBuyerName = $mBuyerData['buyer_name'];
                    $mBuyerEmail = $mBuyerData['buyer_email'];
                    $mTow = $this->register->getWorkById($this->input->post('pqv_tow_id'));
                    $mTowName = $mTow['name'];
                    $wSubject = "PQ Generation";
                    $wMessage = "
<html>
<head>
</head>
<body>
PQ Generated successfully ($mTowName)
</p>
<h4>Regards, <br> " . COMPANY_NAME . "</h4>
</body>
</html>";
                    $mSendMail = $this->wSendMail($mBuyerEmail, $wSubject, $wMessage);
                    $mSendMail = $this->wSendMail($mVendorEmail, $wSubject, $wMessage);
                    $mMessage = "PQ Score submitted successfully.";

                    $this->session->set_flashdata('success', 'PQ Score submitted successfully.');
                    redirect('buyer/vendor');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor');
                }
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function editPqcScore($mPqvId, $mVendorId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['mVendorData'] = $this->vendor->getParentByKey($mVendorId);
            if ($data['mVendorData']['is_small'] == "0") {
                $mVendorStageTwoData = $this->cst->getParentByVendorKey($mVendorId);
                $data['mRecord'] = $this->pqc->getParentByKey($mPqvId);
                $mSvrc = $this->svrc->getParentByVendorAndTowKey($mVendorId, $data['mRecord']['pqc_tow_id']);
                $mBrandData = $mVendorStageTwoData['stc_wpc'];
                if (stripos($mBrandData, '1') !== FALSE) {
                    $mFirstScore = "10";
                }
                if (stripos($mBrandData, '2') !== FALSE) {
                    $mFirstScore = "10";
                }
                if (stripos($mBrandData, '3') !== FALSE) {
                    $mFirstScore = "5";
                }
                if (stripos($mBrandData, '4') !== FALSE) {
                    $mFirstScore = "3";
                }
                if (stripos($mBrandData, '5') !== FALSE) {
                    $mFirstScore = "3";
                }

                $mRegData = $mVendorStageTwoData['stc_dcw'];
                if (stripos($mRegData, '1') !== FALSE) {
                    $mSecondScore = "10";
                }
                if (stripos($mRegData, '2') !== FALSE) {
                    $mSecondScore = "10";
                }
                if (stripos($mRegData, '3') !== FALSE) {
                    $mSecondScore = "6";
                }
                if (stripos($mRegData, '4') !== FALSE) {
                    $mSecondScore = "0";
                }

                $mSalesData = $mVendorStageTwoData['stc_cc'];
                if (stripos($mSalesData, "1") !== FALSE) {
                    $mThirdScore = "10";
                }
                if (stripos($mSalesData, "2") !== FALSE) {
                    $mThirdScore = "6";
                }
                if (stripos($mSalesData, "3") !== FALSE) {
                    $mThirdScore = "3";
                }
                if (stripos($mSalesData, "4") !== FALSE) {
                    $mThirdScore = "0";
                }

                $mCurrentAssets = json_decode($mVendorStageTwoData['stc_current_assets']);
                $mCurrentLia = json_decode($mVendorStageTwoData['stc_current_lia']);

                $mWcr = $mCurrentAssets[3] / $mCurrentLia[3];

                if ($mWcr > 1.5) {
                    $mFourthScore = "10";
                } else if ($mWcr < 1.5 && $mWcr >= 1.15) {
                    $mFourthScore = "7";
                } else if ($mWcr < 1.14 && $mWcr >= 1) {
                    $mFourthScore = "5";
                } else {
                    $mFourthScore = "0";
                }

                $mProfits = json_decode($mVendorStageTwoData['stc_profits_tax']);
                $mLastThree = 0;
                $mPresentYear = 0;
                foreach ($mProfits as $key => $mProfit) {
                    if ($key == 3) {
                        $mPresentYear = $mProfit;
                    } else {
                        $mLastThree += $mProfit;
                    }
                }

                $mLastThree = $mLastThree / 3;

                $mProfitRatio = $mProfits[3] / $mLastThree;

                if ($mProfitRatio > 0) {
                    if ($mProfitRatio > 1.25) {
                        $mFifthScore = "10";
                    } else if ($mProfitRatio < 1.25 && $mProfitRatio >= 1.15) {
                        $mFifthScore = "5";
                    } else if ($mProfitRatio < 1.15 && $mProfitRatio >= 1) {
                        $mFifthScore = "3";
                    } else {
                        $mFifthScore = "0";
                    }
                } else {
                    $mFifthScore = 0;
                }

                $mTurnOver = json_decode($mVendorStageTwoData['stc_turnover']);
                $mLastThreeTurn = 0;
                $mPresentYearTurn = 0;
                foreach ($mTurnOver as $key => $mTurn) {
                    if ($key == 3) {
                        $mPresentYearTurn = $mTurn;
                    } else {
                        $mLastThreeTurn += $mTurn;
                    }
                }
                $mLastThreeTurn = $mLastThreeTurn / 3;

                $mGrowthRatio = $mTurnOver[3] / $mLastThreeTurn;

                if ($mGrowthRatio > 0) {
                    if ($mGrowthRatio > 1.20) {
                        $mSixthScore = "10";
                    } else if ($mGrowthRatio < 1.2 && $mGrowthRatio >= 1.15) {
                        $mSixthScore = "7";
                    } else if ($mGrowthRatio < 1.15 && $mGrowthRatio >= 1) {
                        $mSixthScore = "3";
                    } else {
                        $mSixthScore = "0";
                    }
                } else {
                    $mSixthScore = 0;
                }

                $mSeventhScore = 0;
                if ($mVendorStageTwoData['stc_9001_isoc'] == "Yes" && $mVendorStageTwoData['stc_45001_isoc'] == "Yes") {
                    $mSeventhScore = "10";
                } else if ($mVendorStageTwoData['stc_9001_isoc'] == "Yes" || $mVendorStageTwoData['stc_45001_isoc'] == "Yes") {
                    $mSeventhScore = "5";
                }
                $mEighthScore = $mSvrc['svrc_final_score'] * 0.3;

                $mTurnOver = json_decode($mVendorStageTwoData['stv_turnover']);
                $mTurnOver = array_sum($mTurnOver);
                $mTurnOverAvg = $mTurnOver / 3;
                $mTurnOverAvg = $mTurnOverAvg * 0.5;

//Quality Data
                $mQuality = $mVendorStageTwoData['stv_9001_isoc'];
                $mQualityTwo = $mVendorStageTwoData['stv_45001_isoc'];
                $mTotalQuality = 0;
                if ($mQuality == "Yes") {
                    $mTotalQuality += 10;
                }

                if ($mQualityTwo == "Yes") {
                    $mTotalQuality += 5;
                }

                $data['mFifthScore'] = $mFifthScore;
                $data['mThirdScore'] = $mThirdScore;
                $data['mFirstScore'] = $mFirstScore;
                $data['mSecondScore'] = $mSecondScore;
                $data['mFourthScore'] = $mFourthScore;
                $data['mFifthScore'] = $mFifthScore;
                $data['mSixthScore'] = $mSixthScore;
                $data['mSeventhScore'] = $mSeventhScore;
                $data['mEighthScore'] = round($mEighthScore, 2);
                $data['mFinLimit'] = $mTurnOverAvg;
                $data['mTotalQuality'] = $mTotalQuality;
                $data['mStageTwo'] = $mVendorStageTwoData;
                $data['svr'] = $mSvrc;
                $this->load->view('buyer/edit_contractor_pq_score', $data);
            } else {
                $mVendorStageTwoData = $this->cst->getParentByVendorKey($mVendorId);
//$mSvrc = $this->svrc->getParentByVendorAndTowKey($mVendorId, $mTowId);
                $mBrandData = $mVendorStageTwoData['stc_wpc'];
                if (stripos($mBrandData, '1') !== FALSE) {
                    $mFirstScore = "30";
                }
                if (stripos($mBrandData, '2') !== FALSE) {
                    $mFirstScore = "30";
                }
                if (stripos($mBrandData, '3') !== FALSE) {
                    $mFirstScore = "20";
                }
                if (stripos($mBrandData, '4') !== FALSE) {
                    $mFirstScore = "20";
                }
                if (stripos($mBrandData, '5') !== FALSE) {
                    $mFirstScore = "10";
                }

                $mRegData = $mVendorStageTwoData['stc_dcw'];
                if (stripos($mRegData, '1') !== FALSE) {
                    $mSecondScore = "20";
                }
                if (stripos($mRegData, '2') !== FALSE) {
                    $mSecondScore = "20";
                }
                if (stripos($mRegData, '3') !== FALSE) {
                    $mSecondScore = "12";
                }
                if (stripos($mRegData, '4') !== FALSE) {
                    $mSecondScore = "7";
                }

                $mCurrentAssets = json_decode($mVendorStageTwoData['stc_turnover']);
                $mCurrentAssets = array_sum($mCurrentAssets) / 4;

                if ($mCurrentAssets > 0.25) {
                    $mThirdScore = "10";
                } else if ($mCurrentAssets < 0.25 && $mCurrentAssets >= 0.10) {
                    $mThirdScore = "6";
                } else if ($mCurrentAssets < 0.10) {
                    $mThirdScore = "3";
                } else {
                    $mThirdScore = "0";
                }

                $mCc = $mVendorStageTwoData['stc_cc'];
                if (stripos($mCc, '1') !== FALSE) {
                    $mFourthScore = "20";
                }
                if (stripos($mRegData, '2') !== FALSE) {
                    $mFourthScore = "12";
                }
                if (stripos($mRegData, '3') !== FALSE) {
                    $mFourthScore = "6";
                }

                $data['mFifthScore'] = $mFifthScore;
                $data['mThirdScore'] = $mThirdScore;
                $data['mFirstScore'] = $mFirstScore;
                $data['mSecondScore'] = $mSecondScore;
                $data['mFourthScore'] = $mFourthScore;
                $data['mFifthScore'] = $mFifthScore;
                $data['mFinLimit'] = $mTurnOverAvg;
                $data['mTotalQuality'] = $mTotalQuality;
                $data['mStageTwo'] = $mVendorStageTwoData;
                $data['mRecord'] = $this->pqc->getParentByKey($mPqvId);
                $this->load->view('buyer/edit_small_contractor_pq_score', $data);
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionSaveSvr($mVendorId, $mSiteReportId = null) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {

            $mPhotograph = $this->input->post('svr_photograph');
            $mPhotographUpload = $this->single_File_Upload('svr_photograph', $mPhotograph);

            $mVideo = $this->input->post('svr_video');
            $mVideoUpload = $this->single_File_Upload('svr_video', $mVideo);

            $mEvidence = $this->input->post('svr_evidence');
            $mEvidenceUpload = $this->single_File_Upload('svr_evidence', $mEvidence);

            $mOthers = $this->input->post('svr_others');
            $mOthersUpload = $this->single_File_Upload('svr_others', $mOthers);

            $mAssAttach = $this->input->post('svr_assessor_attachment');
            $mAssAttachUpload = $this->single_File_Upload('svr_assessor_attachment', $mAssAttach);

            if ($mSiteReportId) {
// Update the record
                $mRecord = $this->svr->getParentByKey($mSiteReportId);
                if ($mPhotographUpload) {
                    $mPhotographUpload = $mPhotographUpload;
                } else {
                    $mPhotographUpload = $mRecord['svr_photograph'];
                }

                if ($mVideoUpload) {
                    $mVideoUpload = $mVideoUpload;
                } else {
                    $mVideoUpload = $mRecord['svr_video'];
                }

                if ($mEvidenceUpload) {
                    $mEvidenceUpload = $mEvidenceUpload;
                } else {
                    $mEvidenceUpload = $mRecord['svr_evidence'];
                }

                if ($mOthersUpload) {
                    $mOthersUpload = $mOthersUpload;
                } else {
                    $mOthersUpload = $mRecord['svr_others'];
                }

                if ($mAssAttachUpload) {
                    $mAssAttachUpload = $mAssAttachUpload;
                } else {
                    $mAssAttachUpload = $mRecord['svr_assessor_attachment'];
                }

                $data = array(
                    'svr_contractor' => $this->input->post('svr_contractor'),
                    'svr_site_visited' => $this->input->post('svr_site_visited'),
                    'svr_nature' => $this->input->post('svr_nature'),
                    'svr_assessor' => $this->input->post('svr_assessor'),
                    'svr_assessor_attachment' => $mAssAttachUpload,
                    'svr_visit_date' => $this->input->post('svr_visit_date'),
                    'svr_plan_setup' => $this->input->post('svr_plan_setup'),
                    'svr_plan_setup_remarks' => $this->input->post('svr_plan_setup_remarks'),
                    'svr_human_resource' => $this->input->post('svr_human_resource'),
                    'svr_human_resource_remarks' => $this->input->post('svr_human_resource_remarks'),
                    'svr_capacity' => $this->input->post('svr_capacity'),
                    'svr_capacity_remarks' => $this->input->post('svr_capacity_remarks'),
                    'svr_quality_mngmt' => $this->input->post('svr_quality_mngmt'),
                    'svr_quality_mngmt_remarks' => $this->input->post('svr_quality_mngmt_remarks'),
                    'svr_quality_end' => $this->input->post('svr_quality_end'),
                    'svr_quality_end_remarks' => $this->input->post('svr_quality_end_remarks'),
                    'svr_safety_mngmt' => $this->input->post('svr_safety_mngmt'),
                    'svr_safety_mngmt_remarks' => $this->input->post('svr_safety_mngmt_remarks'),
                    'svr_plan_setup_score' => $this->input->post('svr_plan_setup_score'),
                    'svr_capacity_score' => $this->input->post('svr_capacity_score'),
                    'svr_quality_mngmt_score' => $this->input->post('svr_quality_mngmt_score'),
                    'svr_quality_end_score' => $this->input->post('svr_quality_end_score'),
                    'svr_safety_mngmt_score' => $this->input->post('svr_safety_mngmt_score'),
                    'svr_human_resource_score' => $this->input->post('svr_human_resource_score'),
                    'svr_final_score' => $this->input->post('svr_final_score'),
                    'svr_final_recommendation' => $this->input->post('svr_final_recommendation'),
                    'svr_photograph' => $mPhotographUpload,
                    'svr_video' => $mVideoUpload,
                    'svr_evidence' => $mEvidenceUpload,
                    'svr_others' => $mOthersUpload,
                    'svr_remarks' => $this->input->post('svr_remarks'),
                    'svr_date_updated' => date('Y-m-d H:i:s'),
                );
                $mUpdate = $this->svr->updateParentByKey($mSiteReportId, $data);
                if ($mUpdate == true) {
                    $this->session->set_flashdata('success', 'Site visit report updated successfully.');
                    redirect('buyer/vendor/getSiteReports');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor/getSiteReports');
                }
            } else {
                $data = array(
                    'svr_pm_id' => $mSessionKey,
                    'svr_vendor_id' => $mVendorId,
                    'svr_tow_id' => $this->input->post('svr_tow_id'),
                    'svr_contractor' => $this->input->post('svr_contractor'),
                    'svr_site_visited' => $this->input->post('svr_site_visited'),
                    'svr_nature' => $this->input->post('svr_nature'),
                    'svr_assessor' => $this->input->post('svr_assessor'),
                    'svr_assessor_attachment' => $mAssAttachUpload,
                    'svr_visit_date' => $this->input->post('svr_visit_date'),
                    'svr_plan_setup' => $this->input->post('svr_plan_setup'),
                    'svr_plan_setup_remarks' => $this->input->post('svr_plan_setup_remarks'),
                    'svr_human_resource' => $this->input->post('svr_human_resource'),
                    'svr_human_resource_remarks' => $this->input->post('svr_human_resource_remarks'),
                    'svr_capacity' => $this->input->post('svr_capacity'),
                    'svr_capacity_remarks' => $this->input->post('svr_capacity_remarks'),
                    'svr_quality_mngmt' => $this->input->post('svr_quality_mngmt'),
                    'svr_quality_mngmt_remarks' => $this->input->post('svr_quality_mngmt_remarks'),
                    'svr_quality_end' => $this->input->post('svr_quality_end'),
                    'svr_quality_end_remarks' => $this->input->post('svr_quality_end_remarks'),
                    'svr_quality_end_score' => $this->input->post('svr_quality_end_score'),
                    'svr_safety_mngmt' => $this->input->post('svr_safety_mngmt'),
                    'svr_safety_mngmt_remarks' => $this->input->post('svr_safety_mngmt_remarks'),
                    'svr_plan_setup_score' => $this->input->post('svr_plan_setup_score'),
                    'svr_capacity_score' => $this->input->post('svr_capacity_score'),
                    'svr_quality_mngmt_score' => $this->input->post('svr_quality_mngmt_score'),
                    'svr_safety_mngmt_score' => $this->input->post('svr_safety_mngmt_score'),
                    'svr_human_resource_score' => $this->input->post('svr_human_resource_score'),
                    'svr_final_score' => $this->input->post('svr_final_score'),
                    'svr_final_recommendation' => $this->input->post('svr_final_recommendation'),
                    'svr_photograph' => $mPhotographUpload,
                    'svr_video' => $mVideoUpload,
                    'svr_evidence' => $mEvidenceUpload,
                    'svr_others' => $mOthersUpload,
                    'svr_remarks' => $this->input->post('svr_remarks'),
                    'svr_date_added' => date('Y-m-d H:i:s'),
                    'svr_date_updated' => date('Y-m-d H:i:s'),
                );
                $mInsert = $this->svr->addParent($data);
                if ($mInsert) {
                    $mVendor = $this->vendor->getParentByKey($mVendorId);
                    $mPmData = $this->buyer->getZonalSpecByZone($mVendor['location']);
                    $mBuyerData = $this->buyer->getParentByKey($mPmData['zs_linked']);
                    $mBuyerName = $mBuyerData['buyer_name'];
                    $mBuyerEmail = $mBuyerData['buyer_email'];
                    $mTow = $this->register->getWorkById($mVendor['type_of_work_id']);
                    $mTowName = $mTow['name'];
                    $wSubject = "Site Visit Report";
                    $wMessage = "
<html>
<head>
</head>
<body>
<h3>Dear $mBuyerName,</h3>
<p>
Site visit report generated successfully, under $mTowName.
</p>
<h4>Regards, <br> " . COMPANY_NAME . "</h4>
</body>
</html>";
                    $mSendMail = $this->wSendMail($mBuyerEmail, $wSubject, $wMessage);
                    $this->session->set_flashdata('success', 'Site visit report submitted successfully.');
                    redirect('buyer/vendor/getSiteReports');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor/getSiteReports');
                }
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionSaveSvrc($mVendorId, $mSiteReportId = null, $mTowId = null) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {

            $mPhotograph = $this->input->post('svrc_photograph');
            $mPhotographUpload = $this->single_File_Upload('svrc_photograph', $mPhotograph);

            $mVideo = $this->input->post('svrc_video');
            $mVideoUpload = $this->single_File_Upload('svrc_video', $mVideo);

            $mEvidence = $this->input->post('svrc_evidence');
            $mEvidenceUpload = $this->single_File_Upload('svrc_evidence', $mEvidence);

            $mOthers = $this->input->post('svrc_others');
            $mOthersUpload = $this->single_File_Upload('svrc_others', $mOthers);

            $mAssAttach = $this->input->post('svrc_assessor_attachment');
            $mAssAttachUpload = $this->single_File_Upload('svrc_assessor_attachment', $mAssAttach);

            $mSitesVisited = $this->input->post('svrc_site_visited');

            if ($mSitesVisited == "Others") {
                $mSitesVisited = $this->input->post('svrc_site_visited_value');
            }

            if ($mSiteReportId) {
// Update the record
                $mRecord = $this->svrc->getParentByKey($mSiteReportId);
                if ($mPhotographUpload) {
                    $mPhotographUpload = $mPhotographUpload;
                } else {
                    $mPhotographUpload = $mRecord['svrc_photograph'];
                }

                if ($mVideoUpload) {
                    $mVideoUpload = $mVideoUpload;
                } else {
                    $mVideoUpload = $mRecord['svrc_video'];
                }

                if ($mEvidenceUpload) {
                    $mEvidenceUpload = $mEvidenceUpload;
                } else {
                    $mEvidenceUpload = $mRecord['svrc_evidence'];
                }

                if ($mOthersUpload) {
                    $mOthersUpload = $mOthersUpload;
                } else {
                    $mOthersUpload = $mRecord['svrc_others'];
                }

                if ($mAssAttachUpload) {
                    $mAssAttachUpload = $mAssAttachUpload;
                } else {
                    $mAssAttachUpload = $mRecord['svrc_assessor_attachment'];
                }

                $data = array(
                    'svrc_contractor' => $this->input->post('svrc_contractor'),
                    'svrc_site_visited' => $mSitesVisited,
                    'svrc_nature' => $this->input->post('svrc_nature'),
                    'svrc_assessor' => $this->input->post('svrc_assessor'),
                    'svrc_assessor_attachment' => $mAssAttachUpload,
                    'svrc_visit_date' => $this->input->post('svrc_visit_date'),
                    'svrc_mob_setup' => $this->input->post('svrc_mob_setup'),
                    'svrc_mob_setup_score' => $this->input->post('svrc_mob_setup_score'),
                    'svrc_mob_setup_remarks' => $this->input->post('svrc_mob_setup_remarks'),
                    'svrc_main' => $this->input->post('svrc_main'),
                    'svrc_main_score' => $this->input->post('svrc_main_score'),
                    'svrc_main_remarks' => $this->input->post('svrc_main_remarks'),
                    'svrc_quality' => $this->input->post('svrc_quality'),
                    'svrc_quality_score' => $this->input->post('svrc_quality_score'),
                    'svrc_quality_remarks' => $this->input->post('svrc_quality_remarks'),
                    'svrc_status' => $this->input->post('svrc_status'),
                    'svrc_status_score' => $this->input->post('svrc_status_score'),
                    'svrc_status_remarks' => $this->input->post('svrc_status_remarks'),
                    'svrc_quality_mngmnt' => $this->input->post('svrc_quality_mngmnt'),
                    'svrc_quality_mngmnt_score' => $this->input->post('svrc_quality_mngmnt_score'),
                    'svrc_quality_mngmnt_remarks' => $this->input->post('svrc_quality_mngmnt_remarks'),
                    'svrc_safety_mngmt' => $this->input->post('svrc_safety_mngmt'),
                    'svrc_safety_mngmt_score' => $this->input->post('svrc_safety_mngmt_score'),
                    'svrc_safety_mngmt_remarks' => $this->input->post('svrc_safety_mngmt_remarks'),
                    'svrc_feedback' => $this->input->post('svrc_feedback'),
                    'svrc_feedback_score' => $this->input->post('svrc_feedback_score'),
                    'svrc_feedback_remarks' => $this->input->post('svrc_feedback_remarks'),
                    'svrc_final_score' => $this->input->post('svrc_final_score'),
                    'svrc_final_recommendation' => $this->input->post('svrc_final_recommendation'),
                    'svrc_rating_effective' => $this->input->post('svrc_rating_effective'),
                    'svrc_rating_effective_remarks' => $this->input->post('svrc_rating_effective_remarks'),
                    'svrc_rating_safety_mngmt' => $this->input->post('svrc_rating_safety_mngmt'),
                    'svrc_rating_safety_mngmt_remarks' => $this->input->post('svrc_rating_safety_mngmt_remarks'),
                    'svrc_rating_little' => $this->input->post('svrc_rating_little'),
                    'svrc_rating_little_remarks' => $this->input->post('svrc_rating_little_remarks'),
                    'svrc_photograph' => $mPhotographUpload,
                    'svrc_video' => $mVideoUpload,
                    'svrc_evidence' => $mEvidenceUpload,
                    'svrc_others' => $mOthersUpload,
                    'svrc_remarks' => $this->input->post('svrc_remarks'),
                    'svrc_date_updated' => date('Y-m-d H:i:s'),
                );
                $mUpdate = $this->svrc->updateParentByKey($mSiteReportId, $data);
                if ($mUpdate == true) {

//To Buyer
                    $mBuyer = $this->buyer->getParentByKey($mSessionKey);
                    $mMessage = "Site visit report updated successfully.";
                    $this->sendEmailToBuyer("Site visit report", $mMessage, $mBuyer['buyer_zone']);

                    $this->session->set_flashdata('success', 'Site visit report updated successfully.');
                    redirect('buyer/vendor/getSiteReports');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor/getSiteReports');
                }
            } else {
                $data = array(
                    'svrc_pm_id' => $mSessionKey,
                    'svrc_vendor_id' => $mVendorId,
                    'svrc_tow_id' => $this->input->post('svrc_tow_id'),
                    'svrc_contractor' => $this->input->post('svrc_contractor'),
                    'svrc_site_visited' => $mSitesVisited,
                    'svrc_nature' => $this->input->post('svrc_nature'),
                    'svrc_assessor' => $this->input->post('svrc_assessor'),
                    'svrc_assessor_attachment' => $mAssAttachUpload,
                    'svrc_visit_date' => $this->input->post('svrc_visit_date'),
                    'svrc_mob_setup' => $this->input->post('svrc_mob_setup'),
                    'svrc_mob_setup_score' => $this->input->post('svrc_mob_setup_score'),
                    'svrc_mob_setup_remarks' => $this->input->post('svrc_mob_setup_remarks'),
                    'svrc_main' => $this->input->post('svrc_main'),
                    'svrc_main_score' => $this->input->post('svrc_main_score'),
                    'svrc_main_remarks' => $this->input->post('svrc_main_remarks'),
                    'svrc_quality' => $this->input->post('svrc_quality'),
                    'svrc_quality_score' => $this->input->post('svrc_quality_score'),
                    'svrc_quality_remarks' => $this->input->post('svrc_quality_remarks'),
                    'svrc_status' => $this->input->post('svrc_status'),
                    'svrc_status_score' => $this->input->post('svrc_status_score'),
                    'svrc_status_remarks' => $this->input->post('svrc_status_remarks'),
                    'svrc_quality_mngmnt' => $this->input->post('svrc_quality_mngmnt'),
                    'svrc_quality_mngmnt_score' => $this->input->post('svrc_quality_mngmnt_score'),
                    'svrc_quality_mngmnt_remarks' => $this->input->post('svrc_quality_mngmnt_remarks'),
                    'svrc_safety_mngmt' => $this->input->post('svrc_safety_mngmt'),
                    'svrc_safety_mngmt_score' => $this->input->post('svrc_safety_mngmt_score'),
                    'svrc_safety_mngmt_remarks' => $this->input->post('svrc_safety_mngmt_remarks'),
                    'svrc_feedback' => $this->input->post('svrc_feedback'),
                    'svrc_feedback_score' => $this->input->post('svrc_feedback_score'),
                    'svrc_feedback_remarks' => $this->input->post('svrc_feedback_remarks'),
                    'svrc_final_score' => $this->input->post('svrc_final_score'),
                    'svrc_final_recommendation' => $this->input->post('svrc_final_recommendation'),
                    'svrc_rating_effective' => $this->input->post('svrc_rating_effective'),
                    'svrc_rating_effective_remarks' => $this->input->post('svrc_rating_effective_remarks'),
                    'svrc_rating_safety_mngmt' => $this->input->post('svrc_rating_safety_mngmt'),
                    'svrc_rating_safety_mngmt_remarks' => $this->input->post('svrc_rating_safety_mngmt_remarks'),
                    'svrc_rating_little' => $this->input->post('svrc_rating_little'),
                    'svrc_rating_little_remarks' => $this->input->post('svrc_rating_little_remarks'),
                    'svrc_photograph' => $mPhotographUpload,
                    'svrc_video' => $mVideoUpload,
                    'svrc_evidence' => $mEvidenceUpload,
                    'svrc_others' => $mOthersUpload,
                    'svrc_remarks' => $this->input->post('svrc_remarks'),
                    'svrc_date_added' => date('Y-m-d H:i:s'),
                    'svrc_date_updated' => date('Y-m-d H:i:s'),
                );
                $mInsert = $this->svrc->addParent($data);
                if ($mInsert) {
                    $mVendor = $this->vendor->getParentByKey($mVendorId);
                    $mPmData = $this->buyer->getZonalSpecByZone($mVendor['location']);
                    $mBuyerData = $this->buyer->getParentByKey($mPmData['zs_linked']);
                    $mBuyerName = $mBuyerData['buyer_name'];
                    $mBuyerEmail = $mBuyerData['buyer_email'];
                    $wSubject = "Site Visit Report";
                    $wMessage = "
<html>
<head>
</head>
<body>
<h3>Dear $mBuyerName,</h3>
<p>
Site visit report generated successfully.
</p>
<h4>Regards, <br> " . COMPANY_NAME . "</h4>
</body>
</html>";
                    $mSendMail = $this->wSendMail($mBuyerEmail, $wSubject, $wMessage);
                    $mMessage = "Site visit report submitted successfully.";
                    $this->session->set_flashdata('success', 'Site visit report submitted successfully.');
                    redirect('buyer/vendor/getSiteReports');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor/getSiteReports');
                }
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionSaveSvcon($mVendorId, $mSiteReportId = null) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {

            if ($mSiteReportId) {
// Update the record
                $mRecord = $this->svr->getConsultantParentByKey($mSiteReportId);

                $data = array(
                    'csvr_project_name' => $this->input->post('csvr_project_name'),
                    'csvr_date' => $this->input->post('csvr_date'),
                    'csvr_date_updated' => date('Y-m-d H:i:s'),
                );
                $mUpdate = $this->svr->updateConsultantParentByKey($mSiteReportId, $data);
                if ($mUpdate == true) {
                    $this->session->set_flashdata('success', 'Site visit report updated successfully.');
                    redirect('buyer/vendor/getSiteReports');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor/getSiteReports');
                }
            } else {
                $data = array(
                    'csvr_pm_id' => $mSessionKey,
                    'csvr_vendor_id' => $mVendorId,
                    'csvr_project_name' => $this->input->post('csvr_project_name'),
                    'csvr_date' => $this->input->post('csvr_date'),
                    'csvr_date_added' => date('Y-m-d H:i:s'),
                    'csvr_date_updated' => date('Y-m-d H:i:s'),
                );
                $mInsert = $this->svr->addConsultantParent($data);
                if ($mInsert) {
                    $this->session->set_flashdata('success', 'Site visit report submitted successfully.');
                    redirect('buyer/vendor/getSiteReports');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor/getSiteReports');
                }
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function getStageOne() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "vendor";
            $data['mRecords'] = $this->vendor->getStageOneVendors($mSessionZone);
            $this->load->view('buyer/stage_one', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionChangeStatus($mStatus, $mId) {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $mVendor = $this->vendor->getParentByKey($mId);
            $mVendorName = $mVendor['company_name'];
            $mVendorEmail = $mVendor['email'];
            $mTow = $this->register->getWorkById($mVendor['type_of_work_id']);
            $mTowName = $mTow['name'];
            $mLink = base_url('vendor/home/getStageTwoData');
            $wSubject = "Pre Qualification with Godrej Properties Ltd under $mTowName Package";
            if ($mStatus == "accept") {
                $wMessage = "
<html>
<head>
</head>
<body>
<h3>Dear $mVendorName,</h3>
<p>Congratulations!!</p>
<p>Your Stage 1 Form has been successfully accepted by Godrej Properties Limited. Request you to complete stage 2 - Pre Qualification process.</p>
<a href='$mLink'>Link</a>
<h4>Regards, <br> " . COMPANY_NAME . "</h4>
</body>
</html>";
                $mVendor = $this->vendor->getParentByKey($mId);
                $userdata = array(
                    'active' => 1,
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $mUpdate = $this->vendor->updateParentByKey($mId, $userdata);
                if ($mUpdate) {
                    $mSendMail = $this->wSendMail($mVendorEmail, $wSubject, $wMessage);
                    $mMessage = "Stage-1 form accepted successfully.";
                    $this->session->set_flashdata('success', 'Vendor stage one accepted successfully.');
                    redirect('buyer/vendor');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor');
                }
            } else if ($mStatus == "returnStageOne") {
                $wMessage = "
<html>
<head>
</head>
<body>
<h3>Dear $mVendorName,</h3>
<p>Congratulations!!</p>
<p>Godrej Properties Limited regrets to inform you that your Stage 1 Form has been returned.</p>
<h4>Regards, <br> " . COMPANY_NAME . "</h4>
</body>
</html>";
                $userdata = array(
                    'active' => 7,
                    'stage_one_return_remarks' => $this->input->post('stage_one_return_remarks'),
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $mUpdate = $this->vendor->updateParentByKey($mId, $userdata);
                if ($mUpdate) {
                    $mMessage = "Stage-1 form returned.";
                    $mSendMail = $this->wSendMail($mVendorEmail, $wSubject, $wMessage);
                    $this->session->set_flashdata('success', 'Vendor stage one returned successfully.');
                    redirect('buyer/vendor');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor');
                }
            } else {
                $wMessage = "
<html>
<head>
</head>
<body>
<h3>Dear $mVendorName,</h3>
<p>Congratulations!!</p>
<p>Godrej Properties Limited regrets to inform you that your Stage 1 Form has been not shortlisted for further rounds.</p>
<h4>Regards, <br> " . COMPANY_NAME . "</h4>
</body>
</html>";
                $userdata = array(
                    'active' => 9,
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $mUpdate = $this->vendor->updateParentByKey($mId, $userdata);
                if ($mUpdate) {
                    $mMessage = "Stage-1 form rejected.";
                    $mSendMail = $this->wSendMail($mVendorEmail, $wSubject, $wMessage);
                    $this->session->set_flashdata('success', 'Vendor rejected.');
                    redirect('buyer/vendor');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor');
                }
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionChangeStatusTwo($mStatus, $mId) {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $mVendor = $this->vendor->getParentByKey($mId);
            $mVendorName = $mVendor['company_name'];
            $mVendorEmail = $mVendor['email'];
            $mTow = $this->register->getWorkById($mVendor['type_of_work_id']);
            $mTowName = $mTow['name'];
            $wSubject = "Pre Qualification with Godrej Properties Ltd under $mTowName Package";
            if ($mStatus == "accept") {
                $wMessage = "
<html>
<head>
</head>
<body>
<h3>Dear $mVendorName,</h3>
<p>Congratulations!!</p>
<p>
Your Stage 2 Form has been successfully accepted by Godrej Properties Limited.
We would like to visit your Project sites / Factories to complete Pre Qualification Process.
Kindly co-ordinate and organise at the earliest.
</p>
<h4>Regards, <br> " . COMPANY_NAME . "</h4>
</body>
</html>";

                $userdata = array(
                    'active' => 2,
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $mUpdate = $this->vendor->updateParentByKey($mId, $userdata);
                if ($mUpdate) {
                    $mSendMail = $this->wSendMail($mVendorEmail, $wSubject, $wMessage);
                    $this->session->set_flashdata('success', 'Vendor stage two accepted successfully.');
                    redirect('buyer/vendor');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor');
                }
            } else if ($mStatus == "returnStageTwo") {
                $userdata = array(
                    'active' => 8,
                    'stage_two_return_remarks' => $this->input->post('stage_two_return_remarks'),
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $mUpdate = $this->vendor->updateParentByKey($mId, $userdata);
                if ($mUpdate) {
                    $this->session->set_flashdata('success', 'Vendor stage two returned successfully.');
                    redirect('buyer/vendor');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor');
                }
            } else {
                $wMessage = "
<html>
<head>
</head>
<body>
<h3>Dear $mVendorName,</h3>
<p>
Godrej Properties Limited regrets to inform you that your Stage 2 Form has been not shortlisted for further rounds.
</p>
<h4>Regards, <br> " . COMPANY_NAME . "</h4>
</body>
</html>";
                $userdata = array(
                    'active' => 10,
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $mUpdate = $this->vendor->updateParentByKey($mId, $userdata);
                if ($mUpdate) {
                    $mSendMail = $this->wSendMail($mVendorEmail, $wSubject, $wMessage);
                    $this->session->set_flashdata('success', 'Vendor rejected.');
                    redirect('buyer/vendor');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor');
                }
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function makePr() {
        $mBuyerId = $this->input->post('buyer_id');
        $mPrId = $this->input->post('pr');
        if ($mBuyerId && $mPrId) {
            $mPmData = $this->buyer->getParentByKey($mPrId);
            $mBuyerName = $mPmData['buyer_name'];
            $mBuyerEmail = $mPmData['buyer_email'];
            $mVendor = $this->vendor->getParentByKey($mBuyerId);
            $mVendorName = $mVendor['company_name'];
            $mTow = $this->register->getWorkById($mVendor['type_of_work_id']);
            $mTowName = $mTow['name'];
            $wSubject = "Site Visit Report";
            $wMessage = "
<html>
<head>
</head>
<body>
<h3>Dear $mBuyerName,</h3>
<p>
Request you to complete Site visit report assigned to you for $mVendorName, under $mTowName. Request you to complete this activity within 7 working days.
</p>
<h4>Regards, <br> " . COMPANY_NAME . "</h4>
</body>
</html>";
            $userdata = array(
                'pr' => $mPrId,
                'pr_date_added' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );
            $mUpdate = $this->vendor->updateParentByKey($mBuyerId, $userdata);
            if ($mUpdate) {
                $mBuyer = $this->buyer->getParentByKey($mBuyerId);
                $mMessage = "Site visit report assigned successfully.";
                $mSendMail = $this->wSendMail($mVendorEmail, $wSubject, $wMessage);
                $this->session->set_flashdata('success', 'Site Visit request sent successfully');
                echo "1";
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                echo "0";
            }
        } else {
            $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            echo "0";
        }
    }

    public function actionChangeStatusTran($mStatus, $mId) {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $mVendor = $this->vendor->getParentByKey($mId);
            $mVendorName = $mVendor['company_name'];
            $mVendorEmail = $mVendor['email'];
            $mTow = $this->register->getWorkById($mVendor['type_of_work_id']);
            $mTowName = $mTow['name'];
            $mLink = base_url('vendor/home/getStageTwoData');
            $wSubject = "Pre Qualification with Godrej Properties Ltd under $mTowName Package";
            if ($mStatus == "accept") {
                $wMessage = "
<html>
<head>
</head>
<body>
<h3>Dear $mVendorName,</h3>
<p>Congratulations!!</p>
<p>Your Stage 1 Form has been successfully accepted by Godrej Properties Limited. Request you to complete stage 2 - Pre Qualification process.</p>
<a href='$mLink'>Link</a>
<h4>Regards, <br> " . COMPANY_NAME . "</h4>
</body>
</html>";
                $mVendor = $this->vendor->getParentByKey($mId);
                $userdata = array(
                    'active' => 1,
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $mUpdate = $this->vendor->updateParentByKey($mId, $userdata);
                if ($mUpdate) {
                    $mSendMail = $this->wSendMail($mVendorEmail, $wSubject, $wMessage);
                    $mMessage = "Stage-1 form accepted successfully.";
                    $this->session->set_flashdata('success', 'Vendor stage one accepted successfully.');
                    redirect('buyer/vendor/transferred');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor/transferred');
                }
            } else if ($mStatus == "returnStageOne") {
                $wMessage = "
<html>
<head>
</head>
<body>
<h3>Dear $mVendorName,</h3>
<p>Congratulations!!</p>
<p>Godrej Properties Limited regrets to inform you that your Stage 1 Form has been returned.</p>
<h4>Regards, <br> " . COMPANY_NAME . "</h4>
</body>
</html>";
                $userdata = array(
                    'active' => 7,
                    'stage_one_return_remarks' => $this->input->post('stage_one_return_remarks'),
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $mUpdate = $this->vendor->updateParentByKey($mId, $userdata);
                if ($mUpdate) {
                    $mMessage = "Stage-1 form returned.";
                    $mSendMail = $this->wSendMail($mVendorEmail, $wSubject, $wMessage);
                    $this->session->set_flashdata('success', 'Vendor stage one returned successfully.');
                    redirect('buyer/vendor/transferred');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor/transferred');
                }
            } else {
                $wMessage = "
<html>
<head>
</head>
<body>
<h3>Dear $mVendorName,</h3>
<p>Congratulations!!</p>
<p>Godrej Properties Limited regrets to inform you that your Stage 1 Form has been not shortlisted for further rounds.</p>
<h4>Regards, <br> " . COMPANY_NAME . "</h4>
</body>
</html>";
                $userdata = array(
                    'active' => 9,
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $mUpdate = $this->vendor->updateParentByKey($mId, $userdata);
                if ($mUpdate) {
                    $mMessage = "Stage-1 form rejected.";
                    $mSendMail = $this->wSendMail($mVendorEmail, $wSubject, $wMessage);
                    $this->session->set_flashdata('success', 'Vendor rejected.');
                    redirect('buyer/vendor/transferred');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor/transferred');
                }
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionChangeStatusTwoTran($mStatus, $mId) {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $mVendor = $this->vendor->getParentByKey($mId);
            $mVendorName = $mVendor['company_name'];
            $mVendorEmail = $mVendor['email'];
            $mTow = $this->register->getWorkById($mVendor['type_of_work_id']);
            $mTowName = $mTow['name'];
            $wSubject = "Pre Qualification with Godrej Properties Ltd under $mTowName Package";
            if ($mStatus == "accept") {
                $wMessage = "
<html>
<head>
</head>
<body>
<h3>Dear $mVendorName,</h3>
<p>Congratulations!!</p>
<p>
Your Stage 2 Form has been successfully accepted by Godrej Properties Limited.
We would like to visit your Project sites / Factories to complete Pre Qualification Process.
Kindly co-ordinate and organise at the earliest.
</p>
<h4>Regards, <br> " . COMPANY_NAME . "</h4>
</body>
</html>";

                $userdata = array(
                    'active' => 2,
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $mUpdate = $this->vendor->updateParentByKey($mId, $userdata);
                if ($mUpdate) {
                    $mSendMail = $this->wSendMail($mVendorEmail, $wSubject, $wMessage);
                    $this->session->set_flashdata('success', 'Vendor stage two accepted successfully.');
                    redirect('buyer/vendor/transferred');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor/transferred');
                }
            } else if ($mStatus == "returnStageTwo") {
                $userdata = array(
                    'active' => 8,
                    'stage_two_return_remarks' => $this->input->post('stage_two_return_remarks'),
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $mUpdate = $this->vendor->updateParentByKey($mId, $userdata);
                if ($mUpdate) {
                    $this->session->set_flashdata('success', 'Vendor stage two returned successfully.');
                    redirect('buyer/vendor/transferred');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor/transferred');
                }
            } else {
                $wMessage = "
<html>
<head>
</head>
<body>
<h3>Dear $mVendorName,</h3>
<p>
Godrej Properties Limited regrets to inform you that your Stage 2 Form has been not shortlisted for further rounds.
</p>
<h4>Regards, <br> " . COMPANY_NAME . "</h4>
</body>
</html>";
                $userdata = array(
                    'active' => 10,
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $mUpdate = $this->vendor->updateParentByKey($mId, $userdata);
                if ($mUpdate) {
                    $mSendMail = $this->wSendMail($mVendorEmail, $wSubject, $wMessage);
                    $this->session->set_flashdata('success', 'Vendor rejected.');
                    redirect('buyer/vendor/transferred');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('buyer/vendor/transferred');
                }
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function makePrTran() {
        $mBuyerId = $this->input->post('buyer_id');
        $mPrId = $this->input->post('pr');
        if ($mBuyerId && $mPrId) {
            $mPmData = $this->buyer->getParentByKey($mPrId);
            $mBuyerName = $mPmData['buyer_name'];
            $mBuyerEmail = $mPmData['buyer_email'];
            $mVendor = $this->vendor->getParentByKey($mBuyerId);
            $mVendorName = $mVendor['company_name'];
            $mTow = $this->register->getWorkById($mVendor['type_of_work_id']);
            $mTowName = $mTow['name'];
            $wSubject = "Site Visit Report";
            $wMessage = "
<html>
<head>
</head>
<body>
<h3>Dear $mBuyerName,</h3>
<p>
Request you to complete Site visit report assigned to you for $mVendorName, under $mTowName. Request you to complete this activity within 7 working days.
</p>
<h4>Regards, <br> " . COMPANY_NAME . "</h4>
</body>
</html>";
            $userdata = array(
                'pr' => $mPrId,
                'pr_date_added' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );
            $mUpdate = $this->vendor->updateParentByKey($mBuyerId, $userdata);
            if ($mUpdate) {
                $mBuyer = $this->buyer->getParentByKey($mBuyerId);
                $mMessage = "Site visit report assigned successfully.";
                $mSendMail = $this->wSendMail($mVendorEmail, $wSubject, $wMessage);
                $this->session->set_flashdata('success', 'Site Visit request sent successfully');
                echo "1";
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                echo "0";
            }
        } else {
            $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            echo "0";
        }
    }

    public function tranferVendor() {
        $mBuyerId = $this->input->post('vendor_id');
        $mSessionZone = $this->session->userdata('session_zone');
        $mSessionKey = $this->session->userdata('session_id');
        $mPrId = $this->input->post('pr');
        if ($mBuyerId && $mPrId) {
            $mPrData = $this->buyer->getParentByKey($mPrId);
            $userdata = array(
                'tranferred_to' => $mPrData['buyer_id'],
                'tranferred_from' => $mSessionKey,
                'updated_at' => date('Y-m-d H:i:s'),
            );
            $mUpdate = $this->vendor->updateParentByKey($mBuyerId, $userdata);
            if ($mUpdate) {
//To Buyer
                $mBuyer = $this->buyer->getParentByKey($mBuyerId);
                $mMessage = "Vendor transferred successfully.";
                $this->sendEmailToBuyer("Vendor Transfer", $mMessage, $mBuyer['buyer_zone']);
                echo "1";
            } else {
                echo "0";
            }
        } else {
            echo "0";
        }
    }

    public function getStageTwo() {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "vendor";
            $this->load->view('buyer/stage_two', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function getVendorsByTypeOfWork() {
        $id = $this->input->post('id');
        if ($id) {
            $getTypeOfWork = $this->register->getAllVendorsByTow($id);
            $result = '<option disabled="" selected="" value="" disabled="">Select Vendor</option>';
            foreach ($getTypeOfWork as $key => $getType) {
                $result = $result . "<option value='" . $getType['id'] . "'>" . $getType['company_name'] . "</option>" . PHP_EOL;
            }
            echo $result;
        } else {
            echo "<option>No data</option>";
        }
    }

    public function single_File_Upload($mId, $mFile) {
        $config['upload_path'] = './uploads/';
        $config['file_name'] = $mFile;
        $config['allowed_types'] = 'jpg|jpeg|gif|png|zip|xlsx|cad|pdf|doc|docx|ppt|pptx|pps|ppsx|odt|xls|xlsx|mp3|m4a|ogg|wav|mp4|m4v|mov|wmv|mpeg|MPG|csv';
        $config['overwrite'] = false;
        $config['encrypt_name'] = false;
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        $data = array();
        if (!$this->upload->do_upload($mId)) {
            $mOutPut = $this->upload->data();
            $filename = "";
            $data['file_name'] = "";
            $data['result'] = 'fail';
            $data['message'] = $this->upload->display_errors();
        } else {
            $mOutPut = $this->upload->data();
            $filename = $mOutPut['file_name'];
            $data['file_name'] = $mOutPut['file_name'];
            $data['result'] = 'success';
            $data['message'] = 'file was uploaded fine';
            $data['error'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
        }
        return $filename;
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('buyer');
    }

    public function sendEmailToVendor($mSub, $mMsg, $mTo) {
        $mUserData = $this->register->getVendorByEmail($mTo);
        $mModMessage .= "Dear " . $mUserData['user_name'] . ", ";
        $mModMessage .= $mMsg;

        $this->load->library('email');
        $this->email->from(EMAIL_FROM_ADDRESS, EMAIL_FROM);
        $this->email->to($mTo, '');
        $this->email->subject($mSub);
        $this->email->message($mModMessage);
        try {
            $suc = $this->email->send();
            if ($suc) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $e) {
//echo $e->getMessage();
        }
    }

    public function sendEmailToBuyer($mSub, $mMsg, $mTo) {
        $mUserData = $this->buyer->getParentByZone($mTo);
        $mModMessage .= "Dear " . $mUserData['buyer_name'] . ", ";
        $mModMessage .= $mMsg;

        $this->load->library('email');
        $this->email->from(EMAIL_FROM_ADDRESS, EMAIL_FROM);
        $this->email->to($mTo, '');
        $this->email->subject($mSub);
        $this->email->message($mModMessage);
        try {
            $suc = $this->email->send();
            if ($suc) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $e) {
//echo $e->getMessage();
        }
    }

    public function wSendMail($mTo, $mSubject, $mMessage) {
        $this->load->library('email');
        $config['protocol'] = 'smtp';
//        $config['smtp_host'] = '10.21.48.220';
//        $config['smtp_port'] = 25;
//        $config['smtp_timeout'] = '60';
//        $config['smtp_crypto'] = 'tsl';
        $config['smtp_user'] = EMAIL;
        $config['smtp_pass'] = EMAIL_PASSWORD;
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html';
        $config['validation'] = FALSE;
        $this->email->initialize($config);
        $this->email->from(EMAIL, EMAIL_FROM_TEXT);
        $this->email->to($mTo);
        $this->email->subject($mSubject);
        $this->email->message($mMessage);
        $send = $this->email->send();
        if ($send) {
            return 1;
        } else {
            $error = $this->email->print_debugger(array('headers'));
            return json_encode($error);
        }
    }

}
