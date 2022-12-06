<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/ListNfa.php");

class Award_contract extends ListNfa   
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
        $this->load->model('Award_recomm_contract_model', 'awardRecommContract');
        $this->load->helper('date');
        error_reporting(0);
        
    }

    public function award_recommendation()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "award_recommendation";
            $data['records'] = $this->awardRecommContract->getAllParent();
            $this->load->view('nfa/award_contract/award_recommendation_menu', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionAdd($project_id='',$zone='',$type_work_id='')
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
			$data['project_id'] = $project_id;
			$data['zone'] = $zone;
			$data['type_work_id'] = $type_work_id;
            $data['home'] = "award_recommendation";
            $data['records'] = $this->awardRecommContract->getAllParent();
            $this->load->view('nfa/award_contract/award_contract_add', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	
	 public function actionEdit($mId,$updType='') {
		
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
			$data['home'] = "award_recommendation";
            if ($mId) {
                $mRecord = $this->awardRecommContract->getParentByKey($mId);
				
				$salient_id = $mRecord['id'];
				$mRecordPackage = $this->awardRecommContract->get_award_contract_package_data($salient_id);
			
				//Get Final Bid Data
				$mRecordFinalBidders = $this->awardRecommContract->getFinalBidders($salient_id);
				
				$mRecordAwdContract = $this->awardRecommContract->get_award_contract_data($salient_id);
			
				$mRecordAppointment = $this->awardRecommContract->getAppointment_dates($mId);
				$mRecordMajorTerms = $this->awardRecommContract->getMajorTerms($mId);
				//print_r($mRecordMajorTerms);
			
				$mRecordApprovers = $this->awardRecommContract->get_level_approvers($mId); 
				
                $data['mRecord'] = $mRecord;
				$data['mRecordPackage'] = $mRecordPackage;
				$data['mRecordFinalBidders'] = $mRecordFinalBidders;
				$data['mRecordAwdContract'] = $mRecordAwdContract;
				$data['mRecordAppointment'] = $mRecordAppointment;
				$data['mRecordMajorTerms'] = $mRecordMajorTerms;
				$data['mRecordApprovers'] = $mRecordApprovers; 
				$data['updType'] = $updType;
				
                $this->load->view('nfa/award_contract/award_contract_edit', $data);
            } else {
                redirect('nfa/awardRecommContract');
            }
        } else {
            $this->load->view('index', $data);
        }
    }
	
	public function actionSave($mId = null) {
		
        $mSessionKey = $this->session->userdata('session_id');
		$reasonLabel = array ("Delay due to Contractor","Delay due to Company","Delay due to other reasons (beyond the control of Contractors/Company)","Impact on OC/Handover Timelines" );
		
		$updType = $this->input->post('updType');
		
        if ($mSessionKey) {
            $data['home'] = "users";
			
			$this->load->helper('string');
			$project_id = $this->input->post('project_id');
			$type_work_id = $this->input->post('type_work_id');
			
			if($mId=='')
			{
				$version_dt =  date("Ymdhis");
				$version_id =  "arc".$version_dt."_00";
				
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
			
			$subject = $this->input->post('subject_hd');
			$scope_of_work = $this->input->post('scope_of_work');
			$zone = $this->input->post('zone');
			
			$l1_vendor = $this->input->post('l1_vendor');
            $front_idling = $this->input->post('front_idling');
           
            $detailed_note = $this->input->post('detailed_note');
			$current_status_work = $this->input->post('current_status_work_hd');
            $reasons_delay = $this->input->post('reasons_delay_hd');   
			//Synopsis Label
			$synopsis_label = $this->input->post('synopsis_label');
			
            $package_label = $this->input->post('package_label');
						
            $benchmark_label = $this->input->post('benchmark_label');
			
            $package_budget_esc = $this->input->post('package_budget_esc');
           
            $package_negot_value = $this->input->post('package_negot_value');
			
			
            $finalized_award_value_package = $this->input->post('finalized_award_value_package');
           			
			$awarded_benchmark_package = $this->input->post('awarded_benchmark_package');
			
			$total_basic_rate_package = $this->input->post('total_basic_rate_package');
			
			$anticipate_basic_rate_package = $this->input->post('anticipate_basic_rate_package');
           
            $post_basic_rate_package = $this->input->post('post_basic_rate_package');
			
			
			$expected_savings_package = $this->input->post('expected_savings_package');
          
			
			$recomm_vendor_package = $this->input->post('recomm_vendor_package');
            $basis_award_package = $this->input->post('basis_award_package');
			
			
			$deviation_approved_package = $this->input->post('deviation_approved_package');
          
			$basic_rate_month_package = $this->input->post('basic_rate_month_package');
			
			//Total values in Synopsis Package
			$package_count  = ($this->input->post('package_count'))+1;
			$bidder_count  = ($this->input->post('bidder_count'))+1;
			$total_budget_esc  = $this->input->post('total_budget_esc');
			$total_negot_value = $this->input->post('total_negot_value');
			$total_finalized_award_value  = $this->input->post('total_finalized_award_value');
			$total_awarded_benchmark  = $this->input->post('total_awarded_benchmark');
			$total_basic_rate  = $this->input->post('total_basic_rate');
			$total_anticipated_rate  = $this->input->post('total_anticipated_rate');
			$total_post_basic_rate  = $this->input->post('total_post_basic_rate');
			$total_expected_savings  = $this->input->post('total_expected_savings');
			$total_finalized_award_value = (float)$total_finalized_award_value;
			//Apointment Data
			$contract_package_works_label = $this->input->post('contract_package_works_label');
			$milestone_label = $this->input->post('milestone_label');
            $contract_package_works_value = $this->input->post('contract_package_works_value');
            $contract_package_works_remarks = $this->input->post('contract_package_works_remarks');
			
			$activity_planned_date = $this->input->post('activity_planned_date');
            $activity_planned_remarks = $this->input->post('activity_planned_remarks');
            $activity_actual_date = $this->input->post('activity_actual_date');
			
			$activity_actual_remarks = $this->input->post('activity_actual_remarks');
            $activity_cbe_date = $this->input->post('activity_cbe_date');
			$activity_cbe_remarks = $this->input->post('activity_cbe_remarks');
			
			$activity_delay = $this->input->post('activity_delay');
            $activity_delay_remarks = $this->input->post('activity_delay_remarks');
			
			//Final Bid
			
            $final_bidder_name = $this->input->post('final_bidder_name');
			
			$score_type = $this->input->post('score_type');
            $score = $this->input->post('score');
           
			$package_gpl_budget = $this->input->post('package_gpl_budget');
			
            $package_bidder = $this->input->post('package_bidder');
			
			$total_amt_gpl = $this->input->post('total_amt_gpl');
			$total_amt_bidder = $this->input->post('total_amt_bidder');
			
            $bid_position = $this->input->post('bid_position');
            
            $diff_budget_crs = $this->input->post('diff_budget_crs');
			
            $diff_budget_percentage = $this->input->post('diff_budget_percentage');
           
			
			//Award Efficiency
			
            $receipt_date = $this->input->post('receipt_date');
            $receipt_days = $this->input->post('receipt_days');
			
			$bidder_approval_date = $this->input->post('bidder_approval_date');
            $bidder_approval_days = $this->input->post('bidder_approval_days');
            $award_recomm_date = $this->input->post('award_recomm_date');
			
			$award_recomm_days = $this->input->post('award_recomm_days');
            $remarks_date = $this->input->post('remarks_date');
			$remarks_days = $this->input->post('remarks_days');
			
			//Major terms
			$term_label = $this->input->post('term_label');
			$term = $this->input->post('term');
            $term_label_value = $this->input->post('term_label_value');
			
			$maxLevel_hd = $this->input->post('maxLevel_hd');
		                     
			//Upload Files
			$mUpload1 = $this->input->post('upload_comparitive');
			//$file1
			
			
			if ($_FILES['upload_comparitive']['size'] != 0)
				$mFile1 = single_File_Upload('upload_comparitive', $mUpload1);
				
			
			$mUpload2 = $this->input->post('upload_detailed');
			
			$mFile2 =single_File_Upload('upload_detailed', $mUpload2);
			
			//Approvers
			$approver_id = $this->input->post('approver_id');
			
			$nfa_status = $this->input->post('nfa_status');
			
			$save_status = $this->input->post('save');
			
			//Getting Package Value
			
			$package_value_mail = $total_post_basic_rate;
			$mail_url  = $this->config->item('base_url').'nfa/Award_contract/initiated_nfa';
			if($save_status=="")
				$save_status = $this->input->post('submit');
			
			
			if($nfa_status=="RT")
			{
				
				$mSavingStatus = 1;
				if($save_status=="submit")
				{
					$mNfaStatus = "SA";
				}
				else
					$mNfaStatus = "RT";
			}
			else if($nfa_status=="R") // for return
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
			else if($nfa_status=="AMD") // for amend
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
							'project_id' => $project_id,
							'type_work_id' => $type_work_id,
                            'subject' => $subject,
							'scope_of_work'=>$scope_of_work,
							'zone'=>$zone,
							'package_count' => $package_count,
							'bidder_count' => $bidder_count,
							'total_budget_esc' => $total_budget_esc,
							'total_negot_value' => $total_negot_value,
							'total_finalized_award_value' => $total_finalized_award_value,
                            'total_awarded_benchmark' => $total_awarded_benchmark,
							'total_basic_rate' => $total_basic_rate,
                            'total_anticipated_rate' => $total_anticipated_rate,
							'total_post_basic_rate' => $total_post_basic_rate,
							'total_expected_savings' => $total_expected_savings,
							'l1_vendor' => $l1_vendor,
                            'front_idling' => $front_idling,
                            'front_idling_desc' => $front_idling_desc,
							'reasons_delay' => $reasons_delay,
                            'current_status_work' => $current_status_work,
							
                            'detailed_note' => $detailed_note,
							'initiated_by' => $mSessionKey,
							'status' => $mSavingStatus,
							'nfa_status' => $mNfaStatus
							
							
                    );
					
                    $mUpdate = $this->awardRecommContract->updateParentByKey($mId, $nfadata);
					if($mNfaStatus == "SA")
					{
						$nfaLogData = array(
							'salient_id' => $mId,
							'buyer_id' => $mSessionKey,
                           
                            'nfa_status' => 'SA',
							'status_date' => date('Y-m-d H:i:s'),
							'created_date' => date('Y-m-d H:i:s')							
                            
						);
						//$mLogNfaIns = $this->awardRecommContract->nfaLogs_insertData($mId, $nfaLogData);
						
					}
					$nfaLabeldata = array(
							
							'synopsis_label' => $synopsis_label,
                           
                            'benchmark_label' => $benchmark_label                           
                            
                    );
					$insUpd=$this->awardRecommContract->awardSynopsLbl_updateOrInsertData($mId,$nfaLabeldata);
					
					
					$isExistPackages=$this->awardRecommContract->checkPackageDelete($mId);
					$isExistSynopsPkg=$this->awardRecommContract->checkSynopsPackageDelete($mId);
					
					foreach($package_label as $keyPck=>$valPck)
					{
						
						$radioIndex = $keyPck+1;
					
						$is_basic_rate_package = $this->input->post('group_'.$radioIndex);
						if($is_basic_rate_package=="yes")
						{
							$total_basic_rate_packageVal = $total_basic_rate_package[$keyPck];
					 
							$anticipate_basic_rate_packageVal = $anticipate_basic_rate_package[$keyPck];
						}
						else
						{
							$total_basic_rate_packageVal = 0;
					 
							$anticipate_basic_rate_packageVal = 0;
						}
						$major_term_label = $term_label[$keyPck];	
						$nfaPackageData = array(
						'salient_id' => $mId,
						'package_name' => $valPck,
						'major_term_label' => $major_term_label,
						'created_date' => date('Y-m-d H:i:s')
						);
						
						$mInsertPackage = $this->awardRecommContract->addPackages($nfaPackageData);
						
						
						//Insert Synopsis package data
						//Synopsis data
						$nfaSynopsisData = array(
						'salient_id' => $mId,
						'package_id' => $mInsertPackage,
						'package_budget_esc' => $package_budget_esc[$keyPck],
						'package_negot_value' => $package_negot_value[$keyPck],
					
						'finalized_award_value_package' => $finalized_award_value_package[$keyPck],
					  
						'awarded_benchmark_package' => $awarded_benchmark_package[$keyPck],
					
					    'is_basic_rate_package' => $is_basic_rate_package,
						'total_basic_rate_package' => $total_basic_rate_packageVal,
					 
						'anticipate_basic_rate_package' => $anticipate_basic_rate_packageVal,
						
						'post_basic_rate_package' => $post_basic_rate_package[$keyPck],
					 
						'total_package' => $total_package[$keyPck],
					
						'expected_savings_package' => $expected_savings_package[$keyPck],
					
						'recomm_vendor_package' => $recomm_vendor_package[$keyPck],
					   
						'basis_award_package' => $basis_award_package[$keyPck],
						
						'deviation_approved_package' => $deviation_approved_package[$keyPck],
						
						'basic_rate_month_package' => $basic_rate_month_package[$keyPck],
					             
						'created_date' => date('Y-m-d H:i:s')
						
					);
					
					$mInsertSynopsis = $this->awardRecommContract->addSynopsisPackage($nfaSynopsisData);
						
						
					}					
					
					
					//Update or insert award synopsis Data
				
					
					//Appointment Data
					$nfaAppointmentData = array(
						'salient_id' => $mId,
						'contract_package_works_label' => $contract_package_works_label,
						'milestone_label' => $milestone_label,
						'contract_package_works_value' => $contract_package_works_value,
						'contract_package_works_remarks' => $contract_package_works_remarks,
						'activity_planned_date' => $activity_planned_date,
						'activity_planned_remarks' => $activity_planned_remarks,
						'activity_actual_date' => $activity_actual_date,
						'activity_actual_remarks' => $activity_actual_remarks,
						'activity_cbe_date' => $activity_cbe_date,
						'activity_cbe_remarks' => $activity_cbe_remarks,
						'activity_delay' => $activity_delay,
						'activity_delay_remarks' => $activity_delay_remarks						
						
					);
					$insUpd=$this->awardRecommContract->awardAppointment_updateOrInsertData($mId,$nfaAppointmentData);
					
					//Award efficiency Data
					$nfaAwardData = array(
						'salient_id' => $mId,
						
						'receipt_date' => $receipt_date,
						'receipt_days' => $receipt_days,
						'bidder_approval_date' => $bidder_approval_date,
						'bidder_approval_days' => $bidder_approval_days,
						'award_recomm_date' => $award_recomm_date,
						'award_recomm_days' => $award_recomm_days,
						'remarks_date' => $remarks_date,
						'remarks_days' => $remarks_days
											
					);
					$insUpd=$this->awardRecommContract->awardEfficiency_updateOrInsertData($mId,$nfaAwardData);	
					
					//Final Bid Data
					$isExistBidders=$this->awardRecommContract->checkBiddersDelete($mId);
					$isExistFinalBid=$this->awardRecommContract->checkFinalBidDelete($mId);
					//foreach($final_bidder_name as $keyBid=>$valBid)
				
					$mRecordPackage = $this->awardRecommContract->get_award_contract_package_data($mId);
					
					foreach($final_bidder_name as $keyBid=>$valBid)
					{
						$bid_index = $keyBid+1;
						$package_id = $valPck['package_id'];
						
						$nfaFinalBidder = array(
					
					
						'salient_id' => $mId,
						'final_bidder_name' => $valBid,
						'score_type' => $score_type[$keyBid],
						'score' => $score[$keyBid],
						'total_amt_gpl' => $total_amt_gpl,
						'total_amt_bidder' => $total_amt_bidder[$keyBid],
						'bid_position' => $bid_position[$keyBid],			
						'diff_budget_crs' => $diff_budget_crs[$keyBid],
						'diff_budget_percentage' => $diff_budget_percentage[$keyBid],
						'created_date' => date('Y-m-d H:i:s')
						);
						
						$mInsertBidder = $this->awardRecommContract->addFinalBidders($nfaFinalBidder);
						$mRecordPackage = $this->awardRecommContract->get_award_contract_package_data($mId);
						
						foreach($mRecordPackage as $keyPck=>$valPck)
						{
							$package_id = $valPck['package_id'];
							$pck_index = $keyPck+1;
							
							$nfaFinalBidData = array(
							'salient_id' => $mId,
							'bidder_id' => $mInsertBidder,
							'package_id' => $package_id,
						
							'package_gpl_budget' => $package_gpl_budget[$keyPck],
							'package_bidder' => $package_bidder[$pck_index][$bid_index],
											
							'created_date' => date('Y-m-d H:i:s')
							);
							$mInsertFinalBid = $this->awardRecommContract->addFinalBidScenario($nfaFinalBidData);
						}
					} 
					
					//Major Terms
					$isExistMajorTerms=$this->awardRecommContract->checkMajorTermsDelete($mId);
					/*foreach($term as $keyTerm=>$valTerm)
					{
						$nfaMajorTermData = array(
						'salient_id' => $mId,
						'term' => $valTerm,
						'term_label_value' => $term_label_value[$keyTerm],
						'created_date' => date('Y-m-d H:i:s')
						);
						//print_r($uploadData);
						//Insert Major Term data
						$mInsertMajorTerm = $this->awardRecommContract->addMajorTerm($nfaMajorTermData);
					}*/
					//foreach($term as $keyTerm=>$valTerm)
					$term_index=0;
					
					foreach($term_label_value as $keyLabel=>$valLabel)
					{
						//Packages
						
						foreach($mRecordPackage as $keyPck=>$valPck)
						{
							$package_id = $valPck['package_id'];
						
							$nfaMajorTermData = array(
								'salient_id' => $mId,
								'package_id' => $package_id,
								'term' => $term[$term_index],
								'term_label_value' => $term_label_value[$keyLabel][$keyPck],
								'created_date' => date('Y-m-d H:i:s')
								);
								
							//Insert Major Term data
							$mInsertMajorTerm = $this->awardRecommContract->addMajorTerm($nfaMajorTermData);
						}
						$term_index++;
					}					
					
					
					$uploadAllData = array(
						
						'upload_comparitive_name' => $mFile1['file_name'],
						'upload_comparitive_disp_name' => $this->input->post('upload_comparitive_disp_name'),
						'upload_comparitive_path' => $mFile1['file_path'],
						'upload_detailed_name' => $mFile2['file_name'],
						'upload_detailed_disp_name' => $this->input->post('upload_detailed_disp_name'),
						'upload_detailed_path' => $mFile2['file_path']
						
						
						
						);
					$uploadDisplayData = array(
						
						
						'upload_comparitive_disp_name' => $this->input->post('upload_comparitive_disp_name'),
						
						'upload_detailed_disp_name' => $this->input->post('upload_detailed_disp_name')
						
											
						
						
						);
					
					
					$uploadData = removeEmptyValues($uploadAllData);
					
					if(!empty($uploadAllData))
					{						
						$mUploadUpdate = $this->awardRecommContract->updateFileUploads($mId,$uploadData);
						$mUploadDispUpdate = $this->awardRecommContract->updateFileUploads($mId,$uploadDisplayData);
					}
					
					
					if($nfa_status!='RT')
					{
						
						$isExistApprover=$this->awardRecommContract->checkApproverDelete($mId);
						
						foreach($approver_id as $keyApr=>$valApr)
						{	
							
							$approver_id = $valApr;
							$approver_level = $keyApr+1;
							
							$approveData = array(
							'salient_id' => $mId,
							'approver_id' => $approver_id,
							'approver_level' => $approver_level,
							
							'created_date' => date('Y-m-d H:i:s')
					
							
							
							);
							
							$mNfaInsert = $this->awardRecommContract->addNfaStatus($approveData);
							
							//if($approver_level==1 && $mSavingStatus==1)
							if($approver_id !=0 && $mSavingStatus==1)
							{
								
								$buyer = $this->buyer->getParentByKey($approver_id);
								
								$approver =   $buyer['buyer_name'];
								$sender =   $this->session->userdata('session_name');
								
								
								$mail = sendEmailToApprover($subject,$package_value_mail,$version_id,$approver,$sender,$mail_url);
								
							}
						}
					 //exit;	
					}
                    if ($mUpdate) {
						
						
						if($mSavingStatus==0)
							$this->session->set_flashdata('success', 'IOM updated successfully.');
						else
							$this->session->set_flashdata('success', 'IOM submitted for approval.');
						
						redirect("nfa/Award_contract/award_recomm_contract_list/$project_id/$zone/$type_work_id");
						
                    } else {
                        $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                        redirect('nfa/awardRecommContract/actionEdit/' . $mId);
                    }
                } else {
						   
                        $nfadata = array(
							'version_id' => $version_id,
							'project_id' => $project_id,
							'type_work_id' => $type_work_id,
                            'subject' => $subject,
							'scope_of_work'=>$scope_of_work,
							'zone'=>$zone,
							'package_count' => $package_count,
                            'bidder_count' => $bidder_count,
							'total_budget_esc' => $total_budget_esc,
							'total_negot_value' => $total_negot_value,
							'total_finalized_award_value' => $total_finalized_award_value,
                            'total_awarded_benchmark' => $total_awarded_benchmark,
							'total_basic_rate' => $total_basic_rate,
                            'total_anticipated_rate' => $total_anticipated_rate,
							'total_post_basic_rate' => $total_post_basic_rate,
							'total_expected_savings' => $total_expected_savings,
							
							'l1_vendor' => $l1_vendor,
                            'front_idling' => $front_idling,
                            'front_idling_desc' => $front_idling_desc,
							'reasons_delay' => $reasons_delay,
                            'current_status_work' => $current_status_work,
							//'term_label' => $term_label,
                            'detailed_note' => $detailed_note,
							'upload_comparitive_name' => $mFile1['file_name'],
							'upload_comparitive_disp_name' => $this->input->post('upload_comparitive_disp_name'),
							'upload_comparitive_path' => $mFile1['file_path'],
							'upload_detailed_name' => $mFile2['file_name'],
							'upload_detailed_disp_name' => $this->input->post('upload_detailed_disp_name'),
							'upload_detailed_path' => $mFile2['file_path'],
                           
							'initiated_by' => $mSessionKey,
							'status' => $mSavingStatus,
							'nfa_status' => $mNfaStatus,
                            'initiated_date' => date('Y-m-d H:i:s'),
                            'created_date' => date('Y-m-d H:i:s')
                            
                        );
						
                        $mInsert = $this->awardRecommContract->addParent($nfadata);
                        if ($mInsert) {
							
							//Insert Logs
							if($mNfaStatus == "SA")
							{
								$nfaLogData = array(
									'salient_id' => $mInsert,
									'buyer_id' => $mSessionKey,
								   
									'nfa_status' => 'SA',
									'status_date' => date('Y-m-d H:i:s'),
									'created_date' => date('Y-m-d H:i:s')							
									
								);
								//$mLogNfaIns = $this->awardRecommContract->nfaLogs_insertData($mInsert, $nfaLogData);
								
							}
							//exit;
							$nfaLabeldata = array(
							'salient_id' => $mInsert,
							'synopsis_label' => $synopsis_label,
                           
                            'benchmark_label' => $benchmark_label,
                            'created_date' => date('Y-m-d H:i:s')
                            
                        );
						
                        $mInsertLabel = $this->awardRecommContract->addLabels($nfaLabeldata);
						
						//Packages
						foreach($package_label as $keyPck=>$valPck)
						{
							
							$radioIndex = $keyPck+1;
							$is_basic_rate_package = $this->input->post('group_'.$radioIndex);
							//Get anticipated/otal based on the radio button selected
							if($is_basic_rate_package=="yes")
							{
								$total_basic_rate_packageVal = $total_basic_rate_package[$keyPck];
						 
								$anticipate_basic_rate_packageVal = $anticipate_basic_rate_package[$keyPck];
							}
							else
							{
								$total_basic_rate_packageVal = 0;
						 
								$total_basic_rate_packageVal = 0;
							}
							$major_term_label = $term_label[$keyPck];	
							$nfaPackageData = array(
							'salient_id' => $mInsert,
							'package_name' => $valPck,
							'major_term_label' => $major_term_label,
							'created_date' => date('Y-m-d H:i:s')
							);
							$mInsertPackage = $this->awardRecommContract->addPackages($nfaPackageData);
						
							//Insert Synopsis package data
						
							$nfaSynopsisData = array(
							'salient_id' => $mInsert,
							'package_id' => $mInsertPackage,
                            'package_budget_esc' => $package_budget_esc[$keyPck],
							'package_negot_value' => $package_negot_value[$keyPck],
							
                            'finalized_award_value_package' => $finalized_award_value_package[$keyPck],
                          
							'awarded_benchmark_package' => $awarded_benchmark_package[$keyPck],
							
                            'is_basic_rate_package' => $is_basic_rate_package,
							'total_basic_rate_package' => $total_basic_rate_packageVal,
                         
                            'anticipate_basic_rate_package' => $anticipate_basic_rate_packageVal,
							
                            'post_basic_rate_package' => $post_basic_rate_package[$keyPck],
                         
							'total_package' => $total_package[$keyPck],
                        
                            'expected_savings_package' => $expected_savings_package[$keyPck],
						
                            'recomm_vendor_package' => $recomm_vendor_package[$keyPck],
                           
							'basis_award_package' => $basis_award_package[$keyPck],
                            
                            'deviation_approved_package' => $deviation_approved_package[$keyPck],
							
							'basic_rate_month_package' => $basic_rate_month_package[$keyPck],
							
                                                 
                            'created_date' => date('Y-m-d H:i:s')
                            
                        );
						
                        $mInsertSynopsis = $this->awardRecommContract->addSynopsisPackage($nfaSynopsisData);
												
							
						}					
					
						
						
						//Appointment Data- if totla finalized_award_value>3  crore
						if($total_finalized_award_value>3)
						{
							$nfaAppointmentData = array(
								'salient_id' => $mInsert,
								'contract_package_works_label' => $contract_package_works_label,
								'milestone_label' => $milestone_label,
								'contract_package_works_value' => $contract_package_works_value,
								'contract_package_works_remarks' => $contract_package_works_remarks,
								'activity_planned_date' => $activity_planned_date,
								'activity_planned_remarks' => $activity_planned_remarks,
								'activity_actual_date' => $activity_actual_date,
								'activity_actual_remarks' => $activity_actual_remarks,
								'activity_cbe_date' => $activity_cbe_date,
								'activity_cbe_remarks' => $activity_cbe_remarks,
								'activity_delay' => $activity_delay,
								'activity_delay_remarks' => $activity_delay_remarks,
								'created_date' => date('Y-m-d H:i:s')
								
							);
							
							$mInsertAppointment = $this->awardRecommContract->addAppointment($nfaAppointmentData);
						}
						//Award efficiency Data
						$nfaAwardData = array(
							'salient_id' => $mInsert,
                          
                            'receipt_date' => $receipt_date,
                            'receipt_days' => $receipt_days,
							'bidder_approval_date' => $bidder_approval_date,
                            'bidder_approval_days' => $bidder_approval_days,
                            'award_recomm_date' => $award_recomm_date,
							'award_recomm_days' => $award_recomm_days,
                            'remarks_date' => $remarks_date,
                            'remarks_days' => $remarks_days,
							
                            'created_date' => date('Y-m-d H:i:s')
                            
                        );
						
                        $mInsertAward = $this->awardRecommContract->addAwardEfficiency($nfaAwardData);
						
							
						//Final Bid
						foreach($final_bidder_name as $keyBid=>$valBid)
						{
							$bid_index = $keyBid+1;
							
							$nfaFinalBidder = array(
						
						
							'salient_id' => $mInsert,
							'final_bidder_name' => $valBid,
							'score_type' => $score_type[$keyBid],
							'score' => $score[$keyBid],
							'total_amt_gpl' => $total_amt_gpl,
							//'total_amt_bidder' => 100,
							'total_amt_bidder' => $total_amt_bidder[$keyBid],
							'bid_position' => $bid_position[$keyBid],		
							'diff_budget_crs' => $diff_budget_crs[$keyBid],
							'diff_budget_percentage' => $diff_budget_percentage[$keyBid],
							'created_date' => date('Y-m-d H:i:s')
							);
							
							$mInsertBidder = $this->awardRecommContract->addFinalBidders($nfaFinalBidder);
							$mRecordPackage = $this->awardRecommContract->get_award_contract_package_data($mInsert);
						
							foreach($mRecordPackage as $keyPck=>$valPck)
							{
								$package_id = $valPck['package_id'];
								$pck_index = $keyPck+1;
								
								$nfaFinalBidData = array(
								'salient_id' => $mInsert,
								'bidder_id' => $mInsertBidder,
								'package_id' => $package_id,
								
								'package_gpl_budget' => $package_gpl_budget[$keyPck],
								'package_bidder' => $package_bidder[$pck_index][$bid_index],
								'created_date' => date('Y-m-d H:i:s')
								);
								$mInsertFinalBid = $this->awardRecommContract->addFinalBidScenario($nfaFinalBidData);
							}
						} 
					
						//Major Terms
						
						$term_index=0;
						
						foreach($term_label_value as $keyLabel=>$valLabel)
						{
							
							//Packages
							
							foreach($mRecordPackage as $keyPck=>$valPck)
							{
								$nfaMajorTermData = array(
									'salient_id' => $mInsert,
									'package_id' => $valPck['package_id'],
									'term' => $term[$term_index],
									'term_label_value' => $term_label_value[$keyLabel][$keyPck],
									'created_date' => date('Y-m-d H:i:s')
									);
									
								//Insert Major Term data
								$mInsertMajorTerm = $this->awardRecommContract->addMajorTerm($nfaMajorTermData);
								
							}
							$term_index++;
												
						}
						/*foreach($term as $keyTerm=>$valTerm)
						{
							$nfaMajorTermData = array(
							'salient_id' => $mInsert,
							'term' => $valTerm,
							'term_label_value' => $term_label_value[$keyTerm],
							'created_date' => date('Y-m-d H:i:s')
							);
							//print_r($uploadData);
							//Insert Major Term data
							$mInsertMajorTerm = $this->awardRecommContract->addMajorTerm($nfaMajorTermData);
						}*/
						//exit;
								
								//Insert Approvers
							
								$isExistApprover=$this->awardRecommContract->checkApproverDelete($mInsert);
								
								foreach($approver_id as $keyApr=>$valApr)
								{	
									
									$approver_id = $valApr;
									$approver_level = $keyApr+1;
									
									$approveData = array(
									'salient_id' => $mInsert,
									'approver_id' => $approver_id,
									'approver_level' => $approver_level,
									//'approved_date' => date('Y-m-d H:i:s'),
									'created_date' => date('Y-m-d H:i:s')
																									
									);
									
									$mNfaInsert = $this->awardRecommContract->addNfaStatus($approveData);
									
									//if($approver_level==1 && $mSavingStatus==1)
									if($approver_id !=0 && $mSavingStatus==1)
									{
										
										$buyer = $this->buyer->getParentByKey($approver_id);
										
										//print_r($this->session->userdata);
										$approver =   $buyer['buyer_name'];
										$sender =   $this->session->userdata('session_name');
										
										
										$mail = sendEmailToApprover($subject,$package_value_mail,$version_id,$approver,$sender,$mail_url);
										
									}
								}
								//print_r($approveData);
									//exit;
							if($updType=="RF")
							{
								$nfadata = array(
									'status' => 2);
								$mUpdate = $this->awardRecommContract->updateParentByKey($mId, $nfadata);
								$this->session->set_flashdata('success', 'IOM refloated successfully.');
								redirect("nfa/Award_contract/award_recomm_contract_list/$project_id/$zone/$type_work_id");
							}
							else
							{
								
								$this->session->set_flashdata('success', 'IOM added successfully.');
								redirect("nfa/Award_contract/award_recomm_contract_list/$project_id/$zone/$type_work_id");
							}
                        } else {
                            $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                           redirect('nfa/Award_contract/actionAdd');
                        }
                   
                }
        
        } else {
			
            $this->load->view('index', $data);
        }
	
    }
	//Insert Major Terms
	/*public function addMajorTermsPackage()
	{

		foreach($term_label as $labelIndex=>$labelVal)
		{
			
			
				$total_basic_rate_packageVal = $total_basic_rate_package[$keyPck];
		
				$anticipate_basic_rate_packageVal = $anticipate_basic_rate_package[$keyPck];
		}
	}*/
	/*foreach($term as $keyTerm=>$valTerm)
	{
		$nfaMajorTermData = array(
		'salient_id' => $mInsert,
		'term' => $valTerm,
		'term_label_value' => $term_label_value[$keyTerm],
		'created_date' => date('Y-m-d H:i:s')
		);
		//print_r($uploadData);
		//Insert Major Term data
		$mInsertMajorTerm = $this->awardRecommContract->addMajorTerm($nfaMajorTermData);
	}*/
