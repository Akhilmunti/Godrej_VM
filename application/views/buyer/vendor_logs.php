<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('buyer/partials/header'); ?>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">


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
                                <div class="col-md-10">
                                    <h3 class="page-title br-0">
                                        Vendor Logs 
                                    </h3>
                                    <br>
                                    <span class="mr-3"> <?php echo $zone ?> / <?php echo $project['project_name']; ?></span>
                                </div>
                                <div class="col-md-2 text-right">
                                    <?php
                                    $mSessionRole = $this->session->userdata('session_role');
                                    if ($mSessionRole == "Project Manager" || $mSessionRole == "Regional C&P Head" || $mSessionRole == "Regional C&P Team" || $mSessionRole == "Construction Head" || $mSessionRole == "PCM" || $mSessionRole == "Project Execution Team") {
                                        ?>
                                        <a href="<?php echo base_url('buyer/vendor/addVendorLog/' . $project['project_id'] . "/" . $zone); ?>" class="btn btn-primary btn-block">
                                            Add New
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>SL No</th>
                                                        <th>Contractor/Vendor</th>
                                                        <th>Package</th>
                                                        <th>Issue reported date	</th>
                                                        <th>Issue Description</th>
                                                        <th>Current Status</th>
                                                        <th>Reason Attributable To</th>
                                                        <th>
                                                            Last updated date
                                                        </th>
                                                        <th>
                                                            Comments
                                                        </th>
                                                        <th>
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $mCount = 0;
                                                    foreach ($records as $key => $record) {
                                                        $mCount++;
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $mCount; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $record['vl_vendor']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $record['name']; ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                echo date('d-F-Y', strtotime($record['vl_date']));
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $record['vl_issue']; ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($record['vl_status_toggle'] == "1") { ?>
                                                                    <span class="btn btn-xs btn-warning">
                                                                        Open
                                                                    </span>
                                                                <?php } else { ?>
                                                                    <span class="btn btn-xs btn-success">
                                                                        Closed
                                                                    </span>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-xs btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton-<?php echo $record['vl_id']; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <?php if ($record['vl_pain'] == "Company") { ?>
                                                                            Company
                                                                        <?php } else if ($record['vl_pain'] == "Contractor") { ?>
                                                                            Contractor
                                                                        <?php } else { ?>
                                                                            Select
                                                                        <?php } ?>
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton-<?php echo $record['vl_id']; ?>">
                                                                        <a class="dropdown-item" href="<?php echo base_url('buyer/vendor/actionChangeLogPainStatus/' . $record['vl_id'] . "/1"); ?>">Company</a>
                                                                        <a class="dropdown-item" href="<?php echo base_url('buyer/vendor/actionChangeLogPainStatus/' . $record['vl_id'] . "/2"); ?>">Contractor</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                echo date('d-F-Y', strtotime($record['vl_date_updated']));
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $record['vl_status']; ?>
                                                            </td>
                                                            <td>
                                                                <a data-toggle="modal" data-target="#modal-right-<?php echo $record['vl_id']; ?>" href="#" class="btn btn-xs btn-info">
                                                                    Change Status
                                                                </a>
                                                            </td>
                                                        </tr>

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

        <?php foreach ($records as $key => $record) { ?>
            <!-- Modal -->
            <div class="modal modal-right fade" id="modal-right-<?php echo $record['vl_id']; ?>" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="<?php echo base_url('buyer/vendor/changeLogStatus/' . $record['vl_id']); ?>" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <?php echo $record['vl_id'] . " - " . $record['project_name']; ?>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="checkbox">
                                            <label>
                                                <input <?php
                                                if ($record['vl_status_toggle'] == "1") {
                                                    echo "checked";
                                                }
                                                ?> value="1" name="vl_status_toggle" type="checkbox" data-toggle="toggle">
                                                Open / Closed
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Comments</label>
                                        <textarea rows="6" required="" name="vl_status" class="form-control"><?php echo $record['vl_status']; ?></textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer modal-footer-uniform">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modal -->
        <?php } ?>

        <?php $this->load->view('buyer/partials/scripts'); ?>
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    </body>
</html>