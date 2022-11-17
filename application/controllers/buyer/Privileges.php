<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Privileges extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('buyer_model', 'buyer');
        date_default_timezone_set("Asia/Kolkata");
        $this->load->helper('date');
        error_reporting(0);
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
    }

    public function index() {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "privileges";
            $data['records'] = $this->buyer->getAllParent();
            $this->load->view('buyer/privileges', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function changeStatus($mId) {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "privileges";
            if ($mId) {
                $mRecord = $this->buyer->getParentByKey($mId);
                if ($mRecord['buyer_status'] == 1) {
                    $mStatus = 0;
                } else {
                    $mStatus = 1;
                }
                $data = array(
                    'buyer_status' => $mStatus,
                    'buyer_date_updated' => date('Y-m-d H:i:s')
                );
                $result = $this->buyer->updateParentByKey($mId, $data);
                if ($result == true) {
                    $this->session->set_flashdata('notification', 'Buyer status changed successfully.');
                    redirect('buyer/privileges');
                } else {
                    $this->session->set_flashdata('notification', 'Failed. Something went wrong.');
                    redirect('buyer/privileges');
                }
            } else {
                redirect('buyer/privileges');
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function changePrStatus($mAction, $mId) {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "privileges";
            if ($mId && $mAction) {
                $mRecord = $this->buyer->getParentByKey($mId);
                if ($mAction == "enable") {
                    $mIsPr = 1;
                } else {
                    $mIsPr = 0;
                }
                $data = array(
                    'buyer_is_pr' => $mIsPr,
                    'buyer_date_updated' => date('Y-m-d H:i:s')
                );
                $result = $this->buyer->updateParentByKey($mId, $data);
                if ($result == true) {
                    $this->session->set_flashdata('notification', 'PR status changed successfully.');
                    redirect('buyer/privileges');
                } else {
                    $this->session->set_flashdata('notification', 'Failed. Something went wrong.');
                    redirect('buyer/privileges');
                }
            } else {
                redirect('buyer/privileges');
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('buyer');
    }

}
