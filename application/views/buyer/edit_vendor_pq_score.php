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
                                    <h3 class="page-title br-0">PQ Score : <?php echo $mVendorData['company_name']; ?></h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <form action="<?php echo base_url('buyer/vendor/savePqv/' . $mVendorData['id'] . "/" . $mRecord['pqv_id']); ?>" method="POST">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="7" style="text-align:center" >
                                                                ASSESMENT SHEET FOR PRE-QUALIFCATION OF VENDORS
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td> S.N. </td>
                                                            <td>CRITERIA</td>
                                                            <td>WEIGHATGE</td>
                                                            <td>SCORING GUIDE</td>
                                                            <td>System Generated PQ Score </td>
                                                            <td>Manual PQ Score Edited by CM</td>
                                                            <td>Reasons for Corrections in Score – mandatory by CM</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">1</td>
                                                            <td rowspan="3">WHAT TYPE OF BRAND DOES THE VENDOR REPRESENT</td> 
                                                            <td rowspan="3">10</td>
                                                            <td>Major and well established : 10</td>
                                                            <td rowspan="3">
                                                                <input disabled="" name="pqv_first_score_sg" value="<?php echo $mRecord['pqv_first_score_sg']; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <input disabled="" value="<?php echo $mRecord['pqv_first_score']; ?>" max="10" onchange="calculateTotal(this.value)" name="pqv_first_score" type="number" id="first_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <textarea disabled="" class="form-control" rows="10" name="pqv_first_score_remarks"><?php echo $mRecord['pqv_first_score_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Emerging : 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Not established : 0</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">2</td>
                                                            <td rowspan="3"> REGISTERED WITH GOVERNEMENT DEPARTMENTS / PSUs / MAJOR DEVELOPERS</td> 
                                                            <td rowspan="3">15</td>
                                                            <td>> 10 : 15</td>
                                                            <td rowspan="3">
                                                                <input disabled="" name="pqv_second_score_sg" value="<?php echo $mRecord['pqv_second_score_sg']; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <input disabled="" value="<?php echo $mRecord['pqv_second_score']; ?>" max="15" onchange="calculateTotal(this.value)" name="pqv_second_score" type="number" id="second_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <textarea disabled="" class="form-control" rows="10" name="pqv_second_score_remarks"><?php echo $mRecord['pqv_second_score_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Between 5 & 10 : 10</td>
                                                        </tr>
                                                        <tr>
                                                            <td>< 5 : 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">3</td>
                                                            <td rowspan="3"> AFTER SALES SERVICE FACILITIES</td> 
                                                            <td rowspan="3">10</td>
                                                            <td>Service center / authorised dealer within city limits in the region : 10</td>
                                                            <td rowspan="3">
                                                                <input disabled="" name="pqv_third_score_sg" value="<?php echo $mRecord['pqv_third_score_sg']; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <input disabled="" value="<?php echo $mRecord['pqv_third_score']; ?>" max="10" onchange="calculateTotal(this.value)" name="pqv_third_score" type="number" id="third_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <textarea disabled="" class="form-control" rows="10" name="pqv_third_score_remarks"><?php echo $mRecord['pqv_third_score_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Service center / authorised dealer beyond city limits in the region : 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>No service center in India : 0</td>
                                                        </tr>
                                                        <tr>
                                                            <td> 4 </td>
                                                            <td>QUALITY & SAFETY MANAGEMENT SYSTEM </td>
                                                            <td>15</td>
                                                            <td colspan="4"><input disabled="" name="pqv_fourth_score" id="fourth_score" readonly="" value="<?php echo $mTotalQuality; ?>" type="number" name="" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td> 5</td>
                                                            <td>ASSESSMENT BASED ON FACTORY VISIT (with GO-NOGO recommendation)</td>
                                                            <td>50</td>
                                                            <td colspan="4">
                                                                <input disabled="" readonly="" value="<?php echo $mFifthScore; ?>" type="number" id="fifth_score" name="pqv_fifth_score" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> </td>
                                                            <td>TOTAL</td>
                                                            <td >100</td>
                                                            <td colspan="2">MINIMUM QUALIFYING SCORE - 50
                                                            </td> 
                                                            <td colspan="2">
                                                                <input disabled="" value="<?php echo $mRecord['pqv_total']; ?>" readonly="" type="number" name="pqv_total" id="pqv_total" class="form-control">
                                                            </td>

                                                        </tr>
<!--                                                        <tr>
                                                            <td colspan="5">FINACIAL LIMIT CATEGORIZATION </td>

                                                            <td ><input type="text" name="" class="form-control"></td>
                                                            <td><input type="text" name="" class="form-control"></td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="5">0.5 times the average turnover of last 3 years </td>

                                                            <td ><input type="text" name="" class="form-control"></td>
                                                            <td><input type="text" name="" class="form-control"></td>

                                                        </tr>-->
                                                        <tr>
                                                            <th colspan="7">
                                                                FINACIAL LIMIT CATEGORIZATION
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="7">
                                                                <?php
                                                                if ($mFinLimit * 0.5 < 10) {
                                                                    echo "Very Small";
                                                                } else if ($mFinLimit * 0.5 > 10 && $mFinLimit * 0.5 < 50) {
                                                                    echo"Small";
                                                                } else if ($mFinLimit * 0.5 > 50 && $mFinLimit * 0.5 < 100) {
                                                                    echo "Medium";
                                                                } else if ($mFinLimit * 0.5 > 100 && $mFinLimit * 0.5 < 150) {
                                                                    echo "Large";
                                                                } else if ($mFinLimit * 0.5 > 150) {
                                                                    echo "Very Large";
                                                                }
                                                                ?>

                                                                <input  hidden="" readonly="" value="<?php echo $mFinLimit; ?>" type="number" name="pqv_fin_limit" id="pqv_fin_limit" class="form-control">
                                                            </th>
                                                        </tr>
                                                    </tbody>   
                                                </table>

                                            </div> 
<!--                                            <div class="box-footer">
                                                <div class="text-right" >
                                                    <button type="submit" class="btn btn-primary subbutton btn-info">Submit</button>
                                                </div> 
                                            </div>-->
                                        </form>
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
            function calculateTotal(val) {
                var first = $('#first_score').val();
                var second = $('#second_score').val();
                var third = $('#third_score').val();
                var fourth = $('#fourth_score').val();
                var fifth = $('#fifth_score').val();
                if (first) {
                    first = first;
                } else {
                    first = "0";
                }
                if (second) {
                    second = second;
                } else {
                    second = "0";
                }
                if (third) {
                    third = third;
                } else {
                    third = "0";
                }
                if (fourth) {
                    fourth = fourth;
                } else {
                    fourth = "0";
                }
                if (fifth) {
                    fifth = fifth;
                } else {
                    fifth = "0";
                }
                var total = parseFloat(first) + parseFloat(second) + parseFloat(third) + parseFloat(fourth) + parseFloat(fifth);
                $('#pqv_total').val(total);
            }
        </script>

    </body>
</html>