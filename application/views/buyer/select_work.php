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

                    <style>
                        .primary-gradient{
                            background-color: #2a2a72;
                            background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%);
                        }
                    </style>

                    <!-- Main content -->
                    <section class="content">

                        <!-- Content Header (Page header) -->	  
                        <div class="content-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="page-title br-0">Package Management | <?php echo $zone; ?> | <?php echo $project['project_name']; ?> | <?php echo $for; ?></h5>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <?php $this->load->view('buyer/partials/alerts'); ?>
                                <div class="row">
                                    <?php
                                    foreach ($records as $key => $record) {
                                        ?>
                                        <div class="col-md-3">
                                            <a href="#" data-toggle="modal" data-target="#modal-right-record-<?php echo $record['package_id']; ?>">
                                                <div class="box primary-gradient">
                                                    <div class="box-body p-30 text-center text-white">
                                                        <h5 style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                                            <?php if ($record['package_misc']) { ?>
                                                                <?php echo $record['package_misc']; ?>
                                                            <?php } else { ?>
                                                                <?php echo $record['name']; ?>
                                                            <?php } ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="modal modal-right fade" id="modal-right-record-<?php echo $record['package_id']; ?>" tabindex="-1">
                                            <?php if ($for == "Contracts") { ?>
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                <?php echo $for; ?> : 
                                                                <?php if ($record['package_misc']) { ?>
                                                                    <?php echo $record['package_misc']; ?>
                                                                <?php } else { ?>
                                                                    <?php echo $record['name']; ?>
                                                                <?php } ?>
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <a href="<?php echo base_url('buyer/vendor/eoi/' . $project['project_id'] . "/" . $zone . "/" . $type . "/" . $for . "/" . $record['package_selected_id']); ?>">
                                                                        <div class="box primary-gradient">
                                                                            <div class="box-body p-2 text-center text-white">                                        
                                                                                <h5>
                                                                                    EOI
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <a href="<?php echo base_url('buyer/vendor/shortlisting/' . $project['project_id'] . "/" . $zone . "/" . $type . "/" . $for . "/" . $record['package_selected_id']); ?>">
                                                                        <div class="box primary-gradient">
                                                                            <div class="box-body p-2 text-center text-white">                                        
                                                                                <h5>
                                                                                    Shortlisting
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <a href="<?php echo base_url('buyer/vendor/bidManagement/' . $project['project_id'] . "/" . $zone . "/" . $type . "/" . $for . "/" . $record['package_selected_id']); ?>">
                                                                        <div class="box primary-gradient">
                                                                            <div class="box-body p-2 text-center text-white">                                        
                                                                                <h5>
                                                                                    Approval Time Of Bidder
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <a href="<?php echo base_url('buyer/vendor/bidManagement/' . $project['project_id'] . "/" . $zone . "/" . $type . "/" . $for . "/" . $record['package_selected_id']); ?>">
                                                                        <div class="box primary-gradient">
                                                                            <div class="box-body p-2 text-center text-white">                                        
                                                                                <h5>
                                                                                    Tendering
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <a href="#">
                                                                        <div class="box primary-gradient">
                                                                            <div class="box-body p-2 text-center text-white">                                        
                                                                                <h5>
                                                                                    Bid Management
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <a href="#">
                                                                        <div class="box primary-gradient">
                                                                            <div class="box-body p-2 text-center text-white">                                        
                                                                                <h5>
                                                                                    Award Recommendations
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <a href="#">
                                                                        <div class="box primary-gradient">
                                                                            <div class="box-body p-2 text-center text-white">                                        
                                                                                <h5>
                                                                                    Contract Agreement
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <a href="#">
                                                                        <div class="box primary-gradient">
                                                                            <div class="box-body p-2 text-center text-white">                                        
                                                                                <h5>
                                                                                    Contract Amendment 
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <a href="#">
                                                                        <div class="box primary-gradient">
                                                                            <div class="box-body p-2 text-center text-white">                                        
                                                                                <h5>
                                                                                    SAP WO
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer modal-footer-uniform">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } else if ($for == "Procurement") { ?>
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Procurement</h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <a href="<?php echo base_url('buyer/vendor/shortlistingData'); ?>">
                                                                        <div class="box primary-gradient">
                                                                            <div class="box-body p-2 text-center text-white">                                        
                                                                                <h5>
                                                                                    Free Issue / Direct Purchase
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <a href="<?php echo base_url('buyer/vendor/shortlistingData'); ?>">
                                                                        <div class="box primary-gradient">
                                                                            <div class="box-body p-2 text-center text-white">                                        
                                                                                <h5>
                                                                                    Basic Rate Approval
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer modal-footer-uniform">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                        </div>
                                    <?php } ?>


                                    <?php
                                    $mSessionRole = $this->session->userdata('session_role');
                                    if ($mSessionRole == "PCM" || $mSessionRole == "Regional C&P Head" ||
                                            $mSessionRole == "Regional C&P Team" || $mSessionRole == "HO - C&P" || $mSessionRole == "Head of contracts & procurement") {
                                        ?>
                                        <div class="col-md-3">
                                            <a href="#" data-toggle="modal" data-target="#modal-right">
                                                <div class="box box-info">
                                                    <div class="box-body p-30 text-center text-white">                                        
                                                        <h5>
                                                            Add New <span class="ti ti-plus"></span>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php } ?>
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

        <!-- Modal -->
        <div class="modal modal-right fade" id="modal-right" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Package</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?php echo base_url('buyer/vendor/addNewPackage/' . $project['project_id'] . "/" . $zone . "/" . $type . "/" . $for); ?>">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label>Package Name</label>
                                    <select required="" class="form-control" name="works" id="works">
                                        <option selected="" disabled="" value="">Select</option>
                                        <?php foreach ($works as $key => $work) { ?>
                                            <option value="<?php echo $work['id']; ?>"><?php echo $work['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <input placeholder="Enter Miscellaneous" style="display: none" name="others" id="others" type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer modal-footer-uniform">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary float-right">Add Package</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->

        <script type="text/javascript">

            $('#works').on('change', function () {
                if (this.value === "65") {
                    $('#others').css('display', 'block');
                    $('#others').attr('required', 'required');
                } else {
                    $('#others').css('display', 'none');
                }
            });

            var htmlData = "";
            $("#add_package").click(function () {
                var selectedPackage = $('#works').val();
                if (selectedPackage) {
                    $('#modal-right').modal('hide');
                    htmlData += '';
                    $('#works').val("");
                    $('#dumpdata').html(htmlData);
                } else {
                    alert("Please select the package");
                }
            });

        </script>

    </body>
</html>