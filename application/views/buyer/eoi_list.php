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
                                        EOI 
                                    </h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <span class="mr-3"><?php echo $project['project_name']; ?> / Contracts / <?php echo $tow['name']; ?></span>

                                    <?php
                                    $mSessionRole = $this->session->userdata('session_role');
                                    if ($mSessionRole == "HO - C&P" || $mSessionRole == "Regional C&P Head" || $mSessionRole == "Regional C&P Team" || $mSessionRole == "PCM") {
                                        ?>
                                        <a href="<?php echo base_url('buyer/vendor/addEoi/' . $project['project_id'] . "/" . $zone . "/" . $type . "/" . $for . "/" . $tow['id']); ?>" class="btn btn-primary">Add</a>
                                    <?php } ?>

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
                                                        <!--<th>Budget (In Crores)</th>
                                                        <th>Timeline in months</th>
                                                        <th>Shortlisted Vendors / Financial Categorization</th>
                                                        <th>Justification</th>-->
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $mCount = 0;
                                                    foreach ($mRecords as $key => $mRecord) {
                                                        $mCount++;
                                                        $mRejectedVendors = array();
                                                        $mApprovedVendors = array();
                                                        $mTow = $this->register->getWorkById($mRecord['eoi_tow']);
                                                        if ($mRecord['eoi_status'] == 10) {
                                                            $mRejected = json_decode($mRecord['eoi_rejected_by']);
                                                            foreach ($mRejected as $key => $mRej) {
                                                                $mVendor = $this->vendor->getParentByKey($mRej);
                                                                $mRejectedVendors[] = $mVendor['user_name'];
                                                            }
                                                        }
                                                        $mAccepted = json_decode($mRecord['eoi_accepted_by']);
                                                        foreach ($mAccepted as $key => $mAcc) {
                                                            $mVendor = $this->vendor->getParentByKey($mAcc);
                                                            $mApprovedVendors[] = $mVendor['user_name'];
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $mCount; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $mRecord['eoi_scope']; ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($mRecord['eoi_status'] == 0) { ?>
                                                                    <span class="btn btn-xs btn-dark">
                                                                        EOI Sent
                                                                    </span>
                                                                    <?php if (!empty($mApprovedVendors)) { ?>
                                                                        <?php foreach ($mApprovedVendors as $key => $value) { ?>
                                                                            <span class="btn btn-xs btn-dark">
                                                                                Accepted By : <?php echo $value; ?>
                                                                            </span>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                    <?php if (!empty($mRejectedVendors)) { ?>
                                                                        <?php foreach ($mRejectedVendors as $key => $value) { ?>
                                                                            <span class="btn btn-xs btn-dark">
                                                                                Rejected By : <?php echo $value; ?>
                                                                            </span>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                <?php } else if ($mRecord['eoi_status'] == 1) { ?>
                                                                    <?php if (!empty($mApprovedVendors)) { ?>
                                                                        <?php foreach ($mApprovedVendors as $key => $value) { ?>
                                                                            <span class="btn btn-xs btn-dark">
                                                                                Accepted By : <?php echo $value; ?>
                                                                            </span>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                    <?php if (!empty($mRejectedVendors)) { ?>
                                                                        <?php foreach ($mRejectedVendors as $key => $value) { ?>
                                                                            <span class="btn btn-xs btn-dark">
                                                                                Rejected By : <?php echo $value; ?>
                                                                            </span>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                <?php } else if ($mRecord['eoi_status'] == 10) { ?>
                                                                    <?php if (!empty($mRejectedVendors)) { ?>
                                                                        <?php foreach ($mRejectedVendors as $key => $value) { ?>
                                                                            <span class="btn btn-xs btn-dark">
                                                                                Rejected By : <?php echo $value; ?>
                                                                            </span>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                    <?php if (!empty($mApprovedVendors)) { ?>
                                                                        <?php foreach ($mApprovedVendors as $key => $value) { ?>
                                                                            <span class="btn btn-xs btn-dark">
                                                                                Accepted By : <?php echo $value; ?>
                                                                            </span>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                <?php } else if ($mRecord['eoi_status'] == 2) { ?>
                                                                    <span class="btn btn-xs btn-dark">
                                                                        Bid Capacity sent by vendor
                                                                    </span>
                                                                    <?php foreach ($mApprovedVendors as $key => $value) { ?>
                                                                        <span class="btn btn-xs btn-dark">
                                                                            Accepted By : <?php echo $value; ?>
                                                                        </span>
                                                                    <?php } ?>
                                                                <?php } else if ($mRecord['eoi_status'] == 9) { ?>
                                                                    <span class="btn btn-xs btn-dark">
                                                                        Shortlisting Approved
                                                                    </span>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo base_url('buyer/vendor/viewEoi/' . $mRecord['eoi_id']); ?>" class="btn btn-xs btn-primary">
                                                                    View
                                                                </a>
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