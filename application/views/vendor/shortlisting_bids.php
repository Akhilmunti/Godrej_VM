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
                                    <h3 class="page-title br-0">Short Listing</h3>
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
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            1
                                                        </td>
<!--                                                        <td>
                                                            Contractor
                                                        </td>-->
                                                        <td>
                                                            Lifts
                                                        </td>
                                                        <td>
                                                            Sona Infrabuild Private Limited
                                                        </td>
                                                        <td>
                                                            Project One
                                                        </td>
                                                        <td>
                                                            12-02-2020
                                                        </td>
                                                        <td>
                                                            4
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url('vendor/home/viewEoi'); ?>" class="btn btn-xs btn-info btn-block">View</a>
                                                        </td>
                                                        <td>
                                                            <button id="send_short" disabled="" href="" class="btn btn-xs btn-primary btn-block">
                                                                Enter 
                                                            </button>
                                                            <!--                                                            <div class="modal fade select_details" data-backdrop="false" id="select_details" tabindex="-1">
                                                                                                                            <div class="modal-dialog modal-lg">
                                                                                                                                <div class="modal-content">
                                                                                                                                    <div class="modal-header">
                                                                                                                                        <h5 class="modal-title text-bold">
                                                                                                                                            Godrej
                                                                                                                                        </h5>
                                                                                                                                    </div>
                                                                                                                                    <div class="modal-body">
                                                                                                                                        <div class="panel-body border border-info">
                                                                                                                                            <div class="row">
                                                                                                                                                <div class="col-md-6">
                                                                                                                                                    <div class="form-group">
                                                                                                                                                        <label for="wlastName2"> Total Amount of Turn over (2019-2020): <span class="danger">*</span> </label>
                                                                                                                                                        <input required="" type="number" class="form-control"/>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-md-6">
                                                                                                                                                    <div class="form-group">
                                                                                                                                                        <label for="wlastName2"> Total Amount of Turn over (2020-2021): <span class="danger">*</span> </label>
                                                                                                                                                        <input required="" type="number" class="form-control"/>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-md-6">
                                                                                                                                                    <div class="form-group">
                                                                                                                                                        <label for="wlastName2"> Total Amount of Turn over (2021-2022): <span class="danger">*</span> </label>
                                                                                                                                                        <input required="" type="number" class="form-control"/>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-md-6">
                                                                                                                                                    <div class="form-group">
                                                                                                                                                        <label for="wlastName2"> Attachment – 3 years TO details : <span class="danger">*</span> </label>
                                                                                                                                                        <input required="" type="file" class="form-control"/>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-md-6">
                                                                                                                                                    <div class="form-group">
                                                                                                                                                        <label for="wlastName2"> Total No. of Orders in Hand : <span class="danger">*</span> </label>
                                                                                                                                                        <input required="" type="number" class="form-control"/>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-md-6">
                                                                                                                                                    <div class="form-group">
                                                                                                                                                        <label for="wlastName2"> Attachment – Details of orders : <span class="danger">*</span> </label>
                                                                                                                                                        <input required="" type="file" class="form-control"/>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-md-6">
                                                                                                                                                    <div class="form-group">
                                                                                                                                                        <label for="wlastName2"> No. of Years for completion of above work  : <span class="danger">*</span> </label>
                                                                                                                                                        <input value="2" readonly="" required="" type="number" class="form-control"/>
                                                                                                                                                    </div>
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
                                                                                                                        </div>-->
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            2
                                                        </td>
<!--                                                        <td>
                                                            Contractor
                                                        </td>-->
                                                        <td>
                                                            Lifts
                                                        </td>
                                                        <td>
                                                            Sona Infrabuild Private Limited
                                                        </td>
                                                        <td>
                                                            Project One
                                                        </td>
                                                        <td>
                                                            12-02-2020
                                                        </td>
                                                        <td>
                                                            4
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url('vendor/home/viewEoi'); ?>" class="btn btn-xs btn-info btn-block">View</a>
                                                        </td>
                                                        <td>
<!--                                                            <a id="send_short" disabled="" href="<?php echo base_url('vendor/home/sendShortlisting'); ?>" class="btn btn-xs btn-primary btn-block">
                                                                Send 
                                                            </a>-->
                                                            <!--                                                            <div class="modal fade select_details" data-backdrop="false" id="select_details" tabindex="-1">
                                                                                                                            <div class="modal-dialog modal-lg">
                                                                                                                                <div class="modal-content">
                                                                                                                                    <div class="modal-header">
                                                                                                                                        <h5 class="modal-title text-bold">
                                                                                                                                            Godrej
                                                                                                                                        </h5>
                                                                                                                                    </div>
                                                                                                                                    <div class="modal-body">
                                                                                                                                        <div class="panel-body border border-info">
                                                                                                                                            <div class="row">
                                                                                                                                                <div class="col-md-6">
                                                                                                                                                    <div class="form-group">
                                                                                                                                                        <label for="wlastName2"> Total Amount of Turn over (2019-2020): <span class="danger">*</span> </label>
                                                                                                                                                        <input required="" type="number" class="form-control"/>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-md-6">
                                                                                                                                                    <div class="form-group">
                                                                                                                                                        <label for="wlastName2"> Total Amount of Turn over (2020-2021): <span class="danger">*</span> </label>
                                                                                                                                                        <input required="" type="number" class="form-control"/>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-md-6">
                                                                                                                                                    <div class="form-group">
                                                                                                                                                        <label for="wlastName2"> Total Amount of Turn over (2021-2022): <span class="danger">*</span> </label>
                                                                                                                                                        <input required="" type="number" class="form-control"/>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-md-6">
                                                                                                                                                    <div class="form-group">
                                                                                                                                                        <label for="wlastName2"> Attachment – 3 years TO details : <span class="danger">*</span> </label>
                                                                                                                                                        <input required="" type="file" class="form-control"/>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-md-6">
                                                                                                                                                    <div class="form-group">
                                                                                                                                                        <label for="wlastName2"> Total No. of Orders in Hand : <span class="danger">*</span> </label>
                                                                                                                                                        <input required="" type="number" class="form-control"/>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-md-6">
                                                                                                                                                    <div class="form-group">
                                                                                                                                                        <label for="wlastName2"> Attachment – Details of orders : <span class="danger">*</span> </label>
                                                                                                                                                        <input required="" type="file" class="form-control"/>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-md-6">
                                                                                                                                                    <div class="form-group">
                                                                                                                                                        <label for="wlastName2"> No. of Years for completion of above work  : <span class="danger">*</span> </label>
                                                                                                                                                        <input value="2" readonly="" required="" type="number" class="form-control"/>
                                                                                                                                                    </div>
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
                                                                                                                        </div>-->
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