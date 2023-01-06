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
                            <form method="POST" action="<?php echo base_url('buyer/vendor/filterDashboard'); ?>">
                                <div class="row">
                                    <div class="col-md-5 mb-2">
                                        <h5>
                                            <b>
                                                Awarded data FY(22-23)
                                            </b>
                                        </h5>
                                    </div>
                                    <div class="col-md-3 mb-2 text-right">
                                        <input required="" name="zone" readonly="" value="<?php echo $zone; ?>" class="form-control form-control-sm" />
<!--                                        <select readonly name="zone" id="zone" required="" class="form-control form-control-sm">
                                            <option value="" selected="" disabled="">Select Zone</option>
                                            <option <?php
                                        if ($zone == "NCR") {
                                            echo "selected";
                                        }
                                        ?> value="NCR">NCR</option>
                                            <option <?php
                                        if ($zone == "South") {
                                            echo "selected";
                                        }
                                        ?> value="South">South</option>
                                            <option <?php
                                        if ($zone == "Mumbai") {
                                            echo "selected";
                                        }
                                        ?> value="Mumbai">Mumbai</option>
                                            <option <?php
                                        if ($zone == "Pune") {
                                            echo "selected";
                                        }
                                        ?> value="Pune">Pune</option>
                                            <option <?php
                                        if ($zone == "Kolkata") {
                                            echo "selected";
                                        }
                                        ?> value="Kolkata">Kolkata</option>
                                            <option <?php
                                        if ($zone == "HO") {
                                            echo "selected";
                                        }
                                        ?> value="HO">HO</option>
                                            <option <?php
                                        if ($zone == "PAN India") {
                                            echo "selected";
                                        }
                                        ?> value="PAN India">PAN India</option>
                                        </select>-->
                                    </div>
                                    <div class="col-md-3 mb-2 text-right">
                                        <select name="project" id="project" required="" class="form-control form-control-sm">
                                            <option selected="" disabled="">Select Project</option>
                                            <option <?php
                                            if ($project == "All") {
                                                echo "selected";
                                            }
                                            ?> value="All">All</option>
                                                <?php foreach ($projects as $key => $pro) { ?>
                                                <option <?php
                                                if ($project['project_id'] == $pro['project_id']) {
                                                    echo "selected";
                                                }
                                                ?> value="<?php echo $pro['project_id']; ?>">
                                                        <?php echo $pro['project_name']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1 mb-2 text-right">
                                        <button type="submit" class="btn btn-primary btn-xs btn-block mt-1">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="row" style="margin-top: -30px">
                            <div class="col-xl-4 col-md-6 col-12">
                                <!--                                <a href="#">-->
                                <div class="box">
                                    <div class="box-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="mb-0">Contracts</p>
                                                <h4 class="text-danger font-weight-200">
                                                    <?php
                                                    if ($iomdata['contracts']['b']) {
                                                        echo $iomdata['contracts']['b'];
                                                    } else {
                                                        "-";
                                                    }
                                                    ?> 
                                                    crs
                                                </h4>
                                            </div>
                                            <div>
                                                <i class="ti-info font-size-40"></i>
                                            </div>
                                        </div>

                                        <?php
                                        $mAvgCon = (($iomdata['contracts']['b'] - $iomdata['contracts']['a']) / $iomdata['contracts']['a']) * 100;
                                        if (is_nan($mAvgCon)) {
                                            $mAvgCon = "";
                                        } else {
                                            $mAvgCon = $mAvgCon;
                                        }
                                        if ($iomdata['contracts']['c'] > 0) {
                                            ?>
                                            <p class="font-weight-600 mb-2 text-danger">
                                                <?php echo "Escalation" . " : " . $iomdata['contracts']['c'] . " ~ (" . round($mAvgCon) . " %)"; ?>
                                            </p>
                                        <?php } else { ?>
                                            <p class="font-weight-600 mb-2 text-primary">
                                                <?php echo "Saving" . " : " . $iomdata['contracts']['c'] . " ~ (" . round($mAvgCon) . " %)"; ?>
                                            </p>
                                        <?php } ?>

                                    </div>
                                </div>
                                <!--                                </a>-->
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <!--                                <a href="#" class="rfq-process">-->
                                <div class="box">
                                    <div class="box-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="mb-0">Procurement</p>
                                                <h4 class="text-danger font-weight-200">
                                                    <?php
                                                    if ($iomdata['procurement']['b']) {
                                                        echo $iomdata['procurement']['b'];
                                                    } else {
                                                        "-";
                                                    }
                                                    ?> 
                                                    crs
                                                </h4>
                                            </div>
                                            <div>
                                                <i class="ti-info font-size-40"></i>
                                            </div>
                                        </div>
                                        <?php
                                        $mAvgPro = (($iomdata['procurement']['b'] - $iomdata['procurement']['a']) / $iomdata['procurement']['a']) * 100;
                                        if (is_nan($mAvgPro)) {
                                            $mAvgPro = "";
                                        } else {
                                            $mAvgPro = $mAvgPro;
                                        }
                                        if ($iomdata['procurement']['c'] > 0) {
                                            ?>
                                            <p class="font-weight-600 mb-2 text-danger">
                                                <?php echo "Escalation" . " : " . $iomdata['procurement']['c'] . " ~ (" . round($mAvgPro) . " %)"; ?>
                                            </p>
                                        <?php } else { ?>
                                            <p class="font-weight-600 mb-2 text-primary">
                                                <?php echo "Saving" . " : " . $iomdata['procurement']['c'] . " ~ (" . round($mAvgPro) . " %)"; ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!--                                </a>-->
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <!--                                <a href="#" class="rfq-process">-->
                                <div class="box">
                                    <div class="box-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="mb-0">Total C&P</p>
                                                <h4 class="text-danger font-weight-200">
                                                    <?php
                                                    if ($iomdata['total']) {
                                                        echo $iomdata['total'];
                                                    } else {
                                                        "-";
                                                    }
                                                    ?> 
                                                    crs
                                                </h4>
                                            </div>
                                            <div>
                                                <i class="ti-info font-size-40"></i>
                                            </div>
                                        </div>
                                        <?php
                                        $mAvgAward = $iomdata['contracts']['b'] + $iomdata['procurement']['b'];
                                        $mAvgBudget = $iomdata['contracts']['a'] + $iomdata['procurement']['a'];
                                        $mAvgTotal = (($mAvgAward - $mAvgBudget) / $mAvgBudget) * 100;
                                        if (is_nan($mAvgTotal)) {
                                            $mAvgTotal = "";
                                        } else {
                                            $mAvgTotal = $mAvgTotal;
                                        }
                                        if ($iomdata['total_avg'] > 0) {
                                            ?>
                                            <p class="font-weight-600 mb-2 text-danger">
                                                <?php echo "Escalation" . " : " . $iomdata['total_avg'] . " ~ (" . round($mAvgTotal) . " %)"; ?>
                                            </p>
                                        <?php } else { ?>
                                            <p class="font-weight-600 mb-2 text-primary">
                                                <?php echo "Saving" . " : " . $iomdata['total_avg'] . " ~ (" . round($mAvgTotal) . " %)"; ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!--                                </a>-->
                            </div>

                            <div class="col-xl-4 col-md-12">
                                <div class="box">
                                    <div class="box-header with-border primary-gradient text-white">
                                        <h5 class="box-title text-bold">
                                            <b>
                                                Total number of Awards (FY 22-23)
                                            </b>
                                        </h5>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body py-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Tender Type
                                                        </th>
                                                        <th>
                                                            Contracts
                                                        </th>
                                                        <th>
                                                            Procurement
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <tr>
                                                        <td>
                                                            Total IOM Count
                                                        </td>
                                                        <td>
                                                            <?php echo $iomdata['total_contracts']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $iomdata['total_procurements']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Average TAT
                                                        </td>
                                                        <td>
                                                            -
                                                        </td>
                                                        <td>
                                                            -
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>

                            <style>
                                .span-sm{
                                    font-size: 12px
                                }
                            </style>

                            <div class="col-xl-4 col-md-12">
                                <div class="box">
                                    <div class="box-header with-border primary-gradient text-white">
                                        <h5 class="box-title text-bold">
                                            <b>
                                                Vendor Database
                                            </b>
                                        </h5>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body py-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <td>
                                                            <a href="<?php echo base_url('buyer/vendor/actionFilterGplData/All/All/All/All/All'); ?>">
                                                                Total Empaneled Agencies till date - 
                                                                <?php
                                                                if (!empty($getVendors)) {
                                                                    echo count($getVendors);
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Empaneled Agencies FY(22-23) - <?php
                                                            if (!empty($getVendorsThisYear)) {
                                                                echo count($getVendorsThisYear);
                                                                $mCountV = count($getVendorsThisYear);
                                                            } else {
                                                                echo "0";
                                                                $mCountV = 0;
                                                            }
                                                            ?> 
                                                            <span class="fa fa-arrow-up text-warning">
                                                                <?php
                                                                $mAvgVendors = (count($getVendorsThisYear) / count($getVendors)) * 100;
                                                                if (is_nan($mAvgVendors)) {
                                                                    $mAvgVendors = "";
                                                                } else {
                                                                    $mAvgVendors = $mAvgVendors;
                                                                }
                                                                ?>
                                                                <?php echo $mAvgVendors; ?> % 
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
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

                            <?php if ($project == "All") { ?>
                                <div class="col-xl-4">
                                    <div class="box">
                                        <div class="box-header with-border primary-gradient text-white">
                                            Quick Links
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="row">
                                                <?php
                                                $mSessionZone = $this->session->userdata('session_zone');
                                                $mSessionRole = $this->session->userdata('session_role');
                                                ?>



                                                <div class="col-lg-6 text-center mb-2">
                                                    <a href="<?php echo base_url('buyer/pending/shortlisting'); ?>" class="btn btn-block btn-primary">
                                                        <span class="span-sm">
                                                            Bidder List 
                                                            <span class="badge badge-danger ml-2">
                                                                <?php
                                                                if ($short_count) {
                                                                    echo $short_count;
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?>
                                                            </span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6 text-center mb-2">
                                                    <a href="<?php echo base_url('nfa/ListNfa/award_iom_list/'); ?>" class="btn btn-block btn-primary">
                                                        <span>
                                                            Award IOM <br><span style="height: 22px;width:26px;border-radius:5px;" class="badge bg-danger "><?php echo $pending_sum_count; ?></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <!--                                                <div class="col-lg-6 text-center mb-2">
                                                                                                    <a href="#" class="btn btn-block btn-primary">
                                                                                                        <span>
                                                                                                            Amendments IOM
                                                                                                        </span>
                                                                                                    </a>
                                                                                                </div>-->

                                                <div class="col-lg-6 text-center mb-2">
                                                    <a href="<?php echo base_url('buyer/vendor/viewAllVendorLogs/' . $zone); ?>" class="btn btn-block btn-primary">
                                                        <span class="span-sm">
                                                            <?php echo "Vendor Logs"; ?>
                                                        </span>
                                                    </a>
                                                </div>

                                                <div class="col-lg-6 text-center mb-2">
                                                    <a href="<?php echo base_url('buyer/vendor/selectProject/' . $zone); ?>" class="btn btn-block btn-primary">
                                                        <span class="span-sm">
                                                            Projects
                                                        </span>
                                                    </a>
                                                </div>



                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="col-xl-4">
                                    <div class="box">
                                        <div class="box-header with-border primary-gradient text-white">
                                            <?php if (!empty($projects)) { ?>
                                                <h5 class="box-title text-bold">
                                                    <b>
                                                        <?php
                                                        if ($project['project_name']) {
                                                            echo $project['project_name'];
                                                        } else {
                                                            echo $projects[0]['project_name'];
                                                        }
                                                        ?>
                                                    </b>
                                                </h5>
                                            <?php } else { ?>
                                                <h5 class="box-title text-bold">
                                                    <b>
                                                        Project Management
                                                    </b>
                                                </h5>
                                            <?php } ?>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <?php if (!empty($projects)) { ?>
                                                <div class="row">
                                                    <!--                                            <div class="col-lg-6 text-center mb-2">
                                                    <?php
                                                    if ($project['project_id']) {
                                                        $mProjectId = $project['project_id'];
                                                    } else {
                                                        $mProjectId = $projects[0]['project_id'];
                                                    }
                                                    ?>
                                                                                                    <a href="<?php echo base_url('buyer/vendor/selectWork/' . $mProjectId . "/" . $zone . "/" . "3" . "/" . "Contracts"); ?>" class="btn btn-block btn-primary">
                                                                                                        <span>
                                                                                                            Contract Management
                                                                                                        </span>
                                                                                                    </a>
                                                                                                    <br>
                                                                                                </div>
                                                                                                <div class="col-lg-6 text-center mb-2">
                                                                                                    <a href="<?php echo base_url('buyer/vendor/viewAllVendorLogs'); ?>" class="btn btn-block btn-primary">
                                                                                                        <span>
                                                                                                            View Vendor Logs
                                                                                                        </span>
                                                                                                    </a>
                                                                                                    <br>
                                                                                                </div>-->
                                                    <?php
                                                    $mSessionZone = $this->session->userdata('session_zone');
                                                    $mSessionRole = $this->session->userdata('session_role');
                                                    ?>

                                                    <div class="col-lg-6 text-center mb-2">
                                                        <a href="<?php echo base_url('buyer/vendor/selectWork/' . $mProjectId . "/" . $zone . "/" . "3" . "/" . "Contracts"); ?>" class="btn btn-block btn-primary">
                                                            <span>
                                                                Contracts <span style="height: 22px;width:27px;border-radius:5px" class="badge bg-danger "><?php echo $pending_iom_count; ?></span>
                                                            </span>
                                                        </a>
                                                        <br>
                                                    </div>
                                                    <div class="col-lg-6 text-center mb-2">
                                                        <a href="<?php echo base_url('buyer/vendor/selectWork/' . $mProjectId . "/" . $zone . "/" . "1" . "/" . "Procurement"); ?>" class="btn btn-block btn-primary">
                                                            <span>
                                                                Procurement<span style="height: 22px;width:27px;border-radius:5px" class="badge bg-danger "><?php echo $pending_proc_iom_count; ?></span>
                                                            </span>
                                                        </a>
                                                        <br>
                                                    </div>
                                                    <div class="col-lg-6 text-center mb-2">
                                                        <a href="<?php echo base_url('buyer/vendor/vendorLogs/' . $mProjectId . "/" . $zone); ?>" class="btn btn-block btn-primary">
                                                            <span>
                                                                Vendor Logs
                                                            </span>
                                                        </a>
                                                        <br>
                                                    </div>
                                                    <div class="col-lg-6 text-center mb-2">
                                                        <a href="<?php echo base_url('buyer/pending/shortlisting'); ?>" class="btn btn-block btn-primary">
                                                            <span>
                                                                Bidder List 
                                                                <span class="badge badge-danger ml-2">
                                                                    <?php echo $short_count; ?>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-6 text-center mb-2">
                                                        <a href="<?php echo base_url('nfa/ListNfa/award_iom_list/');?>" class="btn btn-block btn-primary">
                                                            <span>
                                                                Award IOM
                                                                <span class="badge badge-danger ml-2">
                                                                    <?php echo "23"; ?>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                            <?php } else { ?>
                                                <div class="row">
                                                    <div class="col-lg-12 text-center mb-2">
                                                        <a href="<?php echo base_url('buyer/vendor/selectProjectByUser/' . $zone); ?>" class="btn btn-block btn-primary">
                                                            <span>
                                                                Create Project
                                                            </span>
                                                        </a>
                                                        <br>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="col-xl-6">
                                <div class="box">
                                    <div class="box-header with-border primary-gradient text-white">
                                        <h5 class="box-title text-bold">
                                            <b>
                                                Recent Procurement Rate - INR
                                            </b>
                                        </h5>
                                    </div>

                                    <div class="box-body py-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Item
                                                        </th>
                                                        <th>
                                                            UOM
                                                        </th>
                                                        <th>
                                                            <?php echo $mSessionZone; ?>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Steel
                                                        </td>
                                                        <td>
                                                            MT
                                                        </td>
                                                        <td>
                                                            <?php if ($mSessionZone == "NCR") { ?>
                                                                <?php
                                                                if ($iomdata['latest_steel_price']['NCR']['uom_value']) {
                                                                    echo round(($iomdata['latest_steel_price']['NCR']['total_finalized_award_value'] * 10000000) / $iomdata['latest_steel_price']['NCR']['uom_value']);
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            <?php } ?>

                                                            <?php if ($mSessionZone == "South") { ?>
                                                                <?php
                                                                if ($iomdata['latest_steel_price']['South']['uom_value']) {
                                                                    echo round(($iomdata['latest_steel_price']['South']['total_finalized_award_value'] * 10000000) / $iomdata['latest_steel_price']['South']['uom_value']);
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            <?php } ?>

                                                            <?php if ($mSessionZone == "Mumbai") { ?>
                                                                <?php
                                                                if ($iomdata['latest_steel_price']['Mumbai']['uom_value']) {
                                                                    echo round(($iomdata['latest_steel_price']['Mumbai']['total_finalized_award_value'] * 10000000) / $iomdata['latest_steel_price']['Mumbai']['uom_value']);
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            <?php } ?>

                                                            <?php if ($mSessionZone == "Pune") { ?>
                                                                <?php
                                                                if ($iomdata['latest_steel_price']['Pune']['uom_value']) {
                                                                    echo round(($iomdata['latest_steel_price']['Pune']['total_finalized_award_value'] * 10000000) / $iomdata['latest_steel_price']['Pune']['uom_value']);
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Cement
                                                        </td>
                                                        <td>
                                                            Bags
                                                        </td>
                                                        <td>
                                                            <?php if ($mSessionZone == "NCR") { ?>
                                                                <?php
                                                                if ($iomdata['latest_cement_price']['NCR']['uom_value']) {
                                                                    echo round(($iomdata['latest_cement_price']['NCR']['total_finalized_award_value'] * 10000000) / $iomdata['latest_cement_price']['NCR']['uom_value']);
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            <?php } ?>

                                                            <?php if ($mSessionZone == "South") { ?>
                                                                <?php
                                                                if ($iomdata['latest_cement_price']['South']['uom_value']) {
                                                                    echo round(($iomdata['latest_cement_price']['South']['total_finalized_award_value'] * 10000000) / $iomdata['latest_cement_price']['South']['uom_value']);
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            <?php } ?>

                                                            <?php if ($mSessionZone == "Mumbai") { ?>
                                                                <?php
                                                                if ($iomdata['latest_cement_price']['Mumbai']['uom_value']) {
                                                                    echo round(($iomdata['latest_cement_price']['Mumbai']['total_finalized_award_value'] * 10000000) / $iomdata['latest_cement_price']['Mumbai']['uom_value']);
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            <?php } ?>

                                                            <?php if ($mSessionZone == "Pune") { ?>
                                                                <?php
                                                                if ($iomdata['latest_cement_price']['Pune']['uom_value']) {
                                                                    echo round(($iomdata['latest_cement_price']['Pune']['total_finalized_award_value'] * 10000000) / $iomdata['latest_cement_price']['Pune']['uom_value']);
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Aluform
                                                        </td>
                                                        <td>
                                                            Sqm
                                                        </td>
                                                        <td>
                                                            <?php if ($mSessionZone == "NCR") { ?>
                                                                <?php
                                                                if ($iomdata['latest_aluminium_price']['NCR']['uom_value']) {
                                                                    echo round(($iomdata['latest_aluminium_price']['NCR']['total_finalized_award_value'] * 10000000) / $iomdata['latest_aluminium_price']['NCR']['uom_value']);
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            <?php } ?>

                                                            <?php if ($mSessionZone == "South") { ?>
                                                                <?php
                                                                if ($iomdata['latest_aluminium_price']['South']['uom_value']) {
                                                                    echo round(($iomdata['latest_aluminium_price']['South']['total_finalized_award_value'] * 10000000) / $iomdata['latest_aluminium_price']['South']['uom_value']);
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            <?php } ?>

                                                            <?php if ($mSessionZone == "Mumbai") { ?>
                                                                <?php
                                                                if ($iomdata['latest_aluminium_price']['Mumbai']['uom_value']) {
                                                                    echo round(($iomdata['latest_aluminium_price']['Mumbai']['total_finalized_award_value'] * 10000000) / $iomdata['latest_aluminium_price']['Mumbai']['uom_value']);
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            <?php } ?>

                                                            <?php if ($mSessionZone == "Pune") { ?>
                                                                <?php
                                                                if ($iomdata['latest_aluminium_price']['Pune']['uom_value']) {
                                                                    echo round(($iomdata['latest_aluminium_price']['Pune']['total_finalized_award_value'] * 10000000) / $iomdata['latest_aluminium_price']['Pune']['uom_value']);
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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

        </div>
        <!-- ./wrapper -->

        <?php $this->load->view('buyer/partials/scripts'); ?>

        <script>
            $('.rfq-process').click(function () {
                alert("Under Development");
            });

            $('#zone').change(function () {
                $.post("<?php echo base_url('home/getProjectsByZone'); ?>",
                        {
                            id: this.value,
                        },
                        function (data, status) {
                            $('#project').html(data);
                        });
            });
        </script>

    </body>
</html>