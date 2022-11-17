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
                                    <h3 class="page-title br-0">Add User</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <?php $this->load->view('buyer/partials/alerts'); ?>
                                <!-- Step wizard -->
                                <form id="articleForm" method="POST" action="<?php echo base_url('buyer/users/actionSave'); ?>" enctype="multipart/form-data">
                                    <div class="box box-default">
                                        <div class="box-body pb-0">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wlocation2">Name</label>
                                                        <input class="form-control" name="user" id="user" type="text" required=""/>
                                                    </div>
                                                </div> 
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wlocation2">Email</label>
                                                        <input class="form-control" name="email" id="email" type="email" required=""/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wlocation2">Phone</label>
                                                        <input class="form-control" name="phone" id="phone" type="tel" required=""/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wlocation2">Zone</label>
                                                        <select class="form-control" name="zone" id="zone" required="">
                                                            <option disabled="" selected="">Select Zone</option>
                                                            <option value="NCR">NCR</option>
                                                            <option value="Mumbai">Mumbai</option>
                                                            <option value="Kolkata">Kolkata</option>
                                                            <option value="Pune">Pune</option>
                                                            <option value="South">South</option>
                                                            <option value="HO">HO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wlocation2">Designation</label>
                                                        <input class="form-control" name="designation" id="designation" type="text" required=""/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wlocation2">Role</label>
                                                        <select required="" name="role" class="form-control">
                                                            <option disabled="" selected="">Select</option>
                                                            <option>Managing Director</option>
                                                            <option value="COO">Chief Operating Officer</option>
                                                            <option>Head of Contracts & Procurement</option>
                                                            <option>HO - C&P</option>
                                                            <option>Zonal CEO</option>
                                                            <option>Regional Head</option>
                                                            <option>Operations Head</option>
                                                            <option>Project Director</option>
                                                            <option>Construction Head</option>
                                                            <option>Regional C&P Head</option>
                                                            <option>Regional C&P Team</option>
                                                            <option>HO Operations</option>
                                                            <option>Project Manager</option>
                                                            <option value="PCM">PCM</option>
                                                            <option>Regional Safety</option>
                                                            <option>Ho Safety</option>
                                                            <option>Regional Quality</option>
                                                            <option>Regional Planning</option>
                                                            <option>Regional C&B</option>
                                                            <option>Project Execution Team</option>
                                                            <option>Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--<div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wlocation2">Department</label>
                                                        <input class="form-control" name="department" id="department" type="text" required=""/>
                                                    </div>
                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <div class="form-group">
                                                                                                        <label for="wlocation2">Password</label>
                                                                                                        <input class="form-control" name="password" id="password" type="password" required=""/>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <div class="form-group">
                                                                                                        <label for="wlocation2">Confirm Password</label>
                                                                                                        <input class="form-control" name="cpassword" id="cpassword" type="password" required=""/>
                                                                                                    </div>
                                                                                                </div>-->
                                                <!--                                                <div class="col-md-4">
                                                                                                    <label for="wlocation2">Is PM ?</label>
                                                                                                    <div class="radio-button">
                                                                                                        <input value="1" name="is_pm" type="radio" id="radio_7" class="radio-col-primary mr-2" />
                                                                                                        <label for="radio_7">Yes</label>
                                                                                                        <input value="0" name="is_pm" type="radio" id="radio_9" class="radio-col-danger" checked />
                                                                                                        <label for="radio_9">No</label>
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