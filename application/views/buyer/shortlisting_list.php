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
                                    <h3 class="page-title br-0">
                                        Shortlisting 
                                    </h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <span class="mr-3"><?php echo $project['project_name']; ?> / Contracts / <?php echo $tow['name']; ?></span>
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
                                                        <th>Scope of work</th>
                                                        <th>Estimated Value of Work (In Crores)</th>
                                                        <th>Timeline</th>
                                                        <th>EOI Status</th>
                                                        <th>Bid capacity</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $mCount = 0;
                                                    foreach ($mRecords as $key => $mRecord) {
                                                        $mCount++;
                                                        $mApprovedVendors = array();
                                                        $mAppBuyers = array();
                                                        $mRejBuyers = array();
                                                        $mPendingBuyers = array();
                                                        $mSessionKey = $this->session->userdata('session_id');
                                                        $mAccepted = json_decode($mRecord['eoi_accepted_by']);
                                                        foreach ($mAccepted as $key => $mAcc) {
                                                            $mVendor = $this->vendor->getParentByKey($mAcc);
                                                            $mApprovedVendors[] = $mVendor['user_name'];
                                                        }
                                                        $mCheckShorlisting = $this->short->getParentByEoiKey($mRecord['eoi_id']);
                                                        $mApprovers = json_decode($mCheckShorlisting['s_approvers']);
                                                        $mApprovedBy = json_decode($mCheckShorlisting['s_approved_by']);
                                                        foreach ($mApprovers as $key => $mApprover) {
                                                            if (in_array($mApprover, $mApprovedBy)) {
                                                                $mBuyer = $this->buyer->getParentByKey($mApprover);
                                                                $mAppBuyers[] = $mBuyer['buyer_name'];
                                                            } else {
                                                                $mBuyer = $this->buyer->getParentByKey($mApprover);
                                                                $mPendingBuyers[] = $mBuyer['buyer_name'];
                                                            }
                                                        }
                                                        $mRejectedBy = json_decode($mCheckShorlisting['s_rejected_by']);
                                                        foreach ($mRejectedBy as $key => $mAcc) {
                                                            $mBuyer = $this->buyer->getParentByKey($mAcc);
                                                            $mRejBuyers[] = $mBuyer['buyer_name'];
                                                        }

                                                        $mReturnedBy = $this->buyer->getParentByKey($mCheckShorlisting['s_returned_by']);
                                                        $mReApprovedBy = $this->buyer->getParentByKey($mCheckShorlisting['s_returned_to']);

                                                        $mCheckBidCapacity = $this->bc->getParentByEoiId($mRecord['eoi_id']);

                                                        $mSentBtnTitle = "";
                                                        $mCountApprovers = count($mApprovers);
                                                        $mCountApp = 0;
                                                        foreach ($mApprovers as $key => $value) {
                                                            $mCountApp++;
                                                            $mBuyer = $this->buyer->getParentByKey($value);
                                                            if ($mCountApprovers == $mCountApp) {
                                                                $mSentBtnTitle = $mSentBtnTitle . $mCountApp . " : " . $mBuyer['buyer_name'];
                                                            } else {
                                                                $mSentBtnTitle = $mSentBtnTitle . $mCountApp . " : " . $mBuyer['buyer_name'] . ", ";
                                                            }
                                                        }
                                                        ?>


                                                        <?php if ($mSessionKey == $mRecord['eoi_buyer_id'] || in_array($mSessionKey, $mApprovers)) { ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $mCount; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $mRecord['eoi_scope']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $mRecord['eoi_budget']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    echo date('d-F-Y', strtotime($mRecord['eoi_start_date'])) . " to ";
                                                                    ?>
                                                                    <?php
                                                                    echo date('d-F-Y', strtotime("+" . $mRecord['eoi_schedule'] . " months", strtotime($mRecord['eoi_start_date'])));
                                                                    ;
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php if (!empty($mApprovedVendors)) { ?>
                                                                        <?php foreach ($mApprovedVendors as $key => $value) { ?>
                                                                            <span class="btn btn-xs btn-dark">
                                                                                Accepted By : <?php echo $value; ?>
                                                                            </span>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <?php if (!empty($mApprovedVendors)) { ?>
                                                                        <?php
                                                                        foreach ($mAccepted as $key => $value) {
                                                                            $mBidData = $this->bc->getParentByVendorIdAndEoiId($value, $mRecord['eoi_id']);
                                                                            ?>
                                                                            <a href="<?php echo base_url('buyer/vendor/viewBidCapacity/' . $value . "/" . $mRecord['eoi_id']); ?>" class="btn btn-xs btn-dark">
                                                                                Sent By : <?php echo $mApprovedVendors[$key]; ?> | Bid Capacity : <?php echo round($mBidData['bc_score'], 2); ?>
                                                                            </a>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <?php if (!empty($mCheckShorlisting)) { ?>
                                                                        <?php if (empty($mApprovedBy)) { ?>
                                                                            <button title="<?php echo $mSentBtnTitle; ?>" class="btn btn-xs btn-success">
                                                                                Sent
                                                                            </button>
                                                                        <?php } else { ?>
                                                                            <?php foreach ($mAppBuyers as $key => $value) { ?>
                                                                                <span class="btn btn-xs btn-dark">
                                                                                    Approved By : <?php echo $value; ?>
                                                                                </span>
                                                                            <?php } ?>
                                                                            <?php foreach ($mRejBuyers as $key => $value) { ?>
                                                                                <span class="btn btn-xs btn-dark">
                                                                                    Rejected By : <?php echo $value; ?>
                                                                                </span>
                                                                            <?php } ?>

                                                                            <?php if ($mCheckShorlisting['s_returned_comment_to'] != "") { ?>
                                                                                <span class="btn btn-xs btn-success">
                                                                                    Re-Approved By : <?php echo $mReApprovedBy['buyer_name']; ?>
                                                                                    |
                                                                                    Comment : <?php echo $mCheckShorlisting['s_returned_comment_to']; ?>
                                                                                </span>
                                                                            <?php } ?>
                                                                            <?php foreach ($mPendingBuyers as $key => $value) { ?>
                                                                                <span class="btn btn-xs btn-warning">
                                                                                    Pending From : <?php echo $value; ?>
                                                                                </span>
                                                                            <?php } ?>
                                                                            <?php if ($mRecord['eoi_status'] == 9) { ?>
                                                                                <span class="btn btn-xs btn-success">
                                                                                    Approved
                                                                                </span>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    <?php } else { ?>
                                                                        <?php if ($mRecord['eoi_status'] == 2) { ?>
                                                                            <span class="btn btn-xs btn-warning">
                                                                                Pending
                                                                            </span>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                    <?php if (!empty($mReturnedBy) && $mCheckShorlisting['s_returned_comment_to'] == "") { ?>
                                                                        <span class="btn btn-xs btn-danger">
                                                                            Returned By : <?php echo $mReturnedBy['buyer_name']; ?>
                                                                            |
                                                                            Comment : <?php echo $mCheckShorlisting['s_returned_comment_from']; ?>
                                                                        </span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <?php if (!empty($mAccepted)) { ?>
                                                                        <a href="<?php echo base_url('buyer/vendor/approveShortlisting/' . $mRecord['eoi_id']); ?>" class="btn btn-xs btn-primary btn-block">
                                                                            View
                                                                        </a>
                                                                    <?php } ?>
                                                                    <?php if (!empty($mRejBuyers)) { ?>
                                                                        <a href="<?php echo base_url('buyer/vendor/refloatApproval/' . $mRecord['eoi_id']); ?>" class="btn btn-xs btn-primary btn-block">
                                                                            Refloat approval
                                                                        </a>
                                                                    <?php } ?>
                                                                    <?php if (!empty($mCheckBidCapacity)) { ?>
                                                                        <?php if ($mSessionKey == $mRecord['eoi_buyer_id']) { ?>
                                                                            <?php if (empty($mCheckShorlisting)) { ?>
                                                                                <a href="<?php echo base_url('buyer/vendor/shortlistApproval/' . $mRecord['eoi_id']); ?>" class="btn btn-xs btn-primary btn-block">
                                                                                    Send for approval
                                                                                </a>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>

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
                    alert("Success.");
                    // Save it!
//                    var selectedPr = sel.value;
//                    $.post("<?php echo base_url('buyer/vendor/makePr'); ?>",
//                            {
//                                buyer_id: selectedId,
//                                pr: selectedPr,
//                            },
//                            function (data, status) {
//                                if (data == "1") {
//                                    location.reload();
//                                } else {
//                                    alert("Something went wrong, Please try again later.");
//                                }
//                            });
                } else {
                    // Do nothing!
                    console.log('Thing was not saved to the database.');
                }
            }
        </script>

    </body>
</html>