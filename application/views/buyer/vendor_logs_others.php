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
                                    <h3 class="page-title br-0">
                                        Vendor Logs
                                    </h3>
                                    <!--                                    <br>
                                                                        <span class="mr-3"><?php echo $zone; ?></span>-->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">

                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <select disabled="" class="form-control">
                                                    <option disabled="" selected="">Select Zone</option>
                                                    <option <?php
                                                    if ($zone == "NCR") {
                                                        echo 'selected';
                                                    }
                                                    ?> value="NCR">NCR</option>
                                                    <option <?php
                                                    if ($zone == "Mumbai") {
                                                        echo 'selected';
                                                    }
                                                    ?> value="Mumbai">Mumbai</option>
                                                    <option <?php
                                                    if ($zone == "Kolkata") {
                                                        echo 'selected';
                                                    }
                                                    ?> value="Kolkata">Kolkata</option>
                                                    <option <?php
                                                    if ($zone == "HO") {
                                                        echo 'selected';
                                                    }
                                                    ?> value="HO">HO</option>
                                                    <option <?php
                                                    if ($zone == "Pune") {
                                                        echo 'selected';
                                                    }
                                                    ?> value="Pune">Pune</option>
                                                    <option <?php
                                                    if ($zone == "South") {
                                                        echo 'selected';
                                                    }
                                                    ?> value="South">South</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <select name="projects" id="projects" class="form-control">
                                                    <option disabled="" selected="">Select Project</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-control">
                                                    <option>Select Vendor/Contractor</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-control">
                                                    <option value="" disabled="" selected="">Current Status</option>
                                                    <option <?php
                                                    if ($zone == "Open") {
                                                        echo 'selected';
                                                    }
                                                    ?> value="Open">Open</option>
                                                    <option <?php
                                                    if ($zone == "Closed") {
                                                        echo 'selected';
                                                    }
                                                    ?> value="Closed">Closed</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>SL No</th>
                                                        <th>Project</th>
                                                        <th>Contractor/Vendor</th>
                                                        <th>Package</th>
                                                        <th>Issue reported date	</th>
                                                        <th>Issue Description</th>
                                                        <th>Current Status</th>
                                                        <th>Reason Attributable To</th>
                                                        <th>
                                                            Last updated date
                                                        </th>
<!--                                                        <th>
                                                            Comments
                                                        </th>-->
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
                                                                <?php echo $record['project_name']; ?>
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
                                                            <td style="min-width: 400px !important">
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
                                                                <?php if ($record['vl_pain'] == "Company") { ?>
                                                                    <span class="btn btn-xs btn-success">
                                                                        Company
                                                                    </span>
                                                                <?php } else if ($record['vl_pain'] == "Contractor") { ?>
                                                                    <span class="btn btn-xs btn-success">
                                                                        Contractor
                                                                    </span>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                echo date('d-F-Y', strtotime($record['vl_date_updated']));
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                echo $record['vl_status'];
                                                                ?>
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

        <?php $this->load->view('buyer/partials/scripts'); ?>

        <script>
            $('#zone').change(function () {
                $.post("<?php echo base_url('home/getProjectsByZone'); ?>",
                        {
                            id: this.value,
                        },
                        function (data, status) {
                            $('#project').html(data);
                        });
            });
        </script>

    </body>
</html>