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
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-block">
                                    <h3 class="page-title br-0">Project Mapping</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <?php $this->load->view('buyer/partials/alerts'); ?>
                                <!-- Step wizard -->
                                <form id="articleForm" method="POST" action="<?php echo base_url('buyer/users/updateProject'); ?>" enctype="multipart/form-data">
                                    <div class="box box-default">
                                        <div class="box-body pb-0">
                                            <div class="row">
<!--                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wlocation2">Zone</label>
                                                        <select class="form-control" name="zone" id="zone" required="">
                                                            <option disabled="" selected="">Select Zone</option>
                                                            <option selected="" value="NCR">NCR</option>
                                                            <option value="Mumbai">Mumbai</option>
                                                            <option value="Kolkata">Kolkata</option>
                                                            <option value="Mumbai">Mumbai</option>
                                                            <option value="Pune">Pune</option>
                                                            <option value="South">South</option>
                                                            <option value="East">East</option>
                                                        </select>
                                                    </div>
                                                </div>-->
<!--                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wlocation2">Project</label>
                                                        <select class="form-control" name="project" id="project" required="">
                                                            <option disabled="" selected="">Select Project</option>
                                                        </select>
                                                    </div>
                                                </div>-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wlocation2">Purchase Organization</label>
                                                        <input class="form-control" value="" required="" />  
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wlocation2">PM</label>
                                                        <select multiple="" class="form-control" name="pm" id="pm" required="">
                                                            <option disabled="" selected="">Select Project Manager</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wlocation2">PCM</label>
                                                        <select multiple="" class="form-control" name="pm" id="pm" required="">
                                                            <option disabled="" selected="">Select PCM</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer text-right">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
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
            $('#zone').change(function () {
                $.post("<?php echo base_url('buyer/users/getProjectsByZone'); ?>",
                        {
                            zone: this.value,
                        },
                        function (data, status) {
                            $('#project').html(data);
                        });

                $.post("<?php echo base_url('buyer/users/getUsersByZone'); ?>",
                        {
                            zone: this.value,
                        },
                        function (data, status) {
                            $('#pm').html(data);
                        });
            });
        </script>

    </body>
</html>