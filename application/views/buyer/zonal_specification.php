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
                                    <h3 class="page-title br-0">Zonal Spoc</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>

                                        <div class="table-responsive">
                                            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                                <thead>
                                                    <tr>
                                                        <th>Sl. No</th>
                                                        <th>Zone</th>
                                                        <th>Buyer Linked</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php if (!empty($records)) { ?>

                                                        <?php
                                                        $mCount = 0;
                                                        foreach ($records as $key => $record) {
                                                            $mCount++;
                                                            $mPm = $this->buyer->getParentByKey($record['zs_linked']);
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $mCount; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $record['zs_zone']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $mPm['buyer_email']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if (!empty($mPm)) { ?>
                                                                        <a class="btn btn-xs btn-primary" href="<?php echo base_url('buyer/users/updateZonal/' . $record['zs_id']); ?>">
                                                                            Change
                                                                        </a>
                                                                    <?php } else { ?>
                                                                        <a class="btn btn-xs btn-primary" href="<?php echo base_url('buyer/users/updateZonal/' . $record['zs_id']); ?>">
                                                                            Link
                                                                        </a>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>

                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>  
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

        <!-- Modal -->
        <div class="modal modal-right fade" id="modal-right" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Link</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <style>
                        label{
                            font-size: 12px !important
                        }
                    </style>
                    <form method="POST" action="<?php echo base_url('buyer/vendor/addNewProjectFromLink'); ?>">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
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
                                <div class="col-md-12">
                                    <label>Project Name</label>
                                    <input required="" name="project" type="text" class="form-control form-control-sm" />
                                </div>
                                <div class="col-md-12">
                                    <label>Purchase Organisation</label>
                                    <input required="" name="purchase" type="number" class="form-control form-control-sm" />
                                </div>
                                <div class="col-md-6">
                                    <label>Total BUA</label>
                                    <input step=".01" placeholder="In million sq ft" required="" name="bua" type="number" class="form-control form-control-sm" />
                                </div>
                                <div class="col-md-6">
                                    <label>No of towers</label>
                                    <input required="" name="towers" type="number" class="form-control form-control-sm" />
                                </div>
                                <div class="col-md-12">
                                    <label>Building Configurations</label>
                                    <input required="" name="building" type="text" class="form-control form-control-sm" />
                                </div>
                                <div class="col-md-12">
                                    <label>PM</label>
                                    <select class="form-control form-control-sm" name="pm" id="pm" required="">
                                        <option disabled="" selected="">Select Project Manager</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label>PCM</label>
                                    <select class="form-control form-control-sm" name="pcm" id="pcm" required="">
                                        <option disabled="" selected="">Select PCM</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label>PD</label>
                                    <select class="form-control form-control-sm" name="pd" id="pd" required="">
                                        <option disabled="" selected="">Select Project Director</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer modal-footer-uniform">
                            <button type="button" class="btn btn-md btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-md btn-primary float-right">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->

        <?php $this->load->view('buyer/partials/scripts'); ?>

    </body>
</html>