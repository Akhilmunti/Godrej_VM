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
                                    <h3 class="page-title br-0">
                                        Short Listing Approval
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <style>
                            .primary-gradient{
                                background-color: #2a2a72;
                                background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%);
                            }

                            .table > tbody > tr > td, .table > tbody > tr > th {
                                padding: 0.5rem;
                            }

                            .box-header {
                                padding: 1rem 1rem;
                            }
                        </style>
                        <div class="row">
                            <div class="col-12">

                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <form id="register_form" action="<?php echo base_url('buyer/vendor/shortlisting'); ?>" method="POST" enctype="multipart/form-data">
                                        <!--                                        <div class="box-header primary-gradient text-center p-20">
                                                                                    <a href="#">
                                                                                        <img height="100" src="<?php echo base_url('assets/'); ?>images/godrej-logo-white.png" alt="logo">
                                                                                    </a>
                                                                                </div>-->
                                        <div class="box-body pb-0">
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <p>
                                                        <b>
                                                            Dear Sir,
                                                        </b>
                                                    </p>

                                                    <p>
                                                        <b>
                                                            Subject : 
                                                        </b>
                                                        <?php echo $mShort['s_subject']; ?>
                                                    </p>

                                                    <p>
                                                        <b>
                                                            Scope of work : 
                                                        </b>
                                                        <?php echo $mShort['s_sow']; ?>
                                                    </p>
                                                </div>
                                                <div class="col-md-12 mt-2 mb-2">
                                                    <table class="table table-bordered table-light">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <b>
                                                                        Project Configuration
                                                                    </b>
                                                                </td>
                                                                <td>
                                                                    <?php echo $mEoi['eoi_configuration']; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <b>
                                                                        Total BUA
                                                                    </b>
                                                                </td>
                                                                <td>
                                                                    <?php echo $mEoi['eoi_total_bua']; ?> Million Sq ft
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <b>
                                                                        Contract Duration
                                                                    </b>
                                                                </td>
                                                                <td>
                                                                    <?php echo $mEoi['eoi_schedule']; ?> months
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <b>
                                                                        Budget without escalation (In Rs. Cr.)
                                                                    </b>
                                                                </td>
                                                                <td>
                                                                    Rs. <?php echo $mShort['s_bwoe']; ?> Cr.
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <b>
                                                                        Budget with escalation (In Rs. Cr.)
                                                                    </b>
                                                                </td>
                                                                <td>
                                                                    Rs. <?php echo $mShort['s_bwe']; ?> Cr.
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <b>
                                                                        Free Issue Items
                                                                    </b>
                                                                </td>
                                                                <td>
                                                                    <?php echo $mShort['s_fim']; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <b>
                                                                        Basic Rate Items (If any)
                                                                    </b>
                                                                </td>
                                                                <td>
                                                                    <?php echo $mShort['s_brm']; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <b>
                                                                        Contracting Strategy
                                                                    </b>
                                                                </td>
                                                                <td>
                                                                    <?php echo $mShort['s_cws']; ?>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <h5>
                                                        <b>
                                                            The proposed Bidder List : 
                                                        </b>
                                                    </h5>

                                                    <table class="table table-bordered table-light">

                                                        <thead class="text-center text-white" style="background-color: #0096FF">
                                                            <tr>
                                                                <th>
                                                                    S. No.
                                                                </th>
                                                                <th>
                                                                    Name of Company
                                                                </th>
                                                                <th>
                                                                    Category
                                                                </th>
                                                                <th>
                                                                    Turnover
                                                                    (in Cr)
                                                                </th>
                                                                <th>
                                                                    PQ/Feedback Score
                                                                </th>
                                                                <th>
                                                                    Bid Capacity (Cr.)
                                                                </th>
                                                                <th>
                                                                    Work Experience
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                            $mVendors = json_decode($mEoi['eoi_vendors_selected']);
                                                            $mCount = 0;
                                                            $mDanger = "";
                                                            foreach ($mVendors as $key => $mVendor) {
                                                                $mCount++;
                                                                $mRecord = $this->vendor->getParentByKey($mVendor);
                                                                //print_r($mRecord);
                                                                $mStageOneAdded = strtotime($mRecord['created_at']);
                                                                $mStageOneAdded = date("d-m-Y H:i:s", $mStageOneAdded);
                                                                if ($mRecord['pr']) {
                                                                    $mPrRecord = $this->buyer->getParentByKey($mRecord['pr']);
                                                                } else {
                                                                    $mPrRecord = "";
                                                                }

                                                                if ($mRecord['nature_of_business_id'] == 3) {
                                                                    $mStageTwo = $this->cst->getParentByVendorKey($mVendor);
                                                                    $mPqScore = $this->pqc->getParentByVendorKey($mVendor);
                                                                    $mStageTwoAdded = strtotime($mStageTwo['stc_date_added']);
                                                                    $mStageTwoAdded = date("d-m-Y H:i:s", $mStageTwoAdded);
                                                                } 

                                                                $mAllDescs = array();
                                                                if (!empty($mStageTwo)) {
                                                                    $mGetSelectedTowsIds = json_decode($mStageTwo['stc_tow']);
                                                                    foreach ($mGetSelectedTowsIds as $key => $mGetSelectedTowsId) {
                                                                        $mGetTowDesc = $this->buyer->getTypeOfWork($mGetSelectedTowsId);
                                                                        $mAllDescs[] = $mGetTowDesc['name'];
                                                                    }
                                                                    $mRecord = array_merge($mRecord, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode($mGetSelectedTowsIds)));
                                                                } else {
                                                                    $mGetTowDesc = $this->buyer->getTypeOfWork($mVendor['type_of_work_id']);
                                                                    $mAllDescs[] = $mGetTowDesc['name'];
                                                                    $mRecord = array_merge($mRecord, array("consolidated_tows" => json_encode($mAllDescs), "consolidated_tows_ids" => json_encode(array($mVendor['type_of_work_id']))));
                                                                }

                                                                $mCheckBidCapacity = $this->bc->getParentByVendorIdAndEoiId($mVendor, $mEoi['eoi_id']);
                                                                $mBidCapacity = $mCheckBidCapacity['bc_to_4'] + $mCheckBidCapacity['bc_to_3'] + $mCheckBidCapacity['bc_to_2'] + $mCheckBidCapacity['bc_to_1'] / 4;

                                                                //print_r($mRecord);
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $mCount; ?>
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
                                                                        <?php echo $mCheckBidCapacity['bc_to_4']; ?>
                                                                    </td>
                                                                    <td>

                                                                        <?php if ($mRecord['is_small'] == 0) { ?>

                                                                            <?php if ($mRecord['active'] == 2) { ?>
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
                                                                                                <?php echo $mPqScore['pqv_total']; ?>
                                                                                            <?php } ?>
                                                                                        <?php } ?>
                                                                                    <?php } else if ($mRecord['nature_of_business_id'] == 2) { ?>
                                                                                        <?php if (!empty($mPqScore)) { ?>
                                                                                            <?php echo $mPqScore['pqc_total']; ?>
                                                                                        <?php } ?>
                                                                                    <?php } else if ($mRecord['nature_of_business_id'] == 3) { ?>
                                                                                        <?php if (!empty($mSiteReportCheck)) { ?>
                                                                                            <?php if (!empty($mPqScore)) { ?>
                                                                                                <?php echo $mPqScore['pqc_total']; ?>
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
                                                                                                <?php echo $mPqScore['pqv_total']; ?>
                                                                                            <?php } ?>
                                                                                        <?php } ?>
                                                                                    <?php } else if ($mRecord['nature_of_business_id'] == 2) { ?>
                                                                                        <?php if (!empty($mPqScore)) { ?>
                                                                                            <?php echo $mPqScore['pqc_total']; ?>
                                                                                        <?php } ?>
                                                                                    <?php } else if ($mRecord['nature_of_business_id'] == 3) { ?>
                                                                                        <?php if (!empty($mPqScore)) { ?>
                                                                                            <?php echo $mPqScore['pqc_total']; ?>
                                                                                        <?php } ?>
                                                                                    <?php } ?>

                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        <?php } ?>

                                                                    </td>
                                                                    <td>
                                                                        <?php echo $mBidCapacity; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        $mWorks = json_decode($mCheckBidCapacity['bc_ongoing_works']);
                                                                        $mWorksCOunt = count($mWorks);
                                                                        foreach ($mWorks as $key => $value) {
                                                                            ?>
                                                                            <?php echo $value[2] . " "; ?>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>		

                                                        </tbody>
                                                    </table>

                                                    <h5>
                                                        <b>
                                                            KEY DATES  :
                                                        </b>
                                                    </h5>

                                                    <table id="s_milestone_table2" class="table table-bordered">
                                                        <thead class="text-center text-white" style="background-color: #0096FF">
                                                            <tr>
                                                                <th>
                                                                    Milestone on which contractor should be appointed as per
                                                                </th>
                                                                <th>
                                                                    <?php echo $mShort['s_milestone']; ?>
                                                                </th>
                                                                <th>
                                                                    <?php echo $mShort['s_milestone_logic']; ?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Activity
                                                                </th>
                                                                <th>
                                                                    Dates
                                                                </th>
                                                                <th>
                                                                    Remarks
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $mActivity = json_decode($mShort['s_activity']); ?>
                                                            <?php
                                                            $mCountAct = 0;
                                                            foreach ($mActivity as $key => $value) {
                                                                $mCountAct++;
                                                                ?>

                                                                <?php if ($mCountAct == 1) { ?>
                                                                    <tr>
                                                                        <td>
                                                                            Planned date of Contractor appointment As per BI Logic.
                                                                        </td> 
                                                                        <td>
                                                                            <?php echo date('d-F-Y', strtotime($value[0])); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $value[1]; ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } else if ($mCountAct == 2) { ?>
                                                                    <tr>
                                                                        <td>
                                                                            Actual date as per current site progress
                                                                        </td> 
                                                                        <td>
                                                                            <?php echo date('d-F-Y', strtotime($value[0])); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $value[1]; ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } else if ($mCountAct == 3) { ?>
                                                                    <tr>
                                                                        <td>
                                                                            CBE of contractor Appointment
                                                                        </td> 
                                                                        <td>
                                                                            <?php echo date('d-F-Y', strtotime($value[0])); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $value[1]; ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } else if ($mCountAct == 4) { ?>
                                                                    <tr>
                                                                        <td>
                                                                            Delay in appointment
                                                                        </td> 
                                                                        <td>
                                                                            <?php echo $value[0]; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $value[1]; ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>

                                                            <?php } ?>
                                                        </tbody>
                                                    </table>

                                                    <p>
                                                        <b>
                                                            Front Idling :
                                                        </b>
                                                        <b style="font-size: 18px">
                                                            <?php
                                                            if ($mShort['s_fi'] == 0) {
                                                                echo "No";
                                                            } else {
                                                                echo "Yes";
                                                            }
                                                            ?>
                                                        </b>
                                                    </p>

                                                    <br>

                                                    <h5>
                                                        <b>
                                                            Reason For Delay   :
                                                        </b>
                                                    </h5>

                                                    <p>
                                                        <?php echo $mShort['s_fa']; ?>
                                                    </p>

                                                    <h5>
                                                        <b>
                                                            Current Work Status at site:  :
                                                        </b>
                                                    </h5>

                                                    <p>
                                                        <?php echo $mShort['s_cws']; ?>
                                                    </p>

                                                    <hr>

                                                    <h5>
                                                        This is put up for your approval.
                                                        <br>

                                                    </h5>

                                                </div>



                                            </div>
                                        </div>
                                        <div class="box-footer text-right">
                                            <?php
                                            $mApprovers = json_decode($mShort['s_approvers']);
                                            $mApprovedBy = json_decode($mShort['s_approved_by']);
                                            $mSessionKey = $this->session->userdata('session_id');
                                            $mCountLeft = 0;
                                            if (!empty($mApprovedBy)) {
                                                $mCountLeft = count($mApprovers) - count($mApprovedBy);
                                                $mCountLeft = count($mApprovers) - $mCountLeft;
                                            }
                                            //echo $mCountLeft;
                                            ?>

                                            <?php if ($mEoi['eoi_status'] == "11" && $mSessionKey == $mShort['s_returned_to']) { ?>
                                                <a data-toggle="modal" data-target="#modal-right-2" class="btn btn-warning mr-2" href="#">Re-Approve with comments</a>
                                            <?php } ?>

                                            <?php if (($mSessionKey == $mApprovers[$mCountLeft]) && ($mSessionKey != $mApprovedBy[$mCountLeft]) && $mEoi['eoi_status'] != "11") { ?>
                                                <a data-toggle="modal" data-target="#modal-right" class="btn btn-warning mr-2" href="#">Return with comments</a>
                                                <a class="btn btn-danger mr-2" href="<?php echo base_url('buyer/vendor/actionChangeStatusShort/' . $mShort['s_id'] . "/" . $mShort['s_eoi_id'] . "/" . "0"); ?>">Reject</a>
                                                <a class="btn btn-primary mr-2" href="<?php echo base_url('buyer/vendor/actionChangeStatusShort/' . $mShort['s_id'] . "/" . $mShort['s_eoi_id'] . "/" . "1"); ?>">Approve</a>
                                            <?php } ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.box -->
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

        <!-- Modal -->
        <div class="modal modal-right fade" id="modal-right" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Return with comments</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?php echo base_url('buyer/vendor/actionReturnApproval/' . $mShort['s_id'] . "/" . $mShort['s_eoi_id']); ?>">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label>Select Buyer</label>
                                    <select required="" name="s_returned_to" class="form-control">
                                        <option selected="" disabled="" value="">Select</option>
                                        <?php foreach ($returnBuyersList as $key => $value) { ?>
                                            <option value="<?php echo $value['buyer_id']; ?>"><?php echo $value['buyer_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Return comments</label>
                                    <textarea name="s_returned_comment_from" required="" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer modal-footer-uniform text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger float-right">Return</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal modal-right fade" id="modal-right-2" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Re-Approve with comments</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?php echo base_url('buyer/vendor/actionReApproval/' . $mShort['s_id'] . "/" . $mShort['s_eoi_id']); ?>">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label>Re-Approve comments</label>
                                    <textarea name="s_returned_comment_to" required="" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer modal-footer-uniform text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary float-right">Re-Approve</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->

        <?php $this->load->view('buyer/partials/scripts'); ?>

        <script>
            var counterdcw = 2;
            $("#addrowdcw").on("click", function () {
                $('#sites-table-tbody tr').remove();
                var rowCount = $('#stc_dcw_table tr').length;
                //alert(rowCount);
                var newRow = $("<tr>");
                var cols = "";
                cols += '<td><input type="button" class="ibtnDelDcw btn btn-sm btn-danger"  value="Delete"><input required type="text" class="form-control site-value" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="text" class="form-control site-value" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="date" class="form-control site-value-6" onchange="getOrderValue(' + counterdcw + ')" id="stc_dcw_details_ov_' + counterdcw + '" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="text" class="form-control site-value-9" onchange="getDcwEndDate(' + counterdcw + ')" id="stc_dcw_details_ed_' + counterdcw + '" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                newRow.append(cols);
                $("#stc_dcw_table").append(newRow);
                counterdcw++;
            });
            $("#stc_dcw_table").on("click", ".ibtnDelDcw", function (event) {
                $('#sites-table-tbody tr').remove();
                var rowCount = $('#stc_dcw_table tr').length;
                $(this).closest("tr").remove();
                counterdcw -= 1
            });

            var counterdcw2 = 2;
            $("#addrowdcw2").on("click", function () {
                $('#sites-table-tbody tr').remove();
                var rowCount = $('#stc_dcw_table2 tr').length;
                //alert(rowCount);
                var newRow = $("<tr>");
                var cols = "";
                cols += '<td><input type="button" class="ibtnDelDcw2 btn btn-sm btn-danger"  value="Delete"><input required type="text" class="form-control site-value" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="date" class="form-control site-value" name="stc_dcw_details[' + counterdcw2 + '][]"/></td>';
                cols += '<td><input required type="date" class="form-control site-value-6" onchange="getOrderValue(' + counterdcw2 + ')" id="stc_dcw_details_ov_' + counterdcw2 + '" name="stc_dcw_details[' + counterdcw2 + '][]"/></td>';
                cols += '<td><input required type="text" class="form-control site-value-9" onchange="getDcwEndDate(' + counterdcw2 + ')" id="stc_dcw_details_ed_' + counterdcw2 + '" name="stc_dcw_details[' + counterdcw2 + '][]"/></td>';
                cols += '<td><input required type="text" class="form-control site-value-9" onchange="getDcwEndDate(' + counterdcw2 + ')" id="stc_dcw_details_ed_' + counterdcw2 + '" name="stc_dcw_details[' + counterdcw2 + '][]"/></td>';
                newRow.append(cols);
                $("#stc_dcw_table2").append(newRow);
                counterdcw2++;
            });
            $("#stc_dcw_table2").on("click", ".ibtnDelDcw2", function (event) {
                $('#sites-table-tbody tr').remove();
                var rowCount = $('#stc_dcw_table tr').length;
                $(this).closest("tr").remove();
                counterdcw2 -= 1
            });
        </script>

    </body>
</html>