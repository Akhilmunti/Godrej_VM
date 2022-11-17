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
                                <a href="#" class="rfq-process">
                                    <div class="box">
                                        <div class="box-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="mb-0">Contracts</p>
                                                    <h4 class="text-danger font-weight-200">- crs</h4>
                                                </div>
                                                <div>
                                                    <i class="ti-info font-size-40"></i>
                                                </div>
                                            </div>
                                            <p class="font-weight-600 mb-2">
                                                Saving @ -
                                            </p>
                                            <div class="progress progress-xxs mb-10">
                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">- Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <a href="#" class="rfq-process">
                                    <div class="box">
                                        <div class="box-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="mb-0">Procurement</p>
                                                    <h4 class="text-danger font-weight-200">- crs</h4>
                                                </div>
                                                <div>
                                                    <i class="ti-info font-size-40"></i>
                                                </div>
                                            </div>
                                            <p class="font-weight-600 mb-2">
                                                Escalation @ -
                                            </p>
                                            <div class="progress progress-xxs mb-10">
                                                <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">- Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <a href="#" class="rfq-process">
                                    <div class="box">
                                        <div class="box-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="mb-0">Total C&P</p>
                                                    <h4 class="text-danger font-weight-200">- crs</h4>
                                                </div>
                                                <div>
                                                    <i class="ti-info font-size-40"></i>
                                                </div>
                                            </div>
                                            <p class="font-weight-600 mb-2">
                                                Saving @ -
                                            </p>
                                            <div class="progress progress-xxs mb-10">
                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">- Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4 col-md-12">
                                <div class="box">
                                    <div class="box-header with-border primary-gradient text-white">
                                        <h5 class="box-title text-bold">
                                            <b>
                                                Total number of Awards (22-23)
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
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            FY(22-23)
                                                        </td>
                                                        <td>
                                                            -
                                                        </td>
                                                        <td>
                                                            -
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
                                                            if (!empty($getVendors)) {
                                                                echo count($getVendors);
                                                                $mCountV = count($getVendors);
                                                            } else {
                                                                echo "0";
                                                                $mCountV = 0;
                                                            }
                                                            ?> 
                                                            <span class="fa fa-arrow-up text-warning"><?php echo round(($mCountV / (1000 - $mCountV)) * 100, 2); ?> % </span>
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
                                                <a href="#" class="btn btn-block btn-primary">
                                                    <span>
                                                        Bidder List
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="col-lg-6 text-center mb-2">
                                                <a href="#" class="btn btn-block btn-primary">
                                                    <span>
                                                        Award IOM
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="col-lg-6 text-center mb-2">
                                                <a href="#" class="btn btn-block btn-primary">
                                                    <span>
                                                        Amendments IOM
                                                    </span>
                                                </a>
                                            </div>
                                            <!--                                            <div class="col-lg-6 text-center mb-2">
                                                                                            <a href="<?php echo base_url('buyer/vendor/viewAllVendorLogs/NCR'); ?>" class="btn btn-block btn-primary">
                                                                                                <span>
                                                                                                    NCR
                                                                                                </span>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col-lg-6 text-center mb-2">
                                                                                            <a href="<?php echo base_url('buyer/vendor/viewAllVendorLogs/South'); ?>" class="btn btn-block btn-primary">
                                                                                                <span>
                                                                                                    South
                                                                                                </span>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col-lg-6 text-center mb-2">
                                                                                            <a href="<?php echo base_url('buyer/vendor/viewAllVendorLogs/Mumbai'); ?>" class="btn btn-block btn-primary">
                                                                                                <span>
                                                                                                    Mumbai
                                                                                                </span>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col-lg-6 text-center mb-2">
                                                                                            <a href="<?php echo base_url('buyer/vendor/viewAllVendorLogs/Pune'); ?>" class="btn btn-block btn-primary">
                                                                                                <span>
                                                                                                    Pune
                                                                                                </span>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col-lg-6 text-center mb-2">
                                                                                            <a href="<?php echo base_url('buyer/vendor/viewAllVendorLogs/Kolkata'); ?>" class="btn btn-block btn-primary">
                                                                                                <span>
                                                                                                    Kolkata
                                                                                                </span>
                                                                                            </a>
                                                                                        </div>-->
                                            <div class="col-lg-6 text-center mb-2">
                                                <a href="<?php echo base_url('buyer/vendor/viewAllVendorLogs'); ?>" class="btn btn-block btn-primary">
                                                    <span>
                                                        Vendor Logs
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>

                            <!--                            <div class="col-xl-12 col-md-12">
                                                            <div class="box">
                                                                <div class="box-header with-border primary-gradient text-white">
                                                                    <h5 class="box-title text-bold">
                                                                        <b>
                                                                            Zonal Dashboard
                                                                        </b>
                                                                    </h5>
                                                                </div>
                                                                 /.box-header 
                                                                <div class="box-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-4 text-center mb-2">
                                                                            <a href="<?php echo base_url('buyer/vendor/zonalDashboard/NCR'); ?>" class="btn btn-block btn-primary">
                                                                                <span>
                                                                                    NCR
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-lg-4 text-center mb-2">
                                                                            <a href="<?php echo base_url('buyer/vendor/zonalDashboard/South'); ?>" class="btn btn-block btn-primary">
                                                                                <span>
                                                                                    South
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-lg-4 text-center mb-2">
                                                                            <a href="<?php echo base_url('buyer/vendor/zonalDashboard/Mumbai'); ?>" class="btn btn-block btn-primary">
                                                                                <span>
                                                                                    Mumbai
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-lg-4 text-center mb-2">
                                                                            <a href="<?php echo base_url('buyer/vendor/zonalDashboard/Pune'); ?>" class="btn btn-block btn-primary">
                                                                                <span>
                                                                                    Pune
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-lg-4 text-center mb-2">
                                                                            <a href="<?php echo base_url('buyer/vendor/zonalDashboard/Kolkata'); ?>" class="btn btn-block btn-primary">
                                                                                <span>
                                                                                    Kolkata
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                 /.box-body 
                                                            </div>
                                                        </div>-->

                            <div class="col-xl-6 col-md-12">
                                <div class="box">
                                    <div class="box-header with-border primary-gradient text-white">
                                        <h5 class="box-title text-bold">
                                            <b>
                                                Recent Procurement Rate
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
                                                            Steel
                                                        </td>
                                                        <td>
                                                            MT
                                                        </td>
                                                        <td>
                                                            -
                                                        </td>
                                                        <td>
                                                            -
                                                        </td>
                                                        <td>
                                                            -
                                                        </td>
                                                        <td>
                                                            -
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
                                                            -
                                                        </td>
                                                        <td>
                                                            -
                                                        </td>
                                                        <td>
                                                            -
                                                        </td>
                                                        <td>
                                                            -
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
                                                            -
                                                        </td>
                                                        <td>
                                                            -
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
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-12">
                                <div class="box">
                                    <div class="box-header with-border primary-gradient text-white">
                                        <h5 class="box-title text-bold">
                                            <b>
                                                Actions Required
                                            </b>
                                        </h5>
                                    </div>
                                    <!-- /.box-header -->
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
                                    <!-- /.box-body -->
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
        </script>

    </body>
</html>