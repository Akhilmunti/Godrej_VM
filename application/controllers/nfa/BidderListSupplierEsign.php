<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//include_once (dirname(__FILE__) . "/LdWaiver.php");

//class AwardContractEsign extends CI_Controller {
//class AwardContractEsign extends CI_Controller {
//class AwardContractEsign extends LdWaiver {
include_once (dirname(__FILE__) . "/BidderListSupplier.php");
//class Award_procurement extends CI_Controller
	
class BidderListSupplierEsign extends BidderListSupplier {  

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
        $this->load->model('Bidderlist_supplier_model', 'bidderSupplier');
        $this->load->helper('date');
        error_reporting(0);
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
    }

    public function esignedPdf($mId,$pgType='') {
		//echo "mid".$mId;
	
		$path =  realpath('data/cert/tcpdf.crt');
	
		
                    
            // create new PDF document
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set document information

            $pdf->setTitle('NFA -Short Listing Approval For Supplier');
            $pdf->setSubject('Esigned NFA');
            $pdf->setKeywords('NFA, PDF,Short Listing Approval For Supplier');

            //echo PDF_HEADER_LOGO;
            // set default header data
            $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Short Listing Approval For Supplier", PDF_HEADER_STRING);

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
        $pdf->setSignature($certificate, $certificate, 'nfaBidderSupplier', '', 2, $info);

        // set font
        $pdf->setFont('helvetica', '', 12);

        // add a page
        $pdf->AddPage();

        // print a line of text
        $text = 'NFA Information';
        $pdf->writeHTML($text, true, 0, true, 0);

            $mSessionKey = $this->session->userdata('session_id');
            
            
        if ($mId) {
            $mRecord = $this->nfaAction->get_salient_initiator($mId,"bidder_supplier");
            $salient_id = $mRecord['id'];
            $mRecordBidSupplier = $this->bidderSupplier->get_bidder_list_supplier_data($salient_id);
            $mRecordSubWorks = $this->bidderSupplier->getSubjectWorks($mId);

            // $mRecordPackage = $this->bidderSupplier->get_award_procurement_package_data($salient_id);
            // $mRecordFinalBidders = $this->bidderSupplier->getFinalBidders($salient_id);
            // $mRecordMajorTerms = $this->bidderSupplier->getMajorTerms($mId);
       
            $mRecordLevelsObj = $this->nfaAction->getAllLevelRole_approvers('',$salient_id,"bidder_supplier","view");
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
                                    <br>Initiator  : '.$mRecord['buyer_name'].'
                                    <br>Subject : ' . strip_tags($mRecord['subject']) . '
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
                                            <td>'.$mRecordBidSupplier['budget_with_escalation'].'</td>
                                        </tr>
                                        <tr>
                                            <td>Budget Without Escalation</td>
                                            <td>'.$mRecordBidSupplier['budget_without_escalation'].'</td>
                                        </tr>
                                        <tr>
                                        <td>Material Name</td>
                                        <td>'.$mRecordBidSupplier['material_name'].'</td>
                                        </tr>
                                        <tr>
                                            <td>Is HO approval required</td>
                                            <td>'.$mRecordBidSupplier['ho_approval'].'</td>
                                        </tr>
                                        <tr>
                                        <td>Award Strategy</td>
                                        <td>'.$mRecordBidSupplier['award_strategy'].'</td>
                                        </tr> 
                                    </tbody>
                                </table>
                             </div>  ';

                             foreach ($mRecordSubWorks as $key => $val) { 
                                $slNo  = $key + 1;
                                $name_contractor = $val->name_contractor;                          
                                $score = $val->feedback_score;
                                $bid_category = $val->bid_category;
                                $ongoing_complete_project = $val->ongoing_complete_project;
                             }

                           $html .='   <div>
                                <h5 class="font-large">Proposed Bidderlist for the Subject Works</h5>
                            </div>
                             <div>
                                <table class="p2" border="1">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>Sl. No.</th>
                                            <th>Name of Contractor</th>
                                            <th>PQ/Feedback Score</th>
                                            <th>Bidder’s Category</th>
                                            <th>On-going/Completed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>                                
                                            <td>' .$slNo .' </td>
                                            <td>'.$name_contractor.' </td>
                                            <td>'. $score.'</td>
                                            <td>'.$bid_category.'</td>
                                            <td>'.$ongoing_complete_project.'</td>
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
                                            <td>'.date("d-M-y", strtotime($mRecordBidSupplier['receipt_date'])).'
                                                
                                            </td>
                                            <td>'.date("d-M-y", strtotime($mRecordBidSupplier['bidder_approval_date'])).'
                                                
                                            </td>
                                            <td>'.date("d-M-y", strtotime($mRecordBidSupplier['award_recomm_date'])).'
                                                
                                            </td>
                                            <td>'.$mRecordBidSupplier['remarks_date'].'
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Days</td>
                                            <td>'.$mRecordBidSupplier['receipt_days'].'
                                                
                                            </td>
                                            <td>'.$mRecordBidSupplier['bidder_approval_days'].'
                                                
                                            </td>
                                            <td>'. $mRecordBidSupplier['award_recomm_days'].'
                                                
                                            </td>
                                            <td>'
                                            .$mRecordBidSupplier['remarks_days'].'
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>          

                           
                                <div>
                                    <table class="p2" border="1">
                                        <tbody>
                                            <tr>
                                                <td>Background / Description</td>
                                                <td>'.$mRecord['detailed_note'].'</td>
                                            </tr>
                                            <tr>
                                                <td>PCM</td>
                                                <td>'.$mRecord['buyer_name'].'</td>
                                            </tr>
                                            
                                        ';
                                
                                
                          
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
                        
                        // $getUser = $CI->getRoleUsers_approval($role,$mSessionZone,$approver_id);
                        //print_r($getUser);
                        // $approver_name = $getUser[0]->buyer_name;
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
            ';

                                            
        // output the HTML content

        $pdf->writeHTML($html, true, false, true, false, '');

        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // *** set signature appearance ***        

        // define active area for signature appearance
        $pdf->setSignatureAppearance(180, 60, 15, 15);

        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

        // *** set an empty signature appearance ***
        $pdf->addEmptySignatureAppearance(180, 80, 15, 15);

        // ---------------------------------------------------------

        //Close and output PDF document
        //$pdf->Output('example_052.pdf', 'D');
        $pdf->Output('bidder_supplier.pdf', 'D');
        //============================================================+
        // END OF FILE
        //============================================================+
                
        
    }

    



}
