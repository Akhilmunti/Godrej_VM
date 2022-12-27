<!DOCTYPE html>
<html lang="en">

<?php 

$upload_path = $this->config->item('upload_path'); 
$salient_id = $mRecord['id'];

$package_count = $mRecord['package_count'];
$this->load->view('buyer/partials/header'); ?>

<link href="https://cdn.quilljs.com/1.1.6/quill.snow.css" rel="stylesheet">

<script src="https://cdn.quilljs.com/1.1.6/quill.js"></script>


<body class="hold-transition light-skin sidebar-mini theme-blueindigo onlyheader">
<style>
        .btn-hide{
            display: none;
        }
        .date-hide {
            display: none;
        }
        .idling-hide {
            display: none;
        }


        .package-sec1{
            display: none;
        }
       
        [data-tip] {
	        position:relative;
        }
        [data-tip]:before {
            content:'';
            /* hides the tooltip when not hovered */
            display:none;
            content:'';
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-bottom: 5px solid #1a1a1a;	
            position:absolute;
            top:30px;
            left:35px;
            z-index:8;
            font-size:0;
            line-height:0;
            width:0;
            height:0;
        }
        [data-tip]:after {
            display:none;
            content:attr(data-tip);
            position:absolute;
            top:35px;
            left:0px;
            padding:5px 8px;
            background:#1a1a1a;
            color:#fff;
            z-index:9;
            font-size: 0.8em;
            height:30px;
            line-height:18px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            white-space:nowrap;
            word-wrap:normal;
        }
        [data-tip]:hover:before,
        [data-tip]:hover:after {
            display:block;
        }

        .synopsis-header{
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

		.background-green{
        background-color: #28a745 !important;
        color: #fff;
    	}
    	.background-red{
        background-color: #dc3545 !important;
        color: #fff;
    	}
        [tool-tip] {
            position: relative;
        }

        [tool-tip]:before {
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

        [tool-tip]:after {
            display: none;
            content: attr(tool-tip);
            position: absolute;
            top: 35px;
            /* left: 0px; */
            right: -10px;
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

        [tool-tip]:hover:before,
        [tool-tip]:hover:after {
            display: block;
        }

    </style>

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

			<div class="d-block mb-4">
                        <h5 class="page-title br-0 font-weight-bold">ENFA No : <?php echo $mRecord['version_id'] ?></h5>
                    </div>

                    <div class="box">

                        <div class="box-body">
							<form id="nfaForm" method="POST" action="<?php echo base_url('nfa/Award_contract/actionSave/' . $mRecord['id']); ?>" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class='form-group'>
                                        <label  class="font-weight-bold">Subject</label>
                                      
										<div id="subject" class="form-control" name="subject"><?php echo $mRecord['subject'] ?></div>
										
                                    </div>
                                </div>

                            </div>

							<div class="row">

								<div class="col-lg-12">
									<div class='form-group'>
										<label class="font-weight-bold">Scope of Work</label>
										<input type='text' class="form-control" placeholder="" 
										name="scope_of_work" id="scope_of_work" value="<?php echo  $mRecord['scope_of_work'] ?>">
									</div>
								</div>
							</div>

                            <div class="table-responsive mt-4">
                                <table id="tables" class="table table-bordered mb-0">
                                    <thead class="bg-primary">
                                        <tr class='text-center'>
                                            <th class="synopsis-header" colspan="5"><label>Award Synopsis</label>
                                                <input type='text' class="form-control" placeholder="" name="synopsis_label" id="synopsis_label" required value="<?php echo $mRecordAwdContract['synopsis_label'] ?>">
                                                <label class="mt-4">How many Contractors Recommended?</label>
                                                <select id="package_count" name="package_count" required="" onchange="addPackage(this)" style="width:25%;" class="form-control" >
                                                   
                                                    <option value="0" <?php echo ($mRecord['package_count']==1) ? "selected" : "" ?>>1</option>
                                                    <option value="1" <?php echo ($mRecord['package_count']==2) ? "selected" : "" ?>>2</option>
                                                    <option value="2" <?php echo ($mRecord['package_count']==3) ? "selected" : "" ?>>3</option>
                                                </select>
                                            </th>
                                        </tr>
                                    </thead>
									</table>
									<table id="dyntable" class="table table-bordered mb-0">	
                                    <thead class="bg-primary">
                                        <tr class='text-center'>
                                            <th>Description</th>
										 <?php 
										 
										 foreach($mRecordPackage as $key=>$val)
											{	
											?>
												<th style="width:180px;" scope="col">
													<label class="cust_th">Package name*</label>
													<input type='text' class="form-control" placeholder="" name="package_label[]" id="package_label<?php echo $key+1;?>" value="<?php echo $val['package_name'] ?>" required onblur="package_bidders(this);">
												</th>
											<?php 
											}?> 
											
                                           <th  style="width:20% ;">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bidderList">
                                        <tr class='text-center'>
                                            <td>Budget incl Escalation</td>
											<?php 
											
											 foreach($mRecordPackage as $key=>$val)
											 {
											 	$id_index = $key+1;
											 	
											 ?>
                                            <td>
                                                <input type='text'  oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this);packageSynopsis_total('package_budget_esc','total_budget_esc');setGpl_budget();calculateSum1();" class="form-control _budget_incl_td decimalStrictClass onMouseOutClass" name="package_budget_esc[]" id="package_budget_esc<?php echo $id_index;?>" value="<?php echo $val['package_budget_esc'] ?> Cr">
                                            </td> 
                                            <?php 
											}
											?>
                                            <td> <input type='text' class="form-control" name="total_budget_esc" id="total_budget_esc" value="<?php echo $mRecord['total_budget_esc'] ?> Cr" readonly></td> 
										
                                        </tr>
                                        <tr class='text-center'>
                                            <td>Negotiated Value (Excl. Tax) â€“ Pre Final Round</td>
											<?php foreach($mRecordPackage as $key=>$val)
											{	
												$id_index = $key+1;
											?>
                                            <td>
                                                <input type='text'  oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this);packageSynopsis_total('package_negot_value','total_negot_value');" class="form-control _negotiated_val_td decimalStrictClass onMouseOutClass" name="package_negot_value[]" id="package_negot_value<?php echo $id_index;?>" value="<?php echo $val['package_negot_value'] ?> Cr">
                                            </td>
                                            <?php 
											}?>
										
                                            <td>
												<input type='text' class="form-control" name="total_negot_value" id="total_negot_value" value="<?php echo $mRecord['total_negot_value'] ?> Cr" readonly>
											</td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>Finalized Proposed Award Value (Excl Tax)</td>
										 <?php foreach($mRecordPackage as $key=>$val)
											{
												$id_index = $key+1;
											
													$script_text = ' onblur="changeToCr(this);finalized_total();showBidders_finalized();calculateSum1();"';
																								
											?>
                                            <td>
                                                <input oninput="allowNumOnly(this);decimalStrict()"   type='text' class="form-control _finalized_td decimalStrictClass" name="finalized_award_value_package[]" id="finalized_award_value_package<?php echo $id_index;?>" value="<?php echo $val['finalized_award_value_package'] ?> Cr" <?php echo $script_text;?> >
                                            </td>
                                           <?php 
											}?> 
											
                                            <td> <input  type='text' class="form-control" name="total_finalized_award_value" id="total_finalized_award_value" value="<?php echo $mRecord['total_finalized_award_value'] ?> Cr" readonly></td> 
                                        </tr>
										                                      
                                        <tr class='text-center'>
                                            <td>Expected Savings w.r.t Budget incl.escalation:</td>
											<?php foreach($mRecordPackage as $key=>$val)
											{
												$id_index = $key+1;
											?>
                                            <td>
                                                <input type='text' class="form-control _exp_saving_td" name="expected_savings_package[]" id="expected_savings_package<?php echo $id_index;?>" value="<?php echo $val['expected_savings_package'] ?> %" readonly>
                                            </td>
                                            <?php 
											}?> 
											
                                            <td>
												<input type='text' class="form-control"  name="total_expected_savings" id="total_expected_savings" value="<?php echo $mRecord['total_expected_savings'] ?> %" readonly>
											</td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>Recommended Vendors</td>
											<?php foreach($mRecordPackage as $key=>$val)
											{
												$id_index = $key+1;
											?>
                                            <td>
                                                <input type='text' class="form-control _rec_vendors_td" name="recomm_vendor_package[]" id="recomm_vendor_package<?php echo $id_index;?>" value="<?php echo $val['recomm_vendor_package'] ?>" onblur="setRecommended_vendorName();">
                                            </td>
											<?php 
											}?> 
                                           
                                            <td></td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>Basis of award</td>
											<?php foreach($mRecordPackage as $key=>$val)
											{
												$id_index = $key+1;
											?>
                                            <td>
                                                <input type='text' class="form-control _basis_awrd_td" name="basis_award_package[]" id="basis_award_package<?php echo $id_index;?>" value="<?php echo $val['basis_award_package'] ?>" readonly>
                                            </td>
                                            <?php 
											}?>
											<td></td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>Deviation from Approved Contracting Strategy</td>
											<?php foreach($mRecordPackage as $key=>$val)
											{
												$id_index = $key+1;
											?>
											   <td>
													<input type='text' class="form-control _deviation_contr_td" name="deviation_approved_package[]" id="deviation_approved_package<?php echo $id_index;?>" value="<?php echo $val['deviation_approved_package'] ?>">
												</td>
											<?php 
											}?> 
                                           
                                            <td></td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>
                                                <label>Last Awarded Benchmark with Date</label>
                                                <div data-tip="Please enter project name and date of award">
                                                <input type='text' class="form-control" name="benchmark_label" id="benchmark_label" placeholder="Please enter project name and date of award" autocomplete="off" required value="<?php echo $mRecordAwdContract['benchmark_label'] ?>">
                                                </div>
                                            </td>
										 <?php foreach($mRecordPackage as $key=>$val)
											{	
												$id_index = $key+1;
											?>
                                            <td>
                                                <input type='text'  oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this);packageSynopsis_total('awarded_benchmark_package','total_awarded_benchmark')" class="form-control _last_awarded_td decimalStrictClass onMouseOutClass" name="awarded_benchmark_package[]" id="awarded_benchmark_package<?php echo $id_index;?>" value="<?php echo $val['awarded_benchmark_package'] ?> Cr" required>
                                            </td>
                                               <?php 
											}?> 
											
                                            <td>
												<input type='text' class="form-control" name="total_awarded_benchmark" id="total_awarded_benchmark" value="<?php echo $mRecord['total_awarded_benchmark'] ?> Cr" readonly>
											</td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>Is there any basic rate item in tender</td>
											 <?php 
											 
											 foreach($mRecordPackage as $key=>$val)
											 {	
												$id_index = $key+1;
												
											?>
												<td>
													<input class="form-check-input _is_basic_rate_td" type="radio" name="group_<?php echo $id_index;?>" id="packageYesRadios<?php echo $id_index;?>" value="yes" <?php echo ($val['is_basic_rate_package']=="yes")? "checked" : "" ?> >
													<label class="form-check-label font-weight-bold" for="packageYesRadios<?php echo $id_index;?>">
														Yes
													</label>
													<input class="form-check-input _is_basic_rate_td" type="radio" name="group_<?php echo $id_index;?>" id="packageNoRadios<?php echo $id_index;?>" value="no" <?php echo ($val['is_basic_rate_package']=="no")? "checked" : "" ?>>
													<label class="form-check-label font-weight-bold" style="margin-left: 25px;" for="packageNoRadios<?php echo $id_index;?>">
														No
													</label>
												
												</td>
											<?php 
											}?> 
										
                                          
                                            <td></td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>Total Amount of Basic Rate Items in Tender</td>
										 <?php foreach($mRecordPackage as $key=>$val)
											{	
												$id_index = $key+1;
											?>
												<td>
													<input id="basic_rate<?php echo $id_index;?>"   oninput="allowNumOnly(this);decimalStrictThree()" onblur="changeToCr(this);packageSynopsis_total('basic_rate','total_basic_rate');" name="total_basic_rate_package[]" <?php echo ($val['is_basic_rate_package']=="no")? "style='display:none ;'" : "" ?> type='text' class="form-control _amnt_basic_rate_td decimalStrictThreeClass onMouseOutClass" value="<?php echo $val['total_basic_rate_package'] ?> Cr" >
												</td>
											<?php 
											}?> 
                                         
                                            <td>
												<input type='text' class="form-control" name="total_basic_rate" id="total_basic_rate" value="<?php echo $mRecord['total_basic_rate'] ?> Cr" readonly>
											</td> 
                                        </tr>
                                        <tr class='text-center'>
                                            <td>Anticipated Basic Rate adjustment (If the current prices prevail throughout the Contract Period):</td>
										 <?php foreach($mRecordPackage as $key=>$val)
											{
												$id_index = $key+1;
											?>
												<td>
											  <input  oninput="decimalStrict()" onblur="changeToCr(this);calculateSum1('<?php echo $id_index;?>');packageSynopsis_total('anticipated_rate','total_anticipated_rate');" id="anticipated_rate<?php echo $id_index;?>" name="anticipate_basic_rate_package[]" <?php echo ($val['is_basic_rate_package']=="no")? "style='display:none ;'" : "" ?> type='text' class="form-control _anti_basic_rate_td decimalStrictClass onMouseOutClass" required value="<?php echo $val['anticipate_basic_rate_package'] ?> Cr">
												</td>
											<?php 
											}?> 
                                        	
                                            <td>
												<input type='text' class="form-control" name="total_anticipated_rate" id="total_anticipated_rate" value="<?php echo $mRecord['total_anticipated_rate'] ?> Cr" readonly>
											</td> 
                                        </tr>
                                        <tr class='text-center'>
                                            <td>Proposed Award Value (Excl Tax)- Adjusted Awarded Value(Post Basic Rate Adjustment): <span class=" font-weight-bold">SAP WO VALUE TO BE CREATED</span></td>
										 <?php foreach($mRecordPackage as $key=>$val)
											{
												$id_index = $key+1;
											?>
                                            <td>
                                                <input type='text' class="form-control _proposed_awrd_val_td" name="post_basic_rate_package[]" id="post_basic_rate_package<?php echo $id_index;?>" readonly value="<?php echo $val['post_basic_rate_package'] ?> Cr" >	
                                            </td>
                                            <?php 
											}?> 
											
                                            <td>
												<input type='text' class="form-control"  name="total_post_basic_rate" id="total_post_basic_rate" value="<?php echo $mRecord['total_post_basic_rate'] ?> Cr"  readonly>
											</td> 
                                        </tr>
                                        <tr class='text-center' >
                                            <td>Base Rate Consideration Month in Award</td> 
											<?php foreach($mRecordPackage as $key=>$val)
											{
												$id_index = $key+1;
											?>
                                            <td>
                                                <input type='date' class="form-control _base_rate_mnth_td" name="basic_rate_month_package[]" id="basic_rate_month_package<?php echo $id_index;?>" value="<?php echo $val['basic_rate_month_package'] ?>" max="<?php echo date("Y-m-d" , strtotime("-1 day") ) ?>" <?php echo ($val['is_basic_rate_package']=="no")? "style='display:none ;'" : "" ?>  >
                                            </td>
											<?php 
											}?> 
                                          
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
					

                            <div class="d-block mt-4">
                                <h5 class="page-title br-0 font-weight-bold">Final Bid Scenario</h5>
                            </div>

							<div class="mt-4">
                                <h5>How many Bidders participated?</h5>
                                <select id="bidder_count" name="bidder_count" required="" style="width:25%;" class="form-control" > 
									<?php for($bcount=0;$bcount<9;$bcount++)
									{
										$bidVal = $bcount+1;
										?>	
										<option value="<?php echo $bcount; ?>" <?php echo ($mRecord['bidder_count']==$bidVal) ? "selected" : "" ?>><?php echo $bidVal; ?></option> 
									<?php 
									}?>
                                  
                                </select>
                            </div>

                            <div class="table-responsive mt-4">

                                <table id='mainTable' class="table table-bordered mb-0">
                                    <thead class="bg-primary">
                                        <tr class='text-center' id="bidHead_row">
                                            <th>Description</th>
                                            <th scope="col" style="width:15% ;">GPL Budget (with escalation)</th>
                                          
											<?php foreach($mRecordFinalBidders as $key=>$val)
											{
												$id_index = $key+1;
												$final_bidder_name = $val->final_bidder_name;
												
												
											?>
												<th style="width: 120px !important;" scope="col"><input type='text' class="form-control custom_th" name="final_bidder_name[]" id="final_bidder_name<?php echo $id_index;?>" required value="<?php echo $final_bidder_name ?>"></th>
											  <?php 
											}
											  ?>
                                           
                                        </tr>
                                    </thead>
                                    <tbody id="bidderList"  style="width: 40% !important;">
                                        <tr class='text-center' id="pqFb_row">
                                            <td>PQ/ Feedback Score </td>
                                            <td> 
                                                <svg height="100px" style="padding:30% ;" viewBox="0 0 512 512">
                                                <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/>
                                                </svg>
                                            </td>
											<?php foreach($mRecordFinalBidders as $keyBid=>$valBid)
											{
												$id_index = $keyBid+1;
												$score_type = $valBid->score_type;
												$score = $valBid->score;
												$score_class="";
												if($score_type=="PQ")
												{
													$score_class = " background-pq";
													if($score<50)
													{
														
														$score_class ='background-red'; 
													}
													
												}
												else if($score_type=="FB")
												{
													$score_class = " background-feedback";
													if($score<60)
													{
														
														$score_class ='background-red'; 
													}
												}
												
												
											?>
                                            <td>
                                                <select id="score_type<?php echo $id_index;?>" name="score_type[]" required="" class="form-control pq_fb_score_custom_td"  style="width: 120px !important;" onChange="score_color();">
                                                    <option value="">Select</option>
                                                    <option value="PQ" <?php echo ($score_type=="PQ") ? "selected": ""?>>PQ</option>
                                                    <option value="FB" <?php echo ($score_type=="FB") ? "selected": ""?>>FB</option>
                                                </select>
                                                <input type='number'  style="width: 120px !important;" min="0" max="100" step="0.01" oninput="(validity.valid)||(value='');" class="form-control  mt-3 <?php echo $score_class;?>" name="score[]" id="score<?php echo $id_index;?>" value="<?php echo $score ?>" onblur="score_color();">
                                            </td>
											  <?php 
											}
											  ?>
                                      
                                        </tr>
										<?php foreach($mRecordPackage as $key=>$val)
										{
											$id_index = $key+1;
											$package_id = $val['package_id'];
											$salient_id = $val['salient_id'];
											
											$script_text = ' onblur="getGplBudget_total();"';
																					
											$CI=&get_instance();

											$finalBidData = $CI->getFinalBidData($salient_id,$package_id);
											$package_gpl_budget_value =  $finalBidData->package_gpl_budget;
											
										?>
											<tr class='text-center' id="package_row<?php echo $id_index;?>" >
												<td><?php echo $val['package_name'] ?><input type="hidden" name="package_name_bid_hd" id="package_name_bid_hd<?php echo $id_index;?>" value="<?php echo $val['package_name'] ?>"></td>
												
												<td><input type="text" oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control decimalStrictClass onMouseOutClass" name="package_gpl_budget[]"  id="package_gpl_budget<?php echo $id_index;?>" value="<?php echo $package_gpl_budget_value ?> Cr" <?php echo $script_text; ?> readonly></td>
												<?php 
												//Bidders Record
												$bidders_count = sizeof($mRecordFinalBidders);
												
												foreach($mRecordFinalBidders as $keyBid=>$valBid)
												{
													
													$bid_index = $keyBid+1;
													$bidder_id = $valBid->id;
													
												
													$finalBiddersData = $CI->getFinalBidData($salient_id,$package_id,$bidder_id);
													
													$package_bidder_value =  $finalBiddersData->package_bidder;
													
													$bidder_class = '';
																									
													$script_text = ' onblur="getBidders_total();changeToCr(this);calculateSum1();"';
													
													
												?>
													<td><input type='text' oninput="allowNumOnly(this);decimalStrict()"  class="form-control package_common_tower_label_custom_td decimalStrictClass" name="package_bidder[<?php echo $id_index;?>][<?php echo $bid_index;?>]" id="package_bidder_<?php echo $id_index;?>_<?php echo $bid_index;?>" value="<?php echo $package_bidder_value; ?> Cr" <?php echo $script_text; ?>></td>
												<?php 
												}?>
											</tr>
											
									<?php }
										  if($package_count==2)
										  {
											  ?>
											   <tr id="package_row3" class='text-center'></tr>
									<?php
										  }
										  else if($package_count==1)
										  {
											  ?>
											   <tr id="package_row2" class='text-center'></tr>
											   <tr id="package_row3" class='text-center'></tr>
											  <?php
										  }
									$total_amt_gpl = $mRecordFinalBidders[0]->total_amt_gpl;
									?>
										
                                        <tr class='text-center' id="totAmt_row">
                                            <td class="page-title font-weight-bold">Total Amount</td>
											 <td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control decimalStrictClass onMouseOutClass" name="total_amt_gpl" id="total_amt_gpl" value="<?php echo $total_amt_gpl; ?> Cr" readonly></td>
											<?php 
											
											foreach($mRecordFinalBidders as $keyBid=>$valBid)
											{
												$id_index = $keyBid+1;
												$total_amt_bidder = $valBid->total_amt_bidder;
												
											?>
												<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control total_amt_label_custom_td decimalStrictClass onMouseOutClass" name="total_amt_bidder[]" id="total_amt_bidder<?php echo $id_index;?>" value="<?php //echo number_format($total_amt_bidder,2); ?> Cr1" readonly></td>
											<?php 
											}
											?>
                                         
                                
                                        </tr>
                                        <tr class='text-center' id="bidPos_row">
                                            <td colspan="2">Bid position</td>
                                          
                                          
										
												<?php foreach($mRecordFinalBidders as $keyBid=>$valBid)
												{
													$id_index = $keyBid+1;
													$bid_position = $valBid->bid_position;
																								
													
												?>
													
													<td><input type='text' class="form-control bid_position_label_custom_td" name="bid_position[]" id="bid_position<?php echo $id_index;?>" value="<?php echo $bid_position; ?>" readonly  ></td>
												<?php 
												}
												?>
                                        </tr>
                                        <tr class='text-center' id="diffCrs_row">
                                            <td colspan="2">Difference wrt Budget (in crs)</td>
                                           
                                         
											<?php foreach($mRecordFinalBidders as  $keyBid=>$valBid)
											{
												$id_index = $keyBid+1;
												$diff_budget_crs = $valBid->diff_budget_crs;
												
												if($diff_budget_crs>0)
												{
													
													$budget_class = 'background-green';
												}
												else
												{
													$budget_class = 'background-red';
												
												}
												
												
											?>  <td>
												<input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="decimalStrictClass form-control <?php echo $budget_class?> bid_position_gp_custom_td onMouseOutClass" name="diff_budget_crs[]" id="diff_budget_crs<?php echo $id_index;?>" value="<?php echo $diff_budget_crs; ?> Cr"></td>
											<?php 
											}?>
                                           
                                        </tr>
                                        <tr class='text-center' id="diffPercent_row">
                                            <td colspan="2">Difference wrt Budget (in %age)</td>
                                           <?php foreach($mRecordFinalBidders as  $keyBid=>$valBid)
											{
												$id_index = $keyBid+1;
												$diff_budget_percentage = $valBid->diff_budget_percentage;
												if($diff_budget_percentage>0)
												{
													
													$budget_class = 'background-green';
												}
												else
												{
													$budget_class = 'background-red';
												
												}
											?> 
												<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="decimalStrictClass form-control <?php echo $budget_class?> diff_age_gp_custom_td onMouseOutClass" name="diff_budget_percentage[]" id="diff_budget_percentage<?php echo $id_index;?>" value="<?php echo $diff_budget_percentage ?> Cr"></td>
                                           <?php 
											}?>
                                           
                                           
                                        </tr>
                                    </tbody>
                                </table>

                            </div>                           
                       						
                            <div class="d-block mt-4">
							
                                <h5 id="date1" class="page-title br-0 font-weight-bold">Contractor Appointment Dates</h5>
								
							</div>

                            <div id="appointment-date" class="table-responsive" >
							
                                <table class="table table-bordered mb-0 ">
                                    <thead class="bg-primary">
                                        <tr class='text-center'>
                                            <th>Sr No.</th>
                                           <th style="width:60%" colspan="2">
                                                <label>Description</label>
                                                <!-- <input type='text' class="form-control" name="contract_package_works_label" id="contract_package_works_label"  value="<?php echo $mRecordAppointment['contract_package_works_label'] ?>" > -->
                                            </th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bidderList">
                                        <tr class='text-center'>
                                            <td></td>
                                           <td>
                                                <label>Milestone on which contractor should be appointed</label>
                                                <div data-tip="Please mention the milestone as per applicable PI">
                                                <input type='text' class="form-control" name="milestone_label" id="milestone_label" autocomplete="off"  value="<?php echo $mRecordAppointment['milestone_label'] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                              
											     <select id="contract_package_works_value" name="contract_package_works_value"   class="form-control"  >
                                                    <option value="">Select</option>
													<?php 
													for($i=1;$i<=5;$i++)
													{
														$option_val = "pi".$i;
														$works_sel = ($option_val==$mRecordAppointment['contract_package_works_value']) ? "selected" : "";
													 ?>
														<option value="pi<?php echo $i;?>" <?php echo $works_sel; ?>>PI<?php echo $i;?></option>
													<?php 
													}
													?>
                                                  
                                                    <option value="not applicable" <?php echo ($mRecordAppointment['contract_package_works_value']=="not applicable") ? "selected" : "" ?>>Not applicable</option>
                                                </select>
                                            </td>
                                            <td>
                                                <textarea class="form-control" rows="2" name="contract_package_works_remarks" id="contract_package_works_remarks"><?php echo $mRecordAppointment['contract_package_works_remarks'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td></td>
                                            <td class="page-title font-weight-bold">Activity</td>
                                            <td class="page-title font-weight-bold">Dates</td>
                                            <td></td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>A</td>
                                            <td>Planned date of Contractor appointment As per PI Logic</td>
                                            <td>
                                                <input type='date' class="form-control" style="width: 100% " name="activity_planned_date" id="activity_planned_date"  value="<?php echo $mRecordAppointment['activity_planned_date'] ?>" >
                                            </td>
                                            <td>
                                                <textarea class="form-control" rows="2" name="activity_planned_remarks" id="activity_planned_remarks"><?php echo $mRecordAppointment['activity_planned_remarks'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>B</td>
                                            <td>Actual date as per current site progress</td>
                                            <td>
                                                <input type='date' class="form-control" style="width: 100%;" name="activity_actual_date" id="activity_actual_date" value="<?php echo $mRecordAppointment['activity_actual_date'] ?>" >
                                            </td>
                                            <td>
                                                <textarea class="form-control" rows="2" name="activity_actual_remarks" id="activity_actual_remarks"><?php echo $mRecordAppointment['activity_actual_remarks'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>C</td>
                                            <td>CBE of contractor Appointment</td>
                                            <td>
                                                <input type='date' class="form-control" style="width: 100%;" name="activity_cbe_date" id="activity_cbe_date" onblur="calculateDays();" onchange="validate_receipt_date();"  value="<?php echo $mRecordAppointment['activity_cbe_date'] ?>" >
                                            </td>
                                            <td>
                                                <textarea class="form-control" rows="2" name="activity_cbe_remarks" id="activity_cbe_remarks"><?php echo $mRecordAppointment['activity_cbe_remarks'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>D</td>
                                            <td>Delay in Appointment(C-A)</td>
                                            <td>
                                                <input type='text' class="form-control" name="activity_delay" id="activity_delay" readonly value="<?php echo $mRecordAppointment['activity_delay'] ?> Days">
                                            </td>
                                            <td>
                                                <textarea class="form-control" rows="2" name="activity_delay_remarks" id="activity_delay_remarks"><?php echo $mRecordAppointment['activity_delay_remarks'] ?></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
									<?php 
							//}?>
                            </div>
							
							<div class="row mt-4">

                                <div class="col-lg-12">
                                    <label class="page-title br-0 font-weight-bold mr-4">Front Idling
                                    </label>
                                    <input class="form-check-input" type="radio" name="front_idling" id="front_idling1" value="yes" onclick="idlingCheck()" <?php echo ($mRecord['front_idling']=="yes")? "checked" : "" ?>>
                                    <label class="form-check-label font-weight-bold" for="front_idling1">
                                        Yes
                                    </label>
                                    <input class="form-check-input" type="radio" name="front_idling" id="front_idling2" value="no" onclick="idlingUnCheck()" <?php echo ($mRecord['front_idling']=="no")? "checked" : "" ?>>
                                    <label class="form-check-label font-weight-bold" style="margin-left: 25px;" for="front_idling2">
                                        No
                                    </label>
                                </div>
                               
                            </div>
						
								
							<div id="delayReason" class="mt-4">
									<h5 class="page-title br-0 font-weight-bold">Reasons for Delay</h5>
									<div id="reasons_delay" class="form-control" name="reasons_delay"><?php echo $mRecord['reasons_delay'] ?>
									</div>
							   </div>
						
                            <div class="d-block mt-4">
                                <h5 class="page-title br-0 font-weight-bold">Award Efficiency</h5>
                            </div>

                            <div class="table-responsive mt-4">

                                <table class="table table-bordered mb-0">
                                    <thead class="bg-primary">
                                        <tr class='text-center'>
                                            <th style="width:15%">Actitivity</th>
                                            <th style="width:20%">Receipt of Tender Document</th>
                                            <th style="width:20%">Start date of Bidder List approval</th>
                                            <th style="width:20%">Finish date Approval of Award Recommendation</th>
                                            <th style="width:25%">Remarks (If any)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bidderList">
                                        <tr class='text-center'>
                                            <td>Date</td>
                                            <td>
                                                <input type='date' class="form-control" name="receipt_date" id="receipt_date" value="<?php echo $mRecordAwdContract['receipt_date'] ?>" onchange="validate_receipt_date();"><span id="date_cmp_err"></span>
                                            </td>
                                            <td>
                                                <input type='date' class="form-control" name="bidder_approval_date" id="bidder_approval_date" value="<?php echo $mRecordAwdContract['bidder_approval_date'] ?>" >
                                            </td>
                                            <td>
                                                <input type='date' class="form-control" name="award_recomm_date" id="award_recomm_date" value="<?php echo $mRecordAwdContract['award_recomm_date'] ?>" min="<?php echo date("Y-m-d" , strtotime("+1 day") ) ?>">
                                            </td>
                                            <td>
                                                <textarea class="form-control" rows="2" name="remarks_date" id="remarks_date"><?php echo $mRecordAwdContract['remarks_date'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>No of Days</td>
                                            <td>
                                                <input type='text' oninput="allowNumOnly(this);decimalStrict()" class="form-control decimalStrictClass" name="receipt_days" id="receipt_days" value="NA" readonly>
                                            </td>
                                            <td>
                                                <input type='text' oninput="allowNumOnly(this);decimalStrict()" class="form-control decimalStrictClass" name="bidder_approval_days" id="bidder_approval_days" value="<?php echo $mRecordAwdContract['bidder_approval_days'] ?>" readonly>
                                            </td>
                                            <td>
                                                <input type='text' oninput="allowNumOnly(this);decimalStrict()" class="form-control decimalStrictClass" name="award_recomm_days" id="award_recomm_days" value="<?php echo $mRecordAwdContract['award_recomm_days'] ?>" readonly>
                                            </td>
                                            <td>
                                                <textarea class="form-control" rows="2" name="remarks_days" id="remarks_days"><?php echo $mRecordAwdContract['remarks_days'] ?></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>


                          <div class="d-block mt-4">
                                <h5 class="page-title br-0 font-weight-bold">Current Status of Work at Site</h5>
                                <div id="current_status_work" class="form-control" name="current_status_work"><?php echo $mRecord['current_status_work'] ?>
                            </div>
							
							 <div class="d-block mt-4">
                                <h5 class="page-title br-0 font-weight-bold">Major Terms and Conditions</h5>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table table-bordered mb-0" id="t1">
                                    <thead class="bg-primary">
                                        <tr class='text-center'>
                                            <th style="width:10%">Sl. No.</th>
                                            <th style="width:25%">Terms</th>
                                            <th style="width:45%">
											
											<label for="term_label">Description</label>
											<div style="display:flex ;">
											<div style="width: 100%;" class="mr-2"><label id="pckLabel1"><?php //echo $mRecordPackage[0]['package_name'] ?></label><input type='text' class="form-control"  placeholder="" id="term_label<?php echo $key+1;?>" value="<?php echo $mRecordPackage[0]['major_term_label'] ?>" name="term_label[]" required readonly ></div>
											<div style="width: 100%;" class="sec2 mr-2"><label id="pckLabel2"><?php //echo $mRecordPackage[1]['package_name'] ?></label><input type='text' class="form-control sec2 mr-2" placeholder="" name="term_label[]" id="term_label2" value="<?php echo $mRecordPackage[1]['major_term_label'] ?>" readonly></div>
											<div style="width: 100%;" class="sec3 mr-2"><label id="pckLabel3"><?php //echo $mRecordPackage[2]['package_name'] ?></label><input type='text' class="form-control sec3 mr-2" placeholder="" name="term_label[]" id="term_label3" value="<?php echo $mRecordPackage[2]['major_term_label'] ?>" readonly></div> 
											</div></th>
                                            <th style="width:20%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">
										<?php
										
										foreach($mRecordMajorTerms as $key=>$val)
										{
											$slNo  = $key+1;
											$term = $val->term;
											$required_attr = ($slNo==1) ? "required" : '' ;
										?>
											<tr class="text-center"><td><?php echo $slNo ?></td>
											<td><input type="text" class="form-control" name="term[]"  value="<?php echo $term; ?>" <?php echo $required_attr; ?>></td>
											<td>
												<div style="display:flex ;">
												<?php
												$term_label_value_arr = array();
												
												foreach($mRecordPackage as $key=>$val)
												{
													$package_id = $val['package_id'];
													$salient_id = $val['salient_id'];	
													$majorTerms_desc = $CI->awardRecommContract->getMajorTerms($salient_id,$package_id,$term);
													
													$term_label_value_arr[$key] = $majorTerms_desc->term_label_value;
												}
												
												?>
												<textarea name="term_label_value[<?php echo $slNo?>][]"  class="form-control mr-2" rows="2"  id="term_label_value1" required><?php echo $term_label_value_arr[0]; ?></textarea><textarea name="term_label_value[<?php echo $slNo?>][]"  class="form-control sec2 mr-2" rows="2"  id="term_label_value2" ><?php echo $term_label_value_arr[1]; ?></textarea><textarea name="term_label_value[<?php echo $slNo?>][]"  class="form-control sec3 mr-2" rows="2"  id="term_label_value3" ><?php echo $term_label_value_arr[2]; ?></textarea>
												<?php /*<textarea rows="2" class="form-control mr-2" name="term_label_value[]" id="term_label_value<?php echo $slNo;?>"><?php echo $term_label_value; ?></textarea> <?php */?>
											</td>
										
											<?php 
												
											if($slNo>=2)
											{										
											?>
													<td><input type="button" value="Delete" class="btn ibtnDelDcw2 btn-sm btn-danger rounded" onclick="deleteRow(this)">
													</td>
											<?php 
											}
											else
											echo "<td></td>";
											?>
											
										
											</tr>
										<?php
										
										}?>
                                     
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
                                       
                               <textarea class="form-control" rows="3" name="detailed_note" id="detailed_note"><?php echo $mRecord['detailed_note'] ?></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Upload Comparitive</label>
                                       <input type="file" class="form-control" placeholder="" name="upload_comparitive"  value="<?php echo $mRecord['upload_comparitive_path'] ?>">
									   <input type="hidden" class="form-control" placeholder="" name="file1_upload_hd" value="<?php echo $mRecord['upload_comparitive_name'] ?>">
											<?php if($mRecord['upload_comparitive_name']!='')
											{
											?>
												<a href="<?php echo $upload_path.$mRecord['upload_comparitive_name'] ?>" target="_blank">View</a>
											<?php 
											}
											else
												echo "&nbsp;";
											?>
                                        <input type="text" class="form-control mt-2" placeholder="Please enter file name" name="upload_comparitive_disp_name"  value="<?php echo $mRecord['upload_comparitive_disp_name'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Upload Detailed IOM</label>
                                      <input type="file" class="form-control" placeholder="" name="upload_detailed" value="<?php echo $mRecord['upload_detailed_path'] ?>">
									  <?php if($mRecord['upload_detailed_name']!='')
											{
											?>
												<a href="<?php echo $upload_path.$mRecord['upload_detailed_name'] ?>" target="_blank">View</a>
											<?php 
											}
											else
												echo "&nbsp;";
									 ?>
                                        <input type="text" class="form-control mt-2" placeholder="Please enter file name" name="upload_detailed_disp_name" value="<?php echo $mRecord['upload_detailed_disp_name'] ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="d-block mt-4 mb-4">
                                <h5 class="page-title br-0 font-weight-bold">Select different levels of approvals</h5>
                            </div>

							<div class="row mt-4">
                                <div class="col-md-3 mb-3">
                                    <lable>PCM</lable>
                                    <input readonly="" value="<?php echo $this->session->userdata('session_name'); ?>" class="form-control" />
                                </div>
                            </div>	
							
                            <div class="row" id="approvers_list_div">
							
							<?php 
							 $CI =& get_instance();
							
							 $level_max = sizeof($mRecordApprovers);
							
							 $getLevels = $CI->nfaAction->getAllLevelRole_approvers('',$salient_id,"award_contract");
							
							 $result_maxLevel = '';
							 $mSessionZone = $this->session->userdata('session_zone');
							
							 foreach ($getLevels as $key => $valLevel) {
								$role = $valLevel->role;
								$approver_id = $valLevel->approver_id;
								
								if($role=="HO - C&P" || $role=="COO" || $role=="Managing Director") 
									$getUsers = $CI->getRoleUsers_approval($role);
								else
								 	$getUsers = $CI->getRoleUsers_approval($role,$mSessionZone);
								 	
								
                            ?>


								<div id="pm" class="col-md-3 mb-3">
									<lable><?php echo $role;?></lable>
									<select name="approver_id[]"   class="form-control" required >
										<option disabled="" selected="" value="">Select</option>
										<option value="0" <?php echo ($approver_id==0) ? "selected": "";?>>Not Applicable</option>
										<?php 
										foreach ($getUsers as $keyUser => $valUser) {
											$buyer_id = $valUser->buyer_id;
											?>
										<option value='<?php echo $valUser->buyer_id; ?>' <?php echo ($approver_id==$buyer_id) ? "selected": "";?>><?php echo  $valUser->buyer_name ?></option>
										<?php }?>           
									</select>
								</div>
							<?php 
								
							}?>
                          
							
                            </div>			
							
 
                            <div class="row text-right mt-20">
							<input type="hidden" name="project_id" id="project_id" value="<?php echo $mRecord['project_id'] ?>">
                            <input type="hidden" name="type_work_id" id="type_work_id" value="<?php echo $mRecord['type_work_id']; ?>">
							<input type="hidden" name="zone" id="zone" value="<?php echo $mRecord['zone']; ?>">
							<input type="hidden" name="subject_hd" id="subject_hd">
							<input type="hidden" name="reasons_delay_hd" id="reasons_delay_hd">
							<input type="hidden" name="current_status_work_hd" id="current_status_work_hd">
							<input type="hidden" class="form-control" placeholder="" name="nfa_status"  value="<?php echo $mRecord['nfa_status'] ?>">
							<input type="hidden" class="form-control" placeholder="" name="updType"  value="<?php echo $updType; ?>">
							<input type="hidden" class="form-control" placeholder="" name="enfaNo"  value="<?php echo $mRecord['version_id']; ?>">
							<input type="hidden" class="form-control" placeholder="" name="l1_vendor"  value="<?php echo $mRecord['l1_vendor']; ?>">
							<input type="hidden" id="base" value="<?php echo base_url(); ?>">
							<input type="hidden" id="salient_id" value="<?php echo $salient_id; ?>">
							   <div class="col-lg-12">
                                      <button type="submit" name="save" value="save" id="save" class="btn btn-primary border-secondary rounded mr-10">Save</button>
                                    <button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary border-secondary rounded">Submit</button>
                                </div>
                            </div>
						</form>
                        </div>
                    </div>
            </div>

            </section>

            <!-- /.content -->

        </div>
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
	if ( $( "#reasons_delay").length ) {	
		var quil2 = new Quill('#reasons_delay', {
		theme: 'snow'
		});
	}
	var quil3 = new Quill('#current_status_work', {
	theme: 'snow'
	});


	$( document ).ready(function() {
	let total_finalized_val = parseFloat(document.getElementById("total_finalized_award_value").value);
	
	if (total_finalized_val > 3) {
		
		document.getElementById("appointment-date").classList.remove("date-hide");
		document.getElementById("date1").classList.remove("date-hide");
	} else 
	{
	document.getElementById("appointment-date").classList.add("date-hide");
	document.getElementById("date1").classList.add("date-hide");
	}

	// For front Idling
	var checkBox = document.getElementById("front_idling1");
	if (checkBox.checked == true){
		document.getElementById("delayReason").classList.remove("idling-hide");
	}

	var checkBox = document.getElementById("front_idling2");
	if (checkBox.checked == true){
		document.getElementById("delayReason").classList.add("idling-hide");
	} 
	
	showBidders_finalized();
	getBidders_total();
	
	var pCount_obj = document.getElementById("package_count");
	addPackage(pCount_obj);
	var is_basic = $('#packageYesRadios1').val();
	/*if(is_basic=='no')
		$('#baseRate_row').hide();  
	else
		$('#baseRate_row').show();  */
	});

	let contrSel ;

	/* frozen value of fb/pq */

	function handleChange(input) {
	if (input.value < 0) input.value = 0;
	if (input.value > 100) input.value = 100;
	}

	function allowNumOnly(sender){
		sender.value = sender.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
	}

	// changing input value to cr // 

	function changeToCr(sender){

	let val = sender.value;

	val1 = String(val);
	if (val1){
		if(val1.includes("Cr")){
			sender.value = val;
		}else if(!val1.includes("Cr")){
			sender.value = sender.value + " Cr";
		}
	}
	}

	//end changing input value to cr // 

	/* idling toggle */

	function idlingCheck(){
		var checkBox = document.getElementById("front_idling1");
		if (checkBox.checked == true){
			document.getElementById("delayReason").classList.remove("idling-hide");
		} 
	}

	function idlingUnCheck(){
		var checkBox = document.getElementById("front_idling2");
		if (checkBox.checked == true){
			document.getElementById("delayReason").classList.add("idling-hide");
		} 
	}

	/*end idling toggle */
			
	
	
	//Function for date comparison	
	function validate_receipt_date(){
		let receipt_date = $("#receipt_date").val();
		let activity_cbe_date = $("#activity_cbe_date").val();
		var total_finalized_val = parseFloat(document.getElementById("total_finalized_award_value").value);
		
		if (total_finalized_val > 3) {
			if(receipt_date!='' && activity_cbe_date!='')
				return validate_greater_date(receipt_date, activity_cbe_date);
		}
	}

		// adding award synopsis dynamic column

	$('#package_count').on('change', function (e) {
			
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

		let _th=`<th style="width:180px;"><label class='cust_th'>Package name*</label><input type='text' class="form-control" placeholder="" name="package_label[]" id="package_label"  required onblur="package_bidders(this);"></th>`;

		let _budget_incl=`<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this);packageSynopsis_total('package_budget_esc','total_budget_esc');setGpl_budget();calculateSum1();" class="form-control _budget_incl_td decimalStrictClass onMouseOutClass" name="package_budget_esc[]" id="package_budget_esc"></td>`;

		let _negotiated_val=`<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this);packageSynopsis_total('package_negot_value','total_negot_value');" class="form-control _negotiated_val_td decimalStrictClass onMouseOutClass" name="package_negot_value" id="package_negot_value"></td>`;

		let _finalized=`<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" class="form-control _finalized_td decimalStrictClass" name="finalized_award_value_package[]" id="finalized_award_value_package" onblur="finalized_val(this);finalized_total();showBidders_finalized();calculateSum1();" required></td>`;

		let _exp_saving=`<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control _exp_saving_td decimalStrictClass onMouseOutClass" name="expected_savings_package[]" id="expected_savings_package" readonly></td>`;

		let _rec_vendors=`<td><input type='text' class="form-control _rec_vendors_td" name="recomm_vendor_package[]" id="recomm_vendor_package" onblur="setRecommended_vendorName();"></td>`;

		let _basis_awrd=`<td><input type='text' class="form-control _basis_awrd_td" name="basis_award_package[]" id="basis_award_package" readonly></td>`;

		let _deviation_contr=`<td><input type='text' class="form-control _deviation_contr_td" name="deviation_approved_package[]" id="deviation_approved_package"></td>`;

		let _last_awarded=`<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control _last_awarded_td decimalStrictClass onMouseOutClass" name="awarded_benchmark_package[]" id="awarded_benchmark_package" required></td>`;
		
		let _is_basic_rate=`<td><input class="form-check-input _is_basic_rate_td" type="radio" id="group_" name="group" value="yes"><label class="form-check-label font-weight-bold" for="one_">Yes</label><input class="form-check-input" type="radio" id="group_" name="group"
            value="no" checked><label class="form-check-label font-weight-bold" style="margin-left: 25px;" for="two_">No</label></td>`;

		 let _amnt_basic_rate=`<td><input type='text' class="form-control _amnt_basic_rate_td decimalStrictThreeClass onMouseOutClass" name="total_basic_rate[]" id="basic_rate" oninput="allowNumOnly(this);decimalStrictThree()"  onblur="changeToCr(this);packageSynopsis_total('basic_rate','total_basic_rate');"  value="" style="display:none ;" ></td>`;

		let _anti_basic_rate=`<td><input id="anticipated_rate" name="anticipate_basic_rate_package[]" style="display:none ;"  type='text' oninput="decimalStrict(this)" onblur="changeToCr(this);packageSynopsis_total('anticipated_rate','total_anticipated_rate');calculateSum1(this.id);" class="form-control _anti_basic_rate_td decimalStrictClass onMouseOutClass" required></td>`;

		let _proposed_awrd_val=`<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control _proposed_awrd_val_td decimalStrictClass onMouseOutClass" name="post_basic_rate_package[]" id="post_basic_rate_package" readonly></td>`;

		let _base_rate_mnth=` <td><input type='date' class="form-control _base_rate_mnth_td" name="basic_rate_month_package[]" id="basic_rate_month_package" max="<?php echo date("Y-m-d" , strtotime("-1 day") ) ?>" style="display:none ;" ></td>`;
		
		
		var pckCount_edit = $('input[name="package_label[]"]').length;
		var ele_pckIndex=0;
		
		if(pckCount_edit <= e.target.value){
		
		for (let i = pckCount_edit; i <= e.target.value; i++) {
		

		let th=$(_th);
		th.find("input").attr("name",th.find("input").attr("name"))
		th.find("input").attr("id",th.find("input").attr("id")+String(i+1))

		
		let budget_incl=$(_budget_incl);
		budget_incl.find("input").attr("name",budget_incl.find("input").attr("name"))
		budget_incl.find("input").attr("id",budget_incl.find("input").attr("id")+String(i+1))
		

		let negotiated_val=$(_negotiated_val);
		negotiated_val.find("input").attr("name",negotiated_val.find("input").attr("name"))
		negotiated_val.find("input").attr("id",negotiated_val.find("input").attr("id")+String(i+1))
		

		let finalized_val=$(_finalized);
		finalized_val.find("input").attr("name",finalized_val.find("input").attr("name"))
		finalized_val.find("input").attr("id",finalized_val.find("input").attr("id")+String(i+1))

		let exp_saving=$(_exp_saving);
		exp_saving.find("input").attr("name",exp_saving.find("input").attr("name"))
		exp_saving.find("input").attr("id",exp_saving.find("input").attr("id")+String(i+1))

		let rec_vendors=$(_rec_vendors);
		rec_vendors.find("input").attr("name",rec_vendors.find("input").attr("name"))
		rec_vendors.find("input").attr("id",rec_vendors.find("input").attr("id")+String(i+1))

		let basis_awrd=$(_basis_awrd);
		basis_awrd.find("input").attr("name",basis_awrd.find("input").attr("name"))
		basis_awrd.find("input").attr("id",basis_awrd.find("input").attr("id")+String(i+1))

		let deviation_contr=$(_deviation_contr);
		deviation_contr.find("input").attr("name",deviation_contr.find("input").attr("name"))
		deviation_contr.find("input").attr("id",deviation_contr.find("input").attr("id")+String(i+1))
		let last_awarded=$(_last_awarded);
		last_awarded.find("input").attr("name",last_awarded.find("input").attr("name"))
		last_awarded.find("input").attr("id",last_awarded.find("input").attr("id")+String(i+1))
		
		let is_basic_rate=$(_is_basic_rate);
		let groupName=is_basic_rate.find("input").attr("name")+"_"+String(i+1)
		$(is_basic_rate.find("input")[0]).attr("id",groupName+"_1")
		$(is_basic_rate.find("input")[1]).attr("id",groupName+"_2")
		$(is_basic_rate.find("input")[2]).attr("id",groupName+"_3")
		
		$(is_basic_rate.find("label")[0]).attr("for",groupName+"_1")
		$(is_basic_rate.find("label")[1]).attr("for",groupName+"_2")
		$(is_basic_rate.find("label")[2]).attr("for",groupName+"_3")
		is_basic_rate.find("input").attr("name",groupName)

		let amnt_basic_rate=$(_amnt_basic_rate);
		amnt_basic_rate.find("input").attr("name",amnt_basic_rate.find("input").attr("name"))
		amnt_basic_rate.find("input").attr("id",amnt_basic_rate.find("input").attr("id")+String(i+1))

		let anti_basic_rate=$(_anti_basic_rate);
		anti_basic_rate.find("input").attr("name",anti_basic_rate.find("input").attr("name"))
		anti_basic_rate.find("input").attr("id",anti_basic_rate.find("input").attr("id")+String(i+1))

		let proposed_award_val=$(_proposed_awrd_val);
		proposed_award_val.find("input").attr("name",proposed_award_val.find("input").attr("name"))
		proposed_award_val.find("input").attr("id",proposed_award_val.find("input").attr("id")+String(i+1))

		let base_rate_mnth=$(_base_rate_mnth);
		base_rate_mnth.find("input").attr("name",base_rate_mnth.find("input").attr("name"))
		base_rate_mnth.find("input").attr("id",base_rate_mnth.find("input").attr("id")+String(i+1))

		let elementlength = $("#dyntable").find("thead").find("tr").find(`th`).length

		$($("#dyntable").find("thead").find("tr").find("th")[elementlength-1]).before(th)
			
		$($($("#dyntable").find("tbody").find("tr")[0]).find("td")[elementlength-1]).before(budget_incl)
		$($($("#dyntable").find("tbody").find("tr")[1]).find("td")[elementlength-1]).before(negotiated_val)
		

		$($($("#dyntable").find("tbody").find("tr")[2]).find("td")[elementlength-1]).before(finalized_val)

		$($($("#dyntable").find("tbody").find("tr")[3]).find("td")[elementlength-1]).before($(exp_saving))

		$($($("#dyntable").find("tbody").find("tr")[4]).find("td")[elementlength-1]).before(rec_vendors)

		$($($("#dyntable").find("tbody").find("tr")[5]).find("td")[elementlength-1]).before(basis_awrd)

		$( $($("#dyntable").find("tbody").find("tr")[6]).find("td")[elementlength-1]).before(deviation_contr)

		$($($("#dyntable").find("tbody").find("tr")[7]).find("td")[elementlength-1]).before(last_awarded)

		$($($("#dyntable").find("tbody").find("tr")[8]).find("td")[elementlength-1]).before(is_basic_rate)

		$( $($("#dyntable").find("tbody").find("tr")[9]).find("td")[elementlength-1]).before(amnt_basic_rate)
		$($($("#dyntable").find("tbody").find("tr")[10]).find("td")[elementlength-1]).before(anti_basic_rate)

		$($($("#dyntable").find("tbody").find("tr")[11]).find("td")[elementlength-1]).before(proposed_award_val)

		$($($("#dyntable").find("tbody").find("tr")[12]).find("td")[elementlength-1]).before(base_rate_mnth)

		
		}
		}else{
			var sel_package_count = $('#package_count').find(":selected").text();
			
						
			for (let i = sel_package_count; i < pckCount_edit; i++) {
				ele_pckIndex=parseInt(i)+1;
				
				$(".cust_th").parent().last().remove()
				$("._budget_incl_td").parent().last().remove()
				$("._negotiated_val_td").parent().last().remove()
				$("._finalized_td").parent().last().remove()
				$("._last_awarded_td").parent().last().remove()
				$("._is_basic_rate_td").parent().last().remove()
				$("._amnt_basic_rate_td").parent().last().remove()
				$("._anti_basic_rate_td").parent().last().remove()
				$("._proposed_awrd_val_td").parent().last().remove()
				$("._exp_saving_td").parent().last().remove()
				$("._rec_vendors_td").parent().last().remove()
				$("._basis_awrd_td").parent().last().remove()
				$("._deviation_contr_td").parent().last().remove()
				$("._base_rate_mnth_td").parent().last().remove()
				$('#package_row'+ele_pckIndex).remove();
			}

		}
		
		
		//for Radio buttons
		
		
		let basic2 = document.getElementById("basic_rate2");
		let anticipated2 = document.getElementById("anticipated_rate2");
		let basic_rate_month_package2 = document.getElementById("basic_rate_month_package2");
		let basic3 = document.getElementById("basic_rate3");
		let anticipated3 = document.getElementById("anticipated_rate3");
		let basic_rate_month_package3 = document.getElementById("basic_rate_month_package3");
		$('#group_1_1').click(function () {  
	
		   basic2.style.display = "block";
		   anticipated2.style.display = "block";
		   basic_rate_month_package2.style.display = "block";
		   packageSynopsis_total('basic_rate','total_basic_rate');
		   packageSynopsis_total('anticipated_rate','total_anticipated_rate');
		 });  

		$('#group_1_2').click(function () {  
			
			basic2.style.display = "none";
			anticipated2.style.display = "none";
			basic_rate_month_package2.style.display = "none";
			packageSynopsis_total('basic_rate','total_basic_rate');
			packageSynopsis_total('anticipated_rate','total_anticipated_rate');
		 });
		$('#group_2_1').click(function() {

			basic2.style.display = "block";
			anticipated2.style.display = "block";
			basic_rate_month_package2.style.display = "block";
			packageSynopsis_total('basic_rate','total_basic_rate');
			packageSynopsis_total('anticipated_rate','total_anticipated_rate');
		});

		$('#group_2_2').click(function() {
			console.log("group 2 anticip");
			basic2.style.display = "none";
			anticipated2.style.display = "none";
			basic_rate_month_package2.style.display = "none";
			packageSynopsis_total('basic_rate','total_basic_rate');
			packageSynopsis_total('anticipated_rate','total_anticipated_rate');
		});
		//3rd Package
		$('#group_3_1').click(function () {  
			
		   basic3.style.display = "block";
		   anticipated3.style.display = "block";
		   basic_rate_month_package3.style.display = "block";
		   packageSynopsis_total('basic_rate','total_basic_rate');
		   packageSynopsis_total('anticipated_rate','total_anticipated_rate');
		   
		 });  

		$('#group_3_2').click(function () {  
			
			basic3.style.display = "none";
			anticipated3.style.display = "none";
			basic_rate_month_package3.style.display = "none";
			packageSynopsis_total('basic_rate','total_basic_rate');
			packageSynopsis_total('anticipated_rate','total_anticipated_rate');
		 });   
		 
		 
		 packageSynopsis_total('package_budget_esc','total_budget_esc');
		 packageSynopsis_total('package_negot_value','total_negot_value');
		 packageSynopsis_total('finalized_award_value_package','total_finalized_award_value');
		 packageSynopsis_total('awarded_benchmark_package','total_awarded_benchmark');
		 packageSynopsis_total('basic_rate','total_basic_rate');
		 packageSynopsis_total('anticipated_rate','total_anticipated_rate');
		 packageSynopsis_total('expected_savings_package','total_expected_savings');
		 calculateSum1(pckCount_edit);

		 $('.onMouseOutClass').on('mouseout', (event) => {
            let ele = document.getElementsByClassName("onMouseOutClass");
            console.log("ele",ele);
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

		// ending award synopsis dynamic column


		/* adding final bid scenario dynamic column */
		
		
		 $('#bidder_count').on('change', function (e) {

        let _th=`<th style="width: 120px !important;"><input type='text' class="form-control custom_th" name="final_bidder_name[]" placeholder="Enter Bidder Name" id="final_bidder_name" required></th>`;

        let _pqfb=`<td><select id="score_type" name="score_type[]" required="" class="form-control pq_fb_score_custom_td" onChange="score_color();"><option value="">Select</option><option value="PQ">PQ</option><option value="FB">FB</option></select><input type='number' class="form-control mt-3" name="score[]" id="score" style="width: 120px !important;"  min="0" max="100" step="0.01" oninput="(validity.valid)||(value='');" onblur="score_color();"></td>`;
		
		let _package_bidder=`<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this);getBidders_total();calculateSum1();" class="form-control package_common_tower_label_custom_td decimalStrictClass onMouseOutClass" name="package_bidder[1][1]" id="package_bidder_1_1"></td>`;

     
        let _total_amt_label=`<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control total_amt_label_custom_td decimalStrictClass onMouseOutClass" name="total_amt_bidder[]" id="total_amt_bidder" readonly></td>`;

        let _bid_position_label=`<td><input type='text' class="form-control bid_position_label_custom_td" name="bid_position[]" id="bid_position" readonly></td>`;

        let _bid_position_gp=`<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control bid_position_gp_custom_td decimalStrictClass onMouseOutClass" name="diff_budget_crs[]" id="diff_budget_crs" readonly></td>`;

        let _diff_age_gp=`<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control diff_age_gp_custom_td decimalStrictClass onMouseOutClass" name="diff_budget_percentage[]" id="diff_budget_percentage" readonly></td>`;
		
		var package_count = $('#package_count').find(":selected").text();
		var bid_count = $('#bidder_count').find(":selected").text();
		
		var pckIndex,bidIndex,ele_bidIndex;
		var bidCount_disp = $('input[name="final_bidder_name[]"]').length;
		console.log("if"+$(".custom_th").length);
		console.log("if1"+e.target.value);
		console.log("ifbidder"+bidCount_disp);
		console.log("ifbidder1"+bid_count);
       
		if(bidCount_disp <= bid_count){
		
	
		for(pckIndex=1;pckIndex<=package_count;pckIndex++)
		{
			
			for (bidIndex = bidCount_disp; bidIndex < bid_count; bidIndex++) {
				ele_bidIndex=bidIndex+1;
			
				let th=$(_th);
				th.find("input").attr("name",th.find("input").attr("name"))
				th.find("input").attr("id",th.find("input").attr("id")+(bidIndex+1))
				

				let pq_fb_score=$(_pqfb);
				pq_fb_score.find("select").attr("name",pq_fb_score.find("select").attr("name"))
            	pq_fb_score.find("select").attr("id",pq_fb_score.find("select").attr("id")+ele_bidIndex) 
				pq_fb_score.find("input").attr("name",pq_fb_score.find("input").attr("name"))
				pq_fb_score.find("input").attr("id",pq_fb_score.find("input").attr("id")+ele_bidIndex) 
				
				let package_bidder=$(_package_bidder);
				package_bidder.find("input").attr("name","package_bidder["+pckIndex+"]["+ele_bidIndex+"]")
				package_bidder.find("input").attr("id","package_bidder_"+pckIndex+"_"+ele_bidIndex)
				

				let total_amt_label=$(_total_amt_label);
				total_amt_label.find("input").attr("name",total_amt_label.find("input").attr("name"))
				total_amt_label.find("input").attr("id",total_amt_label.find("input").attr("id")+ele_bidIndex)

				let bid_position_label=$(_bid_position_label);
				bid_position_label.find("input").attr("name",bid_position_label.find("input").attr("name"))
				bid_position_label.find("input").attr("id",bid_position_label.find("input").attr("id")+ele_bidIndex)

				let bid_position_gp=$(_bid_position_gp);
				bid_position_gp.find("input").attr("name",bid_position_gp.find("input").attr("name"))
				bid_position_gp.find("input").attr("id",bid_position_gp.find("input").attr("id")+ele_bidIndex)

				let diff_age_gp=$(_diff_age_gp);
				diff_age_gp.find("input").attr("name",diff_age_gp.find("input").attr("name"))
				diff_age_gp.find("input").attr("id",diff_age_gp.find("input").attr("id")+ele_bidIndex) 

				if(pckIndex==1)
				{
					$("#mainTable").find("thead").find("tr").append(th)
					$($("#mainTable").find("tbody").find("tr")[0]).append(pq_fb_score)
				}
				$($("#mainTable").find("tbody").find("tr")[pckIndex]).append(package_bidder)
				
				if(pckIndex==1)
				{
					$($("#mainTable").find("tbody").find("tr")[4]).append(total_amt_label)
					$($("#mainTable").find("tbody").find("tr")[5]).append(bid_position_label)
					$($("#mainTable").find("tbody").find("tr")[6]).append(bid_position_gp)
					$($("#mainTable").find("tbody").find("tr")[7]).append(diff_age_gp)
				}
			
			
			}
		}
      

        } else {
            let length=$(".custom_th").length;
			for(pckIndex=1;pckIndex<=package_count;pckIndex++)
			{
				
				for (bidIndex = bid_count; bidIndex < bidCount_disp; bidIndex++) {
				
				ele_bidIndex=parseInt(bidIndex)+1;
				console.log("#package_bidder_"+pckIndex+"_"+ele_bidIndex);
				
				if(pckIndex==1)
				{
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
		showBidders_finalized();		


		$('.onMouseOutClass').on('mouseout', (event) => {
            let ele = document.getElementsByClassName("onMouseOutClass");
            console.log("ele",ele);
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
		

         /* cotractor appointment date toggle */

         function finalized_val(sender){
            let val = sender.value;

            var val1 = document.getElementById("finalized_award_value_package1").value;
            var val2 = document.getElementById("finalized_award_value_package2").value;
            
            
            val1 = String(val);
            if (val1){
                if(val1.includes("Cr")){
                    sender.value = val;
                }else if(!val1.includes("Cr")){
                    sender.value = sender.value + " Cr";
                }
            }
           
        }

	<?php 
			
	foreach($mRecordPackage as $keyPck=>$valPck)
	{
		$id_index = $keyPck+1;
		?>
		
		const radioYes<?php echo $id_index;?> = document.getElementById('packageYesRadios<?php echo $id_index;?>');
        const radioNo<?php echo $id_index;?> = document.getElementById('packageNoRadios<?php echo $id_index;?>');
      

        let basic<?php echo $id_index;?> = document.getElementById("basic_rate<?php echo $id_index;?>");
        let anticipated<?php echo $id_index;?> = document.getElementById("anticipated_rate<?php echo $id_index;?>");
		let basic_rate_month_package<?php echo $id_index;?> = document.getElementById("basic_rate_month_package<?php echo $id_index;?>");
       
        radioYes<?php echo $id_index;?>.addEventListener('click', function handleClick() {
            if (radioYes<?php echo $id_index;?>.checked) {
				
                basic<?php echo $id_index;?>.style.display = "block";
                anticipated<?php echo $id_index;?>.style.display = "block";
				basic_rate_month_package<?php echo $id_index;?>.style.display = "block";
				packageSynopsis_total('basic_rate','total_basic_rate');
				packageSynopsis_total('anticipated_rate','total_anticipated_rate');
            }
        });
        radioNo<?php echo $id_index;?>.addEventListener('click', function handleClick() {
            if (radioNo<?php echo $id_index;?>.checked) {
                basic<?php echo $id_index;?>.style.display = "none";
                anticipated<?php echo $id_index;?>.style.display = "none";
				basic_rate_month_package<?php echo $id_index;?>.style.display = "none";
				packageSynopsis_total('basic_rate','total_basic_rate');
				packageSynopsis_total('anticipated_rate','total_anticipated_rate');
            }
        });
     
	<?php } ?>

		
	
		
        function createRowColumn(row) {
            var column = document.createElement("td");
            row.appendChild(column);
            return column;
        }

        function addRow() {
			contrSel = document.getElementById("package_count").value;
            console.log("contrSel",contrSel);
            var newrow = document.createElement("tr");
            newrow.setAttribute("class","text-center");
            var numericColumn = createRowColumn(newrow);
            var textColumn = createRowColumn(newrow);
            var textAreaColumn = createRowColumn(newrow);
            var removeColumn = createRowColumn(newrow);

            var textbox = document.createElement("input");
            textbox.setAttribute("type", "text");
            textbox.setAttribute("class", "form-control");
			textbox.setAttribute("name", "term[]");
            textColumn.appendChild(textbox);

			var textArea1 = document.createElement("div");
            textArea1.setAttribute("style", "display:flex ;");

			var term_len = $('input[name="term[]"]').length;
			console.log("term_len"+term_len);
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
            for (var i = 1; i < rows.length ; i++) {
                var currentRow = rows[i];
                currentRow.childNodes[0].innerText = i.toLocaleString() ;
            }
        }
		
		//Level role change 
		
		
		//Calculate Sum for the first package

		
		$('#role').change(function () {
			
			user_name = $( "#role option:selected" ).text();
			user_id = $('#role').val();
			
			level_val= $("#level")[0].selectedIndex;
			level_text= $( "#level option:selected" ).text();
			
			$('#level'+level_val+'_id').html("Level "+level_val);
			
			
			$('#level'+level_val+'_approver').val(user_name)
			$('#level'+level_val+'_approver_id').val(user_id)
	
			
		
		});
		
		//get the levels based on the amount/l1_vendor
		function getLevelApprovers(){
			
			var pgType="edit";
			
			var l1_vendor1;
			var package_value;
			
			package_value= 200;
			l1_vendor1 = checkL1_vendor();
			
			
			// Get max level of Approvers
			
								
			$.ajax({
				url: "<?php echo base_url('nfa/Award_contract/getMaxLevelApprovers'); ?>",
				type: 'post',
				data: { package_value: package_value, l1_vendor1: l1_vendor1, pgType: pgType },
				
				success: function(response){
										
					var obj = jQuery.parseJSON(response);
					data1 = obj.data1;
					
					$('#level').html(data1); 
					
					}

				
			});
   

	}
	

	//get GPL Budget total
	function finalized_total(){
		var sum_finalized=0;
				
		<?php 
			foreach($mRecordPackage as $keyPck=>$valPck)
			{
				$id_index = $keyPck+1;
		?>
				sum_finalized+= parseFloat($("#finalized_award_value_package<?php echo $id_index; ?>").val()); 
		<?php 
			
			}
		?>
		
		
		$("#total_finalized_award_value").val(sum_finalized + " Cr"); 
	}
	
	//get GPL Budget total
	function getGplBudget_total(){
		var sum_gplBudget=0;
				
		for(i=1;i<=2;i++)
		{
			sum_gplBudget+= parseFloat($("#package_gpl_budget"+i).val()); 
			
			
		}
		
		
		
		$("#total_amt_gpl").val(sum_gplBudget); 
	}
	//get Bidders package total
	function getBidders_total(){
				
		var sum_bidder;
		var total_amt_gpl = $("#total_amt_gpl").val(); 
		var diff_budget_crs;
		var diff_budget_percentage;
		 <?php 
		 
		 foreach($mRecordFinalBidders as $keyBid=>$valBid)
		 {
			
			 $bid_index = $keyBid+1;
		 ?>
		
			
			sum_bidder = 0;
			<?php 
			
			foreach($mRecordPackage as $keyPck=>$valPck)
			{
				
				
				$package_id = $valPck['package_id'];
				$id_index = $keyPck+1;
	
				$bid_text = "#package_bidder_".$package_id."_".$bid_index;
			?>
				
				sum_bidder += parseFloat($('<?php echo $bid_text;?>').val()); 
			<?php 
			}
			
			?>
			
			$("#total_amt_bidder<?php echo $bid_index?>").val(sum_bidder.toFixed(2)); 
			diff_budget_crs = parseFloat(sum_bidder)-parseFloat(total_amt_gpl);
			diff_budget_percentage = (parseFloat(diff_budget_crs)/parseFloat(total_amt_gpl))*100; 			
			$("#diff_budget_crs<?php echo $bid_index?>").val(diff_budget_crs); 
			$("#diff_budget_percentage<?php echo $bid_index?>").val(diff_budget_percentage); 
			<?php 
		}
		?>
		
		
	}

	function myFunction(item) {
	 
	  <?php 
		foreach($mRecordPackage as $keyBid=>$valBid)
		{
			$id_index = $keyBid+1;
		?>
		
			$("#total_amt_bidder<?php echo $id_index;?>").val(item); 
		<?php 
		}?>
	}

	
	//Calculate Days
	function calculateDays(){
		
		var activity_planned_date= $("#activity_planned_date").val(); 
		var activity_cbe_date = $("#activity_cbe_date").val();
		
		days = daysdifference(activity_planned_date, activity_cbe_date);
		if(!isNaN(days)) {
			$("#activity_delay").val(days+" Days"); 
		}
		else
		{
			$("#activity_delay").val(" Days");
		}
		if(days>0)
		{
			$("#front_idling1").prop("checked", true);
			idlingCheck();
		}
		else
		{
			$("#front_idling2").prop("checked", true);
			idlingUnCheck();
		}
	}
	function daysdifference(firstDate, secondDate){  
		var startDay = new Date(firstDate);  
		var endDay = new Date(secondDate);  
	  
	// Determine the time difference between two dates     
		var millisBetween = endDay.getTime() -  startDay.getTime() ; 
		
		  
	// Determine the number of days between two dates  
		var days = millisBetween / (1000 * 3600 * 24);  
		
	// Show the final number of days between dates     
		
		return Math.round(days);  		
	}  

$('#receipt_date').blur(function(){
	var receipt_date= $("#receipt_date").val(); 
	var bidder_approval_date = $("#bidder_approval_date").val();
	calculateDays_betDates(receipt_date,bidder_approval_date,"bidder_approval_days");
  
});
$('#bidder_approval_date').blur(function(){
	var receipt_date= $("#receipt_date").val(); 
	var bidder_approval_date = $("#bidder_approval_date").val();
	calculateDays_betDates(receipt_date,bidder_approval_date,"bidder_approval_days");
  
});
$('#award_recomm_date').blur(function(){
	var bidder_approval_date = $("#bidder_approval_date").val();
	var award_recomm_date = $("#award_recomm_date").val();
	calculateDays_betDates(bidder_approval_date,award_recomm_date,"award_recomm_days");
  
});
$('#save, #submit').on('click', () => { 
    // Get HTML content
   
	
	var subject_html = quill.root.innerHTML;
	
	if(quil2)
	{
		var reasons_delay_html = quil2.root.innerHTML;
		$('#reasons_delay_hd').val(reasons_delay_html);
	}
	var current_status_work_html = quil3.root.innerHTML;
	
    // Copy HTML content in hidden form
    $('#subject_hd').val(subject_html);
	
	$('#current_status_work_hd').val(current_status_work_html);
	return validate_receipt_date();
	
})			

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

		function decimalStrictThree(){
			let noOfClasses=document.getElementsByClassName("decimalStrictThreeClass").length;
			for(let k = 0;k<=noOfClasses;k++){
			setInputFilter(document.getElementsByClassName("decimalStrictThreeClass")[k], function(value) {
				return /^-?\d*[.,]?\d{0,3}$/.test(value); });
			}
        }

		function addPackage(selectObj){
            
            contrSel = selectObj.value;
            let pack1=document.getElementsByClassName("sec2");
            let pack2=document.getElementsByClassName("sec3");
            
            if(selectObj.value === "1"){
                
                for (i = 0; i < pack1.length; i++) {
                    pack1[i].style.display="block";
                    pack2[i].style.display="none";
                }

				$("#dyntable th:last-child").show();
				//Hide last child i.e last column
				$("#dyntable td:last-child").show();
            }
            else if(selectObj.value === "2"){
                
                for (i = 0; i < pack2.length; i++) {
                    pack1[i].style.display="block";
                    pack2[i].style.display="block";
                }
				//Hide last child i.e last header
				$("#dyntable th:last-child").show();
				//Hide last child i.e last column
				$("#dyntable td:last-child").show();
            }else{
                for (i = 0; i < pack1.length; i++) {
                    pack1[i].style.display="none";
                    pack2[i].style.display="none";
                }
				//Hide last child i.e last header
				$("#dyntable th:last-child").hide();
				//Hide last child i.e last column
				$("#dyntable td:last-child").hide();
            }
        }
    </script>
	<script src="../../assets/js/summernote-bs4.min.js"></script>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/nfa_award_contract.js" ></script>
	<script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/nfa_scripts.js" ></script>
	
</body>

</html>