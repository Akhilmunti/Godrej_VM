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
                            <form method="POST" action="<?php echo base_url('buyer/vendor/filterDashboard'); ?>">
                                <div class="row">
                                    <div class="col-md-5 mb-2">
                                        <h5>
                                            <b>
                                                Awarded data FY(22-23)
                                            </b>
                                        </h5>
                                    </div>
                                    <div class="col-md-3 mb-2 text-right">
                                        <input hidden="" name="zone" value="<?php echo $zone; ?>" />
<!--                                        <select name="zone" id="zone" required="" class="form-control form-control-sm">
                                            <option value="" selected="" disabled="">Select Zone</option>
                                            <option <?php
                                        if ($zone == "NCR") {
                                            echo "selected";
                                        }
                                        ?> value="NCR">NCR</option>
                                            <option <?php
                                        if ($zone == "South") {
                                            echo "selected";
                                        }
                                        ?> value="South">South</option>
                                            <option <?php
                                        if ($zone == "Mumbai") {
                                            echo "selected";
                                        }
                                        ?> value="Mumbai">Mumbai</option>
                                            <option <?php
                                        if ($zone == "Pune") {
                                            echo "selected";
                                        }
                                        ?> value="Pune">Pune</option>
                                            <option <?php
                                        if ($zone == "Kolkata") {
                                            echo "selected";
                                        }
                                        ?> value="Kolkata">Kolkata</option>
                                            <option <?php
                                        if ($zone == "HO") {
                                            echo "selected";
                                        }
                                        ?> value="HO">HO</option>
                                            <option <?php
                                        if ($zone == "PAN India") {
                                            echo "selected";
                                        }
                                        ?> value="PAN India">PAN India</option>
                                        </select>-->
                                    </div>
                                    <div class="col-md-3 mb-2 text-right">
                                        <select name="project" id="project" required="" class="form-control form-control-sm">
                                            <option selected="" disabled="">Select Project</option>
                                            <?php foreach ($projects as $key => $pro) { ?>
                                                <option <?php
                                                if ($project['project_id'] == $pro['project_id']) {
                                                    echo "selected";
                                                }
                                                ?> value="<?php echo $pro['project_id']; ?>"><?php echo $pro['project_name']; ?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1 mb-2 text-right">
                                        <button type="submit" class="btn btn-primary btn-xs btn-block mt-1">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="row" style="margin-top: -30px">
                            
                            <div class="col-xl-6 col-md-6">
                                <a href="<?php echo base_url('buyer/vendor/getSiteReports') ?>">
                                    <div class="box">
                                        <div class="box-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="mb-0">Site Visit Report</p>
                                                </div>
                                                <div>
                                                    <i class="ti-list-ol font-size-40"></i>
                                                </div>
                                            </div>
                                            <p class="font-weight-600 mb-2">
                                                Assigned - 46
                                                |
                                                Pending - <?php echo $pendingsvr; ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <a href="<?php echo base_url('buyer/vendor/getFeedback') ?>">
                                    <div class="box">
                                        <div class="box-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="mb-0">Feedback</p>
                                                </div>
                                                <div>
                                                    <i class="ti-list-ol font-size-40"></i>
                                                </div>
                                            </div>
                                            <p class="font-weight-600 mb-2">
                                                Assigned - 46
                                                |
                                                Pending - <?php
                                                if (empty($feedbacks)) {
                                                    echo "0";
                                                } else {
                                                    echo count($feedbacks);
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <style>
                                .primary-gradient{
                                    background-color: #2a2a72;
                                    background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%);
                                }

                                .table > tbody > tr > td, .table > tbody > tr > th {
                                    padding: 0.5rem;
                                }

                                .box-header {
                                    padding: 1rem 1rem;
                                }
                            </style>
                            <div class="col-xl-4 col-md-12">
                                <div class="box">
                                    <div class="box-header with-border primary-gradient text-white">
                                        <h5 class="box-title text-bold">
                                            <b>
                                                Vendor Database
                                            </b>
                                        </h5>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body py-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <td>
                                                            <a href="<?php echo base_url('buyer/vendor/actionFilterGplData/All/All/All/All/All'); ?>">
                                                                Total Empaneled Agencies till date - 
                                                                <?php
                                                                if (!empty($getVendors)) {
                                                                    echo count($getVendors);
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Empaneled Agencies FY(22-23) - <?php
                                                            if (!empty($getVendorsThisYear)) {
                                                                echo count($getVendorsThisYear);
                                                                $mCountV = count($getVendorsThisYear);
                                                            } else {
                                                                echo "0";
                                                                $mCountV = 0;
                                                            }
                                                            ?> 
                                                            <span class="fa fa-arrow-up text-warning">
                                                                <?php
                                                                $mAvgVendors = (count($getVendorsThisYear) / count($getVendors)) * 100;
                                                                if (is_nan($mAvgVendors)) {
                                                                    $mAvgVendors = "";
                                                                } else {
                                                                    $mAvgVendors = $mAvgVendors;
                                                                }
                                                                ?>
                                                                <?php echo $mAvgVendors; ?> % 
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
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

        <!-- Modal -->
        <div class="modal modal-right fade" id="modal-right-2" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>
                            Comes under RFQ Process
                        </h4>
                    </div>
                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal -->

        <script>
            $('.rfq-process').click(function () {
                alert("Under Development");
            });

            $('#zone').change(function () {
                $.post("<?php echo base_url('home/getProjectsByZone'); ?>",
                        {
                            id: this.value,
                        },
                        function (data, status) {
                            $('#project').html(data);
                        });
            });
        </script>

    </body>
</html>