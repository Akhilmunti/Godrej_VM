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
                                        Bidder List Approval
                                    </h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a class="btn btn-primary" href="<?php echo base_url('buyer/pending/shortlisting'); ?>">
                                        Pending Approvals
                                    </a>
                                    <a class="btn btn-primary" href="<?php echo base_url('buyer/vendor/dashboard'); ?>">
                                        Back to Dashboard
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <form action="<?php echo base_url('buyer/pending/filter'); ?>" method="POST">
                                            <div class="row mb-3">
                                                <div class="col-md-2">
                                                    <select required="" class="form-control" name="award_type" id="award_type">
                                                        <option selected="" value="" disabled="">Type</option>
                                                        <option <?php
                                                        if ($award_type == "All") {
                                                            echo 'selected';
                                                        }
                                                        ?> value="All">All</option>
                                                        <option <?php
                                                        if ($award_type == "Contract") {
                                                            echo 'selected';
                                                        }
                                                        ?> value="Contract">Contract</option>
                                                        <option <?php
                                                        if ($award_type == "Procurement") {
                                                            echo 'selected';
                                                        }
                                                        ?> value="Procurement">Procurement</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <select class="form-control" name="status" id="status">
                                                        <option selected="" value="" disabled="">Status</option>
                                                        <option <?php
                                                        if ($status == "All") {
                                                            echo 'selected';
                                                        }
                                                        ?> value="All">All</option>
                                                        <option <?php
                                                        if ($status == "Pending") {
                                                            echo 'selected';
                                                        }
                                                        ?> value="Pending">Pending</option>
                                                        <option <?php
                                                        if ($status == "Approved") {
                                                            echo 'selected';
                                                        }
                                                        ?> value="Approved">Approved</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">

                                                    <?php
                                                    $mSessionRole = $this->session->userdata('session_role');
                                                    if ($mSessionRole == "COO" || $mSessionRole == "Managing Director" || $mSessionRole == "Head of Contracts & Procurement" || $mSessionRole == "HO - C&P" || $mSessionRole == "HO Operations") {
                                                        $mEnableZone = "";
                                                    } else {
                                                        $mEnableZone = "readonly";
                                                    }
                                                    ?>

                                                    <select <?php echo $mEnableZone; ?> class="form-control" name="zone" id="zone">
                                                        <option selected="" value="" disabled="">Zone</option>
                                                        <option <?php
                                                        if ($zone == "NCR") {
                                                            echo 'selected';
                                                        }
                                                        ?> value="NCR">NCR</option>
                                                        <option <?php
                                                        if ($zone == "Mumbai") {
                                                            echo 'selected';
                                                        }
                                                        ?> value="Mumbai">Mumbai</option>
                                                        <option <?php
                                                        if ($zone == "Kolkata") {
                                                            echo 'selected';
                                                        }
                                                        ?> value="Kolkata">Kolkata</option>
                                                        <option <?php
                                                        if ($zone == "HO") {
                                                            echo 'selected';
                                                        }
                                                        ?> value="HO">HO</option>
                                                        <option <?php
                                                        if ($zone == "Pune") {
                                                            echo 'selected';
                                                        }
                                                        ?> value="Pune">Pune</option>
                                                        <option <?php
                                                        if ($zone == "South") {
                                                            echo 'selected';
                                                        }
                                                        ?> value="South">South</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="projects" id="projects" class="form-control">
                                                        <option disabled="" selected="">Select Project</option>
                                                        <option <?php
                                                        if ($project == "All") {
                                                            echo "selected";
                                                        }
                                                        ?> value="All">All</option>
                                                            <?php foreach ($projects as $key => $pro) { ?>
                                                            <option <?php
                                                            if ($project['project_id'] == $pro['project_id']) {
                                                                echo "selected";
                                                            }
                                                            ?> value="<?php echo $pro['project_id']; ?>">
                                                                    <?php echo $pro['project_name']; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="submit" class="btn btn-sm btn-primary btn-block mt-1">
                                                        Filter
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                        <hr>

                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>SL No</th>
                                                        <th>Bidder List Type</th>
                                                        <?php
                                                        $mSessionRole = $this->session->userdata('session_role');
                                                        if ($mSessionRole == "COO" || $mSessionRole == "Managing Director" || $mSessionRole == "Head of Contracts & Procurement" || $mSessionRole == "HO - C&P" || $mSessionRole == "HO Operations") {
                                                            ?>
                                                            <th>Zone</th>
                                                        <?php } ?>
                                                        <th>Project</th>
                                                        <th>Package</th>
                                                        <th>Scope of work</th>
<!--                                                        <th>EOI Status</th>
                                                        <th>Bid capacity</th>-->
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

                                                        if ($mRecord['eoi_for'] == "Contracts") {
                                                            $mCheckShorlisting = $this->short->getParentByEoiKey($mRecord['eoi_id']);
                                                        } else {
                                                            $mCheckShorlisting = $this->shortpro->getParentByEoiKey($mRecord['eoi_id']);
                                                        }

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

                                                        if (in_array($mSessionKey, $mApprovedBy)) {
                                                            $mBtnAction = "View";
                                                        } else {
                                                            $mBtnAction = "Approve";
                                                        }
                                                        ?>


                                                        <?php if ($mSessionKey == $mRecord['eoi_buyer_id'] || in_array($mSessionKey, $mApprovers)) { ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $mCount; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $mRecord['eoi_for']; ?>
                                                                </td>
                                                                <?php
                                                                $mSessionRole = $this->session->userdata('session_role');
                                                                if ($mSessionRole == "COO" || $mSessionRole == "Managing Director" || $mSessionRole == "Head of Contracts & Procurement" || $mSessionRole == "HO - C&P" || $mSessionRole == "HO Operations") {
                                                                    ?>
                                                                    <td>
                                                                        <?php echo $mRecord['eoi_zone']; ?>
                                                                    </td>
                                                                <?php } ?>

                                                                <td style="overflow-wrap: break-word !important;max-width: 80px !important">
                                                                    <?php echo $mRecord['project_name']; ?>
                                                                </td>
                                                                <td style="overflow-wrap: break-word !important;max-width: 150px !important">
                                                                    <?php echo $mRecord['name']; ?>
                                                                </td>
                                                                <td style="overflow-wrap: break-word !important;max-width: 200px !important">
                                                                    <?php if ($mRecord['eoi_for'] == "Contracts") { ?>
                                                                        <?php echo $mCheckShorlisting['s_sow']; ?>
                                                                    <?php } else { ?>
                                                                        <?php echo $mCheckShorlisting['s_sow']; ?>
                                                                    <?php } ?>
                                                                </td>
                                                                <td style="overflow-wrap: break-word !important;max-width: 100px !important">
                                                                    <?php if (!empty($mCheckShorlisting)) { ?>
                                                                        <?php if (empty($mApprovedBy)) { ?>
                                                                            <button title="<?php echo $mSentBtnTitle; ?>" class="btn btn-xs btn-success mb-1">
                                                                                Sent
                                                                            </button>
                                                                        <?php } else { ?>
                                                                            <?php foreach ($mAppBuyers as $key => $value) { ?>
                                                                                <span class="btn btn-xs btn-dark mb-1">
                                                                                    Approved By : <?php echo $value; ?>
                                                                                </span>
                                                                            <?php } ?>
                                                                            <?php foreach ($mRejBuyers as $key => $value) { ?>
                                                                                <span class="btn btn-xs btn-dark mb-1">
                                                                                    Rejected By : <?php echo $value; ?>
                                                                                </span>
                                                                            <?php } ?>
                                                                            <?php if (!empty($mReturnedBy) && $mCheckShorlisting['s_returned_comment_to'] == "") { ?>
                                                                                <span class="btn btn-xs btn-danger mb-1">
                                                                                    Returned By : <?php echo $mReturnedBy['buyer_name']; ?>
                                                                                    |
                                                                                    Comment : <?php echo $mCheckShorlisting['s_returned_comment_from']; ?>
                                                                                </span>
                                                                            <?php } ?>
                                                                            <?php if ($mCheckShorlisting['s_returned_comment_to'] != "") { ?>
                                                                                <span class="btn btn-xs btn-success mb-1">
                                                                                    Re-Approved By : <?php echo $mReApprovedBy['buyer_name']; ?>
                                                                                    |
                                                                                    Comment : <?php echo $mCheckShorlisting['s_returned_comment_to']; ?>
                                                                                </span>
                                                                            <?php } ?>
                                                                            <?php foreach ($mPendingBuyers as $key => $value) { ?>
                                                                                <span class="btn btn-xs btn-warning mb-1">
                                                                                    Pending From : <?php echo $value; ?>
                                                                                </span>
                                                                            <?php } ?>
                                                                            <?php if ($mRecord['eoi_status'] == 9) { ?>
                                                                                <span class="btn btn-xs btn-success mb-1">
                                                                                    Approved
                                                                                </span>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    <?php } else { ?>
                                                                        <?php if ($mRecord['eoi_status'] == 2) { ?>
                                                                            <span class="btn btn-xs btn-warning mb-1">
                                                                                Pending
                                                                            </span>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <?php if ($mRecord['eoi_for'] == "Contracts") { ?>
                                                                        <?php if (!empty($mRejBuyers)) { ?>
                                                                            <a href="<?php echo base_url('buyer/vendor/refloatApproval/' . $mRecord['eoi_id']); ?>" class="btn btn-xs btn-primary btn-block">
                                                                                Refloat approval
                                                                            </a>
                                                                        <?php } ?>
                                                                        <?php if ($mSessionKey == $mRecord['eoi_buyer_id']) { ?>
                                                                            <?php if (empty($mCheckShorlisting)) { ?>
                                                                                <a href="<?php echo base_url('buyer/vendor/shortlistApproval/' . $mRecord['eoi_id']); ?>" class="btn btn-xs btn-primary btn-block">
                                                                                    Send for approval
                                                                                </a>
                                                                            <?php } ?>
                                                                        <?php } else { ?>
                                                                            <a href="<?php echo base_url('buyer/vendor/approveShortlisting/' . $mRecord['eoi_id']); ?>" class="btn btn-xs btn-primary btn-block">
                                                                                <?php echo $mBtnAction; ?>
                                                                            </a>
                                                                        <?php } ?>
                                                                    <?php } else { ?>
                                                                        <?php if (!empty($mRejBuyers)) { ?>
                                                                            <a href="<?php echo base_url('buyer/vendor/refloatApprovalProcurement/' . $mRecord['eoi_id']); ?>" class="btn btn-xs btn-primary btn-block">
                                                                                Refloat approval
                                                                            </a>
                                                                        <?php } ?>
                                                                        <?php if ($mSessionKey == $mRecord['eoi_buyer_id']) { ?>
                                                                            <?php if (empty($mCheckShorlisting)) { ?>
                                                                                <a href="<?php echo base_url('buyer/vendor/shortlistApprovalProcurement/' . $mRecord['eoi_id']); ?>" class="btn btn-xs btn-primary btn-block">
                                                                                    Send for approval
                                                                                </a>
                                                                            <?php } ?>
                                                                        <?php } else { ?>
                                                                            <a href="<?php echo base_url('buyer/vendor/approveShortlistingProcurement/' . $mRecord['eoi_id']); ?>" class="btn btn-xs btn-primary btn-block">
                                                                                <?php echo $mBtnAction; ?>
                                                                            </a>
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

        <script>
            $('#zone').change(function () {
                $.post("<?php echo base_url('home/getProjectsByZoneForVendorLogs'); ?>",
                        {
                            id: this.value,
                        },
                        function (data, status) {
                            $('#projects').html(data);
                        });
            });
        </script>

    </body>
</html>