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
                                    <h3 class="page-title br-0">PQ Score : <?php echo $mVendorData['company_name'] . " | " . $mTowData['name']; ?> </h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <form action="<?php echo base_url('buyer/vendor/savePqc/' . $mVendorData['id']); ?>" method="POST">
                                            <div class="table-responsive">
                                                <input readonly="" required="" hidden="" value="<?php echo $mTowData['id']; ?>" name="pqc_tow_id" />
                                                <table class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="7" style="text-align:center" >
                                                                ASSESMENT SHEET FOR PRE-QUALIFCATION OF CONTARCTORS
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
                                                            <td>Reasons for Corrections in Score</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">1</td>
                                                            <td rowspan="3">EXPERINCE OF SIMILAR WORK</td> 
                                                            <td rowspan="3">10</td>
                                                            <td style="<?php
                                                            if ($mFirstScore > 5 && $mFirstScore <= 10) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">More than 10 completed works in last 5 years : 10</td>

                                                            <td rowspan="3">
                                                                <input name="pqc_first_score_sg" value="<?php echo $mFirstScore; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <input max="10" onchange="calculateTotal(this.value)" name="pqc_first_score" type="number" id="first_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <textarea required="" class="form-control" rows="10" name="pqc_first_remarks"><?php echo $mRecord['pqc_first_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mFirstScore > 3 && $mFirstScore <= 5) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">More than 10 completed works in last 5 years : 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mFirstScore >= 0 && $mFirstScore <= 3) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">Less than 5 completed works in last 5 years : 3</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">2</td>
                                                            <td rowspan="3"> PRE-QUALIFICATION/EXISTING ASSOCIATION WITH OTHER CLIENTS</td> 
                                                            <td rowspan="3">10</td>
                                                            <td style="<?php
                                                            if ($mSecondScore > 6 && $mSecondScore <= 10) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">Registered with or having work order from 4  and more reputed developers : 10</td>
                                                            <td rowspan="3">
                                                                <input name="pqc_second_score_sg" value="<?php echo $mSecondScore; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <input max="10 onchange="calculateTotal(this.value)" name="pqc_second_score" type="number" id="second_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <textarea required="" class="form-control" rows="10" name="pqc_second_remarks"><?php echo $mRecord['pqc_second_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mSecondScore > 3 && $mSecondScore <= 6) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">Registered with or having work order from 2 and more reputed developers : 6</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mSecondScore >= 0 && $mSecondScore <= 3) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">Registered with or having work order from only 1 reputed developers : 3</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">3</td>
                                                            <td rowspan="3"> COMMENDATION /TIMELY COMPLETION CERTIFICATES FROM CUSTOMERS WITH CONTACT DETAILS IN THE LAST 5 YEARS</td> 
                                                            <td rowspan="3">10</td>
                                                            <td style="<?php
                                                            if ($mThirdScore > 6 && $mThirdScore <= 10) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">10 : 10</td>
                                                            <td rowspan="3">
                                                                <input name="pqc_third_score_sg" value="<?php echo $mThirdScore; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <input max="10 onchange="calculateTotal(this.value)" name="pqc_third_score" type="number" id="third_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <textarea required="" class="form-control" rows="10" name="pqc_third_remarks"><?php echo $mRecord['pqc_third_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mThirdScore > 3 && $mThirdScore <= 6) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">3 to  6 : 6</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mThirdScore >= 0 && $mThirdScore <= 3) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">1 to 2 : 3</td>
                                                        </tr>

                                                        <tr>
                                                            <td rowspan="4">4</td>
                                                            <td rowspan="4"> Working Capital - Current ratio</td> 
                                                            <td rowspan="4">10</td>
                                                            <td style="<?php
                                                            if ($mFourthScore > 7 && $mFourthScore <= 10) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">> 1.5 : 10</td>
                                                            <td rowspan="4">
                                                                <input name="pqc_fourth_score_sg" value="<?php echo $mFourthScore; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="4">
                                                                <input max="10 onchange="calculateTotal(this.value)" name="pqc_fourth_score" type="number" id="fourth_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="4">
                                                                <textarea required="" class="form-control" rows="10" name="pqc_fourth_remarks"><?php echo $mRecord['pqc_fourth_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mFourthScore > 5 && $mFourthScore <= 7) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">1.5 to 1.15 : 7</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mFourthScore > 0 && $mFourthScore <= 5) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">1.14 to 1  : 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mFourthScore == 0) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">< 1  : 0</td>
                                                        </tr>

                                                        <tr>
                                                            <td rowspan="4">5</td>
                                                            <td rowspan="4"> Profit Ratio (Current year Vs. Last 3 years average profit)</td> 
                                                            <td rowspan="4">10</td>
                                                            <td style="<?php
                                                            if ($mFifthScore > 5 && $mFifthScore <= 10) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">> 1.25 : 10</td>
                                                            <td rowspan="4">
                                                                <input name="pqc_fifth_score_sg" value="<?php echo $mFifthScore; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="4">
                                                                <input max="10 onchange="calculateTotal(this.value)" name="pqc_fifth_score" type="number" id="fifth_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="4">
                                                                <textarea required="" class="form-control" rows="10" name="pqc_fifth_remarks"><?php echo $mRecord['pqc_fifth_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mFifthScore > 3 && $mFifthScore <= 5) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>"><1.25 > 1.15   : 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mFifthScore > 0 && $mFifthScore <= 3) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">< 1.15 > 1  : 3</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mFifthScore == 0) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">< 1 : 0</td>
                                                        </tr>

                                                        <tr>
                                                            <td rowspan="4">6</td>
                                                            <td rowspan="4"> Growth (Turn over of Current year over Average turn over of last 3 years)</td> 
                                                            <td rowspan="4">10</td>
                                                            <td style="<?php
                                                            if ($mSeventhScore > 7 && $mSeventhScore <= 10) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">> 1.20 : 10</td>
                                                            <td rowspan="4">
                                                                <input name="pqc_sixth_score_sg" value="<?php echo $mSixthScore; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="4">
                                                                <input max="10 onchange="calculateTotal(this.value)" name="pqc_sixth_score" type="number" id="sixth_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="4">
                                                                <textarea required="" class="form-control" rows="10" name="pqc_sixth_remarks"><?php echo $mRecord['pqc_sixth_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mSeventhScore > 5 && $mSeventhScore <= 7) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">1.2 to 1.05    : 7</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mSeventhScore > 0 && $mSeventhScore <= 5) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">< 1.05 > 1   : 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mSeventhScore == 0) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">< 1 : 0</td>
                                                        </tr>

                                                        <tr>
                                                            <td rowspan="2">7</td>
                                                            <td rowspan="2">QUALITY & SAFETY MANAGEMENT SYSTEM </td> 
                                                            <td rowspan="2">10</td>
                                                            <td>BOTH ISO: 9001 CERTIFIED & 45001 CERTIFIED : 10</td>
                                                            <td rowspan="2" colspan="3">
                                                                <input name="pqc_seventh_score_sg" value="<?php echo $mSeventhScore; ?>" readonly="" id="seventh_score" type="number" class="form-control" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>EITHER ISO 9001 OR 45001 CERTIFIED : 5</td>
                                                        </tr>

                                                        <tr>
                                                            <td rowspan="2">8</td>
                                                            <td rowspan="2">SITE VISIT REPORT (with GO-NOGO recommendation)</td> 
                                                            <td rowspan="1">10</td>
                                                            <td>Quality and safety performance as seen at site</td>
                                                            <td rowspan="2" colspan="3">
                                                                <input name="pqc_eighth_score_sg" value="<?php echo $mEighthScore; ?>" readonly="" id="eighth_score" type="number" class="form-control" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="1">30</td>
                                                            <td>Resource mobilization, quality of manpower, documentation, progress, invoicing, client feedback, subcontractor feedback etc.</td>
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


                                                                <?php if (empty($mStageTwo)) { ?>

                                                                    <?php
                                                                    //echo $mFinLimit * 0.5;
                                                                    if ($mFinLimit * 0.5 < 5) {
                                                                        echo "Very Small";
                                                                    } else if ($mFinLimit * 0.5 > 5 && $mFinLimit * 0.5 <= 25) {
                                                                        echo"Small";
                                                                    } else if ($mFinLimit * 0.5 > 25 && $mFinLimit * 0.5 <= 50) {
                                                                        echo "Medium";
                                                                    } else if ($mFinLimit * 0.5 > 50 && $mFinLimit * 0.5 <= 100) {
                                                                        echo "Large";
                                                                    } else if ($mFinLimit * 0.5 > 100) {
                                                                        echo "Very Large";
                                                                    }
                                                                    ?>

                                                                <?php } else { ?>

                                                                    <?php
                                                                    $mStageTwoTurn = json_decode($mStageTwo['stc_turnover']);
                                                                    $mStageTwoTurn = ($mStageTwoTurn[0] + $mStageTwoTurn[1] + $mStageTwoTurn[2]) / 3;
                                                                    $mStageTwoTurn = $mStageTwoTurn * 0.5;
                                                                    if ($mStageTwoTurn * 10000000 < 50000000) {
                                                                        echo "Very Small";
                                                                    } else if ($mStageTwoTurn * 10000000 > 50000000 && $mStageTwoTurn * 10000000 <= 250000000) {
                                                                        echo"Small";
                                                                    } else if ($mStageTwoTurn * 10000000 > 250000000 && $mStageTwoTurn * 10000000 <= 500000000) {
                                                                        echo "Medium";
                                                                    } else if ($mStageTwoTurn * 10000000 > 500000000 && $mStageTwoTurn * 10000000 <= 1000000000) {
                                                                        echo "Large";
                                                                    } else if ($mStageTwoTurn * 10000000 > 1000000000) {
                                                                        echo "Very Large";
                                                                    }
                                                                    ?>

                                                                <?php } ?>

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