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
                                <div class="col-md-12">
                                    <h3 class="page-title br-0">Short Listing Approval Form</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">

                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <form id="register_form" action="<?php echo base_url('buyer/vendor/sendForApproval/' . $eoi['eoi_id']); ?>" method="POST" enctype="multipart/form-data">
                                        <div class="box-body pb-0">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Subject : <span class="danger">*</span> </label>
                                                        <textarea required="" name="s_subject" class="form-control" rows="4"><?php echo $eoi['eoi_subject'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Budget without Escalation (In crores) : <span class="danger">*</span> </label>
                                                        <input required="" name="s_bwoe" type="number" class="form-control" required="" value="<?php echo $record['wopo_startdate']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wopo_startdate"> Budget with Escalation (In crores) : <span class="danger">*</span> </label>
                                                        <input required="" name="s_bwe" step="0.1" id="escalation" type="number" class="form-control" required=""  />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Scope of Works  : <span class="danger">*</span> </label>
                                                        <textarea required="" name="s_sow" class="form-control" rows="4"><?php echo $eoi['eoi_scope']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Contract Award strategy  : <span class="danger">*</span> </label>
                                                        <textarea required="" name="s_cas" class="form-control" rows="4"><?php echo $eoi['eoi_award'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wlastName2"> Basic Rate Items: <span class="danger">*</span> </label>
                                                        <select multiple="" name="s_brm" required="" class="form-control">
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
                                                        <select multiple="" name="s_fim" required="" class="form-control">
                                                            <?php if (!empty($fiis)) { ?>
                                                                <?php foreach ($fiis as $key => $fii) { ?>
                                                                    <option value="<?php echo $fii['ii_name']; ?>"><?php echo $fii['ii_name']; ?></option>
                                                                <?php } ?>                                                                
                                                            <?php } ?>
                                                            <option value="Not Applicable">Not Applicable</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <table class="table table-bordered">
                                                        <thead class="bg-primary">
                                                            <tr>
                                                                <th>
                                                                    Action
                                                                </th>
                                                                <th>
                                                                    Name of Contractor
                                                                </th>
                                                                <th>
                                                                    Last Year Turnover (In Crores)
                                                                </th>
                                                                <th>
                                                                    BID Capacity (Cr)
                                                                </th>
                                                                <th>
                                                                    PQ/Feedback Score
                                                                </th>
                                                                <th>
                                                                    Bidder???s Category
                                                                </th>
                                                                <th>
                                                                    On-going / Completed Project Remarks
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $mVendors = json_decode($eoi['eoi_accepted_by']);
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

                                                                $mCheckBidCapacity = $this->bc->getParentByVendorIdAndEoiId($mVendor, $eoi['eoi_id']);
                                                                $mBidCapacity = $mCheckBidCapacity['bc_to_4'] + $mCheckBidCapacity['bc_to_3'] + $mCheckBidCapacity['bc_to_2'] + $mCheckBidCapacity['bc_to_1'] / 4;

                                                                //print_r($mRecord);

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
                                                                <tr>
                                                                    <td>
                                                                        <input checked="" value="<?php echo $mRecord['id']; ?>" class="form-check-input" type="checkbox" id="checkbox_<?php echo $mRecord['id'] ?>" name="s_vendors_selected[]"> 
                                                                        <label class="form-check-label" for="checkbox_<?php echo $mRecord['id'] ?>"></label>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $mRecord['company_name']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        if ($mCheckBidCapacity['bc_to_1']) {
                                                                            echo $mCheckBidCapacity['bc_to_1'];
                                                                        } elseif ($mCheckBidCapacity['bc_to_2']) {
                                                                            echo $mCheckBidCapacity['bc_to_2'];
                                                                        } elseif ($mCheckBidCapacity['bc_to_3']) {
                                                                            echo $mCheckBidCapacity['bc_to_3'];
                                                                        } elseif ($mCheckBidCapacity['bc_to_4']) {
                                                                            echo $mCheckBidCapacity['bc_to_4'];
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo round($mCheckBidCapacity['bc_score'], 2); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($mFeedbackScore != "-") { ?>
                                                                            <?php echo $mFeedbackScore; ?>
                                                                        <?php } else { ?>
                                                                            <?php if ($mRecord['is_small'] == 0) { ?>

                                                                                <?php if ($mRecord['active'] == 2) { ?>
                                                                                    <?php
                                                                                    if ($mRecord['nature_of_business_id'] == 1) {
                                                                                        $mPqScore = $this->pqv->getParentByVendorKey($mRecord['id']);
                                                                                        $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                                                                                        $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                                                                        $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mRecord['type_of_work_id']);
                                                                                    } else if ($mRecord['nature_of_business_id'] == 3) {
                                                                                        $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mRecord['type_of_work_id']);
                                                                                        $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                                                                                        $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                                                                        $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mRecord['type_of_work_id']);
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
                                                                            <?php } else { ?>
                                                                                <?php if ($mRecord['active'] == 2) { ?>
                                                                                    <?php
                                                                                    if ($mRecord['nature_of_business_id'] == 1) {
                                                                                        $mPqScore = $this->pqv->getParentByVendorKey($mRecord['id']);
                                                                                        $mPqScoreAdded = strtotime($mPqScore['pqv_date_added']);
                                                                                        $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                                                                        $mSiteReportCheck = $this->svr->getParentByVendorAndTowKey($mRecord['id'], $mRecord['type_of_work_id']);
                                                                                    } else if ($mRecord['nature_of_business_id'] == 3) {
                                                                                        $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mRecord['type_of_work_id']);
                                                                                        $mPqScoreAdded = strtotime($mPqScore['pqc_date_added']);
                                                                                        $mPqScoreAdded = date("d-m-Y H:i:s", $mPqScoreAdded);
                                                                                        $mSiteReportCheck = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mRecord['type_of_work_id']);
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

                                                    <div id="key-dates">
                                                        <h4 class="mt-2">
                                                            <b>
                                                                KEY DATES  :
                                                            </b>
                                                        </h4>

                                                        <table id="s_milestone_table2" class="table table-bordered">
                                                            <thead class="bg-primary">
                                                                <tr>
                                                                    <th>
                                                                        Milestone on which contractor should be appointed as per
                                                                    </th>
                                                                    <th>
                                                                        <select id="s_milestone" name="s_milestone" required="" class="form-control form-control-sm">
                                                                            <option value="PI3">PI3</option>
                                                                            <option value="PI5">PI5</option>
                                                                        </select>
                                                                    </th>
                                                                    <th colspan="2">
                                                                        <input id="s_milestone_logic" name="s_milestone_logic" required="" placeholder="Logic" class="form-control form-control-sm" type="text" />
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
                                                                    <th>
                                                                        Action
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <b>
                                                                            Planned date of Contractor appointment As per PI Logic.
                                                                        </b>
                                                                    </td> 
                                                                    <td>
                                                                        <input id="activity_first_date" required="" name="s_activity[1][]" type="date" class="form-control" />
                                                                    </td>
                                                                    <td>
                                                                        <input id="activity_first_date2" required="" name="s_activity[1][]" type="text" class="form-control" />
                                                                    </td>
                                                                    <td>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <b>
                                                                            Actual date as per current site progress
                                                                        </b>
                                                                    </td> 
                                                                    <td>
                                                                        <input id="activity_act_date" required="" name="s_activity[2][]" type="date" class="form-control" />
                                                                    </td>
                                                                    <td>
                                                                        <input id="activity_act_date2" required="" name="s_activity[2][]" type="text" class="form-control" />
                                                                    </td>
                                                                    <td>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <b>
                                                                            CBE of contractor Appointment
                                                                        </b>
                                                                    </td> 
                                                                    <td>
                                                                        <input id="activity_second_date" required="" name="s_activity[3][]" type="date" class="form-control" />
                                                                    </td>
                                                                    <td>
                                                                        <input id="activity_second_date2" required="" name="s_activity[3][]" type="text" class="form-control" />
                                                                    </td>
                                                                    <td>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <b>
                                                                            Delay in appointment
                                                                        </b>
                                                                    </td> 
                                                                    <td>
                                                                        <input id="activity_difference" readonly="" required="" name="s_activity[4][]" type="number" class="form-control" />
                                                                    </td>
                                                                    <td>
                                                                        <input id="activity_difference2" name="s_activity[4][]" type="text" class="form-control" />
                                                                    </td>
                                                                    <td>

                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <div class="well clearfix text-right">
                                                            <a href="#" class="btn btn-primary" id="addrowdcw2">
                                                                <span class="fa fa-plus"></span>
                                                                Add Row
                                                            </a>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Front Idling  : <span class="danger">*</span> </label>
                                                        <input value="1" name="s_fi" type="radio" id="radio_1" checked />
                                                        <label for="radio_1">Yes</label>
                                                        <input value="0" name="s_fi" name="group1" type="radio" id="radio_2" />
                                                        <label for="radio_2">No</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Reason For Delay  : <span class="danger">*</span> </label>
                                                        <textarea required="" name="s_fa" class="form-control" rows="4"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Current Work Status  : <span class="danger">*</span> </label>
                                                        <textarea required="" name="s_cws" class="form-control" rows="4"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Comments  :  </label>
                                                        <textarea name="s_comments" class="form-control" rows="4"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3 mb-3">
                                                            <lable>PCM</lable>
                                                            <input readonly="" value="<?php echo $this->session->userdata('session_name'); ?>" class="form-control" />
                                                        </div>
                                                        <div id="pm" class="col-md-3 mb-3" style="display: none">
                                                            <lable>PM</lable>
                                                            <select name="s_approvers[]" class="form-control">
                                                                <option disabled="" selected="" value="">Select</option>
                                                                <option value="">Not Applicable</option>
                                                                <?php foreach ($PM as $key => $record) { ?>
                                                                    <option value="<?php echo $record['buyer_id']; ?>"><?php echo $record['buyer_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div id="zonal" class="col-md-3 mb-3" style="display: none">
                                                            <lable>Regional C&P Head</lable>
                                                            <select name="s_approvers[]" class="form-control">
                                                                <option disabled="" selected="" value="">Select</option>
                                                                <option value="">Not Applicable</option>
                                                                <?php foreach ($RCH as $key => $record) { ?>
                                                                    <option value="<?php echo $record['buyer_id']; ?>"><?php echo $record['buyer_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div id="ch" class="col-md-3 mb-3" style="display: none">
                                                            <lable>Construction Head</lable>
                                                            <select name="s_approvers[]" class="form-control">
                                                                <option disabled="" selected="" value="">Select</option>
                                                                <option value="">Not Applicable</option>
                                                                <?php foreach ($CH as $key => $record) { ?>
                                                                    <option value="<?php echo $record['buyer_id']; ?>"><?php echo $record['buyer_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div id="project_director" class="col-md-3 mb-3" style="display: none">
                                                            <lable>Project Director</lable>
                                                            <select name="s_approvers[]" class="form-control">
                                                                <option disabled="" selected="" value="">Select</option>
                                                                <option value="">Not Applicable</option>
                                                                <?php foreach ($PD as $key => $record) { ?>
                                                                    <option value="<?php echo $record['buyer_id']; ?>"><?php echo $record['buyer_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div id="oh" class="col-md-3 mb-3" style="display: none">
                                                            <lable>Operations Head</lable>
                                                            <select name="s_approvers[]"  class="form-control">
                                                                <option disabled="" selected="" value="">Select</option>
                                                                <option value="">Not Applicable</option>
                                                                <?php foreach ($OH as $key => $record) { ?>
                                                                    <option value="<?php echo $record['buyer_id']; ?>"><?php echo $record['buyer_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div id="rh" class="col-md-3 mb-3" style="display: none">
                                                            <lable>Regional Head</lable>
                                                            <select name="s_approvers[]" class="form-control">
                                                                <option disabled="" selected="" value="">Select</option>
                                                                <option value="">Not Applicable</option>
                                                                <?php foreach ($RH as $key => $record) { ?>
                                                                    <option value="<?php echo $record['buyer_id']; ?>"><?php echo $record['buyer_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div id="zh" class="col-md-3 mb-3" style="display: none">
                                                            <lable>Zonal CEO</lable>
                                                            <select name="s_approvers[]" class="form-control">
                                                                <option disabled=""  selected="" value="">Select</option>
                                                                <option value="">Not Applicable</option>
                                                                <?php foreach ($ZH as $key => $record) { ?>
                                                                    <option value="<?php echo $record['buyer_id']; ?>"><?php echo $record['buyer_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div id="ho" class="col-md-3 mb-3" style="display: none">
                                                            <lable>HO - C&P Head</lable>
                                                            <select name="s_approvers[]" class="form-control">
                                                                <option disabled="" selected="" value="">Select</option>
                                                                <option value="">Not Applicable</option>
                                                                <?php foreach ($HO as $key => $record) { ?>
                                                                    <option value="<?php echo $record['buyer_id']; ?>"><?php echo $record['buyer_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div id="coo" class="col-md-3 mb-3" style="display: none">
                                                            <lable>Chief Operating Officer</lable>
                                                            <select name="s_approvers[]" class="form-control">
                                                                <option disabled="" selected="" value="">Select</option>
                                                                <option value="">Not Applicable</option>
                                                                <?php foreach ($COO as $key => $record) { ?>
                                                                    <option value="<?php echo $record['buyer_id']; ?>"><?php echo $record['buyer_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="box-footer text-right">
                                            <button class="btn btn-primary" type="submit">Send for approval</button>
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

        <?php $this->load->view('buyer/partials/scripts'); ?>

        <script>

            $("#escalation").on('change keyup paste', function () {
                var value = $('#escalation').val();
                if (value < 5) {
                    $('#key-dates').css('display', 'none');
                    $("#s_milestone").removeAttr("required");
                    $("#s_milestone_logic").removeAttr("required");
                    $("#activity_first_date").removeAttr("required");
                    $("#activity_first_date2").removeAttr("required");
                    $("#activity_act_date").removeAttr("required");
                    $("#activity_act_date2").removeAttr("required");
                    $("#activity_second_date").removeAttr("required");
                    $("#activity_second_date2").removeAttr("required");
                    $("#activity_difference").removeAttr("required");
                    $("#activity_difference2").removeAttr("required");
                } else {
                    $('#key-dates').css('display', 'block');
                    $("#s_milestone").attr('required', 'required');
                    $("#s_milestone_logic").attr('required', 'required');
                    $("#activity_first_date").attr('required', 'required');
                    $("#activity_first_date2").attr('required', 'required');
                    $("#activity_act_date").attr('required', 'required');
                    $("#activity_act_date2").attr('required', 'required');
                    $("#activity_second_date").attr('required', 'required');
                    $("#activity_second_date2").attr('required', 'required');
                    $("#activity_difference").attr('required', 'required');
                    $("#activity_difference2").attr('required', 'required');
                }
                if (value > 5) {
                    $('#zonal').css('display', 'block');
                    $('#pm').css('display', 'block');
                    $('#ch').css('display', 'block');
                    $('#project_director').css('display', 'block');
                    $('#oh').css('display', 'block');
                    $('#rh').css('display', 'block');
                    $('#zh').css('display', 'block');
                    $('#coo').css('display', 'block');
                    $('#ho').css('display', 'block');
                } else if (value >= 3 && value <= 5) {
                    $('#zonal').css('display', 'block');
                    $('#pm').css('display', 'block');
                    $('#ch').css('display', 'block');
                    $('#oh').css('display', 'block');
                    $('#project_director').css('display', 'block');
                    $('#rh').css('display', 'block');
                    $('#zh').css('display', 'none');
                    $('#coo').css('display', 'none');
                    $('#ho').css('display', 'none');
                } else if (value >= 0.5 && value < 3) {
                    $('#zonal').css('display', 'block');
                    $('#pm').css('display', 'block');
                    $('#ch').css('display', 'block');
                    $('#oh').css('display', 'block');
                    $('#project_director').css('display', 'block');
                    $('#rh').css('display', 'none');
                    $('#zh').css('display', 'none');
                    $('#coo').css('display', 'none');
                    $('#ho').css('display', 'none');
                    $('#key-dates').css('display', 'none');
                } else {
                    $('#zonal').css('display', 'block');
                    $('#pm').css('display', 'block');
                    $('#ch').css('display', 'block');
                    $('#project_director').css('display', 'block');
                    $('#oh').css('display', 'none');
                    $('#rh').css('display', 'none');
                    $('#zh').css('display', 'none');
                    $('#coo').css('display', 'none');
                    $('#ho').css('display', 'none');
                }
            });
            var counterdcw = 2;
            $("#addrowdcw").on("click", function () {
                $('#sites-table-tbody tr').remove();
                var rowCount = $('#s_milestone_table tr').length;
                //alert(rowCount);
                var newRow = $("<tr>");
                var cols = "";
                cols += '<td><input type="button" class="ibtnDelDcw btn btn-sm btn-danger"  value="Delete"><input required type="text" class="form-control site-value" name="s_milestone[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="text" class="form-control site-value" name="s_milestone[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="date" class="form-control site-value-6" onchange="getOrderValue(' + counterdcw + ')" id="s_milestone_ov_' + counterdcw + '" name="s_milestone[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="text" class="form-control site-value-9" onchange="getDcwEndDate(' + counterdcw + ')" id="s_milestone_ed_' + counterdcw + '" name="s_milestone[' + counterdcw + '][]"/></td>';
                newRow.append(cols);
                $("#s_milestone_table").append(newRow);
                counterdcw++;
            });
            $("#s_milestone_table").on("click", ".ibtnDelDcw", function (event) {
                $('#sites-table-tbody tr').remove();
                var rowCount = $('#s_milestone_table tr').length;
                $(this).closest("tr").remove();
                counterdcw -= 1
            });
            var counterdcw2 = 2;
            $("#addrowdcw2").on("click", function () {
                $('#sites-table-tbody tr').remove();
                var rowCount = $('#s_milestone_table2 tr').length;
                //alert(rowCount);
                var newRow = $("<tr>");
                var cols = "";
                cols += '<td><input required type="text" class="form-control site-value" name="s_activity[' + counterdcw2 + '][]"/></td>';
                cols += '<td><input required type="date" class="form-control site-value" name="s_activity[' + counterdcw2 + '][]"/></td>';
                cols += '<td><input required type="text" class="form-control site-value-9"  name="s_activity[' + counterdcw2 + '][]"/></td>';
                cols += '<td><input type="button" class="ibtnDelDcw2 btn btn-sm btn-danger"  value="Delete"></td>';
                newRow.append(cols);
                $("#s_milestone_table2").append(newRow);
                counterdcw2++;
            });
            $("#s_milestone_table2").on("click", ".ibtnDelDcw2", function (event) {
                $('#sites-table-tbody tr').remove();
                var rowCount = $('#s_milestone_table tr').length;
                $(this).closest("tr").remove();
                counterdcw2 -= 1
            });

            $('#activity_first_date').on('change keyup paste', function () {
                var first = this.value;
                var second = $('#activity_second_date').val();
                $('#activity_second_date').attr('min', first);
                if (second && first) {
                    const date1 = new Date(first);
                    const date2 = new Date(second);
                    const diffTime = Math.abs(date2 - date1);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    $('#activity_difference').val(diffDays);
                }
            });

            $('#activity_second_date').on('change keyup paste', function () {
                var second = this.value;
                var first = $('#activity_first_date').val();
                $('#activity_first_date').attr('max', second);
                if (second && first) {
                    const date1 = new Date(first);
                    const date2 = new Date(second);
                    const diffTime = Math.abs(date2 - date1);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    $('#activity_difference').val(diffDays);
                }
            });

        </script>

    </body>
</html>