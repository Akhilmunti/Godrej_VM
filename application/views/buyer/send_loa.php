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
                                <div class="col-md-12">
                                    <h3 class="page-title br-0">
                                        Letter Of Award  : RFQ-001
                                    </h3>
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
                                            <table class="table table-bordered">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>
                                                            Sl No.
                                                        </th>
                                                        <th>
                                                            Name of Contractor
                                                        </th>
                                                        <th>
                                                            Tower
                                                        </th>
                                                        <th>
                                                            Select
                                                        </th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>
                                                            <b>
                                                                Vendor One
                                                            </b>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" multiple="">
                                                                <option disabled="" value="">Select Tower</option>
                                                                <option>Tower 1</option>
                                                                <option>Tower 2</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input value="1" class="form-check-input" type="checkbox" id="checkbox_1" name="eoi_vendors_selected[]"> 
                                                            <label class="form-check-label" for="checkbox_1"></label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>
                                                            <b>
                                                                Vendor Two
                                                            </b>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" multiple="">
                                                                <option disabled="" value="">Select Tower</option>
                                                                <option>Tower 1</option>
                                                                <option>Tower 2</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input value="1" class="form-check-input" type="checkbox" id="checkbox_1" name="eoi_vendors_selected[]"> 
                                                            <label class="form-check-label" for="checkbox_1"></label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>  
                                    </div>
                                    <div class="box-footer text-right">
                                        <a href="<?php echo base_url('buyer/vendor/sendForAppRfq'); ?>" class="btn btn-primary">Send For Approval</a>
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