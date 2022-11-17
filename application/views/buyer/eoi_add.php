<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('buyer/partials/header'); ?>

    <style>
        table tr input[type='number']{
            width: 150px;
        }

        table tr input[type='text']{
            width: 150px;
        }

        table tr input[type='file']{
            width: 200px;
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
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-block">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="page-title br-0">Expression Of Interest</h3>
                                </div>

                                <div class="col-md-6 text-right">
                                    <span class="mr-3"><?php echo $project['project_name']; ?> / Contracts / <?php echo $tow['name']; ?></span>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <!-- /.box-header -->
                                    <div class="box-body wizard-content">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <form id="register_form" action="<?php echo base_url('buyer/vendor/actionSaveEoi/' . $project['project_id'] . "/" . $zone . "/" . $type . "/" . $for . "/" . $tow['id']); ?>" method="POST" class=" validation-wizard" enctype="multipart/form-data">
                                            <!-- step -->
                                            <h6></h6>
                                            <section>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="wlastName2"> Budget (Basic value of Work in crores) : <span class="danger">*</span> </label>
                                                            <input name="eoi_budget" required="" type="number" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="wlastName2"> Scope of Work : <span class="danger">*</span> </label>
                                                            <input name="eoi_scope" required="" type="text" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="wlastName2"> Estimated Start Date: <span class="danger">*</span> </label>
                                                        <input name="eoi_start_date" required="" type="date" class="form-control"/>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="wlastName2"> Completion Schedule <b>(Number of Months)</b>: <span class="danger">*</span> </label>
                                                        <input name="eoi_schedule" required="" type="number" class="form-control"/>
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- End -->
                                            <h6></h6>
                                            <section>
                                                <div class="row">  
                                                    <div class="col-12">
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
                                                                                        if (!empty($mPqScore)) {
                                                                                            $mDanger = $mPqScore['pqv_total'];
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

                                                                                        if (!empty($mPqScore)) {
                                                                                            $mDanger = $mPqScore['pqv_total'];
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

                                                                        $mFeedback = $this->feedback->getParentByVendorKey($mRecord['id']);
                                                                        if (!empty($mFeedback)) {
                                                                            $mFormRecord = $this->feedbackforms->getAllParentByTypeAndFeedbackId($mFeedback['feedback_id']);
                                                                            if (!empty($mFormRecord)) {
                                                                                $mTotalScore = 0;
                                                                                foreach ($mFormRecord as $key => $value) {
                                                                                    $mTotalScore += $value['ff_final_score'];
                                                                                }
                                                                                $mFeedbackScore = $mTotalScore / count($mFormRecord);
                                                                            } else {
                                                                                $mFeedbackScore = "-";
                                                                            }
                                                                        } else {
                                                                            $mFeedbackScore = "-";
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

                                                                                            <?php if ($tow['id'] == $mTowsIds[$key]) { ?>

                                                                                                <?php if ($mRecord['nature_of_business_id'] == 1) { ?>
                                                                                                    <?php if (!empty($mPqScore)) { ?>
                                                                                                        <?php echo $mPqScore['pqv_total']; ?>
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

                                                                                            <?php if ($tow['id'] == $mTowsIds[$key]) { ?>
                                                                                                <?php if ($mRecord['nature_of_business_id'] == 1) { ?>

                                                                                                    <?php if (!empty($mPqScore)) { ?>
                                                                                                        <?php echo $mPqScore['pqv_total']; ?>
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
                                                                                <?php } ?>

                                                                            </td>
                                                                            <td>
                                                                                <?php echo $mFeedbackScore; ?>
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

                                                                                                <?php if (!empty($mPqScore)) { ?>
                                                                                                    <?php echo $mPqScoreAdded; ?>
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

                                                                                                <?php if (!empty($mPqScore)) { ?>
                                                                                                    <?php echo $mPqScoreAdded; ?>
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
                                                </div>
                                            </section>
                                            <h6></h6>
                                            <section>
                                                <div class="row">  
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Project Configuration: <span class="danger">*</span> </label>
                                                                    <input name="eoi_configuration" value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Total BUA - In million square foot: <span class="danger">*</span> </label>
                                                                    <input name="eoi_total_bua" value="" required="" type="number" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Type of Contract: <span class="danger">*</span> </label>
                                                                    <input name="eoi_toc" value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Basic Rate Items: <span class="danger">*</span> </label>
                                                                    <select multiple="" name="eoi_bri" required="" class="form-control">
                                                                        <?php if (!empty($bris)) { ?>
                                                                            <?php foreach ($bris as $key => $bri) { ?>
                                                                                <option value="<?php echo $bri['bi_name']; ?>"><?php echo $bri['bi_name']; ?></option>
                                                                            <?php } ?>                                                                            
                                                                        <?php } ?>
                                                                        <option value="No Applicable">Not Applicable</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Free Issue Items: <span class="danger">*</span> </label>
                                                                    <select multiple="" name="eoi_fii" required="" class="form-control">
                                                                        <?php if (!empty($fiis)) { ?>
                                                                            <?php foreach ($fiis as $key => $fii) { ?>
                                                                                <option value="<?php echo $fii['ii_name']; ?>"><?php echo $fii['ii_name']; ?></option>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                        <option value="No Applicable">Not Applicable</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Performance Deposit: <span class="danger">*</span> </label>
                                                                    <input name="eoi_pd" value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Water: <span class="danger">*</span> </label>
                                                                    <input name="eoi_water" value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Electricity: <span class="danger">*</span> </label>
                                                                    <input name="eoi_electicity" value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Labour Accommodation: <span class="danger">*</span> </label>
                                                                    <input name="eoi_labour" value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Defects Liability Period: <span class="danger">*</span> </label>
                                                                    <input name="eoi_dlp" value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Deposit against DLP: <span class="danger">*</span> </label>
                                                                    <input name="eoi_dadlp" value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Others: <span class="danger">*</span> </label>
                                                                    <input name="eoi_others" value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- End -->
                                        </form>
                                    </div>
                                    <!-- /.box-body -->
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

            <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar-->
            <div class = "control-sidebar-bg"></div>

        </div>
        <!--./wrapper-->

        <!--Modal-->
        <div class = "modal modal-right fade" id = "modal-right-2" tabindex = "-1">
            <div class = "modal-dialog">
                <div class = "modal-content">
                    <div class = "modal-header">
                        <h5 class = "modal-title">Vendors Details : Sona Infrabuild</h5>
                        <button type = "button" class = "close" data-dismiss = "modal">
                            <span aria-hidden = "true">&times;
                            </span>
                        </button>
                    </div>
                    <div class = "modal-body">
                        <div class = "row">
                            <div class = "col-md-12">
                                <b>Email</b> : sona@gmail.com
                            </div>
                            <div class = "col-md-12">
                                <b>Phone</b> : 9090909090
                            </div>
                        </div>
                    </div>
                    <div class = "modal-footer modal-footer-uniform">
                        <button type = "button" class = "btn btn-secondary" data-dismiss = "modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--/.modal-->

        <?php $this->load->view('buyer/partials/scripts');
        ?>

        <script>

            var countStepsChange = 0;
            var checkvendorselected = 0;
            var form = $(".validation-wizard").show();
            $(".validation-wizard").steps({
                headerTag: "h6"
                , bodyTag: "section"
                , transitionEffect: "none"
                , enableAllSteps: true
                , enableFinishButton: true
                , titleTemplate: '<span class="step">Step #index# </span>  '
                , labels: {

                    finish: "Submit"

                }
                , onStepChanging: function (event, currentIndex, newIndex) {
                    if (newIndex === 2) {
                        var selectedVendors = $("input[name='eoi_vendors_selected[]']")
                                .map(function () {
                                    if ($(this).is(":checked")) {
                                        checkvendorselected = 1;
                                    }
                                }).get();
                        if (checkvendorselected === 1) {
                            return currentIndex > newIndex || (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
                            //return newIndex;
                        } else {
                            alert("Select Vendors");
                        }
                    } else {
                        return currentIndex > newIndex || (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
                        //return newIndex;
                    }

                }
                , onFinishing: function (event, currentIndex) {
                    //alert(form.validate().settings.ignore = ":disabled", form.valid());
                    //return form.validate().settings.ignore = ":disabled", form.valid()
                    return currentIndex;
                }
                , onFinished: function (event, currentIndex) {
                    var form = document.getElementById("register_form");
                    form.submit();
                }
            }), $(".validation-wizard").validate({
                ignore: "input[type=hidden]"
                , errorClass: "text-danger"
                , successClass: "text-success"
                , highlight: function (element, errorClass) {
                    $(element).removeClass(errorClass)
                }
                , unhighlight: function (element, errorClass) {
                    $(element).removeClass(errorClass)
                }
                , errorPlacement: function (error, element) {
                    error.insertAfter(element)
                }
                , rules: {

                    email: {
                        email: !0
                    }
                }
            });
        </script>

        <?php
        foreach ($mRecords as $key => $mRecord) {
            $mTows = json_decode($mRecord['consolidated_tows']);
            $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
            ?>
            <?php if (in_array($tow['id'], $mTowsIds)) { ?>
                <script>
                    $("#override-<?php echo $mRecord['id']; ?>").click(function () {
                        var status = $("#override-<?php echo $mRecord['id']; ?>").html();
                        var checked_status = this.checked;
                        if (status === "Override") {
                            $("#checkbox_<?php echo $mRecord['id']; ?>").removeAttr("disabled");
                            $("#override-<?php echo $mRecord['id']; ?>").html("Disable");
                        } else {
                            $("#checkbox_<?php echo $mRecord['id']; ?>").prop('checked', false);
                            $("#checkbox_<?php echo $mRecord['id']; ?>").attr("disabled", "disabled");
                            $("#override-<?php echo $mRecord['id']; ?>").html("Override");
                        }
                    });
                </script>
            <?php } ?>
        <?php } ?>

    </body>
</html>