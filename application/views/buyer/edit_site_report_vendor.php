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
                                        <div class="row mb-2">
                                            <div class="col-md-12 text-right">
                                                <a href="<?php echo base_url('buyer/vendor/editSiteVisitReport/' . $mSvr['svr_id']); ?>" class="btn btn-success btn-xs">
                                                    View Site Visit Report
                                                </a>
                                            </div>
                                        </div>
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <form method="POST" action="<?php echo base_url('buyer/vendor/actionSaveSvr/' . $mVendorData['id'] . "/" . $mRecord['svr_id']); ?>" enctype="multipart/form-data">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                NAME OF THE CONTRACTOR
                                                            </td>
                                                            <td>
                                                                <input  value="<?php echo $mRecord['svr_contractor']; ?>" disabled="" type="text" name="svr_contractor" class="form-control">
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                NAME OF THE SITE VISITED
                                                            </td>
                                                            <td>
                                                                <input  disabled="" value="<?php echo $mRecord['svr_site_visited']; ?>" disabled="" type="text" name="svr_site_visited"  class="form-control">
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                CATEGORY/TYPE/NATURE OF WORKS for PQ
                                                            </td>
                                                            <td>
                                                                <input disabled="" required="" value="<?php
                                                                if ($typeofwork) {
                                                                    echo $typeofwork;
                                                                } else {
                                                                    echo $mRecord['svr_nature'];
                                                                }
                                                                ?>" required="" type="text" name="svr_nature"  class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                NAME & DESIGNATION OF ASSESSORS
                                                            </td>
                                                            <td>
                                                                <input disabled="" value="<?php echo $mRecord['svr_assessor']; ?>" placeholder="Enter comma seperated values for multiple assessors" required="" type="text" name="svr_assessor" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-uppercase">
                                                                Upload picture of assessors with Site background 
                                                            </td>
                                                            <td>
                                                                <?php if ($mRecord['svr_assessor_attachment']) { ?>
                                                                    <a class="btn btn-sm btn-primary" download="" href="<?php echo base_url('uploads/' . $mRecord['svr_assessor_attachment']); ?>">Downlaod</a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                DATE OF VISIT
                                                            </td>
                                                            <td>
                                                                <input disabled="" value="<?php echo $mRecord['svr_visit_date']; ?>" required="" type="date" name="svr_visit_date"  class="form-control">
                                                            </td>
                                                        </tr>
                                                    </tbody>   
                                                </table>
                                            </div>
                                            <br/> 
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th>S.N.</th>
                                                            <th>CRITERIA</th>
                                                            <th colspan="2">Tick the most appropriate status (see the scores that'd result)</th>
                                                            <th>Provide qualifying remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Plant setup & Automation</td>
                                                            <td>
                                                                <label></label>
                                                                <select disabled="" required="" class="form-control" name="svr_plan_setup" id="svr_plan_setup">
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
                                                                <input disabled="" value="<?php echo $mRecord['svr_plan_setup_score']; ?>" required="" onchange="calculateTotal(this.value)" type="number" class="form-control" name="svr_plan_setup_score" id="svr_plan_setup_score" />
                                                            </td>
                                                            <td>
                                                                <textarea disabled="" class="form-control" rows="4" name="svr_plan_setup_remarks"><?php echo $mRecord['svr_plan_setup_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>2</td>
                                                            <td>QUALITY OF HUMAN RESOURCES</td>
                                                            <td>
                                                                <label></label>
                                                                <select disabled="" required="" class="form-control" name="svr_human_resource" id="svr_human_resource">
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
                                                                <input disabled="" value="<?php echo $mRecord['svr_human_resource_score']; ?>" required="" onchange="calculateTotal(this.value)" type="number" class="form-control" name="svr_human_resource_score" id="svr_human_resource_score" />
                                                            </td>
                                                            <td>
                                                                <textarea disabled="" class="form-control" rows="4" name="svr_human_resource_remarks"><?php echo $mRecord['svr_human_resource_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>3</td>
                                                            <td>Capacity Utilization</td>
                                                            <td>
                                                                <label></label>
                                                                <select disabled="" required="" class="form-control" name="svr_capacity" id="svr_capacity">
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
                                                                <input disabled="" value="<?php echo $mRecord['svr_capacity_score']; ?>" required="" onchange="calculateTotal(this.value)" type="number" class="form-control" name="svr_capacity_score" id="svr_capacity_score" />
                                                            </td>
                                                            <td>
                                                                <textarea disabled="" class="form-control" rows="4" name="svr_capacity_remarks"><?php echo $mRecord['svr_capacity_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>4</td>
                                                            <td>QUALITY MANAGEMENT</td>
                                                            <td>
                                                                <label></label>
                                                                <select disabled="" required="" class="form-control" name="svr_quality_mngmt" id="svr_quality_mngmt">
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
                                                                <input disabled="" value="<?php echo $mRecord['svr_quality_mngmt_score']; ?>" required="" onchange="calculateTotal(this.value)" type="number" class="form-control" name="svr_quality_mngmt_score" id="svr_quality_mngmt_score" />
                                                            </td>
                                                            <td>
                                                                <textarea disabled="" class="form-control" rows="4" name="svr_quality_mngmt_remarks"><?php echo $mRecord['svr_quality_mngmt_remarks']; ?></textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>5</td>
                                                            <td>SAFETY MANAGEMENT</td>
                                                            <td>
                                                                <label></label>
                                                                <select disabled="" required="" class="form-control" name="svr_safety_mngmt" id="svr_safety_mngmt">
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
                                                                <input disabled="" value="<?php echo $mRecord['svr_safety_mngmt_score']; ?>" required="" onchange="calculateTotal(this.value)" type="number" class="form-control" name="svr_safety_mngmt_score" id="svr_safety_mngmt_score" />
                                                            </td>
                                                            <td>
                                                                <textarea disabled="" class="form-control" rows="4" name="svr_safety_mngmt_remarks"><?php echo $mRecord['svr_safety_mngmt_remarks']; ?></textarea>
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
                                                                <input disabled="" value="<?php echo $mRecord['svr_final_score']; ?>" required="" readonly="" type="number" name="svr_final_score" id="svr_final_score" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td>
                                                                <b>
                                                                    Final recommendations (GO / NOGO)
                                                                </b>
                                                            </td>
                                                            <td colspan="2">
                                                                <select disabled="" required="" class="form-control" name="svr_final_recommendation" id="svr_final_recommendation">
                                                                    <option disabled="" value="" selected="">Select</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_final_recommendation'] == "Go") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="Go">Go</option>
                                                                    <option <?php
                                                                    if ($mRecord['svr_final_recommendation'] == "NoGo") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="NoGo">NoGo</option>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                    </tbody>

                                                </table>
                                            </div> 
                                            <br>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="6">2. Safety Record--No Recording of accident/incidents available. , leading indicators - No safety inspections, No training and awareness program </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                Photograph Upload
                                                                <?php if ($mRecord['svr_photograph']) { ?>
                                                                    <br>
                                                                    <a class="btn btn-sm btn-primary" download="" href="<?php echo base_url('uploads/' . $mRecord['svr_photograph']); ?>">Downlaod</a>
                                                                <?php } ?>
                                                            </td>
                                                            <td colspan="3">
                                                                Video Upload
                                                                <?php if ($mRecord['svr_video']) { ?>
                                                                    <br>
                                                                    <a class="btn btn-sm btn-primary" download="" href="<?php echo base_url('uploads/' . $mRecord['svr_video']); ?>">Downlaod</a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                Documentary Evidence Upload
                                                                <?php if ($mRecord['svr_evidence']) { ?>
                                                                    <br>
                                                                    <a class="btn btn-sm btn-primary" download="" href="<?php echo base_url('uploads/' . $mRecord['svr_evidence']); ?>">Downlaod</a>
                                                                <?php } ?>
                                                            </td>
                                                            <td colspan="3">
                                                                Any other Upload
                                                                <?php if ($mRecord['svr_others']) { ?>
                                                                    <br>
                                                                    <a class="btn btn-sm btn-primary" download="" href="<?php echo base_url('uploads/' . $mRecord['svr_others']); ?>">Downlaod</a>
                                                                <?php } ?>
                                                            </td>
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

    </body>
</html>