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
                                    <h3 class="page-title br-0">
                                        Report Vendor Log
                                    </h3>
                                    <br>
                                    <span class="mr-3"> <?php echo $zone ?> / <?php echo $project['project_name']; ?></span>
                                </div>
                                <div class="col-md-2 text-right">
                                    <a href="<?php echo base_url('buyer/vendor/vendorLogs/' . $project['project_id'] . "/" . $zone); ?>" class="btn btn-primary btn-block">
                                        List
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">

                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <form id="register_form" action="<?php echo base_url('buyer/vendor/actionAddVendorLog/' . $project['project_id'] . "/" . $zone); ?>" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wlastName2"> Contractor/Vendor : <span class="danger">*</span> </label>
<!--                                                        <select required="" name="vl_vendor" id="vl_vendor" class="form-control">
                                                            <option selected="" value="" disabled="">Select</option>
                                                        <?php foreach ($vendors as $key => $vendor) { ?>
                                                                    <option value="<?php echo $vendor['id']; ?>"><?php echo $vendor['company_name']; ?></option>
                                                        <?php } ?>
                                                        </select>-->
                                                        <input type="text" required="" name="vl_vendor" id="vl_vendor" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wlastName2"> Package : <span class="danger">*</span> </label>
                                                        <select required="" name="vl_package" id="vl_package" class="form-control">
                                                            <option selected="" value="" disabled="">Select</option>
                                                            <?php foreach ($packages as $key => $package) { ?>
                                                                <option value="<?php echo $package['id']; ?>"><?php echo $package['name']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="wlastName2"> Issue reported date: <span class="danger">*</span> </label>
                                                    <input readonly="" value="<?php echo date('Y-m-d'); ?>" name="vl_date" required="" type="date" class="form-control"/>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="wlastName2"> Issue Description : <span class="danger">*</span> </label>
                                                    <textarea name="vl_issue" required="" class="form-control" rows="5"></textarea>
                                                    <hr>
                                                </div>
                                                <div class="col-md-12 text-right">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.box-body -->
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