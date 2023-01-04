<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ListNfa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
       
		$this->load->helper(array('form', 'url','common_helper'));
        $this->load->library('form_validation');
        $this->load->library('upload');
        date_default_timezone_set("Asia/Kolkata");
        $this->load->model('buyer_model', 'buyer');
        $this->load->model('nfa_action_model', 'nfaAction');
		$this->load->model('Award_recomm_contract_model', 'awardRecommContract');
		$this->load->model('Award_procurement_model', 'awardRecommProcurement');
		$this->load->model('projects_model', 'projects');
        $this->load->helper('date');
        error_reporting(0);
       
    }

    public function index() {
		
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "draft";
           
            $this->load->view('nfa/draft_nfa', $data);
			//echo "test1";
        } else {
            $this->load->view('index', $data);
        }
    }

	public function index_award_recomm() {
		
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "draft";
            $data['projects'] = $this->projects->getAllParent();
            $this->load->view('nfa/award_recomm_index', $data);
			
        } else {
            $this->load->view('index', $data);
        }
    }
	//Draft NFAs dropdown
	public function draft_nfa() {
		
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
			$data['home'] = "draft";
			$data['title'] = "Draft NFAs";
            
			$nfa_select = nfa_dropdown_draft();
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/nfa_type', $data);
			
        } else {
            $this->load->view('index', $data);
        }
    }
	//Inititiated NFAs dropdown
	public function initiated_nfa() {
		
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
			$data['home'] = "initiated";
			$data['title'] = "Current NFAs";
            
			$nfa_select = nfa_dropdown_initiated();
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/nfa_type', $data);
			
        } else {
            $this->load->view('index', $data);
        }
    }
	//Approved NFAs dropdown
	public function approved_nfa() {
		
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
			$data['home'] = "approved";
			$data['title'] = "Approved NFAs";
            
			$nfa_select = nfa_dropdown_approved();
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/nfa_type', $data);
			
        } else {
            $this->load->view('index', $data);
        }
    }
	//Returned NFAs dropdown
	public function returned_nfa() {
		
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
			$data['home'] = "returned";
			$data['title'] = "Returned NFAs";
            
			$nfa_select = nfa_dropdown_returned();
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/nfa_type', $data);
			
        } else {
            $this->load->view('index', $data);
        }
    }
	//Amended NFAs dropdown
	public function amended_nfa() {
		
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
			$data['home'] = "amended";
			$data['title'] = "Amended NFAs";
            
			$nfa_select = nfa_dropdown_amended();
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/nfa_type', $data);
			
        } else {
            $this->load->view('index', $data);
        }
    }
	public function cancelled_nfa() {
		
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
			$data['home'] = "cancelled";
			$data['title'] = "Cancelled NFAs";
            
			$nfa_select = nfa_dropdown_cancelled();
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/nfa_type', $data);
			
        } else {
            $this->load->view('index', $data);
        }
    }
	
	public function nfa_logs() {
		
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
			$data['home'] = "logs";
			$data['title'] = "NFA Logs";
           
			$nfa_select = nfa_dropdown_logs();
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/nfa_type', $data);
			
        } else {
            $this->load->view('index', $data);
        }
    }

	public function nfa_reports() {
		
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
			$data['home'] = "reports";
			$data['title'] = "Reports";
           
			$nfa_select = nfa_dropdown_reports();
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/nfa_type', $data);
			
        } else {
            $this->load->view('index', $data);
        }
    }

    public function getReportUsers() {
		
        $nfaStatus = $this->input->post('nfaStatus');
		if($nfaStatus=="Initiated")
			$param = array("buyer_role!="=>'PCM');
        if ($nfaStatus) {
			$getUsers = $this->nfaAction->get_report_users($nfaStatus);
           
            $result = '<option disabled="" selected="" value="" >Select Users</option>';
            foreach ($getUsers as $key => $valUser) {
                $result = $result . "<option value='" . $valUser->buyer_id . "'>" . $valUser->buyer_name . "</option>" . PHP_EOL;
            }
            echo $result;
        } else {
            echo "<option>No data</option>";
        }
    }
	
		
	public function getRoleUsers_approval($role=null,$zone=null,$approver_id=null) {
      
        if ($role) {
			$tbl = "buyers";
			$fields = 'buyer_id,buyer_name';
			$where = array("buyer_role"=>$role);
			if($zone)
			{
				$where['buyer_zone']= $zone;
			}
			if($approver_id)
			{
				$where['buyer_id']= $approver_id;
			}
			$order_by = 'buyer_name asc';
            $getUsers = $this->common->select_fields_where($tbl, $fields, $where, '', '', '', '','',$order_by);
			//print_r($this->db->last_query());    
            
            return $getUsers;
			
        } 
		
    }




	
	public function award_iom_list(){

        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            
			$project_id = $this->input->post('project_id');			
			$zone = $this->input->post('zone');
            		$hd_type_work_id = $this->input->post('hd_type_work_id'); 


            

			$hd_project_id = $this->input->post('hd_project_id');

            		   if($project_id=='')
                		$project_id= $hd_project_id;
			
                      			
			$hd_zone = $this->input->post('hd_zone');

            		if($zone=='')
               		 $zone= $hd_zone;

                        if($mSessionRole !="PCM"){
                            if( $nfaStatus == '')
                           { $nfaStatus ='Pending' ;}
                           else{
                            $nfaStatus = $this->input->post('nfaStatus');			

                           }
                        }
                        if($mSessionRole =="PCM"){
                            $nfaStatus ='All' ;
                        }

           	$awdType = "All";
                $data['hd_awdType'] = "All";
        	$data['project_id'] = $project_id;
		$data['nfaStatus'] = $nfaStatus;
          	$data['zone'] = $zone;
            	$data['hd_awdType'] = $hd_awdType;
           	$data['hd_project_id'] = $hd_project_id;
		$data['hd_zone'] = $hd_zone;
           	$data['hd_type_work_id'] = $hd_type_work_id;
		$data['projects'] = $this->projects->getAllParent();

            
                $data1['Contract'] = $this->awardRecommContract->getContractData($awdType,$project_id,$hd_type_work_id,$nfaStatus,$zone);
                $data2['Procurement'] = $this->awardRecommProcurement->getProcurementData($awdType,$project_id,$hd_type_work_id,$nfaStatus,$zone);
                
                $data['records']=array_merge($data1,$data2);
                // print_r($data);die;
               
				
				$this->load->view('nfa/award_iom_listing', $data);
			}

    }
	
	
	public function award_recomm_list()
    {
        $mSessionKey = $this->session->userdata('session_id');
	$mSessionRole = $this->session->userdata('session_role');

        if ($mSessionKey) {
            
			 $awdType = $this->input->post('awdType');			
			 $project_id = $this->input->post('project_id');			
			 $nfaStatus = $this->input->post('nfaStatus');			
			 $zone = $this->input->post('zone');
            		 $hd_type_work_id = $this->input->post('hd_type_work_id');
			 $hd_awdType = $awdType;

			$hd_project_id = $this->input->post('hd_project_id');
            		if($project_id=='')
                		$project_id= $hd_project_id;
			
           			
			$hd_zone = $this->input->post('hd_zone');
            		if($zone=='')
               		 $zone= $hd_zone;



			$data['awdType'] = $awdType;
			$data['project_id'] = $project_id;
			$data['nfaStatus'] = $nfaStatus;
          		$data['zone'] = $zone;
            		$data['hd_awdType'] = $hd_awdType;
            		$data['hd_project_id'] = $hd_project_id;
			$data['hd_zone'] = $hd_zone;
           		 $data['hd_type_work_id'] = $hd_type_work_id;
			$data['projects'] = $this->projects->getAllParent();


			 if($awdType=="All"  )
			{
               			 $data1['Contract'] = $this->awardRecommContract->getContractData($awdType,$project_id,$hd_type_work_id,$nfaStatus,$zone);
                		 $data2['Procurement'] = $this->awardRecommProcurement->getProcurementData($awdType,$project_id,$hd_type_work_id,$nfaStatus,$zone);
                
                                 $data['records']=array_merge($data1,$data2);            
               
				
				$this->load->view('nfa/award_iom_listing', $data);
			} 
           
			else if($awdType=="Procurement" || $hd_awdType=="Procurement")
			{
				$data['records'] = $this->awardRecommProcurement->getProcurementData($awdType,$project_id,$hd_type_work_id,$nfaStatus,$zone);
				
				$this->load->view('nfa/award_procurement/award_recomm_procurement_list', $data);
			}
			else if($awdType=="Contract" || $hd_awdType=="Contract")
			{
               
				$data['records'] = $this->awardRecommContract->getContractData($awdType,$project_id,$hd_type_work_id,$nfaStatus,$zone);
				
				$this->load->view('nfa/award_contract/award_contract_listing', $data);
			}
           
        } else {
            $this->load->view('index', $data);
        }
    }
	

}



