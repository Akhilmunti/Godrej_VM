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
                                    <h3 class="page-title br-0">Summary of Contract Award FY(22-23)</h3>
                                    <br>
                                    <a href="<?php echo base_url('buyer/vendor/dashboard'); ?>">
                                        <span class="fa fa-arrow-left"></span> Dashboard
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-12">
                                <div class="box">
                                    <!-- /.box-header -->
                                    <div class="box-body py-0">

                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <select style="width: 200px" class="form-control form-control-sm float-right" name="zone">
                                                    <option>Select</option>
                                                    <option selected="">Pan India</option>
                                                    <option>NCR</option>
                                                    <option>Mumbai</option>
                                                    <option>Pune</option>
                                                    <option>South</option>
                                                    <option>Kolkata</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-bordered mt-3">
                                                <thead class="text-center text-white"  style="background-color: #0096FF">
                                                    <tr>
                                                        <th>
                                                            Zone / Package
                                                        </th>
                                                        <th colspan="3">
                                                            Total
                                                        </th>
                                                        <th colspan="3">
                                                            Core & Shell
                                                        </th>
                                                        <th colspan="3">
                                                            Finishing
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <tr>
                                                        <td>

                                                        </td>
                                                        <td>
                                                            <b>
                                                                Total Budget
                                                            </b>
                                                        </td>
                                                        <td>
                                                            <b>
                                                                Total Award Value
                                                            </b>
                                                        </td>
                                                        <td>
                                                            <b>
                                                                Savings
                                                            </b>
                                                        </td>
                                                        <td>
                                                            <b>
                                                                Total Budget
                                                            </b>
                                                        </td>
                                                        <td>
                                                            <b>
                                                                Total Award Value
                                                            </b>
                                                        </td>
                                                        <td>
                                                            <b>
                                                                Savings
                                                            </b>
                                                        </td>
                                                        <td>
                                                            <b>
                                                                Total Budget
                                                            </b>
                                                        </td>
                                                        <td>
                                                            <b>
                                                                Total Award Value
                                                            </b>
                                                        </td>
                                                        <td>
                                                            <b>
                                                                Savings
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <b>Mumbai</b>
                                                        </td>
                                                        <td>
                                                            588.6

                                                        </td>
                                                        <td>
                                                            565.3

                                                        </td>
                                                        <td>
                                                            23.3
                                                        </td>
                                                        <td>
                                                            386.7
                                                        </td>
                                                        <td>
                                                            374.3
                                                        </td>
                                                        <td>
                                                            12.5
                                                        </td>
                                                        <td>
                                                            73.1
                                                        </td>
                                                        <td>
                                                            70.2
                                                        </td>
                                                        <td>
                                                            2.9
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <b>
                                                                North
                                                            </b>
                                                        </td>
                                                        <td>
                                                            743.5
                                                        </td>
                                                        <td>
                                                            726.5
                                                        </td>
                                                        <td>
                                                            16.9

                                                        </td>
                                                        <td>
                                                            218.6

                                                        </td>
                                                        <td>
                                                            217.1
                                                        </td>
                                                        <td>
                                                            1.5
                                                        </td>
                                                        <td>
                                                            317.6
                                                        </td>
                                                        <td>
                                                            312.9

                                                        </td>
                                                        <td>
                                                            4.6
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <b>
                                                                Pune
                                                            </b>
                                                        </td>
                                                        <td>
                                                            489.4
                                                        </td>
                                                        <td>
                                                            472.4

                                                        </td>
                                                        <td>
                                                            17.1


                                                        </td>
                                                        <td>
                                                            227.0

                                                        </td>
                                                        <td>
                                                            222.0

                                                        </td>
                                                        <td>
                                                            5.0
                                                        </td>
                                                        <td>
                                                            74.5
                                                        </td>
                                                        <td>
                                                            72.8

                                                        </td>
                                                        <td>
                                                            1.7

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <b>
                                                                Kolkata
                                                            </b>
                                                        </td>
                                                        <td>
                                                            81.6
                                                        </td>
                                                        <td>
                                                            73.0

                                                        </td>
                                                        <td>
                                                            8.6

                                                        </td>
                                                        <td>
                                                            16.5

                                                        </td>
                                                        <td>
                                                            14.2
                                                        </td>
                                                        <td>
                                                            2.3
                                                        </td>
                                                        <td>
                                                            27.6
                                                        </td>
                                                        <td>
                                                            24.6

                                                        </td>
                                                        <td>
                                                            3.0
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <b>
                                                                Total
                                                            </b>
                                                        </td>
                                                        <td>
                                                            2268.9

                                                        </td>
                                                        <td>
                                                            2186.6
                                                        </td>
                                                        <td>
                                                            82.4

                                                        </td>
                                                        <td>
                                                            965.2

                                                        </td>
                                                        <td>
                                                            938.7
                                                        </td>
                                                        <td>
                                                            26.5
                                                        </td>
                                                        <td>
                                                            568.3

                                                        </td>
                                                        <td>
                                                            554.7

                                                        </td>
                                                        <td>
                                                            13.6
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <b>
                                                                %
                                                            </b>
                                                        </td>
                                                        <td>

                                                        </td>
                                                        <td>

                                                        </td>
                                                        <td>
                                                            <b>
                                                                3.6 %
                                                            </b>

                                                        </td>
                                                        <td>


                                                        </td>
                                                        <td>

                                                        </td>
                                                        <td>
                                                            <b>
                                                                2.7% 
                                                            </b>


                                                        </td>
                                                        <td>
                                                        </td>
                                                        <td>

                                                        </td>
                                                        <td>
                                                            <b>
                                                                2.4%
                                                            </b>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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

    </body>
</html>