<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/LdWaiver.php");

//class AwardContractEsign extends CI_Controller {
//class AwardContractEsign extends CI_Controller {
class AwardContractEsign extends LdWaiver {

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
        $this->load->model('Award_recomm_contract_model', 'awardRecommContract');
        $this->load->helper('date');
        error_reporting(0);
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
    }

    public function esignedPdf($mId,$pgType='') {
		//echo "mid".$mId;
		
		$path =  realpath('data/cert/tcpdf.crt');
		
		
		//
		// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');
//require_once dirname(__FILE__) . '/TCPDF-main/examples/tcpdf_include.php';
//echo "cdfdfggggggggggg";
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
//$pdf->setCreator(PDF_CREATOR);
//$pdf->setAuthor('LDWaiver');
$pdf->setTitle('NFA - Award Recommendation for Contracts');
$pdf->setSubject('Esigned NFA');
$pdf->setKeywords('NFA, PDF, LD Waiver');

//echo PDF_HEADER_LOGO;
// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

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
$libPath = APPPATH."libraries\\";
// set certificate file
//$certificate = ('file://data/cert/tcpdf.crt');
//$certificate ='file://'.realpath('data/cert/tcpdf.crt');
$certificate ='file://'.$libPath.'TCPDF-main\examples\data\cert\tcpdf.crt';
//echo $certificate;
//$libPath.'TCPDF-main\examples';

$image_path = realpath(APPPATH.'../images');



// set additional information
$info = array(
	'Name' => 'Award Recommendation for Contracts',
	'Location' => 'Office',
	'Reason' => 'Esign',
	'ContactInfo' => 'https://vendorsglobe.com',
	);

// set document signature
$pdf->setSignature($certificate, $certificate, 'nfaAwardRecommendationForContracts', '', 2, $info);

// set font
$pdf->setFont('helvetica', '', 12);

// add a page
$pdf->AddPage();

// print a line of text
$text = 'NFA Information';
$pdf->writeHTML($text, true, 0, true, 0);

	$mSessionKey = $this->session->userdata('session_id');
      
			if ($mId) {
				$mRecord = $this->awardRecommContract->getParentByKey($mId);
				//print_r($mRecord);
				$salient_id = $mRecord['id'];
				$mRecordAwdContract = $this->awardRecommContract->get_award_contract_data($salient_id);
				//print_r($mRecordAwdContract);
				$mRecordMajorTerms = $this->awardRecommContract->getMajorTerms($mId);
				$mRecordApprovers = $this->awardRecommContract->get_level_approvers($mId); 
				//print_r($mRecordApprovers);
				$arr_key = array_search($mSessionKey, array_column($mRecordApprovers, 'approver_id'));
				$approver_level = $mRecordApprovers[$arr_key]['approver_level'];
				//echo "apr".$approver_level;
			    $salient_id = $mRecordApprovers[0]['salient_id'];
				/* if($approver_level>1)
				$data['preChkRecords'] = $this->ldWaiver->chkPreApproved($salient_id,$approver_level);
				else
				$data['preChkRecords']=1;
				//print_r($this->db->last_query());
				
				if($pgType=='A' || $pgType=='E' )
					$data['pgType'] = $pgType;  */
				//$this->load->view('nfa/view_ld_waiver', $data);
			}
       
// create some HTML content
$html = ' <style>
    table.rs-table-bordered {
        border: 1px solid grey;
        margin-top: 20px;
    }

    table.rs-table-bordered>thead>tr>th {
        border: 1px solid grey;
    }

    table.rs-table-bordered>tbody>tr>td {
        border: 1px solid grey;
    }
</style><table class="table rs-table-bordered"  border="1">
                                <tbody>
								
									<tr>
                                        <td class=\'font-weight-bold\' style="width: 350px;">ENFA NO</td>
                                        <td>'.$mRecord['version_id'].'</td>
                                    </tr>


                                    <tr>
                                        <td class=\'font-weight-bold\' style="width: 350px;">Subject</td>
                                        <td>'.$mRecord['subject'].'</td>
                                    </tr> 
									 </tbody>
                                    </table>';
									
							$html .='<table class="table rs-table-bordered"  border="1">
                                    <thead>
                                        <tr class=\'text-center\'>
                                            <th colspan="5">Award Synopsis | '.$mRecordAwdContract['synopsis_label'].'</th>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr class=\'text-center\'>
                                            <th style="width:44%">Description</th>
                                            <th scope="col" style="width:28%">'.$mRecordAwdContract['package_label1'].'</th>
                                            <th scope="col" style="width:28%">'.$mRecordAwdContract['package_label2'] .'</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bidderList">
                                        <tr class=\'text-center\'>
                                            <td style="width:44%">Budget incl Escalation</td>
                                            <td>
                                                '.$mRecordAwdContract['package1_budget_esc'] .'
                                            </td>
                                            <td>
                                              '.$mRecordAwdContract['package2_budget_esc'].'
                                            </td>
                                        </tr>
									 </tbody>
                                    </table>';
									
									/* $html .= '<tr>
                                        <td class=\'font-weight-bold\' style="width: 350px;">Award Synopsis</td>
                                        <td>'.$mRecordAwdContract['synopsis_label'].'</td>
                                    </tr>

                                    <tr>
                                        <td class=\'font-weight-bold\' style="width: 350px;">Package</td>
                                        <td>'.$mRecordAwdContract['package_name'].'</td>
                                    </tr>

                                    <tr>
                                        <td class=\'font-weight-bold\' style="width: 350px;">Awarded Towers / Scope</td>
                                        <td>'.$mRecordAwdContract['awarded_towers'].'</td>
                                    </tr>

                                    <tr>
                                        <td class=\'font-weight-bold\' style="width: 350px;">Award Date / NTP</td>
                                        <td>'.$mRecordAwdContract['award_date'].'</td>
                                    </tr>

                                    <tr>
                                        <td class=\'font-weight-bold\' style="width: 350px;">Completion Date</td>
                                        <td>'.$mRecordAwdContract['completion_date'].'</td>
                                    </tr>

                                    <tr>
                                        <td class=\'font-weight-bold\' style="width: 350px;">Revised Completion Date</td>
                                        <td>'.$mRecordAwdContract['revised_completion_date'].'</td>
                                    </tr>

                                    <tr>
                                        <td class=\'font-weight-bold\' style="width: 350px;">Latest Average Feedback Score</td>
                                        <td>'.$mRecordAwdContract['avg_feedback_score'].'</td>
                                    </tr>

                                    <tr>
                                        <td class=\'font-weight-bold\' style="width: 350px;">Original Contract Value</td>
                                        <td>'.$mRecord['original_contract_value'].'</td>
                                    </tr>
                                    <tr>
                                        <td class=\'font-weight-bold\' style="width: 350px;">Last approved Amended Contract Value</td>
                                        <td>'.$mRecord['last_approved_value'].'</td>
                                    </tr>

                                    <tr>
                                        <td class=\'font-weight-bold\' style="width: 350px;">Total value of Work Done Till Date</td>
                                        <td>'.$mRecord['total_value_work'].'</td>
                                    </tr>

                                    <tr>
                                        <td class=\'font-weight-bold\' style="width: 350px;">Applicable LD Amount</td>
                                        <td>'.$mRecord['ld_amount'].'</td>
                                    </tr>

                                    <tr>
                                        <td class=\'font-weight-bold\' style="width: 350px;">Reason for LD Waiver</td>
                                        <td>'.$mRecord['reason_ld_waiver'].'</td>
                                    </tr>
									<tr>
                                        <td class=\'font-weight-bold\' style="width: 350px;">Description Background</td>
                                        <td>'.$mRecord['description_background'].'</td>
                                    </tr>
									<tr>
                                        <td class=\'font-weight-bold\' style="width: 350px;">Is LD applicable</td>
                                        <td>'.$mRecord['ld_applicable'].'</td>
                                    </tr>

                                    <tr>
                                        <td class=\'font-weight-bold\' style="width: 350px;">In case of No Please specify reason</td>
                                        <td>'.$mRecord['reason_applicable'].'</td>
                                    </tr>

                                    <tr>
                                        <td class=\'font-weight-bold\' style="width: 350px;">Recommendations</td>
                                        <td>'.$mRecord['recommendations'].'</td>
                                    </tr>
                                   
									';
 */

									$html .='<table class="table rs-table-bordered"  border="1">
                                        <tbody>';
									//$approver_arr = $this->approverDetails($mRecordApprovers);
									$approver_arr = approverDetails($mRecordApprovers);
									//print_r($approver_arr);
									foreach($approver_arr as $key=>$val)
									{
										$approver_id  = $key;
										$level = $val['approver_level'];
										$approver_name = $val['approver_name'];
										$approved_status = ($val['approved_status']==0) ? "Approval Pending" : "Approved";
										$html .= '<tr>
											<td class=\'font-weight-bold\' style="width: 350px;">Level '.$level.' Approver</td>
											<td>'.$approver_name.' - '. $approved_status.'<br>';
											
											if($val['approved_status']==1)											
												$html .= "Approved Date: ".date("d-m-Y h:i:sa",strtotime($val['approved_date']))."<br>";
											if($val['returned_text_status']==1) 
											{
												$html .= "Returned for Text correction"."<br>";
												$html .= "Remarks: ".$val['returned_text_remarks']."<br>";
												
												$html .= "Returned Date for text correction: ".date("d-m-Y h:i:sa",strtotime($val['returned_text_date']))."<br>";
											}
											if($val['returned_by']!=0) 	
											{	
												
												$html .="Returned NFA"."<br>";
												$html .= "Remarks: ".$val['returned_remarks']."<br>";
												$html .= "Returned Date: ".date("d-m-Y h:i:sa",strtotime($val['returned_date']))."<br>";
												
											}
											if($val['amended_by']!=0) 	
											{	
												
												$html .="Amended NFA"."<br>";
												$html .= "Remarks: ".$val['amended_remarks']."<br>";
												$html .= "Amended Date: ".date("d-m-Y h:i:sa",strtotime($val['amended_date']))."<br>";
											}
											 
											 
											 $html .='</td>
										</tr>
										
										';
									
									}
									

$html .= ' <tr>
                                        <td colspan="2" align="right">'.'<img src="'.$libPath.'TCPDF-main\examples\images\tcpdf_signature.jfif'.'" height="55" width="55"></td>
                                    </tr></tbody>
                            </table>';
									
// output the HTML content

$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// *** set signature appearance ***

// create content for signature (image and/or text)
//echo realpath('TCPDF-main/examples/images/tcpdf_signature.png');
//$pdf->Image(($libPath.'TCPDF-main\examples\images\tcpdf_signature.png'), 180, 60, 15, 15, 'PNG');
//$pdf->Image('images\tcpdf_signature.png', 180, 60, 15, 15, 'PNG');

// define active area for signature appearance
$pdf->setSignatureAppearance(180, 60, 15, 15);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// *** set an empty signature appearance ***
$pdf->addEmptySignatureAppearance(180, 80, 15, 15);

// ---------------------------------------------------------

//Close and output PDF document
//$pdf->Output('example_052.pdf', 'D');
$pdf->Output('award_contract.pdf', 'D');
//============================================================+
// END OF FILE
//============================================================+
		
        
    }

    



}
