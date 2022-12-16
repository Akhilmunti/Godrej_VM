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
                    .primary-gradient {
                        background-color: #2a2a72;
                        background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%);
                    }
                </style>

                <!-- Main content -->
                <section class="content">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="page-title br-0">
                                    IOM - Award Recommendation
                                </h3>
                            </div>
                            <div class="col-md-6 text-right pt-3">
                                <a href="<?php echo base_url('buyer'); ?>">
                                    <span><?php echo $zone; ?></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <?php $this->load->view('buyer/partials/alerts'); ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <a style="display:block;height:100% ;" href="<?php echo base_url('nfa/Award_contract/actionAdd'); ?>">
                                        <div style="height:100% ;" class="box primary-gradient">
                                            <div style="padding:10% ;" class="box-body text-center text-white">
                                                <h3>
                                                    Award recommendation for contract
                                                </h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a style="display:block;height:100% ;" href="<?php echo base_url('nfa/award_procurement/actionAdd'); ?>">
                                        <div style="height:100% ;" class="box primary-gradient">
                                            <div style="padding:10% ;" class="box-body text-center text-white">
                                                <h3>
                                                    Award recommendation for procurement
                                                </h3>
                                            </div>
                                        </div>
                                    </a>
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