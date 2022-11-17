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
                                    <h3 class="page-title br-0">Feedback Management</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <!--                                    <a href="#" data-toggle="modal" data-target="#modal-upload" class="btn btn-primary">Upload SAP Dump</a>-->
                                    <!--                                    <a href="<?php echo base_url('buyer/vendor/addFeedback'); ?>" class="btn btn-primary">Add Feedback</a>-->
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal modal-right fade" id="modal-upload" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form id="register_form" action="<?php echo base_url('buyer/vendor/importFile/'); ?>" method="POST" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Upload SAP Dump</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="appraisal_dump"> Upload Dump : <span class="danger">*</span> </label>
                                                    <input id="appraisal_dump" name="uploadFile" type="file" class="form-control" required="" />
                                                </div>
                                                <a href="<?php echo base_url('assets/sap_dump.xlsx'); ?>" download="" class="btn btn-xs btn-primary">
                                                    Download Format
                                                </a>
                                            </div>
                                            <div class="modal-footer modal-footer-uniform">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal -->
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <?php
                                        $success_dump = $this->session->flashdata('success_dump');
                                        $error_dump = $this->session->flashdata('error_dump');
                                        ?>

                                        <?php if ($error_dump) { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <?php echo $error_dump; ?>
                                            </div>
                                        <?php } ?>

                                        <form action="<?php echo base_url('buyer/vendor/filterFeedbackByType'); ?>" method="POST">
                                            <div class="row">
                                                <div class="col-md-8 ml-auto mb-2">
                                                </div>
                                                <div class="col-md-3 ml-auto mb-2">
                                                    <select  name="filter" class="form-control form-control-sm">
                                                        <option selected="" disabled="" value="">Filter By</option>
                                                        <option value="1">SAP Dump</option>
                                                        <option value="2">Pre Vendor</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-1 ml-auto mb-2">
                                                    <button type="submit" class="btn btn-primary btn-xs">Filter</button>
                                                </div>
                                            </div>
                                        </form>


                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>SL No</th>
                                                        <th>Assign</th>
<!--                                                        <th>Zone</th>-->
                                                        <th>Purchase Organization(Project Name)</th>
                                                        <th>Vendor Details/Name</th>
                                                        <th>WO Number</th>
                                                        <th>Average FB Score</th>
                                                        <th>Latest FB Score</th>
