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
                    <section class="content" style="text-transform: capitalize">

                        <!-- Content Header (Page header) -->	  
                        <div class="content-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="page-title br-0">Contractor Site Visit Report : <?php echo $mVendorData['company_name']; ?></h3>
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
                                        <form method="POST" action="<?php echo base_url('buyer/vendor/actionSaveSvrc/' . $mVendorData['id']); ?>" enctype="multipart/form-data">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" style="text-transform: uppercase !important">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                NAME OF THE CONTRACTOR *
                                                            </td>
                                                            <td>
                                                                <input readonly="" required="" value="<?php
                                                                if ($mVendorData['company_name']) {
                                                                    echo $mVendorData['company_name'];
                                                                } else {
                                                                    echo $mRecord['svrc_contractor'];
                                                                }
                                                                ?>" required="" type="text" name="svrc_contractor" class="form-control">
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                NAME OF THE SITE VISITED *
                                                            </td>
                                                            <td>
<!--                                                                <input value="<?php echo $mRecord['svrc_site_visited']; ?>" required="" type="text" name="svrc_site_visited"  class="form-control">-->

                                                                <select class="form-control" name="svrc_site_visited" id="svrc_site_visited" required="">
                                                                    <option disabled="" value="" selected="">Select</option>
                                                                    <?php foreach ($mSites as $key => $mSite) { ?>
                                                                        <option value="<?php echo $mSite; ?>"><?php echo $mSite; ?></option>
                                                                    <?php } ?>
                                                                </select>

                                                                <input placeholder="ENTER NAME OF THE SITE VISITED" name="svrc_site_visited_value" id="svrc_site_visited_value" class="form-control" hidden="true" type="text"/>

                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                CATEGORY/TYPE/NATURE OF WORKS for PQ *
                                                            </td>
                                                            <td>
                                                                <input required="" value="<?php
                                                                if ($towdata) {
                                                                    echo $towdata['name'];
                                                                } else {
                                                                    echo $mRecord['svrc_nature'];
                                                                }
                                                                ?>" required="" type="text" name="svrc_nature" readonly class="form-control">
                                                                <input hidden="" value="<?php
                                                                if ($towdata) {
                                                                    echo $towdata['id'];
                                                                } else {
                                                                    echo $mRecord['svrc_tow_id'];
                                                                }
                                                                ?>" required="" type="text" name="svrc_tow_id" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                NAME & DESIGNATION OF ASSESSORS *
                                                            </td>
                                                            <td>
                                                                <input value="<?php echo $mRecord['svrc_assessor']; ?>" placeholder="Enter comma seperated values for multiple assessors" required="" type="text" name="svrc_assessor" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-uppercase">
                                                                Upload picture of assessors with Site background * 
                                                            </td>
                                                            <td>
                                                                <input required="" type="file" name="svrc_assessor_attachment" class="form-control">
                                                                <label>(Zip and attach for multiple files)</label>
                                                                <br>
                                                                <?php if ($mRecord['svrc_assessor_attachment']) { ?>
                                                                    <a class="btn btn-sm btn-primary" download="" href="<?php echo base_url('uploads/' . $mRecord['svrc_assessor_attachment']); ?>">Downlaod</a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                DATE OF VISIT *
                                                            </td>
                                                            <td>
                                                                <input value="<?php echo $mRecord['svrc_visit_date']; ?>" required="" type="date" name="svrc_visit_date"  class="form-control">
                                                            </td>
                                                        </tr>
                                                    </tbody>   
                                                </table>
                                            </div>
                                            <br/> 
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover display nowrap margin-top-10 w-p100" style="text-transform: uppercase !important">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th>S.N.</th>
                                                            <th>CRITERIA</th>
                                                            <th>Tick the most appropriate status (see the scores that'd result) *</th>
                                                            <th>Provide qualifying score  *</th>
                                                            <th>Provide qualifying remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>MOBILIZATION OF RESOURCES</td>
                                                            <td>
                                                                <label></label>
                                                                <select required="" class="form-control" name="svrc_mob_setup" id="svrc_mob_setup">
                                                                    <option value="" required="" selected="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_mob_setup'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">All planned resources mobilized as per timelines</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_mob_setup'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">all resources mobilized but with some delay</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_mob_setup'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">Shortfall in resources mobilized as well as timeline of mobilization</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_mob_setup'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="4">No mobilization plan</option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="svrc_mob_setup_score_label">Enter Score</label>
                                                                <input value="<?php echo $mRecord['svrc_mob_setup_score']; ?>" required="" onchange="calculateTotal(this.value)" type="number" class="form-control" name="svrc_mob_setup_score" id="svrc_mob_setup_score" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="svrc_mob_setup_remarks"><?php echo $mRecord['svrc_mob_setup_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>2</td>
                                                            <td>MAINTENANCE & PRODUCTIVITY OF RESOURCES</td>
                                                            <td>
                                                                <label></label>
                                                                <select required="" class="form-control" name="svrc_main" id="svrc_main">
                                                                    <option  value="" required="" selected="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_main'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">Equipment well maintained and productivity as planned</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_main'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">Equipment well maintained but productivity below norms</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_main'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">Productivity is as required, but at the cost of maintenance</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_main'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="4">No system of maintenance and productivity monitoring in place</option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="svrc_main_score_label">Enter Score</label>
                                                                <input value="<?php echo $mRecord['svrc_main_score']; ?>" required="" onchange="calculateTotal(this.value)" type="number" class="form-control" name="svrc_main_score" id="svrc_main_score" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="svrc_main_remarks"><?php echo $mRecord['svrc_main_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>3</td>
                                                            <td>QUALITY OF HUMAN RESOURCES</td>
                                                            <td>
                                                                <label></label>
                                                                <select required="" class="form-control" name="svrc_quality" id="svrc_quality">
                                                                    <option value="" required="" selected="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_quality'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">Both the leadership and frontline staff well qualified and competent</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_quality'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">Leadership well qualified but shortfall in competence of number of frontline staff</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_quality'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">A mix of competent and ineffective employees at all level</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_quality'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="4">Overall quality of human resource need improvement</option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="svrc_quality_score_label">Enter Score</label>
                                                                <input value="<?php echo $mRecord['svrc_quality_score']; ?>" required="" onchange="calculateTotal(this.value)" type="number" class="form-control" name="svrc_quality_score" id="svrc_quality_score" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="svrc_quality_remarks"><?php echo $mRecord['svrc_quality_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>4</td>
                                                            <td>STATUS OF PROGRESS</td>
                                                            <td>
                                                                <label></label>
                                                                <select required="" class="form-control" name="svrc_status" id="svrc_status">
                                                                    <option value="" required="" selected="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_status'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">Progress ahead of schedule</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_status'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">Progress as per schedule with minor deviations</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_status'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">Progress behind schedule but with effective catch up plan in evidence</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_status'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="4">Progress behind schedule and delay attributable to the contractor</option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="svrc_status_score_label">Enter Score</label>
                                                                <input value="<?php echo $mRecord['svrc_status_score']; ?>" required="" onchange="calculateTotal(this.value)" type="number" class="form-control" name="svrc_status_score" id="svrc_status_score" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="svrc_status_remarks"><?php echo $mRecord['svrc_status_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>5</td>
                                                            <td>QUALITY MANAGEMENT</td>
                                                            <td>
                                                                <label></label>
                                                                <select required="" class="form-control" name="svrc_quality_mngmnt" id="svrc_quality_mngmnt">
                                                                    <option value="" required="" selected="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_quality_mngmnt'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">Excellent processes and good product quality is visible</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_quality_mngmnt'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">Good QMS processes, but not well implemented as seen from product quality</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_quality_mngmnt'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">Product quality is good, but no evidence of robust QMS processes</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_quality_mngmnt'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="4">Both QMS processes and product quality require improvements</option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="svrc_quality_mngmnt_score_label">Enter Score</label>
                                                                <input value="<?php echo $mRecord['svrc_quality_mngmnt_score']; ?>" required="" onchange="calculateTotal(this.value)" type="number" class="form-control" name="svrc_quality_mngmnt_score" id="svrc_quality_mngmnt_score" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="svrc_quality_mngmnt_remarks"><?php echo $mRecord['svrc_quality_mngmnt_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>6</td>
                                                            <td>SAFETY MANAGEMENT</td>
                                                            <td>
                                                                <label></label>
                                                                <select required="" class="form-control" name="svrc_safety_mngmt" id="svrc_safety_mngmt">
                                                                    <option value="" required="" selected="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_safety_mngmt'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">Effective Occupational Health & Safety Management System in place and Occupational Health & Safety record is also good.</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_safety_mngmt'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">Occupational Health & Safety Management System and process of safety record  is in place but not adequate</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_safety_mngmt'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">Little evidence of proper Occupational Health & Safety Management and safety record</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_safety_mngmt'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="4">No safety evidence and Occupational Health & Safety Management records.</option>
                                                                </select>
                                                                <div id="guidlinesSafety"></div>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="svrc_safety_mngmt_score_label">Enter Score</label>
                                                                <input value="<?php echo $mRecord['svrc_safety_mngmt_score']; ?>" required="" onchange="calculateTotal(this.value)" type="number" class="form-control" name="svrc_safety_mngmt_score" id="svrc_safety_mngmt_score" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="svrc_safety_mngmt_remarks"><?php echo $mRecord['svrc_safety_mngmt_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td>7</td>
                                                            <td>FEEDBACK FROM CLIENT</td>
                                                            <td>
                                                                <label></label>
                                                                <select required="" class="form-control" name="svrc_feedback" id="svrc_feedback">
                                                                    <option value="" required="" selected="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_feedback'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">Positive about most of the parameters</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_feedback'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">Positive about some of the parameters</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_feedback'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">Generally negative</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_feedback'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="4">Very negative about many parameters with specific inputs</option>
                                                                </select>
                                                            </td>
                                                            <td style="width: 200px">
                                                                <label id="svrc_feedback_score_label">Enter Score</label>
                                                                <input value="<?php echo $mRecord['svrc_feedback_score']; ?>" required="" onchange="calculateTotal(this.value)" type="number" class="form-control" name="svrc_feedback_score" id="svrc_feedback_score" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" rows="4" name="svrc_feedback_remarks"><?php echo $mRecord['svrc_feedback_remarks']; ?></textarea>
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
                                                                <input readonly="" value="<?php echo $mRecord['svrc_final_score']; ?>" required="" required="" type="number" name="svrc_final_score" id="svrc_final_score" class="form-control">
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
                                                                <select required="" class="form-control" name="svrc_final_recommendation" id="svrc_final_recommendation">
                                                                    <option required="" value="" selected="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_final_recommendation'] == "Go") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="Go">Go</option>
                                                                    <option <?php
                                                                    if ($mRecord['svrc_final_recommendation'] == "NoGo") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="NoGo">NoGo</option>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                    </tbody>

                                                </table>
                                            </div>
                                            <table class="table table-bordered" style="text-transform: uppercase !important">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="3">
                                                            <input type="file" name="svrc_photograph">Photograph Upload
                                                            <?php if ($mRecord['svrc_photograph']) { ?>
                                                                <br><br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['svrc_photograph']); ?>">Download</a>
                                                            <?php } ?>
                                                        </td>
                                                        <td colspan="3">
                                                            <input type="file" name="svrc_video">Video Upload
                                                            <?php if ($mRecord['svrc_video']) { ?>
                                                                <br><br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['svrc_video']); ?>">Download</a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <input type="file" name="svrc_evidence">Documentary Evidence Upload
                                                            <?php if ($mRecord['svrc_evidence']) { ?>
                                                                <br><br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['svrc_evidence']); ?>">Download</a>
                                                            <?php } ?>
                                                        </td>
                                                        <td colspan="3">
                                                            <input type="file" name="svrc_others">Any other Upload
                                                            <?php if ($mRecord['svrc_others']) { ?>
                                                                <br><br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['svrc_others']); ?>">Download</a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            
                                            <textarea placeholder="Remarks" rows="5" class="form-control" name="svrc_remarks" id="svrc_remarks"></textarea>
                                            
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
            $('#svrc_mob_setup').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#svrc_mob_setup_score").attr({
                        "max": 10,
                        "min": 8
                    });
                    $('#svrc_mob_setup_score_label').html("Between 8-10");
                } else if (selected == "2") {
                    $("#svrc_mob_setup_score").attr({
                        "max": 7,
                        "min": 4
                    });
                    $('#svrc_mob_setup_score_label').html("Between 4-7");
                } else if (selected == "3") {
                    $("#svrc_mob_setup_score").attr({
                        "max": 3,
                        "min": 1
                    });
                    $('#svrc_mob_setup_score_label').html("Between 1-3");
                } else if (selected == "4") {
                    $("#svrc_mob_setup_score").attr({
                        "max": 0,
                        "min": 0
                    });
                    $('#svrc_mob_setup_score_label').html("Enter Zero");
                }
            });

            //Second
            $('#svrc_main').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#svrc_main_score").attr({
                        "max": 10,
                        "min": 8
                    });
                    $('#svrc_main_score_label').html("Between 8-10");
                } else if (selected == "2") {
                    $("#svrc_main_score").attr({
                        "max": 7,
                        "min": 4
                    });
                    $('#svrc_main_score_label').html("Between 4-7");
                } else if (selected == "3") {
                    $("#svrc_main_score").attr({
                        "max": 3,
                        "min": 1
                    });
                    $('#svrc_main_score_label').html("Between 1-3");
                } else if (selected == "4") {
                    $("#svrc_main_score").attr({
                        "max": 0,
                        "min": 0
                    });
                    $('#svrc_main_score_label').html("Enter Zero");
                }
            });

            //Third
            $('#svrc_quality').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#svrc_quality_score").attr({
                        "max": 10,
                        "min": 8
                    });
                    $('#svrc_quality_score_label').html("Between 8-10");
                } else if (selected == "2") {
                    $("#svrc_quality_score").attr({
                        "max": 7,
                        "min": 4
                    });
                    $('#svrc_quality_score_label').html("Between 4-7");
                } else if (selected == "3") {
                    $("#svrc_quality_score").attr({
                        "max": 3,
                        "min": 1
                    });
                    $('#svrc_quality_score_label').html("Between 1-3");
                } else if (selected == "4") {
                    $("#svrc_quality_score").attr({
                        "max": 0,
                        "min": 0
                    });
                    $('#svrc_quality_score_label').html("Enter Zero");
                }
            });

            //Fourth
            $('#svrc_status').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#svrc_status_score").attr({
                        "max": 20,
                        "min": 16
                    });
                    $('#svrc_status_score_label').html("Between 16-20");
                } else if (selected == "2") {
                    $("#svrc_status_score").attr({
                        "max": 15,
                        "min": 11
                    });
                    $('#svrc_status_score_label').html("Between 11-15");
                } else if (selected == "3") {
                    $("#svrc_status_score").attr({
                        "max": 10,
                        "min": 6
                    });
                    $('#svrc_status_score_label').html("Between 6-10");
                } else if (selected == "4") {
                    $("#svrc_status_score").attr({
                        "max": 5,
                        "min": 0
                    });
                    $('#svrc_status_score_label').html("Between 0-5");
                }
            });

            //Fifth
            $('#svrc_quality_mngmnt').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#svrc_quality_mngmnt_score").attr({
                        "max": 20,
                        "min": 16
                    });
                    $('#svrc_quality_mngmnt_score_label').html("Between 16-20");
                } else if (selected == "2") {
                    $("#svrc_quality_mngmnt_score").attr({
                        "max": 15,
                        "min": 11
                    });
                    $('#svrc_quality_mngmnt_score_label').html("Between 11-15");
                } else if (selected == "3") {
                    $("#svrc_quality_mngmnt_score").attr({
                        "max": 10,
                        "min": 6
                    });
                    $('#svrc_quality_mngmnt_score_label').html("Between 6-10");
                } else if (selected == "4") {
                    $("#svrc_quality_mngmnt_score").attr({
                        "max": 5,
                        "min": 0
                    });
                    $('#svrc_quality_mngmnt_score_label').html("Between 0-5");
                }
            });

            //Sixth
            $('#svrc_safety_mngmt').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#svrc_safety_mngmt_score").attr({
                        "max": 20,
                        "min": 16
                    });
                    $('#svrc_safety_mngmt_score_label').html("Between 16-20");
                    $('#svrc_final_recommendation').val("Go");
                    $('#svrc_final_recommendation').attr({
                        "readonly": false,
                    });
                    $('#guidlinesSafety').html("<ul><li>Effective Occupational Health & Safety Management System-Operational Controls  i.e. Safety Resources, Barricades, safety nets, Scaffolding. working platform, safe equipment & machineries, use of mandatory PPEs etc. in place.</li><li>Safety Record-Lagging indicators-Process of recording & investigation of incidents/occupational illness available, No major incident/illness reported and leading indicators available (Safe man-hours, Training, inspections, health awareness & motivational programs etc.) </li></ul>");
                } else if (selected == "2") {
                    $("#svrc_safety_mngmt_score").attr({
                        "max": 15,
                        "min": 11
                    });
                    $('#svrc_safety_mngmt_score_label').html("Between 11-15");
                    $('#svrc_final_recommendation').val("Go");
                    $('#svrc_final_recommendation').attr({
                        "readonly": false,
                    });
                    $('#guidlinesSafety').html("<ul><li>Occupational Health & Safety Management System-Operational Controls in place however not as per standard  i.e. nonqualified Safety Resources, non-standard Barricades, safety nets, bamboo Scaffolding. working platform, equipment & machineries without inspection, use of non-standard PPEs  etc. in place</li><li>Safety Record--Recording of incidents/illness available but investigation & CAPA process not in place., leading indicators - through safety inspections, training and health awareness program conducted. there is no laid down process.</li></ul>");
                } else if (selected == "3") {
                    $("#svrc_safety_mngmt_score").attr({
                        "max": 10,
                        "min": 6
                    });
                    $('#svrc_safety_mngmt_score_label').html("Between 6-10");
                    $('#svrc_final_recommendation').val("NoGo");
                    $('#svrc_final_recommendation').attr({
                        "readonly": "readonly",
                    });
                    $('#guidlinesSafety').html("<ul><li>Occupational Health & Safety Management System- No or inadequate operational Controls in place. No PPEs being used during work.</li><li>Safety Record--No Recording of incidents/illness available. , leading indicators - No safety inspections, No training and health awareness program</li></ul>");
                } else if (selected == "4") {
                    $("#svrc_safety_mngmt_score").attr({
                        "max": 5,
                        "min": 0
                    });
                    $('#svrc_safety_mngmt_score_label').html("Between 0-5");
                    $('#svrc_final_recommendation').val("NoGo");
                    $('#svrc_final_recommendation').attr({
                        "readonly": "readonly",
                    });
                    $('#guidlinesSafety').html("");
                }
            });

            //Seventh
            $('#svrc_feedback').on('change', function () {
                var selected = this.value;
                if (selected == "1") {
                    $("#svrc_feedback_score").attr({
                        "max": 10,
                        "min": 8
                    });
                    $('#svrc_feedback_score_label').html("Between 8-10");
                } else if (selected == "2") {
                    $("#svrc_feedback_score").attr({
                        "max": 7,
                        "min": 4
                    });
                    $('#svrc_feedback_score_label').html("Between 4-7");
                } else if (selected == "3") {
                    $("#svrc_feedback_score").attr({
                        "max": 3,
                        "min": 1
                    });
                    $('#svrc_feedback_score_label').html("Between 1-3");
                } else if (selected == "4") {
                    $("#svrc_feedback_score").attr({
                        "max": 0,
                        "min": 0
                    });
                    $('#svrc_feedback_score_label').html("Enter Zero");
                }
            });

            $('#svrc_site_visited').on('change', function () {
                var selected = this.value;
                if (selected == "Others") {
                    $("#svrc_site_visited_value").attr({
                        "hidden": false
                    });
                } else {
                    $("#svrc_site_visited_value").attr({
                        "hidden": true
                    });
                }
            });

            function calculateTotal(val) {
                var first = $('#svrc_mob_setup_score').val();
                var second = $('#svrc_main_score').val();
                var third = $('#svrc_quality_score').val();
                var fourth = $('#svrc_status_score').val();
                var fifth = $('#svrc_quality_mngmnt_score').val();
                var sixth = $('#svrc_safety_mngmt_score').val();
                var seventh = $('#svrc_feedback_score').val();

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
                var total = parseInt(first) + parseInt(second) + parseInt(third) + parseInt(fourth) + parseInt(fifth) + parseInt(sixth) + parseInt(seventh);
                $('#svrc_final_score').val(total);
            }
        </script>

    </body>
</html>