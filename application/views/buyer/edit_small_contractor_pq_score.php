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
                                    <h3 class="page-title br-0">PQ Score : <?php echo $mVendorData['company_name']; ?> </h3>
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
                                                                ASSESMENT SHEET FOR PQ OF CONTARCTORS
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td> S.N. </td>
                                                            <td>CRITERIA</td>
                                                            <td>WEIGHTAGE</td>
                                                            <td>SCORING GUIDE</td>
                                                            <td>System Generated PQ Score </td>
                                                            <td>Manual PQ Score Edited by CM</td>
                                                            <td>Reasons for Corrections in Score</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">1</td>
                                                            <td rowspan="3">Experience in years of similar works  executed.</td> 
                                                            <td rowspan="3">30</td>
                                                            <td style="<?php
                                                            if ($mFirstScore > 20 && $mFirstScore <= 30) {
                                                                echo 'background-color: #efefef;';
                                                            }
                                                            ?>">Above 3 years : 30</td>

                                                            <td rowspan="3">
                                                                <input name="pqc_first_score_sg" value="<?php echo $mFirstScore; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <input readonly="" value="<?php echo $mRecord['pqc_first_score']; ?>" name="pqc_first_score" type="number" id="first_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <textarea readonly="" required="" class="form-control" rows="10" name="pqc_first_remarks"><?php echo $mRecord['pqc_first_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mFirstScore > 10 && $mFirstScore <= 20) {
                                                                echo 'background-color: #efefef;';
                                                            }
                                                            ?>">Above 3 years : 20</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mFirstScore >= 0 && $mFirstScore <= 10) {
                                                                echo 'background-color: #efefef;';
                                                            }
                                                            ?>">Less than 1 year : 10</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">2</td>
                                                            <td rowspan="3"> Association with other reputed clients to be confirmed using Work order copies/ Completion certificate as documetary evidance.</td> 
                                                            <td rowspan="3">20</td>
                                                            <td style="<?php
                                                            if ($mSecondScore > 12 && $mSecondScore <= 20) {
                                                                echo 'background-color: #efefef;';
                                                            }
                                                            ?>">More than 3 clients : 20</td>
                                                            <td rowspan="3">
                                                                <input name="pqc_second_score_sg" value="<?php echo $mSecondScore; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <input readonly="" value="<?php echo $mRecord['pqc_first_score']; ?>" name="pqc_first_score" type="number" id="second_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <textarea readonly="" required="" class="form-control" rows="10" name="pqc_second_remarks"><?php echo $mRecord['pqc_second_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mSecondScore > 8 && $mSecondScore <= 12) {
                                                                echo 'background-color: #efefef;';
                                                            }
                                                            ?>">1-3 clients : 12</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mSecondScore >= 0 && $mSecondScore <= 7) {
                                                                echo 'background-color: #efefef;';
                                                            }
                                                            ?>">1 client : 7</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">3</td>
                                                            <td rowspan="3"> Turnover for previous Financial Year (Income tax return/ Bank acount statements as documentray evidance)</td> 
                                                            <td rowspan="3">10</td>
                                                            <td style="<?php
                                                            if ($mThirdScore > 6 && $mThirdScore <= 10) {
                                                                echo 'background-color: #efefef;';
                                                            }
                                                            ?>">Turnover greater than 25 lac less than 50 lac : 10</td>
                                                            <td rowspan="3">
                                                                <input name="pqc_third_score_sg" value="<?php echo $mThirdScore; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <input readonly="" value="<?php echo $mRecord['pqc_third_score']; ?>" name="pqc_third_score" type="number" id="third_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <textarea readonly="" required="" class="form-control" rows="10" name="pqc_third_remarks"><?php echo $mRecord['pqc_third_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mThirdScore > 3 && $mThirdScore <= 6) {
                                                                echo 'background-color: #efefef;';
                                                            }
                                                            ?>">Turnover greater than 10 lac less than 25 lac : 6</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mThirdScore >= 0 && $mThirdScore <= 3) {
                                                                echo 'background-color: #efefef;';
                                                            }
                                                            ?>">Turnover  less than 10 lac : 3</td>
                                                        </tr>

                                                        <tr>
                                                            <td rowspan="3">4</td>
                                                            <td rowspan="3"> Capability Factors (Manpower and resources) (Verification of PF challans paid for, Wage register maintained)</td> 
                                                            <td rowspan="3">20</td>
                                                            <td style="<?php
                                                            if ($mFourthScore > 12 && $mFourthScore <= 20) {
                                                                echo 'background-color: #efefef;';
                                                            }
                                                            ?>">More than 10 no. of permanent staff on payroll : 20</td>
                                                            <td rowspan="3">
                                                                <input name="pqc_fourth_score_sg" value="<?php echo $mFourthScore; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <input readonly="" value="<?php echo $mRecord['pqc_fourth_score']; ?>" name="pqc_fourth_score" type="number" id="fourth_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <textarea readonly="" required="" class="form-control" rows="10" name="pqc_fourth_remarks"><?php echo $mRecord['pqc_fourth_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mFourthScore > 6 && $mFourthScore <= 12) {
                                                                echo 'background-color: #efefef;';
                                                            }
                                                            ?>">More than 10 no. of permanent staff on payroll : 12</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mFourthScore > 0 && $mFourthScore <= 6) {
                                                                echo 'background-color: #efefef;';
                                                            }
                                                            ?>">More than 10 no. of permanent staff on payroll  : 6</td>
                                                        </tr>

                                                        <tr>
                                                            <td rowspan="5">5</td>
                                                            <td rowspan="5"> 
                                                                Telephonic feed back from existing client's represetatives. Referal check for track mRecord at existing / completed projects. 
                                                                <br>
                                                                <i>Note: All the responses shall be kept on mRecord by means of Email.</i>
                                                            </td> 
                                                            <td rowspan="5">20</td>
                                                            <td>Excellent : 20</td>
                                                            <td rowspan="5">

                                                            </td>
                                                            <td rowspan="5">
                                                                <input readonly="" value="<?php echo $mRecord['pqc_fifth_score']; ?>" name="pqc_fifth_score" type="number" id="fifth_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="5">
                                                                <textarea readonly="" required="" class="form-control" rows="10" name="pqc_fifth_remarks"><?php echo $mRecord['pqc_fifth_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Very satisfactory : 12</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Average  : 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Poor : 0</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Very Poor : 0</td>
                                                        </tr>
                                                        <tr>
                                                            <td> </td>
                                                            <td>TOTAL</td>
                                                            <td >100</td>
                                                            <td colspan="2">MINIMUM QUALIFYING SCORE - 50
                                                            </td> 
                                                            <td colspan="2">
                                                                <input disabled="" value="<?php echo $mRecord['pqc_total']; ?>" readonly="" type="number" name="pqc_total" id="pqc_total" class="form-control">
                                                            </td>

                                                        </tr>
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

            $("#first_score").on("change paste keyup", function () {
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
                $('#pqc_total').val(total);
            });
            
            $("#second_score").on("change paste keyup", function () {
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
                $('#pqc_total').val(total);
            });
            
            $("#third_score").on("change paste keyup", function () {
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
                $('#pqc_total').val(total);
            });
            
            $("#fourth_score").on("change paste keyup", function () {
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
                $('#pqc_total').val(total);
            });
            
            $("#fifth_score").on("change paste keyup", function () {
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
                $('#pqc_total').val(total);
            });
        </script>

    </body>
</html>