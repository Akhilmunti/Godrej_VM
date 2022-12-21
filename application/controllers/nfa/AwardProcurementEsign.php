<?php

defined('BASEPATH') OR exit('No direct script access allowed');

include_once (dirname(__FILE__) . "/Award_procurement.php");
	
class AwardProcurementEsign extends Award_procurement {  

    public function __construct() {
			
        parent::__construct();
		
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
        $this->load->helper(array('form', 'url','common_helper'));
        $this->load->library('form_validation');
		$this->load->library('form_validation');
		
        $this->load->library('pdf');
		
        date_default_timezone_set("Asia/Kolkata");
        $this->load->model('buyer_model', 'buyer');
		$this->load->model('common_model', 'common');
		$this->load->model('nfa_action_model', 'nfaAction');
        $this->load->model('Award_procurement_model', 'awardRecommProcurement');
        $this->load->helper('date');
		
      
		
    }

    public function esignedPdf($mId,$pgType='') {
		
	
		$path =  realpath('data/cert/tcpdf.crt');
	
		
		
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information

$pdf->setTitle('NFA - Award Recommendation for Procurement');
$pdf->setSubject('Esigned NFA');
$pdf->setKeywords('NFA, PDF, Award Recommendation for Procurement');

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Award Recommendation for Procurement", PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

/*
NOTES:
 - To create self-signed signature: openssl req -x509 -nodes -days 365000 -newkey rsa:1024 -keyout tcpdf.crt -out tcpdf.crt
 - To export crt to p12: openssl pkcs12 -export -in tcpdf.crt -out tcpdf.p12
 - To convert pfx certificate to pem: openssl pkcs12 -in tcpdf.pfx -out tcpdf.crt -nodes
*/
//$libPath = APPPATH."libraries\\";
$libPath = APPPATH."libraries//";
// set certificate file

$certificate ='file://'.$libPath.'TCPDF-main\examples\data\cert\tcpdf.crt';

$image_path = realpath(APPPATH.'../images');



// set additional information
$info = array(
	'Name' => 'Award Recommendation for Procurement',
	'Location' => 'Office',
	'Reason' => 'Esign',
	'ContactInfo' => 'https://vendorsglobe.com',
	);

// set document signature
$pdf->setSignature($certificate, $certificate, 'nfaAwardRecommendationForProcurement', '', 2, $info);

// set font
$pdf->setFont('helvetica', '', 12);

// add a page
$pdf->AddPage();

// print a line of text
$text = 'IOM Information';
$pdf->writeHTML($text, true, 0, true, 0);

	$mSessionKey = $this->session->userdata('session_id');
      
	
	if ($mId) {
		$mRecord = $this->nfaAction->get_salient_initiator($mId,"award_procurement");
		$salient_id = $mRecord['id'];
		$mRecordAwdContract = $this->awardRecommProcurement->get_award_procurement_data($salient_id);
		$mRecordPackage = $this->awardRecommProcurement->get_award_procurement_package_data($salient_id);
		$mRecordFinalBidders = $this->awardRecommProcurement->getFinalBidders($salient_id);
		
		$mRecordMajorTerms = $this->awardRecommProcurement->getMajorTerms($mId);
	
		$mRecordLevelsObj = $this->nfaAction->getAllLevelRole_approvers('',$salient_id,"award_procurement","view");
		$mRecordLevels = json_decode(json_encode($mRecordLevelsObj), true);
		
		$salient_id = $mRecordApprovers[0]['salient_id'];
				
			}
       
// create some HTML content
 $html = '
            <style>
            .p2{
                padding:2%;
            }
            .bg-primary{
                background-color:#d2d2d4;
            }
            .font-large{
                font-size:"17px";
            }
            .center-align{
                text-align:"center";
            }
            .max-width{
                width:100%;
            }
			.table-view{
				border: 1.5px solid grey;
    			padding: 10px;
				margin-left:50px;
			}
			.hr-bold-line {
				border: 1px solid gray;
			}
            </style>
			<div class="p2"></div>
			<div class="max-width">
                <table class="p2" border="1">
                    <tbody>
                        <tr>
                            <td>ENFA NO : ' . $mRecord['version_id'] . '
							<br>Initiator : '.$mRecord['buyer_name'].'
							<br>Subject : ' . strip_tags($mRecord['subject']) . '
							<br>Scope of Work : ' . strip_tags($mRecord['scope_of_work']) . '	
							<br>Type of Procurement : '.$mRecord['procurement_type'].'		
							</td>                           
                        </tr> 
                    </tbody>
                </table>
            </div>
            <div>
                <table class="p2" border="1">
                    <thead>
                        <tr>
                            <th class="center-align">Award Synopsis |'.$mRecordAwdContract['synopsis_label'].'</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div>
                <table class="p2" border="1">
                    <thead>
                        <tr class="bg-primary center-align">
                            <th>Description</th>';
						
										 
										 foreach($mRecordPackage as $key=>$val)
											{	
											
                            $html .= '<th>'.$val['package_name'].'</th>';
						
											}
                         
                            $html .= '<th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Budget incl Escalation</td>';
							 foreach($mRecordPackage as $key=>$val)
											 {
											 	
                            $html .= '<td>'.
                              $val['package_budget_esc'].'
                            </td>';
							}
                            
                             $html .= '<td>'.$mRecord['total_budget_esc'].'</td>
                        </tr>
                        <tr>
                            <td>Negotiated Value (Excl. Tax) – Pre Final Round</td>';
							 foreach($mRecordPackage as $key=>$val)
											 {
											 	
                            $html .= '
                            <td>'.$val['package_negot_value'].'</td>';
											 }
                             $html .='<td>'.$mRecord['total_negot_value'].'</td>
                        </tr>
                        <tr>
                            <td>Finalized Proposed Award Value (Excl Tax)</td>';
							 foreach($mRecordPackage as $key=>$val)
							{
											 	
								$html .= '
								<td>
								   '.$val['finalized_award_value_package'].'
								</td>';
							}
                           
                             $html .='<td>'.$mRecord['total_negot_value'].'</td>
                        </tr>
						<tr >
                            <td>Expected Savings w.r.t Budget incl. escalation</td>';
							foreach($mRecordPackage as $key=>$val)
							{
											 	
								$html .= '
								<td>
								   '.$val['expected_savings_package'].' %
								</td>';
							}
                           
                             $html .='<td>'.$mRecord['total_expected_savings'].' %</td>
                        </tr>
                        <tr>
                            <td>Recommended Vendors based on L1 position ( Package-wise)</td>';
							foreach($mRecordPackage as $key=>$val)
							{
											 	
								$html .= '
								<td>
								   '.$val['recomm_vendor_package'].'
								</td>';
							}
                            $html .='<td></td>
                        </tr>

						<tr >
                            <td>Basis of award</td>';
							foreach($mRecordPackage as $key=>$val)
							{
											 	
								$html .= '
								<td>
								   '.$val['basis_award_package'].' %
								</td>';
							}
                           
                             $html .='<td>'.$mRecord['basis_award_package'].' %</td>
                        </tr>
                        <tr>
                            <td>Deviation from Approved Contracting Strategy</td>';
							foreach($mRecordPackage as $key=>$val)
							{
											 	
								$html .= '
								<td>
								   '.$val['deviation_approved_package'].'
								</td>';
							}
                            $html .='<td></td>
                        </tr>


                        <tr>
                            <td>Last Awarded Benchmark with Date</td>';
							foreach($mRecordPackage as $key=>$val)
							{
											 	
								$html .= '
								<td>
								   '.$val['finalized_award_value_package'].'
								</td>';
							}
                           
                             $html .='<td>'.$mRecord['total_finalized_award_value'].'</td>
                        </tr> ';
			
						
                        $html .='<tr>
                            <td>Proposed Award Value (Excl Tax) - Adjusted Awarded Value(Post Basic Rate Adjustment): SAP WO VALUE TO BE CREATED</td>';
							foreach($mRecordPackage as $key=>$val)
							{
											 	
								$html .= '
								<td>
								   '.$val['post_basic_rate_package'].'
								</td>';
							}
                           
                             $html .='<td>'.$mRecord['total_post_basic_rate'].'</td>
                        </tr>
                        
                        
                    </tbody>
                </table>
            </div>

            <div>
                <h5 class="font-large">Final Bid Scenario</h5>
            </div>
            
            <div>

                <table class="p2" border="1">
                    <thead>
                        <tr class="bg-primary">
                            <th>Description</th>
                            <th>GPL Budget (with escalation)</th>';
								foreach($mRecordFinalBidders as $key=>$val)
								{
									
									$final_bidder_name = $val->final_bidder_name;
									
									
									$html .='<th scope="col">'.$final_bidder_name.'</th>';
							  
								 }
											 
                        $html .='</tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PQ/ Feedback Score (Auto picked)</td>
							 <td class="">-></td>';
								foreach($mRecordFinalBidders as $key=>$val)
								{
									
									$score_type = $valBid->score_type;
									$score = $valBid->score;
									$score_class="";
									if($score_type=="PQ")
										$score_class = " background-pq";
									else if($score_type=="FB")
										$score_class = " background-feedback";
									
									
									$html .='<th scope="col">'.$final_bidder_name.'</th>';
							  
								 }
											 
                        $html .='</tr>';
						foreach($mRecordPackage as $key=>$val)
							{
								$id_index = $key+1;
								$package_id = $val['package_id'];
								$salient_id = $val['salient_id'];
								
								
								$CI=&get_instance();

								$finalBidData = $CI->getFinalBidData($salient_id,$package_id);
								$package_gpl_budget_value =  $finalBidData->package_gpl_budget;
								$html .='<tr>
								<td>'. $val['package_name'].'</td>
								<td>'. $package_gpl_budget_value.'</td>';
								foreach($mRecordFinalBidders as $keyBid=>$valBid)
								{
									
									$bid_index = $keyBid+1;
									$bidder_id = $valBid->id;
									
								
									$finalBiddersData = $CI->getFinalBidData($salient_id,$package_id,$bidder_id);
									
									$package_bidder_value =  $finalBiddersData->package_bidder;
												
									$html .='<td>'.$package_bidder_value.'</td>';
								}
						$html .='</tr>';
							}
						$total_amt_gpl = $mRecordFinalBidders[0]->total_amt_gpl;
                        $html .='<tr>
                            <td class="page-title font-weight-bold">Total Amount</td>
                            <td>'.$total_amt_gpl.'</td>';
							foreach($mRecordFinalBidders as $keyBid=>$valBid)
							{
								
								$total_amt_bidder = $valBid->total_amt_bidder;
								$html .='<td>'.$total_amt_bidder.'</td>';
							}	
                        $html .='</tr>
                        <tr>
                            <td colspan="2">Bid position</td>';
							foreach($mRecordFinalBidders as $keyBid=>$valBid)
							{
								
								$bid_position = $valBid->bid_position;
								$html .='<td>'.$bid_position.'</td>';
							}	
                        $html .='</tr>
                        <tr>
                            <td colspan="2">Difference wrt Budget (in crs)</td>';
							foreach($mRecordFinalBidders as $keyBid=>$valBid)
							{
								
								$diff_budget_crs = $valBid->diff_budget_crs;
												
								if($diff_budget_crs>0)
								{
									
									$budget_class = 'background-success';
								}
								else
								{
									$budget_class = 'background-danger';
								
								}
								$html .='<td>'.$diff_budget_crs.' Cr</td>';
							}	
                        $html .='</tr>
                        <tr>
                            <td colspan="2">Difference wrt Budget (in %age)</td>';
							foreach($mRecordFinalBidders as $keyBid=>$valBid)
							{
								
								$diff_budget_percentage = $valBid->diff_budget_percentage;
								if($diff_budget_percentage>0)
								{
									
									$budget_class = 'background-success';
								}
								else
								{
									$budget_class = 'background-danger';
								
								}
								$html .='<td>'.$diff_budget_percentage.' %</td>';
							}	
                        $html .='</tr>
                    </tbody>
                </table>
        </div>';
      
		$ho_approval = ($mRecord['ho_approval'] == "Y") ? "Yes" : "No";
		$html .='<div class="max-width">
                <table class="p2" border="1">
                    <tbody>
						
                        <tr>
                            <td>' . 
							$mRecord["uom_label"].' : '.$mRecord['uom_value']'<br>Is HO approval required ? : ' . $ho_approval;
							 
							$html .='
							</td>                           
                        </tr> 
                    </tbody>
                </table>
            </div>';
		 

        $html .='<div>
            <h5 class="font-large">Award Efficiency</h5>
        </div>

        <div>
            <table class="p2" border="1">
                <thead>
                    <tr class="bg-primary">
                        <th>Actitivity</th>
                        <th>Receipt of Tender Document</th>
                        <th>Start date of Bidder List approval</th>
                        <th>Finish date Approval of Award Recommendation</th>
                        <th>Remarks (If any)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Date</td>
                        <td>'.date("d-M-y", strtotime($mRecordAwdContract['receipt_date'])).'
                            
                        </td>
                        <td>'.date("d-M-y", strtotime($mRecordAwdContract['bidder_approval_date'])).'
                            
                        </td>
                        <td>'.date("d-M-y", strtotime($mRecordAwdContract['award_recomm_date'])).'
                            
                        </td>
                        <td>'.$mRecordAwdContract['remarks_date'].'
                            
                        </td>
                    </tr>
                    <tr>
                        <td>No of Days</td>
                        <td>'.$mRecordAwdContract['receipt_days'].'
                            
                        </td>
                        <td>'.$mRecordAwdContract['bidder_approval_days'].'
                            
                        </td>
                        <td>'. $mRecordAwdContract['award_recomm_days'].'
                            
                        </td>
                        <td>'
                        .$mRecordAwdContract['remarks_days'].'
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
       

        <div>
            <h5 class="font-large">Major Terms and Conditions</h5>
        </div>

        <div>
            <table class="p2" border="1">
                <thead>
                    <tr class="bg-primary">
                        <th>Sl. No.</th>
                        <th>Terms</th>';
						
						foreach($mRecordPackage as $key=>$val)
						{
					
							$html .='<th>Description'.$mRecord['term_label'].'</th>';
						}
						$html .='</tr>
                </thead>
                <tbody>
				<tr>
                    <td></td>
                    <td></td>';
					foreach($mRecordPackage as $key=>$val)
					{
						$html .='<td>Package  '.($key+1).'<br>'.$val['major_term_label']."</td>";
					}
					$html .='</tr>';
				foreach($mRecordMajorTerms as $key=>$val)
				{
					$slNo  = $key+1;
					$term = $val->term;
					$term_label_value = $val->term_label_value;
					
                    $html .='<tr>
                        <td>'. $slNo.'</td>
                        <td>'. $term.'</td>';
						foreach($mRecordPackage as $key=>$val)
						{
							$package_id = $val['package_id'];
							$salient_id = $val['salient_id'];	
							$majorTerms_desc = $CI->awardRecommProcurement->getMajorTerms($salient_id,$package_id,$term);
							
							$term_label_value = $majorTerms_desc->term_label_value;
							$html .='<td>'.$term_label_value.'</td>';
						}
                       
						$html .='</tr>';
				}
                $html .='</tbody>
            </table>
        </div>
        <div>
            <div>
                <table class="p2" border="1">
                    <tbody>
                        <tr>
                            <td>Background / Detailed IOM</td>
                            <td>'.$mRecord['detailed_note'].'</td>
                        </tr><tr>
                            <td>Attachment - Comparitive</td>
                            <td>';
						if ($mRecord['upload_comparitive_name']) {
                        $html .='<a href="'.$uploadPath . $mRecord['upload_comparitive_name'] .'" target="_blank">Download</a></button>
                                                        <span class="ml-3 font-weight-bold">(File Name: '.$mRecord['upload_comparitive_disp_name'].')</span>';
                                                   
                                                    } else
                                                        $html .=' File not uploaded';
                                                   $html .='</td>
                        </tr>
                        <tr>
                            <td>Attachment - Detailed note</td>
                            <td>';
							 if ($mRecord['upload_detailed_name']) {
								$html .='<a href="'.$uploadPath . $mRecord['upload_detailed_name'].'" target="_blank">Download</a></button>
                                                        <span class="ml-3 font-weight-bold">(File Name: '.$mRecord['upload_detailed_disp_name'].')</span>';
                                                  
                                                    } else
                                                       $html .= "File not uploaded";
							$html .= '</td>
                        </tr>';
	
		foreach ($mRecordLevels as $key => $val) {
		  
			$level = $val['level'];
			$approver_name = $val['approver_name'];
			
			 $role = $val['role'];
			 $approver_id = $val['approver_id'];
			
			 if($approver_id==0)
			 {
				$approver_name = "Not Applicable"; 
			 }
			 else
			 {
				$getUser = $CI->getRoleUsers_approval($role,$mSessionZone,$approver_id);
				
				$approver_name = $getUser[0]->buyer_name;
			 }
			 
			 $html .= ' <tr>
							<td >Level '.$level.'Approver('.$role.')</td>
							<td>
								<div>
									<div>
										<span class="font-weight-bold">Approver Name</span>: <span class="font-size-14">'.$approver_name.'</span>
									</div>';
							 	if($approver_id!=0)
									{
										$approved_status = ($val['approved_status'] == 0) ? "Approval Pending" : "Approved";
								
										$html .= '<div>
											<span class="font-weight-bold">Status</span>: <span class="font-size-14">
											'.$approved_status.'</span>
										</div>
										
										<div>
											<span class="font-weight-bold">Approve Remarks</span>: <span class="font-size-14">'.$val['approved_remarks'].'</span>
										</div>

										<div>
											<span class="font-weight-bold">Approved Date</span>: <span class="font-size-14">';
											if ($val['approved_status'] == 1)
												$html .= date("d-M-y h:i:sa", strtotime($val['approved_date'])) .'</span>
										</div>';

										
										
										if ($val['returned_text_status'] == 1) {
										
											$html .= '<hr class="hr-bold-line" />

											<div>
												<span class="font-weight-bold">'."Returned for Text correction" .'</span>
											</div>

											<div>
												<span class="font-weight-bold">Remarks</span>: <span class="font-size-14">'.$val['returned_text_remarks'].'</span>
											</div>

											<div>
												<span class="font-weight-bold">Returned Date for text correction</span>: <span class="font-size-14">'.date("d-M-y h:i:sa", strtotime($val['returned_text_date'])).'</span>
											</div>';

									   
											} //end of if text correction
											
											
										if ($val['returned_by']  != 0) {
										
											$html .= '<hr class="hr-bold-line" />

											<div>
												<span class="font-weight-bold">'."Returned NFA" .'</span>
											</div>

											<div>
												<span class="font-weight-bold">Remarks</span>: <span class="font-size-14">'.$val['returned_remarks'].'</span>
											</div>

											<div>
												<span class="font-weight-bold">Returned Date</span>: <span class="font-size-14">'.date("d-M-y h:i:sa", strtotime($val['returned_date'])).'</span>
											</div>';

									  
											} //end of if returned
											
										if ($val['amended_by']  != 0) {
									
											$html .= '<hr class="hr-bold-line" />

											<div>
												<span class="font-weight-bold">'."Amended NFA".'</span>
											</div>

											<div>
												<span class="font-weight-bold">Remarks</span>: <span class="font-size-14">'.$val['amended_remarks'].'</span>
											</div>

											<div>
												<span class="font-weight-bold">Amended Date</span>: <span class="font-size-14">'. date("d-M-y h:i:sa", strtotime($val['amended_date'])).'</span>
											</div>';

									  
											} //end of if returned
											
											
									}//end of if approver_id !=0 
									 

								$html .= '</div>

							</td>
						</tr>';
		}
								 

				$html .='
			</tbody>
		</table>
		<img src="'.$libPath.'TCPDF-main/examples/images/tcpdf_signature.jfif'.'" height="55" width="55">
	</div>
	</div>            
	';

									
// output the HTML content

$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// *** set signature appearance ***

// create content for signature (image and/or text)


// define active area for signature appearance
$pdf->setSignatureAppearance(180, 60, 15, 15);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// *** set an empty signature appearance ***
$pdf->addEmptySignatureAppearance(180, 80, 15, 15);

// ---------------------------------------------------------

//Close and output PDF document
//$pdf->Output('example_052.pdf', 'D');
$pdf->Output('award_procurement.pdf', 'D');
//============================================================+
// END OF FILE
//============================================================+
		
        
    }

    



}
