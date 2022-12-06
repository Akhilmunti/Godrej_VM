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
                                <h3>View NFA - Short Listing Approval For Contractor</h3>
                            </div>
                            <div class="col-lg-3 text-right">
                                <button type="button" onclick="history.back()" class="btn btn-secondary rounded">Go Back</button>
                            </div>
                        </div>
                    </div>

                    <div class="box">

                        <div class="box-body">

                            <div class="paddingLine mt-4">
                                
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

                            </div>
                            <!-- <div class="table-responsive">
                                <table class="table rs-table-bordered mb-0">
                                    <tbody>
                                        <tr>
                                            <td class='text-center' style="width:40%;">ENFA NO</td>
                                            <td><?php echo $mRecord['version_id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class='text-center' style="width:40%;">Initiator</td>
                                            <td><?php echo $mRecord['buyer_name']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> -->

                            <div class="row mt-4">
                                <?php
                                $mSessionRole = $this->session->userdata('session_role');
                                //echo $preChkRecords;
                                if ($mSessionRole != "PCM" && $pgType != 'A' && $pgType != 'C' && $pgType != 'E' && $preChkRecords == 1) { ?>
                                    <div class="col-lg-12 text-right">
                                        <a href="#" data-toggle="modal" data-target="#modal-right">
                                            <button type="button" class="btn btn-primary border-secondary rounded font-weight-bold">NFA Actions</button>
                                        </a>
                                    </div>
                                <?php } ?>
                                <div class="col-lg-12">
                                    <table class="table rs-table-bordered">
                                        <tbody>
                                            <!-- <tr>
                                                <td class="font-weight-bold" style="width: 40%;">Subject</td>
                                                <td><?php echo $mRecordBidContract['subject'] ?></td>
                                            </tr> -->
                                            <tr>
                                                <td class="font-weight-bold" style="width: 40%;">Budget With Escalation</td>
                                                <td><?php echo $mRecordBidContract['budget_with_escalation'] ?> Cr</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold" style="width: 40%;">Budget Without Escalation</td>
                                                <td><?php echo $mRecordBidContract['budget_without_escalation'] ?> Cr</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold" style="width: 40%;">Scope of Works</td>
                                                <td><?php echo $mRecordBidContract['scope_work'] ?></td>
                                            </tr>

                                            <tr>
                                                <td class='font-weight-bold' style="width: 350px;">Award Strategy</td>
                                                <td><?php echo $mRecordBidContract['award_strategy'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class='font-weight-bold' style="width: 350px;">Free Issue Material</td>
                                                <td><?php echo $mRecordBidContract['free_material'] ?> Cr</td>
                                            </tr>
                                            <tr>
                                                <td class='font-weight-bold' style="width: 350px;">Basic Rate Items</td>
                                                <td><?php echo $mRecordBidContract['basic_rate_items'] ?> Cr</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="d-block mt-4">
                                <h5 class="page-title br-0 font-weight-bold">Proposed Bidderlist for the Subject Works</h5>
                            </div>

                            <div class="table-responsive ">
                                <table class="table rs-table-bordered mb-0" id="t1">
                                    <thead class="bg-primary">
                                        <tr class='text-center'>
                                            <th>Sl. No.</th>
                                            <th>Name of Contractor</th>
                                            <th>Avg. Turn Over(Cr)</th>
                                            <th>BID Capacity (Cr)</th>
                                            <th>PQ/Feedback Score</th>
                                            <th>Bidder’s Category</th>
                                            <th>On-going/Completed</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        <?php

                                        foreach ($mRecordSubWorks as $key => $val) { 
                                            $slNo  = $key + 1;
                                            $name_contractor = $val->name_contractor;
                                            $avg_turn_over = $val->avg_turn_over;
                                            $bid_capacity = $val->bid_capacity;
                                            $score_type = $val->score_type;
                                            $score = $val->score;
                                            $bid_category = $val->bid_category;
                                            $ongoing_complete_project = $val->ongoing_complete_project;
                                        ?>
                                            <tr class='text-center'>
                                                <td><?php echo $slNo ?></td>
                                                <td><?php echo $name_contractor; ?> </td>
                                                <td><?php echo $avg_turn_over; ?> Cr</td>
                                                <td><?php echo $bid_capacity; ?> Cr</td>
                                                <td><?php echo $score_type. '<br>' .$score; ?></td>
                                                <td><?php echo $bid_category; ?></td>
                                                <td><?php echo $ongoing_complete_project; ?> Cr</td>
                                            </tr>
                                        <?php

                                        } ?>
                                    </tbody>
                                </table>
                            </div>
							
							<?php /*
                            <div class="d-block mt-4">
                                <h5 class="page-title br-0 font-weight-bold">Contractor Appointment Dates</h5>
                            </div>

                            <div class="table-responsive mt-4">

                                <table class="table rs-table-bordered mb-0">
                                    <thead>
                                        <tr class='text-center'>
                                            <th>Sr No.</th>
                                            <th colspan="2" style="width: 60%;">Contract Package – <?php echo $mRecordBidContract['contract_package_works_label']; ?></th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bidderList">
                                        <tr class='text-center'>
                                            <td></td>
                                            <td>Milestone on which contractor should be appointed <?php echo $mRecordBidContract['milestone_label']; ?></td>
                                            <td><?php echo $mRecordBidContract['contract_package_works_value']; ?></td>
                                            <td><?php echo $mRecordBidContract['contract_package_works_remarks']; ?></td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td></td>
                                            <td class="page-title font-weight-bold">Activity</td>
                                            <td class="page-title font-weight-bold">Dates</td>
                                            <td></td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>A</td>
                                            <td>Planned date of Contractor appointment As per BI Logic</td>
                                            <td>
                                                <?php echo $mRecordBidContract['activity_planned_date']; ?>
                                            </td>
                                            <td>
                                                <?php echo $mRecordBidContract['activity_planned_remarks']; ?>
                                            </td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>B</td>
                                            <td>Actual date as per current site progress</td>
                                            <td>
                                                <?php echo $mRecordBidContract['activity_actual_date']; ?>
                                            </td>
                                            <td>
                                                <?php echo $mRecordBidContract['activity_actual_remarks']; ?>
                                            </td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>C</td>
                                            <td>CBE of contractor Appointment</td>
                                            <td>
                                                <?php echo $mRecordBidContract['activity_cbe_date']; ?>
                                            </td>
                                            <td>
                                                <?php echo $mRecordBidContract['activity_cbe_remarks']; ?>
                                            </td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>D</td>
                                            <td>Delay in appointment</td>
                                            <td>
                                                <?php echo $mRecordBidContract['activity_delay']; ?>
                                            </td>
                                            <td>
                                                <?php echo $mRecordBidContract['activity_delay_remarks']; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
							*/ ?>
							
							
							
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
                                                <?php echo date("d-M-y", strtotime($mRecordBidContract['receipt_date']))
												//$mRecordBidContract['receipt_date'];
														?>
                                            </td>
                                            <td>
                                                <?php echo date("d-M-y", strtotime($mRecordBidContract['bidder_approval_date'])); //$mRecordBidContract['bidder_approval_date']; ?>
                                            </td>
                                            <td>
                                                <?php echo date("d-M-y", strtotime($mRecordBidContract['award_recomm_date'])) ; //$mRecordBidContract['award_recomm_date']; ?>
                                            </td>
                                            <td>
                                                <?php echo $mRecordBidContract['remarks_date']; ?>
                                            </td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>No of Days</td>
                                            <td>
                                                <?php echo $mRecordBidContract['receipt_days']; ?>
                                            </td>
                                            <td>
                                                <?php echo $mRecordBidContract['bidder_approval_days']; ?>
                                            </td>
                                            <td>
                                                <?php echo $mRecordBidContract['award_recomm_days']; ?>
                                            </td>
                                            <td>
                                                <?php echo $mRecordBidContract['remarks_days']; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                            <div class="row mt-4">

                                <div class="col-lg-12">
                                    <table class="table rs-table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold" style="width: 40%;">Reasons for Delay</td>
                                                <td><?php echo $mRecordBidContract['reasons_delay'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold" style="width: 40%;">Front Idling</td>
                                                <td><?php echo ($mRecordBidContract['front_idling'] == "yes") ? "Yes" : "No" ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold" style="width: 40%;">Current Status of Work at Site</td>
                                                <td><?php echo $mRecordBidContract['current_status_work'] ?></td>
                                            </tr>
                                            <?php
											/*
                                            foreach ($mRecordApproverDetails as $key => $val) {
                                                $approver_id  = $key;
                                                $level = $val['approver_level'];
                                                $approver_name = $val['approver_name'];
                                            ?>
                                                <tr>
                                                    <td class='font-weight-bold' style="width: 350px;">Level <?php echo $level; ?> Approver</td>
                                                    <td><?php echo $approver_name; ?> - <?php echo ($val['approved_status'] == 0) ? "Approval Pending" : "Approved" ?><br>
                                                        <?php
                                                        if ($val['approved_status'] == 1)
														{
															echo "<div style='border:1px solid;'>Remarks: ".$val['approved_remarks']."<br>";
                                                            echo "Approved Date: " . date("d-m-Y h:i:sa", strtotime($val['approved_date'])) . "<br></div>";
														}
                                                        if ($val['returned_text_status'] == 1) {
                                                            echo "<div style='border:1px solid;'>Returned for Text correction" . "<br>";
                                                            echo "Remarks: " . $val['returned_text_remarks'] . "<br>";
                                                            //echo "Returned Date for text correction: ".$val['returned_text_date']."<br>";
                                                            echo "Returned Date for text correction: " . date("d-m-Y h:i:sa", strtotime($val['returned_text_date'])) . "<br></div>";
                                                        }
                                                        if ($val['returned_by'] != 0) {

                                                            echo "<div style='border:1px solid;'>Returned NFA" . "<br>";
                                                            echo "Remarks: " . $val['returned_remarks'] . "<br>";
                                                            echo "Returned Date: " . date("d-m-Y h:i:sa", strtotime($val['returned_date'])) . "<br></div>";
                                                            //$date=date_create($val['returned_date']);
                                                            //echo date_format($date,"Y/m/d h:i:sa");
                                                        }
                                                        if ($val['amended_by'] != 0) {

                                                            echo "<div style='border:1px solid;'>Amended NFA" . "<br>";
                                                            echo "Remarks: " . $val['amended_remarks'] . "<br>";
                                                            echo "Amended Date: " . date("d-m-Y h:i:sa", strtotime($val['amended_date'])) . "<br></div>";
                                                        }
                                                        ?></td>
                                                </tr>
                                            <?php
                                            }

											*/ 
                                            ?>
                                            <!-- <tr>
                                                <td class='font-weight-bold' style="width: 350px;">Level1 Approver</td>
                                                <td>Approvel pending</td>
                                            </tr> -->
											
											
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
									 <?php if ($pgType == 'E') {
                                    ?>
                                        <div class="row mt-4">
                                            <div class="col-lg-12 text-center">
                                                <a href="<?php echo base_url('nfa/bidder_contractor_esign/esigned_pdf/' . $mId . "/E"); ?>" target="_blank">
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