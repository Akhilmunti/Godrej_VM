<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('upload');
        date_default_timezone_set("Asia/Kolkata");
        $this->load->model('buyer_model', 'buyer');
        $this->load->model('projects_model', 'projects');
        $this->load->helper('date');
        error_reporting(0);
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
    }

    public function index() {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "users";
            $data['records'] = $this->buyer->getAllParent();
            $this->load->view('buyer/users', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function projects() {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "projects_link";
            $data['records'] = $this->projects->getAllLinkedParent();
            $this->load->view('buyer/project_link', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function addProject() {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "projects_link";
            $data['records'] = $this->projects->getAllLinkedParent();
            $this->load->view('buyer/project_add', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function editProject($mProjectId) {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "projects_link";
            if ($mProjectId) {
                $data['record'] = $this->projects->getParentByKey($mProjectId);
                $data['pm'] = $this->buyer->getAllParentByZoneAndRole($data['record']['project_zone'], "Project Manager");
                $data['pcm'] = $this->buyer->getAllPcmAndRot($data['record']['project_zone'], "PCM", "Regional C&P Team");
                $data['pd'] = $this->buyer->getAllParentByZoneAndRole($data['record']['project_zone'], "Project Director");
                $this->load->view('buyer/project_edit', $data);
            } else {
                redirect('buyer/users/projects');
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function updateProjectById($mProjectId) {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "projects_link";
            if ($mProjectId) {
                $data['record'] = $this->projects->getParentByKey($mProjectId);
                $mData = array(
                    'project_name' => $this->input->post('project'),
                    'project_purchase' => $this->input->post('purchase'),
                    'project_pm' => json_encode($this->input->post('pm')),
                    'project_pcm' => json_encode($this->input->post('pcm')),
                    'project_pd' => json_encode($this->input->post('pd')),
                    'project_date_updated' => date("Y-m-d H:i:s"),
                );
                $mActionAdd = $this->projects->updateParentByKey($mProjectId, $mData);
                if ($mActionAdd == true) {
                    $this->session->set_flashdata('success', $this->input->post('project') . ' updated successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                }
                redirect('buyer/users/projects');
            } else {
                redirect('buyer/users/projects');
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function link($mZone) {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "projects_link";
            $data['zone'] = $mZone;
            $data['projects'] = $this->projects->getAllParent();
            $this->load->view('buyer/link', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function getProjectsByZone() {
        $zone = $this->input->post('zone');
        if ($zone) {
            $projects = $this->projects->getAllParentByZone($zone);
            $result = '<option disabled="" selected="" value="" disabled="">Select Project</option>';
            foreach ($projects as $key => $project) {
                $result = $result . "<option value='" . $project['project_id'] . "'>" . $project['project_name'] . "</option>" . PHP_EOL;
            }
            echo $result;
        } else {
            echo "<option>No data</option>";
        }
    }

    public function updateProject() {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $mData = array(
                'project_pm' => $this->input->post('pm'),
                'project_date_updated' => date("Y-m-d H:i:s"),
            );
            $mActionAdd = $this->projects->updateParentByKey($this->input->post('project'), $mData);
            if ($mActionAdd == true) {
                $this->session->set_flashdata('success', 'Project updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('buyer/users/projects');
        } else {
            $this->load->view('index', $data);
        }
    }

    public function getUsersByZone() {
        $zone = $this->input->post('zone');
        if ($zone) {
            $projects = $this->buyer->getAllParentByZone($zone);
            $result = '<option disabled="" selected="" value="" disabled="">Select PM</option>';
            foreach ($projects as $key => $project) {
                $result = $result . "<option value='" . $project['buyer_id'] . "'>" . $project['buyer_name'] . "</option>" . PHP_EOL;
            }
            echo $result;
        } else {
            echo "<option>No data</option>";
        }
    }

    public function actionDelete($mId) {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "users";
            if ($mId) {
                $mRecord = $this->buyer->getParentByKey($mId);
                $result = $this->buyer->deleteParentByKey($mId, $data);
                if ($result == true) {
                    $this->session->set_flashdata('notification', 'Buyer deleted successfully.');
                    redirect('buyer/users');
                } else {
                    $this->session->set_flashdata('notification', 'Failed. Something went wrong.');
                    redirect('buyer/users');
                }
            } else {
                redirect('buyer/users');
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionAdd() {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "users";
            $this->load->view('buyer/user_add', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionSave($mId = null) {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "users";
            $mUser = $this->input->post('user');
            $mEmail = $this->input->post('email');
            $mPhone = $this->input->post('phone');
            $mZone = $this->input->post('zone');
            $mIsPm = $this->input->post('is_pm');
            $mDesignation = $this->input->post('designation');
            $mRole = $this->input->post('role');
            $mDepartment = $this->input->post('department');
            $mPassword = $this->input->post('password');
            if ($mPassword == $this->input->post('cpassword')) {
                $mSecretPassword = base64_encode(utf8_encode($mPassword));
                $userExists = $this->buyer->check($mEmail);

                if ($mIsPm) {
                    $mIsPm = $mIsPm;
                } else {
                    $mIsPm = 0;
                }

                if ($mId) {
                    $userdata = array(
                        'buyer_name' => $mUser,
                        'buyer_email' => $mEmail,
                        'buyer_mobile' => $mPhone,
                        'buyer_zone' => $mZone,
                        'buyer_is_pr' => $mIsPm,
                        'buyer_designation' => $mDesignation,
                        'buyer_role' => $mRole,
                        'buyer_department' => $mDepartment,
                        'buyer_date_updated' => date('Y-m-d H:i:s'),
                    );
                    $mUpdate = $this->buyer->updateParentByKey($mId, $userdata);
                    if ($mUpdate) {
                        $this->session->set_flashdata('success', 'Buyer updated successfully.');
                        redirect('buyer/users/actionEdit/' . $mId);
                    } else {
                        $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                        redirect('buyer/users/actionEdit/' . $mId);
                    }
                } else {
                    if (!$userExists) {
                        $mSecretPassword = base64_encode(utf8_encode("123456"));
                        $userdata = array(
                            'buyer_name' => $mUser,
                            'buyer_email' => $mEmail,
                            'buyer_mobile' => $mPhone,
                            'buyer_zone' => $mZone,
                            'buyer_is_pr' => $mIsPm,
                            'buyer_designation' => $mDesignation,
                            'buyer_role' => $mRole,
                            'buyer_department' => $mDepartment,
                            'buyer_password' => $mSecretPassword,
                            'buyer_date_added' => date('Y-m-d H:i:s'),
                            'buyer_date_updated' => date('Y-m-d H:i:s'),
                        );
                        $mInsert = $this->buyer->addParent($userdata);
                        if ($mInsert) {
                            $this->session->set_flashdata('success', 'Buyer added successfully.');
                            redirect('buyer/users');
                        } else {
                            $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                            redirect('buyer/users');
                        }
                    } else {
                        $this->session->set_flashdata('error', 'This email has been already taken.');
                        redirect('buyer/users');
                    }
                }
            } else {
                $this->session->set_flashdata('error', 'The Password and Confirm password doesnt match !!');
                redirect('buyer/users');
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionEdit($mId) {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "users";
            if ($mId) {
                $mRecord = $this->buyer->getParentByKey($mId);
                $data['mRecord'] = $mRecord;
                $this->load->view('buyer/user_edit', $data);
            } else {
                redirect('buyer/users');
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function zonal() {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "zonal_specification";
            $data['records'] = $this->buyer->getAllZonalSpecs();
            $this->load->view('buyer/zonal_specification', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function updateZonal($mZsId) {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "zonal_specification";
            $data['record'] = $this->buyer->getZonalSpecById($mZsId);
            $data['buyers'] = $this->buyer->getAllParentByZoneForZonal($data['record']['zs_zone']);
            $this->load->view('buyer/zonal_specification_update', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function updateZonalSpec($mZsId) {
        $mSessionKey = $this->session->userdata('session_id');
        $mSessionZone = $this->session->userdata('session_zone');
        if ($mSessionKey) {
            $mData = array(
                'zs_linked' => $this->input->post('pm'),
                'zs_date_added' => date("Y-m-d H:i:s"),
            );
            $mActionAdd = $this->buyer->updateZonalParentByKey($mZsId, $mData);
            if ($mActionAdd == true) {
                $this->session->set_flashdata('success', 'Zonal Specification updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            }
            redirect('buyer/users/zonal');
        } else {
            $this->load->view('index', $data);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('buyer');
    }

}
