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
                                    <h3 class="page-title br-0">
                                        Total C&P : Zone Wise
                                    </h3>
                                </div>
                            </div>
                        </div>	

                        <div class="row" style="margin-top: -30px">
                            <div class="col-xl-12 col-md-12">
                                <div class="box">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-8 mx-auto">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless">
                                                        <thead class="text-center">
                                                            <tr class="bg-primary">
                                                                <th>
                                                                    Zone
                                                                </th>
                                                                <th>
                                                                    Total Award
                                                                </th>
                                                                <th>
                                                                    Saving / Escalation ~ (%)
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-center">
                                                            <tr>
                                                                <td>
                                                                    <span class="btn btn-sm" style="background-color: rgb(255, 99, 132);color: #ffffff">
                                                                        NCR
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-primary">
                                                                        <b>
                                                                            200 Crs
                                                                        </b>
                                                                    </span> 
                                                                </td>
                                                                <td>
                                                                    <span class="text-primary">
                                                                        <b>
                                                                            -10 Crs ~ (-20 %)
                                                                        </b>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span class="btn btn-sm" style="background-color: rgb(54, 162, 235);color: #ffffff">
                                                                        Mumbai
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-primary">
                                                                        <b>
                                                                            100 Crs
                                                                        </b>
                                                                    </span> 
                                                                </td>
                                                                <td>
                                                                    <span class="text-danger">
                                                                        <b>
                                                                            10 Crs ~ (20 %)
                                                                        </b>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span class="btn btn-sm" style="background-color: rgb(255, 205, 86);color: #ffffff">
                                                                        Kolkata
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-primary">
                                                                        <b>
                                                                            100 Crs
                                                                        </b>
                                                                    </span> 
                                                                </td>
                                                                <td>
                                                                    <span class="text-danger">
                                                                        <b>
                                                                            10 Crs ~ (20 %)
                                                                        </b>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span class="btn btn-sm" style="background-color: rgb(60, 179, 113, 1);color: #ffffff">
                                                                        Pune
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-primary">
                                                                        <b>
                                                                            100 Crs
                                                                        </b>
                                                                    </span> 
                                                                </td>
                                                                <td>
                                                                    <span class="text-danger">
                                                                        <b>
                                                                            10 Crs ~ (20 %)
                                                                        </b>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span class="btn btn-sm" style="background-color: rgb(12, 179, 32, 1);color: #ffffff">
                                                                        South
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-primary">
                                                                        <b>
                                                                            100 Crs
                                                                        </b>
                                                                    </span> 
                                                                </td>
                                                                <td>
                                                                    <span class="text-danger">
                                                                        <b>
                                                                            10 Crs ~ (20 %)
                                                                        </b>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot class="text-center">
                                                            <tr class="bg-light">
                                                                <td>
                                                                    <b>
                                                                        Total
                                                                    </b>
                                                                </td>
                                                                <td>
                                                                    <span class="text-primary">
                                                                        <b>
                                                                            725 Crs
                                                                        </b>
                                                                    </span> 
                                                                </td>
                                                                <td>
                                                                    <span class="text-danger">
                                                                        <b>
                                                                            -79 Crs ~ (-10 %)
                                                                        </b>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mx-auto">
                                                <div class="p-5">
                                                    <canvas id="myChart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['NCR', 'MUMBAI', 'Kolkata', 'PUNE', 'SOUTH'],
                    datasets: [{
                            label: 'Total Contribution %',
                            data: [50, 15, 15, 10, 10],
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)',
                                'rgb(60, 179, 113, 1)',
                                'rgb(12, 179, 32, 1)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgb(60, 179, 113, 1)',
                                'rgb(12, 179, 32, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    //cutoutPercentage: 40,
                    responsive: true,

                }
            });
        </script>

    </body>
</html>