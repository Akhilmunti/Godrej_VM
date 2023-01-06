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
                                    <h3 class="page-title br-0">Project Mapping | Add</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="<?php echo base_url('buyer/users/projects'); ?>" class="btn btn-primary">List</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body p-3">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <form method="POST" action="<?php echo base_url('buyer/vendor/addNewProjectFromLink'); ?>">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label>Zone</label>
                                                    <select class="form-control form-control-sm" name="zone" id="zone" required="">
                                                        <option disabled="" selected="">Select Zone</option>
                                                        <option value="NCR">NCR</option>
                                                        <option value="Mumbai">Mumbai</option>
                                                        <option value="Kolkata">Kolkata</option>
                                                        <option value="HO">HO</option>
                                                        <option value="Pune">Pune</option>
                                                        <option value="South">South</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label>Project Name</label>
                                                    <input required="" name="project" type="text" class="form-control form-control-sm" />
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label>Purchase Organisation</label>
                                                    <input required="" name="purchase" type="number" class="form-control form-control-sm" />
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label>Total BUA</label>
                                                    <input step=".01" placeholder="In million sq ft" required="" name="bua" type="number" class="form-control form-control-sm" />
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label>No of towers</label>
                                                    <input required="" name="towers" type="number" class="form-control form-control-sm" />
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label>Building Configurations</label>
                                                    <input required="" name="building" type="text" class="form-control form-control-sm" />
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label>PM</label>
                                                    <select class="form-control form-control-sm" name="pm[]" id="pm" required="" multiple="">
                                                        <option value="" disabled="" selected="">Select Project Manager</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label>PCM/Regional C&P Team</label>
                                                    <select class="form-control form-control-sm" name="pcm[]" id="pcm" required="" multiple="">
                                                        <option disabled="" selected="">Select PCM/Regional C&P Team</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label>PD</label>
                                                    <select class="form-control form-control-sm" name="pd[]" id="pd" required="" multiple="">
                                                        <option disabled="" selected="">Select Project Director</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <button type="submit" class="btn btn-md btn-primary float-right">Save changes</button>
                                        </form>
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

        <script>
            $('#zone').change(function () {
                $.post("<?php echo base_url('home/getAllPms'); ?>",
                        {
                            id: this.value,
                        },
                        function (data, status) {
                            $('#pm').html(data);
                        });
                $.post("<?php echo base_url('home/getAllPcmsAndRots'); ?>",
                        {
                            id: this.value,
                        },
                        function (data, status) {
                            //alert(data);
                            $('#pcm').html(data);
                        });
                $.post("<?php echo base_url('home/getAllPds'); ?>",
                        {
                            id: this.value,
                        },
                        function (data, status) {
                            $('#pd').html(data);
                        });
            });
        </script>

    </body>
</html>