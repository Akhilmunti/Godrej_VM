<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/ListNfa.php");

class Award_procurement extends ListNfa   
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
        $this->load->model('Award_procurement_model', 'awardRecommProcurement');
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

    public function award_recommendation()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "award_recommendation";
            $data['records'] = $this->awardRecommProcurement->getAllParent();
            $this->load->view('nfa/award_procurement/award_recommendation_menu', $data);
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
            $data['records'] = $this->awardRecommProcurement->getAllParent();
            $this->load->view('nfa/award_procurement/award_procurement_add', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	
	public function actionEdit($mId,$updType='') {
		
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "users";
            if ($mId) {
                $mRecord = $this->awardRecommProcurement->getParentByKey($mId);
				
				$salient_id = $mRecord['id'];
				$mRecordPackage = $this->awardRecommProcurement->get_award_procurement_package_data($salient_id);
				
				//Get Final Bid Data
				$mRecordFinalBidders = $this->awardRecommProcurement->getFinalBidders($salient_id);
				
				$mRecordAwdContract = $this->awardRecommProcurement->get_award_procurement_data($salient_id);
				
				$mRecordMajorTerms = $this->awardRecommProcurement->getMajorTerms($mId);
				
				$mRecordApprovers = $this->awardRecommProcurement->get_level_approvers($mId); 
				
                $data['mRecord'] = $mRecord;
				$data['mRecordPackage'] = $mRecordPackage;
				$data['mRecordFinalBidders'] = $mRecordFinalBidders;
				$data['mRecordAwdContract'] = $mRecordAwdContract;
				
				$data['mRecordMajorTerms'] = $mRecordMajorTerms;
				$data['mRecordApprovers'] = $mRecordApprovers; 
				$data['updType'] = $updType;
				
                $this->load->view('nfa/award_procurement/award_procurement_edit', $data);
            } else {
                redirect('nfa/award_procurement');
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
			
			if($mId=='')
			{
				$version_dt =  date("Ymdhis");
				$version_id =  "arp".$version_dt."_00";
				
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
			$project_id = $this->input->post('project_id');
			$type_work_id = $this->input->post('type_work_id');
			$subject = $this->input->post('subject_hd');
			$scope_of_work = $this->input->post('scope_of_work');
			$procurement_type = $this->input->post('procurement_type');
			$uom_label = $this->input->post('uom_label');
			$uom_value = $this->input->post('uom_value');
			$zone = $this->input->post('zone');
			
			$ho_approval = $this->input->post('ho_approval');
           
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
            //$anticipate_basic_rate_package2 = $this->input->post('anticipate_basic_rate_package2');
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
			print_r($term_label);
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
			$mail_url  = $this->config->item('base_url').'nfa/Award_procurement/initiated_nfa';
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
							//'version_id' => $version_id,
                            'project_id' => $project_id,
							'type_work_id' => $type_work_id,
                            'subject' => $subject,
							'scope_of_work'=>$scope_of_work,
							'procurement_type'=>$procurement_type,	
							'uom_label'=>$uom_label,	
							'uom_value'=>$uom_value,							
							'zone'=>$zone,
							'package_count' => $package_count,
							'bidder_count' => $bidder_count,
							'total_budget_esc' => $total_budget_esc,
							'total_negot_value' => $total_negot_value,
							'total_finalized_award_value' => $total_finalized_award_value,
                            'total_awarded_benchmark' => $total_awarded_benchmark,
							
							'total_post_basic_rate' => $total_post_basic_rate,
							'total_expected_savings' => $total_expected_savings,
							'ho_approval' => $ho_approval,
                          
                            'detailed_note' => $detailed_note,
							'initiated_by' => $mSessionKey,
							'status' => $mSavingStatus,
							'nfa_status' => $mNfaStatus
							
							
                    );
				
                    $mUpdate = $this->awardRecommProcurement->updateParentByKey($mId, $nfadata);
					$nfaLabeldata = array(
							
							'synopsis_label' => $synopsis_label,
                           
                            'benchmark_label' => $benchmark_label                           
                            
                    );
					$insUpd=$this->awardRecommProcurement->awardSynopsLbl_updateOrInsertData($mId,$nfaLabeldata);
					
					
					$isExistPackages=$this->awardRecommProcurement->checkPackageDelete($mId);
					$isExistSynopsPkg=$this->awardRecommProcurement->checkSynopsPackageDelete($mId);
					
					foreach($package_label as $keyPck=>$valPck)
					{
						
						$radioIndex = $keyPck+1;
					
						$is_basic_rate_package = $this->input->post('group_'.$radioIndex);
						$major_term_label = $term_label[$keyPck];	
						$nfaPackageData = array(
						'salient_id' => $mId,
						'package_name' => $valPck,
						'major_term_label' => $major_term_label,
						'created_date' => date('Y-m-d H:i:s')
						);
						
						$mInsertPackage = $this->awardRecommProcurement->addPackages($nfaPackageData);
						
						
						//Insert Synopsis package data
						//Synopsis data
						$nfaSynopsisData = array(
						'salient_id' => $mId,
						'package_id' => $mInsertPackage,
						'package_budget_esc' => $package_budget_esc[$keyPck],
						'package_negot_value' => $package_negot_value[$keyPck],
					
						'finalized_award_value_package' => $finalized_award_value_package[$keyPck],
					  
						'awarded_benchmark_package' => $awarded_benchmark_package[$keyPck],
						
						'total_basic_rate_package' => $total_basic_rate_package[$keyPck],
					 
						'anticipate_basic_rate_package' => $anticipate_basic_rate_package[$keyPck],
						
						'post_basic_rate_package' => $post_basic_rate_package[$keyPck],
					 
						'total_package' => $total_package[$keyPck],
					
						'expected_savings_package' => $expected_savings_package[$keyPck],
					
						'recomm_vendor_package' => $recomm_vendor_package[$keyPck],
					   						                        
						'created_date' => date('Y-m-d H:i:s')
						
					);
					
					$mInsertSynopsis = $this->awardRecommProcurement->addSynopsisPackage($nfaSynopsisData);
						
						
					}					
					
					
					//Update or insert award synopsis Data
								
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
					$insUpd=$this->awardRecommProcurement->awardEfficiency_updateOrInsertData($mId,$nfaAwardData);	
					
					//Final Bid Data
					$isExistBidders=$this->awardRecommProcurement->checkBiddersDelete($mId);
					$isExistFinalBid=$this->awardRecommProcurement->checkFinalBidDelete($mId);
				
					$mRecordPackage = $this->awardRecommProcurement->get_award_procurement_package_data($mId);
					
					
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
						
						$mInsertBidder = $this->awardRecommProcurement->addFinalBidders($nfaFinalBidder);
						$mRecordPackage = $this->awardRecommProcurement->get_award_procurement_package_data($mId);
					
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
							$mInsertFinalBid = $this->awardRecommProcurement->addFinalBidScenario($nfaFinalBidData);
						}
					} 
					
				
					//Major Terms
					$isExistMajorTerms=$this->awardRecommProcurement->checkMajorTermsDelete($mId);
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
							$mInsertMajorTerm = $this->awardRecommProcurement->addMajorTerm($nfaMajorTermData);
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
						
						'upload_detailed_disp_name' =>$this->input->post('upload_detailed_disp_name')
 						
						
						);
										
					$uploadData = removeEmptyValues($uploadAllData);
					
					if(!empty($uploadAllData))
					{						
						$mUploadUpdate = $this->awardRecommProcurement->updateFileUploads($mId,$uploadData);
						
					}
					
					$mUploadDispUpdate = $this->awardRecommProcurement->updateFileUploads($mId,$uploadDisplayData);
					
					if($nfa_status!='RT')
					{
						
						$isExistApprover=$this->awardRecommProcurement->checkApproverDelete($mId);
						
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
							
							$mNfaInsert = $this->awardRecommProcurement->addNfaStatus($approveData);
							
							if($approver_id !=0 && $mSavingStatus==1)
							{
								
								$buyer = $this->buyer->getParentByKey($approver_id);
								
								$approver =   $buyer['buyer_name'];
								$approver_mail =   $buyer['buyer_email'];
								$sender =   $this->session->userdata('session_name');
								
								
								$mail = sendEmailToApprover($subject,$package_value_mail,$version_id,$approver,$approver_mail,$sender,$mail_url);
								
							}
						}
						
					}
                    if ($mUpdate) {
						
						
						if($mSavingStatus==0)
							$this->session->set_flashdata('success', 'IOM updated successfully.');
						else
							$this->session->set_flashdata('success', 'IOM submitted for approval.');
						
						redirect("nfa/Award_procurement/award_recomm_procurement_list/$project_id/$zone/$type_work_id");
						
                    } else {
						
                        $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                        redirect('nfa/Award_procurement/actionEdit/' . $mId);
                    }
                } else {
						  
                        $nfadata = array(
							'version_id' => $version_id,
							'project_id' => $project_id,
							'type_work_id' => $type_work_id,
                            'subject' => $subject,
							'scope_of_work'=>$scope_of_work,
							'procurement_type'=>$procurement_type,	
							'uom_label'=>$uom_label,	
							'uom_value'=>$uom_value,	
							'zone'=>$zone,
							'package_count' => $package_count,
                            'bidder_count' => $bidder_count,
							'total_budget_esc' => $total_budget_esc,
							'total_negot_value' => $total_negot_value,
							'total_finalized_award_value' => $total_finalized_award_value,
                            'total_awarded_benchmark' => $total_awarded_benchmark,
						
							'total_post_basic_rate' => $total_post_basic_rate,
							'total_expected_savings' => $total_expected_savings,
							
							'ho_approval' => $ho_approval,
                          
							
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
						
                        $mInsert = $this->awardRecommProcurement->addParent($nfadata);
                        if ($mInsert) {
							
							$nfaLabeldata = array(
							'salient_id' => $mInsert,
							'synopsis_label' => $synopsis_label,
                           
                            'benchmark_label' => $benchmark_label,
                            'created_date' => date('Y-m-d H:i:s')
                            
                        );
						
                        $mInsertLabel = $this->awardRecommProcurement->addLabels($nfaLabeldata);
						
						//Packages
						
						foreach($package_label as $keyPck=>$valPck)
						{
							
							$radioIndex = $keyPck+1;
							$is_basic_rate_package = $this->input->post('group_'.$radioIndex);
							$major_term_label = $term_label[$keyPck];	
							$nfaPackageData = array(
							'salient_id' => $mInsert,
							'package_name' => $valPck,
							'major_term_label' => $major_term_label,
							'created_date' => date('Y-m-d H:i:s')
							);
							$mInsertPackage = $this->awardRecommProcurement->addPackages($nfaPackageData);
							
							//Insert Synopsis package data
						
							$nfaSynopsisData = array(
							'salient_id' => $mInsert,
							'package_id' => $mInsertPackage,
                            'package_budget_esc' => $package_budget_esc[$keyPck],
							'package_negot_value' => $package_negot_value[$keyPck],
							
                            'finalized_award_value_package' => $finalized_award_value_package[$keyPck],
                          
							'awarded_benchmark_package' => $awarded_benchmark_package[$keyPck],
							
							'total_basic_rate_package' => $total_basic_rate_package[$keyPck],
                         
                            'anticipate_basic_rate_package' => $anticipate_basic_rate_package[$keyPck],
							
                            'post_basic_rate_package' => $post_basic_rate_package[$keyPck],
                         
							'total_package' => $total_package[$keyPck],
                        
                            'expected_savings_package' => $expected_savings_package[$keyPck],
						
                            'recomm_vendor_package' => $recomm_vendor_package[$keyPck],
                                                                            
                            'created_date' => date('Y-m-d H:i:s')
                            
                        );
						
                        $mInsertSynopsis = $this->awardRecommProcurement->addSynopsisPackage($nfaSynopsisData);
							
							
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
						
                        $mInsertAward = $this->awardRecommProcurement->addAwardEfficiency($nfaAwardData);
						
							
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
						
							'total_amt_bidder' => $total_amt_bidder[$keyBid],
							'bid_position' => $bid_position[$keyBid],		
							'diff_budget_crs' => $diff_budget_crs[$keyBid],
							'diff_budget_percentage' => $diff_budget_percentage[$keyBid],
							'created_date' => date('Y-m-d H:i:s')
							);
							
							$mInsertBidder = $this->awardRecommProcurement->addFinalBidders($nfaFinalBidder);
							$mRecordPackage = $this->awardRecommProcurement->get_award_procurement_package_data($mInsert);
						
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
								$mInsertFinalBid = $this->awardRecommProcurement->addFinalBidScenario($nfaFinalBidData);
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
								$mInsertMajorTerm = $this->awardRecommProcurement->addMajorTerm($nfaMajorTermData);
								
							}
							$term_index++;
												
						}
																
								//Insert Approvers
							
								$isExistApprover=$this->awardRecommProcurement->checkApproverDelete($mInsert);
								
								foreach($approver_id as $keyApr=>$valApr)
								{	
									
									$approver_id = $valApr;
									$approver_level = $keyApr+1;
									
									$approveData = array(
									'salient_id' => $mInsert,
									'approver_id' => $approver_id,
									'approver_level' => $approver_level,
									
									'created_date' => date('Y-m-d H:i:s')
							
								
									);
									
									$mNfaInsert = $this->awardRecommProcurement->addNfaStatus($approveData);
									
									if($approver_level==1 && $mSavingStatus==1)
									{
										
										$buyer = $this->buyer->getParentByKey($approver_id);
										
										
										$approver =   $buyer['buyer_name'];
										$approver_mail =   $buyer['buyer_email'];
										$sender =   $this->session->userdata('session_name');
										
										
										$mail = sendEmailToApprover($subject,$package_value_mail,$version_id,$approver,$approver_mail,$sender,$mail_url);
										
									}
								}
								
							if($updType=="RF")
							{
								
								$nfadata = array(
									'status' => 2);
								$mUpdate = $this->awardRecommProcurement->updateParentByKey($mId, $nfadata);
								$this->session->set_flashdata('success', 'IOM refloated successfully.');
								redirect("nfa/Award_procurement/award_recomm_procurement_list/$project_id/$zone/$type_work_id");
							}
							else
							{
								if($mSavingStatus==0)
									$this->session->set_flashdata('success', 'IOM added successfully.');
								else if($mSavingStatus==1)
									$this->session->set_flashdata('success', 'IOM submitted for approval.');
								
								//$this->session->set_flashdata('success', 'IOM added successfully.');
								redirect("nfa/Award_procurement/award_recomm_procurement_list/$project_id/$zone/$type_work_id");
							}
                        } else {
                            $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                           redirect('nfa/Award_procurement/actionAdd');
                        }
                   
                }
        
        } else {
			
            $this->load->view('index', $data);
        }
		
    }
	
	
	public function award_recomm_procurement_list($project_id='',$zone='',$type_work_id='')
    {
		
        $mSessionKey = $this->session->userdata('session_id');
		$this->session->set_userdata('previous_url_proc', current_url());
		$pr_id = $this->uri->segment(4);
        if ($mSessionKey) {
			
			$data['hd_awdType'] = "Procurement";
			$data['hd_project_id'] = $project_id;
			$data['hd_zone'] = $zone;
			$data['hd_type_work_id'] = $type_work_id;
			$this->session->set_userdata('sess_project_id_proc',$pr_id);
			$data['projects'] = $this->projects->getAllParent();
			$awdType = "Procurement";
			$data['records'] = $this->awardRecommProcurement->getProcurementData($awdType,$project_id,$type_work_id,'',$zone);
			
			
            $this->load->view('nfa/award_procurement/award_recomm_procurement_list', $data);
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
				
				$mRecord = $this->nfaAction->get_salient_initiator($mId,"award_procurement");
				
				$salient_id = $mRecord['id'];
				$mRecordPackage = $this->awardRecommProcurement->get_award_procurement_package_data($salient_id);
				$mRecordAwdContract = $this->awardRecommProcurement->get_award_procurement_data($salient_id);
				$mRecordFinalBidders = $this->awardRecommProcurement->getFinalBidders($salient_id);
				
				$mRecordMajorTerms = $this->awardRecommProcurement->getMajorTerms($mId);
				if($mSessionRole!='PCM')
				{
					$param = array("role"=>$mSessionRole);
					$getLevels = $this->nfaAction->getAllLevelRole($param);
					
					$approver_level = $getLevels[0]->level;
				}
				
				$mRecordLevelsObj = $this->nfaAction->getAllLevelRole_approvers('',$salient_id,"award_procurement","view",$approver_level);
				$mRecordLevels = json_decode(json_encode($mRecordLevelsObj), true);
				if($approver_level>=1)
					$data['preChkRecords'] = $this->nfaAction->chkPreApproved($salient_id,$approver_level,"award_procurement");
				else
					$data['preChkRecords']=1;
				
				$data['mRecord'] = $mRecord;
				$data['mRecordPackage'] = $mRecordPackage;
				$data['mRecordAwdContract'] = $mRecordAwdContract;
				$data['mRecordFinalBidders'] = $mRecordFinalBidders;
				
				$data['mRecordMajorTerms'] = $mRecordMajorTerms;
				$data['mRecordLevels'] = $mRecordLevels;
				
			
				if($pgType=='A' || $pgType=='E' )
				{
					$data['pgType'] = $pgType; 
					$data['mId'] = $mId; 
				}
				$this->load->view('nfa/award_procurement/award_procurement_view', $data);
			}
        } else {
            $this->load->view('index', $data);
        } 
     
    }
    /*public function view_nfa_1($mId,$pgType='')
    {
		$mSessionKey = $this->session->userdata('session_id');
		if ($mSessionKey) {
		
			if ($mId) {
				
				$mRecord = $this->nfaAction->get_salient_initiator($mId,"award_procurement");
				
				$salient_id = $mRecord['id'];
				$mRecordPackage = $this->awardRecommProcurement->get_award_procurement_package_data($salient_id);
				$mRecordAwdContract = $this->awardRecommProcurement->get_award_procurement_data($salient_id);
				$mRecordFinalBidders = $this->awardRecommProcurement->getFinalBidders($salient_id);
			
				$mRecordMajorTerms = $this->awardRecommProcurement->getMajorTerms($mId);
				$mRecordLevelsObj = $this->nfaAction->getAllLevelRole_approvers('',$salient_id,"award_procurement","view");
				$mRecordLevels = json_decode(json_encode($mRecordLevelsObj), true);
				
				
				$data['mRecord'] = $mRecord;
				$data['mRecordPackage'] = $mRecordPackage;
				$data['mRecordAwdContract'] = $mRecordAwdContract;
				$data['mRecordFinalBidders'] = $mRecordFinalBidders;
				
				$data['mRecordMajorTerms'] = $mRecordMajorTerms;
				$data['mRecordLevels'] = $mRecordLevels;
				
				
				if($pgType=='A' || $pgType=='E' )
				{
					$data['pgType'] = $pgType; 
					$data['mId'] = $mId; 
				}
				$this->load->view('nfa/award_procurement/award_procurement_view', $data);
			}
        } else {
            $this->load->view('index', $data);
        } 
     
    }*/
	//Initiated NFA
	public function initiated_nfa()
    {
        $mSessionKey = $this->session->userdata('session_id');
		
        if ($mSessionKey && $mSessionRole != "PCM") {
            $data['home'] = "initiated";
            $data['records'] = $this->nfaAction->getAllInitiated($mSessionKey,"award_procurement");
			
			$approver_level = $data['records'][0]['approver_level'];
			$salient_id = $data['records'][0]['id'];
			if($approver_level>1)
				$data['preChkRecords'] = $this->nfaAction->chkPreApproved($salient_id,$approver_level,"award_procurement");
			else
				$data['preChkRecords']=1;
			
			
			
			$selUrl =   $_SERVER['REQUEST_URI'];
							
			$current_page = base_url('nfa/Award_procurement/initiated_nfa');
			
			if(strpos($current_page, $selUrl) !== false)
				$selOption="selected";
			else
				$selOption="";
			
			$nfa_select = nfa_dropdown_initiated("award_procurement");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/award_procurement/initiated', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	public function return_nfa($mId)
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $mRecord = $this->nfaAction->getNfaInitiated($mId,$mSessionKey,"award_procurement");
			
			$approver_level = $mRecord[0]['approver_level'];
			$mRecordApprovers = $this->nfaAction->getNfaStatus($mId,$mSessionKey,$approver_level,'',"award_procurement");
			$data['mRecord'] = $mRecord[0];
			$data['mRecordApprovers'] = $mRecordApprovers;
            $this->load->view('nfa/award_procurement/return', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	public function actionReturnNfa($mId) {
		
		$mSessionKey = $this->session->userdata('session_id');
		$sess_project_id = $this->session->userdata('sess_project_id_proc');
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
				$mUpdate = $this->nfaAction->updateData($param, $returnData,"award_procurement");
				if ($mUpdate) {
						
						$nfadata = array(
						
						'nfa_status' => 'R'
											
					);
						$mUpdateSalient = $this->awardRecommProcurement->updateParentByKey($mId, $nfadata);
						if($mUpdateSalient)
						{
							$mail_type = "returnLowLevels";
							$this->mail_details($mId, $returned_remarks,$mail_type);
							
						}
						$mRecord = $this->awardRecommContract->getParentByKey($mId);
						$project_id = $mRecord['project_id'];
						$type_work_id = $mRecord['type_work_id'];
						$zone = $mRecord['zone'];

						
						$this->session->set_flashdata('success', 'IOM Returned successfully.');
						if($sess_project_id)
							redirect("nfa/Award_procurement/award_recomm_procurement_list/$project_id/$zone/$type_work_id");
						else
							redirect("nfa/Award_procurement/award_recomm_procurement_list");

				} else {
						$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
						redirect('nfa/Award_procurement/return_nfa/' . $mId);
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
			$selUrl =   base_url('nfa/Award_procurement/returned_nfa');									
			
			$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			if($current_page==$selUrl)
				$selOption="selected";
			else
				$selOption="";
			
			$nfa_select = nfa_dropdown_returned("award_procurement");
			$data['nfa_select'] = $nfa_select;
            $data['records'] = $this->nfaAction->getReturnedNfa("award_procurement");
            $this->load->view('nfa/award_procurement/returned', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
    public function approved_nfa()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "approved";
			
            $data['records'] = $this->nfaAction->getNfaApproved($mSessionKey,"award_procurement");
			$selUrl =   base_url('nfa/Award_procurement/approved_nfa');									
			
			$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			if($current_page==$selUrl)
				$selOption="selected";
			else
				$selOption="";
			
			$nfa_select = nfa_dropdown_approved("award_procurement");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/award_procurement/approved', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
    public function approve($mId)
    {
         $mSessionKey = $this->session->userdata('session_id');
		
        if ($mSessionKey) {
           
			if ($mId) {
				$mRecord = $this->nfaAction->getNfaInitiated($mId,$mSessionKey,"award_procurement");
				
				$approver_level = $mRecord[0]['approver_level'];
				$mRecordApprovers = $this->nfaAction->getNfaStatus($mId,$mSessionKey,$approver_level,'',"award_procurement");
				$param = array('salient_id' => $mId,'approver_id!=' => '');
				
				$data['mRecord'] = $mRecord[0];
				$data['mRecordApprovers'] = $mRecordApprovers;
				
				$this->load->view('nfa/award_procurement/approve', $data);
			}
        } else {
            $this->load->view('index', $data);
        }
    }
	public function actionApprove($mId) {
		$mSessionKey = $this->session->userdata('session_id');
		$sess_project_id = $this->session->userdata('sess_project_id_proc');
		if ($mSessionKey) {
			$data['home'] = "users";
			if ($mId) {
				//Get Max level approver
				$param = array('salient_id' => $mId,'approver_id!=' => '','approver_id!=' => 0);
				$recordLevel = $this->nfaAction->getMaxApproverLevel($param,"award_procurement");
				
				$max_level = $recordLevel['approver_level'];
				
				$approvedata = array(
						'approved_status' => 1,
						'approved_remarks' => $this->input->post('approved_remarks'),
						'approved_date' => date('Y-m-d H:i:s')
						
					);
				$param = array('salient_id' => $mId,
						'approver_id' => $mSessionKey
						);	
				$mUpdate = $this->nfaAction->updateData($param, $approvedata,"award_procurement");
				if ($mUpdate) {
						
						if ($mId) {
							$mail_user = array();
							
							$mRecord = $this->nfaAction->getNfaDetails_userLevel($mId,$mSessionKey,"award_procurement");
							
							$initiated_by = $mRecord['initiated_by'];
							$approver_level = $mRecord['approver_level'];
							$mRecordAwdContract = $this->awardRecommProcurement->get_award_procurement_data($mId);
							if($approver_level==$max_level)
							{
								$nfadata = array(
									'nfa_status' => 'A'
													
								);
								$mUpdateSalient = $this->awardRecommProcurement->updateParentByKey($mId, $nfadata);
							}
							$buyer = $this->buyer->getParentByKey($initiated_by);
							
							$initiator =   $buyer['buyer_name'];
							$sender =   $this->session->userdata('session_name');
							$subject = $mRecord['subject'];
							$project_id = $mRecord['project_id'];
							$type_work_id = $mRecord['type_work_id'];
							$zone = $mRecord['zone'];
							$package_value_mail = $mRecord['total_post_basic_rate'];
							$version_id = $mRecord['version_id'];
							$approver_level = $mRecord['approver_level'];
							$mail_user[$initiator] = $buyer['buyer_email'];
							if($approver_level>1)
							{
								
								$mRecordUsers = $this->nfaAction->get_low_level_users($mId,$approver_level,"award_procurement");
								foreach ($mRecordUsers as $key => $val) {
									$buyer_name = $val['buyer_name'];
									$mail_user[$buyer_name] = $val['buyer_email'];
								}
															
							}
							
							
							$mail_url  = $this->config->item('base_url').'nfa/Award_procurement/view_nfa/'.$mId;
							//send mail to level below
							$mail_type = "LowLevels";
							$mail = sendEmailToUsers($subject,$package_value_mail,$version_id,$mail_user,$sender,$mail_url,'',$mail_type);
							
						}
						$this->session->set_flashdata('success', 'IOM Approved successfully.');
						if($sess_project_id)
							redirect("nfa/Award_procurement/award_recomm_procurement_list/$project_id/$zone/$type_work_id");
						else
							redirect("nfa/Award_procurement/award_recomm_procurement_list");
				} else {
						$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
						redirect('nfa/Award_procurement/approve/' . $mId);
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
           
			if ($mId) {
				$mRecord = $this->nfaAction->getNfaInitiated($mId,$mSessionKey,"award_procurement");
				
				$approver_level = $mRecord[0]['approver_level'];
				$mRecordApprovers = $this->nfaAction->getNfaStatus($mId,$mSessionKey,$approver_level,'',"award_procurement");
				$data['mRecord'] = $mRecord[0];
				$data['mRecordApprovers'] = $mRecordApprovers;
				$this->load->view('nfa/award_procurement/return_text_correction', $data);
			}
			
			
        } else {
            $this->load->view('index', $data);
        }
    }
	//action for return text correction
	public function actionReturnText($mId) {
		
		$mSessionKey = $this->session->userdata('session_id');
		$sess_project_id = $this->session->userdata('sess_project_id_proc');
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
				$mUpdate = $this->nfaAction->updateData($param, $returnData,"award_procurement");
				if ($mUpdate) {
						
						$nfadata = array(
						'nfa_status' => 'RT'
											
					);
						$mUpdateSalient = $this->awardRecommProcurement->updateParentByKey($mId, $nfadata);
						$mRecord = $this->awardRecommProcurement->getParentByKey($mId);
						$project_id = $mRecord['project_id'];
						$type_work_id = $mRecord['type_work_id'];
						$zone = $mRecord['zone'];
						$this->session->set_flashdata('success', 'IOM Returned for text correction successfully.');
						if($sess_project_id)
							redirect("nfa/Award_procurement/award_recomm_procurement_list/$project_id/$zone/$type_work_id");
						else
							redirect("nfa/Award_procurement/award_recomm_procurement_list");
				} else {
						$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
						redirect('nfa/Award_procurement/return_text/' . $mId);
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
			
            $mRecord = $this->nfaAction->getNfaDraft($mId,$mSessionKey,"award_procurement");
			
			$approver_level = $mRecord[0]['approver_level'];
			$mRecordApprovers = $this->nfaAction->getNfaStatus($mId,$mSessionKey,$approver_level,"draft","award_procurement");
			
			$data['mRecord'] = $mRecord[0];
			$data['mRecordApprovers'] = $mRecordApprovers;
            $this->load->view('nfa/award_procurement/cancel', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	public function actionCancelNfa($mId) {
		
		$mSessionKey = $this->session->userdata('session_id');
		$sess_project_id = $this->session->userdata('sess_project_id_proc');
		if ($mSessionKey) {
			$data['home'] = "users";
			if ($mId) {
				
						$nfadata = array(
						
						'nfa_status' => 'C',
						'cancelled_by' => $mSessionKey,
						'cancelled_remarks' => $this->input->post('cancelled_remarks'),
						'cancelled_date' => date('Y-m-d H:i:s')
											
					);
						$mUpdateSalient = $this->awardRecommProcurement->updateParentByKey($mId, $nfadata);
						$mRecord = $this->awardRecommProcurement->getParentByKey($mId);
						$project_id = $mRecord['project_id'];
						$type_work_id = $mRecord['type_work_id'];
						$zone = $mRecord['zone'];
						if ($mUpdateSalient) {
							$this->session->set_flashdata('success', 'IOM Cancelled  successfully.');
						if($sess_project_id)
							redirect("nfa/Award_procurement/award_recomm_procurement_list/$project_id/$zone/$type_work_id");
						else
							redirect("nfa/Award_procurement/award_recomm_procurement_list");
						//redirect("nfa/Award_procurement/award_recomm_procurement_list/$project_id/$zone/$type_work_id");
						}
						else {
							$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
							redirect('nfa/Award_procurement/cancel/' . $mId);
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
            $mRecord = $this->awardRecommProcurement->getParentByKey($mId);
			
			$data['mRecord'] = $mRecord;
			
            $this->load->view('nfa/award_procurement/amend', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	//Amend Action
	public function actionAmendNfa($mId) {
		
		$mSessionKey = $this->session->userdata('session_id');
		$sess_project_id = $this->session->userdata('sess_project_id_proc');
		if ($mSessionKey) {
			$data['home'] = "users";
			if ($mId) {
			
				$nfadata = array(
				
				'nfa_status' => 'AMD',
				'amended_by' => $mSessionKey,
				'amended_remarks' => $this->input->post('amended_remarks'),
				'amended_date' => date('Y-m-d H:i:s')
									
			);
				$mUpdateSalient = $this->awardRecommProcurement->updateParentByKey($mId, $nfadata);
				$mRecord = $this->awardRecommProcurement->getParentByKey($mId);
				$project_id = $mRecord['project_id'];
				$type_work_id = $mRecord['type_work_id'];
				$zone = $mRecord['zone'];
				if($mUpdateSalient)
				{
					$this->session->set_flashdata('success', 'IOM amended successfully.');
					if($sess_project_id)
						redirect("nfa/Award_procurement/award_recomm_procurement_list/$project_id/$zone/$type_work_id");
					else
						redirect("nfa/Award_procurement/award_recomm_procurement_list");
				} else {
					$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
					redirect('nfa/Award_procurement/amended_nfa/' . $mId);
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
         
			$data['records'] = $this->nfaAction->getNfaData($param,"award_procurement");
			$selUrl =   base_url('nfa/Award_procurement/amended_nfa');
									
			$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			if($current_page==$selUrl)
				$selOption="selected";
			else
				$selOption="";
			
			
			$nfa_select = nfa_dropdown_amended("award_procurement");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/award_procurement/amended', $data);
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
            $data['records'] = $this->nfaAction->getNfaData($param,"award_procurement");
			$selUrl =   base_url('nfa/Award_procurement/cancelled_nfa');
							
			
			$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			if($current_page==$selUrl)
				$selOption="selected";
			else
				$selOption="";
			
			
			$nfa_select = nfa_dropdown_cancelled("award_procurement");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/award_procurement/cancelled', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	public function mail_details($mId=null,$returned_remarks=null,$mail_type=null)
    {
		if ($mId) {
				$mail_user = array();
				$mSessionKey = $this->session->userdata('session_id');
				$mRecord = $this->nfaAction->getNfaDetails_userLevel($mId,$mSessionKey,"award_procurement");
				
				$initiated_by = $mRecord['initiated_by'];
				$mRecordAwdContract = $this->awardRecommProcurement->get_award_procurement_data($mId);
				$buyer = $this->buyer->getParentByKey($initiated_by);
				
				$initiator =   $buyer['buyer_name'];
				$sender =   $this->session->userdata('session_name');
				$subject = $mRecord['subject'];
				
				$package_value_mail = $mRecord['total_post_basic_rate'];
				$version_id = $mRecord['version_id'];
				$approver_level = $mRecord['approver_level'];
				$mail_user[$initiator] = $buyer['buyer_email'];
				if($approver_level>1)
				{
					
					$mRecordUsers = $this->nfaAction->get_low_level_users($mId,$approver_level,"award_procurement");
					foreach ($mRecordUsers as $key => $val) {
						$buyer_name = $val['buyer_name'];
						$mail_user[$buyer_name] = $val['buyer_email'];
					}
										
				}
				
				
				$mail_url  = $this->config->item('base_url').'nfa/Award_procurement/view_nfa/'.$mId;
				//send mail to level below
				$mail = sendEmailToUsers($subject,$package_value_mail,$version_id,$mail_user,$sender,$mail_url,$returned_remarks,$mail_type);
	
		}
	}
	public function nfa_logs()
    {
		
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "nfa_logs";
			
            $data['records'] = $this->nfaAction->getNfaData('',"award_procurement");
			//$mRecordAwdContract = $this->awardRecommProcurement->get_award_procurement_data($salient_id);
			//$selUrl =   base_url('nfa/Award_procurement/nfa_logs');									
			
			//$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			$selUrl =   $_SERVER['REQUEST_URI'];
			
			$current_page = base_url('nfa/Award_procurement/nfa_logs');
			if(strpos($current_page, $selUrl) !== false)
				$selOption="selected";
			else
				$selOption="";
			
			$nfa_select = nfa_dropdown_logs("award_procurement");
			$data['nfa_select'] = $nfa_select;
			$data['mRecordAwdContract'] = $mRecordAwdContract;
            $this->load->view('nfa/award_procurement/nfa_logs', $data);
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
				$mRecord = $this->nfaAction->get_salient_initiator($mId,"award_procurement");
				
				$salient_id = $mRecord['id'];
				
				
				$mRecordLevelsObj = $this->nfaAction->getAllLevelRole_approvers('',$salient_id,"award_procurement","view");
				$mRecordLevels = json_decode(json_encode($mRecordLevelsObj), true);
				
				
				$data['mRecord'] = $mRecord;
			
				$data['mRecordMajorTerms'] = $mRecordMajorTerms;
				$data['mRecordLevels'] = $mRecordLevels; 
				
						if($pgType=='A' || $pgType=='E' )
						{
							$data['pgType'] = $pgType; 
							$data['mId'] = $mId; 
						}
						$this->load->view('nfa/award_procurement/view_logs', $data);
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
			$data['records'] = $this->awardRecommProcurement->getReportData($nfaStatus,$buyer_id,$start_date,$end_date);
			
			$data['recordBuyers'] = displayReportUsers();
			$data['buyer_id'] = $buyer_id;
			$data['start_date'] = $start_date;
			$data['end_date'] = $end_date;
			$data['nfaStatus'] = $nfaStatus;
			
			
			
			
			$nfa_select = nfa_dropdown_reports("award_procurement");
			$data['nfa_select'] = $nfa_select;
		
			
			$this->load->view('nfa/award_procurement/reports', $data);
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
		//$records = $this->awardRecommProcurement->getReportData($nfaStatus,$buyer_id,$start_date,$end_date);
		/* file creation */
		//$file = fopen('php:/* output*/','w'); 
		$file = fopen("php://output", 'w');
		$header = array("Sl. No","ENFA No.","Subject","Award Synopsis","IOM Status"); 
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
			$excel_arr['subject'] = strip_tags($line['subject']);
			$excel_arr['synopsis_label'] = $line['synopsis_label'];
			if($line['status']==1 && $line['nfa_status']=='A' )
				$statusNfa = "Approved";
			else if($line['nfa_status']=='C' )
				$statusNfa = "Cancelled";
			else
				$statusNfa = "Pending";
			$excel_arr['nfa_status'] = $statusNfa;
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
            $data['records'] = $this->awardRecommProcurement->getAllLevelRole();
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
		$mRecordFinalBid = $this->awardRecommProcurement->get_award_procurement_FinalBid($salient_id,$package_id,$bidder_id);
		return $mRecordFinalBid;
		
    }
	
	
	//Get Min bidder data
	public function package_min_bidder_data($salient_id=null,$package_id=null) {
		$mRecordMinBid = $this->awardRecommProcurement->get_min_bidder_data($salient_id,$package_id);
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
				
					$package_row.="<td><input type='text' oninput='allowNumOnly(this);decimalStrict();' onblur='changeToCr(this);getBidders_total();' class='form-control decimalStrictClass' name='package_bidder[".$pck_index."][".$bid_index."]' id='package_bidder_".$pck_index."_".$bid_index."' required></td>	
				";
			}
            
		}
		
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
				
					$package_row2.="<td><input type='text' oninput='allowNumOnly(this);decimalStrict();' onblur='changeToCr(this);getBidders_total();' class='form-control decimalStrictClass' name='package_bidder[".$pck_index."][".$bid_index."]' id='package_bidder_".$pck_index."_".$bid_index."' required></td>	
				";
				
				
			}
			
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
				
					$package_row3.="<td><input type='text' oninput='allowNumOnly(this);decimalStrict();' onblur='changeToCr(this);getBidders_total();' class='form-control decimalStrictClass' name='package_bidder[".$pck_index."][".$bid_index."]' id='package_bidder_".$pck_index."_".$bid_index."' required></td>	
				";	
				
			}
				
            
		}
		
		echo $package_row3; 
		
    }
	/*public function show_package_bidders1() {
		
		$package_name = $this->input->post('package_name');
		$package_row ="";
		//print_r($package_name);
			
        if ($package_name) {
			 //foreach ($package_name as $keyPck => $valPck) {
				 $pck_index = 1;
				 $package_row.="
												<td>".$package_name."</td>
												<td><input type='text' oninput='allowNumOnly(this)' onblur='changeToCr(this);getGplBudget_total();' class='form-control' required name='package_gpl_budget[]' id='package_gpl_budget1'></td>
												<td><input type='text' oninput='allowNumOnly(this)' onblur='changeToCr(this);getBidders_total();' class='form-control' required name='package_bidder[".$pck_index."][1]' id='package_bidder_".$pck_index."_1'></td>
											   
								";
			// }
            
		}
		//echo json_encode($result); 
		//echo json_encode("test"); 
		echo $package_row; 
		
    }

	public function show_package_bidders2() {
		
		$package_name = $this->input->post('package_name');
		$package_row2="";
		print_r($package_name);
			
        if ($package_name) {
			// foreach ($package_name as $keyPck => $valPck) {
				 $pck_index = 2;
				 $package_row2.="
												<td>".$package_name."</td>
												<td><input type='text' oninput='allowNumOnly(this)' onblur='changeToCr(this);getGplBudget_total();' class='form-control' required name='package_gpl_budget[]' id='package_gpl_budget2'></td>
												<td><input type='text' oninput='allowNumOnly(this)' onblur='changeToCr(this);getBidders_total();' class='form-control' required name='package_bidder[".$pck_index."][1]' id='package_bidder_".$pck_index."_1'></td>
											   
								";
			// }
            
		}
		//echo json_encode($result); 
		//echo json_encode("test"); 
		echo $package_row2; 
		
    }
	public function show_package_bidders3() {
		
		$package_name = $this->input->post('package_name');
		$package_row3 ="";
		print_r($package_name);
			
        if ($package_name) {
			 //foreach ($package_name as $keyPck => $valPck) {
				 $pck_index = 3;
				 $package_row3.="
												<td>".$package_name."</td>
												<td><input type='text' oninput='allowNumOnly(this)' onblur='changeToCr(this);getGplBudget_total();' class='form-control' required name='package_gpl_budget[]' id='package_gpl_budget3'></td>
												<td><input type='text' oninput='allowNumOnly(this)' onblur='changeToCr(this);getBidders_total();' class='form-control' required name='package_bidder[".$pck_index."][1]' id='package_bidder_".$pck_index."_1'></td>
											   
								";
			// }
            
		}
		//echo json_encode($result); 
		//echo json_encode("test"); 
		echo $package_row3; 
		
    }*/
	public function getMaxLevelApprovers() {
		$result  = array();
		//print_r($result);
		//print_r($this->input->post());
		$ho_approval = $this->input->post('ho_approval');
		$package_value = $this->input->post('package_value');
		$package_value = $package_value*10000000; 
		//echo $package_value;
		$salient_id = $this->input->post('salient_id');
		$pgType = $this->input->post('pgType');
		//$result  = array();
		//echo "package".$package_value;
			
        if ($package_value) {
			
             //echo "controller1";
			$getConditions = $this->awardRecommProcurement->getApprover_conditions($ho_approval);
			
            foreach ($getConditions as $key => $valConditions) {
				$condition3 = $valConditions['condition3'];
				
				$condition1 = $valConditions['condition1'];
				
				$condition2 = $valConditions['condition2'];
				if($valConditions['condition2']!='')
				{
					
					$checkCond =  eval("return ($ho_approval==$condition3) && ($package_value.$condition2 && $package_value.$condition1) ;");
					
					if($checkCond)
					{
						
						$level_max =  $valConditions['max_level'];
						break;
					} 
				}
				else
				{
					
					$checkCond =  eval("return ($ho_approval==$condition3) && ($package_value.$condition1);");
					
					if($checkCond)
					{	
						
						$level_max =  $valConditions['max_level'];
						
						break;
					} 
					
				}
               
            }
			
			
		
			//echo $level_max;
			 //$getLevels = $this->nfaAction->getAllLevelRole_approvers($level_max,$salient_id,"award_procurement");
			 $getLevels = $this->nfaAction->getAllLevelRole_approvers($level_max,'',"award_procurement");
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
/* 	public function getMaxLevelApprovers_old() {
		
        //$condition_l1 = $this->input->post('condition_l1');
		 $l1_vendor1 = $this->input->post('l1_vendor1');
		 $package_value = $this->input->post('package_value');
		//exit;
		$pgType = $this->input->post('pgType');
		$result  = array();
		
			
        if ($package_value) {
			
            //$getConditions = $this->awardRecommProcurement->getApprover_conditions($package_value);
			$getConditions = $this->awardRecommProcurement->getApprover_conditions($l1_vendor1);
			//exit;
			//print_r($getConditions);
			//print_r(json_encode($getConditions));
			
			//print
			//echo $role = $getUsers->role;
            //$result = '<option disabled="" selected="" value="" disabled="">Select Users</option>';
			//print_r($getConditions);
            foreach ($getConditions as $key => $valConditions) {
				$condition3 = $valConditions['condition3'];
				//echo $condition3."condition3";
				$condition1 = $valConditions['condition1'];
				//echo "<br>....".$condition1."condition1";
				$condition2 = $valConditions['condition2'];
				if($valConditions['condition2']!='')
				{
					//echo "condition2".$valConditions['condition2'];
					//exit;
					//$checkCond =  (($condition_l1==$valConditions['condition3']) && ($package_value.$valConditions['condition2'] && $package_value.$valConditions['condition1']) );
					$checkCond =  eval("return ($l1_vendor1==$condition3) && ($package_value.$condition2 && $package_value.$condition1) ;");
					//echo (($package_value.$valConditions['condition2']) && ($package_value.$valConditions['condition1']));
					//if(($condition_l1==$valConditions['condition3']) && ($package_value.$valConditions['condition2'] && $package_value.$valConditions['condition1']) )
						
					//echo $checkCond;
					//exit;
					if($checkCond)
					{
						//echo "first".$condition_l1;
						$level_max =  $valConditions['max_level'];
						break;
					} 
				}
				else
				{
					//echo "else".$l1_vendor1;
					//exit;
					
					//echo "((eval($condition_l1)=={$valConditions['condition3']}) && ($package_value.{$valConditions['condition1']} ))";
					//echo $checkCond =  "((".$l1_vendor1."==".$valConditions['condition3'].")" .'&&'. "(".$package_value.$valConditions['condition1'] ."))";
					//echo $checkCond =  (($l1_vendor1==$valConditions['condition3']) && ($package_value.$valConditions['condition1']));
					$checkCond =  eval("return ($l1_vendor1==$condition3) && ($package_value.$condition1);");
					//echo $checkCond;
					
					
					//echo "<br>.....";
					//$checkCond =  ((Y==Y)&&(60000000>250000000));
					//if(((Y==Y)&&(60000000>250000000)))
					
					//echo  $checkCond =  (("$l1_vendor1"=="{$valConditions['condition3']}") && ($package_value.$valConditions['condition1']));
					//if(($condition_l1==$valConditions['condition3']) && eval($package_value.$valConditions['condition1'] ))
					if($checkCond)
					{	
						//echo $package_value.$valConditions['condition1'];
						//echo "second".$condition_l1;
						$level_max =  $valConditions['max_level'];
						//echo "max level".$level_max;
						//return;
						break;
					} 
					else
					{
						//echo "inside three";
						//exit;
					}
					//exit;
				}
                //$result = $result . "<option value='" . $valUser->buyer_id . "'>" . $valUser->buyer_name . "</option>" . PHP_EOL;
            }
			//echo "max level".$level_max;
			//exit;
			
			//Print level
			$param = array("level<="=>$level_max);
			$getLevels = $this->awardRecommProcurement->getAllLevelRole($param);
			$result_maxLevel = '<option disabled="" selected="" value="" disabled="">Select Level</option>';
			foreach ($getLevels as $key => $valLevel) {
                $result_maxLevel = $result_maxLevel . "<option value='" . $valLevel->role . "'>Level " . $valLevel->level . "({$valLevel->role})</option>" . PHP_EOL;
            }
			
            //echo $result;
            //echo $result;
        } else {
           // echo "<option>No data</option>";
        }
		//$result  = array();
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
		
    } */
}