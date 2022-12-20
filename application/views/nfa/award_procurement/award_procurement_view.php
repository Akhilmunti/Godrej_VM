<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('buyer/partials/header'); ?>

<style>
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

    .table-view{
        border: 1.5px solid grey;
        padding: 10px;
    }

    .paddingLine {
        padding: 20px 10px;
        border: 1.5px solid grey;
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
        color: #fff;
    }
    .breadcrumb-dot .breadcrumb-item+.breadcrumb-item::before {
        content: "•";
    }

    .breadcrumb-bar .breadcrumb-item+.breadcrumb-item::before {
        content: "|";
    }

    .breadcrumb-right-arrow .breadcrumb-item+.breadcrumb-item::before {
        content: "›";
        vertical-align:top;
        font-size:40px;
        line-height:15px;
    }

    .breadcrumb-right-tag {
        padding:0;
        background:none;
    }

    .breadcrumb-right-tag .breadcrumb-item {
        background:rgba(2, 117, 216, 0.8);
        padding:.5em 1em;
    }

    .breadcrumb-right-tag .breadcrumb-item a, .breadcrumb-right-tag .breadcrumb-item  {
        color:#fff;
    }

    .breadcrumb-right-tag .breadcrumb-item:nth-child(2) {
        background:rgba(2, 117, 216, 0.6);
    }

    .breadcrumb-right-tag .breadcrumb-item:nth-child(3) {
        background:rgba(2, 117, 216, 0.5);
    }

    .breadcrumb-right-tag .breadcrumb-item+.breadcrumb-item::before {
        content: "";
        padding:0;
    }

    .breadcrumb-bg {
        background: none !important;
    }

    .breadcrumb {
        background-color: #f1f1f1 !important;
        font-size: 15px !important;
        padding: 10px 0px !important;
    }

    .content-headerModification {
        position: relative;
        padding-top: 30px;
        padding-bottom: 7px
    }
</style>

