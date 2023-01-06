<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('buyer/partials/header'); ?>

<link href="https://cdn.quilljs.com/1.1.6/quill.snow.css" rel="stylesheet">

<script src="https://cdn.quilljs.com/1.1.6/quill.js"></script>



<body class="hold-transition light-skin sidebar-mini theme-blueindigo onlyheader">
    <style>
        .btn-hide {
            display: none;
        }

        .date-hide {
            display: none;
        }

        .idling-hide {
            display: none;

        }

        .sec1{
            display: none;
        }
        .sec2{
            display: none;
        }

        [data-tip] {
            position: relative;
        }

        [data-tip]:before {
            content: '';
            /* hides the tooltip when not hovered */
            display: none;
            content: '';
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-bottom: 5px solid #1a1a1a;
            position: absolute;
            top: 30px;
            left: 35px;
            z-index: 8;
            font-size: 0;
            line-height: 0;
            width: 0;
            height: 0;
        }

        [data-tip]:after {
            display: none;
            content: attr(data-tip);
            position: absolute;
            top: 35px;
            left: 0px;
            padding: 5px 8px;
            background: #1a1a1a;
            color: #fff;
            z-index: 9;
            font-size: 0.8em;
            height: 30px;
            line-height: 18px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            white-space: nowrap;
            word-wrap: normal;
        }

        [data-tip]:hover:before,
        [data-tip]:hover:after {
            display: block;
        }

        .synopsis-header {
            text-align: left;
        }

        .form-control::placeholder {
            color: #898888;
            opacity: 0.9;
        }

        .form-control:-ms-input-placeholder {
            color: #898888;
        }

        .form-control::-ms-input-placeholder {
            color: #898888;
        }
        
        label.error {
            color: red;
            font-size: 1rem;
            display: block;
            margin-top: 5px;
        }

        input.error, select.error,textarea.error {
            border: 1px solid red;
            font-weight: 300;
            color: red;
        }

        .total-hide{
            display: none;
        }

    </style>
    <?php if($type_work_id==1)
            $uom_label = "Sqm";
          else if($type_work_id==3)
            $uom_label = "MT";
          else if($type_work_id==4)
            $uom_label = "Bags";
    ?>

	
    <div class="wrapper">

        <div class="art-bg">
            <img src="<?php echo base_url('assets/'); ?>images/art1.svg" alt="" class="art-img light-img">
            <img src="<?php echo base_url('assets/'); ?>images/art2.svg" alt="" class="art-img dark-img">
            <img src="<?php echo base_url('assets/'); ?>images/art-bg.svg" alt="" class="wave-img light-img">
            <img src="<?php echo base_url('assets/'); ?>images/art-bg2.svg" alt="" class="wave-img dark-img">
        </div>

        <?php $this->load->view('buyer/partials/navbar'); ?>

        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">

            <div class="container-full clearfix position-relative">

                <?php $this->load->view('buyer/partials/sidebar'); ?>

                <!-- Main content -->

                <section class="content">

                    <!-- Content Header (Page header) -->                   

                <?php $this->load->view('nfa/common_iom_header.php'); ?>



                    
                    <div class="box">

                        <div class="box-body">
                            <form id="nfaForm" method="POST" action="<?php echo base_url('nfa/Award_procurement/actionSave'); ?>" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class='form-group'>
                                            <label class="font-weight-bold">Subject</label>
                                            <div id="subject" class="form-control" name="subject"></div>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class='form-group'>
                                            <label class="font-weight-bold">Scope of Work</label>
                                            <input type='text' class="form-control" placeholder="" name="scope_of_work" id="scope_of_work" maxlength="200">
                                        </div>
                                    </div>

                                </div>
                                
                                <!-- <div class="row"> -->

                                <!-- <div class="col-lg-12">
                                    <div class='form-group'>
                                        <label class="font-weight-bold">Type of Procurement</label>
                                        <select id="procurement_type" name="procurement_type" required=""  style="width:25%;" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="Cement">Cement</option>
                                                        <option value="Aluminium">Aluminium</option>
                                                        <option value="Steel">Steel</option>
                                                        <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div> -->

                                <!-- </div> -->

                                <div class="table-responsive mt-2">
                                    <table id="tables" class="table table-bordered mb-0">
                                        <thead class="bg-primary">
                                            <tr class='text-center'>
                                                <th class="synopsis-header" colspan="5"><label>Award Synopsis</label>
                                                    <input type='text' class="form-control" placeholder="" name="synopsis_label" id="synopsis_label" required>
                                                    <label class="mt-4">How many Vendors Recommended?</label>
                                                    <select id="package_count" name="package_count" required="" onchange="addPackage(this)" style="width:25%;" class="form-control">
                                                        <option value="0" selected >1</option>
                                                        <option value="1">2</option>
                                                        <option value="2">3</option>
                                                    </select>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <table id="dyntable" class="table table-bordered mb-0">
                                        <thead class="bg-primary">
                                            <tr class='text-center'>
                                                <th>Description</th>
                                                <th scope="col" style="width:20%">
                                                    <label>Package name</label>
                                                    <input type='text' class="form-control" placeholder="" name="package_label[]" id="package_label1" required onblur="package_bidders_pro(this);">
                                                </th>
                                                <th id="total-h" class="total-hide" style="width:20% ;">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bidderList">
                                            <tr class='text-center'>

                                                <td>Budget incl Escalation</td>
                                                <td>
                                                    <input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this);packageSynopsis_total('package_budget_esc','total_budget_esc'); setGpl_budget(); calculateSum1_v1();;" class="form-control decimalStrictClass onMouseOutClass" name="package_budget_esc[]" id="package_budget_esc1" required>
                                                </td>

                                                <td  id="total-td1" class="total-hide"><input type='text' class="form-control" name="total_budget_esc" id="total_budget_esc" value="" readonly></td>                                           
                                            </tr>
                                            <tr class='text-center'>
                                                <td>Negotiated Value (Excl. Tax) - Pre Final Round</td>
                                                <td>
                                                    <input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this);packageSynopsis_total('package_negot_value','total_negot_value');" class="form-control decimalStrictClass onMouseOutClass" name="package_negot_value[]" id="package_negot_value1" required>
                                                </td>
                                                <td id="total-td2" class="total-hide"><input type='text' class="form-control" name="total_negot_value" id="total_negot_value" value="" readonly></td>

                                            </tr>
                                            <tr class='text-center'>
                                                <td><span class="font-weight-bold">Finalized Proposed Award Value (Excl Tax)</span></td>
                                                <td>
                                                  
                                                    <input type='text' oninput="allowNumOnly(this);decimalStrict()" class="form-control decimalStrictClass onMouseOutClass" name="finalized_award_value_package[]" id="finalized_award_value_package1" required onblur="changeToCr(this);packageSynopsis_total('finalized_award_value_package','total_finalized_award_value');showBidders_finalized();calculateSum1_v1();">
                                                </td>
                                                <td id="total-td3" class="total-hide"><input type='text' class="form-control" name="total_finalized_award_value" id="total_finalized_award_value" value="" readonly></td>                                            </tr>
                                            
                                            <tr class='text-center'>
                                                <td>Expected Savings w.r.t Budget incl.escalation:</td>
                                                <td>
                                                   
                                                    <input type='text' oninput="allowNumOnly(this);decimalStrict()" class="form-control decimalStrictClass" name="expected_savings_package[]" id="expected_savings_package_v1" readonly>
                                                </td>

                                                <td id="total-td4" class="total-hide"><input type='text' class="form-control" name="total_expected_savings" id="total_expected_savings" value="" readonly></td>
                                            </tr>
                                            <tr class='text-center'>
                                                <td><span class="font-weight-bold">Recommended Vendors</span></td>
                                                <td>
                                                    <input type='text' class="form-control" name="recomm_vendor_package[]" id="recomm_vendor_package1" onblur="setRecommended_vendorName();" required> 
                                                </td>

                                                <td id="total-td5" class="total-hide"></td>
                                            </tr>
                                            <tr class='text-center'>
                                                <td>Basis of award</td>
                                                <td>
                                                    <input type='text' class="form-control" name="basis_award_package[]" id="basis_award_package1" readonly>
                                                </td>

                                                <td id="total-td6" class="total-hide" readonly></td>
                                            </tr>
                                            <tr class='text-center'>
                                                <td>Deviation from Approved Contracting Strategy</td>
                                                <td>
                                                    <input type='text' class="form-control" name="deviation_approved_package[]" id="deviation_approved_package1" required>
                                                </td>

                                                <td id="total-td7" class="total-hide"></td>
                                            </tr>
											
                                            <tr class='text-center'>
                                                <td>
                                                    <label>Last Awarded Benchmark with Date</label>
                                                    <div data-tip="Please enter project name and date of award">
                                                        <input type='text' class="form-control" name="benchmark_label" id="benchmark_label" placeholder="Please enter project name and date of award" autocomplete="off" onblur="show_bidders_procurement();" required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this);packageSynopsis_total('awarded_benchmark_package','total_awarded_benchmark');show_bidders_procurement();" class="form-control decimalStrictClass onMouseOutClass" name="awarded_benchmark_package[]" id="awarded_benchmark_package1" required>
                                                </td>


                                                <td id="total-td8" class="total-hide"><input type='text' class="form-control" name="total_awarded_benchmark" id="total_awarded_benchmark" value="" readonly></td>                                            </tr>
									
											
                                                <tr class='text-center'>
                                                <td>Proposed Award Value (Excl Tax)- Adjusted Awarded Value(Post Basic Rate Adjustment): <span class="font-weight-bold">SAP WO VALUE TO BE CREATED</span></td>
                                                <td>
                                                    <input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control decimalStrictClass onMouseOutClass" name="post_basic_rate_package[]" id="post_basic_rate_package1" readonly>
                                                </td>

                                                <td id="total-td9" class="total-hide"><input type='text' class="form-control" name="total_post_basic_rate" id="total_post_basic_rate" value="" readonly></td>
                                           </tr>


                                           
					
                                        </tbody>
                                    </table>
                                </div>
				<?php  if($type_work_id == 1 ||  $type_work_id == 3 || $type_work_id == 4)
                                {?>
                                        <div class="row mt-4">

                                            <div class="col-lg-4">
                                                <div class='form-group'>
                                                    <label class="font-weight-bold"><?php echo $uom_label;?></label>
                                                    <input type="hidden" name="uom_label" id="uom_label" value="<?php echo $uom_label;?>">
                                                    <input type='text' oninput="allowNumOnly(this);noDecimalStrict()" onblur="" class="form-control nodecimalStrictClass " placeholder="" name="uom_value" id="uom_value">
                                                </div>
                                            </div>

                                        </div>
                                <?php }?>			
								
									
				<div class="row mt-4">
                                    <div class="col-lg-12">
                                        <div class='form-group'>
                                            <div class="form-check">
                                                <label class="page-title br-0 font-weight-bold mr-4">Is HO approval required</label>
                                                <input class="form-check-input" type="radio" name="ho_approval" id="ho_approval1" value="Y" checked>
                                                <label class="form-check-label font-weight-bold" for="ho_approval1">
                                                    Yes
                                                </label>
                                                <input class="form-check-input" type="radio" name="ho_approval" id="ho_approval2" value="N">
                                                <label class="form-check-label font-weight-bold" style="margin-left: 25px;" for="ho_approval2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-block mt-4">
                                    <h5 class="page-title br-0 font-weight-bold">Final Bid Scenario</h5>
                                </div>

                                <div class="mt-4">
                                    <h5>How many Bidders participated?</h5>
                                    <select id="bidder_count" name="bidder_count" required="" style="width:25%;" class="form-control">
                                        <option value="0">1</option>
                                        <option value="1">2</option>
                                        <option value="2">3</option>
                                        <option value="3">4</option>
                                        <option value="4">5</option>
                                        <option value="5">6</option>
                                        <option value="6">7</option>
                                        <option value="7">8</option>
                                        <option value="8">9</option>
                                        <option value="9">10</option>
                                    </select>
                                </div>

                                <div class="table-responsive mt-4">

                                    <table id='mainTable' class="table table-bordered mb-0">
                                        <thead class="bg-primary">
                                            <tr class='text-center' id="bidHead_row">
                                                <th>Description</th>
                                                <th scope="col" style="width:15% ;">GPL Budget (with escalation)</th>
                                                <th scope="col" style="width: 120px !important;"><input type='text' class="form-control" name="final_bidder_name[]" placeholder="Enter Bidder Name" id="final_bidder_name1" required></th>
                                            </tr>
                                        </thead>
                                        <tbody id="bidderList" style="width: 40% !important;">
                                            <tr class='text-center' id="pqFb_row">
                                                <td>PQ/ Feedback Score </td>
                                                <td>
                                                    <svg height="100px" style="padding:30% ;" viewBox="0 0 512 512">
                                                        <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z" />
                                                    </svg>
                                                </td>
                                                <td>
                                                    <select id="score_type1" name="score_type[]" required="" class="form-control" style="width: 120px !important;" onchange="score_color1();">
                                                        <option value="">Select</option>
                                                        <option value="PQ">PQ</option>
                                                        <option value="FB">FB</option>
                                                    </select>
                                                    <input type='number' class="form-control mt-3" style="width: 120px !important;" name="score[]" id="score1" min="0" max="100" step="0.01" oninput="(validity.valid)||(value='');" onblur="score_color1();" required>
                                                </td>
                                            </tr>
                                            <tr id="package_row1" class='text-center'>
                                            </tr>
                                            <tr id="package_row2" class='text-center'></tr>
                                            <tr id="package_row3" class='text-center'></tr>
                                            <tr class='text-center' id="totAmt_row">
                                                <td class="page-title font-weight-bold">Total Amount</td>
                                                <td><input type='text' onblur="getBidders_total();calculateSum1_v1();" class="form-control" name="total_amt_gpl" id="total_amt_gpl" readonly></td>
                                                <td><input type='text' onblur="getBidders_total();calculateSum1_v1();" class="form-control" name="total_amt_bidder[]" id="total_amt_bidder1" readonly></td>
                                            </tr>
                                            <tr class='text-center' id="bidPos_row">
                                                <td colspan="2">Bid position</td>
                                                <td><input type='text' class="form-control" name="bid_position[]" id="bid_position1" value="" readonly></td>
                                            </tr>
                                            <tr class='text-center' id="diffCrs_row">
                                                <td colspan="2">Difference wrt Budget (in crs)</td>
                                                <td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control decimalStrictClass onMouseOutClass" name="diff_budget_crs[]" id="diff_budget_crs1" readonly></td>
                                            </tr>
                                            <tr class='text-center' id="diffPercent_row">
                                                <td colspan="2">Difference wrt Budget (in %age)</td>
                                                <td><input type='text' oninput="allowNumOnly(this);decimalStrict()"  onblur="changeToCr(this)" class="form-control decimalStrictClass onMouseOutClass" name="diff_budget_percentage[]" id="diff_budget_percentage1" readonly></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
					

                                <div class="d-block mt-4">
                                    <h5 class="page-title br-0 font-weight-bold">Award Efficiency</h5>
                                </div>

                                <div class="table-responsive mt-4">

                                    <table class="table table-bordered mb-0">
                                        <thead class="bg-primary">
                                            <tr class='text-center'>
                                                <th style="width:15%">Actitivity</th>

						<?php if( $protype == 1){?>
                                                <th style="width:20%">Receipt of Tender Document</th>
                                                <th style="width:20%">Start date of Bidder List approval</th>
						<?php } else { ?>
                                                <th style="width:20%">Receipt of CQS</th>
                                                <th style="width:20%">Start Date</th>
                                                <?php } ?>

                                                <th style="width:20%">Finish date Approval of Award Recommendation</th>
                                                <th style="width:25%">Remarks (If any)</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bidderList">
                                            <tr class='text-center'>
                                                <td>Date</td>
                                                <td>
                                                    <input type='date' class="form-control" name="receipt_date" id="receipt_date" required>
													<span id="receipt_date_err"></span>
                                                </td>
                                                <td>
                                                    <input type='date' class="form-control" name="bidder_approval_date" id="bidder_approval_date"  required>
													<span id="bidder_approval_date_err"></span>
                                                </td>
                                                <td>
                                                    <input type='date' class="form-control" name="award_recomm_date" id="award_recomm_date" min="<?php echo date("Y-m-d" , strtotime("+1 day") ) ?>"  required>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" rows="2" name="remarks_date" id="remarks_date"></textarea>
                                                </td>
                                            </tr>
                                            <tr class='text-center'>
                                                <td>No of Days</td>
                                                <td>
                                                    <input type='text' oninput="allowNumOnly(this);decimalStrict()" class="form-control decimalStrictClass" name="receipt_days" id="receipt_days" value="0" readonly>
                                                </td>
                                                <td>
                                                    <input type='text' oninput="allowNumOnly(this);decimalStrict()" class="form-control decimalStrictClass" name="bidder_approval_days" id="bidder_approval_days" readonly>
                                                </td>
                                                <td>
                                                    <input type='text' oninput="allowNumOnly(this);decimalStrict()" class="form-control decimalStrictClass" name="award_recomm_days" id="award_recomm_days" readonly>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" rows="2" name="remarks_days" id="remarks_days"></textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
			    	<div class="d-block mt-4">
                                   					
                                    	
					<div class="d-block mt-4">
                                        <h5 class="page-title br-0 font-weight-bold">Major Terms and Conditions</h5>
                                    </div>

                                    <div class="table-responsive mt-4">
                                        <table class="table table-bordered mb-0" id="t1">
                                            <thead class="bg-primary">
                                                <tr class='text-center'>
                                                    <th style="width:10%">Sl. No.</th>
                                                    <th style="width:25%">Terms</th>
                                                    <th style="width:55%"><label for="term_label">Description</label>
                                                    <div style="display:flex ;">
                                                    <div style="width: 100%;" class="mr-2"><label id="pckLabel1"></label><input type='text'class="form-control" placeholder="" name="term_label[]" id="term_label1" required readonly></div><div style="width: 100%;" class="sec1 mr-2"><label id="pckLabel2"></label><input type='text' class="form-control mr-2" placeholder="" name="term_label[]" id="term_label2" required readonly></div><div style="width: 100%;" class="sec2 mr-2"><label id="pckLabel3"></label><input type='text' class="form-control mr-2" placeholder="" name="term_label[]" id="term_label3" required readonly></div></div></th>
                                                    <th style="width:10%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="">
                                                <tr class='text-center'>
                                                    <td>1</td>
                                                    <td><input type='text' class="form-control" name="term[]" placeholder="" required></td>
                                                    <td><div style="display:flex ;"><textarea name="term_label_value[1][]"  class="form-control mr-2" rows="2"  id="term_label_value1" required></textarea><textarea name="term_label_value[1][]"  class="form-control sec1 mr-2" rows="2"  id="term_label_value2" ></textarea><textarea name="term_label_value[1][]"  class="form-control sec2 mr-2" rows="2"  id="term_label_value3" ></textarea></div></td>
                                                    <td></td>
                                                </tr>
                                                <tr>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row text-right mt-20">
                                        <div class="col-lg-12">
                                            <button type="button" onclick="addRow()" class="btn btn-primary border-secondary rounded mr-10">
                                                <span class="fa fa-plus"></span>
                                                Add row
                                            </button>
                                        </div>
                                    </div>

                                   

                                    

                                    

                                  


                                    <div class="row mt-4">

                                        <div class="col-lg-12">
                                            <div class='form-group'>
                                                <label class="font-weight-bold">Background / Detailed Note</label>
                                                <textarea class="form-control" rows="3" name="detailed_note" id="detailed_note"></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-lg-4">
                                            <div class='form-group'>
                                                <label>Upload Comparitive</label>
                                                <input type="file" class="form-control" placeholder="" name="upload_comparitive">
                                                <input type="text" class="form-control mt-2" placeholder="Please enter file name" name="upload_comparitive_disp_name">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class='form-group'>
                                                <label>Upload Detailed IOM</label>
                                                <input type="file" class="form-control" placeholder="" name="upload_detailed">
                                                <input type="text" class="form-control mt-2" placeholder="Please enter file name" name="upload_detailed_disp_name">
                                            </div>
                                        </div>
                                    </div>
                                    <?php ?>

                                 
                                    <div class="d-block mt-4 mb-4">
                                        <h5 class="page-title br-0 font-weight-bold">Select different levels of approvals</h5>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-3 mb-3">
                                             <?php $mSessionRole = $this->session->userdata('session_role'); ?>
                                            <lable> <?php  echo  $mSessionRole ; ?></lable>

                                            <input readonly="" value="<?php echo $this->session->userdata('session_name'); ?>" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row" id="approvers_list_div"></div>

                                </div>
                                <?php ?>
                                <div class="row text-right mt-20">
                                    <input type="hidden" name="project_id" id="project_id" value="<?php echo $project_id ?>">
                                    <input type="hidden" name="type_work_id" id="type_work_id" value="<?php echo $type_work_id ?>">
                                    <input type="hidden" name="zone" id="zone" value="<?php echo $zone ?>">
			            <input type="hidden" name="protype" id="protype" value="<?php echo $protype ?>">
                                    <input type="hidden" name="subject_hd" id="subject_hd">
                                    <input type="hidden" id="base" value="<?php echo base_url(); ?>">
                                    <div class="col-lg-12">
                                        <button type="submit" name="save" value="save" id="save" class="btn btn-primary border-secondary rounded mr-10">Save</button>
                                        <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary border-secondary rounded">
                                            <div class="spinner-border spinner-border-sm btn-hide" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <span class="btn-txt">Submit</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>


        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <?php $this->load->view('buyer/partials/footer'); ?>

    <!-- Control Sidebar -->

    <?php $this->load->view('buyer/partials/control'); ?>

    <!-- /.control-sidebar -->

    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->

    <div class="control-sidebar-bg"></div>

    <!-- ./wrapper -->

    <?php $this->load->view('buyer/partials/scripts'); ?>

    <script>
        var quill = new Quill('#subject', {
            theme: 'snow'
        });
      


        $(document).ready (function () {  
        $("#nfaForm").validate();  
        });  

        let contrSel ;

        /* frozen value of fb/pq */

        function handleChange(input) {
            if (input.value < 0) input.value = 0;
            if (input.value > 100) input.value = 100;
        }

        function allowNumOnly(sender) {
            sender.value = sender.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
        }

        /* frozen value of fb/pq */

        /* cotractor appointment date toggle */

        function finalized_val(sender) {
            let val = sender.value;

            val1 = String(val);
            if (val1) {
                if (val1.includes("Cr")) {
                    sender.value = val;
                } else if (!val1.includes("Cr")) {
                    sender.value = sender.value + " Cr";
                }
            }

        }

        /* cotractor appointment date toggle */

        /* idling toggle */

        function idlingCheck() {
            var checkBox = document.getElementById("front_idling1");
            if (checkBox.checked == true) {
                document.getElementById("delayReason").classList.remove("idling-hide");
            }
        }

        function idlingUnCheck() {
            var checkBox = document.getElementById("front_idling2");
            if (checkBox.checked == true) {
                document.getElementById("delayReason").classList.add("idling-hide");
            }
        }

        /* idling toggle */

        function addPackage(selectObj){
            
            contrSel = selectObj.value;

            
            let pack1=document.getElementsByClassName("sec1");
            let pack2=document.getElementsByClassName("sec2");

            let total_col=document.getElementsByClassName("total-hide");
            let total_h=document.getElementById("total-h");
            let tr1=document.getElementById("total-td1");
            let tr2=document.getElementById("total-td2");
            let tr3=document.getElementById("total-td3");
            let tr4=document.getElementById("total-td4");
            let tr5=document.getElementById("total-td5");
            let tr6=document.getElementById("total-td6");
            let tr7=document.getElementById("total-td7");
            let tr8=document.getElementById("total-td8");
			let tr9=document.getElementById("total-td9");

            if(selectObj.value === "1"){
                
                for (i = 0; i < pack1.length; i++) {
                    pack1[i].style.display="block";
                    pack2[i].style.display="none";
                }
            }
            else if(selectObj.value === "2"){
                
                for (i = 0; i < pack2.length; i++) {
                    pack1[i].style.display="block";
                    pack2[i].style.display="block";
                }
            }else{
                for (i = 0; i < pack1.length; i++) {
                    pack1[i].style.display="none";
                    pack2[i].style.display="none";
                }
            }  
            
            
           if(selectObj.value === "1" || selectObj.value === "2"){
                total_h.classList.remove("total-hide");
                tr1.classList.remove("total-hide");
                tr2.classList.remove("total-hide");
                tr3.classList.remove("total-hide");
                tr4.classList.remove("total-hide");
                tr5.classList.remove("total-hide");
                tr6.classList.remove("total-hide");
                tr7.classList.remove("total-hide");
                tr8.classList.remove("total-hide");
                tr9.classList.remove("total-hide");
                
            }else{
                total_h.classList.add("total-hide");
                tr1.classList.add("total-hide");
                tr2.classList.add("total-hide");
                tr3.classList.add("total-hide");
                tr4.classList.add("total-hide");
                tr5.classList.add("total-hide");
                tr6.classList.add("total-hide");
                tr7.classList.add("total-hide");
                tr8.classList.add("total-hide");
                tr9.classList.add("total-hide");
               
            }

           
               
                
        }


      
           //Getting package rows in final bidders
