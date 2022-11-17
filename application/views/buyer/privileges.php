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
                                    <h3 class="page-title br-0">Privilege Management</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <!--                                        <div class="table-responsive">
                                                                                    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Sl. No</th>
                                                                                                <th>Name</th>
                                                                                                <th>Email</th>
                                                                                                <th>Zone</th>
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
                                                <?php if ($record['buyer_is_pr'] == 1) { ?>
                                                                                                                                                                                                                <span class="badge badge-primary">PR</span>
                                                <?php } ?>
                                                                                                                                                                        </td>
                                                                                                                                                                        <td>
                                                <?php echo $record['buyer_email']; ?>
                                                                                                                                                                        </td>
                                                                                                                                                                        <td>
                                                <?php echo $record['buyer_zone']; ?>
                                                                                                                                                                        </td>
                                                                                                                                                                        <td>
                                                <?php if ($record['buyer_status'] == 1) { ?>
                                                                                                                                                                                                                <span class="btn btn-sm btn-primary">Active</span>
                                                <?php } else { ?>
                                                                                                                                                                                                                <span class="btn btn-sm btn-danger">Blocked</span>
                                                <?php } ?>
                                                                                                                                                                        </td>
                                                                                                                                                                        <td>
                                                <?php if ($record['buyer_status'] == 1) { ?>
                                                                                                                                                                                                                <a href="<?php echo base_url('buyer/privileges/changeStatus/' . $record['buyer_id']); ?>" class="btn btn-sm btn-danger">
                                                                                                                                                                                                                    Block
                                                                                                                                                                                                                </a>
                                                    <?php if ($record['buyer_is_pr'] == 0) { ?>
                                                                                                                                                                                                                                                    <a href="<?php echo base_url('buyer/privileges/changePrStatus/enable/' . $record['buyer_id']); ?>" class="btn btn-sm btn-primary">
                                                                                                                                                                                                                                                        Enable PR
                                                                                                                                                                                                                                                    </a>
                                                    <?php } else { ?>
                                                                                                                                                                                                                                                    <a href="<?php echo base_url('buyer/privileges/changePrStatus/disable/' . $record['buyer_id']); ?>" class="btn btn-sm btn-danger">
                                                                                                                                                                                                                                                        Disable PR
                                                                                                                                                                                                                                                    </a>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                                                                                                                                                                                <a href="<?php echo base_url('buyer/privileges/changeStatus/' . $record['buyer_id']); ?>" class="btn btn-sm btn-primary">
                                                                                                                                                                                                                    Unblock
                                                                                                                                                                                                                </a>
                                                <?php } ?>
                                                                                                        
                                                                                                                                                                        </td>
                                                                                                                                                                    </tr>
                                            <?php } ?>
                                                                        
                                        <?php } ?>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>  -->


                                        <div class="row mb-4">
                                            <div class="col-md-5 mx-auto">
                                                <select class="form-control form-control-lg">
                                                    <option>Select User</option>
                                                    <?php foreach ($records as $key => $record) { ?>
                                                        <option><?php echo $record['buyer_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <hr>

                                        <div class="row mb-4">
                                            <div class="col-md-2">
                                                <div class="demo-checkbox">
                                                    <input type="checkbox" id="md_checkbox_1" class="chk-col-primary" />
                                                    <label for="md_checkbox_1">Dashboard</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="demo-checkbox">
                                                    <input type="checkbox" id="md_checkbox_3" class="chk-col-primary" />
                                                    <label for="md_checkbox_3">Zonal Dashboard</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="demo-checkbox">
                                                    <input type="checkbox" id="md_checkbox_4" class="chk-col-primary" />
                                                    <label for="md_checkbox_4">Assigned</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="demo-checkbox">
                                                    <input type="checkbox" id="md_checkbox_6" class="chk-col-primary" />
                                                    <label for="md_checkbox_6">Transferred</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="demo-checkbox">
                                                    <input type="checkbox" id="md_checkbox_7" class="chk-col-primary" />
                                                    <label for="md_checkbox_7">Delisting</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="demo-checkbox">
                                                    <input type="checkbox" id="md_checkbox_7" class="chk-col-primary" />
                                                    <label for="md_checkbox_7">Feedback</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="demo-checkbox">
                                                    <input type="checkbox" id="md_checkbox_7" class="chk-col-primary" />
                                                    <label for="md_checkbox_7">Buyer management</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="demo-checkbox">
                                                    <input type="checkbox" id="md_checkbox_7" class="chk-col-primary" />
                                                    <label for="md_checkbox_7">Privileges</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="demo-checkbox">
                                                    <input type="checkbox" id="md_checkbox_7" class="chk-col-primary" />
                                                    <label for="md_checkbox_7">Logs</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="demo-checkbox">
                                                    <input type="checkbox" id="md_checkbox_7" class="chk-col-primary" />
                                                    <label for="md_checkbox_7">PQ - Stage One Approval</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="demo-checkbox">
                                                    <input type="checkbox" id="md_checkbox_7" class="chk-col-primary" />
                                                    <label for="md_checkbox_7">PQ - Stage Two Approval</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="demo-checkbox">
                                                    <input type="checkbox" id="md_checkbox_7" class="chk-col-primary" />
                                                    <label for="md_checkbox_7">PQ Score Generation</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="demo-checkbox">
                                                    <input type="checkbox" id="md_checkbox_7" class="chk-col-primary" />
                                                    <label for="md_checkbox_7">Site Visit Report</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="box-footer text-right">
                                        <button type="button" class="btn btn-primary">Submit</button>
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