<body class="hold-transition light-skin sidebar-mini theme-blueindigo onlyheader">

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

                    <div class="content-header">
                        <div class="row">
                            <div class="col-lg-9">
                                <h3>View IOM - Award Recommendation for Procurement</h3>
                            </div>
                            <div class="col-lg-3 text-right">
                                <button type="button" onclick="history.back()" class="btn btn-secondary rounded">Go Back</button>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-bg">

                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">IOM Management</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">IOM - Award Recommendation</a>
                            </li>
                            <li class="breadcrumb-item active">View IOM - Award Recommendation for Procurement</li>
                        </ol>

                    </div>

                    <div class="box">

                        <div class="box-body">

                         

                           
                                <?php
                                    $mSessionRole = $this->session->userdata('session_role');
                                    $upload_path = $this->config->item('upload_path'); 
                                ?>                                                 

                           
                            <div class="paddingLine">
                                
                                <h5>
                                    <span class="font-weight-bold">ENFA NO</span> : <span class="font-size-14"><?php echo $mRecord['version_id']; ?></span>
                                </h5>
                               
                                <hr class='hr-bold-line' />
                                
                                <h5>
                                    <span class="font-weight-bold">Initiator</span> : <span class="font-size-14"><?php echo $mRecord['buyer_name']; ?></span>
                                </h5>
                              
                                <hr class='hr-bold-line' />

                                <h5 style="margin-bottom: -2px;">
                                    <span class="font-weight-bold">Subject</span> : <span class="font-size-14"><?php echo strip_tags($mRecord['subject']); ?></span>
                                </h5>
                                <hr class='hr-bold-line' />
                                
                                <h5 style="margin-bottom: -2px;">
                                    <span class="font-weight-bold">Scope of Work</span> : <span class="font-size-14"><?php echo strip_tags($mRecord['scope_of_work']); ?></span>
                                </h5>
                                <!-- <hr class='hr-bold-line' />
                                <h5 style="margin-bottom: -2px;">
                                    <span class="font-weight-bold">Type of Procurement</span> : <span class="font-size-14"><?php echo ($mRecord['procurement_type']); ?></span>
                                </h5> -->

                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table rs-table-bordered mb-0">
                                    <thead class="bg-primary">
                                        <tr class='text-center'>
                                            <th colspan="5">Award Synopsis | <?php echo $mRecordAwdContract['synopsis_label'] ?></th>
                                        </tr>
                                    </thead>
                                    <thead class="bg-primary">
                                        <tr class='text-center'>
                                            <th style="width:34%">Description</th>
											 <?php 
										 
										 foreach($mRecordPackage as $key=>$val)
											{	
											?>
                                            <th scope="col" ><?php echo  $val['package_name']; ?></th>
                                           <?php 
											}?> 
                                            <th scope="col" style="width:18%">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bidderList">
                                        <tr class='text-center'>
                                            <td>Budget incl Escalation</td>
											<?php 
											
											 foreach($mRecordPackage as $key=>$val)
											 {
											 	
											 	
											 ?>
                                            <td>
                                                <?php echo $val['package_budget_esc'] ?> Cr
                                            </td>
                                            <?php 
											}
											?>
                                            <td><?php echo $mRecord['total_budget_esc'] ?> Cr</td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>Negotiated Value (Excl. Tax) – Pre Final Round</td>
											<?php foreach($mRecordPackage as $key=>$val)
											{	
												$id_index = $key+1;
											?>
                                            <td>
                                                <?php echo $val['package_negot_value'] ?> Cr
                                            </td>
                                             <?php 
											}?> 
                                            <td><?php echo $mRecord['total_negot_value'] ?>  Cr</td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>Finalized Proposed Award Value (Excl Tax)</td>
											<?php foreach($mRecordPackage as $key=>$val)
											{	
												$id_index = $key+1;
											?>
                                            <td>
                                                <?php echo $val['finalized_award_value_package'] ?> Cr
                                            </td>
                                            <?php 
											}?> 
                                            <td><?php echo $mRecord['total_finalized_award_value'] ?> Cr</td>
                                        </tr>

                                        <tr class='text-center'>
                                            <td>Expected Savings w.r.t Budget incl. escalation</td>
											<?php foreach($mRecordPackage as $key=>$val)
											{	
											
											?>
                                            <td>
                                                <?php echo $val['expected_savings_package'] ?> %
                                            </td>
                                            <?php 
											}?> 
                                            <td><?php echo $mRecord['total_expected_savings'] ?> %</td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>Recommended Vendors based on L1 position ( Package-wise)</td>
											<?php foreach($mRecordPackage as $key=>$val)
											{	
												$id_index = $key+1;
											?>
                                            <td>
                                                <?php echo $val['recomm_vendor_package'] ?>
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
                                                <?php echo $val['basis_award_package'] ?>
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
                                                <?php echo $val['deviation_approved_package'] ?>
                                            </td>
                                            <?php 
											}?> 
                                            <td></td>
                                        </tr>
									
									
                                        <tr class='text-center'>
                                            <td>Last Awarded Benchmark with Date<?php echo $mRecordAwdContract['benchmark_label'] ?></td>
											<?php foreach($mRecordPackage as $key=>$val)
											{	
												
											?>
                                            <td>
                                                <?php echo $val['awarded_benchmark_package'] ?> Cr
                                            </td>
                                           <?php 
											}?> 
                                            <td><?php echo $mRecord['total_awarded_benchmark'] ?> Cr</td>
                                        </tr>
								
                                        <tr class='text-center'>
                                            <td>Proposed Award Value (Excl Tax) - Adjusted Awarded Value(Post Basic Rate Adjustment): <span class=" font-weight-bold">SAP WO VALUE TO BE CREATED</span></td>
											<?php foreach($mRecordPackage as $key=>$val)
											{	
												
											?>
                                            <td>
                                                <?php echo $val['post_basic_rate_package'] ?> Cr
                                            </td>
                                             <?php 
											}?> 
                                            <td><?php echo $mRecord['total_post_basic_rate'] ?> Cr</td>
                                        </tr>
                                       
                                        
                                    </tbody>
                                </table>
                            </div>

                            <div class="paddingLine mt-4">
                                <h5>
                                    <span class="font-weight-bold"><?php echo $mRecord['uom_label'] ?></span> : <span class="font-size-14"><?php echo $mRecord['uom_value'] ?> Cr</span>
                                </h5>
                               
                                <hr class='hr-bold-line' />
                                
                                <h5>
                                    <span class="font-weight-bold">Is HO approval required ?</span> : <span class="font-size-14"><?php echo ($mRecord['ho_approval'] == "Y") ? "Yes" : "No"; ?></span>
                                </h5>
                            </div>							

                            <div class="d-block mt-4">
                                <h5 class="page-title br-0 font-weight-bold">Final Bid Scenario</h5>
                            </div>

                            <div class="table-responsive">

                                <table class="table rs-table-bordered mb-0">
                                    <thead class="bg-primary">
                                        <tr class='text-center'>
                                            <th>Description</th>
                                            <th style="width: 15%;" scope="col">GPL Budget (with escalation)</th>
											<?php foreach($mRecordFinalBidders as $key=>$val)
											{
												
												$final_bidder_name = $val->final_bidder_name;
												
												
											?>
                                            <th style="width: 120px !important;" scope="col"><?php echo $final_bidder_name ?></th>
                                            <?php 
											 }
											  ?>
                                        </tr>
                                    </thead>
                                    <tbody style="width: 40% !important;" id="bidderList">
                                        <tr class='text-center'>
                                            <td>PQ/ Feedback Score</td>
											 <td class="">-></td>
											<?php 
											$bidVal_arr = array();
											
											foreach($mRecordFinalBidders as $keyBid=>$valBid)
											{
												$id_index = $keyBid+1;
												$score_type = $valBid->score_type;
												$score = $valBid->score;
												$score_class="";
												if($score_type=="PQ")
													$score_class = " background-pq";
												else if($score_type=="FB")
													$score_class = " background-feedback";
																				
											?>
										
                                              <td class="<?php echo $score_class;?>"><div style="width: 120px !important;"><?php echo ($score_type); ?><br><?php echo $score; ?></div></td>
											    <?php 
											 }
											  ?>
                                        </tr>
										<?php foreach($mRecordPackage as $key=>$val)
										{
											$id_index = $key+1;
											$package_id = $val['package_id'];
											$salient_id = $val['salient_id'];
											
											
											$CI=&get_instance();

											$finalBidData = $CI->getFinalBidData($salient_id,$package_id);
											$package_gpl_budget_value =  $finalBidData->package_gpl_budget;
											$min_bidder =  $CI->package_min_bidder_data($salient_id,$package_id);
											$minBidValue = $min_bidder[0]->package_bidder; 
											
										?>
                                        <tr class='text-center'>
                                            <td><?php echo $val['package_name'] ?></td>
                                            <td><?php echo $package_gpl_budget_value ?> Cr</td>
											<?php 
											//Bidders Record
											$bidders_count = sizeof($mRecordFinalBidders);
											
											foreach($mRecordFinalBidders as $keyBid=>$valBid)
											{
												
												$bid_index = $keyBid+1;
												$bidder_id = $valBid->id;
												
											
												$finalBiddersData = $CI->getFinalBidData($salient_id,$package_id,$bidder_id);
												
												$package_bidder_value =  $finalBiddersData->package_bidder;
												
												if($package_bidder_value==$minBidValue)
													$bidder_class = 'background-green';
												else 
													$bidder_class = '';
												
												
											?>
                                            <td class="<?php echo $bidder_class; ?>"><?php echo $package_bidder_value; ?> Cr</td>
                                           <?php 
												}?>
                                        </tr>
										<?php }
										 $total_amt_gpl = $mRecordFinalBidders[0]->total_amt_gpl;
										?>
                                       
                                        <tr class='text-center'>
                                            <td class="page-title font-weight-bold">Total Amount</td>
                                            <td><?php echo $total_amt_gpl; ?> Cr</td>
											<?php foreach($mRecordFinalBidders as $keyBid=>$valBid)
											{
												
												$total_amt_bidder = $valBid->total_amt_bidder;
											?>
                                            <td><?php echo $total_amt_bidder ?> Cr</td>
                                           <?php 
											}
											?>
                                        </tr>
                                        <tr class='text-center'>
                                            <td colspan="2">Bid position</td>
											<?php  foreach($mRecordFinalBidders as $keyBid=>$valBid)
											{
												$bid_position = $valBid->bid_position;

                                               
											?>
                                            <td><?php echo $bid_position; ?></td>
                                            <?php 
											 }
											?>
                                        </tr>
                                        <tr class='text-center'>
                                            <td colspan="2">Difference wrt Budget (in crs)</td>
											<?php foreach($mRecordFinalBidders as $keyBid=>$valBid)
											{
												$diff_budget_crs = $valBid->diff_budget_crs;
												
												if($diff_budget_crs>0)
												{
													
													$budget_class = 'background-red';
												}
												else
												{
													$budget_class = 'background-green';
												
												}
                                                
											?>
                                            <td class="<?php echo $budget_class; ?>"><?php echo $diff_budget_crs; ?> Cr</td>
                                            <?php 
											 }
											?>
                                        </tr>
                                        <tr class='text-center'>
                                            <td colspan="2">Difference wrt Budget (in %age)</td>
											<?php  foreach($mRecordFinalBidders as $keyBid=>$valBid)
											{
												$diff_budget_percentage = $valBid->diff_budget_percentage;
												if($diff_budget_percentage>0)
												{
													
													$budget_class = 'background-red';
												}
												else
												{
													$budget_class = 'background-green';
												
												}
                                                
											?>
                                            <td class="<?php echo $budget_class; ?>"><?php echo $diff_budget_percentage ?> %</td>
                                            <?php 
											 }
											?>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
																		

                            <div class="d-block mt-4">
                                <h5 class="page-title br-0 font-weight-bold">Award Efficiency</h5>
                            </div>

                            <div class="table-responsive">

                                <table class="table rs-table-bordered mb-0">
                                    <thead class="bg-primary">
                                        <tr class='text-center'>
                                            <th style="width: 15%;">Actitivity</th>
                                            <th style="width: 20%;">Receipt of Tender Document</th>
                                            <th style="width: 20%;">Start date of Bidder List approval</th>
                                            <th style="width: 20%;">Finish date Approval of Award Recommendation</th>
                                            <th style="width: 25%;">Remarks (If any)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bidderList">
                                        <tr class='text-center'>
                                            <td>Date</td>
                                            <td>
                                             
												<?php echo date("d-M-y", strtotime($mRecordAwdContract['receipt_date']));?>
                                            </td>
                                            <td>
                                              
												<?php echo date("d-M-y", strtotime($mRecordAwdContract['bidder_approval_date']));?>
                                            </td>
                                            <td>
                                               
												<?php echo date("d-M-y", strtotime($mRecordAwdContract['award_recomm_date']));?>
                                            </td>
                                            <td>
                                                <?php echo $mRecordAwdContract['remarks_date'] ?>
											
                                            </td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>No of Days</td>
                                            <td>
                                                <?php echo $mRecordAwdContract['receipt_days'] ?>
                                            </td>
                                            <td>
                                                <?php echo $mRecordAwdContract['bidder_approval_days'] ?>
                                            </td>
                                            <td>
                                                <?php echo $mRecordAwdContract['award_recomm_days'] ?>
                                            </td>
                                            <td>
                                                <?php echo $mRecordAwdContract['remarks_days'] ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                          
                            <div class="d-block mt-4">
                                <h5 class="page-title br-0 font-weight-bold">Major Terms and Conditions</h5>
                            </div>

                            <div class="table-responsive">
                                <table class="table rs-table-bordered mb-0" id="t1">
                                    <thead class="bg-primary">
                                        <tr class='text-center'>
                                            <th style="width:10%">Sl. No.</th>
                                            <th style="width:35%">Terms</th>
                                          
                                            <th colspan="3">Description</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        <tr>
                                            <td class="bg-primary"></td>
                                            <td class="bg-primary"></td>
                                            <?php
												foreach($mRecordPackage as $key=>$val)
												{
                                            ?>
                                        <td class='text-center bg-primary'>Package <?php echo  $key+1;?><br>
                                        <?php echo $val['major_term_label'] ?>  
                                        </td>
                                        <?php }?>
                                       
                                        </tr>
								       	<?php
										
										foreach($mRecordMajorTerms as $key=>$val)
										{
											$slNo  = $key+1;
											$term = $val->term;
											
										?>
                                        <tr class='text-center'>
                                        
                                            <td><?php echo $slNo ?></td>
                                            <td><?php echo $term; ?></td>
                                            <?php
												foreach($mRecordPackage as $key=>$val)
												{
													$package_id = $val['package_id'];
													$salient_id = $val['salient_id'];	
													$majorTerms_desc = $CI->awardRecommProcurement->getMajorTerms($salient_id,$package_id,$term);
													
													$term_label_value = $majorTerms_desc->term_label_value;
												?>
                                            <td><?php echo $term_label_value; ?></td>
                                            <?php 
												}
																				
											?>
                                         
                                        </tr>
										<?php
										
										}?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <table class="table rs-table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold" style="width: 40%;">Background / Detailed Note</td>
                                                <td><?php echo $mRecord['detailed_note'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold" style="width: 40%;">Attachment - Comparitive</td>
                                                <td><?php

                                                    if ($mRecord['upload_comparitive_name']) { ?>
                                                        <button type="button" class="btn btn-secondary rounded"><a href="<?php echo $upload_path . $mRecord['upload_comparitive_name'] ?>" target="_blank">Download</a></button>
                                                        <span class='ml-3 font-weight-bold'>(File Name: <?php echo $mRecord['upload_comparitive_disp_name']; ?>)</span>
                                                    <?php
                                                    } else
                                                        echo "File not uploaded";
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold" style="width: 40%;">Attachment - Detailed IOM</td>
                                                <td><?php

                                                    if ($mRecord['upload_detailed_name']) { ?>
                                                        <button type="button" class="btn btn-secondary rounded"><a href="<?php echo $upload_path . $mRecord['upload_detailed_name'] ?>" target="_blank">Download</a></button>
                                                        <span class='ml-3 font-weight-bold'>(File Name: <?php echo $mRecord['upload_detailed_disp_name']; ?>)</span>
                                                    <?php
                                                    } else
                                                        echo "File not uploaded";
                                                    ?>
                                                </td>
                                            </tr>
                                            
											
											 <tr>
                                                <td class="font-weight-bold" style="width: 40%;">
                                                    PCM
                                                </td>
                                                <td>
													<?php echo $mRecord['buyer_name']; ?>
                                                </td>
                                            </tr>
											 <?php
											 if($mSessionRole!='PCM')
											 {
												$this->load->view('nfa/award_procurement/approvers_details');
											 }

                                            ?>
											
											
                                  
                                        </tbody>
                                    </table>

                                    <div class="row mt-4">
                                    <?php 
                               if ($mSessionRole != "PCM" && $pgType != 'A' && $pgType != 'C' && $pgType != 'E' && $preChkRecords == 1) {
												
                                    $data['mId']=$mRecord['id'];
                                    $data['title']="Award Recommendation for Procurement";
                                    $data['url']="nfa/award_procurement";
                                    
                                    $this->load->view('nfa/nfa_actions',$data); 
                                                
                               }?>
                                    </div>        

                                    <?php if ($pgType == 'E') {
                                    ?>
                                        <div class="row mt-4">
                                            <div class="col-lg-12 text-center">
                                                <a href="<?php echo base_url('nfa/AwardProcurementEsign/esignedPdf/' . $mId . "/E"); ?>" target="_blank">
                                                    <button type="button" class="btn btn-primary border-secondary rounded font-weight-bold w-300">Print IOM</button>
                                                </a>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>

                            </div>


                        </div>
                    </div>
                </section>
            </div>


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


</body>

</html>