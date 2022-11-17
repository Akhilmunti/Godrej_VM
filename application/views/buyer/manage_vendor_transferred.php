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
                                    <h3 class="page-title br-0">Vendor Management</h3>
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
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>SL No</th>
                                                        <th>Type Of Agency</th>
                                                        <th>Package name</th>
                                                        <th>Company Name</th>
                                                        <th>Financial Categorization</th>
                                                        <th>Status</th>
                                                        <th>Site visit report</th>
                                                        <th>PQ Management</th>
                                                        <th>Stage Forms</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php if (!empty($mRecords)) { ?>

                                                        <?php
                                                        $mCount = 0;
                                                        foreach ($mRecords as $key => $mRecord) {
                                                            $mCount++;
                                                            if ($mRecord['pr']) {
                                                                $mPrRecord = $this->buyer->getParentByKey($mRecord['pr']);
                                                            } else {
                                                                $mPrRecord = "";
                                                            }

                                                            if ($mRecord['nature_of_business_id'] == 1) {
                                                                $mStageTwo = $this->vst->getParentByVendorKey($mRecord['id']);
                                                                $mPqScore = $this->pqv->getParentByVendorKey($mRecord['id']);
                                                            } else if ($mRecord['nature_of_business_id'] == 3) {
                                                                $mStageTwo = $this->cst->getParentByVendorKey($mRecord['id']);
                                                                $mPqScore = $this->pqc->getParentByVendorKey($mRecord['id']);
                                                            } else if ($mRecord['nature_of_business_id'] == 2) {
                                                                $mStageTwo = $this->const->getParentByVendorKey($mRecord['id']);
                                                                $mPqScore = array();
                                                            }

                                                            $mGetWork = $this->buyer->getTypeOfWork($mRecord['type_of_work_id']);
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $mCount; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if ($mRecord['nature_of_business_id'] == 1) { ?>
                                                                        <span class="text-bold">Vendor</span>
                                                                    <?php } else if ($mRecord['nature_of_business_id'] == 2) { ?>
                                                                        <span class="text-bold">Consultant</span>
                                                                    <?php } else if ($mRecord['nature_of_business_id'] == 3) { ?>
                                                                        <span class="text-bold">Contractor</span>
                                                                    <?php } else { ?>
                                                                        <span class="text-bold">Dealers</span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $mTows = json_decode($mRecord['consolidated_tows']);
                                                                    $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                                                                    foreach ($mTows as $key => $value) {
                                                                        ?>
                                                                        <span class="badge badge-primary"><?php echo $value; ?></span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $mRecord['company_name']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if ($mRecord['nature_of_business_id'] == 1) { ?>
                                                                        <?php if (empty($mStageTwo)) { ?>

                                                                            <?php
                                                                            //echo $mRecord['turn_over_of_last_3years'] * 0.5;
                                                                            if ($mRecord['turn_over_of_last_3years'] * 0.5 < 10) {
                                                                                echo "Very Small";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 10 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 50) {
                                                                                echo"Small";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 50 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 100) {
                                                                                echo "Medium";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 100 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 150) {
                                                                                echo "Large";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 150) {
                                                                                echo "Very Large";
                                                                            }
                                                                            ?>

                                                                        <?php } else { ?>

                                                                            <?php
                                                                            $mStageTwoTurn = json_decode($mStageTwo['stc_turnover']);
                                                                            $mStageTwoTurn = array_sum($mStageTwoTurn) / 4;
                                                                            $mStageTwoTurn = $mStageTwoTurn * 0.5;
                                                                            if ($mStageTwoTurn * 10000000 < 100000000) {
                                                                                echo "Very Small";
                                                                            } else if ($mStageTwoTurn * 10000000 > 100000000 && $mStageTwoTurn * 10000000 <= 500000000) {
                                                                                echo"Small";
                                                                            } else if ($mStageTwoTurn * 10000000 > 500000000 && $mStageTwoTurn * 10000000 <= 1000000000) {
                                                                                echo "Medium";
                                                                            } else if ($mStageTwoTurn * 10000000 > 1000000000 && $mStageTwoTurn * 10000000 <= 1500000000) {
                                                                                echo "Large";
                                                                            } else if ($mStageTwoTurn * 10000000 > 1500000000) {
                                                                                echo "Very Large";
                                                                            }
                                                                            ?>

                                                                        <?php } ?>
                                                                    <?php } else if ($mRecord['nature_of_business_id'] == 2) { ?>
                                                                        <?php if (empty($mStageTwo)) { ?>

                                                                            <?php
                                                                            //echo $mRecord['turn_over_of_last_3years'] * 0.5;
                                                                            if ($mRecord['turn_over_of_last_3years'] * 0.5 < 10) {
                                                                                echo "Very Small";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 10 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 50) {
                                                                                echo"Small";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 50 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 100) {
                                                                                echo "Medium";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 100 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 150) {
                                                                                echo "Large";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 150) {
                                                                                echo "Very Large";
                                                                            }
                                                                            ?>

                                                                        <?php } else { ?>

                                                                            <?php
                                                                            $mStageTwoTurn = json_decode($mStageTwo['stc_turnover']);
                                                                            $mStageTwoTurn = array_sum($mStageTwoTurn) / 4;
                                                                            $mStageTwoTurn = $mStageTwoTurn * 0.5;
                                                                            if ($mStageTwoTurn * 10000000 < 10000000) {
                                                                                echo "Very Small";
                                                                            } else if ($mStageTwoTurn * 10000000 > 10000000 && $mStageTwoTurn * 10000000 <= 500000000) {
                                                                                echo"Small";
                                                                            } else if ($mStageTwoTurn * 10000000 > 500000000 && $mStageTwoTurn * 10000000 <= 1000000000) {
                                                                                echo "Medium";
                                                                            } else if ($mStageTwoTurn * 10000000 > 1000000000 && $mStageTwoTurn * 10000000 <= 1500000000) {
                                                                                echo "Large";
                                                                            } else if ($mStageTwoTurn * 10000000 > 1500000000) {
                                                                                echo "Very Large";
                                                                            }
                                                                            ?>

                                                                        <?php } ?>
                                                                    <?php } else if ($mRecord['nature_of_business_id'] == 3) { ?>
                                                                        <?php if (empty($mStageTwo)) { ?>

                                                                            <?php
                                                                            //echo $mRecord['turn_over_of_last_3years'] * 0.5;
                                                                            if ($mRecord['turn_over_of_last_3years'] * 0.5 < 5) {
                                                                                echo "Very Small";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 5 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 25) {
                                                                                echo"Small";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 25 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 50) {
                                                                                echo "Medium";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 50 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 100) {
                                                                                echo "Large";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 100) {
                                                                                echo "Very Large";
                                                                            }
                                                                            ?>

                                                                        <?php } else { ?>

                                                                            <?php
                                                                            $mStageTwoTurn = json_decode($mStageTwo['stc_turnover']);
                                                                            $mStageTwoTurn = array_sum($mStageTwoTurn) / 4;
                                                                            $mStageTwoTurn = $mStageTwoTurn * 0.5;
                                                                            if ($mStageTwoTurn * 10000000 < 50000000) {
                                                                                echo "Very Small";
                                                                            } else if ($mStageTwoTurn * 10000000 > 50000000 && $mStageTwoTurn * 10000000 <= 250000000) {
                                                                                echo"Small";
                                                                            } else if ($mStageTwoTurn * 10000000 > 250000000 && $mStageTwoTurn * 10000000 <= 500000000) {
                                                                                echo "Medium";
                                                                            } else if ($mStageTwoTurn * 10000000 > 500000000 && $mStageTwoTurn * 10000000 <= 1000000000) {
                                                                                echo "Large";
                                                                            } else if ($mStageTwoTurn * 10000000 > 1000000000) {
                                                                                echo "Very Large";
                                                                            }
                                                                            ?>

                                                                        <?php } ?>
                                                                    <?php } else { ?>
                                                                        <?php if (empty($mStageTwo)) { ?>

                                                                            <?php
                                                                            //echo $mRecord['turn_over_of_last_3years'] * 0.5;
                                                                            if ($mRecord['turn_over_of_last_3years'] * 0.5 < 10) {
                                                                                echo "Very Small";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 10 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 50) {
                                                                                echo"Small";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 50 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 100) {
                                                                                echo "Medium";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 100 && $mRecord['turn_over_of_last_3years'] * 0.5 <= 150) {
                                                                                echo "Large";
                                                                            } else if ($mRecord['turn_over_of_last_3years'] * 0.5 > 150) {
                                                                                echo "Very Large";
                                                                            }
                                                                            ?>

                                                                        <?php } else { ?>

                                                                            <?php
                                                                            $mStageTwoTurn = json_decode($mStageTwo['stc_turnover']);
                                                                            $mStageTwoTurn = array_sum($mStageTwoTurn) / 4;
                                                                            $mStageTwoTurn = $mStageTwoTurn * 0.5;
                                                                            if ($mStageTwoTurn * 10000000 < 10000000) {
                                                                                echo "Very Small";
                                                                            } else if ($mStageTwoTurn * 10000000 > 10000000 && $mStageTwoTurn * 10000000 <= 500000000) {
                                                                                echo"Small";
                                                                            } else if ($mStageTwoTurn * 10000000 > 500000000 && $mStageTwoTurn * 10000000 <= 1000000000) {
                                                                                echo "Medium";
                                                                            } else if ($mStageTwoTurn * 10000000 > 1000000000 && $mStageTwoTurn * 10000000 <= 1500000000) {
                                                                                echo "Large";
                                                                            } else if ($mStageTwoTurn * 10000000 > 1500000000) {
                                                                                echo "Very Large";
                                                                            }
                                                                            ?>

                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <?php if ($mRecord['active'] == 0) { ?>
                                                                        <span class="btn btn-sm btn-secondary btn-block">Stage One Pending</span>
                                                                    <?php } else if ($mRecord['active'] == 1) { ?>
                                                                        <span class="badge badge-primary">Accepted Stage One</span>
                                                                    <?php } else if ($mRecord['active'] == 2) { ?>
                                                                        <span class="badge badge-primary">Accepted Stage Two</span>
                                                                    <?php } else if ($mRecord['active'] == 9) { ?>
                                                                        <span class="badge badge-primary">Rejected Stage One</span>
                                                                    <?php } else if ($mRecord['active'] == 10) { ?>
                                                                        <span class="badge badge-primary">Rejected Stage Two</span>
                                                                    <?php } ?>
                                                                </td>

                                                                <td width="10%">
                                                                    <?php if ($mRecord['active'] == 2) { ?>
                                                                        <?php if ($mRecord['pr'] == "") { ?>
                                                                            <select onchange="getSelectedPr(this, '<?php echo $mRecord['id'] ?>');" id="select_pr_<?php echo $mRecord['buyer_id']; ?>" class="form-control form-control-sm mt-2" name="pr">
                                                                                <option selected="" value="">Select Project Manager</option>
                                                                                <?php foreach ($mPrs as $key => $mPr) { ?>
                                                                                    <option value="<?php echo $mPr['buyer_id'] ?>"><?php echo $mPr['buyer_name'] ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        <?php } else { ?>
                                                                            <?php
                                                                            $mTows = json_decode($mRecord['consolidated_tows']);
                                                                            $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                                                                            foreach ($mTows as $key => $value) {
                                                                                if ($mRecord['nature_of_business_id'] == 2) {
                                                                                    $mSiteReport = $this->svr->getConsultantParentByVendorKey($mRecord['id']);
                                                                                } else if ($mRecord['nature_of_business_id'] == 3) {
                                                                                    $mSiteReport = $this->svrc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                                } else {
                                                                                    $mSiteReport = $this->svr->getParentByVendorKey($mRecord['id']);
                                                                                }
                                                                                ?>
                                                                                <?php if ($mRecord['nature_of_business_id'] == 1) { ?>
                                                                                    <?php if (!empty($mSiteReport)) { ?>
                                                                                        <a href="<?php echo base_url('buyer/vendor/editSiteVisitReport/' . $mSiteReport['svr_id']); ?>" class="badge badge-primary">
                                                                                            View : <?php echo $value; ?> | Score : <?php echo $mSiteReport['svr_final_score']; ?>
                                                                                        </a>
                                                                                    <?php } else { ?>
                                                                                        <a href="#" class="badge badge-warning">
                                                                                            Pending : <?php echo $value; ?>
                                                                                        </a>
                                                                                    <?php } ?>
                                                                                <?php } else if ($mRecord['nature_of_business_id'] == 2) { ?>
                                                                                    <?php if (!empty($mSiteReport)) { ?>
                                                                                        <a href="<?php echo base_url('buyer/vendor/editConsultantSiteVisitReport/' . $mSiteReport['csvr_id']); ?>" class="badge badge-primary">
                                                                                            View : <?php echo $value; ?> | Score : <?php echo $mSiteReport['csvr_final_score']; ?>
                                                                                        </a>
                                                                                    <?php } else { ?>
                                                                                        <a href="#" class="badge badge-warning">
                                                                                            Pending : <?php echo $value; ?>
                                                                                        </a>
                                                                                    <?php } ?>
                                                                                <?php } else if ($mRecord['nature_of_business_id'] == 3) { ?>
                                                                                    <?php if (!empty($mSiteReport)) { ?>
                                                                                        <a href="<?php echo base_url('buyer/vendor/editContractorSiteVisitReport/' . $mSiteReport['svrc_id']); ?>" class="badge badge-primary">
                                                                                            View : <?php echo $value; ?> | Score : <?php echo $mSiteReport['svrc_final_score']; ?>
                                                                                        </a>
                                                                                    <?php } else { ?>
                                                                                        <a href="#" class="badge badge-warning">
                                                                                            Pending : <?php echo $value; ?>
                                                                                        </a>
                                                                                    <?php } ?>
                                                                                <?php } ?>

                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </td>

                                                                <td>
                                                                    <?php if ($mRecord['active'] == 2) { ?>
                                                                        <?php if ($mRecord['svr_id'] || $mRecord['csvr_id'] || $mRecord['svrc_id']) { ?>
                                                                            <?php
                                                                            $mTows = json_decode($mRecord['consolidated_tows']);
                                                                            $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
                                                                            foreach ($mTows as $key => $value) {
                                                                                if ($mRecord['nature_of_business_id'] == 1) {
                                                                                    $mPqScore = $this->pqv->getParentByVendorKey($mRecord['id']);
                                                                                } else if ($mRecord['nature_of_business_id'] == 3) {
                                                                                    $mPqScore = $this->pqc->getParentByVendorAndTowKey($mRecord['id'], $mTowsIds[$key]);
                                                                                } else if ($mRecord['nature_of_business_id'] == 2) {
                                                                                    $mPqScore = array();
                                                                                }
                                                                                ?>
                                                                                <?php if ($mRecord['nature_of_business_id'] == 1) { ?>
                                                                                    <?php if (!empty($mPqScore)) { ?>
                                                                                        <a href="<?php echo base_url('buyer/vendor/editSiteVisitReport/' . $mSiteReport['svr_id']); ?>" class="badge badge-primary">
                                                                                            View : <?php echo $value; ?> | Score : <?php echo $mPqScore['pqv_total']; ?>
                                                                                        </a>
                                                                                    <?php } else { ?>
                                                                                        <a href="<?php echo base_url('buyer/vendor/viewSiteReports/' . $mRecord['nature_of_business_id'] . "/" . $mRecord['id'] . "/" . $mTowsIds[$key]); ?>" class="badge badge-warning">
                                                                                            Add : <?php echo $value; ?>
                                                                                        </a>
                                                                                    <?php } ?>
                                                                                <?php } else if ($mRecord['nature_of_business_id'] == 2) { ?>
                                                                                    <?php if (!empty($mPqScore)) { ?>
                                                                                        <a href="<?php echo base_url('buyer/vendor/editConsultantSiteVisitReport/' . $mSiteReport['csvr_id']); ?>" class="badge badge-primary">
                                                                                            View : <?php echo $value; ?> | Score : <?php echo $mPqScore['pqc_total']; ?>
                                                                                        </a>
                                                                                    <?php } else { ?>
                                                                                        <a href="<?php echo base_url('buyer/vendor/viewSiteReports/' . $mRecord['nature_of_business_id'] . "/" . $mRecord['id'] . "/" . $mTowsIds[$key]); ?>" class="badge badge-warning">
                                                                                            Add : <?php echo $value; ?>
                                                                                        </a>
                                                                                    <?php } ?>
                                                                                <?php } else if ($mRecord['nature_of_business_id'] == 3) { ?>
                                                                                    <?php if (!empty($mPqScore)) { ?>
                                                                                        <a href="<?php echo base_url('buyer/vendor/editContractorSiteVisitReport/' . $mSiteReport['svrc_id']); ?>" class="badge badge-primary">
                                                                                            View : <?php echo $value; ?> | Score : <?php echo $mPqScore['pqc_total']; ?>
                                                                                        </a>
                                                                                    <?php } else { ?>
                                                                                        <a href="<?php echo base_url('buyer/vendor/addPqScore/' . $mRecord['id'] . "/" . $mRecord['nature_of_business_id'] . "/" . $mTowsIds[$key]); ?>" class="badge badge-warning">
                                                                                            Add : <?php echo $value; ?>
                                                                                        </a>
                                                                                    <?php } ?>
                                                                                <?php } ?>

                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </td>

                                                                <td>
                                                                    <a href="<?php echo base_url('buyer/vendor/getStageOneData/' . $mRecord['id'] . "/" . "view"); ?>" class="btn btn-sm btn-block btn-info">Stage One</a>
        <!--                                                                    <a href="<?php echo base_url('buyer/vendor/getStageOneData/' . $mRecord['id'] . "/" . "edit"); ?>" class="btn btn-sm btn-block btn-info">Edit Stage One</a>-->
                                                                    <?php if (!empty($mStageTwo)) { ?>
                                                                        <a href="<?php echo base_url('buyer/vendor/getStageTwoData/' . $mRecord['id'] . "/" . "view" . "/" . $mRecord['nature_of_business_id']); ?>" class="btn btn-sm btn-block btn-info">Stage Two</a>
            <!--                                                                        <a href="<?php echo base_url('buyer/vendor/getStageTwoData/' . $mRecord['id'] . "/" . "edit" . "/" . $mRecord['nature_of_business_id']); ?>" class="btn btn-sm btn-block btn-info">Edit Stage Two</a>-->
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
                var selectedPr = sel.value;
                $.post("<?php echo base_url('buyer/vendor/makePr'); ?>",
                        {
                            buyer_id: selectedId,
                            pr: selectedPr,
                        },
                        function (data, status) {
                            if (data == "1") {
                                location.reload();
                            } else {
                                alert("Something went wrong, Please try again later.");
                            }
                        });
            }

            function getSelectedUser(sel, selectedId) {
                var selectedPr = sel.value;
                $.post("<?php echo base_url('buyer/vendor/tranferVendor'); ?>",
                        {
                            vendor_id: selectedId,
                            pr: selectedPr,
                        },
                        function (data, status) {
                            if (data == "1") {
                                location.reload();
                            } else {
                                alert("Something went wrong, Please try again later.");
                            }
                        });
            }
        </script>

    </body>
</html>