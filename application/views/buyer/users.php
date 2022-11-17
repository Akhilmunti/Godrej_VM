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
                                    <h3 class="page-title br-0">Buyer Management</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="<?php echo base_url('buyer/users/actionAdd'); ?>" class="btn btn-primary">Add User</a>
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
                                            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                                <thead>
                                                    <tr>
                                                        <th>Sl. No</th>
                                                        <th>Name</th>
                                                        <th>Role</th>
                                                        <th>Email</th>
                                                        <th>Zone</th>
                                                        <th>Designation</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php if (!empty($records)) { ?>

                                                        <?php
                                                        $mCount = 0;
                                                        foreach ($records as $key => $record) {
                                                            $mCount++;
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $mCount; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $record['buyer_name']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $record['buyer_role']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $record['buyer_email']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $record['buyer_zone']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $record['buyer_designation']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if ($record['buyer_status'] == 1) { ?>
                                                                        <span class="btn btn-sm btn-primary">Active</span>
                                                                    <?php } else { ?>
                                                                        <span class="btn btn-sm btn-danger">Blocked</span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <a href="<?php echo base_url('buyer/users/actionEdit/' . $record['buyer_id']); ?>" class="btn btn-sm btn-danger">
                                                                        Edit
                                                                    </a>
                                                                    <a href="<?php echo base_url('buyer/users/actionDelete/' . $record['buyer_id']); ?>" class="btn btn-sm btn-primary">
                                                                        Delete
                                                                    </a>
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