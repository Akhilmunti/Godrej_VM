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
                                        Steel
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
                                            <div class="col-md-6 text-right">
                                                
                                            </div>
                                            <div class="col-md-3 text-right">
                                                <select class="form-control form-control-sm">
                                                    <option>Type</option>
                                                    <option>Date Wise</option>
                                                    <option>Month Wise</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 text-right">
                                                <select class="form-control form-control-sm">
                                                    <option>Zone</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mx-auto">
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
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                            label: 'Price',
                            data: [50, 15, 15, 10, 10, 50, 15, 15, 10, 10, 12, 15],
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