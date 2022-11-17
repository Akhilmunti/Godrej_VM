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
                                    <h3 class="page-title br-0">Feedback Management</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="<?php echo base_url('buyer/vendor/feedback'); ?>" class="btn btn-primary">List Feedback</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">

                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <form id="register_form" action="<?php echo base_url('buyer/vendor/actionFeedbackSave'); ?>" method="POST" enctype="multipart/form-data">
                                        <div class="box-body pb-0">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="feedback_user_type"> User Type : <span class="danger">*</span> </label>
                                                        <select required="" class="form-control" name="feedback_user_type" id="feedback_user_type">
                                                            <option disabled="" selected="" value="">Select</option>
                                                            <option <?php
                                                            if ($record['feedback_user_type'] == "1") {
                                                                echo "selected";
                                                            }
                                                            ?> value="1">Vendor</option>
                                                            <option <?php
                                                            if ($record['feedback_user_type'] == "3") {
                                                                echo "selected";
                                                            }
                                                            ?> value="3">Contractor</option>
                                                            <option <?php
                                                            if ($record['feedback_user_type'] == "4") {
                                                                echo "selected";
                                                            }
                                                            ?> value="4">Consultant</option>
                                                            <option <?php
                                                            if ($record['feedback_user_type'] == "2") {
                                                                echo "selected";
                                                            }
                                                            ?> value="2">Aluminium Vendor</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="feedback_startdate"> Start Date : <span class="danger">*</span> </label>
                                                        <input id="feedback_startdate" name="feedback_startdate" type="date" class="form-control" required="" value="<?php echo $record['feedback_startdate']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="feedback_enddate"> End Date : <span class="danger">*</span> </label>
                                                        <input id="feedback_enddate" name="feedback_enddate" type="date" class="form-control" required="" value="<?php echo $record['feedback_enddate']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="feedback_purchase"> Purchase Organization : <span class="danger">*</span> </label>
                                                        <select class="form-control" id="feedback_purchase" name="feedback_purchase" required="">
                                                            <option selected="" disabled="" value="">Select</option>
                                                            <?php foreach ($mPorgs as $key => $mPorg) { ?>
                                                                <option value="<?php echo $mPorg['porg_code']; ?>"><?php echo $mPorg['porg_desc']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="feedback_purchase_group"> Purchase Group : <span class="danger">*</span> </label>
                                                        <select class="form-control" id="feedback_purchase_group" name="feedback_purchase_group" required="">
                                                            <option selected="" disabled="" value="">Select</option>
                                                            <option value="213">213</option>
                                                            <option value="214">214</option>
                                                            <option value="202">202</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="feedback_wo"> WO Number : <span class="danger">*</span> </label>
                                                        <input id="feedback_wo" name="feedback_wo" type="number" class="form-control" required="" value="<?php echo $record['feedback_purchase_group']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="feedback_upload"> Upload WO/PO : <span class="danger">*</span> </label>
                                                        <input id="feedback_upload" name="feedback_upload" type="file" class="form-control" required="" value="<?php echo $record['feedback_upload']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="feedback_company_code"> Company Code : <span class="danger">*</span> </label>
                                                        <input id="feedback_company_code" name="feedback_company_code" type="text" class="form-control" required="" value="<?php echo $record['feedback_company_code']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="feedback_wo_details"> WO Details : <span class="danger">*</span> </label>
                                                        <input id="feedback_wo_details" name="feedback_wo_details" type="text" class="form-control" required="" value="<?php echo $record['feedback_wo_details']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="feedback_zone"> Zone : <span class="danger">*</span> </label>
                                                        <input class="form-control" readonly="" required="" name="feedback_zone" id="feedback_zone" />
<!--                                                        <select required="" class="form-control" name="feedback_zone" id="feedback_zone">
                                                            <option disabled="" selected="" value="">Select</option>
                                                            <?php foreach ($locations as $location) { ?>
                                                                <option <?php
                                                                if ($record['feedback_zone'] == $location->name) {
                                                                    echo "selected";
                                                                }
                                                                ?> value="<?php echo $location->name; ?>"><?php echo $location->name; ?></option>
                                                                <?php } ?>
                                                        </select>-->
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="feedback_vendor_code"> Vendor Code : <span class="danger">*</span> </label>
                                                        <input id="feedback_vendor_code" name="feedback_vendor_code" type="text" class="form-control" required="" value="<?php echo $record['feedback_vendor_code']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="feedback_vendor_details"> Vendor Details : <span class="danger">*</span> </label>
                                                        <input id="feedback_vendor_details" name="feedback_vendor_details" type="text" class="form-control" required="" value="<?php echo $record['feedback_vendor_code']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="feedback_pan"> PAN : <span class="danger">*</span> </label>
                                                        <input id="feedback_pan" name="feedback_pan" type="text" class="form-control" required="" value="<?php echo $record['feedback_pan']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="feedback_lfs"> Latest Feedback Score : <span class="danger">*</span> </label>
                                                        <input id="feedback_lfs" name="feedback_lfs" type="text" class="form-control" required="" value="<?php echo $record['feedback_lfs']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="feedback_lfd"> Latest Feedback Date : <span class="danger">*</span> </label>
                                                        <input id="feedback_lfd" name="feedback_lfd" type="date" class="form-control" required="" value="<?php echo $record['feedback_lfd']; ?>" />
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

        <script>
            $('#feedback_startdate').on('change', function (e) {
                var feedback_startdate = e.target.value;

                $("#feedback_enddate").attr({
                    "min": feedback_startdate,
                });

            });

            $('#feedback_purchase').on('change', function (e) {
                var feedback_startdate = e.target.value;

                $("#feedback_enddate").attr({
                    "min": feedback_startdate,
                });

            });

            $('#feedback_purchase').change(function () {
                $.post("<?php echo base_url('buyer/vendor/getZoneByPorg/'); ?>",
                        {
                            code: this.value,
                        },
                        function (data, status) {
                            if (data === "0") {
                                alert("Please fill zone manually");
                            } else {
                                $('#feedback_zone').val(data);
                            }
                        });
            });

        </script>

    </body>
</html>