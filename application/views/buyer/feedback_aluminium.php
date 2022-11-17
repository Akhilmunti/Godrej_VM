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
                                        Feedback : Alluminium
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
                                        <form id="form" method="POST" action="<?php echo base_url('buyer/vendor/actionSaveFeedbackForm/2/' . $record['feedback_id']); ?>" enctype="multipart/form-data">
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
                                                                Alluminium
                                                            </td>
                                                            <td>
                                                                <input readonly="" required="" value="<?php echo $record['porg_company_name']; ?>" type="text" name="ff_vendor" class="form-control" />
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                Date
                                                            </td>
                                                            <td>
                                                                <input readonly="" required="" value="<?php echo date('Y-m-d'); ?>" required="" type="date" name="ff_date" class="form-control">
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                Project
                                                            </td>
                                                            <td>
                                                                <input readonly="" value="<?php echo $record['porg_project']; ?>" required="" type="text" name="ff_project" class="form-control">
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                Category
                                                            </td>
                                                            <td>
                                                                <select readonly class="form-control" required="" name="ff_category">
                                                                    <option selected="" value="" disabled="">Select Category</option>
                                                                    <?php foreach ($categories as $key => $value) { ?>
                                                                        <?php if ($value->id == "1") { ?>
                                                                            <option selected value='<?php echo $value->id; ?>'><?php echo $value->name; ?></option>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                Assignment Period

                                                                <?php
                                                                $current_quarter = ceil(date('n') / 3);
                                                                $first_date = date('d/m/Y', strtotime(date('Y') . '-' . (($current_quarter * 3) - 2) . '-1'));
                                                                $last_date = date('d/m/Y', strtotime(date('Y') . '-' . (($current_quarter * 3)) . '-1'));
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </div>
                                                                    <input readonly="" value="<?php echo $first_date . " - " . $last_date; ?>" required="" type="text" class="form-control pull-right" name="ff_time_period" id="reservation">
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
                                                                        Delivery of Drawings (Max. Marks - 5)
                                                                    </b>
                                                                </label>
                                                                <select name="ff_one" id="ff_one" required="" class="form-control">
                                                                    <option disabled="" selected="" value="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_one'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">
                                                                        Vendor submitted shop drawing as per contractual timelines & incorporate GPL comments on shop drawings well within time (no delay on approval of shop drawing).                                         
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_one'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">
                                                                        Vendor submitted shop drawing as per contractual timelines & do not incorporate GPL comments on shop drawings in a defined timeline.         
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_one'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">
                                                                        Vendor submitted shop drawing as per contractual timelines                                    
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_one'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="4">
                                                                        Vendor Doesn't submitted shop drawing as per contractual timelines                                    
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="ff_one_marks_label">Enter Score</label>
                                                                <input onchange="calculateTotal(this.value)" required="" type="number" class="form-control" value="<?php echo $mRecord['ff_one_marks']; ?>" name="ff_one_marks" id="ff_one_marks" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="ff_one_remarks"><?php echo $mRecord['ff_one_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                2
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <b>
                                                                        Delievery of Material (Max. Marks - 20)
                                                                    </b>
                                                                </label>
                                                                <select name="ff_two" id="ff_two" required="" class="form-control">
                                                                    <option disabled="" selected="" value="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_two'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">
                                                                        Vendor delivered tower wise material before contractual commitments.                                         
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_two'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">
                                                                        Vendor delivered tower wise material as per contractual commitments.                                                                 
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_two'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">
                                                                        Vendor deliver tower wise material just before the site requirement.                                                                    
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_two'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="4">
                                                                        Vendor doesn't deliver tower wise material as per contractual commitments.                                                                                                      
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="ff_two_marks_label">Enter Score</label>
                                                                <input onchange="calculateTotal(this.value)" value="<?php echo $mRecord['ff_two_marks']; ?>" required="" type="number" class="form-control" name="ff_two_marks" id="ff_two_marks" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="ff_two_remarks"><?php echo $mRecord['ff_two_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                3
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <b>
                                                                        Technical Support (Max. Marks - 5)
                                                                    </b>
                                                                </label>
                                                                <select name="ff_three" id="ff_three" required="" class="form-control">
                                                                    <option disabled="" selected="" value="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_three'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">
                                                                        Vendor deployed technical staff for erection of formwork as per site requirement.     
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_three'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">
                                                                        Vendor deployed technical staff for erection of formwork but numbers were not as per requirement of site                             
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_three'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">
                                                                        Vendor didn't deployed technical staff for erection of formwork                                  
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="ff_three_marks_label">Enter Score</label>
                                                                <input onchange="calculateTotal(this.value)" value="<?php echo $mRecord['ff_three_marks']; ?>" required="" type="number" class="form-control" name="ff_three_marks" id="ff_three_marks" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="ff_three_remarks"><?php echo $mRecord['ff_three_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                4
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <b>
                                                                        Quality of de shuttered area -(Concrete finish/ Level of grinding and repair required) (HSE) Compliance (Max. Marks - 15) 
                                                                    </b>
                                                                </label>
                                                                <select name="ff_four" id="ff_four" required="" class="form-control">
                                                                    <option disabled="" selected="" value="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_four'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">
                                                                        Works with no reworks/no non-conformities or very minor                                                               
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_four'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">
                                                                        Works with little rework/minor non-conformities                                                                  
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_four'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">
                                                                        Works with more rework/more non-conformities                                                                 
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_four'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="4">
                                                                        Quality of Works very poor and beyond acceptable limits
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="ff_four_marks_label">Enter Score</label>
                                                                <input onchange="calculateTotal(this.value)" value="<?php echo $mRecord['ff_four_marks']; ?>" required="" type="number" class="form-control" name="ff_four_marks" id="ff_four_marks" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="ff_four_remarks"><?php echo $mRecord['ff_four_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                5
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <b>
                                                                        Weight of Material (Max. Marks - 10)
                                                                    </b>
                                                                </label>
                                                                <select name="ff_five" id="ff_five" required="" class="form-control">
                                                                    <option disabled="" selected="" value="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_five'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">
                                                                        Average weight of aluform panels are as per greed in the contract
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_five'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">
                                                                        Average weight of aluform panels are less than agreed in the contract
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="ff_five_marks_label">Enter Score</label>
                                                                <input onchange="calculateTotal(this.value)" value="<?php echo $mRecord['ff_five_marks']; ?>" required="" type="number" class="form-control" name="ff_five_marks" id="ff_five_marks" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="ff_five_remarks"><?php echo $mRecord['ff_five_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                6
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <b>
                                                                        Quality of Material (Max. Marks - 30)
                                                                    </b>
                                                                </label>
                                                                <select name="ff_six" id="ff_six" required="" class="form-control">
                                                                    <option disabled="" selected="" value="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_six'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">
                                                                        Joints
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_six'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">
                                                                        Offsets
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_six'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">
                                                                        Elevational Groove feature
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_six'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="4">
                                                                        Recess portion provided for plumbing lines 
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_six'] == "5") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="5">
                                                                        Gaps between two panels 
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_six'] == "6") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="6">
                                                                        Quality of Weld
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="ff_six_marks_label">Enter Score</label>
                                                                <input onchange="calculateTotal(this.value)" value="<?php echo $mRecord['ff_six_marks']; ?>" required="" type="number" class="form-control" name="ff_six_marks" id="ff_six_marks" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="ff_six_remarks"><?php echo $mRecord['ff_six_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                7
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <b>
                                                                        Statutory Compliance  (Max. Marks - 05)
                                                                    </b>
                                                                </label>
                                                                <select name="ff_seven" id="ff_seven" required="" class="form-control">
                                                                    <option disabled="" selected="" value="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_seven'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">
                                                                        Compliance to full
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_seven'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">
                                                                        Satisfactory Compliance
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_seven'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">
                                                                        Below Average
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="ff_seven_marks_label">Enter Score</label>
                                                                <input onchange="calculateTotal(this.value)" value="<?php echo $mRecord['ff_seven_marks']; ?>" required="" type="number" class="form-control" name="ff_seven_marks" id="ff_seven_marks" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="ff_seven_remarks"><?php echo $mRecord['ff_seven_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                8
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <b>
                                                                        Claims  (Max. Marks - 05)
                                                                    </b>
                                                                </label>
                                                                <select name="ff_eight" id="ff_eight" required="" class="form-control">
                                                                    <option disabled="" selected="" value="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_eight'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">
                                                                        No claims   
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_eight'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">
                                                                        Has claimed what is justified and not foreseen earlier  
                                                                    </option>
                                                                    <option <?php
                                                                    if ($mRecord['ff_eight'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">
                                                                        Lodges unnecessary claims and unjustified bills
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="ff_eight_marks_label">Enter Score</label>
                                                                <input onchange="calculateTotal(this.value)" value="<?php echo $mRecord['ff_eight_marks']; ?>" required="" type="number" class="form-control" name="ff_eight_marks" id="ff_eight_marks" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="ff_eight_remarks"><?php echo $mRecord['ff_eight_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                9
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <b>
                                                                        General Behaviour/Co-operation with Project Team   (Max. Marks - 05)
                                                                    </b>
                                                                </label>
                                                                <select name="ff_nine" id="ff_nine" required="" class="form-control">
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
                                                                <label id="ff_nine_marks_label">Enter Score</label>
                                                                <input onchange="calculateTotal(this.value)" value="<?php echo $mRecord['ff_nine_marks']; ?>" required="" type="number" class="form-control" name="ff_nine_marks" id="ff_nine_marks" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="ff_nine_remarks"><?php echo $mRecord['ff_nine_remarks']; ?></textarea>
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
                                                                <input readonly="" required="" type="number" class="form-control" name="ff_final_score" id="ff_final_score" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5">
                                                                <b>
                                                                    Remarks : 
                                                                </b>
                                                                <textarea class="form-control" name="ff_remarks" id="ff_remarks"><?php echo $mRecord['ff_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
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
            //First
            $('#ff_one').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#ff_one_marks").attr({
                        "max": 5,
                        "min": 4
                    });
                    $('#ff_one_marks_label').html("Between 4-5");
                } else if (selected == "2") {
                    $("#ff_one_marks").attr({
                        "max": 3,
                        "min": 3
                    });
                    $('#ff_one_marks_label').html("3");
                } else if (selected == "3") {
                    $("#ff_one_marks").attr({
                        "max": 2,
                        "min": 1
                    });
                    $('#ff_one_marks_label').html("Between 1-2");
                } else if (selected == "4") {
                    $("#ff_one_marks").attr({
                        "max": 0,
                        "min": 0
                    });
                    $('#ff_one_marks_label').html("Enter 0");
                }
            });

            //Second
            $('#ff_two').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#ff_two_marks").attr({
                        "max": 20,
                        "min": 16
                    });
                    $('#ff_two_marks_label').html("Between 16-20");
                } else if (selected == "2") {
                    $("#ff_two_marks").attr({
                        "max": 15,
                        "min": 11
                    });
                    $('#ff_two_marks_label').html("Between 11-15");
                } else if (selected == "3") {
                    $("#ff_two_marks").attr({
                        "max": 10,
                        "min": 1
                    });
                    $('#ff_two_marks_label').html("Between 1-10");
                } else if (selected == "4") {
                    $("#ff_two_marks").attr({
                        "max": 0,
                        "min": 0
                    });
                    $('#ff_two_marks_label').html("Enter 0");
                }
            });

            //Three
            $('#ff_three').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#ff_three_marks").attr({
                        "max": 5,
                        "min": 4
                    });
                    $('#ff_three_marks_label').html("Between 4-5");
                } else if (selected == "2") {
                    $("#ff_three_marks").attr({
                        "max": 3,
                        "min": 1
                    });
                    $('#ff_three_marks_label').html("Between 1-3");
                } else if (selected == "3") {
                    $("#ff_three_marks").attr({
                        "max": 0,
                        "min": 0
                    });
                    $('#ff_three_marks_label').html("Enter 0");
                }
            });

            //Four
            $('#ff_four').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#ff_four_marks").attr({
                        "max": 15,
                        "min": 11,
                    });
                    $('#ff_four_marks_label').html("Between 11-15");
                } else if (selected == "2") {
                    $("#ff_four_marks").attr({
                        "max": 10,
                        "min": 6,
                    });
                    $('#ff_four_marks_label').html("Between 6-10");
                } else if (selected == "3") {
                    $("#ff_four_marks").attr({
                        "max": 5,
                        "min": 1
                    });
                    $('#ff_four_marks_label').html("Between 1-5");
                } else if (selected == "4") {
                    $("#ff_four_marks").attr({
                        "max": 0,
                        "min": 0
                    });
                    $('#ff_four_marks_label').html("Enter 0");
                }
            });

            //Five
            $('#ff_five').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#ff_five_marks").attr({
                        "max": 10,
                        "min": 1,
                    });
                    $('#ff_five_marks_label').html("Between 1-10");
                } else if (selected == "2") {
                    $("#ff_five_marks").attr({
                        "max": 0,
                        "min": 0,
                    });
                    $('#ff_five_marks_label').html("Enter 0");
                }
            });

            //Six
            $('#ff_six').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#ff_six_marks").attr({
                        "max": 30,
                        "min": 26,
                    });
                    $('#ff_six_marks_label').html("Between 26-30");
                } else if (selected == "2") {
                    $("#ff_six_marks").attr({
                        "max": 25,
                        "min": 21,
                    });
                    $('#ff_six_marks_label').html("Between 21-25");
                } else if (selected == "3") {
                    $("#ff_six_marks").attr({
                        "max": 20,
                        "min": 16,
                    });
                    $('#ff_six_marks_label').html("Between 16-20");
                } else if (selected == "4") {
                    $("#ff_six_marks").attr({
                        "max": 15,
                        "min": 11,
                    });
                    $('#ff_six_marks_label').html("Between 11-15");
                } else if (selected == "5") {
                    $("#ff_six_marks").attr({
                        "max": 10,
                        "min": 6,
                    });
                    $('#ff_six_marks_label').html("Between 6-10");
                } else if (selected == "6") {
                    $("#ff_six_marks").attr({
                        "max": 5,
                        "min": 1,
                    });
                    $('#ff_six_marks_label').html("Between 1-5");
                }
            });

            //Seven
            $('#ff_seven').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#ff_seven_marks").attr({
                        "max": 5,
                        "min": 4,
                    });
                    $('#ff_seven_marks_label').html("Between 4-5");
                } else if (selected == "2") {
                    $("#ff_seven_marks").attr({
                        "max": 3,
                        "min": 1,
                    });
                    $('#ff_seven_marks_label').html("Between 1-3");
                } else if (selected == "3") {
                    $("#ff_seven_marks").attr({
                        "max": 0,
                        "min": 0
                    });
                    $('#ff_seven_marks_label').html("Enter 0");
                }
            });

            //Eight
            $('#ff_eight').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#ff_eight_marks").attr({
                        "max": 5,
                        "min": 4,
                    });
                    $('#ff_eight_marks_label').html("Between 4-5");
                } else if (selected == "2") {
                    $("#ff_eight_marks").attr({
                        "max": 3,
                        "min": 1,
                    });
                    $('#ff_eight_marks_label').html("Between 1-3");
                } else if (selected == "3") {
                    $("#ff_eight_marks").attr({
                        "max": 0,
                        "min": 0
                    });
                    $('#ff_eight_marks_label').html("Enter 0");
                }
            });

            //Nine
            $('#ff_nine').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#ff_nine_marks").attr({
                        "max": 5,
                        "min": 4,
                    });
                    $('#ff_nine_marks_label').html("Between 4-5");
                } else if (selected == "2") {
                    $("#ff_nine_marks").attr({
                        "max": 3,
                        "min": 1,
                    });
                    $('#ff_nine_marks_label').html("Between 1-3");
                } else if (selected == "3") {
                    $("#ff_nine_marks").attr({
                        "max": 0,
                        "min": 0
                    });
                    $('#ff_nine_marks_label').html("Enter 0");
                }
            });

            var total = 0;

            function calculateTotal(val) {
                var first = $('#ff_one_marks').val();
                var second = $('#ff_two_marks').val();
                var third = $('#ff_three_marks').val();
                var fourth = $('#ff_four_marks').val();
                var fifth = $('#ff_five_marks').val();
                var sixth = $('#ff_six_marks').val();
                var seven = $('#ff_seven_marks').val();
                var eight = $('#ff_eight_marks').val();
                var nine = $('#ff_nine_marks').val();
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
                if (nine) {
                    nine = nine;
                } else {
                    nine = "0";
                }
                total = parseInt(first) + parseInt(second) + parseInt(third) + parseInt(fourth) + parseInt(fifth) + parseInt(sixth) + parseInt(seven) + parseInt(eight) + parseInt(nine);
                $('#ff_final_score').val(total);
            }

            $("#form").submit(function () {
                if (total < 60) {
                    if (confirm("Are you sure for the vendor feedback score below 60? Below 60 score may result in vendor disqualification for future Shortlisting")) {
                        return true;
                    }
                    return false;
                } else {
                    return true;
                }
            });
        </script>

    </body>
</html>