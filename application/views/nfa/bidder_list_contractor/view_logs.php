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

                    <!-- Content Header (Page header) -->

                    <div class="content-header">
                        <div class="row">
                            <div class="col-lg-9">
                                <h3>View NFA Logs -  Short Listing Approval for Contractor</h3>
                            </div>
                            <div class="col-lg-3 text-right">
                                <button type="button" onclick="history.back()" class="btn btn-secondary rounded">Go Back</button>
                            </div>
                        </div>
                    </div>

                    <div class="box">

                        <div class="box-body">

                            <div class="row">
							 <?php 
							 $mSessionRole = $this->session->userdata('session_role');
							 //echo $preChkRecords;
							
							 ?>

                                <div class="col-lg-12">
                                     <table class="table rs-table-bordered">
                                <tbody>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">ENFA NO</td>
                                        <td><?php echo $mRecord['version_id'] ?></td>
                                    </tr>
                                            <tr >
                                               <td class='font-weight-bold' style="width: 350px;">Subject</td>
                                                <td><?php echo strip_tags($mRecord['subject']) ?></td>
                                            </tr>
											<tr >
                                                <td class='font-weight-bold' style="width: 350px;">Initiator</td>
                                                <td><?php echo $mRecord['buyer_name'] ?></td>
                                            </tr>
											 <tr>
                                                <td class='font-weight-bold' style="width: 350px;">Initiated Date</td>
                                                <td><?php echo  date("d-m-Y h:i:sa",strtotime($mRecord['initiated_date'])) ?></td>
                                            </tr>
											<?php if($mRecord['nfa_status']=="C")
											{	
											?>
												 <tr >
												   <td class='font-weight-bold' style="width: 350px;">NFA Status</td>
													<td>Cancelled</td>
												</tr>
												<tr >
													<td class='font-weight-bold' style="width: 350px;">Cancelled Remarks</td>
													<td><?php echo $mRecord['cancelled_remarks'] ?></td>
												</tr>
												 <tr>
													<td class='font-weight-bold' style="width: 350px;">Cancelled Date</td>
													<td><?php echo  date("d-m-Y h:i:sa",strtotime($mRecord['cancelled_date'])) ?></td>
												</tr>
											<?php 
											}
											?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>  
                             

                           

                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <table class="table rs-table-bordered">
                                        <tbody>
                                          
                                          
											<?php
											/*
										//$approver_arr = $controller->approverDetails($mRecordApprovers);
										//print_r($approver_arr);
										//foreach($approver_arr as $key=>$val)
										foreach($mRecordApproverDetails as $key=>$val)
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
											{	
											    echo "<div style='border:1px solid;'>Remarks: ".$val['approved_remarks']."<br>";
												echo "Approved Date: ".date("d-m-Y h:i:sa",strtotime($val['approved_date']))."<br></div>";
											}
											if($val['returned_text_status']==1) 
											{
												echo "<div style='border:1px solid;'>Returned for Text correction"."<br>";
												echo "Remarks: ".$val['returned_text_remarks']."<br>";
												//echo "Returned Date for text correction: ".$val['returned_text_date']."<br>";
												echo "Returned Date for text correction: ".date("d-m-Y h:i:sa",strtotime($val['returned_text_date']))."<br></div>";
											}
											if($val['returned_by']!=0) 	
											{	
												
												echo "<div style='border:1px solid;'>Returned NFA"."<br>";
												echo "Remarks: ".$val['returned_remarks']."<br>";
												echo "Returned Date: ".date("d-m-Y h:i:sa",strtotime($val['returned_date']))."<br></div>";
												
											}
											if($val['amended_by']!=0) 	
											{	
												
												echo "<div style='border:1px solid;'>Amended NFA"."<br>";
												echo "Remarks: ".$val['amended_remarks']."<br>";
												echo "Amended Date: ".date("d-m-Y h:i:sa",strtotime($val['amended_date']))."<br></div>";
											}
											 ?></td>
										</tr>
										<?php 
										}
										
										*/ 
										?>
										
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
												$this->load->view('nfa/bidder_list_contractor/approvers_details');
											 }

                                            ?>
											
                                        </tbody>
                                    </table>
									
									<?php if($pgType=='E')
							{
								?>
							 <div class="row mt-4">
									<div class="col-lg-12 text-center">
										<a href="<?php echo base_url('nfa/AwardContractEsign/esignedPdf/'. $mId."/E"); ?>" target="_blank" >
											<button type="button" class="btn btn-primary border-secondary rounded font-weight-bold w-300">Print NFA</button>
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


</body>

</html>