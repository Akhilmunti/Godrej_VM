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
                                                        <option value="1">SAP Data</option>
                                                        <option value="2">Pre Development Data</option>
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
                                                        <th>Vendor Details/Name</th>
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
                                                        $mGetFeedback = $this->feedback->getParentByVendorKey($record['id']);
                                                        $mPurchaseOrg = $this->purchase_model->getParentByCode($mGetFeedback['feedback_purchase']);
                                                        $mAllFormRecord = $this->feedbackforms->getAllParentByTypeAndFeedbackId($mGetFeedback['feedback_id']);
                                                        //print_r($record);
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $mCount; ?>
                                                            </td>
                                                            <td>
                                                                <a data-toggle="modal" data-target="#modal-right-record-<?php echo $record['id']; ?>" href="#" class="btn btn-xs btn-primary">
                                                                    <?php echo $record['company_name']; ?>
                                                                </a>
                                                                <div class="modal modal-right fade" id="modal-right-record-<?php echo $record['id']; ?>" tabindex="-1">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"><?php echo $record['company_name']; ?></h5>
                                                                                <button type="button" class="close" data-dismiss="modal">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-4">
                                                                                        <h5>
                                                                                            <b>
                                                                                                Email :
                                                                                            </b>
                                                                                        </h5>
                                                                                        <h5>
                                                                                            <b>
                                                                                                Phone :
                                                                                            </b>
                                                                                        </h5>
                                                                                        <h5>
                                                                                            <b>
                                                                                                Location :
                                                                                            </b>
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <h5>
                                                                                            <?php echo $record['email']; ?>
                                                                                        </h5>
                                                                                        <h5>
                                                                                            <?php echo $record['contact_number']; ?>
                                                                                        </h5>
                                                                                        <h5>
                                                                                            <?php echo $record['location']; ?>
                                                                                        </h5>
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
                                                                <?php echo $mAllFormRecord[0]['ff_final_score']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $mAllFormRecord[0]['ff_final_score']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $mAllFormRecord[0]['ff_date']; ?>
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