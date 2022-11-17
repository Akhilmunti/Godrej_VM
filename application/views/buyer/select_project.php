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
                                <div class="col-md-6">
                                    <h3 class="page-title br-0">
                                        Project Management 
                                        </h5>
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

                                    <?php foreach ($records as $key => $record) { ?>
                                        <div class="col-md-4">
                                            <a href="#" data-toggle="modal" data-target="#modal-right-<?php echo $record['project_id']; ?>">
                                                <div class="box primary-gradient">
                                                    <div class="box-body p-60 text-center text-white">                                        
                                                        <h3>
                                                            <?php echo $record['project_name']; ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-4">
                                        <a href="#" data-toggle="modal" data-target="#modal-right">
                                            <div class="box box-info">
                                                <div class="box-body p-60 text-center text-white">                                        
                                                    <h3>
                                                        Add New <span class="ti ti-plus"></span>
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
                        <form method="POST" action="<?php echo base_url('buyer/vendor/addNewProject/' . $zone); ?>">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Zone</label>
                                        <input value="<?php echo $zone; ?>" class="form-control form-control-sm" readonly="" name="zone" id="zone" required="" />
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
                                            <?php foreach ($pms as $key => $pm) { ?>
                                                <option value="<?php echo $pm['buyer_id']; ?>"><?php echo $pm['buyer_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label>PCM</label>
                                        <select class="form-control form-control-sm" name="pcm" id="pcm" required="">
                                            <option disabled="" selected="">Select PCM</option>
                                            <?php foreach ($pcms as $key => $pm) { ?>
                                                <option value="<?php echo $pm['buyer_id']; ?>"><?php echo $pm['buyer_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label>PD</label>
                                        <select class="form-control form-control-sm" name="pd" id="pd" required="">
                                            <option disabled="" selected="">Select Project Director</option>
                                            <?php foreach ($pds as $key => $pm) { ?>
                                                <option value="<?php echo $pm['buyer_id']; ?>"><?php echo $pm['buyer_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer modal-footer-uniform">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary float-right">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modal -->

            <!-- Modal -->
            <!-- /.modal -->
            <?php foreach ($records as $key => $record) { ?>
                <!-- Modal -->
                <div class="modal modal-right fade" id="modal-right-<?php echo $record['project_id']; ?>" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <?php echo $record['project_name']; ?>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="<?php echo base_url('buyer/vendor/selectWork/' . $record['project_id'] . "/" . $record['project_zone'] . "/" . "3" . "/" . "Contracts"); ?>">
                                            <div class="box primary-gradient">
                                                <div class="box-body p-10 text-center text-white">                                        
                                                    <h5>
                                                        Contracts
                                                    </h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="<?php echo base_url('buyer/vendor/selectWork/' . $record['project_id'] . "/" . $record['project_zone'] . "/" . "1" . "/" . "Procurement"); ?>">
                                            <div class="box primary-gradient">
                                                <div class="box-body p-10 text-center text-white">                                        
                                                    <h5>
                                                        Procurement
                                                    </h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="<?php echo base_url('buyer/vendor/selectWork/' . $record['project_id'] . "/" . $record['project_zone'] . "/" . "3"); ?>">
                                            <div class="box primary-gradient">
                                                <div class="box-body p-10 text-center text-white">                                        
                                                    <h5>
                                                        Contract Administration
                                                    </h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="<?php echo base_url('buyer/vendor/selectWork' . $record['project_id'] . "/" . $record['project_zone'] . "/" . "3"); ?>">
                                            <div class="box primary-gradient">
                                                <div class="box-body p-10 text-center text-white">                                        
                                                    <h5>
                                                        Reports
                                                    </h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="<?php echo base_url('buyer/vendor/selectWork/' . $record['project_id'] . "/" . $record['project_zone'] . "/" . "2"); ?>">
                                            <div class="box primary-gradient">
                                                <div class="box-body p-10 text-center text-white">                                        
                                                    <h5>
                                                        Consultant appointment
                                                    </h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="<?php echo base_url('buyer/vendor/projectDetails/' . $record['project_id']); ?>">
                                            <div class="box primary-gradient">
                                                <div class="box-body p-10 text-center text-white">                                        
                                                    <h5>
                                                        Project Details
                                                    </h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="<?php echo base_url('buyer/vendor/vendorLogs/' . $record['project_id'] . "/" . $zone); ?>">
                                            <div class="box primary-gradient">
                                                <div class="box-body p-10 text-center text-white">                                        
                                                    <h5>
                                                        Vendor Logs
                                                    </h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <!--                                <div class="col-md-12">
                                                                        <a href="<?php echo base_url('buyer/vendor/selectWork'); ?>">
                                                                            <div class="box primary-gradient">
                                                                                <div class="box-body p-10 text-center text-white">                                        
                                                                                    <h5>
                                                                                        Agencies Feedback Score
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <a href="<?php echo base_url('buyer/vendor/selectWork'); ?>">
                                                                            <div class="box primary-gradient">
                                                                                <div class="box-body p-10 text-center text-white">                                        
                                                                                    <h5>
                                                                                        Vendor data Base (PQ + Feedback)-PAN India
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>-->
                                </div>
                            </div>
                            <div class="modal-footer modal-footer-uniform">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal -->
            <?php } ?>
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