<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('vendor/partials/header'); ?>

    <body class="hold-transition light-skin sidebar-mini theme-blueindigo onlyheader">

        <div class="wrapper">

            <div class="art-bg">
                <img src="<?php echo base_url('assets/'); ?>images/art1.svg" alt="" class="art-img light-img">
                <img src="<?php echo base_url('assets/'); ?>images/art2.svg" alt="" class="art-img dark-img">
                <img src="<?php echo base_url('assets/'); ?>images/art-bg.svg" alt="" class="wave-img light-img">
                <img src="<?php echo base_url('assets/'); ?>images/art-bg2.svg" alt="" class="wave-img dark-img">
            </div>

            <?php $this->load->view('vendor/partials/navbar'); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full clearfix position-relative">	

                    <?php $this->load->view('vendor/partials/sidebar'); ?>

                    <!-- Main content -->
                    <section class="content">

                        <!-- Content Header (Page header) -->	  
                        <div class="content-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="page-title br-0">EOI</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <?php $this->load->view('vendor/partials/alerts'); ?>
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>

                                                    <tr>
                                                        <th>#</th>
<!--                                                        <th>Type of agency</th>-->
                                                        <th>Package name</th>
                                                        <th>Project</th>
                                                        <th>Scope of work</th>
                                                        <th>Estimated Start Date</th>
                                                        <th>Completion Schedule (Number of Months)</th>
                                                        <th>EOI</th>
                                                        <th>Bid capacity</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $mCount = 0;
                                                    foreach ($mRecords as $key => $mRecord) {
                                                        $mSessionKey = $this->session->userdata('session_vendor_id');
                                                        $mCount++;
                                                        $mRejectedVendors = array();
                                                        $mApprovedVendors = array();
                                                        $mStartDate = strtotime($mRecord['eoi_start_date']);
                                                        $mStartDate = date("d-m-Y", $mStartDate);
                                                        if ($mRecord['eoi_status'] == 10) {
                                                            $mRejected = json_decode($mRecord['eoi_rejected_by']);
                                                            foreach ($mRejected as $key => $mRej) {
                                                                $mVendor = $this->vendor_model->getParentByKey($mRej);
                                                                $mRejectedVendors[] = $mVendor['user_name'];
                                                            }
                                                        }
                                                        $mCheckStatus = $this->ev->getParentByVendorIdAndEoiId($mRecord['eoi_id']);
                                                        $mCheckBidCapacity = $this->bc->getParentByVendorIdAndEoiId($mSessionKey, $mRecord['eoi_id']);
                                                        $mAccepted = json_decode($mRecord['eoi_accepted_by']);
                                                        //print_r($mCheckStatus);
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $mCount; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $mRecord['name']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $mRecord['project_name']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $mRecord['eoi_scope']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $mStartDate; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $mRecord['eoi_schedule']; ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo base_url('vendor/home/viewEoi/' . $mRecord['eoi_id'] . "/" . $mRecord['ev_id']); ?>" class="btn btn-xs btn-info btn-block">View</a>
                                                            </td>
                                                            <td>
                                                                <?php if ($mCheckStatus['ev_status'] == 0) { ?>
                                                                    <a href="#" class="btn btn-xs btn-warning">
                                                                        EOI Pending
                                                                    </a>
                                                                <?php } else if ($mRecord['eoi_status'] == 10) { ?>
                                                                    <?php if (!empty($mRejectedVendors)) { ?>
                                                                        <?php foreach ($mRejectedVendors as $key => $value) { ?>
                                                                            <span class="btn btn-xs btn-danger">
                                                                                Rejected
                                                                            </span>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                <?php } else if (in_array($mSessionKey, $mAccepted) && ($mCheckStatus['ev_status'] == 1 || !empty($mCheckBidCapacity))) { ?>
                                                                    <a href="<?php echo base_url('vendor/home/viewBidCapacity/' . $mRecord['eoi_id']); ?>" class="btn btn-xs btn-primary btn-block">
                                                                        Bid Capacity Sent 
                                                                    </a>
                                                                <?php } else if (in_array($mSessionKey, $mAccepted) && ($mCheckStatus['ev_status'] == 1 || empty($mCheckBidCapacity))) { ?>
                                                                    <a href="<?php echo base_url('vendor/home/sendShortlisting/' . $mRecord['eoi_id']); ?>" class="btn btn-xs btn-primary btn-block">
                                                                        Enter 
                                                                    </a>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($mCheckStatus['ev_status'] == 0) { ?>
                                                                    <a href="#" class="btn btn-xs btn-warning">
                                                                        Pending
                                                                    </a>
                                                                <?php } else if ($mRecord['eoi_status'] == 10) { ?>
                                                                    <?php if (!empty($mRejectedVendors)) { ?>
                                                                        <?php foreach ($mRejectedVendors as $key => $value) { ?>
                                                                            <span class="btn btn-xs btn-danger">
                                                                                Rejected
                                                                            </span>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                <?php } else if (in_array($mSessionKey, $mAccepted) && ($mCheckStatus['ev_status'] == 1 || !empty($mCheckBidCapacity))) { ?>
                                                                    <a href="#" class="btn btn-xs btn-success">
                                                                        Accepted
                                                                    </a>
                                                                <?php } else if (in_array($mSessionKey, $mAccepted) && ($mCheckStatus['ev_status'] == 1 || empty($mCheckBidCapacity))) { ?>
                                                                    <a href="#" class="btn btn-xs btn-warning">
                                                                        Bid Capacity Pending 
                                                                    </a>
                                                                <?php } ?>
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
            <?php $this->load->view('vendor/partials/footer'); ?>

            <!-- Control Sidebar -->
            <?php $this->load->view('vendor/partials/control'); ?>
            <!-- /.control-sidebar -->

            <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

        </div>
        <!-- ./wrapper -->

        <?php $this->load->view('vendor/partials/scripts'); ?>

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

            $('#submit_eoi').on('click', function () {
                $('.select_details_eoi').modal('toggle');
                $("#send_short").removeAttr("disabled");
                $("#accept_eoi").attr("disabled", true);
            });

            document.getElementById("send_short").onclick = function () {
                location.href = "<?php echo base_url('vendor/home/sendShortlisting'); ?>";
            };

        </script>

    </body>
</html>