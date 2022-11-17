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
                                    <h3 class="page-title br-0">Edit User</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <?php $this->load->view('buyer/partials/alerts'); ?>
                                <!-- Step wizard -->
                                <form id="articleForm" method="POST" action="<?php echo base_url('buyer/users/actionSave/' . $mRecord['buyer_id']); ?>" enctype="multipart/form-data">
                                    <div class="box box-default">
                                        <div class="box-body pb-0">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wlocation2">Name</label>
                                                        <input class="form-control" value="<?php echo $mRecord['buyer_name'] ?>" name="user" id="user" type="text" required=""/>
                                                    </div>
                                                </div> 
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wlocation2">Email</label>
                                                        <input readonly="" class="form-control" value="<?php echo $mRecord['buyer_email'] ?>" name="email" id="email" type="email" required=""/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wlocation2">Phone</label>
                                                        <input class="form-control" value="<?php echo $mRecord['buyer_mobile'] ?>" name="phone" id="phone" type="tel" required=""/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wlocation2">Zone</label>
                                                        <select class="form-control" name="zone" id="zone" required="">
                                                            <option value="" disabled="" selected="">Select Zone</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_zone'] == "NCR") {
                                                                echo "selected";
                                                            }
                                                            ?> value="NCR">NCR</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_zone'] == "Mumbai") {
                                                                echo "selected";
                                                            }
                                                            ?> value="Mumbai">Mumbai</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_zone'] == "Kolkata") {
                                                                echo "selected";
                                                            }
                                                            ?> value="Kolkata">Kolkata</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_zone'] == "Pune") {
                                                                echo "selected";
                                                            }
                                                            ?> value="Pune">Pune</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_zone'] == "South") {
                                                                echo "selected";
                                                            }
                                                            ?> value="South">South</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_zone'] == "HO") {
                                                                echo "selected";
                                                            }
                                                            ?> value="HO">HO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wlocation2">Designation</label>
                                                        <input value="<?php echo $mRecord['buyer_designation'] ?>" class="form-control" name="designation" id="designation" type="text" required=""/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wlocation2">Role</label>
                                                        <select required="" name="role" class="form-control">
                                                            <option disabled="" selected="">Select</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'Managing Director') {
                                                                echo 'selected';
                                                            }
                                                            ?>>Managing Director</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'COO') {
                                                                echo 'selected';
                                                            }
                                                            ?> value="COO">Chief Operating Officer</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'Head of Contracts & Procurement') {
                                                                echo 'selected';
                                                            }
                                                            ?>>Head of Contracts & Procurement</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'HO - C&P') {
                                                                echo 'selected';
                                                            }
                                                            ?>>HO - C&P</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'Zonal CEO') {
                                                                echo 'selected';
                                                            }
                                                            ?>>Zonal CEO</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'Regional Head') {
                                                                echo 'selected';
                                                            }
                                                            ?>>Regional Head</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'Operations Head') {
                                                                echo 'selected';
                                                            }
                                                            ?>>Operations Head</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'Project Director') {
                                                                echo 'selected';
                                                            }
                                                            ?> value="Project Director">Project Director</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'Construction Head') {
                                                                echo 'selected';
                                                            }
                                                            ?>>Construction Head</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'Regional C&P Head') {
                                                                echo 'selected';
                                                            }
                                                            ?>>Regional C&P Head</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'Regional C&P Team') {
                                                                echo 'selected';
                                                            }
                                                            ?>>Regional C&P Team</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'HO Operations') {
                                                                echo 'selected';
                                                            }
                                                            ?>>HO Operations</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'Project Manager') {
                                                                echo 'selected';
                                                            }
                                                            ?> value="Project Manager">Project Manager</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'PCM') {
                                                                echo 'selected';
                                                            }
                                                            ?> value="PCM">PCM</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'Regional Safety') {
                                                                echo 'selected';
                                                            }
                                                            ?>>Regional Safety</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'HO Safety') {
                                                                echo 'selected';
                                                            }
                                                            ?>>HO Safety</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'Regional Quality') {
                                                                echo 'selected';
                                                            }
                                                            ?>>Regional Quality</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'Regional Planning') {
                                                                echo 'selected';
                                                            }
                                                            ?>>Regional Planning</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'Regional C&B') {
                                                                echo 'selected';
                                                            }
                                                            ?>>Regional C&B</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'Project Execution Team') {
                                                                echo 'selected';
                                                            }
                                                            ?>>Project Execution Team</option>
                                                            <option <?php
                                                            if ($mRecord['buyer_role'] == 'Others') {
                                                                echo 'selected';
                                                            }
                                                            ?>>Others</option>
                                                        </select>
                                                    </div>
                                                </div>
<!--                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wlocation2">Department</label>
                                                        <input value="<?php echo $mRecord['buyer_department'] ?>" class="form-control" name="department" id="department" type="text" required=""/>
                                                    </div>
                                                </div>-->
                                            </div>
                                        </div>
                                        <div class="box-footer text-right">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
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

        <script type="text/javascript">
            $(document).on('change', 'input[type=radio][name=is_pm]', function (event) {
                switch ($(this).val()) {
                    case '1' :
                        $("#zone").prop('required', false);
                        break;
                    case '0' :
                        $("#zone").prop('required', true);
                        break;
                }
            });
        </script>

    </body>
</html>