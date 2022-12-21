<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('buyer/partials/header'); ?>

    <body class="hold-transition light-skin sidebar-mini theme-blueindigo onlyheader">

        <div class="wrapper">

            <style>
                tbody a:hover{
                    color: #ffffff !important;
                }

                .btn-dark:hover{
                    color: #000000 !important;
                }
            </style>

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
<!--                                                        <th>Email</th>-->
                                                        <th>Financial Categorization</th>
                                                        <th>Status</th>
                                                        <th>Stage-1 form</th>
                                                        <th>Stage-2 form</th>
                                                        <th>Site Visit Report</th>
                                                        <th>PQ Score</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php if (!empty($mRecords)) { ?>

                                                        <?php
                                                        $mCount = 0;
                                                        foreach ($mRecords as $key => $mRecord) {
                                                            $mCount++;
                                                            $mStageOneAdded = strtotime($mRecord['created_at']);
                                                            $mStageOneAdded = date("d-m-Y H:i:s", $mStageOneAdded);
                                                            if ($mRecord['pr']) {
                                                                $mPrRecord = $this->buyer->getParentByKey($mRecord['pr']);
                                                            } else {
                                                                $mPrRecord = "";
                                                            }
                                                            $mCheckInPre = $this->pre_model->check($mRecord['pan']);
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

                                                            $mGetWork = $this->buyer->getTypeOfWork($mRecord['type_of_work_id']);

                                                            if ($mRecord['tranferred_to']) {
                                                                $mTranTo = $this->buyer->getParentByKey($mRecord['tranferred_to']);
                                                            } else {
                                                                $mTranTo = "";
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
                                                                    <?php
                                                                    $mTows = json_decode($mRecord['consolidated_tows']);
                                                                    $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                                                                    foreach ($mTows as $key => $value) {
                                                                        ?>
                                                                        <span class="badge badge-primary"><?php echo $value; ?></span>
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
                                                                    <?php if (empty($mCheckInPre)) { ?>
                                                                        <?php if ($mRecord['active'] == 0) { ?>
                                                                            <span class="badge badge-dark">Stage-1 form Received</span>
                                                                        <?php } else if ($mRecord['active'] == 1) { ?>
                                                                            <?php if (!empty($mStageTwo)) { ?> 
                                                                                <span class="badge badge-dark">Stage-2 form Received</span>
                                                                            <?php } else { ?>
                                                                                <span class="badge badge-primary">Accepted stage-1 form</span>
                                                                            <?php } ?>
                                                                        <?php } else if ($mRecord['active'] == 2) { ?>
                                                                            <span class="badge badge-primary">Accepted stage-2 form</span>
                                                                        <?php } else if ($mRecord['active'] == 7) { ?>
                                                                            <span class="badge badge-dark">Returned stage-1 form</span>
                                                                        <?php } else if ($mRecord['active'] == 8) { ?>
                                                                            <span class="badge badge-dark">Returned stage-2 form</span>
                                                                        <?php } else if ($mRecord['active'] == 9) { ?>
                                                                            <span class="badge badge-primary">Rejected stage-1 form</span>
                                                                        <?php } else if ($mRecord['active'] == 10) { ?>
                                                                            <span class="badge badge-primary">Rejected stage-2 form</span>
                                                                        <?php } ?>
                                                                    <?php } else { ?>
                                                                        Not Applicable
                                                                    <?php } ?>
                                                                </td>

                                                                <td>
                                                                    <span class="badge badge-primary mb-3">Date : <?php echo $mStageOneAdded; ?></span>
                                                                    <a href="<?php echo base_url('buyer/vendor/getStageOneData/' . $mRecord['id'] . "/" . "view"); ?>" class="btn btn-sm btn-block btn-info">View</a>
        <!--                                                                    <a href="<?php echo base_url('buyer/vendor/getStageOneData/' . $mRecord['id'] . "/" . "edit"); ?>" class="btn btn-sm btn-block btn-info">Edit Stage One</a>-->

                                                                </td>

                                                                <td>

                                                                    <?php if ($mRecord['pre_type'] == 1) { ?>
                                                                        <span class="btn btn-sm btn-block btn-info mb-3">Pre Vendor</span>
                                                                    <?php } else { ?>
                                                                        <?php if (!empty($mStageTwo)) { ?>
                                                                            <span class="badge badge-primary mb-3">Date : <?php echo $mStageTwoAdded; ?></span>
                                                                            <a href="<?php echo base_url('buyer/vendor/getStageTwoData/' . $mRecord['id'] . "/" . "view" . "/" . $mRecord['nature_of_business_id']); ?>" class="btn btn-sm btn-block btn-info">View</a>
                                                                        <?php } ?>
                                                                    <?php } ?>

                                                                </td>

                                                                <td width="10%">
                                                                    <?php if ($mRecord['pre_type'] == 0) { ?>
                                                                        <?php if ($mRecord['is_small'] == 0) { ?>

                                                                            <?php if ($mRecord['active'] == 2) { ?>
                                                                                <?php if ($mRecord['pr'] == "") { ?>
                                                                                    <select onchange="getSelectedPr(this, '<?php echo $mRecord['id'] ?>');" id="select_pr_<?php echo $mRecord['buyer_id']; ?>" class="form-control form-control-sm mt-2" name="pr">
                                                                                        <option selected="" value="">Select Project Manager</option>
                                                                                        <?php foreach ($mPrs as $key => $mPr) { ?>
                                                                                            <option value="<?php echo $mPr['buyer_id'] ?>"><?php echo $mPr['buyer_name'] ?></option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                <?php } else { ?>
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
                                                                                                <a href="<?php echo base_url('buyer/vendor/editSiteVisitReport/' . $mSiteReport['svr_id']); ?>" class="badge badge-primary mb-2">
                                                                                                    View : <?php echo $value; ?> </br> Score : <?php echo $mSiteReport['svr_final_score']; ?> </br> Date : <?php echo $mSiteReportAdded; ?>
                                                                                                </a>
                                                                                            <?php } else { ?>
                                                                                                <span class="badge badge-dark">
                                                                                                    Pending : <?php echo $value; ?>
                                                                                                </span>
                                                                                            <?php } ?>
                                                                                        <?php } else if ($mRecord['nature_of_business_id'] == 2) { ?>
                                                                                            <?php if (!empty($mSiteReport)) { ?>
                                                                                                <a href="<?php echo base_url('buyer/vendor/editConsultantSiteVisitReport/' . $mSiteReport['csvr_id']); ?>" class="badge badge-primary mb-2">
                                                                                                    View : <?php echo $value; ?> </br> Score : <?php echo $mSiteReport['csvr_final_score']; ?> </br> Date : <?php echo $mSiteReportAdded; ?>
                                                                                                </a>
                                                                                            <?php } else { ?>
                                                                                                <span class="badge badge-dark">
                                                                                                    Pending : <?php echo $value; ?>
                                                                                                </span>
                                                                                            <?php } ?>
                                                                                        <?php } else if ($mRecord['nature_of_business_id'] == 3) { ?>
                                                                                            <?php if (!empty($mSiteReport)) { ?>
                                                                                                <a href="<?php echo base_url('buyer/vendor/editContractorSiteVisitReport/' . $mSiteReport['svrc_id']); ?>" class="badge badge-primary mb-2">
                                                                                                    View : <?php echo $value; ?> </br> Score : <?php echo $mSiteReport['svrc_final_score']; ?> </br> Date : <?php echo $mSiteReportAdded; ?>
                                                                                                </a>
                                                                                            <?php } else { ?>
                                                                                                <span class="badge badge-dark">
                                                                                                    Pending : <?php echo $value; ?>
                                                                                                </span>
                                                                                            <?php } ?>
                                                                                        <?php } ?>

                                                                                    <?php } ?>
                                                                                <?php } ?>
                                                                            <?php } ?>

                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </td>

                                                                <td>
                                                                    <?php if ($mRecord['pre_type'] == 0) { ?>
                                                                        <?php if ($mRecord['is_small'] == 0) { ?>

                                                                            <?php if ($mRecord['active'] == 2) { ?>
                                                                                <?php if ($mRecord['svr_id'] || $mRecord['csvr_id'] || $mRecord['svrc_id']) { ?>
                                                                                    <?php
                                                                                    $mTows = json_decode($mRecord['consolidated_tows']);
                                                                                    $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                                                                                    foreach ($mTows as $key => $value) {
                                                                                        if ($mRecord['nature_of_business_id'] == 1) {
                                                                                            $mPqScore = $this->pqv->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                                            $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                                                                                            $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                                                                            $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                                        } else if ($mRecord['nature_of_business_id'] == 3) {
                                                                                            $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                                            $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                                                                                            $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                                                                            $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                                        } else if ($mRecord['nature_of_business_id'] == 2) {
                                                                                            $mPqScore = array();
                                                                                        }
                                                                                        ?>
                                                                                        <?php if ($mRecord['nature_of_business_id'] == 1) { ?>

                                                                                            <?php if (!empty($mSiteReportCheck)) { ?>
                                                                                                <?php if (!empty($mPqScore)) { ?>
                                                                                                    <a href="<?php echo base_url('buyer/vendor/editPqScore/' . $mPqScore['pqv_id'] . "/" . $mRecord['id']); ?>" class="badge badge-<?php
                                                                                                    if ($mPqScore['pqv_total'] >= 50) {
                                                                                                        echo 'success';
                                                                                                    } else {
                                                                                                        echo 'danger';
                                                                                                    }
                                                                                                    ?> mb-2">
                                                                                                        View : <?php echo $value; ?> </br> Score : <?php echo $mPqScore['pqv_total']; ?> </br> Date : <?php echo $mPqScoreAdded; ?>
                                                                                                    </a>
                                                                                                <?php } else { ?>
                                                                                                    <a href="<?php echo base_url('buyer/vendor/addPqScore/' . $mRecord['id'] . "/" . $mRecord['nature_of_business_id'] . "/" . $mTowsIds[$key]); ?>" class="btn btn-primary btn-sm mb-2">
                                                                                                        Generate : <?php echo $value; ?>
                                                                                                    </a>
                                                                                                <?php } ?>

                                                                                            <?php } else { ?>
                                                                                                <?php if (!empty($mPqScore)) { ?>
                                                                                                    <a href="<?php echo base_url('buyer/vendor/editPqScore/' . $mPqScore['pqv_id'] . "/" . $mRecord['id']); ?>" class="badge badge-<?php
                                                                                                    if ($mPqScore['pqv_total'] >= 50) {
                                                                                                        echo 'primary';
                                                                                                    } else {
                                                                                                        echo 'danger';
                                                                                                    }
                                                                                                    ?> mb-2">
                                                                                                        View : <?php echo $value; ?> </br> Score : <?php echo $mPqScore['pqv_total']; ?> </br> Date : <?php echo $mPqScoreAdded; ?>
                                                                                                    </a>
                                                                                                <?php } else { ?>
                                                                                                    <a href="#" class="btn btn-dark btn-sm mb-2">
                                                                                                        Pending : <?php echo $value; ?>
                                                                                                    </a>
                                                                                                <?php } ?>
                                                                                            <?php } ?>
                                                                                        <?php } else if ($mRecord['nature_of_business_id'] == 2) { ?>
                                                                                            <?php if (!empty($mPqScore)) { ?>
                                                                                                <a href="<?php echo base_url('buyer/vendor/editConsultantSiteVisitReport/' . $mSiteReport['csvr_id']); ?>" class="badge badge-<?php
                                                                                                if ($mPqScore['pqv_total'] >= 50) {
                                                                                                    echo 'primary';
                                                                                                } else {
                                                                                                    echo 'danger';
                                                                                                }
                                                                                                ?> mb-2">
                                                                                                    View : <?php echo $value; ?> </br> Score : <?php echo $mPqScore['pqc_total']; ?> </br> Date : <?php echo $mPqScoreAdded; ?>
                                                                                                </a>
                                                                                            <?php } else { ?>
                                                                                                <a href="<?php echo base_url('buyer/vendor/viewSiteReports/' . $mRecord['nature_of_business_id'] . "/" . $mRecord['id'] . "/" . $mTowsIds[$key]); ?>" class="btn btn-dark btn-sm mb-2">
                                                                                                    Generate : <?php echo $value; ?>
                                                                                                </a>
                                                                                            <?php } ?>
                                                                                        <?php } else if ($mRecord['nature_of_business_id'] == 3) { ?>
                                                                                            <?php if (!empty($mSiteReportCheck)) { ?>
                                                                                                <?php if (!empty($mPqScore)) { ?>
                                                                                                    <a href="<?php echo base_url('buyer/vendor/editPqcScore/' . $mPqScore['pqc_id'] . "/" . $mRecord['id']); ?>" class="badge badge-<?php
                                                                                                    if ($mPqScore['pqc_total'] >= 50) {
                                                                                                        echo 'success';
                                                                                                    } else {
                                                                                                        echo 'danger';
                                                                                                    }
                                                                                                    ?> mb-2">
                                                                                                        View : <?php echo $value; ?> </br> Score : <?php echo $mPqScore['pqc_total']; ?> </br> Date : <?php echo $mPqScoreAdded; ?>
                                                                                                    </a>
                                                                                                <?php } else { ?>
                                                                                                    <a href="<?php echo base_url('buyer/vendor/addPqScore/' . $mRecord['id'] . "/" . $mRecord['nature_of_business_id'] . "/" . $mTowsIds[$key]); ?>" class="btn btn-primary btn-sm mb-2">
                                                                                                        Generate : <?php echo $value; ?>
                                                                                                    </a>
                                                                                                <?php } ?>

                                                                                            <?php } else { ?>
                                                                                                <?php if (!empty($mPqScore)) { ?>
                                                                                                    <a href="<?php echo base_url('buyer/vendor/editPqcScore/' . $mPqScore['pqc_id'] . "/" . $mRecord['id']); ?>" class="badge badge-<?php
                                                                                                    if ($mPqScore['pqc_total'] >= 50) {
                                                                                                        echo 'primary';
                                                                                                    } else {
                                                                                                        echo 'danger';
                                                                                                    }
                                                                                                    ?> mb-2">
                                                                                                        View : <?php echo $value; ?> </br> Score : <?php echo $mPqScore['pqc_total']; ?> </br> Date : <?php echo $mPqScoreAdded; ?>
                                                                                                    </a>
                                                                                                <?php } else { ?>
                                                                                                    <a href="#" class="btn btn-dark btn-sm mb-2">
                                                                                                        Pending : <?php echo $value; ?>
                                                                                                    </a>
                                                                                                <?php } ?>
                                                                                            <?php } ?>
                                                                                        <?php } ?>

                                                                                    <?php } ?>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        <?php } else { ?>
                                                                            <?php if ($mRecord['active'] == 2) { ?>
                                                                                <?php
                                                                                $mTows = json_decode($mRecord['consolidated_tows']);
                                                                                $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                                                                                foreach ($mTows as $key => $value) {
                                                                                    if ($mRecord['nature_of_business_id'] == 1) {
                                                                                        $mPqScore = $this->pqv->getParentByVendorKey($mRecord['id']);
                                                                                        $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                                                                                        $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                                                                        $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                                    } else if ($mRecord['nature_of_business_id'] == 3) {
                                                                                        $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                                        $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                                                                                        $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                                                                        $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                                    } else if ($mRecord['nature_of_business_id'] == 2) {
                                                                                        $mPqScore = array();
                                                                                    }
                                                                                    ?>
                                                                                    <?php if ($mRecord['nature_of_business_id'] == 1) { ?>

                                                                                        <?php if (!empty($mSiteReportCheck)) { ?>
                                                                                            <?php if (!empty($mPqScore)) { ?>
                                                                                                <a href="<?php echo base_url('buyer/vendor/editPqScore/' . $mPqScore['pqv_id'] . "/" . $mRecord['id']); ?>" class="badge badge-<?php
                                                                                                if ($mPqScore['pqv_total'] >= 50) {
                                                                                                    echo 'success';
                                                                                                } else {
                                                                                                    echo 'danger';
                                                                                                }
                                                                                                ?> mb-2">
                                                                                                    View : <?php echo $value; ?> </br> Score : <?php echo $mPqScore['pqv_total']; ?> </br> Date : <?php echo $mPqScoreAdded; ?>
                                                                                                </a>
                                                                                            <?php } else { ?>
                                                                                                <a href="<?php echo base_url('buyer/vendor/addPqScore/' . $mRecord['id'] . "/" . $mRecord['nature_of_business_id'] . "/" . $mTowsIds[$key]); ?>" class="btn btn-primary btn-sm">
                                                                                                    Generate : <?php echo $value; ?>
                                                                                                </a>
                                                                                            <?php } ?>

                                                                                        <?php } else { ?>
                                                                                            <?php if (!empty($mPqScore)) { ?>
                                                                                                <a href="<?php echo base_url('buyer/vendor/editPqScore/' . $mPqScore['pqv_id'] . "/" . $mRecord['id']); ?>" class="badge badge-<?php
                                                                                                if ($mPqScore['pqv_total'] >= 50) {
                                                                                                    echo 'primary';
                                                                                                } else {
                                                                                                    echo 'danger';
                                                                                                }
                                                                                                ?> mb-2">
                                                                                                    View : <?php echo $value; ?> </br> Score : <?php echo $mPqScore['pqv_total']; ?> </br> Date : <?php echo $mPqScoreAdded; ?>
                                                                                                </a>
                                                                                            <?php } else { ?>
                                                                                                <a href="#" class="btn btn-dark btn-sm">
                                                                                                    Pending : <?php echo $value; ?>
                                                                                                </a>
                                                                                            <?php } ?>

                                                                                        <?php } ?>
                                                                                    <?php } else if ($mRecord['nature_of_business_id'] == 2) { ?>
                                                                                        <?php if (!empty($mPqScore)) { ?>
                                                                                            <a href="<?php echo base_url('buyer/vendor/editConsultantSiteVisitReport/' . $mSiteReport['csvr_id']); ?>" class="badge badge-<?php
                                                                                            if ($mPqScore['pqv_total'] >= 50) {
                                                                                                echo 'primary';
                                                                                            } else {
                                                                                                echo 'danger';
                                                                                            }
                                                                                            ?> mb-2">
                                                                                                View : <?php echo $value; ?> </br> Score : <?php echo $mPqScore['pqc_total']; ?> </br> Date : <?php echo $mPqScoreAdded; ?>
                                                                                            </a>
                                                                                        <?php } else { ?>
                                                                                            <a href="<?php echo base_url('buyer/vendor/viewSiteReports/' . $mRecord['nature_of_business_id'] . "/" . $mRecord['id'] . "/" . $mTowsIds[$key]); ?>" class="btn btn-dark btn-sm">
                                                                                                Generate : <?php echo $value; ?>
                                                                                            </a>
                                                                                        <?php } ?>
                                                                                    <?php } else if ($mRecord['nature_of_business_id'] == 3) { ?>
                                                                                        <?php if (!empty($mPqScore)) { ?>
                                                                                            <a href="<?php echo base_url('buyer/vendor/editPqcScore/' . $mPqScore['pqc_id'] . "/" . $mRecord['id']); ?>" class="badge badge-<?php
                                                                                            if ($mPqScore['pqc_total'] >= 25) {
                                                                                                echo 'success';
                                                                                            } else {
                                                                                                echo 'danger';
                                                                                            }
                                                                                            ?> mb-2">
                                                                                                View : <?php echo $value; ?> </br> Score : <?php echo $mPqScore['pqc_total']; ?> </br> Date : <?php echo $mPqScoreAdded; ?>
                                                                                            </a>
                                                                                        <?php } else { ?>
                                                                                            <a href="<?php echo base_url('buyer/vendor/addPqScore/' . $mRecord['id'] . "/" . $mRecord['nature_of_business_id'] . "/" . $mTowsIds[$key]); ?>" class="btn btn-primary btn-sm">
                                                                                                Generate : <?php echo $value; ?>
                                                                                            </a>
                                                                                        <?php } ?>
                                                                                    <?php } ?>

                                                                                <?php } ?>
                                                                            <?php } ?>



                                                                        <?php } ?>

                                                                    <?php } else { ?>
                                                                        <?php if ($mRecord['active'] == 2) { ?>
                                                                            <?php
                                                                            $mTows = json_decode($mRecord['consolidated_tows']);
                                                                            $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                                                                            foreach ($mTows as $key => $value) {
                                                                                if ($mRecord['nature_of_business_id'] == 1) {
                                                                                    $mPqScore = $this->pqv->getParentByVendorKey($mRecord['id']);
                                                                                    $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                                                                                    $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                                                                    $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                                } else if ($mRecord['nature_of_business_id'] == 3) {
                                                                                    $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                                    $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                                                                                    $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                                                                    $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                                } else if ($mRecord['nature_of_business_id'] == 2) {
                                                                                    $mPqScore = array();
                                                                                }
                                                                                ?>
                                                                                <?php if ($mRecord['nature_of_business_id'] == 1) { ?>

                                                                                    <?php if (!empty($mSiteReportCheck)) { ?>
                                                                                        <?php if (!empty($mPqScore)) { ?>
                                                                                            <a href="#" class="badge pre-loaded-pq badge-<?php
                                                                                            if ($mPqScore['pqv_total'] >= 50) {
                                                                                                echo 'success';
                                                                                            } else {
                                                                                                echo 'danger';
                                                                                            }
                                                                                            ?> mb-2">
                                                                                                View : <?php echo $value; ?> </br> Score : <?php echo $mPqScore['pqv_total']; ?> </br> Date : <?php echo $mPqScoreAdded; ?>
                                                                                            </a>
                                                                                        <?php } else { ?>
                                                                                            <a href="<?php echo base_url('buyer/vendor/addPqScore/' . $mRecord['id'] . "/" . $mRecord['nature_of_business_id'] . "/" . $mTowsIds[$key]); ?>" class="btn btn-primary btn-sm">
                                                                                                Generate : <?php echo $value; ?>
                                                                                            </a>
                                                                                        <?php } ?>

                                                                                    <?php } else { ?>
                                                                                        <?php if (!empty($mPqScore)) { ?>
                                                                                            <a href="#" class="badge pre-loaded-pq badge-<?php
                                                                                            if ($mPqScore['pqv_total'] >= 50) {
                                                                                                echo 'primary';
                                                                                            } else {
                                                                                                echo 'danger';
                                                                                            }
                                                                                            ?> mb-2">
                                                                                                View : <?php echo $value; ?> </br> Score : <?php echo $mPqScore['pqv_total']; ?> </br> Date : <?php echo $mPqScoreAdded; ?>
                                                                                            </a>
                                                                                        <?php } else { ?>
                                                                                            <a href="#" class="btn btn-dark btn-sm">
                                                                                                Pending : <?php echo $value; ?>
                                                                                            </a>
                                                                                        <?php } ?>

                                                                                    <?php } ?>
                                                                                <?php } else if ($mRecord['nature_of_business_id'] == 2) { ?>
                                                                                    <?php if (!empty($mPqScore)) { ?>
                                                                                        <a href="#" class="badge pre-loaded-pq badge-<?php
                                                                                        if ($mPqScore['pqv_total'] >= 50) {
                                                                                            echo 'primary';
                                                                                        } else {
                                                                                            echo 'danger';
                                                                                        }
                                                                                        ?> mb-2">
                                                                                            View : <?php echo $value; ?> </br> Score : <?php echo $mPqScore['pqc_total']; ?> </br> Date : <?php echo $mPqScoreAdded; ?>
                                                                                        </a>
                                                                                    <?php } else { ?>
                                                                                        <a href="<?php echo base_url('buyer/vendor/viewSiteReports/' . $mRecord['nature_of_business_id'] . "/" . $mRecord['id'] . "/" . $mTowsIds[$key]); ?>" class="btn btn-dark btn-sm">
                                                                                            Generate : <?php echo $value; ?>
                                                                                        </a>
                                                                                    <?php } ?>
                                                                                <?php } else if ($mRecord['nature_of_business_id'] == 3) { ?>
                                                                                    <?php if (!empty($mPqScore)) { ?>
                                                                                        <a href="#" class="badge pre-loaded-pq badge-<?php
                                                                                        if ($mPqScore['pqc_total'] >= 25) {
                                                                                            echo 'success';
                                                                                        } else {
                                                                                            echo 'danger';
                                                                                        }
                                                                                        ?> mb-2">
                                                                                            View : <?php echo $value; ?> </br> Score : <?php echo $mPqScore['pqc_total']; ?> </br> Date : <?php echo $mPqScoreAdded; ?>
                                                                                        </a>
                                                                                    <?php } else { ?>
                                                                                        <a href="<?php echo base_url('buyer/vendor/addPqScore/' . $mRecord['id'] . "/" . $mRecord['nature_of_business_id'] . "/" . $mTowsIds[$key]); ?>" class="btn btn-primary btn-sm">
                                                                                            Generate : <?php echo $value; ?>
                                                                                        </a>
                                                                                    <?php } ?>
                                                                                <?php } ?>

                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </td>

                                                                <td>

                                                                    <?php if ($mRecord['active'] == 0) { ?>
                                                                        <a href="<?php echo base_url('buyer/vendor/actionChangeStatusTran/accept/' . $mRecord['id']); ?>" class="btn btn-sm btn-block btn-primary">
                                                                            Approve Stage One
                                                                        </a>
                                                                        <a href="<?php echo base_url('buyer/vendor/actionChangeStatusTran/reject/' . $mRecord['id']); ?>" class="btn btn-sm btn-block btn-danger">
                                                                            Reject Stage One
                                                                        </a>
                                                                        <a href"#" data-toggle="modal" data-target="#returnModel_<?php echo $mRecord['id']; ?>" class="btn btn-sm btn-block btn-dark text-white">
                                                                            Return Stage One
                                                                        </a>
                                                                        <!-- The Modal -->
                                                                        <div class="modal modal-right fade" id="returnModel_<?php echo $mRecord['id']; ?>" tabindex="-1">
                                                                            <form action="<?php echo base_url('buyer/vendor/actionChangeStatusTran/returnStageOne/' . $mRecord['id']); ?>" method="POST">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title">Return Stage One : <?php echo $mRecord['company_name']; ?> </h5>
                                                                                            <button type="button" class="close" data-dismiss="modal">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <textarea class="form-control" required="" rows="17" name="stage_one_return_remarks"><?php echo $mRecord['stage_one_return_remarks']; ?></textarea>
                                                                                        </div>
                                                                                        <div class="modal-footer modal-footer-uniform">
                                                                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                                                                            <button type="submit" class="btn btn-primary float-right">Return</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    <?php } else if ($mRecord['active'] == 1) { ?>
                                                                        <?php if (!empty($mStageTwo)) { ?>    
                                                                            <a href="<?php echo base_url('buyer/vendor/actionChangeStatusTwoTran/accept/' . $mRecord['id']); ?>" class="btn btn-sm btn-block btn-primary">
                                                                                Approve Stage Two
                                                                            </a>
                                                                            <a href="<?php echo base_url('buyer/vendor/actionChangeStatusTwoTran/reject/' . $mRecord['id']); ?>" class="btn btn-sm btn-block btn-danger">
                                                                                Reject Stage Two
                                                                            </a>
                                                                            <a href"#" data-toggle="modal" data-target="#returnModelTwo_<?php echo $mRecord['id']; ?>" class="btn btn-sm btn-block btn-dark text-white">
                                                                                Return Stage Two
                                                                            </a>
                                                                            <!-- The Modal -->
                                                                            <div class="modal modal-right fade" id="returnModelTwo_<?php echo $mRecord['id']; ?>" tabindex="-1">
                                                                                <form action="<?php echo base_url('buyer/vendor/actionChangeStatusTwoTran/returnStageTwo/' . $mRecord['id']); ?>" method="POST">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title">Return Stage Two : <?php echo $mRecord['company_name']; ?> </h5>
                                                                                                <button type="button" class="close" data-dismiss="modal">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <textarea class="form-control" required="" rows="17" name="stage_two_return_remarks"><?php echo $mRecord['stage_two_return_remarks']; ?></textarea>
                                                                                            </div>
                                                                                            <div class="modal-footer modal-footer-uniform">
                                                                                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                                                                                <button type="submit" class="btn btn-primary float-right">Return</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        <?php } ?>
                                                                    <?php } else if ($mRecord['active'] == 9) { ?>
                                                                        <a href="<?php echo base_url('buyer/vendor/actionChangeStatusTran/accept/' . $mRecord['id']); ?>" class="btn btn-sm btn-block btn-primary">
                                                                            Approve Stage One
                                                                        </a>
                                                                    <?php } else if ($mRecord['active'] == 2) { ?>

                                                                        <?php if ($mRecord['is_small'] == 1 || $mRecord['pre_type'] == 1) { ?>
                                                                            <?php
                                                                            $mTows = json_decode($mRecord['consolidated_tows']);
                                                                            $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                                                                            $mRecordCheck = 0;
                                                                            foreach ($mTows as $key => $value) {
                                                                                if ($mRecord['nature_of_business_id'] == 1) {
                                                                                    $mPqScore = $this->pqv->getParentByVendorKey($mRecord['id']);
                                                                                    if (!empty($mPqScore)) {
                                                                                        $mRecordCheck++;
                                                                                    }
                                                                                    $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                                                                                    $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                                                                    $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                                } else if ($mRecord['nature_of_business_id'] == 3) {
                                                                                    $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                                    $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                                                                                    $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                                                                    $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                                    if (!empty($mPqScore)) {
                                                                                        $mRecordCheck++;
                                                                                    }
                                                                                } else if ($mRecord['nature_of_business_id'] == 2) {
                                                                                    $mPqScore = array();
                                                                                }
                                                                                ?>
                                                                            <?php } ?>

                                                                            <?php if ($mRecordCheck > 0) { ?>
                                                                                <a href="#" class="btn btn-sm btn-block btn-primary">
                                                                                    PQ Completed
                                                                                </a>
                                                                            <?php } else { ?>
                                                                                <a href="#" class="btn btn-sm btn-block btn-danger">
                                                                                    PQ Pending
                                                                                </a>
                                                                            <?php } ?>

                                                                        <?php } else { ?>
                                                                            <?php
                                                                            $mTows = json_decode($mRecord['consolidated_tows']);
                                                                            $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                                                                            foreach ($mTows as $key => $value) {
                                                                                if ($mRecord['nature_of_business_id'] == 1) {
                                                                                    $mPqScore = $this->pqv->getParentByVendorKey($mRecord['id']);
                                                                                    $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                                                                                    $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                                                                    $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                                } else if ($mRecord['nature_of_business_id'] == 3) {
                                                                                    $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                                    $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                                                                                    $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                                                                    $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                                } else if ($mRecord['nature_of_business_id'] == 2) {
                                                                                    $mPqScore = array();
                                                                                }
                                                                                ?>

                                                                            <?php } ?>

                                                                            <?php if (!empty($mPqScore)) { ?>
                                                                                <a href="#" class="btn btn-sm btn-block btn-primary">
                                                                                    PQ Completed
                                                                                </a>
                                                                            <?php } else { ?>
                                                                                <a href="#" class="btn btn-sm btn-block btn-primary">
                                                                                    Site visit report pending
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

        <script type="text/javascript">
            function getSelectedPr(sel, selectedId) {
                if (confirm('Please confirm your selection')) {
                    // Save it!
                    var selectedPr = sel.value;
                    $.post("<?php echo base_url('buyer/vendor/makePrTran'); ?>",
                            {
                                buyer_id: selectedId,
                                pr: selectedPr,
                            },
                            function (data, status) {
                                if (data == "1") {
                                    location.reload();
                                } else {
                                    alert("Something went wrong, Please try again later.");
                                }
                            });
                } else {
                    // Do nothing!
                    console.log('Thing was not saved to the database.');
                }
            }

            $('.pre-loaded-pq').click(function () {
                alert("Pre-Loaded PQ data.");
            });
        </script>

    </body>
</html>