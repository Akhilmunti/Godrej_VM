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
                                    <h3 class="page-title br-0">Project Mapping | <?php echo $record['project_name']; ?></h3>
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
                                    <div class="box-body pb-0">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <form action="<?php echo base_url('buyer/users/updateProjectById/' . $record['project_id']); ?>" method="POST">
                                            <div class="row">
                                                <div class="col-md-6 mb-2">
                                                    <label>Project Name</label>
                                                    <input value="<?php echo $record['project_name']; ?>" required="" name="project" type="text" class="form-control form-control-sm" />
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label>Purchase Organisation</label>
                                                    <input value="<?php echo $record['project_purchase']; ?>" required="" name="purchase" type="number" class="form-control form-control-sm" />
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label>PM</label>
                                                    <select class="form-control form-control-sm" name="pm[]" id="pm" required="" multiple="">
                                                        <option disabled="" selected="">Select Project Manager</option>
                                                        <?php
                                                        $mPmSelected = json_decode($record['project_pm']);
                                                        foreach ($pm as $key => $value) {
                                                            ?>
                                                            <option <?php
                                                            if (in_array($value['buyer_id'], $mPmSelected)) {
                                                                echo "selected";
                                                            }
                                                            ?> value="<?php echo $value['buyer_id']; ?>"><?php echo $value['buyer_name']; ?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label>PCM</label>
                                                    <select class="form-control form-control-sm" name="pcm[]" id="pcm" required="" multiple="">
                                                        <option disabled="" selected="">Select PCM</option>
                                                        <?php
                                                        $mPcmSelected = json_decode($record['project_pcm']);
                                                        foreach ($pcm as $key => $value) {
                                                            ?>
                                                            <option <?php
                                                            if (in_array($value['buyer_id'], $mPcmSelected)) {
                                                                echo "selected";
                                                            }
                                                            ?> value="<?php echo $value['buyer_id']; ?>"><?php echo $value['buyer_role'] . " : " . $value['buyer_name']; ?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label>PD</label>
                                                    <select class="form-control form-control-sm" name="pd[]" id="pd" required="" multiple="">
                                                        <option disabled="" selected="">Select Project Director</option>
                                                        <?php
                                                        $mPdSelected = json_decode($record['project_pd']);
                                                        foreach ($pd as $key => $value) {
                                                            ?>
                                                            <option <?php
                                                            if (in_array($value['buyer_id'], $mPdSelected)) {
                                                                echo "selected";
                                                            }
                                                            ?> value="<?php echo $value['buyer_id']; ?>"><?php echo $value['buyer_name']; ?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-12 mb-3 text-right">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div> 
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

    </body>
</html>