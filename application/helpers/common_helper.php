<?php
define("NFA_FROM_EMAIL", "info@vendorglobe.com");
define("NFA_REPLYTO_EMAIL", "info@vendorglobe.com");
define("NFA_RETURN_PATH", "info@vendorglobe.com");

function single_File_Upload($mId, $mFile) {
		$ci =& get_instance();
        $config['upload_path'] = './uploads/';
        $config['file_name'] = $mFile;
        $config['allowed_types'] = 'jpg|jpeg|gif|png|zip|xlsx|cad|pdf|doc|docx|ppt|pptx|pps|ppsx|odt|xls|xlsx|mp3|m4a|ogg|wav|mp4|m4v|mov|wmv|mpeg|MPG|csv';
        $config['overwrite'] = false;
        $config['encrypt_name'] = false;
		$ci->load->library('upload', $config);
        $ci->upload->initialize($config);
      
        $data = array();
		$file_arr = array();
        if (!$ci->upload->do_upload($mId)) {
            $mOutPut = $ci->upload->data();
            $filename = "";
            $data['file_name'] = "";
            $data['result'] = 'fail';
            $data['message'] = $ci->upload->display_errors();
        } else {
            $mOutPut = $ci->upload->data();
            $filename = $mOutPut['file_name'];
            $data['file_name'] = $mOutPut['file_name'];
            $data['result'] = 'success';
            $data['message'] = 'file was uploaded fine';
            $data['error'] = $ci->upload->display_errors('<div class="alert alert-error">', '</div>');
			$file_arr['file_name'] = $filename;
			$file_arr['file_path'] = $config['upload_path'];
        }
       
		return $file_arr;
    }
	
	 /**
  * Remove any elements where the value is empty
  * @param  array $array the array to walk
  * @return array
  */
