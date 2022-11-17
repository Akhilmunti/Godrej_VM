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
                                    <h3 class="page-title br-0">RFQ Approval Form : RFQ-001</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">

                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <form id="register_form" action="<?php echo base_url('buyer/vendor/sendForApprovalRFQ'); ?>" method="POST" enctype="multipart/form-data">
                                        <div class="box-body pb-0">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Subject : <span class="danger">*</span> </label>
                                                        <textarea required="" name="s_subject" class="form-control" rows="4"></textarea>
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
                                                        <textarea required="" name="s_sow" class="form-control" rows="4"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Contract Award strategy  : <span class="danger">*</span> </label>
                                                        <textarea required="" name="s_cas" class="form-control" rows="4"></textarea>
                                                    </div>
                                                </div>
                                                <!--                                                <div class="col-md-12">
                                                                                                    <div class="form-group">
                                                                                                        <label for="wopo_usertype"> Free Issue Materials  : <span class="danger">*</span> </label>
                                                                                                        <textarea required="" name="s_fim" class="form-control" rows="4"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <div class="form-group">
                                                                                                        <label for="wopo_usertype"> Base Rate Materials  : <span class="danger">*</span> </label>
                                                                                                        <textarea required="" name="s_brm" class="form-control" rows="4"></textarea>
                                                                                                    </div>
                                                                                                </div>-->
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
                                                                    Sl No.
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
                                                                    Bidder’s Category
                                                                </th>
                                                                <th>
                                                                    On-going / Completed Project Remarks
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $mVendors = json_decode($eoi['eoi_vendors_selected']);
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

                                                                $mCheckBidCapacity = $this->bc->getParentByVendorIdAndEoiId($mVendor, $eoi['eoi_id']);
                                                                $mBidCapacity = $mCheckBidCapacity['bc_to_4'] + $mCheckBidCapacity['bc_to_3'] + $mCheckBidCapacity['bc_to_2'] + $mCheckBidCapacity['bc_to_1'] / 4;

                                                                //print_r($mCheckBidCapacity);
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $mCount; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $mRecord['company_name']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $mCheckBidCapacity['bc_to_4']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $mBidCapacity; ?>
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
                                                                            Planned date of Contractor appointment As per BI Logic.
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