<!--                                                        <th>Download WO/PO</th>-->
                                                        <th>Latest FB Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $mCount = 0;
                                                    $mLatestFbScore = "";
                                                    $mAvgFbScore = "";
                                                    foreach ($records as $key => $record) {
                                                        $mCount++;

                                                        $mPurchaseOrg = $this->purchase_model->getParentByCode($record['feedback_purchase']);

                                                        $mPrRecord = $this->buyer->getParentByKey($record['feedback_pm']);
                                                        $mFfRecords = $this->feedbackforms->getAllParentByVendor($record['feedback_vendor_details']);
                                                        $mFormRecord = $this->feedbackforms->getParentByTypeAndFeedbackId($record['feedback_id']);

                                                        $mAllFormRecord = $this->feedbackforms->getAllParentByTypeAndFeedbackId($record['feedback_id']);
                                                        
                                                        if (!empty($mFormRecord)) {
                                                            $mFormRecordDate = strtotime($mFormRecord['ff_date_added']);
                                                            $mFormRecordDate = date("d-m-Y H:i:s", $mFormRecordDate);
                                                        } else {
                                                            $mFormRecordDate = "";
                                                        }
                                                        if ($record['feedback_user_type'] == "1") {
                                                            if (!empty($mFormRecord)) {
                                                                $mLatestFbScore = $mFormRecord['ff_final_score'];
                                                            } else {
                                                                $mLatestFbScore = "";
                                                            }
                                                        } else if ($record['feedback_user_type'] == "3") {
                                                            if (!empty($mFormRecord)) {
                                                                $mLatestFbScore = $mFormRecord['ff_final_score'];
                                                            } else {
                                                                $mLatestFbScore = "";
                                                            }
                                                        } else if ($record['feedback_user_type'] == "4") {
                                                            if (!empty($mFormRecord)) {
                                                                $mLatestFbScore = $mFormRecord['ff_final_score'];
                                                            } else {
                                                                $mLatestFbScore = "";
                                                            }
                                                        } else {
                                                            if (!empty($mFormRecord)) {
                                                                $mLatestFbScore = $mFormRecord['ff_final_score'];
                                                            } else {
                                                                $mLatestFbScore = "";
                                                            }
                                                        }

                                                        if ($mLatestFbScore) {
                                                            $mAvgFbScore = $mLatestFbScore / count($mAllFormRecord);
                                                            $mLatestFeedbackDate = strtotime($mFormRecord['ff_date_updated']);
                                                            $mLatestFeedbackDate = date("d-m-Y", $mLatestFeedbackDate);
                                                        } else {
                                                            $mLatestFeedbackDate = "";
                                                            $mAvgFbScore = "";
                                                        }

                                                        //buyer
                                                        $mFormRecord = $this->feedbackforms->getAllParentByTypeAndFeedbackId($record['feedback_id']);
                                                        if (!empty($mFormRecord)) {
                                                            $mTotalScore = 0;
                                                            foreach ($mFormRecord as $key => $value) {
                                                                $mTotalScore += $value['ff_final_score'];
                                                            }
                                                            $mFeedbackScore = $mTotalScore / count($mFormRecord);
                                                        } else {
                                                            $mFeedbackScore = "-";
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $mCount; ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($record['feedback_pm']) { ?>
                                                                    <a class="btn btn-xs btn-dark" href="#">
                                                                        <?php echo $mPrRecord['buyer_name']; ?>
                                                                    </a>
                                                                <?php } else { ?>
                                                                    <select style="width: 150px" onchange="selectPm(this, '<?php echo $record['feedback_id'] ?>');" class="form-control form-control-sm mt-2" name="pr">
                                                                        <option selected="" value="">Select Project Manager</option>
                                                                        <?php foreach ($mPrs as $key => $mPr) { ?>
                                                                            <option value="<?php echo $mPr['buyer_id'] ?>"><?php echo $mPr['buyer_name'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                <?php } ?>
                                                            </td>
    <!--                                                            <td>
                                                            <?php echo $record['feedback_zone']; ?>
                                                            </td>-->
                                                            <td>
                                                                <?php echo $mPurchaseOrg['porg_company_name']; ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($mFeedbackScore == "-") { ?>
                                                                    <a href="#" class="btn btn-success btn-sm">
                                                                        <?php echo $record['feedback_vendor_details']; ?>
                                                                    </a>
                                                                <?php } else { ?>
                                                                    <a href="<?php echo base_url('buyer/vendor/viewVendorFeedbackScores/' . $record['feedback_id']); ?>" class="btn btn-success btn-sm">
                                                                        <?php echo $record['feedback_vendor_details']; ?>
                                                                    </a>
        <!--                                                                    <div class="modal fade vendor_details_<?php echo $record['feedback_id']; ?>" data-backdrop="false" id="vendor_details_<?php echo $record['feedback_id']; ?>" tabindex="-1">
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
                                                                    </div>-->
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $record['feedback_wo']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $mAvgFbScore; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $mLatestFbScore; ?>
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

        <div class="modal fade vendor_fs_project" data-backdrop="false" id="vendor_fs_project" tabindex="-1">
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
                                                    P1
                                                </th>
                                                <th>
                                                    P2
                                                </th>
                                                <th>
                                                    P3
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Q1
                                                </td>
                                                <td>
                                                    <a href="#">
                                                        70
                                                    </a>
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

        <?php $this->load->view('buyer/partials/scripts'); ?>

        <script type="text/javascript">
            function selectPm(sel, selectedId) {
                if (confirm('Please confirm your selection')) {
                    var selectedPm = sel.value;
                    $.post("<?php echo base_url('buyer/vendor/sendFeedbackToPm'); ?>",
                            {
                                feedback_id: selectedId,
                                pm: selectedPm,
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