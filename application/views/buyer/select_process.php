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

                    <style>
                        .primary-gradient{
                            background-color: #2a2a72;
                            background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%);
                        }
                    </style>

                    <!-- Main content -->
                    <section class="content">

                        <!-- Content Header (Page header) -->	  
                        <div class="content-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="page-title br-0">Core & Shell </h4>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <a href="#" data-toggle="modal" data-target="#modal-right-2">
                                    <div class="box primary-gradient">
                                        <div class="box-body p-60 text-center text-white">                                        
                                            <h4>
                                                Package One 
                                            </h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="#" data-toggle="modal" data-target="#modal-right-2">
                                    <div class="box primary-gradient">
                                        <div class="box-body p-60 text-center text-white">                                        
                                            <h4>
                                                Package Two  
                                            </h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="#" data-toggle="modal" data-target="#modal-right-2">
                                    <div class="box primary-gradient">
                                        <div class="box-body p-60 text-center text-white">                                        
                                            <h4>
                                                Package Three
                                            </h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="#" data-toggle="modal" data-target="#modal-right-2">
                                    <div class="box primary-gradient">
                                        <div class="box-body p-60 text-center text-white">                                        
                                            <h4>
                                                Package Four
                                            </h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="#" data-toggle="modal" data-target="#modal-right-2">
                                    <div class="box primary-gradient">
                                        <div class="box-body p-60 text-center text-white">                                        
                                            <h4>
                                                Package Five
                                            </h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="#" data-toggle="modal" data-target="#modal-right-2">
                                    <div class="box primary-gradient">
                                        <div class="box-body p-60 text-center text-white">                                        
                                            <h4>
                                                Package Six
                                            </h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="#">
                                    <div class="box box-info">
                                        <div class="box-body p-60 text-center text-white">                                        
                                            <h4>
                                                Add Package
                                            </h4>
                                        </div>
                                    </div>
                                </a>
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
                        <h5 class="modal-title">Select</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?php echo base_url('buyer/vendor/selectWork'); ?>">
                                    <div class="box primary-gradient">
                                        <div class="box-body p-10 text-center text-white">                                        
                                            <h3>
                                                Contracts
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-12">
                                <a href="<?php echo base_url('buyer/vendor/selectWork'); ?>">
                                    <div class="box primary-gradient">
                                        <div class="box-body p-10 text-center text-white">                                        
                                            <h3>
                                                Procurement
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-12">
                                <a href="<?php echo base_url('buyer/vendor/selectWork'); ?>">
                                    <div class="box primary-gradient">
                                        <div class="box-body p-10 text-center text-white">                                        
                                            <h3>
                                                Contract Administration
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-12">
                                <a href="<?php echo base_url('buyer/vendor/selectWork'); ?>">
                                    <div class="box primary-gradient">
                                        <div class="box-body p-10 text-center text-white">                                        
                                            <h3>
                                                Reports
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!--                                <div class="col-md-12">
                                                                <a href="<?php echo base_url('buyer/vendor/selectWork'); ?>">
                                                                    <div class="box primary-gradient">
                                                                        <div class="box-body p-10 text-center text-white">                                        
                                                                            <h3>
                                                                                Agencies Feedback Score
                                                                            </h3>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <a href="<?php echo base_url('buyer/vendor/selectWork'); ?>">
                                                                    <div class="box primary-gradient">
                                                                        <div class="box-body p-10 text-center text-white">                                        
                                                                            <h3>
                                                                                Vendor data Base (PQ + Feedback)-PAN India
                                                                            </h3>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>-->
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary float-right" data-dismiss="modal">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal -->

    </body>
</html>