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
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-block">
                                    <h5>
                                        <b>
                                            Awarded data FY(22-23)
                                        </b>
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: -30px">
                            <div class="col-xl-4 col-md-6 col-12">
                                <a href="<?php echo base_url('buyer/vendor/actionContracts'); ?>">
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
                                                    <?php echo "Escalation" . " : " . $iomdata['contracts']['c'] . " Crs" . " ~ (" . round($mAvgCon) . " %)"; ?>
                                                </p>
                                            <?php } else { ?>
                                                <p class="font-weight-600 mb-2 text-primary">
                                                    <?php echo "Saving" . " : " . $iomdata['contracts']['c'] . " Crs" . " ~ (" . round($mAvgCon) . " %)"; ?>
                                                </p>
                                            <?php } ?>

                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <a href="<?php echo base_url('buyer/vendor/actionProcurement'); ?>">
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
                                                    <?php echo "Escalation" . " : " . $iomdata['procurement']['c'] . " Crs" . " ~ (" . round($mAvgPro) . " %)"; ?>
                                                </p>
                                            <?php } else { ?>
                                                <p class="font-weight-600 mb-2 text-primary">
                                                    <?php echo "Saving" . " : " . $iomdata['procurement']['c'] . " Crs" . " ~ (" . round($mAvgPro) . " %)"; ?>
                                                </p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <a href="<?php echo base_url('buyer/vendor/actionTotal'); ?>">
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
                                                    <?php echo "Escalation" . " : " . $iomdata['total_avg'] . " Crs" . " ~ (" . round($mAvgTotal) . " %)"; ?>
                                                </p>
                                            <?php } else { ?>
                                                <p class="font-weight-600 mb-2 text-primary">
                                                    <?php echo "Saving" . " : " . $iomdata['total_avg'] . " Crs" . " ~ (" . round($mAvgTotal) . " %)"; ?>
                                                </p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </a>
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
                                                            <a href="<?php echo base_url('buyer/vendor/actionIomCount'); ?>">
                                                                Total IOM Count
                                                            </a>
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
                                                            <a href="<?php echo base_url('buyer/vendor/actionTatCount'); ?>">
                                                                Average TAT
                                                            </a>
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
                                                Quick Links
                                            </b>
                                        </h5>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-lg-6 text-center mb-2">
                                                <a href="<?php echo base_url('buyer/pending/shortlisting'); ?>" class="btn btn-block btn-primary">
                                                    <span class="span-sm">
                                                        Bidder List 
                                                        <span class="badge badge-danger ml-2">
                                                            <?php echo $short_count; ?>
                                                        </span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="col-lg-6 text-center mb-2">
                                                <a href="<?php echo base_url('nfa/Award_contract/award_recomm_contract_list/'); ?>" class="btn btn-block btn-primary">
                                                    <span class="span-sm">
                                                        Award IOM
                                                        <span class="badge badge-danger ml-2">
                                                            <?php echo "23"; ?>
                                                        </span>
                                                    </span>
                                                </a>
                                            </div>
                                            <!--                                            <div class="col-lg-6 text-center mb-2">
                                                                                            <a href="#" class="btn btn-block btn-primary">
                                                                                                <span>
                                                                                                    Amendments IOM
                                                                                                </span>
                                                                                            </a>
                                                                                        </div>-->
                                            <div class="col-lg-6 text-center mb-2">
                                                <a href="<?php echo base_url('buyer/vendor/viewAllVendorLogs'); ?>" class="btn btn-block btn-primary">
                                                    <span class="span-sm">
                                                        Vendor Logs
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="col-lg-6 text-center mb-2">
                                                <a href="<?php echo base_url('buyer/vendor/process'); ?>" class="btn btn-block btn-primary">
                                                    <span class="span-sm">
                                                        Zonal Data
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-12">
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
                                                            NCR
                                                        </th>
                                                        <th>
                                                            South
                                                        </th>
                                                        <th>
                                                            Mumbai
                                                        </th>
                                                        <th>
                                                            Pune
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="<?php echo base_url('buyer/vendor/actionSteel'); ?>">
                                                                Steel
                                                            </a>
                                                        </td>
                                                        <td>
                                                            MT
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($iomdata['latest_steel_price']['NCR']['uom_value']) {
                                                                echo round(($iomdata['latest_steel_price']['NCR']['total_finalized_award_value'] * 10000000) / $iomdata['latest_steel_price']['NCR']['uom_value']);
                                                            } else {
                                                                echo "-";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($iomdata['latest_steel_price']['South']['uom_value']) {
                                                                echo round(($iomdata['latest_steel_price']['South']['total_finalized_award_value'] * 10000000) / $iomdata['latest_steel_price']['South']['uom_value']);
                                                            } else {
                                                                echo "-";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($iomdata['latest_steel_price']['Mumbai']['uom_value']) {
                                                                echo round(($iomdata['latest_steel_price']['Mumbai']['total_finalized_award_value'] * 10000000) / $iomdata['latest_steel_price']['Mumbai']['uom_value']);
                                                            } else {
                                                                echo "-";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($iomdata['latest_steel_price']['Pune']['uom_value']) {
                                                                echo round(($iomdata['latest_steel_price']['Pune']['total_finalized_award_value'] * 10000000) / $iomdata['latest_steel_price']['Pune']['uom_value']);
                                                            } else {
                                                                echo "-";
                                                            }
                                                            ?>
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
                                                            <?php
                                                            if ($iomdata['latest_cement_price']['NCR']['uom_value']) {
                                                                echo round(($iomdata['latest_cement_price']['NCR']['total_finalized_award_value'] * 10000000) / $iomdata['latest_cement_price']['NCR']['uom_value']);
                                                            } else {
                                                                echo "-";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($iomdata['latest_cement_price']['South']['uom_value']) {
                                                                echo round(($iomdata['latest_cement_price']['South']['total_finalized_award_value'] * 10000000) / $iomdata['latest_cement_price']['South']['uom_value']);
                                                            } else {
                                                                echo "-";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($iomdata['latest_cement_price']['Mumbai']['uom_value']) {
                                                                echo round(($iomdata['latest_cement_price']['Mumbai']['total_finalized_award_value'] * 10000000) / $iomdata['latest_cement_price']['Mumbai']['uom_value']);
                                                            } else {
                                                                echo "-";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($iomdata['latest_cement_price']['Pune']['uom_value']) {
                                                                echo round(($iomdata['latest_cement_price']['Pune']['total_finalized_award_value'] * 10000000) / $iomdata['latest_cement_price']['Pune']['uom_value']);
                                                            } else {
                                                                echo "-";
                                                            }
                                                            ?>
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
                                                            <?php
                                                            if ($iomdata['latest_aluminium_price']['NCR']['uom_value']) {
                                                                echo round(($iomdata['latest_aluminium_price']['NCR']['total_finalized_award_value'] * 10000000) / $iomdata['latest_aluminium_price']['NCR']['uom_value']);
                                                            } else {
                                                                echo "-";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($iomdata['latest_aluminium_price']['South']['uom_value']) {
                                                                echo round(($iomdata['latest_aluminium_price']['South']['total_finalized_award_value'] * 10000000) / $iomdata['latest_aluminium_price']['South']['uom_value']);
                                                            } else {
                                                                echo "-";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($iomdata['latest_aluminium_price']['Mumbai']['uom_value']) {
                                                                echo round(($iomdata['latest_aluminium_price']['Mumbai']['total_finalized_award_value'] * 10000000) / $iomdata['latest_aluminium_price']['Mumbai']['uom_value']);
                                                            } else {
                                                                echo "-";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($iomdata['latest_aluminium_price']['Pune']['uom_value']) {
                                                                echo round(($iomdata['latest_aluminium_price']['Pune']['total_finalized_award_value'] * 10000000) / $iomdata['latest_aluminium_price']['Pune']['uom_value']);
                                                            } else {
                                                                echo "-";
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--                            <div class="col-xl-6 col-md-12">
                                                            <div class="box">
                                                                <div class="box-header with-border primary-gradient text-white">
                                                                    <h5 class="box-title text-bold">
                                                                        <b>
                                                                            Actions Required
                                                                        </b>
                                                                    </h5>
                                                                </div>
                                                                 /.box-header 
                                                                <div class="box-body py-0">
                            
                                                                    <div class="row">
                                                                        <div class="col-md-6 p-3">
                                                                            <a href="<?php echo base_url('buyer/pending/shortlisting'); ?>" class="btn btn-primary btn-block">
                                                                                Shortlisting
                                                                            </a>
                                                                        </div>
                            <?php
                            $mSessionEmail = $this->session->userdata('session_email');
                            if ($mSessionEmail == "sharmeen.ahmed@godrejproperties.com" || $mSessionEmail == "rajashree.sonawane@godrejproperties.com" || $mSessionEmail == "neeraj.kalra@godrejproperties.com") {
                                ?>
                                                                                                                                                                                                    <div class="col-md-6 p-3">
                                                                                                                                                                                                        <a href="<?php echo base_url('buyer/pending/vendor'); ?>" class="btn btn-primary btn-block">
                                                                                                                                                                                                            Vendor Management
                                                                                                                                                                                                        </a>
                                                                                                                                                                                                    </div>
                            <?php } ?>
                                                                    </div>
                            
                                                                </div>
                                                                 /.box-body 
                                                            </div>
                                                        </div>-->
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
        </script>

    </body>
</html>