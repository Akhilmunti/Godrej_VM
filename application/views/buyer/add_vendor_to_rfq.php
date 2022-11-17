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
                                        Add/Delete  : RFQ-001
                                    </h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <span class="mr-3">Project name / Contracts / Type of work</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                Select
                                                            </th>
                                                            <th>
                                                                Vendor
                                                            </th>
                                                            <th>
                                                                Zone
                                                            </th>
                                                            <th>
                                                                Financial Categorization
                                                            </th>
                                                            <th>
                                                                PQ Score
                                                            </th>
                                                            <th>
                                                                FB Score
                                                            </th>
                                                            <th>
                                                                Latest PQ/FB Date
                                                            </th>
                                                            <th>
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php if (!empty($mRecords)) { ?>

                                                            <?php
                                                            $mCount = 0;
                                                            $mDanger = "";
                                                            foreach ($mRecords as $key => $mRecord) {
                                                                $mCount++;
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

                                                                $mGetWork = $this->buyer->getTypeOfWork($mRecord['type_of_work_id']);
                                                                $mTows = json_decode($mRecord['consolidated_tows']);
                                                                $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);

                                                                if ($mRecord['is_small'] == 0) {

                                                                    if ($mRecord['active'] == 2) {
                                                                        if ($mRecord['svr_id'] || $mRecord['csvr_id'] || $mRecord['svrc_id']) {

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

                                                                                if ($mRecord['nature_of_business_id'] == 1) {

                                                                                    if (!empty($mSiteReportCheck)) {
                                                                                        if (!empty($mPqScore)) {
                                                                                            $mDanger = $mPqScore['pqv_total'];
                                                                                        }
                                                                                    }
                                                                                } else if ($mRecord['nature_of_business_id'] == 2) {
                                                                                    if (!empty($mPqScore)) {
                                                                                        $mDanger = $mPqScore['pqc_total'];
                                                                                    }
                                                                                } else if ($mRecord['nature_of_business_id'] == 3) {
                                                                                    if (!empty($mSiteReportCheck)) {
                                                                                        if (!empty($mPqScore)) {
                                                                                            $mDanger = $mPqScore['pqc_total'];
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                } else {
                                                                    if ($mRecord['active'] == 2) {

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

                                                                            if ($mRecord['nature_of_business_id'] == 1) {

                                                                                if (!empty($mSiteReportCheck)) {
                                                                                    if (!empty($mPqScore)) {
                                                                                        $mDanger = $mPqScore['pqv_total'];
                                                                                    }
                                                                                }
                                                                            } else if ($mRecord['nature_of_business_id'] == 2) {
                                                                                if (!empty($mPqScore)) {
                                                                                    $mDanger = $mPqScore['pqc_total'];
                                                                                }
                                                                            } else if ($mRecord['nature_of_business_id'] == 3) {
                                                                                if (!empty($mPqScore)) {
                                                                                    $mDanger = $mPqScore['pqc_total'];
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                                ?>

                                                                <tr class="<?php
                                                                if ($mDanger < 50) {
                                                                    echo "bg-danger";
                                                                }
                                                                ?>">
                                                                    <td>
                                                                        <input <?php
                                                                        if ($mDanger < 50) {
                                                                            echo "disabled";
                                                                        }
                                                                        ?> value="<?php echo $mRecord['id']; ?>" class="form-check-input" type="checkbox" id="checkbox_<?php echo $mRecord['id'] ?>" name="eoi_vendors_selected[]"> 
                                                                        <label class="form-check-label" for="checkbox_<?php echo $mRecord['id'] ?>"></label>
                                                                    </td>
                                                                    <td>
                                                                        <a class="btn btn-xs btn-primary" href="#" data-toggle="modal" data-target="#modal-right-2">
                                                                            <?php echo $mRecord['company_name']; ?>
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $mRecord['location']; ?>
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

                                                                        <?php if ($mRecord['is_small'] == 0) { ?>

                                                                            <?php if ($mRecord['active'] == 2) { ?>
                                                                                <?php if ($mRecord['svr_id'] || $mRecord['csvr_id'] || $mRecord['svrc_id']) { ?>
                                                                                    <?php
                                                                                    $mTows = json_decode($mRecord['consolidated_tows']);
                                                                                    $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                                                                                    foreach ($mTows as $key => $value) {
                                                                                        if ($tow['id'] == $mTowsIds[$key]) {
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
                                                                                        } else {
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
                                                                        -
                                                                    </td>
                                                                    <td>

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
                                                                                                    <?php echo $mPqScoreAdded; ?>
                                                                                                <?php } ?>
                                                                                            <?php } ?>
                                                                                        <?php } else if ($mRecord['nature_of_business_id'] == 2) { ?>
                                                                                            <?php if (!empty($mPqScore)) { ?>
                                                                                                <?php echo $mPqScoreAdded; ?>
                                                                                            <?php } ?>
                                                                                        <?php } else if ($mRecord['nature_of_business_id'] == 3) { ?>
                                                                                            <?php if (!empty($mSiteReportCheck)) { ?>
                                                                                                <?php if (!empty($mPqScore)) { ?>
                                                                                                    <?php echo $mPqScoreAdded; ?>
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
                                                                                                <?php echo $mPqScoreAdded; ?>
                                                                                            <?php } ?>
                                                                                        <?php } ?>
                                                                                    <?php } else if ($mRecord['nature_of_business_id'] == 2) { ?>
                                                                                        <?php if (!empty($mPqScore)) { ?>
                                                                                            <?php echo $mPqScoreAdded; ?>
                                                                                        <?php } ?>
                                                                                    <?php } else if ($mRecord['nature_of_business_id'] == 3) { ?>
                                                                                        <?php if (!empty($mPqScore)) { ?>
                                                                                            <?php echo $mPqScoreAdded; ?>
                                                                                        <?php } ?>
                                                                                    <?php } ?>

                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        <?php } ?>

                                                                    </td>
                                                                    <td>
                                                                        <?php if ($mDanger < 50) { ?>
                                                                            <button type="button" id="override-<?php echo $mRecord['id']; ?>" class="btn btn-sm btn-primary">Override</button>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>

                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label>Approval Note</label>
                                                <input class="form-control" type="file" />
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label>Remarks</label>
                                                <textarea class="form-control"></textarea>  
                                            </div>

                                            <div class="col-md-12">
                                                <select required="" name="role" class="form-control">
                                                    <option disabled="" selected="">Approval Taken From</option>
                                                    <option>Managing Director</option>
                                                    <option value="COO">Chief Operating Officer</option>
                                                    <option>Head of Contracts & Procurement</option>
                                                    <option>HO - C&P</option>
                                                    <option>Zonal CEO</option>
                                                    <option>Regional Head</option>
                                                    <option>Operations Head</option>
                                                    <option>Project Director</option>
                                                    <option>Construction Head</option>
                                                    <option>Regional C&P Head</option>
                                                    <option>Regional C&P Team</option>
                                                    <option>HO Operations</option>
                                                    <option>Project Manager</option>
                                                    <option value="PCM">PCM</option>
                                                    <option>Regional Safety</option>
                                                    <option>Ho Safety</option>
                                                    <option>Regional Quality</option>
                                                    <option>Regional Planning</option>
                                                    <option>Regional C&B</option>
                                                    <option>Project Execution Team</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer text-right">
                                        <a href="<?php echo base_url('buyer/vendor/listApprovalBidders'); ?>" class="btn btn-primary">Send</a>
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