function package_bidders_pro(label_obj) {
	

   
   

    var label_id = label_obj.id;

	var package_name,finalized_award_value;


	var package_count = $('#package_count').find(":selected").text();
	var bidder_count = parseInt($("#bidder_count").val())+1;
	$('#package_row2').show();
	$('#package_row3').show();
	package_name = label_obj.value;
	

	if (label_id == "package_label1")
	{
		var url = base_url + 'nfa/Award_procurement/show_package_bidders1';
				
	}
	else if (label_id == "package_label2")
	{
		var url = base_url + 'nfa/Award_procurement/show_package_bidders2';
		
	}
	else if (label_id == "package_label3")
	{
		var url = base_url + 'nfa/Award_procurement/show_package_bidders3';
		
	}
	$.post(url, {
			bidder_count: bidder_count,
			
			package_name: package_name
			
		},
		function(data, status) {
			
			if (label_id == "package_label1")
				$('#package_row1').html(data);
			else if (label_id == "package_label2")
				$('#package_row2').html(data);
			else if (label_id == "package_label3")
				$('#package_row3').html(data);

			setGpl_budget();
			showBidders_finalized();
			getBidders_total();
            setMajorTerms_package1();

		});

			
		//showBidders_finalized();
} 

        /* changing input value to cr */

        function changeToCr(sender) {

            let val = sender.value;

            val1 = String(val);
            if (val1) {
                if (val1.includes("Cr")) {
                    sender.value = val;
                } else if (!val1.includes("Cr")) {
                    sender.value = sender.value + " Cr";
                }
            }
        }



        function  setMajorTerms_package1(){
           
            var package_count = $('#package_count').find(":selected").text();
            for(i=1;i<=package_count;i++)
            {
                package_name= $("#package_label"+i).val(); 
               
                $("#term_label"+i).val("Package "+package_name); 		
            }
            

        }

        function package_bidders2(label_id) {
          
            var base_url = $('#base').val();
            var package_label1 = $('#package_label1').val();
           
            var package_name;

            var package_count = $('#package_count').find(":selected").text();
           
            package_name = label_id.value;
           
            alert(package_name);
          
            var url = base_url + 'nfa/Award_procurement/show_package_bidders1';
         
            $.post(url, {
                    package_name: package_name
                },
                function(data, status) {
                   
                    $('#package_row1').html(data);
                  
                });


        }

       
        /* adding award synopsis dynamic column */

        $('#package_count').on('change', function(e) {

            //Remove TD from final Bid
          
            $('#bidder_count').val(0);
            $('#bidHead_row').find('th:gt(2)').remove();
            $('#pqFb_row').find('td:gt(2)').remove();
            $('#package_row1').find('td:gt(2)').remove();
            $('#package_row2').find('td:gt(2)').remove();
            $('#package_row3').find('td:gt(2)').remove();
            $('#totAmt_row').find('td:gt(2)').remove();
            $('#bidPos_row').find('td:gt(1)').remove();
            $('#diffCrs_row').find('td:gt(1)').remove();
            $('#diffPercent_row').find('td:gt(1)').remove();
          

            let _th = `<th style="width:20%"><label class='cust_th'>Package name</label><input type='text' class="form-control" placeholder="" name="package_label[]" id="package_label"  required onblur="package_bidders_pro(this);"></th>`;

            let _budget_incl = `<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this);packageSynopsis_total('package_budget_esc','total_budget_esc'); setGpl_budget(); calculateSum1_v1();" class="form-control _budget_incl_td decimalStrictClass onMouseOutClass" name="package_budget_esc[]" id="package_budget_esc" required></td>`;

            let _negotiated_val = `<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this);packageSynopsis_total('package_negot_value','total_negot_value');" class="form-control _negotiated_val_td decimalStrictClass onMouseOutClass" name="package_negot_value[]" id="package_negot_value" required></td>`;

            let _finalized = `<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" class="form-control _finalized_td decimalStrictClass onMouseOutClass" name="finalized_award_value_package[]" id="finalized_award_value_package" onblur="changeToCr(this);packageSynopsis_total('finalized_award_value_package','total_finalized_award_value');showBidders_finalized();calculateSum1_v1();" required></td>`;
            let _exp_saving = `<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="" class="form-control _exp_saving_td decimalStrictClass" name="expected_savings_package[]" id="expected_savings_package_v" readonly></td>`;
            let _rec_vendors = `<td><input type='text' class="form-control _rec_vendors_td" name="recomm_vendor_package[]" id="recomm_vendor_package" onblur="setRecommended_vendorName();" required></td>`;
            let _basis_awrd = `<td><input type='text' class="form-control _basis_awrd_td" name="basis_award_package[]" id="basis_award_package" readonly></td>`;
            let _deviation_contr = `<td><input type='text' class="form-control _deviation_contr_td" name="deviation_approved_package[]" id="deviation_approved_package" required></td>`;
            let _last_awarded = `<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this);packageSynopsis_total('awarded_benchmark_package','total_awarded_benchmark');show_bidders_procurement();" class="form-control _last_awarded_td decimalStrictClass onMouseOutClass" name="awarded_benchmark_package[]" id="awarded_benchmark_package" required></td>`;
            let _proposed_awrd_val = `<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control _proposed_awrd_val_td decimalStrictClass onMouseOutClass" name="post_basic_rate_package[]" id="post_basic_rate_package" readonly></td>`;



          


            if ($(".cust_th").length <= e.target.value) {

                for (let i = $(".cust_th").length; i < e.target.value; i++) {

                    let th = $(_th);
                    th.find("input").attr("name", th.find("input").attr("name"))
                    th.find("input").attr("id", th.find("input").attr("id") + String(i + 2))

                   
                    let budget_incl = $(_budget_incl);
                    budget_incl.find("input").attr("name", budget_incl.find("input").attr("name"))
                    budget_incl.find("input").attr("id", budget_incl.find("input").attr("id") + String(i + 2))
                   

                    let negotiated_val = $(_negotiated_val);
                    negotiated_val.find("input").attr("name", negotiated_val.find("input").attr("name"))
                    negotiated_val.find("input").attr("id", negotiated_val.find("input").attr("id") + String(i + 2))
                   
                    let finalized_val = $(_finalized);
                    finalized_val.find("input").attr("name", finalized_val.find("input").attr("name"))
                    finalized_val.find("input").attr("id", finalized_val.find("input").attr("id") + String(i + 2))

                    let exp_saving = $(_exp_saving);
                    exp_saving.find("input").attr("name", exp_saving.find("input").attr("name"))
                    exp_saving.find("input").attr("id", exp_saving.find("input").attr("id") + String(i + 2))

                    let rec_vendors = $(_rec_vendors);
                    rec_vendors.find("input").attr("name", rec_vendors.find("input").attr("name"))
                    rec_vendors.find("input").attr("id", rec_vendors.find("input").attr("id") + String(i + 2))

                    let basis_awrd = $(_basis_awrd);
                    basis_awrd.find("input").attr("name", basis_awrd.find("input").attr("name"))
                    basis_awrd.find("input").attr("id", basis_awrd.find("input").attr("id") + String(i + 2))

                    let deviation_contr = $(_deviation_contr);
                    deviation_contr.find("input").attr("name", deviation_contr.find("input").attr("name"))
                    deviation_contr.find("input").attr("id", deviation_contr.find("input").attr("id") + String(i + 2))

                    let last_awarded = $(_last_awarded);
                    last_awarded.find("input").attr("name", last_awarded.find("input").attr("name"))
                    last_awarded.find("input").attr("id", last_awarded.find("input").attr("id") + String(i + 2))

                  

                    let proposed_award_val = $(_proposed_awrd_val);
                    proposed_award_val.find("input").attr("name", proposed_award_val.find("input").attr("name"))
                    proposed_award_val.find("input").attr("id", proposed_award_val.find("input").attr("id") + String(i + 2))

                    
                    
                    
                 
                  

                    let elementlength = $("#dyntable").find("thead").find("tr").find(`th`).length

                    $($("#dyntable").find("thead").find("tr").find("th")[elementlength - 1]).before(th)
                  
                    

 
                    $($($("#dyntable").find("tbody").find("tr")[0]).find("td")[elementlength - 1]).before(budget_incl)
                    $($($("#dyntable").find("tbody").find("tr")[1]).find("td")[elementlength - 1]).before(negotiated_val)
                    $($($("#dyntable").find("tbody").find("tr")[2]).find("td")[elementlength - 1]).before(finalized_val)
                    $($($("#dyntable").find("tbody").find("tr")[3]).find("td")[elementlength - 1]).before($(exp_saving))
                    $($($("#dyntable").find("tbody").find("tr")[4]).find("td")[elementlength - 1]).before(rec_vendors)
                    $($($("#dyntable").find("tbody").find("tr")[5]).find("td")[elementlength - 1]).before(basis_awrd)
                    $($($("#dyntable").find("tbody").find("tr")[6]).find("td")[elementlength - 1]).before(deviation_contr)
                   
                    $($($("#dyntable").find("tbody").find("tr")[7]).find("td")[elementlength - 1]).before(last_awarded)
                    
                    $($($("#dyntable").find("tbody").find("tr")[8]).find("td")[elementlength - 1]).before(proposed_award_val)
                    
 


                }
            } else {

                for (let i = e.target.value; i <= $(".cust_th").length; i++) {
                    $(".cust_th").parent().last().remove()
                    $("._budget_incl_td").parent().last().remove()
                    $("._negotiated_val_td").parent().last().remove()
                    $("._finalized_td").parent().last().remove()
                    $("._exp_saving_td").parent().last().remove()
                    $("._rec_vendors_td").parent().last().remove()
                    $("._basis_awrd_td").parent().last().remove()
                    $("._deviation_contr_td").parent().last().remove()
                    $("._last_awarded_td").parent().last().remove()                   
                    $("._proposed_awrd_val_td").parent().last().remove()
                    
                   
                    
                }

            }

            let basic2 = document.getElementById("basic_rate2");
            let anticipated2 = document.getElementById("anticipated_rate2");
            let basic3 = document.getElementById("basic_rate3");
            let anticipated3 = document.getElementById("anticipated_rate3");
            $('#group_1_1').click(function() {

                basic2.style.display = "block";
                anticipated2.style.display = "block";
            });

            $('#group_1_2').click(function() {
                //alert("test2");
                basic2.style.display = "none";
                anticipated2.style.display = "none";
            });
            $('#group_2_1').click(function() {

                basic2.style.display = "block";
                anticipated2.style.display = "block";
            });

            $('#group_2_2').click(function() {

                basic2.style.display = "none";
                anticipated2.style.display = "none";
            });
            //3rd Package
            $('#group_3_1').click(function () {  
			
				   basic3.style.display = "block";
				   anticipated3.style.display = "block";
				 });  

			$('#group_3_2').click(function () {  
					
					basic3.style.display = "none";
					anticipated3.style.display = "none";
			});    

		
            $('.onMouseOutClass').on('mouseout', (event) => {
                let ele = document.getElementsByClassName("onMouseOutClass");
            
                for(let i = 0;i<ele.length;i++){
                    let val = event.target.value;
                    val1 = String(event.target.value);
                    if (val1) {
                        if (val1.includes("Cr")) {
                            event.target.value = val;
                        } else if (!val1.includes("Cr")) {
                            event.target.value = event.target.value + " Cr";
                        }
                    }
                }

            })
        });

        /* Ending award synopsis dynamic column */

        /* adding final bid scenario dynamic column */

        $('#bidder_count').on('change', function(e) {

            let _th = `<th style="width: 120px !important;"><input type='text' class="form-control custom_th" name="final_bidder_name[]" placeholder="Enter Bidder Name" id="final_bidder_name" required></th>`;

            let _pqfb = `<td><select id="score_type" style="width: 120px !important;" name="score_type[]" required="" class="form-control pq_fb_score_custom_td" onchange="score_color1();"><option value="">Select</option><option value="PQ">PQ</option><option value="FB">FB</option></select><input type='number' class="form-control mt-3" style="width: 120px !important;" name="score[]" id="score" style="width: 120px !important;"  min="0" max="100" step="0.01" oninput="(validity.valid)||(value='');" onblur="score_color1();"></td>`;

            let _package_bidder = `<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this);getBidders_total();calculateSum1_v1();" class="form-control package_common_tower_label_custom_td decimalStrictClass onMouseOutClass" name="package_bidder[1][1]" required id="package_bidder_1_1" required></td>`;

         

            let _total_amt_label = `<td><input type='text' class="form-control total_amt_label_custom_td" name="total_amt_bidder[]" id="total_amt_bidder" readonly></td>`;

            let _bid_position_label = `<td><input type='text' class="form-control bid_position_label_custom_td" name="bid_position[]" id="bid_position"  value="" readonly></td>`;

            let _bid_position_gp = `<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control bid_position_gp_custom_td decimalStrictClass onMouseOutClass" name="diff_budget_crs[]" id="diff_budget_crs" readonly></td>`;

            let _diff_age_gp = `<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control diff_age_gp_custom_td decimalStrictClass onMouseOutClass" name="diff_budget_percentage[]" id="diff_budget_percentage" readonly></td>`;

            var package_count = $('#package_count').find(":selected").text();
            var bid_count = $('#bidder_count').find(":selected").text();
           
            var pckIndex, bidIndex, ele_bidIndex;
            var bidCount_disp = $('input[name="final_bidder_name[]"]').length;
           
			if(bidCount_disp <= bid_count){

                for (pckIndex = 1; pckIndex <= package_count; pckIndex++) {

                    for (bidIndex = bidCount_disp; bidIndex < bid_count; bidIndex++) {
                        ele_bidIndex = bidIndex + 1;
                       
                        let th = $(_th);
                        th.find("input").attr("name", th.find("input").attr("name"))
                        th.find("input").attr("id", th.find("input").attr("id") + (bidIndex + 1))
                      
                        let pq_fb_score = $(_pqfb);
                        pq_fb_score.find("select").attr("name", pq_fb_score.find("select").attr("name"))
                        pq_fb_score.find("select").attr("id", pq_fb_score.find("select").attr("id") + ele_bidIndex)
                        pq_fb_score.find("input").attr("name", pq_fb_score.find("input").attr("name"))
                        pq_fb_score.find("input").attr("id", pq_fb_score.find("input").attr("id") + ele_bidIndex)

                        let package_bidder = $(_package_bidder);
                        package_bidder.find("input").attr("name", "package_bidder[" + pckIndex + "][" + ele_bidIndex + "]")
                        package_bidder.find("input").attr("id", "package_bidder_" + pckIndex + "_" + ele_bidIndex)
                        package_bidder.find("input").attr("required", "required")
                     

                        let total_amt_label = $(_total_amt_label);
                        total_amt_label.find("input").attr("name", total_amt_label.find("input").attr("name"))
                        total_amt_label.find("input").attr("id", total_amt_label.find("input").attr("id") + ele_bidIndex)

                        let bid_position_label = $(_bid_position_label);
                        bid_position_label.find("input").attr("name", bid_position_label.find("input").attr("name"))
                        bid_position_label.find("input").attr("id", bid_position_label.find("input").attr("id") + ele_bidIndex)

                        let bid_position_gp = $(_bid_position_gp);
                        bid_position_gp.find("input").attr("name", bid_position_gp.find("input").attr("name"))
                        bid_position_gp.find("input").attr("id", bid_position_gp.find("input").attr("id") + ele_bidIndex)

                        let diff_age_gp = $(_diff_age_gp);
                        diff_age_gp.find("input").attr("name", diff_age_gp.find("input").attr("name"))
                        diff_age_gp.find("input").attr("id", diff_age_gp.find("input").attr("id") + ele_bidIndex)

                        if (pckIndex == 1) {
                            $("#mainTable").find("thead").find("tr").append(th)
                            $($("#mainTable").find("tbody").find("tr")[0]).append(pq_fb_score)
                        }
                        $($("#mainTable").find("tbody").find("tr")[pckIndex]).append(package_bidder)
                       
                        if (pckIndex == 1) {
                            $($("#mainTable").find("tbody").find("tr")[4]).append(total_amt_label)
                            $($("#mainTable").find("tbody").find("tr")[5]).append(bid_position_label)
                            $($("#mainTable").find("tbody").find("tr")[6]).append(bid_position_gp)
                            $($("#mainTable").find("tbody").find("tr")[7]).append(diff_age_gp)
                        }
                      
                    }
                }


            } else {
                let length = $(".custom_th").length;
                for (pckIndex = 1; pckIndex <= package_count; pckIndex++) {
                   
                    for (bidIndex = bid_count; bidIndex < bidCount_disp; bidIndex++) {
                       
                      
						ele_bidIndex=parseInt(bidIndex)+1;
                        
                        if (pckIndex == 1) {
                            $(".custom_th").parent().last().remove()
                            $(".pq_fb_score_custom_td").parent().last().remove()
                            $(".total_amt_label_custom_td").parent().last().remove()
                            $(".bid_position_label_custom_td").parent().last().remove()
                            $(".bid_position_gp_custom_td").parent().last().remove()
                            $(".diff_age_gp_custom_td").parent().last().remove()
                        }
                      
						$("#package_bidder_"+pckIndex+"_"+ele_bidIndex).closest("td").remove();
						$("#package_bidder_"+pckIndex+"_"+ele_bidIndex).remove()
                       
                    }
                }

            }
			
			setRecommended_vendorName();
			setGpl_budget();

           

            $('.onMouseOutClass').on('mouseout', (event) => {
            let ele = document.getElementsByClassName("onMouseOutClass");
           
            for(let i = 0;i<ele.length;i++){
                let val = event.target.value;
                val1 = String(event.target.value);
                if (val1) {
                    if (val1.includes("Cr")) {
                        event.target.value = val;
                    } else if (!val1.includes("Cr")) {
                        event.target.value = event.target.value + " Cr";
                    }
                }
            }

        })
			
        });

        /*  ending final bid scenario dynamic column */

        /* Add row delete row */
        const radio1 = document.getElementById('packageRadiosYes1');

        const radio2 = document.getElementById('packageRadiosNo1');

        const radio3 = document.getElementById('group_1_1');

        const radio4 = document.getElementById('group_1_2');
        const radio5 = document.getElementById('group_2_1');
        const radio6 = document.getElementById('group_2_2');


        let basic1 = document.getElementById("basic_rate1");
        let anticipated1 = document.getElementById("anticipated_rate1");
        let basic2 = document.getElementById("basic_rate2");
        let anticipated2 = document.getElementById("anticipated_rate2");
        let basic3 = document.getElementById("basic_rate3");
        let anticipated3 = document.getElementById("anticipated_rate3");
  
        function createRowColumn(row) {
            var column = document.createElement("td");
            row.appendChild(column);
            return column;
        }

        function addRow() {
            var newrow = document.createElement("tr");
            newrow.setAttribute("class", "text-center");
            var numericColumn = createRowColumn(newrow);
            var textColumn = createRowColumn(newrow);
            var textAreaColumn = createRowColumn(newrow);
            var removeColumn = createRowColumn(newrow);

            var textbox = document.createElement("input");
            textbox.setAttribute("type", "text");
            textbox.setAttribute("required","");
            textbox.setAttribute("class", "form-control");
            textbox.setAttribute("name", "term[]");
            textColumn.appendChild(textbox);

            var textArea1 = document.createElement("div");
            textArea1.setAttribute("style", "display:flex ;");

            var term_len = $('input[name="term[]"]').length;
			
            var term_len_index = parseInt(term_len)+1;

            var textAreaRow = document.createElement("textarea");
            textAreaRow.setAttribute("class", "form-control mr-2");
            textAreaRow.setAttribute("rows", "2");
            textAreaRow.setAttribute("required","");
            textAreaRow.setAttribute("name", "term_label_value["+term_len_index+"][]");

          
            if(contrSel === "1"){
                var textAreaRow2 = document.createElement("textarea");
                textAreaRow2.setAttribute("class", "form-control mr-2");
                textAreaRow2.setAttribute("rows", "2");
                textAreaRow2.setAttribute("required","");
                textAreaRow2.setAttribute("name", "term_label_value["+term_len_index+"][]");
                textArea1.appendChild(textAreaRow2);

            }else if(contrSel === "2"){
                var textAreaRow2 = document.createElement("textarea");
                textAreaRow2.setAttribute("class", "form-control mr-2");
                textAreaRow2.setAttribute("rows", "2");
                textAreaRow2.setAttribute("required","");
                textAreaRow2.setAttribute("name", "term_label_value["+term_len_index+"][]");

                var textAreaRow3 = document.createElement("textarea");
                textAreaRow3.setAttribute("class", "form-control mr-2");
                textAreaRow3.setAttribute("rows", "2");
                textAreaRow3.setAttribute("required","");
                textAreaRow3.setAttribute("name", "term_label_value["+term_len_index+"][]");

                textArea1.appendChild(textAreaRow2);
                textArea1.appendChild(textAreaRow3);
            }
            textArea1.appendChild(textAreaRow);
            textAreaColumn.appendChild(textArea1);


            var remove = document.createElement("input");
            remove.setAttribute("type", "button");
            remove.setAttribute("value", "Delete");
            remove.setAttribute("class", "btn ibtnDelDcw2 btn-sm btn-danger rounded");
            remove.setAttribute("onClick", "deleteRow(this)");
            removeColumn.appendChild(remove);

            var table = document.getElementById('t1');
            var tbody = table.querySelector('tbody') || table;
            var count = tbody.getElementsByTagName('tr').length;
            numericColumn.innerText = count.toLocaleString();

            tbody.appendChild(newrow);
        }

        function deleteRow(button) {
            var row = button.parentNode.parentNode;
            var tbody = row.parentNode;
            tbody.removeChild(row);

            // refactoring numbering
            var rows = tbody.getElementsByTagName("tr");
            for (var i = 1; i < rows.length; i++) {
                var currentRow = rows[i];
                currentRow.childNodes[0].innerText = i.toLocaleString();
            }
        }

        /* Add row delete row */

        //Level role change 
        $('#level').change(function() {
          
            level = this.value;

            package_value = $('#post_basic_rate_package1').val();

            $.post("<?php echo base_url('nfa/Award_procurement/getRoleUsers'); ?>", {
                    role: level,
                   
                },
                function(data, status) {
                 
                    $('#role').html(data);

                });
        });

        $('#role').change(function() {
          
            user_name = $("#role option:selected").text();
            user_id = $('#role').val();
           
            level_val = $("#level")[0].selectedIndex;


            if (user_id != '') {
                $('#approvers_div').css('display', 'block');
                $('#level' + level_val + '_div').css('display', 'block');


            }
            level_text = $("#level option:selected").text();
         
            $('#level' + level_val + '_id').html("Level " + level_val);

           
            $('#level' + level_val + '_approver').val(user_name);
            $('#level' + level_val + '_approver_id').val(user_id);
            $('#level' + level_val + '_approver').prop('readonly', true);

        });

        //Calculate Sum for the second package
        function calculateSum2() {
            var sum1 = 0;
            var sum2 = 0;
            var condition_l1;
            var ho_approval1;
            var finalized_award_value_package1 = $("#finalized_award_value_package1").val();
            var anticipated_rate1 = $("#anticipated_rate1").val();

            sum1 = parseFloat(finalized_award_value_package1) + parseFloat(anticipated_rate1);

            $("#post_basic_rate_package1").val(sum1);
            var package_value = $("#post_basic_rate_package1").val();


            var finalized_award_value_package2 = $("#finalized_award_value_package2").val();
            var anticipated_rate2 = $("#anticipated_rate2").val();
           
            sum2 = parseFloat(finalized_award_value_package2) + parseFloat(anticipated_rate2);

            $("#post_basic_rate_package2").val(sum2);
        }

        //Calculate Days

        function calculateDays() {

            var activity_planned_date = $("#activity_planned_date").val();
            var activity_cbe_date = $("#activity_cbe_date").val();

            // end - start returns difference in milliseconds 
          
            days = daysdifference(activity_planned_date, activity_cbe_date);
           
            $("#activity_delay").val(days);
            if (days > 0) {
                $("#front_idling1").prop("checked", true);
                idlingCheck();
            } else {
                $("#front_idling2").prop("checked", true);
                idlingUnCheck();
            }
        }

        function daysdifference(firstDate, secondDate) {
            var startDay = new Date(firstDate);
            var endDay = new Date(secondDate);

            // Determine the time difference between two dates     
            var millisBetween = endDay.getTime() - startDay.getTime();

           

            // Determine the number of days between two dates  
            var days = millisBetween / (1000 * 3600 * 24);
          
            return Math.round(days);
        }
       
        $('#receipt_date').change(function() {
            var receipt_date = $("#receipt_date").val();
            var bidder_approval_date = $("#bidder_approval_date").val();
            calculateDays_betDates(receipt_date, bidder_approval_date, "bidder_approval_days");

        });
        $('#bidder_approval_date').change(function() {
            var receipt_date = $("#receipt_date").val();
            var bidder_approval_date = $("#bidder_approval_date").val();
         
	calculateDays_betDates(receipt_date,bidder_approval_date,"bidder_approval_days");

	var award_recomm_date = $("#award_recomm_date").val();
	calculateDays_betDates(bidder_approval_date,award_recomm_date,"award_recomm_days");
        });

        $('#award_recomm_date').change(function() {
            var bidder_approval_date = $("#bidder_approval_date").val();
            var award_recomm_date = $("#award_recomm_date").val();
            calculateDays_betDates(bidder_approval_date, award_recomm_date, "award_recomm_days");

        });

        $('#save, #submit').on('click', () => {
            // Get HTML content

            var subject_html = quill.root.innerHTML;
           
            // Copy HTML content in hidden form
            $('#subject_hd').val(subject_html);
          

        })
		
	 function noDecimalStrict(){
            let noOfClasses=document.getElementsByClassName("nodecimalStrictClass").length;
            for(let k = 0;k<=noOfClasses;k++){
                setInputFilter(document.getElementsByClassName("nodecimalStrictClass")[k], function(value) {
                return /^\d*$/.test(value); });
            }
        } 
        
        

    function calculateSum1_v1()
    {
            
       	var total_sum=0;
	var total_expected_savings=0;
	var sum=0;
	var sum_proposed=0;
	var condition_l1;
	var l1_vendor1;
	var package_value;
	var finalized_award_value_package;
	var anticipated_rate;
	var package_budget_esc;
	var total_finalized,total_budget,total_expected;

	var package_count = $('#package_count').find(":selected").text();
	var salient_id = $("#salient_id").val();
	
	for(i=1;i<=package_count;i++)
	{
		sum_proposed=0;
		finalized_award_value_package= $("#finalized_award_value_package"+i).val(); 		 
		package_budget_esc = $("#package_budget_esc"+i).val();  
		sum_proposed+= parseFloat(finalized_award_value_package);
		
		if(!isNaN(sum_proposed)) {
			
			$("#post_basic_rate_package"+i).val(sum_proposed.toFixed(2)+" Cr"); 
		}
		else
			$("#post_basic_rate_package"+i).val(0+" Cr");
		
		expected_savings_package =  (parseFloat(finalized_award_value_package)-parseFloat(package_budget_esc))*100/parseFloat(package_budget_esc);
        expected_savings_package = parseFloat(expected_savings_package) || 0;			

        
        
        $("#expected_savings_package_v"+i).val(expected_savings_package.toFixed(2) + " %"); 
			total_expected_savings += expected_savings_package; 
		    total_sum += sum_proposed; 


		
	}
	
	if(!isNaN(total_sum)) {
		$("#total_post_basic_rate").val(total_sum.toFixed(2)+" Cr"); 
	}
	else
		$("#total_post_basic_rate").val(0); 
	if(!isNaN(total_expected_savings)) {
		
		total_finalized = $("#total_finalized_award_value").val();
		
		total_budget = $("#total_budget_esc").val();
		
		total_expected = ((parseFloat(total_finalized)-parseFloat(total_budget))*100)/parseFloat(total_budget);
		$("#total_expected_savings").val(total_expected.toFixed(2)+" %"); 	
	}
	else
		$("#total_expected_savings").val('0%'); 	
                
                package_value= total_sum;
            
                
                ho_approval = $("input[name='ho_approval']:checked").val(); 
            
                l1_vendor1 = checkL1_vendor();	
               
                // Get max level of Approvers
                
                
                
                    var url = base_url+'nfa/Award_procurement/getMaxLevelApprovers';
                    
                    $.post(url,
                                {
                                    'package_value': package_value, 'ho_approval': ho_approval,'l1_vendor1': l1_vendor1,'salient_id': salient_id
                                },
                                function (data, status) {
                                   
                                    $('#approvers_list_div').html(data);
                                
                                });
                
                

                //Expected Savings -Percentage
                getExpectedSavings1();
                //showBidposition();
                finalized_total();
        }


        //Function for Expected Savings -Percentage
