<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pending extends CI_Controller {

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
            if ($mSessionPm == 1 && $mSessionZone) {
                $data['home'] = "vendor";
                $mVendors = $this->vendor->getStageOneVendorsForAssignedForMain($mSessionZone);
                $data['mRecords'] = $mVendors;
                $data['mPrs'] = $this->buyer->getAllParentForPr();
                $data['mUsers'] = $this->buyer->getAllParent();
                $this->load->view('buyer/manage_vendor', $data);
            } else if ($mSessionPm == 1) {
                $data['home'] = "site_reports";
                redirect('buyer/vendor/getSiteReports', $data);
            } else {
                $data['home'] = "vendor";
                $mVendors = $this->vendor->getStageOneVendorsForAssignedForMain($mSessionZone);
                $data['mRecords'] = $mVendors;
                $data['mPrs'] = $this->buyer->getAllParentForPr();
                $data['mUsers'] = $this->buyer->getAllParent();
                $this->load->view('buyer/manage_vendor', $data);
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function shortlisting() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
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

            $data['mRecords'] = $mCurated;
            $data['award_type'] = "All";
            $data['status'] = "Pending";
            $data['zone'] = $mSessionZone;
            $data['projects'] = $this->projects->getAllParentByZone($mSessionZone);
            $this->load->view('buyer/shortlisting_list_pending', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function filter() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "short";
            $mCurated = array();
            $mType = $this->input->post('award_type');
            $mStatus = $this->input->post('status');
            $mZone = $this->input->post('zone');
            $mProject = $this->input->post('project');
                            
            if ($mType == "All") {
                $mRecords = $this->eoi->getAllParentForShortlistingPendingFilter($mStatus, $mZone, $mProject);
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
                $mRecordsPro = $this->eoi_pro->getAllParentForShortlistingPendingFilter($mStatus, $mZone, $mProject);
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
            } elseif ($mType == "Contract") {
                $mRecords = $this->eoi->getAllParentForShortlistingPendingFilter($mStatus, $mZone, $mProject);
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
            } elseif ($mType == "Procurement") {
                $mRecordsPro = $this->eoi_pro->getAllParentForShortlistingPendingFilter($mStatus, $mZone, $mProject);
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
            }
            
            $data['award_type'] = $mType;
            $data['status'] = $mStatus;
            $data['zone'] = $mZone;
            $data['project'] = $mProject;
            $data['mRecords'] = $mCurated;
            $this->load->view('buyer/shortlisting_list_pending', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function vendor() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $data['home'] = "short";
            $mVendors = $this->vendor->getStageOneVendorsForAssignedPending($mSessionZone);
            $data['mRecords'] = $mVendors;
            $data['mPrs'] = $this->buyer->getAllParentForPr();
            $data['mUsers'] = $this->buyer->getAllParent();
            $this->load->view('buyer/manage_vendor', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

}
