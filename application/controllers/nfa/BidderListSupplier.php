<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/ListNfa.php");

class BidderListSupplier extends  ListNfa 
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
        $this->load->model('Bidderlist_supplier_model', 'bidderSupplier');
        $this->load->helper('date');
        error_reporting(0);
        
    }



    public function bidderList()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "bidder_list";
            $this->load->view('nfa/bidder_list_supplier/bidderList_menu', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
    public function actionAdd()
    {
        $mSessionKey = $this->session->userdata('session_id');
        $session_zone = $this->session->userdata('session_zone');

        $PM = $this->bidderSupplier->get_approver_list_by_level($session_zone,"Project Manager");
		$zonals = $this->bidderSupplier->get_approver_list_by_level($session_zone,"Regional C&P Head");
		$CH = $this->bidderSupplier->get_approver_list_by_level($session_zone,"CH");
		$PD = $this->bidderSupplier->get_approver_list_by_level($session_zone,"Project Director");
		$OH = $this->bidderSupplier->get_approver_list_by_level($session_zone,"OH");
		$RH = $this->bidderSupplier->get_approver_list_by_level($session_zone,"RH");
		$ZH = $this->bidderSupplier->get_approver_list_by_level($session_zone,"Zonal CEO");
		$HO = $this->bidderSupplier->get_approver_list_by_level($session_zone,"HO - C&P");
		$COO = $this->bidderSupplier->get_approver_list_by_level($session_zone,"COO");
		$COO1 = $this->bidderSupplier->get_approver_list_by_level($session_zone,"COO"); 
		

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
            $this->load->view('nfa/bidder_list_supplier/supplier_add', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
    public function actionEdit($mId,$updType='') {
		
        $mSessionKey = $this->session->userdata('session_id');
		$session_zone = $this->session->userdata('session_zone');

		$PM = $this->bidderSupplier->get_approver_list_by_level($session_zone,"Project Manager");
		$zonals = $this->bidderSupplier->get_approver_list_by_level($session_zone,"Regional C&P Head");
		$CH = $this->bidderSupplier->get_approver_list_by_level($session_zone,"CH");
		$PD = $this->bidderSupplier->get_approver_list_by_level($session_zone,"Project Director");
		$OH = $this->bidderSupplier->get_approver_list_by_level($session_zone,"OH");
		$RH = $this->bidderSupplier->get_approver_list_by_level($session_zone,"RH");
		$ZH = $this->bidderSupplier->get_approver_list_by_level($session_zone,"Zonal CEO");
		$HO = $this->bidderSupplier->get_approver_list_by_level($session_zone,"HO - C&P");
		$COO = $this->bidderSupplier->get_approver_list_by_level($session_zone,"COO");
		$COO1 = $this->bidderSupplier->get_approver_list_by_level($session_zone,"COO"); 
		

		
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
				$mRecord = $this->bidderSupplier->getParentByKey($mId);                
				$salient_id = $mId;
				$mRecordBidSupplier = $this->bidderSupplier->get_bidder_list_supplier_data($salient_id);



				$appointment_dates_id = $mRecordBidSupplier['appointment_dates_id'];
				
				$appointment_external_dates = $this->bidderSupplier->get_bidder_supplier_appointmentExternal_data($salient_id,$appointment_dates_id);
				
				$mRecordSubWorks = $this->bidderSupplier->getSubjectWorks($mId);
				
				$mRecordApprovers = $this->bidderSupplier->get_level_approvers($mId); 
				
                $data['mRecord'] = $mRecord;
				$data['mRecordBidSupplier'] = $mRecordBidSupplier;
				$data['appointment_external_dates'] = $appointment_external_dates;
				$data['mRecordSubWorks'] = $mRecordSubWorks;
				$data['mRecordApprovers'] = $mRecordApprovers; 
				$data['updType'] = $updType;
				
                $this->load->view('nfa/bidder_list_supplier/supplier_edit', $data);
            } else {
                redirect('nfa/bidderSupplier');
            }
        } else {
            $this->load->view('index', $data);
        }
    }
    public function actionSave($mId = null)
	 {
		
		
        $mSessionKey = $this->session->userdata('session_id');
		
		$updType = $this->input->post('updType');
		
     if ($mSessionKey)
	 {
            $data['home'] = "users";
			
			$this->load->helper('string');
			
			if($mId=='')
			{
				$version_dt =  date("Ymdhis");
				 $version_id =  "bls".$version_dt."_00"; 
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
            $material_name = $this->input->post('material_name');  
            $budget_without_escalation = $this->input->post('budget_without_escalation'); 			
            $budget_with_escalation = $this->input->post('budget_with_escalation');  
            $ho_approval = $this->input->post('ho_approval');		
            $award_strategy = $this->input->post('award_strategy');
			$approver_level = $this->input->post('approver_level');
            $approver_id = $this->input->post('approver_id');
            $approver_role = $this->input->post('approver_role');
			$background_description = $this->input->post('background_description');				  	
          
			
			//Award Efficiency
			
            $receipt_date = $this->input->post('receipt_date');
            $receipt_days = $this->input->post('receipt_days');			
			$bidder_approval_date = $this->input->post('bidder_approval_date');
            $bidder_approval_days = $this->input->post('bidder_approval_days');
            $award_recomm_date = $this->input->post('award_recomm_date');			
			$award_recomm_days = $this->input->post('award_recomm_days');
            $remarks_date = $this->input->post('remarks_date');
			$remarks_days = $this->input->post('remarks_days');
			
			//bidder list subject works
			
			$name_contractor = $this->input->post('name_contractor');            
			$feedback_score = $this->input->post('score');
			$bid_category = $this->input->post('bid_category');
            $ongoing_complete_project = $this->input->post('ongoing_complete_project');	
			$nfa_status = $this->input->post('nfa_status');
			$save_status = $this->input->post('save');			
			$mail_url  = $this->config->item('base_url').'nfa/BidderListSupplier/view_nfa/'.$mId;
			$mail_type = "approver_123";

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
							
                            'subject' => $subject,
                            'material_name' => $material_name,
                            'budget_without_escalation'=>$budget_without_escalation,
                            'budget_with_escalation'=>$budget_with_escalation,
                            'ho_approval' => $ho_approval,
							'background_description'=>$background_description,
                            'award_strategy' => $award_strategy,
						    'initiated_by' => $mSessionKey,
							'status' => $mSavingStatus,
							'nfa_status' => $mNfaStatus
							
							
                    );
                    $mUpdate = $this->bidderSupplier->updateParentByKey($mId, $nfadata);						
					
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
					$insUpd=$this->bidderSupplier->awardEfficiency_updateOrInsertData($mId,$nfaAwardData);	
					
			
					//Major Terms
					$isExistSubWorks=$this->bidderSupplier->checkSubWorksDelete($mId);
                   
					foreach($name_contractor as $key=>$val)
					{
						$nfaWorksData = array(
						'salient_id' => $mId,
						'name_contractor' => $val,
						'feedback_score' => $feedback_score[$key],
						'bid_category' => $bid_category[$key],
						'ongoing_complete_project' => $ongoing_complete_project[$key],
						'created_date' => date('Y-m-d H:i:s')
						);
						
						//Insert Major Term data
						$mInsertSubWorks = $this->bidderSupplier->addSubjectWorks($nfaWorksData);
					}	
					
							
		
					if($nfa_status!='RT')
					{
                       
						$isExistApprover=$this->bidderSupplier->checkApproverDelete($mId);	
							// save approver data to table
						foreach($approver_id as $keyApr=>$valApr)
						{	
							
							$approver_id = $valApr;
							$approver_level = $keyApr+1;
							
							$approveData = array(
							'salient_id' => $mId,
							'approver_id' => $approver_id,
							'approver_level' => $approver_level,
							'approved_date' => date('Y-m-d H:i:s'),
							'created_date' => date('Y-m-d H:i:s')
							
							
							);
							
							$mNfaInsert = $this->bidderSupplier->addNfaStatus($approveData);
							
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
						
						redirect('nfa/BidderListSupplier/bidder_supplier_list');
						
                    } else {
                        $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                        redirect('nfa/bidderSupplier/actionEdit/' . $mId);
                    }
                } else {                  
                   
								$nfadata = array(
										'version_id' => $version_id,                           
										'subject' => $subject,
										'material_name' => $material_name,
										'budget_without_escalation'=>$budget_without_escalation,
										'budget_with_escalation'=>$budget_with_escalation,
										'ho_approval' => $ho_approval,
										'background_description'=>$background_description,
										'award_strategy' => $award_strategy,
										'initiated_by' => $mSessionKey,
										'status' => $mSavingStatus,
										'nfa_status' => $mNfaStatus,
										'initiated_date' => date('Y-m-d H:i:s'),
										'created_date' => date('Y-m-d H:i:s')
                             );

                       		 $mInsert = $this->bidderSupplier->addParent($nfadata);
                      
						
				if ($mInsert)
					{						
						
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
								
								$mInsertAward = $this->bidderSupplier->addAwardEfficiency($nfaAwardData);
								
								//bidder list subject works
								$isExistSubWorks=$this->bidderSupplier->checkSubWorksDelete($mId);
								
								foreach($name_contractor as $key=>$val)
								{
									$nfaWorksData = array(
									'salient_id' => $mInsert,
									'name_contractor' => $val,
									'feedback_score' => $feedback_score[$key],
									'bid_category' => $bid_category[$key],
									'ongoing_complete_project' => $ongoing_complete_project[$key],
									'created_date' => date('Y-m-d H:i:s')
									);
									
									$mInsertSubWorks = $this->bidderSupplier->addSubjectWorks($nfaWorksData);
								}
								
								$isExistApprover=$this->bidderSupplier->checkApproverDelete($mInsert);

								// save approver data to table
								foreach($approver_id as $keyApr=>$valApr)
									{	
										
										$approver_id = $valApr;
										$approver_level = $keyApr+1;
										
										$approveData = array(

										'salient_id' => $mInsert,
										'approver_id' => $approver_id,
										'approver_level' => $approver_level,
										'approved_date' => date('Y-m-d H:i:s'),
										'created_date' => date('Y-m-d H:i:s')	
										);
										
										$mNfaInsert = $this->bidderSupplier->addNfaStatus($approveData);
										
										if($approver_level==1 && $mSavingStatus==1)
										{
											
											$buyer = $this->buyer->getParentByKey($approver_id);										
											$approver =   $buyer['buyer_name'];
											$sender =   $this->session->userdata('session_name');
											
											
											$mail = sendEmailToApprover($subject,$package_value_mail,$version_id,$approver,$sender,$mail_url);
											
										}
									}
														
									if($updType=="RF")
									{
										$nfadata = array(
											'status' => 2);
										$mUpdate = $this->bidderSupplier->updateParentByKey($mId, $nfadata);
										$this->session->set_flashdata('success', 'NFA refloated successfully.');
										redirect('nfa/BidderListSupplier/bidder_supplier_list');
									}
									else
									{
										
										$this->session->set_flashdata('success', 'NFA added successfully.');
										redirect('nfa/BidderListSupplier/bidder_supplier_list');
									}
					}
				else{
							$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
							redirect('nfa/BidderListSupplier/actionAdd');
					}
		   
            }
        
			} else {
				
				$this->load->view('index', $data);
		}
		 
    }

    public function bidder_supplier_list()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['records'] = $this->bidderSupplier->getAllParent();
			$selUrl =   $_SERVER['REQUEST_URI'];
							
			$current_page = base_url('nfa/BidderListSupplier/bidder_supplier_list');
			
			if(strpos($current_page, $selUrl) !== false)
				$selOption="selected";
			else
				$selOption="";
			
			$nfa_select = nfa_dropdown_draft("bidder_supplier");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/bidder_list_supplier/bidder_supplier_listing', $data);
        } else {
            $this->load->view('index', $data);
        }
    }  


	
	public function getMaxLevelApprovers() {

		$ho_approval=$this->input->post('ho_approval');
		$package_value =$this->input->post('budget_with_escalation');
		$result  = array();
		$package_value = $package_value*10000000; 
		$salient_id = $this->input->post('salient_id');		
			
			
			   if ($package_value) {
			
				
				$getConditions = $this->bidderSupplier->getApprover_conditions($ho_approval);
			   
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
					   
					   $checkCond =  eval("return ($package_value.$condition1);");
					   
					   if($checkCond)
					   {	
						   
						   $level_max =  $valConditions['max_level'];
						   
						   break;
					   } 
					   
				   }
				  
			   }
			   
			   	$getLevels = $this->nfaAction->getAllLevelRole_approvers($level_max,'',"bidder_supplier");
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

	//View NFA Details
    public function view_nfa($mId,$pgType='')
    {
		$mSessionKey = $this->session->userdata('session_id');
		$mSessionRole = $this->session->userdata('session_role');

		if ($mSessionKey) {
		
		if ($mId) {
			$mRecord = $this->nfaAction->get_salient_initiator($mId,"bidder_supplier");
			$salient_id = $mRecord['id'];
			$mRecordBidSupplier = $this->bidderSupplier->get_bidder_list_supplier_data($salient_id);
			$mRecordSubWorks = $this->bidderSupplier->getSubjectWorks($mId);
			
			$mSessionRole = $this->session->userdata('session_role');

			if($mSessionRole!='PCM')
			{
				$param = array("role"=>$mSessionRole);
				$getLevels = $this->nfaAction->getAllLevelRole($param);
			    $approver_level = $getLevels[0]->level;
			}
			$mRecordLevelsObj = $this->nfaAction->getAllLevelRole_approvers('',$salient_id,"bidder_supplier","view",$approver_level);
			$mRecordLevels = json_decode(json_encode($mRecordLevelsObj), true);	
			if($approver_level>1)
				$data['preChkRecords'] = $this->nfaAction->chkPreApproved($salient_id,$approver_level,"bidder_supplier");
			else
				$data['preChkRecords']=1;
			
			
			$data['mRecordLevels'] = $mRecordLevels;

			
			$data['mRecord'] = $mRecord;
			$data['mRecordBidSupplier'] = $mRecordBidSupplier;
			$data['mRecordSubWorks'] = $mRecordSubWorks;
			$data['mRecordApproverDetails'] = $mRecordApproverDetails; 
		
				if($pgType=='A' || $pgType=='E' )
				{
					$data['pgType'] = $pgType; 
					$data['mId'] = $mId; 
				}
				$this->load->view('nfa/bidder_list_supplier/supplier_view', $data);
			}
        } else {
            $this->load->view('index', $data);
        } 
      
    }
   

	public function approved_nfa()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "approved";
			
            $data['records'] = $this->nfaAction->getNfaApproved($mSessionKey,"bidder_supplier");
			$selUrl =   base_url('nfa/BidderListSupplier/approved_nfa');									
			
			$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			if($current_page==$selUrl)
				$selOption="selected";
			else
				$selOption="";
			
			$nfa_select = nfa_dropdown_approved("bidder_supplier");
			$data['nfa_select'] = $nfa_select;
			
            $this->load->view('nfa/bidder_list_supplier/approved', $data);
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
            $data['records'] = $this->nfaAction->getAllInitiated($mSessionKey,"bidder_supplier");
			$approver_level = $data['records'][0]['approver_level'];
			$salient_id = $data['records'][0]['id'];
			if($approver_level>1)
				$data['preChkRecords'] = $this->nfaAction->chkPreApproved($salient_id,$approver_level,"bidder_supplier");
			else
				$data['preChkRecords']=1;
			
			
			
			$selUrl =   $_SERVER['REQUEST_URI'];
							
			$current_page = base_url('nfa/BidderListSupplier/initiated_nfa');
			
			if(strpos($current_page, $selUrl) !== false)
				$selOption="selected";
			else
				$selOption="";
			
			$nfa_select = nfa_dropdown_initiated("bidder_supplier");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/bidder_list_supplier/initiated', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

	public function approve($mId)
    {

		
         $mSessionKey = $this->session->userdata('session_id');
		
        if ($mSessionKey) {
           
			if ($mId) {
				$mRecord = $this->nfaAction->getNfaInitiated($mId,$mSessionKey,"bidder_supplier");
				$approver_level = $mRecord[0]['approver_level'];
				$mRecordApprovers = $this->nfaAction->getNfaStatus($mId,$mSessionKey,$approver_level,'',"bidder_supplier");
				$param = array('salient_id' => $mId,'approver_id!=' => '');
			
				$data['mRecord'] = $mRecord[0];
				$data['mRecordApprovers'] = $mRecordApprovers;
				
				$this->load->view('nfa/bidder_list_supplier/approve', $data);
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
				$recordLevel = $this->nfaAction->getMaxApproverLevel($param,"bidder_supplier");
				
				$max_level = $recordLevel['approver_level'];
				
				$approvedata = array(
						'approved_status' => 1,
						'approved_remarks' => $this->input->post('approved_remarks'),
						'approved_date' => date('Y-m-d H:i:s')
						
					);
				$param = array('salient_id' => $mId,
						'approver_id' => $mSessionKey
						);	
				$mUpdate = $this->nfaAction->updateData($param, $approvedata,"bidder_supplier");
				if ($mUpdate) {
						
						if ($mId) {
							
							$mail_user = array();
							$mRecord = $this->nfaAction->getNfaDetails_userLevel($mId,$mSessionKey,"bidder_supplier");
							
							$initiated_by = $mRecord['initiated_by'];
							$approver_level = $mRecord['approver_level'];
							if($approver_level==$max_level)
							{
								
								$nfadata = array(
									'nfa_status' => 'A'
													
								);
								$mUpdateSalient = $this->bidderSupplier->updateParentByKey($mId, $nfadata);
								
							}
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
								
								$mRecordUsers = $this->nfaAction->get_low_level_users($mId,$approver_level,"bidder_supplier");
								foreach ($mRecordUsers as $key => $val) {
									$buyer_name = $val['buyer_name'];
									$mail_user[$buyer_name] = $val['buyer_email'];
								}
								
								
							}
							
							$mail_url  = $this->config->item('base_url').'nfa/BidderListSupplier/view_nfa/'.$mId;
							//send mail to level below
							$mail_type = "LowLevels";
							$mail = sendEmailToUsers($subject,$package_value_mail,$version_id,$mail_user,$sender,$mail_url,'',$mail_type);
							
						}
						$this->session->set_flashdata('success', 'NFA Approved successfully.');
						redirect('nfa/BidderListSupplier/initiated_nfa');
				} else {
						$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
						redirect('nfa/BidderListSupplier/approve/' . $mId);
				}
			}
		} else {
			$this->load->view('index', $data);
		}
    }

	public function return_nfa($mId)
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $mRecord = $this->nfaAction->getNfaInitiated($mId,$mSessionKey,"bidder_supplier");
			//print_r($mRecord);
			$approver_level = $mRecord[0]['approver_level'];
			$mRecordApprovers = $this->nfaAction->getNfaStatus($mId,$mSessionKey,$approver_level,'',"bidder_supplier");
			$data['mRecord'] = $mRecord[0];
			$data['mRecordApprovers'] = $mRecordApprovers;
            $this->load->view('nfa/bidder_list_supplier/return', $data);
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
				$mUpdate = $this->nfaAction->updateData($param, $returnData,"bidder_supplier");
				if ($mUpdate) {
						
						$nfadata = array(
						
						'nfa_status' => 'R'
											
					);
						$mUpdateSalient = $this->bidderSupplier->updateParentByKey($mId, $nfadata);
						if($mUpdateSalient)
						{
							$mail_type = "returnLowLevels";
							$this->mail_details($mId, $returned_remarks,$mail_type);
						}
						
						$this->session->set_flashdata('success', 'NFA Returned successfully.');
						redirect('nfa/BidderListSupplier/initiated_nfa');
				} else {
						$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
						redirect('nfa/BidderListSupplier/return_nfa/' . $mId);
				}
			}
		} else {
			$this->load->view('index', $data);
		}
    }


	public function mail_details($mId=null,$returned_remarks=null,$mail_type=null)
    {
		if ($mId) {
				$mail_user = array();
				$mSessionKey = $this->session->userdata('session_id');
				$mRecord = $this->nfaAction->getNfaDetails_userLevel($mId,$mSessionKey,"bidder_supplier");
				
				$initiated_by = $mRecord['initiated_by'];
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
					$mRecordUsers = $this->nfaAction->get_low_level_users($mId,$approver_level,"bidder_supplier");
					foreach ($mRecordUsers as $key => $val) {
						$buyer_name = $val['buyer_name'];
						$mail_user[$buyer_name] = $val['buyer_email'];
					}
						
				}
				
				$mail_url  = $this->config->item('base_url').'nfa/BidderListSupplier/view_nfa/'.$mId;
				$mail = sendEmailToUsers($subject,$package_value_mail,$version_id,$mail_user,$sender,$mail_url,$returned_remarks,$mail_type);
				
		}
	}
	public function returned_nfa()
    {
         $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "returned";
			$selUrl =   base_url('nfa/BidderListSupplier/returned_nfa');									
			
			$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			if($current_page==$selUrl)
				$selOption="selected";
			else
				$selOption="";
			
			$nfa_select = nfa_dropdown_returned("bidder_supplier");
			$data['nfa_select'] = $nfa_select;
            $data['records'] = $this->nfaAction->getReturnedNfa("bidder_supplier");
            $this->load->view('nfa/bidder_list_supplier/returned', $data);
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
				$mRecord = $this->nfaAction->getNfaInitiated($mId,$mSessionKey,"bidder_supplier");
				//print_r($mRecord);
				$approver_level = $mRecord[0]['approver_level'];
				$mRecordApprovers = $this->nfaAction->getNfaStatus($mId,$mSessionKey,$approver_level,'',"bidder_supplier");
				$data['mRecord'] = $mRecord[0];
				$data['mRecordApprovers'] = $mRecordApprovers;
				$this->load->view('nfa/bidder_list_supplier/return_text_correction', $data);
			}
			
			
        } else {
            $this->load->view('index', $data);
        }
    }
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
				$mUpdate = $this->nfaAction->updateData($param, $returnData,"bidder_supplier");
				if ($mUpdate) {
						
						$nfadata = array(
						'nfa_status' => 'RT'
											
					);
						$mUpdateSalient = $this->bidderSupplier->updateParentByKey($mId, $nfadata);
						
						$this->session->set_flashdata('success', 'NFA Returned for text correction successfully.');
						redirect('nfa/BidderListSupplier/initiated_nfa');
				} else {
						$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
						redirect('nfa/BidderListSupplier/return_text/' . $mId);
				}
			}
		} else {
			$this->load->view('index', $data);
		}
    }

	public function amend_nfa($mId)
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $mRecord = $this->bidderSupplier->getParentByKey($mId);
			
			$data['mRecord'] = $mRecord;
            $this->load->view('nfa/bidder_list_supplier/amend', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
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
				$mUpdateSalient = $this->bidderSupplier->updateParentByKey($mId, $nfadata);				
				if($mUpdateSalient)
				{
					$this->session->set_flashdata('success', 'NFA amended successfully.');
					redirect('nfa/BidderListSupplier/approved_nfa');
				} else {
					$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
					redirect('nfa/BidderListSupplier/amended_nfa/' . $mId);
				}
			}
		} 
		else {
				$this->load->view('index', $data);
		}
    }

	public function amended_nfa()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "amended";
			$param = array('status'=> 1,'nfa_status '=> 'AMD');
			$data['records'] = $this->nfaAction->getNfaData($param,"bidder_supplier");
			$selUrl =   base_url('nfa/BidderListSupplier/amended_nfa');
									
			$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			if($current_page==$selUrl)
				$selOption="selected";
			else
				$selOption="";
			
			$nfa_select = nfa_dropdown_amended("bidder_supplier");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/bidder_list_supplier/amended', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	
	public function cancel($mId)
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
			
            $mRecord = $this->nfaAction->getNfaDraft($mId,$mSessionKey,"bidder_supplier");
			$approver_level = $mRecord[0]['approver_level'];
			$mRecordApprovers = $this->nfaAction->getNfaStatus($mId,$mSessionKey,$approver_level,"draft","bidder_supplier");
			$data['mRecord'] = $mRecord[0];
			$data['mRecordApprovers'] = $mRecordApprovers;
            $this->load->view('nfa/bidder_list_supplier/cancel', $data);
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
						$mUpdateSalient = $this->bidderSupplier->updateParentByKey($mId, $nfadata);
						//exit;
						if ($mUpdateSalient) {
							$this->session->set_flashdata('success', 'NFA Cancelled  successfully.');
							redirect('nfa/BidderListSupplier/bidder_supplier_list');
						}
						else {
							$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
							redirect('nfa/BidderListSupplier/cancel/' . $mId);
						}
						
				
				
			}
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
            $data['records'] = $this->nfaAction->getNfaData($param,"bidder_supplier");
			$selUrl =   base_url('nfa/BidderListSupplier/cancelled_nfa');
									
			$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
			if($current_page==$selUrl)
				$selOption="selected";
			else
				$selOption="";
			
			$nfa_select = nfa_dropdown_cancelled("bidder_supplier");
			$data['nfa_select'] = $nfa_select;
            $this->load->view('nfa/bidder_list_supplier/cancelled', $data);
        } else {
            $this->load->view('index', $data);
        }
    }


	public function nfa_logs()
    {
		
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "nfa_logs";
			
            $data['records'] = $this->nfaAction->getNfaData('',"bidder_supplier");
			
			$selUrl =   $_SERVER['REQUEST_URI'];
			
			$current_page = base_url('nfa/BidderListSupplier/nfa_logs');
			if(strpos($current_page, $selUrl) !== false)
				$selOption="selected";
			else
				$selOption="";
			
			$nfa_select = nfa_dropdown_logs("bidder_supplier");
			$data['nfa_select'] = $nfa_select;
			$data['mRecordBidSupplier'] = $mRecordBidSupplier;
            $this->load->view('nfa/bidder_list_supplier/nfa_logs', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

	public function view_logs($mId,$pgType='')
    {
		$mSessionKey = $this->session->userdata('session_id');
		if ($mSessionKey) {
		
			if ($mId) {
				$mRecord = $this->nfaAction->get_salient_initiator($mId,"bidder_supplier");
				//print_r($mRecord);
				$salient_id = $mRecord['id'];
				
				
				$mRecordLevelsObj = $this->nfaAction->getAllLevelRole_approvers('',$salient_id,"bidder_supplier","view");
				$mRecordLevels = json_decode(json_encode($mRecordLevelsObj), true);
				$data['mRecord'] = $mRecord;
				
				$data['mRecordLevels'] = $mRecordLevels; 
				
				if($pgType=='A' || $pgType=='E' )
				{
					$data['pgType'] = $pgType; 
					$data['mId'] = $mId; 
				}
				$this->load->view('nfa/bidder_list_supplier/view_logs', $data);
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
			print_r($this->input->post());
			exit;
			$data['records'] = $this->bidderSupplier->getReportData($nfaStatus,$buyer_id,$start_date,$end_date);
			
			$data['recordBuyers'] = displayReportUsers();
			$data['buyer_id'] = $buyer_id;
			$data['start_date'] = $start_date;
			$data['end_date'] = $end_date;
			$data['nfaStatus'] = $nfaStatus;
			
			
			
			
			$nfa_select = nfa_dropdown_reports("bidder_supplier");
			$data['nfa_select'] = $nfa_select;
		
			
			$this->load->view('nfa/bidder_list_supplier/reports', $data);
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
	   	/* file creation */
		$file = fopen("php://output", 'w');
		$header = array("Sl. No","ENFA No.","Subject","Budget With Escalation","NFA Status"); 
		$data1 = $this->input->post('data1');	
		$records = json_decode($data1,true);
		
		fputcsv($file, $header);
		$excel_arr = array();
		$slno = 1;
		foreach ($records as $key=>$line){ 
			$excel_arr = array();
			$excel_arr[$slno] = $slno++;
			$excel_arr['version_id'] = $line['version_id'];
			$excel_arr['subject'] = strip_tags($line['subject']);
			$excel_arr['budget_with_escalation'] = $line['budget_with_escalation'];
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


   

}



    
	