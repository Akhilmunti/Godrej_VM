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
                                    <h3 class="page-title br-0">Stage One Forms</h3>
                                </div>
                                <div class="col-md-6 text-right">
<!--                                    <a href="<?php echo base_url('buyer/users/actionAdd'); ?>" class="btn btn-primary">Add User</a>-->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Sl. No</th>
                                                        <th>Type of agency</th>
                                                        <th>Company Name</th>
                                                        <th>Email</th>
                                                        <th>Financial Categorization</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php if (!empty($mRecords)) { ?>

                                                        <?php
                                                        $mCount = 0;
                                                        foreach ($mRecords as $key => $mRecord) {
                                                            $mCount++;
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $mCount; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if ($mRecord['nature_of_business_id'] == 1) { ?>
                                                                        <span class="text-bold">Vendor</span>
                                                                    <?php } else if ($mRecord['nature_of_business_id'] == 2) { ?>
                                                                        <span class="text-bold">Consultant</span>
                                                                    <?php } else if ($mRecord['nature_of_business_id'] == 3) { ?>
                                                                        <span class="text-bold">Contractor</span>
                                                                    <?php } else { ?>
                                                                        <span class="text-bold">Dealers</span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $mRecord['company_name']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $mRecord['email']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    if ($data->turn_over_of_last_3years * 0.5 < 100000000) {
                                                                        echo "Very Small";
                                                                    } else if ($data->turn_over_of_last_3years * 0.5 > 100000000 && $data->turn_over_of_last_3years * 0.5 < 500000000) {
                                                                        echo"Small";
                                                                    } else if ($data->turn_over_of_last_3years * 0.5 > 500000000 && $data->turn_over_of_last_3years * 0.5 < 1000000000) {
                                                                        echo "Medium";
                                                                    } else if ($data->turn_over_of_last_3years * 0.5 > 1000000000 && $data->turn_over_of_last_3years * 0.5 < 1500000000) {
                                                                        echo "Large";
                                                                    } else if ($data->turn_over_of_last_3years * 0.5 > 1500000000) {
                                                                        echo "Very Large";
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php if ($mRecord['active'] == 0) { ?>
                                                                        <span class="btn btn-sm btn-warning">Pending</span>
                                                                    <?php } else if ($mRecord['active'] == 1) { ?>
                                                                        <span class="btn btn-sm btn-primary">Accepted</span>
                                                                    <?php } else { ?>
                                                                        <span class="btn btn-sm btn-danger">Rejected</span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <?php if ($mRecord['active'] == 0) { ?>
                                                                        <a href="<?php echo base_url('buyer/vendor/actionChangeStatus/accept/' . $mRecord['id']); ?>" class="btn btn-sm btn-primary">
                                                                            Accept
                                                                        </a>
                                                                        <a href="<?php echo base_url('buyer/vendor/actionChangeStatus/reject/' . $mRecord['id']); ?>" class="btn btn-sm btn-danger">
                                                                            Reject
                                                                        </a>
                                                                    <?php } else if ($mRecord['active'] == 2) { ?>
                                                                        <a href="<?php echo base_url('buyer/vendor/actionChangeStatus/accept/' . $mRecord['id']); ?>" class="btn btn-sm btn-primary">
                                                                            Accept
                                                                        </a>
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

        <?php $this->load->view('buyer/partials/scripts'); ?>

    </body>
</html>