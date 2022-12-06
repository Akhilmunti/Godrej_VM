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

                <style>
                    .primary-gradient {
                        background-color: #2a2a72;
                        background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%);
                    }
                </style>

                <!-- Main content -->

                <section class="content">

                    <!--<div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="d-block">
                                <h3 class="page-title br-0">View NFA -  LD Waiver</h3>
                            </div>
                        </div>
                    </div>-->
					<div class="content-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3>View NFA -  LD Waiver</h3>
                            </div>
                            <div class="col-lg-6 text-right">
                                <button type="button" onclick="history.back()" class="btn btn-secondary rounded">Go Back</button>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-body">
                            <div class="row mt-4">
							 <?php 
							 $mSessionRole = $this->session->userdata('session_role');
							 //echo $preChkRecords;
							 if ($mSessionRole != "PCM" && $pgType!='A' && $pgType!='C' && $pgType!='E' && $preChkRecords==1) { ?>
                                <div class="col-lg-12 text-right">
                                    <a href="#" data-toggle="modal" data-target="#modal-right">
                                        <button type="button" class="btn btn-primary border-secondary rounded font-weight-bold">NFA Actions</button>
                                    </a>
                                </div>
							 <?php }?>
                            </div>

                            <table class="table rs-table-bordered">
                                <tbody>
								
									<tr>
                                        <td class='font-weight-bold' style="width: 350px;">ENFA NO</td>
                                        <td><?php echo $mRecord['version_id']; ?></td>
                                    </tr>


                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Subject</td>
                                        <td><?php echo $mRecord['subject'] ?></td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Contractor</td>
                                        <td><?php echo $mRecord['contractor_name'] ?></td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Package</td>
                                        <td><?php echo $mRecord['package_name'] ?></td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Awarded Towers / Scope</td>
                                        <td><?php echo $mRecord['awarded_towers'] ?></td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Award Date / NTP</td>
                                        <td><?php echo $mRecord['award_date'] ?></td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Completion Date</td>
                                        <td><?php echo $mRecord['completion_date'] ?></td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Revised Completion Date</td>
                                        <td><?php echo $mRecord['revised_completion_date'] ?></td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Latest Average Feedback Score</td>
                                        <td><?php echo $mRecord['avg_feedback_score'] ?></td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Original Contract Value</td>
                                        <td><?php echo $mRecord['original_contract_value'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Last approved Amended Contract Value</td>
                                        <td><?php echo $mRecord['last_approved_value'] ?></td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Total value of Work Done Till Date</td>
                                        <td><?php echo $mRecord['total_value_work'] ?></td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Applicable LD Amount</td>
                                        <td><?php echo $mRecord['ld_amount'] ?></td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Reason for LD Waiver</td>
                                        <td><?php echo $mRecord['reason_ld_waiver'] ?></td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Description Background</td>
                                        <td><?php echo $mRecord['description_background'] ?></td>
                                    </tr>
<?php // $controller->getLabelValue();?>
                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Delay due to Contractor</td>
                                        <td><?php echo $controller->getLabelValue("Delay due to Contractor",$mRecordReason); ?></td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Delay due to Company</td>
                                        <td><?php echo $controller->getLabelValue("Delay due to Company",$mRecordReason); ?></td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Delay due to other reasons (beyond the control of Contractors/Company)</td>
                                        <td><?php echo $controller->getLabelValue("Delay due to other reasons (beyond the control of Contractors/Company)",$mRecordReason); ?></td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Impact on OC/Handover Timelines</td>
                                        <td><?php echo $controller->getLabelValue("Impact on OC/Handover Timelines",$mRecordReason); ?></td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Is LD applicable</td>
                                        <td><?php echo ($mRecord['ld_applicable']=="yes")? "Yes" : "No" ?></td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">In case of No Please specify reason</td>
                                        <td><?php echo $mRecord['reason_applicable'] ?></td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Recommendations</td>
                                        <td><?php echo $mRecord['recommendations'] ?></td>
                                    </tr>
									<?php $uploadPath = $this->config->item('upload_path');?>
									
                                    <tr>
                                        <td class='font-weight-bold col-2' style="width: 350px;" rowspan="5">Attachments</td>
                                        <td>
										<?php 
										
										if($mRecordUploads['file1_name'])
										{?>
                                            <button type="button" class="btn btn-secondary rounded"><a href="<?php echo $uploadPath.$mRecordUploads['file1_name'] ?>" target="_blank">Download</a></button>
                                            <span class='ml-3 font-weight-bold'>Attachments - 1 (File Name: <?php echo $mRecordUploads['file1_display_name'];?>)</span>
										<?php 
									    }
										else
											echo "Attachments - 1 :File not uploaded";
										?>
                                        </td>
                                    </tr>
									
                                    <tr>
                                        <td>
										<?php if($mRecordUploads['file2_name'])
										{?>
                                            <button type="button" class="btn btn-secondary rounded"><a href="<?php echo $uploadPath.$mRecordUploads['file2_name'] ?>" target="_blank">Download</a></button>
                                            <span class='ml-3 font-weight-bold'>Attachments - 2 (File Name: <?php echo $mRecordUploads['file2_display_name']?>)</span>
											
											<?php 
									    }
										else
											echo "Attachments - 2 :File not uploaded";
										?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
										<?php if($mRecordUploads['file3_name'])
										{?>
                                            <button type="button" class="btn btn-secondary rounded"><a href="<?php echo $uploadPath.$mRecordUploads['file3_name'] ?>" target="_blank">Download</a></button>
                                            <span class='ml-3 font-weight-bold'>Attachments - 3 (File Name: <?php echo $mRecordUploads['file3_display_name']?>)</span>
											
											<?php 
									    }
										else
											echo "Attachments - 3 :File not uploaded";
										?>
                                        </td>
                                    </tr>
									<tr>
                                        <td>
										<?php if($mRecordUploads['file4_name'])
										{?>
                                            <button type="button" class="btn btn-secondary rounded"><a href="<?php echo $uploadPath.$mRecordUploads['file4_name'] ?>" target="_blank">Download</a></button>
                                            <span class='ml-3 font-weight-bold'>Attachments - 4 (File Name: <?php echo $mRecordUploads['file4_display_name']?>)</span>
											
											<?php 
									    }
										else
											echo "Attachments - 4 :File not uploaded";
										?>
                                        </td>
                                    </tr>
									<tr>
                                        <td>
										<?php if($mRecordUploads['file5_name'])
										{?>
                                            <button type="button" class="btn btn-secondary rounded"><a href="<?php echo $uploadPath.$mRecordUploads['file5_name'] ?>" target="_blank">Download</a></button>
                                            <span class='ml-3 font-weight-bold'>Attachments - 5 (File Name: <?php echo $mRecordUploads['file4_display_name']?>)</span>
											
											<?php 
									    }
										else
											echo "Attachments - 5 :File not uploaded";
										?>
                                        </td>
                                    </tr>
									<?php
									$approver_arr = $controller->approverDetails($mRecordApprovers);
									//print_r($approver_arr);
									foreach($approver_arr as $key=>$val)
									{
										$approver_id  = $key;
										$level = $val['approver_level'];
										$approver_name = $val['approver_name'];
										?>
										<tr>
											<td class='font-weight-bold' style="width: 350px;">Level <?php echo $level; ?> Approver</td>
											<td><?php echo $approver_name; ?> - <?php echo ($val['approved_status']==0) ? "Approval Pending" : "Approved" ?><br>
											<?php
											if($val['approved_status']==1)											
												echo "Approved Date: ".date("d-m-Y h:i:sa",strtotime($val['approved_date']))."<br>";
											if($val['returned_text_status']==1) 
											{
												echo "Returned for Text correction"."<br>";
												echo "Remarks: ".$val['returned_text_remarks']."<br>";
												//echo "Returned Date for text correction: ".$val['returned_text_date']."<br>";
												echo "Returned Date for text correction: ".date("d-m-Y h:i:sa",strtotime($val['returned_text_date']))."<br>";
											}
											if($val['returned_by']!=0) 	
											{	
												
												echo "Returned NFA"."<br>";
												echo "Remarks: ".$val['returned_remarks']."<br>";
												echo "Returned Date: ".date("d-m-Y h:i:sa",strtotime($val['returned_date']))."<br>";
												//$date=date_create($val['returned_date']);
												//echo date_format($date,"Y/m/d h:i:sa");
											}
											if($val['amended_by']!=0) 	
											{	
												
												echo "Amended NFA"."<br>";
												echo "Remarks: ".$val['amended_remarks']."<br>";
												echo "Amended Date: ".date("d-m-Y h:i:sa",strtotime($val['amended_date']))."<br>";
											}
											 ?></td>
										</tr>
									<?php 
									}
									


									?>
                                    

                                </tbody>
                            </table>
							<?php if($pgType=='E')
							{
								?>
							 <div class="row mt-4">
									<div class="col-lg-12 text-center">
										<a href="<?php echo base_url('nfa/LdWaiverEsign/esignedPdf/'. $mId."/E"); ?>" target="_blank" >
											<button type="button" class="btn btn-primary border-secondary rounded font-weight-bold w-300">Print NFA</button>
										</a>
									</div>
							 </div>
						 <?php 
							}
						 ?>
                        </div>
                    </div>

                </section>

                <!-- Maincontent -->

            </div>

        </div>

        <!-- Content-wrapper -->
        <?php $this->load->view('buyer/partials/footer'); ?>

        <!-- Control Sidebar -->
        <?php $this->load->view('buyer/partials/control'); ?>
        <!-- Control-sidebar -->

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
        <!-- Modal -->
		<div class="modal modal-right fade" id="modal-right<?php echo $record['id']?>" tabindex="-1">
			<?php 
			$data['mId']=$mRecord['id'];
			$data['mSessionRole']=$mSessionRole;
			//$this->load->vars($mid);
			$this->load->view('nfa/nfa_actions',$data); ?>
		</div>
		
     
    </div>
    <!-- Wrapper -->



    <?php $this->load->view('buyer/partials/scripts'); ?>

</body>

</html>