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
                                    <h3 class="page-title br-0">Vendor Site Visit Report : <?php echo $mVendorData['company_name']; ?></h3>
                                </div>
                                <div class="col-md-6 text-right">
<!--                                    <a href="<?php echo base_url('buyer/users/actionAdd'); ?>" class="btn btn-primary">Add User</a>-->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <?php //print_r($mVendorData); ?>
                                        <form method="POST" action="<?php echo base_url('buyer/vendor/actionSaveSvr/' . $mVendorData['id']); ?>" enctype="multipart/form-data">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" style="text-transform: capitalize !important">  

                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                Name of the vendor *
                                                            </td>
                                                            <td>
                                                                <input readonly="" required="" value="<?php
                                                                if ($mVendorData['company_name']) {
                                                                    echo $mVendorData['company_name'];
                                                                } else {
                                                                    echo $mRecord['svr_contractor'];
                                                                }
                                                                ?>" required="" type="text" name="svr_contractor" class="form-control">
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                Name of the site visited *
                                                            </td>
                                                            <td>
<!--                                                                <input value="<?php echo $mRecord['svr_site_visited']; ?>" required="" type="text" name="svr_site_visited"  class="form-control">-->

                                                                <select class="form-control" name="svr_site_visited" id="svr_site_visited" required="">
                                                                    <option disabled="" value="" selected="">Select</option>
                                                                    <?php foreach ($mSites as $key => $mSite) { ?>
                                                                        <option value="<?php echo $mSite; ?>"><?php echo $mSite; ?></option>
                                                                    <?php } ?>
                                                                </select>

                                                                <input placeholder="ENTER NAME OF THE SITE VISITED" name="svr_site_visited_value" id="svr_site_visited_value" class="form-control" hidden="true" type="text"/>

                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                Category/Type/Nature of works for PQ *
                                                            </td>
                                                            <td>
                                                                <input required="" value="<?php
                                                                if ($towdata) {
                                                                    echo $towdata['name'];
                                                                } else {
                                                                    echo $mRecord['svr_nature'];
                                                                }
                                                                ?>" required="" type="text" name="svr_nature" readonly class="form-control">
                                                                <input hidden="" value="<?php
                                                                if ($towdata) {
                                                                    echo $towdata['id'];
                                                                } else {
                                                                    echo $mRecord['svr_tow_id'];
                                                                }
                                                                ?>" required="" type="text" name="svr_tow_id" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Name & Designation of Assessors *
                                                            </td>
                                                            <td>
                                                                <input value="<?php echo $mRecord['svr_assessor']; ?>" placeholder="Enter comma seperated values for multiple assessors" required="" type="text" name="svr_assessor" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-uppercase">
                                                                Upload picture of assessors with Site background  *
                                                            </td>
                                                            <td>
                                                                <input required="" type="file" name="svr_assessor_attachment" class="form-control">
                                                                <label>(Zip and attach for multiple files)</label>
                                                                <br>
                                                                <?php if ($mRecord['svr_assessor_attachment']) { ?>
                                                                    <a class="btn btn-sm btn-primary" download="" href="<?php echo base_url('uploads/' . $mRecord['svr_assessor_attachment']); ?>">Downlaod</a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Date of visit *
                                                            </td>
                                                            <td>
                                                                <input value="<?php echo $mRecord['svr_visit_date']; ?>" required="" type="date" name="svr_visit_date"  class="form-control">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br/> 
                                            <div class="table-responsive">
                                                <table style="text-transform: capitalize !important" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th>S.N.</th>
                                                            <th>Criteria</th>
                                                            <th colspan="2">Tick the most appropriate status (see the scores that'd result) *</th>
                                                            <th>Provide qualifying remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Plant setup & Automation</td>
                                                            <td>
                                                                <label></label>
                                                                <select required="" class="form-control" name="svr_plan_setup" id="svr_plan_setup">
                                                                    <option value="" required="" selected="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_plan_setup'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">Extensively automated process</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_plan_setup'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">Part Automated Setup with Good Practices</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_plan_setup'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">Old Plant but well maintained</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_plan_setup'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="4">Completely Manual and ageing plant</option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="svr_plan_setup_label">Enter Score</label>
                                                                <input value="<?php echo $mRecord['svr_plan_setup_score']; ?>" required="" onchange="calculateTotal(this.value)" type="number" class="form-control" name="svr_plan_setup_score" id="svr_plan_setup_score" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="svr_plan_setup_remarks"><?php echo $mRecord['svr_plan_setup_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>2</td>
                                                            <td>Quality of human resources</td>
                                                            <td>
                                                                <label></label>
                                                                <select required="" class="form-control" name="svr_human_resource" id="svr_human_resource">
                                                                    <option value="" required="" selected="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_human_resource'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">Both the leadership and frontline staff well qualified and competent</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_human_resource'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">Leadership well qualified but shortfall in competence of number of frontline staff</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_human_resource'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">A mix of competent and ineffective employees at all level</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_human_resource'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="4">Overall quality of human resource need improvement</option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="svr_human_resource_label">Enter Score</label>
                                                                <input value="<?php echo $mRecord['svr_human_resource_score']; ?>" required="" onchange="calculateTotal(this.value)" type="number" class="form-control" name="svr_human_resource_score" id="svr_human_resource_score" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="svr_human_resource_remarks"><?php echo $mRecord['svr_human_resource_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>3</td>
                                                            <td>Capacity Utilization</td>
                                                            <td>
                                                                <label></label>
                                                                <select required="" class="form-control" name="svr_capacity" id="svr_capacity">
                                                                    <option value="" required="" selected="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_capacity'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">Optimum utilization</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_capacity'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">Over Utilized</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_capacity'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">Partly Under Utilized</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_capacity'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="4">Grossly under Utilized</option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="svr_capacity_label">Enter Score</label>
                                                                <input value="<?php echo $mRecord['svr_capacity_score']; ?>" required="" onchange="calculateTotal(this.value)" type="number" class="form-control" name="svr_capacity_score" id="svr_capacity_score" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="svr_capacity_remarks"><?php echo $mRecord['svr_capacity_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>4</td>
                                                            <td>Quality management</td>
                                                            <td>
                                                                <label></label>
                                                                <select required="" class="form-control" name="svr_quality_mngmt" id="svr_quality_mngmt">
                                                                    <option value="" required="" selected="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_quality_mngmt'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">Excellent QC, Good QC Lab, Process Control and good product quality is visible</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_quality_mngmt'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">Excellent QC, Process Control and good product quality is visible. QC testing outsourced.</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_quality_mngmt'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">Product quality is good, but no evidence of robust QMS processes</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_quality_mngmt'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="4">Process Control, Quality Control and Lab facilities require improvements</option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="svr_quality_mngmt_label">Enter Score</label>
                                                                <input value="<?php echo $mRecord['svr_quality_mngmt_score']; ?>" required="" onchange="calculateTotal(this.value)" type="number" class="form-control" name="svr_quality_mngmt_score" id="svr_quality_mngmt_score" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="svr_quality_mngmt_remarks"><?php echo $mRecord['svr_quality_mngmt_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>5</td>
                                                            <td>Quality of End Product</td>
                                                            <td>
                                                                <label></label>
                                                                <select required="" class="form-control" name="svr_quality_end" id="svr_quality_end">
                                                                    <option value="" required="" selected="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_quality_end'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">Excellent Quality</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_quality_end'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">Very Good Quality</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_quality_end'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">Good Quality</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_quality_end'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="4">Average Quality</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_quality_end'] == "5") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="5">Not Acceptable</option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="svr_quality_end_label">Enter Score</label>
                                                                <input value="<?php echo $mRecord['svr_quality_end_score']; ?>" required="" onchange="calculateTotal(this.value)" type="number" class="form-control" name="svr_quality_end_score" id="svr_quality_end_score" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="svr_quality_end_remarks"><?php echo $mRecord['svr_quality_end_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>6</td>
                                                            <td>Safety Management</td>
                                                            <td>
                                                                <label></label>
                                                                <select required="" class="form-control" name="svr_safety_mngmt" id="svr_safety_mngmt">
                                                                    <option value="" required="" selected="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_safety_mngmt'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">Effective Safety management system in place and excellent safety record</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_safety_mngmt'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">Effective Occupational Health & Safety Management System in place and Occupational Health & Safety record is also good.</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_safety_mngmt'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">Though the safety record is good, little evidence of proper safety management</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_safety_mngmt'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="4">Safety is fully external inspector driven and the Vendor is merely complying</option>
                                                                </select>
                                                                <div id="guidlinesSafety"></div>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="svr_safety_mngmt_score_label">Enter Score</label>
                                                                <input value="<?php echo $mRecord['svr_safety_mngmt_score']; ?>" required="" onchange="calculateTotal(this.value)" type="number" class="form-control" name="svr_safety_mngmt_score" id="svr_safety_mngmt_score" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="svr_safety_mngmt_remarks"><?php echo $mRecord['svr_safety_mngmt_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td>
                                                                <b>
                                                                    Final score
                                                                </b>
                                                            </td>
                                                            <td colspan="2">
                                                                <input required="" readonly="" type="number" name="svr_final_score" id="svr_final_score" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td>
                                                                <b>
                                                                    Final recommendations (GO / NOGO) *
                                                                </b>
                                                            </td>
                                                            <td colspan="2">
                                                                <select required="" class="form-control" name="svr_final_recommendation" id="svr_final_recommendation">
                                                                    <option disabled="" value="" selected="">Select</option>
                                                                    <option value="Go">Go</option>
                                                                    <option value="NoGo">NoGo</option>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                    </tbody>

                                                </table>
                                            </div> 
                                            <br>
                                            <div class="table-responsive">
                                                <table style="text-transform: capitalize !important" class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3">
                                                                <input type="file" name="svr_photograph">Photograph Upload
                                                            </td>
                                                            <td colspan="3">
                                                                <input type="file" name="svr_video">Video Upload
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <input type="file" name="svr_evidence">Documentary Evidence Upload
                                                            </td>
                                                            <td colspan="3">
                                                                <input type="file" name="svr_others">Any other Upload
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <textarea placeholder="Remarks" rows="5" class="form-control" name="svr_remarks" id="svr_remarks"></textarea>

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
            $('#svr_plan_setup').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#svr_plan_setup_score").attr({
                        "max": 15,
                        "min": 11
                    });
                    $('#svr_plan_setup_label').html("Between 11-15");
                } else if (selected == "2") {
                    $("#svr_plan_setup_score").attr({
                        "max": 10,
                        "min": 6
                    });
                    $('#svr_plan_setup_label').html("Between 6-10");
                } else if (selected == "3") {
                    $("#svr_plan_setup_score").attr({
                        "max": 5,
                        "min": 1
                    });
                    $('#svr_plan_setup_label').html("Between 1-5");
                } else if (selected == "4") {
                    $("#svr_plan_setup_score").attr({
                        "max": 0,
                        "min": 0
                    });
                    $('#svr_plan_setup_label').html("Enter Score");
                }
            });

            //Second
            $('#svr_human_resource').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#svr_human_resource_score").attr({
                        "max": 10,
                        "min": 8
                    });
                    $('#svr_human_resource_label').html("Between 8-10");
                } else if (selected == "2") {
                    $("#svr_human_resource_score").attr({
                        "max": 7,
                        "min": 4
                    });
                    $('#svr_human_resource_label').html("Between 4-7");
                } else if (selected == "3") {
                    $("#svr_human_resource_score").attr({
                        "max": 3,
                        "min": 1
                    });
                    $('#svr_human_resource_label').html("Between 1-3");
                } else if (selected == "4") {
                    $("#svr_human_resource_score").attr({
                        "max": 0,
                        "min": 0
                    });
                    $('#svr_human_resource_label').html("Enter Score");
                }
            });

            //Third
            $('#svr_capacity').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#svr_capacity_score").attr({
                        "max": 20,
                        "min": 16
                    });
                    $('#svr_capacity_label').html("Between 16-20");
                } else if (selected == "2") {
                    $("#svr_capacity_score").attr({
                        "max": 15,
                        "min": 6
                    });
                    $('#svr_capacity_label').html("Between 6-15");
                } else if (selected == "3") {
                    $("#svr_capacity_score").attr({
                        "max": 10,
                        "min": 6
                    });
                    $('#svr_capacity_label').html("Between 6-10");
                } else if (selected == "4") {
                    $("#svr_capacity_score").attr({
                        "max": 5,
                        "min": 0
                    });
                    $('#svr_capacity_label').html("Between 0-5");
                }
            });

            //Fourth
            $('#svr_quality_mngmt').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#svr_quality_mngmt_score").attr({
                        "max": 15,
                        "min": 11
                    });
                    $('#svr_quality_mngmt_label').html("Between 11-15");
                } else if (selected == "2") {
                    $("#svr_quality_mngmt_score").attr({
                        "max": 10,
                        "min": 9
                    });
                    $('#svr_quality_mngmt_label').html("Between 9-10");
                } else if (selected == "3") {
                    $("#svr_quality_mngmt_score").attr({
                        "max": 8,
                        "min": 5
                    });
                    $('#svr_quality_mngmt_label').html("Between 5-8");
                } else if (selected == "4") {
                    $("#svr_quality_mngmt_score").attr({
                        "max": 4,
                        "min": 0
                    });
                    $('#svr_quality_mngmt_label').html("Between 0-4");
                }
            });

            //Seventh
            $('#svr_quality_end').on('change', function () {
                var selected = this.value;
                var safety = $('#svr_safety_mngmt').val();
                if (selected == "1") {
                    $("#svr_quality_end_score").attr({
                        "max": 30,
                        "min": 21
                    });
                    $('#svr_quality_end_label').html("Between 21-30");
                    if (safety == "3" || safety == "4") {
                        $('#svr_final_recommendation').val("NoGo");
                        $('#svr_final_recommendation').attr({
                            "readonly": "readonly",
                        });
                    }
                } else if (selected == "2") {
                    $("#svr_quality_end_score").attr({
                        "max": 20,
                        "min": 11
                    });
                    $('#svr_quality_end_label').html("Between 11-20");
                    if (safety == "3" || safety == "4") {
                        $('#svr_final_recommendation').val("NoGo");
                        $('#svr_final_recommendation').attr({
                            "readonly": "readonly",
                        });
                    }
                } else if (selected == "3") {
                    $("#svr_quality_end_score").attr({
                        "max": 10,
                        "min": 3
                    });
                    $('#svr_quality_end_label').html("Between 3-10");
                    if (safety == "3" || safety == "4") {
                        $('#svr_final_recommendation').val("NoGo");
                        $('#svr_final_recommendation').attr({
                            "readonly": "readonly",
                        });
                    }
                } else if (selected == "4") {
                    $("#svr_quality_end_score").attr({
                        "max": 2,
                        "min": 1
                    });
                    $('#svr_quality_end_label').html("Between 1-2");
                    if (safety == "3" || safety == "4") {
                        $('#svr_final_recommendation').val("NoGo");
                        $('#svr_final_recommendation').attr({
                            "readonly": "readonly",
                        });
                    }
                } else if (selected == "5") {
                    $("#svr_quality_end_score").attr({
                        "max": 0,
                        "min": 0
                    });
                    $('#svr_final_recommendation').val("NoGo");
                    $('#svr_final_recommendation').attr({
                        "readonly": "readonly",
                    });
                    $('#svr_quality_end_label').html("Enter Score");
                }
            });

            //Fifth
            $('#svr_safety_mngmt').on('change', function () {
                var selected = this.value;
                var end = $('#svr_quality_end').val();
                if (selected == "1") {
                    $("#svr_safety_mngmt_score").attr({
                        "max": 10,
                        "min": 8
                    });
                    $('#svr_safety_mngmt_score_label').html("Between 8-10");
                    if (end == "5") {
                        $('#svr_final_recommendation').val("NOGo");
                        $('#svr_final_recommendation').attr({
                            "readonly": "readonly",
                        });
                    } else {
                        $('#svr_final_recommendation').val("Go");
                        $('#svr_final_recommendation').attr({
                            "readonly": false,
                        });
                    }

                    $('#guidlinesSafety').html("<ul><li>Effective Occupational Health & Safety Management System-Operational Controls  i.e. Safety Resources, Barricades, safety nets, Scaffolding. working platform, safe equipment & machineries, use of mandatory PPEs etc. in place.</li><li>Safety Record-Lagging indicators-Process of recording & investigation of incidents/occupational illness available, No major incident/illness reported and leading indicators available (Safe man-hours, Training, inspections, health awareness & motivational programs etc.) </li></ul>");
                } else if (selected == "2") {
                    $("#svr_safety_mngmt_score").attr({
                        "max": 7,
                        "min": 4
                    });
                    $('#svr_safety_mngmt_score_label').html("Between 4-7");
                    if (end == "5") {
                        $('#svr_final_recommendation').val("NOGo");
                        $('#svr_final_recommendation').attr({
                            "readonly": "readonly",
                        });
                    } else {
                        $('#svr_final_recommendation').val("Go");
                        $('#svr_final_recommendation').attr({
                            "readonly": false,
                        });
                    }
                    $('#guidlinesSafety').html("<ul><li>Safety Management System-Operational Controls in place however not as per standard i.e. nonqualified Safety Resources, non-standard Barricades, safety nets, bamboo Scaffolding. working platform, equipment & machineries without inspection, use of non-standard PPEs etc. in place .</li><li>Safety Record--Recording of accident/incidents available but investigation & CAPA process not in place., leading indicators - though safety inspections, training and awareness program conducted. there is no laid down process.</li></ul>");
                } else if (selected == "3") {
                    $("#svr_safety_mngmt_score").attr({
                        "max": 3,
                        "min": 1
                    });
                    $('#svr_safety_mngmt_score_label').html("Between 1-3");
                    $('#svr_final_recommendation').val("NoGo");
                    $('#svr_final_recommendation').attr({
                        "readonly": "readonly",
                    });
                    $('#guidlinesSafety').html("<ul><li>Safety Management System- No or inadequate operational Controls in place. No PPEs being used during work.</li></ul>");
                } else if (selected == "4") {
                    $("#svr_safety_mngmt_score").attr({
                        "max": 0,
                        "min": 0
                    });
                    $('#svr_safety_mngmt_score_label').html("Enter Score");
                    $('#svr_final_recommendation').val("NoGo");
                    $('#svr_final_recommendation').attr({
                        "readonly": "readonly",
                    });
                    $('#guidlinesSafety').html("");
                }
            });

            function calculateTotal(val) {
                var first = $('#svr_plan_setup_score').val();
                var second = $('#svr_capacity_score').val();
                var third = $('#svr_quality_mngmt_score').val();
                var fourth = $('#svr_safety_mngmt_score').val();
                var fifth = $('#svr_human_resource_score').val();
                var sixth = $('#svr_quality_end_score').val();
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
                var total = parseInt(first) + parseInt(second) + parseInt(third) + parseInt(fourth) + parseInt(fifth) + parseInt(sixth);
                $('#svr_final_score').val(total);
            }

            $('#svr_site_visited').on('change', function () {
                var selected = this.value;
                if (selected == "Others") {
                    $("#svr_site_visited_value").attr({
                        "hidden": false
                    });
                } else {
                    $("#svr_site_visited_value").attr({
                        "hidden": true
                    });
                }
            });
        </script>

    </body>
</html>