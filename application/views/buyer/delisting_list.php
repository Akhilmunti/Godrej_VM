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
                            <div class="row">
                                <div class="col-md-10">
                                    <h3 class="page-title br-0">De-listing of vendors</h3>
                                </div>
                                <div class="col-md-2">
                                    <?php
                                    $mSessionRole = $this->session->userdata('session_role');
                                    if ($mSessionRole == "HO - C&P" || $mSessionRole == "Regional C&P Head" || $mSessionRole == "Regional C&P Team" || $mSessionRole == "PCM") {
                                        ?>
                                        <a class="btn btn-primary btn-block" href="<?php echo base_url('buyer/vendor/sendDelisting'); ?>">
                                            De-list Vendor
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>SL No</th>
                                                        <th>Action</th>
                                                        <th>Status</th>
                                                        <th>Type Of Agency</th>
                                                        <th>Package Name</th>
                                                        <th>Vendor</th>
                                                        <th>More details of reason</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $mSessionKey = $this->session->userdata('session_id');
                                                    //echo $mSessionKey;
                                                    foreach ($records as $key => $record) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $key + 1; ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($record['delisting_ro'] == $mSessionKey && $record['delisting_status'] == "0") { ?>
                                                                    <a href="<?php echo base_url('buyer/vendor/actionChangeDelistingStatus/' . "1" . "/" . $record['delisting_id']); ?>" class="btn btn-xs btn-primary btn-block">
                                                                        Approve 
                                                                    </a>
                                                                    <a href="<?php echo base_url('buyer/vendor/actionChangeDelistingStatus/' . "5" . "/" . $record['delisting_id']); ?>" class="btn btn-xs btn-danger btn-block">
                                                                        Reject 
                                                                    </a>
                                                                <?php } else if ($record['delisting_oh'] == $mSessionKey && $record['delisting_status'] == "1") { ?>
                                                                    <a href="<?php echo base_url('buyer/vendor/actionChangeDelistingStatus/' . "2" . "/" . $record['delisting_id']); ?>" class="btn btn-xs btn-primary btn-block">
                                                                        Approve 
                                                                    </a>
                                                                    <a href="<?php echo base_url('buyer/vendor/actionChangeDelistingStatus/' . "6" . "/" . $record['delisting_id']); ?>" class="btn btn-xs btn-danger btn-block">
                                                                        Reject 
                                                                    </a>
                                                                <?php } else if ($record['delisting_ho'] == $mSessionKey && $record['delisting_status'] == "2") { ?>
                                                                    <a href="<?php echo base_url('buyer/vendor/actionChangeDelistingStatus/' . "3" . "/" . $record['delisting_id']); ?>" class="btn btn-xs btn-primary btn-block">
                                                                        Approve 
                                                                    </a>
                                                                    <a href="<?php echo base_url('buyer/vendor/actionChangeDelistingStatus/' . "7" . "/" . $record['delisting_id']); ?>" class="btn btn-xs btn-danger btn-block">
                                                                        Reject 
                                                                    </a>
                                                                <?php } else if ($record['delisting_coo'] == $mSessionKey && $record['delisting_status'] == "3") { ?>
                                                                    <a href="<?php echo base_url('buyer/vendor/actionChangeDelistingStatus/' . "4" . "/" . $record['delisting_id']); ?>" class="btn btn-xs btn-primary btn-block">
                                                                        Approve 
                                                                    </a>
                                                                    <a href="<?php echo base_url('buyer/vendor/actionChangeDelistingStatus/' . "8" . "/" . $record['delisting_id']); ?>" class="btn btn-xs btn-danger btn-block">
                                                                        Reject 
                                                                    </a>
                                                                <?php } else { ?>
                                                                    <a href="<?php echo base_url('buyer/vendor/viewDelistingData/' . $record['delisting_id']); ?>" class="btn btn-xs btn-primary btn-block">
                                                                        View 
                                                                    </a>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($record['delisting_status'] == "1") {
                                                                    echo "<span class='badge badge-success'>RO C&P Head Approved</span>";
                                                                } else if ($record['delisting_status'] == "5") {
                                                                    echo "<span class='badge badge-success'>RO C&P Head Rejected</span>";
                                                                } else if ($record['delisting_status'] == "2") {
                                                                    echo "<span class='badge badge-success'>OH Approved</span>";
                                                                } else if ($record['delisting_status'] == "6") {
                                                                    echo "<span class='badge badge-success'>OH Rejected</span>";
                                                                } else if ($record['delisting_status'] == "3") {
                                                                    echo "<span class='badge badge-success'>HO C&P Approved</span>";
                                                                } else if ($record['delisting_status'] == "7") {
                                                                    echo "<span class='badge badge-success'>HO C&P Rejected</span>";
                                                                } else if ($record['delisting_status'] == "4") {
                                                                    echo "<span class='badge badge-danger'>COO Approved</span>";
                                                                } else if ($record['delisting_status'] == "8") {
                                                                    echo "<span class='badge badge-success'>COO Rejected</span>";
                                                                } else if ($record['delisting_status'] == "0") {
                                                                    echo "<span class='badge badge-warning'>Approval Pending</span>";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($record['delisting_toa'] == "1") {
                                                                    echo "Vendor";
                                                                } else if ($record['delisting_toa'] == "2") {
                                                                    echo "Consultant";
                                                                } else if ($record['delisting_toa'] == "3") {
                                                                    echo "Contractor";
                                                                } else if ($record['delisting_toa'] == "3") {
                                                                    echo "Dealer";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $record['name']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $record['company_name']; ?>
                                                            </td>
    <!--                                                            <td>
                                                            <?php
                                                            $mReasons = json_decode($record['delisting_reason']);
                                                            foreach ($mReasons as $key => $value) {
                                                                echo "<span class='badge badge-warning'>$value</span>";
                                                            }
                                                            ?>
                                                            </td>-->
                                                            <td>
                                                                <?php echo $record['delisting_reason_more']; ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div></div>
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