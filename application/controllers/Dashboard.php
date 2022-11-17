<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index() {
        // $this->load->view('dashboard');
        $data['page'] = "index";
        $this->load->view('commans/header', $data);
        $this->load->view('commans/sidebar_b');
        $this->load->view('buyer/dashboard');
        $this->load->view('commans/footer');
    }

}
