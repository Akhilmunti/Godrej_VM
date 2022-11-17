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
                                    <h3 class="page-title br-0">Shortlisting</h3>
                                </div>
                                <!--                                <div class="col-md-6 text-right">
                                                                    <a href="<?php echo base_url('buyer/vendor/addShortlisting'); ?>" class="btn btn-primary">Add</a>
                                                                </div>-->
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
                                                        <th>Package Scope</th>
                                                        <th>Shortlisting</th>
                                                        <th>Current Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>
                                                            Tower 1
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url('buyer/vendor/addShortlisting/' . $project['project_id'] . "/" . $zone . "/" . $type); ?>" class="btn btn-xs btn-dark">
                                                                Send for Approval
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            2
                                                        </td>
                                                        <td>
                                                            Tower 2
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url('buyer/vendor/addShortlisting/' . $project['project_id'] . "/" . $zone . "/" . $type); ?>" class="btn btn-xs btn-dark">
                                                                Send EOI
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            3
                                                        </td>
                                                        <td>
                                                            Tower 3
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url('buyer/vendor/addShortlisting/' . $project['project_id'] . "/" . $zone . "/" . $type); ?>" class="btn btn-xs btn-dark">
                                                                Send EOI
                                                            </a>
                                                        </td>
<!--                                                        <td>
                                                            <a href="<?php echo base_url('buyer/vendor/shortlistApproval'); ?>" class="btn btn-xs btn-primary btn-block">
                                                                Send for approval
                                                            </a>
                                                        </td>-->
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> 
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Action</th>
                                                        <th>Feedback Score</th>
                                                        <th>User Type</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Purchase Organization</th>
                                                        <th>Purchase Group</th>
                                                        <th>WO Number</th>
                                                        <th>Upload WO/PO</th>
                                                        <th>Company Code</th>
                                                        <th>PO City</th>
                                                        <th>Zone</th>
                                                        <th>Vendor Code</th>
                                                        <th>Vendor Details</th>
                                                    </tr>

                                                    <tr>
                                                        <th>#</th>
                                                        <th>Type of agency</th>
                                                        <th>Package name</th>
                                                        <th>Project</th>
                                                        <th>Estimated Value of Work (In Crores)</th>
                                                        <th>Timeline</th>
                                                        <th>EOI Sent</th>
                                                        <th>Bid capacity</th>
                                                        <th>Accepted EOI</th>
                                                        <th>Justification</th>
                                                        <th>Status</th>
                                                        <th>Send for Approval</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>
                                                            Contractor
                                                        </td>
                                                        <td>
                                                            Lifts
                                                        </td>
                                                        <td>
                                                            Sona Infrabuild Private Limited
                                                        </td>
                                                        <td>
                                                            23
                                                        </td>
                                                        <td>
                                                            12-02-2020 to 26-11-2022
                                                        </td>
                                                        <td>
                                                            Godrej (Large)
                                                        </td>
                                                        <td>
                                                            NA
                                                        </td>
                                                        <td>
                                                            Godrej (Large)
                                                        </td>
                                                        <td>
                                                            NA
                                                        </td>
                                                        <td>
                                                            <span class="btn btn-xs btn-dark">
                                                                Sent for Approval
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a download="" href="#" class="btn btn-xs btn-disabled btn-secondary btn-block">
                                                                Send for approval
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url('buyer/vendor/approveShortlisting'); ?>" class="btn btn-xs btn-primary btn-block">
                                                                Approve
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            2
                                                        </td>
                                                        <td>
                                                            Vendor
                                                        </td>
                                                        <td>
                                                            Lifts
                                                        </td>
                                                        <td>
                                                            Sona Infrabuild Private Limited
                                                        </td>
                                                        <td>
                                                            55
                                                        </td>
                                                        <td>
                                                            12-02-2020 to 26-11-2022
                                                        </td>
                                                        <td>
                                                            Godrej  (Large)
                                                            <br>
                                                            L&T  (Medium)
                                                            <br>
                                                            SWD  (Medium)
                                                        </td>
                                                        <td>
                                                            55
                                                            <br>
                                                            34
                                                            <br>
                                                            63
                                                        </td>
                                                        <td>
                                                            <a href="#" data-toggle="modal" data-target="#select_details" class="btn btn-xs btn-primary">
                                                                Select Vendors
                                                            </a>
                                                            <div class="modal fade select_details" data-backdrop="false" id="select_details" tabindex="-1">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-bold">
                                                                                Select Vendors
                                                                            </h5>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="panel-body border border-info">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 table-responsive">

                                                                                        <table class="table table-bordered">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>
                                                                                                        Action
                                                                                                    </th>
                                                                                                    <th>
                                                                                                        Vendor
                                                                                                    </th>
                                                                                                    <th>
                                                                                                        Bid Capacity
                                                                                                    </th>
                                                                                                    <th>
                                                                                                        Highest turn over (Last 3 years)
                                                                                                    </th>
                                                                                                    <th>
                                                                                                        Ongoing Works/Orders
                                                                                                    </th>
                                                                                                    <th>
                                                                                                        Download Attachments
                                                                                                    </th>
                                                                                                    <th>
                                                                                                        No of years to complete
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <input class="form-check-input" type="checkbox" id="checkbox_23" name="stv_confirmation" value="1"> 
                                                                                                        <label class="form-check-label" for="checkbox_23"></label>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        Sona Infrabuild		
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        33
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        77
                                                                                                        <br>
                                                                                                        <a href="#" download="" class="btn btn-xs btn-primary">Downlaod</a>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        77
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <a href="#" download="" class="btn btn-xs btn-primary">Downlaod</a>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        3
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <input class="form-check-input" type="checkbox" id="checkbox_23" name="stv_confirmation" value="1"> 
                                                                                                        <label class="form-check-label" for="checkbox_23"></label>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        ABC Vendor
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        33
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        77
                                                                                                        <br>
                                                                                                        <a href="#" download="" class="btn btn-xs btn-primary">Downlaod</a>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        77
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <a href="#" download="" class="btn btn-xs btn-primary">Downlaod</a>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        3
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <input class="form-check-input" type="checkbox" id="checkbox_23" name="stv_confirmation" value="1"> 
                                                                                                        <label class="form-check-label" for="checkbox_23"></label>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        ABC Vendor
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        33
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        77
                                                                                                        <br>
                                                                                                        <a href="#" download="" class="btn btn-xs btn-primary">Downlaod</a>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        77
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <a href="#" download="" class="btn btn-xs btn-primary">Downlaod</a>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        3
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <input class="form-check-input" type="checkbox" id="checkbox_23" name="stv_confirmation" value="1"> 
                                                                                                        <label class="form-check-label" for="checkbox_23"></label>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        ABC Vendor
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        33
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        77
                                                                                                        <br>
                                                                                                        <a href="#" download="" class="btn btn-xs btn-primary">Downlaod</a>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        77
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <a href="#" download="" class="btn btn-xs btn-primary">Downlaod</a>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        3
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <input class="form-check-input" type="checkbox" id="checkbox_23" name="stv_confirmation" value="1"> 
                                                                                                        <label class="form-check-label" for="checkbox_23"></label>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        ABC Vendor
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        33
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        77
                                                                                                        <br>
                                                                                                        <a href="#" download="" class="btn btn-xs btn-primary">Downlaod</a>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        77
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <a href="#" download="" class="btn btn-xs btn-primary">Downlaod</a>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        3
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer modal-footer-uniform">
                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Submit</button>
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            Sent to regional head
                                                        </td>
                                                        <td>
                                                            <span class="btn btn-xs btn-dark">
                                                                Sent to regional head for justification
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="btn btn-xs btn-disabled btn-secondary btn-block">
                                                                Send for approval
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url('buyer/vendor/approveShortlisting'); ?>" class="btn btn-xs btn-primary btn-block">
                                                                Approve
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            3
                                                        </td>
                                                        <td>
                                                            Vendor
                                                        </td>
                                                        <td>
                                                            Lifts
                                                        </td>
                                                        <td>
                                                            Sona Infrabuild Private Limited
                                                        </td>
                                                        <td>
                                                            55
                                                        </td>
                                                        <td>
                                                            12-02-2020 to 26-11-2022
                                                        </td>
                                                        <td>
                                                            Godrej   (Medium)
                                                            <br>
                                                            L&T  (Medium)
                                                            <br>
                                                            SWD  (Medium)
                                                            <br>
                                                            AFCON  (Medium)
                                                            <br>
                                                            Shapoorji  (Medium)
                                                        </td>
                                                        <td>
                                                            55
                                                            <br>
                                                            34
                                                            <br>
                                                            63
                                                            <br>
                                                            44
                                                            <br>
                                                            77
                                                        </td>
                                                        <td>
                                                            Godrej   (Medium)
                                                            <br>
                                                            L&T  (Medium)
                                                            <br>
                                                            SWD  (Medium)
                                                            <br>
                                                            AFCON  (Medium)
                                                            <br>
                                                            Shapoorji  (Medium)
                                                        </td>
                                                        <td>
                                                            NA
                                                        </td>
                                                        <td>
                                                            <span class="btn btn-xs btn-dark">
                                                                Vendor shortlisting done
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url('buyer/vendor/shortlistApproval'); ?>" class="btn btn-xs btn-primary btn-block">
                                                                Send for approval
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url('buyer/vendor/approveShortlisting'); ?>" class="btn btn-xs btn-primary btn-block">
                                                                Approve
                                                            </a>
                                                        </td>
                                                    </tr>
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