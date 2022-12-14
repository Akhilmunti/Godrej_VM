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
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <form method="POST" action="<?php echo base_url('buyer/vendor/viewAllVendorLogsFilter'); ?>">
                                            <div class="row mb-2">
                                                <div class="col-md-2">
                                                    <label for="zone">Zone*</label>
                                                    <select required="" id="zone" name="zone" class="form-control">
                                                        <option selected="" disabled="" value="">Select Zone</option>
                                                        <option <?php
                                                        if ($zone == "All") {
                                                            echo 'selected';
                                                        }
                                                        ?> value="All">All</option>
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
                                                <div class="col-md-2">
                                                    <label for="project">Project</label>
                                                    <select id="project" name="project" class="form-control">
                                                        <option selected="" disabled="" value="">Select Project</option>
                                                        <option <?php
                                                        if ($project == "All") {
                                                            echo 'selected';
                                                        }
                                                        ?> value="All">All</option>
                                                        <?php foreach ($projects as $key => $value) { ?>
                                                            <option <?php
                                                            if ($project == $value['project_id']) {
                                                                echo 'selected';
                                                            }
                                                            ?> value="<?php echo $value['project_id']; ?>"><?php echo $value['project_name']; ?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="status">Current Status</label>
                                                    <select id="status" name="status" class="form-control">
                                                        <option disabled="" value="" selected="">Current Status</option>
                                                        <option <?php
                                                        if ($status == "All") {
                                                            echo 'selected';
                                                        }
                                                        ?> value="All">All</option>
                                                        <option <?php
                                                        if ($status == "1") {
                                                            echo 'selected';
                                                        }
                                                        ?> value="1">Open</option>
                                                        <option <?php
                                                        if ($status == "0") {
                                                            echo 'selected';
                                                        }
                                                        ?> value="0">Closed</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="from">From</label>
                                                    <input value="<?php echo $from; ?>" class="form-control" type="date" name="from" id="from" />
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="to">To</label>
                                                    <input value="<?php echo $to; ?>" class="form-control" type="date" name="to" id="to" />
                                                </div>
                                                <div class="col-md-2 text-right">
                                                    <button class="btn btn-primary mt-4" type="submit">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        
                                        <hr>

                                        <div class="table-responsive">
                                            <table id="example-btns" class="table table-striped table-bordered" style="width:100%">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>SL No</th>
                                                        <th>Zone</th>
                                                        <th>Project</th>
                                                        <th>Contractor/Vendor</th>
                                                        <th>Package</th>
                                                        <th>Issue reported date	</th>
                                                        <th style="min-width: 300px !important">Issue Description</th>
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
                                                        //print_r($record);
                                                        $mCount++;
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $mCount; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $record['vl_zone']; ?>
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
    <!--                                                            <td>
                                                            <?php
                                                            echo $record['vl_status'];
                                                            ?>
                                                            </td>-->
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
                $.post("<?php echo base_url('home/getProjectsByZoneForVendorLogs'); ?>",
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