function getExpectedSavings1(){
	
	var i;
	var percentage=0;
	var post_basic_rate_package;
	var package_budget_esc,finalized_award_value_package;
	
	var package_count = $('#package_count').find(":selected").text();
	for(i=1;i<=package_count;i++)
	{
		//post_basic_rate_package= $("#post_basic_rate_package"+i).val(); 
		finalized_award_value_package= $("#finalized_award_value_package"+i).val(); 
		
		package_budget_esc = $("#package_budget_esc"+i).val(); 
		//percentage= (parseFloat(post_basic_rate_package)-parseFloat(package_budget_esc))*100/parseFloat(package_budget_esc);
		percentage= (parseFloat(finalized_award_value_package)-parseFloat(package_budget_esc))*100/parseFloat(package_budget_esc);
		if(!isNaN(percentage)) {
			$("#expected_savings_package"+i).val(percentage.toFixed(2)+" %"); 
		}
	}

	
}

  
      
        // change approval list according to ho_approval
        $('input[name=ho_approval]').change(function(){
               
            
                 	var total_sum=0;
	var total_expected_savings=0;
	var sum=0;
	var sum_proposed=0;
	var condition_l1;
	var l1_vendor1;
	var package_value;
	var finalized_award_value_package;
	var anticipated_rate;
	var package_budget_esc;
	var total_finalized,total_budget,total_expected;

	var package_count = $('#package_count').find(":selected").text();
	var salient_id = $("#salient_id").val();
	
	for(i=1;i<=package_count;i++)
	{
		sum_proposed=0;
		finalized_award_value_package= $("#finalized_award_value_package"+i).val(); 		 
		package_budget_esc = $("#package_budget_esc"+i).val();  
		sum_proposed+= parseFloat(finalized_award_value_package);
		
		if(!isNaN(sum_proposed)) {
			
			$("#post_basic_rate_package"+i).val(sum_proposed.toFixed(2)+" Cr"); 
		}
		else
			$("#post_basic_rate_package"+i).val(0+" Cr");
		
		expected_savings_package =  (parseFloat(finalized_award_value_package)-parseFloat(package_budget_esc))*100/parseFloat(package_budget_esc);
        expected_savings_package = parseFloat(expected_savings_package) || 0;			

        
        
        $("#expected_savings_package_v"+i).val(expected_savings_package.toFixed(2) + " %"); 
			total_expected_savings += expected_savings_package; 
		    total_sum += sum_proposed; 


		
	}
	
	if(!isNaN(total_sum)) {
		$("#total_post_basic_rate").val(total_sum.toFixed(2)+" Cr"); 
	}
	else
		$("#total_post_basic_rate").val(0); 
	if(!isNaN(total_expected_savings)) {
		
		total_finalized = $("#total_finalized_award_value").val();
		
		total_budget = $("#total_budget_esc").val();
		
		total_expected = ((parseFloat(total_finalized)-parseFloat(total_budget))*100)/parseFloat(total_budget);
		$("#total_expected_savings").val(total_expected.toFixed(2)+" %"); 	
	}
	else
		$("#total_expected_savings").val('0%'); 
                        
                        package_value= total_sum;

                            var ho_approval = $("input[name='ho_approval']:checked").val();    
                            l1_vendor1 = checkL1_vendor();	
                            var url = base_url+'nfa/Award_procurement/getMaxLevelApprovers';
                            
                                $.post(url,
                                        {
                                            'package_value': package_value, 'ho_approval': ho_approval,'l1_vendor1': l1_vendor1,'salient_id': salient_id
                                        },
                                        function (data, status) {
                                        
                                            $('#approvers_list_div').html(data);
                                        
                                        });
            
            
            });
        
        
        
        
            function validate_greater_appr_date(th){
            let receipt_date = $("#receipt_date").val();
            let bidder_approval_date = $("#bidder_approval_date").val();
            $("#receipt_date_err").html("");
            $("#bidder_approval_date_err").html("");
            if(receipt_date){
                if(bidder_approval_date >= receipt_date){ 
                    $("#bidder_approval_date_err").html("Receipt date greater than start date").css("color","red");
                    $("#bidder_approval_date").val("");
                }
            }else{
                $("#receipt_date_err").html("This field Required").css("color","red");
                $("#bidder_approval_date_err").html("Receipt date greater than start date").css("color","red");
                $("#bidder_approval_date").val("");
            }
        }


    function score_color1(){
	
	var score_type,bid_index,score_value;
	var bidder_count = parseInt($("#bidder_count").val())+1;	
	sum_gpl=0;
	for(bid_index=1;bid_index<=bidder_count;bid_index++)
	{
		score_type = $("#score_type"+bid_index).val();
		score_value = parseFloat($("#score"+bid_index).val());
		
		if(score_type=="PQ")
		{
			$("#score"+bid_index).removeClass('background-feedback');
			$("#score"+bid_index).addClass('background-pq');
			if(score_value<50)
			{
				
				$("#score"+bid_index).removeClass('background-pq');
				$("#score"+bid_index).addClass('background-red'); 
			}
			else
			{
				$("#score"+bid_index).removeClass('background-red');
				$("#score"+bid_index).addClass('background-pq');
			}
		}
		else if(score_type=="FB")
		{
			$("#score"+bid_index).removeClass('background-pq');
			$("#score"+bid_index).addClass('background-feedback');
			if(score_value<60)
			{
				$("#score"+bid_index).removeClass('background-feedback');
				$("#score"+bid_index).addClass('background-red'); 
			}
			else
			{
				$("#score"+bid_index).removeClass('background-red');
				$("#score"+bid_index).addClass('background-feedback');
			}
		}
		
	}
	
}
        
        
        
        
            function validate_greater_appr_date(th){
            let receipt_date = $("#receipt_date").val();
            let bidder_approval_date = $("#bidder_approval_date").val();
            $("#receipt_date_err").html("");
            $("#bidder_approval_date_err").html("");
            if(receipt_date){
                if(bidder_approval_date >= receipt_date){ 
                    $("#bidder_approval_date_err").html("Receipt date greater than start date").css("color","red");
                    $("#bidder_approval_date").val("");
                }
            }else{
                $("#receipt_date_err").html("This field Required").css("color","red");
                $("#bidder_approval_date_err").html("Receipt date greater than start date").css("color","red");
                $("#bidder_approval_date").val("");
            }
        }

    function setInputFilter(textbox, inputFilter) {
            ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
                textbox.addEventListener(event, function() {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                }
                });
            });
        }
        
      
        function decimalStrict(){
            let noOfClasses=document.getElementsByClassName("decimalStrictClass").length;
            for(let k = 0;k<=noOfClasses;k++){
                setInputFilter(document.getElementsByClassName("decimalStrictClass")[k], function(value) {
                return /^-?\d*[.,]?\d{0,2}$/.test(value); });
            }
        }              
                        
    </script>
    <script src="../../assets/js/summernote-bs4.min.js"></script>
    <script src="../../assets/js/jquery.min.js"></script>
  
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/nfa_award_contract.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/nfa_scripts.js"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</body>

</html>