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
                                    <h3 class="page-title br-0">Package Management | <?php echo $zone; ?> | <?php echo $project['project_name']; ?> | <?php echo $for; ?></h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <?php $this->load->view('buyer/partials/alerts'); ?>
                                <div class="row">

                                    <div class="col-md-4">
                                        <a href="<?php echo base_url('buyer/vendor/selectPackage/' . $project['project_id'] . "/" . $zone . "/" . $type . "/" . $for . "/" . "1"); ?>">
                                            <div class="box primary-gradient">
                                                <div class="box-body p-30 text-center text-white">                                        
                                                    <h3>
                                                        Free Issue / Direct Purchase
                                                    </h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-4">
                                        <a href="<?php echo base_url('buyer/vendor/selectPackage/' . $project['project_id'] . "/" . $zone . "/" . $type . "/" . $for . "/" . "2"); ?>">
                                            <div class="box primary-gradient">
                                                <div class="box-body p-30 text-center text-white">                                        
                                                    <h3>
                                                        Basic Rate Approval
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

        

        

        <script type="text/javascript">

            $('#works').on('change', function () {
                if (this.value === "73") {
                    $('#others').css('display', 'block');
                    $('#others').attr('required', 'required');
                } else {
                    $('#others').css('display', 'none');
                    $('#others').attr('required', false);
                }
            });

            var htmlData = "";
            $("#add_package").click(function () {
                var selectedPackage = $('#works').val();
                if (selectedPackage) {
                    $('#modal-right').modal('hide');
                    htmlData += '';
                    $('#works').val("");
                    $('#dumpdata').html(htmlData);
                } else {
                    alert("Please select the package");
                }
            });
            
            $("#nfaProcess").click(function () {
                alert("Comes under NFA Process");
                $('#modal-right-2').modal('hide');
            });

        </script>

    </body>
</html>