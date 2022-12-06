<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LdWaiver extends CI_Controller {

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
        $this->load->model('ld_waiver_model', 'ldWaiver');
        $this->load->helper('date');
        error_reporting(0);
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
    }

    public function index() {
		
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "draft";
            $data['records'] = $this->ldWaiver->getAllParent();
			//print_r($data['records']);
            $this->load->view('nfa/ldWaiver', $data);
			//echo "test1";
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

    

    public function actionAdd() {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            //$data['home'] = "users";
            $this->load->view('nfa/ld_waiver_add', $data);
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionSave($mId = null) {
        $mSessionKey = $this->session->userdata('session_id');
		$reasonLabel = array ("Delay due to Contractor","Delay due to Company","Delay due to other reasons (beyond the control of Contractors/Company)","Impact on OC/Handover Timelines" );
		//$mSession = $this->session->userdata();
		//print_r($mSession);
		$updType = $this->input->post('updType');
		//echo "test";
		//exit;
        if ($mSessionKey) {
            $data['home'] = "users";
			//print_r($this->input->post('reason_value'));
			$this->load->helper('string');
			//$version_str =  random_string('alnum',3);
			
			//$version_id =  "ldw".$version_str.$version_dt."_001";
			if($mId=='')
			{
				$version_dt =  date("Ymdhis");
				$version_id =  "ldw".$version_dt."_01";
				
			}
			else if($updType=="RF")
			{
				$version_id =  $this->input->post('enfaNo');
			}
			else if($updType=="AMD")
			{
				$prevEnfaNo = $this->input->post('enfaNo');
				$version_id =  $prevEnfaNo."_V01";
			}
			//echo $version_id;
			//exit;
			$mSubject = $this->input->post('subject');
            $mPackage_name = $this->input->post('package_name');
            $mContractor_name = $this->input->post('contractor_name');
            $mAwarded_towers = $this->input->post('awarded_towers');
			
                        
            $award_date = $this->input->post('award_date');
			$mAward_date = date("Y-m-d", strtotime($award_date));
            $completion_date = $this->input->post('completion_date');
			$mCompletion_date = date("Y-m-d", strtotime($completion_date));
            $revised_completion_date = $this->input->post('revised_completion_date');
			$mRevised_completion_date = date("Y-m-d", strtotime($revised_completion_date));
            $mAvg_feedback_score = $this->input->post('avg_feedback_score');
            $mOriginal_contract_value = $this->input->post('original_contract_value');
            $mLast_approved_value = $this->input->post('last_approved_value');
			
			$mTotal_value_work = $this->input->post('total_value_work');
            $mBalance_work = $this->input->post('balance_work');
            $mLd_amount = $this->input->post('ld_amount');
			
			$mReason_ld_waiver = $this->input->post('reason_ld_waiver');
            $mDescription_background = $this->input->post('description_background');
            $mLd_applicable = $this->input->post('ld_applicable');
			
			$mReason_applicable = $this->input->post('reason_applicable');
            $mRecommendations = $this->input->post('recommendations');
			$mReason_value = $this->input->post('reason_value');
			
			$mUpload1 = $this->input->post('file1_upload');
			//$file1
			
			//print_r($_FILES['file1_upload']);
			//exit;
			if ($_FILES['file1_upload']['size'] != 0)
				$mFile1 = $this->single_File_Upload('file1_upload', $mUpload1);
			
			$mUpload2 = $this->input->post('file2_upload');
			
			$mFile2 = $this->single_File_Upload('file2_upload', $mUpload2);
			//print_r($mFile2);
			
			$mUpload3 = $this->input->post('file3_upload');
			$mFile3 = $this->single_File_Upload('file3_upload', $mUpload3);
			
			
			$mUpload4 = $this->input->post('file4_upload');
			$mFile4 = $this->single_File_Upload('file4_upload', $mUpload4);
			
			$mUpload5 = $this->input->post('file5_upload');
			$mFile5 = $this->single_File_Upload('file5_upload', $mUpload5);
			$nfa_status = $this->input->post('nfa_status');
			
			$save_status = $this->input->post('save');
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
					$mNfaStatus = "RT";
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
			
			//echo $mSavingStatus;
			//echo "nfa".$mNfaStatus;
			//exit;
			
			
				
			//exit;
			
            //$ld_applicable1 = $this->input->post('ld_applicable1');
			
            /*if ($mPassword == $this->input->post('cpassword')) {
                $mSecretPassword = base64_encode(utf8_encode($mPassword));*/
                //$userExists = $this->ldWaiver->check($mEmail);

                if ($mId && $updType=='') {
					
                    $nfadata = array(
							//'version_id' => $version_id,
                            'subject' => $mSubject,
                            'package_name' => $mPackage_name,
                            'contractor_name' => $mContractor_name,
                            'awarded_towers' => $mAwarded_towers,
                            'award_date' => $mAward_date,
							'completion_date' => $mCompletion_date,
                            'revised_completion_date' => $mRevised_completion_date,
                            'avg_feedback_score' => $mAvg_feedback_score,
                            'original_contract_value' => $mOriginal_contract_value,
                            'last_approved_value' => $mLast_approved_value,
							'total_value_work' => $mTotal_value_work,
                            'balance_work' => $mBalance_work,
                            'ld_amount' => $mLd_amount,
                            'reason_ld_waiver' => $mReason_ld_waiver,
                            'description_background' => $mDescription_background,
                            'ld_applicable' => $mLd_applicable,
                            'reason_applicable' => $mReason_applicable,
                            'recommendations' => $mRecommendations,
							'initiated_by' => $mSessionKey,
							'status' => $mSavingStatus,
							'nfa_status' => $mNfaStatus
                    );
                    $mUpdate = $this->ldWaiver->updateParentByKey($mId, $nfadata);
					$isExistDelayReasons=$this->ldWaiver->checkDelayReasonsDelete($mId);
					foreach ($mReason_value as $reasonKey=>$reasonVal)
					{
						 //echo $reasonVal;
						 //echo "<br>";
					
						$delayData = array(
						'salient_id' => $mId,
						'reason_label' => $reasonLabel[$reasonKey],
						'reason_value' => $reasonVal
						
						);
						$mDelayInsert = $this->ldWaiver->addDelayReasons($delayData);
					}
					
					$uploadAllData = array(
						
						'file1_name' => $mFile1['file_name'],
						'file1_display_name' => $this->input->post('file1_display_name'),
						'file1_upload_path' => $mFile1['file_path'],
						'file2_name' => $mFile2['file_name'],
						'file2_display_name' => $this->input->post('file2_display_name'),
						'file2_upload_path' => $mFile2['file_path'],
						'file3_name' => $mFile3['file_name'],
						'file3_display_name' => $this->input->post('file3_display_name'),
						'file3_upload_path' => $mFile3['file_path'],
						'file4_name' => $mFile4['file_name'],
						'file14_display_name' => $this->input->post('file4_display_name'),
						'file4_upload_path' => $mFile4['file_path'],
						'file5_name' => $mFile5['file_name'],
						'file5_display_name' => $this->input->post('file5_display_name'),
						'file5_upload_path' => $mFile5['file_path']
						
						
						);
					$uploadDisplayData = array(
						
						
						'file1_display_name' => $this->input->post('file1_display_name'),
						
						'file2_display_name' => $this->input->post('file2_display_name'),
						
						'file3_display_name' => $this->input->post('file3_display_name'),
						
						'file4_display_name' => $this->input->post('file4_display_name'),
						
						'file5_display_name' => $this->input->post('file5_display_name')						
						
						
						);
					//echo "test";
					$uploadData = $this->removeEmptyValues($uploadAllData);
					//print_r($uploadData);
					if(!empty($uploadAllData))
					{						
						$mUploadUpdate = $this->ldWaiver->updateFileUploads($mId,$uploadData);
						$mUploadDispUpdate = $this->ldWaiver->updateFileUploads($mId,$uploadDisplayData);
					}
					
					//print_r($uploadData);
					if($nfa_status!='RT')
					{
						$isExistApprover=$this->ldWaiver->checkApproverDelete($mId);
						for($i=1;$i<=10;$i++)
						{
							$approver_var = 'level'.$i."_approver_id";
							//echo $approver_var;
							$approver_id = $this->input->post($approver_var);
							$approver_level = $i;
							//echo "<br>";
							//echo $approver_level;
							//print_r($approver_id);
							//$approver_level = 'level'.$i;
							$approveData = array(
							'salient_id' => $mId,
							'approver_id' => $approver_id,
							'approver_level' => $approver_level,
							//'approved_date' => date('Y-m-d H:i:s'),
							'created_date' => date('Y-m-d H:i:s')
							
							);
							//print_r($approveData);
							//echo "<br>";
							$mNfaInsert = $this->ldWaiver->addNfaStatus($approveData);
							if($i==1 && $mSavingStatus==1)
							{
								$buyer = $this->buyer->getParentByKey($approver_id);
								//print_r($buyer);
								//print_r($this->session->userdata);
								$approver =   $buyer['buyer_name'];
								$sender =   $this->session->userdata('session_name');
								//exit;
								$mail = $this->sendEmailToApprover($mSubject,$mOriginal_contract_value,$version_id,$approver,$sender);
								
							}
							
						}
					}
                    if ($mUpdate) {
						//echo "updated";
						//echo $mail = $this->sendEmailToApprover();
						//exit;
						if($mSavingStatus==0)
							$this->session->set_flashdata('success', 'NFA updated successfully.');
						else
							$this->session->set_flashdata('success', 'NFA submitted for approval.');
                        redirect('nfa/ldWaiver');
                    } else {
                        $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                        redirect('nfa/ldWaiver/actionEdit/' . $mId);
                    }
                } else {
                    //if (!$userExists) {
                        $nfadata = array(
							'version_id' => $version_id,
                            'subject' => $mSubject,
                            'package_name' => $mPackage_name,
                            'contractor_name' => $mContractor_name,
                            'awarded_towers' => $mAwarded_towers,
                            'award_date' => $mAward_date,
							'completion_date' => $mCompletion_date,
                            'revised_completion_date' => $mRevised_completion_date,
                            'avg_feedback_score' => $mAvg_feedback_score,
                            'original_contract_value' => $mOriginal_contract_value,
                            'last_approved_value' => $mLast_approved_value,
							'total_value_work' => $mTotal_value_work,
                            'balance_work' => $mBalance_work,
                            'ld_amount' => $mLd_amount,
                            'reason_ld_waiver' => $mReason_ld_waiver,
                            'description_background' => $mDescription_background,
                            'ld_applicable' => $mLd_applicable,
                            'reason_applicable' => $mReason_applicable,
                            'recommendations' => $mRecommendations,
							'initiated_by' => $mSessionKey,
							'status' => $mSavingStatus,
							'nfa_status' => $mNfaStatus,
                            'initiated_date' => date('Y-m-d H:i:s'),
                            'created_date' => date('Y-m-d H:i:s')
                            
                        );
                        $mInsert = $this->ldWaiver->addParent($nfadata);
                        if ($mInsert) {
							//$reasonLabel = array ("Delay due to Contractor","Delay due to Company","Delay due to other reasons (beyond the control of Contractors/Company)","Impact on OC/Handover Timelines" );
							$isExistDelayReasons=$this->ldWaiver->checkDelayReasonsDelete($mInsert);
							foreach ($mReason_value as $reasonKey=>$reasonVal)
							{
								 //echo $reasonVal;
								 //echo "<br>";
							
								$delayData = array(
								'salient_id' => $mInsert,
								'reason_label' => $reasonLabel[$reasonKey],
								'reason_value' => $reasonVal,
								'created_date' => date('Y-m-d H:i:s')
								//'buyer_date_updated' => date('Y-m-d H:i:s'),
								);
								$mDelayInsert = $this->ldWaiver->addDelayReasons($delayData);
							}
												
								$uploadData = array(
								'salient_id' => $mInsert,
								'file1_name' => $mFile1['file_name'],
								'file1_display_name' => $this->input->post('file1_display_name'),
								'file1_upload_path' => $mFile1['file_path'],
								'file2_name' => $mFile2['file_name'],
								'file2_display_name' => $this->input->post('file2_display_name'),
								'file2_upload_path' => $mFile2['file_path'],
								'file3_name' => $mFile3['file_name'],
								'file3_display_name' => $this->input->post('file3_display_name'),
								'file3_upload_path' => $mFile3['file_path'],
								'file4_name' => $mFile4['file_name'],
								'file4_display_name' => $this->input->post('file4_display_name'),
								'file4_upload_path' => $mFile4['file_path'],
								'file5_name' => $mFile5['file_name'],
								'file5_display_name' => $this->input->post('file5_display_name'),
								'file5_upload_path' => $mFile5['file_path'],
								'created_date' => date('Y-m-d H:i:s')
								//'buyer_date_updated' => date('Y-m-d H:i:s'),
								);
								//print_r($uploadData);

								$mUploadInsert = $this->ldWaiver->addFileUploads($uploadData);
								$isExistApprover=$this->ldWaiver->checkApproverDelete($mInsert);
								if($mOriginal_contract_value>100000000)
									$level_count=10;
								else
									$level_count=9;
								for($i=1;$i<=$level_count;$i++)
								{
									$approver_var = 'level'.$i."_approver_id";
									//echo $approver_var;
									$approver_id = $this->input->post($approver_var);
									$approver_level = $i;
									//echo "<br>";
									//echo $approver_level;
									//print_r($approver_id);
									//$approver_level = 'level'.$i;
									$approveData = array(
									'salient_id' => $mInsert,
									'approver_id' => $approver_id,
									'approver_level' => $approver_level,
									//'approved_date' => date('Y-m-d H:i:s'),
									'created_date' => date('Y-m-d H:i:s')
									
									);
									$mNfaInsert = $this->ldWaiver->addNfaStatus($approveData);
									if($i==1 && $mSavingStatus==1)
									{
										$buyer = $this->buyer->getParentByKey($approver_id);
										//print_r($buyer);
										//print_r($this->session->userdata);
										$approver =   $buyer['buyer_name'];
										$sender =   $this->session->userdata('session_name');
										//exit;
										$mail = $this->sendEmailToApprover($mSubject,$mOriginal_contract_value,$version_id,$approver,$sender);
										
									}
								}
							if($updType=="RF")
							{
								$nfadata = array(
									'status' => 2);
								$mUpdate = $this->ldWaiver->updateParentByKey($mId, $nfadata);
								$this->session->set_flashdata('success', 'NFA refloated successfully.');
								redirect('nfa/ldWaiver');
							}
							else
							{
								//echo $mail = $this->sendEmailToApprover();
								$this->session->set_flashdata('success', 'NFA added successfully.');
								redirect('nfa/ldWaiver');
							}
                        } else {
                            $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
                            redirect('buyer/users');
                        }
                    /*} else {
                        $this->session->set_flashdata('error', 'This email has been already taken.');
                        redirect('buyer/users');
                    }*/
                }
            /*} else {
                $this->session->set_flashdata('error', 'The Password and Confirm password doesnt match !!');
                redirect('buyer/users');
            }*/
        } else {
            $this->load->view('index', $data);
        }
    }

    public function actionEdit($mId,$updType='') {
		
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "users";
            if ($mId) {
                $mRecord = $this->ldWaiver->getParentByKey($mId);
				$mRecordReason = $this->ldWaiver->get_delay_reasons($mId);
				$mRecordUploads = $this->ldWaiver->get_file_uploads($mId);
				$mOriginal_contract_value = $mRecord['original_contract_value'];
				$mRecordApprovers = $this->ldWaiver->get_level_approvers($mId,$mOriginal_contract_value);
				//print_r($this->db->last_query());
				//print_r($mRecordApprovers);
                $data['mRecord'] = $mRecord;
				$data['mRecordReason'] = $mRecordReason;
				$data['mRecordUploads'] = $mRecordUploads;
				$data['mRecordApprovers'] = $mRecordApprovers;
				$data['updType'] = $updType;
				//$ar=$data['mRecordApprovers'];
				/*$found = current(array_filter($ar, function($item) {
				return isset($item['approver_level']) && 6 == $item['approver_level'];
			}));
				//print_r($ar);
				echo "<br>...........";
				echo $found['buyer_name'];*/
				
				//$keySearch = array_search(6, array_column($ar, 'approver_level'));
				//echo $keySearch."search";
				/*print_r($ar);
				echo "<br>...........";
				/*$ids = array_map(function ($ar1) {return $ar1['id'];}, $ar);
				print_r($ids);
				echo "<br>...........";*/
				//print_r($data['mRecordApprovers']);
                $this->load->view('nfa/ld_waiver_edit', $data);
            } else {
                redirect('nfa/ldWaiver');
            }
        } else {
            $this->load->view('index', $data);
        }
    }
	
	//public function sendEmailToApprover($mSub, $mMsg, $mTo) {
	public function sendEmailToApprover($mSubject=null,$mOriginal_contract_value=null,$version_id=null,$approver=null,$sender=null) {
		
		$msg = "First line of text\nSecond line of text";

		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,70);

		// send email
		//echo mail("sreenavc@datatemplate.com","My subject",$msg);
		//echo mail("sreenavc@gmail.com","My subject",$msg);
		//echo "mail";
		
		 //$to = "sreenavc@gmail.com";
		 $to = "sreenavc@datatemplate.com,abhinandmp@datatemplate.com";
		 $subject = "NFA for Approval: $mSubject: $mOriginal_contract_value ";
		 
		 
		 $message = "";
		 $message .= '<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>NFA MAIL</title>
    <meta name="description" content="Email Template.">
    <style type="text/css">
        a:hover {text-decoration: underline !important;}
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <!--100% body table-->
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: \'Open Sans\', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:60px;">&nbsp;</td>
                    </tr>
					<tr>
                        <td style="text-align:center;">
                          <a href="#" title="logo" target="_blank">
                            <img width="100" src="https://vendorsglobe.com/godrej/marketplace/assets/images/godrej-logo.png" title="logo" alt="logo">
                          </a>
                        </td>
                    </tr>

                    <tr>
                        <td style="height:10px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px;">
                                        <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:20px;font-family:\'Rubik\',sans-serif; text-align: start;">Subject: NFA for Approval: '.$mSubject.':' .$mOriginal_contract_value.' </h1>
                                        <span
                                            style="display:inline-block; vertical-align:middle; margin:29px 0 10px;">
                                        </span>
                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: start;">
                                            Dear '.$approver.', 
                                        </p>

                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: start; margin-top: 20px;">
                                            A new Note for Approval (NFA) has been initiated for '."$mSubject vide $version_id".' {{for amendments A/B/C}}.
                                        </p>

                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: start; margin-top: 20px;">
                                            Please click the below link to View & perform actions (viz. Approve / Reject / Keep on Hold) on the NFA.
                                        </p>

                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: start; margin-top: 20px;">
                                            http://192.168.137.8:81/Godrej/nfa/LdWaiver/ld_waiver_initiated
                                        </p>

                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: start; margin-top: 20px;">
                                            Thanking you, 
                                        </p>

                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: start; margin-top: 20px; font-weight:500; color:#1e1e2d;">'.$sender.'                                           
                                        </p>

                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>

</html>';
		 
		 $header = "From:abhinandmp@datatemplate.com \r\n";
		 $header .= "Cc:abhinandmp@datatemplate.com \r\n";
		 $header .= "MIME-Version: 1.0\r\n";
		 $header .= "Content-type: text/html\r\n";
		 
		 $retval = mail ($to,$subject,$message,$header);
		 
		 if( $retval == true ) {
			echo "Message sent successfully...";
		 }else {
			echo "Message could not be sent...";
		 }
        /*$mUserData = $this->register->getVendorByEmail($mTo);
        $mModMessage .= "Dear " . $mUserData['user_name'] . ", ";
        $mModMessage .= $mMsg;*/

        /*$this->load->library('email');
		$this->email->from("abhinandmp@datatemplate.com", "abhinand");
        $this->email->to("sreenavc@datatemplate.com", 'abhinandmp@datatemplate.com');
        $this->email->subject("test sub");
        $this->email->message($message);*/
        /*$this->email->from(EMAIL_FROM_ADDRESS, EMAIL_FROM);
        $this->email->to($mTo, '');
        $this->email->subject($mSub);
        $this->email->message($mModMessage);*/
        /*try {
            //$suc = $this->email->send();
            if ($suc) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            //echo $e->getMessage();
        }*/
    }

	public function view($mId,$pgType='')
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            //$data['home'] = "bidderList";
            //$data['records'] = $this->ldWaiver->getAllParent();
			if ($mId) {
				$mRecord = $this->ldWaiver->getParentByKey($mId);
				
				$mRecordReason = $this->ldWaiver->get_delay_reasons($mId);
				$mRecordUploads = $this->ldWaiver->get_file_uploads($mId);
				$mOriginal_contract_value = $mRecord['original_contract_value'];
				$mRecordApprovers = $this->ldWaiver->get_level_approvers($mId,$mOriginal_contract_value);
				//print_r($mRecordApprovers);
				$arr_key = array_search($mSessionKey, array_column($mRecordApprovers, 'approver_id'));
				$approver_level = $mRecordApprovers[$arr_key]['approver_level'];
				//echo "apr".$approver_level;
			    $salient_id = $mRecordApprovers[0]['salient_id'];
				if($approver_level>1)
				$data['preChkRecords'] = $this->ldWaiver->chkPreApproved($salient_id,$approver_level);
				else
				$data['preChkRecords']=1;
				//print_r($this->db->last_query());
				$data['mRecord'] = $mRecord;
				$data['mRecordReason'] = $mRecordReason;
				$data['mRecordUploads'] = $mRecordUploads;
				$data['mRecordApprovers'] = $mRecordApprovers;
				$data['controller'] = $this; 
				if($pgType=='A' || $pgType=='E' )
				{
					$data['pgType'] = $pgType; 
					$data['mId'] = $mId; 
				}
				$this->load->view('nfa/view_ld_waiver', $data);
			}
        } else {
            $this->load->view('index', $data);
        }
    }
	
	
	public function getLabelValue($label,$mRecordReason)
	 {
		 
		$reasonLabel = array ("Delay due to Contractor","Delay due to Company","Delay due to other reasons (beyond the control of Contractors/Company)","Impact on OC/Handover Timelines" );
		 
		foreach ($mRecordReason as $key => $value) 
		{ 
		 //echo $value['reason_label'];
			if($value['reason_label']=="$label")
			{
				//echo "test".$label;
				//echo $value['reason_value'];
				return $value['reason_value'];
			}

			 /* $key = array_search($value['reason_label'], array_column($value, 'reason_value'));  
				  echo "<br>key$key";
				if (!empty($key) || $key === 0) {  
					echo $value[$key];  
				} 
			*/
		}
	 } 
	
	public function approverDetails($mRecordApprovers)
	{
		$ar=$mRecordApprovers;
		//print_r($ar);
		//$i=6;
		$approver_arr=array();
		
		$found[$i][] = current(array_filter($ar, function($item) {
			global $approver_arr;
			//print_r($item);
			$level_approver = "level".$i."_approver";
			$$level_approver =  $item['buyer_name'];
			$approver_id = "approver".$i."_id";
			
			$approver_arr[$item['approver_id']]['approver_name'] = $item['buyer_name'];
			$approver_arr[$item['approver_id']]['approver_level'] = $item['approver_level'];
			$approver_arr[$item['approver_id']]['approved_status'] = $item['approved_status'];
			$approver_arr[$item['approver_id']]['approved_date'] = $item['approved_date'];
			$approver_arr[$item['approver_id']]['returned_text_status'] = $item['returned_text_status'];
			$approver_arr[$item['approver_id']]['returned_text_date'] = $item['returned_text_date'];
			$approver_arr[$item['approver_id']]['returned_by'] = $item['returned_by'];
			$approver_arr[$item['approver_id']]['returned_remarks'] = $item['returned_remarks'];
			$approver_arr[$item['approver_id']]['returned_date'] = $item['returned_date'];
			$approver_arr[$item['approver_id']]['amended_by'] = $item['amended_by'];
			$approver_arr[$item['approver_id']]['amended_remarks'] = $item['amended_remarks'];
			$approver_arr[$item['approver_id']]['amended_date'] = $item['amended_date'];
		
		
	}));
	global $approver_arr;
	return 	$approver_arr;					
							
	}
	public function iom(){
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "iom";
            $data['records'] = $this->ldWaiver->getAllParent();
            $this->load->view('nfa/iom', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	public function single_File_Upload($mId, $mFile) {
        $config['upload_path'] = './uploads/';
        $config['file_name'] = $mFile;
        $config['allowed_types'] = 'jpg|jpeg|gif|png|zip|xlsx|cad|pdf|doc|docx|ppt|pptx|pps|ppsx|odt|xls|xlsx|mp3|m4a|ogg|wav|mp4|m4v|mov|wmv|mpeg|MPG|csv';
        $config['overwrite'] = false;
        $config['encrypt_name'] = false;
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        $data = array();
		$file_arr = array();
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
			$file_arr['file_name'] = $filename;
			$file_arr['file_path'] = $config['upload_path'];
        }
        //return $filename;
		return $file_arr;
    }
	public function getRoleUsers() {
        $level = $this->input->post('level');
		$contract_value = $this->input->post('contract_value');
        if ($level) {
            $getUsers = $this->ldWaiver->get_users_role($level,$contract_value);
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
	public function getReportUsers() {
		//echo "test";
		//exit;
        $nfaType = $this->input->post('nfaType');
		if($nfaType=="Initiated")
			$param = array("buyer_role!="=>'PCM');
        if ($nfaType) {
			$getUsers = $this->ldWaiver->get_report_users($nfaType);
            //$getUsers = $this->ldWaiver->get_report_users($param);
			//print_r($getUsers);
			//echo $role = $getUsers->role;
            $result = '<option disabled="" selected="" value="" >Select Users</option>';
            foreach ($getUsers as $key => $valUser) {
                $result = $result . "<option value='" . $valUser->buyer_id . "'>" . $valUser->buyer_name . "</option>" . PHP_EOL;
            }
            echo $result;
        } else {
            echo "<option>No data</option>";
        }
    }
	public function displayReportUsers() {
		//echo "test";
		//exit;
        $nfaType = $this->input->post('nfaType');
		if($nfaType=="Initiated")
			$param = array("initiated_by="=>'PCM');
		else if($nfaType=="Cancelled")
			$param = array("cancelled_by="=>'PCM');
			//$param = array("buyer_role!="=>'PCM');
        if ($nfaType) {
            $getUsers = $this->ldWaiver->get_report_users($nfaType);
			//print_r($getUsers);
			//echo $role = $getUsers->role;
            return $getUsers;
        } else {
            //echo "<option>No data</option>";
        }
    }
	 public function ld_waiver_initiated()
    {
        $mSessionKey = $this->session->userdata('session_id');
		
        if ($mSessionKey) {
            $data['home'] = "initiated";
            $data['records'] = $this->ldWaiver->getAllInitiated($mSessionKey);
			//print_r($data['records'][0]);
			$approver_level = $data['records'][0]['approver_level'];
			$salient_id = $data['records'][0]['id'];
			if($approver_level>1)
				$data['preChkRecords'] = $this->ldWaiver->chkPreApproved($salient_id,$approver_level);
			else
				$data['preChkRecords']=1;
            $this->load->view('nfa/ld_waiver_initiated', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	public function returned()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "returned";
            $data['records'] = $this->ldWaiver->getReturnedNfa();
            $this->load->view('nfa/returned', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
    public function approved()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "approved";
			//$data['high_value'] = $this->ldWaiver->getMaxApproverLevel();
            $data['records'] = $this->ldWaiver->getNfaApproved($mSessionKey);
            $this->load->view('nfa/approved', $data);
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
				$mRecord = $this->ldWaiver->getNfaInitiated($mId,$mSessionKey);
				//print_r($mRecord);
				$approver_level = $mRecord[0]['approver_level'];
				$mRecordApprovers = $this->ldWaiver->getNfaStatus($mId,$mSessionKey,$approver_level);
				$param = array('salient_id' => $mId,'approver_id!=' => '');
				//$data['mRecordLevels'] = $this->ldWaiver->getMaxApproverLevel($param);
				//print_r($data['mRecordLevels']);
				$data['mRecord'] = $mRecord[0];
				$data['mRecordApprovers'] = $mRecordApprovers;
				
				//$data['mRecordApprovers'] = $mRecordApprovers;
				$this->load->view('nfa/approve', $data);
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
				$approvedata = array(
						'approved_status' => 1,
						'approved_remarks' => $this->input->post('approved_remarks'),
						'approved_date' => date('Y-m-d H:i:s')
						
					);
				$param = array('salient_id' => $mId,
						'approver_id' => $mSessionKey
						);	
				$mUpdate = $this->ldWaiver->updateData($param, $approvedata);
				if ($mUpdate) {
						echo "updated";
						//exit;
						$this->session->set_flashdata('success', 'NFA Approved successfully.');
						redirect('nfa/LdWaiver/ld_waiver_initiated');
				} else {
						$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
						redirect('nfa/ldWaiver/approve/' . $mId);
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
				$mRecord = $this->ldWaiver->getNfaInitiated($mId,$mSessionKey);
				//print_r($mRecord);
				$approver_level = $mRecord[0]['approver_level'];
				$mRecordApprovers = $this->ldWaiver->getNfaStatus($mId,$mSessionKey,$approver_level);
				$data['mRecord'] = $mRecord[0];
				$data['mRecordApprovers'] = $mRecordApprovers;
				$this->load->view('nfa/return_text_correction', $data);
			}
			
			
        } else {
            $this->load->view('index', $data);
        }
    }
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
				$mUpdate = $this->ldWaiver->updateData($param, $returnData);
				if ($mUpdate) {
						echo "updated";
						$nfadata = array(
						'nfa_status' => 'RT'
											
					);
						$mUpdateSalient = $this->ldWaiver->updateParentByKey($mId, $nfadata);
						//exit;
						$this->session->set_flashdata('success', 'NFA Returned for text correction successfully.');
						redirect('nfa/LdWaiver/ld_waiver_initiated');
				} else {
						$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
						redirect('nfa/ldWaiver/return_text/' . $mId);
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
            $mRecord = $this->ldWaiver->getNfaInitiated($mId,$mSessionKey);
			//print_r($mRecord);
			$approver_level = $mRecord[0]['approver_level'];
			$mRecordApprovers = $this->ldWaiver->getNfaStatus($mId,$mSessionKey,$approver_level);
			$data['mRecord'] = $mRecord[0];
			$data['mRecordApprovers'] = $mRecordApprovers;
            $this->load->view('nfa/return', $data);
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
			if ($mId) {
				$returnData = array(
						
						'returned_by' => $mSessionKey,
						'returned_remarks	' => $this->input->post('returned_remarks'),
						'returned_date' => date('Y-m-d H:i:s')
						
					);
				$param = array('salient_id' => $mId,
						'approver_id' => $mSessionKey
						);	
				$mUpdate = $this->ldWaiver->updateData($param, $returnData);
				if ($mUpdate) {
						echo "updated";
						$nfadata = array(
						
						'nfa_status' => 'R'
											
					);
						$mUpdateSalient = $this->ldWaiver->updateParentByKey($mId, $nfadata);
						//exit;
						$this->session->set_flashdata('success', 'NFA Returned  successfully.');
						redirect('nfa/LdWaiver/ld_waiver_initiated');
				} else {
						$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
						redirect('nfa/ldWaiver/return_text/' . $mId);
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
            $mRecord = $this->ldWaiver->getParentByKey($mId);
			//print_r($mRecord);
			//$approver_level = $mRecord[0]['approver_level'];
			//$mRecordApprovers = $this->ldWaiver->getNfaStatus($mId,$mSessionKey,$approver_level);
			$data['mRecord'] = $mRecord;
			//$data['mRecordApprovers'] = $mRecordApprovers;
            $this->load->view('nfa/ld_waiver_amend', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
	public function actionAmendNfa($mId) {
		//echo "test";
		//exit;
		$mSessionKey = $this->session->userdata('session_id');
	
		if ($mSessionKey) {
			$data['home'] = "users";
			if ($mId) {
				$amendData = array(
						
						'amended_by' => $mSessionKey,
						'amended_remarks' => $this->input->post('amended_remarks'),
						'amended_date' => date('Y-m-d H:i:s')
						
					);
				$param = array('salient_id' => $mId,
						'approver_id' => $mSessionKey
						);	
				$mUpdate = $this->ldWaiver->updateData($param, $amendData);
				if ($mUpdate) {
						echo "updated";
						$nfadata = array(
						
						'nfa_status' => 'AMD'
											
					);
						$mUpdateSalient = $this->ldWaiver->updateParentByKey($mId, $nfadata);
						//exit;
						$this->session->set_flashdata('success', 'NFA amended successfully.');
						redirect('nfa/LdWaiver/approved');
				} else {
						$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
						redirect('nfa/ldWaiver/ld_waiver_amend/' . $mId);
				}
			}
		} else {
			$this->load->view('index', $data);
		}
    }
	public function ld_waiver_amended()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "amended";
			$param = array('status'=> 1,'nfa_status '=> 'AMD');
            //$data['records'] = $this->ldWaiver->getNfaAmended($mSessionKey);
			$data['records'] = $this->ldWaiver->getNfaData($param);
            $this->load->view('nfa/ld_waiver_amended', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
    public function cancel($mId)
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $mRecord = $this->ldWaiver->getNfaDraft($mId,$mSessionKey);
			//print_r($mRecord);
			$approver_level = $mRecord[0]['approver_level'];
			$mRecordApprovers = $this->ldWaiver->getNfaStatus($mId,$mSessionKey,$approver_level,"draft");
			//print_r($mRecordApprovers);
			$data['mRecord'] = $mRecord[0];
			$data['mRecordApprovers'] = $mRecordApprovers;
            $this->load->view('nfa/cancel', $data);
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
						$mUpdateSalient = $this->ldWaiver->updateParentByKey($mId, $nfadata);
						//exit;
						if ($mUpdateSalient) {
							$this->session->set_flashdata('success', 'NFA Cancelled  successfully.');
							redirect('nfa/ldWaiver');
						}
						else {
							$this->session->set_flashdata('error', 'Something went wrong, Please try again.');
							redirect('nfa/ldWaiver/cancel/' . $mId);
						}
						
				
				
			}
		} else {
			$this->load->view('index', $data);
		}
    }
	public function ld_waiver_cancelled()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            $data['home'] = "cancelled";
			$param = array('status'=> 0,'nfa_status '=> 'C');
            $data['records'] = $this->ldWaiver->getNfaData($param);
            $this->load->view('nfa/ld_waiver_cancelled', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
    public function report()
    {
        $mSessionKey = $this->session->userdata('session_id');
		
        if ($mSessionKey) {
            $data['home'] = "reports";
			$nfaType = $this->input->post('nfaType');
			$buyer_id = $this->input->post('buyer_id');
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			//if($nfaType=='')
				//$nfaType="Initiated";
			$data['records'] = $this->ldWaiver->getReportData($nfaType,$buyer_id,$start_date,$end_date);
			//$data['records'] = $this->ldWaiver->getAllInitiated($buyer_id);
			$data['recordBuyers'] = $this->displayReportUsers();
			$data['buyer_id'] = $buyer_id;
			$data['start_date'] = $start_date;
			$data['end_date'] = $end_date;
			$data['nfaType'] = $nfaType;
			
			//print_r($$data['recordBuyers']);
		
			
			$this->load->view('nfa/reports', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
    public function esign()
    {
        $mSessionKey = $this->session->userdata('session_id');
        if ($mSessionKey) {
            // $data['home'] = "reports";
            $data['records'] = $this->ldWaiver->getAllParent();
            $this->load->view('nfa/esign', $data);
        } else {
            $this->load->view('index', $data);
        }
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect('buyer');
    }
	 /**
  * Remove any elements where the value is empty
  * @param  array $array the array to walk
  * @return array
  */
	public function  removeEmptyValues(array &$array){
		foreach ($array as $key => &$value) {
		  if (is_array($value)) {
			$value = removeEmptyValues($value);
		  }
		  if (empty($value)) {
			unset($array[$key]);
		  }
		}
		return $array;
	}
	//}

}
