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
                                    <h3 class="page-title br-0">Dashboard</h3>
                                </div>
                            </div>
                        </div>

                        <style>
                            .primary-gradient{
                                background-color: #2a2a72;
                                background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%);
                            }
                        </style>

                        <div class="row">
                            <div class="col-6">

                                <?php
                                $mSessionRole = $this->session->userdata('session_role');
                                if ($mSessionRole == "COO" || $mSessionRole == "Managing Director" || $mSessionRole == "Head of Contracts & Procurement" || $mSessionRole == "HO - C&P" || $mSessionRole == "HO Operations") {
                                    ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="<?php echo base_url('buyer/vendor/zonalDashboard/NCR'); ?>">
                                                <div class="box primary-gradient box-shadowed">
                                                    <div class="box-body p-30 text-center text-white">                                        
                                                        <h3>
                                                            NCR
                                                        </h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?php echo base_url('buyer/vendor/zonalDashboard/South'); ?>">
                                                <div class="box primary-gradient box-shadowed">
                                                    <div class="box-body p-30 text-center text-white">                                        
                                                        <h3>
                                                            South
                                                        </h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?php echo base_url('buyer/vendor/zonalDashboard/Mumbai'); ?>">
                                                <div class="box primary-gradient box-shadowed">
                                                    <div class="box-body p-30 text-center text-white">                                        
                                                        <h3>
                                                            Mumbai
                                                        </h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?php echo base_url('buyer/vendor/zonalDashboard/Pune'); ?>">
                                                <div class="box primary-gradient box-shadowed">
                                                    <div class="box-body p-30 text-center text-white">                                        
                                                        <h3>
                                                            Pune
                                                        </h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?php echo base_url('buyer/vendor/zonalDashboard/Kolkata'); ?>">
                                                <div class="box primary-gradient box-shadowed">
                                                    <div class="box-body p-30 text-center text-white">                                        
                                                        <h3>
                                                            Kolkata
                                                        </h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?php echo base_url('buyer/vendor/zonalDashboard/HO'); ?>">
                                                <div class="box primary-gradient box-shadowed">
                                                    <div class="box-body p-30 text-center text-white">                                        
                                                        <h3>
                                                            HO
                                                        </h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="<?php echo base_url('buyer/vendor/selectProject/NCR'); ?>">
                                                <div class="box primary-gradient box-shadowed">
                                                    <div class="box-body p-30 text-center text-white">                                        
                                                        <h3>
                                                            NCR
                                                        </h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?php echo base_url('buyer/vendor/selectProject/South'); ?>">
                                                <div class="box primary-gradient box-shadowed">
                                                    <div class="box-body p-30 text-center text-white">                                        
                                                        <h3>
                                                            South
                                                        </h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?php echo base_url('buyer/vendor/selectProject/Mumbai'); ?>">
                                                <div class="box primary-gradient box-shadowed">
                                                    <div class="box-body p-30 text-center text-white">                                        
                                                        <h3>
                                                            Mumbai
                                                        </h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?php echo base_url('buyer/vendor/selectProject/Pune'); ?>">
                                                <div class="box primary-gradient box-shadowed">
                                                    <div class="box-body p-30 text-center text-white">                                        
                                                        <h3>
                                                            Pune
                                                        </h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?php echo base_url('buyer/vendor/selectProject/Kolkata'); ?>">
                                                <div class="box primary-gradient box-shadowed">
                                                    <div class="box-body p-30 text-center text-white">                                        
                                                        <h3>
                                                            Kolkata
                                                        </h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?php echo base_url('buyer/vendor/selectProject/HO'); ?>">
                                                <div class="box primary-gradient box-shadowed">
                                                    <div class="box-body p-30 text-center text-white">                                        
                                                        <h3>
                                                            HO
                                                        </h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>


                                <!-- /.box -->
                            </div>
                            <div class="col-6">
                                <div class="box box-outline-primary">
                                    <div class="box-header primary-gradient text-center text-white">
                                        <h3>
                                            GPL Vendor Data
                                        </h3>
                                    </div>
                                    <form method="POST" action="<?php echo base_url('buyer/vendor/actionFilterGplDataProcess'); ?>">
                                        <div class="box-body p-30 text-center">                                        
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select id="nature_of_business_process" name="nature_of_business" required  class="form-control">
                                                        <option value="" disabled="" selected="">Select Type of agency</option>
                                                        <option value="All">All</option>
                                                        <?php foreach ($getVendor as $vendor) { ?>
                                                            <option value="<?php echo $vendor->id; ?>"><?php echo $vendor->name; ?></option> 
                                                        <?php }
                                                        ?>
                                                    </select> 
                                                </div>
                                                <div class="col-md-6">
                                                    <select id="type_of_work" name="type_of_work" required="" class="form-control">
                                                        <option value="" disabled="" selected="">Select Package name</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer text-right">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
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

            <!-- Modal -->
            <div class="modal modal-right fade" id="modal-right" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Select</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="<?php echo base_url('buyer/vendor/selectProject'); ?>">
                                        <div class="box box-primary box-shadowed">
                                            <div class="box-body p-30 text-center text-white">                                        
                                                <h3>
                                                    Shortlisting
                                                </h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-12">
                                    <a href="<?php echo base_url('buyer/vendor/selectProject'); ?>">
                                        <div class="box box-primary box-shadowed">
                                            <div class="box-body p-30 text-center text-white">                                        
                                                <h3>
                                                    Contract Award 
                                                </h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer modal-footer-uniform">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal -->

        </div>
        <!-- ./wrapper -->

        <?php $this->load->view('buyer/partials/scripts'); ?>

        <script type="text/javascript">
            function getSelectedPr(sel, selectedId) {
                if (confirm('Please confirm your selection')) {
                    var selectedPr = sel.value;
                    $.post("<?php echo base_url('buyer/vendor/transferFeedbackToPm'); ?>",
                            {
                                feedback_id: selectedId,
                                pm: selectedPr,
                            },
                            function (data, status) {
                                if (data == "1") {
                                    location.reload();
                                } else {
                                    alert("Something went wrong, Please try again later.");
                                }
                            });
                } else {
                    // Do nothing!
                    console.log('Thing was not saved to the database.');
                }
            }
        </script>

    </body>
</html>