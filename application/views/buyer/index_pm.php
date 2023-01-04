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
                            <div class="col-xl-4 col-md-6 col-12">
                                <a href="#" class="rfq-process">
                                    <div class="box">
                                        <div class="box-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="mb-0">Awarded Works</p>
                                                </div>
                                                <div>
                                                    <i class="ti-info font-size-40"></i>
                                                </div>
                                            </div>
                                            <p class="font-weight-600 mb-2">
                                                Contracts : <?php echo $iomdata['total_contracts']; ?> | Procurement :  <?php echo $iomdata['total_procurements']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <a href="#" class="rfq-process">
                                    <div class="box">
                                        <div class="box-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="mb-0">On Going Tenders</p>
                                                </div>
                                                <div>
                                                    <i class="ti-info font-size-40"></i>
                                                </div>
                                            </div>
                                            <p class="font-weight-600 mb-2">
                                                Contracts : <?php echo $iomdata['total_contracts_ongoing']; ?> | Procurement : <?php echo $iomdata['total_procurements_ongoing']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <a href="#">
                                    <div class="box">
                                        <div class="box-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="mb-0">Vendor Connect</p>
                                                </div>
                                                <div>
                                                    <i class="ti-info font-size-40"></i>
                                                </div>
                                            </div>
                                            <p class="font-weight-600 mb-2">
                                                Onboard Agencies Details - <?php echo count($vendors); ?>
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

                            <div class="col-xl-4 col-md-6">
                                <a href="<?php echo base_url('buyer/vendor') ?>">
                                    <div class="box">
                                        <div class="box-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="mb-0">PQ</p>
                                                </div>
                                                <div>
                                                    <i class="ti-list-ol font-size-40"></i>
                                                </div>
                                            </div>
                                            <p class="font-weight-600 mb-2">
                                                Pending - <?php echo $pendingpq; ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                Pending - <?php echo $pendingsvr; ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                            <div class="col-xl-4">
                                <div class="box">
                                    <form method="POST" action="<?php echo base_url('buyer/vendor/actionFilterGplData/' . $zone); ?>">
                                        <div class="box-header with-border primary-gradient text-white">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="box-title text-bold">
                                                        <b>
                                                            GPL Vendor Data
                                                        </b>
                                                    </h5>
                                                </div>
                                                <div class="col-md-3">
                                                    <button class="btn btn-xs btn-dark btn-block" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <select id="nature_of_business_process" name="nature_of_business" required  class="form-control">
                                                <option value="" disabled="" selected="">Select Type of agency</option>
                                                <option value="All">All</option>
                                                <?php foreach ($tovs as $vendor) { ?>
                                                    <option value="<?php echo $vendor->id; ?>"><?php echo $vendor->name; ?></option> 
                                                <?php } ?>
                                            </select>
                                            <br>
                                            <select id="type_of_work" name="type_of_work" required="" class="form-control">
                                                <option value="" disabled="" selected="">Select Package name</option>
                                            </select>

                                        </div>
                                    </form>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="box">
                                    <div class="box-header with-border primary-gradient text-white">
                                        <?php if (!empty($projects)) { ?>
                                            <h5 class="box-title text-bold">
                                                <b>
                                                    <?php
                                                    if ($project['project_name']) {
                                                        echo $project['project_name'];
                                                    } else {
                                                        echo $projects[0]['project_name'];
                                                    }
                                                    ?>
                                                </b>
                                            </h5>
                                        <?php } else { ?>
                                            <h5 class="box-title text-bold">
                                                <b>
                                                    Project Management
                                                </b>
                                            </h5>
                                        <?php } ?>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <?php if (!empty($projects)) { ?>
                                            <div class="row">
                                                <!--                                            <div class="col-lg-6 text-center mb-2">
                                                <?php
                                                if ($project['project_id']) {
                                                    $mProjectId = $project['project_id'];
                                                } else {
                                                    $mProjectId = $projects[0]['project_id'];
                                                }
                                                ?>
                                                                                                <a href="<?php echo base_url('buyer/vendor/selectWork/' . $mProjectId . "/" . $zone . "/" . "3" . "/" . "Contracts"); ?>" class="btn btn-block btn-primary">
                                                                                                    <span>
                                                                                                        Contract Management
                                                                                                    </span>
                                                                                                </a>
                                                                                                <br>
                                                                                            </div>
                                                                                            <div class="col-lg-6 text-center mb-2">
                                                                                                <a href="<?php echo base_url('buyer/vendor/viewAllVendorLogs'); ?>" class="btn btn-block btn-primary">
                                                                                                    <span>
                                                                                                        Vendor Logs
                                                                                                    </span>
                                                                                                </a>
                                                                                                <br>
                                                                                            </div>-->
                                                <?php
                                                $mSessionZone = $this->session->userdata('session_zone');
                                                $mSessionRole = $this->session->userdata('session_role');
                                                ?>

                                                <div class="col-lg-6 text-center mb-2">
                                                    <a href="<?php echo base_url('buyer/vendor/selectWork/' . $mProjectId . "/" . $zone . "/" . "3" . "/" . "Contracts"); ?>" class="btn btn-block btn-primary position-relative">
                                                        
                                                        Contracts<span style="height: 22px;width:22px;border-radius:22px;top: -9px !important;" class="position-absolute badge bg-danger "><?php echo $pending_iom_count; ?></span>
                                                       
                                                    </a>
                                                    <br>
                                                </div>
                                                <div class="col-lg-6 text-center mb-2">
                                                    <a href="<?php echo base_url('buyer/vendor/selectWork/' . $mProjectId . "/" . $zone . "/" . "1" . "/" . "Procurement"); ?>" class="btn btn-block btn-primary">
                                                        Procurement<span style="height: 22px;width:22px;border-radius:22px;top: -9px !important;left: 106px;" class="position-absolute badge bg-danger "><?php echo $pending_proc_iom_count; ?></span>
                                                    </a>
                                                    <br>
                                                </div>
                                                <?php if ($mSessionRole == "PCM") { ?>
                                                    <div class="col-lg-6 text-center mb-2">
                                                        <a href="<?php echo base_url('buyer/vendor/vendorLogs/' . $mProjectId . "/" . $zone); ?>" class="btn btn-block btn-primary">
                                                            <span>
                                                                View Vendor Logs
                                                            </span>
                                                        </a>
                                                        <br>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="col-lg-6 text-center mb-2">
                                                        <a href="<?php echo base_url('buyer/vendor/viewAllVendorLogs'); ?>" class="btn btn-block btn-primary">
                                                            <span>
                                                                View Vendor Logs
                                                            </span>
                                                        </a>
                                                        <br>
                                                    </div>
                                                <?php } ?>

                                                <div class="col-md-6">
                                                    <a href="<?php echo base_url('buyer/pending/shortlisting'); ?>" class="btn btn-primary btn-block">
                                                        Shortlisting
                                                    </a>
                                                </div>

                                            </div>

                                        <?php } else { ?>
                                            <div class="row">
                                                <div class="col-lg-12 text-center mb-2">
                                                    <a href="<?php echo base_url('buyer/vendor/selectProjectByUser/' . $zone); ?>" class="btn btn-block btn-primary">
                                                        <span>
                                                            Create Project
                                                        </span>
                                                    </a>
                                                    <br>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>

                            <!--                            <div class="col-xl-4">
                                                            <div class="box">
                                                                <div class="box-header with-border primary-gradient text-white">
                                                                    <h5 class="box-title text-bold">
                                                                        <b>
                                                                            Actions Required
                                                                        </b>
                                                                    </h5>
                                                                </div>
                                                                 /.box-header 
                                                                <div class="box-body py-0">
                            
                                                                    <div class="row">
                                                                        <div class="col-md-6 p-3">
                                                                            <a href="<?php echo base_url('buyer/pending/shortlisting'); ?>" class="btn btn-primary btn-block">
                                                                                Shortlisting
                                                                            </a>
                                                                        </div>
                            <?php
                            $mSessionEmail = $this->session->userdata('session_email');
                            if ($mSessionEmail == "sharmeen.ahmed@godrejproperties.com" || $mSessionEmail == "rajashree.sonawane@godrejproperties.com" || $mSessionEmail == "neeraj.kalra@godrejproperties.com") {
                                ?>
                                                                                <div class="col-md-6 p-3">
                                                                                    <a href="<?php echo base_url('buyer/pending/vendor'); ?>" class="btn btn-primary btn-block">
                                                                                        Vendor Management
                                                                                    </a>
                                                                                </div>
                            <?php } ?>
                                                                    </div>
                            
                                                                </div>
                                                                 /.box-body 
                                                            </div>
                                                        </div>-->
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