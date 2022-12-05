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
                $data['home'] = "add";
                redirect('buyer/vendor/process', $data);
            } else if ($mSessionPm == 1) {
                $data['home'] = "site_reports";
                redirect('buyer/vendor/getSiteReports', $data);
            } else {
                $data['home'] = "add";
                redirect('buyer/vendor/process', $data);
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function logs() {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "logs";
            $this->load->view('buyer/logs', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        //header('location: ' . LOGOUT_REDIRECTION);
        redirect('home');
    }

}
