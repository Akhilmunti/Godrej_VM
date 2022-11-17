<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('buyer/partials/header'); ?>

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
                                <div class="col-md-6">
                                    <h3 class="page-title br-0">Vendor Management</h3>
                                </div>
                                <div class="col-md-6 text-right">
<!--                                    <a href="<?php echo base_url('buyer/users/actionAdd'); ?>" class="btn btn-primary">Add User</a>-->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>SL No</th>
                                                        <th>Type Of Agency</th>
                                                        <th>Package name</th>
                                                        <th>Company Name</th>
                                                        <th>Financial Categorization</th>
                                                        <th>Date Assigned</th>
                                                        <th>Pending (no. of days)</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php if (!empty($mRecords)) { ?>

                                                        <?php
                                                        $mCount = 0;
                                                        foreach ($mRecords as $key => $mRecord) {
                                                            $mCount++;
                                                            if ($mRecord['pr']) {
                                                                $mPrRecord = $this->buyer->getParentByKey($mRecord['pr']);
                                                            } else {
                                                                $mPrRecord = "";
                                                            }
                                                            $mTows = json_decode($mRecord['consolidated_tows']);
                                                            $mAssignedDate = strtotime($mRecord['pr_date_added']);
                                                            $mAssignedDate = date("d-m-Y H:i:s", $mAssignedDate);

                                                            $mPendingDays = (strtotime(date("Y-m-d H:i:s")) - strtotime($mRecord['pr_date_added'])) / (60 * 60 * 24);

                                                            $mStageOneAdded = strtotime($mRecord['created_at']);
                                                            $mStageOneAdded = date("d-m-Y H:i:s", $mStageOneAdded);
                                                            if ($mRecord['pr']) {
                                                                $mPrRecord = $this->buyer->getParentByKey($mRecord['pr']);
                                                            } else {
                                                                $mPrRecord = "";
                                                            }

                                                            if ($mRecord['nature_of_business_id'] == 1) {
                                                                $mStageTwo = $this->vst->getParentByVendorKey($mRecord['id']);
                                                                $mPqScore = $this->pqv->getParentByVendorKey($mRecord['id']);
                                                                $mStageTwoAdded = strtotime($mStageTwo['stv_date_added']);
                                                                $mStageTwoAdded = date("d-m-Y H:i:s", $mStageTwoAdded);
                                                            } else if ($mRecord['nature_of_business_id'] == 3) {
                                                                $mStageTwo = $this->cst->getParentByVendorKey($mRecord['id']);
                                                                $mPqScore = $this->pqc->getParentByVendorKey($mRecord['id']);
                                                                $mStageTwoAdded = strtotime($mStageTwo['stc_date_added']);
                                                                $mStageTwoAdded = date("d-m-Y H:i:s", $mStageTwoAdded);
                                                            } else if ($mRecord['nature_of_business_id'] == 2) {
                                                                $mStageTwo = $this->const->getParentByVendorKey($mRecord['id']);
                                                                $mStageTwoAdded = strtotime($mStageTwo['stcon_date_added']);
                                                                $mStageTwoAdded = date("d-m-Y H:i:s", $mStageTwoAdded);
                                                                $mPqScore = array();
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $mCount; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if ($mRecord['nature_of_business_id'] == 1) { ?>
                                                                        <span class="text-bold">Vendor</span>
                                                                    <?php } else if ($mRecord['nature_of_business_id'] == 2) { ?>
                                                                        <span class="text-bold">Consultant</span>
                                                                    <?php } else if ($mRecord['nature_of_business_id'] == 3) { ?>
                                                                        <span class="text-bold">Contractor</span>
                                                                    <?php } else { ?>
                                                                        <span class="text-bold">Dealers</span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <?php foreach ($mTows as $key => $mTow) { ?>
                                                                        <span class="badge badge-primary"><?php echo $mTow; ?></span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $mRecord['company_name']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if ($mRecord['nature_of_business_id'] == 1) { ?>
                                                                        <?php if (empty($mStageTwo)) { ?>

                                                                            <?php
                                                                            //echo $mRecord['turn_over_of_last_3years'] * 0.5;
                                                                            if ($mRecord['turn_over_of_last_3years'] * 0.5 < 10) {
                                                                                echo "Very Small";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 10 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 50) {
                                                                                echo"Small";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 50 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 100) {
                                                                                echo "Medium";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 100 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 150) {
                                                                                echo "Large";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 150) {
                                                                                echo "Very Large";
                                                                            }
                                                                            ?>

                                                                        <?php } else { ?>

                                                                            <?php
                                                                            $mStageTwoTurn = json_decode($mStageTwo['stv_turnover']);
                                                                            $mStageTwoTurn = array_sum($mStageTwoTurn) / 4;
                                                                            $mStageTwoTurn = $mStageTwoTurn * 0.5;
                                                                            if ($mStageTwoTurn * 10000000 < 50000000) {
                                                                                echo "Very Small";
                                                                            } else if ($mStageTwoTurn * 10000000 > 50000000 && $mStageTwoTurn * 10000000 <= 250000000) {
                                                                                echo"Small";
                                                                            } else if ($mStageTwoTurn * 10000000 > 250000000 && $mStageTwoTurn * 10000000 <= 500000000) {
                                                                                echo "Medium";
                                                                            } else if ($mStageTwoTurn * 10000000 > 500000000 && $mStageTwoTurn * 10000000 <= 1000000000) {
                                                                                echo "Large";
                                                                            } else if ($mStageTwoTurn * 10000000 > 1000000000) {
                                                                                echo "Very Large";
                                                                            }
                                                                            ?>

                                                                        <?php } ?>
                                                                    <?php } else if ($mRecord['nature_of_business_id'] == 2) { ?>
                                                                        <?php if (empty($mStageTwo)) { ?>

                                                                            <?php
                                                                            //echo $mRecord['turn_over_of_last_3years'] * 0.5;
                                                                            if ($mRecord['turn_over_of_last_3years'] * 0.5 < 10) {
                                                                                echo "Very Small";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 10 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 50) {
                                                                                echo"Small";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 50 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 100) {
                                                                                echo "Medium";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 100 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 150) {
                                                                                echo "Large";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 150) {
                                                                                echo "Very Large";
                                                                            }
                                                                            ?>

                                                                        <?php } else { ?>

                                                                            <?php
                                                                            $mStageTwoTurn = json_decode($mStageTwo['stc_turnover']);
                                                                            $mStageTwoTurn = array_sum($mStageTwoTurn) / 4;
                                                                            $mStageTwoTurn = $mStageTwoTurn * 0.5;
                                                                            if ($mStageTwoTurn * 10000000 < 10000000) {
                                                                                echo "Very Small";
                                                                            } else if ($mStageTwoTurn * 10000000 > 10000000 && $mStageTwoTurn * 10000000 <= 500000000) {
                                                                                echo"Small";
                                                                            } else if ($mStageTwoTurn * 10000000 > 500000000 && $mStageTwoTurn * 10000000 <= 1000000000) {
                                                                                echo "Medium";
                                                                            } else if ($mStageTwoTurn * 10000000 > 1000000000 && $mStageTwoTurn * 10000000 <= 1500000000) {
                                                                                echo "Large";
                                                                            } else if ($mStageTwoTurn * 10000000 > 1500000000) {
                                                                                echo "Very Large";
                                                                            }
                                                                            ?>

                                                                        <?php } ?>
                                                                    <?php } else if ($mRecord['nature_of_business_id'] == 3) { ?>
                                                                        <?php if (empty($mStageTwo)) { ?>

                                                                            <?php
                                                                            //echo $mRecord['turn_over_of_last_3years'] * 0.5;
                                                                            if ($mRecord['turn_over_of_last_3years'] * 0.5 < 5) {
                                                                                echo "Very Small";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 5 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 25) {
                                                                                echo"Small";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 25 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 50) {
                                                                                echo "Medium";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 50 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 100) {
                                                                                echo "Large";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 100) {
                                                                                echo "Very Large";
                                                                            }
                                                                            ?>

                                                                        <?php } else { ?>

                                                                            <?php
                                                                            $mStageTwoTurn = json_decode($mStageTwo['stc_turnover']);
                                                                            $mStageTwoTurn = ($mStageTwoTurn[0] + $mStageTwoTurn[1] + $mStageTwoTurn[2]) / 3;
                                                                            $mStageTwoTurn = $mStageTwoTurn * 0.5;
                                                                            if ($mStageTwoTurn * 10000000 < 50000000) {
                                                                                echo "Very Small";
                                                                            } else if ($mStageTwoTurn * 10000000 > 50000000 && $mStageTwoTurn * 10000000 <= 250000000) {
                                                                                echo"Small";
                                                                            } else if ($mStageTwoTurn * 10000000 > 250000000 && $mStageTwoTurn * 10000000 <= 500000000) {
                                                                                echo "Medium";
                                                                            } else if ($mStageTwoTurn * 10000000 > 500000000 && $mStageTwoTurn * 10000000 <= 1000000000) {
                                                                                echo "Large";
                                                                            } else if ($mStageTwoTurn * 10000000 > 1000000000) {
                                                                                echo "Very Large";
                                                                            }
                                                                            ?>

                                                                        <?php } ?>
                                                                    <?php } else { ?>
                                                                        <?php if (empty($mStageTwo)) { ?>

                                                                            <?php
                                                                            //echo $mRecord['turn_over_of_last_3years'] * 0.5;
                                                                            if ($mRecord['turn_over_of_last_3years'] * 0.5 < 10) {
                                                                                echo "Very Small";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 10 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 50) {
                                                                                echo"Small";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 50 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 100) {
                                                                                echo "Medium";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 100 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 150) {
                                                                                echo "Large";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 150) {
                                                                                echo "Very Large";
                                                                            }
                                                                            ?>

                                                                        <?php } else { ?>

                                                                            <?php
                                                                            $mStageTwoTurn = json_decode($mStageTwo['stc_turnover']);
                                                                            $mStageTwoTurn = ($mStageTwoTurn[0] + $mStageTwoTurn[1] + $mStageTwoTurn[2]) / 3;
                                                                            $mStageTwoTurn = $mStageTwoTurn * 0.5;
                                                                            if ($mStageTwoTurn * 10000000 < 10000000) {
                                                                                echo "Very Small";
                                                                            } else if ($mStageTwoTurn * 10000000 > 10000000 && $mStageTwoTurn * 10000000 <= 500000000) {
                                                                                echo"Small";
                                                                            } else if ($mStageTwoTurn * 10000000 > 500000000 && $mStageTwoTurn * 10000000 <= 1000000000) {
                                                                                echo "Medium";
                                                                            } else if ($mStageTwoTurn * 10000000 > 1000000000 && $mStageTwoTurn * 10000000 <= 1500000000) {
                                                                                echo "Large";
                                                                            } else if ($mStageTwoTurn * 10000000 > 1500000000) {
                                                                                echo "Very Large";
                                                                            }
                                                                            ?>

                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </td>

                                                                <td>
                                                                    <span class="badge badge-primary"><?php echo $mAssignedDate; ?></span>
                                                                </td>

                                                                <td>
                                                                    <?php $mDays = round($mPendingDays, 0); ?>
                                                                    <?php if ($mDays >= 7) { ?>
                                                                        <span class="badge badge-warning">
                                                                            <b>
                                                                                <?php echo round($mPendingDays, 0) . " Days"; ?>
                                                                            </b>
                                                                        </span>
                                                                    <?php } else { ?>
                                                                        <span class="badge badge-default">
                                                                            <b>
                                                                                <?php echo round($mPendingDays, 0) . " Days"; ?>
                                                                            </b>
                                                                        </span>
                                                                    <?php } ?>
                                                                </td>

                                                                <td>
                                                                    <?php
                                                                    $mTows = json_decode($mRecord['consolidated_tows']);
                                                                    $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                                                                    foreach ($mTows as $key => $value) {
                                                                        if ($mRecord['nature_of_business_id'] == 2) {
                                                                            $mSiteReport = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                            $mSiteReportAdded = strtotime($mSiteReport['stcon_date_added']);
                                                                            $mSiteReportAdded = date("d-m-Y H:i:s", $mSiteReportAdded);
                                                                        } else if ($mRecord['nature_of_business_id'] == 3) {
                                                                            $mSiteReport = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                            $mSiteReportAdded = strtotime($mSiteReport['svrc_date_updated']);
                                                                            $mSiteReportAdded = date("d-m-Y H:i:s", $mSiteReportAdded);
                                                                        } else if ($mRecord['nature_of_business_id'] == 1) {
                                                                            $mSiteReport = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                            $mSiteReportAdded = strtotime($mSiteReport['svr_date_updated']);
                                                                            $mSiteReportAdded = date("d-m-Y H:i:s", $mSiteReportAdded);
                                                                        }
                                                                        ?>
                                                                        <?php if ($mRecord['nature_of_business_id'] == 1) { ?>
                                                                            <?php if (!empty($mSiteReport)) { ?>
                                                                                <a href="<?php echo base_url('buyer/vendor/editSiteVisitReport/' . $mSiteReport['svr_id']); ?>" class="btn btn-sm btn-primary btn-block">
                                                                                    View : <?php echo $value; ?> </br> Score : <?php echo $mSiteReport['svr_final_score']; ?> </br> Date : <?php echo $mSiteReportAdded; ?>
                                                                                </a>
                                                                            <?php } else { ?>
                                                                                <a href="<?php echo base_url('buyer/vendor/viewSiteReports/' . $mRecord['nature_of_business_id'] . "/" . $mRecord['id'] . "/" . $mTowsIds[$key]); ?>" class="btn btn-sm btn-secondary btn-block" style="color: #000000">
                                                                                    Generate Site Visit Assessment Report : <?php echo $value; ?>
                                                                                </a>
                                                                            <?php } ?>
                                                                        <?php } else if ($mRecord['nature_of_business_id'] == 2) { ?>
                                                                            <?php if (!empty($mSiteReport)) { ?>
                                                                                <a href="<?php echo base_url('buyer/vendor/editConsultantSiteVisitReport/' . $mSiteReport['csvr_id']); ?>" class="btn btn-sm btn-primary btn-block">
                                                                                    View : <?php echo $value; ?> </br> Score : <?php echo $mSiteReport['csvr_final_score']; ?> </br> Date : <?php echo $mSiteReportAdded; ?>
                                                                                </a>
                                                                            <?php } else { ?>
                                                                                <a href="<?php echo base_url('buyer/vendor/viewSiteReports/' . $mRecord['nature_of_business_id'] . "/" . $mRecord['id'] . "/" . $mTowsIds[$key]); ?>" class="btn btn-sm btn-secondary btn-block" style="color: #000000">
                                                                                    Generate Site Visit Assessment Report : <?php echo $value; ?>
                                                                                </a>
                                                                            <?php } ?>
                                                                        <?php } else if ($mRecord['nature_of_business_id'] == 3) { ?>
                                                                            <?php if (!empty($mSiteReport)) { ?>
                                                                                <a href="<?php echo base_url('buyer/vendor/editContractorSiteVisitReport/' . $mSiteReport['svrc_id']); ?>" class="btn btn-sm btn-primary btn-block">
                                                                                    View : <?php echo $value; ?> </br> Score : <?php echo $mSiteReport['svrc_final_score']; ?> </br> Date : <?php echo $mSiteReportAdded; ?>
                                                                                </a>
                                                                            <?php } else { ?>
                                                                                <a href="<?php echo base_url('buyer/vendor/viewSiteReports/' . $mRecord['nature_of_business_id'] . "/" . $mRecord['id'] . "/" . $mTowsIds[$key]); ?>" class="btn btn-sm btn-secondary btn-block" style="color: #000000">
                                                                                    Generate Site Visit Assessment Report : <?php echo $value; ?>
                                                                                </a>
                                                                            <?php } ?>
                                                                        <?php } ?>

                                                                    <?php } ?>

                                                                </td>
                                                            </tr>
                                                        <?php } ?>

                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>  
                                    </div>
                                </div>
                                <!-- /.box -->
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

        </div>
        <!-- ./wrapper -->

        <?php $this->load->view('buyer/partials/scripts'); ?>

    </body>
</html>