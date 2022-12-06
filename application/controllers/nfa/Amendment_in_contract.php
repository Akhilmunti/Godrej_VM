<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/ListNfa.php");

class Amendment_in_contract extends ListNfa   
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
        $this->load->model('Amendment_in_contract_model', 'amendmentContract');
        $this->load->helper('date');
        error_reporting(0);
        
    }

     

    public function actionAdd()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
			$data['home'] = "amendment_contract";
            $data['records'] = $this->amendmentContract->getAllParent();
            $this->load->view('nfa/amendment_in_contract/amendment_contract_add', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	
	 public function actionEdit($mId,$updType='') {
		
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "users";
            if ($mId) {
                $mRecord = $this->amendmentContract->getParentByKey($mId);
				//print_r($mRecord);
				$salient_id = $mRecord['id'];		
			
				$mRecordApprovers = $this->amendmentContract->get_level_approvers($mId); 
				
                $data['mRecord'] = $mRecord;				
				$data['mRecordApprovers'] = $mRecordApprovers; 
				$data['updType'] = $updType;
				
                $this->load->view('nfa/amendment_in_contract/amendment_contract_edit', $data);
            } else {
                redirect('nfa/amendment_in_contract/amendment_contract_list');
            }
        } else {
            $this->load->view('index', $data);
        }
    }
	
	public function actionSave($mId = null) {
		
        $mSessionKey = $this->session->userdata('session_id');
		
		$updType = $this->input->post('updType');
		
        if ($mSessionKey) {
            $data['home'] = "users";
			 
			$this->load->helper('string');
			
			if($mId=='')
			{
				$version_dt =  date("Ymdhis");
				$version_id =  "aic".$version_dt."_00";
				
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
			
			$project_name = $this->input->post('project_name');
			
			$package_name = $this->input->post('package_name');
            $contractor_name = $this->input->post('contractor_name');
           
            $awarded_towers = $this->input->post('awarded_towers');
			$award_date = $this->input->post('award_date');
            $completion_date = $this->input->post('completion_date');   
			
			$revised_completion_date = $this->input->post('revised_completion_date');
			
            $original_award_value = $this->input->post('original_award_value');
		
			
            $last_approved_value = $this->input->post('last_approved_value');
			
            $proposed_value_amendment = $this->input->post('proposed_value_amendment');
           
            $proposed_amendment_no = $this->input->post('proposed_amendment_no');
			
			
            $revised_value_contract = $this->input->post('revised_value_contract');
           
			
			$reason_amendment = $this->input->post('reason_amendment');
			
			$history = $this->input->post('history');
			
			$bifurcation_proposed_value = $this->input->post('bifurcation_proposed_value');
           
            $extra_item_proposed = $this->input->post('extra_item_proposed');
			
					
			$extra_iem_cumulative = $this->input->post('extra_iem_cumulative');
          
			
			$scope_change_proposed = $this->input->post('scope_change_proposed');
            $scope_change_cumulative = $this->input->post('scope_change_cumulative');
			
			
			$qty_variation_proposed = $this->input->post('qty_variation_proposed');
          
			$qty_variation_cumulative = $this->input->post('qty_variation_cumulative');
			
			
			$total_proposed  = $this->input->post('total_proposed');
			$total_cumulative = $this->input->post('total_cumulative');
			
			
			//Approvers
			$approver_id = $this->input->post('approver_id');
			
			$nfa_status = $this->input->post('nfa_status');
			
			$save_status = $this->input->post('save');
			
			
			$package_value_mail = $total_post_basic_rate;
			$mail_url  = $this->config->item('base_url').'nfa/amendment_in_contract/initiated_nfa';
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
			
			$data_arr1 = array(
				
				'project_name' => $project_name,
				'package_name' => $package_name,
				'contractor_name' => $contractor_name,
				'awarded_towers' => $awarded_towers,
				'award_date' => $award_date,
				'completion_date' => $completion_date,
				'revised_completion_date' => $revised_completion_date,
				'original_award_value' => $original_award_value,
				'last_approved_value' => $last_approved_value,
				'proposed_value_amendment' => $proposed_value_amendment,
				'proposed_amendment_no' => $proposed_amendment_no,
				'revised_value_contract' => $revised_value_contract,
				'reason_amendment' => $reason_amendment,
				'history' => $history,
				'bifurcation_proposed_value' => $bifurcation_proposed_value,
				'extra_item_proposed' => $extra_item_proposed,
				'extra_iem_cumulative' => $extra_iem_cumulative,
				'scope_change_proposed' => $scope_change_proposed,
				'scope_change_cumulative' => $scope_change_cumulative,
				'qty_variation_proposed' => $qty_variation_proposed,
				'qty_variation_cumulative' => $qty_variation_cumulative,
				'total_proposed' => $total_proposed,
				'total_cumulative' => $total_cumulative
				);
			

                if ($mId && $updType=='') {
					
                    $data_arr2 = array(
							
							'initiated_by' => $mSessionKey,
							'status' => $mSavingStatus,
							'nfa_status' => $mNfaStatus
							);
							
					//$nfa_data = array_merge($data_arr1, $data_arr2);	
					$nfadata = $data_arr1+$data_arr2;	
                    
					
                    $mUpdate = $this->amendmentContract->updateParentByKey($mId, $nfadata);
					
					if($mNfaStatus == "SA")
					{
						$nfaLogData = array(
							'salient_id' => $mId,
							'buyer_id' => $mSessionKey,
                           
                            'nfa_status' => 'SA',
							'status_date' => date('Y-m-d H:i:s'),
							'created_date' => date('Y-m-d H:i:s')							
                            
						);
						$mLogNfaIns = $this->amendmentContract->nfaLogs_insertData($mId, $nfaLogData);
						
					}
					
		
					
					
					
					if($nfa_status!='RT')
					{
						
				
						$isExistApprover=$this->amendmentContract->checkApproverDelete($mId);
										
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
							
							$mNfaInsert = $this->amendmentContract->addNfaStatus($approveData);
							
							
							if($approver_id !=0 && $mSavingStatus==1)
							{
								
								$buyer = $this->buyer->getParentByKey($approver_id);
								
								
								$approver =   $buyer['buyer_name'];
								$sender =   $this->session->userdata('session_name');
								
								
								$mail = sendEmailToApprover($subject,$package_value_mail,$version_id,$approver,$sender,$mail_url);
								
							}
						}
						
					}
                    if ($mUpdate) {
						
						
						if($mSavingStatus==0)
							$this->session->set_flashdata('success', 'NFA updated successfully.');
						else
							$this->session->set_flashdata('success', 'NFA submitted for approval.');
						
						redirect('nfa/Amendment_in_contract/amendment_contract_list');
						
                    } else {
                        $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                        redirect('nfa/amendmentContract/actionEdit/' . $mId);
                    }
                } else {
						
											
                        $data_arr2 = array(
							'version_id' => $version_id,
                           
                           
							'initiated_by' => $mSessionKey,
							'status' => $mSavingStatus,
							'nfa_status' => $mNfaStatus,
                            'initiated_date' => date('Y-m-d H:i:s'),
                            'created_date' => date('Y-m-d H:i:s')
                            
                        );
						
						$nfa_data = $data_arr1+$data_arr2;	
						
						
                        $mInsert = $this->amendmentContract->addParent($nfa_data);
							
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
								$mLogNfaIns = $this->amendmentContract->nfaLogs_insertData($mInsert, $nfaLogData);
								
							}
							
							
						
						
						
						
						
						
								//Insert Approvers					

							
								$isExistApprover=$this->amendmentContract->checkApproverDelete($mInsert);
								
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
									
									$mNfaInsert = $this->amendmentContract->addNfaStatus($approveData);
									
									if($approver_level==1 && $mSavingStatus==1)
									{
										
										$buyer = $this->buyer->getParentByKey($approver_id);
										
										//print_r($this->session->userdata);
										$approver =   $buyer['buyer_name'];
										$sender =   $this->session->userdata('session_name');
										
										
										$mail = sendEmailToApprover($subject,$package_value_mail,$version_id,$approver,$sender,$mail_url);
										
									}
								}
								
							if($updType=="RF")
							{
								$nfadata = array(
									'status' => 2);
								$mUpdate = $this->amendmentContract->updateParentByKey($mId, $nfadata);
								$this->session->set_flashdata('success', 'NFA refloated successfully.');
								redirect('nfa/amendment_in_contract/amendment_contract_list');
							}
							else
							{
															
								$this->session->set_flashdata('success', 'NFA added successfully.');
								redirect('nfa/amendment_in_contract/amendment_contract_list');
							}
                        } else {
                            $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                           redirect('nfa/amendment_in_contract/actionAdd');
                        }
                   
                }
         
        } else {
			
            $this->load->view('index', $data);
        }
		
    }
	
    public function amendment_contract_list()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
           
            $data['records'] = $this->amendmentContract->getAllParent();
			$nfa_select = nfa_dropdown_draft("amendment_contract");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/amendment_in_contract/amendment_contract_list', $data);
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
				
				$mRecord = $this->nfaAction->get_salient_initiator($mId,"amendment_contract");
				
				$salient_id = $mRecord['id'];
				
				if($mSessionRole!='PCM')
				{
					$param = array("role"=>$mSessionRole);
					$getLevels = $this->nfaAction->getAllLevelRole($param);
					//print_r($getLevels);
					$approver_level = $getLevels[0]->level;
				}
				
				$mRecordLevelsObj = $this->nfaAction->getAllLevelRole_approvers('',$salient_id,"amendment_contract","view",$approver_level);
				$mRecordLevels = json_decode(json_encode($mRecordLevelsObj), true);
				//print_r($mRecordLevels);
				if($approver_level>1)
					$data['preChkRecords'] = $this->nfaAction->chkPreApproved($salient_id,$approver_level,"amendment_contract");
				else
					$data['preChkRecords']=1;
				
				//echo "Precheck".$data['preChkRecords'];
				
				$data['mRecord'] = $mRecord;
				
				$data['mRecordLevels'] = $mRecordLevels;
				
					
				if($pgType=='A' || $pgType=='E' )
				{
					$data['pgType'] = $pgType; 
					$data['mId'] = $mId; 
				}
				$this->load->view('nfa/amendment_in_contract/amendment_contract_view', $data);
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
            $data['records'] = $this->nfaAction->getAllInitiated($mSessionKey,"amendment_contract");
			
			$approver_level = $data['records'][0]['approver_level'];
			$salient_id = $data['records'][0]['id'];
			if($approver_level>1)
				$data['preChkRecords'] = $this->nfaAction->chkPreApproved($salient_id,$approver_level,"amendment_contract");
			else
				$data['preChkRecords']=1;
			
		
			$nfa_select = nfa_dropdown_initiated("amendment_contract");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/amendment_in_contract/initiated', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	public function return_nfa($mId)
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $mRecord = $this->nfaAction->getNfaInitiated($mId,$mSessionKey,"amendment_contract");
			
			$approver_level = $mRecord[0]['approver_level'];
			$mRecordApprovers = $this->nfaAction->getNfaStatus($mId,$mSessionKey,$approver_level,'',"amendment_contract");
			$data['mRecord'] = $mRecord[0];
			$data['mRecordApprovers'] = $mRecordApprovers;
            $this->load->view('nfa/amendment_in_contract/return', $data);
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
				$mUpdate = $this->nfaAction->updateData($param, $returnData,"amendment_contract");
				if ($mUpdate) {
						//echo "updated";
						$nfadata = array(
						
						'nfa_status' => 'R'
											
					);
						$mUpdateSalient = $this->amendmentContract->updateParentByKey($mId, $nfadata);
						if($mUpdateSalient)
						{
							$mail_type = "returnLowLevels";
							$this->mail_details($mId, $returned_remarks,$mail_type);
							//exit;
							//$mail = sendEmailToUsers($subject,$package_value_mail,$version_id,$initiator,$sender,$mail_url,$mail_type);
						}
						//exit;
						$this->session->set_flashdata('success', 'NFA Returned successfully.');
						redirect('nfa/Amendment_in_contract/initiated_nfa');
				} else {
						$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
						redirect('nfa/Amendment_in_contract/return_nfa/' . $mId);
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
			$selUrl =   base_url('nfa/Amendment_in_contract/returned_nfa');									
			
			$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			if($current_page==$selUrl)
				$selOption="selected";
			else
				$selOption="";
			
			$nfa_select = nfa_dropdown_returned("amendment_contract");
			$data['nfa_select'] = $nfa_select;
            $data['records'] = $this->nfaAction->getReturnedNfa("amendment_contract");
            $this->load->view('nfa/amendment_in_contract/returned', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
    public function approved_nfa()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "approved";
			
            $data['records'] = $this->nfaAction->getNfaApproved($mSessionKey,"amendment_contract");
			$selUrl =   base_url('nfa/Amendment_in_contract/approved_nfa');									
			
			$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			if($current_page==$selUrl)
				$selOption="selected";
			else
				$selOption="";
			
			$nfa_select = nfa_dropdown_approved("amendment_contract");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/amendment_in_contract/approved', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
    public function approve($mId)
    {
         $mSessionKey = $this->session->userdata('session_id');
		
        if ($mSessionKey) {
           
			if ($mId) {
				$mRecord = $this->nfaAction->getNfaInitiated($mId,$mSessionKey,"amendment_contract");
				
				$approver_level = $mRecord[0]['approver_level'];
				$mRecordApprovers = $this->nfaAction->getNfaStatus($mId,$mSessionKey,$approver_level,'',"amendment_contract");
				$param = array('salient_id' => $mId,'approver_id!=' => '');
			
				$data['mRecord'] = $mRecord[0];
				$data['mRecordApprovers'] = $mRecordApprovers;
				
				$this->load->view('nfa/amendment_in_contract/approve', $data);
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
				$recordLevel = $this->nfaAction->getMaxApproverLevel($param,"amendment_contract");
				
				$max_level = $recordLevel['approver_level'];
				
				$approvedata = array(
						'approved_status' => 1,
						'approved_remarks' => $this->input->post('approved_remarks'),
						'approved_date' => date('Y-m-d H:i:s')
						
					);
				$param = array('salient_id' => $mId,
						'approver_id' => $mSessionKey
						);	
				$mUpdate = $this->nfaAction->updateData($param, $approvedata,"amendment_contract");
				if ($mUpdate) {
						
						if ($mId) {
							$mail_user = array();
							
							$mRecord = $this->nfaAction->getNfaDetails_userLevel($mId,$mSessionKey,"amendment_contract");
							
							$initiated_by = $mRecord['initiated_by'];
							$approver_level = $mRecord['approver_level'];
							
							if($approver_level==$max_level)
							{
								$nfadata = array(
									'nfa_status' => 'A'
													
								);
								$mUpdateSalient = $this->amendmentContract->updateParentByKey($mId, $nfadata);
							}
							$buyer = $this->buyer->getParentByKey($initiated_by);
							
							$initiator =   $buyer['buyer_name'];
							$sender =   $this->session->userdata('session_name');
							$subject = $mRecord['subject'];
							
							$package_value_mail = $mRecord['scope_change_proposed'];
							$version_id = $mRecord['version_id'];
							$approver_level = $mRecord['approver_level'];
							$mail_user[$initiator] = $buyer['buyer_email'];
							if($approver_level>1)
							{
								
								$mRecordUsers = $this->nfaAction->get_low_level_users($mId,$approver_level,"amendment_contract");
								foreach ($mRecordUsers as $key => $val) {
									$buyer_name = $val['buyer_name'];
									$mail_user[$buyer_name] = $val['buyer_email'];
								}
								
								
							}
							
							
							$mail_url  = $this->config->item('base_url').'nfa/amendment_in_contract/view_nfa/'.$mId;
							//send mail to level below
							$mail_type = "LowLevels";
							$mail = sendEmailToUsers($subject,$package_value_mail,$version_id,$mail_user,$sender,$mail_url,'',$mail_type);
							
						}
						$this->session->set_flashdata('success', 'NFA Approved successfully.');
						redirect('nfa/amendment_in_contract/initiated_nfa');
				} else {
						$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
						redirect('nfa/amendment_in_contract/approve/' . $mId);
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
				$mRecord = $this->nfaAction->getNfaInitiated($mId,$mSessionKey,"amendment_contract");
				//print_r($mRecord);
				$approver_level = $mRecord[0]['approver_level'];
				$mRecordApprovers = $this->nfaAction->getNfaStatus($mId,$mSessionKey,$approver_level,'',"amendment_contract");
				$data['mRecord'] = $mRecord[0];
				$data['mRecordApprovers'] = $mRecordApprovers;
				$this->load->view('nfa/amendment_in_contract/return_text_correction', $data);
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
				$mUpdate = $this->nfaAction->updateData($param, $returnData,"amendment_contract");
				if ($mUpdate) {
						//echo "updated";
						$nfadata = array(
						'nfa_status' => 'RT'
											
					);
						$mUpdateSalient = $this->amendmentContract->updateParentByKey($mId, $nfadata);
						//exit;
						$this->session->set_flashdata('success', 'NFA Returned for text correction successfully.');
						redirect('nfa/Amendment_in_contract/initiated_nfa');
				} else {
						$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
						redirect('nfa/Amendment_in_contract/return_text/' . $mId);
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
			
            $mRecord = $this->nfaAction->getNfaDraft($mId,$mSessionKey,"amendment_contract");
			//print_r($mRecord);
			$approver_level = $mRecord[0]['approver_level'];
			$mRecordApprovers = $this->nfaAction->getNfaStatus($mId,$mSessionKey,$approver_level,"draft","amendment_contract");
			//print_r($mRecordApprovers);
			$data['mRecord'] = $mRecord[0];
			$data['mRecordApprovers'] = $mRecordApprovers;
            $this->load->view('nfa/amendment_in_contract/cancel', $data);
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
						$mUpdateSalient = $this->amendmentContract->updateParentByKey($mId, $nfadata);
						//exit;
						if ($mUpdateSalient) {
							$this->session->set_flashdata('success', 'NFA Cancelled  successfully.');
							redirect('nfa/Amendment_in_contract/amendment_contract_list');
						}
						else {
							$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
							redirect('nfa/Amendment_in_contract/cancel/' . $mId);
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
            $mRecord = $this->amendmentContract->getParentByKey($mId);
			
			$data['mRecord'] = $mRecord;
			//$data['mRecordApprovers'] = $mRecordApprovers;
            $this->load->view('nfa/amendment_in_contract/amend', $data);
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
				$mUpdate = $this->nfaAction->updateData($param, $amendData,"amendment_contract"); */
				//if ($mUpdate) {
				//echo "updated";
				$nfadata = array(
				
				'nfa_status' => 'AMD',
				'amended_by' => $mSessionKey,
				'amended_remarks' => $this->input->post('amended_remarks'),
				'amended_date' => date('Y-m-d H:i:s')
									
			);
				$mUpdateSalient = $this->amendmentContract->updateParentByKey($mId, $nfadata);
				//exit;
				if($mUpdateSalient)
				{
					$this->session->set_flashdata('success', 'NFA amended successfully.');
					redirect('nfa/Amendment_in_contract/approved_nfa');
				} else {
					$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
					redirect('nfa/Amendment_in_contract/amended_nfa/' . $mId);
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
			$data['records'] = $this->nfaAction->getNfaData($param,"amendment_contract");
			$selUrl =   base_url('nfa/Amendment_in_contract/amended_nfa');
									
			$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			if($current_page==$selUrl)
				$selOption="selected";
			else
				$selOption="";
			
			//echo $selOption."sel";
			$nfa_select = nfa_dropdown_amended("amendment_contract");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/amendment_in_contract/amended', $data);
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
            $data['records'] = $this->nfaAction->getNfaData($param,"amendment_contract");
			$selUrl =   base_url('nfa/Amendment_in_contract/cancelled_nfa');
									
			//echo $current_page = $config['base_url'].$_SERVER['REDIRECT_QUERY_STRING'];
			$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			if($current_page==$selUrl)
				$selOption="selected";
			else
				$selOption="";
			
			//echo $selOption."sel";
			//$nfa_select = nfa_dropdown_cancelled($selOption);
			$nfa_select = nfa_dropdown_cancelled("amendment_contract");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/amendment_in_contract/cancelled', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	public function mail_details($mId=null,$returned_remarks=null,$mail_type=null)
    {
		if ($mId) {
				$mail_user = array();
				$mSessionKey = $this->session->userdata('session_id');
				$mRecord = $this->nfaAction->getNfaDetails_userLevel($mId,$mSessionKey,"amendment_contract");
				//print_r($mRecord);
				//exit;
				$initiated_by = $mRecord['initiated_by'];
				$mRecordAwdContract = $this->amendmentContract->get_award_contract_data($mId);
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
					$mRecordUsers = $this->nfaAction->get_low_level_users($mId,$approver_level,"amendment_contract");
					foreach ($mRecordUsers as $key => $val) {
						$buyer_name = $val['buyer_name'];
						$mail_user[$buyer_name] = $val['buyer_email'];
					}
					//print_r($mRecordUsers);
					
				}
				
				//echo $str_mail_user = implode(",",$mail_user);
				//exit;
				$mail_url  = $this->config->item('base_url').'nfa/Amendment_in_contract/view_nfa/'.$mId;
				//send mail to level below
				//$mail_type = "LowLevels";
				//$mail = sendEmailToUsers($subject,$package_value_mail,$version_id,$mail_user,$sender,$mail_url,'',$mail_type);
				$mail = sendEmailToUsers($subject,$package_value_mail,$version_id,$mail_user,$sender,$mail_url,$returned_remarks,$mail_type);
				/* $mRecord = $this->amendmentContract->getParentByKey($mId);
				$initiated_by = $mRecord['initiated_by'];
				$mRecordAwdContract = $this->amendmentContract->get_award_contract_data($mId);
				$buyer = $this->buyer->getParentByKey($initiated_by);
							
				//print_r($this->session->userdata);
				$initiator =   $buyer['buyer_name'];
				$sender =   $this->session->userdata('session_name');
				$subject = $mRecord['subject'];
				$package_value_mail = $mRecordAwdContract['post_basic_rate_package1'];
				$version_id = $mRecord['version_id'];
				$mail_url  = $this->config->item('base_url').'nfa/Amendment_in_contract//view_nfa/'.$mId;
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
			
            $data['records'] = $this->nfaAction->getNfaData('',"amendment_contract");
			//$mRecordAwdContract = $this->amendmentContract->get_award_contract_data($salient_id);
			//$selUrl =   base_url('nfa/Amendment_in_contract/nfa_logs');									
			
			//$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			$selUrl =   $_SERVER['REQUEST_URI'];
			
			$current_page = base_url('nfa/Amendment_in_contract/nfa_logs');
			if(strpos($current_page, $selUrl) !== false)
				$selOption="selected";
			else
				$selOption="";
			
			$nfa_select = nfa_dropdown_logs("amendment_contract");
			$data['nfa_select'] = $nfa_select;
			$data['mRecordAwdContract'] = $mRecordAwdContract;
            $this->load->view('nfa/amendment_in_contract/nfa_logs', $data);
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
				$mRecord = $this->nfaAction->get_salient_initiator($mId,"amendment_contract");
				//print_r($mRecord);
				$salient_id = $mRecord['id'];
				
				
				$mRecordLevelsObj = $this->nfaAction->getAllLevelRole_approvers('',$salient_id,"amendment_contract","view");
				$mRecordLevels = json_decode(json_encode($mRecordLevelsObj), true);
				
				//$mRecordLogs = $this->nfaAction->getNfa_logs($salient_id,"amendment_contract");
				
				$data['mRecord'] = $mRecord;
				
				$data['mRecordLevels'] = $mRecordLevels; 
				//$data['mRecordLogs'] = $mRecordLogs; 
				
				if($pgType=='A' || $pgType=='E' )
				{
					$data['pgType'] = $pgType; 
					$data['mId'] = $mId; 
				}
				$this->load->view('nfa/amendment_in_contract/view_logs', $data);
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
			$data['records'] = $this->amendmentContract->getReportData($nfaStatus,$buyer_id,$start_date,$end_date);
			
			$data['recordBuyers'] = displayReportUsers();
			$data['buyer_id'] = $buyer_id;
			$data['start_date'] = $start_date;
			$data['end_date'] = $end_date;
			$data['nfaStatus'] = $nfaStatus;
			
			
			
			
			$nfa_select = nfa_dropdown_reports("amendment_contract");
			$data['nfa_select'] = $nfa_select;
		
			
			$this->load->view('nfa/amendment_in_contract/reports', $data);
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
		//$records = $this->amendmentContract->getReportData($nfaStatus,$buyer_id,$start_date,$end_date);
		/* file creation */
		//$file = fopen('php:/* output*/','w'); 
		$file = fopen("php://output", 'w');
		$header = array("Sl. No","ENFA No.","Subject","Award Synopsis","NFA Status"); 
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
            $data['records'] = $this->amendmentContract->getAllLevelRole();
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
		$mRecordFinalBid = $this->amendmentContract->get_award_contract_FinalBid($salient_id,$package_id,$bidder_id);
		return $mRecordFinalBid;
		
    }
	
	//Get Min bidder data
	public function package_min_bidder_data($salient_id=null,$package_id=null) {
		$mRecordMinBid = $this->amendmentContract->get_min_bidder_data($salient_id,$package_id);
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
		$package_row ="";
		//print_r($package_name);
			
        if ($package_name) {
			 //foreach ($package_name as $keyPck => $valPck) {
				 $pck_index = 1;
				 $package_row.="
												<td>".$package_name."</td>
												<td><input type='text' oninput='allowNumOnly(this);decimalStrict();' onblur='changeToCr(this);getGplBudget_total();' class='form-control decimalStrictClass' name='package_gpl_budget[]' id='package_gpl_budget1'></td>
												<td><input type='text' oninput='allowNumOnly(this);decimalStrict();' onblur='changeToCr(this);getBidders_total();' class='form-control decimalStrictClass' name='package_bidder[".$pck_index."][1]' id='package_bidder_".$pck_index."_1'></td>
											   
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
		//print_r($package_name);
			
        if ($package_name) {
			// foreach ($package_name as $keyPck => $valPck) {
				 $pck_index = 2;
				 $package_row2.="
												<td>".$package_name."</td>
												<td><input type='text' oninput='allowNumOnly(this);decimalStrict();' onblur='changeToCr(this);getGplBudget_total();' class='form-control decimalStrictClass' name='package_gpl_budget[]' id='package_gpl_budget2'></td>
												<td><input type='text' oninput='allowNumOnly(this);decimalStrict();' onblur='changeToCr(this);getBidders_total();' class='form-control decimalStrictClass' name='package_bidder[".$pck_index."][1]' id='package_bidder_".$pck_index."_1'></td>
											   
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
		//print_r($package_name);
			
        if ($package_name) {
			 //foreach ($package_name as $keyPck => $valPck) {
				 $pck_index = 3;
				 $package_row3.="
												<td>".$package_name."</td>
												<td><input type='text' oninput='allowNumOnly(this);decimalStrict();' onblur='changeToCr(this);getGplBudget_total();' class='form-control decimalStrictClass' name='package_gpl_budget[]' id='package_gpl_budget3'></td>
												<td><input type='text' oninput='allowNumOnly(this);decimalStrict();' onblur='changeToCr(this);getBidders_total();' class='form-control decimalStrictClass' name='package_bidder[".$pck_index."][1]' id='package_bidder_".$pck_index."_1'></td>
											   
								";
			// }
            
		}
		//echo json_encode($result); 
		//echo json_encode("test"); 
		echo $package_row3; 
		
    }
	public function getMaxLevelApprovers() {
		$result  = array();
		
		$upward_variation = $this->input->post('upward_variation');
		$package_value = $this->input->post('scope_change');
		$package_value = abs($package_value)*10000000; 
		
		$salient_id = $this->input->post('salient_id');
		$pgType = $this->input->post('pgType');
		
			
        if ($package_value) {			
           
			$getConditions = $this->amendmentContract->getApprover_conditions($upward_variation);
			
            foreach ($getConditions as $key => $valConditions) {
				$condition3 = $valConditions['condition3'];
				
				$condition1 = $valConditions['condition1'];
				
				$condition2 = $valConditions['condition2'];
				if($valConditions['condition2']!='')
				{
					
					$checkCond =  eval("return ($upward_variation==$condition3) && ($package_value.$condition2 && $package_value.$condition1) ;");
					
					if($checkCond)
					{
						
						$level_max =  $valConditions['max_level'];
						break;
					} 
				}
				else
				{
					
					$checkCond =  eval("return ($upward_variation==$condition3) && ($package_value.$condition1);");
					
					if($checkCond)
					{	
						
						$level_max =  $valConditions['max_level'];
						
						break;
					} 
					
				}
               
            }	
		
			
			 $getLevels = $this->nfaAction->getAllLevelRole_approvers($level_max,'',"amendment_contract");
			 $result_approvers = '';
			 $mSessionZone = $this->session->userdata('session_zone');
			
			 foreach ($getLevels as $key => $valLevel) {
				 $role = $valLevel->role;
				 $approver_id = $valLevel->approver_id;
				
				 $getUsers = $this->getRoleUsers_approval($role,$mSessionZone);
				
				
				$result_approvers .='<div id="pm" class="col-md-3 mb-3">
				<lable>'.$role.'</lable>
				<select name="approver_id[]"   class="form-control" required >
					<option disabled="" selected="" value="">Select</option>
					<option value="0">Not Applicable</option>';
				
					foreach ($getUsers as $keyUser => $valUser) {
						$buyer_id = $valUser->buyer_id;
						
					
					$result_approvers .='<option value="'.$valUser->buyer_id.'">'.$valUser->buyer_name .'</option>';
					}    
				$result_approvers .='</select>
				</div>';
		
				
			}
		
	   
        } 
		$result['data1'] = $result_approvers; 
		
		
		echo $result_approvers; 
		
    }

}