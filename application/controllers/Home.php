<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->model('Register');
        $this->load->model('buyer_model', 'buyer');
        $this->load->model('projects_model', 'project');
        $this->load->model('feedback_model', 'feedback');
        $this->load->model('feedbackform_model', 'feedbackforms');
        $this->load->model('pqv_model', 'pqv');
        $this->load->model('pqc_model', 'pqc');
        $this->load->model('vendor_stage_two_model', 'vst');
        $this->load->model('contractor_stage_two_model', 'cst');
        $this->load->model('consultant_stage_two_model', 'const');
        $this->load->model('pre_model');
        $this->load->library('upload');
        $this->load->library('email');
        $this->load->helper('form');
        error_reporting(0);
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
    }

    public function index() {
        $this->load->view('index');
    }

    public function getAllPms() {
        $id = $this->input->post('id');
        if ($id) {
            $getTypeOfWork = $this->buyer->getAllParentByZoneAndRole($id, "Project Manager");
            $result = '<option disabled="" selected="" value="" disabled="">Select PM</option>';
            foreach ($getTypeOfWork as $key => $getType) {
                $result = $result . "<option value='" . $getType['buyer_id'] . "'>" . $getType['buyer_name'] . "</option>" . PHP_EOL;
            }
            //$result = $result . '<option value="0">Not Applicable</option>';
            echo $result;
        } else {
            echo "<option>No data</option>";
        }
    }

    public function getAllPcms() {
        $id = $this->input->post('id');
        if ($id) {
            $getTypeOfWork = $this->buyer->getAllParentByZoneAndRole($id, "PCM");
            $result = '<option disabled="" selected="" value="" disabled="">Select PCM</option>';
            foreach ($getTypeOfWork as $key => $getType) {
                $result = $result . "<option value='" . $getType['buyer_id'] . "'>" . $getType['buyer_name'] . "</option>" . PHP_EOL;
            }
            echo $result;
        } else {
            echo "<option>No data</option>";
        }
    }

    public function getAllPcmsAndRots() {
        $id = $this->input->post('id');
        if ($id) {
            $getTypeOfWork1 = $this->buyer->getAllParentByZoneAndRole($id, "Regional C&P Team");
            $getTypeOfWork2 = $this->buyer->getAllParentByZoneAndRole($id, "PCM");
            $result = '<option disabled="" selected="" value="" disabled="">Select PCM/Regional C&P Team</option>';
            foreach ($getTypeOfWork1 as $key => $getType) {
                $result = $result . "<option value='" . $getType['buyer_id'] . "'>" . $getType['buyer_role'] . " : " . $getType['buyer_name'] . "</option>" . PHP_EOL;
            }
            foreach ($getTypeOfWork2 as $key => $getType) {
                $result = $result . "<option value='" . $getType['buyer_id'] . "'>" . $getType['buyer_role'] . " : " . $getType['buyer_name'] . "</option>" . PHP_EOL;
            }
            //$result = $result . '<option value="0">Not Applicable</option>';
            echo $result;
        } else {
            echo "<option>No data</option>";
        }
    }

    public function getAllPds() {
        $id = $this->input->post('id');
        if ($id) {
            $getTypeOfWork = $this->buyer->getAllParentByZoneAndRole($id, "Project Director");
            $result = '<option disabled="" selected="" value="" disabled="">Select PD</option>';
            foreach ($getTypeOfWork as $key => $getType) {
                $result = $result . "<option value='" . $getType['buyer_id'] . "'>" . $getType['buyer_name'] . "</option>" . PHP_EOL;
            }
            //$result = $result . '<option value="0">Not Applicable</option>';
            echo $result;
        } else {
            echo "<option>No data</option>";
        }
    }

    public function getTypeOfWorksByBusinessId() {
        $id = $this->input->post('id');
        if ($id) {
            $getTypeOfWork = $this->Register->get_type_of_work($id);
            $result = '<option disabled="" selected="" value="" disabled="">Select Package name</option>';
            foreach ($getTypeOfWork as $key => $getType) {
                $result = $result . "<option value='" . $getType->id . "'>" . $getType->name . "</option>" . PHP_EOL;
            }
            echo $result;
        } else {
            echo "<option>No data</option>";
        }
    }

    public function getInterestedTows() {
        $id = $this->input->post('id');
        $selected = $this->input->post('selectedId');
        if ($id && $selected) {
            $getTypeOfWork = $this->Register->get_type_of_work($id);
            $result = "<b><label>Type of Work for which Pre qualification is sought</label></b>";
            foreach ($getTypeOfWork as $key => $getType) {
                if ($getType->id == $selected) {
                    $result = $result . '<fieldset><input readonly checked type="checkbox" id="checkbox_tow_' . $getType->id . '" name="tow_more[]" value="' . $getType->id . '"><label class="form-check-label" for="checkbox_tow_' . $getType->id . '">' . $getType->name . '</label></fieldset>' . PHP_EOL;
                } else {
                    $result = $result . '<fieldset><input type="checkbox" id="checkbox_tow_' . $getType->id . '" name="tow_more[]" value="' . $getType->id . '"><label class="form-check-label" for="checkbox_tow_' . $getType->id . '">' . $getType->name . '</label></fieldset>' . PHP_EOL;
                }
            }
            echo $result;
        } else {
            echo "";
        }
    }

    public function getTypeOfWorksByBusinessIdDash() {
        $id = $this->input->post('id');
        if ($id) {
            $getTypeOfWork = $this->Register->get_type_of_work($id);
            $result = '<option disabled="" selected="" value="" disabled="">Select Package name</option>';
            $result = $result . "<option value='All'>All</option>" . PHP_EOL;
            foreach ($getTypeOfWork as $key => $getType) {
                $result = $result . "<option value='" . $getType->id . "'>" . $getType->name . "</option>" . PHP_EOL;
            }
            echo $result;
        } else {
            echo "<option>No data</option>";
        }
    }

    public function getTypeOfWorksByBusinessIdProcess() {
        $id = $this->input->post('id');
        if ($id) {
            if ($id == "All") {
                $getTypeOfWork = $this->Register->getAllWorksForProcess();
                $result = '<option disabled="" selected="" value="" disabled="">Select Package name</option>';
                $result = $result . "<option value='All'>All</option>" . PHP_EOL;
                foreach ($getTypeOfWork as $key => $getType) {
                    $result = $result . "<option value='" . $getType['id'] . "'>" . $getType['name'] . "</option>" . PHP_EOL;
                }
            } else {
                $getTypeOfWork = $this->Register->get_type_of_work($id);
                $result = '<option disabled="" selected="" value="" disabled="">Select Package name</option>';
                $result = $result . "<option value='All'>All</option>" . PHP_EOL;
                foreach ($getTypeOfWork as $key => $getType) {
                    $result = $result . "<option value='" . $getType->id . "'>" . $getType->name . "</option>" . PHP_EOL;
                }
            }
            echo $result;
        } else {
            echo "<option>No data</option>";
        }
    }

    public function getProjectsByZone() {
        $id = $this->input->post('id');
        if ($id) {
            $getTypeOfWork = $this->project->getAllParentByZone($id);
            $result = '<option disabled="" selected="" value="" disabled="">Select Project</option>';
            foreach ($getTypeOfWork as $key => $getType) {
                $result = $result . "<option value='" . $getType['project_id'] . "'>" . $getType['project_name'] . "</option>" . PHP_EOL;
            }
            echo $result;
        } else {
            echo "<option>No data</option>";
        }
    }

    public function getLocationId() {
        $id = $this->input->post('id');
        $getInterestedZones = $this->Register->getInterestedZone($id);
    }

    public function register() {
// $this->load->view('register');
        $data['page'] = "register";
        $data['getVendor'] = $this->Register->getVendor();
        $data['getlocation'] = $this->Register->getLocation();
        $this->load->view('login/header', $data);
        $this->load->view('login/register', $data);
        $this->load->view('login/footer', $data);
    }

    public function forgotPassword() {
        $this->load->view('vendor_password_reset');
    }

    public function sendResetLink() {
        $mEmail = $this->input->post('userName');
        if ($mEmail) {
            $mGetVendor = $this->Register->getVendorByEmail($mEmail);
            if (!empty($mGetVendor)) {
                if ($mGetVendor['delisted'] == 0) {
                    if ($mGetVendor['active'] == 0) {
                        $this->session->set_flashdata('error', 'Vendor verification pending.');
                        redirect('home/forgotPassword', $data);
                    } else if ($mGetVendor['active'] == 9 || $mGetVendor['active'] == 10) {
                        $this->session->set_flashdata('error', 'Vendor rejected.');
                        redirect('home/forgotPassword', $data);
                    } else {
                        $VendorName = $mGetVendor['user_name'];
                        $VendorId = $mGetVendor['id'];
                        $mLink = base_url('home/resetPassword/' . $VendorId);
                        $wMessage = "
<html>
<head>
</head>
<body>
<h3>Dear $VendorName,</h3>
<p>Please find the link to reset your password below : </p><br>
<a href=" . $mLink . ">Reset</a><br>
<h4>Regards, <br> Godrej Properties Contracts & Procurement</h4>
</body>
</html>";
                        $this->wSendMail($mGetVendor['email'], "Vendor Reset Password Link", $wMessage);
                        $this->session->set_flashdata('success', 'Reset password link sent successfully, Please check your mailbox.');
                        redirect('home/forgotPassword', $data);
                    }
                } else {
                    $this->session->set_flashdata('error', 'Vendor delisted.');
                    redirect('home/forgotPassword', $data);
                }
            } else {
                $this->session->set_flashdata('error', 'Vendor not found.');
                redirect('home/forgotPassword', $data);
            }
        } else {
            $this->session->set_flashdata('error', 'Please enter the email.');
            redirect('home/forgotPassword', $data);
        }
    }

    public function resetPassword($mVendorId) {
        if ($mVendorId) {
            $mGetVendor = $this->Register->getVendorById($mVendorId);
            if (!empty($mGetVendor)) {
                if ($mGetVendor['delisted'] == 0) {
                    if ($mGetVendor['active'] == 0) {
                        $this->session->set_flashdata('error', 'Vendor verification pending.');
                        redirect('home/forgotPassword', $data);
                    } else if ($mGetVendor['active'] == 9 || $mGetVendor['active'] == 10) {
                        $this->session->set_flashdata('error', 'Vendor rejected.');
                        redirect('home/forgotPassword', $data);
                    } else {
                        $VendorName = $mGetVendor['user_name'];
                        $data['vendor_id'] = $mGetVendor['id'];
                        $this->load->view('vendor_password_change', $data);
                    }
                } else {
                    $this->session->set_flashdata('error', 'Vendor delisted.');
                    redirect('home/forgotPassword', $data);
                }
            } else {
                $this->session->set_flashdata('error', 'Vendor not found.');
                redirect('home/forgotPassword', $data);
            }
        } else {
            $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
            redirect('home/forgotPassword', $data);
        }
    }

    public function actionSetPassword($mVendorId) {
        $data['navbar'] = "login";
        if ($this->input->post()) {
            if ($this->input->post('password') == $this->input->post('cpassword')) {
                $mSecretPassword = base64_encode(utf8_encode($this->input->post('password')));
                $userdata = array(
                    'password' => $mSecretPassword,
                    'updated_at' => date("Y-m-d H:i:s"),
                );
                $result = $this->Register->updateParentByKey($mVendorId, $userdata);
                if ($result == TRUE) {
                    $this->session->set_flashdata('success', 'Password set successfully, Please login to continue');
                    redirect('home', $data);
                } else {
                    $this->session->set_flashdata('error', 'Failed. Something went wrong.');
                    redirect('home/resetPassword/' . $mVendorId, $data);
                }
            } else {
                $this->session->set_flashdata('error', 'Password and Confirm password should be same.');
                redirect('home/resetPassword/' . $mVendorId, $data);
            }
        } else {
            $this->session->set_flashdata('error', 'Something went wrong.');
            redirect('home/resetPassword/' . $mVendorId, $data);
        }
    }

    public function stageOne() {
        $data['page'] = "stageOne";
        $this->load->view('commans/header', $data);
        $this->load->view('commans/sidebar_v');
        $this->load->view('vendor/stage_one');
        $this->load->view('commans/footer');
    }

    public function stageTwo() {
        $data['page'] = "stageTwo";
        $this->load->view('commans/header', $data);
        $this->load->view('commans/sidebar_v');
        $this->load->view('vendor/stage_two');
        $this->load->view('commans/footer');
    }

    public function vendorManagement() {
// $this->load->view('vendor_management');
        $data['page'] = "vendorManagement";
        $data['getVendorManagement'] = $this->Register->getVendorManagement();
        $this->load->view('commans/header', $data);
        $this->load->view('commans/sidebar_b');
        $this->load->view('buyer/vendor_management');
        $this->load->view('commans/footer');
    }

    public function privilegeManagement() {
// $this->load->view('privilege_management');
        $data['page'] = "privilegeManagement";
        $this->load->view('commans/header', $data);
        $this->load->view('commans/sidebar_b');
        $this->load->view('buyer/privilege_management');
        $this->load->view('commans/footer');
    }

    public function pqManagement() {
// $this->load->view('pq_management');
        $data['page'] = "pqManagement";
        $this->load->view('commans/header', $data);
        $this->load->view('commans/sidebar_b');
        $this->load->view('buyer/pq_management');
        $this->load->view('commans/footer');
    }

    public function siteReport() {
// $this->load->view('site_report');
        $data['page'] = "siteReport";
        $this->load->view('commans/header', $data);
        $this->load->view('commans/sidebar_b');
        $this->load->view('buyer/site_report');
        $this->load->view('commans/footer');
    }

    public function registration() {
        $this->load->view('vendor/registration');
    }

    public function consultant() {
// $this->load->view('vendor/consultant');
        $data['page'] = "consultant";
        $this->load->view('commans/header', $data);
        $this->load->view('commans/sidebar_v');
        $this->load->view('vendor/consultant');
        $this->load->view('commans/footer');
    }

    public function contractor() {
// $this->load->view('vendor/contractor');
        $data['page'] = "contractor";
        $this->load->view('commans/header', $data);
        $this->load->view('commans/sidebar_v');
        $this->load->view('vendor/contractor');
        $this->load->view('commans/footer');
    }

    public function projectManagementConsultant() {
// $this->load->view('projectManagementConsultant');
        $data['page'] = "projectManagementConsultant";
        $this->load->view('commans/header', $data);
        $this->load->view('commans/sidebar_v');
        $this->load->view('vendor/projectManagementConsultant');
        $this->load->view('commans/footer');
    }

    public function stageOneview() {
        $data['page'] = "stageOneview";
        $this->load->view('commans/header', $data);
        $this->load->view('commans/sidebar_b');
        $this->load->view('buyer/stageOneview');
        $this->load->view('commans/footer');
    }

    public function stageTwoview() {

        $data['page'] = "stageTwoview";
        $this->load->view('commans/header', $data);
        $this->load->view('commans/sidebar_b');
        $this->load->view('buyer/stageTwoview');
        $this->load->view('commans/footer');
    }

    public function siteVisitReport() {
        $data['page'] = "siteVisitReport";
        $this->load->view('commans/header', $data);
        $this->load->view('commans/sidebar_b');
        $this->load->view('buyer/siteVisitReport');
        $this->load->view('commans/footer');
    }

    public function pqscore() {
        $data['page'] = "pqscore";
        $this->load->view('commans/header', $data);
        $this->load->view('commans/sidebar_b');
        $this->load->view('buyer/pqscore');
        $this->load->view('commans/footer');
    }

    public function checkPan() {
        $mPan = $this->input->post('pan');
        if ($mPan) {
            $mCheckInPre = $this->pre_model->check($mPan);
            if (!empty($mCheckInPre)) {
                echo "1";
            } else {
                echo "0";
            }
        } else {
            echo "0";
        }
    }

    public function insert_register() {
        $nature_of_business = $this->input->post('nature_of_business');
        $type_of_work_id = $this->input->post('type_of_work');
        $company_name = $this->input->post('company_name');
        $user_name = $this->input->post('user_name');
        $email = $this->input->post('email');
        $contact_number = $this->input->post('contact_number');
        $password = $this->input->post('password');
        $comf_password = $this->input->post('comf_password');
        $turn_over_of_last_3years = $this->input->post('turn_over_of_last_3years');
        $location = $this->input->post('location');
        $interested_zones = $this->input->post('interested_zones');
        $city_name = $this->input->post('city_name');
        $clientele = $this->input->post('clientele');
        $address = $this->input->post('address');
        $website = $this->input->post('website');
        $profile = $this->input->post('profile');
        $mTowsMore = $this->input->post('tow_more');

        $profile = $this->input->post('profile');
        $profileUpload = $this->single_File_Upload('profile', $profile);
        $mSecretPassword = base64_encode(utf8_encode($password));
        if ($turn_over_of_last_3years <= 0.5) {
            $mIsSmall = 1;
        } else {
            $mIsSmall = 0;
        }

        $mCheckDuplicatePan = $this->Register->getVendorByPan($this->input->post('pan'));

        if (empty($mCheckDuplicatePan)) {
            $mCheckInPre = $this->pre_model->check($this->input->post('pan'));

            //Get Approver Details
            $mBuyerAppr = $this->buyer->getZonalSpecByZone($location);
            $mApprBuyerName = $mBuyerAppr['buyer_name'];
            $mApprBuyerPhone = $mBuyerAppr['buyer_mobile'];
            $mApprBuyerEmail = $mBuyerAppr['buyer_email'];
            $mGetTowDetails = $this->Register->getWorkById($type_of_work_id);
            $mTowName = $mGetTowDetails['name'];
            $mLink = base_url('buyer/vendor');
            $wMessage = "
<html>
<head>
</head>
<body>
<h3>Dear $mApprBuyerName,</h3>
<p>$user_name, under $mTowName successfully submitted Profile.
Request you to review and accept stage 1 form.</p>
<a href='$mLink'>Link</a>
<h4>Regards, <br> " . EMAIL_FROM_TEXT . "</h4>
</body>
</html>";
            if (empty($mCheckInPre)) {
                $userdata = array(
                    'nature_of_business_id' => $nature_of_business,
                    'type_of_work_id' => $type_of_work_id,
                    'company_name' => $company_name,
                    'user_name' => $user_name,
                    'email' => $email,
                    'contact_number' => $contact_number,
                    'password' => $mSecretPassword,
                    'turn_over_of_last_3years' => $turn_over_of_last_3years,
                    'location' => $location,
                    'interested_zones' => json_encode($interested_zones),
                    'city_name' => $city_name,
                    'clientele' => $clientele,
                    'address' => $address,
                    'website' => $website,
                    'profile' => $profileUpload,
                    'pan' => $this->input->post('pan'),
                    'is_small' => $mIsSmall,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                );
                $table = 'registration';
                $query = $this->Register->insert($table, $userdata);
                if ($query) {
                    $this->session->set_flashdata('success', 'Vendor registered successfully.');
                    $data['url'] = "home";
                    $data['form'] = "Stage One";
                    $data['message'] = "Thank you for submitting the Stage 1 form. Your form is currently under review";
                    $mSendMail = $this->wSendMail($mApprBuyerEmail, "Vendor Registration : Stage 1", $wMessage);
                    $this->load->view('message', $data);
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('home');
                }
            } else {
                $userdata = array(
                    'nature_of_business_id' => $nature_of_business,
                    'type_of_work_id' => $type_of_work_id,
                    'company_name' => $company_name,
                    'user_name' => $user_name,
                    'email' => $email,
                    'contact_number' => $contact_number,
                    'password' => $mSecretPassword,
                    'turn_over_of_last_3years' => $turn_over_of_last_3years,
                    'location' => $location,
                    'interested_zones' => json_encode($interested_zones),
                    'city_name' => $city_name,
                    'clientele' => $clientele,
                    'address' => $address,
                    'website' => $website,
                    'profile' => $profileUpload,
                    'pan' => $this->input->post('pan'),
                    'is_small' => $mIsSmall,
                    'active' => 2,
                    'pre_type' => 1,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                );
                $table = 'registration';
                $query = $this->Register->insert($table, $userdata);
                //Add Stage Two data
                if ($nature_of_business == "3") {
                    $vendorData = array(
                        'stc_user_id' => $query,
                        'stc_company' => $company_name,
                        'stc_pan' => $this->input->post('pan'),
                        'stc_address' => $address,
                        'stc_tel' => $contact_number,
                        'stc_website' => $website,
                        'stc_tow' => json_encode($mTowsMore),
                        'stc_small' => $mIsSmall,
                        'stc_date_added' => date("Y-m-d H:i:s"),
                        'stc_date_updated' => date("Y-m-d H:i:s"),
                    );

                    $mActionAdd = $this->cst->addParent($vendorData);
                } else {
                    $vendorData = array(
                        'stv_user_id' => $query,
                        'stv_company' => $company_name,
                        'stv_pan' => $this->input->post('pan'),
                        'stv_tow' => json_encode($mTowsMore),
                        'stv_date_added' => date("Y-m-d H:i:s"),
                        'stv_date_updated' => date("Y-m-d H:i:s"),
                    );
                    $mActionAdd = $this->vst->addParent($vendorData);
                }
                if ($query) {
                    //To Vendor
                    if ($mCheckInPre->pre_pq_score && $mCheckInPre->pre_fb_score) {
                        if (!empty($mTowsMore)) {
                            foreach ($mTowsMore as $key => $mTow) {
                                if ($nature_of_business == "3") {
                                    $data = array(
                                        'pqc_vendor_id' => $query,
                                        'pqc_buyer_id' => 3,
                                        'pqc_tow_id' => $mTow,
                                        'pqc_first_score' => 0,
                                        'pqc_first_score_sg' => 0,
                                        'pqc_first_remarks' => "Null",
                                        'pqc_second_score' => 0,
                                        'pqc_second_score_sg' => 0,
                                        'pqc_second_remarks' => "Null",
                                        'pqc_third_score' => 0,
                                        'pqc_third_score_sg' => 0,
                                        'pqc_third_remarks' => "Null",
                                        'pqc_fourth_score' => 0,
                                        'pqc_fourth_score_sg' => 0,
                                        'pqc_fourth_remarks' => "Null",
                                        'pqc_fifth_score' => 0,
                                        'pqc_fifth_score_sg' => 0,
                                        'pqc_fifth_remarks' => "Null",
                                        'pqc_sixth_score' => 0,
                                        'pqc_sixth_score_sg' => 0,
                                        'pqc_sixth_remarks' => "Null",
                                        'pqc_seventh_score_sg' => 0,
                                        'pqc_eighth_score_sg' => 0,
                                        'pqc_total' => $mCheckInPre->pre_pq_score,
                                        'pqc_fin_limit' => "Null",
                                        'pqc_date_added' => date('Y-m-d H:i:s'),
                                        'pqc_date_updated' => date('Y-m-d H:i:s'),
                                    );
                                    $this->pqc->addParent($data);
                                } else {
                                    $data = array(
                                        'pqv_vendor_id' => $query,
                                        'pqv_buyer_id' => 3,
                                        'pqv_tow_id' => $mTow,
                                        'pqv_first_score' => 0,
                                        'pqv_first_score_sg' => 0,
                                        'pqv_second_score' => 0,
                                        'pqv_second_score_sg' => 0,
                                        'pqv_third_score' => 0,
                                        'pqv_third_score_sg' => 0,
                                        'pqv_first_score_remarks' => "Null",
                                        'pqv_second_score_remarks' => "Null",
                                        'pqv_third_score_remarks' => "Null",
                                        'pqv_fourth_score' => 0,
                                        'pqv_fifth_score' => 0,
                                        'pqv_total' => $mCheckInPre->pre_pq_score,
                                        'pqv_fin_limit' => "Null",
                                        'pqv_date_added' => date('Y-m-d H:i:s'),
                                        'pqv_date_updated' => date('Y-m-d H:i:s'),
                                    );
                                    $this->pqv->addParent($data);
                                }
                                $dateadded = new DateTime($mCheckInPre->pre_fb_scrore_date);
                                $mData = array(
                                    'feedback_buyer_id' => $query,
                                    'feedback_user_type' => $nature_of_business,
                                    'feedback_startdate' => date('Y-m-d H:i:s'),
                                    'feedback_enddate' => date('Y-m-d H:i:s'),
                                    'feedback_purchase' => "Null",
                                    'feedback_purchase_group' => "Null",
                                    'feedback_wo' => "Null",
                                    'feedback_upload' => "Null",
                                    'feedback_company_code' => "Null",
                                    'feedback_wo_details' => "Null",
                                    'feedback_zone' => $location,
                                    'feedback_vendor_code' => "Null",
                                    'feedback_vendor_details' => "Null",
                                    'feedback_pan' => $mCheckInPre->pre_pan,
                                    'feedback_lfs' => "Null",
                                    'feedback_lfd' => "Null",
                                    'feedback_date_added' => date("Y-m-d H:i:s"),
                                    'feedback_date_updated' => date("Y-m-d H:i:s"),
                                );
                                $mFeedback = $this->feedback->addParent($mData);
                                $mData = array(
                                    'feedback_id' => $mFeedback,
                                    'pm_id' => 3,
                                    'ff_type' => $nature_of_business,
                                    'ff_vendor' => $company_name,
                                    'ff_date' => date("Y-m-d H:i:s"),
                                    'ff_project' => "Null",
                                    'ff_category' => $mTow,
                                    'ff_time_period' => "Null",
                                    'ff_one' => 0,
                                    'ff_one_marks' => "Null",
                                    'ff_one_remarks' => "Null",
                                    'ff_two' => 0,
                                    'ff_two_marks' => 0,
                                    'ff_two_remarks' => "Null",
                                    'ff_three' => 0,
                                    'ff_three_marks' => 0,
                                    'ff_three_remarks' => "Null",
                                    'ff_four' => 0,
                                    'ff_four_marks' => 0,
                                    'ff_four_remarks' => "Null",
                                    'ff_five' => 0,
                                    'ff_five_marks' => 0,
                                    'ff_five_remarks' => "Null",
                                    'ff_six' => 0,
                                    'ff_six_marks' => 0,
                                    'ff_six_remarks' => "Null",
                                    'ff_seven' => 0,
                                    'ff_seven_marks' => 0,
                                    'ff_seven_remarks' => "Null",
                                    'ff_eight' => 0,
                                    'ff_eight_marks' => 0,
                                    'ff_eight_remarks' => "Null",
                                    'ff_remarks' => "Null",
                                    'ff_final_score' => $mCheckInPre->pre_fb_score,
                                    'ff_date_added' => date('Y-m-d H:i:s'),
                                    'ff_date_updated' => date("Y-m-d H:i:s"),
                                );
                                $mActionAdd = $this->feedbackforms->addParent($mData);
                            }
                        } else {
                            if ($nature_of_business == "3") {
                                $data = array(
                                    'pqc_vendor_id' => $query,
                                    'pqc_buyer_id' => 3,
                                    'pqc_tow_id' => $type_of_work_id,
                                    'pqc_first_score' => 0,
                                    'pqc_first_score_sg' => 0,
                                    'pqc_first_remarks' => "Null",
                                    'pqc_second_score' => 0,
                                    'pqc_second_score_sg' => 0,
                                    'pqc_second_remarks' => "Null",
                                    'pqc_third_score' => 0,
                                    'pqc_third_score_sg' => 0,
                                    'pqc_third_remarks' => "Null",
                                    'pqc_fourth_score' => 0,
                                    'pqc_fourth_score_sg' => 0,
                                    'pqc_fourth_remarks' => "Null",
                                    'pqc_fifth_score' => 0,
                                    'pqc_fifth_score_sg' => 0,
                                    'pqc_fifth_remarks' => "Null",
                                    'pqc_sixth_score' => 0,
                                    'pqc_sixth_score_sg' => 0,
                                    'pqc_sixth_remarks' => "Null",
                                    'pqc_seventh_score_sg' => 0,
                                    'pqc_eighth_score_sg' => 0,
                                    'pqc_total' => $mCheckInPre->pre_pq_score,
                                    'pqc_fin_limit' => "Null",
                                    'pqc_date_added' => date('Y-m-d H:i:s'),
                                    'pqc_date_updated' => date('Y-m-d H:i:s'),
                                );
                                $this->pqc->addParent($data);
                            } else {
                                $data = array(
                                    'pqv_vendor_id' => $query,
                                    'pqv_buyer_id' => 3,
                                    'pqv_tow_id' => $mTow,
                                    'pqv_first_score' => 0,
                                    'pqv_first_score_sg' => 0,
                                    'pqv_second_score' => 0,
                                    'pqv_second_score_sg' => 0,
                                    'pqv_third_score' => 0,
                                    'pqv_third_score_sg' => 0,
                                    'pqv_first_score_remarks' => "Null",
                                    'pqv_second_score_remarks' => "Null",
                                    'pqv_third_score_remarks' => "Null",
                                    'pqv_fourth_score' => 0,
                                    'pqv_fifth_score' => 0,
                                    'pqv_total' => $mCheckInPre->pre_pq_score,
                                    'pqv_fin_limit' => "Null",
                                    'pqv_date_added' => date('Y-m-d H:i:s'),
                                    'pqv_date_updated' => date('Y-m-d H:i:s'),
                                );
                                $this->pqv->addParent($data);
                            }
                            $dateadded = new DateTime($mCheckInPre->pre_fb_scrore_date);
                            $mData = array(
                                'feedback_buyer_id' => $query,
                                'feedback_user_type' => $nature_of_business,
                                'feedback_startdate' => date('Y-m-d H:i:s'),
                                'feedback_enddate' => date('Y-m-d H:i:s'),
                                'feedback_purchase' => "Null",
                                'feedback_purchase_group' => "Null",
                                'feedback_wo' => "Null",
                                'feedback_upload' => "Null",
                                'feedback_company_code' => "Null",
                                'feedback_wo_details' => "Null",
                                'feedback_zone' => $location,
                                'feedback_vendor_code' => "Null",
                                'feedback_vendor_details' => "Null",
                                'feedback_pan' => $mCheckInPre->pre_pan,
                                'feedback_lfs' => "Null",
                                'feedback_lfd' => "Null",
                                'feedback_date_added' => date("Y-m-d H:i:s"),
                                'feedback_date_updated' => date("Y-m-d H:i:s"),
                            );
                            $mFeedback = $this->feedback->addParent($mData);
                            $mData = array(
                                'feedback_id' => $mFeedback,
                                'pm_id' => 3,
                                'ff_type' => $nature_of_business,
                                'ff_vendor' => $company_name,
                                'ff_date' => date("Y-m-d H:i:s"),
                                'ff_project' => "Null",
                                'ff_category' => $type_of_work_id,
                                'ff_time_period' => "Null",
                                'ff_one' => 0,
                                'ff_one_marks' => "Null",
                                'ff_one_remarks' => "Null",
                                'ff_two' => 0,
                                'ff_two_marks' => 0,
                                'ff_two_remarks' => "Null",
                                'ff_three' => 0,
                                'ff_three_marks' => 0,
                                'ff_three_remarks' => "Null",
                                'ff_four' => 0,
                                'ff_four_marks' => 0,
                                'ff_four_remarks' => "Null",
                                'ff_five' => 0,
                                'ff_five_marks' => 0,
                                'ff_five_remarks' => "Null",
                                'ff_six' => 0,
                                'ff_six_marks' => 0,
                                'ff_six_remarks' => "Null",
                                'ff_seven' => 0,
                                'ff_seven_marks' => 0,
                                'ff_seven_remarks' => "Null",
                                'ff_eight' => 0,
                                'ff_eight_marks' => 0,
                                'ff_eight_remarks' => "Null",
                                'ff_remarks' => "Null",
                                'ff_final_score' => $mCheckInPre->pre_fb_score,
                                'ff_date_added' => date('Y-m-d H:i:s'),
                                'ff_date_updated' => date("Y-m-d H:i:s"),
                            );
                            $mActionAdd = $this->feedbackforms->addParent($mData);
                        }
                    } else if ($mCheckInPre->pre_pq_score) {
                        if (!empty($mTowsMore)) {
                            foreach ($mTowsMore as $key => $mTow) {
                                if ($nature_of_business == "3") {
                                    $data = array(
                                        'pqc_vendor_id' => $query,
                                        'pqc_buyer_id' => 3,
                                        'pqc_tow_id' => $mTow,
                                        'pqc_first_score' => 0,
                                        'pqc_first_score_sg' => 0,
                                        'pqc_first_remarks' => "Null",
                                        'pqc_second_score' => 0,
                                        'pqc_second_score_sg' => 0,
                                        'pqc_second_remarks' => "Null",
                                        'pqc_third_score' => 0,
                                        'pqc_third_score_sg' => 0,
                                        'pqc_third_remarks' => "Null",
                                        'pqc_fourth_score' => 0,
                                        'pqc_fourth_score_sg' => 0,
                                        'pqc_fourth_remarks' => "Null",
                                        'pqc_fifth_score' => 0,
                                        'pqc_fifth_score_sg' => 0,
                                        'pqc_fifth_remarks' => "Null",
                                        'pqc_sixth_score' => 0,
                                        'pqc_sixth_score_sg' => 0,
                                        'pqc_sixth_remarks' => "Null",
                                        'pqc_seventh_score_sg' => 0,
                                        'pqc_eighth_score_sg' => 0,
                                        'pqc_total' => $mCheckInPre->pre_pq_score,
                                        'pqc_fin_limit' => "Null",
                                        'pqc_date_added' => date('Y-m-d H:i:s'),
                                        'pqc_date_updated' => date('Y-m-d H:i:s'),
                                    );
                                    $this->pqc->addParent($data);
                                } else {
                                    $data = array(
                                        'pqv_vendor_id' => $query,
                                        'pqv_buyer_id' => 3,
                                        'pqv_tow_id' => $mTow,
                                        'pqv_first_score' => 0,
                                        'pqv_first_score_sg' => 0,
                                        'pqv_second_score' => 0,
                                        'pqv_second_score_sg' => 0,
                                        'pqv_third_score' => 0,
                                        'pqv_third_score_sg' => 0,
                                        'pqv_first_score_remarks' => "Null",
                                        'pqv_second_score_remarks' => "Null",
                                        'pqv_third_score_remarks' => "Null",
                                        'pqv_fourth_score' => 0,
                                        'pqv_fifth_score' => 0,
                                        'pqv_total' => $mCheckInPre->pre_pq_score,
                                        'pqv_fin_limit' => "Null",
                                        'pqv_date_added' => date('Y-m-d H:i:s'),
                                        'pqv_date_updated' => date('Y-m-d H:i:s'),
                                    );
                                    $this->pqv->addParent($data);
                                }
                            }
                        } else {
                            if ($nature_of_business == "3") {
                                $data = array(
                                    'pqc_vendor_id' => $query,
                                    'pqc_buyer_id' => 3,
                                    'pqc_tow_id' => $type_of_work_id,
                                    'pqc_first_score' => 0,
                                    'pqc_first_score_sg' => 0,
                                    'pqc_first_remarks' => "Null",
                                    'pqc_second_score' => 0,
                                    'pqc_second_score_sg' => 0,
                                    'pqc_second_remarks' => "Null",
                                    'pqc_third_score' => 0,
                                    'pqc_third_score_sg' => 0,
                                    'pqc_third_remarks' => "Null",
                                    'pqc_fourth_score' => 0,
                                    'pqc_fourth_score_sg' => 0,
                                    'pqc_fourth_remarks' => "Null",
                                    'pqc_fifth_score' => 0,
                                    'pqc_fifth_score_sg' => 0,
                                    'pqc_fifth_remarks' => "Null",
                                    'pqc_sixth_score' => 0,
                                    'pqc_sixth_score_sg' => 0,
                                    'pqc_sixth_remarks' => "Null",
                                    'pqc_seventh_score_sg' => 0,
                                    'pqc_eighth_score_sg' => 0,
                                    'pqc_total' => $mCheckInPre->pre_pq_score,
                                    'pqc_fin_limit' => "Null",
                                    'pqc_date_added' => date('Y-m-d H:i:s'),
                                    'pqc_date_updated' => date('Y-m-d H:i:s'),
                                );
                                $this->pqc->addParent($data);
                            } else {
                                $data = array(
                                    'pqv_vendor_id' => $query,
                                    'pqv_buyer_id' => 3,
                                    'pqv_tow_id' => $mTow,
                                    'pqv_first_score' => 0,
                                    'pqv_first_score_sg' => 0,
                                    'pqv_second_score' => 0,
                                    'pqv_second_score_sg' => 0,
                                    'pqv_third_score' => 0,
                                    'pqv_third_score_sg' => 0,
                                    'pqv_first_score_remarks' => "Null",
                                    'pqv_second_score_remarks' => "Null",
                                    'pqv_third_score_remarks' => "Null",
                                    'pqv_fourth_score' => 0,
                                    'pqv_fifth_score' => 0,
                                    'pqv_total' => $mCheckInPre->pre_pq_score,
                                    'pqv_fin_limit' => "Null",
                                    'pqv_date_added' => date('Y-m-d H:i:s'),
                                    'pqv_date_updated' => date('Y-m-d H:i:s'),
                                );
                                $this->pqv->addParent($data);
                            }
                        }
                    } else if ($mCheckInPre->pre_fb_score) {
                        if (!empty($mTowsMore)) {
                            foreach ($mTowsMore as $key => $mTow) {
                                $dateadded = new DateTime($mCheckInPre->pre_fb_scrore_date);
                                $mData = array(
                                    'feedback_buyer_id' => $query,
                                    'feedback_user_type' => $nature_of_business,
                                    'feedback_startdate' => date('Y-m-d H:i:s'),
                                    'feedback_enddate' => date('Y-m-d H:i:s'),
                                    'feedback_purchase' => "Null",
                                    'feedback_purchase_group' => "Null",
                                    'feedback_wo' => "Null",
                                    'feedback_upload' => "Null",
                                    'feedback_company_code' => "Null",
                                    'feedback_wo_details' => "Null",
                                    'feedback_zone' => $location,
                                    'feedback_vendor_code' => "Null",
                                    'feedback_vendor_details' => "Null",
                                    'feedback_pan' => $mCheckInPre->pre_pan,
                                    'feedback_lfs' => "Null",
                                    'feedback_lfd' => "Null",
                                    'feedback_date_added' => date("Y-m-d H:i:s"),
                                    'feedback_date_updated' => date("Y-m-d H:i:s"),
                                );
                                $mFeedback = $this->feedback->addParent($mData);
                                $mData = array(
                                    'feedback_id' => $mFeedback,
                                    'pm_id' => 3,
                                    'ff_type' => $nature_of_business,
                                    'ff_vendor' => $company_name,
                                    'ff_date' => date("Y-m-d H:i:s"),
                                    'ff_project' => "Null",
                                    'ff_category' => $mTow,
                                    'ff_time_period' => "Null",
                                    'ff_one' => 0,
                                    'ff_one_marks' => "Null",
                                    'ff_one_remarks' => "Null",
                                    'ff_two' => 0,
                                    'ff_two_marks' => 0,
                                    'ff_two_remarks' => "Null",
                                    'ff_three' => 0,
                                    'ff_three_marks' => 0,
                                    'ff_three_remarks' => "Null",
                                    'ff_four' => 0,
                                    'ff_four_marks' => 0,
                                    'ff_four_remarks' => "Null",
                                    'ff_five' => 0,
                                    'ff_five_marks' => 0,
                                    'ff_five_remarks' => "Null",
                                    'ff_six' => 0,
                                    'ff_six_marks' => 0,
                                    'ff_six_remarks' => "Null",
                                    'ff_seven' => 0,
                                    'ff_seven_marks' => 0,
                                    'ff_seven_remarks' => "Null",
                                    'ff_eight' => 0,
                                    'ff_eight_marks' => 0,
                                    'ff_eight_remarks' => "Null",
                                    'ff_remarks' => "Null",
                                    'ff_final_score' => $mCheckInPre->pre_fb_score,
                                    'ff_date_added' => date('Y-m-d H:i:s'),
                                    'ff_date_updated' => date("Y-m-d H:i:s"),
                                );
                                $mActionAdd = $this->feedbackforms->addParent($mData);
                            }
                        } else {
                            $dateadded = new DateTime($mCheckInPre->pre_fb_scrore_date);
                            $mData = array(
                                'feedback_buyer_id' => $query,
                                'feedback_user_type' => $nature_of_business,
                                'feedback_startdate' => date('Y-m-d H:i:s'),
                                'feedback_enddate' => date('Y-m-d H:i:s'),
                                'feedback_purchase' => "Null",
                                'feedback_purchase_group' => "Null",
                                'feedback_wo' => "Null",
                                'feedback_upload' => "Null",
                                'feedback_company_code' => "Null",
                                'feedback_wo_details' => "Null",
                                'feedback_zone' => $location,
                                'feedback_vendor_code' => "Null",
                                'feedback_vendor_details' => "Null",
                                'feedback_pan' => $mCheckInPre->pre_pan,
                                'feedback_lfs' => "Null",
                                'feedback_lfd' => "Null",
                                'feedback_date_added' => date("Y-m-d H:i:s"),
                                'feedback_date_updated' => date("Y-m-d H:i:s"),
                            );
                            $mFeedback = $this->feedback->addParent($mData);
                            $mData = array(
                                'feedback_id' => $mFeedback,
                                'pm_id' => 3,
                                'ff_type' => $nature_of_business,
                                'ff_vendor' => $company_name,
                                'ff_date' => date("Y-m-d H:i:s"),
                                'ff_project' => "Null",
                                'ff_category' => $type_of_work_id,
                                'ff_time_period' => "Null",
                                'ff_one' => 0,
                                'ff_one_marks' => "Null",
                                'ff_one_remarks' => "Null",
                                'ff_two' => 0,
                                'ff_two_marks' => 0,
                                'ff_two_remarks' => "Null",
                                'ff_three' => 0,
                                'ff_three_marks' => 0,
                                'ff_three_remarks' => "Null",
                                'ff_four' => 0,
                                'ff_four_marks' => 0,
                                'ff_four_remarks' => "Null",
                                'ff_five' => 0,
                                'ff_five_marks' => 0,
                                'ff_five_remarks' => "Null",
                                'ff_six' => 0,
                                'ff_six_marks' => 0,
                                'ff_six_remarks' => "Null",
                                'ff_seven' => 0,
                                'ff_seven_marks' => 0,
                                'ff_seven_remarks' => "Null",
                                'ff_eight' => 0,
                                'ff_eight_marks' => 0,
                                'ff_eight_remarks' => "Null",
                                'ff_remarks' => "Null",
                                'ff_final_score' => $mCheckInPre->pre_fb_score,
                                'ff_date_added' => date('Y-m-d H:i:s'),
                                'ff_date_updated' => date("Y-m-d H:i:s"),
                            );
                            $mActionAdd = $this->feedbackforms->addParent($mData);
                        }
                    }
                    $mMessage = "Stage-1 form received successfully.";
                    $this->sendEmailToVendor("Stage-1 Registration", $mMessage, $email);
//To Buyer
                    $mMessage = "Stage-1 form submitted by vendor : " . $user_name . " successfully.";
                    $this->sendEmailToBuyer("Stage-1 Registration", $mMessage, $location);
                    $this->session->set_flashdata('success', 'Vendor registered successfully.');
                    $data['url'] = "home";
                    $data['form'] = "Stage One";
                    $data['message'] = "Thank you for submitting the Stage 1 form. Your form is currently under review";
                    $mSendMail = $this->wSendMail($mApprBuyerEmail, "Vendor Registration : Stage 1", $wMessage);
                    $this->load->view('message', $data);
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    redirect('home');
                }
            }
        } else {
            $this->session->set_flashdata('error', 'Vendor with same PAN already exists.');
            redirect('home');
        }
    }

    public function sendEmailToVendor($mSub, $mMsg, $mTo) {
        $mUserData = $this->Register->getVendorByEmail($mTo);
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

    public function getStageTwoVendor() {
// echo"<pre>";
// print_r($_POST);

        $company_name = $this->input->post('company_name');
        $type_Of_firm = $this->input->post('type_Of_firm');
        $registration_no = $this->input->post('registration_no');
        $date_of_incorpartion = $this->input->post('date_of_incorpartion');
        $GST = $this->input->post('GST');
        $PF_no = $this->input->post('PF_no');
        $PAN_no = $this->input->post('PAN_no');
        $address = $this->input->post('address');
        $contact_number = $this->input->post('contact_number');
        $fax = $this->input->post('fax');
        $website = $this->input->post('website');
        $contact_person = $this->input->post('contact_person');
        $email = $this->input->post('email');
        $no_of_years_vendor = $this->input->post('no_of_years_vendor');
        $type_of_work = $this->input->post('type_of_work');
        $field_chkbox_1 = $this->input->post('field_chkbox_1');
        $field_1 = $this->input->post('field_1');
        $details_of_corrent_work = $this->input->post('details_of_corrent_work');
        $file = $this->input->post('attachment1');
        $attachment = $this->single_File_Upload('attachment1', $file);
        $total_value_of_completed_works = $this->input->post('total_value_of_completed_works');
        $type_of_brand_does_vendor_represent = $this->input->post('type_of_brand_does_vendor_represent');
        $sales_service_facilities = $this->input->post('sales_service_facilities');
        $details_of_manufacturing_facilities = $this->input->post('details_of_manufacturing_facilities');
        $HR_own_employees = $this->input->post('HR_own_employees');
        $file2 = $this->input->post('attachment2');
        $attachment2 = $this->single_File_Upload('attachment2', $file2);
        $financial_referees = $this->input->post('financial_referees');

        $actual_previous_three_years_data = $this->input->post('actual_previous_three_years_data');
        $type_of_brand_does_vendor_represent = $this->input->post('type_of_brand_does_vendor_represent');
        $visited_website = $this->input->post('visited_website');
        $conformation = $this->input->post('conformation');

        $vendorData = array(
            'company_name' => $company_name,
            'type_Of_firm' => $type_Of_firm,
            'registration_no' => $registration_no,
            'date_of_incorpartion' => $date_of_incorpartion,
            'GST' => $GST,
            'PF_no' => $PF_no,
            'PAN_no' => $PAN_no,
            'address' => $address,
            'contact_number' => $contact_number,
            'fax' => $fax,
            'website' => $website,
            'contact_person' => $contact_person,
            'email' => $email,
            'no_of_years_vendor' => $no_of_years_vendor,
            'type_of_work' => json_encode($type_of_work),
            'field_chkbox_1' => json_encode($field_chkbox_1),
            'field_1' => json_encode($field_1),
            'details_of_corrent_work' => json_encode($details_of_corrent_work),
            'field_2_img' => $attachment,
            'total_value_of_completed_works' => json_encode($total_value_of_completed_works),
            'type_of_brand_does_vendor_represent' => json_encode($type_of_brand_does_vendor_represent),
            'sales_service_facilities' => json_encode($sales_service_facilities),
            'details_of_manufacturing_facilities' => json_encode($details_of_manufacturing_facilities),
            'HR_own_employees' => $HR_own_employees,
            'field_3_img' => $attachment2,
            'financial_referees' => json_encode($financial_referees),
            'actual_previous_three_years_data' => json_encode($actual_previous_three_years_data),
            'type_of_brand' => json_encode($type_of_brand_does_vendor_represent),
            'visited_website' => json_encode($visited_website),
            'conformation' => $conformation,
            'isActive' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        );
        $table = 'vendor_stage_two_vendor';
        $query = $this->Register->insert($table, $vendorData);
        $data['notification'] = "<div class='callout callout-success'>
                    <h4>Submit Successfully .</h4> 
                  </div>";

        if (!empty($query)) {
            $data['page'] = "stageTwo";
            $this->load->view('commans/header', $data);
            $this->load->view('commans/sidebar_v');
            $this->load->view('vendor/stage_two');
            $this->load->view('commans/footer');
        }
    }

    public function getConsultant() {
// echo'<pre>';
// print_r($_POST);
        $company_name = $this->input->post('company_name');
        $type_Of_firm = $this->input->post('type_Of_firm');
        $registration_no = $this->input->post('registration_no');
        $date_of_incorpartion = $this->input->post('date_of_incorpartion');
        $GST = $this->input->post('GST');
        $PF_no = $this->input->post('PF_no');
        $PAN_no = $this->input->post('PAN_no');
        $address = $this->input->post('address');
        $contact_number = $this->input->post('contact_number');
        $fax = $this->input->post('fax');
        $website = $this->input->post('website');
        $contact_person = $this->input->post('contact_person');
        $email = $this->input->post('email');
        $no_of_years_vendor = $this->input->post('no_of_years_vendor');
        $type_of_work = $this->input->post('type_of_work');
        $work_performed = $this->input->post('type_of_work');
        $attachment = $this->input->post('field_1');
        $field_1 = $this->single_File_Upload('attachment1', $attachment);
        $detailsof_current_work = $this->input->post('detailsof_current_work');
        $HR_own_employees = $this->input->post('HR_own_employees');
        $attachment2 = $this->input->post('attachment');
        $file = $this->single_File_Upload('attachment', $attechment2);
        $attrition_rate_of_employees = $this->input->post('attrition_rate_of_employees');
        $automation_capability = $this->input->post('automation_capability');
        $professional_indemnity_insurance = $this->input->post('professional_indemnity_insurance');
        $financial_referees = $this->input->post('financial_referees');
        $file2 = $this->input->post('attachmentFile');
        $attachment2 = $this->single_File_Upload('attachmentFile', $file2);
        $crrent_financial_details = $this->input->post('crrent_financial_details');
        $certification_awards = $this->input->post('certification_awards');
        $quality_assurance = $this->input->post('quality_assurance');
        $field_4 = $this->input->post('field_4');
        $field_6 = $this->input->post('field_6');
        $confarmation = $this->input->post('confarmation');

        $consultantUserData = array(
            'company_name' => $company_name,
            'type_Of_firm' => $type_Of_firm,
            'registration_no' => $registration_no,
            'date_of_incorpartion' => $date_of_incorpartion,
            'GST' => $GST,
            'PF_no' => $PF_no,
            'PAN_no' => $PAN_no,
            'address' => $address,
            'contact_number' => $contact_number,
            'fax' => $fax,
            'website' => $website,
            'contact_person' => $contact_person,
            'email' => $email,
            'no_of_years_vendor' => $no_of_years_vendor,
            'type_of_work' => json_encode($type_of_work),
            'work_performed' => json_encode($work_performed),
            'field_1' => json_encode($field_1),
            'detailsof_current_work' => json_encode($detailsof_current_work),
            'HR_own_employees' => json_encode($HR_own_employees),
            'field_2' => $attachment,
            'attrition_rate_of_employees' => json_encode($attrition_rate_of_employees),
            'automation_capability ' => json_encode($automation_capability),
            'professional_indemnity_insurance' => json_encode($professional_indemnity_insurance),
            'financial_referees' => json_encode($financial_referees),
            'attachment2' => $attachment2,
            'crrent_financial_details' => json_encode($crrent_financial_details),
            'certification_awards' => json_encode($certification_awards),
            'quality_assurance' => json_encode($quality_assurance),
            'field_4' => $field_4,
            'field_6' => $field_6,
            'confarmation' => $confarmation,
            'isActive' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        );
        $table = ' vendor_stage_two_consultant';
        $query = $this->Register->insert($table, $consultantUserData);
        $data['notification'] = "<div class='callout callout-success'>
                    <h4>Submit Successfully .</h4> 
                  </div>";

        if (!empty($query)) {
            $data['page'] = "consultant";
            $this->load->view('commans/header', $data);
            $this->load->view('commans/sidebar_v');
            $this->load->view('vendor/consultant');
            $this->load->view('commans/footer');
        }
    }

    public function getProjectManagementConsultant() {

        $company_name = $this->input->post('company_name');
        $type_Of_firm = $this->input->post('type_Of_firm');
        $registration_no = $this->input->post('registration_no');
        $date_of_incorpartion = $this->input->post('date_of_incorpartion');
        $GST = $this->input->post('GST');
        $PF_no = $this->input->post('PF_no');
        $PAN_no = $this->input->post('PAN_no');
        $address = $this->input->post('address');
        $contact_number = $this->input->post('contact_number');
        $fax = $this->input->post('fax');
        $website = $this->input->post('website');
        $contact_person = $this->input->post('contact_person');
        $email = $this->input->post('email');
        $no_of_years_vendor = $this->input->post('no_of_years_vendor');
        $type_of_work = $this->input->post('type_of_work');
        $work_performed = $this->input->post('type_of_work');
        $field_1 = $this->input->post('field_1');
        $detailsof_current_work = $this->input->post('detailsof_current_work');
        $HR_own_employees = $this->input->post('HR_own_employees');
        $file = $this->input->post('attachment');
        $attachment = $this->single_File_Upload('attachment', $file);
        $attrition_rate_of_employees = $this->input->post('attrition_rate_of_employees');
        $automation_capability = $this->input->post('automation_capability');
        $professional_indemnity_insurance = $this->input->post('professional_indemnity_insurance');
        $financial_referees = $this->input->post('financial_referees');
        $file2 = $this->input->post('attachmentFile');
        $attachment2 = $this->single_File_Upload('attachmentFile', $file2);
        $crrent_financial_details = $this->input->post('crrent_financial_details');
        $certification_awards = $this->input->post('certification_awards');
        $quality_assurance = $this->input->post('quality_assurance');
        $field_4 = $this->input->post('field_4');
        $field_6 = $this->input->post('field_6');
        $confarmation = $this->input->post('confarmation');

        $projectManagementconsultantUserData = array(
            'company_name' => $company_name,
            'type_Of_firm' => $type_Of_firm,
            'registration_no' => $registration_no,
            'date_of_incorpartion' => $date_of_incorpartion,
            'GST' => $GST,
            'PF_no' => $PF_no,
            'PAN_no' => $PAN_no,
            'address' => $address,
            'contact_number' => $contact_number,
            'fax' => $fax,
            'website' => $website,
            'contact_person' => $contact_person,
            'email' => $email,
            'no_of_years_vendor' => $no_of_years_vendor,
            'type_of_work' => json_encode($type_of_work),
            'work_performed' => json_encode($work_performed),
            'field_1' => json_encode($field_1),
            'detailsof_current_work' => json_encode($detailsof_current_work),
            'HR_own_employees' => json_encode($HR_own_employees),
            'field_2' => $attachment,
            'attrition_rate_of_employees' => json_encode($attrition_rate_of_employees),
            'automation_capability ' => json_encode($automation_capability),
            'professional_indemnity_insurance' => json_encode($professional_indemnity_insurance),
            'financial_referees' => json_encode($financial_referees),
            'attachment2' => $attachment2,
            'crrent_financial_details' => json_encode($crrent_financial_details),
            'certification_awards' => json_encode($certification_awards),
            'quality_assurance' => json_encode($quality_assurance),
            'field_4' => $field_4,
            'field_6' => $field_6,
            'confarmation' => $confarmation,
            'isActive' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        );
        $table = 'vendor_stage_two_project_management_consultant';
        $query = $this->Register->insert($table, $projectManagementconsultantUserData);
        $data['notification'] = "<div class='callout callout-success'>
                    <h4>Submit Successfully .</h4> 
                  </div>";

        if (!empty($query)) {
            $data['page'] = "projectManagementConsultant";
            $this->load->view('commans/header', $data);
            $this->load->view('commans/sidebar_v');
            $this->load->view('vendor/projectManagementConsultant');
            $this->load->view('commans/footer');
        }
    }

    public function getcontractor() {

        $company_name = $this->input->post('company_name');
        $type_Of_firm = $this->input->post('type_Of_firm');
        $registration_no = $this->input->post('registration_no');
        $date_of_incorpartion = $this->input->post('date_of_incorpartion');
        $GST = $this->input->post('GST');
        $PF_no = $this->input->post('PF_no');
        $PAN_no = $this->input->post('PAN_no');
        $address = $this->input->post('address');
        $contact_number = $this->input->post('contact_number');
        $fax = $this->input->post('fax');
        $website = $this->input->post('website');
        $contact_person = $this->input->post('contact_person');
        $email = $this->input->post('email');
        $no_of_years_contractor = $this->input->post('no_of_years_contractor');
        $type_of_work = $this->input->post('type_of_work');
        $details_of_work_last_3years = $this->input->post('details_of_work_last_3years');
        $attachment = $this->input->post('field_1');
        $field_1 = $this->single_File_Upload('attachment', $attachment);
        $file = $this->input->post('file');
        $total_value_of_completed_works_PO = $this->input->post('total_value_of_completed_works_PO');
        $attechment2 = $this->input->post('attechment');
        $attechment = $this->single_File_Upload('attachment', $attechment2);

        $HR_own_employees = $this->input->post('HR_own_employees');
        $financial_referees = $this->input->post('financial_referees');
// $attechment2 = $this->input->post('attechment2');
        $actual_previous_three_years = $this->input->post('actual_previous_three_years');
        $visited_website = $this->input->post('visited_website');
        $field_5 = $this->input->post('field_5');
        $field_6 = $this->input->post('field_6');
        $conformation = $this->input->post('conformation');

        $getContractor = array(
            'company_name' => $company_name,
            'type_Of_firm' => $type_Of_firm,
            'registration_no' => $registration_no,
            'date_of_incorpartion' => $date_of_incorpartion,
            'GST' => $GST,
            'PF_no' => $PF_no,
            'PAN_no' => $PAN_no,
            'address' => $address,
            'contact_number' => $contact_number,
            'fax' => $fax,
            'website' => $website,
            'contact_person' => $contact_person,
            'email' => $email,
            'no_of_years_contractor' => $no_of_years_contractor,
            'type_of_work' => json_encode($type_of_work),
            'details_of_work_last_3years' => json_encode($details_of_work_last_3years),
            'field_1' => json_encode($field_1),
            'file' => $file,
            'total_value_of_completed_works_PO' => json_encode($total_value_of_completed_works_PO),
            'field_3' => $attechment,
            'HR_own_employees' => $HR_own_employees,
            'financial_referees' => json_encode($financial_referees),
            // 'field_4' => $attechment2,
            'actual_previous_three_years' => json_encode($actual_previous_three_years),
            'visited_website' => json_encode($visited_website),
            'field_5' => $field_5,
            'field_6' => $field_6,
            'conformation' => $conformation,
            'isActive' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        );
        $table = ' vendor_stage_two_contractor';
        $query = $this->Register->insert($table, $getContractor);
        $data['notification'] = "<div class='callout callout-success'>
                    <h4>Submit Successfully .</h4> 
                  </div>";

        if (!empty($query)) {
            $data['page'] = "stageTwo";
            $this->load->view('commans/header', $data);
            $this->load->view('commans/sidebar_v');
            $this->load->view('vendor/contractor');
            $this->load->view('commans/footer');
        }
    }

// login system//
    private function logged_in() {
        if (!$this->session->userdata('marketplace')) {
            $this->load->view('buyer/dashboard');
        }
    }

    public function loginFailure($mMessage) {
        $this->session->set_flashdata('error', str_replace(' ', '-', strtolower($mMessage)));
        redirect('buyer/home', $data);
    }

    public function loginPublic() {
        $mCheck = $this->Register->buyerLogin("bchoudhary@godrejproperties.com", base64_encode(utf8_encode("123456")));
        if (!empty($mCheck)) {
            $data['home'] = "";
            redirect('buyer/vendor/dashboard', $data);
        } else {
            $this->data['error'] = "User not found!";
            $this->load->view('index', $this->data);
        }
    }

    public function login() {
        $userType = $this->input->post('user_type');
        $userName = $this->input->post('userName');
        $password = base64_encode(utf8_encode($this->input->post('password')));
        $data['home'] = "";
        $mGetVendor = $this->Register->getVendorByEmail($userName);
        if (!empty($mGetVendor)) {
            if ($mGetVendor['delisted'] == 0) {
                if ($mGetVendor['active'] == 0) {
                    $this->session->set_flashdata('error', 'Vendor verification pending.');
                    redirect('vendor/home', $data);
                } else if ($mGetVendor['active'] == 9 || $mGetVendor['active'] == 10) {
                    $this->session->set_flashdata('error', 'Vendor rejected.');
                    redirect('vendor/home', $data);
                } else {
                    $mCheck = $this->Register->vendorLogin($userName, $password);
                    if (!empty($mCheck)) {
                        $data['home'] = "";
                        redirect('vendor/home/dashboard', $data);
                    } else {
                        $this->session->set_flashdata('error', 'Vendor not found.');
                        redirect('vendor/home', $data);
                    }
                }
            } else {
                $this->session->set_flashdata('error', 'Vendor delisted.');
                redirect('vendor/home', $data);
            }
        } else {
            $this->session->set_flashdata('error', 'Vendor not found.');
            redirect('vendor/home', $data);
        }
    }

    public function loginBackup() {
        $userType = $this->input->post('user_type');
        $userName = $this->input->post('userName');
//$password = $this->input->post('password');
        $password = base64_encode(utf8_encode($this->input->post('password')));
        if ($userType == "1") {
            //header('location: http://localhost:3000/auth/signin');
            $mCheck = $this->Register->buyerLogin($userName, $password);
            if (!empty($mCheck)) {
                $data['home'] = "";
                redirect('buyer/vendor/dashboard', $data);
            } else {
                $this->data['error'] = "User not found!";
                $this->load->view('index', $this->data);
            }
//            $password = $this->input->post('password');
//            $ch = curl_init('https://login.microsoftonline.com/bfa3dfb0-91d5-4bf7-9a0c-fbf6ff337187/oauth2/v2.0/token');
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//            curl_setopt($ch, CURLINFO_HEADER_OUT, true);
//            curl_setopt($ch, CURLOPT_POST, true);
//            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//            curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials&client_id=6aefb212-27b9-4194-9836-a2f382f47d42&client_secret=XSa8Q~rG6.crFs18sGtV~CATrcie4JC1B8vxpc6j&scope=https://graph.microsoft.com/.default');
//            $result = curl_exec($ch);
//            $result = json_decode($result);
//            if ($result->access_token) {
//                $mAccessToken = $result->access_token;
//                $ch2 = curl_init('https://login.microsoftonline.com/bfa3dfb0-91d5-4bf7-9a0c-fbf6ff337187/oauth2/v2.0/token');
//                curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
//                curl_setopt($ch2, CURLINFO_HEADER_OUT, true);
//                curl_setopt($ch2, CURLOPT_POST, true);
//                curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 0);
//                curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0);
//                curl_setopt($ch2, CURLOPT_POSTFIELDS, 'grant_type=password&client_id=6aefb212-27b9-4194-9836-a2f382f47d42&client_secret=XSa8Q~rG6.crFs18sGtV~CATrcie4JC1B8vxpc6j&scope=https://graph.microsoft.com/.default&username=' . $userName . "&password=" . $password);
//                $result2 = curl_exec($ch2);
//                $result2 = json_decode($result2);
//                if ($result2->error_description) {
//                    $this->session->set_flashdata('error', $result2->error_description);
//                    redirect('buyer/home', $data);
//                } else {
//                    if ($result2->access_token) {
//                        $authorization = "Authorization: Bearer " . $result2->access_token;
//                        $ch3 = curl_init('https://graph.microsoft.com/v1.0/me/');
//                        curl_setopt($ch3, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
//                        curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
//                        curl_setopt($ch3, CURLINFO_HEADER_OUT, true);
//                        curl_setopt($ch3, CURLOPT_POST, false);
//                        curl_setopt($ch3, CURLOPT_SSL_VERIFYHOST, 0);
//                        curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, 0);
//                        $result3 = curl_exec($ch3);
//                        $result3 = json_decode($result3);
//                        if (!empty($result3)) {
//                            $mCheck = $this->Register->buyerLoginByEmail($userName);
//                            if (!empty($mCheck)) {
//                                $data['home'] = "";
//                                redirect('buyer/vendor/dashboard', $data);
//                            } else {
//                                $this->data['error'] = "User not found!";
//                                $this->load->view('index', $this->data);
//                            }
////                        $this->session->set_userdata('session_id', $result3->id);
////                        $this->session->set_userdata('session_name', $result3->displayName);
////                        $this->session->set_userdata('session_email', $result3->mail);
////                        $this->session->set_userdata('session_mobile', $result3->mobilePhone);
////                        $this->session->set_userdata('session_zone', "NCR");
////                        $this->session->set_userdata('session_role', "Project Manager");
////                        $this->session->set_userdata('session_pm', "1");
//                        } else {
//                            $this->session->set_flashdata('error', 'Invalid bearer token.');
//                            redirect('buyer/home', $data);
//                        }
//                        curl_close($ch3);
//                    } else {
//                        $this->session->set_flashdata('error', 'JWT token not found.');
//                        redirect('buyer/home', $data);
//                    }
//                    curl_close($ch2);
//                }
//            } else {
//                $this->session->set_flashdata('error', 'Access token not found.');
//                redirect('buyer/home', $data);
//            }
//            curl_close($ch);
        } else {
            $password = base64_encode(utf8_encode($this->input->post('password')));
            $data['home'] = "";
            $mGetVendor = $this->Register->getVendorByEmail($userName);
            if (!empty($mGetVendor)) {
                if ($mGetVendor['delisted'] == 0) {
                    if ($mGetVendor['active'] == 0) {
                        $this->session->set_flashdata('error', 'Vendor verification pending.');
                        redirect('vendor/home', $data);
                    } else if ($mGetVendor['active'] == 9 || $mGetVendor['active'] == 10) {
                        $this->session->set_flashdata('error', 'Vendor rejected.');
                        redirect('vendor/home', $data);
                    } else {
                        $mCheck = $this->Register->vendorLogin($userName, $password);
                        if (!empty($mCheck)) {
                            $data['home'] = "";
                            redirect('vendor/home/dashboard', $data);
                        } else {
                            $this->session->set_flashdata('error', 'Vendor not found.');
                            redirect('vendor/home', $data);
                        }
                    }
                } else {
                    $this->session->set_flashdata('error', 'Vendor delisted.');
                    redirect('vendor/home', $data);
                }
            } else {
                $this->session->set_flashdata('error', 'Vendor not found.');
                redirect('vendor/home', $data);
            }
        }
    }

    public function checkBuyerTokenFromSso($mTenantId, $mAccountId, $mUserEmail, $mUserName) {
        if ($mTenantId && $mAccountId && $mUserEmail) {
            $mCheck = $this->Register->buyerLoginByEmail($mUserEmail);
            if (!empty($mCheck)) {
                redirect('buyer/vendor/dashboard', $data);
            } else {
                $mSecretPassword = base64_encode(utf8_encode("123456"));
                $userdata = array(
                    'buyer_name' => str_replace(' ', '-', strtolower($mUserName)),
                    'buyer_email' => $mUserEmail,
                    'buyer_mobile' => "",
                    'buyer_zone' => "",
                    'buyer_is_pr' => "",
                    'buyer_designation' => "To be updated",
                    'buyer_role' => "To be updated",
                    'buyer_department' => "To be updated",
                    'buyer_password' => $mSecretPassword,
                    'buyer_date_added' => date('Y-m-d H:i:s'),
                    'buyer_date_updated' => date('Y-m-d H:i:s'),
                );
                $mInsert = $this->buyer->addParent($userdata);
                if ($mInsert) {
                    $mCheck = $this->Register->buyerLoginByEmail($mUserEmail);
                    redirect('buyer/vendor/dashboard', $data);
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                    $this->load->view('index', $this->data);
                }
            }
        } else {
            $this->session->set_flashdata('error', 'Vendor not found.');
            redirect('vendor/home', $data);
        }
    }

    function cUrlPost($url, $data, $headers) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true, // return the transfer as a string of the return value
            CURLOPT_TIMEOUT => 0, // The maximum number of seconds to allow cURL functions to execute.
            CURLOPT_POST => true, // This line must place before CURLOPT_POSTFIELDS
            CURLOPT_POSTFIELDS => $data // The full data to post
        ));
