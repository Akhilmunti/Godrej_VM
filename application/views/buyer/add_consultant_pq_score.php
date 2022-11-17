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
                                        <form action="#" method="POST">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="7" style="text-align:center" >
                                                                ASSESSMENT SHEET FOR PRE-QUALIFCATION OF CONSULTANTS
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
                                                            <td rowspan="3">EXPERIENCE RELATED TO SIMILAR TYPE OF WORK</td> 
                                                            <td rowspan="3">10</td>
                                                            <td>More than 10 completed jobs in last 5 years : 10</td>
                                                            <td rowspan="3">
                                                                <input name="pqc_first_score_sg" value="<?php echo $mFirstScore; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <input onchange="calculateTotal(this.value)" name="pqc_first_score" type="number" id="first_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <textarea class="form-control" rows="10" name="pqc_first_remarks"><?php echo $mRecord['pqc_first_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>More than 10 completed jobs in last 5 years : 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Less than 5 completed jobs in last 5 years : 3</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">2</td>
                                                            <td rowspan="3"> AVAILIBILITY OF SKILLED MANPOWER</td> 
                                                            <td rowspan="3">10</td>
                                                            <td>Average professional employee count over last 3 years > 50 : 10</td>
                                                            <td rowspan="3">
                                                                <input name="pqc_second_score_sg" value="<?php echo $mSecondScore; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <input onchange="calculateTotal(this.value)" name="pqc_second_score" type="number" id="second_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <textarea class="form-control" rows="10" name="pqc_second_remarks"><?php echo $mRecord['pqc_second_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Average professional employee count over last 3 years between  20-50 : 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Average professional employee count over last 3 years < 20 : 3</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">3</td>
                                                            <td rowspan="3"> ATTRITION RATE OF EMPLOYEES</td> 
                                                            <td rowspan="3">10</td>
                                                            <td>Average < 10% over last 3 years : 10</td>
                                                            <td rowspan="3">
                                                                <input name="pqc_third_score_sg" value="<?php echo $mThirdScore; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <input onchange="calculateTotal(this.value)" name="pqc_third_score" type="number" id="third_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <textarea class="form-control" rows="10" name="pqc_third_remarks"><?php echo $mRecord['pqc_third_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Average > 10% : < 20% over last 3 years : 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Average > 10% : < 20% over last 3 years : 3</td>
                                                        </tr>

                                                        <tr>
                                                            <td rowspan="3">4</td>
                                                            <td rowspan="3"> COMMENDATION CERTIFICATES FROM CUSTOMERS WITH CONTACT DETAILS</td> 
                                                            <td rowspan="3">10</td>
                                                            <td>More than 5 in last 5 years : 10</td>
                                                            <td rowspan="3">
                                                                <input name="pqc_fourth_score_sg" value="<?php echo $mFourthScore; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <input onchange="calculateTotal(this.value)" name="pqc_fourth_score" type="number" id="fourth_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <textarea class="form-control" rows="10" name="pqc_fourth_remarks"><?php echo $mRecord['pqc_fourth_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Between 2 & 5 in the last 5 years : 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Between 2 & 5 in the last 5 years  : 3</td>
                                                        </tr>

                                                        <tr>
                                                            <td rowspan="3">5</td>
                                                            <td rowspan="3"> PROFEESIONAL INDEMNITY INSURANCE </td> 
                                                            <td rowspan="3">10</td>
                                                            <td>> Rs. 10 crore : 10</td>
                                                            <td rowspan="3">
                                                                <input name="pqc_fifth_score_sg" value="<?php echo $mFifthScore; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <input onchange="calculateTotal(this.value)" name="pqc_fifth_score" type="number" id="fifth_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <textarea class="form-control" rows="10" name="pqc_fifth_remarks"><?php echo $mRecord['pqc_fifth_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>> Rs. 5 Crore ; < Rs. 10crores   : 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>< Rs. 5 Crore  : 3</td>
                                                        </tr>

                                                        <tr>
                                                            <td rowspan="3">6</td>
                                                            <td rowspan="3"> RECOGNITION / CERTIFICATION {ISO 9001; ISO 45001, Any safety award, any industry award}</td> 
                                                            <td rowspan="3">10</td>
                                                            <td>> 5 : 10</td>
                                                            <td rowspan="3">
                                                                <input name="pqc_sixth_score_sg" value="<?php echo $mSixthScore; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <input onchange="calculateTotal(this.value)" name="pqc_sixth_score" type="number" id="sixth_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <textarea class="form-control" rows="10" name="pqc_sixth_remarks"><?php echo $mRecord['pqc_sixth_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2 to 5    : 7</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Atleast 1   : 5</td>
                                                        </tr>

                                                        <tr>
                                                            <td> 7</td>
                                                            <td>TECHNICAL CAPABILITY</td>
                                                            <td>40</td>
                                                            <td colspan="4">
                                                                <input readonly="" type="number" name="pqc_total" id="pqc_total" class="form-control">
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td> </td>
                                                            <td>TOTAL</td>
                                                            <td >100</td>
                                                            <td colspan="2">MINIMUM QUALIFYING SCORE - 50
                                                            </td> 
                                                            <td colspan="2">
                                                                <input readonly="" type="number" name="pqc_total" id="pqc_total" class="form-control">
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
                                                                <input  hidden="" readonly="" value="<?php echo $mFinLimit; ?>" type="number" name="pqc_fin_limit" id="pqc_fin_limit" class="form-control">
                                                            </th>
                                                        </tr>
                                                    </tbody>   
                                                </table>

                                            </div> 
                                            <div class="box-footer">
                                                <div class="text-right" >
                                                    <button type="submit" class="btn btn-primary subbutton btn-info">Submit</button>
                                                </div> 
                                            </div>
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
                var sixth = $('#sixth_score').val();
                var seventh = $('#seventh_score').val();
                var eighth = $('#eighth_score').val();
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
                if (sixth) {
                    sixth = sixth;
                } else {
                    sixth = "0";
                }
                if (seventh) {
                    seventh = seventh;
                } else {
                    seventh = "0";
                }
                if (eighth) {
                    eighth = eighth;
                } else {
                    eighth = "0";
                }
                var total = parseFloat(first) + parseFloat(second) + parseFloat(third) + parseFloat(fourth) + parseFloat(fifth) + parseFloat(sixth) + parseFloat(seventh) + parseFloat(eighth);
                $('#pqc_total').val(total);
            }
        </script>

    </body>
</html>