<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('vendor/partials/header'); ?>

    <body class="hold-transition light-skin sidebar-mini theme-blueindigo onlyheader">

        <div class="wrapper">

            <div class="art-bg">
                <img src="<?php echo base_url('assets/'); ?>images/art1.svg" alt="" class="art-img light-img">
                <img src="<?php echo base_url('assets/'); ?>images/art2.svg" alt="" class="art-img dark-img">
                <img src="<?php echo base_url('assets/'); ?>images/art-bg.svg" alt="" class="wave-img light-img">
                <img src="<?php echo base_url('assets/'); ?>images/art-bg2.svg" alt="" class="wave-img dark-img">
            </div>

            <?php $this->load->view('vendor/partials/navbar'); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full clearfix position-relative">	

                    <?php $this->load->view('vendor/partials/sidebar'); ?>

                    <!-- Main content -->
                    <section class="content">

                        <!-- Content Header (Page header) -->	  
                        <div class="content-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-block">
                                    <h3 class="page-title br-0">Dashboard</h3>
                                </div>
                                <div class="right-title d-md-block d-none">
<!--                                    <div class="d-flex justify-content-end">
                                        <div class="d-md-flex mr-20 ml-10 d-none">
                                            <div class="chart-text mr-10">
                                                <h6 class="mb-0"><small>THIS MONTH</small></h6>
                                                <h4 class="mt-0 text-primary">- Contracts Awarded</h4>
                                            </div>
                                                                                        <div class="spark-chart">
                                                                                            <div id="thismonth"><canvas width="60" height="35" style="display: inline-block; width: 60px; height: 35px; vertical-align: top;"></canvas></div>
                                                                                        </div>
                                        </div>
                                        <div class="d-md-flex ml-10 d-none">
                                            <div class="chart-text mr-10">
                                                <h6 class="mb-0"><small>LAST YEAR</small></h6>
                                                <h4 class="mt-0 text-danger">- Contracts Awarded</h4>
                                            </div>
                                                                                        <div class="spark-chart">
                                                                                            <div id="lastyear"><canvas width="60" height="35" style="display: inline-block; width: 60px; height: 35px; vertical-align: top;"></canvas></div>
                                                                                        </div>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="box">
                                    <a href="<?php echo base_url('vendor/home/eoi'); ?>">
                                        <div class="box-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h3 class="font-weight-700 mt-0">
                                                    <?php
                                                    if (!empty($eois)) {
                                                        echo count($eois);
                                                    } else {
                                                        echo "0";
                                                    }
                                                    ?>
                                                    <span class="text-muted"></span></h3>
                                                <div class="text-danger font-weight-700 d-flex justify-content-between align-items-center">
                                                    <span><small>This Year</small></span>
                                                </div>
                                            </div>
                                            <h4 class="text-primary">EOI</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="box">
                                    <a class="rfq-process" href="#">
                                        <div class="box-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h3 class="font-weight-700 mt-0">-<span class="text-muted"></span></h3>
                                                <div class="text-success font-weight-700 d-flex justify-content-between align-items-center">
                                                    <i class="mdi mdi-chevron-up mdi-24px"></i> <span><small>-%</small></span>
                                                </div>
                                            </div>
                                            <h4 class="text-primary">Tenders</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="box">
                                    <a class="rfq-process" href="#">
                                        <div class="box-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h3 class="font-weight-700 mt-0">-<span class="text-muted"></span></h3>
                                                <div class="text-success font-weight-700 d-flex justify-content-between align-items-center">
                                                    <i class="mdi mdi-chevron-up mdi-24px"></i> <span><small>-%</small></span>
                                                </div>
                                            </div>
                                            <h4 class="text-primary">Awarded Contracts</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="box">
                                    <a class="rfq-process" href="#">
                                        <div class="box-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h3 class="font-weight-700 mt-0">-<span class="text-muted"></span></h3>
                                                <div class="text-danger font-weight-700 d-flex justify-content-between align-items-center">
                                                    <i class="mdi mdi-chevron-down mdi-24px"></i> <span><small>-%</small></span>
                                                </div>
                                            </div>
                                            <h4 class="text-primary">Completed Contracts</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="box">	
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-lg-3 col-12">
                                                <div class="text-center">
                                                    <div>
                                                        <p><small><i class="fa fa-eye"></i>  Revenue</small></p>
                                                    </div>
                                                    <div class="my-50">
                                                        <h1 class="mb-0"><?php
                                                            if ($turn_over[2]) {
                                                                echo $turn_over[2] . " Crs";
                                                            } else {
                                                                echo "No Data";
                                                            }
                                                            ?> 
                                                        </h1>
                                                    </div>
                                                    <div>
                                                        <p class="mb-0"><small><i class="fa fa-calendar"></i>  
                                                                Financial Year (<?php echo date("Y", strtotime("-2 year")); ?>-<?php echo date("Y", strtotime("-1 year")); ?>)</small>
                                                        </p>
                                                    </div>									  
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-12">
                                                <div class="text-center">
                                                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="box">
                                    <div class="box-header bg-primary">
                                        <h4 class="box-title">Quick Actions</h4>                
                                    </div>
                                    <div class="box-body p-3">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Action</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $mCount = 0;
                                                    foreach ($actions as $key => $record) {
                                                        $mCount++;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $mCount; ?></td>
                                                            <td>
                                                                <b>
                                                                    <?php echo $record['action']; ?>
                                                                </b>
                                                            </td>
                                                            <td>
                                                                <?php echo $record['button']; ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="box">
                                    <div class="box-header bg-primary">
                                        <h4 class="box-title">People you may know from GPL</h4>                
                                    </div>
                                    <div class="box-body p-3">
                                        <div class="table-responsive">
                                            <table id="example2" class="table table-striped">
                                                <thead class=" bg-primary">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Logs</th>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Role</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $mCount = 0;
                                                    foreach ($records as $key => $record) {
                                                        $mCount++;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $mCount; ?></td>
                                                            <td>
                                                                <b>
                                                                    <?php echo $record['log']; ?>
                                                                </b>
                                                            </td>
                                                            <td>
                                                                <?php echo $record['name']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $record['mobile']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $record['email']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $record['role']; ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>				
                        </div>			
                    </section>

                    <!-- /.content -->
                </div>
            </div>
            <!-- /.content-wrapper -->
            <?php $this->load->view('vendor/partials/footer'); ?>

            <!-- Control Sidebar -->
            <?php $this->load->view('vendor/partials/control'); ?>
            <!-- /.control-sidebar -->

            <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

        </div>
        <!-- ./wrapper -->

        <?php $this->load->view('vendor/partials/scripts'); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

        <script>
            $('.rfq-process').click(function () {
                alert("Under Development");
            });
        </script>

        <script>

            var xValues = ["Year 1 (<?php echo date("Y", strtotime("-4 year")); ?>-<?php echo date("Y", strtotime("-3 year")); ?>)<?php echo " - " . $turn_over[0] . " Crs" ?>", "Year 2 (<?php echo date("Y", strtotime("-3 year")); ?>-<?php echo date("Y", strtotime("-2 year")); ?>)<?php echo " - " . $turn_over[1] . " Crs" ?>", "Year 3 (<?php echo date("Y", strtotime("-2 year")); ?>-<?php echo date("Y", strtotime("-1 year")); ?>)<?php echo " - " . $turn_over[2] . " Crs" ?>", "Year 4 (<?php echo date("Y", strtotime("-1 year")); ?>-<?php echo date("Y"); ?>) <?php echo " - " . $turn_over[3] . " Crs" ?>"];
            var yValues = [<?php
        foreach ($turn_over as $key => $value) {
            echo $value . ", ";
        }
        ?>];
            var barColors = [
                "#b91d47",
                "#00aba9",
                "#2b5797",
                "#e8c3b9"
            ];

            new Chart("myChart", {
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                        }]
                },
                options: {
                    title: {
                        display: true,
                        text: "Last Four Years Active Revenue"
                    }
                }
            });
        </script>

    </body>
</html>