// Set Header
        if (!empty($headers)) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }
        $response = curl_exec($curl);
        $errno = curl_errno($curl);
        if ($errno) {
            return false;
        }
        curl_close($curl);
        return $response;
    }

    public function logout() {
        $getdata = $this->logged_in();
        $clearData = array(
            'validated' => false,
        );
        $this->session->sess_destroy();

        $this->load->view('index');
    }

    public function acceptStageOne() {
        $id = $_GET['id'];
        $active = 1;
        $tableName = 'registration';
        $data = array('active' => $active);
        $acceptStage = $this->Register->update($tableName, $data, array('id' => $id));
        $data['notification'] = "<div class='callout callout-success'>
                    <h4>Approve Successfully .</h4> 
                  </div>";
        if ($acceptStage) {

            $data['page'] = "vendorManagement";
            $data['getVendorManagement'] = $this->Register->getVendorManagement();
// $data['modal']= 'data-toggle="modal" data-target="#myModal"'; 
            $this->load->view('commans/header', $data);
            $this->load->view('commans/sidebar_b');
            $this->load->view('buyer/vendor_management');
            $this->load->view('commans/footer');
        }
    }

    public function rejectStageOne() {
        $id = $_GET['id'];
        $active = 2;
        $tableName = 'registration';
        $data = array('active' => $active);
        $acceptStage = $this->Register->update($tableName, $data, array('id' => $id));
        $data['notification'] = "<div class='callout callout-success'>
                    <h4>Reject Successfully .</h4> 
                  </div>";
        if ($acceptStage) {

            $data['page'] = "vendorManagement";
            $data['getVendorManagement'] = $this->Register->getVendorManagement();
// $data['modal']= 'data-toggle="modal" data-target="#myModal"'; 
            $this->load->view('commans/header', $data);
            $this->load->view('commans/sidebar_b');
            $this->load->view('buyer/vendor_management');
            $this->load->view('commans/footer');
        }
    }

    public function getStageOne() {
        $id = $_GET['id'];
        $data['page'] = "stageOne";
        $data['stageOne'] = $this->Register->getStageOne($id);
        $this->load->view('commans/header', $data);
        $this->load->view('commans/sidebar_v');
        $this->load->view('vendor/stage_one');
        $this->load->view('commans/footer');
    }

    public function getStageTwo() {
        $id = $_GET['id'];

        $data['page'] = "stageTwo";
        $data['getStageTwo'] = $this->Register->getStageTwo($id);
        $this->load->view('commans/header', $data);
        $this->load->view('commans/sidebar_v');
        $this->load->view('vendor/stage_two');
        $this->load->view('commans/footer');
    }

    public function single_File_Upload($mId, $mFile) {
        $config['upload_path'] = './uploads/';
        $config['file_name'] = $mFile;
        $config['allowed_types'] = 'jpg|jpeg|gif|png|zip|xlsx|cad|pdf|doc|docx|ppt|pptx|pps|ppsx|odt|xls|xlsx|mp3|m4a|ogg|wav|mp4|m4v|mov|wmv|mpeg|MPG';
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

    public function wSendMail($mTo, $mSubject, $mMessage) {
        $this->load->library('email');
        $config['protocol'] = 'smtp';
//        $config['smtp_host'] = '10.21.48.220';
//        $config['smtp_port'] = 25;
//        $config['smtp_timeout'] = '60';
//        $config['smtp_crypto'] = 'tsl';
//        $config['smtp_user'] = EMAIL;
//        $config['smtp_pass'] = EMAIL_PASSWORD;
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
