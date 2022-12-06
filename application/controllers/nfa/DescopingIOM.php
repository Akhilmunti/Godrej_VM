<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

ob_start();
defined('BASEPATH') or exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/ListNfa.php");
//class Award_procurement extends CI_Controller
// class DescopingIOM extends CI_Controller
class DescopingIOM extends ListNfa   
{

    public function __construct()
    {
        parent::__construct();
        $CI = &get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->load->helper(array('form', 'url','common_helper'));
        $this->load->library('form_validation');
        $this->load->library('upload');
        date_default_timezone_set("Asia/Kolkata");
        $this->load->model('buyer_model', 'buyer');
		$this->load->model('common_model', 'common');
		$this->load->model('nfa_action_model', 'nfaAction');
        $this->load->model('Descoping_iom_model', 'descoping_iom_model');
        $this->load->helper('date');
        error_reporting(0);
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
    }

    // public function index() {
    //     $mSessionKey = $this->session->userdata('session_id');
    //     if ($mSessionKey) {
    //         $data['home'] = "Nfa";
    //         $data['records'] = $this->buyer->getAllParent();
    //         $this->load->view('nfa/bidder_list', $data);
    //     } else {
    //         $this->load->view('index', $data);
    //     }
    // }

    public function descopingList()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "bidder_list";
            //$data['records'] = $this->descoping_iom_model->getAllParent();
            $this->load->view('nfa/descoping_iom/bidderList_menu', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionAdd()
    {
        $mSessionKey = $this->session->userdata('session_id');
        $session_zone = $this->session->userdata('session_zone');

		// $data['PM'] = $this->buyer->getAllParentByZoneAndRole($session_zone, "Project Manager"); 
		// $data['PD'] = $this->buyer->getAllParentByZoneAndRole($session_zone, "Project Director");
		// $data['CH'] = $this->buyer->getAllParentByZoneAndRole($session_zone, "CH");
		// $data['OH'] = $this->buyer->getAllParentByZoneAndRole($session_zone, "OH");
		// $data['RH'] = $this->buyer->getAllParentByZoneAndRole($session_zone, "RH");
		// $data['ZH'] = $this->buyer->getAllParentByZoneAndRole($session_zone, "Zonal CEO");
		// $data['COO'] = $this->buyer->getAllParentByZoneAndRole($session_zone, "COO");
		// $data['HO'] = $this->buyer->getAllParentByZoneAndRole($session_zone, "HO - C&P");
		// echo "<pre>"; print_r($data['PM']); die;


		$PM = $this->descoping_iom_model->get_approver_list_by_level($session_zone,"Project Manager");
		$zonals = $this->descoping_iom_model->get_approver_list_by_level($session_zone,"Regional C&P Head");
		$CH = $this->descoping_iom_model->get_approver_list_by_level($session_zone,"CH");
		$PD = $this->descoping_iom_model->get_approver_list_by_level($session_zone,"Project Director");
		$OH = $this->descoping_iom_model->get_approver_list_by_level($session_zone,"OH");
		$RH = $this->descoping_iom_model->get_approver_list_by_level($session_zone,"RH");
		$ZH = $this->descoping_iom_model->get_approver_list_by_level($session_zone,"Zonal CEO");
		$HO = $this->descoping_iom_model->get_approver_list_by_level($session_zone,"HO - C&P");
		$COO = $this->descoping_iom_model->get_approver_list_by_level($session_zone,"COO");
		$COO1 = $this->descoping_iom_model->get_approver_list_by_level($session_zone,"COO"); 
		

		// echo "<pre>";print_r($zonals);die;
        $data['PM'] = $PM;
        $data['zonals'] = $zonals;
        $data['CH'] = $CH;
        $data['PD'] = $PD;
        $data['OH'] = $OH;
        $data['RH'] = $RH;
        $data['ZH'] = $ZH;
        $data['HO'] = $HO;
        $data['COO'] = $COO;
        $data['COO1'] = $COO1;
        if ($mSessionKey) {
            // $data['home'] = "bidderList";
            //$data['records'] = $this->descoping_iom_model->getAllParent();
            $this->load->view('nfa/descoping_iom/contractor_add', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	
	 public function actionEdit($mId,$updType='') {
		
        $mSessionKey = $this->session->userdata('session_id');
		$session_zone = $this->session->userdata('session_zone');

		$PM = $this->descoping_iom_model->get_approver_list_by_level($session_zone,"Project Manager");
		$zonals = $this->descoping_iom_model->get_approver_list_by_level($session_zone,"Regional C&P Head");
		$CH = $this->descoping_iom_model->get_approver_list_by_level($session_zone,"CH");
		$PD = $this->descoping_iom_model->get_approver_list_by_level($session_zone,"Project Director");
		$OH = $this->descoping_iom_model->get_approver_list_by_level($session_zone,"OH");
		$RH = $this->descoping_iom_model->get_approver_list_by_level($session_zone,"RH");
		$ZH = $this->descoping_iom_model->get_approver_list_by_level($session_zone,"Zonal CEO");
		$HO = $this->descoping_iom_model->get_approver_list_by_level($session_zone,"HO - C&P");
		$COO = $this->descoping_iom_model->get_approver_list_by_level($session_zone,"COO");
		$COO1 = $this->descoping_iom_model->get_approver_list_by_level($session_zone,"COO"); 
		

		// echo "<pre>";print_r($PM);die;
        $data['PM'] = $PM;
        $data['zonals'] = $zonals;
        $data['CH'] = $CH;
        $data['PD'] = $PD;
        $data['OH'] = $OH;
        $data['RH'] = $RH;
        $data['ZH'] = $ZH;
        $data['HO'] = $HO;
        $data['COO'] = $COO;
        $data['COO1'] = $COO1;
		
        if ($mSessionKey) {
            $data['home'] = "users";
            if ($mId) {
                //$mRecord = $this->descoping_iom_model->getParentByKey($mId);
				//print_r($mRecord);
				$salient_id = $mId;
				$mRecordBidContract = $this->descoping_iom_model->get_descoping_iom_data($salient_id);
				$appointment_dates_id = $mRecordBidContract['appointment_dates_id'];
				// echo "<pre>"; print_r($mRecordBidContract );die;
				// echo $appointment_dates_id; die;
				$appointment_external_dates = $this->descoping_iom_model->get_bidder_contractor_appointmentExternal_data($salient_id,$appointment_dates_id);
				// print_r($appointment_external_dates);
				// die;
				$mRecordSubWorks = $this->descoping_iom_model->getSubjectWorks($mId);
				
				$mRecordApprovers = $this->descoping_iom_model->get_level_approvers($mId); 
				// echo "<pre>"; print_r($mRecordApprovers);die;
			
			//print_r($this->db->last_query());
				//print_r($mRecordSubWorks);
                $data['mRecord'] = $mRecord;
				$data['mRecordBidContract'] = $mRecordBidContract;
				$data['appointment_external_dates'] = $appointment_external_dates;
				$data['mRecordSubWorks'] = $mRecordSubWorks;
				$data['mRecordApprovers'] = $mRecordApprovers; 
				$data['updType'] = $updType;
				
                $this->load->view('nfa/descoping_iom/contractor_edit', $data);
            } else {
                redirect('nfa/bidderContractor');
            }
        } else {
            $this->load->view('index', $data);
        }
    }
	
	public function actionSave($mId = null) {
		
        $mSessionKey = $this->session->userdata('session_id');
		$updType = $this->input->post('updType');
		
		// echo "<pre>"; print_r($_POST);die;;
		
        if ($mSessionKey) {
            $data['home'] = "users";
			
			$this->load->helper('string');
			
			if($mId=='')
			{
				$version_dt =  date("Ymdhis");
				$version_id =  "des".$version_dt."_00";
				
			}
			else if($updType=="RF")
			{
				$version_id =  $this->input->post('enfaNo');
			}
			else if($updType=="AMD")
			{
				$prevEnfaNo = $this->input->post('enfaNo');
				$version_id =  $prevEnfaNo."_01";
			}
			
			$subject = $this->input->post('subject'); 
			$contractor = $this->input->post('contractor'); 
			$package = $this->input->post('package'); 
			$awarded_towers = $this->input->post('awarded_towers'); 
			$award_date = $this->input->post('award_date'); 
			$completion_date = $this->input->post('completion_date'); 
			$revised_completion_date = $this->input->post('revised_completion_date'); 
			$original_contract_value = $this->input->post('original_contract_value'); 
			$last_approved_amended_value = $this->input->post('last_approved_amended_value'); 
			$total_value_of_work = $this->input->post('total_value_of_work'); 
			$balance_work = $this->input->post('balance_work'); 
			$proposed_work = $this->input->post('proposed_work'); 
			$cumulative_amount_of_work = $this->input->post('cumulative_amount_of_work'); 
			$estimated_value_of_reward = $this->input->post('estimated_value_of_reward'); 
			$reason_for_descoping = $this->input->post('reason_for_descoping'); 
			$cost_overrun = $this->input->post('cost_overrun'); 
			$recovery_mechanism = $this->input->post('recovery_mechanism'); 
			$perormance_bank_guarantee = $this->input->post('perormance_bank_guarantee'); 
			$validity_of_performance = $this->input->post('validity_of_performance'); 
			$retention_against = $this->input->post('retention_against'); 
			$status_of_advance_recovery = $this->input->post('status_of_advance_recovery'); 
			$remarks = $this->input->post('remarks'); 
			$delay_due_contractor = $this->input->post('delay_due_contractor'); 
			$delay_due_company = $this->input->post('delay_due_company'); 
			$delay_due_other_reason = $this->input->post('delay_due_other_reason'); 
			$impact_on_oc = $this->input->post('impact_on_oc'); 
			$decision_on_ld = $this->input->post('decision_on_ld'); 
			$decision_on_ten_administration = $this->input->post('decision_on_ten_administration'); 
			$reduction_in_pbg_value = $this->input->post('reduction_in_pbg_value'); 
			$deviation_in_existing = $this->input->post('deviation_in_existing'); 
			$status_of_retendering = $this->input->post('status_of_retendering'); 
			$recommendations = $this->input->post('recommendations'); 
               
		    
			$maxLevel_hd = $this->input->post('maxLevel_hd');
			$nfa_status = $this->input->post('nfa_status');
			$save_status = $this->input->post('save');
			
			$mail_url  = $this->config->item('base_url').'nfa/DescopingIOM/view_nfa/'.$mId;
			//$mail_url  = $this->config->item('base_url').'DescopingIOM/view_nfa';
			$mail_type = "approver_123";
			if($save_status=="")
				$save_status = $this->input->post('submit');
			
			//echo $save_status."save";
			if($nfa_status=="RT")
			{
				$mSavingStatus = 1;
				if($save_status=="submit")
				{
					$mNfaStatus = "SA";
				}
				else
				{
					$mNfaStatus = "RT";
					$mSavingStatus = 0;
				}
			}
			// for return
			else if($nfa_status=="R")
			{
				$mSavingStatus = 1;
				if($save_status=="submit")
				{
					$mNfaStatus = "RF";
				}
				else
				{
					$mNfaStatus = "R";
					$mSavingStatus = 0;
				}
			}
			// for amend
			else if($nfa_status=="AMD")
			{
				$mSavingStatus = 1;
				if($save_status=="submit")
				{
					$mNfaStatus = "SA";
				}
				else
				{
					$mNfaStatus = "AMD";
					$mSavingStatus = 0;
				}
			}
			else
			{
				if($save_status=="save")
				{
					$mSavingStatus = 0;
					$mNfaStatus = "S";
				}
				else
				{
					$mSavingStatus = 1;
					$mNfaStatus = "SA";
				}
			}
			
			

                if ($mId && $updType=='') {
					
                    $nfadata = array(
							//'version_id' => $version_id,
                            'subject' => $subject,
							'budget_with_escalation' => $budget_with_escalation,
							'budget_without_escalation' => $budget_without_escalation,

                            'front_idling' => $front_idling,
                            'front_idling_desc' => $front_idling_desc,
							'reasons_delay' => $reasons_delay,
                            'current_status_work' => $current_status_work,
							'scope_work' => $scope_work,
                            'award_strategy' => $award_strategy,
							'free_material' => $free_material,
							'basic_rate_items' => $basic_rate_items,
							'initiated_by' => $mSessionKey,
							'status' => $mSavingStatus,
							'nfa_status' => $mNfaStatus
							
							
                    );
                    $mUpdate = $this->descoping_iom_model->updateParentByKey($mId, $nfadata);
					//exit;
					
					//Appointment Data
					$nfaAppointmentData = array(
						'salient_id' => $mId,
						// 'contract_package_works_label' => $contract_package_works_label,
						'milestone' => $milestone,
						'milestone_label' => $milestone_label,
						// 'contract_package_works_value' => $contract_package_works_value,
						// 'contract_package_works_remarks' => $contract_package_works_remarks,
						'activity_planned_date' => $activity_planned_date,
						'activity_planned_remarks' => $activity_planned_remarks,
						'activity_actual_date' => $activity_actual_date,
						'activity_actual_remarks' => $activity_actual_remarks,
						'activity_cbe_date' => $activity_cbe_date,
						'activity_cbe_remarks' => $activity_cbe_remarks,
						'activity_delay' => $activity_delay,
						'activity_delay_remarks' => $activity_delay_remarks		 
					);
					$insAppId=$this->descoping_iom_model->awardAppointment_updateOrInsertData($mId,$nfaAppointmentData);
					
					// print_r($_POST); 
					// appointment external dates storing
					if(!empty($activity_label) ){ 
						$insUpd=$this->descoping_iom_model->checkAppoimentDatesExternalDateDelete($mId,$appointment_dates_id) ;
						$app_cnt = count($activity_label); 
						for($i=0;$i< $app_cnt;$i++)
						{
							$nfaAppointmentDates = array(
								'salient_id' => $mId, 
								'appointment_dates_id' => $appointment_dates_id,  
								'activity_label' => empty($activity_label[$i])? '': $activity_label[$i],
								'activity_dates' => empty($activity_dates[$i])? '': $activity_dates[$i] ,
								'activity_remarks' => empty($activity_remarks[$i])? '': $activity_remarks[$i] 								
							); 
							$insAppDates=$this->descoping_iom_model->awardAppointment_updateOrInsertDatesData($nfaAppointmentDates); 
						}
					}
					 
					 
					// die("asdf");
					
					
					// die("asdf");
					
					//Award efficiency Data
					$nfaAwardData = array(
						'salient_id' => $mId,
						//'package1_budget_esc' => $package1_budget_esc,
						'receipt_date' => $receipt_date,
						'receipt_days' => $receipt_days,
						'bidder_approval_date' => $bidder_approval_date,
						'bidder_approval_days' => $bidder_approval_days,
						'award_recomm_date' => $award_recomm_date,
						'award_recomm_days' => $award_recomm_days,
						'remarks_date' => $remarks_date,
						'remarks_days' => $remarks_days
											
					);
					$insUpd=$this->descoping_iom_model->awardEfficiency_updateOrInsertData($mId,$nfaAwardData);	
					//exit;
			
					//Major Terms
					$isExistSubWorks=$this->descoping_iom_model->checkSubWorksDelete($mId);
					foreach($name_contractor as $key=>$val)
					{
						$nfaWorksData = array(
						'salient_id' => $mId,
						'name_contractor' => $val,
						'avg_turn_over' => $avg_turn_over[$key],
						'bid_capacity' => $bid_capacity[$key],
						'score_type' => $score_type[$key],
						'score' => $score[$key],
						'bid_category' => $bid_category[$key],
						'ongoing_complete_project' => $ongoing_complete_project[$key],
						'created_date' => date('Y-m-d H:i:s')
						);
						//print_r($uploadData);
						//Insert Major Term data
						$mInsertSubWorks = $this->descoping_iom_model->addSubjectWorks($nfaWorksData);
					}	
					
							
		
					if($nfa_status!='RT')
					{
					 
						
						if(!empty($approver_id) ){ 
							$isExistApprover=$this->descoping_iom_model->checkApproverDelete($mId);

							$app_cnt = count($approver_id); 
							for($i=0;$i< $app_cnt;$i++)
							{ 
								$approveData = array(
									'salient_id' => $mId,
									'approver_id' => empty($approver_id[$i])? '': $approver_id[$i],
									'approver_level' => empty($approver_level[$i])? '': $approver_level[$i] ,
									'approver_role' => empty($approver_role[$i])? '': $approver_role[$i] ,
									//'approved_date' => date('Y-m-d H:i:s'),
									'created_date' => date('Y-m-d H:i:s') 								
								); 
								$mNfaInsert = $this->descoping_iom_model->addNfaStatus($approveData); 
								if($i<=3 && $mSavingStatus==1)
								{ 
									
									$mail_user = array();
									// $buyer = $this->buyer->getParentByKey($approver_id);
									$buyer = $this->buyer->getParentByKey($approver_id[$i]);
									
									$approver =   $buyer['buyer_name'];
									$sender =   $this->session->userdata('session_name');
									$mail_user[$approver] = $buyer['buyer_email'];
									//$mail_url  = $this->config->item('base_url').'nfa/Award_contract/view_nfa/'.$mId;
									//$mail = $this->sendEmailToApprover($mSubject,$post_basic_rate_package1,$version_id,$approver,$sender);
									// $mail = sendEmailToUsers($subject,$budget,$version_id,$mail_user,$sender,$mail_url,'',$mail_type);
									$mail = sendEmailToUsers($subject,$budget_with_escalation,$version_id,$mail_user,$sender,$mail_url,'',$mail_type); 
									
								}
							} 
						}
					}
                    if ($mUpdate) {
						//exit;
						
						if($mSavingStatus==0)
							$this->session->set_flashdata('success', 'NFA updated successfully.');
						else
							$this->session->set_flashdata('success', 'NFA submitted for approval.');
						//echo "updated2".$mSavingStatus;
						redirect('nfa/DescopingIOM/bidder_contract_list');
						
                    } else {
                        $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                        redirect('nfa/bidderContractor/actionEdit/' . $mId);
                    }
                } else {
						  
							$nfadata = array(
							'version_id' 	=> $version_id, 
							'subject' 		=> $subject ,
							'contractor' 	=> $contractor ,
							'package' 		=> $package,
							'awarded_towers' => $awarded_towers,
							'award_date' 				=>  date('Y-m-d', strtotime($award_date) ),
							'completion_date' 			=> date('Y-m-d', strtotime($completion_date) ),
							'revised_completion_date' 	=> date('Y-m-d', strtotime($revised_completion_date) ),
							'original_contract_value' 	=> $original_contract_value,
							'last_approved_amended_value' => $last_approved_amended_value,
							'total_value_of_work' 		=> $total_value_of_work,
							'balance_work' 				=> $balance_work,
							'proposed_work' 			=> $proposed_work,
							'cumulative_amount_of_work' => $cumulative_amount_of_work,
							'estimated_value_of_reward' => $estimated_value_of_reward,
							'reason_for_descoping' 		=> $reason_for_descoping,
							'cost_overrun' 				=> $cost_overrun,
							'recovery_mechanism' 		=> $recovery_mechanism,
							'perormance_bank_guarantee' => $perormance_bank_guarantee,
							'validity_of_performance' 	=> $validity_of_performance,
							'retention_against' 		=> $retention_against,
							'status_of_advance_recovery' => $status_of_advance_recovery,
							'remarks' 					=> $remarks,  
							'decision_on_ld' => $decision_on_ld,
							'decision_on_ten_administration' => $decision_on_ten_administration,
							'reduction_in_pbg_value' 	=> $reduction_in_pbg_value,
							'deviation_in_existing' 	=> $deviation_in_existing,
							'status_of_retendering' 	=> $status_of_retendering,
							'recommendations' 			=> $recommendations, 
                           
							'initiated_by' 			=> $mSessionKey,
							'status' 				=> $mSavingStatus,
							'nfa_status' 			=> $mNfaStatus,
                            'initiated_date' 		=> date('Y-m-d H:i:s'),
                            'created_date' 			=> date('Y-m-d H:i:s')
                            
                        );
						
                        $mInsert = $this->descoping_iom_model->addParent($nfadata);
                      
						// print_r($nfadata);		
						// echo "<pre>"; print_r($_POST);die;; exit;
						if ($mInsert) {
                       
							//DelayAnalisys Data
							$nfaDelayAnalisys = array(
								'salient_id' => $mInsert, 
								'delay_due_contractor' => $delay_due_contractor,
								'delay_due_company' => $delay_due_company,
								'delay_due_other_reason' => $delay_due_other_reason,
								'impact_on_oc' => $impact_on_oc,
								'created_date' => date('Y-m-d H:i:s')								
							);
							//Insert DelayAnalisys Data
							$mInsertDelayAnalisys = $this->descoping_iom_model->addDelayAnalisys($nfaDelayAnalisys);
							
							// echo "<pre>";	print_r($_POST); exit();
							/*$mUploadInsert = $this->descoping_iom_model->addFileUploads($uploadData);*/
							$isExistApprover=$this->descoping_iom_model->checkApproverDelete($mInsert);
							//echo $maxLevel_hd."max<br>";
						 
							
							if(!empty($approver_id) ){ 
								$app_cnt = count($approver_id); 
								for($i=0;$i< $app_cnt;$i++)
								{ 
									$approveData = array(
										'salient_id' => $mInsert,
										'approver_id' => empty($approver_id[$i])? '': $approver_id[$i],
										'approver_level' => empty($approver_level[$i])? '': $approver_level[$i] ,
										'approver_role' => empty($approver_role[$i])? '': $approver_role[$i] ,
										//'approved_date' => date('Y-m-d H:i:s'),
										'created_date' => date('Y-m-d H:i:s') 								
									); 
									$mNfaInsert = $this->descoping_iom_model->addNfaStatus($approveData); 
									if($i<=3 && $mSavingStatus==1)
									{ 
										$buyer = $this->buyer->getParentByKey($approver_id); 
										//print_r($this->session->userdata);
										$approver =   $buyer['buyer_name'];
										$sender =   $this->session->userdata('session_name'); 
										//$mail = sendEmailToApprover($subject,$package_value_mail,$version_id,$approver,$sender,$mail_url);
										$mail = sendEmailToApprover($subject,$budget_with_escalation,$version_id,$approver,$sender,$mail_url); 
									}
								}
							}
							
							
							// print_r($approveData);
								//exit;
						if($updType=="RF")
						{
							$nfadata = array(
								'status' => 2);
							$mUpdate = $this->descoping_iom_model->updateParentByKey($mId, $nfadata);
							$this->session->set_flashdata('success', 'NFA refloated successfully.');
							redirect('nfa/DescopingIOM/bidder_contract_list');
						}
						else
						{
							if($mSavingStatus==0)
							$this->session->set_flashdata('success', 'NFA added successfully.');
							else
							$this->session->set_flashdata('success', 'NFA submitted for approval.');
							
							//$this->session->set_flashdata('success', 'NFA added successfully.');
							redirect('nfa/DescopingIOM/bidder_contract_list');
						}
					} else {
					$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
				   redirect('nfa/DescopingIOM/actionAdd');
				}
		   
            }
        
        } else {
			//echo "last2";  
            $this->load->view('index', $data);
        }
		// echo "last3";  
    }
	
    public function bidder_contract_list()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            // $data['home'] = "bidderList";
            $data['records'] = $this->descoping_iom_model->getAllParent();
			$selUrl =   $_SERVER['REQUEST_URI'];
							
			$current_page = base_url('nfa/DescopingIOM/bidder_contract_list');
			
			if(strpos($current_page, $selUrl) !== false)
				$selOption="selected";
			else
				$selOption="";
			
			$nfa_select = nfa_dropdown_draft("bidder_contract");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/descoping_iom/bidder_contractor_listing', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	//View NFA Details
    public function view_nfa($mId,$pgType='')
    {
		$mSessionKey = $this->session->userdata('session_id');
		if ($mSessionKey) {
		//$data['home'] = "bidderList";
		//$data['records'] = $this->ldWaiver->getAllParent();
		if ($mId) {
			//$mRecord = $this->descoping_iom_model->getParentByKey($mId);
			$mRecord = $this->nfaAction->get_salient_initiator($mId,"bidder_contract");
			//print_r($mRecord);
			$salient_id = $mRecord['id'];
			$mRecordBidContract = $this->descoping_iom_model->get_descoping_iom_data($salient_id);
			//print_r($mRecordAwdContract);
			$mRecordSubWorks = $this->descoping_iom_model->getSubjectWorks($mId);
			//print_r($mRecordUploads);
			//$mOriginal_contract_value = $mRecord['original_contract_value'];
			
			// $mRecordApprovers = $this->descoping_iom_model->get_level_approvers($mId); 
			$mSessionRole = $this->session->userdata('session_role');

			if($mSessionRole!='PCM')
			{
				$param = array("role"=>$mSessionRole);
				$getLevels = $this->nfaAction->getAllLevelRole($param);
				//print_r($getLevels);
				$approver_level = $getLevels[0]->level;
			}
			//echo $salient_id;
			$mRecordLevelsObj = $this->nfaAction->getAllLevelRole_approvers('',$salient_id,"bidder_contract","view",$approver_level);
			$mRecordLevels = json_decode(json_encode($mRecordLevelsObj), true);	
			
			// echo "<pre>"; print_r($mRecordLevelsObj); die;	
			$data['mRecordLevels'] = $mRecordLevels;

			//print_r($mRecordApprovers);
			// $mRecordApproverDetails = approverDetails($mRecordApprovers);
			//print_r($this->db->last_query());
			//print_r($mRecordApproverDetails);
			$data['mRecord'] = $mRecord;
			$data['mRecordBidContract'] = $mRecordBidContract;
			$data['mRecordSubWorks'] = $mRecordSubWorks;
			// $data['mRecordApprovers'] = $mRecordApprovers; 
			$data['mRecordApproverDetails'] = $mRecordApproverDetails; 
		
		//$data['controller'] = $this; 
				if($pgType=='A' || $pgType=='E' )
				{
					$data['pgType'] = $pgType; 
					$data['mId'] = $mId; 
				}
				$this->load->view('nfa/descoping_iom/contractor_view', $data);
			}
        } else {
            $this->load->view('index', $data);
        } 
      
    }
	//Initiated NFA
	public function initiated_nfa()
    {
        $mSessionKey = $this->session->userdata('session_id');
		
        if ($mSessionKey && $mSessionRole != "PCM") {
            $data['home'] = "initiated";
            $data['records'] = $this->nfaAction->getAllInitiated($mSessionKey,"bidder_contract");
			//print_r($data['records'][0]);
			$approver_level = $data['records'][0]['approver_level'];
			$salient_id = $data['records'][0]['id'];
			if($approver_level>1)
				$data['preChkRecords'] = $this->nfaAction->chkPreApproved($salient_id,$approver_level,"bidder_contract");
			else
				$data['preChkRecords']=1;
			
			
			
			/* $selUrl =   $_SERVER['REQUEST_URI'];
							
			$current_page = base_url('nfa/DescopingIOM/initiated_nfa');
			
			if(strpos($current_page, $selUrl) !== false)
				$selOption="selected";
			else
				$selOption=""; */
			
			$nfa_select = nfa_dropdown_initiated("bidder_contract");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/descoping_iom/initiated', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	public function return_nfa($mId)
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $mRecord = $this->nfaAction->getNfaInitiated($mId,$mSessionKey,"bidder_contract");
			//print_r($mRecord);
			$approver_level = $mRecord[0]['approver_level'];
			$mRecordApprovers = $this->nfaAction->getNfaStatus($mId,$mSessionKey,$approver_level,'',"bidder_contract");
			$data['mRecord'] = $mRecord[0];
			$data['mRecordApprovers'] = $mRecordApprovers;
            $this->load->view('nfa/descoping_iom/return', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	public function actionReturnNfa($mId) {
		//echo "test";
		//exit;
		$mSessionKey = $this->session->userdata('session_id');
	
		if ($mSessionKey) {
			$data['home'] = "users";
			$returned_remarks = $this->input->post('returned_remarks');
			if ($mId) {
				$returnData = array(
						
						'returned_by' => $mSessionKey,
						'returned_remarks	' => $this->input->post('returned_remarks'),
						'returned_date' => date('Y-m-d H:i:s')
						
					);
				$param = array('salient_id' => $mId,
						'approver_id' => $mSessionKey
						);	
				$mUpdate = $this->nfaAction->updateData($param, $returnData,"bidder_contract");
				if ($mUpdate) {
						//echo "updated";
						$nfadata = array(
						
						'nfa_status' => 'R'
											
					);
						$mUpdateSalient = $this->descoping_iom_model->updateParentByKey($mId, $nfadata);
						if($mUpdateSalient)
						{
							$mail_type = "returnLowLevels";
							$this->mail_details($mId, $returned_remarks,$mail_type);
							
						}
						//exit;
						$this->session->set_flashdata('success', 'NFA Returned successfully.');
						redirect('nfa/DescopingIOM/initiated_nfa');
				} else {
						$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
						redirect('nfa/DescopingIOM/return_nfa/' . $mId);
				}
			}
		} else {
			$this->load->view('index', $data);
		}
    }
    public function returned_nfa()
    {
         $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "returned";
			/* $selUrl =   base_url('nfa/DescopingIOM/returned_nfa');									
			
			$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			if($current_page==$selUrl)
				$selOption="selected";
			else
				$selOption="";
			 */
			$nfa_select = nfa_dropdown_returned("bidder_contract");
			$data['nfa_select'] = $nfa_select;
            $data['records'] = $this->nfaAction->getReturnedNfa("bidder_contract");
            $this->load->view('nfa/descoping_iom/returned', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
    public function approved_nfa()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "approved";
			
            $data['records'] = $this->nfaAction->getNfaApproved($mSessionKey,"bidder_contract");
			/* $selUrl =   base_url('nfa/DescopingIOM/approved_nfa');									
			
			$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			if($current_page==$selUrl)
				$selOption="selected";
			else
				$selOption=""; */
			
			$nfa_select = nfa_dropdown_approved("bidder_contract");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/descoping_iom/approved', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
    public function approve($mId)
    {
         $mSessionKey = $this->session->userdata('session_id');
		
        if ($mSessionKey) {
            // $data['home'] = "approved";
			if ($mId) {
				$mRecord = $this->nfaAction->getNfaInitiated($mId,$mSessionKey,"bidder_contract");
				//echo "test";
				//print_r($mRecord);
				$approver_level = $mRecord[0]['approver_level'];
				$mRecordApprovers = $this->nfaAction->getNfaStatus($mId,$mSessionKey,$approver_level,'',"bidder_contract");
				$param = array('salient_id' => $mId,'approver_id!=' => '');
				//$data['mRecordLevels'] = $this->ldWaiver->getMaxApproverLevel($param);
				//print_r($mRecordApprovers);
				$data['mRecord'] = $mRecord[0];
				$data['mRecordApprovers'] = $mRecordApprovers;
				
				//$data['mRecordApprovers'] = $mRecordApprovers;
				$this->load->view('nfa/descoping_iom/approve', $data);
			}
        } else {
            $this->load->view('index', $data);
        }
    }
	public function actionApprove($mId) {
		$mSessionKey = $this->session->userdata('session_id');
	
		if ($mSessionKey) {
			$data['home'] = "users";
			if ($mId) {
				$param = array('salient_id' => $mId,'approver_id!=' => '');
				$recordLevel = $this->nfaAction->getMaxApproverLevel($param,"bidder_contract");
				//print_r($recordLevel);
				$max_level = $recordLevel['approver_level'];
				$approvedata = array(
						'approved_status' => 1,
						'approved_remarks' => $this->input->post('approved_remarks'),
						'approved_date' => date('Y-m-d H:i:s')
						
					);
				$param = array('salient_id' => $mId,
						'approver_id' => $mSessionKey
						);	
				$mUpdate = $this->nfaAction->updateData($param, $approvedata,"bidder_contract");
				if ($mUpdate) {
						
					if ($mId) {
						
						
						$mail_user = array();
						//$mRecord = $this->descoping_iom_model->getParentByKey($mId);
						$mRecord = $this->nfaAction->getNfaDetails_userLevel($mId,$mSessionKey,"bidder_contract");
						
						$initiated_by = $mRecord['initiated_by'];
						$approver_level = $mRecord['approver_level'];
						$mRecordBidContract = $this->descoping_iom_model->get_descoping_iom_data($mId);
						//echo "updated";
						if($approver_level==$max_level)
						{
							$nfadata = array(
								'nfa_status' => 'A'
												
							);
							$mUpdateSalient = $this->descoping_iom_model->updateParentByKey($mId, $nfadata);
						}
						//print_r($mRecord);
						//exit;
						$buyer = $this->buyer->getParentByKey($initiated_by);
						//print_r($buyer);
						//echo "<br>....<br>";
									
						//print_r($this->session->userdata);
						$initiator =   $buyer['buyer_name'];
						$sender =   $this->session->userdata('session_name');
						$subject = $mRecord['subject'];
						$package_value_mail = $mRecordBidContract['budget_with_escalation'];
						$version_id = $mRecord['version_id'];
						$approver_level = $mRecord['approver_level'];
						$mail_user[$initiator] = $buyer['buyer_email'];
						if($approver_level>1)
						{
							//echo "level";
							$mRecordUsers = $this->nfaAction->get_low_level_users($mId,$approver_level,"bidder_contract");
							foreach ($mRecordUsers as $key => $val) {
								$buyer_name = $val['buyer_name'];
								$mail_user[$buyer_name] = $val['buyer_email'];
							}
							//print_r($mRecordUsers);
							
						}
						
						//echo $str_mail_user = implode(",",$mail_user);
						//exit;
						$mail_url  = $this->config->item('base_url').'nfa/DescopingIOM/view_nfa/'.$mId;
						//send mail to level below
						$mail_type = "LowLevels";
						$mail = sendEmailToUsers($subject,$package_value_mail,$version_id,$mail_user,$sender,$mail_url,'',$mail_type);
						//echo "mail".$mail;
						//exit;
				}
				$this->session->set_flashdata('success', 'NFA Approved successfully.');
				redirect('nfa/DescopingIOM/initiated_nfa');
				} else {
						$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
						redirect('nfa/DescopingIOM/approve/' . $mId);
				}
			}
		} else {
			$this->load->view('index', $data);
		}
    }
    public function return_Text($mId)
    {
       $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            // $data['home'] = "approved";
           
			if ($mId) {
				$mRecord = $this->nfaAction->getNfaInitiated($mId,$mSessionKey,"bidder_contract");
				//print_r($mRecord);
				$approver_level = $mRecord[0]['approver_level'];
				$mRecordApprovers = $this->nfaAction->getNfaStatus($mId,$mSessionKey,$approver_level,'',"bidder_contract");
				$data['mRecord'] = $mRecord[0];
				$data['mRecordApprovers'] = $mRecordApprovers;
				$this->load->view('nfa/descoping_iom/return_text_correction', $data);
			}
			
			
        } else {
            $this->load->view('index', $data);
        }
    }
	//action for return text correction
	public function actionReturnText($mId) {
		//echo "test";
		//exit;
		$mSessionKey = $this->session->userdata('session_id');
	
		if ($mSessionKey) {
			$data['home'] = "users";
			if ($mId) {
				$returnData = array(
						'returned_text_status' => 1,
						'returned_text_by' => $mSessionKey,
						'returned_text_remarks	' => $this->input->post('returned_text_remarks'),
						'returned_text_date' => date('Y-m-d H:i:s')
						
					);
				$param = array('salient_id' => $mId,
						'approver_id' => $mSessionKey
						);	
				$mUpdate = $this->nfaAction->updateData($param, $returnData,"bidder_contract");
				if ($mUpdate) {
						//echo "updated";
						$nfadata = array(
						'nfa_status' => 'RT'
											
					);
						$mUpdateSalient = $this->descoping_iom_model->updateParentByKey($mId, $nfadata);
						//exit;
						$this->session->set_flashdata('success', 'NFA Returned for text correction successfully.');
						redirect('nfa/DescopingIOM/initiated_nfa');
				} else {
						$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
						redirect('nfa/DescopingIOM/return_text/' . $mId);
				}
			}
		} else {
			$this->load->view('index', $data);
		}
    }
   public function cancel($mId)
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
			
            $mRecord = $this->nfaAction->getNfaDraft($mId,$mSessionKey,"bidder_contract");
			//print_r($mRecord);
			$approver_level = $mRecord[0]['approver_level'];
			$mRecordApprovers = $this->nfaAction->getNfaStatus($mId,$mSessionKey,$approver_level,"draft","bidder_contract");
			//print_r($mRecordApprovers);
			$data['mRecord'] = $mRecord[0];
			$data['mRecordApprovers'] = $mRecordApprovers;
            $this->load->view('nfa/descoping_iom/cancel', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	public function actionCancelNfa($mId) {
		
		$mSessionKey = $this->session->userdata('session_id');
	
		if ($mSessionKey) {
			$data['home'] = "users";
			if ($mId) {
				
						$nfadata = array(
						
						'nfa_status' => 'C',
						'cancelled_by' => $mSessionKey,
						'cancelled_remarks' => $this->input->post('cancelled_remarks'),
						'cancelled_date' => date('Y-m-d H:i:s')
											
					);
						$mUpdateSalient = $this->descoping_iom_model->updateParentByKey($mId, $nfadata);
						//exit;
						if ($mUpdateSalient) {
							$this->session->set_flashdata('success', 'NFA Cancelled  successfully.');
							redirect('nfa/DescopingIOM/bidder_contract_list');
						}
						else {
							$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
							redirect('nfa/DescopingIOM/cancel/' . $mId);
						}
						
				
				
			}
		} else {
			$this->load->view('index', $data);
		}
    }
	//Amend NFA
	public function amend_nfa($mId)
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $mRecord = $this->descoping_iom_model->getParentByKey($mId);
			
			$data['mRecord'] = $mRecord;
			//$data['mRecordApprovers'] = $mRecordApprovers;
            $this->load->view('nfa/descoping_iom/amend', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	//Amend Action
	public function actionAmendNfa($mId) {
		
		$mSessionKey = $this->session->userdata('session_id');
	
		if ($mSessionKey) {
			$data['home'] = "users";
			if ($mId) {
				
				$nfadata = array(
				
				'nfa_status' => 'AMD',
				'amended_by' => $mSessionKey,
				'amended_remarks' => $this->input->post('amended_remarks'),
				'amended_date' => date('Y-m-d H:i:s')
									
			);
				$mUpdateSalient = $this->descoping_iom_model->updateParentByKey($mId, $nfadata);
				//exit;
				if($mUpdateSalient)
				{
					$this->session->set_flashdata('success', 'NFA amended successfully.');
					redirect('nfa/DescopingIOM/approved_nfa');
				} else {
					$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
					redirect('nfa/DescopingIOM/amended_nfa/' . $mId);
				}
			}
		} 
		else {
				$this->load->view('index', $data);
		}
    }
	//Amended NFA
	public function amended_nfa()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "amended";
			$param = array('status'=> 1,'nfa_status '=> 'AMD');
            //$data['records'] = $this->ldWaiver->getNfaAmended($mSessionKey);
			$data['records'] = $this->nfaAction->getNfaData($param,"bidder_contract");
			/* $selUrl =   base_url('nfa/DescopingIOM/amended_nfa');
									
			$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			if($current_page==$selUrl)
				$selOption="selected";
			else
				$selOption=""; */
			
			//echo $selOption."sel";
			$nfa_select = nfa_dropdown_amended("bidder_contract");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/descoping_iom/amended', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	
	public function cancelled_nfa()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "cancelled";
			$param = array('status'=> 0,'nfa_status '=> 'C');
            $data['records'] = $this->nfaAction->getNfaData($param,"bidder_contract");
			/* $selUrl =   base_url('nfa/DescopingIOM/cancelled_nfa');
									
			//echo $current_page = $config['base_url'].$_SERVER['REDIRECT_QUERY_STRING'];
			$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			if($current_page==$selUrl)
				$selOption="selected";
			else
				$selOption="";
			
			//echo $selOption."sel"; */
			$nfa_select = nfa_dropdown_cancelled("bidder_contract");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/descoping_iom/cancelled', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	public function mail_details($mId=null,$returned_remarks=null,$mail_type=null)
    {
		if ($mId) {
				$mail_user = array();
				$mSessionKey = $this->session->userdata('session_id');
				$mRecord = $this->nfaAction->getNfaDetails_userLevel($mId,$mSessionKey,"bidder_contract");
				//print_r($mRecord);
				//exit;
				$initiated_by = $mRecord['initiated_by'];
				$mRecordBidContract = $this->descoping_iom_model->get_descoping_iom_data($mId);
				$buyer = $this->buyer->getParentByKey($initiated_by);
				//print_r($buyer);
				//echo "<br>....<br>";
							
				//print_r($this->session->userdata);
				$initiator =   $buyer['buyer_name'];
				$sender =   $this->session->userdata('session_name');
				$subject = $mRecord['subject'];
				$package_value_mail = $mRecordBidContract['budget_with_escalation'];
				$version_id = $mRecord['version_id'];
				$approver_level = $mRecord['approver_level'];
				$mail_user[$initiator] = $buyer['buyer_email'];
				if($approver_level>1)
				{
					//echo "level";
					$mRecordUsers = $this->nfaAction->get_low_level_users($mId,$approver_level,"bidder_contract");
					foreach ($mRecordUsers as $key => $val) {
						$buyer_name = $val['buyer_name'];
						$mail_user[$buyer_name] = $val['buyer_email'];
					}
					//print_r($mRecordUsers);
					
				}
				
				//echo $str_mail_user = implode(",",$mail_user);
				//exit;
				$mail_url  = $this->config->item('base_url').'nfa/DescopingIOM/view_nfa/'.$mId;
				//send mail to level below
				//$mail_type = "LowLevels";
				//$mail = sendEmailToUsers($subject,$package_value_mail,$version_id,$mail_user,$sender,$mail_url,'',$mail_type);
				$mail = sendEmailToUsers($subject,$package_value_mail,$version_id,$mail_user,$sender,$mail_url,$returned_remarks,$mail_type);
				/* $mRecord = $this->descoping_iom_model->getParentByKey($mId);
				$initiated_by = $mRecord['initiated_by'];
				$mRecordAwdContract = $this->descoping_iom_model->get_descoping_iom_data($mId);
				$buyer = $this->buyer->getParentByKey($initiated_by);
							
				//print_r($this->session->userdata);
				$initiator =   $buyer['buyer_name'];
				$sender =   $this->session->userdata('session_name');
				$subject = $mRecord['subject'];
				$package_value_mail = $mRecordAwdContract['post_basic_rate_package1'];
				$version_id = $mRecord['version_id'];
				$mail_url  = $this->config->item('base_url').'nfa/DescopingIOM//view_nfa/'.$mId;
				//send mail to level below
				//$mail_type = "LowLevels";
				$mail = sendEmailToUsers($subject,$package_value_mail,$version_id,$initiator,$sender,$mail_url,$returned_remarks,$mail_type); */
				//echo "mail".$mail;
				//exit;
		}
	}
	public function nfa_logs()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "nfa_logs";
			
            $data['records'] = $this->nfaAction->getNfaData('',"bidder_contract");
			
			$nfa_select = nfa_dropdown_logs("bidder_contract");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/descoping_iom/nfa_logs', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	//View NFA Logs
	public function view_logs($mId,$pgType='')
    {
		$mSessionKey = $this->session->userdata('session_id');
		if ($mSessionKey) {
		
			if ($mId) {
				$mRecord = $this->nfaAction->get_salient_initiator($mId,"bidder_contract");
				//print_r($mRecord);
				$salient_id = $mRecord['id'];
				
				// $mRecordApprovers = $this->descoping_iom_model->get_level_approvers($mId); 
				//print_r($mRecordApprovers);
				// $mRecordApproverDetails = approverDetails($mRecordApprovers);
				// $data['mRecordApprovers'] = $mRecordApprovers; 
				

				// $mRecordApprovers = $this->descoping_iom_model->get_level_approvers($mId); 
				$mSessionRole = $this->session->userdata('session_role');
				if($mSessionRole!='PCM')
				{
					$param = array("role"=>$mSessionRole);
					$getLevels = $this->nfaAction->getAllLevelRole($param);
					//print_r($getLevels);
					$approver_level = $getLevels[0]->level;
				}
				//echo $salient_id;
				$mRecordLevelsObj = $this->nfaAction->getAllLevelRole_approvers('',$salient_id,"bidder_contract","view",$approver_level);
				$mRecordLevels = json_decode(json_encode($mRecordLevelsObj), true);	
				
				// echo "<pre>"; print_r($mRecordLevelsObj); die;	
				$data['mRecordLevels'] = $mRecordLevels;
				
				
				
				//print_r($this->db->last_query());
				//print_r($mRecordApproverDetails);
				$data['mRecord'] = $mRecord;
				$data['mRecordAwdContract'] = $mRecordAwdContract;
				$data['mRecordMajorTerms'] = $mRecordMajorTerms;
				$data['mRecordApproverDetails'] = $mRecordApproverDetails; 
				
				//$data['controller'] = $this; 
						if($pgType=='A' || $pgType=='E' )
						{
							$data['pgType'] = $pgType; 
							$data['mId'] = $mId; 
						}
						$this->load->view('nfa/descoping_iom/view_logs', $data);
			}
        } else {
            $this->load->view('index', $data);
        } 
      
    }
    public function reports()
    {
        $mSessionKey = $this->session->userdata('session_id');
		
        if ($mSessionKey) {
            $data['home'] = "reports";
			$nfaStatus = $this->input->post('nfaStatus');
			$buyer_id = $this->input->post('buyer_id');
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			//if($nfaType=='')
				//$nfaType="Initiated";
			$data['records'] = $this->descoping_iom_model->getReportData($nfaStatus,$buyer_id,$start_date,$end_date);
			
			$data['recordBuyers'] = displayReportUsers();
			$data['buyer_id'] = $buyer_id;
			$data['start_date'] = $start_date;
			$data['end_date'] = $end_date;
			$data['nfaStatus'] = $nfaStatus;
			
		
			$nfa_select = nfa_dropdown_reports("bidder_contract");
			$data['nfa_select'] = $nfa_select;
		
			
			$this->load->view('nfa/descoping_iom/reports', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	public function export_csv(){ 
		/* file name */
		//echo "test";
		$filename = 'users_'.date('Ymd').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
	   /* get data */
		//$records = $this->descoping_iom_model->getReportData($nfaStatus,$buyer_id,$start_date,$end_date);
		/* file creation */
		//$file = fopen('php:/* output*/','w'); 
		$file = fopen("php://output", 'w');
		$header = array("Sl. No","ENFA No.","Subject","Budget","NFA Status"); 
		//$records = array("Username1","Name1","Gender1","Email1"); 
		$data1 = $this->input->post('data1');	
		$records = json_decode($data1,true);
		//print_r($records);
		//exit;
		fputcsv($file, $header);
		$excel_arr = array();
		$slno = 1;
		foreach ($records as $key=>$line){ 
			$excel_arr = array();
			$excel_arr[$slno] = $slno++;
			$excel_arr['version_id'] = $line['version_id'];
			$excel_arr['subject'] = $line['subject'];
			$excel_arr['budget'] = $line['budget_with_escalation'];
			if($line['status']==1 && $line['nfa_status']=='A' )
				$statusNfa = "Approved";
			else
				$statusNfa = "Pending";
			$excel_arr['statusNfa '] = $statusNfa;
			//print_r($line);
			fputcsv($file,$excel_arr); 
		}
		fclose($file); 
		//return;
		exit; 
	}
	public function export_csv1(){ 
		 header('Content-Type: application/vnd.ms-excel');  
		 header('Content-disposition: attachment; filename='.rand().'.xls');  
		 //print_r($_GET);
		 //echo $data; 
		 //echo $_GET["data"];
		$data = $this->input->post('data');	
		echo $data;	
		exit;		
	}
	
	public function export_csv2(){ 
		 header('Content-Type: text/csv; charset=utf-8');

		header('Content-Disposition: attachment; filename=DevelopersData.csv');
		
		$output = fopen("php://output", "w");
		fputcsv($output, array('Id','Name','Skills','Address', 'Designation'));
		$records = $this->input->post('data1');
		/* $sql = "SELECT * FROM `developers`";
		/* $qry = mysqli_query($con, $sql);
		while($row= mysqli_fetch_assoc($qry))
		{
			fputcsv($output, $row);
		} */ 
		fclose($output);
	}
    public function esign()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            // $data['home'] = "reports";
            $data['records'] = $this->buyer->getAllParent();
            $this->load->view('nfa/esign', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	/*public function getLevelRole()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            // $data['home'] = "reports";
            $data['records'] = $this->descoping_iom_model->getAllLevelRole();
            //$this->load->view('nfa/esign', $data);
        } else {
            //$this->load->view('index', $data);
        }
    }*/
	public function getRoleUsers() {
        $role = $this->input->post('role');
		//echo "role".$role;
		//$contract_value = $this->input->post('contract_value');
        if ($role) {
			$tbl = "buyers";
			$fields = 'buyer_id,buyer_name';
			$where = array("buyer_role"=>$role);
			$order_by = 'buyer_name asc';
            $getUsers = $this->common->select_fields_where($tbl, $fields, $where, '', '', '', '','',$order_by);
			//print
			//echo $role = $getUsers->role;
            $result = '<option disabled="" selected="" value="" disabled="">Select Users</option>';
            foreach ($getUsers as $key => $valUser) {
                $result = $result . "<option value='" . $valUser->buyer_id . "'>" . $valUser->buyer_name . "</option>" . PHP_EOL;
            }
            echo $result;
        } else {
            echo "<option>No data</option>";
        }
		
    }
	public function getMaxLevelApprovers() {
		
       
		$package_value = $this->input->post('package_value');
		//exit;
		$pgType = $this->input->post('pgType');
		$result  = array();
		
			
        if ($package_value) {
			
            //$getConditions = $this->descoping_iom_model->getApprover_conditions($package_value);
			$getConditions = $this->descoping_iom_model->getApprover_conditions();
			
            foreach ($getConditions as $key => $valConditions) {
				$condition3 = $valConditions['condition3'];
				//echo $condition3."condition3";
				$condition1 = $valConditions['condition1'];
				//echo "<br>....".$condition1."condition1";
				$condition2 = $valConditions['condition2'];
				if($valConditions['condition2']!='')
				{
					
					$checkCond =  eval("return ($package_value.$condition2 && $package_value.$condition1) ;");
					
					if($checkCond)
					{
						//echo "first".$condition_l1;
						$level_max =  $valConditions['max_level'];
						break;
					} 
				}
				else
				{
					
					$checkCond =  eval("return ($package_value.$condition1);");
					
					if($checkCond)
					{	
						//echo $package_value.$valConditions['condition1'];
						//echo "second".$condition_l1;
						$level_max =  $valConditions['max_level'];
						//echo "max level".$level_max;
						//return;
						break;
					} 
					
				}
                //$result = $result . "<option value='" . $valUser->buyer_id . "'>" . $valUser->buyer_name . "</option>" . PHP_EOL;
            }
			
			
			//Print level
			$param = array("level<="=>$level_max);
			$getLevels = $this->nfaAction->getApproverLevelRole($param);
			$result_maxLevel = '<option disabled="" selected="" value="" disabled="">Select Level</option>';
			foreach ($getLevels as $key => $valLevel) {
                $result_maxLevel = $result_maxLevel . "<option value='" . $valLevel->role . "'>Level " . $valLevel->level . "({$valLevel->role})</option>" . PHP_EOL;
            }
			
        } 
		$result['data1'] = $result_maxLevel;
		//echo "level max".$level_max;
		if($pgType!="edit")
		{
			$result_approverList="";
			$result_approverList .= '<input type="hidden"  name="maxLevel_hd" id="maxLevel_hd" value="'.$level_max.'" >';
			for ($i = 1; $i <= $level_max; $i++) {
									   

				$result_approverList .= '<div class="col-lg-2" id="level'.$i.'_div">
					<div class=\'form-group\'>
						<label id="level'.$i.'_id">Level - '.$i.'</label>
						<input type="text" class="form-control" placeholder="" name="level'.$i.'_approver" id="level'.$i.'_approver" required="" readonly>
						<input type="hidden" class="form-control" placeholder="" name="level'.$i.'_approver_id" id="level'.$i.'_approver_id">
					</div>
				</div>';
									   
			}
			//$result['string'] = $string;
			$result['data2'] = $result_approverList;
		}
		//print_r($result);
		//exit;
		echo json_encode($result); 
		
    }
}