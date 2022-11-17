<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('vendor/partials/header'); ?>

    <body class="hold-transition light-skin sidebar-mini theme-blueindigo onlyheader">

        <div class="wrapper">

            <div class="art-bg">
                <img src="<?php echo base_url('assets/'); ?>images/art1.svg" alt="" class="art-img light-img">
                <img src="<?php echo base_url('assets/'); ?>images/art2.svg" alt="" class="art-img dark-img">
                <img src="<?php echo base_url('assets/'); ?>images/art-bg.svg" alt="" class="wave-img light-img">
                <img src="<?php echo base_url('assets/'); ?>images/art-bg2.svg" alt="" class="wave-img dark-img">
            </div>

            <?php $this->load->view('vendor/partials/navbar'); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full clearfix position-relative">	

                    <?php $this->load->view('vendor/partials/sidebar'); ?>

                    <!-- Main content -->
                    <section class="content">

                        <!-- Content Header (Page header) -->	  
                        <div class="content-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="page-title br-0">
                                        Send For MOM  : RFQ-001
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
                                        <?php $this->load->view('vendor/partials/alerts'); ?>
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Vendor Name</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>
                                                            <a href="#" class="btn btn-primary btn-xs">Vendor One</a>
                                                        </td>
                                                        <td>
                                                            <span class="btn btn-xs btn-danger">Rejected</span>
                                                            <span class="btn btn-xs btn-success">Accepted</span>
                                                            <span class="btn btn-xs btn-warning">Pending</span>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url('buyer/vendor/viewQuery'); ?>" class="btn btn-xs btn-primary">View Query</a>
                                                        </td>
                                                    </tr>     
                                                    <tr>
                                                        <td>
                                                            2
                                                        </td>
                                                        <td>
                                                            <a href="#" class="btn btn-primary btn-xs">Vendor two</a>
                                                        </td>
                                                        <td>
                                                            <span class="btn btn-xs btn-danger">Rejected</span>
                                                            <span class="btn btn-xs btn-success">Accepted</span>
                                                            <span class="btn btn-xs btn-warning">Pending</span>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url('buyer/vendor/viewQuery'); ?>" class="btn btn-xs btn-primary">View Query</a>
                                                        </td>
                                                    </tr>   
                                                </tbody>
                                            </table>
                                        </div>  
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
            <?php $this->load->view('vendor/partials/footer'); ?>

            <!-- Control Sidebar -->
            <?php $this->load->view('vendor/partials/control'); ?>
            <!-- /.control-sidebar -->

            <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

        </div>
        <!-- ./wrapper -->

        <?php $this->load->view('vendor/partials/scripts'); ?>

    </body>
</html>