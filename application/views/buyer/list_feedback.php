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
                                    <h3 class="page-title br-0">Feedback Management</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>SL No</th>
                                                        <th>Actions</th>
                                                        <th>Transfer</th>
                                                        <th>Pending From</th>
                                                        <th>Project</th>
                                                        <th>Type of contract</th>
                                                        <th>Agency Name</th>
                                                        <th>Purchase Organization</th>
                                                        <th>WO Number</th>
                                                        <th>PO City</th>
                                                        <th>Average FB Score</th>
                                                        <th>Latest FB Score</th>
                                                        <th>Latest FB Date</th>
                                                        <th>Download WO/PO</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $mFeedbackScore = "";
                                                    foreach ($records as $key => $record) {
                                                        $mSessionKey = $this->session->userdata('session_id');
                                                        $mLatestFeedbackDate = strtotime($record['feedback_lfd']);
                                                        $mLatestFeedbackDate = date("d-m-Y", $mLatestFeedbackDate);
                                                        $mPrRecord = $this->buyer->getParentByKey($record['feedback_pm']);
                                                        $mTransRecord = $this->buyer->getParentByKey($record['feedback_transfer']);
                                                        $mFormRecord = $this->feedbackforms->getParentByTypeAndFeedbackId($record['feedback_id'], $record['feedback_user_type']);
                                                        if (!empty($mFormRecord)) {
                                                            $mFormRecordDate = strtotime($mFormRecord['ff_date_added']);
                                                            $mFormRecordDate = date("d-m-Y H:i:s", $mFormRecordDate);
                                                        } else {
                                                            $mFormRecordDate = "";
                                                        }
                                                        $mFeedback = $this->feedback->getParentByPanKey($record['feedback_pan']);
                                                        if (!empty($mFeedback)) {
                                                            $mFormRecord = $this->feedbackforms->getAllParentByTypeAndFeedbackId($mFeedback['feedback_id']);
                                                            if (!empty($mFormRecord)) {
                                                                $mTotalScore = 0;
                                                                foreach ($mFormRecord as $key => $value) {
                                                                    $mTotalScore += $value['ff_final_score'];
                                                                }
                                                                $mFeedbackScore = $mTotalScore / count($mFormRecord);
                                                            } else {
                                                                $mFeedbackScore = "-";
                                                            }
                                                        } else {
                                                            $mFeedbackScore = "-";
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $key + 1; ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($record['feedback_transfer'] != "" && $record['feedback_pm'] == $mSessionKey) { ?>
                                                                    <a href="#" class="btn btn-primary btn-xs">
                                                                        <?php echo $mTransRecord['buyer_name']; ?>
                                                                    </a>
                                                                <?php } else { ?>
                                                                    <?php if ($record['feedback_user_type'] == "1") { ?>
                                                                        <!--Vendor-->
                                                                        <?php if (!empty($mFormRecord)) { ?>
                                                                            <a style="width: 200px" href="<?php echo base_url('buyer/vendor/viewFeedbackVendor/' . $record['feedback_id']); ?>" class="btn btn-xs btn-dark btn-block">
                                                                                View </br> Score : <?php echo $mFormRecord['ff_final_score']; ?> </br> Date : <?php echo $mFormRecordDate; ?>
                                                                            </a>
                                                                        <?php } else { ?>
                                                                            <a href="<?php echo base_url('buyer/vendor/feedbackVendor/' . $record['feedback_id']); ?>" class="btn btn-xs btn-primary btn-block">
                                                                                Add Feedback
                                                                            </a>
                                                                        <?php } ?>
                                                                    <?php } else if ($record['feedback_user_type'] == "3") { ?>
                                                                        <!--Contractor-->
                                                                        <?php if (!empty($mFormRecord)) { ?>
                                                                            <a style="width: 200px" href="<?php echo base_url('buyer/vendor/viewFeedbackContractor/' . $record['feedback_id']); ?>" class="btn btn-xs btn-dark btn-block">
                                                                                View </br> Score : <?php echo $mFormRecord['ff_final_score']; ?> </br> Date : <?php echo $mFormRecordDate; ?>
                                                                            </a>
                                                                        <?php } else { ?>
                                                                            <a href="<?php echo base_url('buyer/vendor/feedbackContractor/' . $record['feedback_id']); ?>" class="btn btn-xs btn-primary btn-block">
                                                                                Add Feedback
                                                                            </a>
                                                                        <?php } ?>
                                                                    <?php } else if ($record['feedback_user_type'] == "4") { ?>
                                                                        <!--Consultant-->
                                                                        <?php if (!empty($mFormRecord)) { ?>
                                                                            <a style="width: 200px" href="<?php echo base_url('buyer/vendor/viewFeedbackConsultant/' . $record['feedback_id']); ?>" class="btn btn-xs btn-dark btn-block">
                                                                                View </br> Score : <?php echo $mFormRecord['ff_final_score']; ?> </br> Date : <?php echo $mFormRecordDate; ?>
                                                                            </a>
                                                                        <?php } else { ?>
                                                                            <a href="<?php echo base_url('buyer/vendor/feedbackConsultant/' . $record['feedback_id']); ?>" class="btn btn-xs btn-primary btn-block">
                                                                                Add Feedback
                                                                            </a>
                                                                        <?php } ?>
                                                                    <?php } else if ($record['feedback_pan'] == "AADCD6828K" || $record['feedback_pan'] == "AAOFK9727G" || $record['feedback_pan'] == "AAGFD8936N" || $record['feedback_pan'] == "AABFU7718C" || $record['feedback_pan'] == "AOFPP6421F" || $record['feedback_pan'] == "AACCM6619G" || $record['feedback_pan'] == "AAACB3253B") { ?>
                                                                        <!--Alluminium-->
                                                                        <?php if (!empty($mFormRecord)) { ?>
                                                                            <a style="width: 200px" href="<?php echo base_url('buyer/vendor/viewFeedbackAluminium/' . $record['feedback_id']); ?>" class="btn btn-xs btn-dark btn-block">
                                                                                View </br> Score : <?php echo $mFormRecord['ff_final_score']; ?> </br> Date : <?php echo $mFormRecordDate; ?>
                                                                            </a>
                                                                        <?php } else { ?>
                                                                            <a href="<?php echo base_url('buyer/vendor/feedbackAluminium/' . $record['feedback_id']); ?>" class="btn btn-xs btn-primary btn-block">
                                                                                Add Feedback
                                                                            </a>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($record['feedback_transfer'] == "" && $record['feedback_pm'] == $mSessionKey) { ?>
                                                                    <select style="width: 150px" onchange="getSelectedPr(this, '<?php echo $record['feedback_id'] ?>');" id="select_pr_<?php echo $mRecord['buyer_id']; ?>" class="form-control form-control-sm mt-2" name="pr">
                                                                        <option selected="" value="">Select Project Manager</option>
                                                                        <?php foreach ($mPrs as $key => $mPr) { ?>
                                                                            <option value="<?php echo $mPr['buyer_id'] ?>"><?php echo $mPr['buyer_name'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                <?php } else { ?>
                                                                    <a href="#" class="btn btn-dark btn-xs">
                                                                        <?php echo "Transferred from " . $mPrRecord['buyer_name']; ?>
                                                                    </a>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $record['feedback_zone']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $record['feedback_purchase']; ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($mFeedbackScore == "-") { ?>
                                                                    <a href="#" class="btn btn-success btn-sm">
                                                                        <?php echo $record['feedback_vendor_details']; ?>
                                                                    </a>
                                                                <?php } else { ?>
                                                                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#vendor_details_<?php echo $key + 1; ?>">
                                                                        <?php echo $record['feedback_vendor_details']; ?>
                                                                    </a>
                                                                    <div class="modal fade vendor_details_<?php echo $key + 1; ?>" data-backdrop="false" id="vendor_details_<?php echo $key + 1; ?>" tabindex="-1">
                                                                        <div class="modal-dialog modal-lg">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title text-bold">
                                                                                        <?php echo $record['feedback_vendor_details']; ?>
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="panel-body border border-info">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">

                                                                                                <table class="table">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th>
                                                                                                                #
                                                                                                            </th>
                                                                                                            <th>
                                                                                                                Q1
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <?php
                                                                                                        $mTotalScore = 0;
                                                                                                        foreach ($mFormRecord as $key => $mFfRecord) {
                                                                                                            $mTotalScore += $mFfRecord['ff_final_score'];
                                                                                                            ?>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <?php echo $mFfRecord['ff_project']; ?>
                                                                                                                </td>

                                                                                                                <td>
                                                                                                                    <?php echo $mFfRecord['ff_final_score']; ?>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        <?php } ?>
                                                                                                    </tbody>
                                                                                                    <tfoot>
                                                                                                        <tr>
                                                                                                            <td colspan="1">
                                                                                                                Total Score
                                                                                                            </td>
                                                                                                            <td colspan="1">
                                                                                                                <b>
                                                                                                                    <?php echo $mTotalScore; ?>
                                                                                                                </b>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td colspan="1">
                                                                                                                Total Inputs
                                                                                                            </td>
                                                                                                            <td colspan="1">
                                                                                                                <b>
                                                                                                                    <?php echo count($mFormRecord); ?>
                                                                                                                </b>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td colspan="1">
                                                                                                                Average Score
                                                                                                            </td>
                                                                                                            <td colspan="1">
                                                                                                                <b>
                                                                                                                    <?php
                                                                                                                    echo $mFeedbackScore;
                                                                                                                    ?>
                                                                                                                </b>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tfoot>
                                                                                                </table>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer modal-footer-uniform">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $record['feedback_wo']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $record['feedback_wo_details']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $record['feedback_lfs']; ?>
                                                            </td>
                                                            <td>
                                                                <a href="#" data-toggle="modal" data-target="#vendor_fs_<?php echo $key + 1; ?>" class="btn btn-xs btn-dark">
                                                                    <?php echo $record['feedback_lfs']; ?>
                                                                </a>

                                                                <div class="modal fade vendor_fs_<?php echo $key + 1; ?>" data-backdrop="false" id="vendor_details_<?php echo $key + 1; ?>" tabindex="-1">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title text-bold">
                                                                                    <?php echo $record['feedback_vendor_details']; ?>
                                                                                </h5>
                                                                                <select style="width: 200px" class="form-control form-control-sm float-right" name="zone">
                                                                                    <option>Select</option>
                                                                                    <option selected="">Pan India</option>
                                                                                    <option>NCR</option>
                                                                                    <option>Mumbai</option>
                                                                                    <option>Pune</option>
                                                                                    <option>South</option>
                                                                                    <option>East</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="panel-body border border-info">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">

                                                                                            <table class="table">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>
                                                                                                            #
                                                                                                        </th>
                                                                                                        <th>
                                                                                                            Ashank Facility Mgmt
                                                                                                        </th>
                                                                                                        <th>
                                                                                                            Godrej Avamark LLP
                                                                                                        </th>
                                                                                                        <th>
                                                                                                            Godrej Green Acres
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td>
                                                                                                            Q1
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            70
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            77
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            69
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>
                                                                                                            Q2
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            70
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            77
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            69
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>
                                                                                                            Q3
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            70
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            77
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            69
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>
                                                                                                            Q4
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            70
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            77
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            69
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                                <tfoot>
                                                                                                    <tr>
                                                                                                        <td colspan="2">
                                                                                                            Total Score
                                                                                                        </td>
                                                                                                        <td colspan="2">
                                                                                                            <b>
                                                                                                                617
                                                                                                            </b>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td colspan="2">
                                                                                                            Total Inputs
                                                                                                        </td>
                                                                                                        <td colspan="2">
                                                                                                            <b>
                                                                                                                9
                                                                                                            </b>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td colspan="2">
                                                                                                            Average Score
                                                                                                        </td>
                                                                                                        <td colspan="2">
                                                                                                            <b>
                                                                                                                68.56 
                                                                                                            </b>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tfoot>
                                                                                            </table>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer modal-footer-uniform">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </td>
                                                            <td>
                                                                <?php if ($record['feedback_upload']) { ?>
                                                                    <a class="btn btn-xs btn-primary" download="" href="<?php echo base_url('uploads/' . $record['feedback_upload']); ?>">Download</a>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $mLatestFeedbackDate; ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
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

        <script type="text/javascript">
            function getSelectedPr(sel, selectedId) {
                if (confirm('Please confirm your selection')) {
                    var selectedPr = sel.value;
                    $.post("<?php echo base_url('buyer/vendor/transferFeedbackToPm'); ?>",
                            {
                                feedback_id: selectedId,
                                pm: selectedPr,
                            },
                            function (data, status) {
                                if (data == "1") {
                                    location.reload();
                                } else {
                                    alert("Something went wrong, Please try again later.");
                                }
                            });
                } else {
                    // Do nothing!
                    console.log('Thing was not saved to the database.');
                }
            }
        </script>

    </body>
</html>