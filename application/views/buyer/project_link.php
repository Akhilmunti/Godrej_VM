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
                                    <h3 class="page-title br-0">Project Mapping</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="<?php echo base_url('buyer/users/addProject'); ?>" class="btn btn-primary">Add</a>
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
                                                        <th>Project</th>
                                                        <th>Purchase Organization</th>
                                                        <th>Project Manager</th>
                                                        <th>PCM</th>
                                                        <th>Project Director</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php if (!empty($records)) { ?>

                                                        <?php
                                                        $mCount = 0;
                                                        foreach ($records as $key => $record) {
                                                            $mPmDetails = array();
                                                            $mPcmDetails = array();
                                                            $mPdDetails = array();
                                                            $mCount++;
                                                            $mPm = json_decode($record['project_pm']);
                                                            $mPcm = json_decode($record['project_pcm']);
                                                            $mPd = json_decode($record['project_pd']);
                                                            if (!empty($mPm)) {
                                                                foreach ($mPm as $key => $value) {
                                                                    $mGetBuyer = $this->buyer->getParentByKey($value);
                                                                    $mPmDetails[] = $mGetBuyer['buyer_name'];
                                                                }
                                                            }
                                                            if (!empty($mPcm)) {
                                                                foreach ($mPcm as $key => $value) {
                                                                    $mGetBuyer = $this->buyer->getParentByKey($value);
                                                                    $mPcmDetails[] = $mGetBuyer['buyer_name'];
                                                                }
                                                            }
                                                            if (!empty($mPd)) {
                                                                foreach ($mPd as $key => $value) {
                                                                    $mGetBuyer = $this->buyer->getParentByKey($value);
                                                                    $mPdDetails[] = $mGetBuyer['buyer_name'];
                                                                }
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $mCount; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $record['project_zone']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $record['project_name']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $record['project_purchase']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php foreach ($mPmDetails as $key => $value) { ?>
                                                                        <span class="btn btn-xs btn-primary btn-block">
                                                                            <?php echo $value; ?>
                                                                        </span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <?php foreach ($mPcmDetails as $key => $value) { ?>
                                                                        <span class="btn btn-xs btn-primary btn-block">
                                                                            <?php echo $value; ?>
                                                                        </span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <?php foreach ($mPdDetails as $key => $value) { ?>
                                                                        <span class="btn btn-xs btn-primary btn-block">
                                                                            <?php echo $value; ?>
                                                                        </span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-xs btn-primary" href="<?php echo base_url('buyer/users/editProject/' . $record['project_id']); ?>">
                                                                        Edit
                                                                    </a>
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
                        <h5 class="modal-title">Add New Project</h5>
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
                                    <select class="form-control form-control-sm" name="pm" id="pm" required="" multiple="">
                                        <option disabled="" selected="">Select Project Manager</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label>PCM/Regional C&P Team</label>
                                    <select class="form-control form-control-sm" name="pcm" id="pcm" required="" multiple="">
                                        <option disabled="" selected="">Select PCM/Regional C&P Team</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label>PD</label>
                                    <select class="form-control form-control-sm" name="pd" id="pd" required="" multiple="">
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

        <script>
            $('#zone').change(function () {
                $.post("<?php echo base_url('home/getAllPms'); ?>",
                        {
                            id: this.value,
                        },
                        function (data, status) {
                            $('#pm').html(data);
                        });
                $.post("<?php echo base_url('home/getAllPcms'); ?>",
                        {
                            id: this.value,
                        },
                        function (data, status) {
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