function  removeEmptyValues(array &$array){
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

//Send mail while submit NFA
function sendEmailToApprover($mSubject=null,$package_value_mail=null,$version_id=null,$approver=null,$approver_mail=null,$sender=null,$mail_url=null) {
			
		$mSubject=strip_tags($mSubject);
		
		// send email
		
		 $to = $approver_mail;
		
		 $subject = "IOM for Approval: $mSubject: $package_value_mail ";
		 
		 $message = "";
		 $message .= '<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>IOM MAIL</title>
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
                                        <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:20px;font-family:\'Rubik\',sans-serif; text-align: start;">Subject: NFA for Approval: '.$mSubject.':' .$package_value_mail.' </h1>
                                        <span
                                            style="display:inline-block; vertical-align:middle; margin:29px 0 10px;">
                                        </span>
                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: start;">
                                            Dear '.$approver.', 
                                        </p>

                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: start; margin-top: 20px;">
                                            A new Note for Approval (IOM) has been initiated for '."$mSubject vide $version_id".' .
                                        </p>

                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: start; margin-top: 20px;">
                                            Please click the below link to View & perform actions (viz. Approve / Return) on the NFA.
                                        </p>

                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: start; margin-top: 20px;">'.
                                            $mail_url.'
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
		 
		 $header = "From:".NFA_FROM_EMAIL." \r\n";
		 $headers .= "Reply-To: ".NFA_REPLYTO_EMAIL."\r\n";
		 $headers .= "Return-Path: ".NFA_RETURN_PATH."\r\n";


		
		 $header .= "MIME-Version: 1.0\r\n";
		 $header .= "Content-type: text/html\r\n";
		 
		 
		 $retval = mail ($to,$subject,$message,$header);
		 
		 if( $retval == true ) {
			echo "Message sent successfully...";
		 }else {
			echo "Message could not be sent...";
		 }
        
    }
	
	//Send mail to all below levels while approve NFA
function sendEmailToUsers($mSubject=null,$package_value_mail=null,$version_id=null,$receiver_arr=null,$sender=null,$mail_url=null,$returned_remarks=null,$mail_type=null) {
		
	
		$mSubject=strip_tags($mSubject);

		 foreach($receiver_arr as $key=>$val)
		 {
			 $to = $val;
			 						
			 $receiver = $key;
			
			 if($mail_type=="LowLevels")
			 {
				$subject = "IOM Approved: $mSubject: $package_value_mail ";
				$content = '   <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:20px;font-family:\'Rubik\',sans-serif; text-align: start;">Subject: NFA Approved: '.$mSubject.':' .$package_value_mail.'</h1>
				<span
					style="display:inline-block; vertical-align:middle; margin:29px 0 10px;">
				</span>
				<p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: start;">
					Dear '.$receiver.',
				</p>

				<p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: start; margin-top: 20px;">
					Note for Approval (IOM) submitted for '."$mSubject vide $version_id".' has been approved by '.$sender.
				'</p>

				<p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: start; margin-top: 20px;">
					Please click the below link to View the IOM.
				</p>';
			 }
			 else if($mail_type=="returnLowLevels")
			 {
				$subject = "IOM Returned: $mSubject: $package_value_mail ";
				$content = '    <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:20px;font-family:\'Rubik\',sans-serif; text-align: start;">Subject: NFA Returned: '.$mSubject.':' .$package_value_mail.'</h1>
				<span
					style="display:inline-block; vertical-align:middle; margin:29px 0 10px;">
				</span>
				<p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: start;">
					Dear '.$receiver.',
				</p>

				<p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: start; margin-top: 20px;">
					Note for Approval (NFA) submitted for '."$mSubject vide $version_id".'  has been Returned with the following remarks:<br>
					"'.$returned_remarks.'"
				</p>

				<p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: start; margin-top: 20px;">
					Please click the below link to View the NFA.
				</p>';
			 }
			 else if($mail_type=="approver_123")
			 {
				$subject = "IOM for Approval: $mSubject: $package_value_mail ";
				$content = '   <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:20px;font-family:\'Rubik\',sans-serif; text-align: start;">Subject: NFA for Approval: '.$mSubject.':' .$package_value_mail.' </h1>
                                        <span
                                            style="display:inline-block; vertical-align:middle; margin:29px 0 10px;">
                                        </span>
                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: start;">
                                            Dear '.$receiver.', 
                                        </p>

                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: start; margin-top: 20px;">
                                            A new Note for Approval (IOM) has been initiated for '."$mSubject vide $version_id".' .
                                        </p>

                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: start; margin-top: 20px;">
                                            Please click the below link to View & perform actions (viz. Approve / Return) on the IOM.
                                        </p>';
			 }
			$message = "";
			$message .= '<!doctype html>
			<html lang="en-US">

			<head>
				<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
				<title>IOM MAIL</title>
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
													'.$content.'

													<p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: start; margin-top: 20px;">'.
														$mail_url.'
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
						
			 $header = "From:".NFA_FROM_EMAIL." \r\n";
			 $headers .= "Reply-To: ".NFA_REPLYTO_EMAIL."\r\n";
			 $headers .= "Return-Path: ".NFA_RETURN_PATH."\r\n";
			 $header .= "MIME-Version: 1.0\r\n";
			 $header .= "Content-type: text/html\r\n";
			 
			 
			 $retval = mail ($to,$subject,$message,$header);
			
			 if( $retval == true ) {
				echo "Message sent successfully...";
			 }else {
				echo "Message could not be sent...";
			 }
			 
		 }


		 return $retval;
        
    }
	
	
	function approverDetails($mRecordApprovers)
	{
		
		$ar=$mRecordApprovers;
		
		$approver_arr=array();
		
		$found[$i][] = current(array_filter($ar, function($item) {
			global $approver_arr;
			
			$level_approver = "level".$i."_approver";
			$$level_approver =  $item['buyer_name'];
			$approver_id = "approver".$i."_id";
			
			$approver_arr[$item['approver_id']]['approver_name'] = $item['buyer_name'];
			$approver_arr[$item['approver_id']]['approver_level'] = $item['approver_level'];
			$approver_arr[$item['approver_id']]['approved_status'] = $item['approved_status'];
			$approver_arr[$item['approver_id']]['approved_remarks'] = $item['approved_remarks'];
			$approver_arr[$item['approver_id']]['approved_date'] = $item['approved_date'];
			$approver_arr[$item['approver_id']]['returned_text_status'] = $item['returned_text_status'];
			$approver_arr[$item['approver_id']]['returned_text_remarks'] = $item['returned_text_remarks'];
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
	//Nfa Type dropdown for draft NFA
	function nfa_dropdown_draft($nfaType=null)
	{
		$selOption = "selected";
				
		$nfa_select = ' <select id="nfaType" name="nfaType" required="" class="form-control">
							<option value="">Select NFA Type</option>
							<option value="'. base_url('nfa/BidderListContractor/bidder_contract_list').'" '.(($nfaType=="bidder_contract") ? $selOption : "").'>Short Listing Approval For Contractor</option>
							<option value="'. base_url('nfa/BidderListSupplier/bidder_supplier_list').'"'.(($nfaType=="bidder_supplier") ? $selOption : "").'>Short Listing Approval For Supplier</option>
							<option value="'. base_url('nfa/Award_contract/award_recomm_contract_list').'" '.(($nfaType=="award_contract") ? $selOption : "").'>Award Recommendation for Contracts</option>
							<option value="'. base_url('nfa/Award_procurement/award_recomm_procurement_list').'" '.(($nfaType=="award_procurement") ? $selOption : "").'>Award Recommendation for Procurement</option>
							<option value="'. base_url('nfa/amendment_in_contract/amendment_contract_list').'" '.(($nfaType=="amendment_contract") ? $selOption : "").'>Amendment in Contract</option>
							<option value="">Descoping IOM</option>
							<option value="">Termination IOM</option>
							<option value="">BG Encashment</option>
							<option value="'.base_url('nfa/LdWaiver').'>">LD Waiver</option>
							<option value="">Contractual Deviations</option>
						</select>';
		return 	$nfa_select;	
		
	}
	//Nfa Type dropdown for initiated NFA
	function nfa_dropdown_initiated($nfaType=null)
	{
		$selOption = "selected";
		$nfa_select = ' <select id="nfaType" name="nfaType" required="" class="form-control">
							<option value="">Select NFA Type</option>
							<option value="'. base_url('nfa/BidderListContractor/initiated_nfa').'" '.(($nfaType=="bidder_contract") ? $selOption : "").'>Short Listing Approval For Contractor</option>
							<option value="'. base_url('nfa/BidderListSupplier/initiated_nfa').'" '.(($nfaType=="bidder_supplier") ? $selOption : "").'>Short Listing Approval For Supplier</option>
							<option value="'. base_url('nfa/Award_contract/initiated_nfa').'" '.(($nfaType=="award_contract") ? $selOption : "").'>Award Recommendation for Contracts</option>
							<option value="'. base_url('nfa/Award_procurement/initiated_nfa').'" '.(($nfaType=="award_procurement") ? $selOption : "").'>Award Recommendation for Procurement</option>                                               
							
							<option value="'. base_url('nfa/amendment_in_contract/initiated_nfa').'" '.(($nfaType=="amendment_contract") ? $selOption : "").'>Amendment in Contract</option>
							<option value="">Descoping IOM</option>
							<option value="">Termination IOM</option>
							<option value="">BG Encashment</option>
							<option value="'.base_url('nfa/LdWaiver').'>">LD Waiver</option>
							<option value="">Contractual Deviations</option>
						</select>';
		return 	$nfa_select;	
		
	}
	//Nfa Type dropdown for Approved NFA
	function nfa_dropdown_approved($nfaType=null)
	{
		$selOption = "selected";
		$nfa_select = ' <select id="nfaType" name="nfaType" required="" class="form-control">
							<option value="">Select NFA Type</option>
							<option value="'. base_url('nfa/BidderListContractor/approved_nfa').'" '.(($nfaType=="bidder_contract") ? $selOption : "").'>Short Listing Approval For Contractor</option>
							<option value="'. base_url('nfa/BidderListSupplier/approved_nfa').'" '.(($nfaType=="bidder_supplier") ? $selOption : "").'>Short Listing Approval For Supplier</option>
							<option value="'. base_url('nfa/Award_contract/approved_nfa').'" '.(($nfaType=="award_contract") ? $selOption : "").'>Award Recommendation for Contracts</option>
							<option value="'. base_url('nfa/Award_procurement/approved_nfa').'" '.(($nfaType=="award_procurement") ? $selOption : "").'>Award Recommendation for Procurement</option>  
							
							<option value="">Amendment in Contract</option>
							<option value="">Descoping IOM</option>
							<option value="">Termination IOM</option>
							<option value="">BG Encashment</option>
							<option value="'.base_url('nfa/LdWaiver').'>">LD Waiver</option>
							<option value="">Contractual Deviations</option>
                        </select>';
		return 	$nfa_select;	
		
	}
	//Nfa Type dropdown for Returned NFA
	function nfa_dropdown_returned($nfaType=null)
	{
		$selOption = "selected";
		$nfa_select = ' <select id="nfaType" name="nfaType" required="" class="form-control">
							<option value="">Select NFA Type</option>
							<option value="'. base_url('nfa/BidderListContractor/returned_nfa').'" '.(($nfaType=="bidder_contract") ? $selOption : "").'>Short Listing Approval For Contractor</option>
							<option value="'. base_url('nfa/BidderListSupplier/returned_nfa').'" '.(($nfaType=="bidder_supplier") ? $selOption : "").'>Short Listing Approval For Supplier</option>
							<option value="'. base_url('nfa/Award_contract/returned_nfa').'" '.(($nfaType=="award_contract") ? $selOption : "").'>Award Recommendation for Contracts</option>
							<option value="'. base_url('nfa/Award_procurement/returned_nfa').'" '.(($nfaType=="award_procurement") ? $selOption : "").'>Award Recommendation for Procurement</option>  
							<option value="">Amendment in Contract</option>
							<option value="">Descoping IOM</option>
							<option value="">Termination IOM</option>
							<option value="">BG Encashment</option>
							<option value="'.base_url('nfa/LdWaiver').'>">LD Waiver</option>
							<option value="">Contractual Deviations</option>
						</select>';
		return 	$nfa_select;	
		
	}
	//Nfa Type dropdown for Returned NFA
	function nfa_dropdown_amended($nfaType=null)
	{
		$selOption = "selected";
		$nfa_select = ' <select id="nfaType" name="nfaType" required="" class="form-control">
							<option value="">Select NFA Type</option>
							<option value="'. base_url('nfa/BidderListContractor/amended_nfa').'" '.(($nfaType=="bidder_contract") ? $selOption : "").'>Short Listing Approval For Contractor</option>
							<option value="'. base_url('nfa/BidderListSupplier/amended_nfa').'" '.(($nfaType=="bidder_supplier") ? $selOption : "").'>Short Listing Approval For Supplier</option>
							<option value="'. base_url('nfa/Award_contract/amended_nfa').'" '.(($nfaType=="award_contract") ? $selOption : "").'>Award Recommendation for Contracts</option>
							<option value="'. base_url('nfa/Award_procurement/amended_nfa').'" '.(($nfaType=="award_procurement") ? $selOption : "").'>Award Recommendation for Procurement</option>  
							<option value="">Amendment in Contract</option>
							<option value="">Descoping IOM</option>
							<option value="">Termination IOM</option>
							<option value="">BG Encashment</option>
							<option value="'.base_url('nfa/LdWaiver').'>">LD Waiver</option>
							<option value="">Contractual Deviations</option>
						</select>';
		return 	$nfa_select;	
		
	}
	//Nfa Type dropdown for cancelled NFA
	function nfa_dropdown_cancelled($nfaType=null)
	{
		$selOption = "selected";
		$nfa_select = ' <select id="nfaType" name="nfaType" required="" class="form-control">
							<option value="">Select NFA Type</option>
							<option value="'. base_url('nfa/BidderListContractor/cancelled_nfa').'" '.(($nfaType=="bidder_contract") ? $selOption : "").'>Short Listing Approval For Contractor</option>
							<option value="'. base_url('nfa/BidderListSupplier/cancelled_nfa').'" '.(($nfaType=="bidder_supplier") ? $selOption : "").'>Short Listing Approval For Supplier</option>
							<option value="'. base_url('nfa/Award_contract/cancelled_nfa').'" '.(($nfaType=="award_contract") ? $selOption : "").'>Award Recommendation for Contracts</option>
							<option value="'. base_url('nfa/Award_procurement/cancelled_nfa').'" '.(($nfaType=="award_procurement") ? $selOption : "").'>Award Recommendation for Procurement</option>										                                      <option value="">Amendment in Contract</option>
							<option value="">Descoping IOM</option>
							<option value="">Termination IOM</option>
							<option value="">BG Encashment</option>
							<option value="'.base_url('nfa/LdWaiver').'>">LD Waiver</option>
							<option value="">Contractual Deviations</option>
						</select>';
		return 	$nfa_select;	
		
	}
	//Nfa Type dropdown for Reports
	function nfa_dropdown_reports($nfaType=null)
	{
		$selOption = "selected";
		$nfa_select =   '<select id="nfaType" name="nfaType" required="" class="form-control">
							<option value="">Select NFA Type</option>
							
							<option value="'. base_url('nfa/Award_contract/reports').'" '.(($nfaType=="award_contract") ? $selOption : "").'>Award Recommendation for Contracts</option>
							<option value="'. base_url('nfa/Award_procurement/reports').'" '.(($nfaType=="award_procurement") ? $selOption : "").'>Award Recommendation for Procurement</option>                                                   
					
						</select>';
												
		
		return 	$nfa_select;	
		
	}
	//Report Users
	function displayReportUsers() {
		
		$ci =& get_instance();
        $nfaStatus = $ci->input->post('nfaStatus');
		if($nfaStatus=="Initiated")
			$param = array("initiated_by="=>'PCM');
		else if($nfaStatus=="Cancelled")
			$param = array("cancelled_by="=>'PCM');
			
        if ($nfaStatus) {
            $getUsers = $ci->nfaAction->get_report_users($nfaStatus);
			
            return $getUsers;
        } 
    }
	
	//NFA Logs
	//Nfa Type dropdown for Logs
	function nfa_dropdown_logs($nfaType=null)
	{
		$selOption = "selected";
		$nfa_select = ' <select id="nfaType" name="nfaType" required="" class="form-control">
							<option value="">Select NFA Type</option>
							<option value="'. base_url('nfa/BidderListContractor/nfa_logs').'" '.(($nfaType=="bidder_contract") ? $selOption : "").'>Short Listing Approval For Contractor</option>
							<option value="'. base_url('nfa/BidderListSupplier/nfa_logs').'" '.(($nfaType=="bidder_supplier") ? $selOption : "").'>Short Listing Approval For Supplier</option>
							<option value="'. base_url('nfa/Award_contract/nfa_logs').'" '.(($nfaType=="award_contract") ? $selOption : "").'>Award Recommendation for Contracts</option>
							<option value="'. base_url('nfa/Award_procurement/nfa_logs').'" '.(($nfaType=="award_procurement") ? $selOption : "").'>Award Recommendation for Procurement</option>			
							<option value="">Amendment in Contract</option>
							<option value="">Descoping IOM</option>
							<option value="">Termination IOM</option>
							<option value="">BG Encashment</option>
							<option value="'.base_url('nfa/LdWaiver').'>">LD Waiver</option>
							<option value="">Contractual Deviations</option>
						</select>';
		return 	$nfa_select;	
		
	}

	
?>