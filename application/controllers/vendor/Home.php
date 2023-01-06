<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('buyer_model');
        $this->load->model('vendor_model');
        $this->load->model('vendor_stage_two_model', 'vst');
        $this->load->model('contractor_stage_two_model', 'cst');
        $this->load->model('consultant_stage_two_model', 'const');
        $this->load->model('eoi_model', 'eoi');
        $this->load->model('eoi_vendors_model', 'ev');
        $this->load->model('bidcapacity_model', 'bc');
        $this->load->model('register');
        date_default_timezone_set("Asia/Kolkata");
        $this->load->helper('date');
        error_reporting(0);
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
    }

    public function index() {
        $mSessionKey = $this->session->userdata('session_vendor_id');
        if ($mSessionKey) {
            $data['home'] = "home";
            redirect('vendor/home/getStageOneData');
        } else {
            $this->load->view('index', $data);
        }
    }

    public function listApprovalBidders() {
        $data['home'] = "tendering";
        $this->load->view('vendor/list_bids', $data);
    }

    public function viewVendorQueries() {
        $data['home'] = "tendering";
        $this->load->view('vendor/view_bid', $data);
    }

    public function viewComparisons() {
        $this->load->view('vendor/view_comparisons');
    }

    public function splitAwards() {
        $this->load->view('vendor/split_awards');
    }

    public function dashboard() {
        $mSessionKey = $this->session->userdata('session_vendor_id');
        $mSessionType = $this->session->userdata('session_vendor_type');
        if ($mSessionKey) {
            $data['home'] = "home";
            $data['eois'] = $this->ev->getAllParentByVendorId();
            $stageOne = $this->vendor_model->getStageOneModel($mSessionKey);
            $mBuyerData = $this->buyer_model->getParentByZone($stageOne['location']);
            //For Quick actions
            $mActionsArray = array();
            if ($stageOne['active'] == 1) {
                if ($mSessionType == "1") {
                    $data['mRecord'] = $this->vst->getParentByVendorKey($mSessionKey);
                    if (empty($data['mRecord'])) {
                        $mActionsArray[] = array(
                            'action' => "Fill Stage Two Form",
                            'type' => "Form",
                            'button' => "<a href='" . base_url('vendor/home/getStageTwoData') . "' class='btn btn-xs btn-warning'>Fill Stage Two</a>",
                        );
                    }
                } else if ($mSessionType == "2") {
                    $data['mRecord'] = $this->const->getParentByVendorKey($mSessionKey);
                    if (empty($data['mRecord'])) {
                        $mActionsArray[] = array(
                            'action' => "Fill Stage Two Form",
                            'type' => "Form",
                            'button' => "<a href='" . base_url('vendor/home/getStageTwoData') . "' class='btn btn-xs btn-warning'>Fill Stage Two</a>",
                        );
                    }
                } else if ($mSessionType == "3") {
                    if ($mSessionSmall == 1) {
                        $data['mRecord'] = $this->cst->getParentByVendorKey($mSessionKey);
                        if (empty($data['mRecord'])) {
                            $mActionsArray[] = array(
                                'action' => "Fill Stage Two Form",
                                'type' => "Form",
                                'button' => "<a href='" . base_url('vendor/home/getStageTwoData') . "' class='btn btn-xs btn-warning'>Fill Stage Two</a>",
                            );
                        }
                    } else {
                        $data['mRecord'] = $this->cst->getParentByVendorKey($mSessionKey);
                        if (empty($data['mRecord'])) {
                            $mActionsArray[] = array(
                                'action' => "Fill Stage Two Form",
                                'type' => "Form",
                                'button' => "<a href='" . base_url('vendor/home/getStageTwoData') . "' class='btn btn-xs btn-warning'>Fill Stage Two</a>",
                            );
                        }
                    }
                }
            }
            foreach ($data['eois'] as $key => $eoi) {
                $mBuyerEoi = $this->buyer_model->getParentByKey($eoi['ev_buyer_id']);
                if ($eoi['ev_status'] == 0) {
                    $mActionBtn = base_url('vendor/home/viewEoi/' . $eoi['eoi_id'] . "/" . $eoi['ev_id']);
                    $mActionsArray[] = array(
                        'action' => "EOI pending for: " . $eoi['ev_scope'],
                        'type' => "EOI",
                        'button' => "<a href='" . $mActionBtn . "' class='btn btn-xs btn-warning'>View</a>",
                    );
                }
            }
            //For People you may know
            $mDataArray = array();
            foreach ($data['eois'] as $key => $eoi) {
                $mBuyerEoi = $this->buyer_model->getParentByKey($eoi['ev_buyer_id']);
                $mDataArray[] = array(
                    'log' => "EOI : " . $eoi['ev_scope'],
                    'name' => $mBuyerEoi['buyer_name'],
                    'email' => $mBuyerEoi['buyer_email'],
                    'mobile' => $mBuyerEoi['buyer_mobile'],
                    'role' => $mBuyerEoi['buyer_role'],
                    'designation' => $mBuyerEoi['buyer_designation'],
                );
            }
            if (!empty($stageOne)) {
                if ($stageOne['active'] == 1) {
                    $mDataArray[] = array(
                        'log' => "Stage One Accepted",
                        'name' => $mBuyerData['buyer_name'],
                        'email' => $mBuyerData['buyer_email'],
                        'mobile' => $mBuyerData['buyer_mobile'],
                        'role' => $mBuyerData['buyer_role'],
                        'designation' => $mBuyerData['buyer_designation'],
                    );
                } else if ($stageOne['active'] == 2) {
                    $mDataArray[] = array(
                        'log' => "Stage One Accepted",
                        'name' => $mBuyerData['buyer_name'],
                        'email' => $mBuyerData['buyer_email'],
                        'mobile' => $mBuyerData['buyer_mobile'],
                        'role' => $mBuyerData['buyer_role'],
                        'designation' => $mBuyerData['buyer_designation'],
                    );
                    $mDataArray[] = array(
                        'log' => "Stage Two Accepted",
                        'name' => $mBuyerData['buyer_name'],
                        'email' => $mBuyerData['buyer_email'],
                        'mobile' => $mBuyerData['buyer_mobile'],
                        'role' => $mBuyerData['buyer_role'],
                        'designation' => $mBuyerData['buyer_designation'],
                    );
                } else if ($stageOne['active'] == 7) {
                    $mDataArray[] = array(
                        'log' => "Stage One Returned",
                        'name' => $mBuyerData['buyer_name'],
                        'email' => $mBuyerData['buyer_email'],
                        'mobile' => $mBuyerData['buyer_mobile'],
                        'role' => $mBuyerData['buyer_role'],
                        'designation' => $mBuyerData['buyer_designation'],
                    );
                } else if ($stageOne['active'] == 8) {
                    $mDataArray[] = array(
                        'log' => "Stage One Accepted",
                        'name' => $mBuyerData['buyer_name'],
                        'email' => $mBuyerData['buyer_email'],
                        'mobile' => $mBuyerData['buyer_mobile'],
                        'role' => $mBuyerData['buyer_role'],
                        'designation' => $mBuyerData['buyer_designation'],
                    );
                    $mDataArray[] = array(
                        'log' => "Stage Two Returned",
                        'name' => $mBuyerData['buyer_name'],
                        'email' => $mBuyerData['buyer_email'],
                        'mobile' => $mBuyerData['buyer_mobile'],
                        'role' => $mBuyerData['buyer_role'],
                        'designation' => $mBuyerData['buyer_designation'],
                    );
                } else if ($stageOne['active'] == 9) {
                    $mDataArray[] = array(
                        'log' => "Stage One Rejected",
                        'name' => $mBuyerData['buyer_name'],
                        'email' => $mBuyerData['buyer_email'],
                        'mobile' => $mBuyerData['buyer_mobile'],
                        'role' => $mBuyerData['buyer_role'],
                        'designation' => $mBuyerData['buyer_designation'],
                    );
                } else if ($stageOne['active'] == 10) {
                    $mDataArray[] = array(
                        'log' => "Stage One Accepted",
                        'name' => $mBuyerData['buyer_name'],
                        'email' => $mBuyerData['buyer_email'],
                        'mobile' => $mBuyerData['buyer_mobile'],
                        'role' => $mBuyerData['buyer_role'],
                        'designation' => $mBuyerData['buyer_designation'],
                    );
                    $mDataArray[] = array(
                        'log' => "Stage Two Rejected",
                        'name' => $mBuyerData['buyer_name'],
                        'email' => $mBuyerData['buyer_email'],
                        'mobile' => $mBuyerData['buyer_mobile'],
                        'role' => $mBuyerData['buyer_role'],
                        'designation' => $mBuyerData['buyer_designation'],
                    );
                }
            }

            if ($mSessionType == "1") {
                $mStageTwo = $this->vst->getParentByVendorKey($mSessionKey);
                $data['turn_over'] = json_decode($mStageTwo['stv_turnover']);
            } else if ($mSessionType == "2") {
                $mStageTwo = $this->const->getParentByVendorKey($mSessionKey);
                $data['turn_over'] = json_decode($mStageTwo['stcon_turnover']);
            } else if ($mSessionType == "3") {
                if ($mSessionSmall == 1) {
                    $mStageTwo = $this->cst->getParentByVendorKey($mSessionKey);
                } else {
                    $mStageTwo = $this->cst->getParentByVendorKey($mSessionKey);
                }
                $data['turn_over'] = json_decode($mStageTwo['stc_turnover']);
            } else if ($mSessionType == "4") {
                // $this->load->view('vendor/contractor', $data);
            }
            $data['records'] = $mDataArray;
            $data['actions'] = $mActionsArray;
            $this->load->view('vendor/dashboard', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function eoi() {
        $mSessionKey = $this->session->userdata('session_vendor_id');
        if ($mSessionKey) {
            $data['home'] = "short";
            $data['mRecords'] = $this->ev->getAllParentByVendorId();
            $this->load->view('vendor/shortlisting', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function viewBidCapacity($mEoiId) {
        $mSessionKey = $this->session->userdata('session_vendor_id');
        if ($mSessionKey) {
            $data['home'] = "short";
            $data['mRecord'] = $this->bc->getParentByVendorIdAndEoiId($mSessionKey, $mEoiId);
            $this->load->view('vendor/view_bidcapacity', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function shortlistingBids() {
        $mSessionKey = $this->session->userdata('session_vendor_id');
        if ($mSessionKey) {
            $data['home'] = "short";
            $this->load->view('vendor/shortlisting_bids', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function viewEoi($mEoiId, $mEvId) {
        $mSessionKey = $this->session->userdata('session_vendor_id');
        if ($mSessionKey && $mEoiId && $mEvId) {
            $data['home'] = "short";
            $data['mRecord'] = $this->eoi->getParentByKey($mEoiId);
            $data['mRecordEv'] = $this->ev->getParentByKey($mEvId);
            $this->load->view('vendor/shortlisting_eoi_view', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionChangeEoiStatus($mEoiId, $mEvId, $mStatus) {
        $mSessionKey = $this->session->userdata('session_vendor_id');
        if ($mSessionKey && $mEoiId) {
            $data['home'] = "short";
            if ($mStatus == "1") {
                $mEoiStatus = 1;
            } else if ($mStatus == "2") {
                $mEoiStatus = 10;
            }
            $mEoiData = $this->eoi->getParentByKey($mEoiId);
            $mVendorsSelected = json_decode($mEoiData['eoi_vendors_selected']);
            $mVendorsAccepted = json_decode($mEoiData['eoi_accepted_by']);
            $mVendorsRejected = json_decode($mEoiData['eoi_rejected_by']);

            if (empty($mVendorsAccepted)) {
                $mVendorsAccepted = array();
                $mVendorsAccepted[] = $mSessionKey;
            } else {
                $mSessionArrayAcc = array();
                $mSessionArrayAcc[] = $mSessionKey;
                $mVendorsAccepted = array_merge($mVendorsAccepted, $mSessionArrayAcc);
            }

            if (empty($mVendorsRejected)) {
                $mVendorsRejected = array();
                $mVendorsRejected[] = $mSessionKey;
            } else {
                $mSessionArrayRej = array();
                $mSessionArrayRej[] = $mSessionKey;
                $mVendorsRejected = array_merge($mVendorsRejected, $mSessionArrayRej);
            }

            if ($mStatus == "1") {
                if (count($mVendorsAccepted) == count($mVendorsSelected)) {
                    $eoidata = array(
                        'eoi_status' => $mEoiStatus,
                        'eoi_accepted_by' => json_encode($mVendorsAccepted),
                        'eoi_date_updated' => date("Y-m-d H:i:s"),
                    );
                    $mUpdate = $this->eoi->updateParentByKey($mEoiId, $eoidata);
                    if ($mUpdate == true) {
                        $eoivData = array(
                            'ev_status' => 1,
                            'ev_date_updated' => date("Y-m-d H:i:s"),
                        );
                        $mUpdate = $this->ev->updateParentByKey($mEvId, $eoivData);
                        if ($mUpdate == true) {
                            $this->session->set_flashdata('success', 'EOI accepted successfully.');
                            redirect('vendor/home/sendShortlisting/' . $mEoiId);
                        } else {
                            $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
                        }
                    } else {
                        $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
                    }
                    redirect('vendor/home/eoi');
                } else if (count($mVendorsAccepted) < count($mVendorsSelected)) {
                    $eoidata = array(
                        'eoi_accepted_by' => json_encode($mVendorsAccepted),
                        'eoi_date_updated' => date("Y-m-d H:i:s"),
                    );
                    $mUpdate = $this->eoi->updateParentByKey($mEoiId, $eoidata);
                    if ($mUpdate == true) {
                        $eoivData = array(
                            'ev_status' => $mEoiStatus,
                            'ev_date_updated' => date("Y-m-d H:i:s"),
                        );
                        $mUpdate = $this->ev->updateParentByKey($mEvId, $eoivData);
                        if ($mUpdate == true) {
                            $this->session->set_flashdata('success', 'EOI accepted successfully.');
                            redirect('vendor/home/sendShortlisting/' . $mEoiId);
                        } else {
                            $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
                        }
                    } else {
                        $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
                    }
                }
                redirect('vendor/home/eoi');
            } else if ($mStatus == "2") {
                if (count($mVendorsRejected) == count($mVendorsSelected)) {
                    $eoidata = array(
                        'eoi_status' => $mEoiStatus,
                        'eoi_rejected_by' => json_encode($mVendorsRejected),
                        'eoi_date_updated' => date("Y-m-d H:i:s"),
                    );
                    $mUpdate = $this->eoi->updateParentByKey($mEoiId, $eoidata);
                    if ($mUpdate == true) {
                        $eoivData = array(
                            'ev_status' => 1,
                            'ev_date_updated' => date("Y-m-d H:i:s"),
                        );
                        $mUpdate = $this->ev->updateParentByKey($mEvId, $eoivData);
                        if ($mUpdate == true) {
                            $this->session->set_flashdata('success', 'EOI rejected successfully.');
                        } else {
                            $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
                        }
                    } else {
                        $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
                    }
                } else if (count($mVendorsRejected) < count($mVendorsSelected)) {
                    $eoidata = array(
                        'eoi_status' => $mEoiStatus,
                        'eoi_rejected_by' => json_encode($mVendorsRejected),
                        'eoi_date_updated' => date("Y-m-d H:i:s"),
                    );
                    $mUpdate = $this->eoi->updateParentByKey($mEoiId, $eoidata);
                    if ($mUpdate == true) {
                        $eoivData = array(
                            'ev_status' => $mEoiStatus,
                            'ev_date_updated' => date("Y-m-d H:i:s"),
                        );
                        $mUpdate = $this->ev->updateParentByKey($mEvId, $eoivData);
                        if ($mUpdate == true) {
                            $this->session->set_flashdata('success', 'EOI rejected successfully.');
                        } else {
                            $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
                        }
                    } else {
                        $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
                    }
                }
                redirect('vendor/home/eoi');
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionSendBidCapacity($mEoiId) {
        $mSessionKey = $this->session->userdata('session_vendor_id');
        $mSessionType = $this->session->userdata('session_vendor_type');
        if ($mSessionKey && $mEoiId) {
            $data['home'] = "short";
            $mEoiData = $this->eoi->getParentByKey($mEoiId);
            $mVendorsSelected = json_decode($mEoiData['eoi_vendors_selected']);
            $mCheckBidCapacity = $this->bc->getParentByVendorIdAndEoiId($mSessionKey, $mEoiId);
            if (empty($mCheckBidCapacity)) {
                $mOne = $this->input->post('bc_bs_1');
                $mOneUpload = $this->single_File_Upload('bc_bs_1', $mOne);

                $mTwo = $this->input->post('bc_bs_2');
                $mTwoUpload = $this->single_File_Upload('bc_bs_2', $mTwo);

                $mThree = $this->input->post('bc_bs_3');
                $mThreeUpload = $this->single_File_Upload('bc_bs_3', $mThree);

                $mFour = $this->input->post('bc_bs_4');
                $mFourUpload = $this->single_File_Upload('bc_bs_4', $mFour);

                $mFive = $this->input->post('bc_solvency_certificate');
                $mFiveUpload = $this->single_File_Upload('bc_solvency_certificate', $mFive);

                $mSix = $this->input->post('bc_bg_certificate');
                $mSixUpload = $this->single_File_Upload('bc_bg_certificate', $mSix);

                $mOgAttach = $this->input->post('bc_ongoing_works');
                $mNewOg = array();
                foreach ($mOgAttach as $key => $value) {
                    //Get the temp file path
                    $tmpFilePath = $_FILES['bc_ongoing_works']['tmp_name'][$key][0];

                    //Make sure we have a file path
                    if ($tmpFilePath != "") {
                        //Setup our new file path
                        $newFilePath = "./uploads/" . $_FILES['bc_ongoing_works']['name'][$key][0];

                        //Upload the file into the temp dir
                        if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                            //Handle other code here
                            array_push($value, $_FILES['bc_ongoing_works']['name'][$key][0]);
                            $mNewOg[$key] = $value;
                        }
                    } else {
                        $mNewOg = $mOgAttach;
                    }
                }

                //Turn Over Array
                $mTurn = array();
                $mTurn[] = $this->input->post('bc_to_1');
                $mTurn[] = $this->input->post('bc_to_2');
                $mTurn[] = $this->input->post('bc_to_3');
                $mTurn[] = $this->input->post('bc_to_4');
                $mTurnOver = json_encode($mTurn);

                $mCalA = max(json_decode($mTurnOver));
                //Get N from ongoing works
                $mTotalN = 0;
                foreach ($mNewOg as $key => $value) {
                    $mTotalN += $value[6];
                }
                $mCalN = $mTotalN;
                $mCalB = $mEoiData['eoi_schedule'] / 12;
                //Bid Score
                $mBidCapacityScore = ($mCalA * $mCalB * 2) - $mCalN;

                $bcdata = array(
                    'bc_eoi_id' => $mEoiId,
                    'bc_vendor_id' => $mSessionKey,
                    'bc_to_1' => $this->input->post('bc_to_1'),
                    'bc_pat_1' => $this->input->post('bc_pat_1'),
                    'bc_bs_1' => $mOneUpload,
                    'bc_to_2' => $this->input->post('bc_to_2'),
                    'bc_pat_2' => $this->input->post('bc_pat_2'),
                    'bc_bs_2' => $mTwoUpload,
                    'bc_to_3' => $this->input->post('bc_to_3'),
                    'bc_pat_3' => $this->input->post('bc_pat_3'),
                    'bc_bs_3' => $mThreeUpload,
                    'bc_to_4' => $this->input->post('bc_to_4'),
                    'bc_pat_4' => $this->input->post('bc_pat_4'),
                    'bc_bs_4' => $mFourUpload,
                    'bc_ongoing_works' => json_encode($mNewOg),
                    'bc_solvency_certificate' => $mFiveUpload,
                    'bc_bg_certificate' => $mSixUpload,
                    'bc_score' => $mBidCapacityScore,
                    'bc_confirmation' => $this->input->post('bc_confirmation'),
                    'bc_date_added' => date("Y-m-d H:i:s"),
                    'bc_date_updated' => date("Y-m-d H:i:s"),
                );

                $mAdd = $this->bc->addParent($bcdata);
                if ($mAdd) {
                    $mCountSent = 0;
                    foreach ($mVendorsSelected as $key => $mVendor) {
                        $mCheckBidCapacity = $this->bc->getParentByVendorIdAndEoiId($mVendor, $mEoiId);
                        if (!empty($mCheckBidCapacity)) {
                            $mCountSent++;
                        }
                    }
                    if ($mCountSent == count($mVendorsSelected)) {
                        $eoidata = array(
                            'eoi_status' => 2,
                            'eoi_date_updated' => date("Y-m-d H:i:s"),
                        );
                        $this->eoi->updateParentByKey($mEoiId, $eoidata);
                    }

                    if ($mSessionType == "1") {
                        $userdata = array(
                            'stv_turnover' => $mTurnOver,
                        );
                        $this->vst->updateParentByVendorKey($mSessionKey, $userdata);
                    } else if ($mSessionType == "2") {
                        $userdata = array(
                            'stcon_turnover' => $mTurnOver,
                        );
                        $this->const->updateParentByVendorKey($mSessionKey, $userdata);
                    } else if ($mSessionType == "3") {
                        $userdata = array(
                            'stc_turnover' => $mTurnOver,
                        );
                        $this->cst->updateParentByVendorKey($mSessionKey, $userdata);
                    }

                    $this->session->set_flashdata('success', 'Bid capacity sent successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
                }
            } else {
                $this->session->set_flashdata('error', 'Bid capacity sent already.');
            }
            redirect('vendor/home/eoi');
        } else {
            $this->load->view('index', $data);
        }
    }

    public function sendShortlisting($mEoiId) {
        $mSessionKey = $this->session->userdata('session_vendor_id');
        $mSessionType = $this->session->userdata('session_vendor_type');
        $mSessionSmall = $this->session->userdata('session_vendor_small');
        if ($mSessionKey && $mEoiId) {
            $data['home'] = "short";
            $data['mRecord'] = $this->eoi->getParentByKey($mEoiId);
            if ($mSessionType == "1") {
                $vendor = $this->vst->getParentByVendorKey($mSessionKey);
                $data['vendor_doi'] = $vendor['stv_doi'];
            } else if ($mSessionType == "2") {
                $vendor = $this->const->getParentByVendorKey($mSessionKey);
                $data['vendor_doi'] = $vendor['stcon_doi'];
            } else if ($mSessionType == "3") {
                if ($mSessionSmall == 1) {
                    $vendor = $this->cst->getParentByVendorKey($mSessionKey);
                } else {
                    $vendor = $this->cst->getParentByVendorKey($mSessionKey);
                }
                $data['vendor_doi'] = $vendor['stc_doi'];
            } else if ($mSessionType == "4") {
                $data['vendor'] = array();
            }
            $date1 = date("Y-m-d H:i:s");
            $date2 = $data['vendor_doi'];
            //$date2 = "2021-12-27";
            $diff = abs(strtotime($date2) - strtotime($date1));
            $years = floor($diff / (365 * 60 * 60 * 24));
            $data['difference'] = $years;
            $this->load->view('vendor/shortlisting_send', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function dataShortlisting() {
        $mSessionKey = $this->session->userdata('session_vendor_id');
        if ($mSessionKey) {
            $data['home'] = "short";
            $this->load->view('vendor/shortlisting_data', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function getStageTwoData() {
        $mSessionKey = $this->session->userdata('session_vendor_id');
        $mSessionType = $this->session->userdata('session_vendor_type');
        $mSessionStatus = $this->session->userdata('session_vendor_status');
        $mSessionSmall = $this->session->userdata('session_vendor_small');
        $data['home'] = "stage_two";
        if ($mSessionKey) {
            $data['stageOne'] = $this->vendor_model->getStageOneModel($mSessionKey);
            if ($mSessionType == "1") {
                $data['mRecord'] = $this->vst->getParentByVendorKey($mSessionKey);
                $data['mTows'] = $this->buyer_model->getAllTypeOfWorkByVendorType($mSessionType);
                if (empty($data['mRecord'])) {
                    $data['disable'] = "";
                    $this->load->view('vendor/fill_stage_two_vendor', $data);
                } else {
                    if ($mSessionStatus == "8") {
                        $data['disable'] = "";
                        $this->load->view('vendor/edit_stage_two_vendor', $data);
                    } else {
                        $data['disable'] = "disabled";
                        $this->load->view('vendor/fill_stage_two_vendor', $data);
                    }
                }
            } else if ($mSessionType == "2") {
                $data['mRecord'] = $this->const->getParentByVendorKey($mSessionKey);
                if (!empty($data['mRecord'])) {
                    $data['disable'] = "disabled";
                } else {
                    $data['disable'] = "";
                }
                if ($mSessionStatus == "7") {
                    $this->load->view('vendor/edit_stage_two_consultant', $data);
                } else {
                    $this->load->view('vendor/fill_stage_two_consultant', $data);
                }
            } else if ($mSessionType == "3") {
                if ($mSessionSmall == 1) {
                    $data['mRecord'] = $this->cst->getParentByVendorKey($mSessionKey);
                    $data['mTows'] = $this->buyer_model->getAllTypeOfWorkByVendorType($mSessionType);
                    if (empty($data['mRecord'])) {
                        $data['disable'] = "";
                        $this->load->view('vendor/fill_small_stage_two_contractor', $data);
                    } else {
                        if ($mSessionStatus == "8") {
                            $data['disable'] = "";
                            $this->load->view('vendor/edit_small_stage_two_contractor', $data);
                        } else {
                            $data['disable'] = "disabled";
                            $this->load->view('vendor/fill_small_stage_two_contractor', $data);
                        }
                    }
                } else {
                    $data['mRecord'] = $this->cst->getParentByVendorKey($mSessionKey);
                    $data['mTows'] = $this->buyer_model->getAllTypeOfWorkByVendorType($mSessionType);
                    if (empty($data['mRecord'])) {
                        $data['disable'] = "";
                        $this->load->view('vendor/fill_stage_two_contractor', $data);
                    } else {
                        if ($mSessionStatus == "8") {
                            $data['disable'] = "";
                            $this->load->view('vendor/edit_stage_two_contractor', $data);
                        } else {
                            $data['disable'] = "disabled";
                            $this->load->view('vendor/fill_stage_two_contractor', $data);
                        }
                    }
                }
            } else if ($mSessionType == "4") {
                // $this->load->view('vendor/contractor', $data);
                $this->load->view('commans/header', $data);
                $this->load->view('commans/sidebar_v');
                $this->load->view('vendor/project');
                $this->load->view('commans/footer');
            } else {
                $this->load->view('vendor/project', $data);
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function postStageTwoVendor() {
        $mSessionKey = $this->session->userdata('session_vendor_id');
        if ($mSessionKey) {

            $mGst = $this->input->post('stv_gst_file');
            $mGstUpload = $this->single_File_Upload('stv_gst_file', $mGst);

            $mPf = $this->input->post('stv_pf_file');
            $mPfUpload = $this->single_File_Upload('stv_pf_file', $mPf);

            $mPan = $this->input->post('stv_pan_file');
            $mPanUpload = $this->single_File_Upload('stv_pan_file', $mPan);

            $mWpcAttachment = $this->input->post('stv_wpc_attachment');
            $mWpcAttachmentUpload = $this->single_File_Upload('stv_wpc_attachment', $mWpcAttachment);

            $mAttchDcw = $this->input->post('stv_dcw_attachment');
            $mAttchDcwUpload = $this->single_File_Upload('stv_dcw_attachment', $mAttchDcw);

            $mAttchCc = $this->input->post('stv_cc_attachment');
            $mAttchCcUpload = $this->single_File_Upload('stv_cc_attachment', $mAttchCc);

            $mAttchTwo = $this->input->post('stv_attachment_two');
            $mAttchUploadTwo = $this->single_File_Upload('stv_attachment_two', $mAttchTwo);

            $mAttch9001 = $this->input->post('stv_9001_isoc_attach');
            $mAttch9001Upload = $this->single_File_Upload('stv_9001_isoc_attach', $mAttch9001);

            $mAttch450001 = $this->input->post('stv_45001_isoc_attach');
            $mAttch450001Upload = $this->single_File_Upload('stv_45001_isoc_attach', $mAttch450001);

            $mPtrc = $this->input->post('stv_ptrc_attach');
            $mPtrcUpload = $this->single_File_Upload('stv_ptrc_attach', $mPtrc);

            $mLwf = $this->input->post('stv_lwf_attach');
            $mLwfUpload = $this->single_File_Upload('stv_lwf_attach', $mLwf);

            $mEsic = $this->input->post('stv_esic_attach');
            $mEsicUpload = $this->single_File_Upload('stv_esic_attach', $mEsic);

            $mEpf = $this->input->post('stv_epf_attach');
            $mEpfUpload = $this->single_File_Upload('stv_epf_attach', $mEpf);

            $mSecn = $this->input->post('stv_secn_attach');
            $mSecnUpload = $this->single_File_Upload('stv_secn_attach', $mSecn);

            $mLin = $this->input->post('stv_lin_attach');
            $mLinUpload = $this->single_File_Upload('stv_lin_attach', $mLin);

            $mQap = $this->input->post('stv_qap_attach');
            $mQapUpload = $this->single_File_Upload('stv_qap_attach', $mQap);

            $mOca = $this->input->post('stv_oca_attach');
            $mOcaUpload = $this->single_File_Upload('stv_oca_attach', $mOca);

            $mWpcAttach = $this->input->post('stv_scope_of_work');
            $mNewWpc = array();
            foreach ($mWpcAttach as $key => $value) {
                //Get the temp file path
                $tmpFilePath = $_FILES['stv_scope_of_work']['tmp_name'][$key][0];

                //Make sure we have a file path
                if ($tmpFilePath != "") {
                    //Setup our new file path
                    $newFilePath = "./uploads/" . $_FILES['stv_scope_of_work']['name'][$key][0];

                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                        //Handle other code here
                        array_push($value, $_FILES['stv_scope_of_work']['name'][$key][0]);
                        $mNewWpc[$key] = $value;
                    }
                }
            }

            $mFinUploads = array();
            for ($i = 0; $i < count($_FILES['stv_fin_uploads']['name']); $i++) {
                $tmpFilePath = $_FILES['stv_fin_uploads']['tmp_name'][$i];

                //Make sure we have a file path
                if ($tmpFilePath != "") {
                    //Setup our new file path
                    $newFilePath = "./uploads/" . $_FILES['stv_fin_uploads']['name'][$i];

                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                        //Handle other code here
                        array_push($value, $_FILES['stv_fin_uploads']['name'][$i]);
                        $mFinUploads[$i] = $_FILES['stv_fin_uploads']['name'][$i];
                    }
                }
            }

            $vendorData = array(
                'stv_user_id' => $mSessionKey,
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
                'stv_ptrc' => $this->input->post('stv_ptrc'),
                'stv_ptrc_attach' => $mPtrcUpload,
                'stv_ptrc_to' => $this->input->post('stv_ptrc_to'),
                'stv_ptrc_one' => $this->input->post('stv_ptrc_one'),
                'stv_ptrc_two' => $this->input->post('stv_ptrc_two'),
                'stv_ptrc_three' => $this->input->post('stv_ptrc_three'),
                'stv_ptrc_four' => $this->input->post('stv_ptrc_four'),
                'stv_ptrc_five' => $this->input->post('stv_ptrc_five'),
                'stv_ptrc_six' => $this->input->post('stv_ptrc_six'),
                'stv_ptrc_seven' => $this->input->post('stv_ptrc_seven'),
                'stv_ptrc_date' => $this->input->post('stv_ptrc_date'),
                'stv_lwf' => $this->input->post('stv_lwf'),
                'stv_lwf_attach' => $mLwfUpload,
                'stv_lwf_to' => $this->input->post('stv_lwf_to'),
                'stv_lwf_one' => $this->input->post('stv_lwf_one'),
                'stv_lwf_two' => $this->input->post('stv_lwf_two'),
                'stv_lwf_three' => $this->input->post('stv_lwf_three'),
                'stv_lwf_four' => $this->input->post('stv_lwf_four'),
                'stv_lwf_five' => $this->input->post('stv_lwf_five'),
                'stv_lwf_six' => $this->input->post('stv_lwf_six'),
                'stv_lwf_seven' => $this->input->post('stv_lwf_seven'),
                'stv_lwf_date' => $this->input->post('stv_lwf_date'),
                'stv_esic' => $this->input->post('stv_esic'),
                'stv_esic_attach' => $mEsicUpload,
                'stv_esic_to' => $this->input->post('stv_esic_to'),
                'stv_esic_one' => $this->input->post('stv_esic_one'),
                'stv_esic_two' => $this->input->post('stv_esic_two'),
                'stv_esic_three' => $this->input->post('stv_esic_three'),
                'stv_esic_four' => $this->input->post('stv_esic_four'),
                'stv_esic_five' => $this->input->post('stv_esic_five'),
                'stv_esic_six' => $this->input->post('stv_esic_six'),
                'stv_esic_seven' => $this->input->post('stv_esic_seven'),
                'stv_esic_date' => $this->input->post('stv_esic_date'),
                'stv_epf' => $this->input->post('stv_epf'),
                'stv_epf_attach' => $mEpfUpload,
                'stv_epf_to' => $this->input->post('stv_epf_to'),
                'stv_epf_one' => $this->input->post('stv_epf_one'),
                'stv_epf_two' => $this->input->post('stv_epf_two'),
                'stv_epf_three' => $this->input->post('stv_epf_three'),
                'stv_epf_four' => $this->input->post('stv_epf_four'),
                'stv_epf_five' => $this->input->post('stv_epf_five'),
                'stv_epf_six' => $this->input->post('stv_epf_six'),
                'stv_epf_seven' => $this->input->post('stv_epf_seven'),
                'stv_epf_date' => $this->input->post('stv_epf_date'),
                'stv_secn' => $this->input->post('stv_secn'),
                'stv_secn_attach' => $mSecnUpload,
                'stv_lin' => $this->input->post('stv_lin'),
                'stv_lin_attach' => $mLinUpload,
                'stv_address' => $this->input->post('stv_address'),
                'stv_tel' => $this->input->post('stv_tel'),
                'stv_fax' => $this->input->post('stv_fax'),
                'stv_website' => $this->input->post('stv_website'),
                'stv_nocp' => $this->input->post('stv_nocp'),
                'stv_eocp' => $this->input->post('stv_eocp'),
                'stv_noy' => $this->input->post('stv_noy'),
                'stv_tow' => json_encode($this->input->post('stv_tow')),
                'stv_rwgd' => $this->input->post('stv_rwgd'),
                'stv_scope_of_work' => json_encode($mNewWpc),
                'stv_work_details' => json_encode($this->input->post('stv_work_details')),
                'stv_attachment_one' => "",
                'stv_attachment_two' => "",
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
                'stv_fin_uploads' => json_encode($mFinUploads),
                'stv_qap' => $this->input->post('stv_qap'),
                'stv_qap_attach' => $mQapUpload,
                'stv_9001_isoc' => $this->input->post('stv_9001_isoc'),
                'stv_45001_isoc' => $this->input->post('stv_45001_isoc'),
                'stv_9001_isoc_attach' => $mAttch9001Upload,
                'stv_45001_isoc_attach' => $mAttch450001Upload,
                'stv_oca' => $this->input->post('stv_oca'),
                'stv_oca_attach' => $mOcaUpload,
                'stv_iaqap' => $this->input->post('stv_iaqap'),
                'stv_visit_a' => json_encode($this->input->post('stv_visit_a')),
                'stv_visit_b' => $this->input->post('stv_visit_b'),
                'stv_visit_c' => json_encode($this->input->post('stv_visit_c')),
                'stv_partner_field_1' => $this->input->post('stv_partner_field_1'),
                'stv_partner_field_2' => $this->input->post('stv_partner_field_2'),
                'stv_confirmation' => $this->input->post('stv_confirmation'),
                'stv_date_added' => date("Y-m-d H:i:s"),
                'stv_date_updated' => date("Y-m-d H:i:s"),
            );

            $mActionAdd = $this->vst->addParent($vendorData);
            if ($mActionAdd == true) {
                $userdata = array(
                    'company_name' => $this->input->post('stv_company'),
                    'updated_at' => date("Y-m-d H:i:s"),
                );
                $this->register->updateParentByKey($mSessionKey, $userdata);
                $this->session->set_userdata('session_vendor_status', 1);
                //To Vendor
                $mMessage = "Stage-2 form submitted successfully.";
                $this->sendEmailToVendor("Stage-2 Registration", $mMessage, $mSessionEmail);
                //To Buyer
                $mMessage = "Stage-2 form submitted by vendor : " . $mSessionName . " successfully.";
                $this->sendEmailToBuyer("Stage-2 Registration", $mMessage, $mSessionZone);
                $this->session->set_flashdata('success', 'Vendor stage two submitted successfully.');
                $data['url'] = "vendor/home/getStageTwoData";
                $data['form'] = "Stage Two";
                $data['message'] = "Thank you for submitting the Stage 2 form. Your form is currently under review";
                $this->load->view('message', $data);
            } else {
                redirect('vendor/home/getStageTwoData');
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function updateStageTwoVendor() {
        $mSessionKey = $this->session->userdata('session_vendor_id');
        if ($mSessionKey) {
            $mRecord = $this->vst->getParentByVendorKey($mSessionKey);

            $mGst = $this->input->post('stv_gst_file');
            $mGstUpload = $this->single_File_Upload('stv_gst_file', $mGst);

            $mPf = $this->input->post('stv_pf_file');
            $mPfUpload = $this->single_File_Upload('stv_pf_file', $mPf);

            $mPan = $this->input->post('stv_pan_file');
            $mPanUpload = $this->single_File_Upload('stv_pan_file', $mPan);

            $mWpcAttachment = $this->input->post('stv_wpc_attachment');
            $mWpcAttachmentUpload = $this->single_File_Upload('stv_wpc_attachment', $mWpcAttachment);

            $mAttchDcw = $this->input->post('stv_dcw_attachment');
            $mAttchDcwUpload = $this->single_File_Upload('stv_dcw_attachment', $mAttchDcw);

            $mAttchCc = $this->input->post('stv_cc_attachment');
            $mAttchCcUpload = $this->single_File_Upload('stv_cc_attachment', $mAttchCc);

            $mAttchTwo = $this->input->post('stv_attachment_two');
            $mAttchUploadTwo = $this->single_File_Upload('stv_attachment_two', $mAttchTwo);

            $mAttch9001 = $this->input->post('stv_9001_isoc_attach');
            $mAttch9001Upload = $this->single_File_Upload('stv_9001_isoc_attach', $mAttch9001);

            $mAttch450001 = $this->input->post('stv_45001_isoc_attach');
            $mAttch450001Upload = $this->single_File_Upload('stv_45001_isoc_attach', $mAttch450001);

            $mPtrc = $this->input->post('stv_ptrc_attach');
            $mPtrcUpload = $this->single_File_Upload('stv_ptrc_attach', $mPtrc);

            $mLwf = $this->input->post('stv_lwf_attach');
            $mLwfUpload = $this->single_File_Upload('stv_lwf_attach', $mLwf);

            $mEsic = $this->input->post('stv_esic_attach');
            $mEsicUpload = $this->single_File_Upload('stv_esic_attach', $mEsic);

            $mEpf = $this->input->post('stv_epf_attach');
            $mEpfUpload = $this->single_File_Upload('stv_epf_attach', $mEpf);

            $mSecn = $this->input->post('stv_secn_attach');
            $mSecnUpload = $this->single_File_Upload('stv_secn_attach', $mSecn);

            $mLin = $this->input->post('stv_lin_attach');
            $mLinUpload = $this->single_File_Upload('stv_lin_attach', $mLin);

            $mQap = $this->input->post('stv_qap_attach');
            $mQapUpload = $this->single_File_Upload('stv_qap_attach', $mQap);

            $mOca = $this->input->post('stv_oca_attach');
            $mOcaUpload = $this->single_File_Upload('stv_oca_attach', $mOca);

            $mWpcAttach = $this->input->post('stv_scope_of_work');
            $mNewWpc = array();
            $mOldWpc = json_decode($mRecord['stv_scope_of_work'], true);
            foreach ($mWpcAttach as $key => $value) {
                //Get the temp file path
                $tmpFilePath = $_FILES['stv_scope_of_work']['tmp_name'][$key][0];

                //Make sure we have a file path
                if ($tmpFilePath != "") {
                    //Setup our new file path
                    $newFilePath = "./uploads/" . $_FILES['stv_scope_of_work']['name'][$key][0];

                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                        //Handle other code here
                        if ($_FILES['stv_scope_of_work']['name'][$key][0]) {
                            array_push($value, $_FILES['stv_scope_of_work']['name'][$key][0]);
                            $mNewWpc[$key] = $value;
                        } else {
                            $mNewWpc[$key] = $value;
                        }
                    }
                } else {
                    $mOldWpc[$key][0] = $value[0];
                    $mOldWpc[$key][1] = $value[1];
                    $mOldWpc[$key][2] = $value[2];
                    $mOldWpc[$key][3] = $value[3];
                    $mOldWpc[$key][4] = $value[4];
                    $mOldWpc[$key][5] = $value[5];
                    $mOldWpc[$key][6] = $value[6];
                    $mOldWpc[$key][7] = $value[7];
                    $mOldWpc[$key][8] = $value[8];
                    $mOldWpc[$key][9] = $value[9];
                    $mNewWpc[$key] = $mOldWpc[$key];
                }
            }

            $mFinUploads = array();
            $mOldFin = json_decode($mRecord['stv_fin_uploads'], true);
            for ($i = 0; $i < count($_FILES['stv_fin_uploads']['name']); $i++) {
                $tmpFilePath = $_FILES['stv_fin_uploads']['tmp_name'][$i];

                //Make sure we have a file path
                if ($tmpFilePath != "") {
                    //Setup our new file path
                    $newFilePath = "./uploads/" . $_FILES['stv_fin_uploads']['name'][$i];

                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                        //Handle other code here
                        array_push($value, $_FILES['stv_fin_uploads']['name'][$i]);
                        $mFinUploads[$i] = $_FILES['stv_fin_uploads']['name'][$i];
                    }
                } else {
                    $mFinUploads[$i] = $mOldFin[$i];
                }
            }

            if ($mPtrcUpload) {
                $mPtrcUpload = $mPtrcUpload;
            } else {
                $mPtrcUpload = $mRecord['stv_ptrc_attach'];
            }

            if ($this->input->post('stv_ptrc') == "0") {
                $mPtrcUpload = "";
            }

            if ($mLwfUpload) {
                $mLwfUpload = $mLwfUpload;
            } else {
                $mLwfUpload = $mRecord['stv_lwf_attach'];
            }

            if ($this->input->post('stv_lwf') == "0") {
                $mLwfUpload = "";
            }

            if ($mEsicUpload) {
                $mEsicUpload = $mEsicUpload;
            } else {
                $mEsicUpload = $mRecord['stv_esic_attach'];
            }

            if ($this->input->post('stv_esic') == "0") {
                $mEsicUpload = "";
            }

            if ($mEpfUpload) {
                $mEpfUpload = $mEpfUpload;
            } else {
                $mEpfUpload = $mRecord['stv_epf_attach'];
            }

            if ($this->input->post('stv_epf') == "0") {
                $mEpfUpload = "";
            }

            if ($mSecnUpload) {
                $mSecnUpload = $mSecnUpload;
            } else {
                $mSecnUpload = $mRecord['stv_secn_attach'];
            }

            if ($this->input->post('stv_secn') == "0") {
                $mSecnUpload = "";
            }

            if ($mLinUpload) {
                $mLinUpload = $mLinUpload;
            } else {
                $mLinUpload = $mRecord['stv_lin_attach'];
            }

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

            if ($mWpcAttachmentUpload) {
                $mWpcAttachmentUpload = $mWpcAttachmentUpload;
            } else {
                $mWpcAttachmentUpload = $mRecord['stv_wpc_attachment'];
            }

            if ($mAttchDcwUpload) {
                $mAttchDcwUpload = $mAttchDcwUpload;
            } else {
                $mAttchDcwUpload = $mRecord['stv_dcw_attachment'];
            }

            if ($mAttchUploadTwo) {
                $mAttchUploadTwo = $mAttchUploadTwo;
            } else {
                $mAttchUploadTwo = $mRecord['stv_attachment_two'];
            }

            if ($mAttch9001Upload) {
                $mAttch9001Upload = $mAttch9001Upload;
            } else {
                $mAttch9001Upload = $mRecord['stv_9001_isoc_attach'];
            }

            if ($mAttch450001Upload) {
                $mAttch450001Upload = $mAttch450001Upload;
            } else {
                $mAttch450001Upload = $mRecord['stv_45001_isoc_attach'];
            }

            if ($mOcaUpload) {
                $mOcaUpload = $mOcaUpload;
            } else {
                $mOcaUpload = $mRecord['stv_oca_attach'];
            }

            if ($mQapUpload) {
                $mQapUpload = $mQapUpload;
            } else {
                $mQapUpload = $mRecord['stv_qap_attach'];
            }

            if (empty($mFinUploads)) {
                $mFinUploads = json_decode($mRecord['stv_fin_uploads'], true);
            } else {
                $mFinUploads = $mFinUploads;
            }

            if (empty($mNewWpc)) {
                $mNewWpc = json_decode($mRecord['stv_scope_of_work'], true);
            } else {
                $mNewWpc = $mNewWpc;
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
                'stv_ptrc' => $this->input->post('stv_ptrc'),
                'stv_ptrc_attach' => $mPtrcUpload,
                'stv_ptrc_to' => $this->input->post('stv_ptrc_to'),
                'stv_ptrc_one' => $this->input->post('stv_ptrc_one'),
                'stv_ptrc_two' => $this->input->post('stv_ptrc_two'),
                'stv_ptrc_three' => $this->input->post('stv_ptrc_three'),
                'stv_ptrc_four' => $this->input->post('stv_ptrc_four'),
                'stv_ptrc_five' => $this->input->post('stv_ptrc_five'),
                'stv_ptrc_six' => $this->input->post('stv_ptrc_six'),
                'stv_ptrc_seven' => $this->input->post('stv_ptrc_seven'),
                'stv_ptrc_date' => $this->input->post('stv_ptrc_date'),
                'stv_lwf' => $this->input->post('stv_lwf'),
                'stv_lwf_attach' => $mLwfUpload,
                'stv_lwf_to' => $this->input->post('stv_lwf_to'),
                'stv_lwf_one' => $this->input->post('stv_lwf_one'),
                'stv_lwf_two' => $this->input->post('stv_lwf_two'),
                'stv_lwf_three' => $this->input->post('stv_lwf_three'),
                'stv_lwf_four' => $this->input->post('stv_lwf_four'),
                'stv_lwf_five' => $this->input->post('stv_lwf_five'),
                'stv_lwf_six' => $this->input->post('stv_lwf_six'),
                'stv_lwf_seven' => $this->input->post('stv_lwf_seven'),
                'stv_lwf_date' => $this->input->post('stv_lwf_date'),
                'stv_esic' => $this->input->post('stv_esic'),
                'stv_esic_attach' => $mEsicUpload,
                'stv_esic_to' => $this->input->post('stv_esic_to'),
                'stv_esic_one' => $this->input->post('stv_esic_one'),
                'stv_esic_two' => $this->input->post('stv_esic_two'),
                'stv_esic_three' => $this->input->post('stv_esic_three'),
                'stv_esic_four' => $this->input->post('stv_esic_four'),
                'stv_esic_five' => $this->input->post('stv_esic_five'),
                'stv_esic_six' => $this->input->post('stv_esic_six'),
                'stv_esic_seven' => $this->input->post('stv_esic_seven'),
                'stv_esic_date' => $this->input->post('stv_esic_date'),
                'stv_epf' => $this->input->post('stv_epf'),
                'stv_epf_attach' => $mEpfUpload,
                'stv_epf_to' => $this->input->post('stv_epf_to'),
                'stv_epf_one' => $this->input->post('stv_epf_one'),
                'stv_epf_two' => $this->input->post('stv_epf_two'),
                'stv_epf_three' => $this->input->post('stv_epf_three'),
                'stv_epf_four' => $this->input->post('stv_epf_four'),
                'stv_epf_five' => $this->input->post('stv_epf_five'),
                'stv_epf_six' => $this->input->post('stv_epf_six'),
                'stv_epf_seven' => $this->input->post('stv_epf_seven'),
                'stv_epf_date' => $this->input->post('stv_epf_date'),
                'stv_secn' => $this->input->post('stv_secn'),
                'stv_secn_attach' => $mSecnUpload,
                'stv_lin' => $this->input->post('stv_lin'),
                'stv_lin_attach' => $mLinUpload,
                'stv_address' => $this->input->post('stv_address'),
                'stv_tel' => $this->input->post('stv_tel'),
                'stv_fax' => $this->input->post('stv_fax'),
                'stv_website' => $this->input->post('stv_website'),
                'stv_nocp' => $this->input->post('stv_nocp'),
                'stv_eocp' => $this->input->post('stv_eocp'),
                'stv_noy' => $this->input->post('stv_noy'),
                'stv_tow' => json_encode($this->input->post('stv_tow')),
                'stv_rwgd' => $this->input->post('stv_rwgd'),
                'stv_scope_of_work' => json_encode($mNewWpc),
                'stv_work_details' => json_encode($this->input->post('stv_work_details')),
                'stv_attachment_one' => "",
                'stv_attachment_two' => "",
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
                'stv_fin_uploads' => json_encode($mFinUploads),
                'stv_qap' => $this->input->post('stv_qap'),
                'stv_qap_attach' => $mQapUpload,
                'stv_9001_isoc' => $this->input->post('stv_9001_isoc'),
                'stv_45001_isoc' => $this->input->post('stv_45001_isoc'),
                'stv_9001_isoc_attach' => $mAttch9001Upload,
                'stv_45001_isoc_attach' => $mAttch450001Upload,
                'stv_oca' => $this->input->post('stv_oca'),
                'stv_oca_attach' => $mOcaUpload,
                'stv_iaqap' => $this->input->post('stv_iaqap'),
                'stv_visit_a' => json_encode($this->input->post('stv_visit_a')),
                'stv_visit_b' => $this->input->post('stv_visit_b'),
                'stv_visit_c' => json_encode($this->input->post('stv_visit_c')),
                'stv_partner_field_1' => $this->input->post('stv_partner_field_1'),
                'stv_partner_field_2' => $this->input->post('stv_partner_field_2'),
                'stv_confirmation' => $this->input->post('stv_confirmation'),
                'stv_date_updated' => date("Y-m-d H:i:s"),
            );

            $mActionAdd = $this->vst->updateParentByVendorKey($mSessionKey, $vendorData);
            if ($mActionAdd == true) {
                $userdata = array(
                    'active' => 1,
                    'company_name' => $this->input->post('stv_company'),
                    'updated_at' => date("Y-m-d H:i:s"),
                );
                $this->register->updateParentByKey($mSessionKey, $userdata);
                $this->session->set_userdata('session_vendor_status', 1);

                //To Vendor
                $mMessage = "Stage-2 form updated successfully.";
                $this->sendEmailToVendor("Stage-2 Registration", $mMessage, $mSessionEmail);
                //To Buyer
                $mMessage = "Stage-2 form updated by vendor : " . $mSessionName . " successfully.";
                $this->sendEmailToBuyer("Stage-2 Registration", $mMessage, $mSessionZone);

                $this->session->set_flashdata('success', 'Vendor stage two updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('vendor/home/getStageTwoData');
        } else {
            $this->load->view('index', $data);
        }
    }

    function safemove($src, $dest) {
        if (file_exists($dest)) {
            return false;
        }
        return rename($src, $dest);
    }

    public function postStageTwoContractor() {
        $mSessionKey = $this->session->userdata('session_vendor_id');
        $mSessionZone = $this->session->userdata('session_vendor_zone');
        $mSessionEmail = $this->session->userdata('session_vendor_email');
        $mSessionSmall = $this->session->userdata('session_vendor_small');
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
            $mAttchDcwUpload = $this->single_File_Upload('stc_dcw_attachment', $mAttchDcw);

            $mAttchCc = $this->input->post('stc_cc_attachment');
            $mAttchCcUpload = $this->single_File_Upload('stc_cc_attachment', $mAttchCc);

            $mAttchTwo = $this->input->post('stc_attachment_two');
            $mAttchUploadTwo = $this->single_File_Upload('stc_attachment_two', $mAttchTwo);

            $mAttch9001 = $this->input->post('stc_9001_isoc_attach');
            $mAttch9001Upload = $this->single_File_Upload('stc_9001_isoc_attach', $mAttch9001);

            $mAttch450001 = $this->input->post('stc_45001_isoc_attach');
            $mAttch450001Upload = $this->single_File_Upload('stc_45001_isoc_attach', $mAttch450001);

            $mPtrc = $this->input->post('stc_ptrc_attach');
            $mPtrcUpload = $this->single_File_Upload('stc_ptrc_attach', $mPtrc);

            $mLwf = $this->input->post('stc_lwf_attach');
            $mLwfUpload = $this->single_File_Upload('stc_lwf_attach', $mLwf);

            $mEsic = $this->input->post('stc_esic_attach');
            $mEsicUpload = $this->single_File_Upload('stc_esic_attach', $mEsic);

            $mEpf = $this->input->post('stc_epf_attach');
            $mEpfUpload = $this->single_File_Upload('stc_epf_attach', $mEpf);

            $mSecn = $this->input->post('stc_secn_attach');
            $mSecnUpload = $this->single_File_Upload('stc_secn_attach', $mSecn);

            $mLin = $this->input->post('stc_lin_attach');
            $mLinUpload = $this->single_File_Upload('stc_lin_attach', $mLin);

            $mQap = $this->input->post('stc_qap_attach');
            $mQapUpload = $this->single_File_Upload('stc_qap_attach', $mQap);

            $mOca = $this->input->post('stc_oca_attach');
            $mOcaUpload = $this->single_File_Upload('stc_oca_attach', $mOca);

            $mWpcAttach = $this->input->post('stc_wpc_details');

            $mNewWpc = array();
            foreach ($mWpcAttach as $key => $value) {
                //Get the temp file path
                $tmpFilePath = $_FILES['stc_wpc_details']['tmp_name'][$key][0];

                //Make sure we have a file path
                if ($tmpFilePath != "") {
                    //Setup our new file path
                    $newFilePath = "./uploads/" . $_FILES['stc_wpc_details']['name'][$key][0];

                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                        //Handle other code here
                        array_push($value, $_FILES['stc_wpc_details']['name'][$key][0]);
                        $mNewWpc[$key] = $value;
                    }
                } else {
                    $mNewWpc = $mWpcAttach;
                }
            }

            $mCcAttach = $this->input->post('stc_cc_details');
            $mNewCc = array();
            foreach ($mCcAttach as $key => $value) {
                //Get the temp file path
                $tmpFilePath = $_FILES['stc_cc_details']['tmp_name'][$key][0];

                //Make sure we have a file path
                if ($tmpFilePath != "") {
                    //Setup our new file path
                    $newFilePath = "./uploads/" . $_FILES['stc_cc_details']['name'][$key][0];

                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                        //Handle other code here
                        array_push($value, $_FILES['stc_cc_details']['name'][$key][0]);
                        $mNewCc[$key] = $value;
                    }
                } else {
                    $mNewCc = $mCcAttach;
                }
            }

            $mDcwAttach = $this->input->post('stc_dcw_details');
            $mNewDcw = array();
            foreach ($mDcwAttach as $key => $value) {
                //Get the temp file path
                $tmpFilePath = $_FILES['stc_dcw_details']['tmp_name'][$key][0];

                //Make sure we have a file path
                if ($tmpFilePath != "") {
                    //Setup our new file path
                    $newFilePath = "./uploads/" . $_FILES['stc_dcw_details']['name'][$key][0];

                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                        //Handle other code here
                        array_push($value, $_FILES['stc_dcw_details']['name'][$key][0]);
                        $mNewDcw[$key] = $value;
                    }
                } else {
                    $mNewDcw = $mDcwAttach;
                }
            }

            if ($mSessionSmall == 1) {
                $mIsSmall = 1;
            } else {
                $mIsSmall = 0;
            }


            $mTotalAssets = array(
                $this->input->post('stc_total_assets1'),
                $this->input->post('stc_total_assets2'),
                $this->input->post('stc_total_assets3'),
                $this->input->post('stc_total_assets4'),
            );

            $mCurrentAssets = array(
                $this->input->post('stc_current_assets1'),
                $this->input->post('stc_current_assets2'),
                $this->input->post('stc_current_assets3'),
                $this->input->post('stc_current_assets4'),
            );

            $mTotalLia = array(
                $this->input->post('stc_total_lia1'),
                $this->input->post('stc_total_lia2'),
                $this->input->post('stc_total_lia3'),
                $this->input->post('stc_total_lia4'),
            );

            $mCurrentLia = array(
                $this->input->post('stc_current_lia1'),
                $this->input->post('stc_current_lia2'),
                $this->input->post('stc_current_lia3'),
                $this->input->post('stc_current_lia4'),
            );

            $mTurnOver = array(
                $this->input->post('stc_turnover1'),
                $this->input->post('stc_turnover2'),
                $this->input->post('stc_turnover3'),
                $this->input->post('stc_turnover4'),
            );

            $mProfits = array(
                $this->input->post('stc_profits1'),
                $this->input->post('stc_profits2'),
                $this->input->post('stc_profits3'),
                $this->input->post('stc_profits4'),
            );

            $mProfitsTax = array(
                $this->input->post('stc_profits_tax1'),
                $this->input->post('stc_profits_tax2'),
                $this->input->post('stc_profits_tax3'),
                $this->input->post('stc_profits_tax4'),
            );

            $mFin1 = $this->input->post('stc_fin_uploads1');
            $mFin1Upload = $this->single_File_Upload('stc_fin_uploads1', $mFin1);

            $mFin2 = $this->input->post('stc_fin_uploads2');
            $mFin2Upload = $this->single_File_Upload('stc_fin_uploads2', $mFin2);

            $mFin3 = $this->input->post('stc_fin_uploads3');
            $mFin3Upload = $this->single_File_Upload('stc_fin_uploads3', $mFin3);

            $mFin4 = $this->input->post('stc_fin_uploads4');
            $mFin4Upload = $this->single_File_Upload('stc_fin_uploads4', $mFin4);

            $mFinUploads = array(
                $mFin1Upload,
                $mFin2Upload,
                $mFin3Upload,
                $mFin4Upload
            );

            $vendorData = array(
                'stc_user_id' => $mSessionKey,
                'stc_company' => $this->input->post('stc_company'),
                'stc_tof' => $this->input->post('stc_tof'),
                'stc_reg' => $this->input->post('stc_reg'),
                'stc_doi' => $this->input->post('stc_doi'),
                'stc_gst' => $this->input->post('stc_gst'),
                'stc_gst_file' => $mGstUpload,
                'stc_pf' => $this->input->post('stc_pf'),
                'stc_pf_file' => $mPfUpload,
                'stc_ptrc' => $this->input->post('stc_ptrc'),
                'stc_ptrc_attach' => $mPtrcUpload,
                'stc_ptrc_to' => $this->input->post('stc_ptrc_to'),
                'stc_ptrc_one' => $this->input->post('stc_ptrc_one'),
                'stc_ptrc_two' => $this->input->post('stc_ptrc_two'),
                'stc_ptrc_three' => $this->input->post('stc_ptrc_three'),
                'stc_ptrc_four' => $this->input->post('stc_ptrc_four'),
                'stc_ptrc_five' => $this->input->post('stc_ptrc_five'),
                'stc_ptrc_six' => $this->input->post('stc_ptrc_six'),
                'stc_ptrc_seven' => $this->input->post('stc_ptrc_seven'),
                'stc_ptrc_date' => $this->input->post('stc_ptrc_date'),
                'stc_lwf' => $this->input->post('stc_lwf'),
                'stc_lwf_attach' => $mLwfUpload,
                'stc_lwf_to' => $this->input->post('stc_lwf_to'),
                'stc_lwf_one' => $this->input->post('stc_lwf_one'),
                'stc_lwf_two' => $this->input->post('stc_lwf_two'),
                'stc_lwf_three' => $this->input->post('stc_lwf_three'),
                'stc_lwf_four' => $this->input->post('stc_lwf_four'),
                'stc_lwf_five' => $this->input->post('stc_lwf_five'),
                'stc_lwf_six' => $this->input->post('stc_lwf_six'),
                'stc_lwf_seven' => $this->input->post('stc_lwf_seven'),
                'stc_lwf_date' => $this->input->post('stc_lwf_date'),
                'stc_esic' => $this->input->post('stc_esic'),
                'stc_esic_attach' => $mEsicUpload,
                'stc_esic_to' => $this->input->post('stc_esic_to'),
                'stc_esic_one' => $this->input->post('stc_esic_one'),
                'stc_esic_two' => $this->input->post('stc_esic_two'),
                'stc_esic_three' => $this->input->post('stc_esic_three'),
                'stc_esic_four' => $this->input->post('stc_esic_four'),
                'stc_esic_five' => $this->input->post('stc_esic_five'),
                'stc_esic_six' => $this->input->post('stc_esic_six'),
                'stc_esic_seven' => $this->input->post('stc_esic_seven'),
                'stc_esic_date' => $this->input->post('stc_esic_date'),
                'stc_epf' => $this->input->post('stc_epf'),
                'stc_epf_attach' => $mEpfUpload,
                'stc_epf_to' => $this->input->post('stc_epf_to'),
                'stc_epf_one' => $this->input->post('stc_epf_one'),
                'stc_epf_two' => $this->input->post('stc_epf_two'),
                'stc_epf_three' => $this->input->post('stc_epf_three'),
                'stc_epf_four' => $this->input->post('stc_epf_four'),
                'stc_epf_five' => $this->input->post('stc_epf_five'),
                'stc_epf_six' => $this->input->post('stc_epf_six'),
                'stc_epf_seven' => $this->input->post('stc_epf_seven'),
                'stc_epf_date' => $this->input->post('stc_epf_date'),
                'stc_secn' => $this->input->post('stc_secn'),
                'stc_secn_attach' => $mSecnUpload,
                'stc_lin' => $this->input->post('stc_lin'),
                'stc_lin_attach' => $mLinUpload,
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
                'stc_wpc' => $this->input->post('stc_wpc'),
                'stc_wpc_details' => json_encode($mNewWpc),
                'stc_wpc_attachment' => $mWpcAttachmentUpload,
                'stc_cc' => $this->input->post('stc_cc'),
                'stc_cc_details' => json_encode($mNewCc),
                'stc_cc_attachment' => $mAttchCcUpload,
                'stc_dcw' => $this->input->post('stc_dcw'),
                'stc_dcw_details' => json_encode($mNewDcw),
                'stc_dcw_attachment' => $mAttchDcwUpload,
                'stc_hroe' => $this->input->post('stc_hroe'),
                'stc_financial_referees' => json_encode($this->input->post('stc_financial_referees')),
                'stc_attachment_two' => $mAttchUploadTwo,
                'stc_total_assets' => json_encode($mTotalAssets),
                'stc_current_assets' => json_encode($mCurrentAssets),
                'stc_total_lia' => json_encode($mTotalLia),
                'stc_current_lia' => json_encode($mCurrentLia),
                'stc_turnover' => json_encode($mTurnOver),
                'stc_profits' => json_encode($mProfits),
                'stc_profits_tax' => json_encode($mProfitsTax),
                'stc_fin_uploads' => json_encode($mFinUploads),
                'stc_qac' => json_encode($this->input->post('stc_qac')),
                'stc_qap' => $this->input->post('stc_qap'),
                'stc_qap_attach' => $mQapUpload,
                'stc_9001_isoc' => $this->input->post('stc_9001_isoc'),
                'stc_45001_isoc' => $this->input->post('stc_45001_isoc'),
                'stc_9001_isoc_attach' => $mAttch9001Upload,
                'stc_45001_isoc_attach' => $mAttch450001Upload,
                'stc_oca' => $this->input->post('stc_oca'),
                'stc_oca_attach' => $mOcaUpload,
                'stc_iaqap' => $this->input->post('stc_iaqap'),
                'stc_visit_a' => json_encode($this->input->post('stc_visit_a')),
                'stc_visit_b' => $this->input->post('stc_visit_b'),
                'stc_visit_c' => $this->input->post('stc_visit_c'),
                'stc_partner_field_1' => $this->input->post('stc_partner_field_1'),
                'stc_partner_field_2' => $this->input->post('stc_partner_field_2'),
                'stc_confirmation' => $this->input->post('stc_confirmation'),
                'stc_small' => $mIsSmall,
                'stc_date_added' => date("Y-m-d H:i:s"),
                'stc_date_updated' => date("Y-m-d H:i:s"),
            );

            $mActionAdd = $this->cst->addParent($vendorData);
            if ($mActionAdd == true) {

                $userdata = array(
                    'company_name' => $this->input->post('stc_company'),
                    'updated_at' => date("Y-m-d H:i:s"),
                );
                $this->register->updateParentByKey($mSessionKey, $userdata);

                //To Vendor
                $mMessage = "Stage-2 form submitted successfully.";
                $this->sendEmailToVendor("Stage-2 Registration", $mMessage, $mSessionEmail);
                //To Buyer
                $mMessage = "Stage-2 form submitted by vendor : " . $mSessionName . " successfully.";
                $this->sendEmailToBuyer("Stage-2 Registration", $mMessage, $mSessionZone);
                $this->session->set_flashdata('success', 'Vendor stage two submitted successfully.');
                $data['url'] = "vendor/home/getStageTwoData";
                $data['form'] = "Stage Two";
                $data['message'] = "Thank you for submitting the Stage 2 form. Your form is currently under review";
                $this->load->view('message', $data);
            } else {
                redirect('vendor/home/getStageTwoData');
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function updateStageTwoContractor() {
        $mSessionKey = $this->session->userdata('session_vendor_id');
        $mSessionZone = $this->session->userdata('session_vendor_zone');
        $mSessionEmail = $this->session->userdata('session_vendor_email');
        if ($mSessionKey) {
            $mRecord = $this->cst->getParentByVendorKey($mSessionKey);

            $mGst = $this->input->post('stc_gst_file');
            $mGstUpload = $this->single_File_Upload('stc_gst_file', $mGst);

            $mPf = $this->input->post('stc_pf_file');
            $mPfUpload = $this->single_File_Upload('stc_pf_file', $mPf);

            $mPan = $this->input->post('stc_pan_file');
            $mPanUpload = $this->single_File_Upload('stc_pan_file', $mPan);

            $mWpcAttachment = $this->input->post('stc_wpc_attachment');
            $mWpcAttachmentUpload = $this->single_File_Upload('stc_wpc_attachment', $mWpcAttachment);

            $mAttchDcw = $this->input->post('stc_dcw_attachment');
            $mAttchDcwUpload = $this->single_File_Upload('stc_dcw_attachment', $mAttchDcw);

            $mAttchCc = $this->input->post('stc_cc_attachment');
            $mAttchCcUpload = $this->single_File_Upload('stc_cc_attachment', $mAttchCc);

            $mAttchTwo = $this->input->post('stc_attachment_two');
            $mAttchUploadTwo = $this->single_File_Upload('stc_attachment_two', $mAttchTwo);

            $mAttch9001 = $this->input->post('stc_9001_isoc_attach');
            $mAttch9001Upload = $this->single_File_Upload('stc_9001_isoc_attach', $mAttch9001);

            $mAttch450001 = $this->input->post('stc_45001_isoc_attach');
            $mAttch450001Upload = $this->single_File_Upload('stc_45001_isoc_attach', $mAttch450001);

            $mPtrc = $this->input->post('stc_ptrc_attach');
            $mPtrcUpload = $this->single_File_Upload('stc_ptrc_attach', $mPtrc);

            $mLwf = $this->input->post('stc_lwf_attach');
            $mLwfUpload = $this->single_File_Upload('stc_lwf_attach', $mLwf);

            $mEsic = $this->input->post('stc_esic_attach');
            $mEsicUpload = $this->single_File_Upload('stc_esic_attach', $mEsic);

            $mEpf = $this->input->post('stc_epf_attach');
            $mEpfUpload = $this->single_File_Upload('stc_epf_attach', $mEpf);

            $mSecn = $this->input->post('stc_secn_attach');
            $mSecnUpload = $this->single_File_Upload('stc_secn_attach', $mSecn);

            $mLin = $this->input->post('stc_lin_attach');
            $mLinUpload = $this->single_File_Upload('stc_lin_attach', $mLin);

            $mQap = $this->input->post('stc_qap_attach');
            $mQapUpload = $this->single_File_Upload('stc_qap_attach', $mQap);

            $mOca = $this->input->post('stc_oca_attach');
            $mOcaUpload = $this->single_File_Upload('stc_oca_attach', $mOca);

            $mWpcAttach = $this->input->post('stc_wpc_details');
            $mNewWpc = array();
            $mOldWpc = json_decode($mRecord['stc_wpc_details'], true);
            foreach ($mWpcAttach as $key => $value) {
                //Get the temp file path
                $tmpFilePath = $_FILES['stc_wpc_details']['tmp_name'][$key][0];

                //Make sure we have a file path
                if ($tmpFilePath != "") {
                    //Setup our new file path
                    $newFilePath = "./uploads/" . $_FILES['stc_wpc_details']['name'][$key][0];

                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                        //Handle other code here
                        if ($_FILES['stc_wpc_details']['name'][$key][0]) {
                            array_push($value, $_FILES['stc_wpc_details']['name'][$key][0]);
                            $mNewWpc[$key] = $value;
                        } else {
                            $mNewWpc[$key] = $value;
                        }
                    }
                } else {
                    $mOldWpc[$key][0] = $value[0];
                    $mOldWpc[$key][1] = $value[1];
                    $mOldWpc[$key][2] = $value[2];
                    $mOldWpc[$key][3] = $value[3];
                    $mOldWpc[$key][4] = $value[4];
                    $mOldWpc[$key][5] = $value[5];
                    $mOldWpc[$key][6] = $value[6];
                    $mNewWpc[$key] = $mOldWpc[$key];
                }
            }




            $mCcAttach = $this->input->post('stc_cc_details');
            $mNewCc = array();
            $mOldCc = json_decode($mRecord['stc_cc_details'], true);
            foreach ($mCcAttach as $key => $value) {
                //Get the temp file path
                $tmpFilePath = $_FILES['stc_cc_details']['tmp_name'][$key][0];

                //Make sure we have a file path
                if ($tmpFilePath != "") {
                    //Setup our new file path
                    $newFilePath = "./uploads/" . $_FILES['stc_cc_details']['name'][$key][0];

                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                        //Handle other code here
                        if ($_FILES['stc_cc_details']['name'][$key][0]) {
                            array_push($value, $_FILES['stc_cc_details']['name'][$key][0]);
                            $mNewCc[$key] = $value;
                        } else {
                            $mNewCc[$key] = $value;
                        }
                    }
                } else {
                    $mOldCc[$key][0] = $value[0];
                    $mOldCc[$key][1] = $value[1];
                    $mOldCc[$key][2] = $value[2];
                    $mOldCc[$key][3] = $value[3];
                    $mOldCc[$key][4] = $value[4];
                    $mOldCc[$key][5] = $value[5];
                    $mOldCc[$key][6] = $value[6];
                    $mOldCc[$key][7] = $value[7];
                    $mOldCc[$key][8] = $value[8];
                    $mNewCc[$key] = $mOldCc[$key];
                }
            }

            $mDcwAttach = $this->input->post('stc_dcw_details');
            $mNewDcw = array();
            $mOldDcw = json_decode($mRecord['stc_dcw_details'], true);
            foreach ($mDcwAttach as $key => $value) {
                //Get the temp file path
                $tmpFilePath = $_FILES['stc_dcw_details']['tmp_name'][$key][0];

                //Make sure we have a file path
                if ($tmpFilePath != "") {
                    //Setup our new file path
                    $newFilePath = "./uploads/" . $_FILES['stc_dcw_details']['name'][$key][0];

                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                        //Handle other code here
                        if ($_FILES['stc_dcw_details']['name'][$key][0]) {
                            array_push($value, $_FILES['stc_dcw_details']['name'][$key][0]);
                            $mNewDcw[$key] = $value;
                        } else {
                            $mNewDcw[$key] = $value;
                        }
                    }
                } else {
                    $mOldDcw[$key][0] = $value[0];
                    $mOldDcw[$key][1] = $value[1];
                    $mOldDcw[$key][2] = $value[2];
                    $mOldDcw[$key][3] = $value[3];
                    $mOldDcw[$key][4] = $value[4];
                    $mOldDcw[$key][5] = $value[5];
                    $mOldDcw[$key][6] = $value[6];
                    $mOldDcw[$key][7] = $value[7];
                    $mOldDcw[$key][8] = $value[8];
                    $mNewDcw[$key] = $mOldDcw[$key];
                }
            }

            $mFinUploads = array();
            $mOldFin = json_decode($mRecord['stc_fin_uploads'], true);
            for ($i = 0; $i < count($_FILES['stc_fin_uploads']['name']); $i++) {
                $tmpFilePath = $_FILES['stc_fin_uploads']['tmp_name'][$i];

                //Make sure we have a file path
                if ($tmpFilePath != "") {
                    //Setup our new file path
                    $newFilePath = "./uploads/" . $_FILES['stc_fin_uploads']['name'][$i];

                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                        //Handle other code here
                        array_push($value, $_FILES['stc_fin_uploads']['name'][$i]);
                        $mFinUploads[$i] = $_FILES['stc_fin_uploads']['name'][$i];
                    }
                } else {
                    $mFinUploads[$i] = $mOldFin[$i];
                }
            }

            if ($mPtrcUpload) {
                $mPtrcUpload = $mPtrcUpload;
            } else {
                $mPtrcUpload = $mRecord['stc_ptrc_attach'];
            }

            if ($mLwfUpload) {
                $mLwfUpload = $mLwfUpload;
            } else {
                $mLwfUpload = $mRecord['stc_lwf_attach'];
            }

            if ($mEsicUpload) {
                $mEsicUpload = $mEsicUpload;
            } else {
                $mEsicUpload = $mRecord['stc_esic_attach'];
            }

            if ($mEpfUpload) {
                $mEpfUpload = $mEpfUpload;
            } else {
                $mEpfUpload = $mRecord['stc_epf_attach'];
            }

            if ($mSecnUpload) {
                $mSecnUpload = $mSecnUpload;
            } else {
                $mSecnUpload = $mRecord['stc_secn_attach'];
            }

            if ($mLinUpload) {
                $mLinUpload = $mLinUpload;
            } else {
                $mLinUpload = $mRecord['stc_lin_attach'];
            }

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

            if ($mAttchDcwUpload) {
                $mAttchDcwUpload = $mAttchDcwUpload;
            } else {
                $mAttchDcwUpload = $mRecord['stc_dcw_attachment'];
            }

            if ($mAttchUploadTwo) {
                $mAttchUploadTwo = $mAttchUploadTwo;
            } else {
                $mAttchUploadTwo = $mRecord['stc_attachment_two'];
            }

            if ($mAttch9001Upload) {
                $mAttch9001Upload = $mAttch9001Upload;
            } else {
                $mAttch9001Upload = $mRecord['stc_9001_isoc_attach'];
            }

            if ($mAttch450001Upload) {
                $mAttch450001Upload = $mAttch450001Upload;
            } else {
                $mAttch450001Upload = $mRecord['stc_45001_isoc_attach'];
            }

            if ($mOcaUpload) {
                $mOcaUpload = $mOcaUpload;
            } else {
                $mOcaUpload = $mRecord['stc_oca_attach'];
            }

            if ($mQapUpload) {
                $mQapUpload = $mQapUpload;
            } else {
                $mQapUpload = $mRecord['stc_qap_attach'];
            }

            if (empty($mFinUploads)) {
                $mFinUploads = json_decode($mRecord['stc_fin_uploads'], true);
            } else {
                $mFinUploads = $mFinUploads;
            }

            if (empty($mNewWpc)) {
                $mNewWpc = json_decode($mRecord['stc_wpc_details'], true);
            } else {
                $mNewWpc = $mNewWpc;
            }

            if (empty($mNewCc)) {
                $mNewCc = json_decode($mRecord['stc_cc_details'], true);
            } else {
                $mNewCc = $mNewCc;
            }

            if (empty($mNewDcw)) {
                $mNewDcw = json_decode($mRecord['stc_dcw_details'], true);
            } else {
                $mNewDcw = $mNewDcw;
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
                'stc_ptrc' => $this->input->post('stc_ptrc'),
                'stc_ptrc_attach' => $mPtrcUpload,
                'stc_ptrc_to' => $this->input->post('stc_ptrc_to'),
                'stc_ptrc_one' => $this->input->post('stc_ptrc_one'),
                'stc_ptrc_two' => $this->input->post('stc_ptrc_two'),
                'stc_ptrc_three' => $this->input->post('stc_ptrc_three'),
                'stc_ptrc_four' => $this->input->post('stc_ptrc_four'),
                'stc_ptrc_five' => $this->input->post('stc_ptrc_five'),
                'stc_ptrc_six' => $this->input->post('stc_ptrc_six'),
                'stc_ptrc_seven' => $this->input->post('stc_ptrc_seven'),
                'stc_ptrc_date' => $this->input->post('stc_ptrc_date'),
                'stc_lwf' => $this->input->post('stc_lwf'),
                'stc_lwf_attach' => $mLwfUpload,
                'stc_lwf_to' => $this->input->post('stc_lwf_to'),
                'stc_lwf_one' => $this->input->post('stc_lwf_one'),
                'stc_lwf_two' => $this->input->post('stc_lwf_two'),
                'stc_lwf_three' => $this->input->post('stc_lwf_three'),
                'stc_lwf_four' => $this->input->post('stc_lwf_four'),
                'stc_lwf_five' => $this->input->post('stc_lwf_five'),
                'stc_lwf_six' => $this->input->post('stc_lwf_six'),
                'stc_lwf_seven' => $this->input->post('stc_lwf_seven'),
                'stc_lwf_date' => $this->input->post('stc_lwf_date'),
                'stc_esic' => $this->input->post('stc_esic'),
                'stc_esic_attach' => $mEsicUpload,
                'stc_esic_to' => $this->input->post('stc_esic_to'),
                'stc_esic_one' => $this->input->post('stc_esic_one'),
                'stc_esic_two' => $this->input->post('stc_esic_two'),
                'stc_esic_three' => $this->input->post('stc_esic_three'),
                'stc_esic_four' => $this->input->post('stc_esic_four'),
                'stc_esic_five' => $this->input->post('stc_esic_five'),
                'stc_esic_six' => $this->input->post('stc_esic_six'),
                'stc_esic_seven' => $this->input->post('stc_esic_seven'),
                'stc_esic_date' => $this->input->post('stc_esic_date'),
                'stc_epf' => $this->input->post('stc_epf'),
                'stc_epf_attach' => $mEpfUpload,
                'stc_epf_to' => $this->input->post('stc_epf_to'),
                'stc_epf_one' => $this->input->post('stc_epf_one'),
                'stc_epf_two' => $this->input->post('stc_epf_two'),
                'stc_epf_three' => $this->input->post('stc_epf_three'),
                'stc_epf_four' => $this->input->post('stc_epf_four'),
                'stc_epf_five' => $this->input->post('stc_epf_five'),
                'stc_epf_six' => $this->input->post('stc_epf_six'),
                'stc_epf_seven' => $this->input->post('stc_epf_seven'),
                'stc_epf_date' => $this->input->post('stc_epf_date'),
                'stc_secn' => $this->input->post('stc_secn'),
                'stc_secn_attach' => $mSecnUpload,
                'stc_lin' => $this->input->post('stc_lin'),
                'stc_lin_attach' => $mLinUpload,
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
                'stc_wpc' => $this->input->post('stc_wpc'),
                'stc_wpc_details' => json_encode($mNewWpc),
                'stc_wpc_attachment' => $mWpcAttachmentUpload,
                'stc_cc' => $this->input->post('stc_cc'),
                'stc_cc_details' => json_encode($mNewCc),
                'stc_cc_attachment' => $mAttchCcUpload,
                'stc_dcw' => $this->input->post('stc_dcw'),
                'stc_dcw_details' => json_encode($mNewDcw),
                'stc_dcw_attachment' => $mAttchDcwUpload,
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
                'stc_fin_uploads' => json_encode($mFinUploads),
                'stc_qac' => json_encode($this->input->post('stc_qac')),
                'stc_qap' => $this->input->post('stc_qap'),
                'stc_qap_attach' => $mQapUpload,
                'stc_9001_isoc' => $this->input->post('stc_9001_isoc'),
                'stc_45001_isoc' => $this->input->post('stc_45001_isoc'),
                'stc_9001_isoc_attach' => $mAttch9001Upload,
                'stc_45001_isoc_attach' => $mAttch450001Upload,
                'stc_oca' => $this->input->post('stc_oca'),
                'stc_oca_attach' => $mOcaUpload,
                'stc_iaqap' => $this->input->post('stc_iaqap'),
                'stc_visit_a' => json_encode($this->input->post('stc_visit_a')),
                'stc_visit_b' => $this->input->post('stc_visit_b'),
                'stc_visit_c' => $this->input->post('stc_visit_c'),
                'stc_partner_field_1' => $this->input->post('stc_partner_field_1'),
                'stc_partner_field_2' => $this->input->post('stc_partner_field_2'),
                'stc_confirmation' => $this->input->post('stc_confirmation'),
                'stc_date_updated' => date("Y-m-d H:i:s"),
            );

            $mActionAdd = $this->cst->updateParentByVendorKey($mSessionKey, $vendorData);
            if ($mActionAdd == true) {
                $userdata = array(
                    'active' => 1,
                    'company_name' => $this->input->post('stc_company'),
                    'updated_at' => date("Y-m-d H:i:s"),
                );
                $this->register->updateParentByKey($mSessionKey, $userdata);
                $this->session->set_userdata('session_vendor_status', 1);

                //To Vendor
                $mMessage = "Stage-2 form updated successfully.";
                $this->sendEmailToVendor("Stage-2 Registration", $mMessage, $mSessionEmail);
                //To Buyer
                $mMessage = "Stage-2 form updated by vendor : " . $mSessionName . " successfully.";
                $this->sendEmailToBuyer("Stage-2 Registration", $mMessage, $mSessionZone);

                $this->session->set_flashdata('success', 'Vendor stage two updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('vendor/home/getStageTwoData');
        } else {
            $this->load->view('index', $data);
        }
    }

    public function postStageTwoConsultant() {
        $mSessionKey = $this->session->userdata('session_vendor_id');
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
                'stcon_user_id' => $mSessionKey,
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
                'stcon_date_added' => date("Y-m-d H:i:s"),
                'stcon_date_updated' => date("Y-m-d H:i:s"),
            );
            $mActionAdd = $this->const->addParent($vendorData);
            if ($mActionAdd == true) {
                $this->session->set_flashdata('success', 'Vendor stage two updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('vendor/home/getStageTwoData');
        } else {
            $this->load->view('index', $data);
        }
    }

    public function getStageOneData() {
        $mSessionKey = $this->session->userdata('session_vendor_id');
        $mSessionType = $this->session->userdata('session_vendor_type');
        $mSessionStatus = $this->session->userdata('session_vendor_status');
        $data['home'] = "stage_one";
        if ($mSessionKey) {
            $data['stageOne'] = $this->vendor_model->getStageOneModel($mSessionKey);
            $data['getVendor'] = $this->register->getVendor();
            $data['getlocation'] = $this->register->getLocation();
            $data['getTows'] = $this->buyer_model->getAllTypeOfWorkByVendorType($mSessionType);
            if ($mSessionStatus == "7") {
                $this->load->view('vendor/stage_one_edit', $data);
            } else {
                $this->load->view('vendor/stage_one_view', $data);
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function saveStageOneData() {
        $mSessionKey = $this->session->userdata('session_vendor_id');
        $data['home'] = "vendor";
        if ($mSessionKey) {
            $company_name = $this->input->post('company_name');
            $user_name = $this->input->post('user_name');
            $email = $this->input->post('email');
            $typeOfWork = $this->input->post('typeOfWork');
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

            $mRecord = $this->vendor_model->getParentByKey($mSessionKey);

            if ($profileUpload) {
                $profileUpload = $profileUpload;
            } else {
                $profileUpload = $mRecord['profile'];
            }

            $userdata = array(
                'company_name' => $company_name,
                'user_name' => $user_name,
                'type_of_work_id' => $typeOfWork,
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
                'active' => 0,
                'updated_at' => date("Y-m-d H:i:s"),
            );

            $mUpdate = $this->register->updateParentByKey($mSessionKey, $userdata);
            if ($mUpdate == true) {
                $this->session->set_userdata('session_vendor_status', 0);
                $this->session->set_flashdata('success', 'Vendor updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('vendor/home/getStageOneData');
        } else {
            $this->load->view('index', $data);
        }
    }

    public function single_File_Upload($mId, $mFile) {
        $config['upload_path'] = './uploads/';
        $config['file_name'] = $mFile;
        $config['allowed_types'] = 'jpg|jpeg|gif|png|zip|xlsx|cad|pdf|doc|docx|ppt|pptx|pps|ppsx|odt|xls|xlsx|mp3|m4a|ogg|wav|mp4|m4v|mov|wmv|mpeg|MPG';
        $config['overwrite'] = true;
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
        //print_r($data);
        return $filename;
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
        $mUserData = $this->buyer_model->getParentByZone($mTo);
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

    public function logout() {
        $this->session->sess_destroy();
        header('location: ' . LOGOUT_REDIRECTION);
    }

}
