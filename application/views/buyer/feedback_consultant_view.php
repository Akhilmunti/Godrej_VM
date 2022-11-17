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
                                        Feedback : Consultant
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <form method="POST" action="<?php echo base_url('buyer/vendor/actionSaveFeedbackForm/3/' . $record['feedback_id']); ?>" enctype="multipart/form-data">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="2">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <image class="img-fluid" src="<?php echo base_url('assets/images/godrej-logo-feedback.png'); ?>" />
                                                                    </div>
                                                                    <div class="col-md-10 text-center">
                                                                        <h4 class="pt-3">
                                                                            <b>
                                                                                ASSESSMENT  SHEET FOR CONTRACTOR PERFORMANCE EVALUATION
                                                                            </b>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Consultant
                                                            </td>
                                                            <td>
                                                                <input disabled="" readonly="" required="" value="<?php echo $mRecord['ff_vendor']; ?>" type="text" name="ff_vendor" class="form-control" />
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                Date
                                                            </td>
                                                            <td>
                                                                <input value="<?php echo $mRecord['ff_date']; ?>" disabled="" required="" value="" required="" type="date" name="ff_date" class="form-control">
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                Project
                                                            </td>
                                                            <td>
                                                                <input disabled="" readonly="" value="<?php echo $mRecord['ff_project']; ?>" required="" type="text" name="ff_project" class="form-control">
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                Category
                                                            </td>
                                                            <td>
                                                                <input value="<?php echo $mRecord['ff_category']; ?>" disabled="" required="" value="" required="" type="text" name="ff_category" class="form-control">
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                Assignment Period
                                                            </td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </div>
                                                                    <input value="<?php echo $mRecord['ff_time_period']; ?>" disabled="" required="" type="text" class="form-control pull-right" name="ff_time_period" id="reservation">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>   
                                                </table>
                                            </div>
                                            <br/> 
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                                    <thead>
                                                        <tr>
                                                            <th>S.N.</th>
                                                            <th>CRITERIA</th>
                                                            <th>Marks Range</th>
                                                            <th>Remarks / Justification</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <td>
                                                                1
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <b>
                                                                        Mobilisation (Max. Marks - 10)
                                                                    </b>
                                                                </label>
                                                                <select disabled="" name="ff_one" id="ff_one" required="" class="form-control">
                                                                    <option disabled="" selected="" value="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_one'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">
                                                                        Mobilising /mobilised on schedule or with little delay without affecting the work     
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_one'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">
                                                                        Mobilising /mobilised with delay and affecting the work but in acceptable limit           
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_one'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">
                                                                        Delay in mobilisation beyond acceptable limit        
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="ff_one_marks_label">Enter Score</label>
                                                                <input disabled="" onchange="calculateTotal(this.value)" required="" type="number" class="form-control" value="<?php echo $mRecord['ff_one_marks']; ?>" name="ff_one_marks" id="ff_one_marks" />
                                                            </td>
                                                            <td>
                                                                <textarea disabled="" class="form-control" rows="4" name="ff_one_remarks"><?php echo $mRecord['ff_one_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                2
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <b>
                                                                        Progress (Max. Marks - 30)
                                                                    </b>
                                                                </label>
                                                                <select disabled="" name="ff_two" id="ff_two" required="" class="form-control">
                                                                    <option disabled="" selected="" value="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_two'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">
                                                                        Completes or exceeds planned quantities      
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_two'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">
                                                                        Could not achieve progress for reasons not attributed to contractors                             
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_two'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">
                                                                        Falls short of the schedule but within acceptable limit or tries to complete the backlog                                
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_two'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="4">
                                                                        Does not meet the scheduled quantities and creates more backlog                                                                  
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="ff_two_marks_label">Enter Score</label>
                                                                <input disabled="" onchange="calculateTotal(this.value)" value="<?php echo $mRecord['ff_two_marks']; ?>" required="" type="number" class="form-control" name="ff_two_marks" id="ff_two_marks" />
                                                            </td>
                                                            <td>
                                                                <textarea disabled="" class="form-control" rows="4" name="ff_two_remarks"><?php echo $mRecord['ff_two_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                3
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <b>
                                                                        Quality Of Work (Max. Marks - 30)
                                                                    </b>
                                                                </label>
                                                                <select disabled="" name="ff_three" id="ff_three" required="" class="form-control">
                                                                    <option disabled="" selected="" value="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_three'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">
                                                                        Works with no/or very little reworks/no non-conformities or very minor     
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_three'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">
                                                                        Works with little rework/minor non-conformities                              
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_three'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">
                                                                        Works with more rework/more non-conformities                                  
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_three'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="4">
                                                                        Quality of Works very poor and beyond acceptable limits                                                                  
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="ff_three_marks_label">Enter Score</label>
                                                                <input disabled="" onchange="calculateTotal(this.value)" value="<?php echo $mRecord['ff_three_marks']; ?>" required="" type="number" class="form-control" name="ff_three_marks" id="ff_three_marks" />
                                                            </td>
                                                            <td>
                                                                <textarea disabled="" class="form-control" rows="4" name="ff_three_remarks"><?php echo $mRecord['ff_three_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                4
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <b>
                                                                        Health & Safety Environment (HSE) Compliance (Max. Marks - 10) 
                                                                    </b>
                                                                </label>
                                                                <select disabled="" name="ff_four" id="ff_four" required="" class="form-control">
                                                                    <option disabled="" selected="" value="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_four'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">
                                                                        Compliance to safety/Environment regulations which are laid down                                                                 
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_four'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">
                                                                        Partially complying to HSE regulations/attempting best efforts                                                                
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_four'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">
                                                                        Complying to bare minimum requirements only                                                                
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_four'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="4">
                                                                        Complete absence of HSE compliance/bare minimum requirements
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="ff_four_marks_label">Enter Score</label>
                                                                <input disabled="" onchange="calculateTotal(this.value)" value="<?php echo $mRecord['ff_four_marks']; ?>" required="" type="number" class="form-control" name="ff_four_marks" id="ff_four_marks" />
                                                            </td>
                                                            <td>
                                                                <textarea disabled="" class="form-control" rows="4" name="ff_four_remarks"><?php echo $mRecord['ff_four_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                5
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <b>
                                                                        Engineering /Document control (Max. Marks - 05)
                                                                    </b>
                                                                </label>
                                                                <select disabled="" name="ff_five" id="ff_five" required="" class="form-control">
                                                                    <option disabled="" selected="" value="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_five'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">
                                                                        Good
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_five'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">
                                                                        Satisfactory
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_five'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">
                                                                        Below Average
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="ff_five_marks_label">Enter Score</label>
                                                                <input disabled="" onchange="calculateTotal(this.value)" value="<?php echo $mRecord['ff_five_marks']; ?>" required="" type="number" class="form-control" name="ff_five_marks" id="ff_five_marks" />
                                                            </td>
                                                            <td>
                                                                <textarea disabled="" class="form-control" rows="4" name="ff_five_remarks"><?php echo $mRecord['ff_five_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                6
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <b>
                                                                        Statutory Compliance (Max. Marks - 05)
                                                                    </b>
                                                                </label>
                                                                <select disabled="" name="ff_six" id="ff_six" required="" class="form-control">
                                                                    <option disabled="" selected="" value="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_six'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">
                                                                        Compliance to full
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_six'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">
                                                                        Satisfactory Compliance
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_six'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">
                                                                        Below Average
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="ff_six_marks_label">Enter Score</label>
                                                                <input disabled="" onchange="calculateTotal(this.value)" value="<?php echo $mRecord['ff_six_marks']; ?>" required="" type="number" class="form-control" name="ff_six_marks" id="ff_six_marks" />
                                                            </td>
                                                            <td>
                                                                <textarea disabled="" class="form-control" rows="4" name="ff_six_remarks"><?php echo $mRecord['ff_six_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                7
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <b>
                                                                        Claims (Max. Marks - 05)
                                                                    </b>
                                                                </label>
                                                                <select disabled="" name="ff_seven" id="ff_seven" required="" class="form-control">
                                                                    <option disabled="" selected="" value="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_seven'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">
                                                                        No claims 
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_seven'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">
                                                                        Has claimed what is justified and not foreseen earlier
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_seven'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">
                                                                        Lodges unnecessary claims and unjustified bills
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="ff_seven_marks_label">Enter Score</label>
                                                                <input disabled="" onchange="calculateTotal(this.value)" value="<?php echo $mRecord['ff_seven_marks']; ?>" required="" type="number" class="form-control" name="ff_seven_marks" id="ff_seven_marks" />
                                                            </td>
                                                            <td>
                                                                <textarea disabled="" class="form-control" rows="4" name="ff_seven_remarks"><?php echo $mRecord['ff_seven_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                8
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <b>
                                                                        General Behaviour/Co-operation with Project Team (Max. Marks - 05)
                                                                    </b>
                                                                </label>
                                                                <select disabled="" name="ff_eight" id="ff_eight" required="" class="form-control">
                                                                    <option disabled="" selected="" value="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_eight'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">
                                                                        Good  
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_eight'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">
                                                                        Satisfactory  
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_eight'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">
                                                                        Below Average
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="ff_eight_marks_label">Enter Score</label>
                                                                <input disabled="" onchange="calculateTotal(this.value)" value="<?php echo $mRecord['ff_eight_marks']; ?>" required="" type="number" class="form-control" name="ff_eight_marks" id="ff_eight_marks" />
                                                            </td>
                                                            <td>
                                                                <textarea disabled="" class="form-control" rows="4" name="ff_eight_remarks"><?php echo $mRecord['ff_eight_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="3" class="text-right">
                                                                <b>
                                                                    Overall Marks Awarded out of Max. Marks - 100
                                                                </b>
                                                            </td>
                                                            <td colspan="2">
                                                                <input disabled="" readonly="" required="" type="number" class="form-control" name="ff_final_score" id="ff_final_score" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5">
                                                                <b>
                                                                    Remarks : 
                                                                </b>
                                                                <textarea disabled="" class="form-control" name="ff_remarks" id="ff_remarks"><?php echo $mRecord['ff_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
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
            //First
            $('#ff_one').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#ff_one_marks").attr({
                        "max": 10,
                        "min": 8
                    });
                    $('#ff_one_marks_label').html("Between 8-10");
                } else if (selected == "2") {
                    $("#ff_one_marks").attr({
                        "max": 7,
                        "min": 6
                    });
                    $('#ff_one_marks_label').html("Between 6-7");
                } else if (selected == "3") {
                    $("#ff_one_marks").attr({
                        "max": 5,
                        "min": 1
                    });
                    $('#ff_one_marks_label').html("Between 1-5");
                }
            });

            //Second
            $('#ff_two').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#ff_two_marks").attr({
                        "max": 30,
                        "min": 21
                    });
                    $('#ff_two_marks_label').html("Between 21-30");
                } else if (selected == "2") {
                    $("#ff_two_marks").attr({
                        "max": 20,
                        "min": 15
                    });
                    $('#ff_two_marks_label').html("Between 15-20");
                } else if (selected == "3") {
                    $("#ff_two_marks").attr({
                        "max": 14,
                        "min": 6
                    });
                    $('#ff_two_marks_label').html("Between 6-14");
                } else if (selected == "4") {
                    $("#ff_two_marks").attr({
                        "max": 5,
                        "min": 1
                    });
                    $('#ff_two_marks_label').html("Between 1-5");
                }
            });

            //Three
            $('#ff_three').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#ff_three_marks").attr({
                        "max": 30,
                        "min": 21
                    });
                    $('#ff_three_marks_label').html("Between 21-30");
                } else if (selected == "2") {
                    $("#ff_three_marks").attr({
                        "max": 20,
                        "min": 15
                    });
                    $('#ff_three_marks_label').html("Between 15-20");
                } else if (selected == "3") {
                    $("#ff_three_marks").attr({
                        "max": 14,
                        "min": 6
                    });
                    $('#ff_three_marks_label').html("Between 6-14");
                } else if (selected == "4") {
                    $("#ff_three_marks").attr({
                        "max": 5,
                        "min": 0
                    });
                    $('#ff_three_marks_label').html("Between 0-5");
                }
            });

            //Four
            $('#ff_four').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#ff_four_marks").attr({
                        "max": 10,
                        "min": 8,
                    });
                    $('#ff_four_marks_label').html("Between 8-10");
                } else if (selected == "2") {
                    $("#ff_four_marks").attr({
                        "max": 7,
                        "min": 5,
                    });
                    $('#ff_four_marks_label').html("Between 5-7");
                } else if (selected == "3") {
                    $("#ff_four_marks").attr({
                        "max": 5,
                        "min": 1
                    });
                    $('#ff_four_marks_label').html("Between 1-5");
                } else if (selected == "4") {
                    $("#ff_four_marks").attr({
                        "max": 5,
                        "min": 0
                    });
                    $('#ff_four_marks_label').html("Between 0-5");
                }
            });

            //Five
            $('#ff_five').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#ff_five_marks").attr({
                        "max": 5,
                        "min": 5,
                    });
                    $('#ff_five_marks_label').html("Enter Score");
                } else if (selected == "2") {
                    $("#ff_five_marks").attr({
                        "max": 4,
                        "min": 2,
                    });
                    $('#ff_five_marks_label').html("Between 2-4");
                } else if (selected == "3") {
                    $("#ff_five_marks").attr({
                        "max": 2,
                        "min": 1,
                    });
                    $('#ff_five_marks_label').html("Between 1-2");
                }
            });

            //Six
            $('#ff_six').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#ff_six_marks").attr({
                        "max": 5,
                        "min": 5,
                    });
                    $('#ff_six_marks_label').html("Enter Score");
                } else if (selected == "2") {
                    $("#ff_six_marks").attr({
                        "max": 4,
                        "min": 2,
                    });
                    $('#ff_six_marks_label').html("Between 2-4");
                } else if (selected == "3") {
                    $("#ff_six_marks").attr({
                        "max": 2,
                        "min": 1,
                    });
                    $('#ff_six_marks_label').html("Between 1-2");
                }
            });

            //Seven
            $('#ff_seven').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#ff_seven_marks").attr({
                        "max": 5,
                        "min": 5,
                    });
                    $('#ff_seven_marks_label').html("Enter Score");
                } else if (selected == "2") {
                    $("#ff_seven_marks").attr({
                        "max": 4,
                        "min": 1,
                    });
                    $('#ff_seven_marks_label').html("Between 1-4");
                } else if (selected == "3") {
                    $("#ff_seven_marks").attr({
                        "max": 0,
                        "min": 0
                    });
                    $('#ff_seven_marks_label').html("Enter Score");
                }
            });

            //Eight
            $('#ff_eight').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#ff_eight_marks").attr({
                        "max": 5,
                        "min": 5,
                    });
                    $('#ff_eight_marks_label').html("Enter Score");
                } else if (selected == "2") {
                    $("#ff_eight_marks").attr({
                        "max": 4,
                        "min": 2,
                    });
                    $('#ff_eight_marks_label').html("Between 2-4");
                } else if (selected == "3") {
                    $("#ff_eight_marks").attr({
                        "max": 2,
                        "min": 0
                    });
                    $('#ff_eight_marks_label').html("Between 0-2");
                }
            });

            function calculateTotal(val) {
                var first = $('#ff_one_marks').val();
                var second = $('#ff_two_marks').val();
                var third = $('#ff_three_marks').val();
                var fourth = $('#ff_four_marks').val();
                var fifth = $('#ff_five_marks').val();
                var sixth = $('#ff_six_marks').val();
                var seven = $('#ff_seven_marks').val();
                var eight = $('#ff_eight_marks').val();
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
                if (seven) {
                    seven = seven;
                } else {
                    seven = "0";
                }
                if (eight) {
                    eight = eight;
                } else {
                    eight = "0";
                }
                var total = parseInt(first) + parseInt(second) + parseInt(third) + parseInt(fourth) + parseInt(fifth) + parseInt(sixth) + parseInt(seven) + parseInt(eight);
                $('#ff_final_score').val(total);
            }
        </script>

    </body>
</html>