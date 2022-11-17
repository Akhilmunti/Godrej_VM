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
                                        Bid Management 
                                    </h3>
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
                                        <form id="register_form" action="<?php echo base_url('buyer/vendor/listApprovalBidders'); ?>" method="POST" class=" validation-wizard" enctype="multipart/form-data">
                                            <!-- step -->
                                            <h6></h6>
                                            <section>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Start Date</label>
                                                            <input type="date" class="form-control" name="" id="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Close Date</label>
                                                            <input type="date" class="form-control" name="" id="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Close Time</label>
                                                            <input type="time" class="form-control" name="" id="" />
                                                        </div>
                                                    </div>
                                                </div>  
                                            </section>
                                            <!-- End -->
                                            <h6></h6>
                                            <section>
                                                <div class="row">  
                                                    <div class="col-md-12" id="dvExcel" style="overflow-x: scroll">
                                                        <table class="table table-bordered table-template" border="1">
                                                            <tbody>
                                                                <tr>
                                                                    <th class="bg-primary">Part No</th>
                                                                    <th class="bg-primary">Specification</th>
                                                                    <th class="bg-primary">Location</th>
                                                                    <th class="bg-primary">Unit</th>
                                                                    <th class="bg-primary">Basement</th>
                                                                    <th class="bg-primary">Tower A</th>
                                                                    <th class="bg-primary">Tower B</th>
                                                                    <th class="bg-primary">Tower c</th>
                                                                    <th class="bg-primary">Total Quantity</th>
                                                                    <th class="bg-primary">Rate</th>
                                                                    <th class="bg-primary">Amount in INR</th>
                                                                    <th class="bg-primary">Remarks</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <b>1</b>
                                                                    </td>
                                                                    <td><b>Plaster</b></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>1.1</b></td>
                                                                    <td>
                                                                        <b>Providing &amp; Applying Gypsum plaster of GPL approved make on wall surfaces of average 10mm thk and finishing in line and level with neat and smooth surfaces free of undulations, cracks, leveling marks etc or any other deformities arising out of poor workmanship. Rate to include ceiling corner Gypsum plaster of 4 to 5mm thickness at Wall-Ceiling Junction for a width of 300mm, Surface Preparation, filling cracks in the background if any, surface cleaning, applicationg of Bondit++ or equivalent approved make, curing (if required), 5mmx5mm Fiber Mesh of 150 mm wide with lapping of 75mm 145 GSM,  of Saint Gobain or equivalent approved make with nominal thickness of individual thread . All Corners, Sill, Jambs, to be in line &amp; level, Right angle. Rate to include providing &amp; Erecting MS H frame scaffolding, for finishing of Electrical Switch Boxes, light points, fan hook points, DB’s, Junction box, Corecut areas etc.. as per the directions of Engineer-in-charge.
                                                                            NOTE: 
                                                                            1. At any location, If thickness of button mark found more than 15mm, carry out RMP back coat plaster (ensure the applied bonding agent is suitable to receive RMP) and to be water cured for 3 days. 
                                                                            2.In case of conventional construction, please ensure that external plaster is completed for block walls before gypsum plaster. If internal wall plastering to be done prior to external plaster, adopt RMP or MR- Moisture Resistant Gypsum plaster from Gyproc or equivalent instead of normal gypsum plaster for the internal face of External walls.
                                                                            3.Fix level pads (tikka) in grid form, first bottom and then top @ 1 m c/c after applying bonding agent
                                                                            4.Apply bonding agent (Bondit++ or equivalent) on RCC elements to avoid hacking and date of application to be marked on the wall. 
                                                                            5.Allow 24 hours drying time for bonding agent or as per manufacturer’s recommendation. If the gypsum plaster is not applied within 7 days, bonding agent to be reapplied after cleaning the existing surface. 
                                                                            6.Fix the Fibre mesh of 150mm width between RCC / Blockwork joint, Electrical conduits (chased area filled with RMP) and at all applicable locations like vertical stiffeners and RCC bands at window sills with 75 mm overlap on both sides 
                                                                            7.Inward and Outward Register, Material Consumption statement, Reconciliation statement to be submitted along with each RA Bill.
                                                                            8. Testing to be carried out as per GPL approved ITP
                                                                        </b>
                                                                    </td>
                                                                    <td><input value="Typical Floors : Living, Dining, Foyer, Bedrooms, Kitchen,balcony Utility (Walls)" class="form-control"></td>
                                                                    <td><input value=" Sqm " class="form-control min-width-200"></td>
                                                                    <td><input value="QRO" class="form-control min-width-200"></td>
                                                                    <td><input value=" 17,796.57 " class="form-control min-width-200"></td>
                                                                    <td><input value=" 16,609.39 " class="form-control min-width-200"></td>
                                                                    <td><input value=" 16,609.39 " class="form-control min-width-200"></td>
                                                                    <td><input value=" 16,609.39 " class="form-control min-width-200"></td>
                                                                    <td><input value=" 16,504.92 " class="form-control min-width-200"></td>
                                                                    <td><input value=" 16,440.13 " class="form-control min-width-200"></td>
                                                                    <td><textarea rows="3" class="form-control min-width-200"></textarea></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </section>
                                            <h6></h6>
                                            <section>
                                                <div class="row">  
                                                    <div class="col-md-12">
                                                        <div class="row mt-2">
                                                            <div class="col-md-12">
                                                                <table id="documents-table" class="table table-bordered">
                                                                    <thead class="bg-primary">
                                                                        <tr>
                                                                            <th>
                                                                                #
                                                                            </th>
                                                                            <th>
                                                                                Tender Docs
                                                                            </th>
                                                                            <th>
                                                                                Attachment
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
                                                                                    1
                                                                                </b>
                                                                            </td>
                                                                            <td>
                                                                                <b>
                                                                                    General Conditions of Contract
                                                                                </b>
                                                                            </td>
                                                                            <td>
                                                                                <select class="form-control">
                                                                                    <option selected="" value="" disabled="">Depository from portal</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <b>
                                                                                    2
                                                                                </b>
                                                                            </td>
                                                                            <td>
                                                                                <b>
                                                                                    Special Conditions of Contract
                                                                                </b>
                                                                            </td>
                                                                            <td>
                                                                                <input class="form-control" type="file" />
                                                                            </td>
                                                                            <td>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <b>
                                                                                    3
                                                                                </b>
                                                                            </td>
                                                                            <td>
                                                                                <b>
                                                                                    Safety Rules & Regulations
                                                                                </b>
                                                                            </td>
                                                                            <td>
                                                                                <select class="form-control">
                                                                                    <option selected="" value="" disabled="">Depository from portal</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <b>
                                                                                    4
                                                                                </b>
                                                                            </td>
                                                                            <td>
                                                                                <b>
                                                                                    Quality Document
                                                                                </b>
                                                                            </td>
                                                                            <td>
                                                                                <input class="form-control" type="file" />
                                                                            </td>
                                                                            <td>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <b>
                                                                                    5
                                                                                </b>
                                                                            </td>
                                                                            <td>
                                                                                <b>
                                                                                    Tender Drawings
                                                                                </b>
                                                                            </td>
                                                                            <td>
                                                                                <input class="form-control" type="file" />
                                                                            </td>
                                                                            <td>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <b>
                                                                                    6
                                                                                </b>
                                                                            </td>
                                                                            <td>
                                                                                <input class="form-control" type="text" />
                                                                            </td>
                                                                            <td>
                                                                                <input class="form-control" type="file" />
                                                                            </td>
                                                                            <td>

                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <td colspan="4" class="text-right">
                                                                                <a href="#" class="btn btn-primary" id="addrowdcw2">
                                                                                    <span class="fa fa-plus"></span>
                                                                                    Add New
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <h6></h6>
                                            <section>
                                                <div class="row">  
                                                    <div class="col-md-12">
                                                        <div class="row mt-2">
                                                            <div class="col-md-12">
                                                                <table id="documents-table" class="table table-bordered">
                                                                    <thead class="bg-primary">
                                                                        <tr>
                                                                            <th>
                                                                                #
                                                                            </th>
                                                                            <th>
                                                                                Terms
                                                                            </th>
                                                                            <th>
                                                                                Particulars
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <b>
                                                                                    1
                                                                                </b>
                                                                            </td>
                                                                            <td>
                                                                                <input class="form-control" type="text" />
                                                                            </td>
                                                                            <td>
                                                                                <textarea class="form-control" rows="4"></textarea>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <b>
                                                                                    2
                                                                                </b>
                                                                            </td>
                                                                            <td>
                                                                                <input class="form-control" type="text" />
                                                                            </td>
                                                                            <td>
                                                                                <textarea class="form-control" rows="4"></textarea>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <td colspan="3" class="text-right">
                                                                                <a href="#" class="btn btn-primary" id="addrowdcw3">
                                                                                    <span class="fa fa-plus"></span>
                                                                                    Add New
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <h6></h6>
                                            <section>
                                                <div class="col-md-12">
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

            <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

        </div>
        <!-- ./wrapper -->

        <div class="modal modal-right fade" id="modal-right-upload" tabindex="-1">
            <form id="boq_form" action="#" method="POST" enctype="multipart/form-data">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Upload BOQ Template</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="boq_dump"> Upload : <span class="danger">*</span> </label>
                                <input id="boq_dump" name="uploadFile" type="file" class="form-control" required="" />
                                <span class="mt-1"><b>Note :</b>  Please make sure column number and column names are similar in your uploading BOQ Document</span>
                            </div>
                            <a href="#" download="" class="btn btn-xs btn-primary">
                                Download Format
                            </a>
                        </div>
                        <div class="modal-footer modal-footer-uniform">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="upload_boq" type="button" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Break Up Quantity</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <table id="tender-docs-table" class="table table-bordered">
                            <thead class="bg-primary">
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Tower
                                    </th>
                                    <th>
                                        Quantity
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        Tower One
                                    </td>
                                    <td>
                                        268
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        Tower Two
                                    </td>
                                    <td>
                                        300
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">
                                        <b>
                                            Total Quantity
                                        </b>
                                    </td>
                                    <td>
                                        <b>
                                            568
                                        </b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

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

        <?php $this->load->view('buyer/partials/scripts'); ?>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/xlsx.full.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/jszip.js"></script>
        <script type="text/javascript">
            $("#upload_boq").click(function () {
                //Reference the FileUpload element.
                var fileUpload = $("#boq_dump")[0];

                //Validate whether File is valid Excel file.
                var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xls|.xlsx)$/;
                if (regex.test(fileUpload.value.toLowerCase())) {
                    if (typeof (FileReader) != "undefined") {
                        var reader = new FileReader();

                        //For Browsers other than IE.
                        if (reader.readAsBinaryString) {
                            reader.onload = function (e) {
                                ProcessExcel(e.target.result);
                            };
                            reader.readAsBinaryString(fileUpload.files[0]);
                        } else {
                            //For IE Browser.
                            reader.onload = function (e) {
                                var data = "";
                                var bytes = new Uint8Array(e.target.result);
                                for (var i = 0; i < bytes.byteLength; i++) {
                                    data += String.fromCharCode(bytes[i]);
                                }
                                ProcessExcel(data);
                            };
                            reader.readAsArrayBuffer(fileUpload.files[0]);
                        }
                    } else {
                        alert("This browser does not support HTML5.");
                    }
                } else {
                    alert("Please upload a valid Excel file.");
                }
            });
            function ProcessExcel(data) {
                //Read the Excel File data.
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });

                //Fetch the name of First Sheet.
                var firstSheet = workbook.SheetNames[0];

                //Read all rows from First Sheet into an JSON array.
                var excelRows = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[firstSheet]);

                //Create a HTML Table element.
                var table = $("<table class='table table-bordered table-template' />");
                table[0].border = "1";

                //Add the header row.
                var row = $(table[0].insertRow(-1));

                //Add the header cells.
                var headerCell = $("<th class='bg-primary' />");
                headerCell.html("Part No");
                row.append(headerCell);

                var headerCell = $("<th class='bg-primary' />");
                headerCell.html("Specification");
                row.append(headerCell);

                var headerCell = $("<th class='bg-primary' />");
                headerCell.html("Location");
                row.append(headerCell);

                var headerCell = $("<th class='bg-primary' />");
                headerCell.html("Unit");
                row.append(headerCell);

                var headerCell = $("<th class='bg-primary' />");
                headerCell.html("Basement");
                row.append(headerCell);

                var headerCell = $("<th class='bg-primary' />");
                headerCell.html("Tower A");
                row.append(headerCell);

                var headerCell = $("<th class='bg-primary' />");
                headerCell.html("Tower B");
                row.append(headerCell);

                var headerCell = $("<th class='bg-primary' />");
                headerCell.html("Tower c");
                row.append(headerCell);

                var headerCell = $("<th class='bg-primary' />");
                headerCell.html("Total Quantity");
                row.append(headerCell);

                var headerCell = $("<th class='bg-primary' />");
                headerCell.html("Rate");
                row.append(headerCell);

                var headerCell = $("<th class='bg-primary' />");
                headerCell.html("Amount in INR");
                row.append(headerCell);

                //Add the data rows from Excel file.
                for (var i = 0; i < excelRows.length; i++) {
                    //Add the data row.
                    var row = $(table[0].insertRow(-1));

                    //Add the data cells.
                    var cell = $("<td />");
                    cell.html("<b>" + excelRows[i].part_no + "</b>");
                    row.append(cell);

                    if (excelRows[i].specification) {
                        cell = $("<td />");
                        cell.html("<b>" + excelRows[i].specification + "</b>");
                        row.append(cell);
                    } else {
                        cell = $("<td />");
                        cell.html("");
                        row.append(cell);
                    }

                    if (excelRows[i].location) {
                        cell = $("<td />");
                        cell.html("<input value='" + excelRows[i].location + "' class='form-control'/>");
                        row.append(cell);
                    } else {
                        cell = $("<td />");
                        cell.html("");
                        row.append(cell);
                    }

                    if (excelRows[i].unit) {
                        cell = $("<td />");
                        cell.html("<input value='" + excelRows[i].unit + "' class='form-control'/>");
                        row.append(cell);
                    } else {
                        cell = $("<td />");
                        cell.html("");
                        row.append(cell);
                    }

                    if (excelRows[i].basement) {
                        cell = $("<td />");
                        cell.html("<input value='" + excelRows[i].basement + "' class='form-control'/>");
                        row.append(cell);
                    } else {
                        cell = $("<td />");
                        cell.html("");
                        row.append(cell);
                    }

                    if (excelRows[i].tower_a) {
                        cell = $("<td />");
                        cell.html("<input value='" + excelRows[i].tower_a + "' class='form-control'/>");
                        row.append(cell);
                    } else {
                        cell = $("<td />");
                        cell.html("");
                        row.append(cell);
                    }

                    if (excelRows[i].tower_b) {
                        cell = $("<td />");
                        cell.html("<input value='" + excelRows[i].tower_b + "' class='form-control'/>");
                        row.append(cell);
                    } else {
                        cell = $("<td />");
                        cell.html("");
                        row.append(cell);
                    }

                    if (excelRows[i].tower_c) {
                        cell = $("<td />");
                        cell.html("<input value='" + excelRows[i].tower_c + "' class='form-control'/>");
                        row.append(cell);
                    } else {
                        cell = $("<td />");
                        cell.html("");
                        row.append(cell);
                    }

                    if (excelRows[i].total_qty) {
                        cell = $("<td />");
                        cell.html("<input value='" + excelRows[i].tower_c + "' class='form-control'/>");
                        row.append(cell);
                    } else {
                        cell = $("<td />");
                        cell.html("");
                        row.append(cell);
                    }

                    if (excelRows[i].rate) {
                        cell = $("<td />");
                        cell.html("<input value='" + excelRows[i].rate + "' class='form-control'/>");
                        row.append(cell);
                    } else {
                        cell = $("<td />");
                        cell.html("");
                        row.append(cell);
                    }

                    if (excelRows[i].amount) {
                        cell = $("<td />");
                        cell.html("<input value='" + excelRows[i].amount + "' class='form-control'/>");
                        row.append(cell);
                    } else {
                        cell = $("<td />");
                        cell.html("");
                        row.append(cell);
                    }
                }

                var dvExcel = $("#dvExcel");
                dvExcel.html("");
                if (dvExcel.append(table)) {
                    $('#modal-right-upload').modal('hide');
                } else {
                    alert("Something went wrong, Please try again later.");
                }

            }

            $("#addrowdcw2").on("click", function () {
                var rowCount = $('#documents-table tr').length;
                var newRow = $("<tr>");
                var newline = rowCount - 1;
                var cols = "";
                cols += '<td>' + newline + '</td>';
                cols += '<td><input required type="text" class="form-control"/></td>';
                cols += '<td><input required type="file" class="form-control"/></td>';
                cols += '<td><input type="button" class="ibtnDelDcw2 btn btn-sm btn-danger"  value="Delete"></td>';
                newRow.append(cols);
                $("#documents-table").append(newRow);
            });
            $("#documents-table").on("click", ".ibtnDelDcw2", function (event) {
                $('#sites-table-tbody tr').remove();
                var rowCount = $('#documents-table tr').length;
                $(this).closest("tr").remove();
            });
        </script>

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
                    return currentIndex > newIndex || (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())

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

    </body>
</html>