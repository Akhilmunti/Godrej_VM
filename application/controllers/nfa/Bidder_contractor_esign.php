<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/BidderListContractor.php");
//include_once (dirname(__FILE__) . "/LdWaiver.php");
 
//class bidder_contractor_esign extends CI_Controller {
//class bidder_contractor_esign extends CI_Controller {


class Bidder_contractor_esign extends BidderListContractor {
//class Bidder_contractor_esign extends LdWaiver {

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
		
        $this->load->model('Bidderlist_contractor_model', 'bidderContractor');
        $this->load->helper('date');
		
        error_reporting(0);
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
    }

    public function esigned_pdf($mId,$pgType='') {
		
		//echo "mid".$mId;
		
		$path =  realpath('data/cert/tcpdf.crt');
		
		
		
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information

$pdf->setTitle('NFA - Short Listing Approval For Contractor');
$pdf->setSubject('Esigned NFA');
$pdf->setKeywords('NFA, PDF, Short Listing Approval For Contractor');

//echo PDF_HEADER_LOGO;
// set default header data
//$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Short Listing Approval For Contractor', PDF_HEADER_STRING);

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
//$certificate = ('file://data/cert/tcpdf.crt');
//$certificate ='file://'.realpath('data/cert/tcpdf.crt');
$certificate ='file://'.$libPath.'TCPDF-main\examples\data\cert\tcpdf.crt';
//echo $certificate;
//$libPath.'TCPDF-main\examples';

$image_path = realpath(APPPATH.'../images');



// set additional information
$info = array(
	'Name' => 'Short Listing Approval For Contractor',
	'Location' => 'Office',
	'Reason' => 'Esign',
	'ContactInfo' => 'https://vendorsglobe.com',
	);

// set document signature
$pdf->setSignature($certificate, $certificate, 'nfaShortListingApprovalForContractor', '', 2, $info);

// set font
$pdf->setFont('helvetica', '', 12);

// add a page
$pdf->AddPage();

// print a line of text
$text = 'NFA Information';
$pdf->writeHTML($text, true, 0, true, 0);

	$mSessionKey = $this->session->userdata('session_id');
      
			if ($mId) {
				$mRecord = $this->nfaAction->get_salient_initiator($mId,"bidder_contract");
				//print_r($mRecord);
				$salient_id = $mRecord['id'];
				$mRecordBidContract = $this->bidderContractor->get_bidder_list_contractor_data($salient_id);
				$mRecordApprovers = $this->bidderContractor->get_level_approvers($mId); 
				//print_r($mRecordApprovers);
				$arr_key = array_search($mSessionKey, array_column($mRecordApprovers, 'approver_id'));
				$approver_level = $mRecordApprovers[$arr_key]['approver_level'];
				//echo "apr".$approver_level;
			    $salient_id = $mRecordApprovers[0]['salient_id'];

				$mRecordSubWorks = $this->bidderContractor->getSubjectWorks($mId);

				
			}
       
// create some HTML content
$html = ' <style>
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
                .background-green{
                    background-color: #28a745 !important;
                    color: #fff;
                }
                .background-red{
                    background-color: #dc3545 !important;
                    color:#fff;
                }
            </style>
            <div class="p2"></div>
			<div class="max-width">
                <table class="p2" border="1">
                    <tbody>
                        <tr>
                            <td>ENFA NO : ' . $mRecord['version_id'] . '
							<br>Initiator : '.$mRecord['buyer_name'].'
							<br>Subject : '.$mRecordBidContract['subject'].'
							</td>                           
                        </tr> 
                    </tbody>
                </table>
            </div>
            <div>
            <table class="p2" border="1">
            <tbody>
                 <tr>
                    <td>Budget With Escalation</td>
                    <td>'. $mRecordBidContract['budget_with_escalation'] .' Cr</td>
                </tr>
                <tr>
                    <td>Budget Without Escalation</td>
                    <td>'.$mRecordBidContract['budget_without_escalation'].' Cr</td>
                </tr>
                <tr>
                    <td>Scope of Works</td>
                    <td>'. $mRecordBidContract['scope_work'].'</td>
                </tr>
                <tr>
                    <td>Award Strategy</td>
                    <td>'. $mRecordBidContract['award_strategy'] .'</td>
                </tr>
                <tr>
                    <td>Free Issue Material</td>
                    <td>'. $mRecordBidContract['free_material'] .' Cr</td>
                </tr>
                <tr>
                    <td>Basic Rate Items</td>
                    <td>'. $mRecordBidContract['basic_rate_items'] .' Cr</td>
                </tr>
            </tbody>
        </table>
        </div>';
        $html .= '<div>
        <h5 class="font-large">Proposed Bidderlist for the Subject Works</h5>
        </div>
        <div>
            <table class="p2" border="1">
                <thead>
                    <tr class="bg-primary">
                        <th>Sl. No.</th>
                        <th>Name of Contractor</th>
                        <th>Avg. Turn Over(Cr)</th>
                        <th>BID Capacity (Cr)</th>
                        <th>PQ/Feedback Score</th>
                        <th>Bidder’s Category</th>
                        <th>On-going/Completed</th>
                    </tr>
                </thead>
                <tbody id=""> '; 
                    foreach ($mRecordSubWorks as $key => $val) { 
                        $slNo  = $key + 1;
                        $name_contractor = $val->name_contractor;
                        $avg_turn_over = $val->avg_turn_over;
                        $bid_capacity = $val->bid_capacity;
                        $score_type = $val->score_type;
                        $score = $val->score;
                        $bid_category = $val->bid_category;
                        $ongoing_complete_project = $val->ongoing_complete_project; 
                    $html .= '    <tr>
                            <td>'.$slNo .'</td>
                            <td>'. $name_contractor .'</td>
                            <td>'. $avg_turn_over .' Cr</td>
                            <td>'. $bid_capacity .' Cr</td>
                            <td>'. $score_type. '<br>' .$score .'</td>
                            <td>'. $bid_category .'</td>
                            <td>'. $ongoing_complete_project .'  Cr</td>
                        </tr> ';
                    }
                $html .= ' </tbody>
            </table>
        </div>';		
        $html .= '<div>
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
                    <td>
                        '. date("d-M-y", strtotime($mRecordBidContract['receipt_date'])).'
                    </td>
                    <td>
                        '.  date("d-M-y", strtotime($mRecordBidContract['bidder_approval_date'])).'
                    </td>
                    <td>
                        '.  date("d-M-y", strtotime($mRecordBidContract['award_recomm_date'])) . '
                    </td>
                    <td>
                        '. $mRecordBidContract['remarks_date'].'
                    </td>
                </tr>
                <tr>
                    <td>No of Days</td>
                    <td>
                       '. $mRecordBidContract['receipt_days'].'
                    </td>
                    <td>
                        '. $mRecordBidContract['bidder_approval_days'].'
                    </td>
                    <td>
                        '. $mRecordBidContract['award_recomm_days'].'
                    </td>
                    <td>
                        '. $mRecordBidContract['remarks_days'] .'
                    </td>
                </tr>
            </tbody>
        </table>
    </div> 
    <div>
    <table class="p2"  border="1">
        <tbody> 
            <tr>
                <td>Reasons for Delay</td>
                <td></td>
            </tr>
            <tr>
                <td>Front Idling</td>
                <td></td>
            </tr>
            <tr>
                <td>Current Status of Work at Site</td>
                <td></td>
            </tr>
        </tbody>
    </table>
    </div>';                                      								
							
									// print_r($mRecordBidContract);
									// $html .='<div>
                                    // <table class="p2"  border="1">
                                    //     <tbody> 
                                    //         <tr>
                                    //             <td>Reasons for Delay</td>
                                    //             <td>'. $mRecordBidContract['reasons_delay'].'</td>
                                    //         </tr>
                                    //         <tr>
                                    //             <td>Front Idling</td>
                                    //             <td>'. ($mRecordBidContract['front_idling'] == "yes") ? "Yes" : "No" .'</td>
                                    //         </tr>
                                    //         <tr>
                                    //             <td>Current Status of Work at Site</td>
                                    //             <td>'. $mRecordBidContract['current_status_work'] .'</td>
                                    //         </tr>
                                    //     </tbody>
									// </table>
                                    // </div>';
						
									$html .='<div>
							<table class="p2" border="1">
                                        <tbody>';
										
						
									//$approver_arr = $this->approverDetails($mRecordApprovers);
									$approver_arr = approverDetails($mRecordApprovers);
									//print_r($approver_arr);
									foreach($approver_arr as $key=>$val)
									{ 
										
										$approver_id  = $key;
										// $approver_id = $val['approver_id'];
										$level = $val['approver_level'];
										$approved_status = ($val['approved_status']==0) ? "Approval Pending" : "Approved";
										
										 if($approver_id>0)
										 {
											$approver_name = $val['approver_name']; 
										 }
										 else
										 { 
											$approver_name = "Not Applicable"; 
										 }
										$html .= '<tr>
											<td>Level '.$level.' Approver</td>
											<td>'.$approver_name.' - '. $approved_status.'<br>';
											if($approver_id > 0){
												
													if($val['approved_status']==1)											
														$html .= "Approved Date: ".date("d-M-Y h:i:sa",strtotime($val['approved_date']))."<br>";
													if($val['returned_text_status']==1) 
													{
														$html .= "Returned for Text correction"."<br>";
														$html .= "Remarks: ".$val['returned_text_remarks']."<br>";
														
														$html .= "Returned Date for text correction: ".date("d-M-Y h:i:sa",strtotime($val['returned_text_date']))."<br>";
													}
													if($val['returned_by']!=0) 	
													{	
														
														$html .="Returned NFA"."<br>";
														$html .= "Remarks: ".$val['returned_remarks']."<br>";
														$html .= "Returned Date: ".date("d-M-Y h:i:sa",strtotime($val['returned_date']))."<br>";
														
													}
													if($val['amended_by']!=0) 	
													{	
														
														$html .="Amended NFA"."<br>";
														$html .= "Remarks: ".$val['amended_remarks']."<br>";
														$html .= "Amended Date: ".date("d-M-Y h:i:sa",strtotime($val['amended_date']))."<br>";
													}
													 
													 
											}
											 $html .='</td>
										</tr>
										
										';
									
									}
									

$html .= ' <tr>
                                        <td colspan="2" align="right">'.'<img src="'.$libPath.'TCPDF-main/examples/images/tcpdf_signature.jfif'.'" height="55" width="55"></td>
                                    </tr></tbody>
                            </table></div>';
									
// output the HTML content
// echo $html;die;
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
$pdf->Output('bidder_contract.pdf', 'D');
//============================================================+
// END OF FILE
//============================================================+
		
        
    }

    



}