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
                                    <h3 class="page-title br-0">Short Listing Approval Form</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">

                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <form id="register_form" action="<?php echo base_url('vendor/wopo'); ?>" method="POST" enctype="multipart/form-data">
                                        <div class="box-body pb-0">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> User Type : <span class="danger">*</span> </label>
                                                        <select required="" class="form-control" name="wopo_usertype" id="wopo_usertype">
                                                            <option disabled="" selected="" value="">Select</option>
                                                            <option <?php
                                                            if ($record['wopo_usertype'] == "Vendor") {
                                                                echo "selected";
                                                            }
                                                            ?> value="Vendor">Vendor</option>
                                                            <option <?php
                                                            if ($record['wopo_usertype'] == "Contractor") {
                                                                echo "selected";
                                                            }
                                                            ?> value="Contractor">Contractor</option>
                                                            <option <?php
                                                            if ($record['wopo_usertype'] == "Consultant") {
                                                                echo "selected";
                                                            }
                                                            ?> value="Consultant">Consultant</option>
                                                            <option <?php
                                                            if ($record['wopo_usertype'] == "Aluminium Vendor") {
                                                                echo "selected";
                                                            }
                                                            ?> value="Aluminium Vendor">Aluminium Vendor</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wopo_startdate"> Start Date : <span class="danger">*</span> </label>
                                                        <input id="wopo_startdate" name="wopo_startdate" type="date" class="form-control" required="" value="<?php echo $record['wopo_startdate']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wopo_enddate"> End Date : <span class="danger">*</span> </label>
                                                        <input id="wopo_enddate" name="wopo_enddate" type="date" class="form-control" required="" value="<?php echo $record['wopo_enddate']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wopo_purchase"> Purchase Organization : <span class="danger">*</span> </label>
                                                        <input id="wopo_purchase" name="wopo_purchase" type="text" class="form-control" required="" value="<?php echo $record['wopo_purchase']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wopo_purchase_group"> Purchase Group : <span class="danger">*</span> </label>
                                                        <input id="wopo_purchase_group" name="wopo_purchase_group" type="text" class="form-control" required="" value="<?php echo $record['wopo_purchase_group']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wopo_wo"> WO Number : <span class="danger">*</span> </label>
                                                        <input id="wopo_wo" name="wopo_wo" type="number" class="form-control" required="" value="<?php echo $record['wopo_purchase_group']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wopo_upload"> Upload WO/PO : <span class="danger">*</span> </label>
                                                        <input id="wopo_upload" name="wopo_upload" type="file" class="form-control" required="" value="<?php echo $record['wopo_upload']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wopo_company_code"> Company Code : <span class="danger">*</span> </label>
                                                        <input id="wopo_company_code" name="wopo_company_code" type="text" class="form-control" required="" value="<?php echo $record['wopo_company_code']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wopo_wo_details"> WO Details : <span class="danger">*</span> </label>
                                                        <input id="wopo_wo_details" name="wopo_wo_details" type="text" class="form-control" required="" value="<?php echo $record['wopo_wo_details']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wopo_zone"> Zone : <span class="danger">*</span> </label>
                                                        <select required="" class="form-control" name="wopo_zone" id="wopo_zone">
                                                            <option disabled="" selected="" value="">Select</option>
                                                            <?php foreach ($locations as $location) { ?>
                                                                <option <?php
                                                                if ($record['wopo_zone'] == $location->name) {
                                                                    echo "selected";
                                                                }
                                                                ?> value="<?php echo $location->name; ?>"><?php echo $location->name; ?></option>
                                                                <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wopo_vendor_code"> Vendor Code : <span class="danger">*</span> </label>
                                                        <input id="wopo_vendor_code" name="wopo_vendor_code" type="text" class="form-control" required="" value="<?php echo $record['wopo_vendor_code']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wopo_vendor_details"> Vendor Details : <span class="danger">*</span> </label>
                                                        <input id="wopo_vendor_details" name="wopo_vendor_details" type="text" class="form-control" required="" value="<?php echo $record['wopo_vendor_code']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wopo_vendor_details"> PAN : <span class="danger">*</span> </label>
                                                        <input id="wopo_vendor_details" name="wopo_vendor_details" type="text" class="form-control" required="" value="<?php echo $record['wopo_vendor_code']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer text-right">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.box -->
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