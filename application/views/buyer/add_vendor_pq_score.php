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
                                    <h3 class="page-title br-0">PQ Score : <?php echo $mVendorData['company_name'] . " | " . $mTowData['name']; ?></h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <form action="<?php echo base_url('buyer/vendor/savePqv/' . $mVendorData['id']); ?>" method="POST">
                                            <div class="table-responsive">
                                                <input readonly="" required="" hidden="" value="<?php echo $mTowData['id']; ?>" name="pqv_tow_id" />
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
                                                            <td>Reasons for Corrections in Score ??? mandatory by CM</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">1</td>
                                                            <td rowspan="3">WHAT TYPE OF BRAND DOES THE VENDOR REPRESENT</td> 
                                                            <td rowspan="3">10</td>
                                                            <td style="<?php
                                                            if ($mFirstScore > 5 && $mFirstScore <= 10) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">Major and well established : 10</td>
                                                            <td rowspan="3">
                                                                <input name="pqv_first_score_sg" value="<?php echo $mFirstScore; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <input required="" max="10" onchange="calculateTotal(this.value)" name="pqv_first_score" type="number" id="first_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <textarea class="form-control" rows="10" name="pqv_brand_remarks"><?php echo $mRecord['pqv_brand_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mFirstScore > 0 && $mFirstScore <= 5) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">Emerging : 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mFirstScore <= 0) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">Not established : 0</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">2</td>
                                                            <td rowspan="3"> REGISTERED WITH GOVERNEMENT DEPARTMENTS / PSUs / MAJOR DEVELOPERS</td> 
                                                            <td rowspan="3">15</td>
                                                            <td style="<?php
                                                            if ($mSecondScore > 10 && $mSecondScore <= 15) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">> 10 : 15</td>
                                                            <td rowspan="3">
                                                                <input name="pqv_second_score_sg" value="<?php echo $mSecondScore; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <input required="" max="15" onchange="calculateTotal(this.value)" name="pqv_second_score" type="number" id="second_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <textarea class="form-control" rows="10" name="pqv_brand_remarks"><?php echo $mRecord['pqv_brand_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mSecondScore > 5 && $mSecondScore <= 10) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">Between 5 & 10 : 10</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mSecondScore > 0 && $mSecondScore <= 5) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">< 5 : 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">3</td>
                                                            <td rowspan="3"> AFTER SALES SERVICE FACILITIES</td> 
                                                            <td rowspan="3">10</td>
                                                            <td style="<?php
                                                            if ($mThirdScore > 5 && $mThirdScore <= 10) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">Service center / authorised dealer within city limits in the region : 10</td>
                                                            <td rowspan="3">
                                                                <input name="pqv_third_score_sg" value="<?php echo $mThirdScore; ?>" readonly="" type="number" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <input required="" max="10" onchange="calculateTotal(this.value)" name="pqv_third_score" type="number" id="third_score" class="form-control" />
                                                            </td>
                                                            <td rowspan="3">
                                                                <textarea class="form-control" rows="10" name="pqv_brand_remarks"><?php echo $mRecord['pqv_brand_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mThirdScore > 0 && $mThirdScore <= 5) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">Service center / authorised dealer beyond city limits in the region : 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="<?php
                                                            if ($mThirdScore <= 0) {
                                                                echo 'background-color: #1976D2;color: #ffffff';
                                                            }
                                                            ?>">No service center in India : 0</td>
                                                        </tr>
                                                        <tr>
                                                            <td> 4 </td>
                                                            <td>QUALITY & SAFETY MANAGEMENT SYSTEM </td>
                                                            <td>15</td>
                                                            <td colspan="4"><input name="pqv_fourth_score" id="fourth_score" readonly="" value="<?php echo $mTotalQuality; ?>" type="number" name="" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td> 5</td>
                                                            <td>ASSESSMENT BASED ON FACTORY VISIT (with GO-NOGO recommendation)</td>
                                                            <td>50</td>
                                                            <td colspan="4">
                                                                <input readonly="" value="<?php echo $mFifthScore; ?>" type="number" id="fifth_score" name="pqv_fifth_score" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> </td>
                                                            <td>TOTAL</td>
                                                            <td >100</td>
                                                            <td colspan="2">MINIMUM QUALIFYING SCORE - 50
                                                            </td> 
                                                            <td colspan="2">
                                                                <input readonly="" type="number" name="pqv_total" id="pqv_total" class="form-control">
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
                                                                    $mStageTwoTurn = json_decode($mStageTwo['stv_turnover']);
                                                                    $mStageTwoTurn = array_sum($mStageTwoTurn) / 4;
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

                                                                <input  hidden="" readonly="" value="<?php echo $mFinLimit; ?>" type="number" name="pqv_fin_limit" id="pqv_fin_limit" class="form-control">
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