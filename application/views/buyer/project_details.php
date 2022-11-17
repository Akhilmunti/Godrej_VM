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
                                    <h3 class="page-title br-0">Project Details | <?php echo $record['package_zone']; ?></h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label>Project Name</label>
                                                <input value="<?php echo $record['package_name']; ?>" readonly="" type="text" class="form-control form-control-sm" />
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label>Purchase Organisation</label>
                                                <input value="<?php echo $record['package_purchase']; ?>" readonly="" type="text" class="form-control form-control-sm" />
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label>Total BUA - In million square foot</label>
                                                <input value="<?php echo $record['package_bua']; ?>" readonly="" type="number" class="form-control form-control-sm" />
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label>No of towers</label>
                                                <input value="<?php echo $record['package_towers']; ?>" readonly="" type="number" class="form-control form-control-sm" />
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label>Building Configurations</label>
                                                <input value="<?php echo $record['package_building']; ?>" readonly="" type="text" class="form-control form-control-sm" />
                                            </div>
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

    </body>
</html>