//}
	
    public function award_recomm_contract_list($project_id='',$zone='',$type_work_id='')
    {
        $mSessionKey = $this->session->userdata('session_id');
		
        if ($mSessionKey) {
			
			$data['hd_awdType'] = "Contract";
			$data['hd_project_id'] = $project_id;
			$data['hd_zone'] = $zone;
			$data['hd_type_work_id'] = $type_work_id;
			$data['projects'] = $this->projects->getAllParent();
            //$data['records'] = $this->awardRecommContract->getAllParent();
			$awdType = "Contract";
			$data['records'] = $this->awardRecommContract->getContractData($awdType,$project_id,'',$zone);
			//$nfa_select = nfa_dropdown_draft("award_contract");
			//$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/award_contract/award_contract_listing', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	//View NFA Details
    public function view_nfa($mId,$pgType='')
    {
		$mSessionKey = $this->session->userdata('session_id');
		$mSessionRole = $this->session->userdata('session_role');
		if ($mSessionKey) {
		
		if ($mId) {
			
			$mRecord = $this->nfaAction->get_salient_initiator($mId,"award_contract");
			
			$salient_id = $mRecord['id'];
			$mRecordPackage = $this->awardRecommContract->get_award_contract_package_data($salient_id);
			$mRecordAwdContract = $this->awardRecommContract->get_award_contract_data($salient_id);
			$mRecordFinalBidders = $this->awardRecommContract->getFinalBidders($salient_id);
			
			$mRecordAppointment = $this->awardRecommContract->getAppointment_dates($mId);
			$mRecordMajorTerms = $this->awardRecommContract->getMajorTerms($mId);
			
			if($mSessionRole!='PCM')
			{
				$param = array("role"=>$mSessionRole);
				$getLevels = $this->nfaAction->getAllLevelRole($param);
				
				$approver_level = $getLevels[0]->level;
			}
			
			//echo $salient_id;
			$mRecordLevelsObj = $this->nfaAction->getAllLevelRole_approvers('',$salient_id,"award_contract","view",$approver_level);
			
			$mRecordLevels = json_decode(json_encode($mRecordLevelsObj), true);
			//echo "approver_level".$approver_level;
			if($approver_level>=1)
				$data['preChkRecords'] = $this->nfaAction->chkPreApproved($salient_id,$approver_level,"award_contract");
			else
				$data['preChkRecords']=1;
			
			$data['mRecord'] = $mRecord;
			$data['mRecordPackage'] = $mRecordPackage;
			$data['mRecordAwdContract'] = $mRecordAwdContract;
			$data['mRecordFinalBidders'] = $mRecordFinalBidders;
			$data['mRecordAppointment'] = $mRecordAppointment;
			$data['mRecordMajorTerms'] = $mRecordMajorTerms;
			$data['mRecordLevels'] = $mRecordLevels;
			
			/* $data['mRecordApprovers'] = $mRecordApprovers; 
			$data['mRecordApproverDetails'] = $mRecordApproverDetails;  */
		
		
				if($pgType=='A' || $pgType=='E' )
				{
					$data['pgType'] = $pgType; 
					$data['mId'] = $mId; 
				}
				$this->load->view('nfa/award_contract/award_contract_view', $data);
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
            $data['records'] = $this->nfaAction->getAllInitiated($mSessionKey,"award_contract");
			//print_r($data['records'][0]);
			$approver_level = $data['records'][0]['approver_level'];
			$salient_id = $data['records'][0]['id'];
			if($approver_level>1)
				$data['preChkRecords'] = $this->nfaAction->chkPreApproved($salient_id,$approver_level,"award_contract");
			else
				$data['preChkRecords']=1;
			
			
			
			$selUrl =   $_SERVER['REQUEST_URI'];
							
			$current_page = base_url('nfa/Award_contract/initiated_nfa');
			
			if(strpos($current_page, $selUrl) !== false)
				$selOption="selected";
			else
				$selOption="";
			
			$nfa_select = nfa_dropdown_initiated("award_contract");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/award_contract/initiated', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	public function return_nfa($mId)
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $mRecord = $this->nfaAction->getNfaInitiated($mId,$mSessionKey,"award_contract");
		
			$approver_level = $mRecord[0]['approver_level'];
			$mRecordApprovers = $this->nfaAction->getNfaStatus($mId,$mSessionKey,$approver_level,'',"award_contract");
			$data['mRecord'] = $mRecord[0];
			$data['mRecordApprovers'] = $mRecordApprovers;
            $this->load->view('nfa/award_contract/return', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	public function actionReturnNfa($mId) {
		
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
				$mUpdate = $this->nfaAction->updateData($param, $returnData,"award_contract");
				if ($mUpdate) {
						//echo "updated";
						$nfadata = array(
						
						'nfa_status' => 'R'
											
					);
						$mUpdateSalient = $this->awardRecommContract->updateParentByKey($mId, $nfadata);
						if($mUpdateSalient)
						{
							$mail_type = "returnLowLevels";
							$this->mail_details($mId, $returned_remarks,$mail_type);
							
						}
						//exit;
						$this->session->set_flashdata('success', 'IOM Returned successfully.');
						redirect('nfa/Award_contract/initiated_nfa');
				} else {
						$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
						redirect('nfa/Award_contract/return_nfa/' . $mId);
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
			$selUrl =   base_url('nfa/Award_contract/returned_nfa');									
			
			$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			if($current_page==$selUrl)
				$selOption="selected";
			else
				$selOption="";
			
			$nfa_select = nfa_dropdown_returned("award_contract");
			$data['nfa_select'] = $nfa_select;
            $data['records'] = $this->nfaAction->getReturnedNfa("award_contract");
            $this->load->view('nfa/award_contract/returned', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
    public function approved_nfa()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "approved";
			
            $data['records'] = $this->nfaAction->getNfaApproved($mSessionKey,"award_contract");
			$selUrl =   base_url('nfa/Award_contract/approved_nfa');									
			
			$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			if($current_page==$selUrl)
				$selOption="selected";
			else
				$selOption="";
			
			$nfa_select = nfa_dropdown_approved("award_contract");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/award_contract/approved', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
    public function approve($mId)
    {
         $mSessionKey = $this->session->userdata('session_id');
		
        if ($mSessionKey) {
           
			if ($mId) {
				$mRecord = $this->nfaAction->getNfaInitiated($mId,$mSessionKey,"award_contract");
				
				$approver_level = $mRecord[0]['approver_level'];
				$mRecordApprovers = $this->nfaAction->getNfaStatus($mId,$mSessionKey,$approver_level,'',"award_contract");
				$param = array('salient_id' => $mId,'approver_id!=' => '');
			
				$data['mRecord'] = $mRecord[0];
				$data['mRecordApprovers'] = $mRecordApprovers;
				
				
				$this->load->view('nfa/award_contract/approve', $data);
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
				//Get Max level approver
				$param = array('salient_id' => $mId,'approver_id!=' => '','approver_id!=' => 0);
				$recordLevel = $this->nfaAction->getMaxApproverLevel($param,"award_contract");
				
				$max_level = $recordLevel['approver_level'];
				
				$approvedata = array(
						'approved_status' => 1,
						'approved_remarks' => $this->input->post('approved_remarks'),
						'approved_date' => date('Y-m-d H:i:s')
						
					);
				$param = array('salient_id' => $mId,
						'approver_id' => $mSessionKey
						);	
				$mUpdate = $this->nfaAction->updateData($param, $approvedata,"award_contract");
				if ($mUpdate) {
						
						if ($mId) {
							$mail_user = array();
							
							$mRecord = $this->nfaAction->getNfaDetails_userLevel($mId,$mSessionKey,"award_contract");
							//print_r($mRecord);
							//exit;
							$initiated_by = $mRecord['initiated_by'];
							$approver_level = $mRecord['approver_level'];
							$mRecordAwdContract = $this->awardRecommContract->get_award_contract_data($mId);
							if($approver_level==$max_level)
							{
								$nfadata = array(
									'nfa_status' => 'A'
													
								);
								$mUpdateSalient = $this->awardRecommContract->updateParentByKey($mId, $nfadata);
							}
							$buyer = $this->buyer->getParentByKey($initiated_by);
							//print_r($buyer);
							//echo "<br>....<br>";
										
							//print_r($this->session->userdata);
							$initiator =   $buyer['buyer_name'];
							$sender =   $this->session->userdata('session_name');
							$subject = $mRecord['subject'];
							$project_id = $mRecord['project_id'];
							$type_work_id = $mRecord['type_work_id'];
							$zone = $mRecord['zone'];
							//$package_value_mail = $mRecordAwdContract['post_basic_rate_package1'];
							$package_value_mail = $mRecord['total_post_basic_rate'];
							$version_id = $mRecord['version_id'];
							$approver_level = $mRecord['approver_level'];
							$mail_user[$initiator] = $buyer['buyer_email'];
							if($approver_level>1)
							{
								
								$mRecordUsers = $this->nfaAction->get_low_level_users($mId,$approver_level,"award_contract");
								foreach ($mRecordUsers as $key => $val) {
									$buyer_name = $val['buyer_name'];
									$mail_user[$buyer_name] = $val['buyer_email'];
								}
								
								
							}
							
							
							$mail_url  = $this->config->item('base_url').'nfa/Award_contract/view_nfa/'.$mId;
							//send mail to level below
							$mail_type = "LowLevels";
							$mail = sendEmailToUsers($subject,$package_value_mail,$version_id,$mail_user,$sender,$mail_url,'',$mail_type);
							
						}
						$this->session->set_flashdata('success', 'IOM Approved successfully.');
						//redirect('nfa/ListNfa/award_recomm_list');
						redirect("nfa/Award_contract/award_recomm_contract_list/$project_id/$zone/$type_work_id");
				} else {
						$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
						redirect('nfa/Award_contract/approve/' . $mId);
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
				$mRecord = $this->nfaAction->getNfaInitiated($mId,$mSessionKey,"award_contract");
				//print_r($mRecord);
				$approver_level = $mRecord[0]['approver_level'];
				$mRecordApprovers = $this->nfaAction->getNfaStatus($mId,$mSessionKey,$approver_level,'',"award_contract");
				$data['mRecord'] = $mRecord[0];
				$data['mRecordApprovers'] = $mRecordApprovers;
				$this->load->view('nfa/award_contract/return_text_correction', $data);
			}
			
			
        } else {
            $this->load->view('index', $data);
        }
    }
	//action for return text correction
	public function actionReturnText($mId) {
		
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
				$mUpdate = $this->nfaAction->updateData($param, $returnData,"award_contract");
				if ($mUpdate) {
						//echo "updated";
						$nfadata = array(
						'nfa_status' => 'RT'
											
					);
						$mUpdateSalient = $this->awardRecommContract->updateParentByKey($mId, $nfadata);
						//exit;
						$this->session->set_flashdata('success', 'IOM Returned for text correction successfully.');
						redirect('nfa/Award_contract/initiated_nfa');
				} else {
						$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
						redirect('nfa/Award_contract/return_text/' . $mId);
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
			
            $mRecord = $this->nfaAction->getNfaDraft($mId,$mSessionKey,"award_contract");
			//print_r($mRecord);
			if($mRecord)
			{
				$approver_level = $mRecord[0]['approver_level'];
				$mRecordApprovers = $this->nfaAction->getNfaStatus($mId,$mSessionKey,$approver_level,"draft","award_contract");
				//print_r($mRecordApprovers);
				$data['mRecord'] = $mRecord[0];
				$data['mRecordApprovers'] = $mRecordApprovers;
			}
			else
			{
				$mRecord = $this->awardRecommContract->getParentByKey($mId);
				//print_r($mRecord);	
				$data['mRecord'] = $mRecord;
			}

            $this->load->view('nfa/award_contract/cancel', $data);
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
						$mUpdateSalient = $this->awardRecommContract->updateParentByKey($mId, $nfadata);
						//exit;
						if ($mUpdateSalient) {
							$this->session->set_flashdata('success', 'IOM Cancelled  successfully.');
							redirect('nfa/Award_contract/award_recomm_contract_list');
						}
						else {
							$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
							redirect('nfa/Award_contract/cancel/' . $mId);
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
            $mRecord = $this->awardRecommContract->getParentByKey($mId);
			
			$data['mRecord'] = $mRecord;
			//$data['mRecordApprovers'] = $mRecordApprovers;
            $this->load->view('nfa/award_contract/amend', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	//Amend Action
	public function actionAmendNfa($mId) {
		//echo "test";
		//exit;
		$mSessionKey = $this->session->userdata('session_id');
	
		if ($mSessionKey) {
			$data['home'] = "users";
			if ($mId) {
				/* $amendData = array(
						
						'amended_by' => $mSessionKey,
						'amended_remarks' => $this->input->post('amended_remarks'),
						'amended_date' => date('Y-m-d H:i:s')
						
					);
				$param = array('salient_id' => $mId,
						'approver_id' => $mSessionKey
						);	
				$mUpdate = $this->nfaAction->updateData($param, $amendData,"award_contract"); */
				//if ($mUpdate) {
				//echo "updated";
				$nfadata = array(
				
				'nfa_status' => 'AMD',
				'amended_by' => $mSessionKey,
				'amended_remarks' => $this->input->post('amended_remarks'),
				'amended_date' => date('Y-m-d H:i:s')
									
			);
				$mUpdateSalient = $this->awardRecommContract->updateParentByKey($mId, $nfadata);
				//exit;
				if($mUpdateSalient)
				{
					$this->session->set_flashdata('success', 'IOM amended successfully.');
					redirect('nfa/Award_contract/approved_nfa');
				} else {
					$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
					redirect('nfa/Award_contract/amended_nfa/' . $mId);
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
			$data['records'] = $this->nfaAction->getNfaData($param,"award_contract");
			$selUrl =   base_url('nfa/Award_contract/amended_nfa');
									
			$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			if($current_page==$selUrl)
				$selOption="selected";
			else
				$selOption="";
			
			//echo $selOption."sel";
			$nfa_select = nfa_dropdown_amended("award_contract");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/award_contract/amended', $data);
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
            $data['records'] = $this->nfaAction->getNfaData($param,"award_contract");
			$selUrl =   base_url('nfa/Award_contract/cancelled_nfa');
									
			//echo $current_page = $config['base_url'].$_SERVER['REDIRECT_QUERY_STRING'];
			$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			if($current_page==$selUrl)
				$selOption="selected";
			else
				$selOption="";
			
			//echo $selOption."sel";
			//$nfa_select = nfa_dropdown_cancelled($selOption);
			$nfa_select = nfa_dropdown_cancelled("award_contract");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/award_contract/cancelled', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	public function mail_details($mId=null,$returned_remarks=null,$mail_type=null)
    {
		if ($mId) {
				$mail_user = array();
				$mSessionKey = $this->session->userdata('session_id');
				$mRecord = $this->nfaAction->getNfaDetails_userLevel($mId,$mSessionKey,"award_contract");
				//print_r($mRecord);
				//exit;
				$initiated_by = $mRecord['initiated_by'];
				$mRecordAwdContract = $this->awardRecommContract->get_award_contract_data($mId);
				$buyer = $this->buyer->getParentByKey($initiated_by);
				//print_r($buyer);
				//echo "<br>....<br>";
							
				//print_r($this->session->userdata);
				$initiator =   $buyer['buyer_name'];
				$sender =   $this->session->userdata('session_name');
				$subject = $mRecord['subject'];
				//$package_value_mail = $mRecordAwdContract['post_basic_rate_package1'];
				$package_value_mail = $mRecord['total_post_basic_rate'];
				$version_id = $mRecord['version_id'];
				$approver_level = $mRecord['approver_level'];
				$mail_user[$initiator] = $buyer['buyer_email'];
				if($approver_level>1)
				{
					//echo "level";
					$mRecordUsers = $this->nfaAction->get_low_level_users($mId,$approver_level,"award_contract");
					foreach ($mRecordUsers as $key => $val) {
						$buyer_name = $val['buyer_name'];
						$mail_user[$buyer_name] = $val['buyer_email'];
					}
					//print_r($mRecordUsers);
					
				}
				
				//echo $str_mail_user = implode(",",$mail_user);
				//exit;
				$mail_url  = $this->config->item('base_url').'nfa/Award_contract/view_nfa/'.$mId;
				//send mail to level below
				//$mail_type = "LowLevels";
				//$mail = sendEmailToUsers($subject,$package_value_mail,$version_id,$mail_user,$sender,$mail_url,'',$mail_type);
				$mail = sendEmailToUsers($subject,$package_value_mail,$version_id,$mail_user,$sender,$mail_url,$returned_remarks,$mail_type);
				/* $mRecord = $this->awardRecommContract->getParentByKey($mId);
				$initiated_by = $mRecord['initiated_by'];
				$mRecordAwdContract = $this->awardRecommContract->get_award_contract_data($mId);
				$buyer = $this->buyer->getParentByKey($initiated_by);
							
				//print_r($this->session->userdata);
				$initiator =   $buyer['buyer_name'];
				$sender =   $this->session->userdata('session_name');
				$subject = $mRecord['subject'];
				$package_value_mail = $mRecordAwdContract['post_basic_rate_package1'];
				$version_id = $mRecord['version_id'];
				$mail_url  = $this->config->item('base_url').'nfa/Award_contract//view_nfa/'.$mId;
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
			
            $data['records'] = $this->nfaAction->getNfaData('',"award_contract");
			//$mRecordAwdContract = $this->awardRecommContract->get_award_contract_data($salient_id);
			//$selUrl =   base_url('nfa/Award_contract/nfa_logs');									
			
			//$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			$selUrl =   $_SERVER['REQUEST_URI'];
			
			$current_page = base_url('nfa/Award_contract/nfa_logs');
			if(strpos($current_page, $selUrl) !== false)
				$selOption="selected";
			else
				$selOption="";
			
			$nfa_select = nfa_dropdown_logs("award_contract");
			$data['nfa_select'] = $nfa_select;
			$data['mRecordAwdContract'] = $mRecordAwdContract;
            $this->load->view('nfa/award_contract/nfa_logs', $data);
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
				$mRecord = $this->nfaAction->get_salient_initiator($mId,"award_contract");
				//print_r($mRecord);
				$salient_id = $mRecord['id'];
				
				
				$mRecordLevelsObj = $this->nfaAction->getAllLevelRole_approvers('',$salient_id,"award_contract","view");
				$mRecordLevels = json_decode(json_encode($mRecordLevelsObj), true);
				
				//$mRecordLogs = $this->nfaAction->getNfa_logs($salient_id,"award_contract");
				
				$data['mRecord'] = $mRecord;
				
				$data['mRecordLevels'] = $mRecordLevels; 
				//$data['mRecordLogs'] = $mRecordLogs; 
				
				if($pgType=='A' || $pgType=='E' )
				{
					$data['pgType'] = $pgType; 
					$data['mId'] = $mId; 
				}
				$this->load->view('nfa/award_contract/view_logs', $data);
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
			
			$data['records'] = $this->awardRecommContract->getReportData($nfaStatus,$buyer_id,$start_date,$end_date);
			
			$data['recordBuyers'] = displayReportUsers();
			$data['buyer_id'] = $buyer_id;
			$data['start_date'] = $start_date;
			$data['end_date'] = $end_date;
			$data['nfaStatus'] = $nfaStatus;
			
			
			
			
			$nfa_select = nfa_dropdown_reports("award_contract");
			$data['nfa_select'] = $nfa_select;
		
			//exit;
			$this->load->view('nfa/award_contract/reports', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	public function export_csv(){ 
		/* file name */
		
		$filename = 'users_'.date('Ymd').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
	   /* get data */
		
		$file = fopen("php://output", 'w');
		$header = array("Sl. No","ENFA No.","Subject","Award Synopsis","NFA Status"); 
		
		$data11 = $this->input->post('data1');	
		//echo "data testing----";
		//print_r($data11);
		$records1 = json_decode($data11,true);
		//echo "testing----";
		//echo 
		//print_r($records1);
		//exit;
		fputcsv($file, $header);
		$excel_arr = array();
		$slno = 1;
		foreach ($records1 as $key=>$line){ 
			$excel_arr = array();
			$excel_arr[$slno] = $slno++;
			$excel_arr['version_id'] = $line['version_id'];
			$excel_arr['subject'] = strip_tags($line['subject']);
			$excel_arr['synopsis_label'] = $line['synopsis_label'];
			if($line['status']==1 && $line['nfa_status']=='A' )
				$statusNfa = "Approved";
			else if($line['nfa_status']=='C' )
				$statusNfa = "Cancelled";
			else
				$statusNfa = "Pending";
			$excel_arr['nfa_status'] = $statusNfa;
			
			fputcsv($file,$excel_arr); 
		}
		fclose($file); 
		
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
            $data['records'] = $this->awardRecommContract->getAllLevelRole();
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
	//Get Final bid Data
	public function getFinalBidData($salient_id,$package_id=null,$bidder_id=null) {
		$mRecordFinalBid = $this->awardRecommContract->get_award_contract_FinalBid($salient_id,$package_id,$bidder_id);
		return $mRecordFinalBid;
		
    }
	
	//Get Min bidder data
	public function package_min_bidder_data($salient_id=null,$package_id=null) {
		$mRecordMinBid = $this->awardRecommContract->get_min_bidder_data($salient_id,$package_id);
		return $mRecordMinBid;
	}
	
	//Display packages in Final bid
	public function show_package_bidders() {
		
		$package_name = $this->input->post('package_name');
		$package_index = $this->input->post('package_index');
		$package_row ="";
		//print_r($package_name);
			
        if ($package_name) {
			 //foreach ($package_name as $keyPck => $valPck) {
				 $pck_index = $keyPck+1;
				 $package_row.="
												<td>".$package_name."</td>
												<td><input type='text' oninput='allowNumOnly(this)' onblur='changeToCr(this);getGplBudget_total();' class='form-control' name='package_gpl_budget[]' id='package_gpl_budget".$package_index."'></td>
												<td><input type='text' oninput='allowNumOnly(this)' onblur='changeToCr(this);getBidders_total();' class='form-control package_common_tower_label_custom_td' name='package_bidder[".$package_index."][1]' id='package_bidder_".$package_index."_1'></td>
											   
								";
			// }
            
		}
		//echo json_encode($result); 
		//echo json_encode("test"); 
		echo $package_row; 
		
    }
	//Display packages in Final bid
	public function show_package_bidders1() {
		
		$package_name = $this->input->post('package_name');
		$bidder_count = $this->input->post('bidder_count');
		$finalized_award_value = $this->input->post('finalized_award_value');
		$package_row ="";
					
        if ($package_name) {
			
			$pck_index = 1;
			$package_row.="<td>".$package_name."<input type='hidden' name='package_name_bid_hd' id='package_name_bid_hd".$pck_index."' value='".$package_name."'></td>
			<td><input type='text' oninput='allowNumOnly(this);decimalStrict();' onblur='changeToCr(this);getGplBudget_total();' class='form-control decimalStrictClass' name='package_gpl_budget[]' id='package_gpl_budget1' required readonly></td>";
			for($bid_index=1;$bid_index<=$bidder_count;$bid_index++)
			{
				/*if($bid_index==1)
				{
					$package_row.="<td><input type='text' oninput='allowNumOnly(this);decimalStrict();' onblur='changeToCr(this);getBidders_total();' class='form-control decimalStrictClass' name='package_bidder[".$pck_index."][".$bid_index."]' id='package_bidder_".$pck_index."_".$bid_index."' value='".$finalized_award_value."' required readonly></td>	
				";
				}
				else*/
					$package_row.="<td><input type='text' oninput='allowNumOnly(this);decimalStrict();' onblur='changeToCr(this);getBidders_total();' class='form-control decimalStrictClass' name='package_bidder[".$pck_index."][".$bid_index."]' id='package_bidder_".$pck_index."_".$bid_index."' required></td>	
				";
			}
            
		}
		//echo "test bidders";
		echo $package_row; 
		
    }

	public function show_package_bidders2() {
		
		$package_name = $this->input->post('package_name');
		$bidder_count = $this->input->post('bidder_count');
		$finalized_award_value = $this->input->post('finalized_award_value');
		$package_row2="";
		
			
        if ($package_name) {
			
			$pck_index = 2;
			$package_row2.="
			<td>".$package_name."<input type='hidden' name='package_name_bid_hd' id='package_name_bid_hd".$pck_index."' value='".$package_name."'></td>
			<td><input type='text' oninput='allowNumOnly(this);decimalStrict();' onblur='changeToCr(this);getGplBudget_total();' class='form-control decimalStrictClass' name='package_gpl_budget[]' id='package_gpl_budget2' required readonly></td>";
			for($bid_index=1;$bid_index<=$bidder_count;$bid_index++)
			{
				/*if($bid_index==2)
				{
					$package_row2.="<td><input type='text' oninput='allowNumOnly(this);decimalStrict();' onblur='changeToCr(this);getBidders_total();' class='form-control decimalStrictClass' name='package_bidder[".$pck_index."][".$bid_index."]' id='package_bidder_".$pck_index."_".$bid_index."' value='".$finalized_award_value."' required readonly></td>	
				";
				}
				else
				{*/
					$package_row2.="<td><input type='text' oninput='allowNumOnly(this);decimalStrict();' onblur='changeToCr(this);getBidders_total();' class='form-control decimalStrictClass' name='package_bidder[".$pck_index."][".$bid_index."]' id='package_bidder_".$pck_index."_".$bid_index."' required></td>	
				";
				//}
				
			}
			//<td><input type='text' oninput='allowNumOnly(this);decimalStrict();' onblur='changeToCr(this);getBidders_total();' class='form-control decimalStrictClass' name='package_bidder[".$pck_index."][1]' id='package_bidder_".$pck_index."_1' required></td>
			            
		}
		
		echo $package_row2; 
		
    }
	public function show_package_bidders3() {
		
		$package_name = $this->input->post('package_name');
		$bidder_count = $this->input->post('bidder_count');
		$finalized_award_value = $this->input->post('finalized_award_value');
		$package_row3 ="";
		
        if ($package_name) {
			
			$pck_index = 3;
			$package_row3.="
			<td>".$package_name."<input type='hidden' name='package_name_bid_hd' id='package_name_bid_hd".$pck_index."' value='".$package_name."'></td>
			<td><input type='text' oninput='allowNumOnly(this);decimalStrict();' onblur='changeToCr(this);getGplBudget_total();' class='form-control decimalStrictClass' name='package_gpl_budget[]' id='package_gpl_budget3' required readonly></td>";
			for($bid_index=1;$bid_index<=$bidder_count;$bid_index++)
			{
				/*if($bid_index==3)
				{
					$package_row3.="<td><input type='text' oninput='allowNumOnly(this);decimalStrict();' onblur='changeToCr(this);getBidders_total();' class='form-control decimalStrictClass' name='package_bidder[".$pck_index."][".$bid_index."]' id='package_bidder_".$pck_index."_".$bid_index."' value='".$finalized_award_value."' required readonly></td>	
				";
				}
				else
				{*/
					$package_row3.="<td><input type='text' oninput='allowNumOnly(this);decimalStrict();' onblur='changeToCr(this);getBidders_total();' class='form-control decimalStrictClass' name='package_bidder[".$pck_index."][".$bid_index."]' id='package_bidder_".$pck_index."_".$bid_index."' required></td>	
				";	
				//}
			}
			//<td><input type='text' oninput='allowNumOnly(this);decimalStrict();' onblur='changeToCr(this);getBidders_total();' class='form-control decimalStrictClass' name='package_bidder[".$pck_index."][1]' id='package_bidder_".$pck_index."_1' required></td>
											   
								
            
		}
		
		echo $package_row3; 
		
    }
	public function getMaxLevelApprovers() {
		$result  = array();
		//print_r($result);
		//print_r($this->input->post());
		$l1_vendor1 = $this->input->post('l1_vendor1');
		$package_value = $this->input->post('package_value');
		$package_value = $package_value*10000000; 
		//echo $package_value;
		$salient_id = $this->input->post('salient_id');
		$pgType = $this->input->post('pgType');
		//$result  = array();
		//echo "package".$package_value;
			
        if ($package_value) {
			
             //echo "controller1";
			$getConditions = $this->awardRecommContract->getApprover_conditions($l1_vendor1);
			
            foreach ($getConditions as $key => $valConditions) {
				$condition3 = $valConditions['condition3'];
				
				$condition1 = $valConditions['condition1'];
				
				$condition2 = $valConditions['condition2'];
				if($valConditions['condition2']!='')
				{
					
					$checkCond =  eval("return ($l1_vendor1==$condition3) && ($package_value.$condition2 && $package_value.$condition1) ;");
					
					if($checkCond)
					{
						
						$level_max =  $valConditions['max_level'];
						break;
					} 
				}
				else
				{
					
					$checkCond =  eval("return ($l1_vendor1==$condition3) && ($package_value.$condition1);");
					
					if($checkCond)
					{	
						
						$level_max =  $valConditions['max_level'];
						
						break;
					} 
					
				}
               
            }
			
			
		
			//echo $level_max;
			 //$getLevels = $this->nfaAction->getAllLevelRole_approvers($level_max,$salient_id,"award_contract");
			 $getLevels = $this->nfaAction->getAllLevelRole_approvers($level_max,'',"award_contract");
			 //print_r($getLevels);
			 $result_approvers = '';
			 $mSessionZone = $this->session->userdata('session_zone');
			
			 foreach ($getLevels as $key => $valLevel) {
				 $role = $valLevel->role;
				 $approver_id = $valLevel->approver_id;
				 //$getUsers = $CI->getRoleUsers_approval($role,$mSessionZone);
				 $getUsers = $this->getRoleUsers_approval($role,$mSessionZone);
				 //print_r($this->db->last_query());
				
				
				$result_approvers .='<div id="pm" class="col-md-3 mb-3">
				<lable>'.$role.'</lable>
				<select name="approver_id[]"   class="form-control" required >
					<option disabled="" selected="" value="">Select</option>
					<option value="0">Not Applicable</option>';
				
					foreach ($getUsers as $keyUser => $valUser) {
						$buyer_id = $valUser->buyer_id;
						
					//$result_approvers .='<option value="'.$valUser->buyer_id.'"'. ($approver_id==$buyer_id) ? "selected": "".'>'.$valUser->buyer_name .'</option>';
					$result_approvers .='<option value="'.$valUser->buyer_id.'">'.$valUser->buyer_name .'</option>';
					}    
				$result_approvers .='</select>
				</div>';
		
				
			}
		
	   
        } 
		$result['data1'] = $result_approvers; 
		
		//echo json_encode($result); 
		//echo json_encode("test"); 
		echo $result_approvers; 
		
    }

}